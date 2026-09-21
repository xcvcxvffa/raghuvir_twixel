@extends('admin.layouts.app')

@section('title', 'Page Breadcrumb & Hero Banners - Raghuvir Atta Admin')

@section('content')
{{-- Breadcrumb Navigation --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Content Management</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Page Breadcrumb Banners</span>
</div>

{{-- ===== HEADER BANNER ===== --}}
<div class="settings-header-banner" style="margin-bottom: 1.5rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge" style="background: linear-gradient(135deg, rgba(14, 165, 233, 0.2), rgba(14, 165, 233, 0.05)); color: #0284c7; border: 1px solid rgba(14, 165, 233, 0.25);">
            <i class="fa-solid fa-panorama"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem;">
                <span>Page Breadcrumb &amp; Hero Banners</span>
                <span class="header-count-badge" style="background: rgba(14, 165, 233, 0.15); color: #0284c7;">{{ $totalPages }} Pages</span>
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Manage custom hero background images for each website page. Each page can now have its own unique banner instead of sharing the same default image.
            </p>
        </div>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('about') }}" target="_blank" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-globe"></i><span>Preview Website</span>
        </a>
    </div>
</div>

{{-- Flash Alert --}}
@if(session('success'))
    <div class="gallery-alert gallery-alert-success" id="flashAlert" style="margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.75rem; padding: 1rem 1.25rem; border-radius: 12px; background: rgba(16, 185, 129, 0.12); border: 1px solid rgba(16, 185, 129, 0.25); color: #10b981;">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <div><strong>Success:</strong> {{ session('success') }}</div>
        <button type="button" onclick="this.parentElement.remove()" style="margin-left: auto; background: none; border: none; color: inherit; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif

@if(isset($errors) && $errors->any())
    <div class="gallery-alert gallery-alert-error" style="margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.75rem; padding: 1rem 1.25rem; border-radius: 12px; background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.25); color: #ef4444;">
        <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.2rem;"></i>
        <div>
            <strong>Validation Error:</strong>
            <ul style="margin: 0.25rem 0 0 1rem; padding: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" onclick="this.parentElement.remove()" style="margin-left: auto; background: none; border: none; color: inherit; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif

{{-- ===== KPI METRICS ROW ===== --}}
<div class="metrics-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
    <div class="metric-card" style="background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 1.25rem;">
        <div class="metric-card-top" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
            <span class="metric-title" style="font-size: 0.85rem; color: var(--muted-foreground); font-weight: 600;">Total Managed Pages</span>
            <div class="metric-badge-icon" style="width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: rgba(14, 165, 233, 0.15); color: #0284c7;"><i class="fa-solid fa-file-lines"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number" style="font-size: 1.75rem; font-weight: 800;">{{ $totalPages }}</div></div>
        <div style="font-size: 0.75rem; color: var(--muted-foreground); margin-top: 0.25rem;">Frontend inner pages with header banners</div>
    </div>

    <div class="metric-card" style="background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 1.25rem;">
        <div class="metric-card-top" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
            <span class="metric-title" style="font-size: 0.85rem; color: var(--muted-foreground); font-weight: 600;">Custom Banners Active</span>
            <div class="metric-badge-icon" style="width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: rgba(16, 185, 129, 0.15); color: #10b981;"><i class="fa-solid fa-circle-check"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number" style="font-size: 1.75rem; font-weight: 800; color: #10b981;">{{ $customCount }}</div></div>
        <div style="font-size: 0.75rem; color: var(--muted-foreground); margin-top: 0.25rem;">Pages using unique uploaded images</div>
    </div>

    <div class="metric-card" style="background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 1.25rem;">
        <div class="metric-card-top" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
            <span class="metric-title" style="font-size: 0.85rem; color: var(--muted-foreground); font-weight: 600;">Using Default Theme Banner</span>
            <div class="metric-badge-icon" style="width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: rgba(245, 158, 11, 0.15); color: #d97706;"><i class="fa-solid fa-clock-rotate-left"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number" style="font-size: 1.75rem; font-weight: 800; color: #d97706;">{{ $defaultCount }}</div></div>
        <div style="font-size: 0.75rem; color: var(--muted-foreground); margin-top: 0.25rem;">Fallback to default brudcamp_about.png</div>
    </div>
