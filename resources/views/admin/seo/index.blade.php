@extends('admin.layouts.app')

@section('title', 'SEO Management Hub - Static Pages, Products & Blogs - Raghuvir Atta Admin')

@section('content')
<style>
/* ── Modern SEO Hub Custom Theme Tokens ───────────────────────────────────── */
.seo-hub-header {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    padding: 1.5rem 1.75rem;
    box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1.25rem;
    flex-wrap: wrap;
    margin-bottom: 1.75rem;
    position: relative;
    overflow: hidden;
}
.seo-hub-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: linear-gradient(90deg, #10b981 0%, #3b82f6 50%, #EF801C 100%);
}
.seo-hub-icon-badge {
    width: 52px;
    height: 52px;
    border-radius: var(--radius-lg);
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.08) 100%);
    border: 1px solid rgba(16, 185, 129, 0.25);
    color: #10b981;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.45rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.12);
}
html.dark .seo-hub-icon-badge {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.25) 0%, rgba(5, 150, 105, 0.12) 100%);
    color: #34d399;
}

/* ── Modern KPI Cards ─────────────────────────────────────────────────────── */
.seo-metric-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    padding: 1.25rem 1.4rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 0.85rem;
    position: relative;
    overflow: hidden;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.seo-metric-card:hover {
    transform: translateY(-3px);
    border-color: var(--border-strong);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
}
.seo-metric-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.5rem;
}
.seo-metric-label {
    font-size: 0.74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--muted-foreground);
}
.seo-metric-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.05rem;
    flex-shrink: 0;
}
.seo-metric-val {
    font-size: 1.85rem;
    font-weight: 800;
    color: var(--foreground);
    line-height: 1.1;
    font-family: var(--font-heading, inherit);
    display: flex;
    align-items: baseline;
    gap: 0.35rem;
}
.seo-metric-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.76rem;
    color: var(--muted-foreground);
    border-top: 1px solid var(--border);
    padding-top: 0.65rem;
    margin-top: 0.25rem;
}

/* ── Segmented Navigation Hub Bar ─────────────────────────────────────────── */
.seo-tabs-bar {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    padding: 6px;
    display: flex;
    gap: 6px;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    overflow-x: auto;
}
.seo-tab-btn {
    flex: 1;
    min-width: 190px;
    padding: 10px 16px;
    border-radius: var(--radius-lg);
    text-decoration: none;
    font-size: 0.86rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    color: var(--muted-foreground);
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    border: 1px solid transparent;
}
.seo-tab-btn:hover {
    color: var(--foreground);
    background: var(--secondary);
}
.seo-tab-btn.active-pages {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.12) 0%, rgba(5, 150, 105, 0.06) 100%);
    color: #059669;
    border-color: rgba(16, 185, 129, 0.3);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.08);
}
html.dark .seo-tab-btn.active-pages {
    color: #34d399;
    background: rgba(16, 185, 129, 0.15);
    border-color: rgba(16, 185, 129, 0.35);
}
.seo-tab-btn.active-products {
    background: linear-gradient(135deg, rgba(239, 128, 28, 0.12) 0%, rgba(217, 119, 6, 0.06) 100%);
    color: #d97706;
    border-color: rgba(239, 128, 28, 0.3);
    box-shadow: 0 4px 12px rgba(239, 128, 28, 0.08);
}
html.dark .seo-tab-btn.active-products {
    color: #fbbf24;
    background: rgba(239, 128, 28, 0.15);
    border-color: rgba(239, 128, 28, 0.35);
}
.seo-tab-btn.active-blogs {
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.12) 0%, rgba(109, 40, 217, 0.06) 100%);
    color: #7c3aed;
    border-color: rgba(139, 92, 246, 0.3);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.08);
}
html.dark .seo-tab-btn.active-blogs {
    color: #a78bfa;
    background: rgba(139, 92, 246, 0.15);
    border-color: rgba(139, 92, 246, 0.35);
}
.seo-tab-pill-count {
    padding: 2px 8px;
    border-radius: 9999px;
    font-size: 0.72rem;
    font-weight: 800;
}

