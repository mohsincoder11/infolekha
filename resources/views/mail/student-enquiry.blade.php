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
            <h1 style="font-size: 24px;">Student/Parent Inquiry</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                We are pleased to inform you about an inquiry we recently received from a prospective student/parent who is interested in your institution.
            </p>
          
                <p class="content-p"><b>Inquiry Details:</b></p>

                <p class="content-p">
                    Name of Prospective Student/Parent: {{ $enquiry->name}}
                </p>
                <p class="content-p">
                    Contact Information: {{ $enquiry->email}}
                </p>

            <p class="content-p mt-10 mb-10">
                The prospective student/parent has shown interest in your institution. They are looking for more information about your institution and would appreciate your prompt response to their inquiry.
            </p>

            <p class="content-p mb-10">
                Please reach out to {{ $enquiry->name}} at {{ $enquiry->email}} as soon as possible to address their questions and provide the necessary information. Your assistance in this matter is highly valued, as it can greatly influence the decision-making process for this prospective student/parent.
            </p>

            <p class="content-p mb-10">
                If you have any difficulties reaching out to them or require additional information about this inquiry, please feel free to contact our support team at support@infolekha.org. We are here to facilitate communication between prospective students/parents and your institution.
            </p>

            <p class="content-p mb-10">

            Thank you for your prompt attention to this inquiry. We appreciate your commitment to providing excellent service to potential members of your educational community.
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
