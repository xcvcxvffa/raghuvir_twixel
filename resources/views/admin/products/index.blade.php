@extends('admin.layouts.app')

@section('title', 'Products Management - Raghuvir Atta')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Catalog</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Products Directory</span>
</div>

<!-- Top Header & Action Banner -->
<div class="products-header-banner">
    <div class="products-header-title-box">
        <div class="products-header-icon">
            <i class="fa-solid fa-boxes-stacked"></i>
        </div>
        <div>
            <h1 class="products-page-title">
                <span>Products Directory</span>
                <span class="products-count-badge">{{ $totalCount }} Products</span>
            </h1>
            <p class="products-page-desc">
                Manage your flour varieties, pack sizes, specifications, and public website catalog items.
            </p>
        </div>
    </div>

    <!-- Top Action Buttons -->
    <div class="products-header-actions">
        <a href="{{ route('products') }}" target="_blank" class="btn-product-secondary" title="Preview public catalog in new tab">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>View Public Catalog</span>
        </a>
        <a href="{{ route('admin.products.create') }}" class="btn-product-primary">
            <i class="fa-solid fa-plus"></i>
            <span>Add New Product</span>
        </a>
    </div>
</div>

<!-- 4 Top KPI Metric Summary Cards -->
<div class="products-kpi-grid">
    <!-- Card 1: Total Catalog -->
    <a href="{{ route('admin.products.index') }}" class="products-kpi-card {{ empty(request('status')) ? 'active-kpi' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-label">Catalog Range</span>
            <div class="kpi-icon-wrap icon-orange">
                <i class="fa-solid fa-wheat-awn"></i>
            </div>
        </div>
        <div class="kpi-value">{{ $totalCount ?? 0 }}</div>
        <div class="kpi-footer">
            <span class="kpi-pill pill-orange">
                <i class="fa-solid fa-layer-group"></i>
                Total Items
            </span>
            <span class="kpi-subtext">Flour varieties</span>
        </div>
    </a>

    <!-- Card 2: Live on Website -->
    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="products-kpi-card {{ request('status') === 'active' ? 'active-kpi' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-label">Live on Website</span>
            <div class="kpi-icon-wrap icon-green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="kpi-value">{{ $activeCount ?? 0 }}</div>
        <div class="kpi-footer">
            <span class="kpi-pill pill-green">
                <i class="fa-solid fa-signal"></i>
                Published
            </span>
            <span class="kpi-subtext">Active in store</span>
        </div>
    </a>

    <!-- Card 3: Featured in Menu -->
    <a href="{{ request()->fullUrlWithQuery(['status' => 'featured']) }}" class="products-kpi-card {{ request('status') === 'featured' ? 'active-kpi' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-label">Featured in Menu</span>
            <div class="kpi-icon-wrap icon-amber">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="kpi-value">{{ $featuredCount ?? 0 }}</div>
        <div class="kpi-footer">
            <span class="kpi-pill pill-amber">
                <i class="fa-solid fa-bars-staggered"></i>
                Top Navigation
            </span>
            <span class="kpi-subtext">Mega menu picks</span>
        </div>
    </a>

    <!-- Card 4: Categories Count -->
    <div class="products-kpi-card static">
        <div class="kpi-card-header">
            <span class="kpi-label">Categories</span>
            <div class="kpi-icon-wrap icon-blue">
                <i class="fa-solid fa-tags"></i>
            </div>
        </div>
        <div class="kpi-value">{{ $categoriesCount ?? 0 }}</div>
        <div class="kpi-footer">
            <span class="kpi-pill pill-blue">
                <i class="fa-solid fa-shapes"></i>
                Taxonomies
            </span>
            <span class="kpi-subtext">Unique categories</span>
        </div>
    </div>
</div>

