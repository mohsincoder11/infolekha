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
            <h1 style="font-size: 24px;">Tutor Vacancy</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                I hope this email finds you well. We would like to inform you that we have received an application from a prospective tutor who is interested in the vacancy at your esteemed institution.
            </p>
          
                <p class="content-p"><b>Tutor Details:</b></p>

                <p class="content-p">
                    NName of Prospective Tutor: {{ $tutor_details->name}}
                </p>
                <p class="content-p">
                    Contact Information: {{ $tutor_details->email}} {{ $tutor_details->mob}} 
                </p>
                <p class="content-p">
                    Attached CV: Check Attachement for CV 
                </p>

            <p class="content-p mt-10 mb-10">
                The prospective tutor has shown interest in joining your institution as an educator. They believe in your institution's vision and values and are eager to contribute their expertise to your educational community.
            </p>

            <p class="content-p mb-10">
                We kindly request you to review the application of {{ $tutor_details->name}} and consider them as a potential addition to your team. You may contact them directly at {{ $tutor_details->email}} or {{ $tutor_details->mob}}  to discuss their qualifications and suitability for the vacancy. For your convenience, we have attached their CV for your reference.
            </p>

            <p class="content-p mb-10">
                If you require any further information or assistance, please feel free to reach out to our support team at support@infolekha.org. We are here to facilitate the recruitment process and ensure a smooth experience for both your institution and prospective tutors.
            </p>

            <p class="content-p mb-10">

                Thank you for considering this application. We look forward to your positive response and the possibility of {{ $tutor_details->name}} becoming a valuable member of your institution's teaching staff.
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
