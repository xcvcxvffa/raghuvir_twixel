@extends('admin.layouts.app')

@section('title', 'Profile Settings - Syndron UI | Raghuvir')

@section('content')
<!-- Page Header & Breadcrumb -->
<div class="breadcrumb-nav" style="margin-bottom: 0.75rem;">
    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="font-size: 0.75rem;"></i> Dashboard</a>
    <i class="fa-solid fa-chevron-right"></i>
    <span>Settings</span>
    <i class="fa-solid fa-chevron-right"></i>
    <span class="current">Profile Settings</span>
</div>

<!-- Header Banner -->
<div class="settings-header-banner" style="margin-bottom: 1.75rem;">
    <div class="settings-header-title-box">
        <div class="settings-header-icon-badge">
            <i class="fa-solid fa-user-gear"></i>
        </div>
        <div>
            <h1 class="page-title-main" style="margin-bottom: 0.25rem;">
                <span>Account & Profile Settings</span>
                <span class="profile-verified-badge" style="font-size: 0.725rem; vertical-align: middle;">
                    <i class="fa-solid fa-shield-halved"></i> {{ ucfirst($user->role ?? 'Admin') }}
                </span>
            </h1>
            <p style="font-size: 0.85rem; color: var(--muted-foreground); margin: 0;">
                Manage your administrator profile, update login credentials, and configure account security settings.
            </p>
        </div>
    </div>

    <!-- Quick Action / Back Button -->
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('admin.dashboard') }}" class="btn-syndron btn-syndron-secondary">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Dashboard</span>
        </a>
    </div>
</div>

@if(session('success'))
    <div class="syndron-alert syndron-alert-success" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); color: #10b981; padding: 12px 18px; border-radius: var(--radius-md, 8px); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 12px; font-weight: 500;">
        <i class="fa-solid fa-circle-check" style="font-size: 1.25rem;"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if(session('info'))
    <div class="syndron-alert syndron-alert-info" style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); color: #3b82f6; padding: 12px 18px; border-radius: var(--radius-md, 8px); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 12px; font-weight: 500;">
        <i class="fa-solid fa-circle-info" style="font-size: 1.25rem;"></i>
        <div>{{ session('info') }}</div>
    </div>
@endif

@if($errors->any())
    <div class="syndron-alert syndron-alert-danger">
        <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.1rem;"></i>
        <div>
            <strong>Please correct the following errors:</strong>
            <ul style="margin: 0.25rem 0 0 1.25rem; padding: 0;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- Profile Layout Grid (Left Profile Hub + Right Settings Forms) -->
