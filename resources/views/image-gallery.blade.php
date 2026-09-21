@extends('layouts.app')

@section('title', 'Photo Gallery - Raghuvir Atta | 100% Stone-Ground Chakki Fresh Flours')
@section('meta_description', 'Explore Raghuvir Foods manufacturing plant, traditional stone chakkis, hygienic wheat cleaning, packaging, and Sharbati grain harvest photos.')

@section('content')
    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('image-gallery') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('image-gallery') }}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Photo Gallery</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Photo Gallery Section Start -->
    <div class="page-gallery" style="padding: 80px 0 100px 0;">
        <div class="container">
            <!-- Section Intro Title -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h3 class="wow fadeInUp" style="color: var(--accent-color, #EF801C); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 14px;">Behind The Scenes</h3>
                        <h2 class="text-anime-style-3" style="font-weight: 800;">Our Milling Plant &amp; Harvest Gallery</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s" style="color: #64748b; font-size: 16px; max-width: 620px; margin: 0 auto;">
                            Take a visual tour through our hygienic processing units, traditional slow-speed stone chakkis, and grain inspection in Kadadara, Dehgam.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category Filter Tabs (if categories exist) -->
            @if(isset($categories) && $categories->isNotEmpty())
                <div class="row justify-content-center mb-5">
                    <div class="col-12 text-center">
                        <div class="gallery-category-nav wow fadeInUp" data-wow-delay="0.3s">
                            <button type="button" class="gallery-filter-btn active" data-filter="all">
                                All Photos ({{ $images->count() }})
                            </button>
                            @foreach($categories as $cat)
                                <button type="button" class="gallery-filter-btn" data-filter="{{ Str::slug($cat) }}">
                                    {{ $cat }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Gallery Grid Container -->
            <div class="row gallery-items page-gallery-box g-4" id="imageGalleryGrid">
                @forelse($images as $index => $image)
                    <div class="col-lg-4 col-md-6 col-12 gallery-filter-col" data-category="{{ Str::slug($image->category ?? 'general') }}">
                        <div class="photo-gallery photo-gallery-modern wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s">
                            <a href="{{ $image->image_url }}" class="gallery-popup-trigger" data-cursor-text="View" data-caption="{{ $image->caption ?: $image->title }}">
                                <figure class="image-anime">
                                    <img src="{{ $image->image_url }}" alt="{{ $image->title }}" loading="lazy">
                                    
                                    <!-- Hover Overlay with Title & Category -->
                                    <div class="gallery-card-overlay">
                                        <div class="gallery-overlay-badge">{{ $image->category ?: 'Raghuvir Foods' }}</div>
                                        <h4 class="gallery-overlay-title">{{ $image->title }}</h4>
                                        @if($image->caption)
                                            <p class="gallery-overlay-desc">{{ Str::limit($image->caption, 80) }}</p>
                                        @endif
                                        <span class="gallery-zoom-icon">
                                            <i class="fa-solid fa-expand"></i>
                                        </span>
                                    </div>
                                </figure>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="padding: 60px 20px; background: #FAF8F5; border-radius: 16px; border: 1px dashed #E5DCCF;">
                            <i class="fa-solid fa-images" style="font-size: 48px; color: #EF801C; margin-bottom: 16px;"></i>
                            <h3 style="font-weight: 800; color: #1e293b;">No Photos Available</h3>
                            <p style="color: #64748b;">Gallery photos are currently being refreshed. Please check back soon!</p>
                            <a href="{{ route('home') }}" class="btn-default" style="margin-top: 15px;">Return Home</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Photo Gallery Section End -->

    <style>
        /* Gallery Category Filter Nav */
        .gallery-category-nav {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            background: #FAF8F5;
            padding: 6px 10px;
            border-radius: 30px;
            border: 1px solid #ECE7DD;
        }
        .gallery-filter-btn {
            background: transparent;
            border: none;
            color: #5C452F;
            font-size: 13.5px;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .gallery-filter-btn:hover {
            color: #EF801C;
        }
        .gallery-filter-btn.active {
            background: #EF801C;
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(239, 128, 28, 0.3);
        }

        /* Modern Photo Card & Overlay */
        .photo-gallery-modern figure {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            margin: 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            background: #000;
        }
        .photo-gallery-modern figure img {
            width: 100%;
            height: 290px;
            object-fit: cover;
            display: block;
            transition: transform 0.45s ease;
        }
        .photo-gallery-modern:hover figure img {
            transform: scale(1.08);
            opacity: 0.85;
        }
        .gallery-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.82) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 22px;
            color: #FFFFFF;
            opacity: 0;
            transform: translateY(8px);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        .photo-gallery-modern:hover .gallery-card-overlay {
            opacity: 1;
            transform: translateY(0);
        }
        .gallery-overlay-badge {
            align-self: flex-start;
            background: #EF801C;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 12px;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .gallery-overlay-title {
            color: #FFFFFF;
            font-size: 17px;
            font-weight: 800;
            margin: 0 0 4px 0;
            line-height: 1.3;
        }
        .gallery-overlay-desc {
            color: rgba(255, 255, 255, 0.82);
            font-size: 12.5px;
            margin: 0;
            line-height: 1.35;
        }
        .gallery-zoom-icon {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 14px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Category Filter Handling
            const filterBtns = document.querySelectorAll('.gallery-filter-btn');
            const galleryCols = document.querySelectorAll('.gallery-filter-col');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const target = this.dataset.filter;
                    galleryCols.forEach(col => {
                        if (target === 'all' || col.dataset.category === target) {
                            col.style.display = 'block';
                        } else {
                            col.style.display = 'none';
                        }
                    });
                });
            });

            // Initialize Magnific Popup if jQuery plugin is available
            if (window.jQuery && jQuery().magnificPopup) {
                jQuery('.gallery-items').magnificPopup({
                    delegate: '.gallery-popup-trigger',
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    image: {
                        titleSrc: function(item) {
                            return item.el.attr('data-caption') || '';
                        }
                    }
                });
            }
        });
    </script>
@endsection
