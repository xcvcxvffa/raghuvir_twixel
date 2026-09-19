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
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/gallery-1.jpg');
        }

        // Check if image path is stored in storage
        if (Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        // Check if it's already a relative public path (e.g., 'images/gallery-1.jpg')
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return asset('images/gallery-1.jpg');
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
     * Accessor: Responsive Video Embed URL.
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        $ytId = $this->youtube_id;
        if ($ytId) {
            return "https://www.youtube.com/embed/{$ytId}?autoplay=1&rel=0";
        }

        return $this->video_url;
    }

    /**
     * Accessor: Best thumbnail URL (custom image or YouTube default).
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->image)) {
            return $this->image_url;
        }

        $ytId = $this->youtube_id;
        if ($ytId) {
            return "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
        }

        return asset('images/gallery-1.jpg');
    }
}