</div>

{{-- ===== IMAGE UPLOAD GUIDELINES & SPECIFICATIONS CARD ===== --}}
<div class="specs-guidelines-card" style="background: linear-gradient(135deg, rgba(239, 128, 28, 0.06), rgba(14, 165, 233, 0.04)); border: 1.5px dashed rgba(239, 128, 28, 0.35); border-radius: 16px; padding: 1.35rem 1.5rem; margin-bottom: 1.75rem; position: relative;">
    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.85rem;">
        <div style="width: 32px; height: 32px; border-radius: 8px; background: #EF801C; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.95rem;">
            <i class="fa-solid fa-ruler-combined"></i>
        </div>
        <div>
            <h3 style="margin: 0; font-size: 1rem; font-weight: 700; color: var(--foreground);">
                Recommended Banner Image Dimensions &amp; Upload Specifications
            </h3>
            <span style="font-size: 0.78rem; color: var(--muted-foreground);">
                અહીં આપેલી સાઇઝ પ્રમાણે ઇમેજ અપલોડ કરશો જેથી તમામ સ્ક્રીન પર બેનર એકદમ ક્લિયર અને પ્રોફેશનલ દેખાશે.
            </span>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 0.75rem;">
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 0.85rem 1rem;">
            <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #EF801C; margin-bottom: 0.25rem;">
                <i class="fa-solid fa-expand" style="margin-right: 4px;"></i> Recommended Size
            </div>
            <div style="font-size: 1.1rem; font-weight: 800; color: var(--foreground);">
                {{ $specs['dimensions'] }}
            </div>
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">Min width: 1200px | Height: 450 - 600px</div>
        </div>

        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 0.85rem 1rem;">
            <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #0284c7; margin-bottom: 0.25rem;">
                <i class="fa-solid fa-crop" style="margin-right: 4px;"></i> Aspect Ratio
            </div>
            <div style="font-size: 1.1rem; font-weight: 800; color: var(--foreground);">
                {{ $specs['aspect_ratio'] }}
            </div>
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">Panoramic Landscape Format</div>
        </div>

        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 0.85rem 1rem;">
            <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #10b981; margin-bottom: 0.25rem;">
                <i class="fa-solid fa-file-image" style="margin-right: 4px;"></i> Supported Formats
            </div>
            <div style="font-size: 1.1rem; font-weight: 800; color: var(--foreground);">
                {{ $specs['formats'] }}
            </div>
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">WebP format is best for fast speed</div>
        </div>

        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 0.85rem 1rem;">
            <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #8b5cf6; margin-bottom: 0.25rem;">
                <i class="fa-solid fa-weight-scale" style="margin-right: 4px;"></i> Max File Size
            </div>
            <div style="font-size: 1.1rem; font-weight: 800; color: var(--foreground);">
                Max 5.0 MB
            </div>
            <div style="font-size: 0.72rem; color: var(--muted-foreground); margin-top: 2px;">Recommended under 600 KB</div>
        </div>
    </div>

    <div style="margin-top: 0.85rem; padding: 0.65rem 0.9rem; background: rgba(239, 128, 28, 0.08); border-radius: 10px; font-size: 0.78rem; color: var(--foreground); display: flex; align-items: center; gap: 0.5rem;">
        <i class="fa-solid fa-lightbulb" style="color: #EF801C;"></i>
        <span><strong>Design Tip:</strong> {{ $specs['tip'] }}</span>
    </div>
</div>

