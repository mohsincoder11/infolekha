<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Expiring</title>
    <style>
        /* Reset some default styles for email clients */
        body, p {
            margin: 0;
            padding: 0;
        }

        /* Set a background color for the entire email */
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            padding-top:20px;
        }

        /* Center the email content */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
        }

        /* Style the header */
        .header {
            background-color: #073D5F;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Style the main content */
        .content {
            padding: 20px;
            line-height: 1.8rem;
        }

        /* Style the button */
        .btn {
            display: inline-block;
            background-color: #073D5F;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        /* Add some spacing */
        .mb-10 {
            margin-bottom: 10px;
        }
        .mt-10 {
            margin-top: 10px;
        }

        /* Style the subscription details */
        .subscription-details {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }

        /* Style the heading for subscription details */
        .details-heading {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* Style the details text */
        .details-text {
            font-size: 16px;
            color: #555;
        }
        .content-p{
            font-size: 14px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="font-size: 24px;">Password Reset</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{$user_info['name']}},</p>
            <p class="content-p mb-10">
            We are pleased to inform you that your password reset request for your INFOlekha.org account has been successfully completed. You can now access your account using your new password.
        </p>
            <p class="content-p mb-10">
                To ensure the security of your account, please keep your new password confidential and do not share it with anyone. If you have any further questions or encounter any issues while using INFOlekha.org, our dedicated support team is here to assist you. Feel free to reach out to us at support@infolekha.org for prompt assistance.
            </p>
          
            <p class="content-p mb-10">
                Thank you for being a valued member of <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a> We look forward to continuing to serve your educational needs.
            </p>
            <p>
                Best regards,
            </p>
            <p>
                Infolekha
            </p>
            <p>
               <a target="_blank" href="{{env('Web_URL')}}"> INFOlekha.org</a> Support Team
            </p>
            
        </div>
    </div>
</body>
</html>
