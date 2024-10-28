<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <!-- <img src="{{ asset('images/Act21-logo-300x75.png') }}" alt="Your Logo"> -->
        </div>
        <div class="content">
            <p style="text-align: center;">Hello,</p>
            <p style="text-align: center;">You requested a password reset for your account. Please use the following OTP to reset your password:</p>
            <h2 style="text-align: center; font-size: 32px; color: #007bff;">{{ $otp }}</h2>
            <div style="text-align: center;">
            <p >If you did not request this change, please ignore this email. This OTP is valid for a limited time.</p>
            <p>Thank you,</p>
            <p>Your Company Name Team</p>
            </div>
        </div>
    </div>
</body>
</html>

