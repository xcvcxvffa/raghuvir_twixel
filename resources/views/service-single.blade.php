@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('service-details') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('service-details') }}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Sustainable Farming Consultation</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('services') }}">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sustainable Farming Consultation</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Service Single Start -->
    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Page Single Sidebar Start -->
                    <div class="page-single-sidebar">
                        <!-- Page Category List Start -->
                        <div class="page-category-list wow fadeInUp">
                            <h3>Explore Our Services</h3>
                            <ul>
                                <li><a href="#">Sustainable Farming</a></li>
                                <li><a href="#">Organic Fertilizer & Soil Care</a></li>
                                <li><a href="#">Organic Dairy & Farm Products</a></li>
                                <li><a href="#">Seed & Plant Nursery</a></li>
                                <li><a href="#">Organic Crop Production</a></li>
                            </ul>
                        </div>
                        <!-- Page Category List End -->

                        <!-- Sidebar CTA Box Start -->
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                            <div class="sidebar-cta-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('images/sidebar-cta-image.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="sidebar-cta-body">
                                <div class="sidebar-cta-content">
                                    <h3>Contact Us</h3>
                                    <p>We'd love to hear from you! Whether you have questions about our organic produce.</p>
                                </div>

                                <div class="sidebar-cta-contact-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('images/icon-phone-primary.svg') }}" alt="">
                                    </div>

                                    <div class="sidebar-cta-contact-content">
                                        <h3>Phone Number</h3>
                                        <p><a href="tel:+919725427727">+91 97254 27727</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar CTA Box End -->
                    </div>
                    <!-- Page Single Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <!-- Service Single Content Start -->
                    <div class="service-single-content">
                        <!-- Page Single Image Start -->
                        <div class="page-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/service-single-image.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Page Single Image End -->
                        
                        <!-- Service Entry Start -->
                        <div class="service-entry">
                            <p class="wow fadeInUp">Our Sustainable Farming Consultation service is designed to help farmers, businesses, and individuals adopt eco-friendly and efficient agricultural practices. We provide expert guidance on improving soil health, maximizing crop yield naturally, and implementing environmentally responsible techniques.</p>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Our Sustainable Farming Consultation service is designed to help farmers, businesses, and agricultural enthusiasts adopt environmentally responsible practices that boost productivity while preserving natural resources. We combine years of experience in organic farming with modern eco-friendly strategies to create a comprehensive plan tailored to your farm's unique needs.</p>

                            <!-- Service Why Choose Box Start -->
                            <div class="service-why-choose-box">
                                <h2 class="text-anime-style-3">Why choose this service</h2>
                                <p class="wow fadeInUp">By leveraging our expertise and personalized approach, you can transform your farm into a model of sustainability, ensuring that your produce is healthy, your land remains fertile, and your operations are efficient—all while protecting the environment for future generations.</p>

                                <!-- Service Why Choose Item List Start -->
                                <div class="service-why-choose-item-list wow fadeInUp" data-wow-delay="0.4s">
                                    <!-- Service Why Choose Item Start -->
                                    <div class="service-single-item">
                                        <div class="icon-box">
                                            <img src="{{ asset('images/icon-service-why-choose-1.svg') }}" alt="">
                                        </div>
                                        <div class="service-single-item-content">
                                            <h3>Comprehensive Farm Assessment</h3>
                                            <p>We evaluate soil quality, water availability, crop patterns, and overall farm health.</p>
                                        </div>
                                    </div>
                                    <!-- Service Why Choose Item End -->

                                    <!-- Service Why Choose Item Start -->
                                    <div class="service-single-item">
                                        <div class="icon-box">
                                            <img src="{{ asset('images/icon-service-why-choose-2.svg') }}" alt="">
                                        </div>
                                        <div class="service-single-item-content">
                                            <h3>Eco-Friendly Farming Techniques</h3>
                                            <p>Guidance on composting, natural fertilizers, crop rotation, cover cropping, etc..</p>
                                        </div>
                                    </div>
                                    <!-- Service Why Choose Item End -->

                                    <!-- Service Why Choose Item Start -->
                                    <div class="service-single-item">
                                        <div class="icon-box">
                                            <img src="{{ asset('images/icon-service-why-choose-3.svg') }}" alt="">
                                        </div>
                                        <div class="service-single-item-content">
                                            <h3>Soil & Resource Management</h3>
                                            <p>Recommendations to maintain and enrich soil fertility, reduce erosion, conserve water.</p>
                                        </div>
                                    </div>
                                    <!-- Service Why Choose Item End -->

                                    <!-- Service Why Choose Item Start -->
                                    <div class="service-single-item">
                                        <div class="icon-box">
                                            <img src="{{ asset('images/icon-service-why-choose-4.svg') }}" alt="">
                                        </div>
                                        <div class="service-single-item-content">
                                            <h3>Training & Knowledge Sharing</h3>
                                            <p>Hands-on workshops, farm visits, and ongoing support to equip you with practical skills.</p>
                                        </div>
                                    </div>
                                    <!-- Service Why Choose Item End -->
                                </div>
                                <!-- Service Why Choose Item List End -->

                                <p class="wow fadeInUp" data-wow-delay="0.8s">Farmers, agricultural businesses, community farms, NGOs, and anyone looking to transition to sustainable, organic, and environmentally conscious farming practices.</p>
                            </div>
                            <!-- Service Why Choose Box End -->

                            <!-- Service Benefit Box Start -->
                            <div class="service-benefit-box">
                                <h2 class="text-anime-style-3">Benefits by choosing us</h2>
                                <p class="wow fadeInUp">When you choose our farm, you're not just getting fresh, organic produce—you're partnering with a team dedicated to sustainability, quality, and integrity. Our eco-friendly farming methods ensure healthier crops and nutrient-rich food, while our commitment to transparency and responsible practices.</p>

                                <!-- Service Benefits Item Body Start -->
                                <div class="service-benefit-item-image">
                                    <!-- Service Benefits List Start -->
                                    <div class="service-benefit-item-list wow fadeInUp" data-wow-delay="0.2s">
                                        <!-- Service Benefits Item Start -->
                                        <div class="service-benefit-item-box">
                                            <div class="service-single-item">
                                                <div class="icon-box">
                                                    <img src="{{ asset('images/icon-service-benefit-1.svg') }}" alt="">
                                                </div>
                                                <div class="service-single-item-content">
                                                    <h3>Sustainably Grown, Healthier Produce</h3>
                                                    <p>Our farm follows eco-friendly and organic practices, ensuring you receive fresh.</p>
                                                </div>
                                            </div>
                                            <div class="service-benefit-item-body">
                                                <ul>
                                                    <li>Enjoy fresh, chemical-free fruits and vegetables grown</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Service Benefits Item End -->

                                        <!-- Service Benefits Item Start -->
                                        <div class="service-benefit-item-box">
                                            <div class="service-single-item">
                                                <div class="icon-box">
                                                    <img src="{{ asset('images/icon-service-benefit-2.svg') }}" alt="">
                                                </div>
                                                <div class="service-single-item-content">
                                                    <h3>Expertise from Soil to Harvest</h3>
                                                    <p>Our dedicated team ensures optimal crop growth, high-quality yields, and responsible farming.</p>
                                                </div>
                                            </div>
                                            <div class="service-benefit-item-body">
                                                <ul>
                                                    <li>Ensuring farming methods that sustain the environment</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Service Benefits Item End -->
                                    </div>
                                    <!-- Service Benefits List End -->

                                    <!-- Service Benefits Image Start -->
                                    <div class="service-benefit-image wow fadeInUp" data-wow-delay="0.4s">
                                        <figure class="image-anime reveal">
                                            <img src="{{ asset('images/service-benefit-image.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <!-- Service Benefits Image End -->
                                </div>
                                <!-- Service Benefits Item Body End -->
                            </div>
                            <!-- Service Benefit Box End -->
                        </div>
                        <!-- Service Entry End -->

                        <!-- Page Single FAQs Start -->
                        <div class="page-single-faqs">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Frequently Asked Questions</h2>
                                <p class="wow fadeInUp">Our FAQ section is designed to answer all your common queries about our organic farm, sustainable practices, and services. Whether you want to learn about how we grow our crops, the delivery process, or our eco-friendly farming methods.</p>
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
                        <!-- Page Single FAQs End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Service Single End -->

    <!-- Main Footer End -->
@endsection
