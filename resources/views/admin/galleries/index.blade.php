@extends('admin.layouts.app')

@section('title', 'Media Gallery Hub - Raghuvir Atta')

@section('content')
{{-- Breadcrumb --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Media Management</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Gallery Directory</span>
</div>

{{-- ===== HEADER BANNER (Glassmorphic) ===== --}}
<div class="settings-header-banner" style="margin-bottom: 1.75rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge" style="background: linear-gradient(135deg, rgba(139,92,246,0.18), rgba(139,92,246,0.06)); color: #8b5cf6; border: 1px solid rgba(139,92,246,0.25);">
            <i class="fa-solid fa-photo-film"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem;">
                <span>Media Gallery Hub</span>
                <span class="header-count-badge">{{ $totalCount }} Assets</span>
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Manage high-resolution plant photos, traditional stone milling videos, grain harvests, and YouTube reels shown on public galleries.
            </p>
        </div>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('image-gallery') }}" target="_blank" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-camera"></i><span>Photo Gallery</span>
        </a>
        <a href="{{ route('video-gallery') }}" target="_blank" class="btn-syndron btn-syndron-secondary">
            <i class="fa-brands fa-youtube"></i><span>Video Gallery</span>
        </a>
        <a href="{{ route('admin.galleries.create') }}" class="btn-syndron btn-syndron-primary">
            <i class="fa-solid fa-plus"></i><span>Add New Media</span>
        </a>
    </div>
</div>

{{-- Flash Alert --}}
@if(session('success'))
    <div class="gallery-alert gallery-alert-success" id="flashAlert">
        <i class="fa-solid fa-circle-check"></i>
        <div><strong>Success:</strong> {{ session('success') }}</div>
        <button type="button" onclick="this.parentElement.remove()" style="margin-left: auto; background: none; border: none; color: inherit; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif

{{-- ===== KPI METRICS ROW (Glassmorphic) ===== --}}
<div class="metrics-row" style="margin-bottom: 1.5rem;">
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Total Assets</span>
            <div class="metric-badge-icon purple"><i class="fa-solid fa-photo-film"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number">{{ $totalCount }}</div></div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="background: rgba(139,92,246,0.1); color: #8b5cf6; border: 1px solid rgba(139,92,246,0.2);"><i class="fa-solid fa-layer-group"></i><span>Total Items</span></span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Library catalog</span>
        </div>
    </div>
    <a href="{{ route('admin.galleries.index', ['type'=>'image']) }}" class="metric-card" style="text-decoration:none;cursor:pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Photo Gallery</span>
            <div class="metric-badge-icon blue"><i class="fa-solid fa-camera"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number">{{ $imagesCount }}</div></div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive"><i class="fa-solid fa-image"></i><span>High-Res</span></span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Active /image-gallery</span>
        </div>
    </a>
    <a href="{{ route('admin.galleries.index', ['type'=>'video']) }}" class="metric-card" style="text-decoration:none;cursor:pointer;">
        <div class="metric-card-top">
            <span class="metric-title">Video Gallery</span>
            <div class="metric-badge-icon red"><i class="fa-brands fa-youtube"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number">{{ $videosCount }}</div></div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="background: rgba(239,68,68,0.1); color:#ef4444; border: 1px solid rgba(239,68,68,0.2);"><i class="fa-brands fa-youtube"></i><span>YouTube</span></span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Active /video-gallery</span>
        </div>
    </a>
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Live &amp; Visible</span>
            <div class="metric-badge-icon green"><i class="fa-solid fa-circle-check"></i></div>
        </div>
        <div class="metric-value-box"><div class="metric-number" id="activeCounterVal">{{ $activeCount }}</div></div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive"><i class="fa-solid fa-eye"></i><span>Published</span></span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Visible to visitors</span>
        </div>
    </div>
</div>

