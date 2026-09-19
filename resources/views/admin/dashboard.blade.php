@extends('admin.layouts.app')

@section('title', 'Admin Overview & Analytics')

@section('content')
<!-- ===== HERO WELCOME BANNER (Glassmorphic) ===== -->
<div class="dashboard-hero-banner" style="margin-bottom: 1.75rem;">
    <div class="dashboard-hero-content">
        <div class="hero-avatar-badge">
            <i class="fa-solid fa-wheat-awn"></i>
        </div>
        <div>
            <div class="hero-greeting-pill">
                <span class="live-indicator-dot"></span>
                <span>Live Admin Console &bull; {{ now()->format('l, d F Y') }}</span>
            </div>
            <h1 class="hero-title">
                Welcome back, {{ auth()->user()->name ?? 'Administrator' }}! 👋
            </h1>
            <p class="hero-subtitle">
                Here is what's happening with Raghuvir Atta across production catalogs, inquiries, media galleries, and visitor engagement today.
            </p>
        </div>
    </div>

    <div class="hero-quick-actions">
        <a href="{{ route('admin.products.create') }}" class="btn-syndron btn-syndron-primary">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Add Product</span>
        </a>
        <a href="{{ route('admin.galleries.create') }}" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <span>Add Media</span>
        </a>
        <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-envelope-open-text"></i>
            <span>Customer Leads</span>
            @if(($stats['new_inquiries'] ?? 0) > 0)
                <span class="badge-tag" style="background:#ef4444;color:#fff;margin-left:4px;padding:2px 7px;">{{ $stats['new_inquiries'] }}</span>
            @endif
        </a>
    </div>
</div>

<!-- ===== 4 TOP KPI METRIC CARDS ===== -->
<div class="metrics-row" style="margin-bottom: 1.75rem;">
    <!-- Card 1: Products in Store -->
    <a href="{{ route('admin.products.index') }}" class="metric-card" style="text-decoration: none; cursor: pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Product Catalog</span>
            <div class="metric-badge-icon orange">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $stats['total_products'] ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-wheat-awn"></i>
                <span>Chakki Atta, Bati, Bran</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Active in Store</span>
        </div>
    </a>

    <!-- Card 2: Customer Leads & Inquiries -->
    <a href="{{ route('admin.leads.index') }}" class="metric-card" style="text-decoration: none; cursor: pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Inquiries &amp; Leads</span>
            <div class="metric-badge-icon red">
                <i class="fa-solid fa-headset"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number" style="color: {{ ($stats['new_inquiries'] ?? 0) > 0 ? '#ef4444' : 'inherit' }};">
                {{ $stats['total_inquiries'] ?? 0 }}
            </div>
        </div>
        <div class="metric-card-bottom">
            @if(($stats['new_inquiries'] ?? 0) > 0)
                <span class="metric-trend trend-negative">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ $stats['new_inquiries'] }} New Pending</span>
                </span>
            @else
                <span class="metric-trend trend-positive">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>All Contacted</span>
                </span>
            @endif
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Wholesale Deals</span>
        </div>
    </a>

    <!-- Card 3: Media Gallery Catalog -->
    <a href="{{ route('admin.galleries.index') }}" class="metric-card" style="text-decoration: none; cursor: pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Media Assets</span>
            <div class="metric-badge-icon purple">
                <i class="fa-solid fa-photo-film"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $stats['total_galleries'] ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #8b5cf6;">
                <i class="fa-solid fa-camera"></i>
                <span>Photos &amp; Videos</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Plant &amp; Mills</span>
        </div>
    </a>

    <!-- Card 4: Blog Articles -->
    <a href="{{ route('admin.blogs.index') }}" class="metric-card" style="text-decoration: none; cursor: pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Blog Articles</span>
            <div class="metric-badge-icon blue">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $stats['total_blogs'] ?? 0 }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #3b82f6;">
                <i class="fa-solid fa-book-open"></i>
                <span>Recipes &amp; Guides</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">SEO Stories</span>
        </div>
    </a>
</div>

