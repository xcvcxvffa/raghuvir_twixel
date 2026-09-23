@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero-gold bg-section">
        <!-- Hero Box Start -->
        <div class="hero-box-gold">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Hero Content Start -->
                        <div class="hero-content-gold">                            
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Healthy Farms, Healthy Lives</h3>
                                <h1 class="text-anime-style-3" data-cursor="-opaque">Growing pure organic goodness for a healthier tomorrow</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Discover the true taste of nature with our farm-fresh, chemical-free, and sustainably grown produce. From nutrient-rich vegetables to naturally ripened fruits,</p>
                            </div>
                            <!-- Section Title End -->
    
                            <!-- Hero Button Start -->
                            <div class="hero-btn-gold wow fadeInUp" data-wow-delay="0.4s">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Visit Our Farm</a>
                                <a href="{{ route('services') }}" class="btn-default">View Our Services</a>
                            </div>
                            <!-- Hero Button End -->
                        </div>
                        <!-- Hero Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Box End -->

        <!-- Hero Images Start -->
        <div class="hero-image-box-gold wow fadeInUp">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-image-title-gold">
                            <h2>Soilux</h2>
                        </div>
                        <div class="hero-image-gold">
                            <figure>
                                <img src="{{ asset('images/hero-image-gold.png') }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Image End -->
    </div>
    <!-- Hero Section End -->

    <!-- About Us Section Start -->
    <div class="about-us-gold">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-7">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">About Our Farm</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">A deep look into our commitment to pure, natural, and eco-friendly agricultural practices</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-xl-5">
                    <!-- Section Content Button Start -->
                    <div class="section-content-btn">
                        <!-- Section Title Content Start -->
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Welcome to our organic farm, a place where nature, purity, and passion come together to create food you can trust. Our story began with a simple belief: healthy farming leads to healthy living.</p>
                        </div>
                        <!-- Section Title Content End -->

                        <!-- Section Button Start -->
                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('about') }}" class="btn-default">More About Us</a>
                        </div>
                        <!-- Section Button End -->
                    </div>
                    <!-- Section Content Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 order-xl-1 order-md-1">
                    <!-- About Item Start -->
                    <div class="about-us-item-box-gold mission-box-gold wow fadeInUp" data-wow-delay="0.2s">
                        <!-- About Item Body Start -->
                        <div class="about-us-item-gold">
                            <div class="about-us-item-header-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-us-item-1-gold.svg') }}" alt="">
                                </div>
                                <div class="about-us-item-title-gold">
                                    <h3>Our Mission</h3>
                                </div>
                            </div>
                            <div class="about-us-item-content-gold">
                                <p>Our mission is to cultivate pure, and nutrient-rich food using sustainable agricultural practices that respect both</p>
                            </div>
                        </div>
                        <!-- About Item Body End -->

                        <!-- About Item Box Start -->
                        <div class="about-us-item-body-gold">
                            <!-- About Counter Item Start -->
                            <div class="about-counter-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-counter-item-1-gold.svg') }}" alt="">
                                </div>
                                <div class="about-counter-item-content-gold">
                                    <h2><span class="counter">10</span>+</h2>
                                    <p>Years of Farming</p>
                                </div>
                            </div>
                            <!-- About Counter Item End -->

                            <!-- About Counter Item Start -->
                            <div class="about-counter-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-counter-item-2-gold.svg') }}" alt="">
                                </div>
                                <div class="about-counter-item-content-gold">
                                    <h2><span class="counter">25</span>+</h2>
                                    <p>Years of Farming</p>
                                </div>
                            </div>
                            <!-- About Counter Item End -->
                        </div> 
                        <!-- About Item Box End -->
                    </div>
                    <!-- About Us Item End -->
                </div>

                <div class="col-xl-6 col-md-12 order-xl-2 order-md-3">
                    <!-- About Us Image Start -->
                    <div class="about-us-image-gold">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('images/about-us-img-gold.jpg') }}" alt="">
                        </figure>
                    </div>
                    <!-- About Us Image End -->
                </div>

                <div class="col-xl-3 col-md-6 order-xl-3 order-md-2">
                    <!-- About Item Start -->
                    <div class="about-us-item-box-gold vision-box-gold wow fadeInUp" data-wow-delay="0.4s">
                        <!-- About Item Body Start -->
                        <div class="about-us-item-gold">
                            <div class="about-us-item-header-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-about-us-item-2-gold.svg') }}" alt="">
                                </div>
                                <div class="about-us-item-title-gold">
                                    <h3>Our Vision</h3>
                                </div>
                            </div>
                            <div class="about-us-item-content-gold">
                                <p>Our vision is to become a leading symbol of sustainable farming, inspiring a global shift toward responsible food production.</p>
                            </div>
                        </div>
                        <!-- About Item Body End -->

                        <!-- About Item Box Start -->
                        <div class="about-us-item-body-gold">
                            <!-- About Item Box Header Start -->
                            <div class="about-client-rating-box-gold">
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
                                <div class="about-satisfy-client-content-gold">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i> 4.5</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- About Item Box Header End -->

                            <!-- About Item Box Body Start -->
                            <div class="about-client-rating-body-gold">
                                <div class="about-client-rating-content-gold">
                                    <p>I have been purchasing organic produce from this farm for over a year now,</p>
                                </div>
                                <div class="about-client-rating-btn-gold">
                                    <a href="{{ route('contact') }}" class="readmore-btn">Read More</a>
                                </div>
                            </div>
                            <!-- About Item Box Body End -->
                        </div> 
                        <!-- About Item Box End -->
                    </div>
                    <!-- About Us Item End -->
                </div>

                <div class="col-lg-12 order-4">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.6s">
                        <p><span>Free</span>Where Nature Meets Quality - <a href="{{ route('services') }}">Discover Our Organic Farming Services!</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services-gold bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our service</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Delivering natural farm services with trusted quality</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-gold wow fadeInUp">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image-gold">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/service-image-1-gold.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-gold">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-service-item-1-gold.svg') }}" alt="">
                            </div>
                            <div class="service-item-content-gold">
                                <h3><a href="{{ route('service-details') }}">Organic Vegetable Farming</a></h3>
                                <p>Fresh, pesticide-free vegetables grown using natural compost and sustainable soil practices to ensure</p>
                            </div>
                            <div class="service-item-btn-gold">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>  
                        <!-- Service Item Body End -->                      
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-gold wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image-gold">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/service-image-2-gold.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-gold">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-service-item-2-gold.svg') }}" alt="">
                            </div>
                            <div class="service-item-content-gold">
                                <h3><a href="{{ route('service-details') }}">Seasonal Fruit Cultivation</a></h3>
                                <p>Fresh, pesticide-free vegetables grown using natural compost and sustainable soil practices to ensure</p>
                            </div>
                            <div class="service-item-btn-gold">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>  
                        <!-- Service Item Body End -->                      
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start --> 
                    <div class="service-item-gold wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image-gold">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/service-image-3-gold.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-gold">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-service-item-3-gold.svg') }}" alt="">
                            </div>
                            <div class="service-item-content-gold">
                                <h3><a href="{{ route('service-details') }}">Medicinal Plant Farming</a></h3>
                                <p>Fresh, pesticide-free vegetables grown using natural compost and sustainable soil practices to ensure</p>
                            </div>
                            <div class="service-item-btn-gold">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>  
                        <!-- Service Item Body End -->                      
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item-gold wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image-gold">
                            <a href="{{ route('service-details') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/service-image-4-gold.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Item Body Start -->
                        <div class="service-item-body-gold">
                            <div class="icon-box">
                                <img src="{{ asset('images/icon-service-item-4-gold.svg') }}" alt="">
                            </div>
                            <div class="service-item-content-gold">
                                <h3><a href="{{ route('service-details') }}">Dairy & Livestock Care</a></h3>
                                <p>Fresh, pesticide-free vegetables grown using natural compost and sustainable soil practices to ensure</p>
                            </div>
                            <div class="service-item-btn-gold">
                                <a href="{{ route('service-details') }}" class="readmore-btn">Read More</a>
                            </div>
                        </div>  
                        <!-- Service Item Body End -->                      
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Our Service Footer Start -->
                    <div class="our-service-footer-gold">
                        <!-- Our Service Footer List Start -->
                        <div class="our-service-footer-list-gold wow fadeInUp" data-wow-delay="0.8s">
                            <ul>
                                <li>Natural Vegetables</li>
                                <li>Fresh Organic Food</li>
                                <li>Sustainable Agriculture</li>
                                <li>Chemical-Free Farming</li>
                            </ul>
                        </div>
                        <!-- Our Service Footer List End -->

                        <!-- Section Footer Text Start -->
                        <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="1s">
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
                    <!-- Our Service Footer End --> 
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us-gold">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Why Choose Images Start -->
                    <div class="why-choose-images-gold">
                        <!-- Why Choose Image 1 Start -->
                        <div class="why-choose-image-1-gold">
                            <figure class="image-anime">
                                <img src="{{ asset('images/why-choose-image-1-gold.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Why Choose Image 1 Start -->

                        <!-- Why Choose Image 2 Start -->
                        <div class="why-choose-image-2-gold">
                            <figure>
                                <img src="{{ asset('images/why-choose-image-2-gold.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Why Choose Image 2 Start -->

                        <!-- Why Choose Counter Box Start -->
                        <div class="why-choose-counter-box-gold">
                            <div class="why-choose-counter-body-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-why-choose-counter-box.svg') }}" alt="">
                                </div>
                                <div class="why-choose-counter-content-gold">
                                    <h2><span class="counter">20</span>+</h2>
                                    <p>Years of Farming Experience</p>
                                </div>
                            </div>
                        </div>
                        <!-- Why Choose Counter Box End -->
                    </div>
                    <!-- Why Choose Images End -->
                </div>

                <div class="col-xl-6">
                    <!-- Why Choose Us Content Start -->
                    <div class="why-choose-us-content-gold">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Why Choose Us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Healthy food choices start with our organic farming</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We are committed to delivering pure, organic, and sustainably grown produce that nurtures your health and protects the environment. Our farming practices are completely chemical-free,</p>
                        </div>
                        <!-- Section Title End -->
                        
                        <!-- Why Choose Item List Start -->
                        <div class="why-choose-item-list-gold wow fadeInUp" data-wow-delay="0.4s">
                            <!-- Why Choose Item Start -->
                            <div class="why-choose-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-why-choose-item-1-gold.svg') }}" alt="">
                                </div>
                                <div class="why-choose-item-content-gold">
                                    <h3>100% Pure & Organic Produce</h3>
                                </div>
                            </div>
                            <!-- Why Choose Body Item End -->

                            <!-- Why Choose Item Start -->
                            <div class="why-choose-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-why-choose-item-2-gold.svg') }}" alt="">
                                </div>
                                <div class="why-choose-item-content-gold">
                                    <h3>Sustainable Farming Practices</h3>
                                </div>
                            </div>
                            <!-- Why Choose Body Item End -->
                        </div>
                        <!-- Why Choose Item List End -->

                        <!-- Why Choose Progress List Start -->
                        <div class="why-choose-progress-list-gold">
                            <!-- Skills Progress Bar Start -->
                            <div class="skills-progress-bar-gold">
                                <!-- Skill Item Start -->
                                <div class="skillbar-gold" data-percent="75%">
                                    <div class="skill-data-gold">
                                        <div class="skill-title-gold">Quality Tested</div>
                                        <div class="skill-no-gold">75%</div>
                                    </div>
                                    <div class="skill-progress-gold">
                                        <div class="count-bar-gold"></div>
                                    </div>
                                </div>
                                <!-- Skill Item End -->
                            </div>
                            <!-- Skills Progress Bar End -->

                            <!-- Skills Progress Bar Start -->
                            <div class="skills-progress-bar-gold">
                                <!-- Skill Item Start -->
                                <div class="skillbar-gold" data-percent="90%">
                                    <div class="skill-data-gold">
                                        <div class="skill-title-gold">Passionate Farmers</div>
                                        <div class="skill-no-gold">90%</div>
                                    </div>
                                    <div class="skill-progress-gold">
                                        <div class="count-bar-gold"></div>
                                    </div>
                                </div>
                                <!-- Skill Item End -->
                            </div>
                            <!-- Skills Progress Bar End -->
                        </div>
                        <!-- Why Choose Progress List End -->

                        <!-- Why Choose Footer Start -->
                        <div class="why-choose-footer-gold wow fadeInUp" data-wow-delay="0.6s">
                            <!-- Why Choose Button Start -->
                            <div class="why-choose-btn-gold">
                                <a href="{{ route('contact') }}" class="btn-default">Get in Touch</a>
                            </div>
                            <!-- Why Choose Button End -->

                            <!-- Why Choose Author Box Start -->
                            <div class="why-choose-author-box-gold">
                                <div class="author-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="why-choose-author-content-gold">
                                    <h3>Ralph Edwards</h3>
                                    <p>Agronomist</p>
                                </div>
                            </div>
                            <!-- Why Choose Author Box End -->
                        </div>
                        <!-- Why Choose Footer End -->
                    </div>
                    <!-- Why Choose Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Our Story Section Start -->
    <div class="our-story-gold bg-section dark-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-8">
                    <div class="our-story-content-gold">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Our Story</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Our organic farming journey rooted in nature</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We are committed to delivering pure, organic, and sustainably grown produce that nurtures your health and protects the environment. Our farming practices are completely chemical-free,</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="col-xl-6 col-md-4">
                    <!-- Our Story Button Start -->
                    <div class="our-story-button-gold wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Video Play Button Start -->
                        <div class=" video-play-button-gold">
                            <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                        
                        <!-- Get In Touch Circle Start -->
                        <div class="get-in-touch-circle-gold">
                            <a href="{{ route('contact') }}">
                                <img src="{{ asset('images/get-in-touch-circle.svg') }}" alt="">
                            </a>
                        </div>
                        <!-- Get In Touch Circle End -->
                    </div>
                    <!-- Our Story Button End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Story Section End -->

    <!-- What We Do Section Start-->
    <div class="what-we-do-gold">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <!-- What We Images Start -->
                    <div class="what-we-images-gold">
                        <!-- What We Image box-1 Start -->
                        <div class="what-we-image-box-1-gold">
                            <!-- What We Image 1 Start -->
                            <div class="what-we-image-1-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/what-we-image-1-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <!-- What We Image 1 End -->

                            <!-- Get In Touch Circle Start -->
                            <div class="get-in-touch-circle-gold">
                                <a href="{{ route('contact') }}">
                                    <img src="{{ asset('images/get-in-touch-circle.svg') }}" alt="">
                                </a>
                            </div>
                            <!-- Get In Touch Circle End -->
                        </div>
                        <!-- What We Image box-1 End -->

                        <!-- What We Image box-2 Start -->
                        <div class="what-we-image-box-2-gold">
                            <!-- What We Image 1 Start -->
                            <div class="what-we-image-2-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/what-we-image-2-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <!-- What We Image 2 End -->
                        </div>
                        <!-- What We Image box-2 End -->
                    </div>
                    <!-- What We Images End -->
                </div>

                <div class="col-xl-6">
                    <!-- What We Do Content Start -->
                    <div class="what-we-do-content-gold">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Wht We Do</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Providing quality organic food for every family</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">At our farm, we focus on growing fresh, organic, and chemical-free produce while protecting the environment. From nutrient-rich vegetables and fruits to medicinal herbs and ethically</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- What We Step List Start -->
                        <div class="what-we-step-list-gold wow fadeInUp" data-wow-delay="0.4s">
                            <!-- What We Item Start -->
                            <div class="what-we-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-what-we-item-1-gold.svg') }}" alt="">
                                </div>
                                <div class="what-we-item-content-gold">
                                    <h3>Grow Fresh Organic Produce</h3>
                                    <p>We cultivate seasonal vegetables, fruits, herbs, and grains using 100% natural, chemical-free farming methods.</p>
                                </div>
                            </div>
                            <!-- What We Item End -->

                            <!-- What We Item Start -->
                            <div class="what-we-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-what-we-item-2-gold.svg') }}" alt="">
                                </div>
                                <div class="what-we-item-content-gold">
                                    <h3>Protect Soil and Environment</h3>
                                    <p>Through composting, crop rotation, and natural fertilizers, we keep the soil healthy and support long-term sustainability.</p>
                                </div>
                            </div>
                            <!-- What We Item End -->

                            <!-- What We Item Start -->
                            <div class="what-we-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-what-we-item-3-gold.svg') }}" alt="">
                                </div>
                                <div class="what-we-item-content-gold">
                                    <h3>Use Eco-Friendly Water Techniques</h3>
                                    <p>Our farm relies on drip irrigation and rainwater harvesting to conserve water while nourishing crops effectively.</p>
                                </div>
                            </div>
                            <!-- What We Item End -->
                        </div>
                        <!-- What We Step List End -->

                        <!-- What We Button Start -->
                        <div class="what-we-btn-gold wow fadeInUp" data-wow-delay="0.6s">
                            <a href="{{ route('contact') }}" class="btn-default">Contact Us</a>
                        </div>
                        <!-- What We Button End -->
                    </div>
                    <!-- What We Do Content End -->
                </div>

                <div class="col-12">
                    <!-- How Work Counter List Start -->
                    <div class="what-we-counter-list-gold wow fadeInUp" data-wow-delay="0.8s">
                        <!-- How Work Counter Item Start -->
                        <div class="what-we-counter-item-gold">
                            <h3><span class="counter">500</span>+</h3>
                            <p>Acres of Organic Farmland</p>
                        </div>
                        <!-- How Work Counter Item End -->

                        <!-- How Work Counter Item Start -->
                        <div class="what-we-counter-item-gold">
                            <h3><span class="counter">1</span>k+</h3>
                            <p>KG Fresh Produce Daily</p>
                        </div>
                        <!-- How Work Counter Item End -->

                        <!-- How Work Counter Item Start -->
                        <div class="what-we-counter-item-gold">
                            <h3><span class="counter">365</span>+</h3>
                            <p>Days of Sustainable Farming</p>
                        </div>
                        <!-- How Work Counter Item End -->

                        <!-- How Work Counter Item Start -->
                        <div class="what-we-counter-item-gold">
                            <h3><span class="counter">50</span>k+</h3>
                            <p>Happy Customer Families</p>
                        </div>
                        <!-- How Work Counter Item End -->

                        <!-- How Work Counter Item Start -->
                        <div class="what-we-counter-item-gold">
                            <h3><span class="counter">800</span>+</h3>
                            <p>Farm Visits Annually</p>
                        </div>
                        <!-- How Work Counter Item End -->
                    </div>
                    <!-- How Work Counter List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do Section End-->

    <!-- Our Pricing Section Start -->
    <div class="our-pricing-gold bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Pricing Plan</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Healthy organic food made budget friendly</h2>
                    </div>
                    <!-- Section Title End -->
                </div>                
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item-gold wow fadeInUp">
                        <!-- Pricing Item Header Box Start -->
                        <div class="pricing-item-header-box-gold">
                            <!-- Pricing Item Header Start -->
                            <div class="pricing-item-header-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-item-1-gold.svg') }}" alt="">
                                </div>
                                <div class="pricing-item-title-gold">
                                    <h3>Basic Organic Basket</h3>
                                </div>
                            </div>
                            <!-- Pricing Item Header End -->
    
                            <!-- Pricing Item Content Start -->
                            <div class="pricing-item-content-gold">
                                <p>Choose from our flexible and affordable pricing plans designed to bring fresh,</p>
                            </div>
                            <!-- Pricing Item Content End -->

                            <!-- Pricing Price Start -->
                            <div class="pricing-item-price-gold">
                                <h2>$49.00 <sub>/Monthly</sub></h2>
                            </div>
                            <!-- Pricing Price End -->
                        </div>
                        <!-- Pricing Item Header Box End -->
                            
                        <!-- Pricing Item Body Start -->
                        <div class="pricing-item-body-gold">
                            <!-- Pricing Item Button Start -->
                            <div class="pricing-item-btn-gold">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get Started With Plan</a>
                            </div>
                            <!-- Pricing Item Button End -->

                            <!-- Pricing Item List Start -->
                            <div class="pricing-item-list-gold">
                                <h3>What's included:</h3>
                                <ul>
                                    <li>Free farm tour pass (once a year)</li>
                                    <li>Special festive produce add every month</li>
                                    <li>Weekly delivery of fruits & vegetable</li>
                                    <li>Special discounts on dairy products</li>
                                </ul>
                            </div>
                            <!-- Pricing Item List End -->
                        </div>
                        <!-- Pricing Item Body End -->
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item-gold wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Pricing Item Header Box Start -->
                        <div class="pricing-item-header-box-gold">
                            <!-- Pricing Item Header Start -->
                            <div class="pricing-item-header-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-item-2-gold.svg') }}" alt="">
                                </div>
                                <div class="pricing-item-title-gold">
                                    <h3>Standard Organic Basket</h3>
                                </div>
                            </div>
                            <!-- Pricing Item Header End -->
    
                            <!-- Pricing Item Content Start -->
                            <div class="pricing-item-content-gold">
                                <p>Choose from our flexible and affordable pricing plans designed to bring fresh,</p>
                            </div>
                            <!-- Pricing Item Content End -->

                            <!-- Pricing Price Start -->
                            <div class="pricing-item-price-gold">
                                <h2>$59.00 <sub>/Monthly</sub></h2>
                            </div>
                            <!-- Pricing Price End -->
                        </div>
                        <!-- Pricing Item Header Box End -->
                            
                        <!-- Pricing Item Body Start -->
                        <div class="pricing-item-body-gold">
                            <!-- Pricing Item Button Start -->
                            <div class="pricing-item-btn-gold">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get Started With Plan</a>
                            </div>
                            <!-- Pricing Item Button End -->

                            <!-- Pricing Item List Start -->
                            <div class="pricing-item-list-gold">
                                <h3>What's included:</h3>
                                <ul>
                                    <li>Free farm tour pass (once a year)</li>
                                    <li>Special festive produce add every month</li>
                                    <li>Weekly delivery of fruits & vegetable</li>
                                    <li>Special discounts on dairy products</li>
                                </ul>
                            </div>
                            <!-- Pricing Item List End -->
                        </div>
                        <!-- Pricing Item Body End -->
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Pricing Item Start -->
                    <div class="pricing-item-gold wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Pricing Item Header Box Start -->
                        <div class="pricing-item-header-box-gold">
                            <!-- Pricing Item Header Start -->
                            <div class="pricing-item-header-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-pricing-item-3-gold.svg') }}" alt="">
                                </div>
                                <div class="pricing-item-title-gold">
                                    <h3>Premium Farm Harvest Box</h3>
                                </div>
                            </div>
                            <!-- Pricing Item Header End -->
    
                            <!-- Pricing Item Content Start -->
                            <div class="pricing-item-content-gold">
                                <p>Choose from our flexible and affordable pricing plans designed to bring fresh,</p>
                            </div>
                            <!-- Pricing Item Content End -->

                            <!-- Pricing Price Start -->
                            <div class="pricing-item-price-gold">
                                <h2>$69.00 <sub>/Monthly</sub></h2>
                            </div>
                            <!-- Pricing Price End -->
                        </div>
                        <!-- Pricing Item Header Box End -->
                            
                        <!-- Pricing Item Body Start -->
                        <div class="pricing-item-body-gold">
                            <!-- Pricing Item Button Start -->
                            <div class="pricing-item-btn-gold">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get Started With Plan</a>
                            </div>
                            <!-- Pricing Item Button End -->

                            <!-- Pricing Item List Start -->
                            <div class="pricing-item-list-gold">
                                <h3>What's included:</h3>
                                <ul>
                                    <li>Free farm tour pass (once a year)</li>
                                    <li>Special festive produce add every month</li>
                                    <li>Weekly delivery of fruits & vegetable</li>
                                    <li>Special discounts on dairy products</li>
                                </ul>
                            </div>
                            <!-- Pricing Item List End -->
                        </div>
                        <!-- Pricing Item Body End -->
                    </div>
                    <!-- Pricing Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Pricing Benifit List Start -->
                    <div class="pricing-benefit-list-gold wow fadeInUp" data-wow-delay="0.6s">
                        <ul>
                            <li><img src="{{ asset('images/icon-pricing-benefit-1.svg') }}" alt="">Get 30 day free trial</li>
                            <li><img src="{{ asset('images/icon-pricing-benefit-2.svg') }}" alt="">No any hidden fees pay</li>
                            <li><img src="{{ asset('images/icon-pricing-benefit-3.svg') }}" alt="">You can cancel anytime </li>
                        </ul>
                    </div>
                    <!-- Pricing Benifit List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Pricing Section End -->

    <!-- How It Works Section Start -->
    <div class="how-it-works-gold">
        <div class="container">
            <div class="row section-row">              
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">How it Work</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Discover how our eco-friendly farming system works</h2>
                    </div>
                    <!-- Section Title End -->                
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- How Works Item Start -->
                    <div class="how-works-item-gold box-1 wow fadeInUp">
                        <div class="how-works-item-header-gold">
                            <div class="how-works-item-no-gold">
                                <h2>01</h2>
                            </div>
                            <div class="how-works-item-image-gold">
                                <figure>
                                    <img src="{{ asset('images/how-works-item-image-1-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="how-works-item-content-gold">
                            <h3>We Grow Everything</h3>
                            <p>Our crops are cultivated using natural fertilizers, compost, and eco-friendly methods that protect soil</p>
                        </div>
                    </div>
                    <!-- How Works Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- How Works Item Start -->
                    <div class="how-works-item-gold box-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="how-works-item-header-gold">
                            <div class="how-works-item-no-gold">
                                <h2>02</h2>
                            </div>
                            <div class="how-works-item-image-gold">
                                <figure>
                                    <img src="{{ asset('images/how-works-item-image-2-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="how-works-item-content-gold">
                            <h3>Harvested at the Right Time</h3>
                            <p>Every fruit, vegetable, and herb is harvested at peak ripeness to maintain maximum nutrition,</p>
                        </div>
                    </div>
                    <!-- How Works Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- How Works Item Start -->
                    <div class="how-works-item-gold box-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="how-works-item-header-gold">
                            <div class="how-works-item-no-gold">
                                <h2>03</h2>
                            </div>
                            <div class="how-works-item-image-gold">
                                <figure>
                                    <img src="{{ asset('images/how-works-item-image-3-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="how-works-item-content-gold">
                            <h3>Quality Checked</h3>
                            <p>Each batch goes through strict quality checks before being packed in eco-friendly materials to keep it fresh</p>
                        </div>
                    </div>
                    <!-- How Works Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- How Works Item Start -->
                    <div class="how-works-item-gold box-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="how-works-item-header-gold">
                            <div class="how-works-item-no-gold">
                                <h2>04</h2>
                            </div>
                            <div class="how-works-item-image-gold">
                                <figure>
                                    <img src="{{ asset('images/how-works-item-image-4-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="how-works-item-content-gold">
                            <h3>Direct Delivery</h3>
                            <p>Once packed, your organic produce is delivered straight to your home, ensuring you get farm-fresh food</p>
                        </div>
                    </div>
                    <!-- How Works Item End -->
                </div>
                
                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                        <p><span>Free</span>Where Nature Meets Quality - <a href="{{ route('contact') }}">Discover Our Organic Farming Services!</a></p>
                        <ul>
                            <li><span class="counter">4.9</span>/5</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Our 4200 Review</li>
                        </ul>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Works Section End -->

    <!-- Our Team Section Start -->
    <div class="our-team-gold bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Team</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Skilled experts nurturing nature with sustainable care</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-gold wow fadeInUp">
                        <div class="team-item-header-gold">
                            <div class="team-item-image-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-1-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="team-item-content-gold">
                                <h2><a href="{{ route('team-details') }}">Ramesh Patel</a></h2>
                                <p>Head Farmer</p>
                            </div>
                        </div>
                        <div class="team-social-icons-gold">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-gold wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item-header-gold">
                            <div class="team-item-image-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-2-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="team-item-content-gold">
                                <h2><a href="{{ route('team-details') }}">Anita Desai</a></h2>
                                <p>Soil & Crop Specialist</p>
                            </div>
                        </div>
                        <div class="team-social-icons-gold">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-gold wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item-header-gold">
                            <div class="team-item-image-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-3-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="team-item-content-gold">
                                <h2><a href="{{ route('team-details') }}">Mahesh Kumar</a></h2>
                                <p>Livestock & Dairy Expert</p>
                            </div>
                        </div>
                        <div class="team-social-icons-gold">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Team Item End -->
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- Team Item Start -->
                    <div class="team-item-gold wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item-header-gold">
                            <div class="team-item-image-gold">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/team-4-gold.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="team-item-content-gold">
                                <h2><a href="{{ route('team-details') }}">Sunita Sharma</a></h2>
                                <p>Production Manager</p>
                            </div>
                        </div>
                        <div class="team-social-icons-gold">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Team Item End -->
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
                            <li>Over 4200 Reviews</li>
                        </ul>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Team Section End -->

    <!-- Our Faqs Section Start -->
    <div class="our-faqs-gold">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Faqs Content Start -->
                    <div class="faqs-content-gold">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Frequently Asked Questions</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Get quick answers to your common questions</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Our FAQ section is designed to provide quick, clear, and helpful answers to the questions we receive most often. Whether you're curious about our services, processes, pricing, or policies,</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Faqs Image Start -->
                        <div class="faqs-image-gold">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/faqs-image-gold.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Faqs Image End -->

                        <!-- Faqs Footer Start -->
                        <div class="faqs-footer-gold wow fadeInUp" data-wow-delay="0.4s">
                            <div class="faqs-btn-gold">
                                <a href="{{ route('contact') }}" class="btn-default">Get in Touch</a>
                            </div>
                            <div class="faqs-contact-item-gold">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-phone-primary.svg') }}" alt="">
                                </div>
                                <div class="faqs-contact-item-content-gold">
                                    <h3>Phone Number</h3>
                                    <p><a href="tel:+919725427727">+91 97254 27727</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- Faqs Footer End -->
                    </div>
                    <!-- Faqs Content End -->
                </div>

                <div class="col-xl-6">
                    <!-- FAQ Accordion Start -->
                    <div class="faq-accordion-gold" id="accordion">
                        <!-- FAQ Item Start -->
                        <div class="accordion-item-gold wow fadeInUp">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    Q1. What makes your farm products organic?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" role="region" aria-labelledby="heading1" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item-gold wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    Q2. Do you offer home delivery for fresh produce?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse show" role="region" aria-labelledby="heading2" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item-gold wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Q3. Are your fruits and vegetables pesticide-free?
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
                        <div class="accordion-item-gold wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Q4. Can we visit your farm for tours?
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
                        <div class="accordion-item-gold wow fadeInUp" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Q5. How do you ensure product freshness?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" role="region" aria-labelledby="heading5" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item-gold wow fadeInUp" data-wow-delay="1s">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    Q6. How do you manage pests without chemicals?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" role="region" aria-labelledby="heading6" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->
                    </div>
                    <!-- FAQ Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Faqs Section End -->

    <!-- Our Testimonials Section Start -->
    <div class="our-testimonials-gold bg-section dark-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Testimonials Content Start -->
                    <div class="testimonials-content-gold">
                        <!-- Testimonials Header Start -->
                        <div class="testimonials-header-gold">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Our Testimonial</h3>
                                <h2 class="text-anime-style-3" data-cursor="-opaque">What our happy organic farm customers say</h2>
                            </div>
                            <!-- Section Title End -->
                            
                            <div class="testimonials-btn-gold wow fadeInUp" data-wow-delay="0.2s">
                                <a href="{{ route('testimonials') }}" class="btn-default btn-highlighted">View All Review</a>
                            </div>
                        </div>
                        <!-- Testimonials Header End -->

                        <!-- Testimonials Image Start -->
                        <div class="testimonials-image-gold wow fadeInUp" data-wow-delay="0.4s">
                            <figure>
                                <img src="{{ asset('images/our-testimonials-image-gold.png') }}" alt="">
                            </figure>
                        </div>
                        <!-- Testimonials Image End -->
                    </div>
                    <!-- Testimonials Content End -->
                </div>

                <div class="col-xl-6">
                    <!-- Testimonials Item List Start -->
                    <div class="testimonials-item-list-gold">
                        <!-- Testimonials Item Start -->
                        <div class="testimonials-item-gold wow fadeInUp">
                            <div class="testimonials-item-header-gold">
                                <div class="testimonial-item-rating-gold">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="testimonial-item-content-gold">
                                    <p>"Their logistics solutions transformed our supply chain. On-time delivery and real-time tracking have made our operations seamless reliable, efficient, and professional service every time."</p>
                                </div>
                            </div>

                            <!-- Testimonial Item Body Start -->
                            <div class="testimonial-item-body-gold">
                                <div class="testimonial-author-gold">
                                    <div class="testimonial-author-image-gold">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="testimonial-author-content-gold">
                                        <h3>Ralph Edwards</h3>
                                        <p>Agronomist</p>
                                    </div>
                                </div>                                
                                <div class="testimonial-item-quote-gold">
                                    <img src="{{ asset('images/testimonial-quote-gold.svg') }}" alt="">
                                </div>                                            
                            </div>
                            <!-- Testimonial Item Body End -->
                        </div>
                        <!-- Testimonials Item End -->

                        <!-- Testimonials Item Start -->
                        <div class="testimonials-item-gold wow fadeInUp" data-wow-delay="0.2s">
                            <div class="testimonials-item-header-gold">
                                <div class="testimonial-item-rating-gold">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="testimonial-item-content-gold">
                                    <p>"Their logistics solutions transformed our supply chain. On-time delivery and real-time tracking have made our operations seamless reliable, efficient, and professional service every time."</p>
                                </div>
                            </div>

                            <!-- Testimonial Item Body Start -->
                            <div class="testimonial-item-body-gold">
                                <div class="testimonial-author-gold">
                                    <div class="testimonial-author-image-gold">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="testimonial-author-content-gold">
                                        <h3>Devon Lane</h3>
                                        <p>Agronomist</p>
                                    </div>
                                </div>                                
                                <div class="testimonial-item-quote-gold">
                                    <img src="{{ asset('images/testimonial-quote-gold.svg') }}" alt="">
                                </div>                                            
                            </div>
                            <!-- Testimonial Item Body End -->
                        </div>
                        <!-- Testimonials Item End -->

                        <!-- Testimonials Item Start -->
                        <div class="testimonials-item-gold wow fadeInUp" data-wow-delay="0.4s">
                            <div class="testimonials-item-header-gold">
                                <div class="testimonial-item-rating-gold">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="testimonial-item-content-gold">
                                    <p>"Their logistics solutions transformed our supply chain. On-time delivery and real-time tracking have made our operations seamless reliable, efficient, and professional service every time."</p>
                                </div>
                            </div>

                            <!-- Testimonial Item Body Start -->
                            <div class="testimonial-item-body-gold">
                                <div class="testimonial-author-gold">
                                    <div class="testimonial-author-image-gold">
                                        <figure class="image-anime">
                                            <img src="{{ asset('images/author-3.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="testimonial-author-content-gold">
                                        <h3>Darlene Robertson</h3>
                                        <p>Agronomist</p>
                                    </div>
                                </div>                                
                                <div class="testimonial-item-quote-gold">
                                    <img src="{{ asset('images/testimonial-quote-gold.svg') }}" alt="">
                                </div>                                            
                            </div>
                            <!-- Testimonial Item Body End -->
                        </div>
                        <!-- Testimonials Item End -->
                    </div>
                    <!-- Testimonials Item List End -->
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

    <!-- Footer Start -->
