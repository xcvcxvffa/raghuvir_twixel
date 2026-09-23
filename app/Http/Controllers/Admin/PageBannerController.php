<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageBannerController extends Controller
{
    /**
     * Ensure the page_banners database table exists, auto-migrating if needed.
     */
    protected function ensureTableExists(): void
    {
        if (!Schema::hasTable('page_banners')) {
            try {
                Artisan::call('migrate', ['--force' => true]);
            } catch (\Throwable $e) {
                // Silently continue
            }
        }
    }

    /**
     * Recommended banner image specifications.
     */
    public const RECOMMENDED_SPECS = [
        'dimensions' => '1920 × 500 px',
        'min_width'  => 1200,
        'min_height' => 350,
        'aspect_ratio' => '16:4 to 16:5 (Panoramic Wide Hero)',
        'formats'    => 'WEBP, JPG, PNG',
        'max_size'   => '5 MB (Recommended: < 600 KB for fast load)',
        'tip'        => 'Hero sections have a subtle dark/orange overlay (30% opacity). Use high-contrast landscape photos with key subjects centered vertically.',
    ];

    /**
     * Display listing of all page breadcrumb banners.
     */
    public function index(Request $request): View
    {
        $this->ensureTableExists();

        $query = PageBanner::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('page_name', 'like', "%{$search}%")
                  ->orWhere('page_key', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->input('status') === 'custom') {
                $query->whereNotNull('banner_image')->where('banner_image', '!=', '');
            } elseif ($request->input('status') === 'default') {
                $query->where(function ($q) {
                    $q->whereNull('banner_image')->orWhere('banner_image', '');
                });
            }
        }

        $banners = $query->orderBy('id', 'asc')->get();

        $totalPages = PageBanner::count();
        $customCount = PageBanner::whereNotNull('banner_image')->where('banner_image', '!=', '')->count();
        $defaultCount = $totalPages - $customCount;

        $specs = self::RECOMMENDED_SPECS;

        return view('admin.banners.index', compact(
            'banners',
            'totalPages',
            'customCount',
            'defaultCount',
            'specs'
        ));
    }

    /**
     * Show form for editing a page banner.
     */
    public function edit(PageBanner $banner): View
    {
        $specs = self::RECOMMENDED_SPECS;
        return view('admin.banners.edit', compact('banner', 'specs'));
    }

    /**
     * Update page banner details and image.
     */
    public function update(Request $request, PageBanner $banner): RedirectResponse
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Remove previous custom image from storage
            if (!empty($banner->banner_image) && Storage::disk('public')->exists($banner->banner_image)) {
                Storage::disk('public')->delete($banner->banner_image);
            }

            $path = $request->file('image')->store('banners', 'public');
            $banner->banner_image = $path;
        }

        $banner->title = $validated['title'] ?? $banner->title;
        $banner->subtitle = $validated['subtitle'] ?? null;
        $banner->is_active = $request->boolean('is_active', true);
        $banner->save();

        return redirect()->route('admin.banners.index')
            ->with('success', "Banner for \"{$banner->page_name}\" has been updated successfully!");
    }

    /**
     * Quick upload banner image directly from index table.
     */
    public function quickUpload(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'banner_id' => 'required|exists:page_banners,id',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $banner = PageBanner::findOrFail($validated['banner_id']);

        if (!empty($banner->banner_image) && Storage::disk('public')->exists($banner->banner_image)) {
            Storage::disk('public')->delete($banner->banner_image);
        }

        $path = $request->file('banner_image')->store('banners', 'public');
        $banner->banner_image = $path;
        $banner->save();

        return redirect()->route('admin.banners.index')
            ->with('success', "Banner image for \"{$banner->page_name}\" uploaded successfully!");
    }

    /**
     * Reset banner image back to the system default theme image.
     */
    public function reset(PageBanner $banner): RedirectResponse
    {
        if (!empty($banner->banner_image) && Storage::disk('public')->exists($banner->banner_image)) {
            Storage::disk('public')->delete($banner->banner_image);
        }

        $banner->banner_image = null;
        $banner->save();

        return redirect()->route('admin.banners.index')
            ->with('success', "Banner for \"{$banner->page_name}\" has been reset to the default theme image.");
    }
}
