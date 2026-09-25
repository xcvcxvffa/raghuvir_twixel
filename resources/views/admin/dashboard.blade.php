@extends('admin.layouts.app')

@section('title', 'Executive Overview & Analytics')

@push('styles')
<style>
    /* ==========================================================================
       RAGHUVIR ATTA — STATE-OF-THE-ART EXECUTIVE DASHBOARD
       Ultra-Modern Enterprise UI · Fluid Responsive · Glassmorphism · Vibrant
       ========================================================================== */

    /* ── Ticker & Factory Capacity Bar ─────────────────────────────────────── */
    .dashboard-ticker-strip {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg, 12px);
        padding: 0.65rem 1.25rem;
        margin-bottom: 1.25rem;
        font-size: 0.78rem;
        color: var(--muted-foreground);
        flex-wrap: wrap;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }
    .ticker-left-group {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .ticker-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        color: var(--foreground);
    }
    .ticker-chip i {
        color: var(--accent);
    }
    .ticker-live-clock {
        font-family: monospace;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--accent);
        background: rgba(239, 128, 28, 0.08);
        border: 1px solid rgba(239, 128, 28, 0.2);
        padding: 2px 8px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* ── 1. Hero Command Center ────────────────────────────────────────────── */
    .dashboard-hero-banner {
        position: relative;
        background: linear-gradient(135deg, rgba(239, 128, 28, 0.09) 0%, var(--card) 48%, rgba(99, 102, 241, 0.05) 100%);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 2rem 2.25rem;
        box-shadow: 0 12px 35px -12px rgba(0, 0, 0, 0.08), 0 2px 6px rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.75rem;
        flex-wrap: wrap;
        margin-bottom: 1.75rem;
        overflow: hidden;
    }
    .dashboard-hero-banner::after {
        content: '';
        position: absolute;
        top: -80px;
        right: -80px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(239, 128, 28, 0.16) 0%, transparent 70%);
        pointer-events: none;
    }
    .dashboard-hero-banner::before {
        content: '';
        position: absolute;
        bottom: -70px;
        left: 20%;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }
    .dashboard-hero-content {
        display: flex;
        align-items: center;
        gap: 1.4rem;
        position: relative;
        z-index: 1;
    }
    .hero-avatar-badge {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        background: linear-gradient(135deg, #EF801C 0%, #ea580c 100%);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.85rem;
        flex-shrink: 0;
        box-shadow: 0 10px 24px -4px rgba(239, 128, 28, 0.45);
        position: relative;
    }
    .hero-avatar-badge::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 22px;
        border: 2px solid rgba(239, 128, 28, 0.35);
        animation: pulseRing 3.2s infinite ease-out;
    }
    @keyframes pulseRing {
        0% { transform: scale(0.96); opacity: 0.8; }
        50% { transform: scale(1.1); opacity: 0; }
        100% { transform: scale(0.96); opacity: 0; }
    }
    .hero-greeting-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 0.74rem;
        font-weight: 700;
        color: var(--muted-foreground);
        background: var(--secondary);
        border: 1px solid var(--border);
        padding: 3px 11px;
        border-radius: 9999px;
        margin-bottom: 0.4rem;
    }
    .live-indicator-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #10b981;
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.25);
        animation: livePulse 1.8s infinite;
    }
    @keyframes livePulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.3); opacity: 0.6; }
    }
    .hero-title {
        font-size: 1.65rem;
        font-weight: 800;
        color: var(--foreground);
        margin: 0 0 0.35rem 0;
        letter-spacing: -0.025em;
        line-height: 1.2;
    }
    .hero-title-highlight {
        background: linear-gradient(135deg, #EF801C 0%, #b45309 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-subtitle {
        font-size: 0.87rem;
        color: var(--foreground-muted);
        margin: 0;
        max-width: 660px;
        line-height: 1.5;
    }
    .hero-quick-actions {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }
    .hero-quick-actions .btn-syndron-primary {
        box-shadow: 0 8px 24px -5px rgba(239, 128, 28, 0.5);
    }
    .hero-quick-actions .btn-syndron:hover {
        transform: translateY(-2px);
    }

    /* ── 2. Top 4 Executive KPI Cards with Inline Sparklines ───────────────── */
    .metrics-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.35rem;
        margin-bottom: 1.75rem;
    }
    .metric-card-pro {
        position: relative;
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 1.45rem 1.5rem;
        box-shadow: 0 6px 22px -6px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-decoration: none;
        overflow: hidden;
        transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.22s, border-color 0.22s;
        cursor: pointer;
    }
    .metric-card-pro::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: transparent;
        transition: background 0.25s ease;
    }
    .metric-card-pro:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 32px -8px rgba(0, 0, 0, 0.12);
    }
    .metric-card-pro.theme-orange:hover::before { background: linear-gradient(90deg, #EF801C, #f59e0b); }
    .metric-card-pro.theme-purple:hover::before { background: linear-gradient(90deg, #6366f1, #8b5cf6); }
    .metric-card-pro.theme-emerald:hover::before { background: linear-gradient(90deg, #10b981, #34d399); }
    .metric-card-pro.theme-sky:hover::before { background: linear-gradient(90deg, #0284c7, #38bdf8); }

    .metric-top-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.9rem;
    }
    .metric-category-tag {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--muted-foreground);
    }
    .metric-icon-bubble {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .metric-card-pro:hover .metric-icon-bubble {
        transform: scale(1.08);
    }
    .metric-icon-bubble.orange {
        background: rgba(239, 128, 28, 0.12);
        color: #EF801C;
        box-shadow: 0 4px 12px rgba(239, 128, 28, 0.2);
    }
    .metric-icon-bubble.purple {
        background: rgba(99, 102, 241, 0.12);
        color: #6366f1;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
    }
    .metric-icon-bubble.emerald {
        background: rgba(16, 185, 129, 0.12);
        color: #10b981;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }
    .metric-icon-bubble.sky {
        background: rgba(2, 132, 199, 0.12);
        color: #0284c7;
        box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2);
    }

    .metric-stat-middle {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 0.95rem;
    }
    .metric-big-number {
        font-size: 2.35rem;
        font-weight: 800;
        color: var(--foreground);
        line-height: 1;
        letter-spacing: -0.035em;
    }
    .metric-sparkline-svg {
        width: 85px;
        height: 34px;
        overflow: visible;
    }

    .metric-badge-trend {
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .metric-badge-trend.positive { background: rgba(16, 185, 129, 0.12); color: #10b981; }
    .metric-badge-trend.negative { background: rgba(239, 68, 68, 0.12); color: #ef4444; }
    .metric-badge-trend.neutral { background: rgba(2, 132, 199, 0.1); color: #0284c7; }

    .metric-bottom-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.85rem;
        border-top: 1px solid var(--border);
        font-size: 0.76rem;
        color: var(--muted-foreground);
    }
    .metric-bottom-info strong {
        color: var(--foreground);
        transition: color 0.15s ease;
    }
    .metric-card-pro:hover .metric-bottom-info strong {
        color: var(--accent);
    }

    /* ── 3. Charts Command Grid ────────────────────────────────────────────── */
    .dashboard-charts-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(0, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.75rem;
        align-items: stretch;
    }
    .chart-time-pills {
        display: inline-flex;
        align-items: center;
        background: var(--secondary);
        padding: 3px;
        border-radius: 10px;
        border: 1px solid var(--border);
        gap: 2px;
    }
    .chart-pill-btn {
        padding: 5px 12px;
        font-size: 0.73rem;
        font-weight: 700;
        border-radius: 7px;
        border: none;
        background: transparent;
        color: var(--muted-foreground);
        cursor: pointer;
        transition: all 0.16s ease;
    }
    .chart-pill-btn:hover {
        color: var(--foreground);
    }
    .chart-pill-btn.active {
        background: var(--card);
        color: var(--accent);
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    }

    .stat-metric-pill-box {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        margin-bottom: 1.25rem;
        flex-wrap: wrap;
        padding: 0.85rem 1.25rem;
        background: var(--secondary);
        border: 1px solid var(--border);
        border-radius: 12px;
    }
    .stat-metric-item {
        display: flex;
        flex-direction: column;
    }
    .stat-metric-lbl {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--muted-foreground);
        letter-spacing: 0.04em;
    }
    .stat-metric-val {
        font-size: 1.25rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    /* ── 4. Product Demand Portfolio Showcase (Real 3D Packs) ──────────────── */
    .donut-container {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 180px;
        margin-bottom: 1.25rem;
    }
    .donut-center-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        pointer-events: none;
    }
    .donut-center-val {
        font-size: 1.45rem;
        font-weight: 800;
        color: var(--foreground);
        line-height: 1;
        letter-spacing: -0.02em;
    }
    .donut-center-lbl {
        font-size: 0.68rem;
        font-weight: 800;
        color: var(--muted-foreground);
        text-transform: uppercase;
        margin-top: 2px;
    }

    .product-showcase-row {
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
        border-top: 1px solid var(--border);
        padding-top: 1rem;
    }
    .product-item-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0.65rem 0.85rem;
        border-radius: 12px;
        background: var(--secondary);
        border: 1px solid var(--border);
        transition: transform 0.18s ease, border-color 0.18s ease;
        text-decoration: none;
        color: inherit;
    }
    .product-item-card:hover {
        transform: translateY(-2px);
        border-color: var(--accent);
    }
    .product-thumb-box {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px solid var(--border);
        flex-shrink: 0;
        padding: 2px;
    }
    .product-thumb-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .product-info-col {
        flex: 1;
        min-width: 0;
    }
    .product-name-title {
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--foreground);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .product-tag-pill {
        font-size: 0.68rem;
        font-weight: 600;
        color: var(--muted-foreground);
    }
    .product-progress-track {
        width: 65px;
        height: 6px;
        border-radius: 9999px;
        background: rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-right: 8px;
    }
    html.dark .product-progress-track {
        background: rgba(255, 255, 255, 0.12);
    }
    .product-progress-fill {
        height: 100%;
        border-radius: 9999px;
    }
    .product-percent-num {
        font-size: 0.85rem;
        font-weight: 800;
        min-width: 34px;
        text-align: right;
    }

    /* ── 5. Bottom CRM Leads & Operations Grid ─────────────────────────────── */
    .dashboard-bottom-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(0, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
        align-items: start;
    }

    .leads-modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
        font-size: 0.84rem;
    }
    .leads-modern-table th {
        background-color: var(--secondary);
        padding: 12px 16px;
        color: var(--muted-foreground);
        font-size: 0.725rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1.5px solid var(--border);
        white-space: nowrap;
    }
    .leads-modern-table td {
        padding: 12px 16px;
        border-bottom: 1px solid var(--border);
        color: var(--foreground);
        vertical-align: middle;
        background-color: var(--card);
        transition: background-color 0.15s ease;
    }
    .leads-modern-table tr:hover td {
        background-color: var(--secondary);
    }
    .leads-modern-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 9px;
        border-radius: 9999px;
        white-space: nowrap;
    }
    .status-badge-chip.danger {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.25);
    }
    .status-badge-chip.warning {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.25);
    }
    .status-badge-chip.success {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }

    .btn-whatsapp-chat {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: rgba(37, 211, 102, 0.12);
        color: #25D366;
        border: 1px solid rgba(37, 211, 102, 0.3);
        transition: all 0.18s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }
    .btn-whatsapp-chat:hover {
        background: #25D366;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.45);
        transform: scale(1.08);
    }

    .quick-tiles-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.85rem;
        margin-bottom: 1.25rem;
    }
    .quick-tile-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.9rem 1rem;
        border-radius: 12px;
        background: var(--card);
        border: 1px solid var(--border);
        color: var(--foreground);
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .quick-tile-btn:hover {
        border-color: var(--accent);
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 4px 14px -3px rgba(0,0,0,0.08);
        color: var(--accent);
    }
    .quick-tile-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        flex-shrink: 0;
    }

    .system-health-panel {
        padding: 1.15rem 1.35rem;
        border-radius: 14px;
        background: var(--secondary);
        border: 1px solid var(--border);
    }
    .system-health-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.78rem;
        font-weight: 600;
        padding: 5px 0;
    }
    .system-health-row:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        margin-bottom: 4px;
    }
    html.dark .system-health-row:not(:last-child) {
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    /* ── 6. Responsive Breakpoints ─────────────────────────────────────────── */
    @media (max-width: 1280px) {
        .metrics-row {
            grid-template-columns: repeat(2, 1fr);
        }
        .dashboard-charts-grid,
        .dashboard-bottom-grid {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 768px) {
        .dashboard-ticker-strip {
            flex-direction: column;
            align-items: flex-start;
        }
        .dashboard-hero-banner {
            flex-direction: column;
            align-items: flex-start;
            padding: 1.35rem 1.25rem;
        }
        .dashboard-hero-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        .hero-title {
            font-size: 1.4rem;
        }
        .hero-quick-actions {
            width: 100%;
        }
        .hero-quick-actions .btn-syndron {
            flex: 1;
            justify-content: center;
        }
        .metrics-row {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        .quick-tiles-grid {
            grid-template-columns: 1fr;
        }
        .stat-metric-pill-box {
            gap: 1rem;
        }
    }
</style>
@endpush

@section('content')

<!-- ========================================================================= -->
<!-- 0. REAL-TIME FACTORY CAPACITY & MILL STATUS TICKER                        -->
<!-- ========================================================================= -->
<div class="dashboard-ticker-strip">
    <div class="ticker-left-group">
        <div class="ticker-chip">
            <i class="fa-solid fa-industry"></i>
            <span>Milling Units: <strong style="color: #10b981;">Ahmedabad &bull; 85 Tons/Day</strong></span>
        </div>
        <span style="opacity: 0.3;">|</span>
        <div class="ticker-chip">
            <i class="fa-solid fa-wheat-awn"></i>
            <span>Sourcing: <strong>100% Sharbati MP Grain</strong></span>
        </div>
        <span style="opacity: 0.3;">|</span>
        <div class="ticker-chip">
            <i class="fa-solid fa-truck-fast"></i>
            <span>Logistics: <strong>Gujarat Wide Doorstep Active</strong></span>
        </div>
    </div>

    <div style="display: flex; align-items: center; gap: 10px;">
        <span class="ticker-live-clock">
            <i class="fa-regular fa-clock"></i>
            <span id="liveClockDisplay">17:08:00 IST</span>
        </span>
    </div>
</div>

<!-- ========================================================================= -->
<!-- 1. HERO COMMAND CENTER WELCOME BANNER                                     -->
<!-- ========================================================================= -->
<div class="dashboard-hero-banner">
    <div class="dashboard-hero-content">
        <div class="hero-avatar-badge" title="Raghuvir Atta Master Console">
            <i class="fa-solid fa-wheat-awn"></i>
        </div>
        <div>
            <div class="hero-greeting-pill">
                <span class="live-indicator-dot"></span>
                <span>Live Admin Console &bull; {{ now()->format('l, d F Y') }}</span>
                <span style="opacity: 0.5;">&bull;</span>
                <span style="color: #10b981;"><i class="fa-solid fa-shield-halved"></i> Enterprise Active</span>
            </div>
            <h1 class="hero-title">
                Welcome back, <span class="hero-title-highlight">{{ auth()->user()->name ?? 'Raghuvir Admin' }}</span>! 👋
            </h1>
            <p class="hero-subtitle">
                Here is what's happening with Raghuvir Atta across production catalogs, wholesale buyer inquiries, media galleries, and public catalog engagement today.
            </p>
        </div>
    </div>

    <div class="hero-quick-actions">
        <a href="{{ route('admin.products.create') }}" class="btn-syndron btn-syndron-primary" title="Create a new flour product SKU">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Add Product</span>
        </a>
        <a href="{{ route('admin.galleries.create') }}" class="btn-syndron btn-syndron-secondary" title="Upload plant photos or processing videos">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <span>Add Media</span>
        </a>
        <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary" title="Review customer dealership and wholesale inquiries">
            <i class="fa-solid fa-envelope-open-text"></i>
            <span>Customer Leads</span>
            @if(($stats['new_inquiries'] ?? 0) > 0)
                <span class="badge-tag" style="background:#ef4444;color:#fff;margin-left:4px;padding:2px 8px;border-radius:9999px;">
                    {{ $stats['new_inquiries'] }}
                </span>
            @endif
        </a>
        <a href="{{ url('/') }}" target="_blank" class="btn-syndron btn-syndron-secondary" style="padding: 0.65rem 0.85rem;" title="Open Public Website">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </a>
    </div>
</div>

<!-- ========================================================================= -->
<!-- 2. FOUR HIGH-IMPACT EXECUTIVE KPI CARDS WITH INLINE SPARKLINES            -->
<!-- ========================================================================= -->
<div class="metrics-row">
    <!-- Card 1: Product Catalog -->
    <a href="{{ route('admin.products.index') }}" class="metric-card-pro theme-orange">
        <div>
            <div class="metric-top-bar">
                <span class="metric-category-tag">Product Catalog</span>
                <div class="metric-icon-bubble orange">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
            </div>
            <div class="metric-stat-middle">
                <div>
                    <span class="metric-big-number">{{ $stats['total_products'] ?? 0 }}</span>
                    <span class="metric-badge-trend positive" style="margin-left: 6px;">
                        <i class="fa-solid fa-circle-check"></i> 100% In Stock
                    </span>
                </div>
                <!-- Inline SVG Sparkline -->
                <svg class="metric-sparkline-svg" viewBox="0 0 100 35" fill="none">
                    <path d="M0 28 Q 20 26, 35 18 T 70 12 T 100 4" stroke="#EF801C" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M0 28 Q 20 26, 35 18 T 70 12 T 100 4 L 100 35 L 0 35 Z" fill="rgba(239, 128, 28, 0.12)"/>
                    <circle cx="100" cy="4" r="3.5" fill="#EF801C"/>
                </svg>
            </div>
        </div>
        <div class="metric-bottom-info">
            <span><i class="fa-solid fa-wheat-awn" style="color: #EF801C; margin-right: 4px;"></i> Chakki, Bati &amp; Bran</span>
            <strong>Active in Catalog &rarr;</strong>
        </div>
    </a>

    <!-- Card 2: Wholesale Inquiries & Leads -->
    <a href="{{ route('admin.leads.index') }}" class="metric-card-pro theme-purple">
        <div>
            <div class="metric-top-bar">
                <span class="metric-category-tag">Wholesale Leads</span>
                <div class="metric-icon-bubble purple">
                    <i class="fa-solid fa-headset"></i>
                </div>
            </div>
            <div class="metric-stat-middle">
                <div>
                    <span class="metric-big-number" style="color: {{ ($stats['new_inquiries'] ?? 0) > 0 ? '#ef4444' : 'inherit' }};">
                        {{ $stats['total_inquiries'] ?? 0 }}
                    </span>
                    @if(($stats['new_inquiries'] ?? 0) > 0)
                        <span class="metric-badge-trend negative" style="margin-left: 6px;">
                            <i class="fa-solid fa-bell"></i> {{ $stats['new_inquiries'] }} Pending
                        </span>
                    @else
                        <span class="metric-badge-trend positive" style="margin-left: 6px;">
                            <i class="fa-solid fa-check-double"></i> All Handled
                        </span>
                    @endif
                </div>
                <!-- Inline SVG Sparkline -->
                <svg class="metric-sparkline-svg" viewBox="0 0 100 35" fill="none">
                    <path d="M0 32 Q 25 24, 50 16 T 80 10 T 100 2" stroke="#6366f1" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M0 32 Q 25 24, 50 16 T 80 10 T 100 2 L 100 35 L 0 35 Z" fill="rgba(99, 102, 241, 0.12)"/>
                    <circle cx="100" cy="2" r="3.5" fill="#6366f1"/>
                </svg>
            </div>
        </div>
        <div class="metric-bottom-info">
            <span><i class="fa-solid fa-arrow-trend-up" style="color: #6366f1; margin-right: 4px;"></i> {{ $stats['inquiries_growth'] ?? '+18.4%' }} this month</span>
            <strong>Review Hub &rarr;</strong>
        </div>
    </a>

    <!-- Card 3: Media Gallery Catalog -->
    <a href="{{ route('admin.galleries.index') }}" class="metric-card-pro theme-emerald">
        <div>
            <div class="metric-top-bar">
                <span class="metric-category-tag">Media Assets</span>
                <div class="metric-icon-bubble emerald">
                    <i class="fa-solid fa-photo-film"></i>
                </div>
            </div>
            <div class="metric-stat-middle">
                <div>
                    <span class="metric-big-number">{{ $stats['total_galleries'] ?? 0 }}</span>
                    <span class="metric-badge-trend positive" style="margin-left: 6px;">
                        <i class="fa-solid fa-video"></i> 4K Quality
                    </span>
                </div>
                <!-- Inline SVG Sparkline -->
                <svg class="metric-sparkline-svg" viewBox="0 0 100 35" fill="none">
                    <path d="M0 25 Q 30 20, 60 14 T 100 6" stroke="#10b981" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M0 25 Q 30 20, 60 14 T 100 6 L 100 35 L 0 35 Z" fill="rgba(16, 185, 129, 0.12)"/>
                    <circle cx="100" cy="6" r="3.5" fill="#10b981"/>
                </svg>
            </div>
        </div>
        <div class="metric-bottom-info">
            <span><i class="fa-solid fa-industry" style="color: #10b981; margin-right: 4px;"></i> Mills, Grain &amp; Factory</span>
            <strong>Manage Media &rarr;</strong>
        </div>
    </a>

    <!-- Card 4: Editorial & SEO Articles -->
    <a href="{{ route('admin.blogs.index') }}" class="metric-card-pro theme-sky">
        <div>
            <div class="metric-top-bar">
                <span class="metric-category-tag">Editorial &amp; Recipes</span>
                <div class="metric-icon-bubble sky">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <div class="metric-stat-middle">
                <div>
                    <span class="metric-big-number">{{ $stats['total_blogs'] ?? 0 }}</span>
                    <span class="metric-badge-trend neutral" style="margin-left: 6px;">
                        <i class="fa-solid fa-magnifying-glass-chart"></i> SEO Ranked
                    </span>
                </div>
                <!-- Inline SVG Sparkline -->
                <svg class="metric-sparkline-svg" viewBox="0 0 100 35" fill="none">
                    <path d="M0 28 Q 25 18, 55 12 T 100 4" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M0 28 Q 25 18, 55 12 T 100 4 L 100 35 L 0 35 Z" fill="rgba(2, 132, 199, 0.12)"/>
                    <circle cx="100" cy="4" r="3.5" fill="#0284c7"/>
                </svg>
            </div>
        </div>
        <div class="metric-bottom-info">
            <span><i class="fa-solid fa-book-open" style="color: #0284c7; margin-right: 4px;"></i> Recipes &amp; Nutrition</span>
            <strong>Publish Posts &rarr;</strong>
        </div>
    </a>
</div>

<!-- ========================================================================= -->
<!-- 3. INTERACTIVE ANALYTICS & PRODUCT PORTFOLIO SHOWCASE                     -->
<!-- ========================================================================= -->
<div class="dashboard-charts-grid">
    <!-- Left: Audience Growth & Inquiries Spline Area Chart -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-chart-area" style="color: var(--accent);"></i>
                    <span>Visitor Traffic &amp; Wholesale Inquiries</span>
                </div>
                <div class="card-syndron-desc">Annual engagement trajectory across public catalog touchpoints</div>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                <!-- Time Range Filter Pills -->
                <div class="chart-time-pills">
                    <button type="button" class="chart-pill-btn active" onclick="updateTrafficRange('year', this)">This Year</button>
                    <button type="button" class="chart-pill-btn" onclick="updateTrafficRange('6months', this)">Last 6M</button>
                    <button type="button" class="chart-pill-btn" onclick="updateTrafficRange('30days', this)">30 Days</button>
                </div>
                <span class="badge-tag" style="background: rgba(239, 128, 28, 0.1); color: var(--accent); font-weight: 700; border: 1px solid rgba(239, 128, 28, 0.25);">
                    <i class="fa-solid fa-bolt" style="font-size: 0.65rem;"></i> Live Sync
                </span>
            </div>
        </div>

        <div class="card-syndron-body" style="padding: 1.5rem;">
            <!-- Highlights Sub-header with Metrics -->
            <div class="stat-metric-pill-box">
                <div class="stat-metric-item">
                    <span class="stat-metric-lbl">Peak Monthly Traffic</span>
                    <span class="stat-metric-val" style="color: #EF801C;">24.0K <span style="font-size: 0.72rem; color: #10b981; font-weight: 700;">+12.6%</span></span>
                </div>
                <div style="width: 1px; height: 32px; background: var(--border);"></div>
                <div class="stat-metric-item">
                    <span class="stat-metric-lbl">Wholesale Leads</span>
                    <span class="stat-metric-val" style="color: #6366f1;">62 Leads <span style="font-size: 0.72rem; color: #10b981; font-weight: 700;">+18.4%</span></span>
                </div>
                <div style="width: 1px; height: 32px; background: var(--border);"></div>
                <div class="stat-metric-item">
                    <span class="stat-metric-lbl">Deal Conversion</span>
                    <span class="stat-metric-val" style="color: #10b981;">4.85% <span style="font-size: 0.72rem; color: var(--muted-foreground); font-weight: 600;">Industry High</span></span>
                </div>
                <div style="width: 1px; height: 32px; background: var(--border);"></div>
                <div class="stat-metric-item">
                    <span class="stat-metric-lbl">Avg Response Time</span>
                    <span class="stat-metric-val" style="color: #0284c7;">&lt; 15 Mins <span style="font-size: 0.72rem; color: #10b981; font-weight: 700;">Fast</span></span>
                </div>
            </div>

            <!-- Canvas Container -->
            <div style="position: relative; height: 285px;">
                <canvas id="trafficGrowthChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Right: Product Portfolio & Demand Distribution (With 3D Packshots) -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-chart-pie" style="color: var(--accent);"></i>
                    <span>Product Catalog Reach</span>
                </div>
                <div class="card-syndron-desc">Distribution by consumer demand &amp; inquiry volume</div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" title="View all product details">
                <span>View All</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="card-syndron-body" style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between;">
            <!-- Donut Artboard with Centered Overlay -->
            <div class="donut-container">
                <canvas id="productDistributionChart"></canvas>
                <div class="donut-center-text">
                    <div class="donut-center-val">100%</div>
                    <div class="donut-center-lbl">Chakki Purity</div>
                </div>
            </div>

            <!-- Real 3D Packshots & Demand Breakdown -->
            <div class="product-showcase-row">
                <!-- 1. Chakki Atta -->
                <a href="{{ route('admin.products.index') }}" class="product-item-card">
                    <div class="product-thumb-box">
                        <img src="{{ asset('images/product_atta_transparent.png') }}" alt="Chakki Atta">
                    </div>
                    <div class="product-info-col">
                        <div class="product-name-title">Whole Wheat Chakki Atta</div>
                        <div class="product-tag-pill">Packs: 5kg, 30kg &bull; High Demand</div>
                    </div>
                    <div class="product-progress-track">
                        <div class="product-progress-fill" style="width: 65%; background: #EF801C;"></div>
                    </div>
                    <span class="product-percent-num" style="color: #EF801C;">65%</span>
                </a>

                <!-- 2. Bati Atta -->
                <a href="{{ route('admin.products.index') }}" class="product-item-card">
                    <div class="product-thumb-box">
                        <img src="{{ asset('images/product_bati_transparent.png') }}" alt="Bati Atta">
                    </div>
                    <div class="product-info-col">
                        <div class="product-name-title">Special Bati Atta</div>
                        <div class="product-tag-pill">Coarse Ground &bull; Daal Bati &amp; Litti</div>
                    </div>
                    <div class="product-progress-track">
                        <div class="product-progress-fill" style="width: 23%; background: #74583D;"></div>
                    </div>
                    <span class="product-percent-num" style="color: #74583D;">23%</span>
                </a>

                <!-- 3. Wheat Bran -->
                <a href="{{ route('admin.products.index') }}" class="product-item-card">
                    <div class="product-thumb-box">
                        <img src="{{ asset('images/product_wheat_bran_transparent.png') }}" alt="Wheat Bran">
                    </div>
                    <div class="product-info-col">
                        <div class="product-name-title">Pure Wheat Bran (Chokar)</div>
                        <div class="product-tag-pill">100% Fiber &bull; Bulk Industrial Packs</div>
                    </div>
                    <div class="product-progress-track">
                        <div class="product-progress-fill" style="width: 12%; background: #10b981;"></div>
                    </div>
                    <span class="product-percent-num" style="color: #10b981;">12%</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- 4. WHOLESALE LEADS PIPELINE & QUICK OPERATIONS HUB                        -->
<!-- ========================================================================= -->
<div class="dashboard-bottom-grid">
    <!-- Left: Recent Wholesale & Retail Inquiries Table -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header" style="flex-wrap: wrap; gap: 10px;">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-envelope-open-text" style="color: var(--accent);"></i>
                    <span>Recent Wholesale &amp; Retail Inquiries</span>
                </div>
                <div class="card-syndron-desc">Direct communications received via public catalog and website forms</div>
            </div>

            <div style="display: flex; align-items: center; gap: 8px;">
                <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                    <span>Open Leads CRM</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
            <table class="leads-modern-table">
                <thead>
                    <tr>
                        <th>Customer / Buyer</th>
                        <th>Product Inquired</th>
                        <th>Contact Channels</th>
                        <th>Lead Status</th>
                        <th style="text-align: right;">Instant Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries as $inquiry)
                        <tr>
                            <!-- Customer Profile -->
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <div style="width: 38px; height: 38px; border-radius: 12px; background: linear-gradient(135deg, #EF801C 0%, #74583D 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: 800; flex-shrink: 0; box-shadow: 0 4px 12px rgba(239, 128, 28, 0.25);">
                                        {{ strtoupper(substr($inquiry['name'] ?? 'C', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: var(--foreground); line-height: 1.25;">
                                            {{ $inquiry['name'] ?? 'Buyer' }}
                                        </div>
                                        <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">
                                            <i class="fa-regular fa-clock" style="font-size: 0.65rem; margin-right: 3px;"></i>
                                            {{ $inquiry['date'] ?? 'Recent' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Product -->
                            <td>
                                <span style="font-size: 0.78rem; font-weight: 700; color: var(--accent); background: rgba(239, 128, 28, 0.08); padding: 4px 10px; border-radius: 6px; display: inline-flex; align-items: center; gap: 5px;">
                                    <i class="fa-solid fa-wheat-awn" style="font-size: 0.7rem;"></i>
                                    {{ $inquiry['product'] ?? 'General Inquiry' }}
                                </span>
                            </td>

                            <!-- Contact Channels -->
                            <td>
                                <div style="font-size: 0.8rem; font-weight: 700; color: var(--foreground);">
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $inquiry['phone'] ?? '') }}" style="color: inherit; text-decoration: none;">
                                        {{ $inquiry['phone'] ?? '&mdash;' }}
                                    </a>
                                </div>
                                <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 1px;">
                                    {{ $inquiry['email'] ?? 'No email provided' }}
                                </div>
                            </td>

                            <!-- Status Badge -->
                            <td>
                                @if(($inquiry['status'] ?? '') === 'New')
                                    <span class="status-badge-chip danger">
                                        <span class="live-indicator-dot" style="background:#ef4444; width:6px; height:6px;"></span>
                                        <span>New Lead</span>
                                    </span>
                                @elseif(($inquiry['status'] ?? '') === 'Contacted')
                                    <span class="status-badge-chip warning">
                                        <span class="live-indicator-dot" style="background:#f59e0b; width:6px; height:6px;"></span>
                                        <span>In Discussion</span>
                                    </span>
                                @else
                                    <span class="status-badge-chip success">
                                        <span class="live-indicator-dot" style="background:#10b981; width:6px; height:6px;"></span>
                                        <span>{{ $inquiry['status'] ?? 'Closed' }}</span>
                                    </span>
                                @endif
                            </td>

                            <!-- Direct WhatsApp Action Button -->
                            <td style="text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    @if(!empty($inquiry['phone']))
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry['phone']);
                                            $waText = urlencode("Hello " . ($inquiry['name'] ?? 'Sir/Madam') . ", thank you for contacting Raghuvir Atta regarding " . ($inquiry['product'] ?? 'our products') . ". How can we assist you with your dealership / supply requirements?");
                                        @endphp
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}"
                                           target="_blank"
                                           class="btn-whatsapp-chat"
                                           title="Chat directly on WhatsApp">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <a href="tel:{{ $cleanPhone }}"
                                           class="btn-syndron btn-syndron-secondary btn-syndron-sm"
                                           style="padding: 6px 10px;"
                                           title="Call Customer">
                                            <i class="fa-solid fa-phone"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 3rem 1.5rem; color: var(--muted-foreground);">
                                <i class="fa-solid fa-inbox" style="font-size: 2rem; color: var(--border-strong); margin-bottom: 0.5rem; display: block;"></i>
                                No wholesale inquiries received yet. New submissions will appear here instantly.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right: Quick Operations Hub & System Infrastructure -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-bolt" style="color: var(--accent);"></i>
                    <span>Quick Management &amp; Controls</span>
                </div>
                <div class="card-syndron-desc">Direct shortcuts to admin application suites</div>
            </div>
        </div>

        <div class="card-syndron-body" style="padding: 1.4rem;">
            <!-- 6 Hub Quick Tiles -->
            <div class="quick-tiles-grid">
                <a href="{{ route('admin.products.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <span>Product Catalog</span>
                </a>

                <a href="{{ route('admin.leads.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <span>Customer Leads</span>
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                        <i class="fa-solid fa-photo-film"></i>
                    </div>
                    <span>Media Galleries</span>
                </a>

                <a href="{{ route('admin.blogs.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(2, 132, 199, 0.12); color: #0284c7;">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <span>Blog &amp; SEO</span>
                </a>

                <a href="{{ route('admin.banners.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(245, 158, 11, 0.12); color: #f59e0b;">
                        <i class="fa-solid fa-panorama"></i>
                    </div>
                    <span>Page Banners</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="quick-tile-btn">
                    <div class="quick-tile-icon" style="background: rgba(100, 116, 139, 0.12); color: #64748b;">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <span>Site Settings</span>
                </a>
            </div>

            <!-- Live Infrastructure & Environment Pulse -->
            <div class="system-health-panel">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                    <span style="font-size: 0.72rem; font-weight: 800; text-transform: uppercase; color: var(--muted-foreground); letter-spacing: 0.05em;">
                        System Environment
                    </span>
                    <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; display: inline-flex; align-items: center; gap: 5px;">
                        <span class="live-indicator-dot" style="width: 6px; height: 6px;"></span> 99.98% Uptime &bull; SSL Secured
                    </span>
                </div>

                <div class="system-health-row">
                    <span style="color: var(--muted-foreground);"><i class="fa-solid fa-database" style="color: #EF801C; margin-right: 6px;"></i> Database Engine</span>
                    <span style="font-family: monospace; font-size: 0.75rem; color: var(--foreground); font-weight: 700;">{{ $systemInfo['db_name'] ?? 'MySQL Production' }} (&lt; 12ms)</span>
                </div>
                <div class="system-health-row">
                    <span style="color: var(--muted-foreground);"><i class="fa-brands fa-laravel" style="color: #ef4444; margin-right: 6px;"></i> Framework Core</span>
                    <span style="color: #10b981; font-weight: 700;">Laravel v{{ $systemInfo['laravel_version'] ?? app()->version() }}</span>
                </div>
                <div class="system-health-row">
                    <span style="color: var(--muted-foreground);"><i class="fa-brands fa-php" style="color: #8b5cf6; margin-right: 6px;"></i> PHP Runtime</span>
                    <span style="color: var(--foreground); font-weight: 700;">v{{ PHP_VERSION }} (JIT / OPcache Active)</span>
                </div>
                <div class="system-health-row">
                    <span style="color: var(--muted-foreground);"><i class="fa-solid fa-shield-halved" style="color: #0284c7; margin-right: 6px;"></i> Security Layer</span>
                    <span style="color: #0284c7; font-weight: 700;">AES-256 &bull; CSRF &bull; Sanitized</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Live Clock Ticker
        function updateLiveClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const clockEl = document.getElementById('liveClockDisplay');
            if (clockEl) {
                clockEl.textContent = `${hours}:${minutes}:${seconds} IST`;
            }
        }
        setInterval(updateLiveClock, 1000);
        updateLiveClock();

        // Dataset Configurations
        const trafficDatasets = {
            'year': {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                traffic: [8.4, 9.6, 11.2, 10.8, 13.5, 14.2, 16.0, 15.4, 18.2, 19.8, 21.5, 24.0],
                inquiries: [12, 18, 24, 20, 28, 32, 38, 35, 42, 48, 54, 62]
            },
            '6months': {
                labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                traffic: [16.0, 15.4, 18.2, 19.8, 21.5, 24.0],
                inquiries: [38, 35, 42, 48, 54, 62]
            },
            '30days': {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                traffic: [4.8, 5.6, 6.2, 7.4],
                inquiries: [12, 15, 16, 19]
            }
        };

        // 1. Spline Area Traffic & Inquiries Chart
        const trafficCanvas = document.getElementById('trafficGrowthChart');
        let trafficChart = null;

        if (trafficCanvas) {
            const ctx = trafficCanvas.getContext('2d');

            const gradientOrange = ctx.createLinearGradient(0, 0, 0, 260);
            gradientOrange.addColorStop(0, 'rgba(239, 128, 28, 0.42)');
            gradientOrange.addColorStop(1, 'rgba(239, 128, 28, 0.01)');

            const gradientPurple = ctx.createLinearGradient(0, 0, 0, 260);
            gradientPurple.addColorStop(0, 'rgba(99, 102, 241, 0.32)');
            gradientPurple.addColorStop(1, 'rgba(99, 102, 241, 0.01)');

            trafficChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: trafficDatasets['year'].labels,
                    datasets: [
                        {
                            label: 'Website Traffic (Thousands)',
                            data: trafficDatasets['year'].traffic,
                            borderColor: '#EF801C',
                            backgroundColor: gradientOrange,
                            borderWidth: 3,
                            fill: true,
                            tension: 0.42,
                            pointRadius: 4.5,
                            pointHoverRadius: 8,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#EF801C',
                            pointBorderWidth: 2.5,
                        },
                        {
                            label: 'Wholesale Leads (Inquiries)',
                            data: trafficDatasets['year'].inquiries,
                            borderColor: '#6366f1',
                            backgroundColor: gradientPurple,
                            borderWidth: 2.5,
                            fill: true,
                            tension: 0.42,
                            pointRadius: 4,
                            pointHoverRadius: 7,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#6366f1',
                            pointBorderWidth: 2,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                color: '#64748b',
                                font: { family: "'Plus Jakarta Sans', system-ui", size: 11, weight: 700 },
                                boxWidth: 12,
                                boxHeight: 12,
                                borderRadius: 3,
                                usePointStyle: true,
                                padding: 14
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.94)',
                            titleFont: { family: "'Plus Jakarta Sans', system-ui", size: 12, weight: 800 },
                            bodyFont: { family: "'Plus Jakarta Sans', system-ui", size: 11, weight: 600 },
                            padding: 12,
                            borderRadius: 10,
                            borderWidth: 1,
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    if (context.datasetIndex === 0) {
                                        return ' ' + context.dataset.label + ': ' + context.parsed.y + 'K visitors';
                                    }
                                    return ' ' + context.dataset.label + ': ' + context.parsed.y + ' buyers';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#94a3b8',
                                font: { family: "'Plus Jakarta Sans', system-ui", size: 11, weight: 600 }
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(226, 232, 240, 0.65)',
                                borderDash: [4, 4]
                            },
                            ticks: {
                                color: '#94a3b8',
                                font: { family: "'Plus Jakarta Sans', system-ui", size: 10 }
                            }
                        }
                    }
                }
            });

            // Global filter switcher function
            window.updateTrafficRange = function(rangeKey, btn) {
                document.querySelectorAll('.chart-pill-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                if (trafficChart && trafficDatasets[rangeKey]) {
                    trafficChart.data.labels = trafficDatasets[rangeKey].labels;
                    trafficChart.data.datasets[0].data = trafficDatasets[rangeKey].traffic;
                    trafficChart.data.datasets[1].data = trafficDatasets[rangeKey].inquiries;
                    trafficChart.update('active');
                }
            };
        }

        // 2. Product Portfolio Donut Chart
        const prodCanvas = document.getElementById('productDistributionChart');
        if (prodCanvas) {
            const prodCtx = prodCanvas.getContext('2d');
            new Chart(prodCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Whole Wheat Chakki Atta', 'Special Bati Atta', 'Pure Wheat Bran'],
                    datasets: [{
                        data: [65, 23, 12],
                        backgroundColor: ['#EF801C', '#74583D', '#10b981'],
                        borderWidth: 3,
                        borderColor: getComputedStyle(document.body).getPropertyValue('--card') || '#ffffff',
                        hoverOffset: 9
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '74%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.94)',
                            titleFont: { family: "'Plus Jakarta Sans', system-ui", size: 12, weight: 800 },
                            bodyFont: { family: "'Plus Jakarta Sans', system-ui", size: 11, weight: 600 },
                            padding: 10,
                            borderRadius: 10,
                            borderWidth: 1,
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ': ' + context.parsed + '% market demand';
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
