<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class MailController extends Controller
{
    public function subscription_mail(Request $request)
    {
        
        $transaction = transaction::find($request->id);

        $parsedDate = Carbon::parse($transaction->expiry);

        // Check if it's a past date
        $expiry_label = 'is about to expire';

        if ($parsedDate->isPast()) {
            $expiry_label = 'is due';
        }

        $renew_url = url('/renew-subscription') . '/' . base64_encode($transaction->id) . '/' . Crypt::encryptString($transaction->user_info->email);
        $data = ['user_info' => $transaction->user_info, 'expiry_label' => $expiry_label, 'transaction' => $transaction, 'url' => $renew_url];
       

        Mail::send('mail.subscription-due', $data, function ($message) use ($transaction) {
            $message->to($transaction->user_info->email, $transaction->user_info->name)
            ->subject('Payment Due for Listing at INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with(['success' => 'Email sent successfully.']);
    }

    public function tutor_subscription_mail(Request $request)
    {
        
        $transaction = transaction::find($request->id);

        $parsedDate = Carbon::parse($transaction->expiry);

        // Check if it's a past date
        $expiry_label = 'is about to expire';

        if ($parsedDate->isPast()) {
            $expiry_label = 'is due';
        }

        $renew_url = url('/renew-subscription') . '/' . base64_encode($transaction->id) . '/' . Crypt::encryptString($transaction->user_info->email);
        $data = ['user_info' => $transaction->user_info, 'expiry_label' => $expiry_label, 'transaction' => $transaction, 'url' => $renew_url];

        Mail::send('mail.subscription-due', $data, function ($message) use ($transaction) {
            $message->to($transaction->user_info->email, $transaction->user_info->name)
            ->subject('Payment Due for Prime Membership Subscription');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with(['success' => 'Email sent successfully.']);
    }

    public function announcement_due_mail(Request $request)
    {
        $transaction = transaction::find($request->id);
        $parsedDate = Carbon::parse($transaction->expiry);
        $renew_url = url('/renew-subscription') . '/' . base64_encode($transaction->id) . '/' . Crypt::encryptString($transaction->user_info->email);
        $data = ['user_info' => $transaction->user_info,  'transaction' => $transaction, 'url' => $renew_url];
        Mail::send('mail.announcement-due', $data, function ($message) use ($transaction) {
            $message->to($transaction->user_info->email, $transaction->user_info->name)
            ->subject('Payment Due for Announcement Subscription');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with(['success' => 'Email sent successfully.']);
    }

    

    public function buy_subscription_email($id)
    {
        $user = User::find($id);
        if ($user) {
            $payment_url = url('/buy-subscription') . '/' . Crypt::encryptString($user->email);

            $data = ['user_info' => $user, 'url' => $payment_url];
            Mail::send('mail.buy-subscription', $data, function ($message) use ($user) {
                $message->to($user['email'], $user['name'])->subject('Activation Email');
                $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
            });
            return redirect()->back()->with(['success' => 'Email sent successfully.']);
        } else {
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }
    }


    public function welcome_email($id)
    {
        $user = User::find($id);
        if ($user) {
            $payment_url = url('/login-using-email') . '/' . Crypt::encryptString($user->email);

            $data = ['user_info' => $user, 'url' => $payment_url];
            Mail::send('mail.welcome', $data, function ($message) use ($user) {
                $message->to($user['email'], $user['name'])->subject('Welcome Email');
                $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
            });
        }

        return 1;
    }

    public function emquiry_email()
    {
    }

    public function password_reset_mail($id)
    {
        $user = User::find($id);
        $data = ['user_info' => $user];
        Mail::send('mail.password-reset', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Your INFOlekha.org Password Has Been Successfully Reset');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function announcement_confirmation_mail($id, $announcement)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'announcement' => $announcement];
        Mail::send('mail.announcement-confirmation', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Approval Confirmation: Your Announcement on INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function announcement_rectification_mail($id, $announcement)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'announcement' => $announcement];
        Mail::send('mail.announcement-rectification', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Announcement Rectification Request on INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function advertisement_confirmation_mail($id, $advertisement)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'advertisement' => $advertisement];
        Mail::send('mail.advertisement-confirmation', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Your Advertisement is Live at INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function blog_approve_mail($id, $blog)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'blog' => $blog];
        Mail::send('mail.blog-approve', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Congratulations! Your Blog is approved at INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function blog_rectification_mail($id, $blog)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'blog' => $blog];
        Mail::send('mail.blog-rectification', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Request for Rectification of Blog Post on INFOlekha.org');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function student_enquiry_mail($id, $enquiry)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'enquiry' => $enquiry];
        Mail::send('mail.student-enquiry', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Inquiry from a Prospective Student/Parent');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function tutor_vacancy_application_mail($id, $tutor_details)
    {
        $user = User::find($id);
        $data = ['user_info' => $user, 'tutor_details' => $tutor_details];
        $cvPath = public_path() . '/' . $tutor_details->cv;
        Mail::send('mail.tutor-vacancy', $data, function ($message) use ($user, $cvPath) {
            $message->to($user['email'], $user['name'])->subject('Application for Tutor Vacancy');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
            $message->attach($cvPath);
        });
        return 1;
    }

    public function tutor_welcome_mail($id)
    {
        $user = User::find($id);
        $data = ['user_info' => $user];
        Mail::send('mail.tutor-welcome', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Welcome to INFOlekha.org - Your Platform for Educational Excellence');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }

    public function tutor_welcome_prime_mail($id)
    {
        $user = User::find($id);
        $data = ['user_info' => $user];
        Mail::send('mail.tutor-welcome-prime', $data, function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Welcome to INFOlekha.org Prime Membership');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }
}
