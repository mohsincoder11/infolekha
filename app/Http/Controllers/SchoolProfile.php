<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SchoolProfile extends Controller
{
 public function home(Request $request){
 
   $data=DB::table('users')->join('user_school_institute_detail','user_school_institute_detail.user_id','=','users.id')
   ->where('users.id',auth::user()->id)->first();

    return view('Website.school_profile.index',['data'=>$data]);

 }

 public function update_profile(Request $request){
    return view('Website.school_profile.update_profile');

 }


 public function create_job_vacancy(Request $request){
    return view('Website.school_profile.create_job_vacancy');

 }

 public function post_result(Request $request){
    return view('Website.school_profile.post_result');

 }

 public function pramote_bussiness(Request $request){
    return view('Website.school_profile.pramote_bussiness');

 }


 public function update_photo_video(Request $request){
    return view('Website.school_profile.update_photo_video');

 }

 
 public function change_password(Request $request){
    return view('Website.school_profile.change_password');

 }

}
