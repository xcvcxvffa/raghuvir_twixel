<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — Raghuvir Atta</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Raghuvir Favicon.png') }}">

    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin.css') }}?v={{ file_exists(public_path('admin-assets/css/admin.css')) ? filemtime(public_path('admin-assets/css/admin.css')) : time() }}">

    <style>
        /* Login page enter animation */
        .login-split-wrapper {
            animation: loginEnter 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
        @keyframes loginEnter {
            from { opacity: 0; transform: translateY(24px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        .login-form-panel { animation: formPanelIn 0.7s 0.12s cubic-bezier(0.16, 1, 0.3, 1) both; }
        @keyframes formPanelIn {
            from { opacity: 0; transform: translateX(16px); }
            to   { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body class="admin-login-body">

    <!-- Theme Toggle -->
    <div style="position: absolute; top: 1.5rem; right: 1.5rem; z-index: 50;">
        <button type="button" class="icon-btn-action" id="themeToggleBtn" title="Toggle Dark/Light Mode" style="background: var(--card); box-shadow: var(--shadow-md);">
            <i class="fa-solid fa-moon" id="themeIcon"></i>
        </button>
    </div>

    <!-- Ambient background shapes -->
    <div class="login-bg-shape-1"></div>
    <div class="login-bg-shape-2"></div>

    <!-- ===== SPLIT SCREEN WRAPPER ===== -->
    <div class="login-split-wrapper">

        <!-- ── Left Brand Panel ────────────────────────────────────────── -->
        <div class="login-brand-panel">
            <!-- Floating geometric rings -->
            <div class="login-brand-geo login-brand-geo-1"></div>
            <div class="login-brand-geo login-brand-geo-2"></div>
            <div class="login-brand-geo login-brand-geo-3"></div>

            <div class="login-brand-content">
                <!-- Brand Icon -->
                <div class="login-brand-icon">
                    <i class="fa-solid fa-wheat-awn"></i>
                </div>

                <!-- Logo (white version for dark background) -->
                <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="Raghuvir Atta" class="login-brand-logo-img" onerror="this.style.display='none'">

                <h1 class="login-brand-headline">Raghuvir Atta</h1>
                <p class="login-brand-tagline">
                    Premium chakki-fresh flour — manage your catalog, inquiries, gallery, and more from one powerful dashboard.
                </p>

                <!-- Feature bullets -->
                <div class="login-brand-features">
                    <div class="login-feature-row">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span>Product Catalog Management</span>
                    </div>
                    <div class="login-feature-row">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <span>Wholesale Leads & Inquiries</span>
                    </div>
                    <div class="login-feature-row">
                        <i class="fa-solid fa-photo-film"></i>
                        <span>Media Gallery & YouTube</span>
                    </div>
                    <div class="login-feature-row">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Live Analytics Dashboard</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ── Right Form Panel ────────────────────────────────────────── -->
        <div class="login-form-panel">
            <div class="login-form-header">
                <!-- Logo (color version for light/dark card bg) -->
                <a href="{{ url('/') }}" style="display: inline-block; text-decoration: none;">
                    <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="Raghuvir Atta" class="login-form-logo logo-color-mode">
                    <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="Raghuvir Atta" class="login-form-logo logo-white-mode" style="opacity:0.9;">
                </a>
                <h2 class="login-title">Admin Portal</h2>
                <p class="login-subtitle">Sign in to manage your website</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('admin.login.submit') }}" method="POST" autocomplete="off">
                @csrf

                @if ($errors->any())
                    <div class="syndron-alert syndron-alert-danger" style="margin-bottom: 1.25rem;">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Email -->
                <div class="form-group-admin">
                    <label for="email" class="form-label-admin">Email Address</label>
                    <div class="input-with-icon">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control-admin @error('email') is-invalid @enderror"
                            placeholder="admin@raghuvir.com"
                            value="{{ old('email', 'admin@raghuvir.com') }}"
                            required
                            autofocus
                        >
                        <i class="fa-regular fa-envelope input-icon"></i>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group-admin">
                    <label for="password" class="form-label-admin">Password</label>
                    <div class="input-with-icon">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control-admin @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            value="Admin@12345"
                            required
                        >
                        <i class="fa-solid fa-lock input-icon"></i>
                        <button type="button" class="password-toggle-btn" data-target="password" title="Show/Hide Password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember & Preview Link -->
                <div class="login-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : 'checked' }}>
                        <span>Remember me</span>
                    </label>
                    <a href="{{ url('/') }}" target="_blank" style="color: var(--accent); text-decoration: none; font-size: 0.82rem; font-weight: 600;">
                        Live Site <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.7rem;"></i>
                    </a>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-syndron btn-syndron-primary btn-login-submit">
                    <span>Sign In to Dashboard</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <!-- Credentials Box -->
            <div class="demo-credentials-box">
                <strong><i class="fa-solid fa-shield-halved"></i> Default Credentials</strong>
                <div>Email: <code>admin@raghuvir.com</code></div>
                <div>Password: <code>Admin@12345</code></div>
            </div>
        </div>
    </div>

    <!-- Admin JS (for theme toggle) -->
    <script src="{{ asset('admin-assets/js/admin.js') }}?v={{ file_exists(public_path('admin-assets/js/admin.js')) ? filemtime(public_path('admin-assets/js/admin.js')) : time() }}"></script>

    <!-- Session Flash Toasts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                window.showSonnerToast({ message: "{{ addslashes(session('success')) }}", type: 'success' });
            @elseif(session('error'))
                window.showSonnerToast({ message: "{{ addslashes(session('error')) }}", type: 'error' });
            @elseif(session('info'))
                window.showSonnerToast({ message: "{{ addslashes(session('info')) }}", type: 'info' });
            @elseif(session('warning'))
                window.showSonnerToast({ message: "{{ addslashes(session('warning')) }}", type: 'warning' });
            @elseif($errors->any())
                window.showSonnerToast({ message: "{{ addslashes($errors->first()) }}", type: 'error' });
            @endif
        });
    </script>
</body>
</html>