{{-- ===== FILTERS & SEARCH BAR ===== --}}
<div class="filters-card" style="background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
    <form action="{{ route('admin.banners.index') }}" method="GET" style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap; flex: 1;">
        <div style="position: relative; min-width: 260px; flex: 1; max-width: 400px;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--muted-foreground); font-size: 0.85rem;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search page name or route..." style="width: 100%; padding: 0.55rem 0.75rem 0.55rem 2.2rem; border-radius: 8px; border: 1px solid var(--border); background: var(--input-bg); color: var(--foreground); font-size: 0.85rem;">
        </div>

        <select name="status" onchange="this.form.submit()" style="padding: 0.55rem 0.9rem; border-radius: 8px; border: 1px solid var(--border); background: var(--input-bg); color: var(--foreground); font-size: 0.85rem; cursor: pointer;">
            <option value="">All Statuses ({{ $totalPages }})</option>
            <option value="custom" {{ request('status') === 'custom' ? 'selected' : '' }}>Custom Banners ({{ $customCount }})</option>
            <option value="default" {{ request('status') === 'default' ? 'selected' : '' }}>Default Banners ({{ $defaultCount }})</option>
        </select>

        <button type="submit" class="btn-syndron btn-syndron-primary" style="padding: 0.55rem 1rem;">
            <i class="fa-solid fa-filter"></i><span>Filter</span>
        </button>

        @if(request('search') || request('status'))
            <a href="{{ route('admin.banners.index') }}" class="btn-syndron btn-syndron-secondary" style="padding: 0.55rem 0.9rem;">
                <i class="fa-solid fa-rotate-left"></i><span>Reset</span>
            </a>
        @endif
    </form>
</div>

