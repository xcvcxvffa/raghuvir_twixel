<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTP Connection Test Successful</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f7fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #333333; line-height: 1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f7fa; padding: 40px 15px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); border: 1px solid #e5e9f0;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 32px 30px; text-align: center;">
                            <div style="display: inline-block; width: 56px; height: 56px; line-height: 56px; background-color: rgba(255, 255, 255, 0.2); border-radius: 50%; font-size: 28px; margin-bottom: 12px;">
                                ✅
                            </div>
                            <h1 style="color: #ffffff; font-size: 22px; font-weight: 700; margin: 0 0 6px 0; letter-spacing: -0.3px;">SMTP Test Successful!</h1>
                            <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Raghuvir ImpEx — Mail Configuration Diagnostic</p>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding: 32px 30px;">
                            <p style="font-size: 15px; color: #374151; margin-top: 0;">Hello Administrator,</p>
                            <p style="font-size: 14px; color: #4b5563; margin-bottom: 24px;">
                                This is a test email sent from your website's Admin Panel. Your SMTP configuration is verified and functioning normally.
                            </p>

                            <!-- Server Diagnostics Card -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; margin-bottom: 25px;">
                                <h3 style="font-size: 14px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 0 14px 0; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;">
                                    Connection Details
                                </h3>
                                <table width="100%" cellspacing="0" cellpadding="4" style="font-size: 13px;">
                                    <tr>
                                        <td style="color: #64748b; width: 140px; padding: 4px 0;"><strong>SMTP Host:</strong></td>
                                        <td style="color: #0f172a; font-family: monospace;">{{ $configData['host'] ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #64748b; padding: 4px 0;"><strong>Port / Encryption:</strong></td>
                                        <td style="color: #0f172a; font-family: monospace;">{{ $configData['port'] ?? 'N/A' }} ({{ strtoupper($configData['encryption'] ?? 'None') }})</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #64748b; padding: 4px 0;"><strong>Sender:</strong></td>
                                        <td style="color: #0f172a;">{{ $configData['from_name'] ?? 'Raghuvir ImpEx' }} &lt;{{ $configData['from_address'] ?? 'N/A' }}&gt;</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #64748b; padding: 4px 0;"><strong>Timestamp:</strong></td>
                                        <td style="color: #0f172a;">{{ now()->setTimezone('Asia/Kolkata')->format('d M, Y - h:i:s A') }} IST</td>
                                    </tr>
                                </table>
                            </div>

                            <div style="background-color: #ecfdf5; border-left: 4px solid #10b981; padding: 14px; border-radius: 6px; font-size: 13px; color: #065f46;">
                                💡 <strong>You are good to go!</strong> Customer inquiries submitted via the Contact Us page or product inquiry modals will now reliably trigger email notifications to your team and auto-replies to prospective clients.
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 30px; text-align: center; font-size: 12px; color: #94a3b8;">
                            Sent from <strong>Raghuvir ImpEx Admin Dashboard</strong> &bull; {{ config('app.url') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
