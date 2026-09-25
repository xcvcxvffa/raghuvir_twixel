<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('warning', 'Please sign in to access the Admin Panel.');
        }

        if (!$request->user()->isAdmin()) {
            \Illuminate\Support\Facades\Log::warning('Security: Unauthorized admin panel access attempt intercepted', [
                'user_id' => $request->user()?->id,
                'email' => $request->user()?->email,
                'role' => $request->user()?->role,
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')->withErrors([
                'email' => 'Access denied. You do not have administrator privileges.',
            ]);
        }

        return $next($request);
    }
}
