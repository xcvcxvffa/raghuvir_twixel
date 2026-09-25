<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Website Inquiry</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; -webkit-font-smoothing: antialiased; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f4f6f9; padding: 40px 10px; }
        .main-card { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
        .header { background: linear-gradient(135deg, #EF801C 0%, #74583D 100%); padding: 32px 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 22px; font-weight: 800; letter-spacing: -0.02em; }
        .header p { margin: 6px 0 0; font-size: 13px; opacity: 0.92; }
        .badge { display: inline-block; background: rgba(255,255,255,0.22); color: #ffffff; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 3px 10px; border-radius: 9999px; margin-bottom: 8px; letter-spacing: 0.05em; }
        .body-content { padding: 32px 30px; }
        .lead-meta-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .lead-meta-table th { text-align: left; padding: 10px 12px; font-size: 12px; text-transform: uppercase; color: #64748b; font-weight: 700; border-bottom: 1px solid #e2e8f0; width: 35%; }
        .lead-meta-table td { padding: 10px 12px; font-size: 14px; font-weight: 600; color: #0f172a; border-bottom: 1px solid #f1f5f9; }
        .message-box { background-color: #fffaf5; border: 1px solid #fed7aa; border-radius: 12px; padding: 18px 20px; margin-bottom: 26px; }
        .message-title { font-size: 12px; font-weight: 800; text-transform: uppercase; color: #c2410c; margin-bottom: 6px; letter-spacing: 0.03em; }
        .message-body { font-size: 14px; color: #334155; line-height: 1.6; white-space: pre-wrap; font-style: italic; }
        .actions-wrap { text-align: center; padding-top: 10px; }
        .btn { display: inline-block; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 13px; margin: 4px; }
        .btn-primary { background-color: #EF801C; color: #ffffff !important; }
        .btn-whatsapp { background-color: #25D366; color: #ffffff !important; }
        .footer { background-color: #f8fafc; padding: 20px 30px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <!-- Header -->
            <div class="header">
                <span class="badge">Live Website Lead Alert</span>
                <h1>New Customer Inquiry Received</h1>
                <p>A new customer filled out a contact / inquiry form on Raghuvir Atta official portal.</p>
            </div>

            <!-- Body -->
            <div class="body-content">
                <table class="lead-meta-table">
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $lead->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $lead->phone ?? '') }}" style="color: #EF801C; text-decoration: none;">
                                {{ $lead->phone ?? 'N/A' }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>
                            @if(!empty($lead->email))
                                <a href="mailto:{{ $lead->email }}" style="color: #0284c7; text-decoration: none;">
                                    {{ $lead->email }}
                                </a>
                            @else
                                <span style="color: #94a3b8;">Not provided</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Product Interest</th>
                        <td><span style="color: #EF801C; font-weight: 800;">{{ $lead->product_interest ?: 'General Flour Inquiry' }}</span></td>
                    </tr>
                    @if(!empty($lead->quantity))
                        <tr>
                            <th>Estimated Quantity</th>
                            <td>{{ $lead->quantity }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Submission Source</th>
                        <td><span style="background: #f1f5f9; padding: 2px 8px; border-radius: 4px; font-size: 12px; font-family: monospace;">{{ $lead->source ?: 'contact_page' }}</span></td>
                    </tr>
                    <tr>
                        <th>Received At</th>
                        <td>{{ now()->format('d M Y, h:i A') }} (IST)</td>
                    </tr>
                </table>

                <!-- Message Box -->
                @if(!empty($lead->message))
                    <div class="message-box">
                        <div class="message-title">Customer Message / Note:</div>
                        <div class="message-body">"{{ $lead->message }}"</div>
                    </div>
                @endif

                <!-- Direct Actions -->
                <div class="actions-wrap">
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone ?? '');
                        $waText = urlencode("Hello " . ($lead->name ?? 'Sir/Madam') . ", thank you for contacting Raghuvir Atta regarding " . ($lead->product_interest ?: 'our products') . ". We are reviewing your inquiry.");
                    @endphp

                    @if(!empty($cleanPhone))
                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" class="btn btn-whatsapp" target="_blank">
                            💬 Chat on WhatsApp
                        </a>
                        <a href="tel:{{ $cleanPhone }}" class="btn btn-primary">
                            📞 Call {{ $lead->name }}
                        </a>
                    @endif
                    <a href="{{ url('/admin/leads') }}" class="btn" style="background:#f1f5f9; color:#475569 !important;">
                        Open Admin CRM
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                This is an automated notification sent by <strong>Raghuvir Atta Admin Portal</strong>.<br>
                To adjust notifications or recipients, visit Admin &gt; System &amp; Settings &gt; Email Configuration.
            </div>
        </div>
    </div>
</body>
</html>
