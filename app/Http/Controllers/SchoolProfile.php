<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class SchoolProfile extends Controller
{
 public function home(Request $request){
 
   $data=DB::table('users')->join('user_school_institute_detail','user_school_institute_detail.user_id','=','users.id')
   ->where('users.id',auth::user()->id)->first();

    return view('Website.school_profile.index',['user_data'=>$data]);

 }

 public function update_profile(Request $request){
    return view('Website.school_profile.update_profile');

 }


 public function create_job_vacancy(Request $request){
    return view('Website.school_profile.create_job_vacancy');

 }
 public function insert_create_job_vacancy(Request $request){
   $validator = Validator::make(
      $request->all(),
      [
         'vacancy_type' => 'required',
            'experience_required' => 'required',
            'skills_required' => 'required',
            'estimated_package' => 'nullable|numeric',
            'job_type' => 'required|in:Part Time,Full Time,Remote',
            'scope_of_work' => 'required',
            ]
         );
         if ($validator->fails()) {
            //  return redirect()->back()->with('error',$validator->errors());
            return  redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        JobVacancy::create([
         'vacancy_type'=>$request->vacancy_type,
         'subject_name'=>$request->subject_name,
         'experience_required'=>$request->experience_required,
         'skills_required'=>$request->skills_required,
         'estimated_package'=>$request->estimated_package,
         'job_type'=>$request->job_type,
         'post'=>$request->post,
         'scope_of_work'=>$request->scope_of_work,
         'college_id'=>Auth::user()->id,
        ]);
        return redirect()->back()->with(['success'=>'Record inserted successfully.']);
   
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
