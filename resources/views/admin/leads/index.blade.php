@extends('admin.layouts.app')

@section('title', 'Customer Inquiries & Leads - Raghuvir Atta Admin')

@push('styles')
<style>
/* ── Hero Banner ─────────────────────────────────────────────────────────── */
.leads-hero-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1.35rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
    flex-wrap: wrap;
}

.leads-hero-title-box {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex: 1;
    min-width: 280px;
}

.leads-hero-icon-badge {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(239, 128, 28, 0.15), rgba(249, 115, 22, 0.25));
    color: #EF801C;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    flex-shrink: 0;
}

.leads-count-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 999px;
}

.leads-count-chip.total {
    background: var(--muted);
    color: var(--muted-foreground);
    border: 1px solid var(--border);
}

.leads-count-chip.new {
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.25);
}

.pulse-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #ef4444;
    animation: leadPulseGlow 1.5s infinite;
}

@keyframes leadPulseGlow {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
}

.leads-hero-actions {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    flex-wrap: wrap;
}

/* ── Flash Alert ─────────────────────────────────────────────────────────── */
.leads-alert {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.85rem 1.25rem;
    border-radius: 12px;
    margin-bottom: 1.25rem;
    animation: fadeInDown 0.3s ease;
}

.leads-alert-success {
    background: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.25);
    color: #065f46;
}

.leads-alert-close {
    background: none;
    border: none;
    color: inherit;
    opacity: 0.6;
    cursor: pointer;
    font-size: 1rem;
    padding: 0 4px;
}
.leads-alert-close:hover { opacity: 1; }

/* ── KPI Metric Cards Grid ───────────────────────────────────────────────── */
.leads-metrics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.15rem;
    margin-bottom: 1.35rem;
}

.leads-kpi-card {
    display: flex;
    flex-direction: column;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 1.15rem 1.25rem;
    text-decoration: none;
    transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
    position: relative;
    overflow: hidden;
}

.leads-kpi-card:hover {
    transform: translateY(-2px);
    border-color: #EF801C;
    box-shadow: 0 8px 20px -4px rgba(239, 128, 28, 0.15);
}

.leads-kpi-card.active-filter {
    border-color: #EF801C;
    box-shadow: 0 0 0 2px rgba(239, 128, 28, 0.2), 0 8px 18px -4px rgba(239, 128, 28, 0.12);
}

.kpi-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.65rem;
}

