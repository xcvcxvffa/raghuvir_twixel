@extends('layouts.app')

@section('title', ($blog->meta_title ?: $blog->title) . ' - Raghuvir Atta')

@push('meta')
    <meta name="description" content="{{ $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 155)) }}">
    @if($blog->meta_keywords)
        <meta name="keywords" content="{{ $blog->meta_keywords }}">
    @endif
    <!-- OpenGraph -->
    <meta property="og:title" content="{{ $blog->meta_title ?: $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 155)) }}">
    <meta property="og:image" content="{{ $blog->image_url }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
@endpush

@section('content')
    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque" style="max-width: 900px; margin: 0 auto 1.25rem;">
                            {{ $blog->title }}
                        </h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Single Post Start -->
    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Post Featured Image Start -->
                    <div class="post-image" style="margin-bottom: 2.5rem;">
                        <figure class="image-anime reveal" style="border-radius: 14px; overflow: hidden; max-height: 520px;">
                            <img
                                src="{{ $blog->image_url }}"
                                alt="{{ $blog->image_alt ?: $blog->title }}"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        </figure>
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Meta Strip (Author, Date, Category, Read Time) -->
                        <div class="post-meta-strip" style="display: flex; flex-wrap: wrap; align-items: center; gap: 1.5rem; margin-bottom: 2rem; padding-bottom: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 0.875rem;">
                            <span><i class="fa-regular fa-user" style="color: #EF801C; margin-right: 0.35rem;"></i> {{ $blog->author_name }}</span>
                            <span><i class="fa-regular fa-calendar" style="color: #EF801C; margin-right: 0.35rem;"></i> {{ $blog->formatted_date }}</span>
                            <span><i class="fa-solid fa-tag" style="color: #EF801C; margin-right: 0.35rem;"></i> {{ $blog->category }}</span>
                            <span><i class="fa-regular fa-clock" style="color: #EF801C; margin-right: 0.35rem;"></i> {{ $blog->reading_time }}</span>
                        </div>

                        <!-- Post Entry Start -->
                        <div class="post-entry" style="font-size: 1.05rem; line-height: 1.8; color: #334155;">
                            {!! $blog->content !!}
                        </div>
                        <!-- Post Entry End -->

                        <!-- Post Tag & Share Links Start -->
                        <div class="post-tag-links wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <!-- Post Tags Start -->
                                    <div class="post-tags" style="display: flex; flex-wrap: wrap; align-items: center; gap: 8px;">
                                        <span style="font-weight: 700; color: #0f172a; margin-right: 4px;">Tags:</span>
                                        @foreach($blog->tags_array as $tag)
                                            <a
                                                href="{{ route('blog', ['search' => $tag]) }}"
                                                style="display: inline-block; padding: 4px 12px; background: #f1f5f9; border-radius: 20px; font-size: 0.825rem; font-weight: 600; color: #475569; text-decoration: none; transition: all 0.2s;"
                                                onmouseover="this.style.background='#EF801C'; this.style.color='#fff';"
                                                onmouseout="this.style.background='#f1f5f9'; this.style.color='#475569';"
                                            >
                                                #{{ $tag }}
                                            </a>
                                        @endforeach
                                    </div>
                                    <!-- Post Tags End -->
                                </div>

                                <div class="col-lg-5">
                                    <!-- Post Social Links Start -->
                                    <div class="post-social-sharing" style="display: flex; align-items: center; justify-content: flex-end; gap: 10px;">
                                        <span style="font-weight: 700; color: #0f172a; font-size: 0.9rem;">Share:</span>
                                        <ul style="display: flex; gap: 8px; list-style: none; padding: 0; margin: 0;">
                                            <!-- WhatsApp -->
                                            <li>
                                                <a
                                                    href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . url()->current()) }}"
                                                    target="_blank"
                                                    title="Share on WhatsApp"
                                                    style="width: 36px; height: 36px; border-radius: 50%; background: #25D366; color: #ffffff; display: flex; align-items: center; justify-content: center; text-decoration: none;"
                                                >
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                            </li>
                                            <!-- Facebook -->
                                            <li>
                                                <a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                    target="_blank"
                                                    title="Share on Facebook"
                                                    style="width: 36px; height: 36px; border-radius: 50%; background: #1877F2; color: #ffffff; display: flex; align-items: center; justify-content: center; text-decoration: none;"
                                                >
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <!-- LinkedIn -->
                                            <li>
                                                <a
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                                    target="_blank"
                                                    title="Share on LinkedIn"
                                                    style="width: 36px; height: 36px; border-radius: 50%; background: #0A66C2; color: #ffffff; display: flex; align-items: center; justify-content: center; text-decoration: none;"
                                                >
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                            <!-- Twitter / X -->
                                            <li>
                                                <a
                                                    href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}"
                                                    target="_blank"
                                                    title="Share on X"
                                                    style="width: 36px; height: 36px; border-radius: 50%; background: #000000; color: #ffffff; display: flex; align-items: center; justify-content: center; text-decoration: none;"
                                                >
                                                    <i class="fa-brands fa-x-twitter"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Links End -->
                                </div>
                            </div>
                        </div>
                        <!-- Post Tag & Share Links End -->

                        <!-- Previous / Next Post Navigation Start -->
                        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 1.5rem; margin-top: 2.5rem; padding: 1.75rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                            <div>
                                @if($prevBlog)
                                    <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #EF801C; margin-bottom: 0.25rem;">
                                        <i class="fa-solid fa-arrow-left"></i> Previous Article
                                    </div>
                                    <a href="{{ route('blog.single', $prevBlog->slug) }}" style="font-size: 0.95rem; font-weight: 700; color: #0f172a; text-decoration: none;">
                                        {{ Str::limit($prevBlog->title, 45) }}
                                    </a>
                                @endif
                            </div>
                            <div style="text-align: right; margin-left: auto;">
                                @if($nextBlog)
                                    <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #EF801C; margin-bottom: 0.25rem;">
                                        Next Article <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                    <a href="{{ route('blog.single', $nextBlog->slug) }}" style="font-size: 0.95rem; font-weight: 700; color: #0f172a; text-decoration: none;">
                                        {{ Str::limit($nextBlog->title, 45) }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <!-- Previous / Next Post Navigation End -->
                    </div>
                    <!-- Post Single Content End -->
                </div>
            </div>

            <!-- Recent Articles Section Start -->
            @if(isset($recentBlogs) && $recentBlogs->isNotEmpty())
                <div class="row" style="margin-top: 5rem;">
                    <div class="col-lg-12">
                        <div class="section-title" style="margin-bottom: 2rem;">
                            <h3 style="color: #EF801C; font-size: 0.9rem; text-transform: uppercase; font-weight: 700;">Continue Reading</h3>
                            <h2 style="font-size: 1.75rem; font-weight: 800;">More Stories from Raghuvir Atta</h2>
                        </div>
                    </div>

                    @foreach($recentBlogs as $rec)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item" style="margin-bottom: 30px;">
                                <div class="post-item-box">
                                    <div class="post-featured-image">
                                        <a href="{{ route('blog.single', $rec->slug) }}">
                                            <figure class="image-anime" style="height: 200px; overflow: hidden;">
                                                <img src="{{ $rec->image_url }}" alt="{{ $rec->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="post-item-content">
                                        <div style="font-size: 0.75rem; color: #EF801C; font-weight: 700; margin-bottom: 0.35rem;">
                                            {{ $rec->category }} • {{ $rec->reading_time }}
                                        </div>
                                        <h2 style="font-size: 1.05rem; line-height: 1.4;">
                                            <a href="{{ route('blog.single', $rec->slug) }}">
                                                {{ Str::limit($rec->title, 65) }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="post-item-btn">
                                    <a href="{{ route('blog.single', $rec->slug) }}" class="readmore-btn">Read Article</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- Recent Articles Section End -->
        </div>
    </div>
    <!-- Page Single Post End -->
@endsection
