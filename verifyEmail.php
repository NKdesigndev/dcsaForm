<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F1F4FC;
            margin: 0;
            padding: 0;
        }
        p{
            line-height: 25px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #1E81C6;
            color: #ffffff;
            text-align: center;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .sign{
            color:#888888;
            font-size: 14px;
        }
        .button:hover {
            background-color: #155a8a;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .footer {
            background-color: #f1f1f1;
            color: #888888;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Email Verification
        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>Thank you for signing up. Please click the button below to verify your email address.</p>
            <a href="#" class="button">Verify Email</a>
            <p>If you did not sign up for this account, you can ignore this email.</p>
            <p>Best regards,<br><span class="sign">Department of Computer Science & Applications</span></p>
        </div>
        <div class="footer">
            <p>&copy; 2024 - Panjab University, Chandigarh, India.</p>
        </div>
    </div>
</body>
</html>