/* ── Live Robots Interactive Toggle Pill ─────────────────────────────────── */
.robots-interactive-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 9999px;
    font-size: 0.74rem;
    font-weight: 700;
    cursor: pointer;
    border: 1px solid transparent;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    background: none;
}
.robots-interactive-badge:hover {
    transform: scale(1.05);
}
.robots-badge-indexed {
    background: rgba(16, 185, 129, 0.12);
    color: #059669;
    border-color: rgba(16, 185, 129, 0.3);
}
html.dark .robots-badge-indexed {
    background: rgba(16, 185, 129, 0.2);
    color: #34d399;
    border-color: rgba(16, 185, 129, 0.35);
}
.robots-badge-noindex {
    background: rgba(239, 68, 68, 0.12);
    color: #dc2626;
    border-color: rgba(239, 68, 68, 0.3);
}
html.dark .robots-badge-noindex {
    background: rgba(239, 68, 68, 0.2);
    color: #f87171;
    border-color: rgba(239, 68, 68, 0.35);
}
.dot-pulse-indexed {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.3);
}
.dot-pulse-noindex {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #ef4444;
    box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.3);
}

/* ── Character Length Pill Badges ─────────────────────────────────────────── */
.char-meter-pill {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 7px;
    border-radius: 9999px;
    font-size: 0.7rem;
    font-weight: 700;
}
.char-meter-optimal {
    background: rgba(16, 185, 129, 0.14);
    color: #059669;
}
html.dark .char-meter-optimal {
    background: rgba(16, 185, 129, 0.22);
    color: #34d399;
}
.char-meter-warning {
    background: rgba(245, 158, 11, 0.14);
    color: #d97706;
}
html.dark .char-meter-warning {
    background: rgba(245, 158, 11, 0.22);
    color: #fbbf24;
}
.char-meter-danger {
    background: rgba(239, 68, 68, 0.14);
    color: #dc2626;
}
html.dark .char-meter-danger {
    background: rgba(239, 68, 68, 0.22);
    color: #f87171;
}

/* ── Dynamic Feature Callout Banner ───────────────────────────────────────── */
.seo-dynamic-callout {
    background: linear-gradient(135deg, rgba(239, 128, 28, 0.08) 0%, rgba(217, 119, 6, 0.03) 100%);
    border: 1px solid rgba(239, 128, 28, 0.22);
    border-radius: var(--radius-xl);
    padding: 1.15rem 1.4rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}
.seo-dynamic-callout.blogs-theme {
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.08) 0%, rgba(109, 40, 217, 0.03) 100%);
    border-color: rgba(139, 92, 246, 0.22);
}
</style>

<!-- Page Breadcrumb Navigation -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Content &amp; Search Engine</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">SEO Management Hub</span>
</div>

<!-- Top Header & Action Banner -->
<div class="seo-hub-header">
    <div style="display: flex; align-items: center; gap: 1.25rem; flex-wrap: wrap;">
        <div class="seo-hub-icon-badge">
            <i class="fa-solid fa-magnifying-glass-chart"></i>
        </div>
        <div>
            <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem; flex-wrap: wrap;">
                <h1 class="page-title-main" style="margin-bottom: 0;">SEO Management Hub</h1>
                <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 800; font-size: 0.75rem; padding: 3px 10px; border-radius: 9999px;">
                    <i class="fa-solid fa-shield-halved" style="margin-right: 4px;"></i> {{ $totalAllItems }} URLs Tracked
                </span>
            </div>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Centralized SEO intelligence across <strong>{{ $totalPages }} Static Pages</strong>, <strong>{{ $totalProducts }} Dynamic Products</strong>, and <strong>{{ $totalBlogs }} Blog Articles</strong>. Automated Google snippets &amp; Open Graph tags.
            </p>
        </div>
    </div>

    <!-- Top Action Buttons -->
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ url('/') }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="Preview public website in new tab">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>Preview Website</span>
        </a>
    </div>
</div>

