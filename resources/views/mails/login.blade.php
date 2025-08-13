<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Login Akun</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e2e8f0
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Notification</h2>
        <p>Hi {{ $user->name }},</p>
        <p>We noticed a login to your account from:</p>
        <ul>
            <li>IP Address: {{ $ip }}</li>
            <li>Time: {{ $time }}</li>
            <li>Browser: {{ $browser }}</li>
        </ul>
        <p>if this was you, you can ignore this email. if not, please
            <a href="" class="btn">Reset Password</a></p>
    </div>
</body>
</html>
