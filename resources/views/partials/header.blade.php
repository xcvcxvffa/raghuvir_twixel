<header class="main-header">
    <div class="header-sticky bg-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="Logo" class="header-logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                     <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                            <!-- Our Products Mega Menu Start -->
                            <li class="nav-item submenu has-mega-menu" id="navMegaMenuOurProducts">
                                <a class="nav-link" href="{{ route('products') }}">Our Products</a>
                                
                                <!-- Desktop Mega Menu Safe Wrapper Start -->
                                <div class="mega-menu-wrapper">
                                    <div class="mega-menu-card">
                                        <!-- Mega Menu Top Bar -->
                                        <div class="mega-menu-top">
                                            <div class="mega-menu-heading">
                                                <h4>Our Premium Flour Range</h4>
                                            </div>
                                            <a href="{{ route('products') }}" class="mega-view-all-link">
                                                <span>View All Products</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>

                                        <!-- Mega Menu Main Body: Left Featured Banner + Right 3 Product Cards -->
                                        <div class="mega-menu-main-content">
                                            <!-- Left Featured Highlight Banner -->
                                            <div class="mega-featured-banner">
                                                <div class="mega-featured-inner">
                                                    <h5>Farm-Fresh Direct to Your Kitchen</h5>
                                                    <p>Cleaned, slow stone-ground on traditional chakkis with zero maida and natural golden wheat germ intact.</p>
                                                </div>
                                            </div>

                                            <!-- Right 3-Col Product Cards Grid -->
                                            <div class="mega-products-grid">
                                                <!-- Card 1: Bati Atta -->
                                                <a href="{{ route('product-details', ['product' => 'bati']) }}" class="mega-product-item">
                                                    <div class="mega-thumb-wrap">
                                                        <img src="{{ asset('images/product_atta_transparent.png') }}" alt="Raghuvir Bati Atta">
                                                    </div>
                                                    <div class="mega-item-info">
                                                        <h5>Bati Atta</h5>
                                                        <p>Coarsely stone-ground for rich, authentic flavour — perfect for crispy Dal Batis &amp; Baflas.</p>
                                                        <div class="mega-card-action">
                                                            <span>Explore Product</span>
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Card 2: Whole Wheat Atta -->
                                                <a href="{{ route('product-details', ['product' => 'atta']) }}" class="mega-product-item">
                                                    <div class="mega-thumb-wrap">
                                                        <img src="{{ asset('images/product_atta_transparent.png') }}" alt="Raghuvir Whole Wheat Atta">
                                                    </div>
                                                    <div class="mega-item-info">
                                                        <h5>Whole Wheat Atta</h5>
                                                        <p>100% pure chakki-ground whole wheat for super soft, nutritious daily rotis &amp; parathas.</p>
                                                        <div class="mega-card-action">
                                                            <span>Explore Product</span>
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Card 3: Wheat Bran -->
                                                <a href="{{ route('product-details', ['product' => 'wheat']) }}" class="mega-product-item">
                                                    <div class="mega-thumb-wrap">
                                                        <img src="{{ asset('images/product_atta_transparent.png') }}" alt="Raghuvir Wheat Bran">
                                                    </div>
                                                    <div class="mega-item-info">
                                                        <h5>Wheat Bran</h5>
                                                        <p>High-fiber wheat bran, ideal for bulk baking, catering &amp; commercial kitchens. Available in 49 kg.</p>
                                                        <div class="mega-card-action">
                                                            <span>Explore Product</span>
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Mega Menu Bottom Highlights Strip -->
                                        <div class="mega-menu-bottom">
                                            <div class="mega-features-list">
                                                <div class="mega-feature-chip">
                                                    <span class="chip-icon"><i class="fa-solid fa-wheat-awn"></i></span>
                                                    <span>Selected Golden Wheat</span>
                                                </div>
                                                <div class="mega-feature-chip">
                                                    <span class="chip-icon"><i class="fa-solid fa-shield-halved"></i></span>
                                                    <span>100% Untouched Milling</span>
                                                </div>
                                                <div class="mega-feature-chip">
                                                    <span class="chip-icon"><i class="fa-solid fa-truck-fast"></i></span>
                                                    <span>Direct Mill-Fresh Dispatch</span>
                                                </div>
                                            </div>
                                            <div class="mega-bottom-action">
                                                <a href="https://wa.me/919725427727?text={{ rawurlencode('Hello Raghuvir Atta, I would like to inquire about bulk ordering your products.') }}" target="_blank" class="mega-btn-whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                    <span>Bulk Inquiry</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Desktop Mega Menu Safe Wrapper End -->

                                <!-- Mobile Submenu for SlickNav -->
                                <ul class="mobile-sub-only">
                                    <li><a href="{{ route('products') }}">All Products Catalog</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'bati']) }}">Bati Atta</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'atta']) }}">Whole Wheat Atta</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'wheat']) }}">Wheat Bran</a></li>
                                </ul>
                            </li>
                            <!-- Our Products Mega Menu End -->
                            <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    <!-- Header Btn Start -->
                    <div class="header-btn">
                        <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get Started</a>
                    </div>
                    <!-- Header Btn End -->
                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var megaNav = document.getElementById('navMegaMenuOurProducts');
    if (!megaNav) return;
    var closeTimer;
    megaNav.addEventListener('mouseenter', function() {
        clearTimeout(closeTimer);
        megaNav.classList.add('is-open');
    });
    megaNav.addEventListener('mouseleave', function() {
        closeTimer = setTimeout(function() {
            megaNav.classList.remove('is-open');
        }, 280);
    });
});
</script>
