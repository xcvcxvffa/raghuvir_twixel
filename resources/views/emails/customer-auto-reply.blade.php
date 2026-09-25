<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Raghuvir Atta</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; -webkit-font-smoothing: antialiased; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f4f6f9; padding: 40px 10px; }
        .main-card { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
        .header { background: linear-gradient(135deg, #EF801C 0%, #74583D 100%); padding: 36px 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.02em; }
        .header p { margin: 8px 0 0; font-size: 14px; opacity: 0.95; }
        .body-content { padding: 36px 32px; font-size: 15px; line-height: 1.65; color: #334155; }
        .greeting { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 16px; }
        .highlight-box { background: #fffaf5; border: 1px solid #fed7aa; border-radius: 12px; padding: 18px 20px; margin: 24px 0; }
        .highlight-box h3 { margin: 0 0 8px 0; font-size: 14px; color: #c2410c; text-transform: uppercase; letter-spacing: 0.04em; }
        .highlight-box ul { margin: 0; padding-left: 20px; font-size: 14px; color: #475569; }
        .highlight-box li { margin-bottom: 4px; }
        .signature { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0; font-size: 13px; color: #64748b; }
        .footer { background-color: #f8fafc; padding: 22px 30px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <!-- Header -->
            <div class="header">
                <h1>RAGHUVIR ATTA</h1>
                <p>Pure Chakki Fresh Atta &bull; Traditional Stone Ground Purity</p>
            </div>

            <!-- Body -->
            <div class="body-content">
                <div class="greeting">Hello {{ $lead->name ?? 'Valued Customer' }},</div>

                <p>
                    Thank you for reaching out to <strong>Raghuvir Atta</strong>. We have successfully received your inquiry regarding <strong>{{ $lead->product_interest ?: 'our premium flour products' }}</strong>.
                </p>

                <div class="highlight-box">
                    <h3>Summary of Your Request:</h3>
                    <ul>
                        <li><strong>Product:</strong> {{ $lead->product_interest ?: 'General Flour Inquiry' }}</li>
                        @if(!empty($lead->quantity))
                            <li><strong>Requirement / Quantity:</strong> {{ $lead->quantity }}</li>
                        @endif
                        <li><strong>Contact Phone:</strong> {{ $lead->phone }}</li>
                        <li><strong>Reference ID:</strong> #RAGH-{{ str_pad($lead->id, 5, '0', STR_PAD_LEFT) }}</li>
                    </ul>
                </div>

                <p>
                    Our customer support and wholesale distribution team in Ahmedabad is reviewing your requirements. A representative will contact you directly via phone or WhatsApp shortly to provide pricing, catalog samples, and delivery timelines.
                </p>

                <p>
                    If you have an urgent inquiry or bulk order requirement, feel free to contact our direct helpline:
                </p>

                <p style="text-align: center; margin: 24px 0;">
                    <a href="tel:+919725427727" style="display: inline-block; padding: 12px 28px; background-color: #EF801C; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 700; font-size: 14px;">
                        📞 Call Direct: +91 97254 27727
                    </a>
                </p>

                <div class="signature">
                    Warm Regards,<br>
                    <strong>Customer Care &amp; Sales Team</strong><br>
                    Raghuvir Flour Mills, Ahmedabad, Gujarat<br>
                    <a href="{{ url('/') }}" style="color: #EF801C; text-decoration: none;">www.raghuvirofficial.com</a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                &copy; {{ date('Y') }} Raghuvir Atta. All rights reserved.<br>
                100% Traditional Slow Chakki Ground Whole Wheat Flour.
            </div>
        </div>
    </div>
</body>
</html>
