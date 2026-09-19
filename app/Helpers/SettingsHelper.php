<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get or set a site setting.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    function setting(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return Setting::getAllSettings();
        }

        return Setting::get($key, $default);
    }
}

if (!function_exists('setting_asset')) {
    /**
     * Get the asset URL for an uploaded setting image, or return fallback asset.
     *
     * @param string $key
     * @param string $fallbackAsset
     * @return string
     */
    function setting_asset(string $key, string $fallbackAsset): string
    {
        $val = setting($key);
        if ($val) {
            // Check if it's stored in storage/
            if (str_starts_with($val, 'storage/') || str_starts_with($val, 'images/')) {
                return asset($val);
            }
            return asset('storage/' . ltrim($val, '/'));
        }

        return asset($fallbackAsset);
    }
}

if (!function_exists('google_map_embed_url')) {
    /**
     * Convert any Google Maps link, shortlink (maps.app.goo.gl), iframe snippet,
     * place name, coordinates, or address into a 100% functional Google Maps iframe embed URL.
     *
     * @param string|null $input
     * @param string|null $fallback
     * @return string
     */
    function google_map_embed_url(?string $input = null, ?string $fallback = null): string
    {
        $defaultFallback = $fallback ?: 'https://maps.google.com/maps?q=Plot%20No%20182,%20Vibrant%20Prime%20Industrial%20Park,%20kadadara,%20GIDC%20Area,%20Dehgam,%20Gandhinagar,%20Gujarat,%20382305&t=&z=14&ie=UTF8&iwloc=&output=embed';

        $input = trim((string)$input);

        if (empty($input)) {
            return $defaultFallback;
        }

        // 1. If user pasted a full <iframe ... src="..." ...> tag, extract src
        if (preg_match('/<iframe[^>]+src=["\']([^"\']+)["\']/i', $input, $matches)) {
            $input = trim(html_entity_decode($matches[1]));
        }

        // 2. If it is already a direct Google Maps embed URL
        if (
            str_contains($input, '/maps/embed') ||
            (str_contains($input, 'maps.google.com') && str_contains($input, 'output=embed'))
        ) {
            return $input;
        }

        // 3. If it's a short link (maps.app.goo.gl or goo.gl/maps), resolve redirects
        if (str_contains($input, 'maps.app.goo.gl') || str_contains($input, 'goo.gl/maps')) {
            try {
                $response = \Illuminate\Support\Facades\Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
                ])->timeout(5)->get($input);

                $resolved = (string) $response->effectiveUri();
                if (!empty($resolved) && $resolved !== $input) {
                    $input = $resolved;
                }
            } catch (\Throwable $e) {
                // If network timeout or offline, continue with regex parsing
            }
        }

        // 4. Extract latitude & longitude if present in URL
        $lat = null;
        $lng = null;
        $placeName = null;

        // Check !3d23.0965117!4d72.7689042 format
        if (preg_match('/!3d([0-9.-]+)!4d([0-9.-]+)/', $input, $coords)) {
            $lat = $coords[1];
            $lng = $coords[2];
        } elseif (preg_match('/@([0-9.-]+),([0-9.-]+)/', $input, $coords)) { // Check @23.0965117,72.7689042 format
            $lat = $coords[1];
            $lng = $coords[2];
        }

        // Check /place/NAME/ format
        if (preg_match('/\/place\/([^@\/?]+)/', $input, $placeMatches)) {
            $placeName = urldecode(str_replace('+', ' ', $placeMatches[1]));
        }

        // 5. If we have coordinates, build query with place name + coordinates
        if ($lat && $lng) {
            $query = $placeName ? ($placeName . ' ' . $lat . ',' . $lng) : ($lat . ',' . $lng);
            return 'https://maps.google.com/maps?q=' . urlencode($query) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
        }

        // 6. If we have place name
        if ($placeName) {
            return 'https://maps.google.com/maps?q=' . urlencode($placeName) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
        }

        // 7. Check /search/Query
        if (preg_match('/\/search\/([^@\/?]+)/', $input, $searchMatches)) {
            $searchQuery = urldecode(str_replace('+', ' ', $searchMatches[1]));
            return 'https://maps.google.com/maps?q=' . urlencode($searchQuery) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
        }

        // 8. If input contains query param q=
        $parsed = parse_url($input);
        if (isset($parsed['query'])) {
            parse_str($parsed['query'], $params);
            if (!empty($params['q'])) {
                return 'https://maps.google.com/maps?q=' . urlencode($params['q']) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
            }
        }

        // 9. If input is a raw address or plain search string (not a URL)
        if (!str_starts_with($input, 'http://') && !str_starts_with($input, 'https://')) {
            return 'https://maps.google.com/maps?q=' . urlencode($input) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
        }

        // Fallback: if it's a URL but unrecognized structure, append &output=embed
        if (str_contains($input, 'google.com/maps')) {
            return $input . (str_contains($input, '?') ? '&output=embed' : '?output=embed');
        }

        return $defaultFallback;
    }
}