<!-- 4 Top KPI Metric Summary Cards -->
<div class="metrics-row" style="margin-bottom: 1.5rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 1rem;">
    
    <!-- Card 1: Total Tracked URLs -->
    <div class="seo-metric-card">
        <div class="seo-metric-top">
            <span class="seo-metric-label">Tracked URLs</span>
            <div class="seo-metric-icon-wrap" style="background: rgba(14, 165, 233, 0.12); color: #0284c7;">
                <i class="fa-solid fa-sitemap"></i>
            </div>
        </div>
        <div class="seo-metric-val">
            <span>{{ $totalAllItems }}</span>
            <span style="font-size: 0.8rem; font-weight: 600; color: var(--muted-foreground);">Total</span>
        </div>
        <div class="seo-metric-footer">
            <span style="display: inline-flex; align-items: center; gap: 4px; color: #0284c7; font-weight: 700;">
                <i class="fa-solid fa-layer-group"></i> {{ $totalPages }}p &bull; {{ $totalProducts }}prd &bull; {{ $totalBlogs }}b
            </span>
            <span>All Entities</span>
        </div>
    </div>

    <!-- Card 2: Site-Wide SEO Health -->
    <div class="seo-metric-card">
        <div class="seo-metric-top">
            <span class="seo-metric-label">SEO Health Score</span>
            <div class="seo-metric-icon-wrap" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                <i class="fa-solid fa-gauge-high"></i>
            </div>
        </div>
        <div class="seo-metric-val" style="color: {{ $averageScore >= 80 ? '#10b981' : ($averageScore >= 60 ? '#f59e0b' : '#ef4444') }};">
            <span>{{ $averageScore }}</span>
            <span style="font-size: 0.9rem; font-weight: 600; color: var(--muted-foreground);">/100</span>
        </div>
        <div class="seo-metric-footer">
            <span style="display: inline-flex; align-items: center; gap: 4px; color: #10b981; font-weight: 700;">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ $averageScore >= 80 ? 'Optimal' : ($averageScore >= 60 ? 'Moderate' : 'Needs Review') }}</span>
            </span>
            <span>Weighted Catalog</span>
        </div>
    </div>

    <!-- Card 3: Google Search Indexable URLs -->
    <div class="seo-metric-card">
        <div class="seo-metric-top">
            <span class="seo-metric-label">Google Indexable</span>
            <div class="seo-metric-icon-wrap" style="background: rgba(245, 158, 11, 0.12); color: #f59e0b;">
                <i class="fa-solid fa-robot"></i>
            </div>
        </div>
        @php
            $liveUrls = $indexedPages + $products->where('is_active', true)->count() + $blogs->where('is_published', true)->count();
        @endphp
        <div class="seo-metric-val">
            <span>{{ $liveUrls }}</span>
            <span style="font-size: 0.85rem; font-weight: 600; color: var(--muted-foreground);">/ {{ $totalAllItems }}</span>
        </div>
        <div class="seo-metric-footer">
            <span style="display: inline-flex; align-items: center; gap: 4px; color: #f59e0b; font-weight: 700;">
                <i class="fa-solid fa-arrow-trend-up"></i> index, follow
            </span>
            <span>Active &amp; Visible</span>
        </div>
    </div>

    <!-- Card 4: Social OG Media Cards Configured -->
    <div class="seo-metric-card">
        <div class="seo-metric-top">
            <span class="seo-metric-label">Social Share Ready</span>
            <div class="seo-metric-icon-wrap" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                <i class="fa-solid fa-share-nodes"></i>
            </div>
        </div>
        @php
            $totalOg = $ogConfigured + $products->whereNotNull('image')->count() + $blogs->whereNotNull('image')->count();
        @endphp
        <div class="seo-metric-val">
            <span>{{ $totalOg }}</span>
            <span style="font-size: 0.85rem; font-weight: 600; color: var(--muted-foreground);">Cards</span>
        </div>
        <div class="seo-metric-footer">
            <span style="display: inline-flex; align-items: center; gap: 4px; color: #EF801C; font-weight: 700;">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp / X
            </span>
            <span>Images Configured</span>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- 3 PRIMARY TABS: STATIC PAGES | DYNAMIC PRODUCTS | DYNAMIC BLOGS           -->
<!-- ========================================================================= -->
<div class="seo-tabs-bar">
    <a
        href="{{ route('admin.seo.index', ['tab' => 'pages']) }}"
        class="seo-tab-btn {{ $activeTab === 'pages' ? 'active-pages' : '' }}"
    >
        <i class="fa-solid fa-file-code"></i>
        <span>Static Website Pages</span>
        <span class="seo-tab-pill-count" style="{{ $activeTab === 'pages' ? 'background: rgba(16, 185, 129, 0.2); color: #059669;' : 'background: var(--secondary); color: var(--muted-foreground);' }}">
            {{ $totalPages }}
        </span>
    </a>

    <a
        href="{{ route('admin.seo.index', ['tab' => 'products']) }}"
        class="seo-tab-btn {{ $activeTab === 'products' ? 'active-products' : '' }}"
    >
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Dynamic Products SEO</span>
        <span class="seo-tab-pill-count" style="{{ $activeTab === 'products' ? 'background: rgba(239, 128, 28, 0.2); color: #d97706;' : 'background: var(--secondary); color: var(--muted-foreground);' }}">
            {{ $totalProducts }} Items
        </span>
    </a>

    <a
        href="{{ route('admin.seo.index', ['tab' => 'blogs']) }}"
        class="seo-tab-btn {{ $activeTab === 'blogs' ? 'active-blogs' : '' }}"
    >
        <i class="fa-solid fa-newspaper"></i>
        <span>Dynamic Blog Articles SEO</span>
        <span class="seo-tab-pill-count" style="{{ $activeTab === 'blogs' ? 'background: rgba(139, 92, 246, 0.2); color: #7c3aed;' : 'background: var(--secondary); color: var(--muted-foreground);' }}">
            {{ $totalBlogs }} Posts
        </span>
    </a>
