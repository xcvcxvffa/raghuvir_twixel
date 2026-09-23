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
<div class="settings-header-banner" style="margin-bottom: 1.75rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge" style="background: linear-gradient(135deg, rgba(239, 128, 28, 0.16), rgba(239, 128, 28, 0.06)); color: #EF801C; border: 1px solid rgba(239, 128, 28, 0.2);">
            <i class="fa-solid fa-boxes-stacked"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem;">
                <span>Products Directory</span>
                <span class="header-count-badge">{{ $totalCount }} Products</span>
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Manage your flour varieties, pack sizes, specifications, and public website catalog items.
            </p>
        </div>
    </div>

    <!-- Top Action Buttons -->
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('products') }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="Preview public catalog in new tab">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>View Public Catalog</span>
        </a>
        <a href="{{ route('admin.products.create') }}" class="btn-syndron btn-syndron-primary">
            <i class="fa-solid fa-plus"></i>
            <span>Add New Product</span>
            <kbd class="shortcut-key">Ctrl+N</kbd>
        </a>
    </div>
</div>

<!-- 4 Top KPI Metric Summary Cards -->
<div class="metrics-row" style="margin-bottom: 1.5rem;">
    <!-- Card 1: Total Catalog -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Catalog Range</span>
            <div class="metric-badge-icon orange">
                <i class="fa-solid fa-wheat-awn"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $totalCount ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-layer-group"></i>
                <span>Total Items</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Flour varieties</span>
        </div>
    </div>

    <!-- Card 2: Live on Website -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Live on Website</span>
            <div class="metric-badge-icon green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $activeCount ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-signal"></i>
                <span>Published</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Active in store</span>
        </div>
    </div>

    <!-- Card 3: Featured in Menu -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Featured in Menu</span>
            <div class="metric-badge-icon brown">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $featuredCount ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #f59e0b;">
                <i class="fa-solid fa-bars-staggered"></i>
                <span>Top Navigation</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Mega-menu picks</span>
        </div>
    </div>

    <!-- Card 4: Categories Count -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Categories</span>
            <div class="metric-badge-icon blue">
                <i class="fa-solid fa-tags"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $categoriesCount ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #3b82f6;">
                <i class="fa-solid fa-shapes"></i>
                <span>Taxonomies</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Unique categories</span>
        </div>
    </div>
</div>

<!-- Search & Filter Bar Card -->
<div class="card-syndron" style="margin-bottom: 1.5rem;">
    <div class="card-syndron-body" style="padding: 14px 18px;">
        <form action="{{ route('admin.products.index') }}" method="GET" class="product-filter-bar">
            <!-- Left Controls: Search & Category -->
            <div class="product-filter-left">
                <!-- Search Input -->
                <div class="input-with-icon" style="min-width: 220px; flex: 1; max-width: 320px;">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control-admin"
                        placeholder="Search products by name, slug..."
                    >
                    <i class="fa-solid fa-magnifying-glass input-icon"></i>
                </div>

                <!-- Category Filter -->
                <div style="min-width: 170px;">
                    <select
                        name="category"
                        class="form-control-admin"
                        onchange="this.form.submit()"
                        style="cursor: pointer;"
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
                <div class="filter-pills-nav">
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => '']) }}"
                        class="btn-filter-pill {{ empty(request('status')) ? 'active' : '' }}"
                    >
                        All ({{ $totalCount }})
                    </a>
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}"
                        class="btn-filter-pill {{ request('status') === 'active' ? 'active' : '' }}"
                    >
                        Live ({{ $activeCount }})
                    </a>
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => 'draft']) }}"
                        class="btn-filter-pill {{ request('status') === 'draft' ? 'active' : '' }}"
                    >
                        Drafts ({{ $totalCount - $activeCount }})
                    </a>
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => 'featured']) }}"
                        class="btn-filter-pill {{ request('status') === 'featured' ? 'active' : '' }}"
                    >
                        Featured ({{ $featuredCount }})
                    </a>
                </div>
            </div>

            <!-- Right Buttons: Apply & Clear Filters -->
            <div class="product-filter-right">
                @if(request()->filled('search') || (request()->filled('category') && request('category') !== 'all') || request()->filled('status'))
                    <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" title="Clear all search and filters" style="color: #64748b;">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>Reset</span>
                    </a>
                @endif
                <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                    <i class="fa-solid fa-filter"></i>
                    <span>Apply Filter</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Products Table Card -->
