<?php

namespace App\Http\Controllers;

use App\Models\user_student;
use App\Models\user_school_institute;
use App\Models\user_tutor;
use App\Models\User;
use App\Models\Student_detail;
use App\Models\school_institute_detail;
use App\Models\tutor_detail;
use Hash;
use Auth;
use DB;
use App\Models\transaction;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
         User::find(252)->update(['password'=>Hash::make(12345678)]);
        return view('Website.login-auth.login');
    }

    public function login_submit(Request $request)
    {
       
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
            if (Auth::user()->role == 3) {

                return redirect()->route('index');
            } elseif (Auth::user()->role == 2) {
                if (transaction::where('user_id', Auth::user()->id)->where('transaction_status','success')->exists()) {

                $int = DB::table('users')->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
                    ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'user_tutor.user_id')
                    ->select('users.*', 'user_tutor.*', 'user_tutor_detail.*')
                    ->where('users.id', Auth::user()->id)->first();
                if ($int == null) {
                    $data = DB::table('users')->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
                        ->select('users.*', 'user_tutor.*')->where('user_tutor.user_id', auth::user()->id)->first();
                    return view('Website.login-auth.tutor_details_form', ['data' => $data]);
                }
            return redirect()->route('tutor_profile.home');
}
                else{
                    return redirect('payment_form');

                }
            } elseif (Auth::user()->role == 1) {
                $int = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
                ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
                ->select('users.*', 'user_school_institute.*', 'user_school_institute_detail.*')
                ->where('users.id', Auth::user()->id)->first();

                if ($int == null) {
                    $data = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
                    ->select('users.*', 'user_school_institute.*')->where('user_school_institute.user_id', auth::user()->id)->first();
                return view('Website.login-auth.school_institute_details_form', ['data' => $data]);
                }
                    else{
                        if (transaction::where('user_id', Auth::user()->id)->where('transaction_status','success')->exists()) {
                            return redirect()->route('school_profile.home');
                        }
                        else {
                            return redirect('payment_form');
                        }

                    }

            } elseif(Auth::user()->role == 0){
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid Login Credentials.');
            }
        }else{
            return redirect()->back()->with('error', 'Invalid Login Credentials.');

        }
    }

    public function tutor_subscription(){
        $check_subscribed=tutor_detail::where('user_id',Auth::user()->id)->first();
        if($check_subscribed && $check_subscribed->subscription_status=='0'){
            return redirect('payment_form')->with(['info'=>'Subscribe to get the jobs.']);

        }
    }

    public function log_out()
    {
        Auth::logout();

        return redirect()->route('login_page');
    }
}