{{-- ===== FILTER CARD (Glassmorphic) ===== --}}
<div class="card-syndron" style="margin-bottom: 1.5rem;">
    <div class="card-syndron-body" style="padding: 1.15rem 1.35rem;">
        <form action="{{ route('admin.galleries.index') }}" method="GET" id="galleryFilterForm" style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;justify-content:space-between;">
            <div style="display:flex;flex-wrap:wrap;gap:0.75rem;align-items:center;flex:1;min-width:280px;">
                <div class="input-with-icon" style="min-width:220px;flex:1;max-width:320px;">
                    <input type="text" name="search" id="gallerySearchInput" value="{{ request('search') }}" class="form-control-admin" placeholder="Search title, category, caption..." style="padding-top:0.55rem;padding-bottom:0.55rem;font-size:0.825rem;">
                    <i class="fa-solid fa-magnifying-glass input-icon" style="font-size:0.85rem;"></i>
                </div>
                <div style="min-width:160px;">
                    <select name="type" class="form-control-admin" onchange="this.form.submit()" style="padding-top:0.55rem;padding-bottom:0.55rem;font-size:0.825rem;cursor:pointer;">
                        <option value="">All Media Types</option>
                        <option value="image" {{ request('type')==='image'?'selected':'' }}>Photos Only ({{ $imagesCount }})</option>
                        <option value="video" {{ request('type')==='video'?'selected':'' }}>Videos Only ({{ $videosCount }})</option>
                    </select>
                </div>
                <div style="min-width:160px;">
                    <select name="category" class="form-control-admin" onchange="this.form.submit()" style="padding-top:0.55rem;padding-bottom:0.55rem;font-size:0.825rem;cursor:pointer;">
                        <option value="all">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category')===$cat?'selected':'' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-pills-nav">
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'']) }}" class="btn-filter-pill {{ empty(request('status'))?'active':'' }}">All ({{ $totalCount }})</a>
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'active']) }}" class="btn-filter-pill {{ request('status')==='active'?'active':'' }}">Live ({{ $activeCount }})</a>
                    <a href="{{ request()->fullUrlWithQuery(['status'=>'inactive']) }}" class="btn-filter-pill {{ request('status')==='inactive'?'active':'' }}">Hidden ({{ $totalCount-$activeCount }})</a>
                </div>
            </div>
            <div style="display:flex;gap:0.5rem;align-items:center;">
                @if(request()->filled('search')||(request()->filled('category')&&request('category')!=='all')||request()->filled('status')||request()->filled('type'))
                    <a href="{{ route('admin.galleries.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="color:#64748b;">
                        <i class="fa-solid fa-rotate-left"></i><span>Reset</span>
                    </a>
                @endif
                <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                    <i class="fa-solid fa-filter"></i><span>Apply Filter</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== FLOATING GLASSMORPHIC BULK ACTION BAR ===== --}}
<div id="bulkActionBar" class="bulk-action-bar" style="display:none;">
    <div class="bulk-bar-left">
        <div class="bulk-selection-info">
            <div class="bulk-count-badge" id="bulkCountBadge">0</div>
            <span>items selected</span>
        </div>
        <div class="bulk-divider"></div>
        <div class="bulk-actions-group">
            <button type="button" class="bulk-action-btn publish" onclick="executeBulkAction('publish')" title="Publish all selected">
                <i class="fa-solid fa-eye"></i> Publish All
            </button>
            <button type="button" class="bulk-action-btn hide" onclick="executeBulkAction('hide')" title="Hide all selected">
                <i class="fa-solid fa-eye-slash"></i> Hide All
            </button>
            <button type="button" class="bulk-action-btn delete" onclick="openBulkDeleteModal()" title="Delete all selected">
                <i class="fa-solid fa-trash-can"></i> Delete Selected
            </button>
        </div>
    </div>
    <div class="bulk-bar-right">
        <button type="button" class="bulk-cancel-btn" onclick="clearSelection()" title="Cancel selection">
            <i class="fa-solid fa-xmark"></i> Cancel
        </button>
    </div>
</div>

