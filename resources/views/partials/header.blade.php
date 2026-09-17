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
                            <li class="nav-item submenu has-mega-menu">
                                <a class="nav-link" href="{{ route('products') }}">Our Products</a>
                                
                                <!-- Desktop Mega Menu Box Start -->
                                <div class="mega-menu-box">
                                    <div class="mega-menu-inner">
                                        <!-- Mega Menu Top Bar -->
                                        <div class="mega-menu-top">
                                            <div class="mega-menu-heading">
                                                <span class="mega-pill"><i class="fa-solid fa-wheat-awn"></i> 100% Pure &amp; Hygienic</span>
                                                <h4>Our Premium Flour Range</h4>
                                            </div>
                                            <a href="{{ route('products') }}" class="mega-view-all-link">
                                                <span>View All Products</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>

                                        <!-- Mega Menu Products 3-Col Grid -->
                                        <div class="mega-menu-grid">
                                            <!-- Card 1: Chakki Atta -->
                                            <a href="{{ route('product-details', ['product' => 'atta']) }}" class="mega-product-item">
                                                <div class="mega-item-badge best-seller">Bestseller</div>
                                                <div class="mega-thumb-wrap">
                                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="Raghuvir Chakki Atta">
                                                </div>
                                                <div class="mega-item-info">
                                                    <h5>Raghuvir Chakki Atta</h5>
                                                    <p>100% pure stone-ground chakki flour for soft &amp; nutritious daily rotis.</p>
                                                    <div class="mega-item-meta">
                                                        <span class="mega-size-badge"><i class="fa-solid fa-box"></i> 5kg, 30kg</span>
                                                        <span class="mega-explore-btn">Explore <i class="fa-solid fa-angle-right"></i></span>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- Card 2: Bati Atta -->
                                            <a href="{{ route('product-details', ['product' => 'bati']) }}" class="mega-product-item">
                                                <div class="mega-item-badge traditional">Specialty</div>
                                                <div class="mega-thumb-wrap">
                                                    <img src="{{ asset('images/product_atta.jpg') }}" alt="Raghuvir Bati Atta">
                                                </div>
                                                <div class="mega-item-info">
                                                    <h5>Raghuvir Bati Atta</h5>
                                                    <p>Specially milled coarse texture for authentic crispy Dal Batis &amp; Baflas.</p>
                                                    <div class="mega-item-meta">
                                                        <span class="mega-size-badge"><i class="fa-solid fa-box"></i> 30kg</span>
                                                        <span class="mega-explore-btn">Explore <i class="fa-solid fa-angle-right"></i></span>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- Card 3: Commercial Wheat Atta -->
                                            <a href="{{ route('product-details', ['product' => 'wheat']) }}" class="mega-product-item">
                                                <div class="mega-item-badge commercial">Commercial</div>
                                                <div class="mega-thumb-wrap">
                                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="Commercial Wheat Atta">
                                                </div>
                                                <div class="mega-item-info">
                                                    <h5>Commercial Wheat Atta</h5>
                                                    <p>High-yield commercial flour for restaurants, catering &amp; bulk baking.</p>
                                                    <div class="mega-item-meta">
                                                        <span class="mega-size-badge"><i class="fa-solid fa-box"></i> 49kg</span>
                                                        <span class="mega-explore-btn">Explore <i class="fa-solid fa-angle-right"></i></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Mega Menu Bottom Highlights Strip -->
                                        <div class="mega-menu-bottom">
                                            <div class="mega-features-list">
                                                <div class="mega-feature-chip">
                                                    <i class="fa-solid fa-seedling"></i>
                                                    <span>Farm-Fresh Selected Wheat</span>
                                                </div>
                                                <div class="mega-feature-chip">
                                                    <i class="fa-solid fa-shield-halved"></i>
                                                    <span>Untouched By Hands</span>
                                                </div>
                                                <div class="mega-feature-chip">
                                                    <i class="fa-solid fa-truck-fast"></i>
                                                    <span>Daily Fresh Mill Supply</span>
                                                </div>
                                            </div>
                                            <div class="mega-bottom-action">
                                                <a href="https://wa.me/919725427727?text={{ rawurlencode('Hello Raghuvir Atta, I would like to inquire about bulk ordering your products.') }}" target="_blank" class="mega-btn-whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i> Bulk Inquiry
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Desktop Mega Menu Box End -->

                                <!-- Mobile Submenu for SlickNav -->
                                <ul class="mobile-sub-only">
                                    <li><a href="{{ route('products') }}">All Products Catalog</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'atta']) }}">Raghuvir Chakki Atta (5kg, 30kg)</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'bati']) }}">Raghuvir Bati Atta (30kg)</a></li>
                                    <li><a href="{{ route('product-details', ['product' => 'wheat']) }}">Raghuvir Commercial Wheat Atta (49kg)</a></li>
                                </ul>
                            </li>
                            <!-- Our Products Mega Menu End -->
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                            <li class="nav-item submenu"><a class="nav-link" href="#">Demo Pages</a>
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('home-v2') }}">Home - Version 2</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('home-v3') }}">Home - Version 3</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('home-v4') }}">Home - Version 4</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('product-details', ['product' => 'atta']) }}">Product Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('blog-details') }}">Blog Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('team') }}">Our Team</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('team-details') }}">Team Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing Plan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('testimonials') }}">Testimonials</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('image-gallery') }}">Image Gallery</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('video-gallery') }}">Video Gallery</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('faqs') }}">FAQs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('404') }}">404 Page</a></li>
                                </ul>
                            </li>
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
