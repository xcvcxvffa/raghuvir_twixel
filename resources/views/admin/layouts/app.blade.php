<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Analytics Dashboard') - Syndron UI | Raghuvir</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Raghuvir Favicon.png') }}">

    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Syndron UI Next Stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin.css') }}?v={{ file_exists(public_path('admin-assets/css/admin.css')) ? filemtime(public_path('admin-assets/css/admin.css')) : time() }}">

    <!-- Syndron UI Custom Components (Image 1 Calendar & Image 2 Dropdown) -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/syndron-components.css') }}?v={{ file_exists(public_path('admin-assets/css/syndron-components.css')) ? filemtime(public_path('admin-assets/css/syndron-components.css')) : time() }}">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    @stack('styles')
    <style>
        .notification-badge-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid var(--card, #fff);
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.25);
            display: inline-block;
            animation: pulseNotificationDot 2s infinite;
        }
        @keyframes pulseNotificationDot {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 5px rgba(239, 68, 68, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
        .notification-item.unread {
            background-color: rgba(239, 128, 28, 0.04);
            border-left: 3px solid var(--accent, #EF801C);
        }
        html.dark .notification-item.unread {
            background-color: rgba(239, 128, 28, 0.08);
        }
        .notification-unread-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent, #EF801C);
            margin-left: auto;
            margin-top: 5px;
            flex-shrink: 0;
            display: inline-block;
        }
        .notification-item:hover {
            background-color: var(--secondary);
        }

        /* Global Admin Avatar (Top Navbar & Left Sidebar Footer) */
        .user-avatar-circle,
        .profile-avatar-sm {
            width: 38px !important;
            height: 38px !important;
            min-width: 38px !important;
            min-height: 38px !important;
            border-radius: 50% !important;
            background-color: var(--accent, #EF801C) !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 0.85rem !important;
            font-weight: 700 !important;
            flex-shrink: 0 !important;
            overflow: hidden !important;
            position: relative !important;
            border: 1.5px solid rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08) !important;
            transition: all 0.2s ease !important;
        }
        .user-avatar-circle.has-image,
        .profile-avatar-sm.has-image {
            background-color: #ffffff !important;
            border: 1.5px solid rgba(239, 128, 28, 0.35) !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06), 0 0 0 1px rgba(239, 128, 28, 0.12) !important;
        }
        .user-avatar-circle:hover,
        .profile-avatar-sm:hover,
        .user-trigger:hover .user-avatar-circle,
        .sidebar-footer-profile:hover .profile-avatar-sm {
            border-color: #EF801C !important;
            box-shadow: 0 2px 8px rgba(239, 128, 28, 0.25) !important;
            transform: scale(1.04) !important;
        }
        .user-avatar-circle img,
        .profile-avatar-sm img,
        .global-admin-avatar-img {
            width: 82% !important;
            height: 82% !important;
            max-width: 82% !important;
            max-height: 82% !important;
            object-fit: contain !important;
            object-position: center !important;
            display: block !important;
            margin: auto !important;
            padding: 0 !important;
            border-radius: 0 !important;
            background-color: transparent !important;
            transition: transform 0.2s ease !important;
        }
        .user-avatar-circle.mode-fill img,
        .profile-avatar-sm.mode-fill img {
            width: 100% !important;
            height: 100% !important;
            max-width: 100% !important;
            max-height: 100% !important;
            object-fit: cover !important;
            border-radius: 50% !important;
        }

        /* Desktop Sidebar Collapse (Smooth slide in / slide out) */
        @media (min-width: 992px) {
            .syndron-sidebar {
                transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1) !important;
            }
            .syndron-main {
                transition: margin-left 0.28s cubic-bezier(0.4, 0, 0.2, 1) !important;
            }
            body.sidebar-collapsed .syndron-sidebar {
                transform: translateX(-100%) !important;
            }
            body.sidebar-collapsed .syndron-main {
                margin-left: 0 !important;
            }
            body.sidebar-collapsed .toggle-sidebar-btn {
                background-color: var(--accent-subtle, rgba(239, 128, 28, 0.1)) !important;
                color: var(--accent, #EF801C) !important;
            }
        }

        /* Topbar Search Box & Interactive Dropdown */
        .topbar-search-box {
            position: relative !important;
            width: 320px !important;
            cursor: pointer;
            transition: width 0.25s ease, border-color 0.2s ease, box-shadow 0.2s ease !important;
        }
        .topbar-search-box:focus-within {
            width: 380px !important;
            border-color: var(--accent, #EF801C) !important;
            box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.12) !important;
        }
        .topbar-search-input {
            cursor: text !important;
        }
        .topbar-search-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            width: 440px;
            max-width: 90vw;
            background-color: var(--card, #ffffff);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg, 12px);
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.14);
            z-index: 1050;
            overflow: hidden;
            display: none;
            animation: searchDropdownSlide 0.18s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .topbar-search-dropdown.show {
            display: block;
        }
        @keyframes searchDropdownSlide {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .topbar-search-dropdown-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 14px;
            background-color: var(--secondary, #f8fafc);
            border-bottom: 1px solid var(--border);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--muted-foreground);
        }
        .topbar-search-dropdown-list {
            max-height: 380px;
            overflow-y: auto;
            padding: 6px;
        }
        .topbar-search-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 12px;
            border-radius: var(--radius-md, 8px);
            text-decoration: none;
            color: var(--foreground);
            transition: background-color 0.15s ease;
            cursor: pointer;
        }
        .topbar-search-item:hover,
        .topbar-search-item.selected {
            background-color: rgba(239, 128, 28, 0.08);
        }
        .topbar-search-item.selected .topbar-search-item-title {
            color: var(--accent, #EF801C);
        }
        .topbar-search-item-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm, 6px);
            background-color: var(--secondary, #f1f5f9);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: var(--foreground-muted);
            flex-shrink: 0;
            transition: all 0.15s ease;
        }
        .topbar-search-item:hover .topbar-search-item-icon,
        .topbar-search-item.selected .topbar-search-item-icon {
            background-color: var(--accent, #EF801C);
            color: #ffffff;
        }
        .topbar-search-item-content {
            flex: 1;
            min-width: 0;
        }
        .topbar-search-item-title {
            font-size: 0.84rem;
            font-weight: 600;
            color: var(--foreground);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .topbar-search-item-subtitle {
            font-size: 0.72rem;
            color: var(--muted-foreground);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .topbar-search-item-badge {
            font-size: 0.68rem;
            padding: 2px 7px;
            border-radius: 12px;
            background-color: var(--secondary, #f1f5f9);
            color: var(--muted-foreground);
            font-weight: 600;
            flex-shrink: 0;
        }
        .topbar-search-empty {
            padding: 24px 16px;
            text-align: center;
            color: var(--muted-foreground);
            font-size: 0.825rem;
        }
        .topbar-search-dropdown-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            padding: 7px 14px;
            background-color: var(--secondary, #f8fafc);
            border-top: 1px solid var(--border);
            font-size: 0.7rem;
            color: var(--muted-foreground);
        }
        .topbar-search-dropdown-footer kbd {
            background: var(--card, #ffffff);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 1px 4px;
            font-size: 0.65rem;
            box-shadow: 0 1px 2px rgba(0,0,0,0.06);
        }
    </style>
</head>
<body>
    <div class="syndron-wrapper">
        <!-- Sidebar Start (Syndron UI Style) -->
        <aside class="syndron-sidebar" id="syndronSidebar">
            <!-- Sidebar Header / Logo -->
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                    <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="Raghuvir Atta" class="admin-brand-logo logo-color-mode">
                    <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="Raghuvir Atta" class="admin-brand-logo logo-white-mode">
                </a>
                <button type="button" class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close Sidebar" title="Close Menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Sidebar Navigation Items -->
            <div class="sidebar-nav-scroll">
                <div class="sidebar-section-title">Dashboards</div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                            <i class="fa-solid fa-chart-line link-icon"></i>
                            <span>Analytics</span>
                            <span class="badge-tag">Live</span>
                        </a>
                    </li>
                </ul>

                <div class="sidebar-section-title">Applications</div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-boxes-stacked link-icon"></i>
                            <span>Our Products</span>
                            <span class="badge-tag" style="background: rgba(239, 128, 28, 0.15); color: #EF801C; font-weight: 700;">{{ rescue(fn () => \App\Models\Product::count(), 0, false) }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.leads.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-envelope-open-text link-icon"></i>
                            <span>Inquiries &amp; Leads</span>
                            @php
                                $newLeadsCount = rescue(fn () => \App\Models\Lead::where('status', 'new')->count(), 0, false);
                                $totalLeadsCount = rescue(fn () => \App\Models\Lead::count(), 0, false);
                            @endphp
                            @if($newLeadsCount > 0)
                                <span class="badge-tag" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; font-weight: 700;">{{ $newLeadsCount }} New</span>
                            @else
                                <span class="badge-tag">{{ $totalLeadsCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-newspaper link-icon"></i>
                            <span>Blog Articles</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.galleries.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-photo-film link-icon"></i>
                            <span>Media Gallery</span>
                            <span class="badge-tag" style="background: rgba(139, 92, 246, 0.15); color: #8b5cf6; font-weight: 700;">{{ rescue(fn () => \App\Models\Gallery::count(), 0, false) }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-panorama link-icon"></i>
                            <span>Page Banners</span>
                            <span class="badge-tag" style="background: rgba(14, 165, 233, 0.15); color: #0284c7; font-weight: 700;">{{ rescue(fn () => \App\Models\PageBanner::count(), 0, false) }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-magnifying-glass-chart link-icon"></i>
                            <span>Page SEO</span>
                            <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 700;">{{ rescue(fn () => \App\Models\PageSeo::count(), 0, false) }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.webmaster.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.webmaster.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-chart-line link-icon"></i>
                            <span>Webmaster &amp; Analytics</span>
                            <span class="badge-tag" style="background: rgba(99, 102, 241, 0.15); color: #6366f1; font-weight: 700;">Live</span>
                        </a>
                    </li>
                </ul>

                <div class="sidebar-section-title">System & Settings</div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile.edit') }}" class="sidebar-link">
                            <i class="fa-solid fa-user-gear link-icon"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-gear link-icon"></i>
                            <span>Site Settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.settings.email*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.email') }}" class="sidebar-link">
                            <i class="fa-solid fa-envelope-circle-check link-icon"></i>
                            <span>Email Configuration</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Sidebar User Profile Footer -->
            <a href="{{ route('admin.profile.edit') }}" class="sidebar-footer-profile" style="text-decoration: none;" title="Admin Profile & Settings">
                <div class="profile-avatar-sm {{ auth()->user() && auth()->user()->getAvatarUrl() ? 'has-image' : '' }}">
                    @if(auth()->user() && auth()->user()->getAvatarUrl())
                        <img src="{{ auth()->user()->getAvatarUrl() }}" alt="{{ auth()->user()->name }}" class="global-admin-avatar-img" onerror="this.onerror=null; this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerText='{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}';">
                    @else
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    @endif
                </div>
                <div class="profile-details-mini">
                    <div class="user-title">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="user-subtitle">{{ auth()->user()->email ?? 'admin@raghuvir.com' }}</div>
                </div>
            </a>
        </aside>
        <!-- Sidebar End -->

        <!-- Main Wrapper -->
        <div class="syndron-main">
            <!-- Topbar (Syndron UI Header) -->
            <header class="syndron-topbar">
                <div class="topbar-left">
                    <button type="button" class="toggle-sidebar-btn" id="toggleSidebarBtn" title="Toggle Sidebar">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <!-- Search Input with Live Dropdown & Shortcut -->
                    <div class="topbar-search-box" id="topbarSearchBox">
                        <i class="fa-solid fa-magnifying-glass search-icon-left"></i>
                        <input type="text" class="topbar-search-input" id="topbarSearchInput" placeholder="Search analytics, products..." autocomplete="off">
                        <span class="kbd-shortcut" title="Press Ctrl+K or ⌘K">⌘K</span>

                        <!-- Instant Live Search Dropdown -->
                        <div class="topbar-search-dropdown" id="topbarSearchDropdown">
                            <div class="topbar-search-dropdown-header">
                                <span id="topbarSearchDropdownTitle">Quick Navigation</span>
                                <span class="topbar-search-count" id="topbarSearchCount"></span>
                            </div>
                            <div class="topbar-search-dropdown-list" id="topbarSearchDropdownList">
                                <!-- Populated dynamically by JS -->
                            </div>
                            <div class="topbar-search-dropdown-footer">
                                <span><kbd>↑</kbd><kbd>↓</kbd> Navigate</span>
                                <span><kbd>↵</kbd> Select</span>
                                <span><kbd>ESC</kbd> Close</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="topbar-right">
                    <!-- Live Website Link -->
                    <a href="{{ url('/') }}" target="_blank" class="live-site-pill">
                        <i class="fa-solid fa-globe"></i>
                        <span>Live Website</span>
                    </a>

                    <!-- Dark / Light Mode Switcher -->
                    <button type="button" class="icon-btn-action" id="themeToggleBtn" title="Toggle Dark/Light Mode">
                        <i class="fa-solid fa-moon" id="themeIcon"></i>
                    </button>

                    @php
                        $adminNotifications = rescue(fn () => \App\Models\AdminNotification::unread()->latest()->take(10)->get(), collect(), false);
                        $unreadNotificationsCount = rescue(fn () => \App\Models\AdminNotification::unread()->count(), 0, false);
                    @endphp
                    <!-- Notifications Popover -->
                    <div class="syndron-user-menu" style="position: relative;">
                        <button type="button" class="icon-btn-action" id="notificationsTrigger" title="Notifications" aria-label="Notifications">
                            <i class="fa-regular fa-bell"></i>
                            <span class="notification-badge-dot" id="notificationsBadgeDot" style="{{ $unreadNotificationsCount > 0 ? '' : 'display: none;' }}"></span>
                        </button>
                        <div class="user-dropdown-popover notifications-popover" id="notificationsDropdown">
                            <div class="popover-header" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="title" style="display: flex; align-items: center; gap: 6px;">
                                    <i class="fa-solid fa-bell" style="font-size: 0.85rem; color: var(--accent);"></i>
                                    <span>Notifications</span>
                                </div>
                                <span class="badge-tag" id="notificationsHeaderBadge" style="font-size: 0.7rem; font-weight: 700; {{ $unreadNotificationsCount > 0 ? 'background: rgba(239, 68, 68, 0.15); color: #dc2626;' : 'background: var(--secondary); color: var(--muted-foreground);' }}">
                                    {{ $unreadNotificationsCount > 0 ? $unreadNotificationsCount . ' New' : 'Caught Up' }}
                                </span>
                            </div>
                            <div id="notificationsItemsContainer" style="max-height: 290px; overflow-y: auto;">
                                @forelse($adminNotifications as $notification)
                                    <a
                                        href="{{ $notification->url ?: route('admin.dashboard') }}"
                                        class="notification-item {{ !$notification->is_read ? 'unread' : '' }}"
                                        data-id="{{ $notification->id }}"
                                        onclick="handleNotificationClick(event, {{ $notification->id }}, '{{ addslashes($notification->url ?: route('admin.dashboard')) }}')"
                                    >
                                        <div class="notification-icon {{ $notification->icon_color ?: 'orange' }}">
                                            <i class="{{ $notification->icon ?: 'fa-solid fa-bell' }}"></i>
                                        </div>
                                        <div class="notification-text" style="flex: 1; min-width: 0;">
                                            <div class="notification-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $notification->title }}
                                            </div>
                                            <div class="notification-time">
                                                {{ $notification->created_at ? $notification->created_at->diffForHumans() : 'Recently' }}
                                                @if($notification->message)
                                                    &bull; {{ Str::limit($notification->message, 30) }}
                                                @endif
                                            </div>
                                        </div>
                                        @if(!$notification->is_read)
                                            <span class="notification-unread-dot" title="Unread"></span>
                                        @endif
                                    </a>
                                @empty
                                    <div class="notifications-empty-box" style="padding: 2rem 1rem; text-align: center; color: var(--muted-foreground);">
                                        <i class="fa-regular fa-bell-slash" style="font-size: 1.8rem; margin-bottom: 0.5rem; opacity: 0.4;"></i>
                                        <div style="font-size: 0.825rem; font-weight: 600;">All caught up!</div>
                                        <div style="font-size: 0.75rem;">No new notifications right now.</div>
                                    </div>
                                @endforelse
                            </div>
                            <div style="padding: 0.6rem 1rem; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); background: var(--card);">
                                <a
                                    href="javascript:void(0)"
                                    id="markAllReadBtn"
                                    onclick="markAllNotificationsAsRead(event)"
                                    style="font-size: 0.76rem; font-weight: 700; color: var(--accent); text-decoration: none; display: inline-flex; align-items: center; gap: 5px;"
                                >
                                    <i class="fa-solid fa-check-double"></i> <span>Mark all as read</span>
                                </a>
                                <a
                                    href="{{ route('admin.leads.index') }}"
                                    style="font-size: 0.74rem; font-weight: 600; color: var(--muted-foreground); text-decoration: none;"
                                >
                                    View Leads &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- User Dropdown Menu -->
                    <div class="syndron-user-menu">
                        <button type="button" class="user-trigger" id="userTrigger" title="Account Menu">
                            <div class="user-avatar-circle {{ auth()->user() && auth()->user()->getAvatarUrl() ? 'has-image' : '' }}">
                                @if(auth()->user() && auth()->user()->getAvatarUrl())
                                    <img src="{{ auth()->user()->getAvatarUrl() }}" alt="{{ auth()->user()->name }}" class="global-admin-avatar-img" onerror="this.onerror=null; this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerText='{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}';">
                                @else
                                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                                @endif
                            </div>
                            <div class="user-meta-top">
                                <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
                                <span>{{ ucfirst(auth()->user()->role ?? 'Admin') }}</span>
                            </div>
                            <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem; color: var(--muted-foreground); margin-left: 0.2rem;"></i>
                        </button>

                        <div class="user-dropdown-popover" id="userDropdown">
                            <div class="popover-header">
                                <div class="title">{{ auth()->user()->name ?? 'Admin' }}</div>
                                <div class="sub">{{ auth()->user()->email ?? '' }}</div>
                            </div>
                            <a href="{{ route('admin.profile.edit') }}" class="popover-item">
                                <i class="fa-solid fa-user-gear"></i>
                                <span>Profile Settings</span>
                            </a>
                            <a href="{{ url('/') }}" target="_blank" class="popover-item">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                <span>Preview Live Site</span>
                            </a>
                            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="popover-item logout">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="syndron-content">
                <div class="page-content-wrapper">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="syndron-footer">
                <div>
                    &copy; {{ date('Y') }} <strong>Raghuvir Atta</strong>. Built on Syndron UI Next.
                </div>
                <div>
                    Designed &amp; Developed for <a href="https://twixel.media/" target="_blank">Twixel Media</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- Mobile Sidebar Backdrop -->
    <div class="syndron-backdrop" id="syndronBackdrop"></div>

    <!-- ===== COMMAND PALETTE SPOTLIGHT SEARCH MODAL (⌘K / Ctrl+K) ===== -->
    <div class="command-palette-backdrop" id="commandPaletteBackdrop">
        <div class="command-palette-modal" id="commandPaletteModal">
            <!-- Search Header -->
            <div class="command-search-header">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input
                    type="text"
                    id="commandSearchInput"
                    class="command-search-input"
                    placeholder="Type a command or search modules, products, leads..."
                    autocomplete="off"
                >
                <div class="command-header-actions">
                    <span class="command-key-badge">ESC</span>
                    <button type="button" class="command-close-btn" id="commandCloseBtn" title="Close (Esc)">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Results List -->
            <div class="command-results-container" id="commandResultsList">
                <!-- Group 1: Navigation & Apps -->
                <div class="command-group" data-group="apps">
                    <div class="command-group-title">Navigation &amp; Management</div>
                    <a href="{{ route('admin.dashboard') }}" class="command-item" data-keywords="dashboard analytics overview stats reports home">
                        <div class="command-item-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Analytics Dashboard</div>
                            <div class="command-item-desc">Live store stats, traffic analytics &amp; recent activity</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="command-item" data-keywords="products catalog flour atta chakki bati bran inventory items">
                        <div class="command-item-icon" style="color: #EF801C;"><i class="fa-solid fa-boxes-stacked"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Our Products Catalog</div>
                            <div class="command-item-desc">Manage Chakki Atta, Bati, Wheat Bran varieties</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.leads.index') }}" class="command-item" data-keywords="leads inquiries contacts messages customers wholesale requests">
                        <div class="command-item-icon" style="color: #ef4444;"><i class="fa-solid fa-envelope-open-text"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Inquiries &amp; Wholesale Leads</div>
                            <div class="command-item-desc">View customer contact forms &amp; follow-up pipeline</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.blogs.index') }}" class="command-item" data-keywords="blogs articles recipes stories posts news content marketing">
                        <div class="command-item-icon" style="color: #3b82f6;"><i class="fa-solid fa-newspaper"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Blog Articles &amp; Recipes</div>
                            <div class="command-item-desc">Publish milling guides, grain recipes &amp; nutritional tips</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.galleries.index') }}" class="command-item" data-keywords="gallery media photos images videos youtube plant photos library">
                        <div class="command-item-icon" style="color: #8b5cf6;"><i class="fa-solid fa-photo-film"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Media Gallery Hub</div>
                            <div class="command-item-desc">Manage plant photos, milling process videos &amp; reels</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>

                <!-- Group 2: Quick Actions -->
                <div class="command-group" data-group="actions">
                    <div class="command-group-title">Quick Actions</div>
                    <a href="{{ route('admin.products.create') }}" class="command-item" data-keywords="add create new product item variety">
                        <div class="command-item-icon"><i class="fa-solid fa-circle-plus"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Add New Product</div>
                            <div class="command-item-desc">Create flour product with pack sizes and nutrition</div>
                        </div>
                        <span class="command-item-shortcut">Ctrl+N</span>
                    </a>
                    <a href="{{ route('admin.blogs.create') }}" class="command-item" data-keywords="write create new blog article post recipe">
                        <div class="command-item-icon"><i class="fa-solid fa-feather-pointed"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Write New Blog Article</div>
                            <div class="command-item-desc">Draft agricultural stories or traditional flour recipes</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="command-item" data-keywords="upload add new photo video media asset gallery">
                        <div class="command-item-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Upload Media Asset</div>
                            <div class="command-item-desc">Add plant photo or YouTube video embed</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>

                <!-- Group 3: System & Profile -->
                <div class="command-group" data-group="system">
                    <div class="command-group-title">System &amp; Settings</div>
                    <a href="{{ route('admin.webmaster.index') }}" class="command-item" data-keywords="webmaster analytics google search console gsc ga4 gtm meta pixel robots sitemap verification">
                        <div class="command-item-icon" style="color: #6366f1;"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Webmaster &amp; Analytics Hub</div>
                            <div class="command-item-desc">Google Search Console, GA4, Meta Pixel, Sitemap &amp; Robots.txt</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="command-item" data-keywords="settings configuration brand logo contact seo social footer general">
                        <div class="command-item-icon"><i class="fa-solid fa-gear"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Site Settings &amp; SEO</div>
                            <div class="command-item-desc">Configure brand details, Google Maps, social &amp; meta tags</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="{{ route('admin.profile.edit') }}" class="command-item" data-keywords="profile account password avatar email security user admin credentials">
                        <div class="command-item-icon"><i class="fa-solid fa-user-gear"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Profile &amp; Password Settings</div>
                            <div class="command-item-desc">Update admin name, avatar photo, and security password</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    <a href="javascript:void(0)" class="command-item" id="commandThemeToggle" data-keywords="theme dark light mode toggle switch color style">
                        <div class="command-item-icon"><i class="fa-solid fa-circle-half-stroke"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Toggle Dark / Light Mode</div>
                            <div class="command-item-desc">Switch between ultra-glass light and deep dark themes</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-rotate"></i></span>
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="command-item" data-keywords="preview public live website store frontend home">
                        <div class="command-item-icon"><i class="fa-solid fa-globe"></i></div>
                        <div class="command-item-content">
                            <div class="command-item-title">Preview Live Website</div>
                            <div class="command-item-desc">Open public Raghuvir Atta website in a new tab</div>
                        </div>
                        <span class="command-item-shortcut"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                    </a>
                </div>

                <!-- Empty Search State -->
                <div class="command-empty-state" id="commandEmptyState">
                    <div class="command-empty-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <div style="font-weight: 600; margin-bottom: 0.25rem;">No matching commands found</div>
                    <div style="font-size: 0.8rem;">Try searching for "products", "leads", "settings", or "blogs"</div>
                </div>
            </div>

            <!-- Footer Shortcuts Hint -->
            <div class="command-footer-hints">
                <div class="command-hints-group">
                    <span><kbd class="command-key-badge">↑</kbd> <kbd class="command-key-badge">↓</kbd> Navigate</span>
                    <span><kbd class="command-key-badge">↵</kbd> Select</span>
                    <span><kbd class="command-key-badge">ESC</kbd> Close</span>
                </div>
                <div>Raghuvir Atta Admin</div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin-assets/js/admin.js') }}?v={{ file_exists(public_path('admin-assets/js/admin.js')) ? filemtime(public_path('admin-assets/js/admin.js')) : time() }}"></script>
    <script src="{{ asset('admin-assets/js/syndron-components.js') }}?v={{ file_exists(public_path('admin-assets/js/syndron-components.js')) ? filemtime(public_path('admin-assets/js/syndron-components.js')) : time() }}"></script>

    <!-- Sonner Stacked Toast Notification Trigger (ShadCN style) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('success')) }}",
                    type: 'success'
                });
            @elseif(session('error'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('error')) }}",
                    type: 'error'
                });
            @elseif(session('info'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('info')) }}",
                    type: 'info'
                });
            @elseif(session('warning'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('warning')) }}",
                    type: 'warning'
                });
            @elseif(isset($errors) && $errors->any())
                window.showSonnerToast({
                    message: "{{ addslashes($errors->first()) }}",
                    type: 'error'
                });
            @endif
        });
    </script>

    <!-- Real-Time Notifications Script -->
    <script>
        const NOTIFICATION_CONFIG = {
            latestUrl: "{{ route('admin.notifications.latest') }}",
            markAllUrl: "{{ route('admin.notifications.mark-all-read') }}",
            csrfToken: "{{ csrf_token() }}"
        };

        function handleNotificationClick(event, id, targetUrl) {
            // Smoothly remove clicked notification from the list immediately
            const item = document.querySelector(`.notification-item[data-id="${id}"]`);
            if (item) {
                item.style.transition = 'all 0.2s ease';
                item.style.opacity = '0';
                item.style.transform = 'translateX(10px)';
                setTimeout(() => {
                    item.remove();
                    const container = document.getElementById('notificationsItemsContainer');
                    if (container && container.querySelectorAll('.notification-item').length === 0) {
                        renderNotificationsEmptyState(container);
                        const dot = document.getElementById('notificationsBadgeDot');
                        if (dot) dot.style.display = 'none';
                        const badge = document.getElementById('notificationsHeaderBadge');
                        if (badge) {
                            badge.textContent = 'Caught Up';
                            badge.style.background = 'var(--secondary)';
                            badge.style.color = 'var(--muted-foreground)';
                        }
                    }
                }, 180);
            }

            // Track notification read on server without blocking instant navigation
            try {
                fetch(`/admin/notifications/${id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': NOTIFICATION_CONFIG.csrfToken,
                        'Accept': 'application/json'
                    }
                }).catch(() => {});
            } catch (e) {}
        }

        function renderNotificationsEmptyState(container) {
            if (!container) return;
            container.innerHTML = `
                <div class="notifications-empty-box" style="padding: 2.25rem 1rem; text-align: center; color: var(--muted-foreground); animation: fadeIn 0.25s ease;">
                    <i class="fa-regular fa-bell-slash" style="font-size: 1.8rem; margin-bottom: 0.5rem; opacity: 0.4;"></i>
                    <div style="font-size: 0.85rem; font-weight: 700; color: var(--foreground);">All caught up!</div>
                    <div style="font-size: 0.75rem; margin-top: 2px;">No new notifications right now.</div>
                </div>
            `;
        }

        function markAllNotificationsAsRead(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }

            const btn = document.getElementById('markAllReadBtn');
            const originalHtml = btn ? btn.innerHTML : '';
            if (btn) btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Clearing...</span>';

            fetch(NOTIFICATION_CONFIG.markAllUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': NOTIFICATION_CONFIG.csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Hide red badge dot
                    const dot = document.getElementById('notificationsBadgeDot');
                    if (dot) dot.style.display = 'none';

                    // Update header status badge
                    const badge = document.getElementById('notificationsHeaderBadge');
                    if (badge) {
                        badge.textContent = 'Caught Up';
                        badge.style.background = 'var(--secondary)';
                        badge.style.color = 'var(--muted-foreground)';
                    }

                    // Clear all items from the list container and display clean empty state!
                    const container = document.getElementById('notificationsItemsContainer');
                    if (container) {
                        const items = container.querySelectorAll('.notification-item');
                        if (items.length > 0) {
                            items.forEach(el => {
                                el.style.transition = 'all 0.2s ease';
                                el.style.opacity = '0';
                                el.style.transform = 'translateX(10px)';
                            });
                            setTimeout(() => {
                                renderNotificationsEmptyState(container);
                            }, 200);
                        } else {
                            renderNotificationsEmptyState(container);
                        }
                    }

                    if (btn) btn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Cleared</span>';
                    setTimeout(() => {
                        if (btn) btn.innerHTML = originalHtml;
                    }, 2500);

                    if (window.showSonnerToast) {
                        window.showSonnerToast({
                            message: 'All notifications cleared',
                            type: 'success'
                        });
                    }
                }
            })
            .catch(err => {
                if (btn) btn.innerHTML = originalHtml;
                console.error('Error clearing notifications:', err);
            });
        }

        // Live polling every 30 seconds
        setInterval(function () {
            fetch(NOTIFICATION_CONFIG.latestUrl, {
                headers: { 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(data => {
                if (!data.success) return;
                const unread = data.unread_count || 0;
                const dot = document.getElementById('notificationsBadgeDot');
                const badge = document.getElementById('notificationsHeaderBadge');
                const container = document.getElementById('notificationsItemsContainer');

                if (unread > 0) {
                    if (dot) dot.style.display = 'inline-block';
                    if (badge) {
                        badge.textContent = unread + ' New';
                        badge.style.background = 'rgba(239, 68, 68, 0.15)';
                        badge.style.color = '#dc2626';
                    }

                    // Dynamically update container if new unread notifications exist
                    if (container && data.notifications && data.notifications.length > 0) {
                        let html = '';
                        data.notifications.forEach(n => {
                            html += `
                                <a
                                    href="${n.url}"
                                    class="notification-item unread"
                                    data-id="${n.id}"
                                    onclick="handleNotificationClick(event, ${n.id}, '${n.url}')"
                                >
                                    <div class="notification-icon ${n.icon_color || 'orange'}">
                                        <i class="${n.icon || 'fa-solid fa-bell'}"></i>
                                    </div>
                                    <div class="notification-text" style="flex: 1; min-width: 0;">
                                        <div class="notification-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            ${n.title}
                                        </div>
                                        <div class="notification-time">
                                            ${n.time_ago} ${n.message ? '&bull; ' + n.message : ''}
                                        </div>
                                    </div>
                                    <span class="notification-unread-dot" title="Unread"></span>
                                </a>
                            `;
                        });
                        container.innerHTML = html;
                    }
                } else {
                    if (dot) dot.style.display = 'none';
                    if (badge) {
                        badge.textContent = 'Caught Up';
                        badge.style.background = 'var(--secondary)';
                        badge.style.color = 'var(--muted-foreground)';
                    }
                    if (container && container.querySelectorAll('.notification-item').length > 0) {
                        renderNotificationsEmptyState(container);
                    }
                }
            })
            .catch(() => {});
        }, 30000);

        // Sync avatar fit/fill mode across navbar and sidebar
        (function() {
            try {
                var mode = localStorage.getItem('admin_avatar_mode');
                if (mode === 'fill') {
                    document.querySelectorAll('.user-avatar-circle, .profile-avatar-sm').forEach(function(el) {
                        el.classList.add('mode-fill');
                    });
                }
            } catch(e) {}
        })();

        // =========================================================================
        // SIDEBAR TOGGLE CONTROLLER (Works on Desktop & Mobile)
        // =========================================================================
        (function() {
            const toggleBtn = document.getElementById('toggleSidebarBtn');
            const sidebar = document.getElementById('syndronSidebar');
            const backdrop = document.getElementById('syndronBackdrop');
            const closeBtn = document.getElementById('sidebarCloseBtn');

            // Restore desktop state from localStorage on load
            try {
                if (window.innerWidth > 991 && localStorage.getItem('syndron_sidebar_collapsed') === 'true') {
                    document.body.classList.add('sidebar-collapsed');
                }
            } catch(e) {}

            function toggleSidebarHandler(e) {
                if (e) e.stopPropagation();
                if (!sidebar) return;

                if (window.innerWidth <= 991) {
                    // Mobile Drawer Toggle
                    const willOpen = !sidebar.classList.contains('open');
                    sidebar.classList.toggle('open', willOpen);
                    if (backdrop) backdrop.classList.toggle('active', willOpen);
                    document.body.classList.toggle('sidebar-drawer-open', willOpen);
                } else {
                    // Desktop Collapse / Expand Toggle
                    const isCollapsed = document.body.classList.toggle('sidebar-collapsed');
                    try {
                        localStorage.setItem('syndron_sidebar_collapsed', isCollapsed ? 'true' : 'false');
                    } catch(err) {}
                }
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebarHandler);
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (sidebar) sidebar.classList.remove('open');
                    if (backdrop) backdrop.classList.remove('active');
                    document.body.classList.remove('sidebar-drawer-open');
                });
            }

            if (backdrop) {
                backdrop.addEventListener('click', function() {
                    if (sidebar) sidebar.classList.remove('open');
                    backdrop.classList.remove('active');
                    document.body.classList.remove('sidebar-drawer-open');
                });
            }

            // Close mobile sidebar on Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                    if (backdrop) backdrop.classList.remove('active');
                    document.body.classList.remove('sidebar-drawer-open');
                }
            });
        })();

        // =========================================================================
        // TOPBAR LIVE SEARCH CONTROLLER
        // =========================================================================
        @php
            $adminSearchItems = [
                ['title' => 'Analytics Dashboard', 'subtitle' => 'Live store performance & metrics', 'url' => route('admin.dashboard'), 'icon' => 'fa-solid fa-chart-line', 'category' => 'Dashboards', 'keywords' => 'analytics stats overview traffic home'],
                ['title' => 'Our Products Catalog', 'subtitle' => 'Manage flours, pack sizes & inventory', 'url' => route('admin.products.index'), 'icon' => 'fa-solid fa-boxes-stacked', 'category' => 'Products', 'keywords' => 'products atta flour bati bran items'],
                ['title' => 'Add New Product', 'subtitle' => 'Create new flour product variety', 'url' => route('admin.products.create'), 'icon' => 'fa-solid fa-circle-plus', 'category' => 'Products', 'keywords' => 'new add product create'],
                ['title' => 'Inquiries & Leads', 'subtitle' => 'Customer contact forms & bulk requests', 'url' => route('admin.leads.index'), 'icon' => 'fa-solid fa-envelope-open-text', 'category' => 'Leads', 'keywords' => 'leads inquiries contact messages customers wholesale'],
                ['title' => 'Blog Articles', 'subtitle' => 'Publish milling stories & recipe articles', 'url' => route('admin.blogs.index'), 'icon' => 'fa-solid fa-newspaper', 'category' => 'Content', 'keywords' => 'blog articles recipes news posts content'],
                ['title' => 'Add New Article', 'subtitle' => 'Write and publish new blog article', 'url' => route('admin.blogs.create'), 'icon' => 'fa-solid fa-pen-to-square', 'category' => 'Content', 'keywords' => 'new write add blog article post'],
                ['title' => 'Media Gallery Hub', 'subtitle' => 'Manage factory & milling photos/videos', 'url' => route('admin.galleries.index'), 'icon' => 'fa-solid fa-photo-film', 'category' => 'Media', 'keywords' => 'gallery media photos images videos'],
                ['title' => 'Page Banners', 'subtitle' => 'Header banners & page hero visual setups', 'url' => route('admin.banners.index'), 'icon' => 'fa-solid fa-panorama', 'category' => 'Media', 'keywords' => 'banners hero page visual images'],
                ['title' => 'Page SEO Settings', 'subtitle' => 'Meta titles, descriptions & OpenGraph tags', 'url' => route('admin.seo.index'), 'icon' => 'fa-solid fa-magnifying-glass-chart', 'category' => 'SEO', 'keywords' => 'seo meta tags keywords google indexing'],
                ['title' => 'Webmaster & Analytics', 'subtitle' => 'Search Console, Google Analytics & tracking tags', 'url' => route('admin.webmaster.index'), 'icon' => 'fa-solid fa-chart-pie', 'category' => 'SEO', 'keywords' => 'webmaster analytics google tag manager gtm pixel search console'],
                ['title' => 'Profile & Account Settings', 'subtitle' => 'Update administrator name, avatar & credentials', 'url' => route('admin.profile.edit'), 'icon' => 'fa-solid fa-user-gear', 'category' => 'Settings', 'keywords' => 'profile admin account password avatar email user settings'],
                ['title' => 'General Site Settings', 'subtitle' => 'Company contacts, phone, address & social links', 'url' => route('admin.settings.index'), 'icon' => 'fa-solid fa-sliders', 'category' => 'Settings', 'keywords' => 'site settings configuration contact phone address social'],
                ['title' => 'Email SMTP Configuration', 'subtitle' => 'Configure mail server & contact notification alerts', 'url' => route('admin.settings.email'), 'icon' => 'fa-solid fa-envelope-circle-check', 'category' => 'Settings', 'keywords' => 'email mail smtp host notifications alert'],
                ['title' => 'Preview Live Website', 'subtitle' => 'Open public Raghuvir Atta storefront', 'url' => url('/'), 'icon' => 'fa-solid fa-globe', 'category' => 'Storefront', 'keywords' => 'preview live site store frontend web'],
            ];

            $dbProducts = rescue(fn() => \App\Models\Product::select('id', 'name', 'slug')->get(), collect(), false);
            foreach ($dbProducts as $p) {
                $adminSearchItems[] = [
                    'title' => $p->name,
                    'subtitle' => 'Product: edit details, pricing & packs',
                    'url' => route('admin.products.edit', $p->id),
                    'icon' => 'fa-solid fa-box',
                    'category' => 'Products',
                    'keywords' => 'product ' . strtolower($p->name) . ' ' . $p->slug,
                ];
            }

            $dbBlogs = rescue(fn() => \App\Models\Blog::select('id', 'title', 'slug')->get(), collect(), false);
            foreach ($dbBlogs as $b) {
                $adminSearchItems[] = [
                    'title' => $b->title,
                    'subtitle' => 'Blog: edit article & recipe details',
                    'url' => route('admin.blogs.edit', $b->id),
                    'icon' => 'fa-solid fa-file-lines',
                    'category' => 'Articles',
                    'keywords' => 'blog article ' . strtolower($b->title) . ' ' . $b->slug,
                ];
            }
        @endphp

        (function() {
            const searchIndex = {!! json_encode($adminSearchItems) !!};
            const searchBox = document.getElementById('topbarSearchBox');
            const searchInput = document.getElementById('topbarSearchInput');
            const dropdown = document.getElementById('topbarSearchDropdown');
            const list = document.getElementById('topbarSearchDropdownList');
            const titleEl = document.getElementById('topbarSearchDropdownTitle');
            const countEl = document.getElementById('topbarSearchCount');

            if (!searchInput || !dropdown || !list) return;

            let selectedIndex = -1;

            function highlightMatch(text, query) {
                if (!query) return text;
                const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
                return text.replace(regex, '<strong style="color: var(--accent); font-weight: 700;">$1</strong>');
            }

            function renderResults(query) {
                const q = (query || '').toLowerCase().trim();
                let matches = [];

                if (!q) {
                    // Show Quick Navigation links (top 6)
                    matches = searchIndex.slice(0, 6);
                    if (titleEl) titleEl.textContent = 'Quick Navigation';
                    if (countEl) countEl.textContent = '';
                } else {
                    matches = searchIndex.filter(item => {
                        return item.title.toLowerCase().includes(q) ||
                               item.subtitle.toLowerCase().includes(q) ||
                               (item.keywords && item.keywords.toLowerCase().includes(q)) ||
                               item.category.toLowerCase().includes(q);
                    });
                    if (titleEl) titleEl.textContent = 'Search Results';
                    if (countEl) countEl.textContent = `${matches.length} found`;
                }

                if (matches.length === 0) {
                    list.innerHTML = `
                        <div class="topbar-search-empty">
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 1.5rem; margin-bottom: 0.5rem; opacity: 0.35; display: block;"></i>
                            <div>No results found for "<strong>${query}</strong>"</div>
                            <div style="font-size: 0.725rem; color: var(--muted-foreground); margin-top: 4px;">Try searching for "atta", "product", "lead", "blog", or "profile"</div>
                        </div>
                    `;
                    selectedIndex = -1;
                    return;
                }

                let html = '';
                matches.forEach((item, idx) => {
                    const isSelected = idx === 0 ? 'selected' : '';
                    html += `
                        <a href="${item.url}" class="topbar-search-item ${isSelected}" data-index="${idx}">
                            <div class="topbar-search-item-icon">
                                <i class="${item.icon}"></i>
                            </div>
                            <div class="topbar-search-item-content">
                                <div class="topbar-search-item-title">${highlightMatch(item.title, q)}</div>
                                <div class="topbar-search-item-subtitle">${item.subtitle}</div>
                            </div>
                            <span class="topbar-search-item-badge">${item.category}</span>
                        </a>
                    `;
                });

                list.innerHTML = html;
                selectedIndex = 0;
            }

            function openDropdown() {
                renderResults(searchInput.value);
                dropdown.classList.add('show');
            }

            function closeDropdown() {
                dropdown.classList.remove('show');
                selectedIndex = -1;
            }

            // Input Event Listeners
            searchInput.addEventListener('focus', function() {
                openDropdown();
            });

            searchInput.addEventListener('input', function() {
                openDropdown();
            });

            // Keyboard Navigation (Arrow Up, Arrow Down, Enter, Esc)
            searchInput.addEventListener('keydown', function(e) {
                const items = list.querySelectorAll('.topbar-search-item');
                if (items.length === 0) return;

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    if (selectedIndex < items.length - 1) {
                        selectedIndex++;
                    } else {
                        selectedIndex = 0;
                    }
                    updateSelection(items);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (selectedIndex > 0) {
                        selectedIndex--;
                    } else {
                        selectedIndex = items.length - 1;
                    }
                    updateSelection(items);
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (selectedIndex >= 0 && items[selectedIndex]) {
                        window.location.href = items[selectedIndex].getAttribute('href');
                    }
                } else if (e.key === 'Escape') {
                    e.preventDefault();
                    closeDropdown();
                    searchInput.blur();
                }
            });

            function updateSelection(items) {
                items.forEach((item, idx) => {
                    if (idx === selectedIndex) {
                        item.classList.add('selected');
                        item.scrollIntoView({ block: 'nearest' });
                    } else {
                        item.classList.remove('selected');
                    }
                });
            }

            // Click Outside Handler
            document.addEventListener('click', function(e) {
                if (searchBox && !searchBox.contains(e.target)) {
                    closeDropdown();
                }
            });

            // Global Keyboard Shortcut: Ctrl + K or ⌘K
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                    e.preventDefault();
                    searchInput.focus();
                    searchInput.select();
                    openDropdown();
                }
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>
