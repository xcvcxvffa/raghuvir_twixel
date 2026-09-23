@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.5rem;">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>System & Settings</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Site Settings</span>
</div>

<div class="settings-header-banner">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge">
            <i class="fa-solid fa-sliders"></i>
        </div>
        <div>
            <h1 class="page-title-main">
                <span>Site Settings</span>
                <span style="font-size: 0.725rem; font-weight: 700; color: #EF801C; background: rgba(239, 128, 28, 0.12); padding: 3px 10px; border-radius: 9999px; letter-spacing: 0.02em;">Live Sync</span>
            </h1>
            <p style="font-size: 0.85rem; color: #64748b; margin: 0;">
                Manage brand identity, company contact info, social profiles, SEO meta tags, and global website options.
            </p>
        </div>
    </div>

    <!-- Quick Save Button at Top -->
    <div>
        <button type="button" onclick="document.getElementById('settingsMainForm').submit();" class="btn-syndron btn-syndron-primary">
            <i class="fa-solid fa-floppy-disk"></i>
            <span>Save Changes</span>
        </button>
    </div>
</div>

<!-- Settings Layout: Left Vertical Nav + Right Content Area (ShadCN UI Architecture) -->
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" id="settingsMainForm">
    @csrf
    <input type="hidden" name="active_tab" id="activeTabInput" value="{{ request('tab', 'general') }}">

    <div class="settings-layout-wrapper">
        <!-- ================================================================= -->
        <!-- LEFT SIDEBAR: VERTICAL TAB NAVIGATION                             -->
        <!-- ================================================================= -->
        <aside class="settings-sidebar-nav">
            <!-- Nav Item: General -->
            <button
                type="button"
                class="settings-nav-item {{ request('tab', 'general') === 'general' ? 'active' : '' }}"
                data-tab="pane-general"
            >
                <div class="nav-item-icon">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <div>
                    <div>General & Branding</div>
                </div>
                <span class="nav-item-badge">Core</span>
            </button>

            <!-- Nav Item: Contact -->
            <button
                type="button"
                class="settings-nav-item {{ request('tab') === 'contact' ? 'active' : '' }}"
                data-tab="pane-contact"
            >
                <div class="nav-item-icon">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <div>
                    <div>Contact & Location</div>
                </div>
                <span class="nav-item-badge">Info</span>
            </button>

            <!-- Nav Item: Social -->
            <button
                type="button"
                class="settings-nav-item {{ request('tab') === 'social' ? 'active' : '' }}"
                data-tab="pane-social"
            >
                <div class="nav-item-icon">
                    <i class="fa-solid fa-share-nodes"></i>
                </div>
                <div>
                    <div>Social Networks</div>
                </div>
                <span class="nav-item-badge">Links</span>
            </button>

            <!-- Nav Item: SEO -->
            <button
                type="button"
                class="settings-nav-item {{ request('tab') === 'seo' ? 'active' : '' }}"
                data-tab="pane-seo"
            >
                <div class="nav-item-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div>
                    <div>SEO & Analytics</div>
                </div>
                <span class="nav-item-badge">Meta</span>
            </button>

            <!-- System Telemetry & Status Card -->
            <div class="settings-system-card">
                <div class="settings-system-title">
                    <i class="fa-solid fa-shield-halved" style="color: var(--accent);"></i>
                    <span>System Status</span>
                </div>
                <div class="system-status-row">
                    <span>Website Status</span>
                    <span class="system-status-badge">Live</span>
                </div>
                <div class="system-status-row">
                    <span>Settings Cache</span>
                    <span style="font-weight: 600; color: #10b981; font-size: 0.75rem;">Synced</span>
                </div>
                <div class="system-status-row">
                    <span>Database</span>
                    <span style="font-family: monospace; font-size: 0.725rem;">raghuvir_admin</span>
                </div>
                <div class="system-status-row">
                    <span>Storage Disk</span>
                    <span style="font-size: 0.75rem; color: var(--foreground); font-weight: 500;">Symlinked</span>
                </div>
            </div>
        </aside>

        <!-- ================================================================= -->
        <!-- RIGHT CONTENT: TAB PANES                                          -->
        <!-- ================================================================= -->
        <main class="settings-main-content">

            <!-- ------------------------------------------------------------- -->
            <!-- TAB 1: GENERAL & BRANDING                                     -->
            <!-- ------------------------------------------------------------- -->
            <div class="syndron-tab-pane {{ request('tab', 'general') === 'general' ? 'active' : '' }}" id="pane-general">
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <!-- Card 1: Core Brand Identity -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-building-wheat"></i>
                                    </div>
                                    <span>Brand & Company Identity</span>
                                </h3>
                                <p class="card-syndron-desc">Configure your public website name, marketing tagline, and footer notes.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <div class="grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                                <!-- Website Title -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="site_title" class="form-label-admin">Website Title <span style="color: #ef4444;">*</span></label>
                                    <input
                                        type="text"
                                        name="site_title"
                                        id="site_title"
                                        class="form-control-admin @error('site_title') is-invalid @enderror"
                                        value="{{ old('site_title', $settings['site_title']->value ?? 'Raghuvir Atta') }}"
                                        required
                                    >
                                    <div class="form-hint">Displayed in the browser header bar and search engine previews.</div>
                                </div>

                                <!-- Brand Tagline -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="site_tagline" class="form-label-admin">Brand Tagline</label>
                                    <input
                                        type="text"
                                        name="site_tagline"
                                        id="site_tagline"
                                        class="form-control-admin @error('site_tagline') is-invalid @enderror"
                                        value="{{ old('site_tagline', $settings['site_tagline']->value ?? '') }}"
                                    >
                                    <div class="form-hint">Core motto (e.g. "Farm-Fresh Direct to Your Kitchen").</div>
                                </div>
                            </div>

                            <!-- Footer About Statement -->
                            <div class="form-group-admin" style="margin-top: 1.25rem; margin-bottom: 0;">
                                <label for="footer_about" class="form-label-admin">Footer Mission & About Statement</label>
                                <textarea
                                    name="footer_about"
                                    id="footer_about"
                                    rows="3"
                                    class="form-control-admin @error('footer_about') is-invalid @enderror"
                                >{{ old('footer_about', $settings['footer_about']->value ?? '') }}</textarea>
                                <div class="form-hint">Introductory paragraph displayed beneath the logo in the website footer.</div>
                            </div>

                            <!-- Copyright Notice -->
                            <div class="form-group-admin" style="margin-top: 1.25rem; margin-bottom: 0;">
                                <label for="copyright_text" class="form-label-admin">Copyright Notice</label>
                                <input
                                    type="text"
                                    name="copyright_text"
                                    id="copyright_text"
                                    class="form-control-admin @error('copyright_text') is-invalid @enderror"
                                    value="{{ old('copyright_text', $settings['copyright_text']->value ?? '') }}"
                                >
                                <div class="form-hint">Appears at the very bottom bar of all web pages. HTML tags are supported.</div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                                <span>Saved changes immediately apply across the entire live website.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Official Logos & Favicon -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-images"></i>
                                    </div>
                                    <span>Brand Logos & Visual Assets</span>
                                </h3>
                                <p class="card-syndron-desc">Upload brand logos for light/dark displays and website favicon.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                                <!-- 1. Header Logo (Light Mode) -->
                                <div class="logo-upload-dropzone" style="min-width: 0;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                                        <span style="font-weight: 600; font-size: 0.85rem; color: var(--foreground);">Header Logo (Color / Light)</span>
                                        <span style="font-size: 0.7rem; color: var(--muted-foreground); background: var(--secondary); padding: 2px 6px; border-radius: 4px;">PNG, SVG, WEBP</span>
                                    </div>
                                    <div class="logo-preview-box">
                                        <img
                                            id="headerLogoPreview"
                                            src="{{ setting('header_logo') ? asset(setting('header_logo')) : asset('images/Raghuvir Logo.png') }}"
                                            alt="Header Logo"
                                        >
                                    </div>
                                    <label for="header_logo" class="btn-syndron btn-syndron-secondary" style="margin-top: 0.75rem; width: 100%; justify-content: center; cursor: pointer; font-size: 0.82rem;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        <span>Choose New Header Logo</span>
                                    </label>
                                    <input
                                        type="file"
                                        name="header_logo"
                                        id="header_logo"
                                        accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                        onchange="previewImage(this, 'headerLogoPreview')"
                                        style="display: none;"
                                    >
                                    @if(setting('header_logo'))
                                        <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.775rem; color: #ef4444; margin-top: 0.6rem; cursor: pointer; justify-content: center;">
                                            <input type="checkbox" name="remove_header_logo" value="1">
                                            <span>Reset to default logo</span>
                                        </label>
                                    @endif
                                </div>

                                <!-- 2. Footer Logo (Dark / Contrast Mode) -->
                                <div class="logo-upload-dropzone" style="min-width: 0;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                                        <span style="font-weight: 600; font-size: 0.85rem; color: var(--foreground);">Footer Logo (White / Dark)</span>
                                        <span style="font-size: 0.7rem; color: var(--muted-foreground); background: var(--secondary); padding: 2px 6px; border-radius: 4px;">For Dark Theme</span>
                                    </div>
                                    <div class="logo-preview-box-dark">
                                        <img
                                            id="footerLogoPreview"
                                            src="{{ setting('footer_logo') ? asset(setting('footer_logo')) : asset('images/Raghuvir Logo White.png') }}"
                                            alt="Footer Logo"
                                        >
                                    </div>
                                    <label for="footer_logo" class="btn-syndron btn-syndron-secondary" style="margin-top: 0.75rem; width: 100%; justify-content: center; cursor: pointer; font-size: 0.82rem;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        <span>Choose New Footer Logo</span>
                                    </label>
                                    <input
                                        type="file"
                                        name="footer_logo"
                                        id="footer_logo"
                                        accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                        onchange="previewImage(this, 'footerLogoPreview')"
                                        style="display: none;"
                                    >
                                    @if(setting('footer_logo'))
                                        <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.775rem; color: #ef4444; margin-top: 0.6rem; cursor: pointer; justify-content: center;">
                                            <input type="checkbox" name="remove_footer_logo" value="1">
                                            <span>Reset to default logo</span>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <!-- 3. Favicon Preview -->
                            <div class="logo-upload-dropzone" style="margin-top: 1.5rem;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                                    <span style="font-weight: 600; font-size: 0.85rem; color: var(--foreground);">Browser Tab Favicon</span>
                                    <span style="font-size: 0.7rem; color: var(--muted-foreground); background: var(--secondary); padding: 2px 6px; border-radius: 4px;">Square (1:1) PNG/ICO</span>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap;">
                                    {{-- Browser Chrome Tab Mockup --}}
                                    <div style="background: #e2e8f0; border: 1px solid var(--border); border-radius: 10px; padding: 6px 12px 0 12px; display: inline-flex; align-items: flex-end;">
                                        <div style="background: #ffffff; border-radius: 8px 8px 0 0; padding: 7px 14px; display: inline-flex; align-items: center; gap: 8px; font-size: 0.78rem; font-weight: 600; color: #1e293b; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #cbd5e1; border-bottom: none;">
                                            <img
                                                id="faviconPreview"
                                                src="{{ setting('site_favicon') ? asset(setting('site_favicon')) : (file_exists(public_path('images/favicon.png')) ? asset('images/favicon.png') : asset('images/Raghuvir Favicon.png')) }}"
                                                alt="Favicon"
                                                style="width: 18px; height: 18px; object-fit: contain; border-radius: 2px;"
                                                onerror="this.src='{{ asset('images/favicon.png') }}'"
                                            >
                                            <span style="max-width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #334155;">Raghuvir Atta | Home</span>
                                            <i class="fa-solid fa-xmark" style="font-size: 0.65rem; color: #94a3b8; margin-left: 6px;"></i>
                                        </div>
                                    </div>

                                    <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap; flex: 1; min-width: 240px; justify-content: flex-end;">
                                        <label for="site_favicon" class="btn-syndron btn-syndron-secondary" style="cursor: pointer; font-size: 0.82rem; padding: 0.55rem 1rem;">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                            <span>Choose New Favicon</span>
                                        </label>
                                        <input
                                            type="file"
                                            name="site_favicon"
                                            id="site_favicon"
                                            accept="image/png,image/x-icon,image/vnd.microsoft.icon,image/webp"
                                            onchange="previewImage(this, 'faviconPreview')"
                                            style="display: none;"
                                        >
                                        @if(setting('site_favicon'))
                                            <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.775rem; color: #ef4444; cursor: pointer;">
                                                <input type="checkbox" name="remove_site_favicon" value="1">
                                                <span>Reset favicon</span>
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-solid fa-info-circle"></i>
                                <span>High-resolution transparent PNG or SVG images give the best clarity.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------------------------- -->
            <!-- TAB 2: CONTACT & LOCATION                                     -->
            <!-- ------------------------------------------------------------- -->
            <div class="syndron-tab-pane {{ request('tab') === 'contact' ? 'active' : '' }}" id="pane-contact">
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <!-- Card 1: Communication Channels -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-headset"></i>
                                    </div>
                                    <span>Communication & Help Desk</span>
                                </h3>
                                <p class="card-syndron-desc">Direct customer contact numbers and support email addresses.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <div class="grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                                <!-- Customer Care Phone -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="contact_phone" class="form-label-admin">Customer Care Phone</label>
                                    <div class="input-with-icon">
                                        <input
                                            type="text"
                                            name="contact_phone"
                                            id="contact_phone"
                                            class="form-control-admin"
                                            value="{{ old('contact_phone', $settings['contact_phone']->value ?? '') }}"
                                            placeholder="+91 97254 27727"
                                        >
                                        <i class="fa-solid fa-phone input-icon"></i>
                                    </div>
                                    <div class="form-hint">Displayed in header, footer, and contact page.</div>
                                </div>

                                <!-- Support Email -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="contact_email" class="form-label-admin">Customer Care Email</label>
                                    <div class="input-with-icon">
                                        <input
                                            type="email"
                                            name="contact_email"
                                            id="contact_email"
                                            class="form-control-admin"
                                            value="{{ old('contact_email', $settings['contact_email']->value ?? '') }}"
                                            placeholder="info@raghuviratta.com"
                                        >
                                        <i class="fa-regular fa-envelope input-icon"></i>
                                    </div>
                                    <div class="form-hint">Official inquiry email address.</div>
                                </div>

                                <!-- WhatsApp Number -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="whatsapp_number" class="form-label-admin">WhatsApp Number</label>
                                    <div class="input-with-icon">
                                        <input
                                            type="text"
                                            name="whatsapp_number"
                                            id="whatsapp_number"
                                            class="form-control-admin"
                                            value="{{ old('whatsapp_number', $settings['whatsapp_number']->value ?? '') }}"
                                            placeholder="+919725427727"
                                        >
                                        <i class="fa-brands fa-whatsapp input-icon" style="color: #25D366;"></i>
                                    </div>
                                    <div class="form-hint">Format with country code (e.g. +919725427727).</div>
                                </div>

                                <!-- Operating Hours -->
                                <div class="form-group-admin" style="margin-bottom: 0;">
                                    <label for="working_hours" class="form-label-admin">Business / Mill Hours</label>
                                    <div class="input-with-icon">
                                        <input
                                            type="text"
                                            name="working_hours"
                                            id="working_hours"
                                            class="form-control-admin"
                                            value="{{ old('working_hours', $settings['working_hours']->value ?? '') }}"
                                            placeholder="Mon - Sat: 9:00 AM - 7:00 PM"
                                        >
                                        <i class="fa-regular fa-clock input-icon"></i>
                                    </div>
                                    <div class="form-hint">Public working schedule shown on the Contact page.</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-solid fa-phone-volume"></i>
                                <span>Visitors can tap phone numbers on mobile devices to call directly.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Factory & Facility Address -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <span>Factory & Office Location</span>
                                </h3>
                                <p class="card-syndron-desc">Full physical address and interactive Google Maps embed configuration.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <!-- Full Address -->
                            <div class="form-group-admin">
                                <label for="company_address" class="form-label-admin">Manufacturing Facility & Office Address</label>
                                <textarea
                                    name="company_address"
                                    id="company_address"
                                    rows="3"
                                    class="form-control-admin"
                                    placeholder="Plot No 182, Vibrant Prime Industrial Park, kadadara, GIDC Area, Dehgam, Gandhinagar, Gujarat, 382305"
                                >{{ old('company_address', $settings['company_address']->value ?? '') }}</textarea>
                                <div class="form-hint">Industrial zone, plot number, town, district, state, and postal code.</div>
                            </div>

                            <!-- Google Maps Embed URL -->
                            <div class="form-group-admin">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px; flex-wrap: wrap; gap: 8px;">
                                    <label for="google_map_embed" class="form-label-admin" style="margin-bottom: 0;">Google Maps Embed URL / Share Link</label>
                                    <span id="mapStatusBadge" class="badge" style="background: rgba(16,185,129,0.12); color: #059669; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 9999px;">
                                        <i class="fa-solid fa-wand-magic-sparkles"></i> Auto-Converts Share Links &amp; Embed Codes
                                    </span>
                                </div>
                                <textarea
                                    name="google_map_embed"
                                    id="google_map_embed"
                                    rows="3"
                                    class="form-control-admin"
                                    placeholder="Paste any Google Maps link, maps.app.goo.gl shortlink, coordinates, or <iframe> code..."
                                >{{ old('google_map_embed', $settings['google_map_embed']->value ?? '') }}</textarea>
                                <div class="form-hint" style="margin-top: 6px;">
                                    Accepts <code>maps.app.goo.gl</code> mobile share links, full place URLs, coordinates, or <code>&lt;iframe&gt;</code> embed codes. The system automatically converts them to an interactive embed.
                                </div>
                            </div>

                            <!-- Interactive Map Preview -->
                            <div id="mapPreviewSection" style="margin-top: 1rem;">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                                    <span style="font-size: 12px; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-map-location-dot" style="color: var(--primary);"></i>
                                        <span>Interactive Map Preview</span>
                                    </span>
                                    <button type="button" id="refreshMapPreviewBtn" class="btn-syndron btn-syndron-secondary" style="padding: 4px 10px; font-size: 11px; height: auto;">
                                        <i class="fa-solid fa-rotate"></i> Refresh Preview
                                    </button>
                                </div>
                                <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border); height: 240px; box-shadow: var(--shadow-xs); background: #f1f5f9; position: relative;">
                                    <iframe
                                        id="adminMapIframe"
                                        src="{{ google_map_embed_url($settings['google_map_embed']->value ?? '') }}"
                                        style="border: 0; width: 100%; height: 100%;"
                                        allowfullscreen=""
                                        loading="lazy"
                                    ></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-solid fa-map-location-dot"></i>
                                <span>The map renders smoothly on both desktop and mobile viewports.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------------------------- -->
            <!-- TAB 3: SOCIAL MEDIA LINKS                                     -->
            <!-- ------------------------------------------------------------- -->
            <div class="syndron-tab-pane {{ request('tab') === 'social' ? 'active' : '' }}" id="pane-social">
                <div class="card-syndron" style="margin-bottom: 0;">
                    <div class="card-syndron-header">
                        <div>
                            <h3 class="card-syndron-title">
                                <div class="card-icon-pill">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </div>
                                <span>Official Social Network Profiles</span>
                            </h3>
                            <p class="card-syndron-desc">Configure the public social icons displayed in the website header and footer.</p>
                        </div>
                    </div>

                    <div class="card-syndron-body">
                        <div class="grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                            <!-- WhatsApp Direct Link -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="whatsapp_url" class="form-label-admin">WhatsApp Direct Link</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="whatsapp_url"
                                        id="whatsapp_url"
                                        class="form-control-admin"
                                        value="{{ old('whatsapp_url', $settings['whatsapp_url']->value ?? '') }}"
                                        placeholder="https://wa.me/919725427727"
                                    >
                                    <i class="fa-brands fa-whatsapp input-icon" style="color: #25D366;"></i>
                                </div>
                                <div class="form-hint">Instant click-to-chat link with customer support.</div>
                            </div>

                            <!-- Instagram Profile -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="instagram_url" class="form-label-admin">Instagram Profile</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="instagram_url"
                                        id="instagram_url"
                                        class="form-control-admin"
                                        value="{{ old('instagram_url', $settings['instagram_url']->value ?? '') }}"
                                        placeholder="https://instagram.com/raghuvir_atta"
                                    >
                                    <i class="fa-brands fa-instagram input-icon" style="color: #E1306C;"></i>
                                </div>
                                <div class="form-hint">Official Instagram page handle link.</div>
                            </div>

                            <!-- Facebook Page -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="facebook_url" class="form-label-admin">Facebook Page</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="facebook_url"
                                        id="facebook_url"
                                        class="form-control-admin"
                                        value="{{ old('facebook_url', $settings['facebook_url']->value ?? '') }}"
                                        placeholder="https://facebook.com/raghuviratta"
                                    >
                                    <i class="fa-brands fa-facebook-f input-icon" style="color: #1877F2;"></i>
                                </div>
                                <div class="form-hint">Official Facebook business page URL.</div>
                            </div>

                            <!-- LinkedIn Company -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="linkedin_url" class="form-label-admin">LinkedIn Company Page</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="linkedin_url"
                                        id="linkedin_url"
                                        class="form-control-admin"
                                        value="{{ old('linkedin_url', $settings['linkedin_url']->value ?? '') }}"
                                        placeholder="https://linkedin.com/company/raghuvir-atta"
                                    >
                                    <i class="fa-brands fa-linkedin-in input-icon" style="color: #0A66C2;"></i>
                                </div>
                                <div class="form-hint">Official company LinkedIn page.</div>
                            </div>

                            <!-- YouTube Channel -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="youtube_url" class="form-label-admin">YouTube Channel</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="youtube_url"
                                        id="youtube_url"
                                        class="form-control-admin"
                                        value="{{ old('youtube_url', $settings['youtube_url']->value ?? '') }}"
                                        placeholder="https://youtube.com/@raghuviratta"
                                    >
                                    <i class="fa-brands fa-youtube input-icon" style="color: #FF0000;"></i>
                                </div>
                                <div class="form-hint">Product recipes and processing showcase channel.</div>
                            </div>

                            <!-- X / Twitter -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="twitter_url" class="form-label-admin">X / Twitter Handle</label>
                                <div class="input-with-icon">
                                    <input
                                        type="url"
                                        name="twitter_url"
                                        id="twitter_url"
                                        class="form-control-admin"
                                        value="{{ old('twitter_url', $settings['twitter_url']->value ?? '') }}"
                                        placeholder="https://x.com/raghuviratta"
                                    >
                                    <i class="fa-brands fa-x-twitter input-icon"></i>
                                </div>
                                <div class="form-hint">Official brand channel on X.</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-syndron-footer">
                        <div class="card-footer-tip">
                            <i class="fa-solid fa-link"></i>
                            <span>Social channels open in new browser tabs when clicked by visitors.</span>
                        </div>
                        <button type="submit" class="btn-syndron btn-syndron-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------------------------- -->
            <!-- TAB 4: SEO & TRACKING                                         -->
            <!-- ------------------------------------------------------------- -->
            <div class="syndron-tab-pane {{ request('tab') === 'seo' ? 'active' : '' }}" id="pane-seo">
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <!-- Card 1: Search Engine Optimization -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                                    </div>
                                    <span>Search Engine Optimization (SEO)</span>
                                </h3>
                                <p class="card-syndron-desc">Configure default meta titles and description snippets indexed by Google.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <!-- Meta Title -->
                            <div class="form-group-admin">
                                <label for="meta_title" class="form-label-admin">Default Meta Title</label>
                                <input
                                    type="text"
                                    name="meta_title"
                                    id="meta_title"
                                    class="form-control-admin"
                                    value="{{ old('meta_title', $settings['meta_title']->value ?? '') }}"
                                    placeholder="Raghuvir Atta | Premium Stone-Ground Whole Wheat & Bati Flour"
                                >
                                <div class="form-hint">Recommended length: 50–60 characters.</div>
                            </div>

                            <!-- Meta Description -->
                            <div class="form-group-admin">
                                <label for="meta_description" class="form-label-admin">Default Meta Description</label>
                                <textarea
                                    name="meta_description"
                                    id="meta_description"
                                    rows="3"
                                    class="form-control-admin"
                                    placeholder="Experience pure, traditional stone-ground chakki fresh atta from Raghuvir. 100% natural, unadulterated wheat flours direct from certified farms."
                                >{{ old('meta_description', $settings['meta_description']->value ?? '') }}</textarea>
                                <div class="form-hint">Summary displayed on Google search results (150–160 characters).</div>
                            </div>

                            <!-- Meta Keywords -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="meta_keywords" class="form-label-admin">Meta Keywords (Comma separated)</label>
                                <textarea
                                    name="meta_keywords"
                                    id="meta_keywords"
                                    rows="2"
                                    class="form-control-admin"
                                    placeholder="raghuvir atta, whole wheat flour, bati atta, chakki fresh flour, organic atta gujarat"
                                >{{ old('meta_keywords', $settings['meta_keywords']->value ?? '') }}</textarea>
                                <div class="form-hint">Comma-separated keywords for search indexing.</div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-brands fa-google" style="color: #4285F4;"></i>
                                <span>Proper meta descriptions improve click-through rates on search engines.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Custom Header / Analytics Scripts -->
                    <div class="card-syndron" style="margin-bottom: 0;">
                        <div class="card-syndron-header">
                            <div>
                                <h3 class="card-syndron-title">
                                    <div class="card-icon-pill">
                                        <i class="fa-solid fa-code"></i>
                                    </div>
                                    <span>Header & Analytics Tracking Scripts</span>
                                </h3>
                                <p class="card-syndron-desc">Inject Google Analytics (GA4), Tag Manager, or Meta Pixel code directly into the &lt;head&gt; section.</p>
                            </div>
                        </div>

                        <div class="card-syndron-body">
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="custom_header_scripts" class="form-label-admin">Custom &lt;head&gt; Scripts</label>
                                <textarea
                                    name="custom_header_scripts"
                                    id="custom_header_scripts"
                                    rows="8"
                                    class="form-control-admin"
                                    style="font-family: 'JetBrains Mono', 'Fira Code', monospace; font-size: 0.8rem;"
                                    placeholder="<!-- Google Analytics tag (gtag.js) -->&#10;<script async src='https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXX'></script>&#10;<script>&#10;  window.dataLayer = window.dataLayer || [];&#10;  function gtag(){dataLayer.push(arguments);}&#10;  gtag('js', new Date());&#10;  gtag('config', 'G-XXXXXXXX');&#10;</script>"
                                >{{ old('custom_header_scripts', $settings['custom_header_scripts']->value ?? '') }}</textarea>
                                <div class="form-hint">Script tags entered here will be rendered safely in the public website header.</div>
                            </div>
                        </div>

                        <div class="card-syndron-footer">
                            <div class="card-footer-tip">
                                <i class="fa-solid fa-shield"></i>
                                <span>Only paste verified tracking code from trusted analytics providers.</span>
                            </div>
                            <button type="submit" class="btn-syndron btn-syndron-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </main>
    </div>
