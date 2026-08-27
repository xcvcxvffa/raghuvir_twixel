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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our products</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Products Start -->
    <div class="page-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details', ['product' => 'atta']) }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="Atta">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <h2><a href="{{ route('product-details', ['product' => 'atta']) }}">Atta</a></h2>
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details', ['product' => 'atta']) }}" class="btn-default">View Details</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details', ['product' => 'bati']) }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="Bati Atta">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <h2><a href="{{ route('product-details', ['product' => 'bati']) }}">Bati Atta</a></h2>
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details', ['product' => 'bati']) }}" class="btn-default">View Details</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Product Item Image Start -->
                        <div class="product-item-img">
                            <a href="{{ route('product-details', ['product' => 'wheat']) }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="Wheat Atta">
                                </figure>
                            </a>
                        </div>
                        <!-- Product Item Image End -->

                        <!-- Product Item Body Start -->
                        <div class="product-item-body">                            
                            <div class="product-item-content">
                                <h2><a href="{{ route('product-details', ['product' => 'wheat']) }}">Wheat Atta</a></h2>
                            </div>

                            <div class="product-item-btn">
                                <a href="{{ route('product-details', ['product' => 'wheat']) }}" class="btn-default">View Details</a>
                            </div>
                        </div>
                        <!-- Product Item Body End -->
                    </div>
                    <!-- Product Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Products End -->

    <!-- Main Footer End -->
@endsection
