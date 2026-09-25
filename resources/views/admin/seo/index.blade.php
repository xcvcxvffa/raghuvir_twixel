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
.seo-tab-btn.active-analytics {
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.12) 0%, rgba(2, 132, 199, 0.06) 100%);
    color: #0284c7;
    border-color: rgba(14, 165, 233, 0.3);
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.08);
}
html.dark .seo-tab-btn.active-analytics {
    color: #38bdf8;
    background: rgba(14, 165, 233, 0.15);
    border-color: rgba(14, 165, 233, 0.35);
}
.seo-tab-pill-count {
    padding: 2px 8px;
    border-radius: 9999px;
    font-size: 0.72rem;
    font-weight: 800;
}

/* ── Analytics & Webmaster Dashboard Specific Styles ─────────────────────── */
.analytics-hero-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.15rem;
    margin-bottom: 1.5rem;
}
@media (max-width: 1080px) {
    .analytics-hero-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
    .analytics-hero-grid { grid-template-columns: 1fr; }
}

.analytics-status-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-xl);
    padding: 1.25rem 1.35rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 0.85rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    transition: all 0.2s ease;
}
.analytics-status-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
}
.status-pill-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 0.725rem;
    font-weight: 700;
}
.status-pill-badge.connected {
    background: rgba(16, 185, 129, 0.12);
    color: #059669;
    border: 1px solid rgba(16, 185, 129, 0.25);
}
.status-pill-badge.not-connected {
    background: rgba(245, 158, 11, 0.12);
    color: #d97706;
    border: 1px solid rgba(245, 158, 11, 0.25);
}
.status-pill-badge.disabled {
    background: var(--muted);
    color: var(--muted-foreground);
    border: 1px solid var(--border);
}
.code-preview-snippet {
    background: #0f172a;
    color: #e2e8f0;
    font-family: 'JetBrains Mono', 'Fira Code', monospace;
    font-size: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    overflow-x: auto;
    white-space: pre-wrap;
    word-break: break-all;
    line-height: 1.5;
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.switch-toggle-label {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    user-select: none;
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--foreground);
}
.switch-toggle-input {
    appearance: none;
    -webkit-appearance: none;
    width: 42px;
    height: 24px;
    background: #cbd5e1;
    border-radius: 999px;
    position: relative;
    cursor: pointer;
    outline: none;
    transition: background 0.2s ease;
}
.switch-toggle-input::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #ffffff;
    border-radius: 50%;
    transition: transform 0.2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,0.25);
}
.switch-toggle-input:checked {
    background: #10b981;
}
.switch-toggle-input:checked::after {
    transform: translateX(18px);
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

    <a
        href="{{ route('admin.webmaster.index') }}"
        class="seo-tab-btn"
        style="border-color: rgba(99, 102, 241, 0.35); background: linear-gradient(135deg, rgba(99, 102, 241, 0.08) 0%, transparent 100%);"
    >
        <i class="fa-solid fa-chart-line" style="color: #6366f1;"></i>
        <span>Webmaster &amp; Analytics Tools</span>
        <span class="seo-tab-pill-count" style="background: rgba(99, 102, 241, 0.18); color: #4f46e5; font-weight: 700;">
            <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem; margin-right: 3px;"></i> Dedicated Hub
        </span>
    </a>
</div>

@if($activeTab !== 'analytics')
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
@endif

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

<!-- ========================================================================= -->
<!-- TAB 4: WEBMASTER TOOLS & ANALYTICS INTEGRATION HUB                        -->
<!-- ========================================================================= -->
@if($activeTab === 'analytics')
<div class="analytics-tab-wrapper" style="margin-bottom: 2.5rem;">
    <!-- Top Information Banner -->
    <div class="card-syndron" style="margin-bottom: 1.5rem; background: linear-gradient(135deg, var(--card) 0%, rgba(14, 165, 233, 0.04) 100%);">
        <div class="card-syndron-body" style="padding: 1.5rem 1.75rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 1.15rem;">
                <div style="width: 52px; height: 52px; border-radius: var(--radius-lg); background: linear-gradient(135deg, rgba(14, 165, 233, 0.15) 0%, rgba(2, 132, 199, 0.08) 100%); border: 1px solid rgba(14, 165, 233, 0.25); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--foreground); margin: 0 0 0.25rem 0;">
                        Webmaster Tools &amp; Analytics Integration
                    </h3>
                    <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0; line-height: 1.45;">
                        Connect Google Search Console, Google Analytics 4 (GA4), Tag Manager, Meta Pixel, and manage real-time XML sitemaps.
                    </p>
                </div>
            </div>

            <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
                <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="openCodePreviewModal()">
                    <i class="fa-solid fa-code" style="color: #0284c7;"></i>
                    <span>Inspect Live &lt;head&gt; Code</span>
                </button>
                <a href="{{ route('sitemap') }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                    <i class="fa-solid fa-sitemap" style="color: #10b981;"></i>
                    <span>Live XML Sitemap</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 4 Interactive Connection Status KPI Cards -->
    <div class="analytics-hero-grid">
        <!-- 1. Google Search Console -->
        @php
            $isGscActive = !empty($analyticsSettings['google_search_console_code']);
        @endphp
        <div class="analytics-status-card">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-brands fa-google" style="color: #ea4335; font-size: 1.25rem;"></i>
                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--foreground);">Search Console</span>
                </div>
                <span class="status-pill-badge {{ $isGscActive ? 'connected' : 'not-connected' }}">
                    <i class="fa-solid {{ $isGscActive ? 'fa-circle-check' : 'fa-circle-exclamation' }}"></i>
                    {{ $isGscActive ? 'Connected' : 'Needs Token' }}
                </span>
            </div>
            <div>
                <div style="font-size: 0.76rem; color: var(--muted-foreground); margin-bottom: 4px;">Site Verification:</div>
                <div style="font-family: monospace; font-size: 0.785rem; color: var(--foreground); font-weight: 600; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $isGscActive ? Str::limit($analyticsSettings['google_search_console_code'], 24, '...') : 'Not configured yet' }}
                </div>
            </div>
            <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
                <a href="https://search.google.com/search-console" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #0284c7; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                    <span>Open Console</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
                </a>
                <span style="font-size: 0.72rem; color: var(--muted-foreground);">SERP Indexing</span>
            </div>
        </div>

        <!-- 2. Google Analytics 4 (GA4) -->
        @php
            $isGa4Active = !empty($analyticsSettings['ga4_measurement_id']) && $analyticsSettings['ga4_enabled'];
        @endphp
        <div class="analytics-status-card">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-chart-simple" style="color: #f59e0b; font-size: 1.25rem;"></i>
                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--foreground);">GA4 Analytics</span>
                </div>
                <span class="status-pill-badge {{ $isGa4Active ? 'connected' : 'disabled' }}">
                    <i class="fa-solid {{ $isGa4Active ? 'fa-circle-check' : 'fa-circle-pause' }}"></i>
                    {{ $isGa4Active ? 'Tracking Active' : ($analyticsSettings['ga4_measurement_id'] ? 'Disabled' : 'No ID') }}
                </span>
            </div>
            <div>
                <div style="font-size: 0.76rem; color: var(--muted-foreground); margin-bottom: 4px;">Measurement ID:</div>
                <div style="font-family: monospace; font-size: 0.82rem; color: var(--foreground); font-weight: 700;">
                    {{ $analyticsSettings['ga4_measurement_id'] ?: 'G-XXXXXXXXXX' }}
                </div>
            </div>
            <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
                <a href="https://analytics.google.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #f59e0b; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                    <span>Open GA4 Dashboard</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
                </a>
                <span style="font-size: 0.72rem; color: var(--muted-foreground);">Realtime Visitors</span>
            </div>
        </div>

        <!-- 3. Google Tag Manager / Meta Pixel -->
        @php
            $isGtmActive = !empty($analyticsSettings['gtm_container_id']) && $analyticsSettings['gtm_enabled'];
            $isMetaActive = !empty($analyticsSettings['meta_pixel_id']) && $analyticsSettings['meta_pixel_enabled'];
        @endphp
        <div class="analytics-status-card">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-tags" style="color: #3b82f6; font-size: 1.25rem;"></i>
                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--foreground);">Tag Manager &amp; Pixel</span>
                </div>
                <span class="status-pill-badge {{ ($isGtmActive || $isMetaActive) ? 'connected' : 'disabled' }}">
                    <i class="fa-solid {{ ($isGtmActive || $isMetaActive) ? 'fa-circle-check' : 'fa-circle' }}"></i>
                    {{ $isGtmActive ? 'GTM Loaded' : ($isMetaActive ? 'Pixel Active' : 'Inactive') }}
                </span>
            </div>
            <div>
                <div style="font-size: 0.76rem; color: var(--muted-foreground); margin-bottom: 4px;">GTM / Meta Status:</div>
                <div style="font-family: monospace; font-size: 0.785rem; color: var(--foreground); font-weight: 600;">
                    {{ $analyticsSettings['gtm_container_id'] ?: ($analyticsSettings['meta_pixel_id'] ? 'Pixel: ' . $analyticsSettings['meta_pixel_id'] : 'Not configured') }}
                </div>
            </div>
            <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
                <a href="https://tagmanager.google.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #3b82f6; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                    <span>Open Tag Manager</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
                </a>
                <span style="font-size: 0.72rem; color: var(--muted-foreground);">Container</span>
            </div>
        </div>

        <!-- 4. XML Sitemap & Robots.txt -->
        <div class="analytics-status-card">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-sitemap" style="color: #10b981; font-size: 1.25rem;"></i>
                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--foreground);">XML Sitemap</span>
                </div>
                <span class="status-pill-badge connected">
                    <i class="fa-solid fa-circle-check"></i> 100% Live
                </span>
            </div>
            <div>
                <div style="font-size: 0.76rem; color: var(--muted-foreground); margin-bottom: 4px;">Indexed URLs Endpoint:</div>
                <div style="font-family: monospace; font-size: 0.785rem; color: #10b981; font-weight: 700;">
                    /sitemap.xml
                </div>
            </div>
            <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
                <button type="button" onclick="copySitemapUrl()" style="background: none; border: none; font-size: 0.75rem; font-weight: 700; color: #10b981; cursor: pointer; padding: 0; display: inline-flex; align-items: center; gap: 4px;">
                    <i class="fa-regular fa-copy"></i> <span id="copySitemapLabel">Copy URL</span>
                </button>
                <a href="{{ route('sitemap') }}" target="_blank" style="font-size: 0.75rem; font-weight: 700; color: var(--muted-foreground); text-decoration: none;">
                    View XML
                </a>
            </div>
        </div>
    </div>

    <!-- MAIN FORM: Webmaster & Analytics Configuration -->
    <form action="{{ route('admin.seo.analytics.update') }}" method="POST" id="analyticsConfigForm">
        @csrf

        <!-- SECTION 1: Google Search Console & Webmaster Verification -->
        <div class="card-syndron" style="margin-bottom: 1.5rem;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(234, 67, 53, 0.12); color: #ea4335;">
                            <i class="fa-brands fa-google"></i>
                        </div>
                        <span>1. Search Engine Webmaster Verifications</span>
                    </h3>
                    <p class="card-syndron-desc">
                        Verify site ownership in Google Search Console, Bing, Pinterest, and Yandex to index pages and track search keywords.
                    </p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.5rem 1.65rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.35rem;">
                    <!-- Google Search Console -->
                    <div class="form-group-admin" style="grid-column: span 2;">
                        <label for="google_search_console_code" class="form-label-admin" style="display: flex; justify-content: space-between; align-items: center;">
                            <span>
                                <i class="fa-brands fa-google" style="color: #ea4335; margin-right: 5px;"></i>
                                Google Search Console HTML Verification Token
                            </span>
                            <a href="https://search.google.com/search-console" target="_blank" style="font-size: 0.75rem; color: #0284c7; text-decoration: none; font-weight: 600;">
                                Get Token from Google <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </label>
                        <div style="position: relative;">
                            <input
                                type="text"
                                name="google_search_console_code"
                                id="google_search_console_code"
                                value="{{ old('google_search_console_code', $analyticsSettings['google_search_console_code']) }}"
                                class="form-control-admin"
                                placeholder='e.g. google-site-verification=XXXXXXXXXXXXXXXXXXXX or paste full <meta name="google-site-verification" content="..." />'
                                style="font-family: monospace; font-size: 0.85rem;"
                            >
                        </div>
                        <div class="form-hint" style="margin-top: 6px;">
                            💡 <strong>Smart Parser:</strong> You can paste either the full meta tag or just the verification code. The system will automatically inject:
                            <code style="background: var(--muted); padding: 1px 6px; border-radius: 4px; font-size: 0.75rem; color: var(--foreground);">&lt;meta name="google-site-verification" content="..."&gt;</code> into the public &lt;head&gt;.
                        </div>
                    </div>

                    <!-- Bing Webmaster -->
                    <div class="form-group-admin">
                        <label for="bing_webmaster_code" class="form-label-admin">
                            <i class="fa-brands fa-microsoft" style="color: #00a4ef; margin-right: 5px;"></i>
                            Bing Webmaster Verification Code (msvalidate.01)
                        </label>
                        <input
                            type="text"
                            name="bing_webmaster_code"
                            id="bing_webmaster_code"
                            value="{{ old('bing_webmaster_code', $analyticsSettings['bing_webmaster_code']) }}"
                            class="form-control-admin"
                            placeholder="e.g. 7A8B9C0D1E2F3G4H5I6J7K8L9M0N"
                            style="font-family: monospace; font-size: 0.85rem;"
                        >
                        <div class="form-hint">Outputs <code>&lt;meta name="msvalidate.01" content="..."&gt;</code> in header.</div>
                    </div>

                    <!-- Pinterest Domain Verification -->
                    <div class="form-group-admin">
                        <label for="pinterest_verify_code" class="form-label-admin">
                            <i class="fa-brands fa-pinterest" style="color: #e60023; margin-right: 5px;"></i>
                            Pinterest Domain Verification
                        </label>
                        <input
                            type="text"
                            name="pinterest_verify_code"
                            id="pinterest_verify_code"
                            value="{{ old('pinterest_verify_code', $analyticsSettings['pinterest_verify_code']) }}"
                            class="form-control-admin"
                            placeholder="e.g. 8a7b6c5d4e3f2g1h"
                            style="font-family: monospace; font-size: 0.85rem;"
                        >
                        <div class="form-hint">Outputs <code>&lt;meta name="p:domain_verify" content="..."&gt;</code> in header.</div>
                    </div>

                    <!-- Yandex Verification -->
                    <div class="form-group-admin">
                        <label for="yandex_verify_code" class="form-label-admin">
                            <i class="fa-brands fa-yandex" style="color: #fc3f1d; margin-right: 5px;"></i>
                            Yandex Webmaster Verification
                        </label>
                        <input
                            type="text"
                            name="yandex_verify_code"
                            id="yandex_verify_code"
                            value="{{ old('yandex_verify_code', $analyticsSettings['yandex_verify_code']) }}"
                            class="form-control-admin"
                            placeholder="e.g. a1b2c3d4e5f6g7h8"
                            style="font-family: monospace; font-size: 0.85rem;"
                        >
                        <div class="form-hint">Outputs <code>&lt;meta name="yandex-verification" content="..."&gt;</code> in header.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: Google Analytics 4 (GA4) & Google Tag Manager (GTM) -->
        <div class="card-syndron" style="margin-bottom: 1.5rem;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(245, 158, 11, 0.12); color: #f59e0b;">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <span>2. Google Analytics 4 (GA4) &amp; Tag Manager (GTM)</span>
                    </h3>
                    <p class="card-syndron-desc">
                        Track live visitors, page views, wholesale inquiries, button clicks, and marketing campaigns.
                    </p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.5rem 1.65rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <!-- GA4 Section -->
                    <div style="background: var(--muted); border-radius: 12px; padding: 1.25rem; border: 1px solid var(--border);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-chart-line" style="color: #f59e0b; font-size: 1.2rem;"></i>
                                <span style="font-weight: 700; font-size: 0.95rem; color: var(--foreground);">Google Analytics 4</span>
                            </div>
                            <label class="switch-toggle-label" title="Enable / Disable GA4">
                                <input
                                    type="checkbox"
                                    name="ga4_enabled"
                                    value="1"
                                    class="switch-toggle-input"
                                    {{ $analyticsSettings['ga4_enabled'] ? 'checked' : '' }}
                                >
                                <span style="font-size: 0.8rem; font-weight: 600;">Active</span>
                            </label>
                        </div>

                        <div class="form-group-admin" style="margin-bottom: 1rem;">
                            <label for="ga4_measurement_id" class="form-label-admin">
                                GA4 Measurement ID
                            </label>
                            <input
                                type="text"
                                name="ga4_measurement_id"
                                id="ga4_measurement_id"
                                value="{{ old('ga4_measurement_id', $analyticsSettings['ga4_measurement_id']) }}"
                                class="form-control-admin"
                                placeholder="e.g. G-71K8XZ9ABC"
                                style="font-family: monospace; font-weight: 700; letter-spacing: 0.05em; font-size: 0.95rem; text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase(); updateScriptPreview();"
                            >
                            <div class="form-hint">Found under <em>Admin &gt; Data Streams &gt; Web Stream Details</em> in GA4.</div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 8px; margin-top: 0.75rem;">
                            <input
                                type="checkbox"
                                name="ga4_anonymize_ip"
                                id="ga4_anonymize_ip"
                                value="1"
                                {{ $analyticsSettings['ga4_anonymize_ip'] ? 'checked' : '' }}
                                style="width: 16px; height: 16px; cursor: pointer; accent-color: #f59e0b;"
                            >
                            <label for="ga4_anonymize_ip" style="font-size: 0.8rem; color: var(--foreground); cursor: pointer; font-weight: 600;">
                                Anonymize IP Addresses <span style="color: var(--muted-foreground); font-weight: 400;">(Enhanced visitor privacy)</span>
                            </label>
                        </div>
                    </div>

                    <!-- GTM Section -->
                    <div style="background: var(--muted); border-radius: 12px; padding: 1.25rem; border: 1px solid var(--border);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-tags" style="color: #3b82f6; font-size: 1.2rem;"></i>
                                <span style="font-weight: 700; font-size: 0.95rem; color: var(--foreground);">Google Tag Manager</span>
                            </div>
                            <label class="switch-toggle-label" title="Enable / Disable GTM">
                                <input
                                    type="checkbox"
                                    name="gtm_enabled"
                                    value="1"
                                    class="switch-toggle-input"
                                    {{ $analyticsSettings['gtm_enabled'] ? 'checked' : '' }}
                                >
                                <span style="font-size: 0.8rem; font-weight: 600;">Active</span>
                            </label>
                        </div>

                        <div class="form-group-admin" style="margin-bottom: 1rem;">
                            <label for="gtm_container_id" class="form-label-admin">
                                GTM Container ID
                            </label>
                            <input
                                type="text"
                                name="gtm_container_id"
                                id="gtm_container_id"
                                value="{{ old('gtm_container_id', $analyticsSettings['gtm_container_id']) }}"
                                class="form-control-admin"
                                placeholder="e.g. GTM-N8K9XZP"
                                style="font-family: monospace; font-weight: 700; letter-spacing: 0.05em; font-size: 0.95rem; text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase();"
                            >
                            <div class="form-hint">Outputs official GTM head script and body noscript iframe container.</div>
                        </div>

                        <div style="font-size: 0.775rem; color: var(--muted-foreground); line-height: 1.45; background: var(--card); padding: 8px 12px; border-radius: 8px; border: 1px solid var(--border);">
                            <i class="fa-solid fa-circle-info" style="color: #3b82f6; margin-right: 4px;"></i>
                            Use GTM if you want to deploy custom event tags, conversion triggers, or heatmaps without modifying source code.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3: Meta (Facebook) Pixel -->
        <div class="card-syndron" style="margin-bottom: 1.5rem;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(24, 119, 242, 0.12); color: #1877f2;">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                        <span>3. Meta (Facebook &amp; Instagram) Pixel</span>
                    </h3>
                    <p class="card-syndron-desc">
                        Measure Facebook ad conversions and build custom retargeting audiences for Raghuvir Atta flour products.
                    </p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.5rem 1.65rem;">
                <div style="display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap;">
                    <div class="form-group-admin" style="flex: 1; min-width: 280px; margin-bottom: 0;">
                        <label for="meta_pixel_id" class="form-label-admin">
                            Meta Pixel ID
                        </label>
                        <input
                            type="text"
                            name="meta_pixel_id"
                            id="meta_pixel_id"
                            value="{{ old('meta_pixel_id', $analyticsSettings['meta_pixel_id']) }}"
                            class="form-control-admin"
                            placeholder="e.g. 123456789012345"
                            style="font-family: monospace; font-size: 0.9rem;"
                        >
                        <div class="form-hint">Found in Meta Events Manager &gt; Data Sources.</div>
                    </div>

                    <div style="padding-top: 1.25rem;">
                        <label class="switch-toggle-label">
                            <input
                                type="checkbox"
                                name="meta_pixel_enabled"
                                value="1"
                                class="switch-toggle-input"
                                {{ $analyticsSettings['meta_pixel_enabled'] ? 'checked' : '' }}
                            >
                            <span>Enable Meta Pixel</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 4: Custom Header & Footer Scripts -->
        <div class="card-syndron" style="margin-bottom: 1.5rem;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(139, 92, 246, 0.12); color: #8b5cf6;">
                            <i class="fa-solid fa-code"></i>
                        </div>
                        <span>4. Custom Tracking Scripts (Head &amp; Body)</span>
                    </h3>
                    <p class="card-syndron-desc">
                        Inject custom JavaScript tags, chat widgets, or conversion tracking code safely.
                    </p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.5rem 1.65rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <!-- Head Scripts -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="custom_header_scripts" class="form-label-admin">
                            Custom &lt;head&gt; Scripts
                        </label>
                        <textarea
                            name="custom_header_scripts"
                            id="custom_header_scripts"
                            rows="6"
                            class="form-control-admin"
                            placeholder="<!-- Paste Microsoft Clarity, Hotjar, or custom tracking tags here -->"
                            style="font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; line-height: 1.45;"
                        >{{ old('custom_header_scripts', $analyticsSettings['custom_header_scripts']) }}</textarea>
                        <div class="form-hint">Rendered right before the closing <code>&lt;/head&gt;</code> tag on public pages.</div>
                    </div>

                    <!-- Footer / Body Scripts -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="custom_footer_scripts" class="form-label-admin">
                            Custom Body / Footer Scripts
                        </label>
                        <textarea
                            name="custom_footer_scripts"
                            id="custom_footer_scripts"
                            rows="6"
                            class="form-control-admin"
                            placeholder="<!-- Paste WhatsApp chat widget, chatbot scripts, or conversion pixels here -->"
                            style="font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; line-height: 1.45;"
                        >{{ old('custom_footer_scripts', $analyticsSettings['custom_footer_scripts']) }}</textarea>
                        <div class="form-hint">Rendered right before the closing <code>&lt;/body&gt;</code> tag on public pages.</div>
                    </div>
                </div>
            </div>

            <div class="card-syndron-footer" style="padding: 1rem 1.65rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div style="font-size: 0.8rem; color: var(--muted-foreground); display: flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-shield-halved" style="color: #10b981;"></i>
                    <span>All changes take effect immediately across all website pages with zero downtime.</span>
                </div>
                <button type="submit" class="btn-syndron btn-syndron-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Save Webmaster &amp; Analytics Settings</span>
                </button>
            </div>
        </div>
    </form>

    <!-- SECTION 5: Real-time XML Sitemap & Robots.txt Editor -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1.5rem;">
        <!-- XML Sitemap Card -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                        <span>Real-time Dynamic XML Sitemap</span>
                    </h3>
                    <p class="card-syndron-desc">Automatically updated sitemap for Google Search Console.</p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.35rem 1.5rem;">
                <div style="background: var(--muted); border-radius: 10px; padding: 1rem; border: 1px solid var(--border); margin-bottom: 1.25rem;">
                    <div style="font-size: 0.76rem; color: var(--muted-foreground); font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Public Sitemap URL</div>
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; flex-wrap: wrap;">
                        <input
                            type="text"
                            id="sitemapFullUrlInput"
                            value="{{ route('sitemap') }}"
                            readonly
                            class="form-control-admin"
                            style="font-family: monospace; font-size: 0.85rem; font-weight: 700; color: #10b981; flex: 1; min-width: 200px; background: var(--card);"
                        >
                        <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="copySitemapUrl()">
                            <i class="fa-regular fa-copy"></i> Copy
                        </button>
                        <a href="{{ route('sitemap') }}" target="_blank" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Open
                        </a>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.825rem; color: var(--foreground); line-height: 1.5;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-check" style="color: #10b981;"></i>
                        <span>Includes all <strong>{{ $totalPages }} static pages</strong> with changefreq and priority.</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-check" style="color: #10b981;"></i>
                        <span>Includes all <strong>{{ $totalProducts }} flour products</strong> with Google Image tags.</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-check" style="color: #10b981;"></i>
                        <span>Includes all <strong>{{ $totalBlogs }} published blog articles</strong> with publication timestamps.</span>
                    </div>
                </div>

                <div style="margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                    <a
                        href="https://search.google.com/search-console/sitemaps?resource_id={{ urlencode(url('/')) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-syndron btn-syndron-secondary"
                        style="width: 100%; justify-content: center;"
                    >
                        <i class="fa-brands fa-google" style="color: #ea4335;"></i>
                        <span>Submit to Google Search Console</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Robots.txt Editor Card -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-header">
                <div>
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(14, 165, 233, 0.12); color: #0284c7;">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <span>Robots.txt Directives Editor</span>
                    </h3>
                    <p class="card-syndron-desc">Guide search crawler bots and point to XML sitemap.</p>
                </div>
            </div>

            <div class="card-syndron-body" style="padding: 1.35rem 1.5rem;">
                <form action="{{ route('admin.seo.robots.update') }}" method="POST">
                    @csrf
                    <div class="form-group-admin" style="margin-bottom: 0.85rem;">
                        <textarea
                            name="robots_content"
                            id="robotsContentTextarea"
                            rows="7"
                            class="form-control-admin"
                            style="font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; line-height: 1.5;"
                        >{{ $robotsContent }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                        <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="setRecommendedRobots()">
                            <i class="fa-solid fa-wand-magic-sparkles"></i> Recommended Preset
                        </button>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ url('/robots.txt') }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                                View Live
                            </a>
                            <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                                <i class="fa-solid fa-floppy-disk"></i> Save robots.txt
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- LIVE CODE PREVIEW INSPECTION MODAL                                        -->
<!-- ========================================================================= -->
<div id="codePreviewModal" class="leads-modal-backdrop" style="display: none;" onclick="closeCodePreviewModal()">
    <div class="leads-modal-dialog details-dialog" style="max-width: 720px;" onclick="event.stopPropagation()">
        <div class="leads-modal-header" style="border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(14, 165, 233, 0.12); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                    <i class="fa-solid fa-code"></i>
                </div>
                <div>
                    <h3 class="leads-modal-title" style="margin: 0; font-size: 1.15rem;">Live Public Website &lt;head&gt; Code</h3>
                    <p class="leads-modal-subtitle" style="margin: 2px 0 0 0;">Inspect the exact tags and scripts rendered for Google and visitors.</p>
                </div>
            </div>
            <button type="button" class="leads-modal-close" onclick="closeCodePreviewModal()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="leads-modal-body" style="padding: 1.25rem 1.5rem; max-height: calc(80vh - 120px); overflow-y: auto;">
            <div class="code-preview-snippet" id="generatedHeadCodeSnippet">
                Loading snippet...
            </div>
        </div>

        <div class="leads-modal-footer" style="border-top: 1px solid var(--border); padding: 0.85rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 0.775rem; color: var(--muted-foreground);">Live output verified from current settings.</span>
            <button type="button" class="btn-syndron btn-syndron-primary btn-syndron-sm" onclick="closeCodePreviewModal()">
                Done
            </button>
        </div>
    </div>
