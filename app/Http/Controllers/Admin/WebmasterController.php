<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\PageSeo;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class WebmasterController extends Controller
{
    /**
     * Display the standalone Webmaster & Analytics Tools Management Hub.
     */
    public function index(Request $request): View
    {
        // Robots.txt content
        $robotsPath = public_path('robots.txt');
        $robotsContent = file_exists($robotsPath) 
            ? file_get_contents($robotsPath) 
            : "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: " . url('/sitemap.xml');

        // Analytics & Webmaster Settings
        $settings = [
            'google_search_console_code' => (string) setting('google_search_console_code', ''),
            'ga4_measurement_id'         => (string) setting('ga4_measurement_id', ''),
            'ga4_enabled'                => (bool) setting('ga4_enabled', true),
            'ga4_anonymize_ip'           => (bool) setting('ga4_anonymize_ip', false),
            'gtm_container_id'           => (string) setting('gtm_container_id', ''),
            'gtm_enabled'                => (bool) setting('gtm_enabled', true),
            'bing_webmaster_code'        => (string) setting('bing_webmaster_code', ''),
            'meta_pixel_id'              => (string) setting('meta_pixel_id', ''),
            'meta_pixel_enabled'         => (bool) setting('meta_pixel_enabled', true),
            'pinterest_verify_code'      => (string) setting('pinterest_verify_code', ''),
            'yandex_verify_code'         => (string) setting('yandex_verify_code', ''),
            'custom_header_scripts'      => (string) setting('custom_header_scripts', ''),
            'custom_footer_scripts'      => (string) setting('custom_footer_scripts', ''),
        ];

        // Sitemap statistics
        $totalPages = PageSeo::count();
        $totalProducts = Product::where('is_active', true)->count();
        $totalBlogs = Blog::where('is_published', true)->count();
        $totalSitemapUrls = $totalPages + $totalProducts + $totalBlogs;

        $activeSection = $request->input('section', 'all');

        return view('admin.webmaster.index', compact(
            'settings',
            'robotsContent',
            'totalPages',
            'totalProducts',
            'totalBlogs',
            'totalSitemapUrls',
            'activeSection'
        ));
    }

    /**
     * Update Webmaster Tools, Google Search Console, Google Analytics & Meta Pixel Integrations.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'google_search_console_code' => 'nullable|string|max:500',
            'ga4_measurement_id'         => 'nullable|string|max:60',
            'gtm_container_id'           => 'nullable|string|max:60',
            'bing_webmaster_code'        => 'nullable|string|max:500',
            'meta_pixel_id'              => 'nullable|string|max:60',
            'pinterest_verify_code'      => 'nullable|string|max:500',
            'yandex_verify_code'         => 'nullable|string|max:500',
            'custom_header_scripts'      => 'nullable|string',
            'custom_footer_scripts'      => 'nullable|string',
        ]);

        try {
            // 1. Google Search Console: Clean up if user pasted entire HTML meta tag
            $gsc = trim($validated['google_search_console_code'] ?? '');
            if (preg_match('/content=["\']([^"\']+)["\']/i', $gsc, $matches)) {
                $gsc = $matches[1];
            }
            Setting::set('google_search_console_code', $gsc, 'seo', 'text', 'Google Search Console Verification');

            // 2. Bing Webmaster Tools
            $bing = trim($validated['bing_webmaster_code'] ?? '');
            if (preg_match('/content=["\']([^"\']+)["\']/i', $bing, $matches)) {
                $bing = $matches[1];
            }
            Setting::set('bing_webmaster_code', $bing, 'seo', 'text', 'Bing Webmaster Tools Verification');

            // 3. Google Analytics 4 (GA4)
            $ga4Id = strtoupper(trim($validated['ga4_measurement_id'] ?? ''));
            Setting::set('ga4_measurement_id', $ga4Id, 'seo', 'text', 'Google Analytics 4 Measurement ID');
            Setting::set('ga4_enabled', $request->boolean('ga4_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Google Analytics');
            Setting::set('ga4_anonymize_ip', $request->boolean('ga4_anonymize_ip') ? '1' : '0', 'seo', 'boolean', 'GA4 Anonymize IP');

            // 4. Google Tag Manager (GTM)
            $gtmId = strtoupper(trim($validated['gtm_container_id'] ?? ''));
            Setting::set('gtm_container_id', $gtmId, 'seo', 'text', 'Google Tag Manager Container ID');
            Setting::set('gtm_enabled', $request->boolean('gtm_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Google Tag Manager');

            // 5. Meta / Facebook Pixel
            $pixelId = trim($validated['meta_pixel_id'] ?? '');
            Setting::set('meta_pixel_id', $pixelId, 'seo', 'text', 'Meta Pixel ID');
            Setting::set('meta_pixel_enabled', $request->boolean('meta_pixel_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Meta Pixel');

            // 6. Pinterest & Yandex
            $pinterest = trim($validated['pinterest_verify_code'] ?? '');
            if (preg_match('/content=["\']([^"\']+)["\']/i', $pinterest, $matches)) {
                $pinterest = $matches[1];
            }
            Setting::set('pinterest_verify_code', $pinterest, 'seo', 'text', 'Pinterest Domain Verification');

            $yandex = trim($validated['yandex_verify_code'] ?? '');
            if (preg_match('/content=["\']([^"\']+)["\']/i', $yandex, $matches)) {
                $yandex = $matches[1];
            }
            Setting::set('yandex_verify_code', $yandex, 'seo', 'text', 'Yandex Verification Token');

            // 7. Custom Scripts
            Setting::set('custom_header_scripts', $validated['custom_header_scripts'] ?? '', 'seo', 'textarea', 'Custom Head Scripts');
            Setting::set('custom_footer_scripts', $validated['custom_footer_scripts'] ?? '', 'seo', 'textarea', 'Custom Footer Scripts');

            Cache::forget(Setting::CACHE_KEY);

            return redirect()->route('admin.webmaster.index')
                ->with('success', 'Webmaster Tools & Google Analytics configurations updated successfully!');
        } catch (\Throwable $e) {
            return redirect()->route('admin.webmaster.index')
                ->with('error', 'Failed to save settings: ' . $e->getMessage());
        }
    }

    /**
     * Update robots.txt file.
     */
    public function updateRobots(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'robots_content' => 'required|string|max:20000',
        ]);

        $content = $validated['robots_content'];

        // Ensure Sitemap reference is present if not already in content
        $sitemapLine = 'Sitemap: ' . url('/sitemap.xml');
        if (!str_contains($content, 'sitemap.xml')) {
            $content = rtrim($content) . "\n\n" . $sitemapLine . "\n";
        }

        try {
            $robotsPath = public_path('robots.txt');
            file_put_contents($robotsPath, $content);

            return redirect()->route('admin.webmaster.index')
                ->with('success', 'robots.txt file was updated successfully! Search bots will now crawl with these instructions.');
        } catch (\Throwable $e) {
            return redirect()->route('admin.webmaster.index')
                ->with('error', 'Unable to write to robots.txt: ' . $e->getMessage());
        }
    }
}
