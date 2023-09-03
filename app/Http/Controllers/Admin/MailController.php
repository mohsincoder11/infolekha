<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class MailController extends Controller
{
    public function subscription_mail(Request $request){
        $transaction=transaction::find($request->id);

        $parsedDate = Carbon::parse($transaction->expiry);

// Check if it's a past date
$expiry_label='is about to expire';

if ($parsedDate->isPast()) {
    $expiry_label='is expired';
}

$renew_url= url('/renew-subscription') . '/' . base64_encode($transaction->id) . '/' . Crypt::encryptString($transaction->user_info->email);
        $data=['user_info'=>$transaction->user_info,'expiry_label'=>$expiry_label,'transaction'=>$transaction,'url'=>$renew_url];

       
        Mail::send('mail.subscription-due', $data, function($message) {
           $message->to('mohsinshaikh1104@gmail.com', 'Mohsin Shaikh')->subject
              ('Laravel HTML Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
            return redirect()->back()->with(['success'=>'Email sent successfully.']);
    }
}
