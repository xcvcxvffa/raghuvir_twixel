@extends('admin.layouts.app')

@section('title', 'Edit SEO: ' . $seo->page_name . ' - Raghuvir Atta Admin')

@section('content')
<style>
/* ── Modern SEO Editor Custom Styles ──────────────────────────────────────── */
.seo-edit-header {
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
.seo-edit-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: linear-gradient(90deg, #10b981 0%, #3b82f6 50%, #EF801C 100%);
}
.seo-header-icon-badge {
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
html.dark .seo-header-icon-badge {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.25) 0%, rgba(5, 150, 105, 0.12) 100%);
    color: #34d399;
}

/* ── Form Progress Mini Bars ──────────────────────────────────────────────── */
.input-progress-bar-wrap {
    height: 4px;
    background: var(--border);
    border-radius: 9999px;
    overflow: hidden;
    margin-top: 6px;
    position: relative;
}
.input-progress-bar {
    height: 100%;
    width: 0%;
    border-radius: 9999px;
    transition: width 0.2s ease, background-color 0.2s ease;
}

/* ── Realistic Google SERP Preview Box ────────────────────────────────────── */
.serp-card-container {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 16px 18px;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
}
.serp-card-container.mobile-mode {
    max-width: 320px;
    margin: 0 auto;
    border-radius: 20px;
    border: 2px solid var(--border-strong);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.serp-meta-url {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 5px;
}
.serp-fav-circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #f1f3f4;
    border: 1px solid #dadce0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.65rem;
    color: #EF801C;
    flex-shrink: 0;
}
html.dark .serp-fav-circle {
    background: #303134;
    border-color: #3c4043;
}
.serp-site-title {
    font-size: 0.8rem;
    color: var(--foreground);
    font-weight: 600;
    line-height: 1.2;
}
.serp-url-text {
    font-size: 0.72rem;
    color: var(--muted-foreground);
    line-height: 1.2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.serp-title-link {
    font-size: 1.05rem;
    font-weight: 500;
    color: #1a0dab;
    line-height: 1.35;
    margin-bottom: 4px;
    cursor: pointer;
    text-decoration: none;
    display: block;
}
.serp-title-link:hover {
    text-decoration: underline;
}
html.dark .serp-title-link {
    color: #8ab4f8;
}
.serp-description-text {
    font-size: 0.82rem;
    color: #4d5156;
    line-height: 1.45;
}
html.dark .serp-description-text {
    color: #bdc1c6;
}

/* ── Realistic Social Share Card Preview ──────────────────────────────────── */
.social-preview-card {
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    background: var(--card);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
    transition: all 0.25s ease;
}
.social-preview-img-box {
    width: 100%;
    height: 155px;
    background: #0f172a;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.social-preview-content {
    padding: 12px 16px;
}
.social-preview-domain {
    font-size: 0.68rem;
    text-transform: uppercase;
    color: var(--muted-foreground);
    font-weight: 700;
    letter-spacing: 0.05em;
    margin-bottom: 4px;
}
.social-preview-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--foreground);
    line-height: 1.3;
    margin-bottom: 4px;
}
.social-preview-desc {
    font-size: 0.76rem;
    color: var(--muted-foreground);
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ── Interactive Keyword Suggestion Tags ──────────────────────────────────── */
.seo-keyword-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 9999px;
    font-size: 0.73rem;
    font-weight: 600;
    background: var(--secondary);
    border: 1px solid var(--border);
    color: var(--muted-foreground);
    cursor: pointer;
    transition: all 0.15s cubic-bezier(0.16, 1, 0.3, 1);
}
.seo-keyword-tag:hover {
    background: rgba(239, 128, 28, 0.12);
    border-color: rgba(239, 128, 28, 0.35);
    color: #EF801C;
    transform: translateY(-1px);
}

/* ── Checklist Quality Item ───────────────────────────────────────────────── */
.seo-check-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 12px;
    border-radius: var(--radius-md);
    background: var(--secondary);
    border: 1px solid var(--border);
    transition: all 0.2s ease;
}
.seo-check-row:hover {
    border-color: var(--border-strong);
}
.seo-check-icon-circle {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    flex-shrink: 0;
}
.seo-check-icon-circle.pass {
    background: rgba(16, 185, 129, 0.16);
    color: #10b981;
}
.seo-check-icon-circle.warn {
    background: rgba(245, 158, 11, 0.16);
    color: #f59e0b;
}
.seo-check-icon-circle.fail {
    background: rgba(239, 68, 68, 0.16);
    color: #ef4444;
}

/* ── Bottom Sticky Floating Dock Bar ──────────────────────────────────────── */
.seo-floating-dock {
    position: fixed;
    bottom: 1.25rem;
    left: 50%;
    transform: translateX(-50%);
    background: var(--card);
    border: 1px solid var(--border-strong);
    border-radius: 9999px;
    padding: 8px 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 1rem;
    z-index: 100;
    backdrop-filter: blur(12px);
}
</style>

<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.seo.index') }}">SEO Management Hub</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">{{ $seo->page_name }}</span>
</div>

