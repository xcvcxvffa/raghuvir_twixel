@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero-metal bg-section dark-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Purely Organic Harvest</h3>
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Harvesting health from natural farming</h1>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Experience the richness of naturally grown produce nurtured with care, tradition, and sustainable farming practices. </p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Start Your Organic Journey</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero Image Box Start -->
                    <div class="hero-image-box-metal">
                        <!-- Hero Image Box-1 Start -->
                        <div class="hero-image-box-1-metal">
                            <div class="hero-image-metal">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/hero-image-1-metal.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="get-in-touch-circle-metal">
                                <a href="{{ route('contact') }}"><img src="{{ asset('images/get-in-touch-circle.svg') }}" alt=""></a>
                            </div>
                        </div>
                        <!-- Hero Image Box-1 End -->

                        <!-- Hero Image Box-2 Start -->
                        <div class="hero-image-box-2-metal">
                            <div class="hero-image-metal">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/hero-image-2-metal.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <!-- Hero Image Box-2 End -->
                    </div>
                    <!-- Hero Image Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Hero Company Slider Box Start -->
    <div class="hero-company-slider-box-metal bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero Company Slider Body Start -->
                    <div class="hero-company-slider-body-metal">
                        <!-- Hero Company Slider Content Start -->
                        <div class="hero-company-slider-content-metal">
                            <h3>Trusted By More Than <span class="counter">100</span>+ Companies</h3>
                        </div>
                        <!-- Hero Company Slider Content End -->

                        <!-- Hero Company Slider Start -->
                        <div class="hero-company-slider-metal">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-1.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->

                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-2.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->

                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-3.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->
                                    
                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-4.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->
                                    
                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-5.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->

                                    <!-- Company Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-logo-metal">
                                            <img src="{{ asset('images/company-logo-primary-1.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Company Logo End -->
                                </div>
                            </div>
                        </div>
                        <!-- Hero Company Slider End -->
                    </div>
                    <!-- Hero Company Slider Body End -->
                </div>
            </div>
        </div>        
    </div>
    <!-- Hero Company Slider Box End -->

    <!-- About Us Section Start -->
    <div class="about-us-metal">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- About Us Image Box Start -->
                    <div class="about-us-image-box-metal">
                        <!-- About Image Box-1 Start -->
                        <div class="about-image-box-1-metal about-us-image-metal">
                            <figure class="image-anime">
                                <img src="{{ asset('images/about-us-image-1-metal.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- About Image Box-1 End -->

                        <!-- About Image Box-2 Start -->
                        <div class="about-image-box-2-metal">
                            <div class="about-us-image-metal">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/about-us-image-2-metal.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="about-year-counter-box-metal">
                                <div class="about-year-counter-title-metal">
                                    <h2><span class="counter">25</span>+</h2>
                                </div>
                                <div class="about-year-counter-content-metal">
                                    <p>Years of Experience</p>
                                </div>                                
                            </div>
                        </div>
                        <!-- About Image Box-1 End -->
                    </div>
                    <!-- About Us Image Box End -->
                </div>

                <div class="col-xl-6">
                    <!-- About Us Content Start -->
                    <div class="about-us-content-metal">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">About Us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Creating healthy futures with pure organic farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">At our organic farm, we believe that healthy living begins with the choices we make today. By embracing sustainable methods, nurturing rich soil.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us Body Start -->
                        <div class="about-us-body-metal wow fadeInUp" data-wow-delay="0.4s">
                            <!-- About Body Item Start -->
                            <div class="about-body-item-metal">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-body-item-1-metal.svg') }}" alt="">
                                </div>
                                <div class="about-body-item-content-metal">
                                    <h3>100% Organic</h3>
                                    <p>Grown naturally with zero chemicals, always 100% organic.</p>
                                </div>
                            </div>
                            <!-- About Body Item End -->

                            <!-- About Body Item Start -->
                            <div class="about-body-item-metal">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-body-item-2-metal.svg') }}" alt="">
                                </div>
                                <div class="about-body-item-content-metal">
                                    <h3>Eco-Friendly Farming</h3>
                                    <p>Grown naturally with zero chemicals, always 100% organic.</p>
                                </div>
                            </div>
                            <!-- About Body Item End -->
                        </div>
                        <!-- About Us Body End -->

                        <!-- About Us Button Start -->
                        <div class="about-us-btn-metal wow fadeInUp" data-wow-delay="0.6s">
                            <a href="{{ route('about') }}" class="btn-default">Learn About Our Farm</a>
                        </div>
                        <!-- About Us Button End -->
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services-metal bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Services</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Experience our range of organic farming services</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-metal wow fadeInUp">
                        <!-- Service Item Header Start -->
                        <div class="service-item-header-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-service-1-metal.svg') }}" alt="">
                            </div>
                            <div class="service-item-title-metal">
                                <h2><a href="{{ route('service-details') }}">Fresh Produce Supply</a></h2>
                            </div>
                        </div>
                        <!-- Service Item Header End -->

                        <!-- Service Item Image Start -->
                        <div class="service-item-image-metal">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/service-image-1-metal.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-metal">
                            <div class="service-item-content-metal">
                                <p>Pure, chemical-free produce sourced directly from our farm.</p>
                            </div>
                            <div class="service-item-btn-metal">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                        <!-- Service Item Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-metal wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Service Item Header Start -->
                        <div class="service-item-header-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-service-2-metal.svg') }}" alt="">
                            </div>
                            <div class="service-item-title-metal">
                                <h2><a href="{{ route('service-details') }}">Farm-to-Home Delivery</a></h2>
                            </div>
                        </div>
                        <!-- Service Item Header End -->

                        <!-- Service Item Image Start -->
                        <div class="service-item-image-metal">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/service-image-2-metal.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-metal">
                            <div class="service-item-content-metal">
                                <p>Pure, chemical-free produce sourced directly from our farm.</p>
                            </div>
                            <div class="service-item-btn-metal">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                        <!-- Service Item Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-metal wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Service Item Header Start -->
                        <div class="service-item-header-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-service-3-metal.svg') }}" alt="">
                            </div>
                            <div class="service-item-title-metal">
                                <h2><a href="{{ route('service-details') }}">Water Management</a></h2>
                            </div>
                        </div>
                        <!-- Service Item Header End -->

                        <!-- Service Item Image Start -->
                        <div class="service-item-image-metal">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/service-image-3-metal.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-metal">
                            <div class="service-item-content-metal">
                                <p>Pure, chemical-free produce sourced directly from our farm.</p>
                            </div>
                            <div class="service-item-btn-metal">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                        <!-- Service Item Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-metal wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Service Item Header Start -->
                        <div class="service-item-header-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-service-4-metal.svg') }}" alt="">
                            </div>
                            <div class="service-item-title-metal">
                                <h2><a href="{{ route('service-details') }}">Seed Selection</a></h2>
                            </div>
                        </div>
                        <!-- Service Item Header End -->

                        <!-- Service Item Image Start -->
                        <div class="service-item-image-metal">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/service-image-4-metal.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-metal">
                            <div class="service-item-content-metal">
                                <p>Pure, chemical-free produce sourced directly from our farm.</p>
                            </div>
                            <div class="service-item-btn-metal">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                        <!-- Service Item Body End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.8s">
                        <!-- Satisfy Client Images Start -->
                        <div class="satisfy-client-images">
                            <div class="satisfy-client-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <img src="{{ asset('images/icon-phone-primary.svg') }}" alt="">
                            </div>
                        </div>
                        <!-- Satisfy Client Images End -->    
                        <p>Trust a farm where innovation, nature, and integrity come together to serve you better every day.</p>
                        <ul>
                            <li><span class="counter">4.9</span>/5</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Our 4200 Review </li>
                        </ul>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us-metal">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="why-choose-content-metal">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Why Choose Us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Why customers prefer our pure organic farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Customers choose us because we stay true to the principles of pure, chemical-free farming crop is grown with care, using sustainable methods that protect the soil.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Why Choose Body Start -->
                        <div class="why-choose-body-metal wow fadeInUp" data-wow-delay="0.4s">
                            <div class="get-in-touch-circle-metal">
                                <a href="{{ route('contact') }}">
                                    <img src="{{ asset('images/get-in-touch-circle.svg') }}" alt="">
                                </a>
                            </div>

                            <div class="why-choose-body-content-metal">
                                <p>“Choose us for truly pure chemical-free farm root in sustainability & care. We grow every crop protect responsibly soil health deliver fresh, nutrient-rich produce you can trust.”</p>
                            </div>
                        </div>
                        <!-- Why Choose Body End -->

                        <!-- Why Choose List Start -->
                        <div class="why-choose-list-metal wow fadeInUp" data-wow-delay="0.6s">
                            <ul>
                                <li>Sustainable & Eco-Friendly Methods</li>
                                <li>Trusted by Thousands of Families</li>
                                <li>Nutrient-Rich Seasonal Harvests</li>
                                <li>Experienced & Passionate Farmers</li>
                            </ul>
                        </div>
                        <!-- Why Choose List End -->

                        <!-- Why Choose Button Start -->
                        <div class="why-choose-btn-metal wow fadeInUp" data-wow-delay="0.8s">
                            <a href="{{ route('contact') }}" class="btn-default">Contact Us</a>
                        </div>
                        <!-- Why Choose Button End -->
                    </div>
                </div>

                <div class="col-xl-6">
                    <!-- Why Choose Images Start -->
                    <div class="why-choose-images-metal">
                        <!-- Why Choose Image Start -->
                        <div class="why-choose-image-metal">
                            <figure class="image-anime">
                                <img src="{{ asset('images/why-choose-image-1-metal.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Why Choose Image End -->

                        <!-- Why Choose Image Box Start -->
                        <div class="why-choose-image-box-metal">
                            <!-- Why Choose Image Start -->
                            <div class="why-choose-image-metal">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/why-choose-image-2-metal.jpg') }}" alt="">
                                </figure>
                            </div>
                            <!-- Why Choose Image End -->

                            <!-- Why Choose Client Box Start -->
                            <div class="why-choose-client-box-metal">
                                <!-- Satisfy Client Images Start -->
                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-3.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-4.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <!-- Satisfy Client Images End -->

                                <div class="why-choose-client-content-metal">
                                    <h2><span class="counter">5</span>K+</h2>
                                    <p>Happy Families Served Annually</p>
                                </div>
                            </div>
                            <!-- Why Choose Client Box End -->
                        </div>
                        <!-- Why Choose Image Box End -->
                    </div>
                    <!-- Why Choose Images End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Our Core Value Section Start -->
    <div class="our-core-value-metal bg-section dark-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="our-core-value-content-metal">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Our Core Value</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Our values that inspire pure organic farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Our values are rooted in respect for nature, purity, and sustainability. We believe in growing food the right way—nurturing healthy soil, protecting biodiversity.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Core Value Button Start -->
                        <div class="core-value-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Explore The Farm</a>
                        </div>
                        <!-- Core Value Button End -->
                    </div>
                </div>

                <div class="col-xl-6">
                    <!-- Core Value Counter List Start -->
                    <div class="core-value-counter-list-metal wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Core Value Counter Item Start -->
                        <div class="core-value-counter-item-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-core-value-1-metal.svg') }}" alt="">
                            </div>
                            <div class="core-value-counter-item-content">
                                <h3><span class="counter">50</span>+</h3>
                                <p>Acre of Certified Farmland</p>
                            </div>
                        </div>
                        <!-- Core Value Counter Item End -->
                         
                        <!-- Core Value Counter Item Start -->
                        <div class="core-value-counter-item-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-core-value-2-metal.svg') }}" alt="">
                            </div>
                            <div class="core-value-counter-item-content">
                                <h3><span class="counter">30</span>+</h3>
                                <p>Fresh Organic Produce</p>
                            </div>
                        </div>
                        <!-- Core Value Counter Item End -->

                        <!-- Core Value Counter Item Start -->
                        <div class="core-value-counter-item-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-core-value-3-metal.svg') }}" alt="">
                            </div>
                            <div class="core-value-counter-item-content">
                                <h3><span class="counter">5000</span>+</h3>
                                <p> Family Served Annually</p>
                            </div>
                        </div>
                        <!-- Core Value Counter Item End -->

                        <!-- Core Value Counter Item Start -->
                        <div class="core-value-counter-item-metal">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-core-value-4-metal.svg') }}" alt="">
                            </div>
                            <div class="core-value-counter-item-content">
                                <h3><span class="counter">100</span>%</h3>
                                <p>Sustainable Farm Practice</p>
                            </div>
                        </div>
                        <!-- Core Value Counter Item End -->
                    </div>
                    <!-- Core Value Counter List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Core Value Section End -->

    <!-- Core Value CTA Section Start -->
    <div class="core-value-cta-section-metal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="core-value-cta-box-metal">
                        <!-- Core Value CTA Content Start -->
                        <div class="core-value-cta-content-metal">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Experience the freshness of pure organic farming</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Discover the true taste of nature with produce grown using pure, chemical-free methods. Every crop is nurtured with care, harvested at peak freshness,</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Core Value CTA Footer Start -->
                            <div class="core-value-cta-footer-metal">
                                <!-- Satisfy Client Images Start -->
                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-3.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image add-more">
                                        <h3><span>5</span>K+</h3>
                                    </div>
                                </div>
                                <!-- Satisfy Client Images End -->

                                <div class="core-value-cta-footer-content-metal">
                                    <p>Trusted by <span>5000+ Happy Farmers</span></p>
                                </div>
                            </div>
                            <!-- Core Value CTA Footer End -->
                        </div>
                        <!-- Core Value CTA Content End -->

                        <!-- Core Value CTA Image Start -->
                        <div class="core-value-cta-image-metal">
                            <img src="{{ asset('images/core-value-cta-box-image-metal.png') }}" alt="">
                        </div>
                        <!-- Core Value CTA Image End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Core Value CTA Section End -->

    <!-- Our Product Section Start -->
    <div class="our-products">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Products</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Discover pure, natural harvests straight from our fields</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product-image-1.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <span class="product-rating-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h2><a href="{{ route('product-details') }}">Organic Vegetables</a></h2>
                                <p>From $30.00</p>                                                    
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details') }}" class="btn-default">View Products</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product-image-2.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <span class="product-rating-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h2><a href="{{ route('product-details') }}">Seasonal Fruits</a></h2>
                                <p>From $30.00</p>                                                    
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details') }}" class="btn-default">View Products</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product-image-3.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <span class="product-rating-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h2><a href="{{ route('product-details') }}">Organic Grains & Pulses</a></h2>
                                <p>From $30.00</p>                                                    
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details') }}" class="btn-default">View Products</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product-image-4.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <span class="product-rating-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <h2><a href="{{ route('product-details') }}">Herbal & Medicinal Plants</a></h2>
                                <p>From $30.00</p>                                                    
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details') }}" class="btn-default">View Products</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                        <p><span>free</span> Where Nature Meets Quality - <a href="{{ route('services') }}">Discover Our Organic Farming Services!</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Product Section End -->

    <!-- Our Team Section Start -->
    <div class="our-team-metal bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Expert Farmers</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Meet our dedicated team of expert farmers</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-metal wow fadeInUp">
                        <!-- Team Image Start -->
                        <div class="team-item-image-metal">
                            <a href="{{ route('team-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-1-metal.jpg') }}" alt="">
                                </figure>
                            </a>

                            <!-- Team Social List Start -->
                            <div class="team-social-list-metal">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Content Start -->
                        <div class="team-item-content-metal">
                            <h2><a href="{{ route('team-details') }}">Rajan Patel</a></h2>
                            <p>Head Organic Farmer</p>
                        </div>
                        <!-- Team Content End -->
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-metal wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Team Image Start -->
                        <div class="team-item-image-metal">
                            <a href="{{ route('team-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-2-metal.jpg') }}" alt="">
                                </figure>
                            </a>

                            <!-- Team Social List Start -->
                            <div class="team-social-list-metal">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Content Start -->
                        <div class="team-item-content-metal">
                            <h2><a href="{{ route('team-details') }}">Kailash Sharma</a></h2>
                            <p>Farm Operations Manager</p>
                        </div>
                        <!-- Team Content End -->
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-metal wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Team Image Start -->
                        <div class="team-item-image-metal">
                            <a href="{{ route('team-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-3-metal.jpg') }}" alt="">
                                </figure>
                            </a>

                            <!-- Team Social List Start -->
                            <div class="team-social-list-metal">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Content Start -->
                        <div class="team-item-content-metal">
                            <h2><a href="{{ route('team-details') }}">Suresh Kumar</a></h2>
                            <p>Sustainable Farming Expert</p>
                        </div>
                        <!-- Team Content End -->
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-metal wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Team Image Start -->
                        <div class="team-item-image-metal">
                            <a href="{{ route('team-details') }}" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-4-metal.jpg') }}" alt="">
                                </figure>
                            </a>

                            <!-- Team Social List Start -->
                            <div class="team-social-list-metal">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Content Start -->
                        <div class="team-item-content-metal">
                            <h2><a href="{{ route('team-details') }}">Harish Chauhan</a></h2>
                            <p>Harvest & Quality Supervisor</p>
                        </div>
                        <!-- Team Content End -->
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Satisfy Client Images Start -->
                        <div class="satisfy-client-images">
                            <div class="satisfy-client-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <img src="{{ asset('images/icon-phone-primary.svg') }}" alt="">
                            </div>
                        </div>
                        <!-- Satisfy Client Images End -->    
                        <p>Meet the expert farmers behind our pure organic harvests. <a href="{{ route('team') }}">View All Farmers</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Team Section End -->

    <!-- Our Promise Section Start -->
    <div class="our-promise-metal">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Sustainability Commitment</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Our promise for sustainable organic farming</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>We are committed to nurturing the land with responsible, eco-friendly farming practices that protect nature and promote long-term soil health.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('contact') }}" class="btn-default">Contact Us</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Our Promise Image Start -->
                    <div class="our-promise-image-metal">
                        <figure class="image-anime">
                            <img src="{{ asset('images/our-promise-image-metal.jpg') }}" alt="">
                        </figure>
                    </div>
                    <!-- Our Promise Image End -->
                </div>

                <div class="col-lg-12">
                    <!-- Our Promise Body Start -->
                    <div class="our-promise-body-metal">
                        <!-- Our Promise Impact Box Start -->
                        <div class="our-promise-impact-box-metal">
                            <div class="our-promise-content-metal">
                                <h3>Organic Farming Impact Worldwide</h3>
                                <p>Organic Farming Impact Worldwide communities, protecting natural resources, and promoting healthier living across the globe.</p>
                            </div>
                            <div class="our-promise-impact-box-image-metal">
                                <figure>
                                    <img src="{{ asset('images/world-map-image.png') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <!-- Our Promise Impact Box End -->

                        <!-- Our Promise Counter List Start -->
                        <div class="our-promise-counter-list-metal">
                            <!-- Our Promise Counter Item Start -->
                            <div class="our-promise-counter-item-metal">
                                <h2><span class="counter">50</span>+</h2>
                                <p>Acres of Certified Organic Farmland</p>
                            </div>
                            <!-- Our Promise Counter Item End -->

                            <!-- Our Promise Counter Item Start -->
                            <div class="our-promise-counter-item-metal">
                                <h2><span class="counter">30</span>+</h2>
                                <p>Produce Types Grown Seasonally</p>
                            </div>
                            <!-- Our Promise Counter Item End -->

                            <!-- Our Promise Counter Item Start -->
                            <div class="our-promise-counter-item-metal">
                                <h2><span class="counter">10</span>+</h2>
                                <p>Years of Organic Farming Excellence</p>
                            </div>
                            <!-- Our Promise Counter Item End -->
                        </div>
                        <!-- Our Promise Counter List End -->
                    </div>
                    <!-- Our Promise Body End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Promise Section End -->

    <!-- Our Testimonials Section Start -->
    <div class="our-testimonials-metal bg-section dark-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our Testimonials</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">What our customers say about our farm</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Our customers love the freshness quality and purity of our organic produce from farm-to-home deliveries to sustainably grown seasonal crops.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('testimonials') }}" class="btn-default btn-highlighted">View All Customer Review</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-5">
                    <!-- Testimonial Image Box Start -->
                    <div class="testimonial-image-box-metal">
                        <!-- Testimonial Image Start -->
                        <div class="testimonial-image-metal">
                            <figure class="image-anime">
                                <img src="{{ asset('images/our-testimonial-image-metal.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Testimonial Image End -->

                        <!-- Testimonial CTA Box Start -->
                        <div class="testimonial-cta-box-metal">
                            <div class="testimonial-review-content-metal">
                                <h2><span class="counter">5</span>K+</h2>
                                <p>Customer Review</p>
                            </div>

                            <div class="testimonial-rating-content-metal">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </li>
                                    <li>Average Rating 4.8/5</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Testimonial CTA Box End -->
                    </div>
                    <!-- Testimonial Image Box End -->
                </div>

                <div class="col-xl-7">
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider-metal">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item-metal">
                                        <!-- Testimonial Item Body Start -->
                                        <div class="testimonial-item-body-metal">
                                            <div class="testimonial-company-logo-metal">
                                                <img src="{{ asset('images/testimonial-company-logo-metal.svg') }}" alt="">
                                            </div>
                                            <div class="testimonial-item-rating-metal">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-item-content-metal">
                                                <p>"The freshness and taste are unmatched organic and safe for my family. Every vegetable and fruit tastes like it just from the farm I trust their produce Clean, natural, and delivered fresh.!"</p>
                                            </div>
                                        </div>
                                        <!-- Testimonial Item Body End -->

                                        <!-- Testimonial Item Footer Start -->
                                        <div class="testimonial-item-footer-metal">
                                            <div class="testimonial-author-content-metal">
                                                <h3>Kailash Sharma</h3>
                                                <p>Farm Operations Manager</p>
                                            </div>
                                            <div class="testimonial-item-quote-metal">
                                                <img src="{{ asset('images/testimonial-quote-metal.svg') }}" alt="">
                                            </div>                                            
                                        </div>
                                        <!-- Testimonial Item Footer End -->
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item-metal">
                                        <!-- Testimonial Item Body Start -->
                                        <div class="testimonial-item-body-metal">
                                            <div class="testimonial-company-logo-metal">
                                                <img src="{{ asset('images/testimonial-company-logo-metal.svg') }}" alt="">
                                            </div>
                                            <div class="testimonial-item-rating-metal">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-item-content-metal">
                                                <p>"The freshness and taste are unmatched organic and safe for my family. Every vegetable and fruit tastes like it just from the farm I trust their produce Clean, natural, and delivered fresh.!"</p>
                                            </div>
                                        </div>
                                        <!-- Testimonial Item Body End -->

                                        <!-- Testimonial Item Footer Start -->
                                        <div class="testimonial-item-footer-metal">
                                            <div class="testimonial-author-content-metal">
                                                <h3>Kailash verma</h3>
                                                <p>Farm Operations Manager</p>
                                            </div>
                                            <div class="testimonial-item-quote-metal">
                                                <img src="{{ asset('images/testimonial-quote-metal.svg') }}" alt="">
                                            </div>                                            
                                        </div>
                                        <!-- Testimonial Item Footer End -->
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item-metal">
                                        <!-- Testimonial Item Body Start -->
                                        <div class="testimonial-item-body-metal">
                                            <div class="testimonial-company-logo-metal">
                                                <img src="{{ asset('images/testimonial-company-logo-metal.svg') }}" alt="">
                                            </div>
                                            <div class="testimonial-item-rating-metal">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-item-content-metal">
                                                <p>"The freshness and taste are unmatched organic and safe for my family. Every vegetable and fruit tastes like it just from the farm I trust their produce Clean, natural, and delivered fresh.!"</p>
                                            </div>
                                        </div>
                                        <!-- Testimonial Item Body End -->

                                        <!-- Testimonial Item Footer Start -->
                                        <div class="testimonial-item-footer-metal">
                                            <div class="testimonial-author-content-metal">
                                                <h3>Kathryn Murphy</h3>
                                                <p>Farm Operations Manager</p>
                                            </div>
                                            <div class="testimonial-item-quote-metal">
                                                <img src="{{ asset('images/testimonial-quote-metal.svg') }}" alt="">
                                            </div>                                            
                                        </div>
                                        <!-- Testimonial Item Footer End -->
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Slider End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Testimonials Section End -->

    <!-- Our Blog Section Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Latest Blogs</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Dive into educational, inspiring, and farm fresh content</h2>
                    </div>
                    <!-- Section Title End -->
                </div>                
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp">                        
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-1.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->

                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">The True Benefits of Choosing Organic for Your Family</a></h2>
                                <p>Explore why chemical free produce supports better health, richer nutrition, and a safer environment.</p>
                            </div>
                            <!-- Post Item Content End -->                                                         
                        </div>
                        <!-- Post Item Body End -->
                         
                        <!-- Post Item Readmore Button Start-->
                        <div class="post-item-btn">
                            <a href="{{ route('blog-details') }}" class="readmore-btn">read more</a>
                        </div>
                        <!-- Post Item Readmore Button End-->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.2s">                        
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-2.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->

                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">Bringing Traditional Farming Wisdom Into Modern Agriculture</a></h2>
                                <p>Discover how ancient knowledge and modern blend to create a more efficient and sustainable farm system.</p>
                            </div>
                            <!-- Post Item Content End -->                                                         
                        </div>
                        <!-- Post Item Body End -->
                         
                        <!-- Post Item Readmore Button Start-->
                        <div class="post-item-btn">
                            <a href="{{ route('blog-details') }}" class="readmore-btn">read more</a>
                        </div>
                        <!-- Post Item Readmore Button End-->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.4s">                        
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-3.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->

                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">Natural Pest Control That Protects Both Crops and Nature</a></h2>
                                <p>Find out how we manage pests the organic way without chemicals, while keeping the ecosystem balanced.</p>
                            </div>
                            <!-- Post Item Content End -->                                                         
                        </div>
                        <!-- Post Item Body End -->
                         
                        <!-- Post Item Readmore Button Start-->
                        <div class="post-item-btn">
                            <a href="{{ route('blog-details') }}" class="readmore-btn">read more</a>
                        </div>
                        <!-- Post Item Readmore Button End-->
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->

    <!-- Main Footer Start -->
