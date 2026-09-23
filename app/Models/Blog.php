<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'banner_image',
        'image_alt',
        'category',
        'tags',
        'author_name',
        'is_published',
        'published_at',
        'views_count',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    /**
     * Boot model events to ensure unique slug generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = static::generateUniqueSlug($blog->title);
            }
            if (empty($blog->published_at) && $blog->is_published) {
                $blog->published_at = now();
            }
        });
    }

    /**
     * Generate a unique slug for the blog post.
     */
    public static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    /**
     * Accessor for full image URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/post-1.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, 'images/')) {
            return asset($this->image);
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }

    /**
     * Accessor for header breadcrumb banner image URL.
     * If individual blog has a custom banner_image, use it.
     * Otherwise fallback to global PageBanner::getImage('blog-single').
     */
    public function getBannerImageUrlAttribute(): string
    {
        if (!empty($this->banner_image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->banner_image)) {
            return asset('storage/' . $this->banner_image);
        }

        return \App\Models\PageBanner::getImage('blog-single');
    }

    /**
     * Accessor for image alt text with fallback to title.
     */
    public function getImageAltTextAttribute(): string
    {
        return $this->image_alt ?: $this->title;
    }

    /**
     * Formatted publication date.
     */
    public function getFormattedDateAttribute(): string
    {
        $date = $this->published_at ?? $this->created_at;
        return $date ? $date->format('d M, Y') : '';
    }

    /**
     * Calculate approximate reading time.
     */
    public function getReadingTimeAttribute(): string
    {
        $words = str_word_count(strip_tags($this->content ?? ''));
        $minutes = max(1, (int) ceil($words / 200));
        return "{$minutes} min read";
    }

    /**
     * Get tags as an array.
     */
    public function getTagsArrayAttribute(): array
    {
        if (empty($this->tags)) {
            return ['Wheat', 'Organic', 'Health'];
        }

        return array_filter(array_map('trim', explode(',', $this->tags)));
    }

    /**
     * Scope for published blogs.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope for search filtering.
     */
    public function scopeSearch($query, ?string $term)
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'LIKE', "%{$term}%")
              ->orWhere('excerpt', 'LIKE', "%{$term}%")
              ->orWhere('content', 'LIKE', "%{$term}%")
              ->orWhere('category', 'LIKE', "%{$term}%")
              ->orWhere('tags', 'LIKE', "%{$term}%");
        });
    }

    /**
     * Scope for category filtering.
     */
    public function scopeCategory($query, ?string $category)
    {
        if (empty($category) || $category === 'all') {
            return $query;
        }

        return $query->where('category', $category);
    }

    /**
     * Compute fallback or custom SEO Title for dynamic blog article.
     */
    public function getSeoTitleAttribute(): string
    {
        return !empty($this->meta_title)
            ? $this->meta_title
            : "{$this->title} | Healthy Recipes & Nutrition - Raghuvir Atta";
    }

    /**
     * Compute fallback or custom SEO Description for dynamic blog article.
     */
    public function getSeoDescriptionAttribute(): string
    {
        if (!empty($this->meta_description)) {
            return $this->meta_description;
        }

        if (!empty($this->excerpt)) {
            return Str::limit(strip_tags($this->excerpt), 160);
        }

        return Str::limit(strip_tags($this->content ?? ''), 160) ?: "Read insightful cooking guides, stoneground flour benefits, and nutrition tips from Raghuvir Atta.";
    }

    /**
     * Compute fallback or custom SEO Keywords for dynamic blog article.
     */
    public function getSeoKeywordsAttribute(): string
    {
        if (!empty($this->meta_keywords)) {
            return $this->meta_keywords;
        }

        $keywords = [$this->category, $this->tags, 'raghuvir atta', 'healthy recipes', 'flour nutrition'];
        return implode(', ', array_filter($keywords));
    }

    /**
     * Generate Schema.org BlogPosting structured JSON-LD.
     */
    public function getSchemaJsonAttribute(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $this->seo_title,
            'description' => $this->seo_description,
            'image' => [$this->image_url],
            'datePublished' => ($this->published_at ?? $this->created_at)?->toIso8601String(),
            'dateModified' => $this->updated_at?->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $this->author_name ?: 'Raghuvir Atta Culinary Expert',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => setting('site_title', 'Raghuvir Atta'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/Raghuvir Logo.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('blog.single', ['slug' => $this->slug]),
            ],
        ];

        return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Compute real-time SEO health score (0-100).
     */
    public function getSeoScoreAttribute(): int
    {
        $score = 0;
        $title = trim($this->meta_title ?: $this->title);
        $desc = trim($this->meta_description ?: ($this->excerpt ?: ''));
        $words = str_word_count(strip_tags($this->content ?? ''));

        // 1. Meta Title (15 pts)
        $tLen = mb_strlen($title);
        if ($tLen >= 45 && $tLen <= 65) {
            $score += 15;
        } elseif ($tLen > 0) {
            $score += 8;
        }

        // 2. Meta Description (15 pts)
        $dLen = mb_strlen($desc);
        if ($dLen >= 120 && $dLen <= 165) {
            $score += 15;
        } elseif ($dLen > 0) {
            $score += 15;
        }

        // 3. Word Count (20 pts)
        if ($words >= 600) {
            $score += 20;
        } elseif ($words >= 300) {
            $score += 15;
        } elseif ($words >= 100) {
            $score += 8;
        }

        // 4. Subheadings (15 pts)
        if (preg_match('/<h[2-4][^>]*>/i', $this->content ?? '')) {
            $score += 15;
        }

        // 5. Clean Slug (10 pts)
        if (!empty($this->slug) && mb_strlen($this->slug) <= 75) {
            $score += 10;
        }

        // 6. Featured Image & Alt Text (15 pts)
        if (!empty($this->image)) {
            $score += 10;
            if (!empty($this->image_alt)) {
                $score += 5;
            }
        }

        // 7. Keywords / Tags (10 pts)
        if (!empty($this->meta_keywords) || !empty($this->tags)) {
            $score += 10;
        }

        return min(100, max(0, $score));
    }
}