.kpi-title {
    font-size: 0.775rem;
    font-weight: 700;
    color: var(--muted-foreground);
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.kpi-icon-pill {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.95rem;
    position: relative;
}

.kpi-icon-pill.orange { background: rgba(239, 128, 28, 0.12); color: #EF801C; }
.kpi-icon-pill.red    { background: rgba(239, 68, 68, 0.12); color: #ef4444; }
.kpi-icon-pill.blue   { background: rgba(59, 130, 246, 0.12); color: #3b82f6; }
.kpi-icon-pill.green  { background: rgba(16, 185, 129, 0.12); color: #10b981; }

.kpi-pulse-ring {
    position: absolute;
    inset: -3px;
    border-radius: 12px;
    border: 2px solid #ef4444;
    animation: leadPulseRing 1.8s infinite;
    opacity: 0;
}

@keyframes leadPulseRing {
    0% { transform: scale(0.9); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 0; }
    100% { transform: scale(1.15); opacity: 0; }
}

.kpi-number-wrap {
    margin-bottom: 0.55rem;
}

.kpi-number {
    font-size: 1.85rem;
    font-weight: 800;
    line-height: 1.1;
    color: var(--foreground);
    letter-spacing: -0.02em;
}

.kpi-number.text-red   { color: #ef4444; }
.kpi-number.text-blue  { color: #3b82f6; }
.kpi-number.text-green { color: #10b981; }

.kpi-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.725rem;
    margin-top: auto;
}

.kpi-trend {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-weight: 700;
    border-radius: 6px;
    padding: 2px 6px;
}

.kpi-trend.neutral  { background: var(--muted); color: var(--muted-foreground); }
.kpi-trend.negative { background: rgba(239, 68, 68, 0.1); color: #ef4444; }
.kpi-trend.info     { background: rgba(59, 130, 246, 0.1); color: #2563eb; }
.kpi-trend.positive { background: rgba(16, 185, 129, 0.1); color: #059669; }

.kpi-subtext {
    color: var(--muted-foreground);
    font-weight: 500;
}

/* ── Filter Bar ──────────────────────────────────────────────────────────── */
.leads-filter-card {
    margin-bottom: 1.35rem;
    border-radius: 14px;
}

.leads-filter-form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-inputs-group {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    flex: 1;
}

.search-box-wrap {
    min-width: 260px;
    flex: 1;
    position: relative;
}

.search-clear-btn {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--muted-foreground);
    cursor: pointer;
    padding: 2px;
    font-size: 0.85rem;
}
.search-clear-btn:hover { color: var(--foreground); }

.filter-select-wrap {
    min-width: 140px;
}

.filter-select {
    height: 38px;
    padding: 0 1.75rem 0 0.85rem;
    font-size: 0.825rem;
    border-radius: 8px;
}

.filter-pills-nav {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    background: var(--muted);
    padding: 3px;
    border-radius: 9px;
}

.btn-filter-pill {
    padding: 5px 11px;
    font-size: 0.785rem;
    font-weight: 600;
    border-radius: 7px;
    color: var(--muted-foreground);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.15s ease;
}

.btn-filter-pill:hover {
    color: var(--foreground);
    background: rgba(255, 255, 255, 0.5);
}

.btn-filter-pill.active {
    background: var(--card);
    color: var(--foreground);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
}

.pill-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
}
.pill-dot.red   { background: #ef4444; }
.pill-dot.blue  { background: #3b82f6; }
.pill-dot.green { background: #10b981; }

.pill-count {
    font-size: 0.7rem;
    padding: 1px 6px;
    border-radius: 999px;
    background: rgba(0, 0, 0, 0.06);
    font-weight: 700;
}

.filter-actions-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* ── Floating Multi-Select Bulk Actions Bar ───────────────────────────────── */
.leads-bulk-floating-bar {
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: leadSlideUpFloat 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes leadSlideUpFloat {
    from { transform: translate(-50%, 20px); opacity: 0; }
    to   { transform: translate(-50%, 0); opacity: 1; }
}

.bulk-bar-inner {
    background: #0f172a;
    color: #ffffff;
    padding: 0.65rem 1.25rem;
    border-radius: 14px;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    gap: 0.9rem;
    backdrop-filter: blur(8px);
}

.bulk-bar-info {
    display: flex;
    align-items: center;
    gap: 8px;
}

.bulk-count-badge {
    background: #EF801C;
    color: #ffffff;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 999px;
    font-size: 0.8rem;
}

.bulk-divider {
    width: 1px;
    height: 22px;
    background: rgba(255, 255, 255, 0.15);
}

.bulk-action-buttons {
    display: flex;
    align-items: center;
    gap: 0.45rem;
}

.bulk-btn {
    padding: 6px 12px;
    border-radius: 8px;
    border: none;
    font-size: 0.785rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    transition: 0.15s;
}

.bulk-btn.mark-new       { background: rgba(239, 68, 68, 0.25); color: #fca5a5; }
.bulk-btn.mark-new:hover { background: rgba(239, 68, 68, 0.45); }

.bulk-btn.mark-contacted       { background: rgba(59, 130, 246, 0.25); color: #93c5fd; }
.bulk-btn.mark-contacted:hover { background: rgba(59, 130, 246, 0.45); }

.bulk-btn.mark-closed       { background: rgba(16, 185, 129, 0.25); color: #86efac; }
.bulk-btn.mark-closed:hover { background: rgba(16, 185, 129, 0.45); }

.bulk-btn.mark-delete       { background: #ef4444; color: #ffffff; }
.bulk-btn.mark-delete:hover { background: #dc2626; }

.bulk-cancel-btn {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #cbd5e1;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.785rem;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.bulk-cancel-btn:hover { background: rgba(255, 255, 255, 0.1); color: #ffffff; }

/* ── Table Styling ───────────────────────────────────────────────────────── */
.leads-table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    padding: 1.15rem 1.45rem;
}

.leads-header-badges {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.leads-info-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.785rem;
    font-weight: 600;
    color: var(--muted-foreground);
    background: var(--muted);
    padding: 5px 12px;
    border-radius: 8px;
}

.leads-table-container {
    overflow-x: auto;
    width: 100%;
}

.leads-table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.leads-table-modern thead th {
    font-size: 0.725rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: var(--muted-foreground);
    padding: 0.85rem 1.15rem;
    background: var(--muted);
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}

.leads-table-modern tbody td {
    padding: 1rem 1.15rem;
    border-bottom: 1px solid var(--border);
    vertical-align: middle;
}

.lead-row {
    transition: background 0.15s ease;
}

.lead-row:hover {
    background: rgba(239, 128, 28, 0.03);
}

.lead-row.row-new-highlight {
    background: rgba(239, 68, 68, 0.02);
}

.lead-row.row-new-highlight:hover {
    background: rgba(239, 68, 68, 0.05);
}

.lead-row.row-selected {
    background: rgba(239, 128, 28, 0.08) !important;
}

/* Custom Checkbox */
.custom-checkbox-wrap {
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    position: relative;
    user-select: none;
}

.custom-checkbox-wrap input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    width: 0;
    height: 0;
}

.custom-box {
    width: 18px;
    height: 18px;
    border-radius: 5px;
    border: 1.5px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.15s;
    background: var(--card);
}

.custom-checkbox-wrap input:checked ~ .custom-box {
    background: #EF801C;
    border-color: #EF801C;
}

.custom-checkbox-wrap input:checked ~ .custom-box:after {
    content: "\f00c";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    color: #ffffff;
    font-size: 0.65rem;
}

/* Customer Profile in Row */
.customer-profile-flex {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.customer-avatar {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.9rem;
    letter-spacing: -0.02em;
    flex-shrink: 0;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
}

.customer-info-meta {
    min-width: 0;
}

.customer-name-row {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    margin-bottom: 3px;
}

.customer-name-link {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--foreground);
    text-decoration: none;
    transition: color 0.15s;
}
.customer-name-link:hover { color: #EF801C; }

.lead-id-tag {
    font-size: 0.685rem;
    font-weight: 700;
    color: var(--muted-foreground);
    background: var(--muted);
    padding: 1px 6px;
    border-radius: 4px;
}

.new-glow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #ef4444;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.25);
}

.customer-contact-links {
    display: flex;
    flex-direction: column;
    gap: 3px;
    margin: 4px 0;
}

.contact-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.775rem;
    font-weight: 500;
}

.contact-pill a {
    color: var(--foreground);
    text-decoration: none;
    transition: color 0.15s;
}
.contact-pill a:hover { color: #EF801C; text-decoration: underline; }

.customer-time-caption {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.7rem;
    color: var(--muted-foreground);
    margin-top: 3px;
}

.time-ago-tag {
    color: var(--foreground-subtle);
    font-style: italic;
}

/* Product & Requirement Column */
.product-badge-wrap {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.product-wheat-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 9px;
    border-radius: 8px;
    background: rgba(239, 128, 28, 0.1);
    color: #c2410c;
    font-size: 0.785rem;
    font-weight: 600;
}

.quantity-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.725rem;
    color: var(--muted-foreground);
}

/* Inquiry Message & Notes */
.message-preview-container {
    max-width: 380px;
}

.message-bubble {
    background: var(--muted);
    border-radius: 9px;
    padding: 7px 11px;
    cursor: pointer;
    transition: all 0.15s;
    border-left: 3px solid #EF801C;
}
.message-bubble:hover { background: rgba(239, 128, 28, 0.08); }

.quote-icon {
    font-size: 0.685rem;
    color: #EF801C;
    margin-right: 4px;
}

.message-bubble-text {
    font-size: 0.8rem;
    color: var(--foreground);
    margin: 0;
    line-height: 1.45;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.read-more-link {
    font-size: 0.7rem;
    font-weight: 700;
    color: #EF801C;
    margin-top: 2px;
    display: inline-block;
}

.lead-note-card {
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(239, 128, 28, 0.06);
    border: 1px dashed rgba(239, 128, 28, 0.35);
    padding: 4px 8px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.15s;
}
.lead-note-card:hover { background: rgba(239, 128, 28, 0.12); }

.note-text-snippet {
    font-size: 0.75rem;
    color: var(--foreground);
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    flex: 1;
}

.note-edit-icon {
    font-size: 0.65rem;
    color: var(--muted-foreground);
}

.btn-add-note-inline {
    background: none;
    border: 1px dashed var(--border);
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 0.725rem;
    color: var(--muted-foreground);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: 0.15s;
}
.btn-add-note-inline:hover {
    border-color: #EF801C;
    color: #EF801C;
    background: rgba(239, 128, 28, 0.05);
}

/* Source Badges */
.source-badge-modern {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.source-badge-modern.contact {
    background: rgba(59, 130, 246, 0.1);
    color: #2563eb;
}

.source-badge-modern.product {
    background: rgba(245, 158, 11, 0.12);
    color: #d97706;
}

.source-badge-modern.website {
    background: rgba(16, 185, 129, 0.1);
    color: #059669;
}

/* Status Selector */
.status-dropdown-wrap {
    display: inline-block;
}

.lead-status-select {
    appearance: none;
    -webkit-appearance: none;
    padding: 5px 24px 5px 11px;
    border-radius: 999px;
    font-size: 0.785rem;
    font-weight: 700;
    cursor: pointer;
    border: 1.5px solid transparent;
    background-position: right 8px center;
    background-repeat: no-repeat;
    background-size: 9px;
    transition: all 0.2s;
    font-family: inherit;
}

.lead-status-select.status-new {
    background-color: rgba(239, 68, 68, 0.12);
    color: #dc2626;
    border-color: rgba(239, 68, 68, 0.25);
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23dc2626'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
}

.lead-status-select.status-contacted {
    background-color: rgba(59, 130, 246, 0.12);
    color: #2563eb;
    border-color: rgba(59, 130, 246, 0.25);
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563eb'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
}

.lead-status-select.status-closed {
    background-color: rgba(16, 185, 129, 0.12);
    color: #059669;
    border-color: rgba(16, 185, 129, 0.25);
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23059669'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
}

.lead-status-select:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.25);
}

/* Quick Actions */
.lead-actions-row {
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.action-btn-pill {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: 1px solid var(--border);
    background: var(--card);
    color: var(--foreground-muted);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.15s ease;
}

.action-btn-pill:hover {
    transform: translateY(-1px);
}

.action-btn-pill.wa:hover     { background: #25D366; border-color: #25D366; color: #ffffff; }
.action-btn-pill.call:hover   { background: #EF801C; border-color: #EF801C; color: #ffffff; }
.action-btn-pill.view:hover   { background: #3b82f6; border-color: #3b82f6; color: #ffffff; }
.action-btn-pill.notes:hover  { background: #f59e0b; border-color: #f59e0b; color: #ffffff; }
.action-btn-pill.delete:hover { background: #ef4444; border-color: #ef4444; color: #ffffff; }

/* Empty State */
.leads-empty-state {
    text-align: center;
    padding: 3.5rem 1.5rem;
}

.empty-icon-circle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--muted);
    color: var(--muted-foreground);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem auto;
    font-size: 1.5rem;
}

.leads-empty-state h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--foreground);
    margin: 0 0 0.45rem 0;
}

.leads-empty-state p {
    font-size: 0.85rem;
    color: var(--muted-foreground);
    max-width: 460px;
    margin: 0 auto;
    line-height: 1.5;
}

/* Pagination Footer */
.leads-pagination-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.45rem;
    border-top: 1px solid var(--border);
    flex-wrap: wrap;
    gap: 1rem;
}

/* ── Modals ──────────────────────────────────────────────────────────────── */
.leads-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.65);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.25rem;
}

.leads-modal-dialog {
    background: var(--card);
    border-radius: 16px;
    width: 100%;
    max-width: 560px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    animation: leadModalPop 0.22s cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes leadModalPop {
    from { transform: scale(0.96) translateY(8px); opacity: 0; }
    to   { transform: scale(1) translateY(0); opacity: 1; }
}

.leads-modal-dialog.details-dialog {
    max-width: 680px;
}

.leads-modal-dialog.delete-dialog {
    max-width: 440px;
    padding: 1.75rem;
}

.leads-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.25rem 1.65rem;
}

.leads-modal-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--foreground);
    margin: 0;
}

.leads-modal-subtitle {
    font-size: 0.8rem;
    color: var(--muted-foreground);
    margin: 2px 0 0 0;
}

.leads-modal-close {
    background: var(--muted);
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 8px;
    color: var(--muted-foreground);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.15s;
}
.leads-modal-close:hover {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.modal-contact-overview-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.85rem;
}

.modal-info-box {
    background: var(--muted);
    border-radius: 10px;
    padding: 0.85rem 1rem;
}

.info-label {
    font-size: 0.725rem;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--muted-foreground);
    margin-bottom: 0.35rem;
    display: flex;
    align-items: center;
    gap: 6px;
}

.info-value-row {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    font-size: 0.875rem;
}

.btn-mini-action {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 7px;
    border-radius: 5px;
    font-size: 0.725rem;
    font-weight: 600;
    text-decoration: none;
    background: var(--card);
    border: 1px solid var(--border);
    color: var(--foreground);
}

.btn-mini-action.wa {
    background: rgba(37, 211, 102, 0.12);
    color: #16a34a;
    border-color: rgba(37, 211, 102, 0.3);
}

.modal-message-bubble {
    background: var(--muted);
    border-radius: 10px;
    padding: 1rem 1.15rem;
    font-size: 0.875rem;
    line-height: 1.6;
    color: var(--foreground);
    max-height: 180px;
    overflow-y: auto;
    white-space: pre-line;
    border-left: 3px solid #EF801C;
}

.leads-modal-footer {
    padding: 1rem 1.65rem;
    display: flex;
    justify-content: flex-end;
    gap: 0.65rem;
    background: var(--muted);
}

.modal-danger-circle {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.75rem auto;
    font-size: 1.4rem;
}

.leads-warning-callout {
    background: rgba(239, 68, 68, 0.08);
    border-radius: 10px;
    padding: 0.85rem 1rem;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.8rem;
    color: #b91c1c;
    line-height: 1.45;
}

.shortcut-key {
    background: var(--card);
    border: 1px solid var(--border);
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 600;
}

/* ── Toast Notification ──────────────────────────────────────────────────── */
.leads-toast-box {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: #0f172a;
    color: #ffffff;
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.35);
    display: none;
    align-items: center;
    gap: 10px;
    z-index: 10001;
    animation: leadToastSlideIn 0.25s ease;
    font-size: 0.85rem;
    font-weight: 600;
}

@keyframes leadToastSlideIn {
    from { transform: translateY(15px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
}

/* ── Responsive Queries for Leads Module ──────────────────────────────────── */
@media (max-width: 1180px) {
    .leads-metrics-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .leads-hero-banner {
        flex-direction: column;
        align-items: flex-start;
    }
    .leads-hero-actions {
        width: 100%;
    }
    .leads-hero-actions .btn-syndron {
        flex: 1;
        justify-content: center;
    }
    .leads-metrics-grid {
        grid-template-columns: 1fr;
    }
    .modal-contact-overview-grid {
        grid-template-columns: 1fr;
    }
    .bulk-bar-inner {
        flex-direction: column;
        width: 90vw;
    }
    .bulk-action-buttons {
        flex-wrap: wrap;
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
{{-- Page Breadcrumb --}}
<div class="breadcrumb-nav" style="margin-bottom: 0.85rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span style="color: var(--muted-foreground);">Customer Relations</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Inquiries &amp; Leads</span>
</div>

{{-- ===== TOP HERO HEADER BANNER ===== --}}
<div class="leads-hero-banner">
    <div class="leads-hero-title-box">
        <div class="leads-hero-icon-badge">
            <i class="fa-solid fa-headset"></i>
        </div>
        <div>
            <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 0.35rem; flex-wrap: wrap;">
                <h1 class="page-title-main" style="margin-bottom: 0;">Customer Inquiries &amp; Leads</h1>
                <span class="leads-count-chip total">
                    <i class="fa-solid fa-database" style="font-size: 0.65rem;"></i> {{ $totalCount }} Total
                </span>
                @if($newCount > 0)
                    <span class="leads-count-chip new">
                        <span class="pulse-dot"></span> {{ $newCount }} Action Required
                    </span>
                @endif
            </div>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0; line-height: 1.45;">
                Real-time wholesale leads and customer inquiries captured automatically via website contact forms and product inquiries.
            </p>
        </div>
    </div>

    <!-- Header Action Buttons -->
    <div class="leads-hero-actions">
        <a href="{{ route('admin.leads.export', request()->query()) }}" class="btn-syndron btn-syndron-secondary" title="Export current leads to CSV spreadsheet">
            <i class="fa-solid fa-file-arrow-down" style="color: #10b981;"></i>
            <span>Export CSV</span>
        </a>
        <a href="{{ route('contact') }}" target="_blank" class="btn-syndron btn-syndron-secondary" title="Open live public contact page">
            <i class="fa-solid fa-arrow-up-right-from-square" style="color: #3b82f6;"></i>
            <span>Public Form</span>
        </a>
        <button type="button" class="btn-syndron btn-syndron-primary" onclick="window.location.reload()" title="Refresh latest leads">
            <i class="fa-solid fa-rotate"></i>
            <span>Refresh</span>
        </button>
    </div>
</div>

{{-- ===== FLASH ALERTS ===== --}}
@if(session('success'))
    <div class="leads-alert leads-alert-success" id="flashAlert">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.15rem; color: #10b981;"></i>
            <span style="font-weight: 600; font-size: 0.875rem;">{{ session('success') }}</span>
        </div>
        <button type="button" class="leads-alert-close" onclick="this.parentElement.remove()">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

{{-- ===== 4 KPI METRIC CARDS (Glassmorphic) ===== --}}
<div class="leads-metrics-grid">
    {{-- Card 1: Total Inquiries --}}
    <a href="{{ route('admin.leads.index') }}" class="leads-kpi-card {{ empty(request('status')) ? 'active-filter' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-title">Total Inquiries</span>
            <div class="kpi-icon-pill orange">
                <i class="fa-solid fa-inbox"></i>
            </div>
        </div>
        <div class="kpi-number-wrap">
            <div class="kpi-number">{{ $totalCount }}</div>
        </div>
        <div class="kpi-card-footer">
            <span class="kpi-trend neutral">
                <i class="fa-solid fa-layer-group"></i> <span>All channels</span>
            </span>
            <span class="kpi-subtext">Lifetime capture</span>
        </div>
    </a>

    {{-- Card 2: New Inquiries --}}
    <a href="{{ request()->fullUrlWithQuery(['status'=>'new', 'page'=>null]) }}" class="leads-kpi-card {{ request('status') === 'new' ? 'active-filter' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-title">New Inquiries</span>
            <div class="kpi-icon-pill red">
                <span class="kpi-pulse-ring"></span>
                <i class="fa-solid fa-bell"></i>
            </div>
        </div>
        <div class="kpi-number-wrap">
            <div class="kpi-number text-red">{{ $newCount }}</div>
        </div>
        <div class="kpi-card-footer">
            <span class="kpi-trend negative">
                <i class="fa-solid fa-circle-exclamation"></i> <span>Action Needed</span>
            </span>
            <span class="kpi-subtext">Unread requests</span>
        </div>
    </a>

    {{-- Card 3: Contacted --}}
    <a href="{{ request()->fullUrlWithQuery(['status'=>'contacted', 'page'=>null]) }}" class="leads-kpi-card {{ request('status') === 'contacted' ? 'active-filter' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-title">Contacted</span>
            <div class="kpi-icon-pill blue">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
        </div>
        <div class="kpi-number-wrap">
            <div class="kpi-number text-blue">{{ $contactedCount }}</div>
        </div>
        <div class="kpi-card-footer">
            <span class="kpi-trend info">
                <i class="fa-solid fa-handshake"></i> <span>Active Discussions</span>
            </span>
            <span class="kpi-subtext">In progress</span>
        </div>
    </a>

    {{-- Card 4: Closed & Converted --}}
    <a href="{{ request()->fullUrlWithQuery(['status'=>'closed', 'page'=>null]) }}" class="leads-kpi-card {{ request('status') === 'closed' ? 'active-filter' : '' }}">
        <div class="kpi-card-header">
            <span class="kpi-title">Closed &amp; Converted</span>
            <div class="kpi-icon-pill green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="kpi-number-wrap">
            <div class="kpi-number text-green">{{ $closedCount }}</div>
        </div>
        <div class="kpi-card-footer">
            <span class="kpi-trend positive">
                <i class="fa-solid fa-check-double"></i> <span>Deals Won</span>
            </span>
            <span class="kpi-subtext">Completed orders</span>
        </div>
    </a>
</div>

{{-- ===== UNIFIED SEARCH & FILTER COMMAND BAR ===== --}}
<div class="card-syndron leads-filter-card">
    <div class="card-syndron-body" style="padding: 1.15rem 1.35rem;">
        <form action="{{ route('admin.leads.index') }}" method="GET" id="leadsFilterForm" class="leads-filter-form">
            <div class="filter-inputs-group">
                {{-- Search Input --}}
                <div class="input-with-icon search-box-wrap">
                    <input
                        type="text"
                        name="search"
                        id="leadsSearchInput"
                        value="{{ request('search') }}"
                        class="form-control-admin"
                        placeholder="Search customer, phone, email, product, or notes..."
                        style="padding-top: 0.6rem; padding-bottom: 0.6rem; font-size: 0.85rem;"
                    >
                    <i class="fa-solid fa-magnifying-glass input-icon" style="font-size: 0.85rem;"></i>
                    @if(request('search'))
                        <button type="button" class="search-clear-btn" onclick="clearSearch()" title="Clear search">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    @endif
                </div>

                {{-- Source Dropdown --}}
                <div class="filter-select-wrap">
                    <select name="source" class="form-control-admin filter-select" onchange="this.form.submit()">
                        <option value="all" {{ !request('source') || request('source') === 'all' ? 'selected' : '' }}>
                            🌐 All Sources
                        </option>
                        <option value="contact_page" {{ request('source') === 'contact_page' ? 'selected' : '' }}>
                            ✉️ Contact Form
                        </option>
                        <option value="product_inquiry_popup" {{ request('source') === 'product_inquiry_popup' ? 'selected' : '' }}>
                            🌾 Product Inquiry
                        </option>
                        <option value="website" {{ request('source') === 'website' ? 'selected' : '' }}>
                            🌐 Website Direct
                        </option>
                    </select>
                </div>

                {{-- Sort Selector --}}
                <div class="filter-select-wrap" style="min-width: 140px;">
                    <select name="sort" class="form-control-admin filter-select" onchange="this.form.submit()">
                        <option value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>
                            ⬇️ Newest First
                        </option>
                        <option value="oldest" {{ request('sort', 'oldest') === 'oldest' ? 'selected' : '' }}>
                            ⬆️ Oldest First
                        </option>
                    </select>
                </div>

                {{-- Status Pills --}}
                <div class="filter-pills-nav">
                    <a href="{{ request()->fullUrlWithQuery(['status' => '', 'page' => null]) }}"
                       class="btn-filter-pill {{ empty(request('status')) || request('status') === 'all' ? 'active' : '' }}">
                        All <span class="pill-count">{{ $totalCount }}</span>
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'new', 'page' => null]) }}"
                       class="btn-filter-pill {{ request('status') === 'new' ? 'active' : '' }}">
                        <span class="pill-dot red"></span> New <span class="pill-count">{{ $newCount }}</span>
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'contacted', 'page' => null]) }}"
                       class="btn-filter-pill {{ request('status') === 'contacted' ? 'active' : '' }}">
                        <span class="pill-dot blue"></span> Contacted <span class="pill-count">{{ $contactedCount }}</span>
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'closed', 'page' => null]) }}"
                       class="btn-filter-pill {{ request('status') === 'closed' ? 'active' : '' }}">
                        <span class="pill-dot green"></span> Closed <span class="pill-count">{{ $closedCount }}</span>
                    </a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="filter-actions-group">
                @if(request()->filled('search') || (request()->filled('source') && request('source') !== 'all') || (request()->filled('status') && request('status') !== 'all') || request('sort') === 'oldest')
                    <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary btn-syndron-sm" title="Clear all filters">
                        <i class="fa-solid fa-rotate-left"></i> <span>Reset</span>
                    </a>
                @endif
                <button type="submit" class="btn-syndron btn-syndron-primary btn-syndron-sm">
                    <i class="fa-solid fa-filter"></i> <span>Filter</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== FLOATING MULTI-SELECT BULK ACTIONS BAR ===== --}}
