<?php

namespace App\Services;

use App\Mail\AdminInquiryNotification;
use App\Mail\CustomerInquiryAutoReply;
use App\Mail\TestConnectionMail;
use App\Models\Lead;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DynamicMailService
{
    /**
     * Check if dynamic SMTP configuration is complete.
     */
    public static function isConfigured(): bool
    {
        $host = Setting::get('mail_host', config('mail.mailers.smtp.host'));
        $username = Setting::get('mail_username', config('mail.mailers.smtp.username'));

        return !empty($host) && !empty($username);
    }

    /**
     * Apply dynamic mail settings from the database or provided overrides into Laravel runtime configuration.
     *
     * @param array<string, mixed> $overrides
     * @return bool Returns true if mailer was configured with host & username.
     */
    public static function configureRuntimeMailer(array $overrides = []): bool
    {
        $mailer = $overrides['mail_mailer'] ?? Setting::get('mail_mailer', 'smtp');
        $host = $overrides['mail_host'] ?? Setting::get('mail_host', config('mail.mailers.smtp.host'));
        $port = $overrides['mail_port'] ?? Setting::get('mail_port', config('mail.mailers.smtp.port', 587));
        $username = $overrides['mail_username'] ?? Setting::get('mail_username', config('mail.mailers.smtp.username'));

        // If password is not provided in overrides, fall back to database password
        $password = array_key_exists('mail_password', $overrides) && $overrides['mail_password'] !== null && $overrides['mail_password'] !== ''
            ? $overrides['mail_password']
            : Setting::get('mail_password', config('mail.mailers.smtp.password'));

        $encryption = $overrides['mail_encryption'] ?? Setting::get('mail_encryption', config('mail.mailers.smtp.encryption', 'tls'));
        $fromAddress = $overrides['mail_from_address'] ?? Setting::get('mail_from_address', config('mail.from.address', 'info@raghuviratta.com'));
        $fromName = $overrides['mail_from_name'] ?? Setting::get('mail_from_name', config('mail.from.name', 'Raghuvir Atta'));

        // Handle 'none' or null encryption
        $cleanEncryption = in_array(strtolower((string)$encryption), ['tls', 'ssl'], true) ? strtolower($encryption) : null;
        $scheme = $cleanEncryption === 'ssl' || (int)$port === 465 ? 'smtps' : 'smtp';

        Config::set('mail.default', $mailer ?: 'smtp');
        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.scheme', $scheme);
        Config::set('mail.mailers.smtp.host', $host);
        Config::set('mail.mailers.smtp.port', (int) ($port ?: 587));
        Config::set('mail.mailers.smtp.encryption', $cleanEncryption);
        Config::set('mail.mailers.smtp.username', $username);
        Config::set('mail.mailers.smtp.password', $password);
        Config::set('mail.mailers.smtp.timeout', 20);

        // SSL peer verification (support bypass for local development or self-signed certs)
        $verifyPeer = $overrides['mail_verify_peer'] ?? Setting::get('mail_verify_peer', app()->environment('local') ? '0' : '1');
        Config::set('mail.mailers.smtp.verify_peer', $verifyPeer === '1' || $verifyPeer === true);

        if (!empty($fromAddress)) {
            Config::set('mail.from.address', $fromAddress);
            Config::set('mail.from.name', $fromName ?: 'Raghuvir Atta');
        }

        // Purge existing mailer instance so Laravel reconnects with the fresh runtime configuration
        Mail::purge('smtp');
        Mail::purge();

        return !empty($host) && !empty($username);
    }

    /**
     * Get list of admin recipient email addresses configured in settings.
     *
     * @return array<int, string>
     */
    public static function getAdminRecipients(): array
    {
        $raw = Setting::get('mail_admin_recipients', Setting::get('contact_email', 'info@raghuviratta.com'));
        if (empty($raw)) {
            return [];
        }

        $emails = array_map('trim', explode(',', (string)$raw));
        return array_values(array_filter($emails, fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL)));
    }

    /**
     * Safely dispatch lead emails (admin alerts and customer auto-replies) without failing lead storage.
     *
     * @param Lead $lead
     * @return bool
     */
    public static function sendSafely(Lead $lead): bool
    {
        // If SMTP credentials have not been configured yet, skip without failing or throwing error
        if (!self::isConfigured()) {
            Log::info('DynamicMailService: Lead stored safely. Email notification skipped as SMTP is not yet configured.');
            return false;
        }

        try {
            self::configureRuntimeMailer();

            // 1. Send Admin Alert Notification if enabled (default ON)
            $enableAdminAlerts = Setting::get('mail_enable_admin_alerts', '1') === '1';
            if ($enableAdminAlerts) {
                $recipients = self::getAdminRecipients();
                if (!empty($recipients)) {
                    Mail::mailer('smtp')->to($recipients)->send(new AdminInquiryNotification($lead));
                }
            }

            // 2. Send Customer Auto-Reply if enabled (default ON) and customer has an email
            $enableAutoReply = Setting::get('mail_enable_auto_reply', '1') === '1';
            if ($enableAutoReply && !empty($lead->email) && filter_var($lead->email, FILTER_VALIDATE_EMAIL)) {
                Mail::mailer('smtp')->to($lead->email)->send(new CustomerInquiryAutoReply($lead));
            }

            return true;
        } catch (\Throwable $e) {
            Log::warning('DynamicMailService: Failed to dispatch lead notification email: ' . $e->getMessage(), [
                'lead_id' => $lead->id ?? null,
                'lead_email' => $lead->email ?? null,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return false;
        }
    }

    /**
     * Dispatch any generic mailable safely to given recipients.
     *
     * @param mixed $mailable
     * @param string|array<int, string> $recipients
     * @return bool
     */
    public static function sendRawSafely(mixed $mailable, string|array $recipients): bool
    {
        try {
            self::configureRuntimeMailer();

            Mail::mailer('smtp')->to($recipients)->send($mailable);

            return true;
        } catch (\Throwable $e) {
            Log::warning('DynamicMailService: Failed to dispatch custom email: ' . $e->getMessage(), [
                'recipients' => $recipients,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return false;
        }
    }

    /**
     * Send a live test email using current or custom parameters.
     *
     * @param string $recipient
     * @param array<string, mixed> $overrides
     * @return array{success: bool, message: string, raw_error?: string}
     */
    public static function sendTest(string $recipient, array $overrides = []): array
    {
        try {
            self::configureRuntimeMailer($overrides);

            $host = config('mail.mailers.smtp.host');
            $port = config('mail.mailers.smtp.port');
            $username = config('mail.mailers.smtp.username');
            $password = config('mail.mailers.smtp.password');

            if (empty($host)) {
                return [
                    'success' => false,
                    'message' => 'SMTP Host is missing. Please enter your SMTP server host (e.g., smtp.gmail.com).',
                ];
            }

            if (empty($username)) {
                return [
                    'success' => false,
                    'message' => 'SMTP Username is missing. Please enter your email address or username.',
                ];
            }

            if (empty($password)) {
                return [
                    'success' => false,
                    'message' => 'SMTP Password is missing. Please enter your SMTP password or 16-letter Google App Password.',
                ];
            }

            $details = [
                'host' => $host,
                'port' => $port,
                'encryption' => config('mail.mailers.smtp.encryption'),
                'username' => $username,
                'from_address' => config('mail.from.address'),
                'from_name' => config('mail.from.name'),
            ];

            Mail::mailer('smtp')->to($recipient)->send(new TestConnectionMail($details));

            return [
                'success' => true,
                'message' => 'Connection verified! Test email successfully sent to ' . $recipient . '. Please check your inbox (and spam folder).',
            ];
        } catch (\Throwable $e) {
            $rawMsg = $e->getMessage();
            Log::error('DynamicMailService: Test email failed: ' . $rawMsg);

            $friendlyMsg = self::diagnoseError(
                $rawMsg,
                (string) config('mail.mailers.smtp.host', ''),
                (int) config('mail.mailers.smtp.port', 587)
            );

            return [
                'success' => false,
                'message' => $friendlyMsg,
                'raw_error' => $rawMsg,
            ];
        }
    }

    /**
     * Diagnose low-level SMTP socket exceptions and turn them into clear, actionable advice.
     */
    public static function diagnoseError(string $raw, string $host, int $port): string
    {
        // 1. Google / Authentication failures
        if (str_contains($raw, '535') || str_contains($raw, 'Username and Password not accepted') || str_contains($raw, 'BadCredentialsException')) {
            return 'Authentication Failed (Code 535): Invalid username or password. If you are using Gmail or Google Workspace, you MUST generate and use a 16-character "Google App Password" (with 2-Step Verification turned ON) instead of your regular Google account password.';
        }

        // 2. Authentication required
        if (str_contains($raw, '530') || str_contains($raw, 'Authentication Required') || str_contains($raw, 'Must issue a STARTTLS command first')) {
            return 'Authentication Required (Code 530): The SMTP server requires authentication. Please provide both SMTP Username and Password, and verify that the security protocol is set correctly (TLS on port 587, or SSL on port 465).';
        }

        // 3. Connection timed out or host unreachable
        if (str_contains($raw, 'Connection timed out') || str_contains($raw, 'Operation timed out') || str_contains($raw, 'Connection could not be established')) {
            return "Connection Timed Out: Could not connect to {$host} on port {$port}. Your hosting provider or ISP might be blocking outgoing SMTP traffic. Try port 465 with SSL, or port 587 with TLS.";
        }

        // 4. Connection refused
        if (str_contains($raw, 'Connection refused')) {
            return "Connection Refused: The server {$host} actively rejected the connection on port {$port}. Please double-check the server host address and port number.";
        }

        // 5. SSL / TLS Certificate issues
        if (str_contains($raw, 'certificate verify failed') || str_contains($raw, 'SSL operation failed') || str_contains($raw, 'unable to get local issuer certificate')) {
            return "SSL Certificate Verification Failed: Could not verify the SSL certificate of {$host}. If you are on localhost or a shared host with custom certificates, verify that your server has a valid CA bundle or use TLS on port 587.";
        }

        // 6. Sender address rejected
        if (str_contains($raw, 'Sender address rejected') || str_contains($raw, 'From address')) {
            return 'Sender Address Rejected: The SMTP server did not accept the "From" address. Ensure the Sender Email Address matches your authenticated SMTP login domain.';
        }

        return 'SMTP Connection Error: ' . $raw;
    }
}
