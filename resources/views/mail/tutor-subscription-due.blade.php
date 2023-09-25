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

       
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="font-size: 24px;">Payment Due for Prime Membership Subscription</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                We hope this message finds you well. We wanted to remind you that the payment for your Prime Membership Subscription on <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> is now due.
            </p>
            <p class="content-p">
                Here are the subscription details:
            </p>
            <p class="content-p">Listing Plan: {{$transaction->transaction_subscription->plan}}
            </p>
            <p class="content-p">Start Date: {{date('M d,Y',strtotime($transaction->transaction_subscription->created_at))}}
            </p>
            <p class="content-p">End Date: {{date('M d,Y',strtotime($transaction['expiry']))}}
            </p>
            <p class="content-p">Amount: {{$transaction->transaction_subscription->amount}}
            </p>
            <p class="content-p">Due Date: {{date('M d,Y',strtotime($transaction['expiry']))}}
            </p>
            
            <p class="content-p">
                To ensure the uninterrupted display of your Prime Membership on <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> and to continue benefiting from our services, please make the payment as soon as possible.
            </p>
            <p class="content-p"><b>You can conveniently pay online using following link </b> <a  href="{{$url}}">Pay Now</a>
            </p>
              <p class="content-p">
                Once the payment is made, please email the transaction details to office@infolekha.org to expedite the confirmation process.If you face any difficulties while making payment please contact us on support@infolekha.org 
              </p>
              <p class="content-p">
                If you have already processed the payment, we sincerely apologize for any inconvenience this reminder may have caused.
              </p>
              <p class="content-p">
                We greatly appreciate your continued partnership with INFOlekha and thank you for your prompt attention to this matter.

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
