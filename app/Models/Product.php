<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'category',
        'quote',
        'short_description',
        'detailed_description',
        'sizes',
        'image',
        'banner_image',
        'banner_position',
        'image_alt',
        'gallery_images',
        'main_ingredient',
        'processing',
        'suitable_for',
        'packaging',
        'shelf_life',
        'storage',
        'specifications',
        'energy_kcal',
        'protein_g',
        'carbs_g',
        'fat_g',
        'nutrition_details',
        'ideal_for',
        'is_active',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'sizes' => 'array',
        'gallery_images' => 'array',
        'specifications' => 'array',
        'nutrition_details' => 'array',
        'ideal_for' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Boot model events for automatic slug generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = static::generateUniqueSlug($product->name);
            }
        });
    }

    /**
     * Generate a unique slug for the product.
     */
    public static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    /**
     * Accessor for full cover image URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/product_atta_white.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, 'images/')) {
            return asset($this->image);
        }

        return storage_asset($this->image);
    }

    /**
     * Accessor for header breadcrumb hero banner image URL.
     * If individual product has a custom banner_image, use it.
     * Otherwise fallback to global PageBanner::getImage('product-details').
     */
    public function getBannerImageUrlAttribute(): string
    {
        if (!empty($this->banner_image) && (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->banner_image) || file_exists(storage_path('app/public/' . $this->banner_image)))) {
            return storage_asset($this->banner_image);
        }

        return \App\Models\PageBanner::getImage('product-details');
    }

    /**
     * Accessor for gallery image URLs array.
     * Always ensures the primary cover image is first, and filters out cross-product fallbacks.
     */
    public function getGalleryUrlsAttribute(): array
    {
        $urls = [];
        $primaryUrl = $this->image_url;

        // 1. Primary image is ALWAYS index 0 in the slider
        if (!empty($primaryUrl)) {
            $urls[] = $primaryUrl;
        }

        // 2. Add extra gallery images from database
        if (!empty($this->gallery_images) && is_array($this->gallery_images)) {
            foreach ($this->gallery_images as $img) {
                if (empty($img)) {
                    continue;
                }

                $url = Str::startsWith($img, ['http://', 'https://'])
                    ? $img
                    : (Str::startsWith($img, 'images/') ? asset($img) : storage_asset($img));

                // Prevent cross-product image leak (e.g. whole wheat atta images in wheat bran or bati atta)
                if (!Str::contains($this->slug, 'whole-wheat') && Str::contains($img, ['product_atta_white', 'product_atta_transparent', 'product_atta.jpg'])) {
                    continue;
                }
                if (!Str::contains($this->slug, 'bati') && Str::contains($img, ['product_bati'])) {
                    continue;
                }

                // Avoid duplicating the primary image
                if (!in_array($url, $urls)) {
                    $urls[] = $url;
                }
            }
        }

        // 3. If only primary image is present, add relevant contextual dish/process images
        if (count($urls) === 1) {
            if (Str::contains($this->slug, 'bati')) {
                $urls[] = asset('images/ideal_dal_bati.jpg');
                $urls[] = asset('images/ideal_churma.jpg');
                $urls[] = asset('images/ideal_bafla.jpg');
            } elseif (Str::contains($this->slug, 'wheat') || Str::contains($this->slug, 'bran')) {
                $urls[] = asset('images/ideal_commercial.jpg');
                $urls[] = asset('images/ideal_baking.jpg');
                $urls[] = asset('images/why-choose-image-2.jpg');
            } else {
                $urls[] = asset('images/ideal_roti.jpg');
                $urls[] = asset('images/ideal_paratha.jpg');
                $urls[] = asset('images/product-image-1.jpg');
            }
        }

        return $urls;
    }

    /**
     * Accessor for safe pack sizes list.
     */
    public function getSizesListAttribute(): array
    {
        if (is_array($this->sizes)) {
            return array_values(array_filter($this->sizes));
        }

        if (is_string($this->sizes) && !empty($this->sizes)) {
            return array_map('trim', explode(',', $this->sizes));
        }

        return ['5kg', '30kg'];
    }

    /**
     * Accessor for comma-separated sizes string.
     */
    public function getSizesStringAttribute(): string
    {
        return implode(', ', $this->sizes_list);
    }

    /**
     * Accessor for ideal for dishes list (array of strings).
     */
    public function getIdealForListAttribute(): array
    {
        $gallery = $this->ideal_for_gallery;
        if (!empty($gallery)) {
            return array_column($gallery, 'title');
        }

        return ['Roti / Chapati', 'Paratha', 'Puri', 'Thepla', 'Everyday Cooking'];
    }

    /**
     * Accessor for rich ideal for gallery items (each with title, image, and image_url).
     */
    public function getIdealForGalleryAttribute(): array
    {
        $raw = $this->ideal_for;

        // If string (comma-separated), split into array
        if (is_string($raw) && !empty(trim($raw))) {
            $raw = array_map('trim', explode(',', $raw));
        }

        if (empty($raw) || !is_array($raw)) {
            // Default presets based on product slug
            $raw = match ($this->slug) {
                'bati', 'bati-atta' => [
                    ['title' => 'Dal Bati', 'image' => 'images/ideal_dal_bati.jpg'],
                    ['title' => 'Churma', 'image' => 'images/ideal_churma.jpg'],
                    ['title' => 'Bafla', 'image' => 'images/ideal_bafla.jpg'],
                    ['title' => 'Traditional Breads', 'image' => 'images/ideal_baking.jpg'],
                ],
                'wheat', 'wheat-bran' => [
                    ['title' => 'Commercial Kitchens', 'image' => 'images/ideal_commercial.jpg'],
                    ['title' => 'Bulk Catering', 'image' => 'images/ideal_commercial.jpg'],
                    ['title' => 'High-Fiber Baking', 'image' => 'images/ideal_baking.jpg'],
                    ['title' => 'Traditional Breads', 'image' => 'images/ideal_baking.jpg'],
                ],
                default => [
                    ['title' => 'Roti / Chapati', 'image' => 'images/ideal_roti.jpg'],
                    ['title' => 'Paratha', 'image' => 'images/ideal_paratha.jpg'],
                    ['title' => 'Puri', 'image' => 'images/ideal_puri.jpg'],
                    ['title' => 'Thepla', 'image' => 'images/ideal_thepla.jpg'],
                    ['title' => 'Everyday Cooking', 'image' => 'images/ideal_cooking.jpg'],
                ],
            };
        }

        $items = [];
        $presetsMap = [
            'dal bati'            => 'images/ideal_dal_bati.jpg',
            'bati'                => 'images/ideal_dal_bati.jpg',
            'churma'              => 'images/ideal_churma.jpg',
            'bafla'               => 'images/ideal_bafla.jpg',
            'roti / chapati'      => 'images/ideal_roti.jpg',
            'roti'                => 'images/ideal_roti.jpg',
            'chapati'             => 'images/ideal_roti.jpg',
            'paratha'             => 'images/ideal_paratha.jpg',
            'puri'                => 'images/ideal_puri.jpg',
            'thepla'              => 'images/ideal_thepla.jpg',
            'everyday cooking'    => 'images/ideal_cooking.jpg',
            'cooking'             => 'images/ideal_cooking.jpg',
            'traditional breads'  => 'images/ideal_baking.jpg',
            'baking'              => 'images/ideal_baking.jpg',
            'breads'              => 'images/ideal_baking.jpg',
            'commercial kitchens' => 'images/ideal_commercial.jpg',
            'bulk catering'       => 'images/ideal_commercial.jpg',
            'catering'            => 'images/ideal_commercial.jpg',
        ];

        foreach ($raw as $idx => $entry) {
            $title = '';
            $image = '';

            if (is_array($entry)) {
                $title = trim($entry['title'] ?? '');
                $image = trim($entry['image'] ?? '');
            } elseif (is_string($entry)) {
                $title = trim($entry);
            }

            if (empty($title)) {
                continue;
            }

            // If no image specified, look up preset or fallback
            if (empty($image)) {
                $lowerTitle = strtolower($title);
                foreach ($presetsMap as $needle => $presetPath) {
                    if (str_contains($lowerTitle, $needle)) {
                        $image = $presetPath;
                        break;
                    }
                }
                if (empty($image)) {
                    $fallbacks = ['images/ideal_roti.jpg', 'images/ideal_paratha.jpg', 'images/ideal_puri.jpg', 'images/ideal_thepla.jpg', 'images/ideal_cooking.jpg'];
                    $image = $fallbacks[$idx % count($fallbacks)];
                }
            }

            // Resolve full display URL
            $imageUrl = '';
            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                $imageUrl = $image;
            } elseif (str_starts_with($image, 'images/')) {
                $imageUrl = asset($image);
            } else {
                $imageUrl = asset('storage/' . $image);
            }

            $items[] = [
                'title'     => $title,
                'image'     => $image,
                'image_url' => $imageUrl,
            ];
        }

        return $items;
    }

    /**
     * Accessor for specifications list.
     * Returns dynamic specifications table rows with backwards-compatible fallback.
     */
    public function getSpecificationsListAttribute(): array
    {
        if (!empty($this->specifications) && is_array($this->specifications)) {
            $filtered = [];
            foreach ($this->specifications as $item) {
                if (is_array($item) && (!empty(trim($item['key'] ?? '')) || !empty(trim($item['value'] ?? '')))) {
                    $filtered[] = [
                        'key' => trim($item['key'] ?? ''),
                        'value' => trim($item['value'] ?? ''),
                    ];
                }
            }
            if (!empty($filtered)) {
                return $filtered;
            }
        }

        $defaults = [];
        if (!empty($this->main_ingredient)) $defaults[] = ['key' => 'Main Ingredient', 'value' => $this->main_ingredient];
        if (!empty($this->processing)) $defaults[] = ['key' => 'Processing', 'value' => $this->processing];
        if (!empty($this->suitable_for)) $defaults[] = ['key' => 'Suitable For', 'value' => $this->suitable_for];
        if (!empty($this->packaging)) $defaults[] = ['key' => 'Packaging', 'value' => $this->packaging];
        if (!empty($this->shelf_life)) $defaults[] = ['key' => 'Shelf Life', 'value' => $this->shelf_life];
        if (!empty($this->storage)) $defaults[] = ['key' => 'Storage', 'value' => $this->storage];

        if (!empty($defaults)) {
            return $defaults;
        }

        return [
            ['key' => 'Main Ingredient', 'value' => 'Pure Golden Wheat'],
            ['key' => 'Processing', 'value' => 'Chakki Ground & Roller Processed'],
            ['key' => 'Suitable For', 'value' => 'Bulk Baking, Catering & Commercial Kitchens'],
            ['key' => 'Packaging', 'value' => 'Hygienic & Heavy Duty Packaging'],
            ['key' => 'Shelf Life', 'value' => 'Best before 3 months from packing date'],
            ['key' => 'Storage', 'value' => 'Store in a cool, dry place off the ground'],
        ];
    }

    /**
     * Image Alt Text accessor with fallback to product name.
     */
    public function getImageAltTextAttribute(): string
    {
        return !empty($this->image_alt) ? $this->image_alt : "Raghuvir {$this->name}";
    }

    /**
     * Compute fallback or custom SEO Title for dynamic product.
     */
    public function getSeoTitleAttribute(): string
    {
        return !empty($this->meta_title)
            ? $this->meta_title
            : "{$this->name} | 100% Pure Chakki Fresh Atta - Raghuvir Atta";
    }

    /**
     * Compute fallback or custom SEO Description for dynamic product.
     */
    public function getSeoDescriptionAttribute(): string
    {
        if (!empty($this->meta_description)) {
            return $this->meta_description;
        }

        if (!empty($this->short_description)) {
            return Str::limit(strip_tags($this->short_description), 160);
        }

        return "Buy 100% pure stoneground {$this->name} online from Raghuvir Atta. High dietary fiber, hygienic chakki milling, zero preservatives, and naturally soft rotis.";
    }

    /**
     * Compute fallback or custom SEO Keywords for dynamic product.
     */
    public function getSeoKeywordsAttribute(): string
    {
        if (!empty($this->meta_keywords)) {
            return $this->meta_keywords;
        }

        $keywords = [$this->name, $this->category, 'raghuvir atta', 'chakki fresh', 'wheat flour', 'pure stoneground atta'];
        return implode(', ', array_filter($keywords));
    }

    /**
     * Generate Schema.org Product structured JSON-LD.
     */
    public function getSchemaJsonAttribute(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $this->name,
            'image' => [$this->image_url],
            'description' => $this->seo_description,
            'sku' => 'RAGHUVIR-' . strtoupper(Str::slug($this->slug)),
            'category' => $this->category,
            'brand' => [
                '@type' => 'Brand',
                'name' => setting('site_title', 'Raghuvir Atta'),
            ],
            'offers' => [
                '@type' => 'Offer',
                'url' => route('product-details', ['product' => $this->slug]),
                'priceCurrency' => 'INR',
                'availability' => $this->is_active ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'seller' => [
                    '@type' => 'Organization',
                    'name' => setting('site_title', 'Raghuvir Atta'),
                ],
            ],
        ];

        return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Calculate quick SEO Score.
     */
    public function getSeoScoreAttribute(): int
    {
        $score = 0;

        if (!empty($this->name) && strlen($this->name) >= 5) $score += 20;
        if (!empty($this->short_description) && strlen($this->short_description) >= 50) $score += 20;
        if (!empty($this->meta_title) && strlen($this->meta_title) >= 30 && strlen($this->meta_title) <= 60) $score += 20;
        if (!empty($this->meta_description) && strlen($this->meta_description) >= 80 && strlen($this->meta_description) <= 160) $score += 20;
        if (!empty($this->image) && !empty($this->image_alt)) $score += 10;
        if (!empty($this->sizes) && count($this->sizes_list) > 0) $score += 10;

        return min(100, $score);
    }

    /* --------------------------------------------------------------------------
       Scopes
       -------------------------------------------------------------------------- */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('subtitle', 'like', "%{$term}%")
              ->orWhere('category', 'like', "%{$term}%")
              ->orWhere('short_description', 'like', "%{$term}%")
              ->orWhere('meta_keywords', 'like', "%{$term}%");
        });
    }
}
