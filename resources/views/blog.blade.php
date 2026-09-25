@extends('layouts.app')

@section('title', 'Our Blog & Agricultural Stories - Raghuvir Atta')

@section('content')
    <!-- Page Header Section Start -->
    <div class="page-header bg-section dark-section parallaxie" data-image="{{ \App\Models\PageBanner::getImage('blog') }}" style="background-image: url('{{ \App\Models\PageBanner::getImage('blog') }}') !important; background-position: {{ \App\Models\PageBanner::getPosition('blog') }} !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our Blog & Stories</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
            <!-- Filter & Search Toolbar Start -->
            <div class="row" style="margin-bottom: 3rem;">
                <div class="col-lg-8">
                    <!-- Category Pills -->
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center;">
                        <a
                            href="{{ route('blog', array_merge(request()->except(['category', 'page']))) }}"
                            class="blog-cat-pill {{ empty(request('category')) || request('category') === 'all' ? 'active' : '' }}"
                        >
                            All Stories
                        </a>
                        @foreach($categories as $cat)
                            <a
                                href="{{ route('blog', array_merge(request()->except(['category', 'page']), ['category' => $cat->category])) }}"
                                class="blog-cat-pill {{ request('category') === $cat->category ? 'active' : '' }}"
                            >
                                {{ $cat->category }} ({{ $cat->count }})
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Search Form -->
                    <form action="{{ route('blog') }}" method="GET" style="position: relative;">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search articles..."
                            style="width: 100%; padding: 0.75rem 2.8rem 0.75rem 1.25rem; border: 1px solid #e2e8f0; border-radius: 30px; font-size: 0.9rem; outline: none; background: #ffffff;"
                        >
                        <button
                            type="submit"
                            style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: #EF801C; border: none; width: 34px; height: 34px; border-radius: 50%; color: #ffffff; cursor: pointer; display: flex; align-items: center; justify-content: center;"
                        >
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 0.8rem;"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Filter & Search Toolbar End -->

            <div class="row">
                @forelse($blogs as $index => $blog)
                    <div class="col-xl-4 col-md-6">
                        <!-- Post Item Start -->
                        <div class="post-item wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s" style="margin-bottom: 30px; display: flex; flex-direction: column; height: calc(100% - 30px);">                        
                            <!-- Post Item Body Start -->
                            <div class="post-item-box" style="flex: 1; display: flex; flex-direction: column;">
                                <!-- Post Featured Image Start-->
                                <div class="post-featured-image">
                                    <a href="{{ route('blog.single', $blog->slug) }}" data-cursor-text="View">
                                        <figure class="image-anime" style="height: 240px; overflow: hidden;">
                                            <img
                                                src="{{ $blog->image_url }}"
                                                alt="{{ $blog->image_alt ?: $blog->title }}"
                                                style="width: 100%; height: 100%; object-fit: cover;"
                                            >
                                        </figure>
                                    </a>
                                </div>
                                <!-- Post Featured Image End -->

                                <!-- Post Meta Info -->
                                <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.5rem 0; font-size: 0.8rem; color: #64748b;">
                                    <span style="display: inline-flex; align-items: center; gap: 4px; color: #EF801C; font-weight: 700;">
                                        <i class="fa-solid fa-tag" style="font-size: 0.7rem;"></i>
                                        <span>{{ $blog->category }}</span>
                                    </span>
                                    <span><i class="fa-regular fa-clock"></i> {{ $blog->reading_time }}</span>
                                </div>

                                <!-- Post Item Content Start -->
                                <div class="post-item-content" style="flex: 1; padding-top: 0.75rem;">
                                    <h2 style="font-size: 1.2rem; line-height: 1.4; margin-bottom: 0.65rem;">
                                        <a href="{{ route('blog.single', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h2>
                                    <p style="font-size: 0.9rem; color: #64748b; line-height: 1.55;">
                                        {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 110) }}
                                    </p>
                                </div>
                                <!-- Post Item Content End -->                                                         
                            </div>
                            <!-- Post Item Body End -->
                             
                            <!-- Post Item Readmore Button Start-->
                            <div class="post-item-btn">
                                <a href="{{ route('blog.single', $blog->slug) }}" class="readmore-btn">Read Article</a>
                            </div>
                            <!-- Post Item Readmore Button End-->
                        </div>
                        <!-- Post Item End -->
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div style="text-align: center; padding: 5rem 1rem; background: #f8fafc; border-radius: 12px; border: 1px dashed #cbd5e1; margin-bottom: 3rem;">
                            <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(239, 128, 28, 0.1); color: #EF801C; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.25rem;">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 0.5rem;">No Stories Found</h3>
                            <p style="color: #64748b; max-width: 450px; margin: 0 auto 1.5rem;">
                                We couldn't find any articles matching your search query or selected category.
                            </p>
                            <a href="{{ route('blog') }}" class="btn-default" style="display: inline-block;">
                                <span>View All Stories</span>
                            </a>
                        </div>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if($blogs->hasPages())
                    <div class="col-lg-12">
                        <div class="page-pagination wow fadeInUp" data-wow-delay="0.4s" style="margin-top: 1rem;">
                            <ul class="pagination" style="display: flex; justify-content: center; gap: 8px; list-style: none; padding: 0;">
                                {{-- Previous Page Link --}}
                                @if ($blogs->onFirstPage())
                                    <li class="disabled"><span style="opacity: 0.5; padding: 10px 18px;"><i class="fa-solid fa-angle-left"></i></span></li>
                                @else
                                    <li><a href="{{ $blogs->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    @if ($page == $blogs->currentPage())
                                        <li class="active"><a href="javascript:void(0);">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}"><i class="fa-solid fa-angle-right"></i></a></li>
                                @else
                                    <li class="disabled"><span style="opacity: 0.5; padding: 10px 18px;"><i class="fa-solid fa-angle-right"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Page Blog End -->

    @push('styles')
    <style>
        .blog-cat-pill {
            display: inline-block;
            padding: 0.45rem 1rem;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .blog-cat-pill:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #cbd5e1;
        }
        .blog-cat-pill.active {
            background: #EF801C;
            color: #ffffff;
            border-color: #EF801C;
            box-shadow: 0 2px 8px rgba(239, 128, 28, 0.3);
        }
    </style>
    @endpush
@endsection
