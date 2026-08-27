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
                            <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Our Products</a></li>
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
