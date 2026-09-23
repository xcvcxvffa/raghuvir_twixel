@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('testimonials') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('testimonials') }}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our testimonials</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Testimonials Start -->
    <div class="page-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp">
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

                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="0.2s">
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
                                <p>Customer</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item End -->
                </div>

                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="0.4s">
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
                                <h3>“ I;ve visited many farms before, but none felt as authentic and transparent as this one. Their commitment.! ”</h3>
                            </div>
                            <div class="testimonial-author-content">
                                <h3>Kathryn Murphy</h3>
                                <p>Customer</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item End -->
                </div>

                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="0.6s">
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
                                <h3>“ The freshness of their produce is amazing. You can literally taste the difference between their organic harvest.”</h3>
                            </div>
                            <div class="testimonial-author-content">
                                <h3>Kristin Watson</h3>
                                <p>Farm Visitor</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item End -->
                </div>

                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="0.8s">
                        <div class="testimonial-item-image">
                            <figure class="image-anime">
                                <img src="{{ asset('images/our-testimonials-image-5.jpg') }}" alt="">
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
                                <h3>“ Their commitment to quality and transparency is impressive. The farm tours helped me understand how thoughtfully everything. ”</h3>
                            </div>
                            <div class="testimonial-author-content">
                                <h3>Eleanor Pena</h3>
                                <p>Farm Visitor</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item End -->
                </div>

                <div class="col-lg-6">
                    <!-- Testimonial Item Start -->
                    <div class="testimonial-item wow fadeInUp" data-wow-delay="1s">
                        <div class="testimonial-item-image">
                            <figure class="image-anime">
                                <img src="{{ asset('images/our-testimonials-image-6.jpg') }}" alt="">
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
                                <h3>“ Absolutely love their seasonal boxes! Every delivery feels like a basket of pure, natural goodness. Highly recommended for families.”</h3>
                            </div>
                            <div class="testimonial-author-content">
                                <h3>Guy Hawkins</h3>
                                <p>Farm Visitor</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Testimonials End -->

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
