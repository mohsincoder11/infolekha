<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\JobVacancy;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\school_institute_detail;
use App\Models\PostResult;
use App\Models\Advertisement;
use App\Models\AdvertisementPackage;
use App\Models\AnnouncementPackage;
use App\Models\JobVacancyApplied;

class SchoolProfile extends Controller
{
   public function home(Request $request)
   {

      $data = DB::table('users')->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
         ->where('users.id', auth::user()->id)->first();

      return view('Website.school_profile.index', ['user_data' => $data]);
   }

   public function update_profile(Request $request)
   {
      $data = DB::table('users')
         ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
         ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
         ->where('users.id', auth::user()->id)->first();

      return view('Website.school_profile.update_profile', ['data' => $data]);
   }

   public function post_update_profile(Request $request)
   {

      $user = User::find(auth::user()->id);
      if ($request->hasfile('logo')) {
         $logo = time() . '.' . $request->file("logo")->getClientOriginalExtension();
         $request->logo->move(public_path('database_files/school_institute/logo/'), $logo);
         $user->logo = 'database_files/school_institute/logo/' . $logo;
      }
      $image_name = [];
      if ($request->image) {
         $array_image = [];
         foreach ($request->image as $images) {
            $image = 'i' . rand(0000, 9999) . time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('database_files/school_institute/photo'), $image);
            array_push($array_image, "database_files/school_institute/photo/" . $image);
         }
         $image_name = $array_image;
      }
      $video_name = [];
      if ($request->video) {
         $array_video = [];
         foreach ($request->video as $videos) {
            $video = 'v' . rand(0000, 9999) . time() . '.' . $videos->getClientOriginalExtension();
            $videos->move(public_path('database_files/school_institute/video'), $video);
            array_push($array_video, 'database_files/school_institute/video/' . $video);
         }
         $video_name = $array_video;
      }
      $school_detail = school_institute_detail::where('user_id', auth::user()->id)->first();

      $exist_image_array = json_decode($school_detail->image);
      $exist_video_array = json_decode($school_detail->video);

      $school_detail->update([
         // 'image'=>$request->image,
         'entity_name' => $request->entity_name,
         'website' => $request->website,
         'fb' => $request->fb,
         'insta' => $request->insta,
         'google' => $request->google,
         'yt' => $request->yt,
         'course' => $request->course,
         'facilities' => $request->facilities,
         'about' => $request->about,
         'image' => array_merge($image_name, $exist_image_array),
         'video' => array_merge($video_name, $exist_video_array),

      ]);


      $user->name = $request->name;
      $user->save();