{{-- ===== PAGE BANNERS LISTING (CARDS / TABLE) ===== --}}
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(360px, 1fr)); gap: 1.25rem;">
    @forelse($banners as $banner)
        <div class="banner-page-card" style="background: var(--card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; display: flex; flex-direction: column; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
            {{-- Preview Image Header --}}
            <div style="position: relative; height: 160px; background: #1a1a1a; overflow: hidden;">
                <img src="{{ $banner->getImageUrl() }}" alt="{{ $banner->page_name }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" id="preview-img-{{ $banner->id }}">
                
                {{-- Dark overlay simulating the website look --}}
                <div style="position: absolute; inset: 0; background: rgba(239, 128, 28, 0.3); mix-blend-mode: multiply;"></div>
                <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);"></div>

                {{-- Status Badge --}}
                <div style="position: absolute; top: 12px; left: 12px; z-index: 2;">
                    @if($banner->hasCustomImage())
                        <span class="badge-tag" style="background: rgba(16, 185, 129, 0.9); color: #fff; font-weight: 700; backdrop-filter: blur(4px); padding: 4px 10px; border-radius: 6px; font-size: 0.72rem;">
                            <i class="fa-solid fa-circle-check"></i> Custom Image Active
                        </span>
                    @else
                        <span class="badge-tag" style="background: rgba(245, 158, 11, 0.9); color: #fff; font-weight: 700; backdrop-filter: blur(4px); padding: 4px 10px; border-radius: 6px; font-size: 0.72rem;">
                            <i class="fa-solid fa-image"></i> Default Theme Image
                        </span>
                    @endif
                </div>

                {{-- Page Title Simulation over image --}}
                <div style="position: absolute; bottom: 12px; left: 16px; right: 16px; z-index: 2;">
                    <div style="color: #ffffff; font-size: 1.15rem; font-weight: 800; text-shadow: 0 2px 4px rgba(0,0,0,0.6);">
                        {{ $banner->page_name }}
                    </div>
                    <div style="color: rgba(255,255,255,0.85); font-size: 0.75rem;">
                        <i class="fa-solid fa-link" style="margin-right: 4px;"></i> {{ $banner->page_route ?? '/' . $banner->page_key }}
                    </div>
                </div>

                {{-- Quick Lightbox / View Full button --}}
                <a href="{{ $banner->getImageUrl() }}" target="_blank" style="position: absolute; top: 12px; right: 12px; z-index: 2; width: 30px; height: 30px; border-radius: 50%; background: rgba(0,0,0,0.6); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; text-decoration: none;" title="View Image Full Size">
                    <i class="fa-solid fa-up-right-from-square"></i>
                </a>
            </div>

            {{-- Card Body --}}
            <div style="padding: 1.2rem; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground);">
                            Page Identifier
                        </span>
                        <code style="font-size: 0.75rem; background: var(--input-bg); padding: 2px 6px; border-radius: 4px; color: #EF801C; border: 1px solid var(--border);">
                            {{ $banner->page_key }}
                        </code>
                    </div>

                    @if($banner->subtitle)
                        <p style="font-size: 0.8rem; color: var(--muted-foreground); margin: 0 0 1rem 0; line-height: 1.4;">
                            {{ Str::limit($banner->subtitle, 85) }}
                        </p>
                    @endif
                </div>

                {{-- Card Actions --}}
                <div style="padding-top: 0.85rem; border-top: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; flex-wrap: wrap;">
                    <div style="display: flex; gap: 0.4rem; align-items: center;">
                        {{-- Quick Upload Trigger Button --}}
                        <button type="button" class="btn-syndron btn-syndron-primary" style="padding: 0.45rem 0.8rem; font-size: 0.8rem;" onclick="openQuickUploadModal({{ $banner->id }}, '{{ addslashes($banner->page_name) }}', '{{ $banner->getImageUrl() }}')">
                            <i class="fa-solid fa-cloud-arrow-up"></i><span>Change Image</span>
                        </button>

                        {{-- Full Edit --}}
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn-syndron btn-syndron-secondary" style="padding: 0.45rem 0.75rem; font-size: 0.8rem;" title="Edit Title and Settings">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>

                    <div style="display: flex; gap: 0.4rem; align-items: center;">
                        {{-- Reset to default button (if custom image exists) --}}
                        @if($banner->hasCustomImage())
                            <form action="{{ route('admin.banners.reset', $banner) }}" method="POST" onsubmit="return confirm('Are you sure you want to revert {{ addslashes($banner->page_name) }} to the default theme banner?');" style="margin: 0;">
                                @csrf
                                <button type="submit" class="btn-syndron btn-syndron-secondary" style="padding: 0.45rem 0.75rem; font-size: 0.8rem; color: #ef4444;" title="Revert to Default Image">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </form>
                        @endif

                        {{-- Live View Button --}}
                        @php
                            $routeUrl = url($banner->page_route ?? '/' . $banner->page_key);
                            // Avoid dummy placeholder routes
                            if (str_contains($banner->page_route, '{')) {
                                if ($banner->page_key === 'product-details') {
                                    $sampleProduct = \App\Models\Product::first();
                                    $routeUrl = $sampleProduct ? route('product-details', $sampleProduct->slug) : url('/products');
                                } elseif ($banner->page_key === 'blog-single') {
                                    $sampleBlog = \App\Models\Blog::first();
                                    $routeUrl = $sampleBlog ? route('blog.single', $sampleBlog->slug) : url('/blog');
                                } else {
                                    $routeUrl = url('/products');
                                }
                            }
                        @endphp
                        <a href="{{ $routeUrl }}" target="_blank" class="btn-syndron btn-syndron-secondary" style="padding: 0.45rem 0.75rem; font-size: 0.8rem;" title="Open Page on Website">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div style="grid-column: 1 / -1; padding: 3rem; text-align: center; background: var(--card); border: 1px dashed var(--border); border-radius: 16px;">
            <i class="fa-solid fa-image-slash" style="font-size: 2.5rem; color: var(--muted-foreground); margin-bottom: 1rem;"></i>
            <h3 style="margin: 0 0 0.5rem 0; font-size: 1.1rem; color: var(--foreground);">No Page Banners Found</h3>
            <p style="color: var(--muted-foreground); font-size: 0.85rem; margin: 0 0 1rem 0;">Try adjusting your search criteria or status filter.</p>
            <a href="{{ route('admin.banners.index') }}" class="btn-syndron btn-syndron-secondary">Reset Filters</a>
        </div>
    @endforelse
</div>