{{-- ===== MAIN LIBRARY CARD (Glassmorphic) ===== --}}
<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill" style="background:rgba(139,92,246,0.12);color:#8b5cf6;"><i class="fa-solid fa-photo-film"></i></div>
                <span>Media Library Showcase</span>
            </h3>
            <p class="card-syndron-desc">Showing {{ $items->firstItem() ?? 0 }}–{{ $items->lastItem() ?? 0 }} of {{ $items->total() }} media assets.</p>
        </div>
        <div style="display:flex;align-items:center;gap:0.85rem;flex-wrap:wrap;">
            {{-- Multi-Select All button --}}
            <button type="button" id="selectAllBtn" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="toggleSelectAll()" style="{{ $items->isEmpty() ? 'display:none;' : '' }}">
                <i class="fa-regular fa-square-check"></i> <span id="selectAllBtnLabel">Select All</span>
            </button>

            {{-- View Toggle (Grid / Table) --}}
            <div class="syndron-view-toggle">
                <button type="button" class="view-btn active" id="btnGridView" onclick="setGalleryView('grid')" title="Grid Layout">
                    <i class="fa-solid fa-grip"></i> Grid
                </button>
                <button type="button" class="view-btn" id="btnTableView" onclick="setGalleryView('table')" title="Table Layout">
                    <i class="fa-solid fa-table-list"></i> Table
                </button>
            </div>
            <span class="order-legend-pill"><i class="fa-solid fa-arrow-down-1-9"></i> Low # = First</span>
        </div>
    </div>

    {{-- 1. VISUAL CARD GRID VIEW --}}
    <div class="gallery-grid-container" id="galleryGridView">
        @forelse($items as $item)
            @php
                $itemPayload = json_encode([
                    'id'              => $item->id,
                    'title'           => $item->title,
                    'caption'         => $item->caption,
                    'type'            => $item->type,
                    'category'        => $item->category,
                    'image_url'       => $item->image_url,
                    'thumbnail_url'   => $item->thumbnail_url,
                    'video_url'       => $item->video_url,
                    'video_embed_url' => $item->video_embed_url,
                    'youtube_id'      => $item->youtube_id,
                    'created_at'      => $item->created_at ? $item->created_at->format('M d, Y') : null,
                ]);
            @endphp

            <div class="media-grid-card" id="grid-card-{{ $item->id }}" data-id="{{ $item->id }}">
                {{-- MULTI-SELECT CHECKBOX OVERLAY --}}
                <label class="grid-card-checkbox-wrap" for="chk-grid-{{ $item->id }}" title="Select this item">
                    <input
                        type="checkbox"
                        class="gallery-item-checkbox grid-checkbox"
                        id="chk-grid-{{ $item->id }}"
                        value="{{ $item->id }}"
                        onchange="onCheckboxChange()"
                    >
                    <span class="custom-checkmark"><i class="fa-solid fa-check"></i></span>
                </label>

                {{-- COVER IMAGE --}}
                <div class="media-grid-cover" onclick="handleCoverClick(event, {{ $item->id }}, {{ $itemPayload }})" title="Click to preview">
                    <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" class="grid-cover-img" loading="lazy">

                    {{-- Top Frosted Badges --}}
                    <div class="cover-top-badges">
                        <span class="cover-pill category">
                            <i class="fa-regular fa-folder"></i> {{ $item->category ?: 'General' }}
                        </span>
                        @if($item->type === 'video')
                            <span class="cover-pill video"><i class="fa-brands fa-youtube"></i> Video</span>
                        @else
                            <span class="cover-pill photo"><i class="fa-solid fa-camera"></i> Photo</span>
                        @endif
                    </div>

                    {{-- Center Play/Zoom Icon --}}
                    @if($item->type === 'video')
                        <div class="grid-play-pulse-btn"><i class="fa-solid fa-play"></i></div>
                    @else
                        <div class="grid-zoom-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    @endif

                    {{-- Sort Order Badge --}}
                    <div class="cover-bottom-badges">
                        <span class="cover-pill order">#{{ $item->sort_order }}</span>
                    </div>

                    {{-- Selected Shimmer Overlay --}}
                    <div class="card-selected-overlay"></div>
                </div>

                {{-- CARD BODY --}}
                <div class="media-grid-body">
                    <h4 class="media-grid-title" onclick="openMediaPreview({{ $itemPayload }})" title="{{ $item->title }}">{{ $item->title }}</h4>
                    @if($item->caption)
                        <p class="media-grid-caption">{{ Str::limit($item->caption, 85) }}</p>
                    @else
                        <p class="media-grid-caption" style="font-style:italic;opacity:0.55;">No description provided.</p>
                    @endif
                    <div class="media-grid-meta">
                        <span class="grid-date">
                            <i class="fa-regular fa-clock"></i>
                            {{ $item->created_at ? $item->created_at->format('d M Y') : 'Catalogued' }}
                        </span>
                        @if($item->type === 'video' && $item->video_url)
                            <a href="{{ $item->video_url }}" target="_blank" rel="noopener noreferrer" class="grid-source-badge video">
                                <i class="fa-brands fa-youtube"></i> YouTube <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.65rem;"></i>
                            </a>
                        @elseif($item->image)
                            <a href="{{ $item->image_url }}" target="_blank" rel="noopener noreferrer" class="grid-source-badge photo">
                                <i class="fa-solid fa-image"></i> High-Res <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.65rem;"></i>
                            </a>
                        @endif
                    </div>
                </div>

                {{-- CARD FOOTER --}}
                <div class="media-grid-footer">
                    <button
                        type="button"
                        class="status-toggle-pill {{ $item->is_active ? 'active' : 'inactive' }}"
                        id="status-grid-btn-{{ $item->id }}"
                        onclick="toggleMediaStatus({{ $item->id }}, '{{ route('admin.galleries.toggle-status', $item) }}')"
                        title="Toggle visibility"
                    >
                        <span class="status-dot"></span>
                        <span class="status-text">{{ $item->is_active ? 'Published' : 'Hidden' }}</span>
                    </button>
                    <div class="grid-actions">
                        <button type="button" class="action-icon-btn preview" onclick="openMediaPreview({{ $itemPayload }})" title="Quick Preview"><i class="fa-solid fa-eye"></i></button>
                        <a href="{{ route('admin.galleries.edit', $item) }}" class="action-icon-btn edit" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button type="button" class="action-icon-btn delete" onclick="promptDeleteGallery({{ $item->id }}, '{{ addslashes($item->title) }}')" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-gallery-state-grid">
                <div class="empty-icon-wrap"><i class="fa-solid fa-photo-film"></i></div>
                <h4 class="empty-title">No Media Assets Found</h4>
                <p class="empty-desc">No items matched your current filter criteria.</p>
                <a href="{{ route('admin.galleries.create') }}" class="btn-syndron btn-syndron-primary" style="margin-top:1rem;">
                    <i class="fa-solid fa-circle-plus"></i> Add New Media
                </a>
            </div>
        @endforelse
    </div>

    {{-- 2. DATA TABLE VIEW --}}
    <div class="table-responsive-container" id="galleryTableView" style="display: none;">
        <table class="gallery-modern-table">
            <thead>
                <tr>
                    <th style="width:48px; text-align:center; padding: 0.85rem 0.75rem;">
                        <label class="grid-card-checkbox-wrap" for="chk-select-all" title="Select all" style="position:static;width:auto;height:auto;padding:0;">
                            <input type="checkbox" id="chk-select-all" class="gallery-item-checkbox" onchange="toggleSelectAllByCheckbox(this)">
                            <span class="custom-checkmark"><i class="fa-solid fa-check"></i></span>
                        </label>
                    </th>
                    <th style="width: 95px;">Preview</th>
                    <th>Title &amp; Story</th>
                    <th style="width: 110px;">Type</th>
                    <th style="width: 150px;">Category</th>
                    <th style="width: 150px;">Media Source</th>
                    <th style="width: 90px; text-align: center;">Sort</th>
                    <th style="width: 120px; text-align: center;">Status</th>
                    <th style="width: 130px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $index => $item)
                    @php
                        $itemPayload = json_encode([
                            'id'              => $item->id,
                            'title'           => $item->title,
                            'caption'         => $item->caption,
                            'type'            => $item->type,
                            'category'        => $item->category,
                            'image_url'       => $item->image_url,
                            'thumbnail_url'   => $item->thumbnail_url,
                            'video_url'       => $item->video_url,
                            'video_embed_url' => $item->video_embed_url,
                            'youtube_id'      => $item->youtube_id,
                            'created_at'      => $item->created_at ? $item->created_at->format('M d, Y') : null,
                        ]);
                    @endphp
                    <tr class="gallery-row" id="row-gallery-{{ $item->id }}" data-id="{{ $item->id }}">
                        {{-- CHECKBOX --}}
                        <td style="text-align:center; padding: 0.85rem 0.75rem; vertical-align: middle;">
                            <label class="grid-card-checkbox-wrap" for="chk-table-{{ $item->id }}" title="Select" style="position:static;width:auto;height:auto;padding:0;">
                                <input type="checkbox" class="gallery-item-checkbox table-checkbox" id="chk-table-{{ $item->id }}" value="{{ $item->id }}" onchange="onCheckboxChange()">
                                <span class="custom-checkmark"><i class="fa-solid fa-check"></i></span>
                            </label>
                        </td>

                        <!-- Thumbnail Preview -->
                        <td>
                            <div
                                class="thumb-preview-card"
                                onclick="openMediaPreview({{ $itemPayload }})"
                                title="Click for instant preview"
                            >
                                <img
                                    src="{{ $item->thumbnail_url }}"
                                    alt="{{ $item->title }}"
                                    class="thumb-image"
                                    loading="lazy"
                                >
                                @if($item->type === 'video')
                                    <div class="thumb-play-overlay">
                                        <div class="play-mini-btn">
                                            <i class="fa-solid fa-play"></i>
                                        </div>
                                    </div>
                                @else
                                    <div class="thumb-hover-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <!-- Title & Story -->
                        <td>
                            <div class="title-cell-wrap">
                                <span class="gallery-item-title">{{ $item->title }}</span>
                                @if($item->caption)
                                    <p class="gallery-item-caption">{{ Str::limit($item->caption, 85) }}</p>
                                @endif
                                <div class="gallery-item-meta">
                                    <span class="meta-date">
                                        <i class="fa-regular fa-clock" style="font-size: 0.7rem;"></i>
                                        {{ $item->created_at ? $item->created_at->format('d M Y') : 'Catalog item' }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- Type Badge -->
                        <td>
                            @if($item->type === 'video')
                                <span class="media-type-pill video">
                                    <i class="fa-brands fa-youtube"></i> Video
                                </span>
                            @else
                                <span class="media-type-pill photo">
                                    <i class="fa-solid fa-camera"></i> Photo
                                </span>
                            @endif
                        </td>

                        <!-- Category -->
                        <td>
                            <span class="gallery-category-badge">
                                <i class="fa-regular fa-folder" style="font-size: 0.7rem; opacity: 0.7;"></i>
                                {{ $item->category ?: 'General' }}
                            </span>
                        </td>

                        <!-- Media Link / Source -->
                        <td>
                            @if($item->type === 'video' && $item->video_url)
                                <a href="{{ $item->video_url }}" target="_blank" rel="noopener noreferrer" class="source-link-pill video" title="Watch on YouTube">
                                    <i class="fa-brands fa-youtube"></i>
                                    <span>YouTube Video</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square mini-ext-icon"></i>
                                </a>
                            @elseif($item->image)
                                <a href="{{ $item->image_url }}" target="_blank" rel="noopener noreferrer" class="source-link-pill photo" title="Open high-res file">
                                    <i class="fa-solid fa-image"></i>
                                    <span>High-Res File</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square mini-ext-icon"></i>
                                </a>
                            @else
                                <span style="font-size: 0.8rem; color: var(--muted-foreground);">&mdash;</span>
                            @endif
                        </td>

                        <!-- Sort Order -->
                        <td style="text-align: center;">
                            <span class="sort-order-pill">
                                #{{ $item->sort_order }}
                            </span>
                        </td>

                        <!-- Status Toggle (AJAX) -->
                        <td style="text-align: center;">
                            <button
                                type="button"
                                class="status-toggle-pill {{ $item->is_active ? 'active' : 'inactive' }}"
                                id="status-btn-{{ $item->id }}"
                                onclick="toggleMediaStatus({{ $item->id }}, '{{ route('admin.galleries.toggle-status', $item) }}')"
                                title="Click to instantly toggle visibility"
                            >
                                <span class="status-dot"></span>
                                <span class="status-text">{{ $item->is_active ? 'Published' : 'Hidden' }}</span>
                            </button>
                        </td>

                        <!-- Action Buttons -->
                        <td style="text-align: right;">
                            <div class="row-actions-group">
                                <button
                                    type="button"
                                    class="action-icon-btn preview"
                                    onclick="openMediaPreview({{ $itemPayload }})"
                                    title="Quick Preview"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <a
                                    href="{{ route('admin.galleries.edit', $item) }}"
                                    class="action-icon-btn edit"
                                    title="Edit Media Item"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <button
                                    type="button"
                                    class="action-icon-btn delete"
                                    onclick="promptDeleteGallery({{ $item->id }}, '{{ addslashes($item->title) }}')"
                                    title="Delete Media Item"
                                >
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <form
                                    id="delete-form-{{ $item->id }}"
                                    action="{{ route('admin.galleries.destroy', $item) }}"
                                    method="POST"
                                    style="display: none;"
                                >
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 4.5rem 1.5rem;">
                            <div class="empty-gallery-state-grid">
                                <div class="empty-icon-wrap"><i class="fa-solid fa-photo-film"></i></div>
                                <h4 class="empty-title">No Media Assets Found</h4>
                                <p class="empty-desc">No items matched your current filter criteria.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Footer -->
    @if($items->hasPages())
        <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div style="font-size: 0.825rem; color: var(--muted-foreground);">
                Showing <strong>{{ $items->firstItem() }}</strong> to <strong>{{ $items->lastItem() }}</strong> of <strong>{{ $items->total() }}</strong> total assets
            </div>
            <div class="pagination-controls">
                {{ $items->appends(request()->query())->links('admin.layouts.pagination') }}
            </div>
        </div>
    @endif
</div>

{{-- ===== QUICK PREVIEW MODAL (Glassmorphic) ===== --}}
<div class="gallery-modal-backdrop" id="mediaPreviewModal" style="display: none;">
    <div class="gallery-modal-dialog" id="mediaPreviewDialog">
        <div class="preview-modal-header">
            <div class="preview-modal-title-group">
                <span id="previewCategoryBadge" class="gallery-category-badge">Category</span>
                <h3 id="previewTitle" class="preview-modal-heading">Media Title</h3>
            </div>
            <button type="button" class="modal-close-btn" onclick="closeMediaPreview()" aria-label="Close preview">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="preview-modal-body">
            <div class="preview-media-viewport" id="previewMediaViewport"></div>
            <div class="preview-details-box">
                <div class="details-caption" id="previewCaption">No caption provided.</div>
                <div class="details-footer-bar">
                    <div class="details-meta-left">
                        <span id="previewTypeBadge" class="media-type-pill photo">Photo</span>
                        <span id="previewDate" style="color: var(--muted-foreground); font-size: 0.8rem;">Added recently</span>
                    </div>
                    <div class="details-actions-right" id="previewActionsRight"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== SINGLE DELETE CONFIRM MODAL ===== --}}
