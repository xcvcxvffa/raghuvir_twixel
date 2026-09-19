<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    /**
     * Cache key for all site settings.
     */
    public const CACHE_KEY = 'site_settings_all';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'label',
        'description',
    ];

    /**
     * Get a setting value by key, with optional default fallback and persistent caching.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $all = static::getAllSettings();

        if (array_key_exists($key, $all)) {
            return $all[$key] !== null && $all[$key] !== '' ? $all[$key] : $default;
        }

        return $default;
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @param string $group
     * @param string $type
     * @param string|null $label
     * @return static
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text', ?string $label = null): static
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : $value,
                'group' => $group,
                'type' => $type,
                'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
            ]
        );

        static::clearCache();

        return $setting;
    }

    /**
     * Retrieve all settings as a key-value associative array with cache.
     *
     * @return array<string, mixed>
     */
    public static function getAllSettings(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            try {
                return static::query()->pluck('value', 'key')->toArray();
            } catch (\Throwable $e) {
                return [];
            }
        });
    }

    /**
     * Clear settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