<!-- Search & Filter Bar Card -->
<div class="products-filter-card">
    <form action="{{ route('admin.products.index') }}" method="GET" class="products-filter-form">
        <!-- Left Controls: Search & Category -->
        <div class="products-filter-left">
            <!-- Search Input -->
            <div class="products-search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="products-search-input"
                    placeholder="Search products by name, slug, specification..."
                >
                @if(request('search'))
                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="search-clear-btn" title="Clear search">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif
            </div>

            <!-- Category Filter -->
            <div class="products-select-box">
                <i class="fa-solid fa-filter select-icon"></i>
                <select
                    name="category"
                    class="products-select-input"
                    onchange="this.form.submit()"
                >
                    <option value="all">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter Segmented Navigation Pills -->
            <div class="products-status-pills">
                <a
                    href="{{ request()->fullUrlWithQuery(['status' => '']) }}"
                    class="status-pill {{ empty(request('status')) ? 'active' : '' }}"
                >
                    All <span class="pill-badge">{{ $totalCount }}</span>
                </a>
                <a
                    href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}"
                    class="status-pill {{ request('status') === 'active' ? 'active' : '' }}"
                >
                    Live <span class="pill-badge">{{ $activeCount }}</span>
                </a>
                <a
                    href="{{ request()->fullUrlWithQuery(['status' => 'draft']) }}"
                    class="status-pill {{ request('status') === 'draft' ? 'active' : '' }}"
                >
                    Drafts <span class="pill-badge">{{ $totalCount - $activeCount }}</span>
                </a>
                <a
                    href="{{ request()->fullUrlWithQuery(['status' => 'featured']) }}"
                    class="status-pill {{ request('status') === 'featured' ? 'active' : '' }}"
                >
                    Featured <span class="pill-badge">{{ $featuredCount }}</span>
                </a>
            </div>
        </div>

        <!-- Right Buttons: Apply & Clear Filters -->
        <div class="products-filter-right">
            @if(request()->filled('search') || (request()->filled('category') && request('category') !== 'all') || request()->filled('status'))
                <a href="{{ route('admin.products.index') }}" class="btn-filter-reset" title="Clear all filters">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Reset</span>
                </a>
            @endif
            <button type="submit" class="btn-filter-apply">
                <i class="fa-solid fa-arrow-right"></i>
                <span>Filter</span>
            </button>
        </div>
    </form>
</div>

