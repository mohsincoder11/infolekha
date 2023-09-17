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
            <h1 style="font-size: 24px;">Announcement Confirmation</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                We are pleased to inform you that your recent announcementhas been successfully reviewed and approved
                for posting on INFOlekha.org. Congratulations!
            </p>
            <p class="content-p mb-10">
                Your announcement is now live and visible to our community of students, parents, and educators. This
                means that the valuable information you wished to share with our audience is now accessible to a wider
                audience, helping you reach your goals more effectively.
            </p>
            <p class="content-p"><b>Here are the details of your approved announcement:</b></p>

            <p class="content-p">
                Announcement Title: {{ $announcement->heading }}
            </p>
            <p class="content-p">
                Date Posted: {{ $announcement->created_at->format('d-m-Y') }}
            </p>
            <p class="content-p">
                Announcement Live On: {{ $announcement->updated_at->format('d-m-Y') }}
            </p>
            <p class="content-p mb-10">
                Duration of Announcement: {{ $announcement->created_at->format('d-m-Y') }} to
                {{ $announcement->created_at->addDays($announcement->SelectedDays)->format('d-m-Y') }}
            </p>



            <p class="content-p mt-10 mb-10">
                We believe that your announcement will greatly benefit our users and contribute to the educational
                community. If you have any more announcements or updates in the future, please feel free to share them
                with us.
            </p>

            <p class="content-p mb-10">
                If you have any questions or require further assistance, our support team is always ready to help. You
                can reach us at support@infolekha.org.
            </p>

            <p class="content-p mb-10">
                Thank you for choosing INFOlekha.org as your platform for sharing important news and updates. We look
                forward to continuing our partnership and serving your institution's needs.
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
