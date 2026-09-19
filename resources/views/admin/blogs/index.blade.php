@extends('admin.layouts.app')

@section('title', 'Blog Articles Management')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.5rem;">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Applications</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Blog Articles</span>
</div>

<div class="settings-header-banner">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge">
            <i class="fa-solid fa-newspaper"></i>
        </div>
        <div>
            <h1 class="page-title-main">
                <span>Blog Articles</span>
                <span style="font-size: 0.725rem; font-weight: 700; color: #EF801C; background: rgba(239, 128, 28, 0.12); padding: 3px 10px; border-radius: 9999px; letter-spacing: 0.02em;">{{ $totalCount }} Total</span>
            </h1>
            <p style="font-size: 0.85rem; color: #64748b; margin: 0;">
                Publish, manage, and feature agricultural stories, nutrition guides, and kitchen recipes.
            </p>
        </div>
    </div>

    <!-- Create New Article Button -->
    <div>
        <a href="{{ route('admin.blogs.create') }}" class="btn-syndron btn-syndron-primary">
            <i class="fa-solid fa-feather-pointed"></i>
            <span>Write New Article</span>
        </a>
    </div>
</div>

<!-- 4 Top KPI Metric Cards -->
<div class="metrics-row" style="margin-bottom: 1.5rem;">
    <!-- Card 1: Total Articles -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Total Articles</span>
            <div class="metric-badge-icon orange">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $totalCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-layer-group"></i>
                <span>All Articles</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Database records</span>
        </div>
    </div>

    <!-- Card 2: Live on Website -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Live on Website</span>
            <div class="metric-badge-icon green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $publishedCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-signal"></i>
                <span>Published</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Publicly visible</span>
        </div>
    </div>

    <!-- Card 3: Drafts / Inactive -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Drafts / Inactive</span>
            <div class="metric-badge-icon brown">
                <i class="fa-solid fa-pen-ruler"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $draftCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #f59e0b;">
                <i class="fa-solid fa-file-lines"></i>
                <span>Drafts</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Hidden from public</span>
        </div>
    </div>

    <!-- Card 4: Total Article Reads -->
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Total Article Reads</span>
            <div class="metric-badge-icon blue">
                <i class="fa-solid fa-eye"></i>
            </div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ number_format($totalViews) }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #3b82f6;">
                <i class="fa-solid fa-chart-line"></i>
                <span>Reader Traffic</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Cumulative views</span>
        </div>
    </div>
</div>

