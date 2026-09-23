@extends('admin.layouts.app')

@section('title', 'Add New Product - Raghuvir Atta')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.products.index') }}">Our Products</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">New Product</span>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
    @csrf

    <!-- Top Action Banner -->
    <div class="settings-header-banner" style="margin-bottom: 1.75rem;">
        <div class="settings-header-title-box">
            <div class="settings-header-icon-badge" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                <i class="fa-solid fa-boxes-packing"></i>
            </div>
            <div>
                <h1 class="page-title-main" style="margin-bottom: 0.25rem;">Add New Product</h1>
                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                    Create a new flour product with packaging sizes, nutritional facts, and specifications.
                </p>
            </div>
        </div>

        <!-- Top Action Buttons -->
        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
            <button type="submit" class="btn-syndron btn-syndron-primary" id="topSaveBtn">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save & Publish Product</span>
                <kbd class="shortcut-key">Ctrl+S</kbd>
            </button>
        </div>
    </div>

    <!-- 2-Column Responsive Layout Grid -->
    <div class="blog-editor-layout">
        <!-- ================================================================= -->
        <!-- LEFT COLUMN: MAIN PRODUCT DETAILS, SPECS & NUTRITION               -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.75rem; min-width: 0;">
            <!-- 1. Basic Product Info Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-wheat-awn"></i>
                            </div>
                            <span>Product Identity & Description</span>
                        </h3>
                        <p class="card-syndron-desc">Configure product title, subtitle tagline, URL slug, and detailed description.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Product Name -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <label for="name" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Product Name <span style="color: #ef4444;">*</span></span>
                            </label>
                            <span style="font-size: 0.75rem; color: var(--muted-foreground);">e.g. Whole Wheat Atta</span>
                        </div>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control-admin"
                            value="{{ old('name') }}"
                            placeholder="e.g. Whole Wheat Atta, Bati Atta, Wheat Bran"
                            required
                            oninput="handleNameChange(this.value)"
                        >
                        @error('name')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Subtitle / Tagline & Quote -->
                    <div class="form-row-2col">
                        <div class="form-group-admin">
                            <label for="subtitle" class="form-label-admin">Subtitle / Quality Badge</label>
                            <input
                                type="text"
                                name="subtitle"
                                id="subtitle"
                                class="form-control-admin"
                                value="{{ old('subtitle', '100% Pure & Farm Fresh') }}"
                                placeholder="e.g. 100% Pure & Farm Fresh"
                            >
                        </div>
                        <div class="form-group-admin">
                            <label for="quote" class="form-label-admin">Marketing Quote / Callout</label>
                            <input
                                type="text"
                                name="quote"
                                id="quote"
                                class="form-control-admin"
                                value="{{ old('quote', 'From Carefully Selected Wheat to Your Everyday Kitchen.') }}"
                                placeholder="e.g. From Carefully Selected Wheat to Your Everyday Kitchen."
                            >
                        </div>
                    </div>

                    <!-- Slug -->
                    <div class="form-group-admin">
                        <label for="slug" class="form-label-admin">
                            <span>URL Permalink Slug</span>
                        </label>
                        <div class="input-slug-wrapper">
                            <span class="slug-prefix">https://raghuvirofficial.com/product/</span>
                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control-admin slug-input"
                                value="{{ old('slug') }}"
                                placeholder="whole-wheat-atta"
                                oninput="updateSerpPreview()"
                            >
                        </div>
                        <div class="form-hint">Auto-generated from Product Name. Letters, numbers, and hyphens only.</div>
                    </div>

                    <!-- Short Description -->
                    <div class="form-group-admin">
                        <label for="short_description" class="form-label-admin">Short Overview (Listing & Hero Section)</label>
                        <textarea
                            name="short_description"
                            id="short_description"
                            rows="3"
                            class="form-control-admin"
                            placeholder="Brief summary displayed right below the product title..."
                        >{{ old('short_description') }}</textarea>
                        <div class="form-hint">Shown next to the pack image on product single and on the catalog card.</div>
                    </div>

                    <!-- Detailed Description -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="detailed_description" class="form-label-admin">Full Product Story & Features</label>
                        <textarea
                            name="detailed_description"
                            id="detailed_description"
                            rows="5"
                            class="form-control-admin"
                            placeholder="Detailed explanation of the milling process, wheat origin, dough softness..."
                        >{{ old('detailed_description') }}</textarea>
                        <div class="form-hint">Appears in the left column under 'Product Description'.</div>
                    </div>
                </div>
            </div>

            <!-- 2. Dynamic Product Specifications Table Card (Product Details) -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-table-list"></i>
                            </div>
                            <span>Dynamic Product Details Table</span>
                        </h3>
                        <p class="card-syndron-desc">Configure the 2-column 'Product Details' table on the product page. You can dynamically add, edit, or delete any rows.</p>
                    </div>
                    <div style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                        <button type="button" class="btn-syndron btn-syndron-secondary" style="padding: 6px 12px; font-size: 0.8rem;" onclick="resetDefaultSpecs()">
                            <i class="fa-solid fa-rotate-left"></i>
                            <span>Standard Defaults</span>
                        </button>
                        <button type="button" class="btn-syndron btn-syndron-primary" style="padding: 6px 14px; font-size: 0.8rem;" onclick="addSpecRow()">
                            <i class="fa-solid fa-plus"></i>
                            <span>Add Row</span>
                        </button>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Dynamic Specifications Table -->
                    <div style="border: 1px solid var(--border); border-radius: 10px; overflow-x: auto; background: var(--card);">
                        <table style="width: 100%; border-collapse: collapse; margin: 0; font-size: 0.85rem; min-width: 500px;">
                            <thead>
                                <tr style="background: var(--secondary); border-bottom: 1.5px solid var(--border); color: var(--muted-foreground); font-weight: 700; text-transform: uppercase; font-size: 0.725rem; letter-spacing: 0.05em;">
                                    <th style="width: 44px; padding: 10px 12px; text-align: center;">#</th>
                                    <th style="width: 38%; padding: 10px 14px; text-align: left;">Parameter / Specification Label</th>
                                    <th style="padding: 10px 14px; text-align: left;">Specification Value / Description</th>
                                    <th style="width: 54px; padding: 10px 12px; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="specsTableBody">
                                @php
                                    $defaultSpecs = [
                                        ['key' => 'Main Ingredient', 'value' => 'Pure Golden Wheat'],
                                        ['key' => 'Processing', 'value' => 'Chakki Ground & Roller Processed'],
                                        ['key' => 'Suitable For', 'value' => 'Bulk Baking, Catering & Commercial Kitchens'],
                                        ['key' => 'Packaging', 'value' => 'Hygienic & Heavy Duty Packaging'],
                                        ['key' => 'Shelf Life', 'value' => 'Best before 3 months from packing date'],
                                        ['key' => 'Storage', 'value' => 'Store in a cool, dry place off the ground'],
                                    ];
                                    $rawOld = old('specifications');
                                    $initialSpecs = (!empty($rawOld) && is_array($rawOld)) ? $rawOld : $defaultSpecs;
                                @endphp
                                @foreach($initialSpecs as $idx => $spec)
                                    <tr class="spec-row" id="spec_row_{{ $idx }}" style="border-bottom: 1px solid var(--border); background: var(--card);">
                                        <td style="padding: 8px 12px; text-align: center; color: var(--muted-foreground); font-weight: 700;" class="row-num">{{ $loop->iteration }}</td>
                                        <td style="padding: 8px 12px;">
                                            <input type="text" name="specifications[{{ $idx }}][key]" class="form-control-admin" style="font-weight: 600; width: 100%; box-sizing: border-box;" value="{{ $spec['key'] ?? '' }}" placeholder="e.g. Main Ingredient, Grain Quality, Moisture" required>
                                        </td>
                                        <td style="padding: 8px 12px;">
                                            <input type="text" name="specifications[{{ $idx }}][value]" class="form-control-admin" style="width: 100%; box-sizing: border-box;" value="{{ $spec['value'] ?? '' }}" placeholder="e.g. Pure Golden Wheat, Stone Ground..." required>
                                        </td>
                                        <td style="padding: 8px 12px; text-align: center;">
                                            <button type="button" onclick="removeSpecRow(this)" title="Delete Row" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); width: 32px; height: 32px; border-radius: 6px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s ease;">
                                                <i class="fa-solid fa-trash-can" style="font-size: 0.8rem;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add Row Action Bar -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.85rem; padding: 0.25rem 0.15rem; flex-wrap: wrap; gap: 8px;">
                        <span style="font-size: 0.775rem; color: var(--muted-foreground);">
                            <i class="fa-solid fa-circle-info" style="color: var(--accent); margin-right: 4px;"></i>
                            Rows appear in the exact order above in the public Product Details table.
                        </span>
                        <button type="button" class="btn-syndron btn-syndron-secondary" style="padding: 6px 14px; font-size: 0.8rem; border-color: var(--accent); color: var(--accent);" onclick="addSpecRow()">
                            <i class="fa-solid fa-plus"></i>
                            <span>+ Add Another Row</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 3. Nutritional Information Facts Card (Matching Image 2 Nutrition Box) -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <span>Nutritional Information (Per 100g Values)</span>
                        </h3>
                        <p class="card-syndron-desc">Powers the macro highlight cards and detailed nutrition table shown in Image 2.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <div class="nutrition-macros-grid">
                        <!-- Energy -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="energy_kcal" class="form-label-admin">Energy (kcal)</label>
                            <input
                                type="text"
                                name="energy_kcal"
                                id="energy_kcal"
                                class="form-control-admin"
                                value="{{ old('energy_kcal', '355.50') }}"
                                placeholder="355.50"
                            >
                        </div>

                        <!-- Protein -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="protein_g" class="form-label-admin">Protein (g)</label>
                            <input
                                type="text"
                                name="protein_g"
                                id="protein_g"
                                class="form-control-admin"
                                value="{{ old('protein_g', '11.40') }}"
                                placeholder="11.40"
                            >
                        </div>

                        <!-- Carbs -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="carbs_g" class="form-label-admin">Carbohydrates (g)</label>
                            <input
                                type="text"
                                name="carbs_g"
                                id="carbs_g"
                                class="form-control-admin"
                                value="{{ old('carbs_g', '75.90') }}"
                                placeholder="75.90"
                            >
                        </div>

                        <!-- Fat -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="fat_g" class="form-label-admin">Total Fat (g)</label>
                            <input
                                type="text"
                                name="fat_g"
                                id="fat_g"
                                class="form-control-admin"
                                value="{{ old('fat_g', '0.70') }}"
                                placeholder="0.70"
                            >
                        </div>
                    </div>

                    <!-- Serving & Packaging Details -->
                    <div class="nutrition-serving-grid">
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label class="form-label-admin">Serving Size</label>
                            <input
                                type="text"
                                name="nutrition_details[serving_size]"
                                class="form-control-admin"
                                value="{{ old('nutrition_details.serving_size', '100 gm') }}"
                                placeholder="100 gm"
                            >
                            <div class="form-hint">Shown as 'Serving: 100 gm' badge in nutrition box.</div>
                        </div>
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label class="form-label-admin">Servings Per Pack</label>
                            <input
                                type="text"
                                name="nutrition_details[per_pack]"
                                class="form-control-admin"
                                value="{{ old('nutrition_details.per_pack', '1') }}"
                                placeholder="1"
                            >
                            <div class="form-hint">Shown as 'Per Pack: 1' badge in nutrition box.</div>
                        </div>
                    </div>

                    <!-- Detailed Nutrition Table Breakdown -->
                    <div style="margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                        <div style="font-size: 0.85rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 6px;">
                            <i class="fa-solid fa-list-check" style="color: var(--accent);"></i>
                            <span>Detailed Nutrition Table Breakdown (Shown on Product Page)</span>
                        </div>
                        <div class="nutrition-breakdown-grid">
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Saturated Fat (g)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[saturated_fat]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.saturated_fat', '0') }}"
                                    placeholder="0"
                                >
                            </div>
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Trans Fat (g)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[trans_fat]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.trans_fat', '0') }}"
                                    placeholder="0"
                                >
                            </div>
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Cholesterol (mg)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[cholesterol]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.cholesterol', '0') }}"
                                    placeholder="0"
                                >
                            </div>
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Sodium (mg)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[sodium]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.sodium', '20.1') }}"
                                    placeholder="20.1"
                                >
                            </div>
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Total Sugar (g)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[sugar]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.sugar', '0.8') }}"
                                    placeholder="0.8"
                                >
                            </div>
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label class="form-label-admin">Added Sugar (g)</label>
                                <input
                                    type="text"
                                    name="nutrition_details[added_sugar]"
                                    class="form-control-admin"
                                    value="{{ old('nutrition_details.added_sugar', '0') }}"
                                    placeholder="0"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. SEO Settings Card with Real-time Google SERP Preview -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-magnifying-glass-chart"></i>
                            </div>
                            <span>Search Engine Optimization (SEO)</span>
                        </h3>
                        <p class="card-syndron-desc">Configure meta title, description, and keywords for high Google ranking.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Live Google SERP Snippet Preview Box -->
                    <div class="google-serp-box">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.85rem;">
                            <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <i class="fa-brands fa-google" style="color: #4285F4; font-size: 0.95rem;"></i>
                                Google Search Snippet Preview
                            </span>
                            <span style="font-size: 0.725rem; font-weight: 600; color: #10b981; background: rgba(16, 185, 129, 0.1); padding: 2px 8px; border-radius: 6px;">
                                Live Preview
                            </span>
                        </div>
                        
                        <div class="google-serp-preview-card">
                            <div class="serp-header-row">
                                <img src="{{ asset('images/Raghuvir Favicon.png') }}" alt="Favicon" class="serp-favicon" style="width: 24px !important; height: 24px !important; max-width: 24px !important; max-height: 24px !important; object-fit: contain; flex-shrink: 0; display: block;">
                                <div class="serp-url-box">
                                    <span class="serp-site-name">Raghuvir Atta</span>
                                    <span class="serp-url-breadcrumb">https://raghuvirofficial.com › product › <span id="serpSlugSpan">product-slug</span></span>
                                </div>
                            </div>
                            <div class="serp-title" id="serpTitlePreview">
                                Write a Product Name... - Raghuvir Atta
                            </div>
                            <div class="serp-desc" id="serpDescPreview">
                                Provide an enticing SEO meta description to attract organic clicks from Google search users...
                            </div>
                        </div>
                    </div>

                    <!-- Meta Title with Counter -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="meta_title" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Title</label>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaTitleBadge" class="char-pill pill-neutral">Optimal: 50–60 chars</span>
                                <span id="metaTitleCounter" style="font-size: 0.75rem; font-weight: 700; color: #64748b;">0 / 60</span>
                            </div>
                        </div>
                        <input
                            type="text"
                            name="meta_title"
                            id="meta_title"
                            class="form-control-admin"
                            value="{{ old('meta_title') }}"
                            placeholder="Custom title for Google search (leaves empty to use product name)"
                            oninput="handleMetaTitleChange(this.value)"
                        >
                    </div>

                    <!-- Meta Description with Counter -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="meta_description" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Description</label>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaDescBadge" class="char-pill pill-neutral">Optimal: 120–160 chars</span>
                                <span id="metaDescCounter" style="font-size: 0.75rem; font-weight: 700; color: #64748b;">0 / 160</span>
                            </div>
                        </div>
                        <textarea
                            name="meta_description"
                            id="meta_description"
                            rows="3"
                            class="form-control-admin"
                            placeholder="Write an informative search snippet..."
                            oninput="handleMetaDescChange(this.value)"
                        >{{ old('meta_description') }}</textarea>
                    </div>

                    <!-- Meta Keywords -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="meta_keywords" class="form-label-admin">Meta Keywords (Comma separated)</label>
                        <input
                            type="text"
                            name="meta_keywords"
                            id="meta_keywords"
                            class="form-control-admin"
                            value="{{ old('meta_keywords') }}"
                            placeholder="chakki atta, whole wheat flour, stone ground atta, soft rotis"
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================================= -->
        <!-- RIGHT COLUMN: STATUS, CATEGORY, MEDIA & PACK SIZES                -->
        <!-- ================================================================= -->
        <div class="blog-editor-sidebar">
            <!-- 1. Publication Status Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-cloud-arrow-up" style="color: var(--accent);"></i>
                        <span>Publish Status</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Live Visibility Toggle -->
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.85rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 8px; margin-bottom: 1rem;">
                        <div>
                            <div style="font-weight: 700; font-size: 0.85rem; color: var(--foreground);">Live on Website</div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground);">Publish to online catalog</div>
                        </div>
                        <label class="switch" style="position: relative; display: inline-block; width: 44px; height: 24px;">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <!-- Featured in Navbar Mega Menu Toggle -->
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.85rem; background: rgba(239, 128, 28, 0.05); border: 1px solid rgba(239, 128, 28, 0.2); border-radius: 8px; margin-bottom: 1.25rem;">
                        <div>
                            <div style="font-weight: 700; font-size: 0.85rem; color: #EF801C; display: flex; align-items: center; gap: 5px;">
                                <i class="fa-solid fa-star"></i> Featured in Mega Menu
                            </div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground);">Show in top nav (Image 1)</div>
                        </div>
                        <label class="switch" style="position: relative; display: inline-block; width: 44px; height: 24px;">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <!-- Sort Order -->
                    <div class="form-group-admin" style="margin-bottom: 1.25rem;">
                        <label for="sort_order" class="form-label-admin">Display Sort Order</label>
                        <input
                            type="number"
                            name="sort_order"
                            id="sort_order"
                            class="form-control-admin"
                            value="{{ old('sort_order', '0') }}"
                            placeholder="0"
                        >
                        <div class="form-hint">Lower numbers display first in listings.</div>
                    </div>

                    <!-- Primary Save Button -->
                    <button type="submit" class="btn-syndron btn-syndron-primary" style="width: 100%;">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save & Publish Product</span>
                    </button>
                </div>
            </div>

            <!-- 2. Category & Pack Sizes Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-tags" style="color: var(--accent);"></i>
                        <span>Category & Pack Sizes</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Category Selection -->
                    <div class="form-group-admin">
                        <label for="category" class="form-label-admin">Category <span style="color: #ef4444;">*</span></label>
                        @php
                            $catList = (!empty($categories) && count($categories) > 0)
                                ? $categories
                                : ['Wheat Flour', 'Coarse Wheat Flour', 'Wheat Bran', 'Chakki Atta', 'Maida Free Atta', 'Specialty Flour', 'Organic Grain'];
                        @endphp
                        <select name="category" id="category" class="form-control-admin" required>
                            @foreach($catList as $cat)
                                <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pack Sizes Pills Input -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="sizes" class="form-label-admin">Available Pack Sizes (Comma separated)</label>
                        <input
                            type="text"
                            name="sizes"
                            id="sizes"
                            class="form-control-admin"
                            value="{{ old('sizes', '5kg, 30kg') }}"
                            placeholder="5kg, 10kg, 30kg"
                        >
                        <div class="form-hint">Shown as clickable size pills on product page (e.g. 5kg, 30kg).</div>
                    </div>
                </div>
            </div>

            <!-- 3. Primary Product Image (Pack Shot) -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-image" style="color: var(--accent);"></i>
                        <span>Primary Pack Image</span>
                    </h3>
                    <span class="image-webp-badge" style="font-size: 0.675rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: 9999px;">
                        <i class="fa-solid fa-bolt"></i> Auto-WebP
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <div class="product-pack-upload-container" style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="width: 100%; height: 240px; border-radius: 12px; overflow: hidden; background: #ffffff; border: 2px dashed var(--border); display: flex; align-items: center; justify-content: center; position: relative; padding: 16px; box-shadow: inset 0 2px 6px rgba(0,0,0,0.03);">
                            <img
                                id="productCoverPreview"
                                src="{{ asset('images/product_atta_white.jpg') }}"
                                alt="Pack Preview"
                                style="max-height: 100%; max-width: 100%; width: auto; height: auto; object-fit: contain; display: block; margin: 0 auto; filter: drop-shadow(0 6px 14px rgba(0,0,0,0.08));"
                            >
                        </div>

                        <label for="imageInput" class="btn-syndron btn-syndron-secondary" style="width: 100%; justify-content: center; cursor: pointer;">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            <span>Upload Packaging Photo</span>
                        </label>
                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            accept="image/png,image/jpeg,image/webp,image/jpg"
                            onchange="previewProductCover(this)"
                            style="display: none;"
                        >
                        <div class="form-hint" style="margin-top: 0.15rem; text-align: center;">
                            Transparent PNG or white background recommended. Auto-converted to WebP.
                        </div>
                    </div>

                    <!-- Image Alt Text for SEO -->
                    <div class="form-group-admin" style="margin-top: 1rem; margin-bottom: 0; padding-top: 0.85rem; border-top: 1px solid var(--border);">
                        <label for="image_alt" class="form-label-admin">Image Alt Text (SEO)</label>
                        <input
                            type="text"
                            name="image_alt"
                            id="image_alt"
                            class="form-control-admin"
                            value="{{ old('image_alt') }}"
                            placeholder="e.g. Raghuvir Whole Wheat Atta 100% Pure"
                        >
                    </div>
                </div>
            </div>

            <!-- 3b. Header Breadcrumb Banner (Optional) -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-panorama" style="color: #0284c7;"></i>
                        <span>Breadcrumb Hero Banner</span>
                    </h3>
                    <span style="font-size: 0.7rem; font-weight: 700; color: #0284c7; background: rgba(14, 165, 233, 0.12); padding: 2px 8px; border-radius: 9999px;">Optional</span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <div style="font-size: 0.78rem; color: var(--muted-foreground); margin-bottom: 0.75rem; line-height: 1.4;">
                        Custom background banner for this product's header page. If not uploaded, it automatically displays the default master banner from <strong>Page Banners</strong>.
                    </div>

                    <div style="padding: 0.5rem 0.75rem; background: rgba(14, 165, 233, 0.06); border: 1px dashed rgba(14, 165, 233, 0.3); border-radius: 8px; margin-bottom: 0.75rem; font-size: 0.75rem; color: var(--foreground); display: flex; align-items: center; gap: 0.4rem;">
                        <i class="fa-solid fa-ruler-combined" style="color: #0284c7;"></i>
                        <span>Recommended: <strong>1920 × 500 px</strong> (Panoramic)</span>
                    </div>

                    <div style="position: relative; height: 110px; border-radius: 10px; overflow: hidden; background: #1a1a1a; border: 1px solid var(--border); margin-bottom: 0.75rem;">
                        <img id="productBannerPreviewImg" src="{{ \App\Models\PageBanner::getImage('product-details') }}" alt="Breadcrumb Banner Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; inset: 0; background: rgba(239, 128, 28, 0.3); mix-blend-mode: multiply;"></div>
                        <div style="position: absolute; bottom: 6px; right: 8px; background: rgba(0,0,0,0.6); color: #fff; font-size: 0.68rem; padding: 2px 6px; border-radius: 4px;">
                            Hero Overlay Preview
                        </div>
                    </div>

                    <label for="bannerImageInput" class="btn-syndron btn-syndron-secondary" style="width: 100%; justify-content: center; cursor: pointer;">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span>Choose Custom Banner</span>
                    </label>
                    <input
                        type="file"
                        name="banner_image"
                        id="bannerImageInput"
                        accept="image/png,image/jpeg,image/webp,image/jpg,image/svg+xml"
                        onchange="previewProductBanner(this)"
                        style="display: none;"
                    >
                </div>
            </div>

            <!-- 4. Additional Gallery Images & Ideal For -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-images" style="color: var(--accent);"></i>
                        <span>Gallery & Ideal Dishes</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Additional Gallery Upload -->
                    <div class="form-group-admin">
                        <label for="galleryImagesInput" class="form-label-admin">Multiple Gallery Photos</label>
                        <input
                            type="file"
                            name="gallery_images[]"
                            id="galleryImagesInput"
                            multiple
                            accept="image/png,image/jpeg,image/webp,image/jpg"
                            class="form-control-admin"
                        >
                        <div class="form-hint">Upload extra photos for the thumbnail slider in Image 2.</div>
                    </div>

                    <!-- Ideal For Dishes -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="ideal_for" class="form-label-admin">Ideal For Dishes (Comma separated)</label>
                        <input
                            type="text"
                            name="ideal_for"
                            id="ideal_for"
                            class="form-control-admin"
                            value="{{ old('ideal_for', 'Roti / Chapati, Paratha, Puri, Thepla, Everyday Cooking') }}"
                            placeholder="Roti, Paratha, Puri, Thepla, Halwa"
                        >
                        <div class="form-hint">Shown in the 'Ideal For' cards section at bottom of product page.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('styles')