<div class="leads-bulk-floating-bar" id="leadsBulkBar" style="display: none;">
    <div class="bulk-bar-inner">
        <div class="bulk-bar-info">
            <span class="bulk-count-badge" id="bulkSelectedCount">0</span>
            <span style="font-size: 0.85rem; font-weight: 700; color: #ffffff;">inquiries selected</span>
        </div>
        <div class="bulk-divider"></div>
        <div class="bulk-action-buttons">
            <button type="button" class="bulk-btn mark-new" onclick="executeBulkAction('mark_new')" title="Mark as New">
                <i class="fa-solid fa-bell"></i> <span>Mark New</span>
            </button>
            <button type="button" class="bulk-btn mark-contacted" onclick="executeBulkAction('mark_contacted')" title="Mark as Contacted">
                <i class="fa-solid fa-phone"></i> <span>Mark Contacted</span>
            </button>
            <button type="button" class="bulk-btn mark-closed" onclick="executeBulkAction('mark_closed')" title="Mark as Closed">
                <i class="fa-solid fa-circle-check"></i> <span>Mark Closed</span>
            </button>
            <button type="button" class="bulk-btn mark-delete" onclick="openBulkDeleteModal()" title="Delete Selected">
                <i class="fa-solid fa-trash-can"></i> <span>Delete Selected</span>
            </button>
        </div>
        <div class="bulk-bar-right">
            <button type="button" class="bulk-cancel-btn" onclick="clearBulkSelection()">
                <i class="fa-solid fa-xmark"></i> <span>Cancel</span>
            </button>
        </div>
    </div>
