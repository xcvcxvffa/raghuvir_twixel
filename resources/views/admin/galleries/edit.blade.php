@extends('admin.layouts.app')

@section('title', 'Edit Media: ' . Str::limit($gallery->title, 25) . ' - Raghuvir Atta')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.85rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.galleries.index') }}" style="color: var(--muted-foreground); text-decoration: none;">Media Management</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Edit: {{ Str::limit($gallery->title, 24) }}</span>
</div>

<!-- Header & Main Actions Banner -->
<div class="gallery-hero-header">
    <div class="gallery-hero-title-box">
        <div class="gallery-hero-icon">
            <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <div>
            <h1 class="gallery-page-title">Edit Gallery Media</h1>
            <p class="gallery-page-subtitle">
                Update title, replace photograph, modify YouTube video link, or reorder priority for this asset.
            </p>
        </div>
    </div>

    <div class="gallery-hero-actions">
        <a href="{{ route('admin.galleries.index') }}" class="gallery-btn gallery-btn-outline">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Library</span>
        </a>
    </div>
</div>

<!-- Form Validation Errors Alert -->
@if(isset($errors) && $errors->any())
    <div class="gallery-alert" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.25); color: #ef4444; margin-bottom: 1.5rem;">
        <i class="fa-solid fa-circle-exclamation" style="font-size: 1.15rem;"></i>
        <div>
            <strong style="display: block; margin-bottom: 0.25rem;">Please correct the following errors:</strong>
            <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- Main Form Container -->