<!-- ===== CHARTS ROW (Spline Traffic & Product Showcase) ===== -->
<div class="grid-2-col" style="margin-bottom: 1.75rem;">
    <!-- Left: Audience Growth & Inquiries Spline Chart -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-chart-area" style="color: var(--accent);"></i>
                    <span>Visitor Traffic &amp; Wholesale Inquiries</span>
                </div>
                <div class="card-syndron-subtitle">Annual engagement trends across public website touchpoints</div>
            </div>
            <span class="badge-tag" style="background: var(--accent-subtle); color: var(--accent); font-weight: 700;">Live Analytics</span>
        </div>
        <div class="card-syndron-body" style="position: relative; height: 320px;">
            <canvas id="trafficGrowthChart"></canvas>
        </div>
    </div>

    <!-- Right: Distribution & Quick Status -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-chart-pie" style="color: var(--accent);"></i>
                    <span>Product Catalog Reach</span>
                </div>
                <div class="card-syndron-subtitle">Distribution by packaging &amp; demand</div>
            </div>
        </div>
        <div class="card-syndron-body" style="display: flex; flex-direction: column; justify-content: space-between; height: 320px;">
            <div style="position: relative; height: 180px;">
                <canvas id="productDistributionChart"></canvas>
            </div>
            <div style="display: flex; justify-content: space-around; text-align: center; padding-top: 1rem; border-top: 1px dashed var(--border);">
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted-foreground); font-weight: 600;">Chakki Atta</div>
                    <div style="font-size: 1.15rem; font-weight: 800; color: #EF801C;">65%</div>
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted-foreground); font-weight: 600;">Bati Atta</div>
                    <div style="font-size: 1.15rem; font-weight: 800; color: #74583D;">23%</div>
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted-foreground); font-weight: 600;">Wheat Bran</div>
                    <div style="font-size: 1.15rem; font-weight: 800; color: #10b981;">12%</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== RECENT CUSTOMER LEADS & SYSTEM HEALTH ===== -->