</div>

{{-- ===== MAIN CUSTOMER INQUIRIES DIRECTORY CARD ===== --}}
<div class="card-syndron" style="margin-bottom: 2.5rem;">
    <div class="card-syndron-header leads-table-header">
        <div>
            <h3 class="card-syndron-title">
                <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <span>Customer Inquiries Directory</span>
            </h3>
            <p class="card-syndron-desc">
                Showing {{ $leads->firstItem() ?? 0 }}–{{ $leads->lastItem() ?? 0 }} of {{ $leads->total() }} captured inquiries. Click row or actions for full CRM history.
            </p>
        </div>

        <div class="leads-header-badges">
            <button type="button" id="selectAllBtn" class="btn-syndron btn-syndron-secondary btn-syndron-sm" onclick="toggleSelectAll()" style="{{ $leads->isEmpty() ? 'display:none;' : '' }}">
                <i class="fa-regular fa-square-check"></i> <span id="selectAllBtnLabel">Select All</span>
            </button>
            <span class="leads-info-pill">
                <i class="fa-solid fa-bolt" style="color: #10b981;"></i> Instant AJAX Status
            </span>
        </div>
    </div>

    <div class="card-syndron-body" style="padding: 0;">
        <div class="leads-table-container">
            <table class="syndron-table leads-table-modern">
                <thead>
                    <tr>
                        <th style="width: 48px; text-align: center;">
                            <label class="custom-checkbox-wrap" title="Select all on this page">
                                <input type="checkbox" id="headerCheckbox" onchange="onHeaderCheckboxChange(this)">
                                <span class="custom-box"></span>
                            </label>
                        </th>
                        <th style="width: 270px;">Customer &amp; Contact</th>
                        <th style="width: 190px;">Product &amp; Requirement</th>
                        <th>Inquiry Message &amp; Notes</th>
                        <th style="width: 140px; text-align: center;">Source</th>
                        <th style="width: 175px; text-align: center;">Status</th>
                        <th style="width: 180px; text-align: right;">Quick Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        @php
                            // Compute vibrant initials avatar color based on name
                            $nameParts = explode(' ', trim($lead->name));
                            $initials = strtoupper(substr($nameParts[0] ?? '', 0, 1) . substr($nameParts[1] ?? '', 0, 1));
                            if (strlen($initials) < 2) {
                                $initials = strtoupper(substr($lead->name, 0, 2));
                            }
                            $colorPalettes = [
                                ['bg' => 'linear-gradient(135deg, #EF801C, #F97316)', 'text' => '#ffffff'],
                                ['bg' => 'linear-gradient(135deg, #8B5CF6, #6366F1)', 'text' => '#ffffff'],
                                ['bg' => 'linear-gradient(135deg, #0EA5E9, #0284C7)', 'text' => '#ffffff'],
                                ['bg' => 'linear-gradient(135deg, #10B981, #059669)', 'text' => '#ffffff'],
                                ['bg' => 'linear-gradient(135deg, #F43F5E, #E11D48)', 'text' => '#ffffff'],
                            ];
                            $paletteIndex = crc32($lead->name) % count($colorPalettes);
                            $avatarStyle = $colorPalettes[$paletteIndex];

                            $cleanPhone = $lead->phone ? preg_replace('/[^0-9]/', '', $lead->phone) : null;
                            $waText = urlencode("Hello {$lead->name}, thank you for reaching out to Raghuvir Atta regarding your inquiry for " . ($lead->product_interest ?: 'pure stone chakki flour') . ". How can we assist you today?");

                            $leadJson = json_encode([
                                'id'               => $lead->id,
                                'name'             => $lead->name,
                                'phone'            => $lead->phone,
                                'email'            => $lead->email,
                                'product_interest' => $lead->product_interest,
                                'quantity'         => $lead->quantity,
                                'message'          => $lead->message,
                                'source'           => $lead->source,
                                'status'           => $lead->status,
                                'notes'            => $lead->notes,
                                'created_at'       => $lead->created_at ? $lead->created_at->format('d M Y, h:i A') : 'N/A',
                                'relative_time'    => $lead->created_at ? $lead->created_at->diffForHumans() : '',
                                'status_url'       => route('admin.leads.status', $lead),
                                'notes_url'        => route('admin.leads.notes', $lead),
                                'delete_url'       => route('admin.leads.destroy', $lead),
                            ]);
                        @endphp

                        <tr class="lead-row {{ $lead->status === 'new' ? 'row-new-highlight' : '' }}" id="lead-row-{{ $lead->id }}">
                            {{-- Checkbox --}}
                            <td style="text-align: center; vertical-align: middle;">
                                <label class="custom-checkbox-wrap" title="Select Lead #{{ $lead->id }}">
                                    <input
                                        type="checkbox"
                                        class="lead-select-checkbox"
                                        value="{{ $lead->id }}"
                                        onchange="onLeadCheckboxChange()"
                                    >
                                    <span class="custom-box"></span>
                                </label>
                            </td>

                            {{-- Customer Profile & Contact --}}
                            <td style="vertical-align: middle;">
                                <div class="customer-profile-flex">
                                    <div class="customer-avatar" style="background: {{ $avatarStyle['bg'] }}; color: {{ $avatarStyle['text'] }};" title="{{ $lead->name }}">
                                        {{ $initials }}
                                    </div>
                                    <div class="customer-info-meta">
                                        <div class="customer-name-row">
                                            <a href="javascript:void(0)" onclick="openLeadDetailsModal({{ $leadJson }})" class="customer-name-link" title="Click to view full inquiry history">
                                                {{ $lead->name }}
                                            </a>
                                            <span class="lead-id-tag">#{{ $lead->id }}</span>
                                            @if($lead->status === 'new')
                                                <span class="new-glow-dot" title="New unaddressed inquiry"></span>
                                            @endif
                                        </div>

                                        <div class="customer-contact-links">
                                            @if($lead->phone)
                                                <div class="contact-pill phone-pill">
                                                    <i class="fa-solid fa-phone" style="font-size: 0.65rem; color: #EF801C;"></i>
                                                    <a href="tel:{{ $lead->phone }}" title="Direct voice call">{{ $lead->phone }}</a>
                                                </div>
                                            @endif
                                            @if($lead->email)
                                                <div class="contact-pill email-pill">
                                                    <i class="fa-solid fa-envelope" style="font-size: 0.65rem; color: #3b82f6;"></i>
                                                    <a href="mailto:{{ $lead->email }}" title="Direct email compose">{{ $lead->email }}</a>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="customer-time-caption">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>{{ $lead->created_at ? $lead->created_at->format('d M Y, h:i A') : 'N/A' }}</span>
                                            <span class="time-ago-tag">({{ $lead->created_at ? $lead->created_at->diffForHumans() : '' }})</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Product & Requirement --}}
                            <td style="vertical-align: middle;">
                                <div class="product-badge-wrap">
                                    <span class="product-wheat-chip">
                                        <i class="fa-solid fa-wheat-awn"></i>
                                        <span>{{ $lead->product_interest ?: 'General Wholesale Inquiry' }}</span>
                                    </span>
                                    @if($lead->quantity)
                                        <div class="quantity-tag">
                                            <i class="fa-solid fa-boxes-stacked"></i>
                                            <span>Volume: <strong>{{ $lead->quantity }}</strong></span>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            {{-- Message & Notes --}}
                            <td style="vertical-align: middle;">
                                <div class="message-preview-container">
                                    <div class="message-bubble" onclick="openLeadDetailsModal({{ $leadJson }})" title="Click to view full message">
                                        <i class="fa-solid fa-quote-left quote-icon"></i>
                                        <p class="message-bubble-text">{{ Str::limit($lead->message ?? 'No specific message provided', 120) }}</p>
                                        @if(strlen($lead->message ?? '') > 120)
                                            <span class="read-more-link">View More</span>
                                        @endif
                                    </div>

                                    {{-- Admin Follow-up Notes --}}
                                    <div id="leadNotesWrapper-{{ $lead->id }}" style="margin-top: 6px;">
                                        @if($lead->notes)
                                            <div class="lead-note-card" onclick="openNotesModal({{ $lead->id }}, '{{ addslashes($lead->name) }}', '{{ addslashes($lead->notes) }}', '{{ route('admin.leads.notes', $lead) }}')" title="Click to edit admin note">
                                                <i class="fa-solid fa-note-sticky" style="color: #EF801C; font-size: 0.72rem; flex-shrink: 0;"></i>
                                                <span class="note-text-snippet" id="notes-text-{{ $lead->id }}">{{ Str::limit($lead->notes ?? '', 95) }}</span>
                                                <i class="fa-solid fa-pen note-edit-icon"></i>
                                            </div>
                                        @else
                                            <button type="button" class="btn-add-note-inline" id="notes-placeholder-{{ $lead->id }}" onclick="openNotesModal({{ $lead->id }}, '{{ addslashes($lead->name) }}', '', '{{ route('admin.leads.notes', $lead) }}')">
                                                <i class="fa-regular fa-note-sticky"></i>
                                                <span>+ Add Follow-up Note</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Source --}}
                            <td style="vertical-align: middle; text-align: center;">
                                @if($lead->source === 'product_inquiry_popup' || $lead->source === 'product_inquiry')
                                    <span class="source-badge-modern product" title="Product Inquiry">
                                        <i class="fa-solid fa-wheat-awn"></i>
                                        <span>Product Inquiry</span>
                                    </span>
                                @elseif($lead->source === 'contact_page' || $lead->source === 'contact_form')
                                    <span class="source-badge-modern contact" title="Contact Us Form">
                                        <i class="fa-solid fa-envelope"></i>
                                        <span>Contact Form</span>
                                    </span>
                                @else
                                    <span class="source-badge-modern website" title="Website Direct">
                                        <i class="fa-solid fa-globe"></i>
                                        <span>Website</span>
                                    </span>
                                @endif
                            </td>

                            {{-- Status Switcher --}}
                            <td style="vertical-align: middle; text-align: center;">
                                <div class="status-dropdown-wrap" id="statusWrap-{{ $lead->id }}">
                                    <select
                                        name="status"
                                        class="lead-status-select status-{{ $lead->status }}"
                                        id="statusSelect-{{ $lead->id }}"
                                        onchange="handleAjaxStatusChange({{ $lead->id }}, this.value, '{{ route('admin.leads.status', $lead) }}')"
                                        title="Click to change lead lifecycle status"
                                    >
                                        <option value="new"       {{ $lead->status === 'new' ? 'selected' : '' }}>🔴 New</option>
                                        <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>🔵 Contacted</option>
                                        <option value="closed"    {{ $lead->status === 'closed' ? 'selected' : '' }}>🟢 Closed</option>
                                    </select>
                                </div>
                            </td>

                            {{-- Quick Actions --}}
                            <td style="vertical-align: middle; text-align: right;">
                                <div class="lead-actions-row">
                                    {{-- WhatsApp Quick Action --}}
                                    @if($cleanPhone)
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}"
                                           target="_blank" rel="noopener noreferrer"
                                           class="action-btn-pill wa"
                                           title="WhatsApp {{ $lead->name }}">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <a href="tel:{{ $lead->phone }}"
                                           class="action-btn-pill call"
                                           title="Voice Call {{ $lead->name }}">
                                            <i class="fa-solid fa-phone"></i>
                                        </a>
                                    @endif

                                    {{-- View Details Modal --}}
                                    <button
                                        type="button"
                                        class="action-btn-pill view"
                                        title="View Full Lead CRM Details"
                                        onclick="openLeadDetailsModal({{ $leadJson }})"
                                    >
                                        <i class="fa-regular fa-eye"></i>
                                    </button>

                                    {{-- Notes Modal --}}
                                    <button
                                        type="button"
                                        class="action-btn-pill notes"
                                        title="Add / Edit Internal Notes"
                                        onclick="openNotesModal({{ $lead->id }}, '{{ addslashes($lead->name) }}', '{{ addslashes($lead->notes ?? '') }}', '{{ route('admin.leads.notes', $lead) }}')"
                                    >
                                        <i class="fa-solid fa-note-sticky"></i>
                                    </button>

                                    {{-- Delete Lead --}}
                                    <button
                                        type="button"
                                        class="action-btn-pill delete"
                                        title="Delete Lead Record"
                                        onclick="openDeleteModal('{{ $lead->id }}', '{{ addslashes($lead->name) }}', '{{ route('admin.leads.destroy', $lead) }}')"
                                    >
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="leads-empty-state">
                                <div class="empty-icon-circle">
                                    <i class="fa-solid fa-inbox"></i>
                                </div>
                                <h4>No Inquiries Recorded</h4>
                                <p>
                                    {{ request()->hasAny(['search', 'status', 'source']) ? 'No customer leads match your current search/filter conditions. Try resetting your filters.' : 'Wholesale inquiries submitted through the public Contact Us page will automatically populate here.' }}
                                </p>
                                @if(request()->hasAny(['search', 'status', 'source']))
                                    <a href="{{ route('admin.leads.index') }}" class="btn-syndron btn-syndron-secondary" style="margin-top: 1rem;">
                                        <i class="fa-solid fa-rotate-left"></i> <span>Reset Filters</span>
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
            <div class="leads-pagination-footer">
                <div style="font-size: 0.825rem; color: var(--muted-foreground);">
                    Showing <strong>{{ $leads->firstItem() }}</strong> to <strong>{{ $leads->lastItem() }}</strong> of <strong>{{ $leads->total() }}</strong> captured inquiries
                </div>
                <div class="pagination-controls">
                    {{ $leads->appends(request()->query())->links('admin.layouts.pagination') }}
                </div>
            </div>
        @endif
    </div>
