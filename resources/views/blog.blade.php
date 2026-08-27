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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our blog</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">blog</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Blog Start -->
    <div class="page-blog">
        <div class="container">
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

                <div class="col-xl-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.6s">
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-4.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->
                             
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">A Complete Guide to Growing Seasonal Fruits and Vegetables</a></h2>
                                <p>Learn about soil preparation, natural fertilizers, pest management, and techniques.</p>
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
                    <div class="post-item wow fadeInUp" data-wow-delay="0.8s">
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-5.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->
                             
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">Behind the Scenes: Ensuring Freshness from Farm to Your Home</a></h2>
                                <p>Take a closer look at how our farm ensures the freshest produce reaches your doorstep.</p>
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
                    <div class="post-item wow fadeInUp" data-wow-delay="1s">
                        <!-- Post Item Body Start -->
                        <div class="post-item-box">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="{{ route('blog-details') }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="{{ asset('images/post-6.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->
                             
                            <!-- Post Item Content Start -->
                            <div class="post-item-content">
                                <h2><a href="{{ route('blog-details') }}">Sustainable Farming Practices Every Small Farmer Should Know</a></h2>
                                <p>Discover strategies for adopting sustainable farming methods on small plots of land.</p>
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

                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.6s">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Page Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Blog End -->

    <!-- Main Footer End -->
@endsection
