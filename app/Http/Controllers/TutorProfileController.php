<?php

namespace App\Http\Controllers;

use App\Models\JobVacancyApplied;
use App\Models\tutor_detail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\user_student;
use App\Models\user_tutor;
use App\Models\UserLikeModel;

class TutorProfileController extends Controller
{
    public function home(Request $request)
    {

        $data = DB::table('users')->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
        ->where('users.id', auth::user()->id)->first();

        return view('Website.tutor_profile.index', ['user_data' => $data]);
    }

    public function update_profile(Request $request)
    {
        $data = User::join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
        ->where('users.id', auth::user()->id)->first();
       

    return view('Website.tutor_profile.update-profile', ['user_data' => $data]);
    }

    public function post_update_profile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
             'subject'=>'required',
             'experiance'=>'required',
             'mob'=>'required',
             'address'=>'required',
             'pin_code'=>'required',
             'job_type'=>'required',
             'declaration'=>'required',
                
            ]);
            if ($validator->fails()) {
                return back()->with(['error'=>'Please fill all the fields.']);
            }
        $user=User::find(Auth::user()->id);
        $user->email=$request->email;

        $user_tutor=user_tutor::where('user_id',Auth::user()->id)->first();

        $user_tutor->r_name=$request->name;
        $user_tutor->address=$request->address;
        $user_tutor->mob=$request->mob;

        $user_tutor->save();

        if ($request->hasfile('logo')) {
            $logo = time() . '.' . $request->file("logo")->getClientOriginalExtension();
            $request->logo->move(public_path('database_files/tutor/photo'), $logo);
            $user->logo='database_files/tutor/photo/' . $logo;
        }
        $user->save();

        $details=tutor_detail::where('user_id',Auth::user()->id)->first();
        $details->pin_code=$request->pin_code;
        $details->address=$request->address;
        $details->email=$request->email;
        $details->mob=$request->mob;
        $details->name=$request->name;
        $details->subject=$request->subject;
        $details->job_type=$request->job_type;
        $details->declaration=$request->declaration;
        if ($request->hasfile('cv')) {
            $cv = time() . '.' . $request->file("cv")->getClientOriginalExtension();
            $request->cv->move(public_path('database_files/tutor/cv'), $cv);
            $details->cv='database_files/tutor/cv/' . $cv;
        }

        $details->save();


        return redirect()->back()->with(['success'=>'Profile has been updated.']);


    }

    public function user_wishlist(Request $request)
    {
        $wishlists=UserLikeModel::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        return view('Website.tutor_profile.wishlist',compact('wishlists'));
    }

    public function job_applied(Request $request)
    {
        $jobs=JobVacancyApplied::where('tutor_id',Auth::user()->id)->orderby('id','desc')->get();
        return view('Website.tutor_profile.job_applied',compact('jobs'));
    }
    
    public function job_remove(Request $request)
    {
        $jobs=JobVacancyApplied::where('id',$request->id)->delete();
        return redirect()->back()->with(['success'=>'Job deleted successfully.']);
    }
    
    public function change_password(Request $request)
    {
        return view('Website.tutor_profile.change-password');
    }

    public function post_change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => 'required',
                'new_password' => 'required',
            ]
        );

        if ($validator->fails()) {
            //  return redirect()->back()->with('error',$validator->errors());
            return  redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user=User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password=Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with(['success'=>'Password has been changed.']);
        }else{
            return redirect()->back()->with(['error'=>'Existing password do not match.']);

        }


    }
}