@endsection

@section('footer')
<footer class="main-footer-gold bg-section dark-section">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Main Footer Box Start -->
                    <div class="main-footer-box-gold">
                        <!-- Footer About Start -->
                        <div class="footer-about-gold order-1">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo-gold">
                                <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="" style="max-height: 80px; width: auto;">
                            </div>
                            <!-- Footer Logo End -->

                            <!-- About Footer Content Start -->
                            <div class="about-footer-content-gold">
                                <p>We are a dedicated organic farm committed to growing fresh, chemical-free, and naturally cultivated produce. Our mission is to promote healthy living and support sustainable</p>
                            </div>           
                            <!-- About Footer Content End -->
                                
                            <!-- Footer Social Link Start -->
                            <div class="footer-social-icons-gold">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>
                        <!-- Footer About End -->

                        <!-- Footer Newsletter Box Start -->
                        <div class="footer-newsletter-box-gold order-xl-2 order-3">
                            <h3>Newsletter Signup</h3>
                            <p>Subscribe to receive fresh updates, seasonal offers, and health tips directly</p>
                            <div class="footer-newsletter-form-gold">
                                <form id="newslettersForm" action="#" method="POST">
    @csrf
                                    <div class="form-group">
                                        <input type="email" name="mail" class="form-control" id="mail" placeholder="Enter Your Email" required>
                                        <button type="submit" class="btn-default btn-highlighted">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Footer Newsletter Box End -->

                        <!-- Footer Links Box Start -->
                        <div class="footer-links-box-gold order-xl-3 order-2">
                            <!-- Footer Links Start -->
                            <div class="footer-links-gold">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="{{ route('home-v2') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('products') }}">Our Products</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- Footer Links End -->
        
                            <!-- Footer Links Start -->
                            <div class="footer-links-gold">
                                <h3>Our Services</h3>
                                <ul>
                                    <li><a href="{{ route('service-details') }}">Farm Tours</a></li>
                                    <li><a href="{{ route('service-details') }}">Organic Farming</a></li>
                                    <li><a href="{{ route('service-details') }}">Agricultural Consulting</a></li>
                                    <li><a href="{{ route('service-details') }}">Fresh Produce Delivery</a></li>
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>
                        <!-- Footer Links Box End -->                        
                    </div>
                    <!-- Main Footer Box End -->                    
                </div>

                <div class="col-lg-12">
                    <!-- Footer Copyright Start -->
                    <div class="footer-copyright-gold">
                        <!-- Footer Copyright Text Start -->
                        <div class="footer-copyright-text-gold">
                            <p>Copyright © 2025 All Rights Reserved.</p>
                        </div>
                        <!-- Footer Copyright Text Start -->
                        
                        <!-- Footer Privacy Policy Start -->
                        <div class="footer-privacy-policy-gold">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <!-- Footer Privacy Policy End -->
                    </div>
                    <!-- Footer Copyright End -->
                </div>
            </div>
        </div>
    </footer>
@endsection