</div>

{{-- ===== 1. COMPREHENSIVE LEAD DETAILS CRM MODAL (NEW) ===== --}}
<div class="leads-modal-backdrop" id="leadDetailsModalBackdrop" style="display: none;" onclick="closeLeadDetailsModal()">
    <div class="leads-modal-dialog details-dialog" onclick="event.stopPropagation()">
        <div class="leads-modal-header" style="border-bottom: 1px solid var(--border); padding-bottom: 1.15rem;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div id="modalCustomerAvatar" class="customer-avatar" style="width: 48px; height: 48px; font-size: 1.15rem; flex-shrink: 0;">
                    --
                </div>
                <div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <h3 class="leads-modal-title" id="modalCustomerName" style="font-size: 1.15rem; margin: 0;">Customer Name</h3>
                        <span class="lead-id-tag" id="modalLeadIdTag">#0</span>
                    </div>
                    <p class="leads-modal-subtitle" id="modalLeadMetaSubtitle" style="margin: 3px 0 0 0;">Captured inquiry details</p>
                </div>
            </div>
            <button type="button" class="leads-modal-close" onclick="closeLeadDetailsModal()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="leads-modal-body" style="padding: 1.5rem 1.65rem; max-height: calc(85vh - 140px); overflow-y: auto;">
            <!-- Customer Contact Grid -->
            <div class="modal-contact-overview-grid">
                <div class="modal-info-box">
                    <span class="info-label"><i class="fa-solid fa-phone" style="color: #EF801C;"></i> Phone Number</span>
                    <div class="info-value-row">
                        <span id="modalPhoneVal" style="font-weight: 700;">--</span>
                        <a id="modalCallLink" href="#" class="btn-mini-action" title="Call directly"><i class="fa-solid fa-phone"></i> Call</a>
                        <a id="modalWaLink" href="#" target="_blank" class="btn-mini-action wa" title="Message on WhatsApp"><i class="fa-brands fa-whatsapp"></i> Chat</a>
                    </div>
                </div>

                <div class="modal-info-box">
                    <span class="info-label"><i class="fa-solid fa-envelope" style="color: #3b82f6;"></i> Email Address</span>
                    <div class="info-value-row">
                        <span id="modalEmailVal" style="font-weight: 700; word-break: break-all;">--</span>
                        <a id="modalEmailLink" href="#" class="btn-mini-action" title="Compose email"><i class="fa-solid fa-paper-plane"></i> Email</a>
                    </div>
                </div>

                <div class="modal-info-box">
                    <span class="info-label"><i class="fa-solid fa-wheat-awn" style="color: #f59e0b;"></i> Product Requirement</span>
                    <div class="info-value-row">
                        <span id="modalProductVal" style="font-weight: 700;">General Wholesale</span>
                        <span id="modalQtyBadge" class="quantity-tag" style="display: none;">Qty: 0</span>
                    </div>
                </div>

                <div class="modal-info-box">
                    <span class="info-label"><i class="fa-solid fa-sliders" style="color: #8b5cf6;"></i> Lifecycle Status</span>
                    <div class="info-value-row">
                        <select id="modalStatusSelect" class="lead-status-select" style="padding: 4px 10px; font-size: 0.8rem; cursor: pointer;">
                            <option value="new">🔴 New Lead</option>
                            <option value="contacted">🔵 Contacted</option>
                            <option value="closed">🟢 Closed / Converted</option>
                        </select>
                        <button type="button" class="btn-syndron btn-syndron-primary btn-syndron-sm" id="modalSaveStatusBtn" onclick="saveStatusFromModal()">
                            Save Status
                        </button>
                    </div>
                </div>
            </div>

            <!-- Full Inquiry Message Box -->
            <div style="margin-top: 1.25rem;">
                <label style="font-size: 0.825rem; font-weight: 700; color: var(--foreground); margin-bottom: 0.45rem; display: flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-comment-dots" style="color: #EF801C;"></i>
                    <span>Customer Inquiry Message:</span>
                </label>
                <div class="modal-message-bubble" id="modalMessageContent">
                    --
                </div>
            </div>

            <!-- Follow-up Notes Section in Modal -->
            <div style="margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--border);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                    <label style="font-size: 0.825rem; font-weight: 700; color: var(--foreground); margin: 0; display: flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-note-sticky" style="color: #EF801C;"></i>
                        <span>Internal Admin Notes (Private):</span>
                    </label>
                    <span style="font-size: 0.725rem; color: var(--muted-foreground);">Visible only to admin team</span>
                </div>
                <textarea
                    id="modalNotesTextarea"
                    class="form-control-admin"
                    rows="3"
                    placeholder="Enter negotiation notes, client meeting outcomes, delivery dates..."
                    style="width: 100%; resize: vertical; font-size: 0.85rem; line-height: 1.5;"
                ></textarea>
                <div style="display: flex; justify-content: flex-end; margin-top: 0.65rem;">
                    <button type="button" class="btn-syndron btn-syndron-primary btn-syndron-sm" id="modalSaveNotesBtn" onclick="saveNotesFromModal()">
                        <i class="fa-solid fa-floppy-disk"></i> <span>Save Notes</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="leads-modal-footer" style="border-top: 1px solid var(--border); padding: 0.85rem 1.65rem; display: flex; justify-content: space-between; align-items: center;">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeLeadDetailsModal()">
                Close
            </button>
            <div style="display: flex; gap: 0.65rem;">
                <button type="button" class="btn-syndron btn-syndron-danger" id="modalDeleteBtn" onclick="triggerDeleteFromDetailsModal()">
                    <i class="fa-solid fa-trash-can"></i> <span>Delete Lead</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ===== 2. QUICK NOTES MODAL ===== --}}
