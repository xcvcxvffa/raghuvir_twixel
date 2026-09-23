@extends('admin.layouts.app')

@section('title', 'Edit Article: ' . $blog->title)

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.blogs.index') }}">Blog Articles</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Edit Article #{{ $blog->id }}</span>
</div>

<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" id="blogEditForm">
    @csrf
    @method('PUT')

    <!-- Top Action Banner -->
    <div class="settings-header-banner" style="margin-bottom: 1.75rem;">
        <div class="settings-header-title-box">
            <div class="settings-header-icon-badge" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div>
                <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.35rem; flex-wrap: wrap;">
                    <h1 class="page-title-main" style="margin-bottom: 0;">Edit Article</h1>
                    @if($blog->is_published)
                        <span class="system-status-badge" style="background: rgba(16, 185, 129, 0.12); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.25);">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block; box-shadow: 0 0 6px #10b981;"></span>
                            Live on Website
                        </span>
                    @else
                        <span style="font-size: 0.725rem; font-weight: 700; color: #f59e0b; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.25); padding: 3px 10px; border-radius: 9999px; display: inline-flex; align-items: center; gap: 5px;">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #f59e0b; display: inline-block;"></span>
                            Draft
                        </span>
                    @endif
                    <span style="font-size: 0.725rem; font-weight: 700; color: var(--muted-foreground); background: var(--secondary); padding: 3px 10px; border-radius: 9999px; border: 1px solid var(--border);">
                        ID: #{{ $blog->id }}
                    </span>
                    <span id="topSeoScoreChip" class="seo-score-chip-banner">
                        <i class="fa-solid fa-chart-pie" style="font-size: 0.7rem; margin-right: 3px;"></i> SEO: {{ $blog->seo_score }}/100
                    </span>
                </div>
                <div style="font-size: 0.85rem; color: var(--muted-foreground); display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                    <span><i class="fa-regular fa-eye" style="color: var(--accent);"></i> {{ number_format($blog->views_count) }} total reads</span>
                    <span>•</span>
                    <span><i class="fa-regular fa-calendar"></i> Published: {{ $blog->formatted_date }}</span>
                    <span>•</span>
                    <span><i class="fa-solid fa-tag"></i> {{ $blog->category }}</span>
                </div>
            </div>
        </div>

        <!-- Top Action Buttons -->
        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <a href="{{ route('blog.single', $blog->slug) }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="Preview published article on public website">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>View Live Post</span>
            </a>
            <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
            <button type="submit" class="btn-syndron btn-syndron-primary" id="topSaveBtn">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save Changes</span>
                <kbd class="shortcut-key">Ctrl+S</kbd>
            </button>
        </div>
    </div>

    <!-- 2-Column Responsive Layout Grid -->
    <div class="blog-editor-layout">
        <!-- ================================================================= -->
        <!-- LEFT COLUMN: MAIN ARTICLE CONTENT & SEO                           -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.75rem; min-width: 0;">
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
                        <p class="card-syndron-desc">Refine headline title, URL slug, summary excerpt, and full story content.</p>
                    </div>
                </div>

                <div class="card-syndron-body">
                    <!-- Title -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <label for="title" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Article Title <span style="color: #ef4444;">*</span></span>
                            </label>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--muted-foreground);" id="titleCharCount">
                                {{ strlen($blog->title) }} / 100 chars
                            </span>
                        </div>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control-admin article-title-input @error('title') is-invalid @enderror"
                            value="{{ old('title', $blog->title) }}"
                            placeholder="e.g. 10 Surprising Health Benefits of Stone-Ground Sharbati Whole Wheat"
                            required
                            onkeyup="handleTitleChange(this.value)"
                        >
                        @error('title')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug Input & URL Bar -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <label for="slug" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Permalink URL Slug <span style="color: #ef4444;">*</span></span>
                            </label>
                            <div style="display: flex; gap: 0.75rem; align-items: center;">
                                <button type="button" onclick="copyPermalink()" class="btn-text-action" title="Copy public URL to clipboard">
                                    <i class="fa-regular fa-copy"></i>
                                    <span id="copyBtnText">Copy Link</span>
                                </button>
                                <button type="button" onclick="unlockSlug()" class="btn-text-action" style="color: var(--accent);" id="unlockSlugBtn">
                                    <i class="fa-solid fa-lock-open"></i> Change Slug
                                </button>
                            </div>
                        </div>
                        <div class="input-with-icon">
                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control-admin @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $blog->slug) }}"
                                readonly
                                style="font-family: monospace; font-size: 0.875rem; background: var(--secondary);"
                            >
                            <i class="fa-solid fa-link input-icon"></i>
                        </div>
                        <div class="form-hint" id="slugPreviewText" style="margin-top: 0.4rem;">
                            Live URL: <a href="{{ url('/blog') }}/{{ $blog->slug }}" target="_blank" style="color: var(--accent); font-weight: 600; text-decoration: none;">
                                {{ url('/blog') }}/<span id="slugSpan">{{ $blog->slug }}</span>
                                <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.7rem; margin-left: 2px;"></i>
                            </a>
                        </div>
                        @error('slug')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <label for="excerpt" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Short Excerpt (Summary)</span>
                            </label>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--muted-foreground);" id="excerptCharCount">
                                {{ strlen($blog->excerpt ?? '') }} / 160 chars
                            </span>
                        </div>
                        <textarea
                            name="excerpt"
                            id="excerpt"
                            rows="3"
                            class="form-control-admin @error('excerpt') is-invalid @enderror"
                            placeholder="Write a captivating 2-3 sentence overview that appears on article cards and search snippets..."
                            oninput="handleExcerptChange(this.value)"
                        >{{ old('excerpt', $blog->excerpt) }}</textarea>
                        <div class="form-hint">Used as article teaser on the blog listing and fallback description for Google snippet.</div>
                        @error('excerpt')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Full Article Content (Quill WYSIWYG Rich Text Editor) -->
                    <div class="form-group-admin" style="margin-bottom: 0;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem; flex-wrap: wrap; gap: 0.5rem;">
                            <label class="form-label-admin" style="margin-bottom: 0;">
                                <span>Full Article Content <span style="color: #ef4444;">*</span></span>
                            </label>
                            <!-- Live Article Stats -->
                            <div class="editor-stats-bar" id="quillStats">
                                <span><i class="fa-solid fa-file-word" style="color: var(--accent);"></i> <strong id="quillWordCount">0</strong> words</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-keyboard"></i> <strong id="quillCharCount">0</strong> chars</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-clock"></i> <strong id="quillReadTime">{{ $blog->reading_time }}</strong></span>
                            </div>
                        </div>

                        <!-- Quill Editor Container -->
                        <div class="quill-editor-wrapper">
                            <div id="quillEditor">{!! old('content', $blog->content) !!}</div>
                        </div>
                        <!-- Hidden Form Textarea for Backend Submission -->
                        <textarea name="content" id="articleContent" style="display: none;" required>{{ old('content', $blog->content) }}</textarea>

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
                            <div class="card-icon-pill" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
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
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.85rem; flex-wrap: wrap; gap: 0.5rem;">
                            <span style="font-size: 0.75rem; font-weight: 700; color: var(--muted-foreground); text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <i class="fa-brands fa-google" style="color: #4285F4; font-size: 1rem;"></i>
                                Google Search Snippet Preview
                            </span>
                            <div class="serp-view-toggle">
                                <button type="button" class="serp-toggle-btn active" id="btnSerpDesktop" onclick="switchSerpView('desktop')">
                                    <i class="fa-solid fa-desktop"></i> Desktop
                                </button>
                                <button type="button" class="serp-toggle-btn" id="btnSerpMobile" onclick="switchSerpView('mobile')">
                                    <i class="fa-solid fa-mobile-screen"></i> Mobile
                                </button>
                            </div>
                        </div>

                        <div class="google-serp-preview-card" id="serpPreviewContainer">
                            <div class="serp-header-row">
                                <img src="{{ asset('images/Raghuvir Favicon.png') }}" alt="Favicon" class="serp-favicon">
                                <div class="serp-url-box">
                                    <span class="serp-site-name">Raghuvir Atta</span>
                                    <span class="serp-url-breadcrumb">https://raghuvirofficial.com › blog › <span id="serpSlugSpan">{{ $blog->slug }}</span></span>
                                </div>
                            </div>
                            <div class="serp-title" id="serpTitlePreview">
                                {{ $blog->meta_title ?: $blog->title }} - Raghuvir Atta
                            </div>
                            <div class="serp-desc" id="serpDescPreview">
                                {{ $blog->meta_description ?: ($blog->excerpt ?: 'Provide an enticing SEO meta description to attract organic clicks from Google search users...') }}
                            </div>
                        </div>
                    </div>

                    <!-- Meta Title with Counter & Status Badge -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <label for="meta_title" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Title</label>
                                <button type="button" class="btn-suggest" onclick="useTitleAsMetaTitle()" title="Copy Article Title into SEO Title">
                                    Use Article Title
                                </button>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaTitleBadge" class="char-pill pill-neutral">Optimal: 50–60 chars</span>
                                <span id="metaTitleCounter" style="font-size: 0.75rem; font-weight: 700; color: var(--muted-foreground);">
                                    {{ strlen($blog->meta_title ?? '') }} / 60
                                </span>
                            </div>
                        </div>
                        <input
                            type="text"
                            name="meta_title"
                            id="meta_title"
                            class="form-control-admin"
                            value="{{ old('meta_title', $blog->meta_title) }}"
                            placeholder="Custom title for Google search (leave empty to use main title)"
                            oninput="handleMetaTitleChange(this.value)"
                        >
                        <div class="form-hint">Appears as the clickable blue headline in Google search results.</div>
                    </div>

                    <!-- Meta Description with Counter & Status Badge -->
                    <div class="form-group-admin">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.4rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <label for="meta_description" class="form-label-admin" style="margin-bottom: 0;">SEO Meta Description</label>
                                <button type="button" class="btn-suggest" onclick="useExcerptAsMetaDesc()" title="Copy Excerpt into SEO Description">
                                    Use Excerpt
                                </button>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span id="metaDescBadge" class="char-pill pill-neutral">Optimal: 120–160 chars</span>
                                <span id="metaDescCounter" style="font-size: 0.75rem; font-weight: 700; color: var(--muted-foreground);">
                                    {{ strlen($blog->meta_description ?? '') }} / 160
                                </span>
                            </div>
                        </div>
                        <textarea
                            name="meta_description"
                            id="meta_description"
                            rows="3"
                            class="form-control-admin"
                            placeholder="Write an informative, search-friendly summary for Google SERP snippet..."
                            oninput="handleMetaDescChange(this.value)"
                        >{{ old('meta_description', $blog->meta_description) }}</textarea>
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
                            value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                            placeholder="sharbati wheat, chakki atta benefits, whole grain nutrition, soft rotis"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Keywords to help index this article for relevant Google searches.</div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone Card -->
            <div class="card-syndron danger-zone-card">
                <div class="card-syndron-header" style="padding: 1.15rem 1.5rem;">
                    <div>
                        <h3 class="card-syndron-title" style="color: #ef4444; font-size: 0.95rem;">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <span>Danger Zone</span>
                        </h3>
                        <p class="card-syndron-desc">Irreversible actions regarding this blog article.</p>
                    </div>
                </div>
                <div class="card-syndron-body" style="padding: 1.15rem 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <div style="font-weight: 700; font-size: 0.875rem; color: var(--foreground);">Delete This Article</div>
                        <div style="font-size: 0.775rem; color: var(--muted-foreground);">Once deleted, this article and all its data will be permanently removed.</div>
                    </div>
                    <button type="button" class="btn-syndron btn-syndron-danger" onclick="triggerDeleteFromEdit()">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Delete Article</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- ================================================================= -->
        <!-- RIGHT COLUMN: PUBLISH OPTIONS, SEO HEALTH SCORE & THUMBNAIL       -->
        <!-- ================================================================= -->
        <div class="blog-editor-sidebar">
            <!-- 1. Publication Status Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-cloud-arrow-up" style="color: var(--accent);"></i>
                        <span>Publish Status</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <!-- Live Visibility Toggle -->
                    <div class="publish-switch-box">
                        <div>
                            <div style="font-weight: 700; font-size: 0.85rem; color: var(--foreground);">Live on Website</div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground);">Make publicly accessible</div>
                        </div>
                        <label class="switch" style="position: relative; display: inline-block; width: 44px; height: 24px; margin: 0;">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published ? '1' : '0') == '1' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;" id="isPublishedToggle">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <!-- Published At Date -->
                    <div class="form-group-admin">
                        <label for="published_at" class="form-label-admin">Publication Timestamp</label>
                        <input
                            type="datetime-local"
                            name="published_at"
                            id="published_at"
                            class="form-control-admin"
                            value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                        >
                        <div class="form-hint">Date shown to readers on public blog.</div>
                    </div>

                    <!-- Author Name -->
                    <div class="form-group-admin" style="margin-bottom: 1.25rem;">
                        <label for="author_name" class="form-label-admin">Author Display Name</label>
                        <div class="input-with-icon">
                            <input
                                type="text"
                                name="author_name"
                                id="author_name"
                                class="form-control-admin"
                                value="{{ old('author_name', $blog->author_name) }}"
                                placeholder="e.g. Culinary Kitchen Team"
                            >
                            <i class="fa-regular fa-user input-icon"></i>
                        </div>
                    </div>

                    <!-- Primary Save Button -->
                    <button type="submit" class="btn-syndron btn-syndron-primary" style="width: 100%; justify-content: center; padding: 0.75rem 1rem;">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save & Update</span>
                    </button>
                </div>
            </div>

            <!-- 2. Real-time SEO Health Score & Analyzer Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-chart-pie" style="color: var(--accent);"></i>
                        <span>SEO Health Score</span>
                    </h3>
                    <span id="seoScoreBadge" class="seo-score-pill">
                        Calculating...
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <!-- Gauge Meter & Rating -->
                    <div class="seo-gauge-box">
                        <div class="seo-score-circle" id="seoScoreCircle">
                            <span id="seoScoreNumber">0</span>
                            <span style="font-size: 0.625rem; font-weight: 600; color: var(--muted-foreground);">/ 100</span>
                        </div>
                        <div style="flex: 1; min-width: 0;">
                            <div style="font-weight: 700; font-size: 0.95rem;" id="seoScoreRating">SEO Status</div>
                            <div style="font-size: 0.75rem; color: var(--muted-foreground); margin-bottom: 0.35rem;" id="seoScoreFeedback">Optimizing blog post for Google.</div>
                            <!-- Mini Progress Track -->
                            <div class="seo-track-bg">
                                <div id="seoScoreProgressBar" class="seo-track-fill" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Interactive 7-Point Checklist -->
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
                                <div class="check-desc" id="checkHeadingsDesc">Use headings to structure content.</div>
                            </div>
                        </div>

                        <!-- 5. URL Permalink -->
                        <div class="seo-check-item" id="checkSlug">
                            <i class="fa-solid fa-circle-xmark check-icon"></i>
                            <div>
                                <div class="check-title">SEO-Friendly Slug</div>
                                <div class="check-desc" id="checkSlugDesc">Clean URL slug with hyphens.</div>
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
                    <span class="image-webp-badge">
                        <i class="fa-solid fa-bolt"></i> Auto-WebP
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <!-- Image Preview Dropzone with Drag-and-Drop -->
                    <div class="thumbnail-dropzone" id="thumbnailDropzone" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">
                        <div class="thumbnail-preview-frame">
                            <img
                                id="featuredImagePreview"
                                src="{{ $blog->image_url }}"
                                alt="{{ $blog->image_alt ?: $blog->title }}"
                                class="thumbnail-img"
                            >
                            <div class="thumbnail-overlay">
                                <label for="imageInput" class="overlay-upload-btn">
                                    <i class="fa-solid fa-camera"></i> Change Image
                                </label>
                            </div>
                        </div>

                        <!-- Live File Info Bar -->
                        <div id="fileInfoBar" style="display: none; margin-top: 0.65rem; padding: 0.45rem 0.75rem; background: var(--secondary); border: 1px solid var(--border); border-radius: 6px; font-size: 0.75rem; color: var(--foreground); align-items: center; justify-content: space-between;">
                            <span id="fileNameDisplay" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 170px; font-weight: 600;"></span>
                            <span id="fileSizeDisplay" style="color: #10b981; font-weight: 700;"></span>
                        </div>

                        <label for="imageInput" class="btn-syndron btn-syndron-secondary" style="width: 100%; justify-content: center; cursor: pointer; margin-top: 0.75rem;">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            <span>Upload New Cover</span>
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

                        @if($blog->image)
                            <label class="remove-image-checkbox">
                                <input type="checkbox" name="remove_image" value="1" onchange="handleImageRemovalToggle(this)">
                                <span>Remove custom image (use default)</span>
                            </label>
                        @endif
                    </div>

                    <!-- Image Alt Text for Google SEO -->
                    <div class="form-group-admin" style="margin-top: 1.15rem; margin-bottom: 0; padding-top: 1rem; border-top: 1px solid var(--border);">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                            <label for="image_alt" class="form-label-admin" style="margin-bottom: 0;">
                                <span>Image Alt Text (SEO)</span>
                            </label>
                            <button type="button" class="btn-suggest" onclick="useTitleAsImageAlt()" title="Auto-fill with article headline">
                                Use Title
                            </button>
                        </div>
                        <input
                            type="text"
                            name="image_alt"
                            id="image_alt"
                            class="form-control-admin"
                            value="{{ old('image_alt', $blog->image_alt) }}"
                            placeholder="e.g. Traditional stone milled whole wheat chakki atta"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Descriptive keywords for Google Image search & accessibility.</div>
                    </div>
                </div>
            </div>

            <!-- 3b. Header Breadcrumb Banner (Optional) -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem; display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-panorama" style="color: #0284c7;"></i>
                        <span>Breadcrumb Hero Banner</span>
                    </h3>
                    @if(!empty($blog->banner_image))
                        <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: 9999px;">Custom Active</span>
                    @else
                        <span style="font-size: 0.7rem; font-weight: 700; color: #0284c7; background: rgba(14, 165, 233, 0.12); padding: 2px 8px; border-radius: 9999px;">Master Banner</span>
                    @endif
                </div>

                <div class="card-syndron-body" style="padding: 1.15rem 1.25rem;">
                    <div style="font-size: 0.78rem; color: var(--muted-foreground); margin-bottom: 0.75rem; line-height: 1.4;">
                        Custom background banner for this article's top header. If none is uploaded, it automatically displays the default master banner from <strong>Page Banners</strong>.
                    </div>

                    <div style="padding: 0.5rem 0.75rem; background: rgba(14, 165, 233, 0.06); border: 1px dashed rgba(14, 165, 233, 0.3); border-radius: 8px; margin-bottom: 0.75rem; font-size: 0.75rem; color: var(--foreground); display: flex; align-items: center; gap: 0.4rem;">
                        <i class="fa-solid fa-ruler-combined" style="color: #0284c7;"></i>
                        <span>Recommended: <strong>1920 × 500 px</strong> (Panoramic)</span>
                    </div>

                    <div style="position: relative; height: 110px; border-radius: 10px; overflow: hidden; background: #1a1a1a; border: 1px solid var(--border); margin-bottom: 0.75rem;">
                        <img id="bannerPreviewImg" src="{{ $blog->banner_image_url }}" alt="Breadcrumb Banner Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; inset: 0; background: rgba(239, 128, 28, 0.3); mix-blend-mode: multiply;"></div>
                        <div style="position: absolute; bottom: 6px; right: 8px; background: rgba(0,0,0,0.6); color: #fff; font-size: 0.68rem; padding: 2px 6px; border-radius: 4px;">
                            Hero Overlay Preview
                        </div>
                    </div>

                    <label for="bannerImageInput" class="btn-syndron btn-syndron-secondary" style="width: 100%; justify-content: center; cursor: pointer;">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span>{{ !empty($blog->banner_image) ? 'Change Custom Banner' : 'Upload Custom Banner' }}</span>
                    </label>
                    <input
                        type="file"
                        name="banner_image"
                        id="bannerImageInput"
                        accept="image/png,image/jpeg,image/webp,image/jpg,image/svg+xml"
                        onchange="previewBlogBannerImage(this)"
                        style="display: none;"
                    >

                    @if(!empty($blog->banner_image))
                        <label class="remove-image-checkbox" style="margin-top: 0.75rem; display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; color: #ef4444; cursor: pointer;">
                            <input type="checkbox" name="remove_banner_image" value="1" onchange="handleBannerRemovalToggle(this)">
                            <span>Revert to master Single Blog banner</span>
                        </label>
                    @endif
                </div>
            </div>

            <!-- 4. Category & Tags Card -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.25rem;">
                    <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                        <i class="fa-solid fa-tags" style="color: var(--accent);"></i>
                        <span>Category & Taxonomy</span>
                    </h3>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem;">
                    <!-- Category Selection -->
                    <div class="form-group-admin">
                        <label for="category" class="form-label-admin">Category <span style="color: #ef4444;">*</span></label>
                        <select name="category" id="category" class="form-control-admin" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category', $blog->category) === $cat ? 'selected' : '' }}>
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
                            value="{{ old('tags', $blog->tags) }}"
                            placeholder="Sharbati, Chakki Atta, Health, Recipes"
                            oninput="calculateSeoScore()"
                        >
                        <div class="form-hint">Comma separated keyword tags.</div>
                        <!-- Popular Tag Suggestions -->
                        <div class="tag-suggestions-row">
                            <span class="tag-pill-suggest" onclick="addSuggestedTag('Sharbati')">+ Sharbati</span>
                            <span class="tag-pill-suggest" onclick="addSuggestedTag('Stone Ground')">+ Stone Ground</span>
                            <span class="tag-pill-suggest" onclick="addSuggestedTag('Healthy Diet')">+ Healthy Diet</span>
                            <span class="tag-pill-suggest" onclick="addSuggestedTag('Soft Rotis')">+ Soft Rotis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Sticky Bottom Bar for Seamless Publishing -->
    <div class="blog-floating-bar" id="blogFloatingBar">
        <div class="floating-bar-inner">
            <div class="floating-article-info">
                <span class="floating-title" title="{{ $blog->title }}">{{ $blog->title }}</span>
                <span class="floating-badge" id="floatingSeoBadge">
                    <i class="fa-solid fa-chart-pie"></i> SEO: {{ $blog->seo_score }}/100
                </span>
            </div>
            <div class="floating-actions">
                <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-secondary" style="padding: 0.5rem 1rem;">
                    Discard
                </a>
                <button type="submit" class="btn-syndron btn-syndron-primary" style="padding: 0.5rem 1.25rem;">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Save Changes</span>
                </button>
            </div>
        </div>
    </div>