<!-- Products Table Card -->
<div class="products-table-card">
    <div class="products-table-header">
        <div class="products-table-header-left">
            <div class="table-header-icon-box">
                <i class="fa-solid fa-table-list"></i>
            </div>
            <div>
                <h3 class="table-header-title">Catalog Items Directory</h3>
                <p class="table-header-desc">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} recorded products</p>
            </div>
        </div>
        <div class="table-header-tip">
            <i class="fa-solid fa-circle-info"></i>
            Click on any product title to open the full product editor.
        </div>
    </div>

    <div class="products-table-body">
        <div class="products-table-container">
            <table class="products-table">
                <thead>
                    <tr>
                        <th class="th-product">Product Identity</th>
                        <th class="th-category">Category & Process</th>
                        <th class="th-sizes">Pack Sizes</th>
                        <th class="th-featured">Mega Menu</th>
                        <th class="th-status">Live Status</th>
                        <th class="th-actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="product-row">
                            <!-- Product Identity (Thumbnail + Details) -->
                            <td class="td-product">
                                <div class="product-identity-box">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="product-avatar-card" title="Edit {{ $product->name }}">
                                        <img
                                            src="{{ $product->image_url }}"
                                            alt="{{ $product->image_alt ?: $product->name }}"
                                            loading="lazy"
                                        >
                                    </a>
                                    <div class="product-meta-col">
                                        <div class="product-title-row">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="product-link">
                                                {{ $product->name }}
                                            </a>
                                            @if($product->sort_order !== null)
                                                <span class="product-order-pill" title="Catalog Sort Order">#{{ $product->sort_order }}</span>
                                            @endif
                                        </div>
                                        <div class="product-subtitle-text">
                                            {{ $product->subtitle ?: Str::limit($product->short_description, 70) }}
                                        </div>
                                        <div class="product-badges-row">
                                            <a href="{{ route('product-details', ['product' => $product->slug]) }}" target="_blank" class="product-slug-chip" title="View live page">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                <span>/product/{{ $product->slug }}</span>
                                            </a>
                                            @php
                                                $score = $product->seo_score;
                                                $badgeClass = $score >= 80 ? 'seo-high' : ($score >= 55 ? 'seo-med' : 'seo-low');
                                            @endphp
                                            <span class="product-seo-chip {{ $badgeClass }}" title="Product SEO Optimization Score">
                                                <i class="fa-solid fa-chart-pie"></i>
                                                SEO: {{ $score }}/100
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Category & Processing -->
                            <td class="td-category">
                                <div class="category-cell-content">
                                    <span class="product-cat-tag">
                                        <i class="fa-solid fa-wheat-awn"></i>
                                        <span>{{ $product->category }}</span>
                                    </span>
                                    @if($product->processing)
                                        <span class="product-processing-note" title="Milling & Processing">
                                            <i class="fa-solid fa-gear"></i>
                                            {{ Str::limit($product->processing, 26) }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Pack Sizes -->
                            <td class="td-sizes">
                                <div class="pack-sizes-container">
                                    @if(!empty($product->sizes_list))
                                        @foreach($product->sizes_list as $size)
                                            <span class="pack-size-pill">{{ $size }}</span>
                                        @endforeach
                                    @else
                                        <span style="font-size: 0.75rem; color: #94a3b8; font-style: italic;">No packs specified</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Mega Menu Featured Toggle -->
                            <td class="td-featured">
                                <form action="{{ route('admin.products.toggle-featured', $product) }}" method="POST" style="margin: 0; display: inline-block;">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="mega-menu-toggle-btn {{ $product->is_featured ? 'is-featured' : 'is-standard' }}"
                                        title="{{ $product->is_featured ? 'Click to remove from navbar mega menu' : 'Click to feature in navbar mega menu' }}"
                                    >
                                        <i class="fa-solid {{ $product->is_featured ? 'fa-star' : 'fa-star' }}"></i>
                                        <span>{{ $product->is_featured ? 'Featured' : 'Standard' }}</span>
                                    </button>
                                </form>
                            </td>

                            <!-- Live Status Toggle -->
                            <td class="td-status">
                                <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST" id="statusForm{{ $product->id }}" style="margin: 0; display: inline-flex; flex-direction: column; align-items: center; gap: 4px;">
                                    @csrf
                                    <label class="product-switch" title="Toggle active status">
                                        <input type="checkbox" {{ $product->is_active ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="product-slider"></span>
                                    </label>
                                    <span class="status-indicator-label {{ $product->is_active ? 'status-live' : 'status-draft' }}">
                                        <span class="status-dot"></span>
                                        {{ $product->is_active ? 'Live Online' : 'Draft' }}
                                    </span>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="td-actions">
                                <div class="product-action-group">
                                    <!-- View Live Public Page -->
                                    <a
                                        href="{{ route('product-details', ['product' => $product->slug]) }}"
                                        target="_blank"
                                        class="prod-action-btn btn-view"
                                        title="View Live Public Product Page"
                                    >
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>

                                    <!-- Edit Product -->
                                    <a
                                        href="{{ route('admin.products.edit', $product) }}"
                                        class="prod-action-btn btn-edit"
                                        title="Edit Product Details"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Product with Modal -->
                                    <button
                                        type="button"
                                        class="prod-action-btn btn-delete"
                                        title="Delete Product"
                                        onclick="openDeleteModal('{{ $product->id }}', '{{ addslashes($product->name) }}', '{{ route('admin.products.destroy', $product) }}')"
                                    >
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="td-empty">
                                <div class="empty-icon-circle">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                                <h4 class="empty-title">No Products Match Your Criteria</h4>
                                <p class="empty-desc">
                                    {{ request('search') || request('category') || request('status') ? 'Try resetting your search query or filters to browse all catalog items.' : 'Get started by creating your first flour product package.' }}
                                </p>
                                @if(request('search') || request('category') || request('status'))
                                    <a href="{{ route('admin.products.index') }}" class="btn-product-secondary">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <span>Reset All Filters</span>
                                    </a>
                                @else
                                    <a href="{{ route('admin.products.create') }}" class="btn-product-primary">
                                        <i class="fa-solid fa-plus"></i>
                                        <span>Create First Product</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="products-pagination-bar">
                <div class="pagination-info">
                    Showing <strong>{{ $products->firstItem() }}</strong> to <strong>{{ $products->lastItem() }}</strong> of <strong>{{ $products->total() }}</strong> total products
                </div>
                <div class="pagination-controls">
                    {{ $products->appends(request()->query())->links('admin.layouts.pagination') }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Syndron High-End Delete Confirmation Modal -->
<div class="syndron-modal-backdrop" id="deleteModalBackdrop" style="display: none;">
    <div class="syndron-modal-dialog" id="deleteModalDialog" role="dialog" aria-modal="true">
        <button type="button" class="modal-close-btn" onclick="closeDeleteModal()" aria-label="Close modal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="modal-hero-icon-box">
            <div class="icon-ring pulse-slow"></div>
            <div class="icon-inner danger">
                <i class="fa-solid fa-trash-can"></i>
            </div>
        </div>

        <div class="modal-content-area">
            <h3 class="modal-title">Delete Product?</h3>
            <p class="modal-desc">
                Are you sure you want to permanently delete <strong id="deleteTargetTitle" class="highlight-target">this product</strong>? This action cannot be undone.
            </p>

            <div class="modal-callout-warning">
                <i class="fa-solid fa-triangle-exclamation warning-icon"></i>
                <div class="warning-text">
                    This product will be removed from the online catalog and the navbar mega menu.
                </div>
            </div>
        </div>

        <div class="modal-actions-footer">
            <button type="button" class="btn-modal btn-modal-cancel" onclick="closeDeleteModal()">
                <span>Cancel</span>
            </button>
            <form id="deleteForm" method="POST" action="" style="margin: 0; flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal btn-modal-danger" id="confirmDeleteBtn">
                    <i class="fa-solid fa-trash-can"></i>
                    <span>Yes, Delete Product</span>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* ──────────────────────────────────────────────────────────────────────────
   Products Directory Scoped Modern Styles
   ────────────────────────────────────────────────────────────────────────── */

/* Header Banner */
.products-header-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1.25rem;
    flex-wrap: wrap;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}
.products-header-title-box {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.products-header-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(239, 128, 28, 0.16), rgba(239, 128, 28, 0.06));
    color: #EF801C;
    border: 1px solid rgba(239, 128, 28, 0.22);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}
.products-page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    display: flex;
    align-items: center;
    gap: 0.65rem;
    margin: 0 0 0.25rem;
    line-height: 1.2;
}
.products-count-badge {
    font-size: 0.725rem;
    font-weight: 700;
    color: #EF801C;
    background: rgba(239, 128, 28, 0.12);
    border: 1px solid rgba(239, 128, 28, 0.25);
    padding: 3px 10px;
    border-radius: 9999px;
    letter-spacing: 0.02em;
}
.products-page-desc {
    font-size: 0.85rem;
    color: #64748b;
    margin: 0;
}
.products-header-actions {
    display: flex;
    gap: 0.75rem;
    align-items: center;
    flex-wrap: wrap;
}
.btn-product-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.65rem 1.25rem;
    background: linear-gradient(135deg, #EF801C 0%, #f97316 100%);
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 700;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(239, 128, 28, 0.25);
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}
.btn-product-primary:hover {
    transform: translateY(-1.5px);
    box-shadow: 0 6px 18px rgba(239, 128, 28, 0.35);
    color: #ffffff;
}
.btn-product-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.65rem 1.15rem;
    background: #f8fafc;
    color: #475569;
    border: 1.5px solid #e2e8f0;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.2s ease;
}
.btn-product-secondary:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    color: #0f172a;
    transform: translateY(-1px);
}