</div>

<!-- Search & Status Filter Bar Card -->
<div class="card-syndron" style="margin-bottom: 1.5rem;">
    <div class="card-syndron-body" style="padding: 12px 18px;">
        <form action="{{ route('admin.seo.index') }}" method="GET" class="product-filter-bar" style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <input type="hidden" name="tab" value="{{ $activeTab }}">

            <!-- Left Controls: Search & Status Pills -->
            <div style="display: flex; gap: 0.85rem; align-items: center; flex-wrap: wrap; flex: 1;">
                <!-- Search Input with Instant Client Filter -->
                <div class="input-with-icon" style="min-width: 260px; flex: 1; max-width: 420px;">
                    <input
                        type="text"
                        name="search"
                        id="tableSearchInput"
                        value="{{ request('search') }}"
                        class="form-control-admin"
                        placeholder="Search by title, route, slug or keyword..."
                        onkeyup="filterTableRows(this.value)"
                    >
                    <i class="fa-solid fa-magnifying-glass input-icon"></i>
                </div>

                @if($activeTab === 'pages')
                    <!-- Status Filter Segmented Navigation Pills -->
                    <div class="filter-pills-nav">
                        <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}" class="btn-filter-pill {{ empty(request('status')) ? 'active' : '' }}">
                            All ({{ $totalPages }})
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'good']) }}" class="btn-filter-pill {{ request('status') === 'good' ? 'active' : '' }}">
                            Optimal &ge;80% ({{ $goodScoreCount }})
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'needs_work']) }}" class="btn-filter-pill {{ request('status') === 'needs_work' ? 'active' : '' }}">
                            Needs Work ({{ $needsWorkCount }})
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'indexed']) }}" class="btn-filter-pill {{ request('status') === 'indexed' ? 'active' : '' }}">
                            Indexed ({{ $indexedPages }})
                        </a>
                    </div>
                @endif
            </div>

            <!-- Right Buttons: Apply & Clear Filters -->
            <div style="display: flex; gap: 0.5rem; align-items: center;">
                @if(request()->filled('search') || request()->filled('status'))
                    <a href="{{ route('admin.seo.index', ['tab' => $activeTab]) }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" title="Clear all filters">
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

