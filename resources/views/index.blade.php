@extends('layouts.app')

@section('title', 'Raghuvir')

@section('content')
<style>
.hero-spacer {
    height: 650px;
}
@media (max-width: 991px) {
    .hero-spacer {
        height: 380px;
    }
}
@media (max-width: 767px) {
    .hero-spacer {
        height: 280px;
    }
}
</style>
<!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero bg-section dark-section">
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
                                <h1 class="text-anime-style-3" data-cursor="-opaque">Discover the Power of Organic Farming,<br>Grown with Love & liability</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Experience the true essence of organic farming, where every crop is grown with care, respect for nature, and mindful sustainability.</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                <a href="{{ route('products') }}" class="btn-default btn-highlighted">Our Products</a>
                            </div>
                            <!-- Hero Button End -->
                        </div>
                        <!-- Hero Content End -->
                    </div>

                    <div class="col-xl-6">
                        <!-- Hero Image Start -->
                        <div class="hero-image">
                            <div class="hero-spacer"></div>
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
                            <!-- Hero Company Marquee Start -->
                            <div class="hero-marquee-slider w-100">
                                <div class="hero-marquee-track">
                                    <!-- Group 1 -->
                                    <div class="hero-marquee-group">
                                        <span class="marquee-item"><i class="fa-solid fa-circle-check"></i> 100% Pure Chakki Atta</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-seedling"></i> Farm-Fresh Golden Wheat</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-shield-halved"></i> 100% Hygienic Packaging</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-heart-pulse"></i> Rich In Dietary Fiber</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-bowl-rice"></i> Soft & Fluffy Rotis Guaranteed</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-droplet-slash"></i> Low Moisture Freshness</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-leaf"></i> Zero Preservatives & 100% Natural</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-mortar-pestle"></i> Traditional Stone Ground</span>
                                        <span class="marquee-sep">✦</span>
                                    </div>
                                    <!-- Group 2 (Duplicate for seamless continuous loop) -->
                                    <div class="hero-marquee-group" aria-hidden="true">
                                        <span class="marquee-item"><i class="fa-solid fa-circle-check"></i> 100% Pure Chakki Atta</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-seedling"></i> Farm-Fresh Golden Wheat</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-shield-halved"></i> 100% Hygienic Packaging</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-heart-pulse"></i> Rich In Dietary Fiber</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-bowl-rice"></i> Soft & Fluffy Rotis Guaranteed</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-droplet-slash"></i> Low Moisture Freshness</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-leaf"></i> Zero Preservatives & 100% Natural</span>
                                        <span class="marquee-sep">✦</span>
                                        <span class="marquee-item"><i class="fa-solid fa-mortar-pestle"></i> Traditional Stone Ground</span>
                                        <span class="marquee-sep">✦</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Company Marquee End -->
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
                            <a href="{{ route('about') }}" class="btn-default">More About Us</a>
                        </div>
                        <!-- About Us Button End -->
                    </div>
                    <!-- About Us Content End -->
                </div>

                    {{-- About Us Footer Hidden --}}

            </div>
        </div>
    </div>
    <!-- About Us Section End -->


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
                                    <img src="{{ asset('images/home_02.png') }}" alt="">
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
                                    <img src="{{ asset('images/icon-why-choose-us-info-box.svg') }}?v={{ filemtime(public_path('images/icon-why-choose-us-info-box.svg')) }}" alt="Transparent & Traceable Produce">
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


            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Intro Video Section Start -->
    <div class="intro-video bg-section dark-section parallaxie">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <!-- Intro Video Content Start -->
                    <div class="intro-video-content text-center">
                        <!-- Section Title Start -->
                        <div class="section-title text-center" style="margin-bottom: 50px;">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Follow the journey of pure farming where nature, technique, and passion come together</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s" style="color: rgba(255, 255, 255, 0.85); font-size: 18px; max-width: 800px; margin: 20px auto 0 auto; line-height: 1.6;">
                                At Raghuvir, we bring you the finest hygienic chakki flour milled from handpicked premium wheat grains. Nurturing health and tradition, our products are clean, pure, and rich in natural nutrients to ensure soft, delicious rotis for your family.
                            </p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- Intro Video Content End -->
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
                @forelse($featuredProducts as $index => $prod)
                    <div class="col-lg-4 col-md-6">
                        <!-- Product Item Start -->
                        <div class="product-item wow fadeInUp" data-wow-delay="{{ 0.2 * ($index % 3) }}s">
                            <!-- Product Item Image Start -->
                            <div class="product-item-img">
                                <a href="{{ route('product-details', ['product' => $prod->slug]) }}" data-cursor-text="View">
                                    <figure>
                                        <img src="{{ $prod->image_url }}" alt="{{ $prod->image_alt ?: $prod->name }}">
                                    </figure>
                                </a>
                            </div>
                            <!-- Product Item Image End -->

                            <!-- Product Item Body Start -->
                            <div class="product-item-body">                            
                                <div class="product-item-content">
                                    <span style="display: block; font-size: 13px; font-weight: 600; color: var(--accent-color); margin-bottom: 4px;">{{ $prod->subtitle ?: '100% Pure & Farm Fresh' }}</span>
                                    <h2><a href="{{ route('product-details', ['product' => $prod->slug]) }}">{{ $prod->name }}</a></h2>
                                </div>

                                <div class="product-item-btn">
                                    <a href="{{ route('product-details', ['product' => $prod->slug]) }}" class="btn-default">View Details</a>
                                </div>
                            </div>
                            <!-- Product Item Body End -->
                        </div>
                        <!-- Product Item End -->
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p>No products available at the moment.</p>
                    </div>
                @endforelse

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

            </div>
        </div>
    </div>
    <!-- How It Work Section End -->

    <!-- Door to Door Delivery Around Gujarat Section Start -->
    <div class="gujarat-delivery-section" id="gujarat-delivery">
        <div class="container">
            <div class="guj-main-card">
                <div class="row align-items-center">
                    <!-- Left Column: Content, 2x2 Features & Actions -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="guj-content-wrap">
                            <!-- Top Pill Badge -->
                            <div class="guj-badge wow fadeInUp">
                                <span class="guj-badge-icon"><i class="fa-solid fa-truck-fast"></i></span>
                                <span class="guj-badge-text">Doorstep Delivery Across Gujarat</span>
                                <span class="guj-badge-tag">Direct to Home</span>
                            </div>

                            <!-- Main Heading -->
                            <h2 class="guj-heading wow fadeInUp" data-wow-delay="0.1s">
                                Fresh Chakki Atta, <span>Delivered</span> to Your Doorstep
                            </h2>

                            <!-- Description -->
                            <p class="guj-lead wow fadeInUp" data-wow-delay="0.15s">
                                From our hygienic chakki milling plant in Kadadara (Gandhinagar), we bring you 100% pure, stone-ground fresh flour — straight to your doorstep across <strong>Ahmedabad, Surat, Vadodara, Rajkot</strong> and all Gujarat.
                            </p>

                            <!-- 2x2 Feature Cards Grid -->
                            <div class="guj-features-grid wow fadeInUp" data-wow-delay="0.2s">
                                <!-- Feature 1 -->
                                <div class="guj-feature-item">
                                    <div class="guj-feature-icon-wrap">
                                        <i class="fa-solid fa-wheat-awn"></i>
                                    </div>
                                    <div class="guj-feature-text">
                                        <h4>Fresh Milling on Order</h4>
                                        <p>Stone-ground fresh to preserve natural nutrients & aroma.</p>
                                    </div>
                                </div>

                                <!-- Feature 2 -->
                                <div class="guj-feature-item">
                                    <div class="guj-feature-icon-wrap">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </div>
                                    <div class="guj-feature-text">
                                        <h4>24–48 Hours Dispatch</h4>
                                        <p>Fast & reliable delivery across Gujarat cities & towns.</p>
                                    </div>
                                </div>

                                <!-- Feature 3 -->
                                <div class="guj-feature-item">
                                    <div class="guj-feature-icon-wrap">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </div>
                                    <div class="guj-feature-text">
                                        <h4>Moisture-Lock Packing</h4>
                                        <p>5kg, 10kg, 30kg & 50kg food-grade airtight bags.</p>
                                    </div>
                                </div>

                                <!-- Feature 4 -->
                                <div class="guj-feature-item">
                                    <div class="guj-feature-icon-wrap">
                                        <i class="fa-solid fa-house-chimney"></i>
                                    </div>
                                    <div class="guj-feature-text">
                                        <h4>Home & Bulk Supply</h4>
                                        <p>Direct supply for homes, caterers, hotels & grocers.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="guj-actions-row wow fadeInUp" data-wow-delay="0.25s">
                                <button
                                    type="button"
                                    class="btn-default btn-highlighted guj-order-btn"
                                    onclick="openInquiryModal(this)"
                                    data-product="Fresh Chakki Atta Doorstep Delivery - Gujarat Wide"
                                    data-size="5kg, 10kg, 30kg & 50kg Packs"
                                    data-blank-message="true"
                                >Order for Doorstep Delivery</button>

                                <a href="tel:+919725427727" class="guj-phone-pill">
                                    <div class="guj-phone-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="guj-phone-text">
                                        <small>Order Helpline</small>
                                        <strong>+91 97254 27727</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Grand Visual Showcase Frame -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="guj-showcase-box wow fadeIn" data-wow-delay="0.2s">
                            <div class="guj-showcase-frame">
                                <img
                                    src="{{ asset('images/gujarat_delivery_showcase_hd.jpg') }}"
                                    alt="Fresh Chakki Atta 5kg Doorstep Delivery Across Gujarat"
                                    class="guj-showcase-img"
                                >
                                <!-- Floating Trust Badge -->
                                <div class="guj-showcase-badge">
                                    <div class="badge-icon">
                                        <i class="fa-solid fa-award"></i>
                                    </div>
                                    <div class="badge-content">
                                        <strong>100% Stone-Ground Fresh</strong>
                                        <span>Kadadara, Gandhinagar Plant</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Door to Door Delivery Around Gujarat Section End -->





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
                                <img src="{{ asset('images/home_04.png') }}" alt="">
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
                @if(isset($latestBlogs) && $latestBlogs->isNotEmpty())
                    @foreach($latestBlogs as $index => $blog)
                        <div class="col-xl-4 col-md-6">
                            <!-- Post Item Start -->
                            <div class="post-item wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">                        
                                <!-- Post Item Body Start -->
                                <div class="post-item-box">
                                    <!-- Post Featured Image Start-->
                                    <div class="post-featured-image">
                                        <a href="{{ route('blog.single', $blog->slug) }}" data-cursor-text="View">
                                            <figure class="image-anime" style="height: 250px; overflow: hidden;">
                                                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- Post Featured Image End -->

                                    <!-- Post Item Content Start -->
                                    <div class="post-item-content">
                                        <div style="font-size: 0.775rem; color: #EF801C; font-weight: 700; margin-bottom: 0.4rem;">
                                            <i class="fa-solid fa-tag"></i> {{ $blog->category }} • {{ $blog->reading_time }}
                                        </div>
                                        <h2><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                        <p>{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 95) }}</p>
                                    </div>
                                    <!-- Post Item Content End -->                                                         
                                </div>
                                <!-- Post Item Body End -->
                                 
                                <!-- Post Item Readmore Button Start-->
                                <div class="post-item-btn">
                                    <a href="{{ route('blog.single', $blog->slug) }}" class="readmore-btn">read more</a>
                                </div>
                                <!-- Post Item Readmore Button End-->
                            </div>
                            <!-- Post Item End -->
                        </div>
                    @endforeach
                @else
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item wow fadeInUp">                        
                            <div class="post-item-box">
                                <div class="post-featured-image">
                                    <a href="{{ route('blog') }}" data-cursor-text="View">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/post-1.jpg') }}" alt="">
                                        </figure>
                                    </a>
                                </div>
                                <div class="post-item-content">
                                    <h2><a href="{{ route('blog') }}">The True Benefits of Choosing 100% Sharbati Whole Wheat</a></h2>
                                    <p>Explore why chemical free produce supports better health, richer nutrition, and a safer environment.</p>
                                </div>
                            </div>
                            <div class="post-item-btn">
                                <a href="{{ route('blog') }}" class="readmore-btn">read more</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->

    <!-- Main Footer End -->
@endsection
