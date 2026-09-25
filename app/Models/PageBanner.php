<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PageBanner extends Model
{
    /**
     * Cache key for all page banners.
     */
    public const CACHE_KEY = 'site_page_banners_all';

    /**
     * Default fallback breadcrumb hero banner image.
     */
    public const DEFAULT_IMAGE = 'images/brudcamp_about.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'page_key',
        'page_name',
        'page_route',
        'banner_image',
        'banner_position',
        'title',
        'subtitle',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Bootstrap model events.
     */
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
     * Determine if a custom banner image is uploaded and exists.
     *
     * @return bool
     */
    public function hasCustomImage(): bool
    {
        if (empty($this->banner_image)) {
            return false;
        }

        return Storage::disk('public')->exists($this->banner_image);
    }

    /**
     * Get the full URL to the banner image or the default image.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        if ($this->hasCustomImage()) {
            return asset('storage/' . $this->banner_image);
        }

        return asset(self::DEFAULT_IMAGE);
    }

    /**
     * Retrieve the banner image URL for a given page key with caching.
     *
     * @param string $pageKey
     * @param string|null $fallback
     * @return string
     */
    public static function getImage(string $pageKey, ?string $fallback = null): string
    {
        $all = static::getAllCached();

        if (isset($all[$pageKey]) && !empty($all[$pageKey]['banner_image'])) {
            return asset('storage/' . $all[$pageKey]['banner_image']);
        }

        return $fallback ?? asset(self::DEFAULT_IMAGE);
    }

    /**
     * Retrieve the banner background-position for a given page key with caching.
     *
     * @param string $pageKey
     * @param string $default
     * @return string
     */
    public static function getPosition(string $pageKey, string $default = 'center center'): string
    {
        $all = static::getAllCached();

        if (isset($all[$pageKey]) && !empty($all[$pageKey]['banner_position'])) {
            return $all[$pageKey]['banner_position'];
        }

        return $default;
    }

    /**
     * Retrieve all page banners as a cached array keyed by page_key.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function getAllCached(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            try {
                return static::query()
                    ->where('is_active', true)
                    ->get()
                    ->keyBy('page_key')
                    ->toArray();
            } catch (\Throwable $e) {
                return [];
            }
        });
    }

    /**
     * Clear page banners cache.
     *
     * @return void
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
