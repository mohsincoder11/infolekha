<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Expiring</title>
    <style>
        /* Reset some default styles for email clients */
        body,
        p {
            margin: 0;
            padding: 0;
        }

        /* Set a background color for the entire email */
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            padding-top: 20px;
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

        .content-p {
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="font-size: 24px;">Announcement Rectification</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                We hope this message finds you well. Weare writing you to request a rectification for a recent announcement posted on <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> on behalf of {{ $user_info['name'] }}. The announcement, titled "
                {{$announcement->heading }}", was posted on {{ $announcement->created_at->format('d-m-Y') }}.
            </p>
            <p class="content-p mb-10">
                Upon reviewing the announcement, we have identified some necessary changes and corrections that need to be made for accuracy and clarity. These changes include "{{$announcement->note}}".
            </p>
            <p class="content-p">Please make the necessary changes by logging into your <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> account and accessing the announcement section. If you encounter any difficulties or have questions regarding the rectification process, please do not hesitate to reach out to our support team at support@infolekha.org. We are here to assist you.</p>

            <p class="content-p">Once the changes have been made, we will review the announcement to ensure that it now accurately reflects the desired information. Your prompt attention to this matter is greatly appreciated, and we thank you for your commitment to maintaining the quality of content on <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a>.</p>

            <p class="content-p">Thank you for choosing <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> as your platform for sharing announcements and updates. We value your contributions to our educational community.</p>

            <p>
                Best regards,
            </p>
            <p>
                Infolekha
            </p>
            <p>
                <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> Support Team
            </p>

        </div>
    </div>
</body>

</html>
