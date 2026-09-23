@extends('layouts.app')

@section('title', 'Video Gallery - Raghuvir Atta | Facility Tours & Cooking Recipes')
@section('meta_description', 'Watch videos of Raghuvir Foods traditional stone milling plant, farm-to-table Sharbati grain journeys, and authentic soft roti and bati recipes.')

@section('content')
    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('video-gallery') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('video-gallery') }}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Video Gallery</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Video Gallery Start -->
    <div class="page-video-gallery" style="padding: 80px 0 100px 0;">
        <div class="container">
            <!-- Section Intro Title -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h3 class="wow fadeInUp" style="color: var(--accent-color, #EF801C); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 14px;">Watch &amp; Learn</h3>
                        <h2 class="text-anime-style-3" style="font-weight: 800;">Experience Our Quality In Motion</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s" style="color: #64748b; font-size: 16px; max-width: 620px; margin: 0 auto;">
                            Watch how we mill 100% stone-ground Chakki fresh flours, maintain strict food safety standards, and craft mouthwatering Dal Bati and fluffy rotis.
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
                                All Videos ({{ $videos->count() }})
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

            <!-- Video Cards Grid -->
            <div class="row g-4" id="videoGalleryGrid">
                @forelse($videos as $index => $video)
                    <div class="col-lg-4 col-md-6 col-12 video-filter-col" data-category="{{ Str::slug($video->category ?? 'general') }}">
                        <div class="video-card-modern wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s">
                            <!-- Thumbnail & Play Trigger -->
                            <div class="video-thumb-container">
                                <a href="{{ $video->video_url }}" class="popup-video video-play-link" data-cursor-text="Play">
                                    <figure class="image-anime" style="margin: 0;">
                                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" loading="lazy">
                                    </figure>
                                    
                                    <!-- Play Button Circle -->
                                    <div class="video-play-btn-circle">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <div class="video-play-pulse"></div>
                                </a>

                                <span class="video-duration-tag">
                                    @if($video->is_uploaded_video)
                                        <i class="fa-solid fa-circle-play"></i> HD Video
                                    @else
                                        <i class="fa-brands fa-youtube"></i> YouTube
                                    @endif
                                </span>
                            </div>

                            <!-- Card Info Details -->
                            <div class="video-card-body">
                                <span class="video-category-tag">{{ $video->category ?: 'Raghuvir Foods' }}</span>
                                <h4 class="video-title">
                                    <a href="{{ $video->video_url }}" class="popup-video">{{ $video->title }}</a>
                                </h4>
                                @if($video->caption)
                                    <p class="video-caption">{{ Str::limit($video->caption, 110) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="padding: 60px 20px; background: #FAF8F5; border-radius: 16px; border: 1px dashed #E5DCCF;">
                            <i class="fa-solid fa-film" style="font-size: 48px; color: #EF801C; margin-bottom: 16px;"></i>
                            <h3 style="font-weight: 800; color: #1e293b;">No Videos Available</h3>
                            <p style="color: #64748b;">Video episodes and factory tours are being updated. Check back soon!</p>
                            <a href="{{ route('home') }}" class="btn-default" style="margin-top: 15px;">Return Home</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Page Video Gallery End -->

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

        /* Modern Video Card */
        .video-card-modern {
            background: #FFFFFF;
            border-radius: 18px;
            border: 1px solid #ECE7DD;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .video-card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.1);
        }

        /* Thumbnail Container with Play Pulse */
        .video-thumb-container {
            position: relative;
            overflow: hidden;
            background: #000;
            height: 230px;
        }
        .video-thumb-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .video-card-modern:hover .video-thumb-container img {
            transform: scale(1.06);
            opacity: 0.88;
        }
        .video-play-btn-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: linear-gradient(135deg, #EF801C 0%, #D4690C 100%);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            padding-left: 3px;
            box-shadow: 0 6px 20px rgba(239, 128, 28, 0.5);
            z-index: 2;
            transition: transform 0.25s ease;
        }
        .video-card-modern:hover .video-play-btn-circle {
            transform: translate(-50%, -50%) scale(1.15);
        }
        .video-play-pulse {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 76px;
            height: 76px;
            border-radius: 50%;
            border: 2px solid rgba(239, 128, 28, 0.6);
            animation: videoPulse 2.2s infinite ease-out;
            pointer-events: none;
        }
        @keyframes videoPulse {
            0% { transform: translate(-50%, -50%) scale(0.85); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(1.45); opacity: 0; }
        }
        .video-duration-tag {
            position: absolute;
            bottom: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(4px);
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Video Card Body */
        .video-card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .video-category-tag {
            font-size: 11px;
            font-weight: 700;
            color: #EF801C;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        .video-title {
            font-size: 17px;
            font-weight: 800;
            line-height: 1.35;
            margin: 0 0 8px 0;
        }
        .video-title a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .video-title a:hover {
            color: #EF801C;
        }
        .video-caption {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.45;
            margin: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Category Filter Handling
            const filterBtns = document.querySelectorAll('.gallery-filter-btn');
            const videoCols = document.querySelectorAll('.video-filter-col');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const target = this.dataset.filter;
                    videoCols.forEach(col => {
                        if (target === 'all' || col.dataset.category === target) {
                            col.style.display = 'block';
                        } else {
                            col.style.display = 'none';
                        }
                    });
                });
            });

            // Initialize Magnific Popup Video (Both YouTube and local HTML5 MP4/WebM)
            if (window.jQuery && jQuery().magnificPopup) {
                jQuery('.popup-video').each(function() {
                    var href = jQuery(this).attr('href');
                    if (href && href.match(/\.(mp4|webm|mov|ogg|mkv)($|\?)/i)) {
                        jQuery(this).magnificPopup({
                            type: 'iframe',
                            iframe: {
                                markup: '<div class="mfp-iframe-scaler">' +
                                        '<div class="mfp-close"></div>' +
                                        '<video class="mfp-iframe" controls autoplay playsinline style="background:#000; width:100%; height:100%; object-fit:contain;">' +
                                        '<source src="' + href + '">' +
                                        'Your browser does not support HTML5 video.' +
                                        '</video>' +
                                        '</div>'
                            },
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            preloader: false,
                            fixedContentPos: false
                        });
                    } else {
                        jQuery(this).magnificPopup({
                            type: 'iframe',
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            preloader: false,
                            fixedContentPos: false
                        });
                    }
                });
            }
        });
    </script>
@endsection
