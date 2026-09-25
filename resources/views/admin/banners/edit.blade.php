@extends('admin.layouts.app')

@section('title', 'Edit Banner: ' . $banner->page_name . ' - Raghuvir Atta Admin')

@section('content')
{{-- Breadcrumb Navigation --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="{{ route('admin.banners.index') }}">Page Banners</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">{{ $banner->page_name }}</span>
</div>

{{-- Header Banner --}}
<div class="settings-header-banner" style="margin-bottom: 1.5rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge" style="background: linear-gradient(135deg, rgba(14, 165, 233, 0.2), rgba(14, 165, 233, 0.05)); color: #0284c7; border: 1px solid rgba(14, 165, 233, 0.25);">
            <i class="fa-solid fa-pen-nib"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem;">
                <span>Edit Banner: {{ $banner->page_name }}</span>
                @if($banner->hasCustomImage())
                    <span class="badge-tag" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">Custom Image Active</span>
                @else
                    <span class="badge-tag" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">Using Default Image</span>
                @endif
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Update the header background banner and text for the <strong>{{ $banner->page_name }}</strong> page ({{ $banner->page_route }}).
            </p>
        </div>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center;">
        <a href="{{ route('admin.banners.index') }}" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-arrow-left"></i><span>Back to Banners</span>
        </a>
    </div>
</div>

<div class="banner-edit-grid" style="display: grid; grid-template-columns: minmax(0, 1fr) 320px; gap: 1.5rem; align-items: start;">
    {{-- Main Form Card --}}
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 16px; padding: 1.5rem; min-width: 0; overflow: hidden;">
        <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Interactive Banner Position Adjuster & Live Preview --}}
            @include('admin.partials.banner-adjuster', [
                'idPrefix' => 'page_banner',
                'currentImageUrl' => $banner->getImageUrl(),
                'currentPosition' => old('banner_position', $banner->banner_position ?? 'center center'),
                'fileInputName' => 'image',
                'positionInputName' => 'banner_position',
                'titleSimulation' => $banner->title ?? $banner->page_name,
                'routeSimulation' => $banner->page_name,
                'previewHeight' => '420px',
            ])

            {{-- File Upload Field --}}
            <div style="margin-bottom: 1.5rem;">
                <label for="image_input" style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.5rem;">
                    Upload New Banner Image
                </label>
                <div style="position: relative; border: 2px dashed var(--border); border-radius: 12px; padding: 1.5rem; text-align: center; background: var(--input-bg); cursor: pointer;" onclick="document.getElementById('image_input').click()">
                    <i class="fa-solid fa-cloud-arrow-up" style="font-size: 2rem; color: #EF801C; margin-bottom: 0.5rem;"></i>
                    <div style="font-size: 0.9rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.25rem;">
                        Click here to select an image from your device
                    </div>
                    <div style="font-size: 0.75rem; color: var(--muted-foreground);">
                        Recommended: <strong>1920 × 500 px</strong> (WebP, JPG, or PNG up to 5 MB) &bull; You can drag &amp; adjust image position above
                    </div>
                    <input type="file" name="image" id="image_input" accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml" style="display: none;" onchange="previewSelectedImage(this)">
                </div>
            </div>

            {{-- Title & Subtitle --}}
            <div style="display: grid; grid-template-columns: 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <label for="title" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.4rem;">
                        Heading Title (Shown inside banner)
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title', $banner->title ?? $banner->page_name) }}" oninput="if(document.getElementById('page_banner_title_sim')) document.getElementById('page_banner_title_sim').textContent = this.value || '{{ $banner->page_name }}'" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid var(--border); background: var(--input-bg); color: var(--foreground); font-size: 0.9rem;">
                </div>

                <div>
                    <label for="subtitle" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.4rem;">
                        Subtitle / Description (Optional)
                    </label>
                    <textarea name="subtitle" id="subtitle" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid var(--border); background: var(--input-bg); color: var(--foreground); font-size: 0.85rem;">{{ old('subtitle', $banner->subtitle) }}</textarea>
                </div>
            </div>

            {{-- Form Actions --}}
            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--border);">
                <div>
                    @if($banner->hasCustomImage())
                        <button type="button" class="btn-syndron btn-syndron-secondary" style="color: #ef4444;" onclick="if(confirm('Revert this page banner to the default theme image?')) { document.getElementById('resetBannerForm').submit(); }">
                            <i class="fa-solid fa-rotate-left"></i><span>Revert to Default Image</span>
                        </button>
                    @endif
                </div>

                <div style="display: flex; gap: 0.75rem;">
                    <a href="{{ route('admin.banners.index') }}" class="btn-syndron btn-syndron-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-syndron btn-syndron-primary">
                        <i class="fa-solid fa-floppy-disk"></i><span>Save Changes</span>
                    </button>
                </div>
            </div>
        </form>

        {{-- Hidden Reset Form --}}
        @if($banner->hasCustomImage())
            <form id="resetBannerForm" action="{{ route('admin.banners.reset', $banner) }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>

    {{-- Side Info Box with Guidelines --}}
    <div>
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem; margin-bottom: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; color: #EF801C; font-weight: 700; font-size: 0.95rem;">
                <i class="fa-solid fa-circle-info"></i>
                <span>Image Size Guide</span>
            </div>

            <div style="margin-bottom: 0.85rem; padding-bottom: 0.85rem; border-bottom: 1px solid var(--border);">
                <div style="font-size: 0.75rem; color: var(--muted-foreground); text-transform: uppercase; font-weight: 600;">Recommended Size</div>
                <div style="font-size: 1.05rem; font-weight: 800; color: var(--foreground); margin-top: 2px;">{{ $specs['dimensions'] }}</div>
                <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">Panoramic Landscape</div>
            </div>

            <div style="margin-bottom: 0.85rem; padding-bottom: 0.85rem; border-bottom: 1px solid var(--border);">
                <div style="font-size: 0.75rem; color: var(--muted-foreground); text-transform: uppercase; font-weight: 600;">Aspect Ratio</div>
                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-top: 2px;">{{ $specs['aspect_ratio'] }}</div>
            </div>

            <div style="margin-bottom: 0.85rem; padding-bottom: 0.85rem; border-bottom: 1px solid var(--border);">
                <div style="font-size: 0.75rem; color: var(--muted-foreground); text-transform: uppercase; font-weight: 600;">Supported Formats</div>
                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-top: 2px;">{{ $specs['formats'] }}</div>
            </div>

            <div style="margin-bottom: 0.85rem; padding-bottom: 0.85rem; border-bottom: 1px solid var(--border);">
                <div style="font-size: 0.75rem; color: var(--muted-foreground); text-transform: uppercase; font-weight: 600;">Max File Size</div>
                <div style="font-size: 0.95rem; font-weight: 700; color: var(--foreground); margin-top: 2px;">{{ $specs['max_size'] }}</div>
            </div>

            <div style="background: rgba(239, 128, 28, 0.08); border-radius: 10px; padding: 0.75rem; font-size: 0.75rem; color: var(--foreground); line-height: 1.4;">
                <i class="fa-solid fa-lightbulb" style="color: #EF801C; margin-right: 4px;"></i>
                {{ $specs['tip'] }}
            </div>
        </div>

        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem;">
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.5rem;">
                Page Details
            </div>
            <div style="font-size: 0.8rem; color: var(--muted-foreground); margin-bottom: 0.4rem;">
                <strong>Key:</strong> <code>{{ $banner->page_key }}</code>
            </div>
            <div style="font-size: 0.8rem; color: var(--muted-foreground); margin-bottom: 0.4rem;">
                <strong>Route:</strong> <code>{{ $banner->page_route }}</code>
            </div>
            <div style="font-size: 0.8rem; color: var(--muted-foreground);">
                <strong>Status:</strong> {{ $banner->hasCustomImage() ? 'Custom Banner Image' : 'Theme Default' }}
            </div>
        </div>
    </div>
</div>

<script>
function previewSelectedImage(input) {
    if (input.files && input.files[0]) {
        if (typeof window.page_banner_updateImage === 'function') {
            window.page_banner_updateImage(input.files[0]);
        }
    }
}
</script>

<style>
@media (max-width: 1080px) {
    .banner-edit-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endsection
