<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Standard categories for dropdown selections.
     */
    protected array $defaultCategories = [
        'Wheat Flour',
        'Coarse Wheat Flour',
        'Wheat Bran',
        'Specialty Flour',
        'Organic Grain',
    ];

    /**
     * Display a listing of products with metrics and search filters.
     */
    public function index(Request $request)
    {
        $query = Product::query();

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
            if ($request->input('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->input('status') === 'draft') {
                $query->where('is_active', false);
            } elseif ($request->input('status') === 'featured') {
                $query->where('is_featured', true);
            }
        }

        $products = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Metrics for Top KPI Cards
        $totalCount = Product::count();
        $activeCount = Product::where('is_active', true)->count();
        $featuredCount = Product::where('is_featured', true)->count();
        $categoriesCount = Product::distinct('category')->count('category');

        // Dynamic Categories List
        $existingCategories = Product::select('category')->distinct()->pluck('category')->filter()->values();
        $categories = $existingCategories->isNotEmpty() ? $existingCategories : collect($this->defaultCategories);

        return view('admin.products.index', compact(
            'products',
            'totalCount',
            'activeCount',
            'featuredCount',
            'categoriesCount',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = $this->defaultCategories;
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'quote' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_position' => 'nullable|string|max:50',
            'image_alt' => 'nullable|string|max:255',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'main_ingredient' => 'nullable|string|max:255',
            'processing' => 'nullable|string|max:255',
            'suitable_for' => 'nullable|string|max:255',
            'packaging' => 'nullable|string|max:255',
            'shelf_life' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'specifications' => 'nullable|array',
            'specifications.*' => 'nullable|array',
            'energy_kcal' => 'nullable|string|max:50',
            'protein_g' => 'nullable|string|max:50',
            'carbs_g' => 'nullable|string|max:50',
            'fat_g' => 'nullable|string|max:50',
            'nutrition_details' => 'nullable|array',
            'nutrition_details.*' => 'nullable|string|max:100',
            'ideal_for' => 'nullable',
            'ideal_for_items' => 'nullable|array',
            'ideal_for_items.*.title' => 'nullable|string|max:120',
            'ideal_for_items.*.preset' => 'nullable|string|max:255',
            'ideal_for_items.*.existing_image' => 'nullable|string|max:255',
            'ideal_for_items.*.image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Process Dynamic Specifications Table
        $validated['specifications'] = $this->processSpecifications($request->input('specifications'));
        if (!empty($validated['specifications'])) {
            foreach ($validated['specifications'] as $item) {
                $k = strtolower($item['key']);
                if (str_contains($k, 'ingredient') && empty($validated['main_ingredient'])) $validated['main_ingredient'] = $item['value'];
                elseif (str_contains($k, 'processing') && empty($validated['processing'])) $validated['processing'] = $item['value'];
                elseif (str_contains($k, 'suitable') && empty($validated['suitable_for'])) $validated['suitable_for'] = $item['value'];
                elseif (str_contains($k, 'packaging') && empty($validated['packaging'])) $validated['packaging'] = $item['value'];
                elseif (str_contains($k, 'shelf') && empty($validated['shelf_life'])) $validated['shelf_life'] = $item['value'];
                elseif (str_contains($k, 'storage') && empty($validated['storage'])) $validated['storage'] = $item['value'];
            }
        }

        // Generate Slug if not manually provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Product::generateUniqueSlug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        // Process Sizes string to clean array
        if (!empty($validated['sizes'])) {
            $validated['sizes'] = array_values(array_filter(array_map('trim', explode(',', $validated['sizes']))));
        } else {
            $validated['sizes'] = ['5kg', '30kg'];
        }

        // Process Ideal For Dishes Showcase Gallery
        $validated['ideal_for'] = $this->processIdealForItems($request);

        // Primary Image upload with WebP conversion
        if ($request->hasFile('image')) {
            $validated['image'] = $this->processAndStoreImage($request->file('image'));
        }

        // Custom Breadcrumb Hero Banner upload
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        // Multiple Gallery Images upload
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $this->processAndStoreImage($file);
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        // Alt Text fallback
        if (empty($validated['image_alt']) && !empty($validated['image'])) {
            $validated['image_alt'] = "Raghuvir " . $validated['name'];
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_featured'] = $request->boolean('is_featured', false);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created and published successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = $this->defaultCategories;
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'quote' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'banner_position' => 'nullable|string|max:50',
            'image_alt' => 'nullable|string|max:255',
            'remove_image' => 'nullable|boolean',
            'remove_banner_image' => 'nullable|boolean',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'main_ingredient' => 'nullable|string|max:255',
            'processing' => 'nullable|string|max:255',
            'suitable_for' => 'nullable|string|max:255',
            'packaging' => 'nullable|string|max:255',
            'shelf_life' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'specifications' => 'nullable|array',
            'specifications.*' => 'nullable|array',
            'energy_kcal' => 'nullable|string|max:50',
            'protein_g' => 'nullable|string|max:50',
            'carbs_g' => 'nullable|string|max:50',
            'fat_g' => 'nullable|string|max:50',
            'nutrition_details' => 'nullable|array',
            'ideal_for' => 'nullable',
            'ideal_for_items' => 'nullable|array',
            'ideal_for_items.*.title' => 'nullable|string|max:120',
            'ideal_for_items.*.preset' => 'nullable|string|max:255',
            'ideal_for_items.*.existing_image' => 'nullable|string|max:255',
            'ideal_for_items.*.image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Process Dynamic Specifications Table
        $validated['specifications'] = $this->processSpecifications($request->input('specifications'));
        if (!empty($validated['specifications'])) {
            foreach ($validated['specifications'] as $item) {
                $k = strtolower($item['key']);
                if (str_contains($k, 'ingredient') && empty($validated['main_ingredient'])) $validated['main_ingredient'] = $item['value'];
                elseif (str_contains($k, 'processing') && empty($validated['processing'])) $validated['processing'] = $item['value'];
                elseif (str_contains($k, 'suitable') && empty($validated['suitable_for'])) $validated['suitable_for'] = $item['value'];
                elseif (str_contains($k, 'packaging') && empty($validated['packaging'])) $validated['packaging'] = $item['value'];
                elseif (str_contains($k, 'shelf') && empty($validated['shelf_life'])) $validated['shelf_life'] = $item['value'];
                elseif (str_contains($k, 'storage') && empty($validated['storage'])) $validated['storage'] = $item['value'];
            }
        }

        $validated['slug'] = Str::slug($validated['slug']);

        // Handle Image Deletion
        if ($request->boolean('remove_image')) {
            if ($product->image && !Str::startsWith($product->image, 'images/')) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = null;
            $validated['image_alt'] = null;
        }

        // Handle Primary Image Upload with WebP Conversion
        if ($request->hasFile('image')) {
            if ($product->image && !Str::startsWith($product->image, 'images/')) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $this->processAndStoreImage($request->file('image'));
        }

        // Handle Breadcrumb Banner Image Deletion
        if ($request->boolean('remove_banner_image')) {
            if ($product->banner_image && Storage::disk('public')->exists($product->banner_image)) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $validated['banner_image'] = null;
            $validated['banner_position'] = null;
        }

        // Handle New Breadcrumb Banner Image Upload
        if ($request->hasFile('banner_image')) {
            if ($product->banner_image && Storage::disk('public')->exists($product->banner_image)) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        // Handle New Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = is_array($product->gallery_images) ? $product->gallery_images : [];
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $this->processAndStoreImage($file);
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        // Process Sizes string to clean array
        if (isset($validated['sizes'])) {
            $validated['sizes'] = array_values(array_filter(array_map('trim', explode(',', $validated['sizes']))));
        }

        // Process Ideal For Dishes Showcase Gallery
        if ($request->has('ideal_for_items') || $request->has('ideal_for')) {
            $validated['ideal_for'] = $this->processIdealForItems($request);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        unset($validated['remove_image']);
        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && !Str::startsWith($product->image, 'images/')) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->banner_image && Storage::disk('public')->exists($product->banner_image)) {
            Storage::disk('public')->delete($product->banner_image);
        }

        if (is_array($product->gallery_images)) {
            foreach ($product->gallery_images as $gImg) {
                if ($gImg && !Str::startsWith($gImg, 'images/')) {
                    Storage::disk('public')->delete($gImg);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product removed successfully!');
    }

    /**
     * Quick toggle for publish / draft status.
     */
    public function toggleStatus(Product $product)
    {
        $product->is_active = !$product->is_active;
        $product->save();

        $statusText = $product->is_active ? 'live on the website' : 'set to draft';

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_active' => $product->is_active,
                'message' => "Product is now {$statusText}."
            ]);
        }

        return redirect()->back()->with('success', "Product is now {$statusText}.");
    }

    /**
     * Quick toggle for featured mega-menu status.
     */
    public function toggleFeatured(Product $product)
    {
        $product->is_featured = !$product->is_featured;
        $product->save();

        $featuredText = $product->is_featured ? 'featured in the top navigation mega menu' : 'unfeatured from mega menu';

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_featured' => $product->is_featured,
                'message' => "Product is now {$featuredText}."
            ]);
        }

        return redirect()->back()->with('success', "Product is now {$featuredText}.");
    }

    /**
     * Process uploaded image and convert to WebP for maximum web performance & SEO.
     */
    protected function processAndStoreImage($file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === 'svg') {
            return $file->store('products', 'public');
        }

        if (function_exists('imagewebp') && function_exists('imagecreatefromstring')) {
            $data = file_get_contents($file->getRealPath());
            $imageResource = @imagecreatefromstring($data);

            if ($imageResource !== false) {
                $filename = 'products/' . Str::random(40) . '.webp';
                $fullPath = storage_path('app/public/' . $filename);
                $dir = dirname($fullPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                imagepalettetotruecolor($imageResource);
                imagealphablending($imageResource, true);
                imagesavealpha($imageResource, true);

                if (imagewebp($imageResource, $fullPath, 90)) {
                    imagedestroy($imageResource);
                    return $filename;
                }
                imagedestroy($imageResource);
            }
        }

        return $file->store('products', 'public');
    }

    /**
     * Clean and process dynamic specifications table rows.
     */
    protected function processSpecifications(?array $rawSpecs): ?array
    {
        if (empty($rawSpecs) || !is_array($rawSpecs)) {
            return null;
        }

        $clean = [];
        foreach ($rawSpecs as $row) {
            if (!is_array($row)) continue;
            $key = trim($row['key'] ?? '');
            $val = trim($row['value'] ?? '');
            if ($key !== '' || $val !== '') {
                $clean[] = ['key' => $key, 'value' => $val];
            }
        }

        return !empty($clean) ? $clean : null;
    }

    /**
     * Clean and process Ideal For dishes gallery items.
     */
    protected function processIdealForItems(Request $request): ?array
    {
        $items = [];

        if ($request->has('ideal_for_items') && is_array($request->input('ideal_for_items'))) {
            foreach ($request->input('ideal_for_items') as $idx => $row) {
                $title = trim($row['title'] ?? '');
                if (empty($title)) {
                    continue;
                }

                $imagePath = trim($row['existing_image'] ?? '');

                // If user selected a preset image
                if (!empty($row['preset'])) {
                    $imagePath = trim($row['preset']);
                }

                // If user uploaded a new custom image for this dish
                if ($request->hasFile("ideal_for_items.{$idx}.image_file")) {
                    $file = $request->file("ideal_for_items.{$idx}.image_file");
                    if ($file && $file->isValid()) {
                        $imagePath = $this->processAndStoreImage($file);
                    }
                }

                $items[] = [
                    'title' => $title,
                    'image' => $imagePath,
                ];
            }
        } elseif ($request->filled('ideal_for')) {
            $raw = $request->input('ideal_for');
            if (is_string($raw)) {
                $titles = array_values(array_filter(array_map('trim', explode(',', $raw))));
                foreach ($titles as $t) {
                    $items[] = ['title' => $t, 'image' => ''];
                }
            } elseif (is_array($raw)) {
                foreach ($raw as $t) {
                    $items[] = is_array($t) ? $t : ['title' => trim($t), 'image' => ''];
                }
            }
        }

        return !empty($items) ? $items : null;
    }
}