<!-- ========================================================================= -->
<!-- TAB 1: STATIC PAGES SEO DIRECTORY                                         -->
<!-- ========================================================================= -->
@if($activeTab === 'pages')
<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">
                    <i class="fa-solid fa-file-code"></i>
                </div>
                <span>Static Website Pages Directory</span>
            </h3>
            <p class="card-syndron-desc">Configure search engine titles, Google SERP snippets, robots rules, and social Open Graph tags.</p>
        </div>
        <div style="font-size: 0.775rem; color: var(--muted-foreground); background: var(--secondary); padding: 5px 12px; border-radius: 9999px; border: 1px solid var(--border);">
            <i class="fa-solid fa-circle-info" style="color: #10b981; margin-right: 4px;"></i>
            Click on any <strong>Robots pill</strong> to toggle indexing immediately.
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table" id="seoDataTable" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 960px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 220px;">Page Name &amp; Route</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 290px;">Meta Title &amp; Length</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 290px;">Meta Description</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 140px; text-align: center;">Robots (1-Click)</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 120px; text-align: center;">SEO Health</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); text-align: right; width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seos as $seo)
                        @php
                            $score = $seo->seo_score;
                            $titleLen = mb_strlen($seo->meta_title ?? '');
                            $descLen = mb_strlen($seo->meta_description ?? '');
                            $isNoindex = str_contains($seo->robots ?? '', 'noindex');
                        @endphp
                        <tr class="product-table-row seo-row" data-search="{{ strtolower($seo->page_name . ' ' . $seo->page_key . ' ' . $seo->meta_title . ' ' . $seo->meta_keywords) }}" style="transition: background 0.15s ease;">
                            <!-- Page Name & Route -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem; line-height: 1.35;">
                                    <a href="{{ route('admin.seo.edit', $seo->id) }}" class="product-name-link" style="color: var(--foreground); text-decoration: none;">
                                        {{ $seo->page_name }}
                                    </a>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;">
                                    <span style="font-family: monospace; font-size: 0.72rem; padding: 2px 7px; border-radius: 6px; background: rgba(14, 165, 233, 0.12); color: #0284c7; font-weight: 700;">
                                        {{ $seo->page_route }}
                                    </span>
                                    <span style="font-size: 0.7rem; color: var(--muted-foreground); font-family: monospace;">
                                        [{{ $seo->page_key }}]
                                    </span>
                                </div>
                            </td>

                            <!-- Meta Title -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.88rem; font-weight: 600; color: var(--foreground); line-height: 1.35; margin-bottom: 0.35rem;">
                                    {{ $seo->meta_title ?: '— No title defined —' }}
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.45rem; flex-wrap: wrap;">
                                    <span class="char-meter-pill {{ $titleLen >= 40 && $titleLen <= 65 ? 'char-meter-optimal' : ($titleLen > 0 ? 'char-meter-warning' : 'char-meter-danger') }}">
                                        <i class="fa-solid {{ $titleLen >= 40 && $titleLen <= 65 ? 'fa-circle-check' : 'fa-triangle-exclamation' }}" style="font-size: 0.65rem;"></i>
                                        {{ $titleLen }} chars {{ $titleLen >= 40 && $titleLen <= 65 ? '(Optimal)' : ($titleLen > 65 ? '(Too Long)' : '(Short)') }}
                                    </span>
                                    @if(!empty($seo->schema_type))
                                        <span style="font-size: 0.7rem; padding: 2px 7px; border-radius: var(--radius-sm); background: rgba(99, 102, 241, 0.12); color: #6366f1; font-weight: 700;">
                                            {{ $seo->schema_type }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Meta Description -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.82rem; color: var(--muted-foreground); line-height: 1.45; margin-bottom: 0.35rem;">
                                    {{ Str::limit($seo->meta_description, 95, '...') ?: '— No description set —' }}
                                </div>
                                <div>
                                    <span class="char-meter-pill {{ $descLen >= 120 && $descLen <= 165 ? 'char-meter-optimal' : ($descLen > 0 ? 'char-meter-warning' : 'char-meter-danger') }}">
                                        <i class="fa-solid {{ $descLen >= 120 && $descLen <= 165 ? 'fa-circle-check' : 'fa-triangle-exclamation' }}" style="font-size: 0.65rem;"></i>
                                        {{ $descLen }} chars {{ $descLen >= 120 && $descLen <= 165 ? '(Optimal)' : ($descLen > 165 ? '(Too Long)' : '(Short)') }}
                                    </span>
                                </div>
                            </td>

                            <!-- Robots (Clickable 1-Click AJAX Toggle) -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <button
                                    type="button"
                                    class="robots-interactive-badge {{ $isNoindex ? 'robots-badge-noindex' : 'robots-badge-indexed' }}"
                                    id="robotsBtn-{{ $seo->id }}"
                                    onclick="toggleRobotsAjax({{ $seo->id }}, '{{ route('admin.seo.toggle-robots', $seo->id) }}')"
                                    title="Click to toggle between index and noindex"
                                >
                                    @if($isNoindex)
                                        <span class="dot-pulse-noindex"></span>
                                        <span>noindex</span>
                                    @else
                                        <span class="dot-pulse-indexed"></span>
                                        <span>index</span>
                                    @endif
                                </button>
                            </td>

                            <!-- SEO Score -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <div style="display: inline-flex; flex-direction: column; align-items: center; gap: 4px;">
                                    <span style="font-size: 0.95rem; font-weight: 800; color: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }};">
                                        {{ $score }}%
                                    </span>
                                    <div style="width: 55px; height: 5px; background: var(--border); border-radius: 9999px; overflow: hidden;">
                                        <div style="width: {{ $score }}%; height: 100%; background: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }}; border-radius: 9999px;"></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: flex; gap: 0.45rem; justify-content: flex-end; align-items: center;">
                                    <a href="{{ url($seo->page_route) }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="padding: 0 9px; height: 32px;" title="View Live Page in New Tab">
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem;"></i>
                                    </a>
                                    <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn-syndron btn-syndron-primary btn-syndron-sm" style="height: 32px; padding: 0 12px;">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit SEO</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 3.5rem 1.5rem; text-align: center; color: var(--muted-foreground);">
                                <div style="width: 56px; height: 56px; border-radius: 50%; background: var(--secondary); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem auto; font-size: 1.4rem; color: var(--muted-foreground);">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem;">No static SEO records matched</h4>
                                <p style="font-size: 0.85rem; margin: 0;">Try clearing your search query or selecting a different status filter.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- ========================================================================= -->
<!-- TAB 2: DYNAMIC PRODUCTS SEO DIRECTORY                                     -->
<!-- ========================================================================= -->
@if($activeTab === 'products')
<!-- Feature Callout for Dynamic Products -->
<div class="seo-dynamic-callout">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <div style="width: 44px; height: 44px; border-radius: var(--radius-lg); background: rgba(239, 128, 28, 0.15); color: #EF801C; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
        </div>
        <div>
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin: 0 0 2px 0;">Automated Dynamic Product SEO &amp; Schema</h4>
            <p style="font-size: 0.82rem; color: var(--muted-foreground); margin: 0;">
                Whenever you add or update products in your catalog, Google Title, Meta Description, Open Graph image, and Schema.org <strong>Product rich data</strong> are automatically generated with price and availability.
            </p>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span>Manage Product Catalog</span>
        </a>
    </div>
</div>

<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.15); color: #EF801C;">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <span>Dynamic Products SEO Directory ({{ $totalProducts }} Items)</span>
            </h3>
            <p class="card-syndron-desc">Inspect Google search representation and custom meta overrides for each catalog item.</p>
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 960px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 70px; text-align: center;">Pack</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 230px;">Product &amp; Route</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 270px;">Google Title (Custom or Smart Fallback)</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 270px;">Meta Description Snippet</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 110px; text-align: center;">Status</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 110px; text-align: center;">SEO Health</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); text-align: right; width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($filteredProducts as $prod)
                        @php
                            $score = $prod->seo_score;
                            $hasCustomTitle = !empty($prod->meta_title);
                            $hasCustomDesc = !empty($prod->meta_description);
                        @endphp
                        <tr class="product-table-row seo-row" data-search="{{ strtolower($prod->name . ' ' . $prod->slug . ' ' . $prod->meta_title . ' ' . $prod->meta_keywords) }}">
                            <!-- Thumbnail -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); border: 1px solid var(--border); overflow: hidden; background: #fff; display: flex; align-items: center; justify-content: center; margin: auto; box-shadow: 0 2px 6px rgba(0,0,0,0.04);">
                                    <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" style="max-width: 90%; max-height: 90%; object-fit: contain;">
                                </div>
                            </td>

                            <!-- Product Name & Route -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem; line-height: 1.35;">
                                    <a href="{{ route('admin.products.edit', $prod->id) }}#seo-section" class="product-name-link" style="color: var(--foreground); text-decoration: none;">
                                        {{ $prod->name }}
                                    </a>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;">
                                    <span style="font-family: monospace; font-size: 0.72rem; padding: 2px 7px; border-radius: 6px; background: rgba(239, 128, 28, 0.12); color: #EF801C; font-weight: 700;">
                                        /product/{{ $prod->slug }}
                                    </span>
                                </div>
                            </td>

                            <!-- Title -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.88rem; font-weight: 600; color: var(--foreground); line-height: 1.35; margin-bottom: 0.35rem;">
                                    {{ $prod->seo_title }}
                                </div>
                                <div>
                                    @if($hasCustomTitle)
                                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-nib" style="margin-right: 3px;"></i> Custom Meta
                                        </span>
                                    @else
                                        <span class="badge-tag" style="background: rgba(14, 165, 233, 0.12); color: #0284c7; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-robot" style="margin-right: 3px;"></i> Smart Auto-Fallback
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Description -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.82rem; color: var(--muted-foreground); line-height: 1.45; margin-bottom: 0.35rem;">
                                    {{ Str::limit($prod->seo_description, 95, '...') }}
                                </div>
                                <div>
                                    @if($hasCustomDesc)
                                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-nib" style="margin-right: 3px;"></i> Custom
                                        </span>
                                    @else
                                        <span class="badge-tag" style="background: rgba(100, 116, 139, 0.12); color: var(--muted-foreground); font-size: 0.7rem; font-weight: 700;">
                                            Catalog Derived
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Live Status -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                @if($prod->is_active)
                                    <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 700; font-size: 0.72rem;">
                                        <i class="fa-solid fa-circle-check" style="margin-right: 3px;"></i> Active
                                    </span>
                                @else
                                    <span class="badge-tag" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; font-weight: 700; font-size: 0.72rem;">
                                        <i class="fa-solid fa-circle-pause" style="margin-right: 3px;"></i> Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- SEO Score -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <div style="display: inline-flex; flex-direction: column; align-items: center; gap: 4px;">
                                    <span style="font-size: 0.95rem; font-weight: 800; color: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }};">
                                        {{ $score }}%
                                    </span>
                                    <div style="width: 50px; height: 5px; background: var(--border); border-radius: 9999px; overflow: hidden;">
                                        <div style="width: {{ $score }}%; height: 100%; background: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }}; border-radius: 9999px;"></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: flex; gap: 0.45rem; justify-content: flex-end; align-items: center;">
                                    <a href="{{ route('product-details', $prod->slug) }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="padding: 0 9px; height: 32px;" title="View Product on Website">
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem;"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $prod->id) }}#seo-section" class="btn-syndron btn-syndron-primary btn-syndron-sm" style="height: 32px; padding: 0 12px;" title="Configure SEO in Product Editor">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit SEO</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 3.5rem 1.5rem; text-align: center; color: var(--muted-foreground);">
                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem;">No products found</h4>
                                <p style="font-size: 0.85rem; margin: 0;">Add products in the catalog to see them appear here.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- ========================================================================= -->
