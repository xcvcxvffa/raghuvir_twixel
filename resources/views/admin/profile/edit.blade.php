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

<!-- Alerts for Success or Validation -->
@if(session('success'))
    <div class="syndron-alert syndron-alert-success">
        <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('info'))
    <div class="syndron-alert" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.25);">
        <i class="fa-solid fa-circle-info" style="font-size: 1.1rem;"></i>
        <span>{{ session('info') }}</span>
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
                    <div class="profile-avatar-frame" id="avatarPreviewFrame">
                        @if($user->getAvatarUrl())
                            <img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->name }}" id="avatarImgPreview">
                        @else
                            <span id="avatarInitialPreview">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
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
                <div style="margin-bottom: 1.25rem;">
                    <span class="profile-verified-badge">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>{{ ucfirst($user->role ?? 'Super Administrator') }}</span>
                    </span>
                </div>

                <!-- Remove Photo Option if avatar exists -->
                @if($user->avatar)
                    <form action="{{ route('admin.profile.avatar.remove') }}" method="POST" style="margin-bottom: 1.25rem;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-icon-btn delete" style="width: auto; height: auto; padding: 5px 12px; font-size: 0.775rem; border-radius: var(--radius-sm); gap: 6px; display: inline-flex;" onclick="return confirm('Are you sure you want to remove your profile photo?');">
                            <i class="fa-solid fa-trash-can"></i>
                            <span>Remove Photo</span>
                        </button>
                    </form>
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
            const reader = new FileReader();

            reader.onload = function (e) {
                const previewFrame = document.getElementById('avatarPreviewFrame');
                if (previewFrame) {
                    previewFrame.innerHTML = '<img src="' + e.target.result + '" alt="Avatar Preview" style="width: 100%; height: 100%; object-fit: cover;">';
                }
            };
            reader.readAsDataURL(file);

            // Auto-submit the upload form
            document.getElementById('avatarUploadForm').submit();
        }
    }

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