</form>

<!-- Professional Delete Confirmation Modal Dialog -->
<div id="deleteConfirmationModal" class="syndron-modal-backdrop" style="display: none;" onclick="handleModalBackdropClick(event)">
    <div class="syndron-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <!-- Close (X) button -->
        <button type="button" class="syndron-modal-close" onclick="closeDeleteModal()" aria-label="Close dialog">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="syndron-modal-body">
            <!-- Pulsing Danger Icon -->
            <div class="syndron-modal-icon-wrapper">
                <div class="syndron-modal-icon-pulse"></div>
                <div class="syndron-modal-icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>

            <!-- Title & Context -->
            <h3 id="modalTitle" class="syndron-modal-title">Delete Article?</h3>
            <p class="syndron-modal-description">
                Are you sure you want to permanently delete this article? This action cannot be undone and will remove all associated content and metrics.
            </p>

            <!-- Article Title Preview Callout -->
            <div class="syndron-modal-preview">
                <div class="syndron-modal-preview-icon">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <span class="syndron-modal-preview-text">{{ $blog->title }}</span>
            </div>
        </div>

        <!-- Actions -->
        <div class="syndron-modal-footer">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeDeleteModal()" style="flex: 1; justify-content: center;">
                Cancel
            </button>
            <button type="button" id="confirmDeleteBtn" class="btn-syndron btn-syndron-danger" onclick="executeBlogDelete()" style="flex: 1; justify-content: center;">
                <i class="fa-solid fa-trash-can"></i>
                <span id="deleteBtnText">Delete Article</span>
            </button>
        </div>
    </div>
