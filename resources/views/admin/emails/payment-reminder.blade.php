<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAAN Membership Payment Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .alert-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
        }
        .alert-info {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .btn-danger {
            background: #dc3545;
        }
        .btn-warning {
            background: #ffc107;
            color: #212529;
        }
        .member-info {
            background: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏔️ TAAN Membership</h1>
        <h2>Payment Reminder</h2>
    </div>

    <div class="content">
        <div class="member-info">
            <h3>Member Information</h3>
            <p><strong>Name:</strong> {{ $member_name }}</p>
            <p><strong>Organization:</strong> {{ $organization_name }}</p>
            <p><strong>Member ID:</strong> {{ $member_id }}</p>
            <p><strong>Current Date:</strong> {{ $current_date }} (BS)</p>
        </div>

        @if($email_type == 'expired')
            <div class="alert alert-danger">
                <h4>⚠️ Payment Expired - Immediate Action Required</h4>
                <p><strong>Expired Date:</strong> {{ $expired_date }} (BS)</p>
                <p>Your TAAN membership payment has expired. Please renew immediately to maintain your active membership status and continue enjoying member benefits.</p>
            </div>
            <a href="{{ $renewal_url }}" class="btn btn-danger">🔄 Renew Payment Now</a>

        @elseif($email_type == 'expiring_soon')
            <div class="alert alert-warning">
                <h4>⏰ Payment Expiring Soon</h4>
                <p><strong>Expiry Date:</strong> {{ $expired_date }} (BS)</p>
                <p>Your TAAN membership payment will expire soon. Renew early to avoid any interruption in your membership services.</p>
            </div>
            <a href="{{ $renewal_url }}" class="btn btn-warning">🔄 Renew Early</a>

        @else
            <div class="alert alert-info">
                <h4>💳 No Payment Record Found</h4>
                <p>We don't have any payment records for your membership. Please add a payment to activate your TAAN membership and access member benefits.</p>
            </div>
            <a href="{{ $renewal_url }}" class="btn">➕ Add Payment</a>
        @endif

        <div style="margin-top: 30px;">
            <h4>📋 Membership Benefits</h4>
            <ul>
                <li>Access to TAAN member directory</li>
                <li>Participation in TAAN events and meetings</li>
                <li>Networking opportunities with fellow trekking agencies</li>
                <li>Industry updates and newsletters</li>
                <li>Advocacy and representation in tourism matters</li>
            </ul>
        </div>

        <div style="margin-top: 30px;">
            <h4>📞 Need Help?</h4>
            <p>If you have any questions about your membership or payment, please contact us:</p>
            <ul>
                <li><strong>Email:</strong> info@taan.org.np</li>
                <li><strong>Phone:</strong> +977-1-4700000</li>
                <li><strong>Office:</strong> TAAN Secretariat, Kathmandu</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>This is an automated reminder from TAAN (Trekking Agencies Association of Nepal)</p>
        <p>© {{ date('Y') }} TAAN. All rights reserved.</p>
    </div>
</body>
</html>
