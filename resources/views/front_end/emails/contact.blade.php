<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            background-color: #4da42f;
            color: white;
            padding: 10px 0;
            border-radius: 5px 5px 0 0;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #555;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>{{ env('MAIL_FROM_NAME') }}</h2>
        </div>
        <p>{{ $name }} जी,</p>
        <p>तपाईको खाता सफलतापूर्वक सिर्जना गरिएको छ।</p>
        <p>तपाईको सबमिशन नम्बर: <strong>{{ $member_id }}</strong></p>
        <p>अब तपाईले यो लिंकमा <a href="{{ $url }}">{{ $url }}</a> गएर भुक्तानी गर्न सक्नुहुन्छ।</p>
        <br>
        <p>Best regards,</p>
        <p><strong>{{ env('MAIL_FROM_NAME') }}</strong></p>
        @if(isset($all_view['setting']->site_email))
        <p><a href="mailto:{{ $all_view['setting']->site_email }}"> </a>{{ $all_view['setting']->site_email }}</p>
        @else
        <p><a href="mailto:{{ env('MAIL_USERNAME') }}"> </a>{{ env('MAIL_USERNAME') }}</p>
        @endif
        @if(isset($all_view['setting']->site_first_address) || isset($all_view['setting']->site_second_address))
        <p>{{ $all_view['setting']->site_first_address }}, {{ $all_view['setting']->site_second_address }}</p>
        @endif
        <div class="footer">
            <p>© {{ date('Y') }} {{ env('MAIL_FROM_NAME') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>