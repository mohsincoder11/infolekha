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
            $expiry_label = 'is expired';
        }

        $renew_url = url('/renew-subscription') . '/' . base64_encode($transaction->id) . '/' . Crypt::encryptString($transaction->user_info->email);
        $data = ['user_info' => $transaction->user_info, 'expiry_label' => $expiry_label, 'transaction' => $transaction, 'url' => $renew_url];


        Mail::send('mail.subscription-due', $data, function ($message) use($transaction) {
            $message->to($transaction->user_info->email,$transaction->user_info->name)->subject('Subscription Expiring');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with(['success' => 'Email sent successfully.']);
    }

    public function buy_subscription_email($id){
        $user=User::find($id);
        $payment_url = url('/buy-subscription') . '/' . Crypt::encryptString($user->email);

        $data = ['user_info' => $user, 'url' => $payment_url];
        Mail::send('mail.buy-subscription', $data, function ($message) use($user) {
            $message->to($user['email'], $user['name'])->subject('Activation Email');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with(['success' => 'Email sent successfully.']);
    }

    
    public function welcome_email($id){
        $user=User::find($id);
        $payment_url = url('/login-using-email') . '/' . Crypt::encryptString($user->email);

        $data = ['user_info' => $user, 'url' => $payment_url];
        Mail::send('mail.welcome', $data, function ($message) use($user) {
            $message->to($user['email'], $user['name'])->subject('Welcome Email');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        return 1;
    }
    public function emquiry_email(){

    }

}