<div class="profile-layout-grid">

    <!-- ================================================================= -->
    <!-- LEFT COLUMN: PROFILE IDENTITY & SECURITY HEALTH CARD              -->
    <!-- ================================================================= -->
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Card 1: Avatar & Identity Summary -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-body" style="text-align: center; padding: 2.25rem 1.5rem 1.75rem;">
                
                <!-- Avatar Display with Camera Trigger -->
                <div class="profile-avatar-container">
                    <div class="profile-avatar-frame {{ $user->getAvatarUrl() ? 'has-image' : '' }}" id="avatarPreviewFrame">
                        @if($user->getAvatarUrl())
                            <img 
                                src="{{ $user->getAvatarUrl() }}" 
                                alt="{{ $user->name }}" 
                                id="avatarImgPreview" 
                                style="display: block;"
                                onerror="this.onerror=null; this.style.display='none'; var fb = document.getElementById('avatarInitialPreview'); if(fb) fb.style.display='flex'; var pf = document.getElementById('avatarPreviewFrame'); if(pf) pf.classList.remove('has-image');"
                            >
                            <span id="avatarInitialPreview" style="display: none;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        @else
                            <img 
                                src="" 
                                alt="{{ $user->name }}" 
                                id="avatarImgPreview" 
                                style="display: none;"
                                onerror="this.onerror=null; this.style.display='none'; var fb = document.getElementById('avatarInitialPreview'); if(fb) fb.style.display='flex'; var pf = document.getElementById('avatarPreviewFrame'); if(pf) pf.classList.remove('has-image');"
                            >
                            <span id="avatarInitialPreview" style="display: flex;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        @endif
                    </div>

                    <!-- Camera Upload Overlay Trigger -->
                    <label for="avatarInput" class="profile-camera-trigger" title="Upload New Profile Picture">
                        <i class="fa-solid fa-camera" style="font-size: 0.9rem;"></i>
                    </label>
                </div>

                <!-- Hidden Avatar Upload Form -->
                <form id="avatarUploadForm" action="{{ route('admin.profile.avatar') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/png,image/jpg,image/webp" onchange="handleAvatarUpload(this)">
                </form>

                <!-- Admin Name & Verified Status -->
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--foreground); margin-bottom: 0.25rem; display: flex; align-items: center; justify-content: center; gap: 6px;">
                    <span>{{ $user->name }}</span>
                    <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1rem;" title="Verified Administrator"></i>
                </h2>
                <p style="font-size: 0.825rem; color: var(--muted-foreground); margin-bottom: 0.85rem;">{{ $user->email }}</p>

                <!-- Role Pill -->
                <div style="margin-bottom: 1rem;">
                    <span class="profile-verified-badge">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>{{ ucfirst($user->role ?? 'Super Administrator') }}</span>
                    </span>
                </div>

                <!-- Avatar Actions: Change Photo & Remove Photo -->
                <div style="display: flex; gap: 8px; justify-content: center; align-items: center; margin-bottom: 0.6rem; flex-wrap: wrap;">
                    <label for="avatarInput" class="btn-syndron btn-syndron-secondary" style="padding: 5px 12px; font-size: 0.775rem; cursor: pointer; border-radius: var(--radius-sm); gap: 6px; display: inline-flex; align-items: center;">
                        <i class="fa-solid fa-camera"></i>
                        <span>Change Photo</span>
                    </label>
                    @if($user->avatar)
                        <form action="{{ route('admin.profile.avatar.remove') }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-icon-btn delete" style="width: auto; height: auto; padding: 5px 12px; font-size: 0.775rem; border-radius: var(--radius-sm); gap: 6px; display: inline-flex;" onclick="return confirm('Are you sure you want to remove your profile photo?');">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Remove</span>
                            </button>
                        </form>
                    @endif
                </div>

                @if($user->avatar)
                <!-- Display Mode Toggle: Fit (Logo) vs Fill (Photo) -->
                <div style="display: flex; justify-content: center; margin-bottom: 1.25rem;">
                    <div style="display: inline-flex; background: rgba(0, 0, 0, 0.04); padding: 3px; border-radius: 20px; border: 1px solid var(--border); gap: 2px;">
                        <button type="button" id="avatarFitBtn" class="avatar-mode-pill active" onclick="setAvatarMode('fit')" title="Show entire logo centered with clean margin">
                            <i class="fa-solid fa-compress" style="font-size: 0.7rem;"></i>
                            <span>Fit Logo</span>
                        </button>
                        <button type="button" id="avatarFillBtn" class="avatar-mode-pill" onclick="setAvatarMode('fill')" title="Fill entire circle edge-to-edge">
                            <i class="fa-solid fa-expand" style="font-size: 0.7rem;"></i>
                            <span>Fill Photo</span>
                        </button>
                    </div>
                </div>
                @endif

                <!-- Profile Meta List -->
                <div class="profile-meta-list">
                    <div class="profile-meta-row">
                        <span class="profile-meta-label">
                            <i class="fa-regular fa-calendar-check" style="color: var(--accent);"></i>
                            <span>Member Since:</span>
                        </span>
                        <strong class="profile-meta-value">{{ $user->created_at ? $user->created_at->format('M Y') : 'Sep 2026' }}</strong>
                    </div>
                    <div class="profile-meta-row">
                        <span class="profile-meta-label">
                            <i class="fa-solid fa-phone" style="color: var(--accent);"></i>
                            <span>Contact Phone:</span>
                        </span>
                        <strong class="profile-meta-value">{{ $user->phone ?? 'Not Specified' }}</strong>
                    </div>
                    <div class="profile-meta-row">
                        <span class="profile-meta-label">
                            <i class="fa-solid fa-circle-dot" style="color: #10b981;"></i>
                            <span>Account Status:</span>
                        </span>
                        <span style="color: #10b981; font-weight: 700; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 0.35rem; background: rgba(16, 185, 129, 0.12); padding: 2px 8px; border-radius: var(--radius-full);">
                            Active
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Security & Session Health Checklist -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-header" style="padding: 1.15rem 1.35rem;">
                <div class="card-syndron-title" style="font-size: 0.9rem;">
                    <i class="fa-solid fa-shield-virus" style="color: var(--accent);"></i>
                    <span>Security Tips</span>
                </div>
            </div>
            <div class="card-syndron-body" style="padding: 1.15rem 1.35rem; font-size: 0.8rem; color: var(--muted-foreground); display: flex; flex-direction: column; gap: 0.75rem;">
                <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                    <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                    <span>Use a unique password with at least 8 characters.</span>
                </div>
                <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                    <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                    <span>Always logout when accessing from shared or public devices.</span>
                </div>
                <div style="display: flex; gap: 0.6rem; align-items: flex-start;">
                    <i class="fa-solid fa-check" style="color: #10b981; margin-top: 3px;"></i>
                    <span>Ensure your recovery contact email is valid and up to date.</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- RIGHT COLUMN: PERSONAL INFO & SECURITY FORMS                      -->
    <!-- ================================================================= -->
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        
        <!-- CARD 1: PERSONAL DETAILS FORM -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-header">
                <div class="card-syndron-title-box">
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(239, 128, 28, 0.12); color: #EF801C;">
                            <i class="fa-regular fa-id-card"></i>
                        </div>
                        <span>Personal Information</span>
                    </h3>
                    <p class="card-syndron-desc" style="margin: 0.2rem 0 0 0; font-size: 0.8rem; color: var(--muted-foreground);">
                        Update your administrator full name, official email address, and primary contact phone.
                    </p>
                </div>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-syndron-body">
                    <!-- Row 1: Name & Email -->
                    <div class="grid-2-col" style="margin-bottom: 1.25rem;">
                        <!-- Full Name -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="name" class="form-label-admin">
                                <span>Full Name <span style="color: var(--destructive);">*</span></span>
                            </label>
                            <div class="input-with-icon">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control-admin @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter your full name"
                                    required
                                >
                                <i class="fa-regular fa-user input-icon"></i>
                            </div>
                            @error('name')
                                <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="email" class="form-label-admin">
                                <span>Email Address <span style="color: var(--destructive);">*</span></span>
                            </label>
                            <div class="input-with-icon">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control-admin @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="admin@raghuvir.com"
                                    required
                                >
                                <i class="fa-regular fa-envelope input-icon"></i>
                            </div>
                            @error('email')
                                <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Phone & Role -->
                    <div class="grid-2-col" style="margin-bottom: 0;">
                        <!-- Phone Number -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="phone" class="form-label-admin">Contact Phone Number</label>
                            <div class="input-with-icon">
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    class="form-control-admin @error('phone') is-invalid @enderror"
                                    placeholder="+91 97254 27727"
                                    value="{{ old('phone', $user->phone) }}"
                                >
                                <i class="fa-solid fa-phone input-icon"></i>
                            </div>
                            @error('phone')
                                <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Assigned System Role (Readonly) -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label class="form-label-admin">
                                <span>Assigned System Role</span>
                                <span style="font-size: 0.7rem; color: var(--muted-foreground);">System Managed</span>
                            </label>
                            <div class="input-with-icon">
                                <input
                                    type="text"
                                    class="form-control-admin"
                                    value="{{ ucfirst($user->role ?? 'Super Administrator') }}"
                                    readonly
                                    style="opacity: 0.8; cursor: not-allowed; background: var(--secondary);"
                                >
                                <i class="fa-solid fa-shield-halved input-icon" style="color: var(--accent);"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-syndron-footer">
                    <div class="card-footer-tip">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>Changes will reflect immediately across all admin sessions.</span>
                    </div>
                    <button type="submit" class="btn-syndron btn-syndron-primary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Save Profile Changes</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- CARD 2: SECURITY & PASSWORD UPDATE FORM -->
        <div class="card-syndron" style="margin-bottom: 0;">
            <div class="card-syndron-header">
                <div class="card-syndron-title-box">
                    <h3 class="card-syndron-title">
                        <div class="card-icon-pill" style="background: rgba(239, 68, 68, 0.12); color: #ef4444;">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <span>Security & Password</span>
                    </h3>
                    <p class="card-syndron-desc" style="margin: 0.2rem 0 0 0; font-size: 0.8rem; color: var(--muted-foreground);">
                        Ensure your account remains safe with a strong, randomized password combination.
                    </p>
                </div>
            </div>

            <form action="{{ route('admin.profile.password') }}" method="POST" id="passwordUpdateForm">
                @csrf
                @method('PUT')

                <div class="card-syndron-body">
                    <!-- Current Password -->
                    <div class="form-group-admin">
                        <label for="current_password" class="form-label-admin">
                            <span>Current Password <span style="color: var(--destructive);">*</span></span>
                        </label>
                        <div class="input-with-icon">
                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="form-control-admin @error('current_password') is-invalid @enderror"
                                placeholder="Enter current password to authorize changes"
                                required
                            >
                            <i class="fa-solid fa-lock input-icon"></i>
                            <button type="button" class="password-toggle-btn" data-target="current_password" title="Show / Hide Password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Row: New Password & Confirm Password -->
                    <div class="grid-2-col" style="margin-bottom: 1rem;">
                        <!-- New Password -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="new_password" class="form-label-admin">
                                <span>New Password <span style="color: var(--destructive);">*</span></span>
                            </label>
                            <div class="input-with-icon">
                                <input
                                    type="password"
                                    name="password"
                                    id="new_password"
                                    class="form-control-admin @error('password') is-invalid @enderror"
                                    placeholder="Minimum 8 characters"
                                    required
                                    oninput="evaluatePasswordStrength(this.value)"
                                >
                                <i class="fa-solid fa-key input-icon"></i>
                                <button type="button" class="password-toggle-btn" data-target="new_password" title="Show / Hide Password">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div style="color: #ef4444; font-size: 0.775rem; margin-top: 0.35rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group-admin" style="margin-bottom: 0;">
                            <label for="password_confirmation" class="form-label-admin">
                                <span>Confirm New Password <span style="color: var(--destructive);">*</span></span>
                            </label>
                            <div class="input-with-icon">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control-admin"
                                    placeholder="Re-type new password"
                                    required
                                >
                                <i class="fa-solid fa-check-double input-icon"></i>
                                <button type="button" class="password-toggle-btn" data-target="password_confirmation" title="Show / Hide Password">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Live Password Strength Meter -->
                    <div class="password-meter-wrap" id="passwordMeterWrap">
                        <div class="password-strength-label">
                            <span style="color: var(--muted-foreground);">Password Strength:</span>
                            <span id="strengthText" style="color: var(--muted-foreground); font-weight: 700;">Enter password</span>
                        </div>
                        <div class="password-meter-bars">
                            <div class="password-meter-segment" id="seg1"></div>
                            <div class="password-meter-segment" id="seg2"></div>
                            <div class="password-meter-segment" id="seg3"></div>
                            <div class="password-meter-segment" id="seg4"></div>
                        </div>

                        <!-- Real-time Checklist -->
                        <div class="password-checklist">
                            <div class="password-rule-item" id="ruleLength">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>At least 8 characters</span>
                            </div>
                            <div class="password-rule-item" id="ruleUpper">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>At least 1 uppercase letter</span>
                            </div>
                            <div class="password-rule-item" id="ruleNumber">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>At least 1 number (0-9)</span>
                            </div>
                            <div class="password-rule-item" id="ruleSymbol">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>At least 1 symbol (!@#$)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-syndron-footer">
                    <div class="card-footer-tip">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>After updating password, keep your new credentials safely noted.</span>
                    </div>
                    <button type="submit" class="btn-syndron btn-syndron-primary">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Update Security Password</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    // Live Avatar File Picker & Auto Submit Preview
    function handleAvatarUpload(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];

            // 1. Client-side Size Validation (10MB)
            const maxSize = 10 * 1024 * 1024;
            if (file.size > maxSize) {
                alert('File size exceeds 10MB limit. Please choose an image smaller than 10MB.');
                input.value = '';
                return;
            }

            // 2. Client-side File Format Validation
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            if (!validTypes.includes(file.type.toLowerCase())) {
                alert('Invalid file format. Please upload a JPG, PNG, or WEBP image.');
                input.value = '';
                return;
            }

            // 3. Instant local preview
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewFrame = document.getElementById('avatarPreviewFrame');
                const imgPreview = document.getElementById('avatarImgPreview');
                const initialPreview = document.getElementById('avatarInitialPreview');

                if (imgPreview) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                if (initialPreview) {
                    initialPreview.style.display = 'none';
                }
                if (previewFrame) {
                    previewFrame.classList.add('has-image');
                }
            };
            reader.readAsDataURL(file);

            // 4. Auto-submit form
            document.getElementById('avatarUploadForm').submit();
        }
    }

    // Interactive Avatar Display Mode Switcher (Fit Logo vs Fill Photo)
    function setAvatarMode(mode) {
        const frame = document.getElementById('avatarPreviewFrame');
        const fitBtn = document.getElementById('avatarFitBtn');
        const fillBtn = document.getElementById('avatarFillBtn');

        if (mode === 'fill') {
            if (frame) frame.classList.add('mode-fill');
            if (fillBtn) fillBtn.classList.add('active');
            if (fitBtn) fitBtn.classList.remove('active');
            try { localStorage.setItem('admin_avatar_mode', 'fill'); } catch(e) {}
        } else {
            if (frame) frame.classList.remove('mode-fill');
            if (fitBtn) fitBtn.classList.add('active');
            if (fillBtn) fillBtn.classList.remove('active');
            try { localStorage.setItem('admin_avatar_mode', 'fit'); } catch(e) {}
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        try {
            const saved = localStorage.getItem('admin_avatar_mode') || 'fit';
            setAvatarMode(saved);
        } catch(e) {
            setAvatarMode('fit');
        }
    });

    // Realtime Password Strength Evaluator
    function evaluatePasswordStrength(password) {
        const seg1 = document.getElementById('seg1');
        const seg2 = document.getElementById('seg2');
        const seg3 = document.getElementById('seg3');
        const seg4 = document.getElementById('seg4');
        const strengthText = document.getElementById('strengthText');

        const ruleLength = document.getElementById('ruleLength');
        const ruleUpper = document.getElementById('ruleUpper');
        const ruleNumber = document.getElementById('ruleNumber');
        const ruleSymbol = document.getElementById('ruleSymbol');

        if (!password) {
            [seg1, seg2, seg3, seg4].forEach(s => {
                s.className = 'password-meter-segment';
            });
            strengthText.textContent = 'Enter password';
            strengthText.style.color = 'var(--muted-foreground)';

            [ruleLength, ruleUpper, ruleNumber, ruleSymbol].forEach(r => {
                r.className = 'password-rule-item';
                r.querySelector('i').className = 'fa-regular fa-circle-dot';
            });
            return;
        }

        let score = 0;

        // Rule 1: Length >= 8
        const hasLength = password.length >= 8;
        updateRule(ruleLength, hasLength);
        if (hasLength) score++;

        // Rule 2: Uppercase
        const hasUpper = /[A-Z]/.test(password);
        updateRule(ruleUpper, hasUpper);
        if (hasUpper) score++;

        // Rule 3: Number
        const hasNumber = /[0-9]/.test(password);
        updateRule(ruleNumber, hasNumber);
        if (hasNumber) score++;

        // Rule 4: Special Char
        const hasSymbol = /[^A-Za-z0-9]/.test(password);
        updateRule(ruleSymbol, hasSymbol);
        if (hasSymbol) score++;

        // Reset segments
        [seg1, seg2, seg3, seg4].forEach(s => s.className = 'password-meter-segment');

        if (score === 1) {
            seg1.classList.add('active-weak');
            strengthText.textContent = 'Weak';
            strengthText.style.color = '#ef4444';
        } else if (score === 2) {
            seg1.classList.add('active-fair');
            seg2.classList.add('active-fair');
            strengthText.textContent = 'Fair';
            strengthText.style.color = '#f59e0b';
        } else if (score === 3) {
            seg1.classList.add('active-good');
            seg2.classList.add('active-good');
            seg3.classList.add('active-good');
            strengthText.textContent = 'Good';
            strengthText.style.color = '#3b82f6';
        } else if (score >= 4) {
            seg1.classList.add('active-strong');
            seg2.classList.add('active-strong');
            seg3.classList.add('active-strong');
            seg4.classList.add('active-strong');
            strengthText.textContent = 'Strong & Secure';
            strengthText.style.color = '#10b981';
        }
    }

    function updateRule(element, isValid) {
        if (!element) return;
        const icon = element.querySelector('i');
        if (isValid) {
            element.classList.add('valid');
            if (icon) {
                icon.className = 'fa-solid fa-circle-check';
            }
        } else {
            element.classList.remove('valid');
            if (icon) {
                icon.className = 'fa-regular fa-circle-dot';
            }
        }
    }
