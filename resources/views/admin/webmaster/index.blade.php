@extends('admin.layouts.app')

@section('title', 'Webmaster Tools & Analytics Hub - Raghuvir Atta Admin')

@push('styles')
<style>
/* ── Webmaster & Analytics Hub Custom Tokens ──────────────────────────────── */
.analytics-hero-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.25rem;
    margin-bottom: 1.75rem;
}
@media (max-width: 1200px) {
    .analytics-hero-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 640px) {
    .analytics-hero-grid {
        grid-template-columns: 1fr;
    }
}

.analytics-status-card {
    background: var(--card, #ffffff);
    border: 1px solid var(--border, #e2e8f0);
    border-radius: var(--radius-xl, 16px);
    padding: 1.25rem 1.4rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 0.95rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    position: relative;
    overflow: hidden;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.analytics-status-card:hover {
    transform: translateY(-3px);
    border-color: var(--border-strong, #cbd5e1);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
}
.analytics-status-card.card-gsc {
    border-top: 3px solid #ea4335;
}
.analytics-status-card.card-ga4 {
    border-top: 3px solid #f59e0b;
}
.analytics-status-card.card-gtm {
    border-top: 3px solid #3b82f6;
}
.analytics-status-card.card-sitemap {
    border-top: 3px solid #10b981;
}

.card-mini-icon-wrap {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-md, 10px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
}

.status-pill-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 9999px;
    font-size: 0.72rem;
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: 0.02em;
}
.status-pill-badge.connected {
    background: rgba(16, 185, 129, 0.12);
    color: #059669;
    border: 1px solid rgba(16, 185, 129, 0.25);
}
html.dark .status-pill-badge.connected {
    background: rgba(16, 185, 129, 0.2);
    color: #34d399;
    border-color: rgba(16, 185, 129, 0.35);
}
.status-pill-badge.not-connected {
    background: rgba(239, 68, 68, 0.12);
    color: #dc2626;
    border: 1px solid rgba(239, 68, 68, 0.25);
}
html.dark .status-pill-badge.not-connected {
    background: rgba(239, 68, 68, 0.2);
    color: #f87171;
    border-color: rgba(239, 68, 68, 0.35);
}
.status-pill-badge.disabled {
    background: var(--muted, #f1f5f9);
    color: var(--muted-foreground, #64748b);
    border: 1px solid var(--border, #e2e8f0);
}

/* ── Toggle Switches (iOS / Shadcn style) ─────────────────────────────────── */
.switch-toggle-label {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    cursor: pointer;
    user-select: none;
    font-weight: 600;
    font-size: 0.825rem;
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
    transition: background 0.25s ease;
    flex-shrink: 0;
    border: none;
    padding: 0;
    margin: 0;
}
html.dark .switch-toggle-input {
    background: #334155;
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
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}
.switch-toggle-input:checked {
    background: #10b981;
}
.switch-toggle-input:checked::after {
    transform: translateX(18px);
}

/* ── Responsive Grids ────────────────────────────────────────────────────── */
.webmaster-grid-2col {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.35rem;
}
@media (max-width: 992px) {
    .webmaster-grid-2col {
        grid-template-columns: 1fr;
    }
}

/* ── Code Snippet & Modal ────────────────────────────────────────────────── */
.code-preview-snippet {
    background: #0f172a;
    color: #e2e8f0;
    font-family: 'JetBrains Mono', 'Fira Code', monospace;
    font-size: 0.775rem;
    padding: 1rem 1.25rem;
    border-radius: 10px;
    overflow-x: auto;
    white-space: pre-wrap;
    word-break: break-all;
    line-height: 1.55;
    border: 1px solid rgba(255, 255, 255, 0.1);
}
</style>
@endpush

@section('content')
{{-- Breadcrumb Navigation --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.85rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span style="color: var(--muted-foreground);">Search Engine &amp; Growth</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Webmaster &amp; Analytics Tools</span>
</div>

{{-- ===== TOP HERO HEADER BANNER ===== --}}
<div class="card-syndron" style="margin-bottom: 1.5rem; background: linear-gradient(135deg, var(--card) 0%, rgba(14, 165, 233, 0.05) 100%);">
    <div class="card-syndron-body" style="padding: 1.5rem 1.75rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.25rem;">
        <div style="display: flex; align-items: center; gap: 1.15rem;">
            <div style="width: 54px; height: 54px; border-radius: var(--radius-lg); background: linear-gradient(135deg, rgba(14, 165, 233, 0.16) 0%, rgba(2, 132, 199, 0.08) 100%); border: 1px solid rgba(14, 165, 233, 0.28); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; flex-shrink: 0; box-shadow: 0 4px 14px rgba(14, 165, 233, 0.12);">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
                <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem; flex-wrap: wrap;">
                    <h1 class="page-title-main" style="margin-bottom: 0; font-size: 1.45rem;">Webmaster &amp; Analytics Tools</h1>
                    <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 700; font-size: 0.75rem;">
                        <i class="fa-solid fa-bolt"></i> Realtime Tracking
                    </span>
                    <span class="badge-tag" style="background: rgba(14, 165, 233, 0.15); color: #0284c7; font-weight: 700; font-size: 0.75rem;">
                        Google &amp; Meta
                    </span>
                </div>
                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0; line-height: 1.45;">
                    Centralized hub to connect Google Search Console, Google Analytics 4 (GA4), Tag Manager, Meta Pixel, and manage real-time XML sitemaps.
                </p>
            </div>
        </div>

        {{-- Header Actions --}}
        <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
            <button type="button" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="openCodePreviewModal()" title="Inspect HTML Head Tags">
                <i class="fa-solid fa-code" style="color: #0284c7;"></i>
                <span>Inspect Live &lt;head&gt; Code</span>
            </button>
            <a href="{{ route('sitemap') }}" target="_blank" class="btn-syndron btn-syndron-secondary btn-syndron-sm" title="Open Dynamic XML Sitemap">
                <i class="fa-solid fa-sitemap" style="color: #10b981;"></i>
                <span>Live XML Sitemap</span>
            </a>
            <a href="{{ route('admin.seo.index') }}" class="btn-syndron btn-syndron-primary btn-syndron-sm" title="Go to Page SEO Titles & Meta">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
                <span>Page SEO Hub</span>
            </a>
        </div>
    </div>
</div>

{{-- ===== FLASH ALERTS ===== --}}
@if(session('success'))
    <div class="leads-alert leads-alert-success" id="flashAlert">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.15rem; color: #10b981;"></i>
            <span style="font-weight: 600; font-size: 0.875rem;">{{ session('success') }}</span>
        </div>
        <button type="button" class="leads-alert-close" onclick="this.parentElement.remove()">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

{{-- ===== 4 INTERACTIVE CONNECTION STATUS KPI CARDS ===== --}}
<div class="analytics-hero-grid">
    {{-- 1. Google Search Console --}}
    @php
        $isGscActive = !empty($settings['google_search_console_code']);
    @endphp
    <div class="analytics-status-card card-gsc">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="card-mini-icon-wrap" style="background: rgba(234, 67, 53, 0.12); color: #ea4335;">
                    <i class="fa-brands fa-google"></i>
                </div>
                <div>
                    <div style="font-weight: 700; font-size: 0.92rem; color: var(--foreground); line-height: 1.2;">Search Console</div>
                    <div style="font-size: 0.72rem; color: var(--muted-foreground);">Google SERP</div>
                </div>
            </div>
            <span class="status-pill-badge {{ $isGscActive ? 'connected' : 'not-connected' }}">
                <i class="fa-solid {{ $isGscActive ? 'fa-circle-check' : 'fa-circle-exclamation' }}"></i>
                {{ $isGscActive ? 'Connected' : 'Needs Token' }}
            </span>
        </div>
        <div style="background: var(--muted); border-radius: 8px; padding: 0.55rem 0.75rem; border: 1px solid var(--border);">
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-bottom: 2px;">Verification Status:</div>
            <div style="font-family: monospace; font-size: 0.8rem; color: var(--foreground); font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                {{ $isGscActive ? Str::limit($settings['google_search_console_code'], 24, '...') : 'Not configured yet' }}
            </div>
        </div>
        <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
            <a href="https://search.google.com/search-console" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #0284c7; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                <span>Open Search Console</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
            </a>
            <span style="font-size: 0.72rem; color: var(--muted-foreground); font-weight: 600;">SERP Indexing</span>
        </div>
    </div>

    {{-- 2. Google Analytics 4 (GA4) --}}
    @php
        $isGa4Active = !empty($settings['ga4_measurement_id']) && $settings['ga4_enabled'];
    @endphp
    <div class="analytics-status-card card-ga4">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="card-mini-icon-wrap" style="background: rgba(245, 158, 11, 0.12); color: #f59e0b;">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
                <div>
                    <div style="font-weight: 700; font-size: 0.92rem; color: var(--foreground); line-height: 1.2;">GA4 Analytics</div>
                    <div style="font-size: 0.72rem; color: var(--muted-foreground);">Google Analytics 4</div>
                </div>
            </div>
            <span class="status-pill-badge {{ $isGa4Active ? 'connected' : 'disabled' }}">
                <i class="fa-solid {{ $isGa4Active ? 'fa-circle-check' : 'fa-circle-pause' }}"></i>
                {{ $isGa4Active ? 'Tracking Active' : ($settings['ga4_measurement_id'] ? 'Disabled' : 'No ID') }}
            </span>
        </div>
        <div style="background: var(--muted); border-radius: 8px; padding: 0.55rem 0.75rem; border: 1px solid var(--border);">
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-bottom: 2px;">Measurement ID:</div>
            <div style="font-family: monospace; font-size: 0.825rem; color: var(--foreground); font-weight: 700;">
                {{ $settings['ga4_measurement_id'] ?: 'G-XXXXXXXXXX' }}
            </div>
        </div>
        <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
            <a href="https://analytics.google.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #f59e0b; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                <span>Open GA4 Dashboard</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
            </a>
            <span style="font-size: 0.72rem; color: var(--muted-foreground); font-weight: 600;">Realtime Stats</span>
        </div>
    </div>

    {{-- 3. Google Tag Manager / Meta Pixel --}}
    @php
        $isGtmActive = !empty($settings['gtm_container_id']) && $settings['gtm_enabled'];
        $isMetaActive = !empty($settings['meta_pixel_id']) && $settings['meta_pixel_enabled'];
    @endphp
    <div class="analytics-status-card card-gtm">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="card-mini-icon-wrap" style="background: rgba(59, 130, 246, 0.12); color: #3b82f6;">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <div>
                    <div style="font-weight: 700; font-size: 0.92rem; color: var(--foreground); line-height: 1.2;">Tag &amp; Pixel</div>
                    <div style="font-size: 0.72rem; color: var(--muted-foreground);">GTM / Meta Tracking</div>
                </div>
            </div>
            <span class="status-pill-badge {{ ($isGtmActive || $isMetaActive) ? 'connected' : 'disabled' }}">
                <i class="fa-solid {{ ($isGtmActive || $isMetaActive) ? 'fa-circle-check' : 'fa-circle' }}"></i>
                {{ $isGtmActive ? 'GTM Loaded' : ($isMetaActive ? 'Pixel Active' : 'Inactive') }}
            </span>
        </div>
        <div style="background: var(--muted); border-radius: 8px; padding: 0.55rem 0.75rem; border: 1px solid var(--border);">
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-bottom: 2px;">Container / Pixel:</div>
            <div style="font-family: monospace; font-size: 0.8rem; color: var(--foreground); font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                {{ $settings['gtm_container_id'] ?: ($settings['meta_pixel_id'] ? 'Pixel: ' . $settings['meta_pixel_id'] : 'Not configured') }}
            </div>
        </div>
        <div style="border-top: 1px solid var(--border); padding-top: 0.65rem; display: flex; align-items: center; justify-content: space-between;">
            <a href="https://tagmanager.google.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 700; color: #3b82f6; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                <span>Open Tag Manager</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
            </a>
            <span style="font-size: 0.72rem; color: var(--muted-foreground); font-weight: 600;">Container</span>
        </div>
    </div>

    {{-- 4. Dynamic XML Sitemap & Robots.txt --}}
    <div class="analytics-status-card card-sitemap">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="card-mini-icon-wrap" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                    <i class="fa-solid fa-sitemap"></i>
                </div>
                <div>
                    <div style="font-weight: 700; font-size: 0.92rem; color: var(--foreground); line-height: 1.2;">XML Sitemap</div>
                    <div style="font-size: 0.72rem; color: var(--muted-foreground);">Search Engine Index</div>
                </div>
            </div>
            <span class="status-pill-badge connected">
                <i class="fa-solid fa-circle-check"></i> 100% Live
            </span>
        </div>
        <div style="background: var(--muted); border-radius: 8px; padding: 0.55rem 0.75rem; border: 1px solid var(--border);">
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-bottom: 2px;">Indexed URLs Count:</div>
            <div style="font-family: monospace; font-size: 0.825rem; color: #10b981; font-weight: 800;">
                {{ $totalSitemapUrls }} Total URLs in /sitemap.xml
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

{{-- ===== MAIN CONFIGURATION FORM ===== --}}
<form action="{{ route('admin.webmaster.update') }}" method="POST" id="webmasterConfigForm">
    @csrf

    {{-- SECTION 1: Google Search Console & Webmaster Verification --}}
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
                    Verify site ownership in Google Search Console, Bing, Pinterest, and Yandex to index pages and track search impressions.
                </p>
            </div>
        </div>

        <div class="card-syndron-body" style="padding: 1.5rem 1.65rem;">
            <div class="webmaster-grid-2col">
                <!-- Google Search Console -->
                <div class="form-group-admin" style="grid-column: 1 / -1;">
                    <label for="google_search_console_code" class="form-label-admin" style="display: flex; justify-content: space-between; align-items: center;">
                        <span>
                            <i class="fa-brands fa-google" style="color: #ea4335; margin-right: 5px;"></i>
                            Google Search Console HTML Verification Token
                        </span>
                        <a href="https://search.google.com/search-console" target="_blank" style="font-size: 0.75rem; color: #0284c7; text-decoration: none; font-weight: 600;">
                            Get Verification Token from Google <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </label>
                    <input
                        type="text"
                        name="google_search_console_code"
                        id="google_search_console_code"
                        value="{{ old('google_search_console_code', $settings['google_search_console_code']) }}"
                        class="form-control-admin"
                        placeholder='e.g. google-site-verification=XXXXXXXXXXXXXXXXX or paste full <meta name="google-site-verification" content="..." />'
                        style="font-family: monospace; font-size: 0.85rem;"
                    >
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
                        value="{{ old('bing_webmaster_code', $settings['bing_webmaster_code']) }}"
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
                        value="{{ old('pinterest_verify_code', $settings['pinterest_verify_code']) }}"
                        class="form-control-admin"
                        placeholder="e.g. 8a7b6c5d4e3f2g1h"
                        style="font-family: monospace; font-size: 0.85rem;"
                    >
                    <div class="form-hint">Outputs <code>&lt;meta name="p:domain_verify" content="..."&gt;</code> in header.</div>
                </div>

                <!-- Yandex Verification -->
                <div class="form-group-admin" style="grid-column: 1 / -1;">
                    <label for="yandex_verify_code" class="form-label-admin">
                        <i class="fa-brands fa-yandex" style="color: #fc3f1d; margin-right: 5px;"></i>
                        Yandex Webmaster Verification
                    </label>
                    <input
                        type="text"
                        name="yandex_verify_code"
                        id="yandex_verify_code"
                        value="{{ old('yandex_verify_code', $settings['yandex_verify_code']) }}"
                        class="form-control-admin"
                        placeholder="e.g. a1b2c3d4e5f6g7h8"
                        style="font-family: monospace; font-size: 0.85rem;"
                    >
                    <div class="form-hint">Outputs <code>&lt;meta name="yandex-verification" content="..."&gt;</code> in header.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: Google Analytics 4 (GA4) & Google Tag Manager (GTM) --}}
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
            <div class="webmaster-grid-2col">
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
                                {{ $settings['ga4_enabled'] ? 'checked' : '' }}
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
                            value="{{ old('ga4_measurement_id', $settings['ga4_measurement_id']) }}"
                            class="form-control-admin"
                            placeholder="e.g. G-71K8XZ9ABC"
                            style="font-family: monospace; font-weight: 700; letter-spacing: 0.05em; font-size: 0.95rem; text-transform: uppercase;"
                            oninput="this.value = this.value.toUpperCase();"
                        >
                        <div class="form-hint">Found under <em>Admin &gt; Data Streams &gt; Web Stream Details</em> in GA4.</div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 8px; margin-top: 0.75rem;">
                        <input
                            type="checkbox"
                            name="ga4_anonymize_ip"
                            id="ga4_anonymize_ip"
                            value="1"
                            {{ $settings['ga4_anonymize_ip'] ? 'checked' : '' }}
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
                                {{ $settings['gtm_enabled'] ? 'checked' : '' }}
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
                            value="{{ old('gtm_container_id', $settings['gtm_container_id']) }}"
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

    {{-- SECTION 3: Meta (Facebook) Pixel --}}
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
            <div class="webmaster-grid-2col" style="align-items: center;">
                <div class="form-group-admin" style="margin-bottom: 0;">
                    <label for="meta_pixel_id" class="form-label-admin">
                        <i class="fa-brands fa-facebook" style="color: #1877f2; margin-right: 5px;"></i>
                        Meta Pixel ID
                    </label>
                    <input
                        type="text"
                        name="meta_pixel_id"
                        id="meta_pixel_id"
                        value="{{ old('meta_pixel_id', $settings['meta_pixel_id']) }}"
                        class="form-control-admin"
                        placeholder="e.g. 123456789012345"
                        style="font-family: monospace; font-size: 0.9rem;"
                    >
                    <div class="form-hint">Found in Meta Events Manager &gt; Data Sources.</div>
                </div>

                <div style="background: var(--muted); border-radius: 12px; padding: 1.15rem 1.35rem; border: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <div style="font-weight: 700; font-size: 0.92rem; color: var(--foreground); margin-bottom: 2px;">Meta Pixel Status</div>
                        <div style="font-size: 0.775rem; color: var(--muted-foreground);">Inject Facebook conversion tracking script</div>
                    </div>
                    <label class="switch-toggle-label" title="Enable / Disable Meta Pixel">
                        <input
                            type="checkbox"
                            name="meta_pixel_enabled"
                            value="1"
                            class="switch-toggle-input"
                            {{ $settings['meta_pixel_enabled'] ? 'checked' : '' }}
                        >
                        <span style="font-size: 0.8rem; font-weight: 600;">Active</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 4: Custom Header & Footer Scripts --}}
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
            <div class="webmaster-grid-2col">
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
                    >{{ old('custom_header_scripts', $settings['custom_header_scripts']) }}</textarea>
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
                    >{{ old('custom_footer_scripts', $settings['custom_footer_scripts']) }}</textarea>
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

{{-- SECTION 5: Real-time XML Sitemap & Robots.txt Editor --}}
<div class="webmaster-grid-2col" style="margin-top: 1.5rem; margin-bottom: 2.5rem;">
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
            <form action="{{ route('admin.webmaster.robots') }}" method="POST">
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

{{-- ===== LIVE CODE PREVIEW INSPECTION MODAL ===== --}}
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
@endsection

@push('scripts')
<script>
// Copy Sitemap URL with instant feedback
function copySitemapUrl() {
    const input = document.getElementById('sitemapFullUrlInput');
    const label = document.getElementById('copySitemapLabel');
    if (!input) return;

    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
        if (label) label.textContent = 'Copied!';
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

// Auto-dismiss alert after 5s
const flashAlert = document.getElementById('flashAlert');
if (flashAlert) setTimeout(() => flashAlert.remove(), 5000);
</script>
@endpush