<div class="leads-modal-backdrop" id="notesModalBackdrop" style="display: none;" onclick="closeNotesModal()">
    <div class="leads-modal-dialog" onclick="event.stopPropagation()">
        <div class="leads-modal-header">
            <div>
                <h3 class="leads-modal-title"><i class="fa-solid fa-note-sticky" style="color: #EF801C;"></i> Admin Follow-up Notes</h3>
                <p class="leads-modal-subtitle" id="notesModalSubtitle">Lead details</p>
            </div>
            <button type="button" class="leads-modal-close" onclick="closeNotesModal()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="leads-modal-body">
            <label style="font-size: 0.825rem; font-weight: 600; color: var(--foreground); margin-bottom: 0.5rem; display: block;">
                Follow-up Notes <span style="color: var(--muted-foreground); font-weight: 400;">(Private internal CRM log)</span>
            </label>
            <textarea
                id="notesTextarea"
                class="form-control-admin"
                rows="5"
                placeholder="e.g., Called client on Sep 24. They need 50 bags of Chakki Fresh Atta by Friday. Follow up tomorrow..."
                style="width: 100%; resize: vertical; font-size: 0.875rem; line-height: 1.5;"
            ></textarea>
            <div style="font-size: 0.725rem; color: var(--muted-foreground); margin-top: 0.35rem;">
                <kbd class="shortcut-key">Ctrl + Enter</kbd> to save quickly.
            </div>
        </div>
        <div class="leads-modal-footer">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeNotesModal()">Cancel</button>
            <button type="button" class="btn-syndron btn-syndron-primary" id="saveNotesBtn" onclick="saveNotes()">
                <i class="fa-solid fa-floppy-disk"></i> Save Notes
            </button>
        </div>
    </div>