<form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" id="editMediaForm">
    @csrf
    @method('PUT')

    <div class="gallery-form-card">
        <div class="gallery-form-header">
            <div class="header-icon-wrap">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <div>
                <h3 class="table-card-title">Modify Media Information</h3>
                <p class="table-card-desc">Adjust media configuration, file uploads, or YouTube link.</p>
            </div>
        </div>

        <div class="gallery-form-body">
            <!-- 1. Media Type Selector (Dual Cards) -->
            <div class="form-group-wrap">
                <label class="form-field-label">Media Type <span style="color: #ef4444;">*</span></label>
                <div class="media-type-switch-grid">
                    <label class="media-type-option" id="typeOptionImage">
                        <input type="radio" name="type" value="image" {{ old('type', $gallery->type) === 'image' ? 'checked' : '' }} onchange="updateTypeFields()">
                        <div class="type-card-inner">
                            <div class="type-icon-box photo">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <div>
                                <div class="type-title">Photo / Image Asset</div>
                                <div class="type-subtitle">Factory facilities, wheat harvests, packaging shots</div>
                            </div>
                            <div class="type-radio-indicator">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </div>
                    </label>

                    <label class="media-type-option" id="typeOptionVideo">
                        <input type="radio" name="type" value="video" {{ old('type', $gallery->type) === 'video' ? 'checked' : '' }} onchange="updateTypeFields()">
                        <div class="type-card-inner">
                            <div class="type-icon-box video">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <div>
                                <div class="type-title">YouTube Video Embed</div>
                                <div class="type-subtitle">Milling walkthroughs, recipe guides, plant tour reels</div>
                            </div>
                            <div class="type-radio-indicator">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- 2. Title & Category Row -->
            <div class="form-row-2col">
                <!-- Title -->
                <div class="form-group-wrap">
                    <label for="title" class="form-field-label">Media Title <span style="color: #ef4444;">*</span></label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="gallery-form-input"
                        placeholder="e.g., Traditional Stone Chakki Milling"
                        value="{{ old('title', $gallery->title) }}"
                        required
                    >
                    <div class="field-hint">Descriptive headline displayed in lightbox view and frontend titles.</div>
                </div>

                <!-- Category -->
                <div class="form-group-wrap">
                    <label for="category" class="form-field-label">Category Filter Tag</label>
                    <input
                        type="text"
                        name="category"
                        id="category"
                        class="gallery-form-input"
                        list="categoryList"
                        placeholder="Select or type custom..."
                        value="{{ old('category', $gallery->category) }}"
                    >
                    <datalist id="categoryList">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}"></option>
                        @endforeach
                    </datalist>
                    <div class="field-hint">Organizes this asset under category tabs on the website.</div>
                </div>
            </div>

            <!-- 3. Video URL Field (Shown for Video Type) -->
            <div id="videoUrlGroup" class="form-group-wrap" style="display: none;">
                <label for="video_url" class="form-field-label">
                    <span>YouTube Video URL</span>
                    <span style="color: #ef4444;">*</span>
                </label>
                <div style="position: relative;">
                    <i class="fa-brands fa-youtube" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #ef4444; font-size: 1.15rem; pointer-events: none;"></i>
                    <input
                        type="url"
                        name="video_url"
                        id="video_url"
                        class="gallery-form-input"
                        style="padding-left: 2.6rem;"
                        placeholder="https://www.youtube.com/watch?v=... or https://youtu.be/..."
                        value="{{ old('video_url', $gallery->video_url) }}"
                        oninput="previewYouTubeVideo()"
                    >
                </div>
                <div class="field-hint">Accepts standard YouTube links, shorts, or youtu.be short URLs.</div>

                <!-- Live YouTube Thumbnail Card -->
                <div id="ytPreviewBox" class="yt-preview-card" style="display: none; margin-top: 0.85rem;">
                    <img id="ytPreviewThumb" src="" alt="Video Preview" class="yt-preview-img">
                    <div>
                        <div style="font-weight: 700; font-size: 0.875rem; color: var(--foreground); margin-bottom: 2px;">
                            <i class="fa-solid fa-circle-check" style="color: #10b981; margin-right: 4px;"></i> Valid YouTube Video Detected
                        </div>
                        <div id="ytPreviewIdText" style="font-size: 0.8rem; color: var(--muted-foreground);"></div>
                    </div>
                </div>
            </div>

            <!-- 4. Image Upload & Current Image Preview Field -->
            <div class="form-group-wrap">
                <label class="form-field-label">
                    <span id="imageLabel">Media Image / Custom Thumbnail</span>
                </label>

                <!-- Current Image Preview Card -->
                @if($gallery->thumbnail_url)
                    <div class="current-media-card">
                        <img src="{{ $gallery->thumbnail_url }}" alt="{{ $gallery->title }}" class="current-media-thumb">
                        <div>
                            <div class="current-media-title">
                                <i class="fa-solid fa-circle-info" style="color: var(--primary);"></i> Current Active Media Thumbnail
                            </div>
                            <div class="current-media-desc">
                                {{ $gallery->image ? 'Custom uploaded image: ' . basename($gallery->image) : 'Generated from YouTube video thumbnail' }}
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="dropzone-area" id="dropzoneArea" onclick="document.getElementById('image').click()">
                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml"
                        style="display: none;"
                        onchange="previewUploadImage(this)"
                    >
                    <div id="dropzonePlaceholder">
                        <div class="dropzone-icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div class="dropzone-title">Click to upload replacement image or drag &amp; drop file here</div>
                        <div class="dropzone-subtitle">Leave empty to keep existing media • Supported: JPG, PNG, WEBP, SVG (Max 5MB)</div>
                    </div>
                    <div id="dropzonePreviewWrap" style="display: none;">
                        <img id="uploadPreviewImg" src="" alt="Upload Preview" class="dropzone-preview-img">
                        <div style="margin-top: 0.75rem;">
                            <button type="button" class="gallery-btn gallery-btn-outline" style="padding: 4px 12px; font-size: 0.75rem;" onclick="event.stopPropagation(); resetUploadImage();">
                                <i class="fa-solid fa-trash-can" style="color: #ef4444;"></i> Remove Selected Image
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Caption / Story Field -->
            <div class="form-group-wrap">
                <label for="caption" class="form-field-label">Caption / Media Story</label>
                <textarea
                    name="caption"
                    id="caption"
                    rows="3"
                    class="gallery-form-input gallery-textarea"
                    placeholder="Provide context explaining the milling process, the heritage of the chakki, or harvest details..."
                >{{ old('caption', $gallery->caption) }}</textarea>
                <div class="field-hint">Displayed in lightbox zoom previews and frontend card summaries.</div>
            </div>

            <!-- 6. Sort Order & Visibility Status -->
            <div class="form-row-2col" style="padding-top: 1rem; border-top: 1px solid var(--border); align-items: center;">
                <!-- Sort Order -->
                <div class="form-group-wrap" style="margin: 0;">
                    <label for="sort_order" class="form-field-label">Sort Priority</label>
                    <input
                        type="number"
                        name="sort_order"
                        id="sort_order"
                        class="gallery-form-input"
                        value="{{ old('sort_order', $gallery->sort_order) }}"
                        min="0"
                    >
                    <div class="field-hint">Lower numbers (0, 1, 2...) appear first in the public gallery.</div>
                </div>

                <!-- Active Status Toggle -->
                <div class="form-group-wrap" style="margin: 0;">
                    <label class="form-field-label">Visibility Status</label>
                    <label class="custom-toggle-wrap">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                        >
                        <span class="custom-toggle-slider"></span>
                        <span class="custom-toggle-label">Publish live on website</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Card Footer Actions -->
        <div class="gallery-form-footer">
            <a href="{{ route('admin.galleries.index') }}" class="gallery-btn gallery-btn-outline">
                Cancel
            </a>
            <button type="submit" class="gallery-btn gallery-btn-primary" id="saveMediaBtn">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Update Media Item</span>
            </button>
        </div>
    </div>