<div class="grid-2-col" style="margin-bottom: 2rem;">
    <!-- Left: Recent Customer Leads Table -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-envelope-open-text" style="color: var(--accent);"></i>
                    <span>Recent Inquiries &amp; Wholesale Leads</span>
                </div>
                <div class="card-syndron-subtitle">Direct contacts received from the public website contact form</div>
            </div>
            <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                <span>View All Leads</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="table-responsive-container">
            <table class="gallery-modern-table">
                <thead>
                    <tr>
                        <th>Customer / Buyer</th>
                        <th>Product Inquired</th>
                        <th>Contact Details</th>
                        <th>Status</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries as $inquiry)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <div style="width: 34px; height: 34px; border-radius: var(--radius-full); background: linear-gradient(135deg, #74583D, var(--accent)); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: 700; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                        {{ strtoupper(substr($inquiry['name'] ?? 'B', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: var(--foreground); line-height: 1.2;">{{ $inquiry['name'] ?? 'Customer' }}</div>
                                        <div style="font-size: 0.725rem; color: var(--muted-foreground);">{{ $inquiry['date'] ?? 'Recent' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.825rem; font-weight: 600; color: var(--accent);">{{ $inquiry['product'] ?? 'General' }}</span>
                            </td>
                            <td>
                                <div style="font-size: 0.8rem; color: var(--foreground); font-weight: 600;">{{ $inquiry['phone'] ?? '&mdash;' }}</div>
                                <div style="font-size: 0.725rem; color: var(--muted-foreground);">{{ $inquiry['email'] ?? '' }}</div>
                            </td>
                            <td>
                                @if(($inquiry['status'] ?? '') === 'New')
                                    <span class="status-toggle-pill inactive" style="background: rgba(239,68,68,0.12); color: #ef4444; border-color: rgba(239,68,68,0.25);">
                                        <span class="status-dot" style="background: #ef4444;"></span>
                                        <span>New Lead</span>
                                    </span>
                                @elseif(($inquiry['status'] ?? '') === 'Contacted')
                                    <span class="status-toggle-pill inactive" style="background: rgba(245,158,11,0.12); color: #f59e0b; border-color: rgba(245,158,11,0.25);">
                                        <span class="status-dot" style="background: #f59e0b;"></span>
                                        <span>Contacted</span>
                                    </span>
                                @else
                                    <span class="status-toggle-pill active">
                                        <span class="status-dot"></span>
                                        <span>{{ $inquiry['status'] ?? 'Closed' }}</span>
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                @if(!empty($inquiry['phone']))
                                    <a
                                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry['phone']) }}?text={{ rawurlencode('Hello ' . ($inquiry['name'] ?? '') . ', thank you for contacting Raghuvir Atta regarding ' . ($inquiry['product'] ?? '') . '.') }}"
                                        target="_blank"
                                        class="action-icon-btn preview"
                                        style="color: #25D366; border-color: rgba(37,211,102,0.3);"
                                        title="Chat on WhatsApp"
                                    >
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 2.5rem; color: var(--muted-foreground);">
                                No recent inquiries received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right: Quick Navigation & System Environment -->
    <div class="card-syndron" style="margin-bottom: 0;">
        <div class="card-syndron-header">
            <div class="card-syndron-title-box">
                <div class="card-syndron-title">
                    <i class="fa-solid fa-bolt" style="color: var(--accent);"></i>
                    <span>Quick Management</span>
                </div>
                <div class="card-syndron-subtitle">Direct shortcuts to application hubs</div>
            </div>
        </div>
        <div class="card-syndron-body">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.85rem; margin-bottom: 1.25rem;">
                <a href="{{ route('admin.products.index') }}" class="btn-syndron btn-syndron-secondary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-boxes-stacked" style="color: #EF801C;"></i>
                    <span>Products</span>
                </a>
                <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-envelope-open-text" style="color: #ef4444;"></i>
                    <span>Leads Hub</span>
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="btn-syndron btn-syndron-secondary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-photo-film" style="color: #8b5cf6;"></i>
                    <span>Media Hub</span>
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-secondary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-newspaper" style="color: #3b82f6;"></i>
                    <span>Blog Posts</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn-syndron btn-syndron-secondary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-gear"></i>
                    <span>Site Settings</span>
                </a>
                <a href="{{ url('/') }}" target="_blank" class="btn-syndron btn-syndron-primary" style="justify-content: flex-start; padding: 0.85rem 1rem;">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Live Website</span>
                </a>
            </div>

            <!-- Server Environment Spec Card -->
            <div style="padding: 0.95rem 1.15rem; border-radius: 12px; background: var(--secondary); border: 1px solid var(--border);">
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.775rem; font-weight: 600; margin-bottom: 0.45rem;">
                    <span style="color: var(--muted-foreground);"><i class="fa-solid fa-server" style="margin-right: 5px;"></i> Database:</span>
                    <span style="color: var(--foreground); font-family: monospace;">{{ $systemInfo['db_name'] ?? 'raghuvir_admin' }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.775rem; font-weight: 600; margin-bottom: 0.45rem;">
                    <span style="color: var(--muted-foreground);"><i class="fa-brands fa-laravel" style="color: #ef4444; margin-right: 5px;"></i> Laravel Engine:</span>
                    <span style="color: #10b981;">v{{ $systemInfo['laravel_version'] ?? app()->version() }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.775rem; font-weight: 600;">
                    <span style="color: var(--muted-foreground);"><i class="fa-brands fa-php" style="color: #8b5cf6; margin-right: 5px;"></i> PHP Runtime:</span>
                    <span style="color: var(--foreground);">v{{ PHP_VERSION }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Spline Area Traffic & Inquiries Chart
        const trafficCtx = document.getElementById('trafficGrowthChart')?.getContext('2d');
        if (trafficCtx) {
            const gradientOrange = trafficCtx.createLinearGradient(0, 0, 0, 300);
            gradientOrange.addColorStop(0, 'rgba(239, 128, 28, 0.35)');
            gradientOrange.addColorStop(1, 'rgba(239, 128, 28, 0.0)');

            const gradientPurple = trafficCtx.createLinearGradient(0, 0, 0, 300);
            gradientPurple.addColorStop(0, 'rgba(139, 92, 246, 0.25)');
            gradientPurple.addColorStop(1, 'rgba(139, 92, 246, 0.0)');

            new Chart(trafficCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Website Visitors (Thousands)',
                            data: [8.4, 9.6, 11.2, 10.8, 13.5, 14.2, 16.0, 15.4, 18.2, 19.8, 21.5, 24.0],
                            borderColor: '#EF801C',
                            backgroundColor: gradientOrange,
                            borderWidth: 2.5,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#EF801C',
                        },
                        {
                            label: 'Wholesale Inquiries (Leads)',
                            data: [12, 18, 24, 20, 28, 32, 38, 35, 42, 48, 54, 62],
                            borderColor: '#8b5cf6',
                            backgroundColor: gradientPurple,
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 2.5,
                            pointHoverRadius: 5,
                            pointBackgroundColor: '#8b5cf6',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: getComputedStyle(document.body).getPropertyValue('--foreground') || '#64748b',
                                font: { family: 'Plus Jakarta Sans', size: 11, weight: 600 },
                                boxWidth: 12,
                                padding: 16
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)',
                            titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: 700 },
                            bodyFont: { family: 'Plus Jakarta Sans', size: 11 },
                            padding: 10,
                            borderRadius: 8,
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#94a3b8',
                                font: { family: 'Plus Jakarta Sans', size: 10 }
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(226, 232, 240, 0.4)',
                                borderDash: [4, 4]
                            },
                            ticks: {
                                color: '#94a3b8',
                                font: { family: 'Plus Jakarta Sans', size: 10 }
                            }
                        }
                    }
                }
            });
        }

        // 2. Product Portfolio Donut Chart
        const prodCtx = document.getElementById('productDistributionChart')?.getContext('2d');
        if (prodCtx) {
            new Chart(prodCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Whole Wheat Atta', 'Special Bati Atta', 'Pure Wheat Bran'],
                    datasets: [{
                        data: [65, 23, 12],
                        backgroundColor: ['#EF801C', '#74583D', '#10b981'],
                        borderWidth: 0,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)',
                            padding: 8,
                            borderRadius: 8,
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
