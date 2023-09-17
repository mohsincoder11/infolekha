<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Easebuzz;
use App\Models\Master\Coupon;
use App\Models\Master\Subscription;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Models\transaction;
use App\Models\TransactionSubscription;
use Validator;
use Carbon\Carbon;


class Easebuzzpay extends Controller
{

    public function initiatePaymentAPI(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
        'subscription_id'=>'required',
        ]);

        if ($validator->fails())
        {
            //  return redirect()->back()->with('error',$validator->errors());
            return  redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
     
        if ($validator->passes())
        {
      if(auth::user()->role ==1){
        $data=DB::table('users')->join('user_school_institute_detail','user_school_institute_detail.user_id','=','users.id')
        ->select('users.*','user_school_institute_detail.*')->where('user_school_institute_detail.user_id',auth::user()->id)->first();
      }
      elseif(auth::user()->role ==2){
        $data=DB::table('users')->join('user_tutor_detail','user_tutor_detail.user_id','=','users.id')
        ->select('users.*','user_tutor_detail.*')->where('user_tutor_detail.user_id',auth::user()->id)->first();
      }
      $subscription=Subscription::find($request->subscription_id);
      $txnid='I-LEKHA' . time() . rand(001, 999);
      $coupon=Coupon::where('code',$request->CouponCode)->where('status','active')->first();
      $payable_amount=$subscription->amount;
        if(isset($coupon)){
            if($coupon->type=="PERCENT"){
                $payable_amount=$subscription->amount-($subscription->amount/100*$coupon->discount);
            }else{
                $payable_amount=$subscription->amount-$coupon->discount;
            }
          }
          $payable_amount=number_format($payable_amount,2);
          $payable_amount=str_replace(',', '', $payable_amount);

        $it=new transaction;
        $it->name=$data->name;
        $it->mob=$data->mob;
        $it->address=$data->address;
        $it->user_id=auth::user()->id;
        $it->amount=$payable_amount;
        $it->user_role=auth::user()->role;
        $it->transaction_id=$txnid;
        $it->type='Subscription';
        $it->transaction_status=(int)$payable_amount==0 ? 'success' : 'NA';
        $addDays=$subscription->days;
        $it->expiry=Carbon::now()->addDays($addDays)->format('Y-m-d');
        $it->coupon=isset($coupon) ? $coupon->code : null;
       
        $it->save();
        $transaction_subscription=TransactionSubscription::create([
          'plan' => $subscription->plan,
          'user_type' => $subscription->user_type,
          'type' => $subscription->type,
          'days' => $subscription->days,
          'amount' => $subscription->amount,
          'transaction_id' => $it->id,
        ]);
        if((int)$payable_amount==0){
          if(Auth::user()->role==2){
            app('App\Http\Controllers\Admin\MailController')->tutor_welcome_prime_mail(253);
          }
          return redirect()->route('success-complete');
        }

        $MERCHANT_KEY = env('MERCHANT_KEY', null);
        $SALT = env('SALT', null);
        $ENV = env('PAY_ENV', null);
        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
        $city=$data->address;
		$state=$data->address;
        $postData = array(
            "txnid" => $txnid,
            "amount" => $payable_amount,
            "firstname" => str_replace(' ', '', $data->name),
            "email" => $data->email,
            "phone" => $data->mob,
            "productinfo" => "Sim card",
            "surl" => route('success'),
            "furl" => route('payfail'),
            "udf1" => auth::user()->role,
            "udf2" => "aaaa",
            "udf3" => "aaaa",
            "udf4" => "aaaa",
            "udf5" => "aaaa",
            "udf6" => "aaaa",
            "udf7" => "aaaa",
            "address1" => $data->address,
            "address2" => "aaaa",
            "city" =>'amravati',
            "state" => 'maharashtra',
            "country" => "aaaa",
            "zipcode" => $data->pin_code,
            
        );

        Session::put('newdata', $postData);
        Session::save();


      //  return redirect()->route('pay_success');
        $easebuzzObj->initiatePaymentAPI($postData);
        
        $SALT = env('SALT', null);
        $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
      
        $result = $easebuzzObj->easebuzzResponse();
       
    }  
    }
}
