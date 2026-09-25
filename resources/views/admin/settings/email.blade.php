@extends('admin.layouts.app')

@section('title', 'Email & SMTP Configuration')

@section('content')
<style>
/* ==========================================================================
   SYNDRON UI - EMAIL & SMTP CONFIGURATION SUITE
   Professional, native, responsive and seamless with Dark / Light themes
   ========================================================================== */

.email-suite-wrapper {
    max-width: 1440px;
    margin: 0 auto;
    padding-bottom: 2.5rem;
}

/* 2-Column Responsive Master Grid */
.email-grid-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 380px;
    gap: 1.5rem;
    align-items: start;
}

@media (max-width: 1100px) {
    .email-grid-layout {
        grid-template-columns: 1fr;
    }
}

/* 1-Click Mail Provider Presets */
.presets-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}

@media (max-width: 900px) {
    .presets-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 540px) {
    .presets-grid {
        grid-template-columns: 1fr;
    }
}

.provider-card {
    background: var(--card);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-lg, 14px);
    padding: 1rem 1.15rem;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    user-select: none;
    display: flex;
    flex-direction: column;
    gap: 0.65rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
}

.provider-card:hover {
    border-color: var(--accent);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px -4px rgba(239, 128, 28, 0.12);
}

.provider-card.active {
    border-color: var(--accent);
    background: var(--card);
    box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.16), 0 8px 24px -4px rgba(239, 128, 28, 0.18);
}

.provider-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.provider-icon-badge {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    background: var(--secondary);
    border: 1px solid var(--border);
}

.provider-radio-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid var(--border);
    background: var(--card);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.6rem;
    color: transparent;
    transition: all 0.15s ease;
}

.provider-card.active .provider-radio-dot {
    border-color: var(--accent);
    background: var(--accent);
    color: #ffffff;
}

.provider-card-body h4 {
    margin: 0;
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--foreground);
}

.provider-card-body span {
    font-size: 0.75rem;
    color: var(--muted-foreground);
    display: block;
    margin-top: 2px;
}

.provider-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.725rem;
    color: var(--foreground);
    background: var(--secondary);
    border: 1px solid var(--border);
    padding: 3px 8px;
    border-radius: 6px;
    font-family: monospace;
    font-weight: 600;
}

/* Automation Rows */
.automation-item-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.15rem 1.35rem;
    background: var(--secondary);
    border: 1px solid var(--border);
    border-radius: var(--radius-md, 12px);
    transition: all 0.2s ease;
    gap: 1rem;
}

.automation-item-row:hover {
    border-color: var(--accent);
    background: var(--card);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
}

.automation-info-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.automation-badge-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
}

.automation-texts h4 {
    margin: 0;
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--foreground);
}

.automation-texts p {
    margin: 3px 0 0 0;
    font-size: 0.8rem;
    color: var(--muted-foreground);
    line-height: 1.4;
}

/* Apple/Shadcn Style Switch */
.syndron-switch {
    position: relative;
    display: inline-block;
    width: 46px;
    height: 26px;
    flex-shrink: 0;
}

.syndron-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.syndron-switch-slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: var(--border);
    transition: .22s cubic-bezier(0.16, 1, 0.3, 1);
    border-radius: 34px;
}

.syndron-switch-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .22s cubic-bezier(0.16, 1, 0.3, 1);
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.18);
}

.syndron-switch input:checked + .syndron-switch-slider {
    background-color: var(--accent);
}

.syndron-switch input:checked + .syndron-switch-slider:before {
    transform: translateX(20px);
}

/* Tag Chips */
.recipient-tags-box {
    display: flex;
    flex-wrap: wrap;
    gap: 0.45rem;
    margin-top: 0.65rem;
}

.recipient-chip {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.75rem;
    background: var(--secondary);
    border: 1px solid var(--border);
    color: var(--foreground);
    padding: 3px 10px;
    border-radius: 6px;
    font-weight: 600;
}

.recipient-chip i {
    color: var(--accent);
    font-size: 0.7rem;
}

/* Diagnostic Sandbox Terminal */
.diagnostic-terminal-card {
    position: sticky;
    top: 90px;
}

.terminal-display-screen {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: var(--radius-md, 10px);
    padding: 0.85rem 1rem;
    margin-top: 1rem;
    font-family: 'Courier New', Courier, monospace;
    font-size: 0.76rem;
    color: #94a3b8;
    line-height: 1.6;
    max-height: 170px;
    overflow-y: auto;
}

.terminal-feed-line {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    word-break: break-all;
}

.terminal-prompt {
    color: #EF801C;
    font-weight: 700;
    user-select: none;
}

/* App Password & Template Preview Modals */
.email-modal-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(15, 23, 42, 0.65);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    z-index: 99999;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.email-modal-box {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg, 16px);
    max-width: 660px;
    width: 100%;
    max-height: 88vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
}

.email-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border);
}

.email-modal-body {
    padding: 1.5rem;
    overflow-y: auto;
}
</style>