<!-- TAB 3: DYNAMIC BLOG ARTICLES SEO DIRECTORY                                -->
<!-- ========================================================================= -->
@if($activeTab === 'blogs')
<!-- Feature Callout for Dynamic Blogs -->
<div class="seo-dynamic-callout blogs-theme">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <div style="width: 44px; height: 44px; border-radius: var(--radius-lg); background: rgba(139, 92, 246, 0.15); color: #8b5cf6; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0;">
            <i class="fa-solid fa-newspaper"></i>
        </div>
        <div>
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin: 0 0 2px 0;">Automated Dynamic Blog SEO &amp; Article Schema</h4>
            <p style="font-size: 0.82rem; color: var(--muted-foreground); margin: 0;">
                All published articles automatically emit Google <strong>Article Schema</strong>, author credits, published date timestamps, and high-CTR social share Open Graph tags.
            </p>
        </div>
    </div>
    <div>
        <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
            <i class="fa-solid fa-newspaper"></i>
            <span>Manage Blog Articles</span>
        </a>
    </div>
</div>

<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill" style="background: rgba(139, 92, 246, 0.15); color: #8b5cf6;">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <span>Dynamic Blog Articles SEO Directory ({{ $totalBlogs }} Posts)</span>
            </h3>
            <p class="card-syndron-desc">Articles indexed by search engines and published to readers.</p>
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 960px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 70px; text-align: center;">Cover</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 230px;">Article &amp; Route</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 270px;">Google Title (Custom or Smart Fallback)</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); min-width: 270px;">Meta Description Snippet</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 110px; text-align: center;">Status</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 110px; text-align: center;">SEO Health</th>
                        <th style="padding: 0.9rem 1.25rem; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); text-align: right; width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($filteredBlogs as $blog)
                        @php
                            $score = $blog->seo_score;
                            $hasCustomTitle = !empty($blog->meta_title);
                            $hasCustomDesc = !empty($blog->meta_description);
                        @endphp
                        <tr class="product-table-row seo-row" data-search="{{ strtolower($blog->title . ' ' . $blog->slug . ' ' . $blog->meta_title . ' ' . $blog->meta_keywords) }}">
                            <!-- Thumbnail -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); border: 1px solid var(--border); overflow: hidden; background: #fff; display: flex; align-items: center; justify-content: center; margin: auto; box-shadow: 0 2px 6px rgba(0,0,0,0.04);">
                                    @if($blog->image_url)
                                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fa-solid fa-newspaper" style="color: var(--muted-foreground);"></i>
                                    @endif
                                </div>
                            </td>

                            <!-- Article Title & Route -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem; line-height: 1.35;">
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}#seo-section" class="product-name-link" style="color: var(--foreground); text-decoration: none;">
                                        {{ $blog->title }}
                                    </a>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;">
                                    <span style="font-family: monospace; font-size: 0.72rem; padding: 2px 7px; border-radius: 6px; background: rgba(139, 92, 246, 0.12); color: #8b5cf6; font-weight: 700;">
                                        /blog/{{ $blog->slug }}
                                    </span>
                                </div>
                            </td>

                            <!-- Title -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.88rem; font-weight: 600; color: var(--foreground); line-height: 1.35; margin-bottom: 0.35rem;">
                                    {{ $blog->seo_title }}
                                </div>
                                <div>
                                    @if($hasCustomTitle)
                                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-nib" style="margin-right: 3px;"></i> Custom Meta
                                        </span>
                                    @else
                                        <span class="badge-tag" style="background: rgba(139, 92, 246, 0.12); color: #8b5cf6; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-robot" style="margin-right: 3px;"></i> Auto-Generated
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Description -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.82rem; color: var(--muted-foreground); line-height: 1.45; margin-bottom: 0.35rem;">
                                    {{ Str::limit($blog->seo_description, 95, '...') }}
                                </div>
                                <div>
                                    @if($hasCustomDesc)
                                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-size: 0.7rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-nib" style="margin-right: 3px;"></i> Custom
                                        </span>
                                    @else
                                        <span class="badge-tag" style="background: rgba(100, 116, 139, 0.12); color: var(--muted-foreground); font-size: 0.7rem; font-weight: 700;">
                                            Excerpt Derived
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Live Status -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                @if($blog->is_published)
                                    <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 700; font-size: 0.72rem;">
                                        <i class="fa-solid fa-circle-check" style="margin-right: 3px;"></i> Published
                                    </span>
                                @else
                                    <span class="badge-tag" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b; font-weight: 700; font-size: 0.72rem;">
                                        <i class="fa-solid fa-pen-ruler" style="margin-right: 3px;"></i> Draft
                                    </span>
                                @endif
                            </td>

                            <!-- SEO Score -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <div style="display: inline-flex; flex-direction: column; align-items: center; gap: 4px;">
                                    <span style="font-size: 0.95rem; font-weight: 800; color: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }};">
                                        {{ $score }}%
                                    </span>
                                    <div style="width: 50px; height: 5px; background: var(--border); border-radius: 9999px; overflow: hidden;">
                                        <div style="width: {{ $score }}%; height: 100%; background: {{ $score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444') }}; border-radius: 9999px;"></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td style="padding: 1.1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: flex; gap: 0.45rem; justify-content: flex-end; align-items: center;">
                                    <a href="{{ route('blog.single', $blog->slug) }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="padding: 0 9px; height: 32px;" title="View Blog on Website">
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem;"></i>
                                    </a>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}#seo-section" class="btn-syndron btn-syndron-primary btn-syndron-sm" style="height: 32px; padding: 0 12px;" title="Configure SEO in Blog Editor">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit SEO</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 3.5rem 1.5rem; text-align: center; color: var(--muted-foreground);">
                                <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.25rem;">No blog articles found</h4>
                                <p style="font-size: 0.85rem; margin: 0;">Write articles in the blog section to see them appear here.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- JavaScript for 1-Click AJAX Robots Toggle & Realtime Search -->
<script>
// Client-side Instant Filter for Table Rows
function filterTableRows(query) {
    const q = query.toLowerCase().trim();
    const rows = document.querySelectorAll('.seo-row');
    rows.forEach(row => {
        const text = row.getAttribute('data-search') || '';
        if (text.includes(q)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// 1-Click AJAX Robots Toggle with Sonner Toast
function toggleRobotsAjax(id, url) {
    const btn = document.getElementById('robotsBtn-' + id);
    if (!btn) return;

    btn.style.opacity = '0.5';
    btn.style.pointerEvents = 'none';

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';

        if (data.success) {
            if (data.is_indexed) {
                btn.className = 'robots-interactive-badge robots-badge-indexed';
                btn.innerHTML = '<span class="dot-pulse-indexed"></span><span>index</span>';
            } else {
                btn.className = 'robots-interactive-badge robots-badge-noindex';
                btn.innerHTML = '<span class="dot-pulse-noindex"></span><span>noindex</span>';
            }

            if (window.Sonner) {
                window.Sonner.success(data.message);
            }
        }
    })
    .catch(err => {
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';
        if (window.Sonner) {
            window.Sonner.error('Could not toggle robots directive.');
        }
        console.error(err);
    });
}
</script>
@endsection
