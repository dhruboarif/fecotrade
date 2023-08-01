<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            text-align:center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
        }

        .footer {
            background-color: #f0f0f0;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body class="email-tem " style="text-align: center;">
    <div class="container">
         <div class="header">
            <div class="logo">
                <img src="https://auth.fecotrade.com/assets1/images/facotrade_logo.png" alt="Fecotrade">
            </div>
            <h1>Welcome to Our Website</h1>
        </div>
        <div class="content">
            <h3 style="text-align: left; margin-left: 30px; padding-top: 10px;">Hello {{ $name }}, !</h3>
            <p>You have successfully created and account  with Fecotrade.<br>
                 Your user name is: <strong><span>{{ $user_name }}</span></strong><br>
                 Please click on the button below to verify your email address:</p>
            <a href="{{ $actionUrl }}" style="background-color: #3490dc; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Verify Email</a>
            <p>If you did not create an account on our website, you can ignore this email.<br>If you have any questions or need assistance, don't hesitate to contact us<br>.Thank you for part of with us!</p>
        </div>
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Fecotrade. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