<div class="email-suite-wrapper">
    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
        <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span>System &amp; Settings</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span class="current">Email &amp; SMTP Configuration</span>
    </div>

    <!-- Header Banner -->
    <div class="settings-header-banner" style="margin-bottom: 1.5rem;">
        <div class="settings-header-title-box">
            <div class="settings-header-icon-badge">
                <i class="fa-solid fa-envelope-circle-check"></i>
            </div>
            <div>
                <h1 class="page-title-main" style="margin-bottom: 0.25rem;">
                    <span>Email &amp; SMTP Configuration</span>
                    @if($isConfigured)
                        <span class="profile-verified-badge" style="font-size: 0.725rem; vertical-align: middle; background: rgba(16, 185, 129, 0.12); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.25);">
                            <i class="fa-solid fa-circle-check"></i> Connected &amp; Operational
                        </span>
                    @else
                        <span class="profile-verified-badge" style="font-size: 0.725rem; vertical-align: middle; background: rgba(245, 158, 11, 0.12); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.25);">
                            <i class="fa-solid fa-clock"></i> Setup Required
                        </span>
                    @endif
                </h1>
                <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                    Manage your outgoing mail server credentials, staff lead alert distribution list, and automated client responses.
                </p>
            </div>
        </div>

        <!-- Quick Save Button -->
        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <button type="button" onclick="document.getElementById('emailSettingsForm').submit();" class="btn-syndron btn-syndron-primary">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save Configuration</span>
            </button>
        </div>
    </div>

    <!-- 1-Click Fast SMTP Setup (Presets Matrix) -->
    <div class="card-syndron" style="margin-bottom: 1.5rem;">
        <div class="card-syndron-header" style="padding: 1rem 1.35rem;">
            <div class="card-syndron-title-box">
                <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                    <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.12); color: var(--accent);">
                        <i class="fa-solid fa-bolt-lightning"></i>
                    </div>
                    <span>1-Click Provider Quick-Fill</span>
                </h3>
                <p class="card-syndron-desc" style="font-size: 0.8rem; margin-top: 2px;">
                    Select your email provider to automatically configure host, port, and security protocol:
                </p>
            </div>
            <span style="font-size: 0.725rem; font-weight: 700; color: var(--accent); background: rgba(239, 128, 28, 0.1); padding: 3px 9px; border-radius: 6px;">
                Instant Sync
            </span>
        </div>

        <div class="card-syndron-body" style="padding: 1.25rem 1.35rem;">
            <div class="presets-grid" style="margin-bottom: 0;">
                <!-- Gmail -->
                <div class="provider-card" id="presetCard-gmail" onclick="triggerProviderPreset('gmail')">
                    <div class="provider-card-top">
                        <div class="provider-icon-badge">
                            <i class="fa-brands fa-google" style="color: #ea4335;"></i>
                        </div>
                        <div class="provider-radio-dot"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="provider-card-body">
                        <h4>Gmail / Workspace</h4>
                        <span>Google Cloud Mail</span>
                    </div>
                    <div>
                        <span class="provider-pill"><i class="fa-solid fa-shield"></i> 587 &bull; TLS</span>
                    </div>
                </div>

                <!-- Hostinger -->
                <div class="provider-card" id="presetCard-hostinger" onclick="triggerProviderPreset('hostinger')">
                    <div class="provider-card-top">
                        <div class="provider-icon-badge">
                            <i class="fa-solid fa-server" style="color: #6366f1;"></i>
                        </div>
                        <div class="provider-radio-dot"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="provider-card-body">
                        <h4>Hostinger / Titan</h4>
                        <span>Business Mail Server</span>
                    </div>
                    <div>
                        <span class="provider-pill"><i class="fa-solid fa-lock"></i> 465 &bull; SSL</span>
                    </div>
                </div>

                <!-- cPanel -->
                <div class="provider-card" id="presetCard-cpanel" onclick="triggerProviderPreset('cpanel')">
                    <div class="provider-card-top">
                        <div class="provider-icon-badge">
                            <i class="fa-solid fa-globe" style="color: #ff6c2c;"></i>
                        </div>
                        <div class="provider-radio-dot"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="provider-card-body">
                        <h4>cPanel Webmail</h4>
                        <span>Domain Mail Relay</span>
                    </div>
                    <div>
                        <span class="provider-pill"><i class="fa-solid fa-lock"></i> 465 &bull; SSL</span>
                    </div>
                </div>

                <!-- Outlook -->
                <div class="provider-card" id="presetCard-outlook" onclick="triggerProviderPreset('outlook')">
                    <div class="provider-card-top">
                        <div class="provider-icon-badge">
                            <i class="fa-brands fa-microsoft" style="color: #0078d4;"></i>
                        </div>
                        <div class="provider-radio-dot"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <div class="provider-card-body">
                        <h4>Microsoft 365</h4>
                        <span>Exchange Cloud Mail</span>
                    </div>
                    <div>
                        <span class="provider-pill"><i class="fa-solid fa-shield"></i> 587 &bull; TLS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2-Column Master Layout: Left Settings Form + Right Diagnostic Sidebar -->
    <div class="email-grid-layout">
        
        <!-- ================================================================= -->
        <!-- LEFT COLUMN: MAIN CONFIGURATION FORM                              -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <form action="{{ route('admin.settings.email.update') }}" method="POST" id="emailSettingsForm">
                @csrf
                <input type="hidden" name="mail_mailer" value="smtp">

                <!-- CARD 1: SMTP Credentials & Server Routing -->
                <div class="card-syndron" style="margin-bottom: 1.5rem;">
                    <div class="card-syndron-header">
                        <div class="card-syndron-title-box">
                            <h3 class="card-syndron-title">
                                <div class="card-icon-pill" style="background: rgba(59, 130, 246, 0.12); color: #2563eb;">
                                    <i class="fa-solid fa-server"></i>
                                </div>
                                <span>SMTP Server Credentials</span>
                            </h3>
                            <p class="card-syndron-desc">
                                Outgoing Mail Transfer Agent (MTA) server coordinates, port routing, and authentication credentials.
                            </p>
                        </div>
                        <span style="font-size: 0.725rem; font-weight: 700; color: #2563eb; background: rgba(59, 130, 246, 0.08); padding: 3px 9px; border-radius: 6px;">
                            SMTP Driver
                        </span>
                    </div>

                    <div class="card-syndron-body">
                        <!-- Host & Port Row -->
                        <div class="grid-2-col" style="margin-bottom: 1.25rem;">
                            <!-- Host -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_host" class="form-label-admin">
                                    <span>SMTP Server Host <span style="color: var(--destructive);">*</span></span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="text"
                                        name="mail_host"
                                        id="mail_host"
                                        class="form-control-admin"
                                        placeholder="e.g. smtp.gmail.com"
                                        value="{{ old('mail_host', $settings['mail_host']->value ?? '') }}"
                                        required
                                    >
                                    <i class="fa-solid fa-network-wired input-icon"></i>
                                </div>
                                <div class="form-hint" style="margin-top: 0.35rem; font-size: 0.75rem; color: var(--muted-foreground);">
                                    Direct outgoing server hostname provided by your email host.
                                </div>
                            </div>

                            <!-- Port -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_port" class="form-label-admin">
                                    <span>SMTP Port <span style="color: var(--destructive);">*</span></span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="number"
                                        name="mail_port"
                                        id="mail_port"
                                        class="form-control-admin"
                                        placeholder="587"
                                        value="{{ old('mail_port', $settings['mail_port']->value ?? '587') }}"
                                        required
                                    >
                                    <i class="fa-solid fa-hashtag input-icon"></i>
                                </div>
                                <div class="form-hint" style="margin-top: 0.35rem; font-size: 0.75rem; color: var(--muted-foreground);">
                                    Standard ports: <strong>587</strong> (TLS) or <strong>465</strong> (SSL).
                                </div>
                            </div>
                        </div>

                        <!-- Protocol & Username Row -->
                        <div class="grid-2-col" style="margin-bottom: 1.25rem;">
                            <!-- Encryption Protocol -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_encryption" class="form-label-admin">
                                    <span>Security Protocol (Encryption)</span>
                                </label>
                                <div class="input-with-icon">
                                    <select name="mail_encryption" id="mail_encryption" class="form-control-admin" style="cursor: pointer;">
                                        @php $enc = old('mail_encryption', $settings['mail_encryption']->value ?? 'tls'); @endphp
                                        <option value="tls" {{ $enc === 'tls' ? 'selected' : '' }}>TLS (STARTTLS - Port 587)</option>
                                        <option value="ssl" {{ $enc === 'ssl' ? 'selected' : '' }}>SSL (SMTPS - Port 465)</option>
                                        <option value="none" {{ $enc === 'none' ? 'selected' : '' }}>None (Unencrypted)</option>
                                    </select>
                                    <i class="fa-solid fa-shield-halved input-icon"></i>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_username" class="form-label-admin">
                                    <span>SMTP Username / Login Email <span style="color: var(--destructive);">*</span></span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="text"
                                        name="mail_username"
                                        id="mail_username"
                                        class="form-control-admin"
                                        placeholder="sales@raghuvirimpex.com"
                                        value="{{ old('mail_username', $settings['mail_username']->value ?? '') }}"
                                        required
                                    >
                                    <i class="fa-solid fa-user input-icon"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Row -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                                <label for="mail_password" class="form-label-admin" style="margin-bottom: 0;">
                                    <span>SMTP Password / App Password</span>
                                </label>
                                @if(!empty($settings['mail_password']->value))
                                    <span style="font-size: 0.725rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: 4px;">
                                        <i class="fa-solid fa-lock"></i> Saved &amp; Secured
                                    </span>
                                @endif
                            </div>
                            <div class="input-with-icon" style="position: relative;">
                                <input
                                    type="password"
                                    name="mail_password"
                                    id="mail_password"
                                    class="form-control-admin"
                                    placeholder="{{ !empty($settings['mail_password']->value) ? '•••••••••••••••• (Leave blank to keep existing password)' : 'Enter SMTP password or App Password' }}"
                                    style="padding-right: 2.75rem;"
                                >
                                <i class="fa-solid fa-key input-icon"></i>
                                <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility()" title="Toggle visibility" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--muted-foreground); cursor: pointer; padding: 4px;">
                                    <i class="fa-solid fa-eye" id="passwordToggleIcon"></i>
                                </button>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.45rem; font-size: 0.76rem; color: var(--muted-foreground); flex-wrap: wrap; gap: 0.5rem;">
                                <span>For Gmail / Google Workspace accounts, generate a 16-letter <strong>App Password</strong> in Google Account Security.</span>
                                <button type="button" onclick="openAppPasswordModal()" style="background: none; border: none; color: var(--accent); font-weight: 700; cursor: pointer; text-decoration: underline; font-size: 0.76rem; padding: 0;">
                                    3-Step Setup Guide &rarr;
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Sender Branding & Admin Notification Distribution -->
                <div class="card-syndron" style="margin-bottom: 1.5rem;">
                    <div class="card-syndron-header">
                        <div class="card-syndron-title-box">
                            <h3 class="card-syndron-title">
                                <div class="card-icon-pill" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </div>
                                <span>Sender Identity &amp; Notification Distribution</span>
                            </h3>
                            <p class="card-syndron-desc">
                                Sender profile shown in recipient inboxes and internal staff list for incoming inquiry alerts.
                            </p>
                        </div>
                        <span style="font-size: 0.725rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.08); padding: 3px 9px; border-radius: 6px;">
                            Identity
                        </span>
                    </div>

                    <div class="card-syndron-body">
                        <!-- From Email & Name -->
                        <div class="grid-2-col" style="margin-bottom: 1.25rem;">
                            <!-- From Email -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_from_address" class="form-label-admin">
                                    <span>Sender Email ("From:") <span style="color: var(--destructive);">*</span></span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="email"
                                        name="mail_from_address"
                                        id="mail_from_address"
                                        class="form-control-admin"
                                        placeholder="sales@raghuvirimpex.com"
                                        value="{{ old('mail_from_address', $settings['mail_from_address']->value ?? '') }}"
                                        required
                                    >
                                    <i class="fa-solid fa-at input-icon"></i>
                                </div>
                                <div class="form-hint" style="margin-top: 0.35rem; font-size: 0.75rem; color: var(--muted-foreground);">
                                    Displayed as the sender address in client inbox headers.
                                </div>
                            </div>

                            <!-- From Name -->
                            <div class="form-group-admin" style="margin-bottom: 0;">
                                <label for="mail_from_name" class="form-label-admin">
                                    <span>Sender Display Name <span style="color: var(--destructive);">*</span></span>
                                </label>
                                <div class="input-with-icon">
                                    <input
                                        type="text"
                                        name="mail_from_name"
                                        id="mail_from_name"
                                        class="form-control-admin"
                                        placeholder="Raghuvir ImpEx"
                                        value="{{ old('mail_from_name', $settings['mail_from_name']->value ?? 'Raghuvir ImpEx') }}"
                                        required
                                    >
                                    <i class="fa-solid fa-signature input-icon"></i>
                                </div>
                                <div class="form-hint" style="margin-top: 0.35rem; font-size: 0.75rem; color: var(--muted-foreground);">
                                    Company or brand title shown beside the sender email.
                                </div>
                            </div>
                        </div>

                        <!-- Admin Alert Recipients -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                                <label for="mail_admin_recipients" class="form-label-admin" style="margin-bottom: 0;">
                                    <span>Admin Alert Recipients (Distribution List)</span>
                                </label>
                                <span style="font-size: 0.725rem; color: var(--muted-foreground);">Separate multiple emails with commas</span>
                            </div>
                            <div class="input-with-icon">
                                <input
                                    type="text"
                                    name="mail_admin_recipients"
                                    id="mail_admin_recipients"
                                    class="form-control-admin"
                                    placeholder="admin@raghuvirimpex.com, sales@raghuvirimpex.com"
                                    value="{{ old('mail_admin_recipients', $settings['mail_admin_recipients']->value ?? '') }}"
                                    oninput="updateTagChips(this.value)"
                                >
                                <i class="fa-solid fa-users-gear input-icon"></i>
                            </div>
                            <div class="form-hint" style="margin-top: 0.35rem; font-size: 0.75rem; color: var(--muted-foreground);">
                                <i class="fa-solid fa-bell" style="color: var(--accent);"></i>
                                Whenever a visitor submits an inquiry on the website, instant notifications are delivered to each recipient:
                            </div>
                            
                            <!-- Dynamic Recipient Tag Chips -->
                            <div class="recipient-tags-box" id="recipientTagsList"></div>
                        </div>
                    </div>
                </div>

                <!-- CARD 3: Automation Triggers & Templates -->
                <div class="card-syndron" style="margin-bottom: 1.5rem;">
                    <div class="card-syndron-header">
                        <div class="card-syndron-title-box">
                            <h3 class="card-syndron-title">
                                <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.12); color: var(--accent);">
                                    <i class="fa-solid fa-sliders"></i>
                                </div>
                                <span>Automation Rules &amp; Email Templates</span>
                            </h3>
                            <p class="card-syndron-desc">
                                Control automated notification triggers and preview responsive email templates.
                            </p>
                        </div>
                        <span style="font-size: 0.725rem; font-weight: 700; color: var(--accent); background: rgba(239, 128, 28, 0.08); padding: 3px 9px; border-radius: 6px;">
                            Automations
                        </span>
                    </div>

                    <div class="card-syndron-body" style="display: flex; flex-direction: column; gap: 1rem;">
                        <!-- Automation 1: Admin Alert -->
                        <div class="automation-item-row" onclick="toggleSwitch('adminAlertsSwitch')">
                            <div class="automation-info-left">
                                <div class="automation-badge-icon" style="background: rgba(59, 130, 246, 0.1); color: #2563eb;">
                                    <i class="fa-solid fa-bell"></i>
                                </div>
                                <div class="automation-texts">
                                    <h4>Instant Admin Lead Alert Notifications</h4>
                                    <p>Immediately emails designated staff with complete lead data, phone call links &amp; 1-click WhatsApp buttons.</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.85rem;" onclick="event.stopPropagation()">
                                <button type="button" onclick="showTemplateModal('admin')" class="btn-syndron btn-syndron-secondary" style="padding: 5px 12px; font-size: 0.775rem;">
                                    <i class="fa-solid fa-eye"></i> Preview
                                </button>
                                <label class="syndron-switch">
                                    <input
                                        type="checkbox"
                                        name="mail_enable_admin_alerts"
                                        id="adminAlertsSwitch"
                                        value="1"
                                        {{ old('mail_enable_admin_alerts', $settings['mail_enable_admin_alerts']->value ?? '1') === '1' ? 'checked' : '' }}
                                    >
                                    <span class="syndron-switch-slider"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Automation 2: Customer Auto-Reply -->
                        <div class="automation-item-row" onclick="toggleSwitch('customerReplySwitch')">
                            <div class="automation-info-left">
                                <div class="automation-badge-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                                    <i class="fa-solid fa-reply-all"></i>
                                </div>
                                <div class="automation-texts">
                                    <h4>Customer Inquiry Auto-Reply Acknowledgment</h4>
                                    <p>Sends a branded email confirmation thanking prospective clients and reassuring them of quick turnaround.</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.85rem;" onclick="event.stopPropagation()">
                                <button type="button" onclick="showTemplateModal('customer')" class="btn-syndron btn-syndron-secondary" style="padding: 5px 12px; font-size: 0.775rem;">
                                    <i class="fa-solid fa-eye"></i> Preview
                                </button>
                                <label class="syndron-switch">
                                    <input
                                        type="checkbox"
                                        name="mail_enable_auto_reply"
                                        id="customerReplySwitch"
                                        value="1"
                                        {{ old('mail_enable_auto_reply', $settings['mail_enable_auto_reply']->value ?? '1') === '1' ? 'checked' : '' }}
                                    >
                                    <span class="syndron-switch-slider"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Security: SSL Certificate Peer Verification -->
                        <div class="automation-item-row" onclick="toggleSwitch('verifyPeerSwitch')">
                            <div class="automation-info-left">
                                <div class="automation-badge-icon" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <div class="automation-texts">
                                    <h4>SSL Certificate Peer Verification</h4>
                                    <p>Validates the server certificate authority. Leave enabled for production; can be turned off on local development or self-signed servers.</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.85rem;" onclick="event.stopPropagation()">
                                <label class="syndron-switch">
                                    <input
                                        type="checkbox"
                                        name="mail_verify_peer"
                                        id="verifyPeerSwitch"
                                        value="1"
                                        {{ old('mail_verify_peer', $settings['mail_verify_peer']->value ?? (app()->environment('local') ? '0' : '1')) === '1' ? 'checked' : '' }}
                                    >
                                    <span class="syndron-switch-slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-syndron-footer">
                        <div class="card-footer-tip">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Settings take effect immediately upon saving.</span>
                        </div>
                        <button type="submit" class="btn-syndron btn-syndron-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Email Configuration</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- ================================================================= -->
        <!-- RIGHT COLUMN: DIAGNOSTICS & SYSTEM READINESS (STICKY)              -->
        <!-- ================================================================= -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;" class="diagnostic-terminal-card">
            
            <!-- CARD 1: Live SMTP Connection Sandbox -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.35rem;">
                    <div class="card-syndron-title-box">
                        <h3 class="card-syndron-title" style="font-size: 0.95rem;">
                            <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.12); color: var(--accent);">
                                <i class="fa-solid fa-vial-circle-check"></i>
                            </div>
                            <span>Live SMTP Test Sandbox</span>
                        </h3>
                    </div>
                    <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: 4px; display: inline-flex; align-items: center; gap: 4px;">
                        <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                        LIVE
                    </span>
                </div>

                <div class="card-syndron-body" style="padding: 1.25rem 1.35rem;">
                    <div class="form-group-admin" style="margin-bottom: 1rem;">
                        <label for="test_recipient_email" class="form-label-admin">
                            <span>Target Test Recipient:</span>
                        </label>
                        <div class="input-with-icon">
                            <input
                                type="email"
                                id="test_recipient_email"
                                class="form-control-admin"
                                placeholder="your.email@example.com"
                                value="{{ auth()->user()->email ?? '' }}"
                            >
                            <i class="fa-solid fa-paper-plane input-icon"></i>
                        </div>
                    </div>

                    <button type="button" id="sendTestBtn" onclick="runLiveTest()" class="btn-syndron btn-syndron-primary" style="width: 100%; justify-content: center; padding: 0.75rem;">
                        <i class="fa-solid fa-paper-plane" id="testBtnIcon"></i>
                        <span id="testBtnText">Send Test Email</span>
                    </button>

                    <!-- Real-Time Console Screen -->
                    <div class="terminal-display-screen" id="terminalScreen">
                        <div class="terminal-feed-line">
                            <span class="terminal-prompt">&gt;</span>
                            <span>Diagnostic Engine ready.</span>
                        </div>
                        <div class="terminal-feed-line">
                            <span class="terminal-prompt">&gt;</span>
                            <span>Enter an email and click "Send Test Email".</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 2: Health Readiness Checklist -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.35rem;">
                    <div class="card-syndron-title" style="font-size: 0.9rem;">
                        <i class="fa-solid fa-heart-pulse" style="color: #10b981;"></i>
                        <span>Mail Telemetry &amp; Readiness</span>
                    </div>
                </div>

                <div class="card-syndron-body" style="padding: 1rem 1.35rem; font-size: 0.8rem; display: flex; flex-direction: column; gap: 0.65rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 0.5rem;">
                        <span style="color: var(--muted-foreground);">Protocol Driver:</span>
                        <span style="font-weight: 700; font-family: monospace; color: var(--foreground);">SMTP</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 0.5rem;">
                        <span style="color: var(--muted-foreground);">Server Host:</span>
                        <span style="font-weight: 600; font-family: monospace; color: {{ !empty($settings['mail_host']->value) ? '#10b981' : '#f59e0b' }};">
                            {{ $settings['mail_host']->value ?? 'Unconfigured' }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); padding-bottom: 0.5rem;">
                        <span style="color: var(--muted-foreground);">Sender Address:</span>
                        <span style="font-weight: 600; color: {{ !empty($settings['mail_from_address']->value) ? '#10b981' : '#f59e0b' }};">
                            {{ $settings['mail_from_address']->value ?? 'Unconfigured' }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--muted-foreground);">Inquiry Safe Mode:</span>
                        <span style="color: #10b981; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                            <i class="fa-solid fa-circle-check"></i> Always Saved in DB
                        </span>
                    </div>
                </div>
            </div>

            <!-- CARD 3: Best Practice Guidelines -->
            <div class="card-syndron" style="margin-bottom: 0;">
                <div class="card-syndron-header" style="padding: 1.15rem 1.35rem;">
                    <div class="card-syndron-title" style="font-size: 0.9rem;">
                        <i class="fa-solid fa-circle-question" style="color: #2563eb;"></i>
                        <span>Essential Guidelines</span>
                    </div>
                </div>

                <div class="card-syndron-body" style="padding: 1.15rem 1.35rem; font-size: 0.8rem; color: var(--muted-foreground); display: flex; flex-direction: column; gap: 0.75rem; line-height: 1.5;">
                    <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                        <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                        <span><strong>Google / Workspace:</strong> Requires a 2-Step Verification <em>App Password</em> (16 characters) instead of account password.</span>
                    </div>
                    <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                        <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                        <span><strong>cPanel Webmail:</strong> Use <code>mail.yourdomain.com</code> on SSL port <code>465</code>.</span>
                    </div>
                    <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                        <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                        <span><strong>Zero Visitor Loss:</strong> If SMTP credentials expire or fail, incoming inquiries are safely preserved in your <a href="{{ route('admin.leads.index') }}" style="color: var(--accent); font-weight: 700;">Leads Dashboard</a> without breaking visitor forms.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================
     MODAL 1: GOOGLE APP PASSWORD 3-STEP SETUP GUIDE
     ======================================================================== -->
