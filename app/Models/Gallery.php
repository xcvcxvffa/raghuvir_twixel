<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'category',
        'image',
        'video_url',
        'caption',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope: Only active gallery media.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Photos only.
     */
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    /**
     * Scope: Videos only.
     */
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    /**
     * Scope: Order by sort_order asc then created_at desc.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Scope: Keyword Search.
     */
    public function scopeSearch($query, ?string $term)
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('category', 'like', "%{$term}%")
              ->orWhere('caption', 'like', "%{$term}%");
        });
    }

    /**
     * Accessor: Full image URL.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        // Check if image path is stored in storage
        if (Storage::disk('public')->exists($this->image) || file_exists(storage_path('app/public/' . $this->image))) {
            return storage_asset($this->image);
        }

        // Check if it's already a relative public path (e.g., 'images/gallery-1.jpg')
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return null;
    }

    /**
     * Accessor: Extract YouTube ID from multiple formats.
     */
    public function getYoutubeIdAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        // Patterns:
        // youtube.com/watch?v=XXXX
        // youtu.be/XXXX
        // youtube.com/embed/XXXX
        // youtube.com/shorts/XXXX
        $pattern = '%^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com/(?:embed/|v/|shorts/|watch\?v=|watch\?.+&v=))([\w-]{11})(?:\S+)?$%x';

        if (preg_match($pattern, $this->video_url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Accessor: Check if the video is an uploaded file.
     */
    public function getIsUploadedVideoAttribute(): bool
    {
        $raw = $this->attributes['video_url'] ?? null;
        if (empty($raw)) {
            return false;
        }

        $cleanPath = preg_replace('/\?.*$/', '', $raw);
        $ext = strtolower(pathinfo($cleanPath, PATHINFO_EXTENSION));
        return in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'mkv']) || Storage::disk('public')->exists($raw);
    }

    /**
     * Accessor: Full video URL (resolves storage path if uploaded file, otherwise returns URL as is).
     */
    public function getVideoUrlAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (Storage::disk('public')->exists($value) || file_exists(storage_path('app/public/' . $value))) {
            return storage_asset($value);
        }

        if (file_exists(public_path($value))) {
            return asset($value);
        }

        return $value;
    }

    /**
     * Accessor: Responsive Video Embed URL.
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        if ($this->is_uploaded_video) {
            return $this->video_url;
        }

        $ytId = $this->youtube_id;
        if ($ytId) {
            return "https://www.youtube.com/embed/{$ytId}?autoplay=1&rel=0";
        }

        return $this->video_url;
    }

    /**
     * Accessor: Best thumbnail URL (custom image, YouTube default, or clean placeholder).
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->image) && $this->image_url) {
            return $this->image_url;
        }

        $ytId = $this->youtube_id;
        if ($ytId) {
            return "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
        }

        if ($this->type === 'video') {
            return asset('images/video-placeholder.svg');
        }

        return asset('images/no-image-placeholder.svg');
    }
}