<div class="gallery-modal-backdrop" id="deleteModalBackdrop" style="display: none;">
    <div class="gallery-modal-dialog delete-dialog" id="deleteModalDialog">
        <button type="button" class="modal-close-btn" onclick="closeDeleteModal()" aria-label="Close modal">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="delete-icon-pulse-box">
            <div class="icon-ring pulse-slow"></div>
            <div class="icon-core danger"><i class="fa-solid fa-trash-can"></i></div>
        </div>
        <div class="delete-modal-content">
            <h3 class="delete-title">Delete Media Asset?</h3>
            <p class="delete-desc">Are you sure you want to delete <strong id="deleteTargetTitle" style="color: var(--foreground);"></strong>? This will permanently remove the record and uploaded file from the server.</p>
            <div class="delete-callout-box">
                <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; font-size: 1.1rem;"></i>
                <div style="font-size: 0.8rem; color: var(--muted-foreground); text-align: left;">This item will instantly be removed from the public gallery on the website.</div>
            </div>
            <div class="delete-modal-actions">
                <button type="button" class="gallery-btn gallery-btn-outline" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="gallery-btn gallery-btn-danger" id="confirmDeleteActionBtn">
                    <i class="fa-solid fa-trash-can"></i> <span>Yes, Delete</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ===== BULK DELETE CONFIRM MODAL ===== --}}
