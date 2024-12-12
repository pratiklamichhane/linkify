<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #f0f0f0;
        }
        .content {
            padding: 30px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 12px;
            color: #666666;
            border-top: 1px solid #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Link Shared</h2>
        </div>
        
        <div class="content">
            <p>Hello!</p>
            <p>A Link Reminder <strong>{{ $link->title }}</strong> has been added by you.</p>
            <p>
                <a href="{{ $link->url }}" class="button">View Link</a>
            </p>
        </div>

        <div class="footer">
            <p>This is an automated reminder from Linkify</p>
            <p>If you didn't expect this email, please ignore it.</p>
        </div>
    </div>
</body>
</html></div></p></div></head>