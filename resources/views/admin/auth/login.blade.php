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

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Admin Base CSS (for theme variables) -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin.css') }}?v={{ file_exists(public_path('admin-assets/css/admin.css')) ? filemtime(public_path('admin-assets/css/admin.css')) : time() }}">

    <style>
        /* ==========================================================================
           RAGHUVIR ATTA — CLEAN PROFESSIONAL ADMIN LOGIN
           Minimal · Centered · Elegant
           ========================================================================== */

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body.login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #f0f2f5;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        html.dark body.login-page {
            background: #0c111b;
        }

        /* Subtle background pattern */
        body.login-page::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(239, 128, 28, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.04) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        html.dark body.login-page::before {
            background-image:
                radial-gradient(circle at 20% 20%, rgba(239, 128, 28, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(30, 58, 138, 0.12) 0%, transparent 50%);
        }

        /* ── Theme Toggle (Top Right Corner) ──────────────────────────── */
        .login-theme-toggle {
            position: fixed;
            top: 1.25rem;
            right: 1.25rem;
            z-index: 100;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid var(--border, #e2e8f0);
            background: var(--card, #ffffff);
            color: var(--foreground, #1e293b);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }

        .login-theme-toggle:hover {
            border-color: #EF801C;
            color: #EF801C;
            transform: scale(1.05);
        }

        html.dark .login-theme-toggle {
            background: #1e293b;
            border-color: rgba(255,255,255,0.1);
            color: #e2e8f0;
        }

        /* ── Login Card ───────────────────────────────────────────────── */
        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            background: var(--card, #ffffff);
            border: 1px solid var(--border, #e2e8f0);
            border-radius: 16px;
            padding: 2.5rem 2.25rem 2rem;
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.05),
                0 10px 30px -5px rgba(0, 0, 0, 0.08);
            animation: cardFadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        html.dark .login-card {
            background: #1e293b;
            border-color: rgba(255, 255, 255, 0.08);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.2),
                0 10px 30px -5px rgba(0, 0, 0, 0.3);
        }

        @keyframes cardFadeIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Logo & Header ────────────────────────────────────────────── */
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo {
            height: 44px;
            width: auto;
            margin-bottom: 1.25rem;
            object-fit: contain;
        }

        html.dark .login-logo {
            filter: brightness(0) invert(1);
        }

        .login-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--foreground, #1e293b);
            margin-bottom: 0.35rem;
            letter-spacing: -0.01em;
        }

        .login-subtitle {
            font-size: 0.835rem;
            color: var(--muted-foreground, #64748b);
            line-height: 1.5;
        }

        /* ── Error Alert ──────────────────────────────────────────────── */
        .login-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 0.7rem 0.85rem;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
            animation: errorShake 0.35s ease;
        }

        html.dark .login-error {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.25);
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }

        /* ── Form Fields ──────────────────────────────────────────────── */
        .form-group {
            margin-bottom: 1.15rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--foreground, #1e293b);
            margin-bottom: 0.4rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            color: var(--muted-foreground, #94a3b8);
            font-size: 0.88rem;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-control {
            width: 100%;
            height: 44px;
            padding: 0 13px 0 40px;
            font-family: inherit;
            font-size: 0.875rem;
            color: var(--foreground, #1e293b);
            background: var(--background, #f0f2f5);
            border: 1.5px solid var(--border, #e2e8f0);
            border-radius: 10px;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control::placeholder {
            color: var(--muted-foreground, #94a3b8);
        }

        html.dark .form-control {
            background: rgba(15, 23, 42, 0.5);
            border-color: rgba(255, 255, 255, 0.1);
            color: #f1f5f9;
        }

        .form-control:focus {
            border-color: #EF801C;
            background: var(--card, #ffffff);
            box-shadow: 0 0 0 3px rgba(239, 128, 28, 0.15);
        }

        html.dark .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
        }

        .input-wrapper:focus-within .input-icon {
            color: #EF801C;
        }

        .pwd-toggle {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            color: var(--muted-foreground, #94a3b8);
            cursor: pointer;
            padding: 5px;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            transition: color 0.2s ease;
        }

        .pwd-toggle:hover { color: #EF801C; }

        /* ── Options Row ──────────────────────────────────────────────── */
        .options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1rem 0 1.35rem;
            font-size: 0.8rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            color: var(--foreground, #334155);
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #EF801C;
            cursor: pointer;
            border-radius: 3px;
        }

        .forgot-link {
            color: #EF801C;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.2s;
        }

        .forgot-link:hover { opacity: 0.8; text-decoration: underline; }

        /* ── Submit Button ─────────────────────────────────────────────── */
        .btn-login {
            width: 100%;
            height: 44px;
            background: #EF801C;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(239, 128, 28, 0.25);
        }

        .btn-login:hover {
            background: #d97010;
            box-shadow: 0 4px 14px rgba(239, 128, 28, 0.35);
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* ── Divider ──────────────────────────────────────────────────── */
        .login-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.25rem 0;
            color: var(--muted-foreground, #94a3b8);
            font-size: 0.72rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border, #e2e8f0);
        }

        /* ── Quick Access Pill ─────────────────────────────────────────── */
        .quick-access {
            background: var(--secondary, #f8fafc);
            border: 1px dashed var(--border, #cbd5e1);
            border-radius: 10px;
            padding: 0.7rem 0.85rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        html.dark .quick-access {
            background: rgba(30, 41, 59, 0.4);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .quick-info {
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .quick-title {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--foreground, #1e293b);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .quick-title i { color: #EF801C; font-size: 0.7rem; }

        .quick-code {
            font-size: 0.7rem;
            color: var(--muted-foreground, #64748b);
            font-family: 'SF Mono', 'Fira Code', monospace;
        }

        .btn-quick-fill {
            background: transparent;
            border: 1px solid var(--border, #e2e8f0);
            color: #EF801C;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .btn-quick-fill:hover {
            background: #EF801C;
            color: #ffffff;
            border-color: #EF801C;
        }

        /* ── Footer ───────────────────────────────────────────────────── */
        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.72rem;
            color: var(--muted-foreground, #94a3b8);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .login-footer i { color: #10b981; }

        .login-footer a {
            color: #EF801C;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover { text-decoration: underline; }

        /* ── Responsive ───────────────────────────────────────────────── */
        @media (max-width: 480px) {
            .login-card {
                padding: 2rem 1.5rem 1.5rem;
                border-radius: 14px;
            }

            .login-title { font-size: 1.2rem; }

            .options-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body class="login-page">

    <!-- Theme Toggle -->
    <button type="button" class="login-theme-toggle" id="themeToggleBtn" title="Toggle Theme" aria-label="Toggle Dark/Light Mode">
        <i class="fa-solid fa-moon" id="themeIcon"></i>
    </button>

    <!-- Login Card -->
    <div class="login-card">

        <!-- Header -->
        <div class="login-header">
            <img src="{{ asset('images/Raghuvir Logo.png') }}" alt="Raghuvir Atta" class="login-logo">
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Sign in to your admin dashboard</p>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="login-error" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" id="loginForm" autocomplete="on">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="admin@raghuvir.com"
                        value="{{ old('email', 'admin@raghuvir.com') }}"
                        required
                        autofocus
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Enter your password"
                        value="Admin@12345"
                        required
                    >
                    <button type="button" class="pwd-toggle" onclick="togglePassword()" id="pwdToggleBtn" title="Show/Hide password">
                        <i class="fa-regular fa-eye" id="pwdToggleIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Remember & Link -->
            <div class="options-row">
                <label class="remember-label" for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember', '1') ? 'checked' : '' }}>
                    <span>Remember me</span>
                </label>
                <a href="{{ url('/') }}" target="_blank" class="forgot-link">
                    Visit Website <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.68rem;"></i>
                </a>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-login" id="loginSubmitBtn">
                <span id="btnText">Sign In</span>
                <i class="fa-solid fa-arrow-right" id="btnIcon"></i>
            </button>
        </form>

        <!-- Divider -->
        <div class="login-divider">Quick Access</div>

        <!-- Quick Fill -->
        <div class="quick-access">
            <div class="quick-info">
                <span class="quick-title">
                    <i class="fa-solid fa-key"></i>
                    Default Credentials
                </span>
                <span class="quick-code">admin@raghuvir.com &bull; Admin@12345</span>
            </div>
            <button type="button" class="btn-quick-fill" onclick="autoFillCredentials()" title="Auto-fill credentials">
                <i class="fa-solid fa-bolt-lightning"></i>
                Fill
            </button>
        </div>

        <!-- Footer -->
        <div class="login-footer">
            <span><i class="fa-solid fa-shield-halved"></i> Secure Login</span>
            <span>&bull;</span>
            <span>&copy; {{ date('Y') }} <a href="{{ url('/') }}">Raghuvir Atta</a></span>
        </div>
    </div>

    <!-- Admin JS -->
    <script src="{{ asset('admin-assets/js/admin.js') }}?v={{ file_exists(public_path('admin-assets/js/admin.js')) ? filemtime(public_path('admin-assets/js/admin.js')) : time() }}"></script>

    <script>
        // Password Toggle
        function togglePassword() {
            const pwdInput = document.getElementById('password');
            const pwdIcon = document.getElementById('pwdToggleIcon');
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                pwdIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                pwdInput.type = 'password';
                pwdIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Auto Fill
        function autoFillCredentials() {
            const emailInput = document.getElementById('email');
            const pwdInput = document.getElementById('password');

            emailInput.value = 'admin@raghuvir.com';
            pwdInput.value = 'Admin@12345';

            [emailInput, pwdInput].forEach(el => {
                el.style.borderColor = '#EF801C';
                el.style.backgroundColor = 'rgba(239, 128, 28, 0.06)';
                setTimeout(() => {
                    el.style.borderColor = '';
                    el.style.backgroundColor = '';
                }, 500);
            });

            if (typeof window.showSonnerToast === 'function') {
                window.showSonnerToast({ message: 'Credentials filled!', type: 'success' });
            }
        }

        // Submit Loading State
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('loginSubmitBtn');
            const text = document.getElementById('btnText');
            const icon = document.getElementById('btnIcon');

            btn.disabled = true;
            text.textContent = 'Signing in...';
            icon.className = 'fa-solid fa-spinner fa-spin';
        });

        // Flash Toasts
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                if (window.showSonnerToast) window.showSonnerToast({ message: "{{ addslashes(session('success')) }}", type: 'success' });
            @elseif(session('error'))
                if (window.showSonnerToast) window.showSonnerToast({ message: "{{ addslashes(session('error')) }}", type: 'error' });
            @elseif(session('info'))
                if (window.showSonnerToast) window.showSonnerToast({ message: "{{ addslashes(session('info')) }}", type: 'info' });
            @elseif(session('warning'))
                if (window.showSonnerToast) window.showSonnerToast({ message: "{{ addslashes(session('warning')) }}", type: 'warning' });
            @endif
        });
    </script>
</body>
</html>