/* 4 Top KPI Cards */
.products-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.25rem;
    margin-bottom: 1.5rem;
}
.products-kpi-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    padding: 1.15rem 1.25rem;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
}
.products-kpi-card:not(.static):hover {
    border-color: #EF801C;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}
.products-kpi-card.active-kpi {
    border-color: #EF801C;
    background: #fffdfa;
    box-shadow: 0 0 0 2px rgba(239, 128, 28, 0.15);
}
.kpi-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.65rem;
}
.kpi-label {
    font-size: 0.725rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #64748b;
}
.kpi-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.icon-orange { background: #fff7ed; color: #ea580c; border: 1px solid #fed7aa; }
.icon-green  { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
.icon-amber  { background: #fefce8; color: #ca8a04; border: 1px solid #fef08a; }
.icon-blue   { background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }

.kpi-value {
    font-size: 1.85rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.1;
    margin-bottom: 0.75rem;
}
.kpi-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.5rem;
    padding-top: 0.65rem;
    border-top: 1px dashed #f1f5f9;
}
.kpi-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.725rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
}
.pill-orange { background: #fff7ed; color: #ea580c; }
.pill-green  { background: #f0fdf4; color: #16a34a; }
.pill-amber  { background: #fefce8; color: #ca8a04; }
.pill-blue   { background: #eff6ff; color: #2563eb; }
.kpi-subtext {
    font-size: 0.725rem;
    color: #94a3b8;
}

/* Filter Card */
.products-filter-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 0.85rem 1.15rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.products-filter-form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
}
.products-filter-left {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    flex: 1;
}
.products-search-box {
    position: relative;
    min-width: 240px;
    max-width: 320px;
    flex: 1;
}
.products-search-box .search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.85rem;
    color: #94a3b8;
    pointer-events: none;
}
.products-search-input {
    width: 100%;
    padding: 0.55rem 2rem 0.55rem 2.25rem;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 0.85rem;
    background: #f8fafc;
    color: #1e293b;
    outline: none;
    transition: all 0.2s ease;
}
.products-search-input:focus {
    background: #ffffff;
    border-color: #EF801C;
    box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.12);
}
.search-clear-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.8rem;
    text-decoration: none;
}
.search-clear-btn:hover { color: #ef4444; }

.products-select-box {
    position: relative;
    min-width: 170px;
}
.products-select-box .select-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.8rem;
    color: #94a3b8;
    pointer-events: none;
}
.products-select-input {
    width: 100%;
    padding: 0.55rem 1rem 0.55rem 2.1rem;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 0.85rem;
    background: #f8fafc;
    color: #1e293b;
    font-weight: 600;
    outline: none;
    cursor: pointer;
    transition: all 0.2s ease;
}
.products-select-input:focus {
    background: #ffffff;
    border-color: #EF801C;
    box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.12);
}