</form>

@endsection

@push('styles')
<style>
    /* =========================================================================
       COMPLETE SELF-CONTAINED SYNDRON UI STYLES FOR EDIT & CREATE VIEWS
       ========================================================================= */
    .gallery-hero-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.25rem;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg, 16px);
        padding: 1.35rem 1.65rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.05);
    }
    .gallery-hero-title-box {
        display: flex;
        align-items: center;
        gap: 1.15rem;
    }
    .gallery-hero-icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.18), rgba(239, 128, 28, 0.12));
        color: #8b5cf6;
        border: 1px solid rgba(139, 92, 246, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .gallery-page-title {
        font-size: 1.45rem;
        font-weight: 800;
        color: var(--foreground);
        margin: 0;
        letter-spacing: -0.02em;
    }
    .gallery-page-subtitle {
        font-size: 0.85rem;
        color: var(--muted-foreground);
        margin: 0.3rem 0 0 0;
        max-width: 650px;
        line-height: 1.4;
    }
    .gallery-hero-actions {
        display: flex;
        gap: 0.65rem;
        align-items: center;
        flex-wrap: wrap;
    }

    /* Modern Buttons */
    .gallery-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 0.55rem !important;
        font-size: 0.875rem !important;
        font-weight: 700 !important;
        padding: 0.65rem 1.35rem !important;
        border-radius: 10px !important;
        border: 1px solid transparent !important;
        cursor: pointer !important;
        text-decoration: none !important;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1) !important;
        white-space: nowrap !important;
        line-height: 1.3 !important;
    }
    .gallery-btn-primary {
        background: linear-gradient(135deg, #EF801C 0%, #d96d0d 100%) !important;
        color: #FFFFFF !important;
        box-shadow: 0 4px 14px rgba(239, 128, 28, 0.35) !important;
        border-color: #EF801C !important;
    }
    .gallery-btn-primary:hover {
        transform: translateY(-1.5px) !important;
        box-shadow: 0 6px 20px rgba(239, 128, 28, 0.45) !important;
        color: #FFFFFF !important;
    }
    .gallery-btn-outline {
        background: var(--background) !important;
        color: var(--foreground) !important;
        border-color: var(--border) !important;
    }
    .gallery-btn-outline:hover {
        background: var(--secondary) !important;
        color: var(--foreground) !important;
        border-color: #EF801C !important;
        transform: translateY(-1.5px) !important;
    }

    /* Form Card Container */
    .gallery-form-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg, 16px);
        max-width: 900px;
        margin: 0 auto 2.5rem auto;
        box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }
    .gallery-form-header {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 1.25rem 1.65rem;
        border-bottom: 1px solid var(--border);
        background: var(--card);
    }
    .header-icon-wrap {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(139, 92, 246, 0.1);
        color: #8b5cf6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }
    .table-card-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--foreground);
        margin: 0;
    }
    .table-card-desc {
        font-size: 0.8rem;
        color: var(--muted-foreground);
        margin: 0.15rem 0 0 0;
    }
    .gallery-form-body {
        padding: 1.75rem 1.65rem;
        display: flex;
        flex-direction: column;
        gap: 1.35rem;
    }
    .gallery-form-footer {
        padding: 1.15rem 1.65rem;
        border-top: 1px solid var(--border);
        background: var(--card);
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 0.75rem;
    }

    .form-group-wrap {
        display: flex;
        flex-direction: column;
    }
    .form-field-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--foreground);
        margin-bottom: 0.45rem;
    }
    .field-hint {
        font-size: 0.75rem;
        color: var(--muted-foreground);
        margin-top: 0.35rem;
    }
    .form-row-2col {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.15rem;
    }
    @media (max-width: 768px) {
        .form-row-2col { grid-template-columns: 1fr; }
    }

    .gallery-form-input {
        width: 100%;
        height: 44px;
        background: var(--background);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 0 1rem;
        font-size: 0.875rem;
        color: var(--foreground);
        outline: none;
        transition: all 0.18s ease;
    }
    .gallery-form-input:focus {
        border-color: #EF801C;
        box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.15);
    }
    .gallery-textarea {
        height: auto;
        min-height: 85px;
        padding: 0.75rem 1rem;
        resize: vertical;
        line-height: 1.5;
    }

    /* Media Type Option Radio Cards */
    .media-type-switch-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    @media (max-width: 640px) {
        .media-type-switch-grid { grid-template-columns: 1fr; }
    }

    .media-type-option {
        cursor: pointer;
        position: relative;
    }
    .media-type-option input[type="radio"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }
    .type-card-inner {
        border: 2px solid var(--border);
        border-radius: 12px;
        padding: 1.15rem 1.25rem;
        background: var(--background);
        display: flex;
        align-items: center;
        gap: 14px;
        position: relative;
        transition: all 0.2s ease;
    }
    .media-type-option input[type="radio"]:checked + .type-card-inner {
        border-color: #8b5cf6;
        background: rgba(139, 92, 246, 0.05);
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15);
    }
    .type-icon-box {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }
    .type-icon-box.photo {
        background: rgba(59, 130, 246, 0.12);
        color: #3b82f6;
    }
    .type-icon-box.video {
        background: rgba(239, 68, 68, 0.12);
        color: #ef4444;
    }
    .type-title {
        font-weight: 800;
        font-size: 0.95rem;
        color: var(--foreground);
    }
    .type-subtitle {
        font-size: 0.75rem;
        color: var(--muted-foreground);
        margin-top: 2px;
    }
    .type-radio-indicator {
        margin-left: auto;
        font-size: 1.15rem;
        color: var(--border);
        transition: all 0.2s ease;
    }
    .media-type-option input[type="radio"]:checked + .type-card-inner .type-radio-indicator {
        color: #8b5cf6;
    }

    /* Current Media Card */
    .current-media-card {
        background: var(--secondary);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 0.85rem;
    }
    .current-media-thumb {
        width: 84px;
        height: 56px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid var(--border);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .current-media-title {
        font-weight: 700;
        font-size: 0.85rem;
        color: var(--foreground);
        margin-bottom: 2px;
    }
    .current-media-desc {
        font-size: 0.775rem;
        color: var(--muted-foreground);
    }

    /* Dropzone Upload Area */
    .dropzone-area {
        border: 2px dashed var(--border);
        border-radius: 14px;
        background: var(--secondary);
        padding: 2.25rem 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .dropzone-area:hover {
        border-color: #8b5cf6;
        background: rgba(139, 92, 246, 0.03);
    }
    .dropzone-icon {
        font-size: 2.25rem;
        color: #8b5cf6;
        margin-bottom: 0.65rem;
    }
    .dropzone-title {
        font-size: 0.925rem;
        font-weight: 700;
        color: var(--foreground);
    }
    .dropzone-subtitle {
        font-size: 0.775rem;
        color: var(--muted-foreground);
        margin-top: 4px;
    }
    .dropzone-preview-img {
        max-height: 220px;
        max-width: 100%;
        border-radius: 10px;
        border: 1px solid var(--border);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    /* Live YouTube Preview Card */
    .yt-preview-card {
        background: var(--background);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .yt-preview-img {
        width: 80px;
        height: 52px;
        border-radius: 6px;
        object-fit: cover;
        background: #000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    /* Custom Switch Slider */
    .custom-toggle-wrap {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        position: relative;
    }
    .custom-toggle-wrap input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }
    .custom-toggle-slider {
        width: 44px;
        height: 24px;
        background: rgba(148, 163, 184, 0.28);
        border-radius: 9999px;
        position: relative;
        transition: all 0.2s ease;
    }
    .custom-toggle-slider::before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #FFFFFF;
        top: 3px;
        left: 3px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .custom-toggle-wrap input[type="checkbox"]:checked + .custom-toggle-slider {
        background: #10b981;
    }
    .custom-toggle-wrap input[type="checkbox"]:checked + .custom-toggle-slider::before {
        transform: translateX(20px);
    }
    .custom-toggle-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--foreground);
    }
</style>
@endpush

@push('scripts')
<script>
    function updateTypeFields() {
        const isVideo = document.querySelector('input[name="type"][value="video"]').checked;
        const videoUrlGroup = document.getElementById('videoUrlGroup');
        const imageLabel = document.getElementById('imageLabel');

        if (isVideo) {
            videoUrlGroup.style.display = 'block';
            imageLabel.innerHTML = 'Custom Thumbnail <span style="font-weight: 400; color: var(--muted-foreground); font-size: 0.775rem;">(Optional — will auto-fetch high-res from YouTube)</span>';
            previewYouTubeVideo();
        } else {
            videoUrlGroup.style.display = 'none';
            imageLabel.innerHTML = 'High-Resolution Photo File';
            document.getElementById('ytPreviewBox').style.display = 'none';
        }
    }

    function extractYouTubeId(url) {
        if (!url) return null;
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    function previewYouTubeVideo() {
        const urlInput = document.getElementById('video_url');
        const ytBox = document.getElementById('ytPreviewBox');
        const ytThumb = document.getElementById('ytPreviewThumb');
        const ytText = document.getElementById('ytPreviewIdText');

        const ytId = extractYouTubeId(urlInput.value);
        if (ytId) {
            ytThumb.src = `https://img.youtube.com/vi/${ytId}/hqdefault.jpg`;
            ytText.textContent = `YouTube Video ID: ${ytId}`;
            ytBox.style.display = 'flex';
        } else {
            ytBox.style.display = 'none';
        }
    }

    function previewUploadImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('uploadPreviewImg').src = e.target.result;
                document.getElementById('dropzonePlaceholder').style.display = 'none';
                document.getElementById('dropzonePreviewWrap').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetUploadImage() {
        document.getElementById('image').value = '';
        document.getElementById('dropzonePlaceholder').style.display = 'block';
        document.getElementById('dropzonePreviewWrap').style.display = 'none';
    }

    // Drag & drop support
    const dropzone = document.getElementById('dropzoneArea');
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropzone.style.borderColor = '#8b5cf6';
            dropzone.style.background = 'rgba(139, 92, 246, 0.05)';
        }, false);
    });
    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropzone.style.borderColor = 'var(--border)';
            dropzone.style.background = 'var(--secondary)';
        }, false);
    });
    dropzone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length) {
            document.getElementById('image').files = files;
            previewUploadImage(document.getElementById('image'));
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        updateTypeFields();
        previewYouTubeVideo();
    });
</script>
@endpush
