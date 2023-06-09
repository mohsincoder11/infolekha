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
         //User::find(252)->update(['password'=>Hash::make(12345678)]);
        return view('Website.login-auth.login');
    }

    public function login_submit(Request $request)
    {
        $user = User::get();
       
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
            if (Auth::user()->role == 3) {

                return redirect()->route('college_listing');
            } elseif (Auth::user()->role == 2) {
                if (transaction::where('user_id', Auth::user()->id)->where('transaction_status','success')->exists()) {

                $int = DB::table('users')->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
                    ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'user_tutor.user_id')
                    ->select('users.*', 'user_tutor.*', 'user_tutor_detail.*')
                    ->where('users.id', Auth::user()->id)->first();
                if ($int == null) {
                    $data = DB::table('users')->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
                        ->select('users.*', 'user_tutor.*')->where('user_tutor.user_id', auth::user()->id)->first();
                    return view('Website.tutor_details_form', ['data' => $data]);
                }

                return view('Website.tutor_detail_edit', ['data' => $int]);
            }
                else{
                    return redirect('payment_form');

                }
            } elseif (Auth::user()->role == 1) {

                if (transaction::where('user_id', Auth::user()->id)->where('transaction_status','success')->exists()) {

                    $int = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
                        ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
                        ->select('users.*', 'user_school_institute.*', 'user_school_institute_detail.*')
                        ->where('users.id', Auth::user()->id)->first();
                    if ($int == null) {
                        $data = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
                            ->select('users.*', 'user_school_institute.*')->where('user_school_institute.user_id', auth::user()->id)->first();
                        return view('Website.school_institute_details_form', ['data' => $data]);
                    }

                    return view('school_profile.index', ['data' => $int]);
                } else {
                    return redirect('payment_form');
                }
            } else{
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid Login Credentials.');


            }
        }else{
            return redirect()->back()->with('error', 'Invalid Login Credentials.');

        }
    }
    public function log_out()
    {
        Auth::logout();

        return redirect()->route('login_page');
    }
}