.products-status-pills {
    display: inline-flex;
    background: #f1f5f9;
    padding: 3px;
    border-radius: 10px;
    gap: 3px;
}
.status-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 0.4rem 0.8rem;
    font-size: 0.775rem;
    font-weight: 600;
    color: #64748b;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.15s ease;
}
.status-pill:hover {
    color: #0f172a;
}
.status-pill.active {
    background: #ffffff;
    color: #0f172a;
    font-weight: 700;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
}
.status-pill .pill-badge {
    font-size: 0.675rem;
    background: #e2e8f0;
    color: #475569;
    padding: 1px 6px;
    border-radius: 999px;
}
.status-pill.active .pill-badge {
    background: rgba(239, 128, 28, 0.15);
    color: #ea580c;
}

.products-filter-right {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.btn-filter-apply {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.55rem 1rem;
    background: linear-gradient(135deg, #EF801C 0%, #f97316 100%);
    color: #ffffff;
    font-size: 0.825rem;
    font-weight: 700;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(239,128,28,0.25);
    transition: all 0.2s ease;
}
.btn-filter-apply:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(239,128,28,0.35);
}
.btn-filter-reset {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.55rem 0.85rem;
    background: #f8fafc;
    color: #64748b;
    border: 1px solid #e2e8f0;
    font-size: 0.825rem;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
}
.btn-filter-reset:hover {
    background: #ffffff;
    color: #0f172a;
    border-color: #cbd5e1;
}

/* Products Table Card */
.products-table-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    overflow: hidden;
    margin-bottom: 2rem;
}
.products-table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    padding: 1.15rem 1.5rem;
    border-bottom: 1px solid #f1f5f9;
}
.products-table-header-left {
    display: flex;
    align-items: center;
    gap: 0.85rem;
}
.table-header-icon-box {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #EF801C;
    font-size: 1rem;
}
.table-header-title {
    font-size: 1.05rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 2px;
}
.table-header-desc {
    font-size: 0.8rem;
    color: #64748b;
    margin: 0;
}
.table-header-tip {
    font-size: 0.775rem;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 6px;
    background: #f8fafc;
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}
.table-header-tip i { color: #EF801C; }

.products-table-container {
    overflow-x: auto;
    width: 100%;
}
.products-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}
.products-table thead tr {
    background: #f8fafc;
    border-bottom: 1.5px solid #e2e8f0;
}
.products-table th {
    padding: 0.95rem 1.25rem;
    font-size: 0.725rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #64748b;
}
.th-product  { width: 38%; min-width: 320px; }
.th-category { width: 18%; min-width: 160px; }
.th-sizes    { width: 16%; min-width: 140px; }
.th-featured { width: 12%; text-align: center; }
.th-status   { width: 10%; text-align: center; }
.th-actions  { width: 6%; text-align: right; }