@endsection

@section('footer')
<footer class="main-footer-metal bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Footer Header Start -->
                    <div class="footer-header-metal">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Let's start your journey toward healthier organic living</h2>
                        </div>
                        <!-- Section Title End -->
                        
                        <!-- Contact Us Circle Start -->
                        <div class="contact-us-circle">
                            <a href="{{ route('contact') }}">
                                <img src="{{ asset('images/contact-us-circle.svg') }}" alt="">
                            </a>
                        </div>
                        <!-- Contact Us Circle End -->
                    </div>
                    <!-- Footer Header End -->
                </div>

                <div class="col-xl-4">
                    <!-- About Footer Start -->
                    <div class="about-footer-metal">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo-metal">
                            <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="" style="max-height: 80px; width: auto;">
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content-metal">
                            <p>At Green Harvest Organic Farms, we are committed to cultivating fresh, chemical-free, and sustainably grown produce.</p>
                        </div>
                        <!-- About Footer Content End -->                                            
                    </div>
                    <!-- About Footer End -->
                </div>

                <div class="col-xl-8">
                    <!-- Footer Links Box Start -->
                    <div class="footer-links-box-metal">
                        <!-- Footer Links Start -->
                        <div class="footer-links-metal">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="{{ route('home-v4') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('services') }}">Our Services</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                <li><a href="{{ route('team') }}">Our Farmers</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links-metal">
                            <h3>Our Services</h3>
                            <ul>
                                <li><a href="{{ route('service-details') }}">Organic Vegetable Farming</a></li>
                                <li><a href="{{ route('service-details') }}">Fresh Fruits Supply</a></li>
                                <li><a href="{{ route('service-details') }}">Dairy & Farm Products</a></li>
                                <li><a href="{{ route('service-details') }}">Farm-to-Home Delivery</a></li>
                                <li><a href="{{ route('service-details') }}">Seasonal Crop Cultivation</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->
                        
                        <!-- Footer Newsletter Form Start -->
                        <div class="footer-newsletter-form-metal footer-links-metal">
                            <h3>Newsletter Subscription</h3>                            
                            <form id="newslettersForm" action="#" method="POST">
    @csrf
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control" id="mail" placeholder="Email Address*" required>
                                    <button type="submit" class="newsletter-btn"><i class="fa-regular fa-paper-plane"></i></button>
                                </div>
                            </form>
                            <p>** Stay informed with the latest harvest news, seasonal product launches</p>
                        </div>
                        <!-- Footer Newsletter Form End -->
                    </div>
                </div>                
            </div>
        </div>

        <!-- Footer Copyright Start -->
        <div class="footer-copyright-metal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright-content">
                            <!-- Footer Copyright Text Start -->
                            <div class="footer-copyright-text-metal">
                                <p>Copyright © 2025 All Rights Reserved.</p>
                            </div>
                            <!-- Footer Copyright Text End -->
                            
                            <!-- Footer Social Link Start -->
                            <div class="footer-social-links-metal">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- Footer Copyright End -->
    </footer>
@endsection
