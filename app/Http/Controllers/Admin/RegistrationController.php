<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class RegistrationController extends Controller
{
    public function college(Request $request){
        $query = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
        ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
        ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
        ->where('r_entity', 'College')
        ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('users.created_at', [$request['from_date'], $request['to_date']]);
        })
        ->when(isset($request['active']) && $request['active']!=null, function ($query) use ($request) {
            return $query->where('users.active', $request['active']);
        });
       
        if($request->send_email && $request->send_email=="true"){
            $ids=(clone $query)->pluck('user_id');
            foreach($ids as $id){
                app('App\Http\Controllers\Admin\MailController')->buy_subscription_email($id);
            }
            return redirect()->route('admin.registration.college')->with(['success' =>'Mail send successfully']);
        }

        $registers=$query
            ->orderBy('users.id','desc')
            ->get();
           
        return view('admin.registration.college',compact('registers'));
    }

    public function institute(Request $request){
        $query = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
           ->where('r_entity', 'Institute')
           ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('users.created_at', [$request['from_date'], $request['to_date']]);
        })
        ->when(isset($request['active']) && $request['active']!=null, function ($query) use ($request) {
            return $query->where('users.active', $request['active']);
        });
        if($request->send_email && $request->send_email=="true"){
            $ids=(clone $query)->pluck('user_id');
            foreach($ids as $id){
                app('App\Http\Controllers\Admin\MailController')->buy_subscription_email($id);
            }
            return redirect()->route('admin.registration.institute')->with(['success' =>'Mail send successfully']);
        }
           $registers=$query
            ->orderBy('users.id','desc')
            ->get();
            return view('admin.registration.institute',compact('registers'));
    }

    public function school(Request $request){
        $query = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
        ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
        ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
        ->where('r_entity', 'school')
        ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('users.created_at', [$request['from_date'], $request['to_date']]);
        })
         ->when(isset($request['active']) && $request['active']!=null, function ($query) use ($request) {
            return $query->where('users.active', $request['active']);
        });
        if($request->send_email && $request->send_email=="true"){
            $ids=(clone $query)->pluck('user_id');
            foreach($ids as $id){
                app('App\Http\Controllers\Admin\MailController')->buy_subscription_email($id);
            }
            return redirect()->route('admin.registration.school')->with(['success' =>'Mail send successfully']);
        }
       $registers=$query
        ->orderBy('users.id','desc')
        ->get();
        return view('admin.registration.school',compact('registers'));
    }

    public function tutor(Request $request){
        $query = DB::table('users')->select('users.*', 'user_tutor_detail.*', 'user_tutor.*')
            ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
            ->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->orderBy('users.id','desc')
            ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('users.created_at', [$request['from_date'], $request['to_date']]);
            })
            ->when(isset($request['active']) && $request['active']!=null, function ($query) use ($request) {
                return $query->where('users.active', $request['active']);
            });
            if($request->send_email && $request->send_email=="true"){
                $ids=(clone $query)->pluck('user_id');
                foreach($ids as $id){
                    app('App\Http\Controllers\Admin\MailController')->buy_subscription_email($id);
                }
                return redirect()->route('admin.registration.tutor')->with(['success' =>'Mail send successfully']);
            }
       $registers=$query
        ->orderBy('users.id','desc')
        ->get();
        return view('admin.registration.tutor',compact('registers'));
    }

    public function student(Request $request){
        $query = DB::table('users')->select('users.*', 'user_student.*')
        ->join('user_student', 'user_student.user_id', '=', 'users.id')
        ->orderBy('users.id','desc')
        ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('users.created_at', [$request['from_date'], $request['to_date']]);
        });
        $registers=$query->get();
        return view('admin.registration.student',compact('registers'));

    }

    public function admin_login_to_user($id){
        $user_info=User::find($id);
        if ($user_info) {
            Auth::login($user_info, true);

            if($user_info->role=='1'){
                return redirect()->route('school_profile.home')->with(['success'=>'Log in successfully.']);
            } else if($user_info->role=='2'){
                return redirect()->route('tutor_profile.home')->with(['success'=>'Log in successfully.']);
            } else if($user_info->role=='3'){
                return redirect()->route('user_profile.home')->with(['success'=>'Log in successfully.']);
            }else{
                return redirect()->back()->with(['error'=>'something went wrong.']);
            }

        } else {
            return redirect()->back()->with(['error'=>'something went wrong.']);

        }
    }
}
