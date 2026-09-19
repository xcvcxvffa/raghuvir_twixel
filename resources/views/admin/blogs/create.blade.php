@extends('admin.layouts.app')

@section('title', 'Write New Blog Article')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.5rem;">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.blogs.index') }}">Blog Articles</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">New Article</span>
</div>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blogCreateForm">
    @csrf

    <div class="settings-header-banner">
        <div class="settings-header-title-box">
            <div class="settings-header-icon-badge">
                <i class="fa-solid fa-pen-nib"></i>
            </div>
            <div>
                <h1 class="page-title-main">
                    <span>Create New Article</span>
                    <span style="font-size: 0.725rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.1); padding: 3px 10px; border-radius: 9999px; letter-spacing: 0.02em;">Draft</span>
                </h1>
                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">
                    Draft compelling stories, nutritional research, and recipe articles for your readers.
                </p>
            </div>
        </div>

        <!-- Top Action Buttons -->
        <div style="display: flex; gap: 0.75rem; align-items: center;">
            <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-secondary">
                <i class="fa-solid fa-xmark"></i>
                <span>Cancel</span>
            </a>
            <button type="submit" class="btn-syndron btn-syndron-primary">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Publish Article</span>
            </button>
        </div>
    </div>

    <!-- 2-Column Responsive Layout -->
    <div style="display: grid; grid-template-columns: 1fr 340px; gap: 1.75rem; align-items: start;">
        <!-- ================================================================= -->
        <!-- LEFT COLUMN: MAIN ARTICLE CONTENT & SEO                           -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Main Content Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <span>Article Body & Details</span>
                        </h3>
                        <p class="card-syndron-desc">Provide headline title, custom URL slug, excerpt, and full story content.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Title -->
                    <div class="form-group-admin">
                        <label for="title" class="form-label-admin">
                            <span>Article Title <span style="color: #ef4444;">*</span></span>
                            <span style="font-size: 0.75rem; color: #94a3b8;" id="titleCharCount">0 / 120 chars</span>
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control-admin @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            placeholder="e.g. 10 Surprising Benefits of Stone-Ground Sharbati Whole Wheat Flour"
                            required
                            onkeyup="handleTitleChange(this.value)"
                            style="font-size: 1rem; font-weight: 700;"
                        >
                        @error('title')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug Input & URL Preview -->
                    <div class="form-group-admin">
                        <label for="slug" class="form-label-admin">
                            <span>URL Slug (Permalink) <span style="color: #ef4444;">*</span></span>
                            <button type="button" onclick="unlockSlug()" style="background: none; border: none; font-size: 0.75rem; color: var(--accent); cursor: pointer;">
                                <i class="fa-solid fa-lock-open"></i> Edit Slug
                            </button>
                        </label>
                        <div class="input-with-icon">
                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control-admin @error('slug') is-invalid @enderror"
                                value="{{ old('slug') }}"
                                placeholder="article-url-slug"
                                readonly
                                style="font-family: monospace; font-size: 0.825rem; background: #f8fafc;"
                            >
                            <i class="fa-solid fa-link input-icon"></i>
                        </div>
                        <div class="form-hint" id="slugPreviewText">
                            Live URL: <span style="color: #0f172a; font-weight: 600;">{{ url('/blog') }}/<span id="slugSpan">...</span></span>
                        </div>
                        @error('slug')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="excerpt" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Short Excerpt (Summary)</span>
                            </label>
                            <span style="font-size: 0.75rem; font-weight: 600; color: #64748b;" id="excerptCharCount">0 / 160 chars</span>
                        </div>
                        <textarea
                            name="excerpt"
                            id="excerpt"
                            rows="3"
                            class="form-control-admin @error('excerpt') is-invalid @enderror"
                            placeholder="Write a captivating 2-3 sentence overview that appears on article cards and search snippets..."
                            oninput="handleExcerptChange(this.value)"
                        >{{ old('excerpt') }}</textarea>
                        <div class="form-hint">Used as article teaser on the blog listing and fallback description for Google snippet.</div>
                        @error('excerpt')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Full Article Content (Quill WYSIWYG Rich Text Editor) -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label class="form-label-admin" style="margin-bottom: 0;">
                                <span>Full Article Content <span style="color: #ef4444;">*</span></span>
                            </label>
                            <!-- Live Article Stats -->
                            <div style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.75rem; font-weight: 600; color: #64748b;" id="quillStats">
                                <span><i class="fa-solid fa-file-word" style="color: var(--accent);"></i> <span id="quillWordCount">0</span> words</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-keyboard"></i> <span id="quillCharCount">0</span> chars</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-clock"></i> <span id="quillReadTime">1 min read</span></span>
                            </div>
                        </div>

                        <!-- Quill Editor Container -->
                        <div class="quill-editor-wrapper">
                            <div id="quillEditor" style="min-height: 380px; font-size: 0.95rem; line-height: 1.8;">{!! old('content') !!}</div>
                        </div>
                        <!-- Hidden Form Textarea for Backend Submission -->
                        <textarea name="content" id="articleContent" style="display: none;" required>{{ old('content') }}</textarea>

                        @error('content')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- SEO Settings Card with Real-time Google SERP Preview -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header">
                    <div>
                        <h3 class="card-syndron-title">
                            <div class="card-icon-pill">
                                <i class="fa-solid fa-magnifying-glass-chart"></i>
                            </div>
                            <span>Search Engine Optimization (SEO)</span>
                        </h3>
                        <p class="card-syndron-desc">Configure meta title, description, and keywords to rank #1 on Google.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Live Google SERP Snippet Preview Box -->
                    <div class="google-serp-box">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.85rem;">
                            <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <i class="fa-brands fa-google" style="color: #4285F4; font-size: 0.95rem;"></i>
                                Google Search Snippet Preview
                            </span>
                            <span style="font-size: 0.725rem; font-weight: 600; color: #10b981; background: rgba(16, 185, 129, 0.1); padding: 2px 8px; border-radius: 6px;">
                                Live Preview
                            </span>
                        </div>
                        
                        <div class="google-serp-preview-card">
                            <div class="serp-header-row">
                                <img src="{{ asset('images/Raghuvir Favicon.png') }}" alt="Favicon" class="serp-favicon">
                                <div class="serp-url-box">
                                    <span class="serp-site-name">Raghuvir Atta</span>
                                    <span class="serp-url-breadcrumb">https://raghuvirofficial.com › blog › <span id="serpSlugSpan">article-slug</span></span>
                                </div>
                            </div>
                            <div class="serp-title" id="serpTitlePreview">
                                Write an Article Title... - Raghuvir Atta
                            </div>
                            <div class="serp-desc" id="serpDescPreview">
                                Provide an enticing SEO meta description to attract organic clicks from Google search users. Optimal length is between 120 and 160 characters...
                            </div>
                        </div>
                    </div>

                    <!-- Meta Title with Counter & Status Badge -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="meta_title" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Title</label>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaTitleBadge" class="char-pill pill-neutral">Optimal: 50–60 chars</span>
                                <span id="metaTitleCounter" style="font-size: 0.75rem; font-weight: 700; color: #64748b;">0 / 60</span>
                            </div>
                        </div>
                        <input
                            type="text"
                            name="meta_title"
                            id="meta_title"
                            class="form-control-admin"
                            value="{{ old('meta_title') }}"
                            placeholder="Custom title for Google search (leaves empty to use main title)"
                            oninput="handleMetaTitleChange(this.value)"
                        >
                        <div class="form-hint">Defaults to Article Title if left empty. Keeps your search listing concise and clickable.</div>
                    </div>

                    <!-- Meta Description with Counter & Status Badge -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="meta_description" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Description</label>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaDescBadge" class="char-pill pill-neutral">Optimal: 120–160 chars</span>
                                <span id="metaDescCounter" style="font-size: 0.75rem; font-weight: 700; color: #64748b;">0 / 160</span>
                            </div>
                        </div>
                        <textarea
                            name="meta_description"
                            id="meta_description"
                            rows="3"
                            class="form-control-admin"
                            placeholder="Write an informative, search-friendly summary for Google SERP snippet..."
                            oninput="handleMetaDescChange(this.value)"
                        >{{ old('meta_description') }}</textarea>
                        <div class="form-hint">Appears in Google search snippets under the title. Aim for 120–160 characters.</div>
                    </div>

                    <!-- Meta Keywords -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="meta_keywords" class="form-label-admin">Meta Keywords (Comma separated)</label>
                        <input
                            type="text"
                            name="meta_keywords"
                            id="meta_keywords"
                            class="form-control-admin"
                            value="{{ old('meta_keywords') }}"
                            placeholder="sharbati wheat, chakki atta benefits, whole grain nutrition, soft rotis"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Keyword search phrases to index this post for relevant Google and website searches.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================================= -->
        <!-- RIGHT COLUMN: PUBLISH OPTIONS, SEO HEALTH SCORE & THUMBNAIL       -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- 1. Publication Status Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-cloud-arrow-up" style="color: var(--accent);"></i>
                        <span>Publish Status</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Live Visibility Toggle -->
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.85rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 8px; margin-bottom: 1.25rem;">
                        <div>
                            <div style="font-weight: 700; font-size: 0.85rem; color: var(--foreground);">Live on Website</div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground);">Publish immediately</div>
                        </div>
                        <label class="switch" style="position: relative; display: inline-block; width: 44px; height: 24px;">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;" id="isPublishedToggle">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <!-- Published At Date -->
                    <div class="form-group-admin">
                        <label for="published_at" class="form-label-admin">Schedule / Publish Date</label>
                        <input
                            type="datetime-local"
                            name="published_at"
                            id="published_at"
                            class="form-control-admin"
                            value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}"
                        >
                        <div class="form-hint">Leave as today or pick a backdated/future date.</div>
                    </div>

                    <!-- Author Name -->
                    <div class="form-group-admin" style="margin-bottom: 1.25rem;">
                        <label for="author_name" class="form-label-admin">Author Display Name</label>
                        <input
                            type="text"
                            name="author_name"
                            id="author_name"
                            class="form-control-admin"
                            value="{{ old('author_name', auth()->user()->name ?? 'Raghuvir Team') }}"
                        >
                    </div>

                    <!-- Primary Save Button -->
                    <button type="submit" class="btn-syndron btn-syndron-primary" style="width: 100%;">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save & Publish Article</span>
                    </button>
                </div>
            </div>

            <!-- 2. Real-time SEO Health Score & Analyzer Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-chart-pie" style="color: var(--accent);"></i>
                        <span>SEO Health Score</span>
                    </h3>
                    <span id="seoScoreBadge" class="seo-score-pill">
                        Calculating...
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Gauge Meter & Rating -->
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border);">
                        <div class="seo-score-circle" id="seoScoreCircle">
                            <span id="seoScoreNumber">0</span>
                            <span style="font-size: 0.625rem; font-weight: 600; color: #94a3b8;">/ 100</span>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-weight: 700; font-size: 0.925rem;" id="seoScoreRating">SEO Status</div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground);" id="seoScoreFeedback">Optimizing blog post for search visibility.</div>
                            <!-- Mini Progress Track -->
                            <div class="seo-track-bg">
                                <div id="seoScoreProgressBar" class="seo-track-fill" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Interactive Checklist -->
                    <div class="seo-checklist">
                        <!-- 1. Title Length -->
                        <div class="seo-check-item" id="checkMetaTitle">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">SEO Title Length</div>
                                <div class="check-desc" id="checkMetaTitleDesc">Aim for 50–60 characters.</div>
                            </div>
                        </div>

                        <!-- 2. Meta Description Length -->
                        <div class="seo-check-item" id="checkMetaDesc">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">Meta Description</div>
                                <div class="check-desc" id="checkMetaDescDesc">Optimal is 120–160 characters.</div>
                            </div>
                        </div>

                        <!-- 3. Content Length -->
                        <div class="seo-check-item" id="checkWordCount">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">Content Length</div>
                                <div class="check-desc" id="checkWordCountDesc">Minimum 300 words recommended.</div>
                            </div>
                        </div>

                        <!-- 4. Headings Structure -->
                        <div class="seo-check-item" id="checkHeadings">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">Subheadings (H2/H3)</div>
                                <div class="check-desc" id="checkHeadingsDesc">Use headings to break up content.</div>
                            </div>
                        </div>

                        <!-- 5. URL Permalink -->
                        <div class="seo-check-item" id="checkSlug">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">SEO Friendly Slug</div>
                                <div class="check-desc" id="checkSlugDesc">Short URL slug with hyphens.</div>
                            </div>
                        </div>

                        <!-- 6. Featured Image & Alt Text -->
                        <div class="seo-check-item" id="checkImage">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">Featured Image & Alt Text</div>
                                <div class="check-desc" id="checkImageDesc">Cover image and SEO alt text.</div>
                            </div>
                        </div>

                        <!-- 7. Focus Keywords / Tags -->
                        <div class="seo-check-item" id="checkKeywords">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">Target Keywords</div>
                                <div class="check-desc" id="checkKeywordsDesc">Keywords and tags provided.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Featured Image & SEO Alt Text Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-image" style="color: var(--accent);"></i>
                        <span>Featured Image & SEO</span>
                    </h3>
                    <span class="image-webp-badge" style="font-size: 0.675rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: 9999px;">
                        <i class="fa-solid fa-bolt"></i> Auto-WebP
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <!-- Image Preview Dropzone -->
                    <div class="thumbnail-dropzone" id="thumbnailDropzone" style="text-align: center;">
                        <div style="width: 100%; height: 155px; border-radius: 8px; overflow: hidden; background: var(--secondary, #f8fafc); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; position: relative;">
                            <img
                                id="featuredImagePreview"
                                src="{{ asset('images/post-1.jpg') }}"
                                alt="Featured Thumbnail"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        </div>

                        <!-- Live File Info Bar -->
                        <div id="fileInfoBar" style="display: none; margin-top: 0.65rem; padding: 0.45rem 0.75rem; background: var(--secondary); border: 1px solid var(--border); border-radius: 6px; font-size: 0.75rem; color: var(--foreground); align-items: center; justify-content: space-between;">
                            <span id="fileNameDisplay" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 170px; font-weight: 600;"></span>
                            <span id="fileSizeDisplay" style="color: #10b981; font-weight: 700;"></span>
                        </div>

                        <label for="imageInput" class="btn-syndron btn-syndron-secondary" style="width: 100%; justify-content: center; cursor: pointer; margin-top: 0.75rem;">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            <span>Upload Cover Image</span>
                        </label>
                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            accept="image/png,image/jpeg,image/webp,image/jpg,image/svg+xml"
                            onchange="previewFeaturedImage(this)"
                            style="display: none;"
                        >
                        <div class="form-hint" style="margin-top: 0.4rem; text-align: center;">
                            Supports WebP, PNG, JPG (Auto-converted to WebP)
                        </div>
                    </div>

                    <!-- Image Alt Text for Google SEO -->
                    <div class="form-group-admin" style="margin-top: 1.15rem; margin-bottom: 0; padding-top: 1rem; border-top: 1px solid var(--border);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="image_alt" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Image Alt Text (SEO)</span>
                            </label>
                            <button type="button" onclick="useTitleAsImageAlt()" style="background: var(--secondary); border: 1px solid var(--border); font-size: 0.7rem; font-weight: 600; color: var(--muted-foreground); padding: 1px 7px; border-radius: 4px; cursor: pointer;" title="Auto-fill with article headline">
                                Use Title
                            </button>
                        </div>
                        <input
                            type="text"
                            name="image_alt"
                            id="image_alt"
                            class="form-control-admin"
                            value="{{ old('image_alt') }}"
                            placeholder="e.g. Traditional stone milled whole wheat chakki atta"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Crucial for Google Image search & accessibility.</div>
                    </div>
                </div>
            </div>

            <!-- 4. Category & Tags Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.25rem 1.5rem;">
                    <h3 class="card-syndron-title" style="font-size: 1rem;">
                        <i class="fa-solid fa-tags" style="color: var(--accent);"></i>
                        <span>Category & Taxonomy</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.5rem;">
                    <!-- Category Selection -->
                    <div class="form-group-admin">
                        <label for="category" class="form-label-admin">Category <span style="color: #ef4444;">*</span></label>
                        <select name="category" id="category" class="form-control-admin" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tags -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <label for="tags" class="form-label-admin">Article Tags</label>
                        <input
                            type="text"
                            name="tags"
                            id="tags"
                            class="form-control-admin"
                            value="{{ old('tags') }}"
                            placeholder="Sharbati, Chakki Atta, Health, Recipes"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Comma separated keyword tags.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('styles')