{{-- ===== QUICK UPLOAD MODAL ===== --}}
<div id="quickUploadModal" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0, 0, 0, 0.65); backdrop-filter: blur(4px); align-items: center; justify-content: center; padding: 1.5rem;">
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 18px; width: 100%; max-width: 580px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35); animation: modalIn 0.2s ease-out;">
        {{-- Modal Header --}}
        <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: var(--input-bg);">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(14, 165, 233, 0.15); color: #0284c7; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div>
                    <h3 style="margin: 0; font-size: 1rem; font-weight: 700; color: var(--foreground);">Upload Banner Image</h3>
                    <span id="modalPageTitle" style="font-size: 0.8rem; color: #EF801C; font-weight: 600;"></span>
                </div>
            </div>
            <button type="button" onclick="closeQuickUploadModal()" style="background: none; border: none; font-size: 1.1rem; color: var(--muted-foreground); cursor: pointer; padding: 0.5rem;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        {{-- Modal Form --}}
        <form action="{{ route('admin.banners.quick-upload') }}" method="POST" enctype="multipart/form-data" style="padding: 1.5rem;">
            @csrf
            <input type="hidden" name="banner_id" id="modalBannerId">

            {{-- Dimensions info box --}}
            <div style="margin-bottom: 1.25rem; padding: 0.75rem 1rem; background: rgba(14, 165, 233, 0.08); border: 1px solid rgba(14, 165, 233, 0.2); border-radius: 10px; font-size: 0.8rem; color: var(--foreground);">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem; font-weight: 700; color: #0284c7;">
                    <i class="fa-solid fa-circle-info"></i> Required Image Dimensions:
                </div>
                <div style="font-weight: 700; font-size: 0.95rem; margin-bottom: 2px;">
                    📐 1920 × 500 px &bull; Format: WebP / JPG / PNG &bull; Max: 5 MB
                </div>
                <span style="font-size: 0.75rem; color: var(--muted-foreground);">
                    For best look on mobile &amp; desktop, upload a wide landscape image.
                </span>
            </div>

            {{-- Live Preview Box --}}
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--muted-foreground); margin-bottom: 0.5rem;">Image Preview:</label>
                <div style="position: relative; height: 140px; border-radius: 12px; overflow: hidden; background: #111; border: 1px solid var(--border);">
                    <img id="modalPreviewImg" src="" alt="Banner Preview" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; inset: 0; background: rgba(239, 128, 28, 0.3); mix-blend-mode: multiply;"></div>
                    <div style="position: absolute; bottom: 8px; right: 12px; background: rgba(0,0,0,0.6); color: #fff; font-size: 0.7rem; padding: 2px 8px; border-radius: 4px;">
                        Website Overlay Simulation
                    </div>
                </div>
            </div>

            {{-- File Input --}}
            <div style="margin-bottom: 1.5rem;">
                <label for="banner_image_input" style="display: block; font-size: 0.82rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.5rem;">
                    Select Image File <span style="color: #ef4444;">*</span>
                </label>
                <input type="file" name="banner_image" id="banner_image_input" accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml" required onchange="handleModalFileSelect(this)" style="width: 100%; padding: 0.55rem; border: 1.5px dashed var(--border); border-radius: 10px; background: var(--input-bg); color: var(--foreground); font-size: 0.85rem; cursor: pointer;">
            </div>

            {{-- Actions --}}
            <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
                <button type="button" onclick="closeQuickUploadModal()" class="btn-syndron btn-syndron-secondary" style="padding: 0.6rem 1.2rem;">
                    Cancel
                </button>
                <button type="submit" class="btn-syndron btn-syndron-primary" style="padding: 0.6rem 1.5rem;">
                    <i class="fa-solid fa-cloud-arrow-up"></i><span>Save &amp; Apply Banner</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openQuickUploadModal(bannerId, pageName, currentImgUrl) {
    document.getElementById('modalBannerId').value = bannerId;
    document.getElementById('modalPageTitle').textContent = 'Page: ' + pageName;
    document.getElementById('modalPreviewImg').src = currentImgUrl;
    document.getElementById('banner_image_input').value = '';
    const modal = document.getElementById('quickUploadModal');
    modal.style.display = 'flex';
}

function closeQuickUploadModal() {
    const modal = document.getElementById('quickUploadModal');
    modal.style.display = 'none';
}

function handleModalFileSelect(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('modalPreviewImg').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Close on backdrop click
document.getElementById('quickUploadModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeQuickUploadModal();
    }
});

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuickUploadModal();
    }
});
</script>

<style>
@keyframes modalIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
.banner-page-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
}
.banner-page-card:hover img {
    transform: scale(1.04);
}
</style>
@endsection
