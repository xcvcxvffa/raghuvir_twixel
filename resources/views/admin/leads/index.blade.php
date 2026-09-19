@extends('admin.layouts.app')

@section('title', 'Customer Inquiries & Leads - Raghuvir Atta')

@section('content')
{{-- Page Breadcrumb --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Customer Support</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Inquiries &amp; Leads</span>
</div>

{{-- ===== TOP HEADER BANNER ===== --}}
<div class="settings-header-banner" style="margin-bottom: 1.75rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge" style="background: linear-gradient(135deg, rgba(239,128,28,0.16), rgba(239,128,28,0.06)); color: #EF801C; border: 1px solid rgba(239,128,28,0.22);">
            <i class="fa-solid fa-headset"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.25rem;">
                <span>Customer Inquiries &amp; Leads</span>
                <span class="leads-count-badge">{{ $totalCount }} Total</span>
                @if($newCount > 0)
                    <span class="leads-new-badge">{{ $newCount }} New</span>
                @endif
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Manage wholesale inquiries and customer leads captured automatically via the public contact form.
            </p>
        </div>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('contact') }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="View live contact form">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>Public Contact Form</span>
        </a>
    </div>
</div>

{{-- ===== FLASH ALERTS ===== --}}
@if(session('success'))
    <div class="syndron-alert syndron-alert-success" style="margin-bottom: 1.5rem;" id="flashAlert">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
        <button type="button" onclick="this.parentElement.remove()" style="margin-left: auto; background: none; border: none; color: inherit; cursor: pointer; font-size: 1rem; opacity: 0.7;"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif

{{-- ===== 4 KPI METRIC CARDS ===== --}}
<div class="metrics-row" style="margin-bottom: 1.5rem;">
    {{-- Card 1: Total --}}
    <div class="metric-card">
        <div class="metric-card-top">
            <span class="metric-title">Total Inquiries</span>
            <div class="metric-badge-icon orange"><i class="fa-solid fa-inbox"></i></div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number">{{ $totalCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: var(--muted-foreground);">
                <i class="fa-solid fa-database"></i><span>All channels</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Lifetime total</span>
        </div>
    </div>

    {{-- Card 2: New --}}
    <div class="metric-card" style="cursor: pointer;" onclick="window.location='{{ request()->fullUrlWithQuery(['status'=>'new','page'=>null]) }}'">
        <div class="metric-card-top">
            <span class="metric-title">New Inquiries</span>
            <div class="metric-badge-icon" style="background: rgba(239,68,68,0.12); color: #ef4444;"><i class="fa-solid fa-bell"></i></div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number" style="color: #ef4444;">{{ $newCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-negative">
                <i class="fa-solid fa-circle-exclamation"></i><span>Action Required</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Pending reply</span>
        </div>
    </div>

    {{-- Card 3: Contacted --}}
    <div class="metric-card" style="cursor: pointer;" onclick="window.location='{{ request()->fullUrlWithQuery(['status'=>'contacted','page'=>null]) }}'">
        <div class="metric-card-top">
            <span class="metric-title">Contacted</span>
            <div class="metric-badge-icon blue"><i class="fa-solid fa-phone-volume"></i></div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number" style="color: #3b82f6;">{{ $contactedCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend" style="color: #3b82f6;">
                <i class="fa-solid fa-handshake"></i><span>Follow-up Active</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">In negotiation</span>
        </div>
    </div>

    {{-- Card 4: Closed --}}
    <div class="metric-card" style="cursor: pointer;" onclick="window.location='{{ request()->fullUrlWithQuery(['status'=>'closed','page'=>null]) }}'">
        <div class="metric-card-top">
            <span class="metric-title">Closed &amp; Converted</span>
            <div class="metric-badge-icon green"><i class="fa-solid fa-circle-check"></i></div>
        </div>
        <div class="metric-value-box">
            <div class="metric-number" style="color: #10b981;">{{ $closedCount }}</div>
        </div>
        <div class="metric-card-bottom">
            <span class="metric-trend trend-positive">
                <i class="fa-solid fa-check-double"></i><span>Fulfilled</span>
            </span>
            <span style="color: var(--muted-foreground); font-size: 0.725rem;">Completed deals</span>
        </div>
    </div>
</div>

{{-- ===== SEARCH & FILTER CARD ===== --}}
<div class="card-syndron" style="margin-bottom: 1.5rem;">
    <div class="card-syndron-body" style="padding: 1rem 1.25rem;">
        <form action="{{ route('admin.leads.index') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; flex: 1; min-width: 280px;">
                {{-- Search --}}
                <div class="input-with-icon" style="min-width: 240px; flex: 1; max-width: 380px;">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control-admin"
                        placeholder="Search name, phone, email, product..."
                        style="padding-top: 0.55rem; padding-bottom: 0.55rem; font-size: 0.825rem;"
                    >
                    <i class="fa-solid fa-magnifying-glass input-icon" style="font-size: 0.85rem;"></i>
                </div>

                {{-- Source Dropdown --}}
                <div style="min-width: 160px;">
                    <select name="source" class="form-control-admin" onchange="this.form.submit()" style="padding-top: 0.55rem; padding-bottom: 0.55rem; font-size: 0.825rem; cursor: pointer;">
                        <option value="all" {{ !request('source') || request('source') === 'all' ? 'selected' : '' }}>All Sources</option>
                        <option value="contact_page" {{ request('source') === 'contact_page' ? 'selected' : '' }}>Contact Form</option>
                        <option value="chatbot" {{ request('source') === 'chatbot' ? 'selected' : '' }}>AI Chatbot</option>
                    </select>
                </div>

                {{-- Status Pills --}}
                <div class="filter-pills-nav">
                    <a href="{{ request()->fullUrlWithQuery(['status' => '', 'page' => null]) }}" class="btn-filter-pill {{ empty(request('status')) || request('status') === 'all' ? 'active' : '' }}">All ({{ $totalCount }})</a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'new', 'page' => null]) }}" class="btn-filter-pill {{ request('status') === 'new' ? 'active' : '' }}">New ({{ $newCount }})</a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'contacted', 'page' => null]) }}" class="btn-filter-pill {{ request('status') === 'contacted' ? 'active' : '' }}">Contacted ({{ $contactedCount }})</a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'closed', 'page' => null]) }}" class="btn-filter-pill {{ request('status') === 'closed' ? 'active' : '' }}">Closed ({{ $closedCount }})</a>
                </div>
            </div>

            <div style="display: flex; gap: 0.5rem; align-items: center;">
                @if(request()->filled('search') || (request()->filled('source') && request('source') !== 'all') || (request()->filled('status') && request('status') !== 'all'))
                    <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" style="color: #64748b;">
                        <i class="fa-solid fa-rotate-left"></i><span>Reset</span>
                    </a>
                @endif
                <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                    <i class="fa-solid fa-filter"></i><span>Apply</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== LEADS TABLE CARD ===== --}}
