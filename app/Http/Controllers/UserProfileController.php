<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\user_student;
use App\Models\UserLikeModel;

class UserProfileController extends Controller
{
    public function home(Request $request)
    {

        $data = DB::table('users')->join('user_student', 'user_student.user_id', '=', 'users.id')
            ->where('users.id', auth::user()->id)->first();

        return view('Website.user_profile.index', ['user_data' => $data]);
    }

    public function update_profile(Request $request)
    {
        $data = DB::table('users')->join('user_student', 'user_student.user_id', '=', 'users.id')
        ->where('users.id', auth::user()->id)->first();

    return view('Website.user_profile.update-profile', ['user_data' => $data]);
    }

    public function post_update_profile(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->email=$request->email;

        $details=user_student::where('user_id',$user->id)->first();
        $details->r_current_school_institute=$request->r_current_school_institute;
        $details->r_name=$request->r_name;
        $details->address=$request->address;
        $details->mob=$request->mob;

        $details->save();

        if ($request->hasfile('logo')) {
            $logo = time() . '.' . $request->file("logo")->getClientOriginalExtension();
            $request->logo->move(public_path('database_files/student/photo'), $logo);
            $user->logo='database_files/student/photo/' . $logo;
        }
        $user->save();

        return redirect()->back()->with(['success'=>'Profile has been updated.']);


    }

    public function user_wishlist(Request $request)
    {
        $wishlists=UserLikeModel::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        return view('Website.user_profile.wishlist',compact('wishlists'));
    }

    public function change_password(Request $request)
    {
        return view('Website.user_profile.change-password');
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