<div class="gallery-modal-backdrop" id="bulkDeleteModal" style="display: none;">
    <div class="gallery-modal-dialog delete-dialog">
        <button type="button" class="modal-close-btn" onclick="closeBulkDeleteModal()" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="delete-icon-pulse-box">
            <div class="icon-ring pulse-slow"></div>
            <div class="icon-core danger"><i class="fa-solid fa-trash-can"></i></div>
        </div>
        <div class="delete-modal-content">
            <h3 class="delete-title">Bulk Delete Media?</h3>
            <p class="delete-desc">You are about to permanently delete <strong id="bulkDeleteCount" style="color:#ef4444;">0</strong> selected media item(s). This action cannot be undone.</p>
            <div class="delete-callout-box">
                <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; font-size: 1.1rem;"></i>
                <div style="font-size: 0.8rem; color: var(--muted-foreground); text-align: left;">All selected images and their physical files on the server will be permanently deleted.</div>
            </div>
            <div class="delete-modal-actions">
                <button type="button" class="gallery-btn gallery-btn-outline" onclick="closeBulkDeleteModal()">Cancel</button>
                <button type="button" class="gallery-btn gallery-btn-danger" onclick="executeBulkAction('delete')">
                    <i class="fa-solid fa-trash-can"></i> <span>Yes, Delete All</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Toast Notification --}}
