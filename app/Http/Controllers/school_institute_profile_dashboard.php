<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class school_institute_profile_dashboard extends Controller
{
 public function home(Request $request){
 
   $data=DB::table('users')->join('user_school_institute_detail','user_school_institute_detail.user_id','=','users.id')
   ->where('users.id',auth::user()->id)->first();

    return view('school_institute_profile_dashboard.index',['data'=>$data]);

 }

 public function update_profile(Request $request){
    return view('school_institute_profile_dashboard.update_profile');

 }


 public function create_job_vacancy(Request $request){
    return view('school_institute_profile_dashboard.create_job_vacancy');

 }

 public function post_result(Request $request){
    return view('school_institute_profile_dashboard.post_result');

 }

 public function pramote_bussiness(Request $request){
    return view('school_institute_profile_dashboard.pramote_bussiness');

 }


 public function update_photo_video(Request $request){
    return view('school_institute_profile_dashboard.update_photo_video');

 }

 
 public function change_password(Request $request){
    return view('school_institute_profile_dashboard.change_password');

 }

}
