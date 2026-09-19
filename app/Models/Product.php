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

        return asset('storage/' . ltrim($this->image, '/'));
    }

    /**
     * Accessor for gallery image URLs array.
     */
    public function getGalleryUrlsAttribute(): array
    {
        if (empty($this->gallery_images) || !is_array($this->gallery_images)) {
            return [
                $this->image_url,
                asset('images/product_atta.jpg'),
                asset('images/product-image-1.jpg'),
                asset('images/ideal_roti.jpg'),
                asset('images/ideal_paratha.jpg'),
            ];
        }

        return array_map(function ($img) {
            if (Str::startsWith($img, ['http://', 'https://'])) return $img;
            if (Str::startsWith($img, 'images/')) return asset($img);
            return asset('storage/' . ltrim($img, '/'));
        }, $this->gallery_images);
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
     * Accessor for ideal for dishes list.
     */
    public function getIdealForListAttribute(): array
    {
        if (is_array($this->ideal_for)) {
            return array_values(array_filter($this->ideal_for));
        }

        if (is_string($this->ideal_for) && !empty($this->ideal_for)) {
            return array_map('trim', explode(',', $this->ideal_for));
        }

        return ['Roti / Chapati', 'Paratha', 'Puri', 'Thepla', 'Everyday Cooking'];
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