      return redirect()->back()->with(['success' => true, 'message' => 'Successfully Updated !']);
   }


   public function create_job_vacancy(Request $request)
   {
      $vacancies = JobVacancy::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.job.create_job_vacancy', compact('vacancies'));
   } 
   
   public function view_applied_job(Request $request)
   {
      $vacancy = JobVacancy::where('college_id', Auth::user()->id)->where('id',$request->job_id)->orderby('id', 'desc')->first();
      $applied_jobs=JobVacancyApplied::where('job_vacancy_id',$request->job_id)->where('college_id', Auth::user()->id)->get();
      return view('Website.school_profile.job.view_applied_job', compact('vacancy','applied_jobs'));
   }

   
   public function insert_create_job_vacancy(Request $request)
   {
      $validator = Validator::make(
         $request->all(),
         [
            'vacancy_type' => 'required',
            'experience_required' => 'required',
            'skills_required' => 'required',
            'estimated_package' => 'required',
            'job_type' => 'required|in:Part Time,Full Time,Remote',
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
         'vacancy_type' => $request->vacancy_type,
         'subject_name' => $request->subject_name,
         'experience_required' => $request->experience_required,
         'skills_required' => $request->skills_required,
         'estimated_package' => $request->estimated_package,
         'job_type' => $request->job_type,
         'post' => $request->post,
         'scope_of_work' => $request->scope_of_work,
         'college_id' => Auth::user()->id,
      ]);
      return redirect()->back()->with(['success' => 'Job created successfully.']);
   }

   public function delete_job_vacancy(Request $request)
   {
      JobVacancy::where('id', $request->id)->delete();
      return redirect()->back()->with(['success' => 'Job deleted successfully.']);
   }

   public function post_result(Request $request)
   {
      $school_post_result = PostResult::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.post_result', ['school_post_result' => $school_post_result]);
   }

   public function insert_post_result(Request $request)
   {
      $validator = Validator::make(
         $request->all(),
         [
            'file' => 'required',
            'year' => 'required',

         ]
      );
      if ($validator->fails()) {
         //  return redirect()->back()->with('error',$validator->errors());
         return  redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
      }

      $post_result = new PostResult;
      $filename = '';
      if ($request->hasFile('file')) {
         $file = $request->file('file');
         $filename = time() . '.' . $file->getClientOriginalExtension(); //time se image same nahi hogi 
         $file->move(public_path('/school_result/'), $filename);
         $post_result->file = '/school_result/' . $filename;
      }
      $years = explode("-", $request->get('year'));
      $post_result->college_id = Auth::user()->id;
      $post_result->start_year = $years[0];
      $post_result->end_year = $years[1];
      $post_result->save();
      return redirect()->back()->with(['success' => 'Result inserted successfully.']);
   }
   public function destroy_post_result($id)
   { {
         PostResult::where('id', $id)->delete();
         return redirect()->back()->with(['success' => 'Result deleted successfully.']);
      }
   }


   public function post_announcement(Request $request)
   {
      $announcements = Announcement::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.announcement.post_announcement', compact('announcements'));
   }

   public function insert_announcement(Request $request)
   {
      $request->validate([
         'heading' => 'required',
         'content' => 'required',
         'image' => 'file|image|mimes:jpeg,png,gif|max:2048',
      ]);


      $announcement = new Announcement();
      $announcement->heading = $request->input('heading');
      $announcement->main_content = $request->input('content');
      $announcement->college_id = Auth::user()->id;
      $announcement->city_id = Auth::user()->city_id;

      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $filename = time() . '.' . $file->getClientOriginalExtension(); //time se image same nahi hogi 
         $file->move(public_path('/announcement/'), $filename);
         $announcement->image = '/announcement/' . $filename;
      }

      $announcement->save();
      return redirect()->back()->with(['success' => 'Record inserted successfully.']);
   }

   public function post_advertisement(Request $request)
   {
      
      // AnnouncementPackage::create([
      //    'PackageName' =>'For 1-9 Days',
      //    'OriginalPrice' =>'10',
      //    'Discount'=>'50',
      //    'MinDays'=>'1',
      //    'MaxDays' =>'9',
         
      // ]);

      // AnnouncementPackage::create([
      //    'PackageName' =>'For 10-29 Days',
      //    'OriginalPrice' =>'9',
      //    'Discount'=>'50',
      //    'MinDays'=>'10',
      //    'MaxDays' =>'29',
         
      // ]);

      // AnnouncementPackage::create([
      //    'PackageName' =>'For More than 30 Days',
      //    'OriginalPrice' =>'7',
      //    'Discount'=>'50',
      //    'MinDays'=>'30',
      //    'MaxDays' =>'365',
         
      // ]);
      // return 1;
      $announcements = Advertisement::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.advertisement.advertisement', compact('announcements'));
   }

   public function get_advertisement_size(Request $request){
      $options = ' <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
      id="advertisement_size"><option value="">Select Size</option>';
      $advertisements = AdvertisementPackage::where('location', $request->location)->distinct()->get(['BannerWidth', 'BannerHeight']);
      foreach ($advertisements as $advertisement) {
         $options .= '<option>' . $advertisement->BannerWidth . '-' . $advertisement->BannerHeight . '</option>';
      }
      $options .'</select>';
      return response()->json($options);
   }

   public function get_advertisement_cards(Request $request){
      $size=explode('-',$request->size);
      $advertisements = AdvertisementPackage::where('BannerWidth', $size[0])->where('BannerHeight', $size[1])->get();
      $view=view('Website.school_profile.advertisement.packages')->with(['advertisements'=>$advertisements])->render();
      return response()->json($view);

   }

   public function insert_advertisement(Request $request)
   {
      dd($request->all());
      
      
   }

   public function change_password(Request $request)
   {
      return view('Website.school_profile.change_password');
   }
}
