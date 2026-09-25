<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle the admin login submission with hardened brute-force protection and security logging.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $ip = $request->ip();
        $accountThrottleKey = Str::transliterate(Str::lower($request->input('email')) . '|' . $ip);
        $ipThrottleKey = 'admin-login-ip:' . $ip;

        // Check 1: Account + IP limit (max 5 failed attempts within decay window)
        if (RateLimiter::tooManyAttempts($accountThrottleKey, 5)) {
            $seconds = RateLimiter::availableIn($accountThrottleKey);

            $this->logSecurityLockout($request, $accountThrottleKey, 'Account+IP threshold reached');

            return back()->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ]);
        }

        // Check 2: IP-wide limit to stop credential stuffing/password spraying (max 10 attempts per minute)
        if (RateLimiter::tooManyAttempts($ipThrottleKey, 10)) {
            $seconds = RateLimiter::availableIn($ipThrottleKey);

            $this->logSecurityLockout($request, $ipThrottleKey, 'IP-wide threshold reached');

            return back()->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => 'Too many login attempts from this network. Please wait ' . ceil($seconds / 60) . ' minute(s) before trying again.',
                ]);
        }

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Enforce administrator role check
            if (!$user->isAdmin()) {
                Log::warning('Security: Authenticated user lacks administrator privileges', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'ip' => $ip,
                    'user_agent' => $request->userAgent(),
                ]);

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                RateLimiter::hit($accountThrottleKey, 300);
                RateLimiter::hit($ipThrottleKey, 300);

                return back()->withInput($request->only('email'))
                    ->withErrors([
                        'email' => 'Access denied. You do not have administrator permissions.',
                    ]);
            }

            // Successful admin login
            RateLimiter::clear($accountThrottleKey);
            RateLimiter::clear($ipThrottleKey);
            $request->session()->regenerate();

            Log::info('Security: Admin user logged in successfully', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip,
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Welcome back, ' . $user->name . '!');
        }

        // Hit both rate limiters on failed attempt
        RateLimiter::hit($accountThrottleKey, 300); // 5-minute decay on lock
        RateLimiter::hit($ipThrottleKey, 60);

        Log::warning('Security: Failed admin login attempt', [
            'email' => $request->input('email'),
            'ip' => $ip,
            'user_agent' => $request->userAgent(),
        ]);

        return back()->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    }

    /**
     * Record security lockout and trigger alert notification.
     */
    protected function logSecurityLockout(Request $request, string $key, string $reason): void
    {
        Log::alert('Security: Admin login brute-force lockout triggered', [
            'key' => $key,
            'reason' => $reason,
            'email' => $request->input('email'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        try {
            if (class_exists(AdminNotification::class)) {
                AdminNotification::create([
                    'type' => 'security',
                    'title' => 'Suspicious Login Activity Blocked',
                    'message' => "Repeated failed login attempts from IP: {$request->ip()} targeting '{$request->input('email')}'. The attempt was throttled.",
                    'url' => route('admin.dashboard'),
                    'icon' => 'fa-shield-halved',
                    'icon_color' => '#ef4444',
                    'is_read' => false,
                ]);
            }
        } catch (\Throwable) {
            // Suppress notification errors to avoid breaking the throttle response
        }
    }

    /**
     * Log the admin user out of the application securely.
     */
    public function logout(Request $request): RedirectResponse
    {
        $userId = Auth::id();
        $email = Auth::user()?->email;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('Security: Admin logged out', [
            'user_id' => $userId,
            'email' => $email,
            'ip' => $request->ip(),
        ]);

        return redirect()->route('admin.login')
            ->with('info', 'You have been successfully logged out.');
    }
}