</form>

@push('scripts')
<script>
    // Tab Switching Logic with Vertical Sidebar Navigation
    document.addEventListener('DOMContentLoaded', function () {
        const navItems = document.querySelectorAll('.settings-nav-item');
        const tabPanes = document.querySelectorAll('.syndron-tab-pane');
        const activeTabInput = document.getElementById('activeTabInput');

        navItems.forEach(item => {
            item.addEventListener('click', function () {
                const targetPaneId = this.getAttribute('data-tab');
                const tabKey = targetPaneId.replace('pane-', '');

                // Toggle active state on nav items
                navItems.forEach(n => n.classList.remove('active'));
                this.classList.add('active');

                // Toggle active state on tab panes
                tabPanes.forEach(pane => {
                    pane.classList.toggle('active', pane.id === targetPaneId);
                });

                // Update hidden input for form submission
                if (activeTabInput) {
                    activeTabInput.value = tabKey;
                }

                // Update URL parameter without reload
                const url = new URL(window.location);
                url.searchParams.set('tab', tabKey);
                window.history.replaceState({}, '', url);
            });
        });
    });

    // Real-time Image Preview
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const targetImg = document.getElementById(previewId);
                if (targetImg) {
                    targetImg.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Smart Google Maps Live Embed Resolver
    document.addEventListener('DOMContentLoaded', function () {
        const mapInput = document.getElementById('google_map_embed');
        const mapIframe = document.getElementById('adminMapIframe');
        const mapBadge = document.getElementById('mapStatusBadge');
        const refreshBtn = document.getElementById('refreshMapPreviewBtn');
        let resolveTimeout = null;

        if (!mapInput || !mapIframe) return;

        function updateMapPreview(val) {
            val = (val || '').trim();

            if (!val) {
                mapIframe.src = "https://maps.google.com/maps?q=Plot%20No%20182,%20Vibrant%20Prime%20Industrial%20Park,%20kadadara,%20GIDC%20Area,%20Dehgam,%20Gandhinagar,%20Gujarat,%20382305&t=&z=14&ie=UTF8&iwloc=&output=embed";
                if (mapBadge) {
                    mapBadge.style.background = 'rgba(100, 116, 139, 0.12)';
                    mapBadge.style.color = '#475569';
                    mapBadge.innerHTML = '<i class="fa-solid fa-circle-info"></i> Default Location Active';
                }
                return;
            }

            // 1. If user pasted raw iframe code, extract src immediately
            const iframeMatch = val.match(/<iframe[^>]+src=["']([^"']+)["']/i);
            if (iframeMatch) {
                val = iframeMatch[1];
                mapInput.value = val;
            }

            // 2. If it's already an embed URL
            if (val.includes('/maps/embed') || (val.includes('maps.google.com') && val.includes('output=embed'))) {
                mapIframe.src = val;
                if (mapBadge) {
                    mapBadge.style.background = 'rgba(16, 185, 129, 0.12)';
                    mapBadge.style.color = '#059669';
                    mapBadge.innerHTML = '<i class="fa-solid fa-circle-check"></i> Embed URL Active';
                }
                return;
            }

            // 3. For shortlinks (maps.app.goo.gl) or full place URLs, resolve via server
            if (mapBadge) {
                mapBadge.style.background = 'rgba(245, 158, 11, 0.12)';
                mapBadge.style.color = '#d97706';
                mapBadge.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Converting to Embed...';
            }

            fetch("{{ route('admin.settings.resolve-map') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ url: val })
            })
            .then(res => res.json())
            .then(data => {
                if (data && data.embed_url) {
                    mapIframe.src = data.embed_url;
                    if (mapBadge) {
                        mapBadge.style.background = 'rgba(16, 185, 129, 0.12)';
                        mapBadge.style.color = '#059669';
                        mapBadge.innerHTML = '<i class="fa-solid fa-circle-check"></i> Location Verified & Converted';
                    }
                }
            })
            .catch(err => {
                console.warn('Map resolution error:', err);
                if (mapBadge) {
                    mapBadge.style.background = 'rgba(239, 68, 68, 0.12)';
                    mapBadge.style.color = '#dc2626';
                    mapBadge.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Using Direct Fallback';
                }
            });
        }

        mapInput.addEventListener('input', function () {
            clearTimeout(resolveTimeout);
            resolveTimeout = setTimeout(() => {
                updateMapPreview(mapInput.value);
            }, 500);
        });

        mapInput.addEventListener('paste', function () {
            setTimeout(() => {
                updateMapPreview(mapInput.value);
            }, 100);
        });

        if (refreshBtn) {
            refreshBtn.addEventListener('click', function () {
                updateMapPreview(mapInput.value);
            });
        }
    });
</script>
@endpush
@endsection