</div>

{{-- ===== 3. DELETE SINGLE LEAD MODAL ===== --}}
<div class="leads-modal-backdrop" id="deleteModalBackdrop" style="display: none;" onclick="closeDeleteModal()">
    <div class="leads-modal-dialog delete-dialog" onclick="event.stopPropagation()">
        <button type="button" class="leads-modal-close" onclick="closeDeleteModal()"><i class="fa-solid fa-xmark"></i></button>

        <div style="text-align: center; margin-bottom: 1.25rem;">
            <div class="modal-danger-circle">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <h3 class="leads-modal-title">Delete Customer Lead?</h3>
            <p style="font-size: 0.875rem; color: var(--muted-foreground); margin: 0.5rem 0 0 0;">
                Are you sure you want to permanently delete the inquiry record for <strong id="deleteTargetName" style="color: var(--foreground);">this customer</strong>?
            </p>
        </div>

        <div class="leads-warning-callout">
            <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; flex-shrink: 0; font-size: 1rem;"></i>
            <span>This action cannot be undone. All recorded notes, inquiry messages, and contact details will be removed.</span>
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.35rem;">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeDeleteModal()" style="flex: 1; justify-content: center;">
                Cancel
            </button>
            <form id="deleteForm" method="POST" action="" style="flex: 1; margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-syndron btn-syndron-danger" style="width: 100%; justify-content: center;">
                    <i class="fa-solid fa-trash-can"></i> Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ===== 4. BULK DELETE MODAL ===== --}}
<div class="leads-modal-backdrop" id="bulkDeleteModalBackdrop" style="display: none;" onclick="closeBulkDeleteModal()">
    <div class="leads-modal-dialog delete-dialog" onclick="event.stopPropagation()">
        <button type="button" class="leads-modal-close" onclick="closeBulkDeleteModal()"><i class="fa-solid fa-xmark"></i></button>

        <div style="text-align: center; margin-bottom: 1.25rem;">
            <div class="modal-danger-circle">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <h3 class="leads-modal-title">Delete Selected Inquiries?</h3>
            <p style="font-size: 0.875rem; color: var(--muted-foreground); margin: 0.5rem 0 0 0;">
                You are about to delete <strong id="bulkDeleteCount" style="color: #ef4444;">0</strong> selected customer inquiries.
            </p>
        </div>

        <div class="leads-warning-callout">
            <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; flex-shrink: 0; font-size: 1rem;"></i>
            <span>This will permanently purge the selected inquiries from the database.</span>
        </div>

        <div style="display: flex; gap: 0.75rem; margin-top: 1.35rem;">
            <button type="button" class="btn-syndron btn-syndron-secondary" onclick="closeBulkDeleteModal()" style="flex: 1; justify-content: center;">
                Cancel
            </button>
            <button type="button" class="btn-syndron btn-syndron-danger" onclick="confirmExecuteBulkDelete()" style="flex: 1; justify-content: center;">
                <i class="fa-solid fa-trash-can"></i> Confirm Delete
            </button>
        </div>
    </div>
</div>

{{-- ===== TOAST NOTIFICATION ===== --}}
<div id="leadsToast" class="leads-toast-box">
    <i class="fa-solid fa-circle-check toast-icon"></i>
    <span id="toastMsg">Updated successfully!</span>
</div>