<div class="email-modal-overlay" id="appPasswordModal" onclick="closeAppPasswordModal()">
    <div class="email-modal-box" onclick="event.stopPropagation()">
        <div class="email-modal-header">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 9px; background: rgba(234, 67, 53, 0.1); color: #ea4335; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                    <i class="fa-brands fa-google"></i>
                </div>
                <div>
                    <h3 style="margin: 0; font-size: 1.05rem; font-weight: 800; color: var(--foreground);">Google App Password Guide</h3>
                    <p style="margin: 0; font-size: 0.78rem; color: var(--muted-foreground);">3 simple steps for Gmail &amp; Google Workspace</p>
                </div>
            </div>
            <button type="button" onclick="closeAppPasswordModal()" style="background: none; border: none; font-size: 1.35rem; color: var(--muted-foreground); cursor: pointer;">&times;</button>
        </div>
        <div class="email-modal-body" style="display: flex; flex-direction: column; gap: 1rem;">
            <div style="background: var(--secondary); border: 1px solid var(--border); border-radius: 12px; padding: 1rem 1.15rem; display: flex; gap: 0.9rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--accent); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">1</div>
                <div>
                    <div style="font-weight: 800; font-size: 0.875rem; color: var(--foreground);">Enable 2-Step Verification</div>
                    <div style="font-size: 0.8rem; color: var(--muted-foreground); margin-top: 3px;">
                        Open <a href="https://myaccount.google.com/security" target="_blank" style="color: var(--accent); text-decoration: underline; font-weight: 700;">Google Account &gt; Security</a> and turn on 2-Step Verification.
                    </div>
                </div>
            </div>
            <div style="background: var(--secondary); border: 1px solid var(--border); border-radius: 12px; padding: 1rem 1.15rem; display: flex; gap: 0.9rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--accent); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">2</div>
                <div>
                    <div style="font-weight: 800; font-size: 0.875rem; color: var(--foreground);">Create an App Password</div>
                    <div style="font-size: 0.8rem; color: var(--muted-foreground); margin-top: 3px;">
                        Navigate to <a href="https://myaccount.google.com/apppasswords" target="_blank" style="color: var(--accent); text-decoration: underline; font-weight: 700;">App Passwords</a>, name it "Raghuvir Website", and click <strong>Create</strong>.
                    </div>
                </div>
            </div>
            <div style="background: var(--secondary); border: 1px solid var(--border); border-radius: 12px; padding: 1rem 1.15rem; display: flex; gap: 0.9rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--accent); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">3</div>
                <div>
                    <div style="font-weight: 800; font-size: 0.875rem; color: var(--foreground);">Paste in Admin Panel</div>
                    <div style="font-size: 0.8rem; color: var(--muted-foreground); margin-top: 3px;">
                        Copy the 16-character code generated by Google and paste it directly into the <strong>SMTP Password</strong> field here.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================
     MODAL 2: RESPONSIVE EMAIL TEMPLATE PREVIEW
     ======================================================================== -->
