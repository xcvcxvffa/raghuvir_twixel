@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero bg-section dark-section parallaxie">
        <!-- Hero Box Start -->
        <div class="hero-box">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-6">
                        <!-- Hero Content Start -->
                        <div class="hero-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Healthy Farms, Healthy Lives</h3>
                                <h1 class="text-anime-style-3" data-cursor="-opaque">Discover the Power of Organic Farming, Grown with Love & liability</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Experience the true essence of organic farming, where every crop is grown with care, respect for nature, and mindful sustainability.</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Visit Our Farm</a>
                                <a href="{{ route('services') }}" class="btn-default btn-border">View Our Services</a>
                            </div>
                            <!-- Hero Button End -->

                            <!-- Hero Content List Start -->
                            <div class="hero-content-list wow fadeInUp" data-wow-delay="0.6s">
                                <ul>
                                    <li>Responsible Farming for a Greener Future</li>
                                    <li>Farm-Fresh Quality You Can Trust Every Day</li>
                                </ul>
                            </div>
                            <!-- Hero Content List End -->
                        </div>
                        <!-- Hero Content End -->
                    </div>

                    <div class="col-xl-6">
                        <!-- Hero Image Start -->
                        <div class="hero-image">
                            <figure>
                                <img src="{{ asset('images/hero-image.png') }}" alt="">
                            </figure>

                            <div class="contact-us-circle">
                                <a href="{{ route('contact') }}">
                                    <img src="{{ asset('images/contact-us-circle.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Hero Image End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Box End -->

        <!-- Hero Company Slider Box Start -->
        <div class="hero-company-slider-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Hero Company Slider Body Start -->
                        <div class="hero-company-slider-body">
                            <!-- Hero Company Slider Content Start -->
                            <div class="hero-company-slider-content">
                                <h3>Trusted By More Than <span class="counter">100</span>+ Companies</h3>
                            </div>
                            <!-- Hero Company Slider Content End -->

                            <!-- Hero Company Slider Start -->
                            <div class="hero-company-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-1.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Company Logo End -->

                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-2.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Company Logo End -->

                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-3.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Company Logo End -->
                                        
                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-4.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Company Logo End -->
                                        
                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-5.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Company Logo End -->

                                        <!-- Company Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="company-logo">
                                                <img src="{{ asset('images/company-logo-white-1.svg') }}" alt="">
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
    </div>
    <!-- Hero Section End -->

    <!-- About Us Section Start -->
    <div class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <!-- About Us Image Box Start -->
                    <div class="about-us-images">
                        <div class="about-us-image-1">
                            <figure class="image-anime">
                                <img src="{{ asset('images/about-us-image-1.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- About Us Image 1 End -->
                    
                        <!-- About Us Image 2 Start -->
                        <div class="about-us-image-2">
                            <figure class="image-anime">
                                <img src="{{ asset('images/about-us-image-2.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- About Us Image 2 End -->
                    </div>
                    <!-- About Us Image Box End -->
                </div>

                <div class="col-xl-7">
                    <!-- About Us Content Start -->
                    <div class="about-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">About Our Farm</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">From soil to harvest, we believe in clean and conscious farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">From soil preparation to the final harvest, we use sustainable, chemical-free methods that protect biodiversity, enrich the soil, and preserve natural resources.</p>
                            <p class="wow fadeInUp" data-wow-delay="0.4s">We are committed to farming in a way that respects both the land and the people who depend on it. Every crop we grow reflects our dedication to clean, conscious agriculture and our belief in providing fresh, honest food that supports healthier living and a more sustainable future.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us Item List Start -->
                        <div class="about-us-item-list wow fadeInUp" data-wow-delay="0.6s">
                            <!-- About Us Item Start -->
                            <div class="about-us-item">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-item-1.svg') }}" alt="">
                                </div>
                                <div class="about-us-item-content">
                                    <h3>Sustainable Farming Practices</h3>
                                </div>
                            </div>
                            <!-- About Us Item End -->

                            <!-- About Us Item Start -->
                            <div class="about-us-item">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-item-2.svg') }}" alt="">
                                </div>
                                <div class="about-us-item-content">
                                    <h3>Pure, Chemical Free Produce</h3>
                                </div>
                            </div>
                            <!-- About Us Item End -->

                            <!-- About Us Item Start -->
                            <div class="about-us-item">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-item-3.svg') }}" alt="">
                                </div>
                                <div class="about-us-item-content">
                                    <h3>Passion for Honest Agriculture</h3>
                                </div>
                            </div>
                            <!-- About Us Item End -->
                        </div>
                        <!-- About Us Item List End -->

                        <!-- About Us Button Start -->
                        <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                            <a href="{{ route('about') }}" class="btn-default">More About Us</a>
                        </div>
                        <!-- About Us Button End -->
                    </div>
                    <!-- About Us Content End -->
                </div>

                <div class="col-lg-12">
                    <!-- About Us Footer Start -->
                    <div class="about-us-footer">
                        <!-- About Us Footer List Start -->
                        <div class="about-us-footer-list wow fadeInUp" data-wow-delay="1s">
                            <ul>
                                <li>Natural Vegetables</li>
                                <li>Fresh Organic Food</li>
                                <li>Chemical-Free Farming</li>
                                <li>Sustainable Agriculture</li>
                            </ul>
                        </div>
                        <!-- About Us Footer List End -->

                        <!-- Section Footer Text Start -->
                        <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="1.2s">
                            <!-- Satisfy Client Images Start -->
                            <div class="satisfy-client-images">
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image add-more">
                                    <i><img src="{{ asset('images/icon-phone-primary.svg') }}" alt=""></i>
                                </div>
                            </div>
                            <!-- Satisfy Client Images End -->    
                            <p>Let's make something great work together. <a href="{{ route('contact') }}">Get Free Quote</a></p>                         
                        </div>
                        <!-- Section Footer Text End -->
                    </div>
                    <!-- About Us Footer End --> 
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services bg-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our Services</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Healthy, natural solutions for fresh produce and farming</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>We focus on delivering clean, naturally grown crops along with services that encourage sustainable agricultural practices.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('services') }}" class="btn-default">View All Services</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row service-item-list">
                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="{{ asset('images/icon-services-1.svg') }}" alt="">
                        </div>
                        <div class="services-item-body">
                            <div class="services-item-content">
                                <h2><a href="{{ route('service-details') }}">Sustainable Farming Consultation</a></h2>
                                <p>We focus on delivering clean, naturally grown crops along with services that encourage</p>
                            </div>
                            <div class="services-item-btn">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item active wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="{{ asset('images/icon-services-2.svg') }}" alt="">
                        </div>
                        <div class="services-item-body">
                            <div class="services-item-content">
                                <h2><a href="{{ route('service-details') }}">Organic Fertilizer & Soil Care</a></h2>
                                <p>We focus on delivering clean, naturally grown crops along with services that encourage</p>
                            </div>
                            <div class="services-item-btn">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="{{ asset('images/icon-services-3.svg') }}" alt="">
                        </div>
                        <div class="services-item-body">
                            <div class="services-item-content">
                                <h2><a href="{{ route('service-details') }}">Organic Seasonal Produce Boxes</a></h2>
                                <p>We focus on delivering clean, naturally grown crops along with services that encourage</p>
                            </div>
                            <div class="services-item-btn">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="{{ asset('images/icon-services-4.svg') }}" alt="">
                        </div>
                        <div class="services-item-body">
                            <div class="services-item-content">
                                <h2><a href="{{ route('service-details') }}">Organic Dairy & Farm Products</a></h2>
                                <p>We focus on delivering clean, naturally grown crops along with services that encourage</p>
                            </div>
                            <div class="services-item-btn">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                        <p><span>Free</span>Where Nature Meets Quality - <a href="{{ route('contact') }}">Discover Our Organic Farming Services!</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- Why Choose Content Start -->
                    <div class="why-choose-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Why Choose Us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Committed to honest and clean sustainable farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We believe in delivering food that's grown with care, transparency, and respect for the environment. Every step we take is focused on bringing you fresh.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Why Choose Us Box Start -->
                        <div class="why-choose-us-box tab-content wow fadeInUp" data-wow-delay="0.4s" id="myTabContent">
                            <!-- Why Choose Nav start -->
                            <div class="why-choose-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab1" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-selected="true">Organic Farming</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="tab2" data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab" aria-selected="false">Fresh Produce</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab3" data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab" aria-selected="false">Delivery & Supply</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Why Choose Nav End -->
        
                            <!-- Why Choose Item Start -->
                            <div class="why-choose-item tab-pane fade" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                <!-- Why Choose Tab Content Start -->
                                <div class="why-choose-tab-content">
                                    <p>Organic farming is a natural approach to agriculture that avoids synthetic chemical and eco friendly practices. It nurtures healthy soil, supports biodiversity.</p>
                                    <!-- Why Choose Info Item List Start -->
                                    <div class="why-choose-info-item-list">
                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-1.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Natural Soil Enrichment</h3>
                                                <p>Organic farming enhances soil health using compost, crop rotation, and biological nutrients, ensuring long-term fertility without synthetic chemicals.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item End -->

                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-2.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Eco-Friendly Pest & Weed Control</h3>
                                                <p>Instead of harmful pesticides, organic methods use natural predators and plant-based solutions, protecting crops while maintaining biodiversity.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item  End -->
                                    </div>
                                    <!-- Why Choose Info Item List End -->
                                </div>
                                <!-- Why Choose Tab Content End -->
                            </div>
                            <!-- Why Choose Item End -->
        
                            <!-- Why Choose Item Start -->
                            <div class="why-choose-item tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                <!-- Why Choose Tab Content Start -->
                                <div class="why-choose-tab-content">
                                    <p>Organic farming is a natural approach to agriculture that avoids synthetic chemical and eco friendly practices. It nurtures healthy soil, supports biodiversity.</p>
                                    <!-- Why Choose Info Item List Start -->
                                    <div class="why-choose-info-item-list">
                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-1.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Natural Soil Enrichment</h3>
                                                <p>Organic farming enhances soil health using compost, crop rotation, and biological nutrients, ensuring long-term fertility without synthetic chemicals.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item End -->

                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-2.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Eco-Friendly Pest & Weed Control</h3>
                                                <p>Instead of harmful pesticides, organic methods use natural predators and plant-based solutions, protecting crops while maintaining biodiversity.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item  End -->
                                    </div>
                                    <!-- Why Choose Info Item List End -->
                                </div>
                                <!-- Why Choose Tab Content End -->
                            </div>
                            <!-- Why Choose Item End -->

                            <!-- Why Choose Item Start -->
                            <div class="why-choose-item tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3">
                                <!-- Why Choose Tab Content Start -->
                                <div class="why-choose-tab-content">
                                    <p>Organic farming is a natural approach to agriculture that avoids synthetic chemical and eco friendly practices. It nurtures healthy soil, supports biodiversity.</p>
                                    <!-- Why Choose Info Item List Start -->
                                    <div class="why-choose-info-item-list">
                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-1.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Natural Soil Enrichment</h3>
                                                <p>Organic farming enhances soil health using compost, crop rotation, and biological nutrients, ensuring long-term fertility without synthetic chemicals.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item End -->

                                        <!-- Why Choose Info Item Start -->
                                        <div class="why-choose-info-item">
                                            <div class="icon-box">
                                                <img src="{{ asset('images/icon-why-choose-info-item-2.svg') }}" alt="">
                                            </div>
                                            <div class="why-choose-info-item-content">
                                                <h3>Eco-Friendly Pest & Weed Control</h3>
                                                <p>Instead of harmful pesticides, organic methods use natural predators and plant-based solutions, protecting crops while maintaining biodiversity.</p>
                                            </div>
                                        </div>
                                        <!-- Why Choose Info Item  End -->
                                    </div>
                                    <!-- Why Choose Info Item List End -->
                                </div>
                                <!-- Why Choose Tab Content End -->
                            </div>
                            <!-- Why Choose Item End -->
                        </div>
                        <!-- Why Choose Us Box End -->
                    </div>
                    <!-- Why Choose Content End -->
                </div>

                <div class="col-xl-6">
                    <!-- Why Choose Image Box Start -->
                    <div class="why-choose-image-box">
                        <!-- Why Choose Image Box 1 Start -->
                        <div class="why-choose-image-box-1">
                            <!-- Why Choose Image 1 Start -->
                            <div class="why-choose-image">
                                <figure>
                                    <img src="{{ asset('images/why-choose-image-1.png') }}" alt="">
                                </figure>
                            </div>
                            <!-- Why Choose Image 1 End -->
                        </div>
                        <!-- Why Choose Image Box 1 End -->

                        <!-- Why Choose Image Box 2 Start -->
                        <div class="why-choose-image-box-2">
                            <!-- Why Choose Info Box Start -->
                            <div class="why-choose-info-box">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-why-choose-us-info-box.svg') }}?v={{ filemtime(public_path('images/icon-why-choose-us-info-box.svg')) }}" alt="">
                                </div>
                                <div class="why-choose-info-content">
                                    <h3>Transparent & Traceable Produce</h3>
                                </div>
                            </div>
                            <!-- Why Choose Info Box End -->

                            <!-- Why Choose Image 2 Start -->
                            <div class="why-choose-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/why-choose-image-2.jpg') }}?v={{ filemtime(public_path('images/why-choose-image-2.jpg')) }}" alt="Pure Golden Wheat Grains">
                                </figure>
                            </div>
                            <!-- Why Choose Image 2 End -->
                             
                            <!-- Contact Us Circle Start -->
                            <div class="contact-us-circle">
                                <a href="{{ route('contact') }}">
                                    <img src="{{ asset('images/contact-us-circle.svg') }}" alt="">
                                </a>
                            </div>
                            <!-- Contact Us Circle End -->
                        </div>
                        <!-- Why Choose Image Box 2 End -->
                    </div>
                    <!-- Why Choose Image Box End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.6s">
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
    <!-- Why Choose Us Section End -->

    <!-- Intro Video Section Start -->
    <div class="intro-video bg-section dark-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-md-9">
                    <!-- Intro Video Content Start -->
                    <div class="intro-video-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Watch Our Video</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Follow the journey of pure farming where nature, technique, and passion come together</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- Intro Video Content End -->
                </div>

                <div class="col-xl-4 col-md-3">
                    <!-- Watch Video Circle Start -->
                    <div class="watch-video-circle">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                            <img src="{{ asset('images/watch-video-circle.svg') }}" alt="">
                        </a> 
                    </div>     
                    <!-- Watch Video Circle End -->
                </div>

                <div class="col-lg-12">
                    <!-- Intro Video Item List Start -->
                    <div class="intro-video-item-list wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Intro Video Item Start -->
                        <div class="intro-video-item">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-intro-video-item-1.svg') }}" alt="">
                            </div>
                            <div class="intro-video-item-content">
                                <h3>Our Sustainable Farming in Action</h3>
                                <p>Get a real look at how we nurture crops using eco-friendly methods that protect the soil.</p>
                            </div>
                        </div>
                        <!-- Intro Video Item End -->

                        <!-- Intro Counter Item Start -->
                        <div class="intro-video-item">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-intro-video-item-2.svg') }}" alt="">
                            </div>
                            <div class="intro-video-item-content">
                                <h3>Experience the Passion of Our Work</h3>
                                <p>Watch the dedication, love, and hands on effort that goes into every step of our organic journey.</p>
                            </div>
                        </div>
                        <!-- Intro Counter Item End -->

                        <!-- Intro Counter Item Start -->
                        <div class="intro-video-item">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-intro-video-item-3.svg') }}" alt="">
                            </div>
                            <div class="intro-video-item-content">
                                <h3>What Make Our Produce Truly Pure</h3>
                                <p>From planting to harvesting, explore the processes that ensure our food is clean, and natural.</p>
                            </div>
                        </div>
                        <!-- Intro Counter Item End -->
                    </div>
                    <!-- Intro Video Item List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Intro Video Section End -->

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

    <!-- How It Work Section Start -->
    <div class="how-it-work bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">How It Works</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">See how we bring fresh, organic goodness straight to you</h2>
                    </div>
                    <!-- Section Title End -->
                </div>                
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- How Work Step Box Start -->
                    <div class="how-work-step-box wow fadeInUp" data-wow-delay="0.2s">
                        <!-- How Work Item Start -->
                        <div class="how-work-item">
                            <div class="how-work-step-no">
                                <h3>01</h3>
                            </div>
                            <div class="how-work-item-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/how-it-work-image-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="how-work-item-body">
                                <div class="how-work-item-content">
                                    <h3>Soil Assessment & Planning</h3>
                                    <p>We analyze the soil's nutrients, texture, and structure to understand its strengths</p>
                                </div>
                                <div class="how-work-item-list">
                                    <ul>
                                        <li>Comprehensive Soil Testing & Analysis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- How Work Item End -->

                        <!-- How Work Item Start -->
                        <div class="how-work-item">
                            <div class="how-work-step-no">
                                <h3>02</h3>
                            </div>
                            <div class="how-work-item-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/how-it-work-image-2.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="how-work-item-body">
                                <div class="how-work-item-content">
                                    <h3>Seed Selection & Planting</h3>
                                    <p>High-quality organic seeds are selected and planted using eco-friendly farming methods</p>
                                </div>
                                <div class="how-work-item-list">
                                    <ul>
                                        <li>Comprehensive Soil Testing & Analysis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- How Work Item End -->

                        <!-- How Work Item Start -->
                        <div class="how-work-item">
                            <div class="how-work-step-no">
                                <h3>03</h3>
                            </div>
                            <div class="how-work-item-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/how-it-work-image-3.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="how-work-item-body">
                                <div class="how-work-item-content">
                                    <h3>Natural Growth & Care</h3>
                                    <p>Crops are nurtured with organic fertilizers and along water-efficient irrigation systems</p>
                                </div>
                                <div class="how-work-item-list">
                                    <ul>
                                        <li>Comprehensive Soil Testing & Analysis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- How Work Item End -->

                        <!-- How Work Item Start -->
                        <div class="how-work-item">
                            <div class="how-work-step-no">
                                <h3>04</h3>
                            </div>
                            <div class="how-work-item-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/how-it-work-image-4.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="how-work-item-body">
                                <div class="how-work-item-content">
                                    <h3>Harvesting & Fresh Delivery</h3>
                                    <p>They are harvested responsibly and delivered straight from our fields to your doorstep.</p>
                                </div>
                                <div class="how-work-item-list">
                                    <ul>
                                        <li>Comprehensive Soil Testing & Analysis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- How Work Item End -->
                    </div>
                    <!-- How Work Step Box End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Satisfy Client Images Start -->
                        <div class="satisfy-client-images">
                            <div class="satisfy-client-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <i><img src="{{ asset('images/icon-phone-primary.svg') }}" alt=""></i>
                            </div>
                        </div>
                        <!-- Satisfy Client Images End -->    
                        <p>Let's make something great work together. <a href="{{ route('contact') }}">Get Free Quote</a></p>                         
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work Section End -->

    <!-- Our Team Section Start -->
    <div class="our-team">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Meet Our Farmers</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Discover the team that makes organic farming possible</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Their passion, knowledge, and hands-on care ensure that every crop is grown sustainably, harvested responsibly, and delivered fresh to your table.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('team') }}" class="btn-default">View All Farmers</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-item wow fadeInUp">
                        <!-- team Image Start -->
                        <div class="team-item-image">
                            <a href="{{ route('team-details') }}" class="image-anime" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/team-1.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->
                
                        <!-- Team Body Start -->
                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('team-details') }}">Jacob Jones</a></h2>
                                <p>Agronomist</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- team Image Start -->
                        <div class="team-item-image">
                            <a href="{{ route('team-details') }}" class="image-anime" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/team-2.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->
                
                        <!-- Team Body Start -->
                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('team-details') }}">Ralph Edwards</a></h2>
                                <p>Farm Manager</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
                        <!-- team Image Start -->
                        <div class="team-item-image">
                            <a href="{{ route('team-details') }}" class="image-anime" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/team-3.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->
                
                        <!-- Team Body Start -->
                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('team-details') }}">Guy Hawkins</a></h2>
                                <p>Sustainability Coordinator</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.6s">
                        <!-- team Image Start -->
                        <div class="team-item-image">
                            <a href="{{ route('team-details') }}" class="image-anime" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/team-4.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- team Image End -->
                
                        <!-- Team Body Start -->
                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('team-details') }}">Arlene McCoy</a></h2>
                                <p>Head Farmer</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
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
                                <i><img src="{{ asset('images/icon-phone-primary.svg') }}" alt=""></i>
                            </div>
                        </div>
                        <!-- Satisfy Client Images End -->    
                        <p>Let's make something great work together. <a href="{{ route('contact') }}">Get Free Quote</a></p>                         
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Team Section End -->

    <!-- Our Pricing Section Start -->
    <div class="our-pricing bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Pricing Plans</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Enjoy consistent freshness with plans tailored to your needs</h2>
                    </div>
                    <!-- Section Title End -->
                </div>                
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item wow fadeInUp">
                        <div class="pricing-item-header">
                            <div class="pricing-item-header-box">
                                <div class="pricing-item-content">
                                    <h3>Basic Farm Box</h3>
                                    <p>Perfect for small families who want fresh produce every week.</p>
                                </div>
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-1.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="pricing-item-price">
                                <h2>$99.00<sub>/Monthly</sub></h2>
                            </div>                            
                        </div>
                        <div class="pricing-item-list">
                            <h3>What's included:</h3>
                            <ul>
                                <li>Free farm tour pass (once a year)</li>
                                <li>Special festive produce add every month</li>
                                <li>Weekly delivery of fruit, vegetable & grain</li>
                            </ul>
                        </div>
                        <div class="pricing-item-btn">
                            <a href="{{ route('contact') }}" class="btn-default btn-border">Get Started With Plan</a>
                        </div>
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item highlighted-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="pricing-item-header">
                            <div class="pricing-item-header-box">
                                <div class="pricing-item-content">
                                    <h3>Standard Harvest Box</h3>
                                    <p>Perfect for small families who want fresh produce every week.</p>
                                </div>
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-2.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="pricing-item-price">
                                <h2>$199.00<sub>/Monthly</sub></h2>
                            </div>                            
                        </div>
                        <div class="pricing-item-list">
                            <h3>What's included:</h3>
                            <ul>
                                <li>Free farm tour pass (once a year)</li>
                                <li>Special festive produce add every month</li>
                                <li>Weekly delivery of fruit, vegetable & grain</li>
                            </ul>
                        </div>
                        <div class="pricing-item-btn">
                            <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get Started With Plan</a>
                        </div>
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="pricing-item-header ">
                            <div class="pricing-item-header-box">
                                <div class="pricing-item-content">
                                    <h3>Premium Organic Box</h3>
                                    <p>Perfect for small families who want fresh produce every week.</p>
                                </div>
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-3.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="pricing-item-price">
                                <h2>$599.00<sub>/Monthly</sub></h2>
                            </div>                            
                        </div>
                        <div class="pricing-item-list">
                            <h3>What's included:</h3>
                            <ul>
                                <li>Free farm tour pass (once a year)</li>
                                <li>Special festive produce add every month</li>
                                <li>Weekly delivery of fruit, vegetable & grain</li>
                            </ul>
                        </div>
                        <div class="pricing-item-btn">
                            <a href="{{ route('contact') }}" class="btn-default btn-border">Get Started With Plan</a>
                        </div>
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Pricing Benifit List Start -->
                    <div class="pricing-benefit-list wow fadeInUp" data-wow-delay="0.6s">
                        <ul>
                            <li><img src="{{ asset('images/icon-pricing-benefit-1.svg') }}" alt="">Get 30 day free trial</li>
                            <li><img src="{{ asset('images/icon-pricing-benefit-2.svg') }}" alt="">No any hidden fee pay</li>
                            <li><img src="{{ asset('images/icon-pricing-benefit-3.svg') }}" alt="">You can cancel anytime </li>
                        </ul>
                    </div>
                    <!-- Pricing Benifit List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Pricing Section End -->

    <!-- Our Faqs Start -->
    <div class="our-faqs">
        <div class="container">
            <div class="row">                
                <div class="col-xl-7">
                    <!-- Faqs Content Start -->
                    <div class="faqs-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Frequently Asked Questions</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Simple, clear answers to help you understand our work better</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- FAQ Accordion Start -->
                        <div class="faq-accordion" id="accordion">
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Q1. What makes your farm products organic?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" role="region" aria-labelledby="heading1" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Q2. Do you use any chemical additives in your produce?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" role="region" aria-labelledby="heading2" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        Q3. How do you maintain freshness during delivery?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" role="region" aria-labelledby="heading3" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Q4. Do you offer seasonal produce boxes?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" role="region" aria-labelledby="heading4" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        Q5. How do you manage pests without chemicals?
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" role="region" aria-labelledby="heading5" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                        </div>
                        <!-- FAQ Accordion End -->
                    </div>
                    <!-- Faqs Content End -->
                </div>

                <div class="col-xl-5">
                    <!-- Faqs Image Start -->
                    <div class="faqs-image-box">
                        <!-- Faqs Image Start -->
                        <div class="faqs-image">
                            <figure class="image-anime">
                                <img src="{{ asset('images/faqs-image.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Faqs Image End -->

                        <!-- Faqs CTA Box Start -->
                        <div class="faq-cta-box">
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
                                <div class="satisfy-client-image add-more">
                                    <h3><span class="counter">4</span>K+</h3>
                                </div>
                            </div>
                            <!-- Satisfy Client Images End -->

                            <div class="faqs-cta-content">
                                <h3>Satisfied Customers Across Regions</h3>
                            </div>
                        </div>
                        <!-- Faqs CTA Box End -->
                    </div>
                    <!-- Faqs Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Faqs End -->

    <!-- Our Testimonials Section Start -->
    <div class="our-testimonials bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Testimonials</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Genuine testimonials reflecting our quality, and purity</h2>
                    </div>
                    <!-- Section Title End -->
                </div>                
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('images/our-testimonials-image-1.jpg') }}" alt="">
                                            </figure>
                                        </div>
                                        <div class="testimonial-item-body">
                                            <div class="testimonial-item-header">
                                                <div class="testimonial-item-rating">
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                </div>
                                                <div class="testimonial-item-quote">
                                                    <img src="{{ asset('images/testimonial-item-quote.svg') }}" alt="">
                                                </div>
                                            </div>                                         
                                            <div class="testimonial-item-content">
                                                <h3>“The academy cares dancer's progress. The training is structured and supportive and incredibly professional.”</h3>
                                            </div>
                                            <div class="testimonial-author-content">
                                                <h3>Esther Howard</h3>
                                                <p>Lorem Ipsum</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('images/our-testimonials-image-2.jpg') }}" alt="">
                                            </figure>
                                        </div>
                                        <div class="testimonial-item-body">
                                            <div class="testimonial-item-header">
                                                <div class="testimonial-item-rating">
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                </div>
                                                <div class="testimonial-item-quote">
                                                    <img src="{{ asset('images/testimonial-item-quote.svg') }}" alt="">
                                                </div>
                                            </div>                                         
                                            <div class="testimonial-item-content">
                                                <h3>“The academy cares dancer's progress. The training is structured and supportive and incredibly professional.”</h3>
                                            </div>
                                            <div class="testimonial-author-content">
                                                <h3>Leslie Alexander</h3>
                                                <p>Lorem Ipsum</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('images/our-testimonials-image-3.jpg') }}" alt="">
                                            </figure>
                                        </div>
                                        <div class="testimonial-item-body">
                                            <div class="testimonial-item-header">
                                                <div class="testimonial-item-rating">
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                </div>
                                                <div class="testimonial-item-quote">
                                                    <img src="{{ asset('images/testimonial-item-quote.svg') }}" alt="">
                                                </div>
                                            </div>                                         
                                            <div class="testimonial-item-content">
                                                <h3>“The academy cares dancer's progress. The training is structured and supportive and incredibly professional.”</h3>
                                            </div>
                                            <div class="testimonial-author-content">
                                                <h3>Kathryn Murphy</h3>
                                                <p>Lorem Ipsum</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <!-- Testimonial Item Start -->
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('images/our-testimonials-image-4.jpg') }}" alt="">
                                            </figure>
                                        </div>
                                        <div class="testimonial-item-body">
                                            <div class="testimonial-item-header">
                                                <div class="testimonial-item-rating">
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                    <i class="fa fa-solid fa-star"></i>
                                                </div>
                                                <div class="testimonial-item-quote">
                                                    <img src="{{ asset('images/testimonial-item-quote.svg') }}" alt="">
                                                </div>
                                            </div>                                         
                                            <div class="testimonial-item-content">
                                                <h3>“The academy cares dancer's progress. The training is structured and supportive and incredibly professional.”</h3>
                                            </div>
                                            <div class="testimonial-author-content">
                                                <h3>Kristin Watson</h3>
                                                <p>Lorem Ipsum</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial Item End -->
                                </div>
                                <!-- Testimonial Slide End -->
                            </div>
                            <div class="testimonial-pagination"></div>
                        </div>
                    </div>
                    <!-- Testimonial Slider End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.2s">
                        <p><span>Free</span> Where Experiences Speak Louder - <a href="{{ route('contact') }}">Discover Why Customers Love Us!</a></p>

                        <ul>
                            <li><span class="counter">4.9</span>/5</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Our 4200 Reviews</li>
                        </ul>
                    </div>
                    <!-- Section Footer Text End -->
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

    <!-- Main Footer End -->
@endsection