<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill">
                    <i class="fa-solid fa-table-list"></i>
                </div>
                <span>Catalog Items Directory</span>
            </h3>
            <p class="card-syndron-desc">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} recorded products.</p>
        </div>
        <div style="font-size: 0.775rem; color: var(--muted-foreground);">
            <i class="fa-solid fa-circle-info" style="color: var(--accent); margin-right: 4px;"></i>
            Click on any product title to open the 2-column editor.
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 900px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 76px; text-align: center;">Pack</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground);">Product Name & Identity</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 140px;">Category</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 140px;">Pack Sizes</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 120px; text-align: center;">Mega Menu</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 130px; text-align: center;">Live Status</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.725rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); text-align: right; width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="product-table-row">
                            <!-- Pack Image Thumbnail -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <a href="{{ route('admin.products.edit', $product) }}" class="product-thumb-box" title="Edit {{ $product->name }}">
                                    <img
                                        src="{{ $product->image_url }}"
                                        alt="{{ $product->image_alt ?: $product->name }}"
                                        loading="lazy"
                                    >
                                </a>
                            </td>

                            <!-- Product Name & Subtitle -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.2rem; line-height: 1.35;">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="product-name-link">
                                        {{ $product->name }}
                                    </a>
                                </div>
                                <div style="font-size: 0.775rem; color: var(--muted-foreground); margin-bottom: 0.35rem;">
                                    {{ $product->subtitle ?: Str::limit($product->short_description, 75) }}
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                    <span class="product-slug-pill">
                                        <i class="fa-solid fa-link" style="font-size: 0.625rem; opacity: 0.7;"></i>
                                        /product/{{ $product->slug }}
                                    </span>
                                    <span>•</span>
                                    @php
                                        $score = $product->seo_score;
                                        $badgeColor = $score >= 80 ? '#10b981' : ($score >= 55 ? '#f59e0b' : '#ef4444');
                                        $badgeBg = $score >= 80 ? 'rgba(16, 185, 129, 0.12)' : ($score >= 55 ? 'rgba(245, 158, 11, 0.12)' : 'rgba(239, 68, 68, 0.12)');
                                    @endphp
                                    <span class="seo-score-badge" style="color: {{ $badgeColor }}; background: {{ $badgeBg }};" title="Real-time SEO Score">
                                        <i class="fa-solid fa-chart-pie"></i>
                                        SEO: {{ $score }}/100
                                    </span>
                                </div>
                            </td>

                            <!-- Category -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <span class="product-category-pill">
                                    <i class="fa-solid fa-tag"></i>
                                    <span>{{ $product->category }}</span>
                                </span>
                            </td>

                            <!-- Pack Sizes -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div style="display: flex; gap: 4px; flex-wrap: wrap;">
                                    @foreach($product->sizes_list as $size)
                                        <span class="pack-size-badge">{{ $size }}</span>
                                    @endforeach
                                </div>
                            </td>

                            <!-- Mega Menu Featured Toggle -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <form action="{{ route('admin.products.toggle-featured', $product) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="mega-menu-btn {{ $product->is_featured ? 'featured' : 'standard' }}"
                                        title="{{ $product->is_featured ? 'Click to unfeature from navbar menu' : 'Click to feature in navbar menu' }}"
                                    >
                                        <i class="fa-solid {{ $product->is_featured ? 'fa-star' : 'fa-star' }}"></i>
                                        <span>{{ $product->is_featured ? 'Featured' : 'Standard' }}</span>
                                    </button>
                                </form>
                            </td>

                            <!-- Live Status Toggle -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST" id="statusForm{{ $product->id }}" style="margin: 0; display: inline-flex; flex-direction: column; align-items: center;">
                                    @csrf
                                    <label class="switch" style="position: relative; display: inline-block; width: 42px; height: 22px;">
                                        <input type="checkbox" {{ $product->is_active ? 'checked' : '' }} onchange="this.form.submit()" style="opacity: 0; width: 0; height: 0;">
                                        <span class="slider round"></span>
                                    </label>
                                    <span style="font-size: 0.7rem; font-weight: 700; margin-top: 3px; color: {{ $product->is_active ? '#10b981' : '#94a3b8' }}; display: inline-flex; align-items: center; gap: 3px;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: {{ $product->is_active ? '#10b981' : '#94a3b8' }};"></span>
                                        {{ $product->is_active ? 'Live Online' : 'Draft' }}
                                    </span>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: flex; justify-content: flex-end; gap: 0.45rem; align-items: center;">
                                    <!-- View Live Public Page -->
                                    <a
                                        href="{{ route('product-details', ['product' => $product->slug]) }}"
                                        target="_blank"
                                        class="table-action-btn"
                                        title="View Live Public Product Page"
                                    >
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>

                                    <!-- Edit Product -->
                                    <a
                                        href="{{ route('admin.products.edit', $product) }}"
                                        class="table-action-btn table-action-btn-primary"
                                        title="Edit Product Details"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Product with Modal -->
                                    <button
                                        type="button"
                                        class="table-action-btn table-action-btn-danger"
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
                            <td colspan="7" style="padding: 3.5rem 1.5rem; text-align: center;">
                                <div style="width: 72px; height: 72px; border-radius: 50%; background: var(--secondary); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem; color: var(--muted-foreground); font-size: 1.75rem;">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                                <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.4rem;">No Products Match Your Criteria</h4>
                                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin-bottom: 1.5rem; max-width: 420px; margin-left: auto; margin-right: auto;">
                                    {{ request('search') || request('category') || request('status') ? 'Try resetting your search query or filters to browse all catalog items.' : 'Get started by creating your first flour product package.' }}
                                </p>
                                @if(request('search') || request('category') || request('status'))
                                    <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <span>Reset Filters</span>
                                    </a>
                                @else
                                    <a href="{{ route('admin.products.create') }}" class="btn-syndron btn-syndron-primary">
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
            <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div style="font-size: 0.825rem; color: var(--muted-foreground);">
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
        // Shortcut Ctrl+N -> New Product
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            window.location.href = "{{ route('admin.products.create') }}";
        }
    });
</script>
@endpush
@endsection