<!-- Search & Filter Bar Card -->
<div class="card-syndron" style="margin-bottom: 1.5rem;">
    <div class="card-syndron-body" style="padding: 1.15rem 1.5rem;">
        <form action="{{ route('admin.blogs.index') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
            <!-- Left Filters -->
            <div style="display: flex; flex-wrap: wrap; gap: 0.85rem; align-items: center; flex: 1; min-width: 280px;">
                <!-- Search Input -->
                <div class="input-with-icon" style="min-width: 240px; flex: 1; max-width: 380px;">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control-admin"
                        placeholder="Search articles by title, keywords..."
                        style="padding-top: 0.55rem; padding-bottom: 0.55rem; font-size: 0.825rem;"
                    >
                    <i class="fa-solid fa-magnifying-glass input-icon" style="font-size: 0.85rem;"></i>
                </div>

                <!-- Category Filter -->
                <div style="min-width: 220px;">
                    <select
                        name="category"
                        class="form-control-admin"
                        onchange="this.form.submit()"
                        style="padding-top: 0.55rem; padding-bottom: 0.55rem; font-size: 0.825rem; cursor: pointer;"
                    >
                        <option value="all">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter Pills -->
                <div style="display: inline-flex; background: #f1f5f9; padding: 3px; border-radius: 8px;">
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => '']) }}"
                        class="btn-filter-pill {{ empty(request('status')) ? 'active' : '' }}"
                    >
                        All
                    </a>
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => 'published']) }}"
                        class="btn-filter-pill {{ request('status') === 'published' ? 'active' : '' }}"
                    >
                        Live ({{ $publishedCount }})
                    </a>
                    <a
                        href="{{ request()->fullUrlWithQuery(['status' => 'draft']) }}"
                        class="btn-filter-pill {{ request('status') === 'draft' ? 'active' : '' }}"
                    >
                        Drafts ({{ $draftCount }})
                    </a>
                </div>
            </div>

            <!-- Right Buttons -->
            <div style="display: flex; gap: 0.5rem; align-items: center;">
                <button type="submit" class="btn-syndron btn-syndron-secondary btn-syndron-sm">
                    <i class="fa-solid fa-filter"></i>
                    <span>Apply Filter</span>
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.blogs.index') }}" class="btn-syndron btn-syndron-sm" style="color: #ef4444; background: rgba(239, 68, 68, 0.08); border-color: transparent;" title="Clear Filters">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Reset</span>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Datatable Card -->
<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <span>Articles Directory</span>
            </h3>
            <p class="card-syndron-desc">Showing {{ $blogs->firstItem() ?? 0 }}–{{ $blogs->lastItem() ?? 0 }} of {{ $blogs->total() }} recorded blog posts.</p>
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table" style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 80px;">Thumbnail</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground);">Article Title & Excerpt</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 140px;">Category</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 120px;">Status</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 100px;">Views</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); width: 130px;">Date</th>
                        <th style="padding: 0.85rem 1.25rem; font-size: 0.775rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted-foreground); text-align: right; width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr style="border-bottom: 1px solid var(--border); transition: background-color 0.15s ease;">
                            <!-- Thumbnail -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div style="width: 60px; height: 42px; border-radius: 6px; overflow: hidden; background: #e2e8f0; border: 1px solid var(--border); position: relative; flex-shrink: 0;">
                                    <img
                                        src="{{ $blog->image_url }}"
                                        alt="{{ $blog->image_alt ?: $blog->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                    >
                                </div>
                            </td>

                            <!-- Article Title & Excerpt -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.9rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.2rem; line-height: 1.35;">
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" style="color: inherit; text-decoration: none; transition: color 0.15s ease;" onmouseover="this.style.color='#EF801C'" onmouseout="this.style.color='inherit'">
                                        {{ $blog->title }}
                                    </a>
                                </div>
                                <div style="font-size: 0.775rem; color: var(--muted-foreground); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 90) }}
                                </div>
                                <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 0.25rem; display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                    <span><i class="fa-regular fa-user"></i> {{ $blog->author_name }}</span>
                                    <span>•</span>
                                    <span><i class="fa-regular fa-clock"></i> {{ $blog->reading_time }}</span>
                                    <span>•</span>
                                    <span style="font-family: monospace; font-size: 0.675rem;">/blog/{{ $blog->slug }}</span>
                                    <span>•</span>
                                    @php
                                        $score = $blog->seo_score;
                                        $badgeColor = $score >= 80 ? '#10b981' : ($score >= 55 ? '#f59e0b' : '#ef4444');
                                        $badgeBg = $score >= 80 ? 'rgba(16, 185, 129, 0.12)' : ($score >= 55 ? 'rgba(245, 158, 11, 0.12)' : 'rgba(239, 68, 68, 0.12)');
                                    @endphp
                                    <span style="display: inline-flex; align-items: center; gap: 4px; font-weight: 700; font-size: 0.675rem; color: {{ $badgeColor }}; background: {{ $badgeBg }}; padding: 1px 7px; border-radius: 4px;" title="SEO Health Score">
                                        <i class="fa-solid fa-chart-pie" style="font-size: 0.6rem;"></i>
                                        SEO: {{ $score }}/100
                                    </span>
                                </div>
                            </td>

                            <!-- Category -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 9px; border-radius: 6px; background: rgba(239, 128, 28, 0.1); color: #C95B00; font-size: 0.75rem; font-weight: 600; white-space: nowrap;">
                                    <i class="fa-solid fa-tag" style="font-size: 0.65rem;"></i>
                                    <span>{{ $blog->category }}</span>
                                </span>
                            </td>

                            <!-- Status -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                @if($blog->is_published)
                                    <span class="system-status-badge">Live</span>
                                @else
                                    <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; font-weight: 700; color: #f59e0b; background: rgba(245, 158, 11, 0.1); padding: 2px 8px; border-radius: 9999px;">
                                        <span style="width: 6px; height: 6px; border-radius: 50%; background: #f59e0b;"></span>
                                        <span>Draft</span>
                                    </span>
                                @endif
                            </td>

                            <!-- Views Count -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div style="font-size: 0.85rem; font-weight: 700; color: var(--foreground); display: flex; align-items: center; gap: 5px;">
                                    <i class="fa-regular fa-eye" style="font-size: 0.75rem; color: #94a3b8;"></i>
                                    <span>{{ number_format($blog->views_count) }}</span>
                                </div>
                            </td>

                            <!-- Date -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; font-size: 0.8rem; color: var(--muted-foreground); white-space: nowrap;">
                                {{ $blog->formatted_date }}
                            </td>

                            <!-- Actions -->
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 0.35rem; justify-content: flex-end;">
                                    <!-- Public Preview -->
                                    <a
                                        href="{{ route('blog.single', $blog->slug) }}"
                                        target="_blank"
                                        class="table-action-btn"
                                        title="View Live Article"
                                    >
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>

                                    <!-- Quick Toggle Publish Status -->
                                    <form action="{{ route('admin.blogs.toggle-status', $blog) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="table-action-btn"
                                            title="{{ $blog->is_published ? 'Unpublish to Draft' : 'Publish Article Live' }}"
                                            style="{{ $blog->is_published ? 'color: #10b981;' : 'color: #f59e0b;' }}"
                                        >
                                            <i class="fa-solid {{ $blog->is_published ? 'fa-toggle-on' : 'fa-toggle-off' }}" style="font-size: 1.1rem;"></i>
                                        </button>
                                    </form>

                                    <!-- Edit -->
                                    <a
                                        href="{{ route('admin.blogs.edit', $blog) }}"
                                        class="table-action-btn"
                                        title="Edit Article"
                                        style="color: var(--accent);"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <!-- Delete Modal Trigger -->
                                    <button
                                        type="button"
                                        class="table-action-btn table-action-btn-danger"
                                        title="Delete Article"
                                        style="color: #ef4444;"
                                        onclick="confirmDeleteBlog('{{ $blog->id }}', {{ json_encode($blog->title) }})"
                                    >
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 4rem 1.5rem;">
                                <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(239, 128, 28, 0.1); color: #EF801C; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; margin: 0 auto 1rem;">
                                    <i class="fa-regular fa-newspaper"></i>
                                </div>
                                <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.35rem;">No Articles Found</h4>
                                <p style="font-size: 0.85rem; color: var(--muted-foreground); max-width: 400px; margin: 0 auto 1.5rem;">
                                    No articles match your current search or filter query. Try clearing your search or write a new article.
                                </p>
                                <a href="{{ route('admin.blogs.create') }}" class="btn-syndron btn-syndron-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Write Your First Article</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Footer -->
    @if($blogs->hasPages())
        <div class="card-syndron-footer">
            <div style="font-size: 0.825rem; color: var(--muted-foreground);">
                Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }}
            </div>
            <div class="pagination-controls">
                {{ $blogs->appends(request()->query())->links('admin.layouts.pagination') }}
            </div>
        </div>
    @endif
