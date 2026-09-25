<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Standard categories for dropdown selections.
     */
    protected array $defaultCategories = [
        'Wheat & Farming',
        'Health & Nutrition',
        'Chakki Milling',
        'Recipes & Tips',
        'Organic Living',
        'Quality & Standards',
    ];

    /**
     * Display a listing of blog articles with filters and metrics.
     */
    public function index(Request $request)
    {
        $query = Blog::query();

        // Search Filter
        if ($request->filled('search')) {
            $query->search($request->input('search'));
        }

        // Category Filter
        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where('category', $request->input('category'));
        }

        // Status Filter
        if ($request->filled('status')) {
            if ($request->input('status') === 'published') {
                $query->where('is_published', true);
            } elseif ($request->input('status') === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Sorting (default to latest)
        $blogs = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        // Metrics for Top KPI Cards
        $totalCount = Blog::count();
        $publishedCount = Blog::where('is_published', true)->count();
        $draftCount = Blog::where('is_published', false)->count();
        $totalViews = Blog::sum('views_count');

        // Distinct existing categories for filter dropdown
        $existingCategories = Blog::select('category')->distinct()->pluck('category')->filter()->values();
        $categories = $existingCategories->isNotEmpty() ? $existingCategories : collect($this->defaultCategories);

        return view('admin.blogs.index', compact(
            'blogs',
            'totalCount',
            'publishedCount',
            'draftCount',
            'totalViews',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $categories = $this->defaultCategories;
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt' => 'nullable|string|max:600',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'tags' => 'nullable|string|max:255',
            'author_name' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_position' => 'nullable|string|max:50',
            'image_alt' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Generate Slug if not manually provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Blog::generateUniqueSlug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        // Handle Image Upload with WebP Conversion
        if ($request->hasFile('image')) {
            $validated['image'] = $this->processAndStoreImage($request->file('image'));
        }

        // Handle Optional Custom Hero / Breadcrumb Banner Image
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('blogs/banners', 'public');
        }

        // Set default Image Alt Text for SEO if omitted
        if (empty($validated['image_alt']) && !empty($validated['image'])) {
            $validated['image_alt'] = $validated['title'];
        }

        // Author Name Fallback
        if (empty($validated['author_name'])) {
            $validated['author_name'] = auth()->user()->name ?? 'Raghuvir Team';
        }

        // Publish State & Timestamp
        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if (!\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'banner_position')) {
            unset($validated['banner_position']);
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Article created and published successfully!');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Blog $blog)
    {
        $categories = $this->defaultCategories;
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string|max:600',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'tags' => 'nullable|string|max:255',
            'author_name' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_position' => 'nullable|string|max:50',
            'image_alt' => 'nullable|string|max:255',
            'remove_image' => 'nullable|boolean',
            'remove_banner_image' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        // Handle Image Deletion
        if ($request->boolean('remove_image')) {
            if ($blog->image && !Str::startsWith($blog->image, 'images/')) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = null;
            $validated['image_alt'] = null;
        }

        // Handle New Image Upload with WebP Conversion
        if ($request->hasFile('image')) {
            if ($blog->image && !Str::startsWith($blog->image, 'images/')) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $this->processAndStoreImage($request->file('image'));
        }

        // Handle Breadcrumb Banner Image Deletion
        if ($request->boolean('remove_banner_image')) {
            if ($blog->banner_image && Storage::disk('public')->exists($blog->banner_image)) {
                Storage::disk('public')->delete($blog->banner_image);
            }
            $validated['banner_image'] = null;
            $validated['banner_position'] = null;
        }

        // Handle New Breadcrumb Banner Image Upload
        if ($request->hasFile('banner_image')) {
            if ($blog->banner_image && Storage::disk('public')->exists($blog->banner_image)) {
                Storage::disk('public')->delete($blog->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('blogs/banners', 'public');
        }

        // Set default Image Alt Text for SEO if omitted and image exists
        if (empty($validated['image_alt']) && ($blog->image || !empty($validated['image']))) {
            $validated['image_alt'] = $validated['title'];
        }

        // Publish State & Timestamp
        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = $blog->published_at ?? now();
        }

        // Author Name Fallback
        if (empty($validated['author_name'])) {
            $validated['author_name'] = $blog->author_name ?: (auth()->user()->name ?? 'Raghuvir Team');
        }

        unset($validated['remove_image'], $validated['remove_banner_image']);
        if (!\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'banner_position')) {
            unset($validated['banner_position']);
        }
        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Article updated successfully!');
    }

    /**
     * Process uploaded image and convert to WebP for maximum web performance & SEO.
     */
    protected function processAndStoreImage($file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        // If SVG, just store directly
        if ($extension === 'svg') {
            return $file->store('blogs', 'public');
        }

        // Check if GD webp support is available
        if (function_exists('imagewebp') && function_exists('imagecreatefromstring')) {
            $data = file_get_contents($file->getRealPath());
            $imageResource = @imagecreatefromstring($data);

            if ($imageResource !== false) {
                $filename = 'blogs/' . Str::random(40) . '.webp';
                $fullPath = storage_path('app/public/' . $filename);
                $dir = dirname($fullPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                // Preserve alpha transparency for PNGs/WebP
                imagepalettetotruecolor($imageResource);
                imagealphablending($imageResource, true);
                imagesavealpha($imageResource, true);

                // Save as WebP with 85% quality
                if (imagewebp($imageResource, $fullPath, 85)) {
                    imagedestroy($imageResource);
                    return $filename;
                }
                imagedestroy($imageResource);
            }
        }

        // Fallback: standard Laravel upload
        return $file->store('blogs', 'public');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image && !Str::startsWith($blog->image, 'images/')) {
            Storage::disk('public')->delete($blog->image);
        }

        if ($blog->banner_image && Storage::disk('public')->exists($blog->banner_image)) {
            Storage::disk('public')->delete($blog->banner_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Article removed successfully!');
    }

    /**
     * Quick toggle for publish / draft status.
     */
    public function toggleStatus(Blog $blog)
    {
        $blog->is_published = !$blog->is_published;

        if ($blog->is_published && empty($blog->published_at)) {
            $blog->published_at = now();
        }

        $blog->save();

        $statusText = $blog->is_published ? 'published' : 'moved to drafts';
        return redirect()->back()->with('success', "Article is now {$statusText}.");
    }
}
