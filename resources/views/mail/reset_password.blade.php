<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            text-align: center;
            white-space: nowrap;
        }

        .link-container {
            word-wrap: break-word;
            word-break: break-all;
            margin: 10px 0;
        }

        .link-container a {
            color: #007bff;
            text-decoration: none;
            background-color: #e9ecef;
            padding: 5px;
            border-radius: 5px;
            display: block;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Reset Your Password</h2>
        </div>
        <div class="content">
            <p>Dear {{ $details['user']->name }},</p>
            <p>We received a request to reset the password for your account. Click the button below to reset your password:</p>

            <a href="{{ url('reset-password/'.$details['token']) }}" class="btn">Reset Password</a>

            <p>If the button above doesn't work, copy and paste the following link into your browser:</p>
            <div class="link-container">
                <a href="{{ url('reset-password/'.$details['token']) }}">{{ url('reset-password/'.$details['token']) }}</a>
            </div>

            <p>If you did not request a password reset, no further action is required.</p>
            <p>Thanks,</p>
            <p>{{ config('app.name') }}</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>

        {{-- <div class="footer">
            <p>If you have any questions, feel free to contact our support team.</p>
        </div> --}}
    </div>
</body>

</html>