</div>

<!-- Professional Delete Confirmation Modal Dialog -->
<div id="deleteConfirmationModal" class="syndron-modal-backdrop" style="display: none;" onclick="handleModalBackdropClick(event)">
    <div class="syndron-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <!-- Close (X) button in top corner -->
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
                Are you sure you want to permanently delete this article? This action cannot be undone and will remove all associated database records.
            </p>

            <!-- Article Title Preview Callout -->
            <div class="syndron-modal-preview">
                <div class="syndron-modal-preview-icon">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <span id="deleteModalArticleTitle" class="syndron-modal-preview-text"></span>
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

<!-- Hidden Delete Form -->
<form id="deleteBlogForm" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    let pendingDeleteBlogId = null;

    function confirmDeleteBlog(blogId, blogTitle) {
        pendingDeleteBlogId = blogId;
        const modal = document.getElementById('deleteConfirmationModal');
        const titleElem = document.getElementById('deleteModalArticleTitle');
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const btnText = document.getElementById('deleteBtnText');
        
        if (titleElem) {
            titleElem.textContent = blogTitle;
        }
        if (confirmBtn) {
            confirmBtn.disabled = false;
            confirmBtn.style.opacity = '1';
        }
        if (btnText) {
            btnText.textContent = 'Delete Article';
        }

        // Show modal with animation
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
            pendingDeleteBlogId = null;
        }, 240);
    }

    function handleModalBackdropClick(event) {
        if (event.target.id === 'deleteConfirmationModal') {
            closeDeleteModal();
        }
    }

    // Keyboard support: dismiss on Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('deleteConfirmationModal');
            if (modal && modal.classList.contains('is-active')) {
                closeDeleteModal();
            }
        }
    });

    function executeBlogDelete() {
        if (!pendingDeleteBlogId) return;

        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const btnText = document.getElementById('deleteBtnText');
        if (confirmBtn) {
            confirmBtn.disabled = true;
            confirmBtn.style.opacity = '0.75';
        }
        if (btnText) {
            btnText.textContent = 'Deleting...';
        }

        const form = document.getElementById('deleteBlogForm');
        form.action = `{{ url('admin/blogs') }}/${pendingDeleteBlogId}`;
        form.submit();
    }
</script>
@endpush
@endsection
