@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('team-details') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('team-details') }}') !important; background-position: {{ \App\Models\PageBanner::getPosition('team-details') }} !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Guy Hawkins</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('team') }}">team</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Guy Hawkins</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Team Single Start -->
    <div class="page-team-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Page Single Sidebar Start -->
                    <div class="page-single-sidebar">
                        <!-- Team Single Image Start -->
                        <div class="team-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('images/team-3.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Team Single Image End -->

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
                    <!-- Team Single Content Start -->
                    <div class="team-single-content">
                        <!-- Team Member About Start -->
                        <div class="team-member-about">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">About Me</h2>
                            </div>
                            <!-- Team Member About Body Start -->
                            <div class="team-member-about-body">
                                <p class="wow fadeInUp">Guy Hawkins brings decades of hands-on experience and deep-rooted passion to the world of sustainable agriculture. Growing up close to nature, he developed an early appreciation for the land, which later evolved into a dedicated career focused on organic farming.</p>
                                <p class="wow fadeInUp">Over the years, Guy has led numerous projects aimed at improving crop quality, enhancing soil fertility, and reducing environmental impact through smart, science-backed farming practices. Known for his forward-thinking mindset, Guy blends traditional agricultural wisdom with modern, sustainable techniques to create farming solutions</p>

                                <!-- Member Social List Start -->
                                <div class="member-social-list wow fadeInUp" data-wow-delay="0.2s">
                                    <h3>Follow me on socials:</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-dribbble"></i>Dribbble</a></li>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i>LinkedIn</a></li>
                                    </ul>
                                </div>
                                <!-- Member Social List End -->
                            </div>
                            <!-- Team Member About Body Start -->
                        </div>
                        <!-- Team Member About End -->

                        <!-- Team Expertise Start -->
                        <div class="team-expertise">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">My expertise</h2>
                                <p class="wow fadeInUp">With years of hands-on experience in sustainable agriculture, I specialize in developing farming practices that balance productivity with environmental responsibility. My expertise spans soil health management, organic crop cultivation, eco-friendly pest control, and long-term farm planning designed to maximize yield while preserving natural resources.</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Team Expertise List Start -->
                            <div class="team-expertise-list wow fadeInUp" data-wow-delay="0.2s">
                                <!-- Team Expertise Item Start -->
                                <div class="team-expertise-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('images/icon-team-expertise-1.svg') }}" alt="">
                                    </div>
                                    <div class="team-expertise-item-content">
                                        <h3>Comprehensive Farm Assessment</h3>
                                        <p>We evaluate soil quality, water availability, crop patterns, and overall farm health.</p>
                                    </div>
                                </div>
                                <!-- Team Expertise Item End -->

                                <!-- Team Expertise Item Start -->
                                <div class="team-expertise-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('images/icon-team-expertise-2.svg') }}" alt="">
                                    </div>
                                    <div class="team-expertise-item-content">
                                        <h3>Eco-Friendly Farming Techniques</h3>
                                        <p>Guidance on composting, natural fertilizers, crop rotation, cover cropping, etc..</p>
                                    </div>
                                </div>
                                <!-- Team Expertise Item End -->
                            </div>
                            <!-- Team Expertise List End -->

                            <!-- Team Expertise List Start -->
                            <div class="team-expertise-image">
                                <figure class="image-anime reveal">
                                    <img src="{{ asset('images/team-expertise-img.jpg') }}" alt="">
                                </figure>
                            </div>
                            <!-- Team Expertise List End -->
                        </div>
                        <!-- Team Expertise End -->

                        <!-- Contact Us Form Start -->
                        <div class="contact-us-form team-contact-form">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Get in touch</h2>
                                <p class="wow fadeInUp">Have questions, need guidance, or want to explore our organic farming solutions? We'd love to hear from you. Reach out to our team anytime for expert assistance, detailed information, or personalized support.</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s">
    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name *" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                
                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name *" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="email" name ="email" class="form-control" id="email" placeholder="Email Address *" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number *" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-12 mb-5">
                                            <textarea name="message" class="form-control" id="message" rows="7" placeholder="Any Additional Message..."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                
                                        <div class="col-lg-12">
                                            <div class="contact-form-btn">
                                                <button type="submit" class="btn-default"><span>Submit Message</span></button>
                                                <div id="msgSubmit" class="h3 hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Contact Form End -->
                        </div>
                        <!-- Contact Us Form End -->
                    </div>
                    <!-- Team Single Content End -->
                </div>
            </div>    
        </div>
    </div>
    <!-- Page Team Single End -->

    <!-- Main Footer End -->
@endsection
