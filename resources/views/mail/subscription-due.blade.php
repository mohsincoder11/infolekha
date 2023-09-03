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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="font-size: 24px;">Your Subscription is Expiring</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{$user_info['name']}},</p>
            <p style="font-size: 18px;">We'd like to remind you that your subscription {{$expiry_label}}. To continue enjoying our premium services, please renew your subscription today.</p>
            <div class="subscription-details">
                <p class="details-heading">Subscription Details:</p>
                <p class="details-text"><strong>Subscription Plan:</strong> 
                    @if($transaction->type=='Subscription')
                    {{$transaction->transaction_subscription->plan}} {{$transaction->transaction_subscription->amount}}/{{$transaction->transaction_subscription->type}}
                    @else
                    {{$transaction->transaction_subscription->PackageName}} {{$transaction->transaction_subscription->OriginalPrice}} for {{$transaction->transaction_subscription->SelectedDays}}
                    @endif
                </p>
                <p class="details-text"><strong>Expiry Date:</strong> {{date('M d,Y',strtotime($transaction['expiry']))}}</p>
            </div>
            <p class="mb-10">Click the button below to renew your subscription:</p>
            <a class="btn" href="{{$url}}">Renew Subscription</a>
            <p style="font-size: 16px; color: #888; margin-top: 20px;">Thank you for choosing our services!</p>
        </div>
    </div>
</body>
</html>
