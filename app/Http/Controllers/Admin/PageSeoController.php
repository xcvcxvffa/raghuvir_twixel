<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use App\Models\Product;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageSeoController extends Controller
{
    /**
     * Display listing of all page SEO configurations.
     */
    public function index(Request $request): View
    {
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
            'activeTab'
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
}