<form action="{{ route('admin.seo.update', $seo->id) }}" method="POST" enctype="multipart/form-data" id="seoEditForm">
    @csrf

    <!-- Top Header & Action Banner -->
    <div class="seo-edit-header">
        <div style="display: flex; align-items: center; gap: 1.25rem; flex-wrap: wrap;">
            <div class="seo-header-icon-badge">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
            </div>
            <div>
                <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem; flex-wrap: wrap;">
                    <h1 class="page-title-main" style="margin-bottom: 0;">Configure SEO: {{ $seo->page_name }}</h1>
                    
                    @if(str_contains($seo->robots ?? '', 'noindex'))
                        <span class="badge-tag" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; font-weight: 800; font-size: 0.72rem; padding: 3px 9px; border-radius: 9999px;">
                            <i class="fa-solid fa-ban" style="margin-right: 3px;"></i> No-Index
                        </span>
                    @else
                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 800; font-size: 0.72rem; padding: 3px 9px; border-radius: 9999px;">
                            <i class="fa-solid fa-circle-check" style="margin-right: 3px;"></i> Google Indexable
                        </span>
                    @endif

                    <span style="font-family: monospace; font-size: 0.74rem; padding: 2px 8px; border-radius: 6px; background: rgba(14, 165, 233, 0.12); color: #0284c7; font-weight: 700;">
                        {{ $seo->page_route }}
                    </span>

                    <span class="seo-score-chip-banner" style="background: rgba(239, 128, 28, 0.15); color: #EF801C; font-size: 0.75rem; padding: 3px 10px; border-radius: 9999px; font-weight: 800;">
                        <i class="fa-solid fa-chart-pie" style="font-size: 0.7rem; margin-right: 4px;"></i> Score: <span id="bannerScoreNum">{{ $seo->seo_score }}</span>/100
                    </span>
                </div>
                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                    Fine-tune Google Search appearance, WhatsApp/social media share cards, and Schema.org rich markup for <strong>{{ $seo->page_name }}</strong>.
                </p>
            </div>
        </div>

        <!-- Top Action Buttons -->
        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="autoGenerateSeo()" title="Auto-generate optimized metadata via smart algorithm">
                <i class="fa-solid fa-wand-magic-sparkles" style="color: #EF801C;"></i>
                <span>Smart Auto-Generate</span>
            </button>
            <a href="{{ url($seo->page_route) }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="View live page on public site">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>View Live</span>
            </a>
            <a href="{{ route('admin.seo.index') }}" class="btn-syndron btn-syndron-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
            <button type="submit" class="btn-syndron btn-syndron-primary" id="topSaveBtn">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save Changes</span>
                <kbd class="shortcut-key" style="background: rgba(255,255,255,0.25); color: #fff; padding: 1px 5px; border-radius: 4px; font-size: 0.65rem;">Ctrl+S</kbd>
            </button>
        </div>
    </div>

    <!-- 2-Column Responsive Editor Layout -->
    <div class="blog-editor-layout">
        
        <!-- LEFT COLUMN: MAIN FORM CARDS -->
        <div class="blog-editor-main" style="display: flex; flex-direction: column; gap: 1.5rem;">

            <!-- Card 1: Core Search Engine Metadata -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">
                                <i class="fa-solid fa-heading"></i>
                            </div>
                            <span>Core Search Engine Metadata</span>
                        </h3>
                        <p class="card-syndron-desc">Primary HTML &lt;title&gt; and &lt;meta name="description"&gt; tags crawled by Google and Bing.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Meta Title -->
                    <div class="form-group-admin">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                            <label for="meta_title" class="form-label-admin" style="margin-bottom: 0;">
                                Meta Title Tag <span style="color: #ef4444;">*</span>
                            </label>
                            <span id="titleCounter" class="badge-tag" style="font-size: 0.72rem; font-weight: 800; padding: 2px 8px; border-radius: 9999px;">
                                0 / 60 chars
                            </span>
                        </div>
                        <input
                            type="text"
                            id="meta_title"
                            name="meta_title"
                            value="{{ old('meta_title', $seo->meta_title) }}"
                            required
                            class="form-control-admin @error('meta_title') is-invalid @enderror"
                            placeholder="e.g. 100% Pure Chakki Fresh Atta | Raghuvir Atta"
                        >
                        <!-- Visual Optimal Zone Progress Bar -->
                        <div class="input-progress-bar-wrap">
                            <div id="titleProgressBar" class="input-progress-bar"></div>
                        </div>
                        <div class="form-hint" style="margin-top: 5px;">
                            Recommended: <strong>50&ndash;60 characters</strong>. Clickable blue headline in Google search results.
                        </div>
                        @error('meta_title')
                            <div style="color: #ef4444; font-size: 0.78rem; margin-top: 0.25rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group-admin">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                            <label for="meta_description" class="form-label-admin" style="margin-bottom: 0;">
                                Meta Description Snippet
                            </label>
                            <span id="descCounter" class="badge-tag" style="font-size: 0.72rem; font-weight: 800; padding: 2px 8px; border-radius: 9999px;">
                                0 / 160 chars
                            </span>
                        </div>
                        <textarea
                            id="meta_description"
                            name="meta_description"
                            rows="3"
                            class="form-control-admin @error('meta_description') is-invalid @enderror"
                            placeholder="Write an enticing, click-worthy summary that drives searchers to your website..."
                        >{{ old('meta_description', $seo->meta_description) }}</textarea>
                        <!-- Visual Optimal Zone Progress Bar -->
                        <div class="input-progress-bar-wrap">
                            <div id="descProgressBar" class="input-progress-bar"></div>
                        </div>
                        <div class="form-hint" style="margin-top: 5px;">
                            Recommended: <strong>140&ndash;160 characters</strong>. Persuasive overview displayed beneath your search headline.
                        </div>
                        @error('meta_description')
                            <div style="color: #ef4444; font-size: 0.78rem; margin-top: 0.25rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Target Keywords & Suggestion Pills -->
                    <div class="form-group-admin">
                        <label for="meta_keywords" class="form-label-admin">
                            Meta Keywords (Comma separated)
                        </label>
                        <input
                            type="text"
                            id="meta_keywords"
                            name="meta_keywords"
                            value="{{ old('meta_keywords', $seo->meta_keywords) }}"
                            class="form-control-admin"
                            placeholder="e.g. chakki fresh atta, pure wheat flour, MP sharbati atta"
                        >
                        <!-- Quick Keyword Suggestion Pills -->
                        <div style="margin-top: 0.65rem;">
                            <div style="font-size: 0.72rem; font-weight: 700; color: var(--muted-foreground); margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.05em;">
                                Click to append high-intent keywords:
                            </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                <span class="seo-keyword-tag" onclick="appendKeyword('chakki fresh atta')">+ Chakki Fresh Atta</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('MP sharbati wheat')">+ MP Sharbati Wheat</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('multigrain flour')">+ Multigrain Flour</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('stoneground purity')">+ Stoneground Purity</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('high fiber diet')">+ High Fiber</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('wholesale atta supplier')">+ Wholesale Supplier</span>
                                <span class="seo-keyword-tag" onclick="appendKeyword('hygienic packaging')">+ Hygienic Packaging</span>
                            </div>
                        </div>
                    </div>

                    <!-- Canonical URL & Robots Directives -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="canonical_url" class="form-label-admin">
                                <i class="fa-solid fa-link" style="color: #0284c7; margin-right: 4px;"></i> Canonical URL (Optional)
                            </label>
                            <input
                                type="url"
                                id="canonical_url"
                                name="canonical_url"
                                value="{{ old('canonical_url', $seo->canonical_url) }}"
                                class="form-control-admin"
                                placeholder="{{ url($seo->page_route) }}"
                            >
                            <div class="form-hint">
                                Leave blank to automatically canonicalize to this page's URL.
                            </div>
                        </div>

                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="robots" class="form-label-admin">
                                <i class="fa-solid fa-robot" style="color: #EF801C; margin-right: 4px;"></i> Robots Meta Directives <span style="color: #ef4444;">*</span>
                            </label>
                            <select id="robots" name="robots" class="form-control-admin" style="cursor: pointer;">
                                <option value="index, follow" {{ old('robots', $seo->robots) === 'index, follow' ? 'selected' : '' }}>index, follow (Standard Ranking - Recommended)</option>
                                <option value="noindex, follow" {{ old('robots', $seo->robots) === 'noindex, follow' ? 'selected' : '' }}>noindex, follow (Hide page, follow internal links)</option>
                                <option value="noindex, nofollow" {{ old('robots', $seo->robots) === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow (Block crawlers entirely)</option>
                                <option value="index, nofollow" {{ old('robots', $seo->robots) === 'index, nofollow' ? 'selected' : '' }}>index, nofollow (Index without link equity pass)</option>
                            </select>
                            <div class="form-hint">
                                Directs Googlebot and Bingbot indexing &amp; link behavior.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Open Graph & Social Media Share -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.15); color: #EF801C;">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                            <span>Social Media Open Graph &amp; Twitter Cards</span>
                        </h3>
                        <p class="card-syndron-desc">Controls visual cards when users share your link on WhatsApp, Facebook, LinkedIn, and Twitter/X.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- OG Title -->
                    <div class="form-group-admin">
                        <label for="og_title" class="form-label-admin">
                            Open Graph Title (og:title)
                        </label>
                        <input
                            type="text"
                            id="og_title"
                            name="og_title"
                            value="{{ old('og_title', $seo->og_title) }}"
                            class="form-control-admin"
                            placeholder="Defaults to Meta Title if left blank"
                        >
                    </div>

                    <!-- OG Description -->
                    <div class="form-group-admin">
                        <label for="og_description" class="form-label-admin">
                            Open Graph Description (og:description)
                        </label>
                        <textarea
                            id="og_description"
                            name="og_description"
                            rows="2"
                            class="form-control-admin"
                            placeholder="Defaults to Meta Description if left blank"
                        >{{ old('og_description', $seo->og_description) }}</textarea>
                    </div>

                    <!-- OG Image Upload & Preview -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label class="form-label-admin">
                            Social Share Image (og:image)
                        </label>
                        
                        <div style="display: flex; gap: 1.25rem; align-items: center; flex-wrap: wrap; background: var(--secondary); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 14px 18px;">
                            <div style="width: 140px; height: 80px; border-radius: var(--radius-md); border: 1px solid var(--border); overflow: hidden; background: #0f172a; position: relative; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                                <img id="ogImagePreview" src="{{ $seo->og_image_url }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            <div style="flex: 1; min-width: 220px;">
                                <input
                                    type="file"
                                    id="og_image_file"
                                    name="og_image_file"
                                    accept="image/*"
                                    class="form-control-admin"
                                    style="padding: 6px 12px; height: auto;"
                                    onchange="previewOgImage(this)"
                                >
                                <div class="form-hint" style="margin-top: 4px;">
                                    Optimal format: <strong>1200 &times; 630 px</strong> (JPG, PNG, WEBP max 4MB).
                                </div>
                            </div>

                            @if(!empty($seo->og_image))
                                <div>
                                    <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="color: #ef4444; border-color: rgba(239,68,68,0.3);" onclick="if(confirm('Reset social share image to default company logo?')) { document.getElementById('removeOgImageForm').submit(); }">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <span>Reset to Logo</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Structured Data & Schema.org -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill" style="background: rgba(99, 102, 241, 0.15); color: #6366f1;">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <span>Structured Data &amp; JSON-LD Schema</span>
                        </h3>
                        <p class="card-syndron-desc">Enables Google Knowledge Graph panel, breadcrumb trails, and rich search snippets.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Schema Type -->
                    <div class="form-group-admin">
                        <label for="schema_type" class="form-label-admin">
                            Schema Type (@type)
                        </label>
                        <select id="schema_type" name="schema_type" class="form-control-admin" style="cursor: pointer;">
                            @php
                                $types = ['WebPage', 'Organization', 'AboutPage', 'ContactPage', 'CollectionPage', 'ItemPage', 'Service', 'Blog', 'Article', 'FAQPage', 'ImageGallery', 'VideoGallery'];
                            @endphp
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ old('schema_type', $seo->schema_type) === $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Custom JSON-LD Override with Live Syntax Validator -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                            <label for="schema_json" class="form-label-admin" style="margin-bottom: 0;">
                                Custom JSON-LD Override (Optional)
                            </label>
                            <span id="jsonValidatorBadge" class="badge-tag" style="display: none; font-size: 0.7rem; font-weight: 800; padding: 2px 8px; border-radius: 9999px;">
                            </span>
                        </div>
                        <textarea
                            id="schema_json"
                            name="schema_json"
                            rows="5"
                            class="form-control-admin"
                            style="font-family: monospace; font-size: 0.82rem; resize: vertical;"
                            placeholder="Leave empty to auto-generate valid Schema.org JSON-LD from page configuration..."
                            oninput="validateJsonSyntax(this.value)"
                        >{{ old('schema_json', $seo->schema_json) }}</textarea>
                        <div class="form-hint">
                            Leave blank for automatic Schema.org JSON-LD generation.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Action Buttons -->
            <div style="display: flex; gap: 0.75rem; justify-content: flex-end; align-items: center; padding-top: 0.5rem; margin-bottom: 3.5rem;">
                <a href="{{ route('admin.seo.index') }}" class="btn-syndron btn-syndron-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-syndron btn-syndron-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Save SEO Changes</span>
                </button>
            </div>
        </div>

        <!-- RIGHT COLUMN: SIDEBAR SIMULATORS & QUALITY CHECKS -->
        <div class="blog-editor-sidebar">
            
            <!-- Circular Animated SEO Score Gauge Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 12px 18px;">
                    <div class="card-syndron-title" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-gauge-high" style="color: #10b981; margin-right: 6px;"></i>
                        <span>On-Page SEO Health Gauge</span>
                    </div>
                </div>
                <div class="card-syndron-body" style="padding: 16px 18px; text-align: center;">
                    <div class="seo-gauge-box" style="padding: 0;">
                        <div class="seo-score-circle" style="width: 90px; height: 90px; margin: 0 auto 10px auto; position: relative;">
                            <svg width="90" height="90" viewBox="0 0 90 90">
                                <circle class="seo-track-bg" cx="45" cy="45" r="38" stroke-width="8"></circle>
                                <circle id="scoreTrackFill" class="seo-track-fill" cx="45" cy="45" r="38" stroke-width="8" stroke-dasharray="238" stroke-dashoffset="0" stroke="#10b981"></circle>
                            </svg>
                            <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <span id="gaugeScoreNum" style="font-size: 1.5rem; font-weight: 800; color: var(--foreground); line-height: 1;">{{ $seo->seo_score }}</span>
                                <span style="font-size: 0.65rem; color: var(--muted-foreground); font-weight: 700;">/100</span>
                            </div>
                        </div>
                        <div id="gaugeScoreLabel" style="font-size: 0.85rem; font-weight: 800; color: #10b981; margin-bottom: 4px;">
                            {{ $seo->seo_score >= 80 ? 'Excellent Optimization' : ($seo->seo_score >= 60 ? 'Good Potential' : 'Needs Optimization') }}
                        </div>
                        <p style="font-size: 0.72rem; color: var(--muted-foreground); margin: 0;">
                            Live assessment based on title length, snippet density, and social tagging.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Google Search Snippet Simulator Card with Desktop/Mobile Toggle -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 12px 18px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                        <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.85rem; color: var(--foreground);">
                            <i class="fa-brands fa-google" style="color: #4285F4;"></i>
                            <span>Google SERP Preview</span>
                        </div>
                        <!-- Desktop vs Mobile View Switcher -->
                        <div class="serp-view-toggle">
                            <button type="button" class="serp-toggle-btn active" id="btnSerpDesktop" onclick="setSerpDevice('desktop')" title="Desktop Google View">
                                <i class="fa-solid fa-desktop"></i>
                            </button>
                            <button type="button" class="serp-toggle-btn" id="btnSerpMobile" onclick="setSerpDevice('mobile')" title="Mobile Google View">
                                <i class="fa-solid fa-mobile-screen"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-syndron-body" style="padding: 16px;">
                    <div id="serpSnippetBox" class="serp-card-container">
                        <!-- Favicon + Site Name Row -->
                        <div class="serp-meta-url">
                            <div class="serp-fav-circle">
                                <i class="fa-solid fa-wheat-awn"></i>
                            </div>
                            <div>
                                <div class="serp-site-title">Raghuvir Atta</div>
                                <div class="serp-url-text">{{ url($seo->page_route) }}</div>
                            </div>
                        </div>

                        <!-- Clickable Title -->
                        <div class="serp-title-link" id="googlePreviewTitle">
                            {{ $seo->meta_title ?: 'Page Title will appear here' }}
                        </div>

                        <!-- Description Snippet -->
                        <div class="serp-description-text" id="googlePreviewDesc">
                            {{ $seo->meta_description ?: 'Write a meta description to see how it looks directly inside Google search engine results.' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Share Card Preview with WhatsApp / Twitter Toggle -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 12px 18px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                        <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.85rem; color: var(--foreground);">
                            <i class="fa-solid fa-share-nodes" style="color: #EF801C;"></i>
                            <span>Social Media Preview</span>
                        </div>
                        <div class="serp-view-toggle">
                            <button type="button" class="serp-toggle-btn active" id="btnSocialOg" onclick="setSocialType('og')">
                                WhatsApp / FB
                            </button>
                            <button type="button" class="serp-toggle-btn" id="btnSocialTwitter" onclick="setSocialType('twitter')">
                                Twitter / X
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-syndron-body" style="padding: 16px;">
                    <div id="socialCardBox" class="social-preview-card">
                        <div class="social-preview-img-box">
                            <img id="socialPreviewImage" src="{{ $seo->og_image_url }}" alt="Social Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="social-preview-content">
                            <div class="social-preview-domain">
                                {{ parse_url(url('/'), PHP_URL_HOST) }}
                            </div>
                            <div id="socialPreviewTitle" class="social-preview-title">
                                {{ $seo->og_title ?: ($seo->meta_title ?: 'Page Title') }}
                            </div>
                            <div id="socialPreviewDesc" class="social-preview-desc">
                                {{ $seo->og_description ?: ($seo->meta_description ?: 'Page description will appear here when shared.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Quality Checklist Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 12px 18px;">
                    <div class="card-syndron-title" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-list-check" style="color: #0284c7; margin-right: 6px;"></i>
                        <span>On-Page SEO Checklist</span>
                    </div>
                </div>

                <div class="card-syndron-body" style="padding: 14px 18px;">
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Check 1: Title -->
                        <div class="seo-check-row">
                            <div class="seo-check-icon-circle pass" id="checkTitleIcon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <div style="font-size: 0.82rem; font-weight: 700; color: var(--foreground);">Meta Title Tag</div>
                                <div style="font-size: 0.72rem; color: var(--muted-foreground);" id="checkTitleDesc">Optimal length (50-60 chars)</div>
                            </div>
                        </div>

                        <!-- Check 2: Description -->
                        <div class="seo-check-row">
                            <div class="seo-check-icon-circle pass" id="checkDescIcon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <div style="font-size: 0.82rem; font-weight: 700; color: var(--foreground);">Meta Description</div>
                                <div style="font-size: 0.72rem; color: var(--muted-foreground);" id="checkDescDesc">Optimal summary (140-160 chars)</div>
                            </div>
                        </div>

                        <!-- Check 3: Keywords -->
                        <div class="seo-check-row">
                            <div class="seo-check-icon-circle pass" id="checkKeywordsIcon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <div style="font-size: 0.82rem; font-weight: 700; color: var(--foreground);">Target Keywords</div>
                                <div style="font-size: 0.72rem; color: var(--muted-foreground);" id="checkKeywordsDesc">Target search terms provided</div>
                            </div>
                        </div>

                        <!-- Check 4: Social Share -->
                        <div class="seo-check-row">
                            <div class="seo-check-icon-circle {{ !empty($seo->og_image) ? 'pass' : 'warn' }}">
                                <i class="fa-solid {{ !empty($seo->og_image) ? 'fa-check' : 'fa-circle-exclamation' }}"></i>
                            </div>
                            <div>
                                <div style="font-size: 0.82rem; font-weight: 700; color: var(--foreground);">Social Share Image</div>
                                <div style="font-size: 0.72rem; color: var(--muted-foreground);">{{ !empty($seo->og_image) ? 'Custom image assigned' : 'Using default site logo' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Quick Metadata Reference -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 12px 18px;">
                    <div class="card-syndron-title" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-circle-info" style="color: #10b981; margin-right: 6px;"></i>
                        <span>Page Entity Metadata</span>
                    </div>
                </div>
                <div class="card-syndron-body" style="padding: 14px 18px; font-size: 0.8rem; display: flex; flex-direction: column; gap: 8px;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--muted-foreground);">Page Key:</span>
                        <code style="font-size: 0.74rem; background: var(--secondary); padding: 2px 6px; border-radius: 4px; color: var(--foreground);">{{ $seo->page_key }}</code>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--muted-foreground);">Public Route:</span>
                        <span style="font-family: monospace; font-size: 0.75rem; color: #0284c7; font-weight: 700;">{{ $seo->page_route }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--muted-foreground);">Last Updated:</span>
                        <span style="color: var(--foreground); font-weight: 600;">{{ $seo->updated_at?->diffForHumans() ?? 'Never' }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Sticky Floating Action Dock at the bottom -->
    <div class="seo-floating-dock">
        <div style="display: flex; align-items: center; gap: 8px;">
            <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 800; font-size: 0.75rem; padding: 3px 9px; border-radius: 9999px;">
                Score: <span id="dockScoreNum">{{ $seo->seo_score }}</span>%
            </span>
            <span style="font-size: 0.82rem; font-weight: 700; color: var(--foreground);" class="hidden-mobile">
                {{ $seo->page_name }}
            </span>
        </div>
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="autoGenerateSeo()">
                <i class="fa-solid fa-wand-magic-sparkles" style="color: #EF801C;"></i>
                <span>Auto-Generate</span>
            </button>
            <a href="{{ route('admin.seo.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                Cancel
            </a>
            <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save</span>
            </button>
        </div>
    </div>
</form>

<!-- Hidden Form to Reset/Remove OG Image -->
@if(!empty($seo->og_image))
    <form id="removeOgImageForm" action="{{ route('admin.seo.remove-og-image', $seo->id) }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('meta_title');
    const descInput = document.getElementById('meta_description');
    const ogTitleInput = document.getElementById('og_title');
    const ogDescInput = document.getElementById('og_description');
    const keywordsInput = document.getElementById('meta_keywords');

    const titleCounter = document.getElementById('titleCounter');
    const descCounter = document.getElementById('descCounter');
    const titleProgressBar = document.getElementById('titleProgressBar');
    const descProgressBar = document.getElementById('descProgressBar');

    const googlePreviewTitle = document.getElementById('googlePreviewTitle');
    const googlePreviewDesc = document.getElementById('googlePreviewDesc');
    const socialPreviewTitle = document.getElementById('socialPreviewTitle');
    const socialPreviewDesc = document.getElementById('socialPreviewDesc');

    const checkTitleIcon = document.getElementById('checkTitleIcon');
    const checkTitleDesc = document.getElementById('checkTitleDesc');
    const checkDescIcon = document.getElementById('checkDescIcon');
    const checkDescDesc = document.getElementById('checkDescDesc');
    const checkKeywordsIcon = document.getElementById('checkKeywordsIcon');
    const checkKeywordsDesc = document.getElementById('checkKeywordsDesc');
    const bannerScoreNum = document.getElementById('bannerScoreNum');
    const dockScoreNum = document.getElementById('dockScoreNum');
    const gaugeScoreNum = document.getElementById('gaugeScoreNum');
    const scoreTrackFill = document.getElementById('scoreTrackFill');
    const gaugeScoreLabel = document.getElementById('gaugeScoreLabel');

    function calculateScore() {
        let score = 0;
        const titleLen = titleInput.value.trim().length;
        const descLen = descInput.value.trim().length;
        const hasKeywords = keywordsInput.value.trim().length > 0;

        if (titleLen >= 40 && titleLen <= 65) score += 30;
        else if (titleLen > 0) score += 15;

        if (descLen >= 120 && descLen <= 165) score += 30;
        else if (descLen > 0) score += 15;

        if (hasKeywords) score += 15;
        score += 25; // Base canonical, schema, robots configuration

        const finalScore = Math.min(100, score);

        if (bannerScoreNum) bannerScoreNum.textContent = finalScore;
        if (dockScoreNum) dockScoreNum.textContent = finalScore;
        if (gaugeScoreNum) gaugeScoreNum.textContent = finalScore;

        // Circular SVG circumference = 2 * PI * 38 ≈ 238
        const circumference = 238;
        const offset = circumference - (circumference * finalScore) / 100;
        if (scoreTrackFill) {
            scoreTrackFill.style.strokeDashoffset = offset;
            const strokeColor = finalScore >= 80 ? '#10b981' : (finalScore >= 60 ? '#f59e0b' : '#ef4444');
            scoreTrackFill.setAttribute('stroke', strokeColor);
        }

        if (gaugeScoreLabel) {
            if (finalScore >= 80) {
                gaugeScoreLabel.textContent = 'Excellent Optimization';
                gaugeScoreLabel.style.color = '#10b981';
            } else if (finalScore >= 60) {
                gaugeScoreLabel.textContent = 'Good Potential';
                gaugeScoreLabel.style.color = '#f59e0b';
            } else {
                gaugeScoreLabel.textContent = 'Needs Optimization';
                gaugeScoreLabel.style.color = '#ef4444';
            }
        }
    }

    function updateTitle() {
        const val = titleInput.value.trim();
        const len = val.length;
        
        titleCounter.textContent = len + ' / 60 chars';
        const pct = Math.min(100, (len / 60) * 100);
        if (titleProgressBar) {
            titleProgressBar.style.width = pct + '%';
        }

        if (len >= 40 && len <= 65) {
            titleCounter.style.background = 'rgba(16, 185, 129, 0.15)';
            titleCounter.style.color = '#10b981';
            if (titleProgressBar) titleProgressBar.style.backgroundColor = '#10b981';
            checkTitleIcon.className = 'seo-check-icon-circle pass';
            checkTitleIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            checkTitleDesc.textContent = 'Optimal length (' + len + ' chars)';
        } else if (len > 65) {
            titleCounter.style.background = 'rgba(239, 68, 68, 0.15)';
            titleCounter.style.color = '#ef4444';
            if (titleProgressBar) titleProgressBar.style.backgroundColor = '#ef4444';
            checkTitleIcon.className = 'seo-check-icon-circle warn';
            checkTitleIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            checkTitleDesc.textContent = 'Too long (' + len + ' chars, may truncate)';
        } else if (len > 0) {
            titleCounter.style.background = 'rgba(245, 158, 11, 0.15)';
            titleCounter.style.color = '#f59e0b';
            if (titleProgressBar) titleProgressBar.style.backgroundColor = '#f59e0b';
            checkTitleIcon.className = 'seo-check-icon-circle warn';
            checkTitleIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            checkTitleDesc.textContent = 'Short title (' + len + ' chars)';
        } else {
            titleCounter.style.background = 'rgba(239, 68, 68, 0.15)';
            titleCounter.style.color = '#ef4444';
            if (titleProgressBar) titleProgressBar.style.backgroundColor = '#ef4444';
            checkTitleIcon.className = 'seo-check-icon-circle fail';
            checkTitleIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            checkTitleDesc.textContent = 'Title tag is missing';
        }

        googlePreviewTitle.textContent = val || 'Page Title will appear here';

        if (!ogTitleInput.value.trim()) {
            socialPreviewTitle.textContent = val || 'Page Title';
        }
        calculateScore();
    }

    function updateDesc() {
        const val = descInput.value.trim();
        const len = val.length;

        descCounter.textContent = len + ' / 160 chars';
        const pct = Math.min(100, (len / 160) * 100);
        if (descProgressBar) {
            descProgressBar.style.width = pct + '%';
        }

        if (len >= 120 && len <= 165) {
            descCounter.style.background = 'rgba(16, 185, 129, 0.15)';
            descCounter.style.color = '#10b981';
            if (descProgressBar) descProgressBar.style.backgroundColor = '#10b981';
            checkDescIcon.className = 'seo-check-icon-circle pass';
            checkDescIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            checkDescDesc.textContent = 'Optimal length (' + len + ' chars)';
        } else if (len > 165) {
            descCounter.style.background = 'rgba(239, 68, 68, 0.15)';
            descCounter.style.color = '#ef4444';
            if (descProgressBar) descProgressBar.style.backgroundColor = '#ef4444';
            checkDescIcon.className = 'seo-check-icon-circle warn';
            checkDescIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            checkDescDesc.textContent = 'Too long (' + len + ' chars, may truncate)';
        } else if (len > 0) {
            descCounter.style.background = 'rgba(245, 158, 11, 0.15)';
            descCounter.style.color = '#f59e0b';
            if (descProgressBar) descProgressBar.style.backgroundColor = '#f59e0b';
            checkDescIcon.className = 'seo-check-icon-circle warn';
            checkDescIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            checkDescDesc.textContent = 'Short description (' + len + ' chars)';
        } else {
            descCounter.style.background = 'rgba(239, 68, 68, 0.15)';
            descCounter.style.color = '#ef4444';
            if (descProgressBar) descProgressBar.style.backgroundColor = '#ef4444';
            checkDescIcon.className = 'seo-check-icon-circle fail';
            checkDescIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            checkDescDesc.textContent = 'Description is missing';
        }

        googlePreviewDesc.textContent = val || 'Write a meta description to see how it looks directly inside Google search engine results.';

        if (!ogDescInput.value.trim()) {
            socialPreviewDesc.textContent = val || 'Page description will appear here on social networks.';
        }
        calculateScore();
    }

    function updateKeywords() {
        const hasKeywords = keywordsInput.value.trim().length > 0;
        if (hasKeywords) {
            checkKeywordsIcon.className = 'seo-check-icon-circle pass';
            checkKeywordsIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            checkKeywordsDesc.textContent = 'Target search terms provided';
        } else {
            checkKeywordsIcon.className = 'seo-check-icon-circle warn';
            checkKeywordsIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            checkKeywordsDesc.textContent = 'No keywords specified';
        }
        calculateScore();
    }

    function updateOgTitle() {
        const val = ogTitleInput.value.trim();
        socialPreviewTitle.textContent = val || (titleInput.value.trim() || 'Page Title');
    }

    function updateOgDesc() {
        const val = ogDescInput.value.trim();
        socialPreviewDesc.textContent = val || (descInput.value.trim() || 'Page description will appear here on social networks.');
    }

    titleInput.addEventListener('input', updateTitle);
    descInput.addEventListener('input', updateDesc);
    keywordsInput.addEventListener('input', updateKeywords);
    ogTitleInput.addEventListener('input', updateOgTitle);
    ogDescInput.addEventListener('input', updateOgDesc);

    // Initial triggers
    updateTitle();
    updateDesc();
    updateKeywords();
});

// Append keyword from suggestion pill
function appendKeyword(keyword) {
    const kwInput = document.getElementById('meta_keywords');
    if (!kwInput) return;
    const existing = kwInput.value.trim();
    if (existing) {
        if (!existing.toLowerCase().includes(keyword.toLowerCase())) {
            kwInput.value = existing + ', ' + keyword;
        }
    } else {
        kwInput.value = keyword;
    }
    kwInput.dispatchEvent(new Event('input'));
    if (window.Sonner) {
        window.Sonner.success('Keyword "' + keyword + '" added!');
    }
}

// Auto-generate optimized SEO via AJAX endpoint
function autoGenerateSeo() {
    const url = '{{ route('admin.seo.auto-generate', $seo->id) }}';
    fetch(url, {
        headers: { 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById('meta_title').value = data.title;
            document.getElementById('meta_description').value = data.description;
            document.getElementById('meta_keywords').value = data.keywords;
            if (data.schema_type) {
                document.getElementById('schema_type').value = data.schema_type;
            }
            
            document.getElementById('meta_title').dispatchEvent(new Event('input'));
            document.getElementById('meta_description').dispatchEvent(new Event('input'));
            document.getElementById('meta_keywords').dispatchEvent(new Event('input'));

            if (window.Sonner) {
                window.Sonner.success('Smart SEO metadata generated for {{ $seo->page_name }}!');
            }
        }
    })
    .catch(err => console.error(err));
}

// SERP Desktop vs Mobile toggle
function setSerpDevice(device) {
    const box = document.getElementById('serpSnippetBox');
    const btnDesktop = document.getElementById('btnSerpDesktop');
    const btnMobile = document.getElementById('btnSerpMobile');

    if (device === 'mobile') {
        btnMobile.classList.add('active');
        btnDesktop.classList.remove('active');
        box.classList.add('mobile-mode');
    } else {
        btnDesktop.classList.add('active');
        btnMobile.classList.remove('active');
        box.classList.remove('mobile-mode');
    }
}

// Social Media Type toggle
function setSocialType(type) {
    const btnOg = document.getElementById('btnSocialOg');
    const btnTwitter = document.getElementById('btnSocialTwitter');
    const cardBox = document.getElementById('socialCardBox');

    if (type === 'twitter') {
        btnTwitter.classList.add('active');
        btnOg.classList.remove('active');
        cardBox.style.borderRadius = '20px';
    } else {
        btnOg.classList.add('active');
        btnTwitter.classList.remove('active');
        cardBox.style.borderRadius = 'var(--radius-lg)';
    }
}

// JSON-LD Syntax Validator
function validateJsonSyntax(val) {
    const badge = document.getElementById('jsonValidatorBadge');
    if (!badge) return;
    const trimmed = val.trim();

    if (!trimmed) {
        badge.style.display = 'none';
        return;
    }

    badge.style.display = 'inline-block';
    try {
        JSON.parse(trimmed);
        badge.textContent = 'Valid JSON-LD';
        badge.style.background = 'rgba(16, 185, 129, 0.15)';
        badge.style.color = '#10b981';
    } catch (e) {
        badge.textContent = 'Invalid JSON Syntax';
        badge.style.background = 'rgba(239, 68, 68, 0.15)';
        badge.style.color = '#ef4444';
    }
}

// Keyboard shortcut Ctrl+S
document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        document.getElementById('seoEditForm').submit();
    }
});

function previewOgImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('ogImagePreview');
            const socialPreview = document.getElementById('socialPreviewImage');
            if (preview) preview.src = e.target.result;
            if (socialPreview) socialPreview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