@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // =========================================================================
    // 1. AJAX STATUS UPDATES (Zero Page Reload)
    // =========================================================================
    async function handleAjaxStatusChange(leadId, newStatus, statusUrl) {
        const selectEl = document.getElementById(`statusSelect-${leadId}`);
        const originalStatus = selectEl.className.match(/status-(new|contacted|closed)/)?.[1] || 'new';

        // Apply visual change immediately
        selectEl.className = `lead-status-select status-${newStatus}`;

        try {
            const res = await fetch(statusUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ status: newStatus })
            });

            const data = await res.json();
            if (data.success) {
                // Update Row styling
                const row = document.getElementById(`lead-row-${leadId}`);
                if (row) {
                    if (newStatus === 'new') {
                        row.classList.add('row-new-highlight');
                    } else {
                        row.classList.remove('row-new-highlight');
                    }
                }
                showToast(`Lead #${leadId} status set to ${capitalize(newStatus)}`);
            } else {
                throw new Error();
            }
        } catch (e) {
            // Revert on failure
            selectEl.className = `lead-status-select status-${originalStatus}`;
            selectEl.value = originalStatus;
            showToast('Failed to update status. Please try again.', true);
        }
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    // =========================================================================
    // 2. LEAD DETAILS CRM MODAL
    // =========================================================================
    let activeModalLead = null;

    function openLeadDetailsModal(lead) {
        activeModalLead = lead;

        const nameParts = (lead.name || '').trim().split(' ');
        let initials = (nameParts[0]?.[0] || '') + (nameParts[1]?.[0] || '');
        if (initials.length < 2) initials = (lead.name || 'CU').substr(0, 2);
        initials = initials.toUpperCase();

        document.getElementById('modalCustomerAvatar').textContent = initials;
        document.getElementById('modalCustomerName').textContent = lead.name;
        document.getElementById('modalLeadIdTag').textContent = `#${lead.id}`;
        let modalSourceLabel = 'Website Direct';
        if (lead.source === 'contact_page' || lead.source === 'contact_form') {
            modalSourceLabel = 'Contact Form';
        } else if (lead.source === 'product_inquiry_popup' || lead.source === 'product_inquiry') {
            modalSourceLabel = 'Product Inquiry';
        }
        document.getElementById('modalLeadMetaSubtitle').textContent = `Received on ${lead.created_at} (${lead.relative_time}) via ${modalSourceLabel}`;

        document.getElementById('modalPhoneVal').textContent = lead.phone || 'Not provided';
        document.getElementById('modalCallLink').href = lead.phone ? `tel:${lead.phone}` : '#';
        document.getElementById('modalCallLink').style.display = lead.phone ? 'inline-flex' : 'none';

        const cleanPhone = lead.phone ? lead.phone.replace(/[^0-9]/g, '') : null;
        if (cleanPhone) {
            const waMsg = encodeURIComponent(`Hello ${lead.name}, thank you for contacting Raghuvir Atta regarding ${lead.product_interest || 'our pure stone chakki flours'}. How can we assist you?`);
            document.getElementById('modalWaLink').href = `https://wa.me/${cleanPhone}?text=${waMsg}`;
            document.getElementById('modalWaLink').style.display = 'inline-flex';
        } else {
            document.getElementById('modalWaLink').style.display = 'none';
        }

        document.getElementById('modalEmailVal').textContent = lead.email || 'Not provided';
        document.getElementById('modalEmailLink').href = lead.email ? `mailto:${lead.email}` : '#';
        document.getElementById('modalEmailLink').style.display = lead.email ? 'inline-flex' : 'none';

        document.getElementById('modalProductVal').textContent = lead.product_interest || 'General Wholesale Inquiry';
        if (lead.quantity) {
            document.getElementById('modalQtyBadge').textContent = `Qty: ${lead.quantity}`;
            document.getElementById('modalQtyBadge').style.display = 'inline-flex';
        } else {
            document.getElementById('modalQtyBadge').style.display = 'none';
        }

        const modalStatusSelect = document.getElementById('modalStatusSelect');
        modalStatusSelect.value = lead.status;
        modalStatusSelect.className = `lead-status-select status-${lead.status}`;

        document.getElementById('modalMessageContent').textContent = lead.message || 'No written message provided.';
        document.getElementById('modalNotesTextarea').value = lead.notes || '';

        document.getElementById('leadDetailsModalBackdrop').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeLeadDetailsModal() {
        document.getElementById('leadDetailsModalBackdrop').style.display = 'none';
        document.body.style.overflow = '';
        activeModalLead = null;
    }

    async function saveStatusFromModal() {
        if (!activeModalLead) return;
        const newStatus = document.getElementById('modalStatusSelect').value;
        const btn = document.getElementById('modalSaveStatusBtn');
        btn.disabled = true;
        btn.textContent = 'Saving...';

        await handleAjaxStatusChange(activeModalLead.id, newStatus, activeModalLead.status_url);
        activeModalLead.status = newStatus;
        btn.disabled = false;
        btn.textContent = 'Save Status';
    }

    async function saveNotesFromModal() {
        if (!activeModalLead) return;
        const notes = document.getElementById('modalNotesTextarea').value;
        const btn = document.getElementById('modalSaveNotesBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        try {
            const res = await fetch(activeModalLead.notes_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ notes })
            });
            const data = await res.json();
            if (data.ok) {
                activeModalLead.notes = notes;
                updateInlineNotesBadge(activeModalLead.id, activeModalLead.name, notes, activeModalLead.notes_url);
                showToast('Follow-up notes updated!');
            }
        } catch (e) {
            showToast('Error saving notes.', true);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>Save Notes</span>';
        }
    }

    function triggerDeleteFromDetailsModal() {
        if (!activeModalLead) return;
        const lead = activeModalLead;
        closeLeadDetailsModal();
        openDeleteModal(lead.id, lead.name, lead.delete_url);
    }

    // =========================================================================
    // 3. QUICK NOTES MODAL
    // =========================================================================
    let currentNotesUrl = null;
    let currentLeadId   = null;
    let currentLeadName = null;

    function openNotesModal(leadId, leadName, currentNotes, notesUrl) {
        currentLeadId   = leadId;
        currentLeadName = leadName;
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
        currentLeadId = null;
    }

    async function saveNotes() {
        const notes = document.getElementById('notesTextarea').value;
        const btn   = document.getElementById('saveNotesBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        try {
            const res = await fetch(currentNotesUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ notes }),
            });
            const data = await res.json();
            if (data.ok) {
                updateInlineNotesBadge(currentLeadId, currentLeadName, notes, currentNotesUrl);
                showToast('Notes saved successfully!');
                closeNotesModal();
            }
        } catch (e) {
            showToast('Error saving notes.', true);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save Notes';
        }
    }

    function updateInlineNotesBadge(leadId, leadName, notes, notesUrl) {
        const wrapper = document.getElementById(`leadNotesWrapper-${leadId}`);
        if (!wrapper) return;

        if (notes && notes.trim()) {
            const safeNotes = notes.replace(/"/g, '&quot;');
            const safeLeadName = leadName.replace(/'/g, "\\'");
            wrapper.innerHTML = `
                <div class="lead-note-card" onclick="openNotesModal(${leadId}, '${safeLeadName}', '${safeNotes}', '${notesUrl}')" title="Click to edit admin note">
                    <i class="fa-solid fa-note-sticky" style="color: #EF801C; font-size: 0.72rem; flex-shrink: 0;"></i>
                    <span class="note-text-snippet" id="notes-text-${leadId}">${escapeHtml(notes)}</span>
                    <i class="fa-solid fa-pen note-edit-icon"></i>
                </div>
            `;
        } else {
            const safeLeadName = leadName.replace(/'/g, "\\'");
            wrapper.innerHTML = `
                <button type="button" class="btn-add-note-inline" id="notes-placeholder-${leadId}" onclick="openNotesModal(${leadId}, '${safeLeadName}', '', '${notesUrl}')">
                    <i class="fa-regular fa-note-sticky"></i>
                    <span>+ Add Follow-up Note</span>
                </button>
            `;
        }
    }

    function escapeHtml(str) {
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    // =========================================================================
    // 4. MULTI-SELECT & BULK ACTIONS
    // =========================================================================
    function getSelectedLeadIds() {
        const checkedBoxes = document.querySelectorAll('.lead-select-checkbox:checked');
        return Array.from(checkedBoxes).map(cb => parseInt(cb.value));
    }

    function onHeaderCheckboxChange(headerCb) {
        const checkboxes = document.querySelectorAll('.lead-select-checkbox');
        checkboxes.forEach(cb => cb.checked = headerCb.checked);
        updateBulkBar();
    }

    function onLeadCheckboxChange() {
        const checkboxes = document.querySelectorAll('.lead-select-checkbox');
        const checkedBoxes = document.querySelectorAll('.lead-select-checkbox:checked');
        const headerCb = document.getElementById('headerCheckbox');

        if (headerCb) {
            headerCb.checked = checkboxes.length > 0 && checkedBoxes.length === checkboxes.length;
        }
        updateBulkBar();
    }

    function toggleSelectAll() {
        const headerCb = document.getElementById('headerCheckbox');
        if (headerCb) {
            headerCb.checked = !headerCb.checked;
            onHeaderCheckboxChange(headerCb);
        }
    }

    function updateBulkBar() {
        const selectedIds = getSelectedLeadIds();
        const bar = document.getElementById('leadsBulkBar');
        const countSpan = document.getElementById('bulkSelectedCount');
        const selectAllLabel = document.getElementById('selectAllBtnLabel');

        if (selectedIds.length > 0) {
            countSpan.textContent = selectedIds.length;
            bar.style.display = 'block';
            if (selectAllLabel) selectAllLabel.textContent = 'Deselect All';
        } else {
            bar.style.display = 'none';
            if (selectAllLabel) selectAllLabel.textContent = 'Select All';
        }
    }

    function clearBulkSelection() {
        document.querySelectorAll('.lead-select-checkbox').forEach(cb => cb.checked = false);
        const headerCb = document.getElementById('headerCheckbox');
        if (headerCb) headerCb.checked = false;
        updateBulkBar();
    }

    async function executeBulkAction(action) {
        const ids = getSelectedLeadIds();
        if (ids.length === 0) return;

        try {
            const res = await fetch("{{ route('admin.leads.bulk-action') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ action, ids })
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message);
                setTimeout(() => window.location.reload(), 600);
            }
        } catch (e) {
            showToast('Error executing bulk action.', true);
        }
    }

    function openBulkDeleteModal() {
        const ids = getSelectedLeadIds();
        if (ids.length === 0) return;
        document.getElementById('bulkDeleteCount').textContent = ids.length;
        document.getElementById('bulkDeleteModalBackdrop').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeBulkDeleteModal() {
        document.getElementById('bulkDeleteModalBackdrop').style.display = 'none';
        document.body.style.overflow = '';
    }

    function confirmExecuteBulkDelete() {
        closeBulkDeleteModal();
        executeBulkAction('delete');
    }

    // =========================================================================
    // 5. SINGLE DELETE MODAL
    // =========================================================================
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

    // =========================================================================
    // 6. TOAST NOTIFICATION
    // =========================================================================
    function showToast(msg, isError = false) {
        const toast = document.getElementById('leadsToast');
        const icon  = toast.querySelector('.toast-icon');
        document.getElementById('toastMsg').textContent = msg;

        icon.className = isError ? 'fa-solid fa-triangle-exclamation toast-icon' : 'fa-solid fa-circle-check toast-icon';
        icon.style.color = isError ? '#ef4444' : '#10b981';

        toast.style.display = 'flex';
        clearTimeout(window.leadsToastTimer);
        window.leadsToastTimer = setTimeout(() => {
            toast.style.display = 'none';
        }, 3400);
    }

    function clearSearch() {
        const input = document.getElementById('leadsSearchInput');
        input.value = '';
        document.getElementById('leadsFilterForm').submit();
    }

    // =========================================================================
    // 7. KEYBOARD SHORTCUTS
    // =========================================================================
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLeadDetailsModal();
            closeNotesModal();
            closeDeleteModal();
            closeBulkDeleteModal();
        }
        if (e.key === 'Enter' && e.ctrlKey && document.getElementById('notesModalBackdrop').style.display === 'flex') {
            saveNotes();
        }
        // '/' shortcut to focus search when not in input
        if (e.key === '/' && !['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) {
            e.preventDefault();
            document.getElementById('leadsSearchInput')?.focus();
        }
    });

    // Auto-dismiss alert after 5s
    const flashAlert = document.getElementById('flashAlert');
    if (flashAlert) setTimeout(() => flashAlert.remove(), 5000);
</script>
@endpush