<style>
    /* Responsive 2-Column Editor Layout */
    .blog-editor-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 360px;
        gap: 1.75rem;
        align-items: start;
        margin-bottom: 5rem;
    }
    .blog-editor-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        position: sticky;
        top: 5.5rem;
    }
    @media (max-width: 1080px) {
        .blog-editor-layout {
            grid-template-columns: 1fr;
        }
        .blog-editor-sidebar {
            position: static;
        }
    }

    /* Slug Input Group */
    .input-slug-wrapper {
        display: flex;
        align-items: stretch;
        border-radius: var(--radius-md, 8px);
        overflow: hidden;
        border: 1px solid var(--border-strong, var(--border));
        background-color: var(--card);
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .input-slug-wrapper:focus-within {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-subtle, rgba(239, 128, 28, 0.15));
    }
    .slug-prefix {
        display: inline-flex;
        align-items: center;
        padding: 8px 12px;
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--muted-foreground);
        background-color: var(--secondary);
        border-right: 1px solid var(--border-strong, var(--border));
        white-space: nowrap;
        user-select: none;
        flex-shrink: 0;
    }
    .input-slug-wrapper .slug-input.form-control-admin {
        flex: 1;
        border: none !important;
        border-radius: 0 !important;
        background: transparent !important;
        padding: 8px 13px !important;
        box-shadow: none !important;
        outline: none !important;
        min-width: 140px;
    }
    @media (max-width: 540px) {
        .input-slug-wrapper {
            flex-direction: column;
        }
        .slug-prefix {
            border-right: none;
            border-bottom: 1px solid var(--border-strong, var(--border));
            padding: 6px 10px;
            font-size: 0.75rem;
        }
    }

    /* Responsive Grid Utilities for Form Rows */
    .form-row-2col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    .nutrition-macros-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }
    .nutrition-serving-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
    }
    .nutrition-breakdown-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    @media (max-width: 768px) {
        .form-row-2col,
        .nutrition-serving-grid {
            grid-template-columns: 1fr;
        }
        .nutrition-macros-grid,
        .nutrition-breakdown-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 480px) {
        .nutrition-macros-grid,
        .nutrition-breakdown-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Google SERP Snippet Preview */
    .google-serp-box {
        background: var(--secondary, #f8fafc);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: var(--radius-lg, 12px);
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .google-serp-preview-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem 1.25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
    }
    .serp-header-row {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        margin-bottom: 0.35rem;
    }
    .serp-favicon {
        width: 24px !important;
        height: 24px !important;
        max-width: 24px !important;
        max-height: 24px !important;
        object-fit: contain;
        border-radius: 50%;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 2px;
        flex-shrink: 0;
        display: block;
    }
    .serp-url-box {
        display: flex;
        flex-direction: column;
        overflow: hidden;
        line-height: 1.25;
    }
    .serp-site-name {
        font-size: 0.8rem;
        font-weight: 600;
        color: #202124;
    }
    .serp-url-breadcrumb {
        font-size: 0.725rem;
        color: #4d5156;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .serp-title {
        color: #1a0dab;
        font-size: 1.15rem;
        font-weight: 500;
        line-height: 1.35;
        margin-bottom: 0.35rem;
        cursor: pointer;
        word-break: break-word;
    }
    .serp-title:hover {
        text-decoration: underline;
    }
    .serp-desc {
        color: #4d5156;
        font-size: 0.85rem;
        line-height: 1.55;
        word-break: break-word;
    }

    /* Switch Component */
    .switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #cbd5e1;
        transition: all 0.25s ease;
        border-radius: 24px;
    }
    .switch .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: #ffffff;
        transition: all 0.25s ease;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    }
    .switch input:checked + .slider {
        background-color: #10b981;
    }
    .switch input:checked + .slider:before {
        transform: translateX(20px);
    }

    /* Character Counter Pills */
    .char-pill {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 9999px;
        letter-spacing: 0.02em;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .pill-neutral { background: var(--secondary, #f1f5f9); color: var(--muted-foreground, #64748b); }
    .pill-success { background: rgba(16, 185, 129, 0.12); color: #10b981; }
    .pill-warning { background: rgba(245, 158, 11, 0.12); color: #f59e0b; }
    .pill-danger  { background: rgba(239, 68, 68, 0.12); color: #ef4444; }

    .seo-score-chip-banner {
        font-size: 0.725rem;
        font-weight: 700;
        color: #10b981;
        background: rgba(16, 185, 129, 0.12);
        border: 1px solid rgba(16, 185, 129, 0.3);
        padding: 3px 10px;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
</style>
@endpush

@push('scripts')
<script>
    function handleNameChange(val) {
        const slugField = document.getElementById('slug');
        if (!slugField.dataset.manual) {
            slugField.value = val.toLowerCase().trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
        updateSerpPreview();
    }

    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.manual = 'true';
    });

    function handleMetaTitleChange(val) {
        const counter = document.getElementById('metaTitleCounter');
        const badge = document.getElementById('metaTitleBadge');
        const len = val.length;
        counter.innerText = `${len} / 60`;

        if (len >= 50 && len <= 60) {
            badge.className = 'char-pill pill-success';
            badge.innerText = 'Perfect length';
        } else if (len > 60) {
            badge.className = 'char-pill pill-danger';
            badge.innerText = 'Too long (truncated)';
        } else {
            badge.className = 'char-pill pill-neutral';
            badge.innerText = 'Optimal: 50–60 chars';
        }
        updateSerpPreview();
    }

    function handleMetaDescChange(val) {
        const counter = document.getElementById('metaDescCounter');
        const badge = document.getElementById('metaDescBadge');
        const len = val.length;
        counter.innerText = `${len} / 160`;

        if (len >= 120 && len <= 160) {
            badge.className = 'char-pill pill-success';
            badge.innerText = 'Optimal length';
        } else if (len > 160) {
            badge.className = 'char-pill pill-danger';
            badge.innerText = 'Too long (truncated)';
        } else {
            badge.className = 'char-pill pill-neutral';
            badge.innerText = 'Optimal: 120–160 chars';
        }
        updateSerpPreview();
    }

    function updateSerpPreview() {
        const nameVal = document.getElementById('name').value.trim();
        const slugVal = document.getElementById('slug').value.trim();
        const metaTitleVal = document.getElementById('meta_title').value.trim();
        const metaDescVal = document.getElementById('meta_description').value.trim();

        document.getElementById('serpSlugSpan').innerText = slugVal || 'product-slug';
        document.getElementById('serpTitlePreview').innerText = (metaTitleVal || nameVal || 'Product Name') + ' - Raghuvir Atta';
        document.getElementById('serpDescPreview').innerText = metaDescVal || 'Pure stone ground chakki atta by Raghuvir. High in dietary fiber and wholesome nutrition...';
    }

    function previewProductCover(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('productCoverPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Dynamic Specifications Table Management
    let specRowIndex = {{ count($initialSpecs ?? []) + 10 }};

    function addSpecRow(key = '', val = '') {
        const tbody = document.getElementById('specsTableBody');
        const rowNum = tbody.querySelectorAll('tr').length + 1;
        const tr = document.createElement('tr');
        tr.className = 'spec-row';
        tr.id = `spec_row_${specRowIndex}`;
        tr.style.borderBottom = '1px solid var(--border)';
        tr.style.background = 'var(--card)';
        tr.innerHTML = `
            <td style="padding: 8px 12px; text-align: center; color: var(--muted-foreground); font-weight: 700;" class="row-num">${rowNum}</td>
            <td style="padding: 8px 12px;">
                <input type="text" name="specifications[${specRowIndex}][key]" class="form-control-admin" style="font-weight: 600; width: 100%; box-sizing: border-box;" value="${escapeHtml(key)}" placeholder="e.g. Moisture Content, Grain Origin..." required>
            </td>
            <td style="padding: 8px 12px;">
                <input type="text" name="specifications[${specRowIndex}][value]" class="form-control-admin" style="width: 100%; box-sizing: border-box;" value="${escapeHtml(val)}" placeholder="e.g. < 12%, MP Sharbati..." required>
            </td>
            <td style="padding: 8px 12px; text-align: center;">
                <button type="button" onclick="removeSpecRow(this)" title="Delete Row" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); width: 32px; height: 32px; border-radius: 6px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s ease;">
                    <i class="fa-solid fa-trash-can" style="font-size: 0.8rem;"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
        specRowIndex++;
        updateRowNumbers();
    }

    function removeSpecRow(btn) {
        const tbody = document.getElementById('specsTableBody');
        if (tbody.querySelectorAll('tr').length <= 1) {
            alert('You must keep at least one specification row.');
            return;
        }
        const row = btn.closest('tr');
        row.remove();
        updateRowNumbers();
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll('#specsTableBody tr');
        rows.forEach((r, idx) => {
            const numTd = r.querySelector('.row-num');
            if (numTd) numTd.innerText = idx + 1;
        });
    }

    function resetDefaultSpecs() {
        if (!confirm('Reset specifications to standard default flour specifications?')) return;
        const tbody = document.getElementById('specsTableBody');
        tbody.innerHTML = '';
        const defaults = [
            ['Main Ingredient', 'Pure Golden Wheat'],
            ['Processing', 'Chakki Ground & Roller Processed'],
            ['Suitable For', 'Bulk Baking, Catering & Commercial Kitchens'],
            ['Packaging', 'Hygienic & Heavy Duty Packaging'],
            ['Shelf Life', 'Best before 3 months from packing date'],
            ['Storage', 'Store in a cool, dry place off the ground']
        ];
        defaults.forEach(([k, v]) => addSpecRow(k, v));
    }

    function escapeHtml(str) {
        return String(str).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    function previewProductBanner(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('productBannerPreviewImg');
                if (img) img.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