</div>
@endif

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

// Copy Sitemap URL with instant feedback
function copySitemapUrl() {
    const input = document.getElementById('sitemapFullUrlInput');
    const label = document.getElementById('copySitemapLabel');
    if (!input) return;

    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
        if (label) label.textContent = 'Copied!';
        if (window.Sonner) {
            window.Sonner.success('Sitemap URL copied to clipboard: ' + input.value);
        }
        setTimeout(() => {
            if (label) label.textContent = 'Copy URL';
        }, 2500);
    });
}

// Recommended Robots.txt Presets
function setRecommendedRobots() {
    const sitemapUrl = "{{ url('/sitemap.xml') }}";
    const recommended = "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: " + sitemapUrl + "\n";
    const textarea = document.getElementById('robotsContentTextarea');
    if (textarea) {
        textarea.value = recommended;
        if (window.Sonner) {
            window.Sonner.info('Recommended robots.txt preset applied! Click "Save robots.txt" to persist.');
        }
    }
}

// Code Preview Inspector Modal
function openCodePreviewModal() {
    const modal = document.getElementById('codePreviewModal');
    const container = document.getElementById('generatedHeadCodeSnippet');
    if (!modal || !container) return;

    // Collect current values from form
    const gscVal = document.getElementById('google_search_console_code')?.value.trim() || '';
    const bingVal = document.getElementById('bing_webmaster_code')?.value.trim() || '';
    const ga4Val = document.getElementById('ga4_measurement_id')?.value.trim() || '';
    const ga4Active = document.querySelector('input[name="ga4_enabled"]')?.checked;
    const ga4Anon = document.querySelector('input[name="ga4_anonymize_ip"]')?.checked;
    const gtmVal = document.getElementById('gtm_container_id')?.value.trim() || '';
    const gtmActive = document.querySelector('input[name="gtm_enabled"]')?.checked;
    const pixelVal = document.getElementById('meta_pixel_id')?.value.trim() || '';
    const pixelActive = document.querySelector('input[name="meta_pixel_enabled"]')?.checked;

    let code = `<!-- === VERIFIED PUBLIC <HEAD> OUTPUT (LIVE PREVIEW) === -->\n\n`;

    if (gscVal) {
        code += `<!-- Google Search Console -->\n<meta name="google-site-verification" content="${gscVal}">\n\n`;
    }
    if (bingVal) {
        code += `<!-- Bing Webmaster Tools -->\n<meta name="msvalidate.01" content="${bingVal}">\n\n`;
    }
    if (ga4Val && ga4Active) {
        code += `<!-- Google tag (gtag.js) - Google Analytics 4 -->\n`;
        code += `<script async src="https://www.googletagmanager.com/gtag/js?id=${ga4Val}"><\/script>\n`;
        code += `<script>\n  window.dataLayer = window.dataLayer || [];\n  function gtag(){dataLayer.push(arguments);}\n  gtag('js', new Date());\n  gtag('config', '${ga4Val}'${ga4Anon ? ", { 'anonymize_ip': true }" : ""});\n<\/script>\n\n`;
    }
    if (gtmVal && gtmActive) {
        code += `<!-- Google Tag Manager -->\n`;
        code += `<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':\nnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],\nj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=\n'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);\n})(window,document,'script','dataLayer','${gtmVal}');<\/script>\n<!-- End Google Tag Manager -->\n\n`;
    }
    if (pixelVal && pixelActive) {
        code += `<!-- Meta Pixel Code -->\n`;
        code += `<script>\n!function(f,b,e,v,n,t,s)\n{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};\nif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';\nn.queue=[];t=b.createElement(e);t.async=!0;\nt.src=v;s=b.getElementsByTagName(e)[0];\ns.parentNode.insertBefore(t,s)}(window, document,'script',\n'https://connect.facebook.net/en_US/fbevents.js');\nfbq('init', '${pixelVal}');\nfbq('track', 'PageView');\n<\/script>\n<!-- End Meta Pixel Code -->\n\n`;
    }

    if (!gscVal && !bingVal && (!ga4Val || !ga4Active) && (!gtmVal || !gtmActive) && (!pixelVal || !pixelActive)) {
        code += `<!-- No analytics or webmaster tokens active yet.\n     Enter your Google Search Console token or GA4 Measurement ID above to see live tags here! -->`;
    }

    container.textContent = code;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeCodePreviewModal() {
    const modal = document.getElementById('codePreviewModal');
    if (modal) modal.style.display = 'none';
    document.body.style.overflow = '';
}
</script>
@endsection

