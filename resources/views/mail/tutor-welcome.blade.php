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
            <h1 style="font-size: 24px;">Welcome to INFOlekha.org </h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            
            <p class="content-p mb-10">
                We are thrilled to welcome you to <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a>, where education meets innovation and excellence. Your decision to join our platform as a tutor/faculty member is a testament to your dedication to the field of education, and we are excited to have you on board
            </p>
            <p class="content-p mb-10">
                <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a> is not just an educational platform; it's a vibrant and dynamic community of educators, learners, and experts from various domains. Here, you will find an environment that fosters collaboration, creativity, and the pursuit of knowledge
            </p>
               
            <p class="content-p mb-10">
                To maximize your experience with <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a> and enjoy additional benefits, we invite you to subscribe to our Prime Membership. Prime Members enjoy exclusive access to a wide range of resources and features designed to enhance their teaching and learning journey.
            </p>
               
            <p class="content-p mb-10">
                To subscribe to our Prime Membership, simply log in to your <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a> account and apply it. Our Prime Membership is designed to empower educators like you and provide valuable tools for your educational endeavours
            </p>
               
            <p class="content-p mb-10">
                If you have any questions or need assistance, please don't hesitate to reach out to our support team at support@infolekha.org. We are here to ensure that your experience with <a target="_blank" href="{{env('Web_URL')}}">INFOlekha.org.</a> is both enjoyable and rewarding.
            </p>

          

            <p class="content-p mb-10">

                Once again, welcome to INFOlekha.org! Together, we'll shape the future of education and empower learners worldwide.
           </p>
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
