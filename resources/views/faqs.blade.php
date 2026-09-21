@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('faqs') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('faqs') }}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Frequently Asked Questions</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Faqs Start -->
    <div class="page-faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Page Single Sidebar Start -->
                    <div class="page-single-sidebar">
                        <!-- Page Category List Start -->
                        <div class="page-category-list wow fadeInUp">
                            <ul>
                                <li><a href="#faq_1">General Questions</a></li>
                                <li><a href="#faq_2">Organic Farming</a></li>
                                <li><a href="#faq_3">Delivery & Orders</a></li>
                                <li><a href="#faq_4">Farming Practices</a></li>
                                <li><a href="#faq_5">Sustainability & Environment</a></li>
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
                    <!-- Page FAQs Catagery Start -->
                    <div class="page-faqs-catagery">
                        <!-- FAQs section start -->
                        <div class="page-single-faqs" id="faq_1">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">General Questions</h2>
                            </div>

                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion our-faq-accordion" id="accordion">
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
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                        <div class="page-single-faqs" id="faq_2">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Organic Farming</h2>
                            </div>

                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion our-faq-accordion" id="accordion1">
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="heading6">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                            Q1. What makes your farm products organic?
                                        </button>
                                    </h2>
                                    <div id="collapse6" class="accordion-collapse collapse show" role="region" aria-labelledby="heading6" data-bs-parent="#accordion1">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="accordion-header" id="heading7">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                            Q2. Do you use any chemical additives in your produce?
                                        </button>
                                    </h2>
                                    <div id="collapse7" class="accordion-collapse collapse" role="region" aria-labelledby="heading7" data-bs-parent="#accordion1">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="accordion-header" id="heading8">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                            Q3. How do you maintain freshness during delivery?
                                        </button>
                                    </h2>
                                    <div id="collapse8" class="accordion-collapse collapse" role="region" aria-labelledby="heading8" data-bs-parent="#accordion1">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                    <h2 class="accordion-header" id="heading9">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                            Q4. Do you offer seasonal produce boxes?
                                        </button>
                                    </h2>
                                    <div id="collapse9" class="accordion-collapse collapse" role="region" aria-labelledby="heading9" data-bs-parent="#accordion1">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                    <h2 class="accordion-header" id="heading10">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                            Q5. How do you manage pests without chemicals?
                                        </button>
                                    </h2>
                                    <div id="collapse10" class="accordion-collapse collapse" role="region" aria-labelledby="heading10" data-bs-parent="#accordion1">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                        <div class="page-single-faqs" id="faq_3">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Delivery & Orders</h2>
                            </div>

                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion our-faq-accordion" id="accordion2">
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="heading11">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                            Q1. What makes your farm products organic?
                                        </button>
                                    </h2>
                                    <div id="collapse11" class="accordion-collapse collapse show" role="region" aria-labelledby="heading11" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="accordion-header" id="heading12">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                            Q2. Do you use any chemical additives in your produce?
                                        </button>
                                    </h2>
                                    <div id="collapse12" class="accordion-collapse collapse" role="region" aria-labelledby="heading12" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="accordion-header" id="heading13">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                            Q3. How do you maintain freshness during delivery?
                                        </button>
                                    </h2>
                                    <div id="collapse13" class="accordion-collapse collapse" role="region" aria-labelledby="heading13" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                    <h2 class="accordion-header" id="heading14">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                            Q4. Do you offer seasonal produce boxes?
                                        </button>
                                    </h2>
                                    <div id="collapse14" class="accordion-collapse collapse" role="region" aria-labelledby="heading14" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                    <h2 class="accordion-header" id="heading15">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                            Q5. How do you manage pests without chemicals?
                                        </button>
                                    </h2>
                                    <div id="collapse15" class="accordion-collapse collapse" role="region" aria-labelledby="heading15" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                        <div class="page-single-faqs" id="faq_4">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Farming Practices</h2>
                            </div>
                            
                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion our-faq-accordion" id="accordion3">
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="heading16">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                            Q1. What makes your farm products organic?
                                        </button>
                                    </h2>
                                    <div id="collapse16" class="accordion-collapse collapse show" role="region" aria-labelledby="heading16" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="accordion-header" id="heading17">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                            Q2. Do you use any chemical additives in your produce?
                                        </button>
                                    </h2>
                                    <div id="collapse17" class="accordion-collapse collapse" role="region" aria-labelledby="heading17" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="accordion-header" id="heading18">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                            Q3. How do you maintain freshness during delivery?
                                        </button>
                                    </h2>
                                    <div id="collapse18" class="accordion-collapse collapse" role="region" aria-labelledby="heading18" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                    <h2 class="accordion-header" id="heading19">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                            Q4. Do you offer seasonal produce boxes?
                                        </button>
                                    </h2>
                                    <div id="collapse19" class="accordion-collapse collapse" role="region" aria-labelledby="heading19" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                    <h2 class="accordion-header" id="heading20">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                            Q5. How do you manage pests without chemicals?
                                        </button>
                                    </h2>
                                    <div id="collapse20" class="accordion-collapse collapse" role="region" aria-labelledby="heading20" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                        <div class="page-single-faqs" id="faq_5">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Sustainability & Environment</h2>
                            </div>
                            
                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion our-faq-accordion" id="accordion4">
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="heading21">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                            Q1. What makes your farm products organic?
                                        </button>
                                    </h2>
                                    <div id="collapse21" class="accordion-collapse collapse show" role="region" aria-labelledby="heading21" data-bs-parent="#accordion4">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="accordion-header" id="heading22">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                            Q2. Do you use any chemical additives in your produce?
                                        </button>
                                    </h2>
                                    <div id="collapse22" class="accordion-collapse collapse" role="region" aria-labelledby="heading22" data-bs-parent="#accordion4">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="accordion-header" id="heading23">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapse23">
                                            Q3. How do you maintain freshness during delivery?
                                        </button>
                                    </h2>
                                    <div id="collapse23" class="accordion-collapse collapse" role="region" aria-labelledby="heading23" data-bs-parent="#accordion4">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                    <h2 class="accordion-header" id="heading24">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse24" aria-expanded="false" aria-controls="collapse24">
                                            Q4. Do you offer seasonal produce boxes?
                                        </button>
                                    </h2>
                                    <div id="collapse24" class="accordion-collapse collapse" role="region" aria-labelledby="heading24" data-bs-parent="#accordion4">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                    <h2 class="accordion-header" id="heading25">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                            Q5. How do you manage pests without chemicals?
                                        </button>
                                    </h2>
                                    <div id="collapse25" class="accordion-collapse collapse" role="region" aria-labelledby="heading25" data-bs-parent="#accordion4">
                                        <div class="accordion-body">
                                            <p>We follow natural farming methods, avoid all chemical fertilizers and pesticides, and focus on soil health to ensure every product is clean and truly organic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->
                    </div> 
                    <!-- Page FAQs Catagery End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Faqs End -->

    <!-- Main Footer End -->
@endsection
