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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our Gallery</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Photo Gallery Start -->
    <div class="page-gallery">
        <div class="container">
            <!-- gallery section start -->
            <div class="row gallery-items page-gallery-box">
                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp">
                        <a href="{{ asset('images/gallery-1.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-1.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="0.2s">
                        <a href="{{ asset('images/gallery-2.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-2.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="0.4s">
                        <a href="{{ asset('images/gallery-3.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-3.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="0.6s">
                        <a href="{{ asset('images/gallery-4.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-4.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="0.8s">
                        <a href="{{ asset('images/gallery-5.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-5.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="1s">
                        <a href="{{ asset('images/gallery-6.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-6.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>
                
                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="1.2s">
                        <a href="{{ asset('images/gallery-7.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-7.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="1.4s">
                        <a href="{{ asset('images/gallery-8.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-8.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>

                <div class="col-lg-4 col-6">
                    <!-- Image Gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="1.6s">
                        <a href="{{ asset('images/gallery-9.jpg') }}" data-cursor-text="View">
                            <figure class="image-anime">
                                <img src="{{ asset('images/gallery-9.jpg') }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- Image Gallery end -->
                </div>
            </div>
            <!-- gallery section end -->
        </div>
    </div>
    <!-- Photo Gallery End -->

    <!-- Main Footer End -->
@endsection