<div id="galleryToast" class="gallery-toast" style="display: none;">
    <i class="fa-solid fa-circle-check toast-icon"></i>
    <span id="toastMsg">Status updated successfully!</span>
</div>

@endsection

@push('scripts')
<script>
    // Global State
    let activeDeleteId = null;
    let selectedIds = new Set();
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
    const bulkActionUrl = '{{ route("admin.galleries.bulk-action") }}';

    // View Mode Switcher (Grid vs Table)
    function setGalleryView(mode) {
        const gridView = document.getElementById('galleryGridView');
        const tableView = document.getElementById('galleryTableView');
        const btnGrid = document.getElementById('btnGridView');
        const btnTable = document.getElementById('btnTableView');

        if (mode === 'table') {
            gridView.style.display = 'none';
            tableView.style.display = 'block';
            btnGrid.classList.remove('active');
            btnTable.classList.add('active');
            localStorage.setItem('gallery_admin_view_mode', 'table');
        } else {
            gridView.style.display = 'grid';
            tableView.style.display = 'none';
            btnGrid.classList.add('active');
            btnTable.classList.remove('active');
            localStorage.setItem('gallery_admin_view_mode', 'grid');
        }
        syncCheckboxes();
    }

    // Checkbox & Multi-Selection Handler
    function onCheckboxChange() {
        selectedIds.clear();
        document.querySelectorAll('.gallery-item-checkbox:checked').forEach(cb => {
            if (cb.id !== 'chk-select-all') {
                selectedIds.add(parseInt(cb.value));
            }
        });
        updateSelectionUI();
    }

    function syncCheckboxes() {
        document.querySelectorAll('.gallery-item-checkbox').forEach(cb => {
            if (cb.id !== 'chk-select-all') {
                const id = parseInt(cb.value);
                cb.checked = selectedIds.has(id);
            }
        });
        updateSelectionUI();
    }

    function updateSelectionUI() {
        const totalItems = document.querySelectorAll('.media-grid-card').length;
        const count = selectedIds.size;
        const bulkBar = document.getElementById('bulkActionBar');
        const countBadge = document.getElementById('bulkCountBadge');
        const selectAllLabel = document.getElementById('selectAllBtnLabel');
        const masterCb = document.getElementById('chk-select-all');

        // Update card / row highlight classes
        document.querySelectorAll('.media-grid-card').forEach(card => {
            const id = parseInt(card.getAttribute('data-id'));
            if (selectedIds.has(id)) {
                card.classList.add('is-selected');
            } else {
                card.classList.remove('is-selected');
            }
        });

        document.querySelectorAll('.gallery-row').forEach(row => {
            const id = parseInt(row.getAttribute('data-id'));
            if (selectedIds.has(id)) {
                row.classList.add('is-selected');
            } else {
                row.classList.remove('is-selected');
            }
        });

        // Update bulk action bar
        if (count > 0) {
            bulkBar.style.display = 'flex';
            countBadge.textContent = count;
        } else {
            bulkBar.style.display = 'none';
        }

        // Update Select All button & master checkbox
        if (count === totalItems && totalItems > 0) {
            if (selectAllLabel) selectAllLabel.textContent = 'Deselect All';
            if (masterCb) masterCb.checked = true;
        } else {
            if (selectAllLabel) selectAllLabel.textContent = 'Select All';
            if (masterCb) masterCb.checked = false;
        }
    }

    function toggleSelectAll() {
        const totalItems = document.querySelectorAll('.media-grid-card').length;
        if (selectedIds.size === totalItems && totalItems > 0) {
            clearSelection();
        } else {
            document.querySelectorAll('.media-grid-card').forEach(card => {
                const id = parseInt(card.getAttribute('data-id'));
                if (id) selectedIds.add(id);
            });
            syncCheckboxes();
        }
    }

    function toggleSelectAllByCheckbox(masterCb) {
        if (masterCb.checked) {
            document.querySelectorAll('.media-grid-card').forEach(card => {
                const id = parseInt(card.getAttribute('data-id'));
                if (id) selectedIds.add(id);
            });
        } else {
            selectedIds.clear();
        }
        syncCheckboxes();
    }

    function clearSelection() {
        selectedIds.clear();
        syncCheckboxes();
    }

    function handleCoverClick(event, id, payload) {
        if (event.target.closest('.grid-card-checkbox-wrap')) return;
        openMediaPreview(payload);
    }

    // Execute Bulk Actions (publish, hide, delete)
    async function executeBulkAction(action) {
        const ids = Array.from(selectedIds);
        if (ids.length === 0) {
            showToast('No items selected!');
            return;
        }

        if (action === 'delete') {
            closeBulkDeleteModal();
        }

        try {
            const response = await fetch(bulkActionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ action: action, ids: ids })
            });

            const data = await response.json();

            if (data.success) {
                showToast(data.message);
                setTimeout(() => {
                    window.location.reload();
                }, 800);
            } else {
                showToast('Failed to perform bulk action.');
            }
        } catch (err) {
            console.error('Bulk action error:', err);
            showToast('An error occurred during bulk operation.');
        }
    }

    function openBulkDeleteModal() {
        document.getElementById('bulkDeleteCount').textContent = selectedIds.size;
        document.getElementById('bulkDeleteModal').style.display = 'flex';
    }

    function closeBulkDeleteModal() {
        document.getElementById('bulkDeleteModal').style.display = 'none';
    }

    // Media Quick Preview Modal
    function openMediaPreview(item) {
        const modal = document.getElementById('mediaPreviewModal');
        const titleEl = document.getElementById('previewTitle');
        const catBadge = document.getElementById('previewCategoryBadge');
        const captionEl = document.getElementById('previewCaption');
        const typeBadge = document.getElementById('previewTypeBadge');
        const dateEl = document.getElementById('previewDate');
        const viewport = document.getElementById('previewMediaViewport');
        const actionsRight = document.getElementById('previewActionsRight');

        titleEl.textContent = item.title;
        catBadge.textContent = item.category || 'General';
        captionEl.textContent = item.caption || 'No caption provided for this media item.';
        dateEl.textContent = item.created_at ? `Added on ${item.created_at}` : 'Catalogued Media';

        if (item.type === 'video') {
            typeBadge.className = 'media-type-pill video';
            typeBadge.innerHTML = '<i class="fa-brands fa-youtube"></i> Video';

            if (item.video_embed_url) {
                viewport.innerHTML = `<iframe src="${item.video_embed_url}?autoplay=1&rel=0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else {
                viewport.innerHTML = `<div style="padding: 60px; color: #fff; text-align: center;"><i class="fa-brands fa-youtube" style="font-size: 48px; color: #ef4444; margin-bottom: 12px; display: block;"></i> Video URL: <a href="${item.video_url}" target="_blank" style="color: #fff; text-decoration: underline;">${item.video_url}</a></div>`;
            }

            actionsRight.innerHTML = `
                <a href="${item.video_url}" target="_blank" class="gallery-btn gallery-btn-outline" style="padding: 4px 10px; font-size: 0.775rem;">
                    <i class="fa-brands fa-youtube" style="color: #ef4444;"></i> Open in YouTube
                </a>
            `;
        } else {
            typeBadge.className = 'media-type-pill photo';
            typeBadge.innerHTML = '<i class="fa-solid fa-camera"></i> Photo';

            viewport.innerHTML = `<img src="${item.image_url}" alt="${item.title}">`;

            actionsRight.innerHTML = `
                <a href="${item.image_url}" target="_blank" download class="gallery-btn gallery-btn-outline" style="padding: 4px 10px; font-size: 0.775rem;">
                    <i class="fa-solid fa-download"></i> View Full File
                </a>
            `;
        }

        modal.style.display = 'flex';
    }

    function closeMediaPreview() {
        const modal = document.getElementById('mediaPreviewModal');
        const viewport = document.getElementById('previewMediaViewport');
        if (viewport) viewport.innerHTML = '';
        modal.style.display = 'none';
    }

    // Delete Confirmation Modal
    function promptDeleteGallery(id, title) {
        activeDeleteId = id;
        document.getElementById('deleteTargetTitle').textContent = `"${title}"`;
        document.getElementById('deleteModalBackdrop').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModalBackdrop').style.display = 'none';
        activeDeleteId = null;
    }

    document.getElementById('confirmDeleteActionBtn').addEventListener('click', function () {
        if (activeDeleteId) {
            const form = document.getElementById(`delete-form-${activeDeleteId}`);
            if (form) form.submit();
        }
    });

    // Close Modals on ESC Key or Backdrop Click
    window.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeMediaPreview();
            closeDeleteModal();
            closeBulkDeleteModal();
        }
    });

    document.getElementById('mediaPreviewModal')?.addEventListener('click', function (e) {
        if (e.target === this) closeMediaPreview();
    });

    document.getElementById('deleteModalBackdrop')?.addEventListener('click', function (e) {
        if (e.target === this) closeDeleteModal();
    });

    document.getElementById('bulkDeleteModal')?.addEventListener('click', function (e) {
        if (e.target === this) closeBulkDeleteModal();
    });

    // AJAX Instant Status Toggle
    async function toggleMediaStatus(id, url) {
        const btnTable = document.getElementById(`status-btn-${id}`);
        const btnGrid = document.getElementById(`status-grid-btn-${id}`);
        const buttons = [btnTable, btnGrid].filter(b => b !== null);

        buttons.forEach(btn => {
            btn.style.opacity = '0.5';
            btn.style.pointerEvents = 'none';
        });

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                }
            });

            const data = await response.json();

            if (data.success) {
                buttons.forEach(btn => {
                    const textSpan = btn.querySelector('.status-text');
                    if (data.is_active) {
                        btn.className = 'status-toggle-pill active';
                        if (textSpan) textSpan.textContent = 'Published';
                    } else {
                        btn.className = 'status-toggle-pill inactive';
                        if (textSpan) textSpan.textContent = 'Hidden';
                    }
                });

                const counter = document.getElementById('activeCounterVal');
                if (counter) {
                    let current = parseInt(counter.textContent) || 0;
                    counter.textContent = data.is_active ? current + 1 : Math.max(0, current - 1);
                }

                showToast(data.message || 'Status updated successfully!');
            }
        } catch (err) {
            console.error('Status toggle error:', err);
            showToast('Failed to update status. Please try again.');
        } finally {
            buttons.forEach(btn => {
                btn.style.opacity = '1';
                btn.style.pointerEvents = 'auto';
            });
        }
    }

    // Toast Notification
    function showToast(msg) {
        const toast = document.getElementById('galleryToast');
        const toastMsg = document.getElementById('toastMsg');
        toastMsg.textContent = msg;
        toast.style.display = 'flex';

        setTimeout(() => {
            toast.style.display = 'none';
        }, 3200);
    }

    // Initialize View Mode on Load
    document.addEventListener('DOMContentLoaded', function () {
        const savedView = localStorage.getItem('gallery_admin_view_mode') || 'grid';
        setGalleryView(savedView);
    });
</script>
@endpush