</script>
@endpush

@push('styles')
<style>
    .profile-avatar-container {
        width: 130px !important;
        height: 130px !important;
        margin: 0 auto 16px !important;
        position: relative !important;
    }
    .profile-avatar-frame {
        width: 100% !important;
        height: 100% !important;
        border-radius: 50% !important;
        border: 3px solid #e2e8f0 !important;
        background-color: #ffffff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        overflow: hidden !important;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08) !important;
        position: relative !important;
        transition: all 0.25s ease !important;
    }
    .profile-avatar-frame:hover {
        border-color: #EF801C !important;
        box-shadow: 0 6px 24px rgba(239, 128, 28, 0.22) !important;
    }
    .profile-avatar-frame.has-image {
        background-color: #ffffff !important;
    }
    /* Mode 1 (Default): Fit - perfectly proportioned with 15px padding for logos */
    .profile-avatar-frame img {
        width: 76% !important;
        height: 76% !important;
        max-width: 76% !important;
        max-height: 76% !important;
        object-fit: contain !important;
        object-position: center !important;
        display: block !important;
        margin: auto !important;
        border-radius: 0 !important;
        background-color: transparent !important;
        transition: all 0.25s ease !important;
    }
    /* Mode 2: Fill - edge-to-edge for user face photos */
    .profile-avatar-frame.mode-fill img {
        width: 100% !important;
        height: 100% !important;
        max-width: 100% !important;
        max-height: 100% !important;
        object-fit: cover !important;
        border-radius: 50% !important;
    }
    .avatar-mode-pill {
        border: none;
        background: transparent;
        padding: 4px 11px;
        font-size: 0.72rem;
        font-weight: 600;
        color: var(--muted-foreground);
        border-radius: 16px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }
    .avatar-mode-pill:hover {
        color: var(--foreground);
    }
    .avatar-mode-pill.active {
        background: #ffffff;
        color: #EF801C;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.12);
    }
    .profile-avatar-frame #avatarInitialPreview {
        width: 100% !important;
        height: 100% !important;
        align-items: center;
        justify-content: center;
        font-size: 3rem !important;
        font-weight: 700 !important;
        color: var(--accent-foreground, #EF801C) !important;
        background: linear-gradient(135deg, rgba(239, 128, 28, 0.12), rgba(239, 128, 28, 0.28)) !important;
        user-select: none !important;
    }
    .profile-camera-trigger {
        position: absolute !important;
        bottom: 2px !important;
        right: 2px !important;
        width: 36px !important;
        height: 36px !important;
        border: 2.5px solid #ffffff !important;
        background: #EF801C !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.18) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        z-index: 10 !important;
        transition: transform 0.2s ease, background-color 0.2s ease !important;
    }
    .profile-camera-trigger:hover {
        transform: scale(1.1) !important;
        background-color: #e07212 !important;
    }
</style>
@endpush
