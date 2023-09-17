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
            <h1 style="font-size: 24px;">Blog Approved</h1>
        </div>
        <div class="content">
            <p style="font-size: 18px;">Dear {{ $user_info['name'] }},</p>
            <p class="content-p mb-10">
                We are pleased to inform you that your recent blog post titled "{{$blog->subject}}" has been successfully reviewed and approved for publication on INFOlekha.org. 
            </p>
            <p class="content-p mb-10">
                Your insightful and well-crafted blog post is now live and accessible to our community of readers, educators, and students. This means that your valuable insights and knowledge will be shared with a wider audience, contributing to our mission of spreading educational awareness.  </p>
            
                <p class="content-p"><b>Here are the details of your approved blog post:</b></p>

            <p class="content-p">
                Blog Post Title: {{ $blog->subject}}
            </p>
            <p class="content-p">
                Date Submitted : {{ $blog->created_at->format('d-m-Y') }}
            </p>
            <p class="content-p">
                Name of Author  : {{ $blog->author_name }}
            </p>
            <p class="content-p">
                Blog Link   : <a href="{{env('Web_URL')}}blog-details/{{$blog->id}}">View Blog</a>
            </p>
           
           



            <p class="content-p mt-10 mb-10">
                To maximize the impact of your blog post, we encourage you to share blog link with your contacts, friends, and colleagues. Kindly ask them to read, like, and share your post within their networks to help it reach a broader audience and foster meaningful discussions.
            </p>

            <p class="content-p mb-10">
                We believe that your blog post will greatly benefit our readers and enrich our educational content. Your contribution is highly appreciated, and we look forward to hosting more of your work in the future.
            </p>

            <p class="content-p mb-10">
                Should you have any questions or require further assistance with your blog posts or any other aspect of <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a>, our support team is always here to help. Please don't hesitate to reach out to us at support@infolekha.org.
            </p>

            <p class="content-p mb-10">
                Thank you for choosing <a target="_blank" href="{{ env('Web_URL') }}"> INFOlekha.org</a> as your platform for sharing valuable knowledge and insights. We look forward to continuing our partnership and promoting quality education through your contributions.
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