</div>

<!-- Standalone Delete Form for Modal Submission -->
<form id="standaloneDeleteForm" action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('styles')
<!-- Quill.js Snow Theme CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    /* Responsive Grid Layout */
    .blog-editor-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 1.75rem;
        align-items: start;
        margin-bottom: 5rem;
    }
    .blog-editor-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.75rem;
    }
    @media (max-width: 1080px) {
        .blog-editor-layout {
            grid-template-columns: 1fr;
        }
    }

    /* Article Title Special Styling */
    .article-title-input {
        font-size: 1.15rem !important;
        font-weight: 700 !important;
        padding: 0.75rem 1.1rem !important;
        border-radius: var(--radius-md, 8px) !important;
        letter-spacing: -0.01em;
    }

    /* Quill Rich Text Editor Custom Styling */
    .quill-editor-wrapper {
        background: var(--card, #ffffff);
        border-radius: var(--radius-md, 8px);
        overflow: hidden;
        border: 1px solid var(--border, #e2e8f0);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .quill-editor-wrapper:focus-within {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.15);
    }
    .ql-toolbar.ql-snow {
        background: var(--secondary, #f8fafc);
        border: none !important;
        border-bottom: 1px solid var(--border, #e2e8f0) !important;
        padding: 0.75rem 1rem !important;
        font-family: inherit;
    }
    .ql-container.ql-snow {
        border: none !important;
        font-family: inherit;
    }
    .ql-editor {
        min-height: 440px;
        font-size: 0.975rem;
        line-height: 1.85;
        color: var(--foreground, #1e293b);
        padding: 1.5rem;
    }
    .ql-editor p {
        margin-bottom: 1.1rem;
    }
    .ql-editor h2, .ql-editor h3, .ql-editor h4 {
        color: var(--foreground, #0f172a);
        font-weight: 700;
        margin-top: 1.75rem;
        margin-bottom: 0.75rem;
    }

    /* Editor Live Stats Bar */
    .editor-stats-bar {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--muted-foreground);
    }

    /* Google SERP Preview */
    .google-serp-box {
        background: var(--secondary, #f8fafc);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: var(--radius-lg, 12px);
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .serp-view-toggle {
        display: inline-flex;
        background: var(--card, #ffffff);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 6px;
        padding: 2px;
    }
    .serp-toggle-btn {
        background: none;
        border: none;
        font-size: 0.725rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 4px;
        color: var(--muted-foreground);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .serp-toggle-btn.active {
        background: var(--accent);
        color: #ffffff;
    }
    .google-serp-preview-card {
        background: var(--card, #ffffff);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 8px;
        padding: 1rem 1.25rem;
        box-shadow: var(--shadow-xs);
        transition: max-width 0.25s ease;
        font-family: -apple-system, Roboto, Helvetica, Arial, sans-serif;
    }
    .google-serp-preview-card.mobile-mode {
        max-width: 375px;
        margin: 0 auto;
        border-radius: 12px;
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
        color: var(--foreground, #202124);
        line-height: 1.2;
    }
    .serp-url-breadcrumb {
        font-size: 0.725rem;
        color: var(--muted-foreground, #4d5156);
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
        color: var(--foreground, #4d5156);
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
    .pill-neutral { background: var(--secondary); color: var(--muted-foreground); }
    .pill-success { background: rgba(16, 185, 129, 0.12); color: #10b981; }
    .pill-warning { background: rgba(245, 158, 11, 0.12); color: #f59e0b; }
    .pill-danger  { background: rgba(239, 68, 68, 0.12); color: #ef4444; }

    /* Button Text Actions */
    .btn-text-action {
        background: none;
        border: none;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--muted-foreground);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 2px 6px;
        border-radius: 4px;
        transition: background 0.15s ease, color 0.15s ease;
    }
    .btn-text-action:hover {
        background: var(--secondary);
        color: var(--foreground);
    }
    .btn-suggest {
        background: var(--secondary);
        border: 1px solid var(--border);
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--muted-foreground);
        padding: 1px 7px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .btn-suggest:hover {
        color: var(--accent);
        border-color: var(--accent);
    }

    /* SEO Gauge & Circle */
    .seo-gauge-box {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border);
    }
    .seo-score-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 3.5px solid #10b981;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: border-color 0.3s ease;
        background: var(--card);
    }
    .seo-score-circle span#seoScoreNumber {
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1;
        color: var(--foreground);
    }
    .seo-track-bg {
        width: 100%;
        height: 6px;
        background: var(--border, #e2e8f0);
        border-radius: 9999px;
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
    .seo-score-chip-banner {
        font-size: 0.725rem;
        font-weight: 700;
        color: #10b981;
        background: rgba(16, 185, 129, 0.12);
        padding: 3px 10px;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
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

    /* Thumbnail Dropzone & WebP Styling */
    .image-webp-badge {
        font-size: 0.675rem;
        font-weight: 700;
        color: #10b981;
        background: rgba(16, 185, 129, 0.12);
        padding: 2px 8px;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        letter-spacing: 0.02em;
    }
    .thumbnail-dropzone {
        display: flex !important;
        flex-direction: column !important;
        gap: 0.65rem !important;
        text-align: center;
        border-radius: var(--radius-md, 8px);
        transition: all 0.2s ease;
        border: none !important;
        aspect-ratio: auto !important;
        overflow: visible !important;
        background: transparent !important;
    }
    .thumbnail-dropzone.dragover .thumbnail-preview-frame {
        border-color: var(--accent) !important;
        box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.2) !important;
    }
    .thumbnail-preview-frame {
        width: 100%;
        height: 180px;
        border-radius: var(--radius-md, 8px);
        overflow: hidden;
        background: var(--secondary, #f8fafc);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-xs);
        position: relative;
        aspect-ratio: auto !important;
    }
    .thumbnail-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
        display: block;
    }
    .thumbnail-preview-frame:hover .thumbnail-img {
        transform: scale(1.04);
    }
    .thumbnail-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.5);
        backdrop-filter: blur(2px);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    .thumbnail-preview-frame:hover .thumbnail-overlay {
        opacity: 1;
    }
    .overlay-upload-btn {
        background: #ffffff;
        color: #0f172a;
        font-size: 0.775rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 20px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        transition: transform 0.15s ease;
    }
    .overlay-upload-btn:hover {
        transform: scale(1.05);
    }
    .remove-image-checkbox {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 0.775rem;
        color: #ef4444;
        margin-top: 0.25rem;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 6px;
        transition: background 0.15s ease;
    }
    .remove-image-checkbox:hover {
        background: rgba(239, 68, 68, 0.08);
    }
    .remove-image-checkbox input {
        accent-color: #ef4444;
        cursor: pointer;
        margin: 0;
    }

    /* Publish Switch Box */
    .publish-switch-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.85rem;
        background: var(--secondary, #f8fafc);
        border: 1px solid var(--border);
        border-radius: var(--radius-md, 8px);
        margin-bottom: 1.25rem;
    }

    /* Suggested Tag Pills */
    .tag-suggestions-row {
        display: flex;
        gap: 0.4rem;
        flex-wrap: wrap;
        margin-top: 0.5rem;
    }
    .tag-pill-suggest {
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--muted-foreground);
        background: var(--secondary);
        border: 1px solid var(--border);
        padding: 2px 8px;
        border-radius: 9999px;
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .tag-pill-suggest:hover {
        background: var(--accent);
        color: #ffffff;
        border-color: var(--accent);
    }

    /* Danger Card */
    .danger-zone-card {
        border-color: rgba(239, 68, 68, 0.25) !important;
        background: rgba(239, 68, 68, 0.02) !important;
    }
    .btn-syndron-danger {
        background: #ef4444;
        color: #ffffff !important;
        border: 1px solid #dc2626;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.28);
        font-weight: 600;
        transition: all 0.15s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-syndron-danger:hover {
        background: #dc2626;
        border-color: #b91c1c;
        box-shadow: 0 4px 14px rgba(239, 68, 68, 0.38);
        transform: translateY(-1px);
    }

    /* Keyboard Shortcut Tag */
    .shortcut-key {
        font-size: 0.65rem;
        background: rgba(255, 255, 255, 0.22);
        padding: 1px 5px;
        border-radius: 4px;
        margin-left: 5px;
        font-family: monospace;
    }

    /* Floating Bottom Action Bar */
    .blog-floating-bar {
        position: fixed;
        bottom: 1.25rem;
        left: calc(var(--sidebar-width, 260px) + 2rem);
        right: 2rem;
        background: var(--card, #ffffff);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 14px;
        box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.15), 0 4px 10px -2px rgba(0, 0, 0, 0.05);
        padding: 0.65rem 1.25rem;
        z-index: 999;
        display: flex;
        align-items: center;
        backdrop-filter: blur(12px);
        transition: all 0.2s ease;
    }
    @media (max-width: 991px) {
        .blog-floating-bar {
            left: 1rem;
            right: 1rem;
            bottom: 1rem;
        }
    }
    .floating-bar-inner {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }
    .floating-article-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        min-width: 0;
    }
    .floating-title {
        font-weight: 700;
        font-size: 0.875rem;
        color: var(--foreground);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 450px;
    }
    .floating-badge {
        font-size: 0.7rem;
        font-weight: 700;
        color: #10b981;
        background: rgba(16, 185, 129, 0.12);
        padding: 2px 8px;
        border-radius: 9999px;
        white-space: nowrap;
    }
    .floating-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
        flex-shrink: 0;
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

    /* Modal Styling */
    .syndron-modal-backdrop {
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.25rem;
        opacity: 0;
        transition: opacity 0.22s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .syndron-modal-backdrop.is-active {
        opacity: 1;
    }
    .syndron-modal-dialog {
        background: var(--card, #ffffff);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 18px;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 440px;
        position: relative;
        overflow: hidden;
        transform: scale(0.92) translateY(12px);
        transition: transform 0.24s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .syndron-modal-backdrop.is-active .syndron-modal-dialog {
        transform: scale(1) translateY(0);
    }
    .syndron-modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        background: transparent;
        color: var(--muted-foreground, #64748b);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.95rem;
        transition: all 0.15s ease;
        z-index: 10;
    }
    .syndron-modal-close:hover {
        background: var(--secondary, #f1f5f9);
        color: var(--foreground, #0f172a);
    }
    .syndron-modal-body {
        padding: 2rem 1.75rem 1.25rem;
        text-align: center;
    }
    .syndron-modal-icon-wrapper {
        position: relative;
        width: 64px;
        height: 64px;
        margin: 0 auto 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .syndron-modal-icon-pulse {
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        background: rgba(239, 68, 68, 0.15);
        animation: modalPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes modalPulse {
        0%, 100% { transform: scale(1); opacity: 0.7; }
        50% { transform: scale(1.18); opacity: 0.25; }
    }
    .syndron-modal-icon {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: rgba(239, 68, 68, 0.12);
        color: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.45rem;
        position: relative;
        border: 1px solid rgba(239, 68, 68, 0.25);
    }
    .syndron-modal-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--foreground, #0f172a);
        margin-bottom: 0.45rem;
        letter-spacing: -0.01em;
    }
    .syndron-modal-description {
        font-size: 0.865rem;
        color: var(--muted-foreground, #64748b);
        line-height: 1.5;
        margin: 0 0 1.25rem;
    }
    .syndron-modal-preview {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        background: var(--secondary, #f8fafc);
        border: 1px solid var(--border, #e2e8f0);
        border-radius: 10px;
        text-align: left;
    }
    .syndron-modal-preview-icon {
        width: 28px;
        height: 28px;
        border-radius: 6px;
        background: rgba(239, 128, 28, 0.1);
        color: #EF801C;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        flex-shrink: 0;
    }
    .syndron-modal-preview-text {
        font-size: 0.825rem;
        font-weight: 600;
        color: var(--foreground, #1e293b);
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .syndron-modal-footer {
        padding: 1rem 1.75rem 1.75rem;
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }
</style>
@endpush

@push('scripts')
<!-- Quill.js 2.0 CDN -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
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
        const form = document.getElementById('blogEditForm');
        if (form) {
            form.addEventListener('submit', function () {
                document.getElementById('articleContent').value = quill.root.innerHTML;
            });
        }

        // Keyboard Shortcut: Ctrl+S / Cmd+S to Save
        document.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                document.getElementById('articleContent').value = quill.root.innerHTML;
                form.submit();
            }
        });

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
        document.getElementById('titleCharCount').innerText = `${val.length} / 100 chars`;
        const floatingTitle = document.querySelector('.floating-title');
        if (floatingTitle) floatingTitle.innerText = val || 'Untitled Article';
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
        } else if (count >= 110 && count <= 165) {
            badge.className = 'char-pill pill-success';
            badge.innerText = 'Optimal Length';
        } else if (count < 110) {
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
        const titleVal = document.getElementById('title')?.value || 'Your Article Title';
        const metaTitleVal = document.getElementById('meta_title')?.value;
        const excerptVal = document.getElementById('excerpt')?.value;
        const metaDescVal = document.getElementById('meta_description')?.value;

        // Title preview
        const finalTitle = metaTitleVal ? metaTitleVal : `${titleVal} - Raghuvir Atta`;
        document.getElementById('serpTitlePreview').innerText = finalTitle;

        // Description preview
        const finalDesc = metaDescVal ? metaDescVal : (excerptVal ? excerptVal : 'Provide an enticing SEO meta description to attract organic clicks from Google search users...');
        document.getElementById('serpDescPreview').innerText = finalDesc;
    }

    function switchSerpView(mode) {
        const container = document.getElementById('serpPreviewContainer');
        const btnDesk = document.getElementById('btnSerpDesktop');
        const btnMob = document.getElementById('btnSerpMobile');

        if (mode === 'mobile') {
            container.classList.add('mobile-mode');
            btnMob.classList.add('active');
            btnDesk.classList.remove('active');
        } else {
            container.classList.remove('mobile-mode');
            btnDesk.classList.add('active');
            btnMob.classList.remove('active');
        }
    }

    function useTitleAsMetaTitle() {
        const titleVal = document.getElementById('title')?.value || '';
        const metaTitleInput = document.getElementById('meta_title');
        if (metaTitleInput) {
            metaTitleInput.value = titleVal.substring(0, 60);
            handleMetaTitleChange(metaTitleInput.value);
        }
    }

    function useExcerptAsMetaDesc() {
        const excerptVal = document.getElementById('excerpt')?.value || '';
        const metaDescInput = document.getElementById('meta_description');
        if (metaDescInput) {
            metaDescInput.value = excerptVal.substring(0, 160);
            handleMetaDescChange(metaDescInput.value);
        }
    }

    function addSuggestedTag(tagText) {
        const tagsInput = document.getElementById('tags');
        if (!tagsInput) return;
        const current = tagsInput.value.split(',').map(t => t.trim()).filter(t => t.length > 0);
        if (!current.includes(tagText)) {
            current.push(tagText);
            tagsInput.value = current.join(', ');
            calculateSeoScore();
        }
    }

    // Comprehensive 100-Point SEO Algorithm
    function calculateSeoScore() {
        let score = 0;

        const title = document.getElementById('title')?.value || '';
        const metaTitle = document.getElementById('meta_title')?.value || title;
        const metaDesc = document.getElementById('meta_description')?.value || document.getElementById('excerpt')?.value || '';
        const slug = document.getElementById('slug')?.value || '';
        const keywords = document.getElementById('meta_keywords')?.value || document.getElementById('tags')?.value || '';
        const imagePreview = document.getElementById('featuredImagePreview');
        const hasImage = imagePreview && imagePreview.getAttribute('src') && !imagePreview.getAttribute('src').includes('default-image-none');
        
        let wordCount = 0;
        let contentHtml = '';
        if (quill) {
            const rawText = quill.getText().trim();
            const words = rawText ? rawText.split(/\s+/).filter(w => w.length > 0) : [];
            wordCount = words.length;
            contentHtml = quill.root.innerHTML;
        }

        // 1. Meta Title (15 pts)
        const metaTitleLen = metaTitle.length;
        if (metaTitleLen >= 45 && metaTitleLen <= 65) {
            score += 15;
            updateCheckItem('checkMetaTitle', 'passed', `Optimal title length (${metaTitleLen} chars)`);
        } else if (metaTitleLen >= 30 && metaTitleLen <= 75) {
            score += 10;
            updateCheckItem('checkMetaTitle', 'failed', `Acceptable length (${metaTitleLen} chars - aim for 50-60)`);
        } else if (metaTitleLen > 0) {
            score += 5;
            updateCheckItem('checkMetaTitle', 'danger', `Sub-optimal length (${metaTitleLen} chars)`);
        } else {
            updateCheckItem('checkMetaTitle', 'danger', 'Title is empty');
        }

        // 2. Meta Description (15 pts)
        const metaDescLen = metaDesc.length;
        if (metaDescLen >= 115 && metaDescLen <= 165) {
            score += 15;
            updateCheckItem('checkMetaDesc', 'passed', `Optimal description length (${metaDescLen} chars)`);
        } else if (metaDescLen >= 70 && metaDescLen <= 200) {
            score += 10;
            updateCheckItem('checkMetaDesc', 'failed', `Fair length (${metaDescLen} chars - aim for 120-160)`);
        } else if (metaDescLen > 0) {
            score += 5;
            updateCheckItem('checkMetaDesc', 'danger', `Too short (${metaDescLen} chars)`);
        } else {
            updateCheckItem('checkMetaDesc', 'danger', 'Add a description for Google snippet');
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
            updateCheckItem('checkImage', 'failed', 'Image uploaded, but add Alt text for SEO');
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
        const topChip = document.getElementById('topSeoScoreChip');
        const floatingBadge = document.getElementById('floatingSeoBadge');

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
        if (topChip) {
            topChip.innerHTML = `<i class="fa-solid fa-chart-pie" style="font-size: 0.7rem; margin-right: 3px;"></i> SEO: ${score}/100`;
            topChip.style.color = color;
            topChip.style.backgroundColor = bg;
        }
        if (floatingBadge) {
            floatingBadge.innerHTML = `<i class="fa-solid fa-chart-pie"></i> SEO: ${score}/100`;
            floatingBadge.style.color = color;
            floatingBadge.style.backgroundColor = bg;
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
        slugInput.style.background = 'var(--card, #ffffff)';
        slugInput.focus();
        document.getElementById('unlockSlugBtn').style.display = 'none';

        slugInput.addEventListener('input', function () {
            document.getElementById('slugSpan').innerText = this.value || '...';
            document.getElementById('serpSlugSpan').innerText = this.value || 'article-slug';
            calculateSeoScore();
        });
    }

    function copyPermalink() {
        const fullUrl = `{{ url('/blog') }}/${document.getElementById('slug').value}`;
        navigator.clipboard.writeText(fullUrl).then(() => {
            const btnText = document.getElementById('copyBtnText');
            if (btnText) {
                const originalText = btnText.innerText;
                btnText.innerText = 'Copied!';
                setTimeout(() => {
                    btnText.innerText = originalText;
                }, 2000);
            }
            if (window.showSonnerToast) {
                window.showSonnerToast({
                    message: 'Permalink copied to clipboard!',
                    type: 'success'
                });
            }
        });
    }

    function useTitleAsImageAlt() {
        const titleVal = document.getElementById('title')?.value || '';
        const altInput = document.getElementById('image_alt');
        if (altInput) {
            altInput.value = titleVal;
            calculateSeoScore();
        }
    }

    function handleDragOver(e) {
        e.preventDefault();
        e.stopPropagation();
        document.getElementById('thumbnailDropzone')?.classList.add('dragover');
    }

    function handleDragLeave(e) {
        e.preventDefault();
        e.stopPropagation();
        document.getElementById('thumbnailDropzone')?.classList.remove('dragover');
    }

    function handleDrop(e) {
        e.preventDefault();
        e.stopPropagation();
        const dropzone = document.getElementById('thumbnailDropzone');
        dropzone?.classList.remove('dragover');
        if (e.dataTransfer && e.dataTransfer.files.length > 0) {
            const fileInput = document.getElementById('imageInput');
            fileInput.files = e.dataTransfer.files;
            previewFeaturedImage(fileInput);
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

    function handleImageRemovalToggle(checkbox) {
        const imgPreview = document.getElementById('featuredImagePreview');
        if (checkbox.checked) {
            imgPreview.style.opacity = '0.3';
        } else {
            imgPreview.style.opacity = '1';
        }
        calculateSeoScore();
    }

    // Modal Delete Handlers for Danger Zone
    function triggerDeleteFromEdit() {
        const modal = document.getElementById('deleteConfirmationModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(() => {
            modal.classList.add('is-active');
        });
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteConfirmationModal');
        if (!modal) return;
        modal.classList.remove('is-active');
        document.body.style.overflow = '';
        setTimeout(() => {
            modal.style.display = 'none';
        }, 240);
    }

    function handleModalBackdropClick(event) {
        if (event.target.id === 'deleteConfirmationModal') {
            closeDeleteModal();
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('deleteConfirmationModal');
            if (modal && modal.classList.contains('is-active')) {
                closeDeleteModal();
            }
        }
    });

    function executeBlogDelete() {
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const btnText = document.getElementById('deleteBtnText');
        if (confirmBtn) {
            confirmBtn.disabled = true;
            confirmBtn.style.opacity = '0.75';
        }
        if (btnText) {
            btnText.textContent = 'Deleting...';
        }
        document.getElementById('standaloneDeleteForm').submit();
    }

    function previewBlogBannerImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('bannerPreviewImg');
                if (img) {
                    img.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function handleBannerRemovalToggle(checkbox) {
        const preview = document.getElementById('bannerPreviewImg');
        if (checkbox.checked) {
            preview.style.opacity = '0.4';
            preview.style.filter = 'grayscale(100%)';
        } else {
            preview.style.opacity = '1';
            preview.style.filter = 'none';
        }
    }
</script>
@endpush
@endsection