.product-row {
    border-bottom: 1px solid #f1f5f9;
    transition: background 0.15s ease;
}
.product-row:hover {
    background: #fafaf9;
}
.products-table td {
    padding: 1.1rem 1.25rem;
    vertical-align: middle;
}

/* Product Identity Column */
.product-identity-box {
    display: flex;
    align-items: center;
    gap: 1.15rem;
}
.product-avatar-card {
    width: 62px;
    height: 62px;
    border-radius: 12px;
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 4px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    flex-shrink: 0;
    transition: all 0.2s ease;
}
.product-avatar-card:hover {
    border-color: #EF801C;
    transform: scale(1.05);
}
.product-avatar-card img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.product-meta-col {
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.product-title-row {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}
.product-link {
    font-size: 0.98rem;
    font-weight: 800;
    color: #0f172a;
    text-decoration: none;
    line-height: 1.3;
    transition: color 0.15s ease;
}
.product-link:hover {
    color: #EF801C;
}
.product-order-pill {
    font-size: 0.675rem;
    font-weight: 700;
    color: #64748b;
    background: #f1f5f9;
    padding: 1px 6px;
    border-radius: 4px;
}
.product-subtitle-text {
    font-size: 0.8rem;
    color: #64748b;
    line-height: 1.35;
    max-width: 380px;
}
.product-badges-row {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 4px;
    flex-wrap: wrap;
}
.product-slug-chip {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.7rem;
    font-family: monospace;
    color: #64748b;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 2px 8px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.15s ease;
}
.product-slug-chip:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    color: #0f172a;
}
.product-seo-chip {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
}
.seo-high { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
.seo-med  { background: #fefce8; color: #ca8a04; border: 1px solid #fef08a; }
.seo-low  { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

/* Category & Processing */
.category-cell-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.product-cat-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.775rem;
    font-weight: 700;
    color: #475569;
    background: #f1f5f9;
    border: 1px solid #e2e8f0;
    padding: 4px 10px;
    border-radius: 6px;
    width: fit-content;
}
.product-cat-tag i { color: #EF801C; font-size: 0.75rem; }
.product-processing-note {
    font-size: 0.725rem;
    color: #94a3b8;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

/* Pack Sizes */
.pack-sizes-container {
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
}
.pack-size-pill {
    font-size: 0.75rem;
    font-weight: 700;
    color: #1e293b;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    padding: 3px 8px;
    border-radius: 6px;
    letter-spacing: 0.02em;
}

/* Mega Menu Featured Button */
.mega-menu-toggle-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    border: 1.5px solid transparent;
    cursor: pointer;
    transition: all 0.2s ease;
}
.mega-menu-toggle-btn.is-featured {
    background: #fffbeb;
    color: #b45309;
    border-color: #fde68a;
    box-shadow: 0 2px 6px rgba(245, 158, 11, 0.12);
}
.mega-menu-toggle-btn.is-featured:hover {
    background: #fef3c7;
    border-color: #fcd34d;
    transform: translateY(-1px);
}
.mega-menu-toggle-btn.is-standard {
    background: #f8fafc;
    color: #94a3b8;
    border-color: #e2e8f0;
}
.mega-menu-toggle-btn.is-standard:hover {
    background: #f1f5f9;
    color: #475569;
    border-color: #cbd5e1;
}

/* Status Switch */
.product-switch {
    position: relative;
    display: inline-block;
    width: 38px;
    height: 20px;
}
.product-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.product-slider {
    position: absolute;
    cursor: pointer;
    inset: 0;
    background-color: #cbd5e1;
    transition: .25s;
    border-radius: 34px;
}
.product-slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .25s;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}
.product-switch input:checked + .product-slider {
    background-color: #10b981;
}
.product-switch input:checked + .product-slider:before {
    transform: translateX(18px);
}
.status-indicator-label {
    font-size: 0.675rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.status-live  { color: #10b981; }
.status-draft { color: #94a3b8; }
.status-dot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
}
.status-live .status-dot  { background: #10b981; }
.status-draft .status-dot { background: #94a3b8; }

/* Action Buttons */
.product-action-group {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 0.35rem;
}
.prod-action-btn {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    text-decoration: none;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    cursor: pointer;
    transition: all 0.15s ease;
}
.btn-view:hover {
    background: #eff6ff;
    border-color: #bfdbfe;
    color: #2563eb;
    transform: translateY(-1px);
}
.btn-edit:hover {
    background: #fff7ed;
    border-color: #fed7aa;
    color: #ea580c;
    transform: translateY(-1px);
}
.btn-delete:hover {
    background: #fef2f2;
    border-color: #fecaca;
    color: #dc2626;
    transform: translateY(-1px);
}

/* Empty State */
.td-empty {
    padding: 3.5rem 1.5rem !important;
    text-align: center;
}
.empty-icon-circle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: #94a3b8;
    font-size: 1.5rem;
}
.empty-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 0.4rem;
}
.empty-desc {
    font-size: 0.85rem;
    color: #64748b;
    margin: 0 auto 1.25rem;
    max-width: 400px;
}

/* Pagination Bar */
.products-pagination-bar {
    padding: 1.15rem 1.5rem;
    border-top: 1px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}
.pagination-info {
    font-size: 0.825rem;
    color: #64748b;
}

/* Responsive Breakpoints */
@media (max-width: 1200px) {
    .products-kpi-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 768px) {
    .products-kpi-grid {
        grid-template-columns: 1fr;
    }
    .products-header-banner {
        flex-direction: column;
        align-items: flex-start;
    }
    .products-filter-form {
        flex-direction: column;
        align-items: stretch;
    }
    .products-filter-left {
        flex-direction: column;
        align-items: stretch;
    }
    .products-search-box {
        max-width: 100%;
    }
    .products-status-pills {
        overflow-x: auto;
    }
}

/* Dark Mode Overrides */
html.dark .products-header-banner,
html.dark .products-kpi-card,
html.dark .products-filter-card,
html.dark .products-table-card {
    background: #1e293b;
    border-color: #334155;
}
html.dark .products-page-title,
html.dark .kpi-value,
html.dark .table-header-title,
html.dark .product-link {
    color: #f8fafc;
}
html.dark .products-table thead tr {
    background: #0f172a;
    border-color: #334155;
}
html.dark .product-row {
    border-color: #334155;
}
html.dark .product-row:hover {
    background: #182234;
}
html.dark .product-avatar-card {
    background: #0f172a;
    border-color: #334155;
}
html.dark .product-slug-chip,
html.dark .pack-size-pill,
html.dark .product-cat-tag,
html.dark .prod-action-btn,
html.dark .products-search-input,
html.dark .products-select-input,
html.dark .products-status-pills,
html.dark .table-header-tip {
    background: #0f172a;
    border-color: #334155;
    color: #cbd5e1;
}
html.dark .status-pill.active {
    background: #334155;
    color: #f8fafc;
}
</style>

@push('scripts')
<script>
    function openDeleteModal(productId, productName, deleteUrl) {
        document.getElementById('deleteTargetTitle').innerText = `"${productName}"`;
        document.getElementById('deleteForm').action = deleteUrl;

        const backdrop = document.getElementById('deleteModalBackdrop');
        backdrop.style.display = 'flex';
        setTimeout(() => backdrop.classList.add('is-open'), 10);
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        const backdrop = document.getElementById('deleteModalBackdrop');
        backdrop.classList.remove('is-open');
        setTimeout(() => {
            backdrop.style.display = 'none';
            document.body.style.overflow = '';
        }, 200);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>
@endpush
@endsection
