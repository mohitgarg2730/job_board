<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        .btn-primary {
            text-decoration: none;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            border: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Our Platform!</h1>
        <p>Hi {{$data['name']}},</p>
        <p>Thank you for registering with us! To complete your registration, please verify your email address by
            clicking the button below:</p>

        <p style="text-align: center;">
            <a href="{{$url}}" class="btn btn-primary">Verify Your Email</a>
        </p>

        <p>If you didn’t register for an account, please ignore this email.</p>

        <div class="footer">
            <p>© 2024 Our Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
