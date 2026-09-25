<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use App\Models\Product;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageSeoController extends Controller
{
    /**
     * Ensure the page_seos database table exists, auto-migrating if needed.
     */
    protected function ensureTableExists(): void
    {
        if (!Schema::hasTable('page_seos')) {
            try {
                Artisan::call('migrate', ['--force' => true]);
                if (class_exists(\Database\Seeders\PageSeoSeeder::class)) {
                    Artisan::call('db:seed', ['--class' => 'PageSeoSeeder', '--force' => true]);
                }
            } catch (\Throwable $e) {
                // Silently continue
            }
        }
    }

    /**
     * Display listing of all page SEO configurations.
     */
    public function index(Request $request): View
    {
        $this->ensureTableExists();

        $query = PageSeo::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('page_name', 'like', "%{$search}%")
                  ->orWhere('page_key', 'like', "%{$search}%")
                  ->orWhere('meta_title', 'like', "%{$search}%")
                  ->orWhere('meta_keywords', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'indexed') {
                $query->where('robots', 'like', '%index%')->where('robots', 'not like', '%noindex%');
            } elseif ($status === 'noindex') {
                $query->where('robots', 'like', '%noindex%');
            }
        }

        if ($request->input('tab') === 'analytics') {
            return redirect()->route('admin.webmaster.index');
        }

        $activeTab = $request->input('tab', 'pages');

        $allRecords = PageSeo::all();
        $totalPages = $allRecords->count();
        $indexedPages = $allRecords->filter(fn ($s) => str_contains($s->robots ?? '', 'index') && !str_contains($s->robots ?? '', 'noindex'))->count();
        $ogConfigured = $allRecords->filter(fn ($s) => !empty($s->og_image))->count();
        $goodScoreCount = $allRecords->filter(fn ($s) => $s->seo_score >= 80)->count();
        $needsWorkCount = $totalPages - $goodScoreCount;

        // Dynamic Products & Blogs
        $products = Product::orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();
        $blogs = Blog::orderBy('published_at', 'desc')->orderBy('id', 'desc')->get();
        $totalProducts = $products->count();
        $totalBlogs = $blogs->count();
        $totalAllItems = $totalPages + $totalProducts + $totalBlogs;

        // Filter products if search provided
        $filteredProducts = $products;
        if ($request->filled('search')) {
            $s = strtolower($request->input('search'));
            $filteredProducts = $products->filter(function ($p) use ($s) {
                return str_contains(strtolower($p->name), $s) ||
                       str_contains(strtolower($p->slug), $s) ||
                       str_contains(strtolower($p->meta_title ?? ''), $s) ||
                       str_contains(strtolower($p->meta_keywords ?? ''), $s);
            });
        }

        // Filter blogs if search provided
        $filteredBlogs = $blogs;
        if ($request->filled('search')) {
            $s = strtolower($request->input('search'));
            $filteredBlogs = $blogs->filter(function ($b) use ($s) {
                return str_contains(strtolower($b->title), $s) ||
                       str_contains(strtolower($b->slug), $s) ||
                       str_contains(strtolower($b->meta_title ?? ''), $s) ||
                       str_contains(strtolower($b->meta_keywords ?? ''), $s);
            });
        }

        // In-memory or query filtering for static pages
        if ($request->input('status') === 'good') {
            $seos = $allRecords->filter(fn ($s) => $s->seo_score >= 80);
        } elseif ($request->input('status') === 'needs_work') {
            $seos = $allRecords->filter(fn ($s) => $s->seo_score < 80);
        } else {
            $seos = $query->orderBy('id', 'asc')->get();
        }

        // Calculate average SEO completeness score across all items
        $pageAvg = $totalPages > 0 ? $allRecords->avg(fn ($s) => $s->seo_score) : 0;
        $prodAvg = $totalProducts > 0 ? $products->avg(fn ($p) => $p->seo_score) : 0;
        $blogAvg = $totalBlogs > 0 ? $blogs->avg(fn ($b) => $b->seo_score) : 0;
        
        $averageScore = round(($pageAvg * 0.4) + ($prodAvg * 0.3) + ($blogAvg * 0.3));

        // Robots.txt content
        $robotsPath = public_path('robots.txt');
        $robotsContent = file_exists($robotsPath) ? file_get_contents($robotsPath) : "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: " . url('/sitemap.xml');

        // Analytics & Webmaster Settings
        $analyticsSettings = [
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

        return view('admin.seo.index', compact(
            'seos',
            'products',
            'filteredProducts',
            'blogs',
            'filteredBlogs',
            'totalPages',
            'totalProducts',
            'totalBlogs',
            'totalAllItems',
            'indexedPages',
            'ogConfigured',
            'goodScoreCount',
            'needsWorkCount',
            'averageScore',
            'activeTab',
            'robotsContent',
            'analyticsSettings'
        ));
    }

    /**
     * AJAX Toggle robots index/noindex directive directly from table.
     */
    public function toggleRobots(PageSeo $seo)
    {
        $isNoindex = str_contains($seo->robots ?? '', 'noindex');
        $seo->robots = $isNoindex ? 'index, follow' : 'noindex, nofollow';
        $seo->save();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'robots'  => $seo->robots,
                'is_indexed' => !str_contains($seo->robots, 'noindex'),
                'message' => "Robots directive for {$seo->page_name} set to {$seo->robots}.",
            ]);
        }

        return redirect()->back()->with('success', "Robots directive for \"{$seo->page_name}\" set to {$seo->robots}.");
    }

    /**
     * Smart Auto-Generate suggested SEO metadata for a page.
     */
    public function autoGenerate(PageSeo $seo)
    {
        $siteName = setting('site_title', 'Raghuvir Atta');
        $brand = 'Raghuvir Atta';
        
        $suggestions = [
            'home' => [
                'title' => "100% Pure Chakki Fresh Wheat & Multigrain Flour | {$brand}",
                'description' => "Experience wholesome, stone-ground chakki fresh wheat and multigrain flours by {$brand}. Unadulterated purity, high dietary fiber, and naturally soft rotis.",
                'keywords' => "raghuvir atta, chakki fresh atta, sharbati wheat flour, multigrain flour, stoneground atta, fresh flour mill",
                'schema' => 'Organization',
            ],
            'about' => [
                'title' => "Heritage of Pure Stoneground Milling & Quality | About {$brand}",
                'description' => "Learn about {$brand}'s decades-long heritage of sourcing premium wheat, authentic slow stone milling, and delivering unadulterated kitchen nutrition.",
                'keywords' => "about raghuvir atta, flour mill heritage, stoneground flour journey, pure wheat sourcing",
                'schema' => 'AboutPage',
            ],
            'products' => [
                'title' => "Pure Flours & Whole Grains Product Range | {$brand}",
                'description' => "Explore {$brand}'s full range of flours: MP Sharbati Whole Wheat Atta, Multigrain Atta, Chana Besan, Sooji, and Maida packed with hygiene and nutrition.",
                'keywords' => "wheat flour packs, multigrain atta packets, pure besan, suji sooji, flour product catalog",
                'schema' => 'CollectionPage',
            ],
            'contact' => [
                'title' => "Contact Us | Bulk Supply & Dealership Inquiries | {$brand}",
                'description' => "Get in touch with {$brand} for wholesale grain supply, retail dealership partnerships, or customer assistance. Fast support across Gujarat.",
                'keywords' => "contact raghuvir, flour dealership, bulk atta orders, flour mill customer care",
                'schema' => 'ContactPage',
            ],
        ];

        $data = $suggestions[$seo->page_key] ?? [
            'title' => "{$seo->page_name} | {$brand} - 100% Pure Chakki Fresh Flours",
            'description' => "Discover {$seo->page_name} at {$brand}. Crafted with premium grains and traditional slow chakki stone milling for optimal nutrition and softness.",
            'keywords' => "raghuvir atta, " . strtolower($seo->page_name) . ", pure wheat flour, chakki fresh atta",
            'schema' => $seo->schema_type ?: 'WebPage',
        ];

        return response()->json([
            'success'     => true,
            'title'       => $data['title'],
            'description' => $data['description'],
            'keywords'    => $data['keywords'],
            'schema_type' => $data['schema'],
        ]);
    }

    /**
     * Show form for editing page SEO metadata.
     */
    public function edit(PageSeo $seo): View
    {
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update page SEO metadata.
     */
    public function update(Request $request, PageSeo $seo): RedirectResponse
    {
        $validated = $request->validate([
            'meta_title'       => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords'    => 'nullable|string|max:1000',
            'canonical_url'    => 'nullable|url|max:255',
            'og_title'         => 'nullable|string|max:255',
            'og_description'   => 'nullable|string|max:1000',
            'og_image_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'robots'           => 'required|string|max:50',
            'schema_type'      => 'required|string|max:50',
            'schema_json'      => 'nullable|string',
            'is_active'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('og_image_file')) {
            // Delete old custom file if in storage
            if (!empty($seo->og_image) && Storage::disk('public')->exists($seo->og_image)) {
                Storage::disk('public')->delete($seo->og_image);
            }
            $seo->og_image = $request->file('og_image_file')->store('seo', 'public');
        }

        $seo->meta_title       = $validated['meta_title'];
        $seo->meta_description = $validated['meta_description'] ?? null;
        $seo->meta_keywords    = $validated['meta_keywords'] ?? null;
        $seo->canonical_url    = $validated['canonical_url'] ?? null;
        $seo->og_title         = $validated['og_title'] ?? null;
        $seo->og_description   = $validated['og_description'] ?? null;
        $seo->robots           = $validated['robots'];
        $seo->schema_type      = $validated['schema_type'];
        $seo->schema_json      = !empty($validated['schema_json']) ? trim($validated['schema_json']) : null;
        $seo->is_active        = $request->boolean('is_active', true);

        $seo->save();

        return redirect()->route('admin.seo.index')
            ->with('success', "SEO metadata for \"{$seo->page_name}\" has been saved successfully!");
    }

    /**
     * Reset OG image for a page.
     */
    public function removeOgImage(PageSeo $seo): RedirectResponse
    {
        if (!empty($seo->og_image) && Storage::disk('public')->exists($seo->og_image)) {
            Storage::disk('public')->delete($seo->og_image);
        }

        $seo->og_image = null;
        $seo->save();

        return redirect()->back()
            ->with('success', "Social share image for \"{$seo->page_name}\" has been reset to the default website logo.");
    }

    /**
     * Update Webmaster Tools, Google Search Console, Google Analytics & Meta Pixel Integrations.
     */
    public function updateAnalytics(Request $request): RedirectResponse
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

        // 1. Google Search Console: Clean up if user pasted entire HTML meta tag
        $gsc = trim($validated['google_search_console_code'] ?? '');
        if (preg_match('/content=["\']([^"\']+)["\']/i', $gsc, $matches)) {
            $gsc = $matches[1];
        }
        \App\Models\Setting::set('google_search_console_code', $gsc, 'seo', 'text', 'Google Search Console Verification');

        // 2. Bing Webmaster Tools
        $bing = trim($validated['bing_webmaster_code'] ?? '');
        if (preg_match('/content=["\']([^"\']+)["\']/i', $bing, $matches)) {
            $bing = $matches[1];
        }
        \App\Models\Setting::set('bing_webmaster_code', $bing, 'seo', 'text', 'Bing Webmaster Tools Verification');

        // 3. Google Analytics 4 (GA4)
        $ga4Id = strtoupper(trim($validated['ga4_measurement_id'] ?? ''));
        \App\Models\Setting::set('ga4_measurement_id', $ga4Id, 'seo', 'text', 'Google Analytics 4 Measurement ID');
        \App\Models\Setting::set('ga4_enabled', $request->boolean('ga4_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Google Analytics');
        \App\Models\Setting::set('ga4_anonymize_ip', $request->boolean('ga4_anonymize_ip') ? '1' : '0', 'seo', 'boolean', 'GA4 Anonymize IP');

        // 4. Google Tag Manager (GTM)
        $gtmId = strtoupper(trim($validated['gtm_container_id'] ?? ''));
        \App\Models\Setting::set('gtm_container_id', $gtmId, 'seo', 'text', 'Google Tag Manager Container ID');
        \App\Models\Setting::set('gtm_enabled', $request->boolean('gtm_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Google Tag Manager');

        // 5. Meta / Facebook Pixel
        $pixelId = trim($validated['meta_pixel_id'] ?? '');
        \App\Models\Setting::set('meta_pixel_id', $pixelId, 'seo', 'text', 'Meta Pixel ID');
        \App\Models\Setting::set('meta_pixel_enabled', $request->boolean('meta_pixel_enabled') ? '1' : '0', 'seo', 'boolean', 'Enable Meta Pixel');

        // 6. Pinterest & Yandex
        $pinterest = trim($validated['pinterest_verify_code'] ?? '');
        if (preg_match('/content=["\']([^"\']+)["\']/i', $pinterest, $matches)) {
            $pinterest = $matches[1];
        }
        \App\Models\Setting::set('pinterest_verify_code', $pinterest, 'seo', 'text', 'Pinterest Domain Verification');

        $yandex = trim($validated['yandex_verify_code'] ?? '');
        if (preg_match('/content=["\']([^"\']+)["\']/i', $yandex, $matches)) {
            $yandex = $matches[1];
        }
        \App\Models\Setting::set('yandex_verify_code', $yandex, 'seo', 'text', 'Yandex Verification Token');

        // 7. Custom Scripts
        \App\Models\Setting::set('custom_header_scripts', $validated['custom_header_scripts'] ?? '', 'seo', 'textarea', 'Custom Head Scripts');
        \App\Models\Setting::set('custom_footer_scripts', $validated['custom_footer_scripts'] ?? '', 'seo', 'textarea', 'Custom Footer Scripts');

        \Illuminate\Support\Facades\Cache::forget(\App\Models\Setting::CACHE_KEY);

        return redirect()->route('admin.seo.index', ['tab' => 'analytics'])
            ->with('success', 'Google Analytics, Google Search Console, and Webmaster tracking tags have been updated successfully!');
    }

    /**
     * Update robots.txt file directly from the SEO Hub.
     */
    public function updateRobotsTxt(Request $request): RedirectResponse
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

        file_put_contents(public_path('robots.txt'), $content);

        return redirect()->route('admin.seo.index', ['tab' => 'analytics'])
            ->with('success', 'robots.txt file was saved successfully! Google and search crawlers will now follow these directives.');
    }
}

