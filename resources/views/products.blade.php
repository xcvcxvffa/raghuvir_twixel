@extends('layouts.app')

@section('title', 'Our Products - Raghuvir Atta')

@push('styles')
<style>
.product-card-horizontal {
    display: flex;
    align-items: center;
    gap: 40px 60px;
    background: var(--secondary-color, #F5F1E9);
    border-radius: 16px;
    padding: 35px 30px;
    margin-bottom: 45px;
    transition: all 0.3s ease-in-out;
}
.product-card-horizontal:hover {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}
.product-card-image-wrap {
    width: calc(45% - 30px);
    background: #FFFFFF;
    border-radius: 16px;
    padding: 30px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ECE7DD;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
    overflow: hidden;
}
.product-card-image-wrap a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}
.product-card-image-wrap img {
    max-height: 350px;
    width: auto;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.4s ease;
}
.product-card-image-wrap:hover img {
    transform: scale(1.04);
}
.product-card-info {
    width: calc(55% - 30px);
}
.size-badge.active {
    background-color: var(--accent-color, #EF801C) !important;
    border-color: var(--accent-color, #EF801C) !important;
    color: #FFFFFF !important;
}
.btn-whatsapp {
    background-color: #25D366 !important;
    border-color: #25D366 !important;
    color: #FFFFFF !important;
}
.btn-whatsapp:hover {
    background-color: #1EBE5D !important;
    border-color: #1EBE5D !important;
    color: #FFFFFF !important;
}
@media (max-width: 991px) {
    .product-card-horizontal {
        flex-direction: column;
        gap: 25px;
        padding: 25px 20px;
    }
    .product-card-image-wrap,
    .product-card-info {
        width: 100%;
    }
    .inquiry-buttons {
        flex-direction: column;
        align-items: stretch !important;
    }
    .inquiry-buttons a {
        width: 100%;
        text-align: center;
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
<!-- Header End -->

    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our Products</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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

    @php
        $productList = $products ?? [
            [
                'slug' => 'bati',
                'title' => 'Bati Atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['5kg', '30kg'],
                'description' => 'Raghuvir Bati Atta is specially milled to the perfect texture for making delicious, authentic Batis. Ground from handpicked premium wheat grains, it ensures your Batis are crispy on the outside and soft on the inside.',
                'image' => 'images/product_atta_white.jpg',
            ],
            [
                'slug' => 'atta',
                'title' => 'Whole Wheat Atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['5kg', '30kg'],
                'description' => 'Raghuvir Hygienic Whole Wheat Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients. Ensuring fresh, soft, and healthy rotis for your family.',
                'image' => 'images/product_atta_white.jpg',
            ],
            [
                'slug' => 'wheat',
                'title' => 'Wheat Bran',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['49kg'],
                'description' => 'Raghuvir Wheat Bran is high-quality, fiber-rich flour ideal for bulk baking, catering, and home use. Milled under strict quality controls to maintain its nutritional integrity.',
                'image' => 'images/product_atta_white.jpg',
            ]
        ];
    @endphp


    <!-- Page Products Start -->
    <div class="page-products" style="padding: 90px 0 60px;">
        <div class="container">
            @foreach($productList as $index => $product)
                @php
                    $sizes = is_array($product['sizes']) ? $product['sizes'] : array_map('trim', explode(',', $product['sizes']));
                    $defaultSize = $sizes[0] ?? '';
                @endphp
                <!-- Product Horizontal Card Start -->
                <div class="product-card-horizontal wow fadeInUp" data-wow-delay="{{ 0.2 * $index }}s">
                    <!-- Product Image Box Start -->
                    <div class="product-card-image-wrap">
                        <a href="{{ route('product-details', ['product' => $product['slug']]) }}" title="View {{ $product['title'] }}" data-cursor-text="View">
                            <figure style="margin: 0; display: flex; align-items: center; justify-content: center; width: 100%;">
                                <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}">
                            </figure>
                        </a>
                    </div>
                    <!-- Product Image Box End -->

                    <!-- Product Info Start -->
                    <div class="product-card-info">
                        <h3 style="color: var(--accent-color); font-size: 22px; font-weight: 700; margin-bottom: 8px;">
                            {{ $product['subtitle'] ?? '100% Pure & Farm Fresh' }}
                        </h3>

                        <h2 style="font-size: 42px; font-weight: 800; color: var(--primary-color); margin-top: 0; margin-bottom: 18px; line-height: 1.25;">
                            <a href="{{ route('product-details', ['product' => $product['slug']]) }}" style="color: inherit; text-decoration: none;">
                                {{ $product['title'] }}
                            </a>
                        </h2>

                        <p style="font-size: 16px; line-height: 1.7; color: var(--text-color); margin-bottom: 25px;">
                            {{ $product['description'] }}
                        </p>

                        <!-- Pack Sizes Start -->
                        <div class="product-pack-sizes" style="margin-bottom: 28px;">
                            <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 12px; color: var(--primary-color);">Select Pack Size:</h4>
                            <div class="size-badge-container" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                @foreach($sizes as $sIndex => $size)
                                    <button type="button" 
                                            class="size-badge {{ $sIndex === 0 ? 'active' : '' }}" 
                                            onclick="selectProductSize(this)" 
                                            style="
                                                padding: 8px 22px;
                                                font-size: 16px;
                                                font-weight: 600;
                                                border: 2px solid {{ $sIndex === 0 ? 'var(--accent-color)' : '#CCCCCC' }};
                                                background-color: {{ $sIndex === 0 ? 'var(--accent-color)' : '#FFFFFF' }};
                                                color: {{ $sIndex === 0 ? '#FFFFFF' : 'var(--primary-color)' }};
                                                border-radius: 30px;
                                                cursor: pointer;
                                                transition: all 0.3s ease;
                                            " 
                                            data-size="{{ $size }}" 
                                            data-product-title="{{ $product['title'] }}" 
                                            data-contact-url="{{ route('contact') }}">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <!-- Pack Sizes End -->

                        <!-- Action Buttons Start -->
                        <div class="inquiry-buttons" style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
                            <!-- Request Inquiry Button -->
                            <a href="{{ route('contact', ['product' => $product['title'], 'size' => $defaultSize]) }}" class="btn-default btn-inquiry">
                                Request Inquiry <i class="fa-solid fa-paper-plane" style="margin-left: 8px;"></i>
                            </a>
                            
                            <!-- WhatsApp Button -->
                            <a href="https://wa.me/919725427727?text={{ rawurlencode("Hello Raghuvir Atta, I am interested in inquiring about {$product['title']} ({$defaultSize}).") }}" target="_blank" class="btn-default btn-whatsapp">
                                Chat On WhatsApp <i class="fa-brands fa-whatsapp" style="margin-left: 8px; font-size: 20px;"></i>
                            </a>

                            <!-- View Details Button -->
                            <a href="{{ route('product-details', ['product' => $product['slug']]) }}" class="btn-default">View Details</a>
                        </div>
                        <!-- Action Buttons End -->
                    </div>
                    <!-- Product Info End -->
                </div>
                <!-- Product Horizontal Card End -->
            @endforeach
        </div>
    </div>
    <!-- Page Products End -->

    <script>
        function selectProductSize(element) {
            const card = element.closest('.product-card-horizontal');
            if (!card) return;

            const badges = card.querySelectorAll('.size-badge');
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
            const productTitle = element.getAttribute('data-product-title');
            const contactBaseUrl = element.getAttribute('data-contact-url');

            // Update WhatsApp Button Link
            const whatsappBtn = card.querySelector('.btn-whatsapp');
            if (whatsappBtn) {
                const waMessage = `Hello Raghuvir Atta, I am interested in inquiring about ${productTitle} (${selectedSize}).`;
                whatsappBtn.href = `https://wa.me/919725427727?text=${encodeURIComponent(waMessage)}`;
            }

            // Update Request Inquiry Button Link
            const inquiryBtn = card.querySelector('.btn-inquiry');
            if (inquiryBtn && contactBaseUrl) {
                inquiryBtn.href = `${contactBaseUrl}/${encodeURIComponent(productTitle)}/${encodeURIComponent(selectedSize)}`;
            }
        }
    </script>
@endsection