<!-- Quill.js Snow Theme CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    /* Quill Rich Text Editor Custom Styling */
    .quill-editor-wrapper {
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--border, #e2e8f0);
    }
    .ql-toolbar.ql-snow {
        background: #f8fafc;
        border: none !important;
        border-bottom: 1px solid var(--border, #e2e8f0) !important;
        padding: 0.65rem 0.85rem !important;
        font-family: inherit;
    }
    .ql-container.ql-snow {
        border: none !important;
        font-family: inherit;
    }
    .ql-editor {
        min-height: 380px;
        font-size: 0.95rem;
        line-height: 1.8;
        color: var(--foreground, #1e293b);
        padding: 1.25rem 1.5rem;
    }
    .ql-editor p {
        margin-bottom: 1rem;
    }
    .ql-editor h2, .ql-editor h3, .ql-editor h4 {
        color: #0f172a;
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    /* Google SERP Preview */
    .google-serp-box {
        background: #f8fafc;
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .google-serp-preview-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem 1.25rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }
    .serp-header-row {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        margin-bottom: 0.35rem;
    }
    .serp-favicon {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #e2e8f0;
        padding: 2px;
    }
    .serp-url-box {
        display: flex;
        flex-direction: column;
    }
    .serp-site-name {
        font-size: 0.8rem;
        font-weight: 600;
        color: #202124;
        line-height: 1.2;
    }
    .serp-url-breadcrumb {
        font-size: 0.725rem;
        color: #4d5156;
        line-height: 1.2;
    }
    .serp-title {
        color: #1a0dab;
        font-size: 1.15rem;
        font-weight: 400;
        line-height: 1.35;
        margin-bottom: 0.35rem;
        cursor: pointer;
    }
    .serp-title:hover {
        text-decoration: underline;
    }
    .serp-desc {
        color: #4d5156;
        font-size: 0.85rem;
        line-height: 1.5;
        word-break: break-word;
    }

    /* Character Counter Pills */
    .char-pill {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 9999px;
        letter-spacing: 0.02em;
    }
    .pill-neutral { background: #f1f5f9; color: #64748b; }
    .pill-success { background: rgba(16, 185, 129, 0.12); color: #10b981; }
    .pill-warning { background: rgba(245, 158, 11, 0.12); color: #f59e0b; }
    .pill-danger  { background: rgba(239, 68, 68, 0.12); color: #ef4444; }

    /* SEO Health Score Circle & Tracker */
    .seo-score-circle {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        border: 3px solid #10b981;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: border-color 0.3s ease;
    }
    .seo-score-circle span#seoScoreNumber {
        font-size: 1.15rem;
        font-weight: 800;
        line-height: 1;
        color: var(--foreground);
    }
    .seo-track-bg {
        width: 100%;
        height: 6px;
        background: #e2e8f0;
        border-radius: 9999px;
        margin-top: 0.4rem;
        overflow: hidden;
    }
    .seo-track-fill {
        height: 100%;
        background: #10b981;
        transition: width 0.35s ease, background-color 0.35s ease;
    }
    .seo-score-pill {
        font-size: 0.725rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 9999px;
        background: rgba(16, 185, 129, 0.12);
        color: #10b981;
    }

    /* SEO Checklist */
    .seo-checklist {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .seo-check-item {
        display: flex;
        align-items: flex-start;
        gap: 0.65rem;
        font-size: 0.8rem;
    }
    .seo-check-item .check-icon {
        font-size: 0.95rem;
        margin-top: 2px;
        color: #94a3b8;
        flex-shrink: 0;
        transition: color 0.2s ease;
    }
    .seo-check-item.passed .check-icon {
        color: #10b981;
    }
    .seo-check-item.failed .check-icon {
        color: #f59e0b;
    }
    .seo-check-item.danger .check-icon {
        color: #ef4444;
    }
    .check-title {
        font-weight: 600;
        color: var(--foreground);
        line-height: 1.25;
    }
    .check-desc {
        font-size: 0.725rem;
        color: var(--muted-foreground);
        line-height: 1.25;
    }

    /* Switch Toggle */
    .switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #cbd5e1;
        transition: .3s;
        border-radius: 24px;
    }
    .switch .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
    }
    .switch input:checked + .slider {
        background-color: #10b981;
    }
    .switch input:checked + .slider:before {
        transform: translateX(20px);
    }
</style>
@endpush

@push('scripts')
<!-- Quill.js 2.0 CDN -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    let slugManualOverride = false;
    let quill = null;

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Quill Rich Text Editor
        quill = new Quill('#quillEditor', {
            theme: 'snow',
            placeholder: 'Write your comprehensive article here... You can use headings, bold text, bullet points, quotes, and links.',
            modules: {
                toolbar: [
                    [{ 'header': [2, 3, 4, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Sync Quill HTML content with hidden textarea on text-change
        quill.on('text-change', function () {
            const html = quill.root.innerHTML;
            document.getElementById('articleContent').value = html;
            updateQuillStats();
            calculateSeoScore();
        });

        // Sync on form submit as safety measure
        const form = document.getElementById('blogCreateForm');
        if (form) {
            form.addEventListener('submit', function () {
                document.getElementById('articleContent').value = quill.root.innerHTML;
            });
        }

        // Initial Calculations
        updateQuillStats();
        handleTitleChange(document.getElementById('title')?.value || '');
        handleExcerptChange(document.getElementById('excerpt')?.value || '');
        handleMetaTitleChange(document.getElementById('meta_title')?.value || '');
        handleMetaDescChange(document.getElementById('meta_description')?.value || '');
        calculateSeoScore();
    });

    function updateQuillStats() {
        if (!quill) return;
        const text = quill.getText().trim();
        const charCount = text.length;
        const words = text ? text.split(/\s+/).filter(w => w.length > 0) : [];
        const wordCount = words.length;
        const readTimeMinutes = Math.max(1, Math.ceil(wordCount / 200));

        document.getElementById('quillWordCount').innerText = wordCount.toLocaleString();
        document.getElementById('quillCharCount').innerText = charCount.toLocaleString();
        document.getElementById('quillReadTime').innerText = `${readTimeMinutes} min read`;
    }

    function handleTitleChange(val) {
        document.getElementById('titleCharCount').innerText = `${val.length} / 120 chars`;
        if (!slugManualOverride) {
            const generated = slugify(val);
            const slugInput = document.getElementById('slug');
            if (slugInput) slugInput.value = generated;
            const slugSpan = document.getElementById('slugSpan');
            if (slugSpan) slugSpan.innerText = generated || '...';
            const serpSlugSpan = document.getElementById('serpSlugSpan');
            if (serpSlugSpan) serpSlugSpan.innerText = generated || 'article-slug';
        }
        updateSerpPreview();
        calculateSeoScore();
    }

    function handleExcerptChange(val) {
        const count = val.length;
        document.getElementById('excerptCharCount').innerText = `${count} / 160 chars`;
        updateSerpPreview();
        calculateSeoScore();
    }

    function handleMetaTitleChange(val) {
        const count = val.length;
        document.getElementById('metaTitleCounter').innerText = `${count} / 60`;
        const badge = document.getElementById('metaTitleBadge');

        if (count === 0) {
            badge.className = 'char-pill pill-neutral';
            badge.innerText = 'Optimal: 50–60 chars';
        } else if (count >= 45 && count <= 65) {
            badge.className = 'char-pill pill-success';
            badge.innerText = 'Optimal Length';
        } else if (count < 45) {
            badge.className = 'char-pill pill-warning';
            badge.innerText = 'Too Short';
        } else {
            badge.className = 'char-pill pill-danger';
            badge.innerText = 'Too Long (Truncated)';
        }

        updateSerpPreview();
        calculateSeoScore();
    }

    function handleMetaDescChange(val) {
        const count = val.length;
        document.getElementById('metaDescCounter').innerText = `${count} / 160`;
        const badge = document.getElementById('metaDescBadge');

        if (count === 0) {
            badge.className = 'char-pill pill-neutral';
            badge.innerText = 'Optimal: 120–160 chars';
        } else if (count >= 120 && count <= 165) {
            badge.className = 'char-pill pill-success';
            badge.innerText = 'Optimal Length';
        } else if (count < 120) {
            badge.className = 'char-pill pill-warning';
            badge.innerText = 'Too Short';
        } else {
            badge.className = 'char-pill pill-danger';
            badge.innerText = 'Too Long (Truncated)';
        }

        updateSerpPreview();
        calculateSeoScore();
    }

    function updateSerpPreview() {
        const title = (document.getElementById('title')?.value || '').trim();
        const metaTitle = (document.getElementById('meta_title')?.value || '').trim();
        const excerpt = (document.getElementById('excerpt')?.value || '').trim();
        const metaDesc = (document.getElementById('meta_description')?.value || '').trim();
        const slug = (document.getElementById('slug')?.value || '').trim();

        const displayTitle = metaTitle || title || 'Write an Article Title... - Raghuvir Atta';
        const displayDesc = metaDesc || excerpt || 'Provide an enticing SEO meta description to attract organic clicks from Google search users. Optimal length is between 120 and 160 characters...';

        const serpTitleElem = document.getElementById('serpTitlePreview');
        if (serpTitleElem) {
            serpTitleElem.innerText = displayTitle.length > 65 ? displayTitle.substring(0, 62) + '...' : displayTitle;
        }

        const serpDescElem = document.getElementById('serpDescPreview');
        if (serpDescElem) {
            serpDescElem.innerText = displayDesc.length > 165 ? displayDesc.substring(0, 162) + '...' : displayDesc;
        }

        const serpSlugElem = document.getElementById('serpSlugSpan');
        if (serpSlugElem) {
            serpSlugElem.innerText = slug || 'article-slug';
        }
    }

    function calculateSeoScore() {
        let score = 0;
        const title = (document.getElementById('title')?.value || '').trim();
        const metaTitle = (document.getElementById('meta_title')?.value || title).trim();
        const excerpt = (document.getElementById('excerpt')?.value || '').trim();
        const metaDesc = (document.getElementById('meta_description')?.value || excerpt).trim();
        const slug = (document.getElementById('slug')?.value || '').trim();
        const keywords = (document.getElementById('meta_keywords')?.value || document.getElementById('tags')?.value || '').trim();
        const contentText = (quill ? quill.getText() : '').trim();
        const contentHtml = (quill ? quill.root.innerHTML : '').trim();
        const words = contentText ? contentText.split(/\s+/).filter(w => w.length > 0) : [];
        const wordCount = words.length;

        const imageInput = document.getElementById('imageInput');
        const previewImg = document.getElementById('featuredImagePreview');
        const hasImage = !!(imageInput?.files?.length || (previewImg && previewImg.src && !previewImg.src.includes('post-1.jpg')));

        // 1. Meta Title (15 pts)
        const tLen = metaTitle.length;
        if (tLen >= 45 && tLen <= 65) {
            score += 15;
            updateCheckItem('checkMetaTitle', 'passed', `Optimal length (${tLen} chars)`);
        } else if (tLen > 0 && tLen < 45) {
            score += 8;
            updateCheckItem('checkMetaTitle', 'failed', `Short (${tLen}/60 chars - aim for 50-60)`);
        } else if (tLen > 65) {
            score += 8;
            updateCheckItem('checkMetaTitle', 'failed', `Too long (${tLen} chars - will truncate)`);
        } else {
            updateCheckItem('checkMetaTitle', 'danger', 'Missing title');
        }

        // 2. Meta Description (15 pts)
        const dLen = metaDesc.length;
        if (dLen >= 120 && dLen <= 165) {
            score += 15;
            updateCheckItem('checkMetaDesc', 'passed', `Optimal length (${dLen} chars)`);
        } else if (dLen > 0 && dLen < 120) {
            score += 7;
            updateCheckItem('checkMetaDesc', 'failed', `Short (${dLen}/160 chars - aim for 130-160)`);
        } else if (dLen > 165) {
            score += 8;
            updateCheckItem('checkMetaDesc', 'failed', `Too long (${dLen} chars - will truncate)`);
        } else {
            updateCheckItem('checkMetaDesc', 'danger', 'Missing description');
        }

        // 3. Word Count (20 pts)
        if (wordCount >= 600) {
            score += 20;
            updateCheckItem('checkWordCount', 'passed', `In-depth article (${wordCount} words)`);
        } else if (wordCount >= 300) {
            score += 15;
            updateCheckItem('checkWordCount', 'passed', `Good length (${wordCount} words)`);
        } else if (wordCount >= 100) {
            score += 8;
            updateCheckItem('checkWordCount', 'failed', `Light content (${wordCount} words - aim for 300+)`);
        } else {
            updateCheckItem('checkWordCount', 'danger', 'Add at least 300 words for Google rankings');
        }

        // 4. Headings Structure (15 pts)
        const hasHeadings = /<h[2-4][^>]*>/i.test(contentHtml);
        if (hasHeadings) {
            score += 15;
            updateCheckItem('checkHeadings', 'passed', 'Subheadings (H2/H3) used effectively');
        } else {
            updateCheckItem('checkHeadings', 'failed', 'Add H2 or H3 subheadings');
        }

        // 5. Slug (10 pts)
        if (slug.length >= 3 && slug.length <= 75 && /^[a-z0-9-]+$/.test(slug)) {
            score += 10;
            updateCheckItem('checkSlug', 'passed', `Clean permalink (${slug})`);
        } else if (slug.length > 75) {
            score += 5;
            updateCheckItem('checkSlug', 'failed', 'Slug is too long (> 75 chars)');
        } else {
            updateCheckItem('checkSlug', 'danger', 'Add a valid URL slug');
        }

        // 6. Featured Image & Alt Text (15 pts)
        const imageAlt = document.getElementById('image_alt')?.value?.trim() || '';
        if (hasImage && imageAlt.length >= 4) {
            score += 15;
            updateCheckItem('checkImage', 'passed', 'Cover image ready with SEO Alt text');
        } else if (hasImage) {
            score += 10;
            updateCheckItem('checkImage', 'failed', 'Image selected, but add Alt text for SEO');
        } else {
            updateCheckItem('checkImage', 'danger', 'Upload a featured thumbnail');
        }

        // 7. Keywords / Tags (10 pts)
        if (keywords.length > 2) {
            score += 10;
            updateCheckItem('checkKeywords', 'passed', 'Target keywords & tags provided');
        } else {
            updateCheckItem('checkKeywords', 'failed', 'Add keywords or tags');
        }

        // Update Score Elements
        score = Math.min(100, Math.max(0, score));
        const scoreNum = document.getElementById('seoScoreNumber');
        const scoreBar = document.getElementById('seoScoreProgressBar');
        const scoreRating = document.getElementById('seoScoreRating');
        const scoreBadge = document.getElementById('seoScoreBadge');
        const scoreCircle = document.getElementById('seoScoreCircle');
        const scoreFeedback = document.getElementById('seoScoreFeedback');

        if (scoreNum) scoreNum.innerText = score;
        if (scoreBar) scoreBar.style.width = score + '%';

        let color = '#ef4444';
        let rating = 'Needs Work';
        let bg = 'rgba(239, 68, 68, 0.12)';
        let feedback = 'Improve content and metadata to boost Google ranking.';

        if (score >= 80) {
            color = '#10b981';
            rating = 'Excellent SEO';
            bg = 'rgba(16, 185, 129, 0.12)';
            feedback = 'This article is fully optimized to rank high on Google!';
        } else if (score >= 55) {
            color = '#f59e0b';
            rating = 'Good SEO';
            bg = 'rgba(245, 158, 11, 0.12)';
            feedback = 'Solid foundation. Complete remaining checklist items.';
        }

        if (scoreBar) scoreBar.style.backgroundColor = color;
        if (scoreRating) {
            scoreRating.innerText = rating;
            scoreRating.style.color = color;
        }
        if (scoreFeedback) scoreFeedback.innerText = feedback;
        if (scoreBadge) {
            scoreBadge.innerText = `${rating} • ${score}/100`;
            scoreBadge.style.color = color;
            scoreBadge.style.backgroundColor = bg;
        }
        if (scoreCircle) {
            scoreCircle.style.borderColor = color;
        }
    }

    function updateCheckItem(id, status, descText) {
        const item = document.getElementById(id);
        if (!item) return;

        item.classList.remove('passed', 'failed', 'danger');
        item.classList.add(status);

        const icon = item.querySelector('.check-icon');
        if (icon) {
            if (status === 'passed') {
                icon.className = 'fa-solid fa-circle-check check-icon';
            } else if (status === 'failed') {
                icon.className = 'fa-solid fa-circle-exclamation check-icon';
            } else {
                icon.className = 'fa-solid fa-circle-xmark check-icon';
            }
        }

        const desc = item.querySelector('.check-desc');
        if (desc && descText) {
            desc.innerText = descText;
        }
    }

    function unlockSlug() {
        const slugInput = document.getElementById('slug');
        slugInput.removeAttribute('readonly');
        slugInput.style.background = '#ffffff';
        slugInput.focus();
        slugManualOverride = true;
        slugInput.addEventListener('input', function () {
            document.getElementById('slugSpan').innerText = this.value || '...';
            document.getElementById('serpSlugSpan').innerText = this.value || 'article-slug';
            calculateSeoScore();
        });
    }

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    function useTitleAsImageAlt() {
        const titleVal = document.getElementById('title')?.value || '';
        const altInput = document.getElementById('image_alt');
        if (altInput) {
            altInput.value = titleVal;
            calculateSeoScore();
        }
    }

    function previewFeaturedImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('featuredImagePreview').src = e.target.result;

                // Show file info bar
                const infoBar = document.getElementById('fileInfoBar');
                const nameDisplay = document.getElementById('fileNameDisplay');
                const sizeDisplay = document.getElementById('fileSizeDisplay');
                if (infoBar && nameDisplay && sizeDisplay) {
                    nameDisplay.innerText = file.name;
                    const sizeInKb = Math.round(file.size / 1024);
                    sizeDisplay.innerText = `${sizeInKb} KB (WebP)`;
                    infoBar.style.display = 'flex';
                }

                // If alt text is empty, auto-populate from title for better SEO
                const altInput = document.getElementById('image_alt');
                if (altInput && !altInput.value.trim()) {
                    const titleVal = document.getElementById('title')?.value || '';
                    if (titleVal) altInput.value = titleVal;
                }

                calculateSeoScore();
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection
