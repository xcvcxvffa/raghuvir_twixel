@extends('layouts.app')

@section('title', 'Soilux - Agriculture & Organic Farm HTML Template')

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $title }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products') }}">products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Product Single Page Start -->
    <div class="page-product-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Product Single Box Start -->
				    <div class="page-product-single-box">
                        <!-- Product About Box Start -->
                        <div class="product-about-box">
                            <!-- Product Image Start -->
                            <div class="product-single-image wow fadeInUp">
                                <figure>
                                    <img src="{{ asset('images/product_atta_white.jpg') }}" alt="{{ $title }}">
                                </figure>
                            </div>
                            <!-- Product Image End -->

                            <!-- Product Single Content Start -->
                            <div class="product-single-content">
                                <h3 class="wow fadeInUp" data-wow-delay="0.2s" style="color: var(--accent-color); font-size: 24px; font-weight: 700; margin-bottom: 5px;">100% Pure & Farm Fresh</h3>
                                <h2 class="text-anime-style-3" style="margin-top: 0; margin-bottom: 20px;">{{ $title }}</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.4s">{{ $description }}</p>
                                
                                @php
                                    $size_list = array_map('trim', explode(',', $sizes));
                                    $default_size = $size_list[0] ?? '';
                                @endphp
                                <div class="product-pack-sizes wow fadeInUp" data-wow-delay="0.5s" style="margin-top: 25px; margin-bottom: 25px;">
                                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 12px; color: var(--primary-color);">Select Pack Size:</h4>
                                    <div class="size-badge-container" style="display: flex; gap: 10px;">
                                        @foreach($size_list as $index => $size)
                                            <button type="button" class="size-badge {{ $index === 0 ? 'active' : '' }}" onclick="selectSize(this)" style="
                                                padding: 8px 18px;
                                                font-size: 16px;
                                                font-weight: 600;
                                                border: 2px solid {{ $index === 0 ? 'var(--accent-color)' : '#CCCCCC' }};
                                                background-color: {{ $index === 0 ? 'var(--accent-color)' : '#FFFFFF' }};
                                                color: {{ $index === 0 ? '#FFFFFF' : 'var(--primary-color)' }};
                                                border-radius: 30px;
                                                cursor: pointer;
                                                transition: all 0.3s ease;
                                            " data-size="{{ $size }}">
                                                {{ $size }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="inquiry-buttons wow fadeInUp" data-wow-delay="0.6s" style="display: flex; gap: 15px; align-items: center; margin-top: 30px;">
                                    <!-- Request Inquiry Button -->
                                    <a id="inquiry-btn" href="{{ route('contact', ['product' => $title, 'size' => $default_size]) }}" class="btn-default btn-inquiry">
                                        Request Inquiry <i class="fa-solid fa-paper-plane" style="margin-left: 8px;"></i>
                                    </a>
                                    
                                    <!-- WhatsApp Button -->
                                    <a id="whatsapp-btn" href="https://wa.me/919725427727?text={{ rawurlencode("Hello Raghuvir Atta, I am interested in inquiring about {$title} ({$default_size}).") }}" target="_blank" class="btn-default btn-whatsapp">
                                        Chat on WhatsApp <i class="fa-brands fa-whatsapp" style="margin-left: 8px; font-size: 20px;"></i>
                                    </a>
                                </div>
                                
                                <script>
                                    function selectSize(element) {
                                        const badges = document.querySelectorAll('.size-badge');
                                        badges.forEach(badge => {
                                            badge.classList.remove('active');
                                            badge.style.borderColor = '#CCCCCC';
                                            badge.style.backgroundColor = '#FFFFFF';
                                            badge.style.color = 'var(--primary-color)';
                                        });
                                        
                                        element.classList.add('active');
                                        element.style.borderColor = 'var(--accent-color)';
                                        element.style.backgroundColor = 'var(--accent-color)';
                                        element.style.color = '#FFFFFF';
                                        
                                        const selectedSize = element.getAttribute('data-size');
                                        const productTitle = @json($title);
                                        
                                        // Update WhatsApp Button Link
                                        const whatsappBtn = document.getElementById('whatsapp-btn');
                                        const waMessage = `Hello Raghuvir Atta, I am interested in inquiring about ${productTitle} (${selectedSize}).`;
                                        whatsappBtn.href = `https://wa.me/919725427727?text=${encodeURIComponent(waMessage)}`;
                                        
                                        // Update Request Inquiry Button Link
                                        const inquiryBtn = document.getElementById('inquiry-btn');
                                        const contactBaseUrl = @json(route('contact'));
                                        inquiryBtn.href = `${contactBaseUrl}/${encodeURIComponent(productTitle)}/${encodeURIComponent(selectedSize)}`;
                                    }
                                </script>                               
                            </div>
                            <!-- Product Single Content End -->
                        </div>
                        <!-- Product About Box End -->

                        <!-- Product Single Info Start -->
                        <div class="product-single-info">
                            <!-- Product Single Box Start -->
                            <div class="product-single-box tab-content wow fadeInUp" data-wow-delay="0.25s" id="producttab">
                                <!-- Product Step Nav start -->
                                <div class="product-step-nav">
                                    <ul class="nav nav-tabs" id="pTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="first-tab" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">Description</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="second-tab" data-bs-toggle="tab" data-bs-target="#second" type="button" role="tab" aria-controls="second" aria-selected="false">Reviews</button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Product Step Nav End -->
                                
                                <!-- Product Tab Item Box Start -->
                                <div class="product-tab-item-box tab-pane fade show active" id="first" role="tabpanel">
                                    <div class="product-tab-item-content">
                                        <h2>Better Taste and Freshness</h2>
                                        <p>Organic vegetables are grown without synthetic pesticides, fertilizers, or harmful chemicals, making them safer for daily consumption.Naturally grown vegetables have a richer flavor and fresher texture due to healthy soil practices.</p>
                                        <ul>
                                            <li>The high antioxidant content helps strengthen immunity</li>
                                            <li>Natural compost and crop rotation improve soil fertility</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Product Tab Item End -->
                                
                                <!-- Product Tab Item Box Start -->
                                <div class="product-tab-item-box tab-pane fade" id="second" role="tabpanel">
                                    <div class="product-review-from-content">
                                        <!-- Customer Review List Start -->
                                        <div class="customer-review-list">
                                            <div class="customer-review-item">
                                                <div class="icon-box">
                                                    <img src="{{ asset('images/author-1.jpg') }}" alt="">
                                                </div>
                                                <div class="customer-review-item-body">
                                                    <div class="customer-review-item-content">
                                                        <p><span>Author</span> - Dec 14, 2025</p>
                                                        <p>Truly organic and chemical-free</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="customer-review-item">
                                                <div class="icon-box">
                                                    <img src="{{ asset('images/author-2.jpg') }}" alt="">
                                                </div>
                                                <div class="customer-review-item-body">
                                                    <div class="customer-review-item-content">
                                                        <p>Author - Dec 10, 2025</p>
                                                        <p>Fresh, clean, and full of flavor.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Customer Review List End -->

                                        <!-- Contact Form Start -->
                                        <div class="review-form">
                                            <div class="review-form-content">
                                                <h3>Add a review</h3>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                            </div>
                                            <form id="reviewForm" action="#" method="POST" data-toggle="validator">
    @csrf
                                                <div class="row">                                
                                                    <div class="form-group col-md-12 mb-4">
                                                        <input type="text" name="review" class="form-control" id="review" placeholder="Your review" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-4">
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-4">
                                                        <input type="email" name ="email" class="form-control" id="email" placeholder="Email" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group review-form-note">
                                                        <input type="checkbox" id="#" name="#">
                                                        <label class="form-label">Save my name, email, and website in this browser for the next time I comment.</label>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn-default">Submit Message</button>
                                                        <div id="msgSubmit" class="h3 hidden"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Contact Form End -->
                                    </div>                                    
                                </div>
                                <!-- Product Tab Item Box End -->
                            </div>
                            <!-- Product Single Box End -->
                        </div> 
                        <!-- Product Single Info End -->
                    </div>
                    <!-- Page Product Single Box End -->
                </div>
            </div>

            <div class="row related-products-box">
                <div class="col-lg-12">
                    <!-- Section-title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3">Related products</h2>
                    </div>
                    <!-- Section-title End -->
                </div>

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
                                <p>Pack Size: 5kg, 30kg</p>                                                    
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
                                <p>Pack Size: 30kg</p>                                                    
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
                                <p>Pack Size: 49kg</p>                                                    
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
    <!-- Product Single Page End -->

    <!-- Main Footer End -->
@endsection