<div class="email-modal-overlay" id="templateModal" onclick="closeTemplateModal()">
    <div class="email-modal-box" style="max-width: 680px;" onclick="event.stopPropagation()">
        <div class="email-modal-header">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 9px; background: rgba(239, 128, 28, 0.1); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 1.15rem;">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <div>
                    <h3 id="templateModalTitle" style="margin: 0; font-size: 1.05rem; font-weight: 800; color: var(--foreground);">Email Preview</h3>
                    <p style="margin: 0; font-size: 0.78rem; color: var(--muted-foreground);">Branded Responsive HTML Template</p>
                </div>
            </div>
            <button type="button" onclick="closeTemplateModal()" style="background: none; border: none; font-size: 1.35rem; color: var(--muted-foreground); cursor: pointer;">&times;</button>
        </div>
        <div id="templateModalContent" class="email-modal-body" style="background: #f1f5f9; max-height: 70vh;"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const recipientsInput = document.getElementById('mail_admin_recipients');
    if (recipientsInput) {
        updateTagChips(recipientsInput.value);
    }
});

// Toggle Switch Helper
function toggleSwitch(id) {
    const sw = document.getElementById(id);
    if (sw) {
        sw.checked = !sw.checked;
    }
}

// Password Visibility Toggle
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('mail_password');
    const toggleIcon = document.getElementById('passwordToggleIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// 1-Click Mail Provider Presets
const presetsMap = {
    gmail: {
        host: 'smtp.gmail.com',
        port: '587',
        enc: 'tls'
    },
    hostinger: {
        host: 'smtp.hostinger.com',
        port: '465',
        enc: 'ssl'
    },
    cpanel: {
        host: 'mail.' + (window.location.hostname.replace('www.', '') || 'yourdomain.com'),
        port: '465',
        enc: 'ssl'
    },
    outlook: {
        host: 'smtp.office365.com',
        port: '587',
        enc: 'tls'
    }
};

function triggerProviderPreset(key) {
    document.querySelectorAll('.provider-card').forEach(c => c.classList.remove('active'));
    const targetCard = document.getElementById('presetCard-' + key);
    if (targetCard) targetCard.classList.add('active');

    const config = presetsMap[key];
    if (config) {
        document.getElementById('mail_host').value = config.host;
        document.getElementById('mail_port').value = config.port;
        document.getElementById('mail_encryption').value = config.enc;

        if (typeof window.showSonnerToast === 'function') {
            window.showSonnerToast({
                message: key.toUpperCase() + ' presets applied (Host: ' + config.host + ', Port: ' + config.port + ')',
                type: 'info'
            });
        }
    }
}

// Admin Recipients Tag Chips
function updateTagChips(raw) {
    const container = document.getElementById('recipientTagsList');
    if (!container) return;

    container.innerHTML = '';
    const emails = raw.split(',').map(e => e.trim()).filter(e => e.length > 0);

    emails.forEach(email => {
        const chip = document.createElement('span');
        chip.className = 'recipient-chip';
        chip.innerHTML = '<i class="fa-solid fa-check"></i> ' + escapeHtml(email);
        container.appendChild(chip);
    });
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Modals
function openAppPasswordModal() {
    document.getElementById('appPasswordModal').style.display = 'flex';
}
function closeAppPasswordModal() {
    document.getElementById('appPasswordModal').style.display = 'none';
}

function showTemplateModal(type) {
    const modal = document.getElementById('templateModal');
    const title = document.getElementById('templateModalTitle');
    const content = document.getElementById('templateModalContent');

    if (type === 'admin') {
        title.innerText = 'Admin Lead Alert Notification Preview';
        content.innerHTML = `
            <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; font-family: sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                <div style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); padding: 20px; color: #ffffff; text-align: center; border-bottom: 4px solid #EF801C;">
                    <h2 style="margin: 0; font-size: 1.25rem;">New Website Lead Received!</h2>
                    <p style="margin: 4px 0 0 0; font-size: 0.8rem; color: #cbd5e1;">Raghuvir ImpEx Contact Notification</p>
                </div>
                <div style="padding: 24px; color: #334155; font-size: 0.875rem;">
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem;">
                            <tr><td style="padding: 6px 0; color: #64748b; width: 120px;">Customer Name:</td><td style="font-weight: 700; color: #0f172a;">Rajesh Patel</td></tr>
                            <tr><td style="padding: 6px 0; color: #64748b;">Phone Number:</td><td style="font-weight: 700; color: #0f172a;">+91 98765 43210</td></tr>
                            <tr><td style="padding: 6px 0; color: #64748b;">Email Address:</td><td style="font-weight: 700; color: #0f172a;">rajesh@example.com</td></tr>
                            <tr><td style="padding: 6px 0; color: #64748b;">Subject:</td><td style="font-weight: 700; color: #0f172a;">Bulk Atta Inquiry for Export</td></tr>
                        </table>
                    </div>
                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <a href="#" style="flex: 1; text-align: center; background: #25D366; color: #fff; padding: 10px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.85rem;">
                            Chat on WhatsApp
                        </a>
                        <a href="#" style="flex: 1; text-align: center; background: #EF801C; color: #fff; padding: 10px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.85rem;">
                            Call Customer
                        </a>
                    </div>
                </div>
            </div>
        `;
    } else {
        title.innerText = 'Customer Auto-Reply Acknowledgment Preview';
        content.innerHTML = `
            <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; font-family: sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                <div style="background: linear-gradient(135deg, #EF801C 0%, #ea580c 100%); padding: 24px; color: #ffffff; text-align: center;">
                    <h2 style="margin: 0; font-size: 1.3rem;">Thank You for Contacting Raghuvir!</h2>
                    <p style="margin: 6px 0 0 0; font-size: 0.85rem; color: #ffedd5;">We have received your message safely.</p>
                </div>
                <div style="padding: 24px; color: #334155; font-size: 0.875rem; line-height: 1.6;">
                    <p>Dear <strong>Rajesh Patel</strong>,</p>
                    <p>Thank you for reaching out to <strong>Raghuvir ImpEx</strong>. Our representative will review your inquiry and connect with you shortly.</p>
                    <div style="background: #fff7ed; border-left: 4px solid #EF801C; padding: 12px 16px; margin: 20px 0; border-radius: 0 8px 8px 0;">
                        <p style="margin: 0; font-size: 0.825rem; color: #9a3412;"><strong>Direct Support:</strong> +91 97254 27727 | sales@raghuvirimpex.com</p>
                    </div>
                    <p style="margin-bottom: 0; color: #64748b; font-size: 0.825rem;">Warm regards,<br><strong style="color: #0f172a;">Customer Support Team</strong><br>Raghuvir ImpEx</p>
                </div>
            </div>
        `;
    }

    modal.style.display = 'flex';
}

function closeTemplateModal() {
    document.getElementById('templateModal').style.display = 'none';
}

// Live SMTP Sandbox AJAX Runner (Zero Page Reload, Single Bottom-Right Toast)
function runLiveTest() {
    const emailInput = document.getElementById('test_recipient_email');
    const btn = document.getElementById('sendTestBtn');
    const btnText = document.getElementById('testBtnText');
    const btnIcon = document.getElementById('testBtnIcon');

    const recipient = emailInput.value.trim();
    if (!recipient) {
        if (typeof window.showSonnerToast === 'function') {
            window.showSonnerToast({
                message: 'Please enter a valid recipient email address in the test box.',
                type: 'error'
            });
        }
        emailInput.focus();
        return;
    }

    btn.disabled = true;
    btnText.innerText = 'Testing SMTP Socket...';
    btnIcon.className = 'fa-solid fa-spinner fa-spin';

    // Construct form data using current form input values so live changes can be tested before saving!
    const form = document.getElementById('emailSettingsForm');
    const formData = form ? new FormData(form) : new FormData();
    formData.set('_token', '{{ csrf_token() }}');
    formData.set('test_email', recipient);

    const host = formData.get('mail_host') || 'smtp.gmail.com';
    const port = formData.get('mail_port') || '587';
    const user = formData.get('mail_username') || '(empty)';

    // Log step-by-step progress to terminal sandbox
    appendTerminalLog('Initiating SMTP socket connection...');
    appendTerminalLog(`Target Host: ${host}:${port} (${formData.get('mail_encryption') || 'tls'})`);
    appendTerminalLog(`Username: ${user}`);
    appendTerminalLog(`Recipient: ${recipient}`);

    fetch('{{ route("admin.settings.email.test") }}', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async response => {
        const data = await response.json();
        return { ok: response.ok, status: response.status, data };
    })
    .then(result => {
        btn.disabled = false;
        btnText.innerText = 'Send Test Email';
        btnIcon.className = 'fa-solid fa-paper-plane';

        if (result.ok && result.data.success) {
            appendTerminalLog('250 OK: ' + result.data.message, '#34d399');
            if (typeof window.showSonnerToast === 'function') {
                window.showSonnerToast({
                    message: result.data.message,
                    type: 'success'
                });
            }
        } else {
            const err = result.data.message || 'SMTP handshaking failed.';
            appendTerminalLog('ERROR: ' + err, '#f87171');
            if (result.data.raw_error) {
                appendTerminalLog('Details: ' + result.data.raw_error.substring(0, 160) + '...', '#94a3b8');
            }
            if (typeof window.showSonnerToast === 'function') {
                window.showSonnerToast({
                    message: err,
                    type: 'error'
                });
            }
        }
    })
    .catch(err => {
        btn.disabled = false;
        btnText.innerText = 'Send Test Email';
        btnIcon.className = 'fa-solid fa-paper-plane';
        appendTerminalLog('Network / Server Error: ' + err.message, '#f87171');
        if (typeof window.showSonnerToast === 'function') {
            window.showSonnerToast({
                message: 'Network or server communication error. Please try again.',
                type: 'error'
            });
        }
    });
}

function appendTerminalLog(msg, color = null) {
    const screen = document.getElementById('terminalScreen');
    if (!screen) return;

    const row = document.createElement('div');
    row.className = 'terminal-feed-line';
    const colorStyle = color ? 'style="color: ' + color + ';"' : '';
    row.innerHTML = '<span class="terminal-prompt">&gt;</span> <span ' + colorStyle + '>' + escapeHtml(msg) + '</span>';
    screen.appendChild(row);
    screen.scrollTop = screen.scrollHeight;
}
</script>
@endsection
