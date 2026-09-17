@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">About Us</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">about us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- About Us Section Start -->
    <div class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <!-- About Us Image Box Start -->
                    <div class="about-us-images">
                        <div class="about-us-image-1">
                            <figure>
                                <video autoplay loop muted playsinline style="width: 100%; aspect-ratio: 1 / 1.0417; object-fit: cover; border-radius: 12px; display: block;">
                                    <source src="{{ asset('images/wheat video.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </figure>
                        </div>
                        <!-- About Us Image 1 End -->
                    
                        <!-- About Us Image 2 Start -->
                        <div class="about-us-image-2">
                            <figure class="image-anime">
                                <img src="{{ asset('images/home_about.png') }}" alt="">
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
                            <a href="{{ route('contact') }}" class="btn-default">contact now</a>
                        </div>
                        <!-- About Us Button End -->
                    </div>
                    <!-- About Us Content End -->
                </div>


            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Approach Section Start -->
    <div class="our-approach bg-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our Approach</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Growing better through clean and responsible farming</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-6">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>We follow a farming approach rooted in purity, care, and long-term sustainability. By using natural methods, protecting soil health, and avoiding harmful chemicals.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('contact') }}" class="btn-default">Learn More</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>
                
            <div class="row">
                <div class="col-xl-6">
                    <!-- Approach Item Start -->
                    <div class="approach-item wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Approach Item Image Start -->
                        <div class="approach-item-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/our-approach-item-image-1.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Approach Item Image End -->

                        <!-- Approach Item Body Start -->
                        <div class="approach-item-body">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-approach-item-1.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>Our Mission</h3>
                                <p>Our mission is to grow food with honesty, transparency, and deep respect for nature.</p>
                                <ul>
                                    <li>Promoting Natural Farming Practices</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Approach Item Body End -->
                    </div>
                    <!-- Approach Item End -->
                </div>

                <div class="col-xl-6">
                    <!-- Approach Item Start -->
                    <div class="approach-item wow fadeInUp" data-wow-delay="0.8s">
                        <!-- Approach Item Image Start -->
                        <div class="approach-item-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/our-approach-item-image-2.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Approach Item Image End -->

                        <!-- Approach Item Body Start -->
                        <div class="approach-item-body">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-our-approach-item-2.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>Our Vision</h3>
                                <p>To become a leading example of sustainable agriculture where innovation and nature work.</p>
                                <ul>
                                    <li>Building a Sustainable Food Future</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Approach Item Body End -->
                    </div>
                    <!-- Approach Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Approach Comapany Slider Box Start -->
                    <div class="approach-company-slider-box wow fadeInUp" data-wow-delay="1s">
                        <!-- Comapany Support Content Start -->
                        <div class="company-supports-content">
                            <hr>
                            <p>Trusted By More Than 100+ Companies</p>
                            <hr>
                        </div>
                        <!-- Comapany Support Content End -->

                        <!-- Comapany Support Slider Start -->
                        <div class="company-supports-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-1.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
    
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-2.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
    
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-3.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
    
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-4.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
    
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-5.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
    
                                    <!-- Company Support Logo Start -->
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('images/company-logo-primary-3.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Comapany Support Logo End -->
                                </div>
                            </div>
                        </div>
                        <!-- Comapany Support Slider End -->
                    </div>
                    <!-- Approach Comapany Slider Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Approach Section End -->

    <!-- Our Advantage Us Section Start -->
    <div class="our-advantage">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Advantage</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Your source for pure, fresh, and sustainably grown produce</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Our Advantage Boxes Start -->
                    <div class="our-advantage-boxes">
                        <!-- Our Advantage Box Start -->
                        <div class="our-advantage-box wow fadeInUp">
                            <!-- Our Advantage Box Body Start -->
                            <div class="our-advantage-box-body">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-our-advantage-1.svg') }}" alt="">
                                </div>                                
                                <div class="our-advantage-box-content">
                                    <h3>Pure Quality Produce</h3>
                                    <p>We grow our crops using natural, chemical-free methods.</p>
                                </div>
                            </div>
                            <!-- Our Advantage Box Body End -->                       

                            <!-- Our Advantage Review Box Start -->
                            <div class="our-advantage-review-box">
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

                                <div class="our-advantage-review-content">
                                    <p>More Than 200+ Happy Customers</p>
                                </div>
                            </div>
                            <!-- Our Advantage Rating Box End -->
                        </div>
                        <!-- Our Advantage Box End -->

                        <!-- Our Advantage Box 2 Start -->
                        <div class="our-advantage-image box-2 wow fadeInUp" data-wow-delay="0.2s">
                            <figure>
                                <img src="{{ asset('images/our-advantage-image-1.jpg') }}" alt="">
                            </figure>

                            <div class="video-play-btn">
                                <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play"><i class="fa-solid fa-play"></i></a>
                            </div>
                        </div>
                        <!-- Our Advantage Box 2 End -->

                        <!-- Our Advantage Box 3 Start -->
                        <div class="our-advantage-image box-3 wow fadeInUp" data-wow-delay="0.4s">
                            <figure class="image-anime">
                                <img src="{{ asset('images/our-advantage-image-2.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Our Advantage Box 3 End -->

                        <!-- Our Advantage Box Start -->
                        <div class="our-advantage-box wow fadeInUp" data-wow-delay="0.6s">
                            <!-- Our Advantage Header Start -->
                            <div class="our-advantage-header">
                                <div class="our-advantage-counter-box">
                                    <div class="icon-box">
                                        <img src="{{ asset('images/icon-our-advantage-2.svg') }}" alt="">
                                    </div>                                
                                    <div class="our-advantage-counter-content">
                                        <h2><span class="counter">25</span>+</h2>
                                    </div>
                                </div>

                                <div class="our-advantage-header-content">
                                    <h3>Years of Experience</h3>
                                </div>
                            </div>
                            <!-- Our Advantage Header End -->

                            <!-- Our Advantage Box Footre Start -->
                            <div class="our-advantage-box-footer">
                                <p>We have honed our techniques to grow fresh, chemical free produce</p>
                                <ul>
                                    <li>Eco-Friendly Farming Practices</li>
                                    <li>Thousand of Acres of Fertile Farms</li>
                                </ul>
                            </div> 
                            <!-- Our Advantage Box Footer End -->                             
                        </div>
                        <!-- Our Advantage Box End -->
                    </div>
                    <!-- Our Advantage Boxes End -->
                </div>


            </div>
        </div>
    </div>
    <!-- Our Advantage Section End -->

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

    <!-- Main Footer End -->
@endsection
