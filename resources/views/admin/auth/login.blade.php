<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Raghuvir Atta</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Raghuvir Favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Raghuvir Favicon.png') }}">

    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin.css') }}?v={{ file_exists(public_path('admin-assets/css/admin.css')) ? filemtime(public_path('admin-assets/css/admin.css')) : time() }}">
</head>
<body class="admin-login-body">
    <!-- Theme Toggle at Top Right of Login Page -->
    <div style="position: absolute; top: 1.5rem; right: 1.5rem; z-index: 20;">
        <button type="button" class="icon-btn-action" id="themeToggleBtn" title="Toggle Dark/Light Mode" style="background: var(--card);">
            <i class="fa-solid fa-moon" id="themeIcon"></i>
        </button>
    </div>

    <div class="login-bg-shape-1"></div>
    <div class="login-bg-shape-2"></div>

    <div class="login-container">
        <div class="login-card">
            <!-- Brand Header -->
            <div class="login-brand-header">
                <a href="{{ url('/') }}" style="display: inline-block; text-decoration: none;">
                    <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="Raghuvir Atta" class="admin-brand-logo logo-color-mode" style="height: 54px; margin: 0 auto 1.25rem;">
                    <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="Raghuvir Atta" class="admin-brand-logo logo-white-mode" style="height: 54px; margin: 0 auto 1.25rem;">
                </a>
                <h1 class="login-title">Admin Portal</h1>
                <p class="login-subtitle">Syndron UI Next &bull; Sign in to manage your website</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('admin.login.submit') }}" method="POST" autocomplete="off">
                @csrf

                <!-- Email Input -->
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

                <!-- Password Input -->
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

                <!-- Remember & Forgot -->
                <div class="login-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : 'checked' }}>
                        <span>Remember me</span>
                    </label>
                    <a href="{{ url('/') }}" style="color: var(--accent); text-decoration: none; font-weight: 600;">
                        Live Website &rarr;
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login-submit">
                    <span>Sign In to Dashboard</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <!-- Quick Demo Credentials Box -->
            <div class="demo-credentials-box">
                <strong><i class="fa-solid fa-shield-halved"></i> Default Credentials:</strong>
                <div>Email: <code>admin@raghuvir.com</code></div>
                <div>Password: <code>Admin@12345</code></div>
            </div>
        </div>
    </div>

    <!-- Admin JS -->
    <script src="{{ asset('admin-assets/js/admin.js') }}?v={{ file_exists(public_path('admin-assets/js/admin.js')) ? filemtime(public_path('admin-assets/js/admin.js')) : time() }}"></script>

    <!-- Sonner Stacked Toast Notification Trigger (ShadCN style) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('success')) }}",
                    type: 'success'
                });
            @elseif(session('error'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('error')) }}",
                    type: 'error'
                });
            @elseif(session('info'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('info')) }}",
                    type: 'info'
                });
            @elseif(session('warning'))
                window.showSonnerToast({
                    message: "{{ addslashes(session('warning')) }}",
                    type: 'warning'
                });
            @elseif($errors->any())
                window.showSonnerToast({
                    message: "{{ addslashes($errors->first()) }}",
                    type: 'error'
                });
            @endif
        });
    </script>
</body>
</html>
