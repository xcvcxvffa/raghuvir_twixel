<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PageSeo extends Model
{
    public const CACHE_KEY = 'site_page_seos_all';

    protected $fillable = [
        'page_key',
        'page_name',
        'page_route',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'robots',
        'schema_type',
        'schema_json',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function () {
            static::clearCache();
        });

        static::deleted(function () {
            static::clearCache();
        });
    }

    /**
     * Clear all cached SEO records.
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Get all cached SEO models indexed by page_key.
     * Stores raw attributes to prevent __PHP_Incomplete_Class unserialize errors across cache drivers.
     *
     * @return array<string, array>
     */
    public static function getAllCached(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return static::where('is_active', true)
                ->get()
                ->keyBy('page_key')
                ->map(fn ($item) => $item->getAttributes())
                ->toArray();
        });
    }

    /**
     * Get SEO record for a specific page key.
     */
    public static function getForPage(string $pageKey): ?self
    {
        $all = static::getAllCached();
        
        if (isset($all[$pageKey])) {
            $instance = new static();
            $instance->setRawAttributes($all[$pageKey], true);
            $instance->exists = true;
            return $instance;
        }

        return null;
    }

    /**
     * Resolve SEO record for the current public HTTP route or path.
     */
    public static function forCurrentRoute(): ?self
    {
        $routeName = Route::currentRouteName();

        $map = [
            'home'           => 'home',
            'home-v2'        => 'home',
            'home-v3'        => 'home',
            'home-v4'        => 'home',
            'about'          => 'about',
            'products'       => 'products',
            'product-details'=> 'product-details',
            'blog'           => 'blog',
            'blog.single'    => 'blog-single',
            'blog-details'   => 'blog-single',
            'contact'        => 'contact',
            'services'       => 'services',
            'service-details'=> 'service-details',
            'pricing'        => 'pricing',
            'testimonials'   => 'testimonials',
            'faqs'           => 'faqs',
            'image-gallery'  => 'image-gallery',
            'video-gallery'  => 'video-gallery',
            'team'           => 'team',
            'team-details'   => 'team-details',
            '404'            => '404',
        ];

        $pageKey = $map[$routeName] ?? null;

        if ($pageKey) {
            return static::getForPage($pageKey);
        }

        // Fallback to match by path
        $path = trim(request()->path(), '/');
        if ($path === '' || $path === '/') {
            return static::getForPage('home');
        }

        return static::getForPage($path);
    }

    /**
     * Get Open Graph / Social share image URL.
     */
    public function getOgImageUrlAttribute(): string
    {
        if (!empty($this->og_image)) {
            if (Storage::disk('public')->exists($this->og_image)) {
                return asset('storage/' . $this->og_image);
            }
            if (file_exists(public_path($this->og_image))) {
                return asset($this->og_image);
            }
        }

        // Fallback to site header/footer logo or banner
        $siteLogo = setting('header_logo', 'images/Raghuvir Logo.png');
        return asset($siteLogo);
    }

    /**
     * Calculate SEO Completeness Score (0 - 100).
     */
    public function getSeoScoreAttribute(): int
    {
        $score = 0;

        // 1. Meta Title present and optimal (30 pts)
        $titleLen = mb_strlen($this->meta_title ?? '');
        if ($titleLen >= 40 && $titleLen <= 65) {
            $score += 30;
        } elseif ($titleLen > 0) {
            $score += 15;
        }

        // 2. Meta Description present and optimal (30 pts)
        $descLen = mb_strlen($this->meta_description ?? '');
        if ($descLen >= 120 && $descLen <= 165) {
            $score += 30;
        } elseif ($descLen > 0) {
            $score += 15;
        }

        // 3. Keywords present (15 pts)
        if (!empty(trim($this->meta_keywords ?? ''))) {
            $score += 15;
        }

        // 4. Open Graph Image configured (15 pts)
        if (!empty($this->og_image)) {
            $score += 15;
        }

        // 5. Robots indexing configured (10 pts)
        if (!empty($this->robots) && str_contains($this->robots, 'index')) {
            $score += 10;
        }

        return min(100, $score);
    }

    /**
     * Generate JSON-LD Schema markup.
     */
    public function getGeneratedSchemaJsonAttribute(): string
    {
        if (!empty($this->schema_json)) {
            return $this->schema_json;
        }

        $siteName = setting('site_title', 'Raghuvir Atta');
        $siteUrl = url('/');
        $pageUrl = $this->canonical_url ?: url($this->page_route);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $this->schema_type ?: 'WebPage',
            'name' => $this->meta_title ?: $this->page_name,
            'description' => $this->meta_description ?: '',
            'url' => $pageUrl,
            'publisher' => [
                '@type' => 'Organization',
                'name' => $siteName,
                'url' => $siteUrl,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/Raghuvir Logo.png'),
                ],
            ],
        ];

        return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