<div class="card-syndron" style="margin-bottom: 2rem;">
    <div class="card-syndron-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill"><i class="fa-solid fa-envelope-open-text"></i></div>
                <span>Customer Inquiries Directory</span>
            </h3>
            <p class="card-syndron-desc">Showing {{ $leads->firstItem() ?? 0 }}–{{ $leads->lastItem() ?? 0 }} of {{ $leads->total() }} captured leads.</p>
        </div>
        <div style="font-size: 0.775rem; color: var(--muted-foreground); display: flex; align-items: center; gap: 6px;">
            <i class="fa-solid fa-circle-info" style="color: var(--accent);"></i>
            <span>Click <strong>Notes</strong> to add admin follow-up notes per lead.</span>
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div style="overflow-x: auto;">
            <table class="syndron-table leads-table" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 1000px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: var(--secondary);">
                        <th class="leads-th" style="width: 60px;">#</th>
                        <th class="leads-th" style="width: 240px;">Customer &amp; Contact</th>
                        <th class="leads-th" style="width: 185px;">Product Interest</th>
                        <th class="leads-th">Inquiry Message</th>
                        <th class="leads-th" style="width: 130px; text-align: center;">Source</th>
                        <th class="leads-th" style="width: 148px; text-align: center;">Status</th>
                        <th class="leads-th" style="width: 150px; text-align: right;">Quick Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr class="lead-table-row" id="lead-row-{{ $lead->id }}">
                            {{-- ID --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <span style="font-weight: 700; color: var(--muted-foreground); font-size: 0.8rem;">#{{ $lead->id }}</span>
                                @if($lead->status === 'new')
                                    <span class="new-dot-indicator" title="New — needs attention"></span>
                                @endif
                            </td>

                            {{-- Customer Details --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <div class="lead-customer-name">{{ $lead->name }}</div>
                                <div style="display: flex; flex-direction: column; gap: 3px; margin-top: 4px;">
                                    @if($lead->phone)
                                        <a href="tel:{{ $lead->phone }}" class="lead-contact-line" title="Call now">
                                            <i class="fa-solid fa-phone" style="color: #EF801C; font-size: 0.65rem;"></i>
                                            <span>{{ $lead->phone }}</span>
                                        </a>
                                    @endif
                                    @if($lead->email)
                                        <a href="mailto:{{ $lead->email }}" class="lead-contact-line" title="Send email">
                                            <i class="fa-solid fa-envelope" style="color: #3b82f6; font-size: 0.65rem;"></i>
                                            <span>{{ $lead->email }}</span>
                                        </a>
                                    @endif
                                </div>
                                <div style="font-size: 0.69rem; color: var(--muted-foreground); margin-top: 5px; display: flex; align-items: center; gap: 3px;">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $lead->created_at->format('d M Y, h:i A') }}
                                </div>
                            </td>

                            {{-- Product Interest --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <span class="lead-product-pill">
                                    <i class="fa-solid fa-wheat-awn"></i>
                                    <span>{{ $lead->product_interest ?: 'General Inquiry' }}</span>
                                </span>
                                @if($lead->quantity)
                                    <div style="font-size: 0.725rem; color: var(--muted-foreground); margin-top: 5px;">
                                        Qty: <strong style="color: var(--foreground);">{{ $lead->quantity }}</strong>
                                    </div>
                                @endif
                            </td>

                            {{-- Message --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle;">
                                <p class="lead-message-text">{{ $lead->message }}</p>
                                @if($lead->notes)
                                    <div class="lead-note-box">
                                        <i class="fa-solid fa-note-sticky" style="color: var(--accent); font-size: 0.7rem; flex-shrink: 0;"></i>
                                        <span id="notes-text-{{ $lead->id }}">{{ $lead->notes }}</span>
                                    </div>
                                @else
                                    <div class="lead-note-placeholder" id="notes-placeholder-{{ $lead->id }}">
                                        <i class="fa-regular fa-note-sticky" style="font-size: 0.65rem;"></i> No notes yet
                                    </div>
                                @endif
                            </td>

                            {{-- Source --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: center;">
                                @if($lead->source === 'chatbot')
                                    <span class="lead-source-badge chatbot">
                                        <i class="fa-solid fa-robot"></i> AI Chatbot
                                    </span>
                                @else
                                    <span class="lead-source-badge contact">
                                        <i class="fa-solid fa-envelope"></i> Contact Form
                                    </span>
                                @endif
                            </td>

                            {{-- Status Dropdown --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: center;">
                                <form action="{{ route('admin.leads.status', $lead) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <select
                                        name="status"
                                        class="status-select status-{{ $lead->status }}"
                                        onchange="this.form.submit()"
                                        title="Change lead status"
                                    >
                                        <option value="new"       {{ $lead->status === 'new'       ? 'selected' : '' }}>🔴 New</option>
                                        <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>🔵 Contacted</option>
                                        <option value="closed"    {{ $lead->status === 'closed'    ? 'selected' : '' }}>✅ Closed</option>
                                    </select>
                                </form>
                            </td>

                            {{-- Quick Actions --}}
                            <td style="padding: 1rem 1.25rem; vertical-align: middle; text-align: right;">
                                <div style="display: flex; justify-content: flex-end; gap: 0.4rem; align-items: center;">
                                    {{-- WhatsApp --}}
                                    @if($lead->phone)
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone);
                                            $waText = urlencode("Hello {$lead->name}, thank you for your inquiry with Raghuvir Atta regarding {$lead->product_interest}. How can we help you today?");
                                        @endphp
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}"
                                           target="_blank" rel="noopener noreferrer"
                                           class="lead-action-btn wa"
                                           title="WhatsApp {{ $lead->name }}">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <a href="tel:{{ $lead->phone }}"
                                           class="lead-action-btn phone"
                                           title="Call {{ $lead->name }}">
                                            <i class="fa-solid fa-phone"></i>
                                        </a>
                                    @endif

                                    {{-- Notes --}}
                                    <button
                                        type="button"
                                        class="lead-action-btn notes"
                                        title="Add/Edit Notes"
                                        onclick="openNotesModal({{ $lead->id }}, '{{ addslashes($lead->name) }}', '{{ addslashes($lead->notes ?? '') }}', '{{ route('admin.leads.notes', $lead) }}')"
                                    >
                                        <i class="fa-solid fa-note-sticky"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <button
                                        type="button"
                                        class="lead-action-btn delete"
                                        title="Delete Lead"
                                        onclick="openDeleteModal('{{ $lead->id }}', '{{ addslashes($lead->name) }}', '{{ route('admin.leads.destroy', $lead) }}')"
                                    >
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 4rem 1.5rem; text-align: center;">
                                <div style="width: 72px; height: 72px; border-radius: 50%; background: var(--secondary); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem; color: var(--muted-foreground); font-size: 1.75rem;">
                                    <i class="fa-solid fa-inbox"></i>
                                </div>
                                <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.4rem;">No Inquiries Recorded Yet</h4>
                                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin-bottom: 1.5rem; max-width: 420px; margin-left: auto; margin-right: auto;">
                                    {{ request()->hasAny(['search','status','source']) ? 'No inquiries match your filter criteria. Try resetting.' : 'Customer leads submitted through the public Contact Us page will automatically appear here.' }}
                                </p>
                                @if(request()->hasAny(['search', 'status', 'source']))
                                    <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary">
                                        <i class="fa-solid fa-rotate-left"></i><span>Reset Filters</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($leads->hasPages())
            <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div style="font-size: 0.825rem; color: var(--muted-foreground);">
                    Showing <strong>{{ $leads->firstItem() }}</strong> to <strong>{{ $leads->lastItem() }}</strong> of <strong>{{ $leads->total() }}</strong> total inquiries
                </div>
                <div class="pagination-controls">
                    {{ $leads->appends(request()->query())->links('admin.layouts.pagination') }}
                </div>
            </div>
        @endif
    </div>
</div>

{{-- ===== NOTES MODAL ===== --}}
<div class="leads-modal-backdrop" id="notesModalBackdrop" style="display: none;" onclick="closeNotesModal()">
    <div class="leads-modal-dialog" onclick="event.stopPropagation()">
        <div class="leads-modal-header">
            <div>
                <h3 class="leads-modal-title"><i class="fa-solid fa-note-sticky" style="color: #EF801C;"></i> Admin Notes</h3>
                <p class="leads-modal-subtitle" id="notesModalSubtitle">Lead details</p>
            </div>
            <button type="button" class="leads-modal-close" onclick="closeNotesModal()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="leads-modal-body">
            <label style="font-size: 0.825rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.5rem; display: block;">
                Follow-up Notes <span style="color: var(--muted-foreground); font-weight: 400;">(internal only)</span>
            </label>
            <textarea
                id="notesTextarea"
                class="form-control-admin"
                rows="5"
                placeholder="e.g. Called on Sep 18, she wants a price list PDF. Follow up next week..."
                style="width: 100%; resize: vertical; font-size: 0.875rem; line-height: 1.5;"
            ></textarea>
        </div>
        <div class="leads-modal-footer">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeNotesModal()">Cancel</button>
            <button type="button" class="btn-syndron btn-syndron-primary" id="saveNotesBtn" onclick="saveNotes()">
                <i class="fa-solid fa-floppy-disk"></i> Save Notes
            </button>
        </div>
    </div>
</div>

{{-- ===== DELETE MODAL ===== --}}
<div class="leads-modal-backdrop" id="deleteModalBackdrop" style="display: none;" onclick="closeDeleteModal()">
    <div class="leads-modal-dialog delete-dialog" onclick="event.stopPropagation()">
        <button type="button" class="leads-modal-close" onclick="closeDeleteModal()"><i class="fa-solid fa-xmark"></i></button>

        <div style="text-align: center; margin-bottom: 1.25rem;">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.25); color: #ef4444; font-size: 1.5rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <h3 class="leads-modal-title">Delete Customer Lead?</h3>
            <p style="font-size: 0.875rem; color: var(--muted-foreground); margin: 0.5rem 0 0 0;">
                Are you sure you want to permanently delete the lead record for <strong id="deleteTargetName" style="color: var(--foreground);">this customer</strong>?
            </p>
        </div>

        <div class="leads-warning-callout">
            <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; flex-shrink: 0;"></i>
            <span>This will remove all captured notes, contact details, and inquiry messages for this lead.</span>
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.25rem;">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeDeleteModal()" style="flex: 1;">Cancel</button>
            <form id="deleteForm" method="POST" action="" style="flex: 1; margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-syndron btn-syndron-danger" style="width: 100%; justify-content: center;">
                    <i class="fa-solid fa-trash-can"></i> Yes, Delete Lead
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Toast --}}
<div id="leadsToast" style="position: fixed; bottom: 24px; right: 24px; background: #1e293b; color: #fff; border-radius: 12px; padding: 12px 20px; display: none; align-items: center; gap: 10px; font-size: 0.875rem; font-weight: 600; box-shadow: 0 10px 30px rgba(0,0,0,0.3); z-index: 999999; animation: toastIn 0.25s ease;">
    <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
    <span id="toastMsg">Saved!</span>
</div>

@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // ── Notes Modal ──────────────────────────────────────────
    let currentNotesUrl = null;
    let currentLeadId   = null;

    function openNotesModal(leadId, leadName, currentNotes, notesUrl) {
        currentLeadId   = leadId;
        currentNotesUrl = notesUrl;
        document.getElementById('notesModalSubtitle').textContent = `Lead #${leadId} — ${leadName}`;
        document.getElementById('notesTextarea').value = currentNotes || '';
        document.getElementById('notesModalBackdrop').style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(() => document.getElementById('notesTextarea').focus(), 120);
    }

    function closeNotesModal() {
        document.getElementById('notesModalBackdrop').style.display = 'none';
        document.body.style.overflow = '';
    }

    async function saveNotes() {
        const notes = document.getElementById('notesTextarea').value;
        const btn   = document.getElementById('saveNotesBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        try {
            const res = await fetch(currentNotesUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: JSON.stringify({ notes }),
            });
            const data = await res.json();
            if (data.ok) {
                // Update inline text
                const notesBox     = document.getElementById('notes-text-' + currentLeadId);
                const placeholder  = document.getElementById('notes-placeholder-' + currentLeadId);
                if (notes.trim()) {
                    if (notesBox) {
                        notesBox.textContent = notes;
                    } else if (placeholder) {
                        placeholder.outerHTML = `<div class="lead-note-box"><i class="fa-solid fa-note-sticky" style="color: var(--accent); font-size: 0.7rem; flex-shrink: 0;"></i> <span id="notes-text-${currentLeadId}">${notes}</span></div>`;
                    }
                } else {
                    if (notesBox) {
                        notesBox.closest('.lead-note-box').outerHTML = `<div class="lead-note-placeholder" id="notes-placeholder-${currentLeadId}"><i class="fa-regular fa-note-sticky" style="font-size: 0.65rem;"></i> No notes yet</div>`;
                    }
                }
                showToast('Notes saved successfully!');
                closeNotesModal();
            }
        } catch (e) {
            showToast('Error saving notes. Please try again.', true);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save Notes';
        }
    }

    // ── Delete Modal ─────────────────────────────────────────
    function openDeleteModal(leadId, leadName, deleteUrl) {
        document.getElementById('deleteTargetName').textContent = `"${leadName}" (Lead #${leadId})`;
        document.getElementById('deleteForm').action = deleteUrl;
        document.getElementById('deleteModalBackdrop').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModalBackdrop').style.display = 'none';
        document.body.style.overflow = '';
    }

    // ── Toast ────────────────────────────────────────────────
    function showToast(msg, isError = false) {
        const toast = document.getElementById('leadsToast');
        const icon  = toast.querySelector('i');
        document.getElementById('toastMsg').textContent = msg;
        icon.className = isError ? 'fa-solid fa-triangle-exclamation' : 'fa-solid fa-circle-check';
        icon.style.color = isError ? '#ef4444' : '#10b981';
        toast.style.display = 'flex';
        setTimeout(() => toast.style.display = 'none', 3200);
    }

    // ── Keyboard ──────────────────────────────────────────────
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeNotesModal();
            closeDeleteModal();
        }
        if (e.key === 'Enter' && document.getElementById('notesModalBackdrop').style.display === 'flex' && e.ctrlKey) {
            saveNotes();
        }
    });

    // ── Auto-dismiss flash alert after 5s ─────────────────────
    const alert = document.getElementById('flashAlert');
    if (alert) setTimeout(() => alert.remove(), 5000);
</script>
@endpush
