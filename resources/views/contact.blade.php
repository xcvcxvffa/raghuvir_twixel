@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Contact Us</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Contact Us Today!</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Let's talk about fresh, healthy, and sustainable farming</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <!-- Contact Us Image Box Start -->
                    <div class="contact-us-image-box wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Contact Us Image Start -->
                        <div class="contact-us-image">
                            <figure class="image-anime">
                                <img src="{{ asset('images/contact-us-img.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Contact Us Image End -->

                        <!-- Contact Info List Start -->
                        <div class="contact-info-list">
                            <!-- Contact Info Item Start  -->
                            <div class="contact-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-phone-primary.svg') }}" alt="">
                                </div>
                                <div class="contact-info-item-content">
                                    <h3>Phone Number</h3>
                                    <p><a href="tel:+919725427727">+91 97254 27727</a></p>
                                </div>
                            </div>
                            <!-- Contact Info Item End  -->

                            <!-- Contact Info Item Start  -->
                            <div class="contact-info-item">
                                <div class="icon-box">
                                    <img src="{{ asset('images/icon-mail-primary.svg') }}" alt="">
                                </div>
                                <div class="contact-info-item-content">
                                    <h3>Email Address</h3>
                                    <p><a href="mailto:info@domainname.com">info@domainname.com</a></p>
                                </div>
                            </div>
                            <!-- Contact Info Item End  -->
                        </div>
                        <!-- Contact Info List End -->
                    </div>
                    <!-- Contact Us Image Box End -->
                </div>

                <div class="col-xl-6">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Get In Touch</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">From soil preparation to the final harvest, we use sustainable, chemical-free methods that protect biodiversity, enrich the soil, and preserve natural</p>
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
                                        <textarea name="message" class="form-control" id="message" rows="6" placeholder="Any Additional Message...">@if($product && $size)Hello Raghuvir Atta, I am interested in inquiring about {{ $product }} ({{ $size }}). Please provide more details.@endif</textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
            
                                    <div class="col-lg-12">
                                        <div class="contact-form-btn">
                                            <button type="submit" class="btn-default"><span>Send Message</span></button>
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
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Start -->
    <div class="google-map">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">How to Reach us ?</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">We're here to help reach out for directions or farm visits</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Start -->
                    <div class="google-map-iframe wow fadeInUp" data-wow-delay="0.2s">
                        <iframe src="https://maps.google.com/maps?q=Plot%20No%20182,%20Vibrant%20Prime%20Industrial%20Park,%20kadadara,%20GIDC%20Area,%20Dehgam,%20Gandhinagar,%20Gujarat,%20382305&t=&z=14&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map End -->

@endsection
