<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\DynamicMailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailSettingController extends Controller
{
    /**
     * Display the email settings page.
     */
    public function index(): View
    {
        $settings = Setting::where('group', 'email')->get()->keyBy('key');

        return view('admin.settings.email', [
            'settings' => $settings,
            'isConfigured' => DynamicMailService::isConfigured(),
        ]);
    }

    /**
     * Update email configuration settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mail_mailer' => 'nullable|string|max:50',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|numeric|between:1,65535',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|in:tls,ssl,none',
            'mail_from_address' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255',
            'mail_admin_recipients' => 'nullable|string|max:500',
        ]);

        $fields = [
            'mail_mailer' => ['type' => 'text', 'label' => 'Mail Driver (SMTP)'],
            'mail_host' => ['type' => 'text', 'label' => 'SMTP Host'],
            'mail_port' => ['type' => 'text', 'label' => 'SMTP Port'],
            'mail_username' => ['type' => 'text', 'label' => 'SMTP Username'],
            'mail_encryption' => ['type' => 'text', 'label' => 'SMTP Encryption'],
            'mail_from_address' => ['type' => 'email', 'label' => 'Sender Email Address'],
            'mail_from_name' => ['type' => 'text', 'label' => 'Sender Display Name'],
            'mail_admin_recipients' => ['type' => 'text', 'label' => 'Admin Alert Recipients'],
        ];

        foreach ($fields as $key => $meta) {
            $val = $request->input($key, '');
            Setting::set($key, trim($val ?? ''), 'email', $meta['type'], $meta['label']);
        }

        // Only update password if user entered a new one
        if ($request->filled('mail_password')) {
            Setting::set('mail_password', $request->input('mail_password'), 'email', 'password', 'SMTP Password');
        }

        // Toggles
        $enableAdminAlerts = $request->has('mail_enable_admin_alerts') ? '1' : '0';
        Setting::set('mail_enable_admin_alerts', $enableAdminAlerts, 'email', 'boolean', 'Enable Admin Lead Alerts');

        $enableAutoReply = $request->has('mail_enable_auto_reply') ? '1' : '0';
        Setting::set('mail_enable_auto_reply', $enableAutoReply, 'email', 'boolean', 'Enable Customer Auto-Replies');

        $verifyPeer = $request->has('mail_verify_peer') ? '1' : '0';
        Setting::set('mail_verify_peer', $verifyPeer, 'email', 'boolean', 'Verify SSL Certificate');

        return redirect()->route('admin.settings.email')
            ->with('success', 'Email configuration updated successfully.');
    }

    /**
     * Send a live test email to verify SMTP credentials.
     */
    public function sendTestEmail(Request $request): JsonResponse
    {
        $request->validate([
            'test_email' => 'required|email|max:255',
        ]);

        $recipient = $request->input('test_email');

        // Extract draft credentials from request if provided by live UI
        $overrides = [];
        foreach (['mail_mailer', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name', 'mail_verify_peer'] as $field) {
            if ($request->has($field) && $request->input($field) !== null && $request->input($field) !== '') {
                $overrides[$field] = $request->input($field);
            }
        }

        $result = DynamicMailService::sendTest($recipient, $overrides);

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $result['message'],
            'raw_error' => $result['raw_error'] ?? null,
        ], 422);
    }
}
