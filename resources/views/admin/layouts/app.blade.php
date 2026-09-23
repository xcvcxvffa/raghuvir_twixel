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
                            <span class="badge-tag" style="background: rgba(239, 128, 28, 0.15); color: #EF801C; font-weight: 700;">{{ \App\Models\Product::count() }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.leads.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-envelope-open-text link-icon"></i>
                            <span>Inquiries &amp; Leads</span>
                            @php
                                $newLeadsCount = \App\Models\Lead::where('status', 'new')->count();
                            @endphp
                            @if($newLeadsCount > 0)
                                <span class="badge-tag" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; font-weight: 700;">{{ $newLeadsCount }} New</span>
                            @else
                                <span class="badge-tag">{{ \App\Models\Lead::count() }}</span>
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
                            <span class="badge-tag" style="background: rgba(139, 92, 246, 0.15); color: #8b5cf6; font-weight: 700;">{{ \App\Models\Gallery::count() }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-panorama link-icon"></i>
                            <span>Page Banners</span>
                            <span class="badge-tag" style="background: rgba(14, 165, 233, 0.15); color: #0284c7; font-weight: 700;">{{ \App\Models\PageBanner::count() }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-magnifying-glass-chart link-icon"></i>
                            <span>Page SEO</span>
                            <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #059669; font-weight: 700;">{{ \App\Models\PageSeo::count() }}</span>
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
                    <li class="sidebar-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-gear link-icon"></i>
                            <span>Site Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Sidebar User Profile Footer -->
            <a href="{{ route('admin.profile.edit') }}" class="sidebar-footer-profile" style="text-decoration: none;">
                <div class="profile-avatar-sm {{ auth()->user() && auth()->user()->getAvatarUrl() ? 'has-image' : '' }}">
                    @if(auth()->user() && auth()->user()->getAvatarUrl())
                        <img src="{{ auth()->user()->getAvatarUrl() }}" alt="{{ auth()->user()->name }}" style="max-width: 60%; max-height: 60%; width: auto; height: auto; object-fit: contain; margin: auto; display: block;">
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
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>

                    <!-- Search Input with Keyboard Shortcut hint -->
                    <div class="topbar-search-box">
                        <i class="fa-solid fa-magnifying-glass search-icon-left"></i>
                        <input type="text" class="topbar-search-input" placeholder="Search analytics, products...">
                        <span class="kbd-shortcut">⌘K</span>
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

                    <!-- Notifications Popover -->
                    <div class="syndron-user-menu" style="position: relative;">
                        <button type="button" class="icon-btn-action" id="notificationsTrigger" title="Notifications">
                            <i class="fa-regular fa-bell"></i>
                            <span class="notification-badge-dot"></span>
                        </button>
                        <div class="user-dropdown-popover notifications-popover" id="notificationsDropdown">
                            <div class="popover-header" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="title">Notifications</div>
                                <span class="badge-tag" style="font-size: 0.7rem;">3 New</span>
                            </div>
                            <div style="max-height: 280px; overflow-y: auto;">
                                <a href="{{ route('admin.dashboard') }}" class="notification-item">
                                    <div class="notification-icon orange"><i class="fa-solid fa-wheat-awn"></i></div>
                                    <div class="notification-text">
                                        <div class="notification-title">New Lead: Whole Wheat Atta</div>
                                        <div class="notification-time">12 mins ago &bull; Rajesh Patel</div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.settings.index') }}" class="notification-item">
                                    <div class="notification-icon green"><i class="fa-solid fa-gear"></i></div>
                                    <div class="notification-text">
                                        <div class="notification-title">Site Settings Synchronized</div>
                                        <div class="notification-time">1 hour ago &bull; System Cache</div>
                                    </div>
                                </a>
                                <a href="{{ route('admin.dashboard') }}" class="notification-item">
                                    <div class="notification-icon blue"><i class="fa-solid fa-chart-line"></i></div>
                                    <div class="notification-text">
                                        <div class="notification-title">Traffic Spike (+21.3%)</div>
                                        <div class="notification-time">3 hours ago &bull; Organic Search</div>
                                    </div>
                                </a>
                            </div>
                            <div style="padding: 0.5rem; text-align: center; border-top: 1px solid var(--border);">
                                <a href="javascript:void(0)" style="font-size: 0.75rem; font-weight: 600; color: var(--accent); text-decoration: none;">Mark all as read</a>
                            </div>
                        </div>
                    </div>

                    <!-- User Dropdown Menu -->
                    <div class="syndron-user-menu">
                        <button type="button" class="user-trigger" id="userTrigger">
                            <div class="user-avatar-circle {{ auth()->user() && auth()->user()->getAvatarUrl() ? 'has-image' : '' }}">
                                @if(auth()->user() && auth()->user()->getAvatarUrl())
                                    <img src="{{ auth()->user()->getAvatarUrl() }}" alt="{{ auth()->user()->name }}" style="max-width: 60%; max-height: 60%; width: auto; height: auto; object-fit: contain; margin: auto; display: block;">
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
    @stack('scripts')
</body>
</html>
