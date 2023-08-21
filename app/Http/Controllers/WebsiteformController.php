<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementEnquiry;
use Illuminate\Http\Request;
use App\Models\user_student;
use App\Models\user_school_institute;
use App\Models\user_tutor;
use App\Models\Student_detail;
use App\Models\school_institute_detail;
use App\Models\tutor_detail;
use App\Models\transaction;
use App\Models\Announcement;
use App\Models\City;
use App\Models\Contact_Us;
use App\Models\Master\state;
use App\Models\Master\Entity;
use App\Models\Master\School;
use App\Models\Master\College;
use App\Models\Master\Institute;
use App\Models\Master\Cources;
use App\Models\Master\Faculties;
use App\Models\SchoolType;

use App\Models\CollegelistingEnquiry;
use App\Models\JobVacancy;
use App\Models\JobVacancyApplied;
use App\Models\PostResult;
use Hash;
use Session;
use App\Models\User;
use App\Models\UserLikeModel;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
class WebsiteformController extends Controller


{

    public function index()
    {

        $announcements = Announcement::where('status','Active');
        if(Auth::check()){
            $announcements=$announcements->where('city_id',Auth::user()->city_id);
        }
        $announcements= $announcements->get();
        return view('Website.index', ['announcements' => $announcements]);
    }


public function database_backup(){
    try {
        $tables = DB::select('SHOW TABLES');
        $backupSQL = '';

        foreach ($tables as $table) {
            $tableName = reset($table);
            $createTable = DB::selectOne("SHOW CREATE TABLE $tableName")->{'Create Table'};

            $backupSQL .= "DROP TABLE IF EXISTS `$tableName`;\n";
            $backupSQL .= "$createTable;\n";

            $tableData = DB::table($tableName)->get();

            foreach ($tableData as $row) {
                $values = [];
                foreach ($row as $value) {
                    $values[] = '"' . addslashes($value) . '"';
                }
                $backupSQL .= "INSERT INTO `$tableName` VALUES (" . implode(', ', $values) . ");\n";
            }

            $backupSQL .= "\n";
        }

        $backupFileName = 'backup-' . now()->format('Y-m-d-His') . '.sql';
        Storage::disk('local')->put($backupFileName, $backupSQL);

        return response()->download(
            storage_path('app/' . $backupFileName),
            $backupFileName,
            ['Content-Type: application/sql']
        )->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        return redirect()->route('home')->with('error', 'Database backup creation and download failed: ' . $e->getMessage());
    }
}


    public function index_contact()
    {

        return view('Website.contact-us');
    }

    public function create_contact(Request $request)
    {
        $contact = new Contact_Us;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->message = $request->get('message');
        $contact->save();
        return redirect(route('web_contacts'));
    }


    public function event()
    {
        return view('Website.event');
    }

    public function coming_soon()
    {
        return view('Website.coming_soon');
    }


    public function anouncement(Request $request)
    {
        $inst = user_student::where('r_city', $request->city);
        $inst1 = user_student::where('r_city', $request->city);
        return response()->json(['status' => true, 'data' => $inst, 'second' => $inst1]);
    }

    public function announwebs(Request $request)
    {
        $anu = Announcement::where('id', $request->id)->first();
        // echo json_encode($anu);
        // exit();
        return view('Website.announcementweb', ['anu' => $anu]);
    }


    public function college_listing(Request $request)
    {
      
        $main_query = school_institute_detail::join('users', 'users.id', '=', 'user_school_institute_detail.user_id')
        ->join('user_school_institute', 'user_school_institute.user_id', '=', 'user_school_institute_detail.user_id')
        ->where('users.active', '1')
        ->where('user_school_institute_detail.subscription_status', '1')
        ->select('user_school_institute_detail.*', 'users.logo', 'users.city_id')
        ->groupBy('users.id');
    
    if (isset($request->type) && $request->type != 'tutorjob' && $request->type != null) {
        $main_query->where('user_school_institute.r_entity', $request->type);
    }
    
    if (isset($request->tutor_vacancy) && $request->tutor_vacancy != 'All') {
        $main_query->join('job_vacancy', 'users.id', '=', 'job_vacancy.college_id');
    }
    
    if (isset($request->board_type) && $request->board_type != null) {
        $main_query->where('user_school_institute_detail.entity_select', $request->board_type);
    }
    
    if (isset($request->stream) && $request->stream != null) {
        $main_query->where('user_school_institute_detail.entity_select', $request->stream);
    }
    
    if (isset($request->city) && $request->city != null) {
        City::firstOrCreate(['city' => $request->city], ['city' => $request->city]);
        $city_id = DB::table('cities')->where('city', $request->city)->value('id');
        $main_query->where('users.city_id', $city_id);
    }
    
    $college_list = $main_query->paginate(10);
    
    // The $college_list variable now contains the paginated results based on the conditions
    
                    
                
            
       // exit();
        $entities = Entity::orderby('entity','asc')->get();
        $school_type = SchoolType::get();

        $advertisements=AdvertisementEnquiry::where('image','!=',null)->where('status','Active')->take(8)->get();

        return view('Website.college-listing.listing', ['college_list' => $college_list,'entities'=>$entities,'school_type'=>$school_type,'advertisements'=>$advertisements]);
    }

    public function listing_details(Request $request)
    {
        $details = User::join('user_school_institute', 'users.id', '=', 'user_school_institute.user_id')
        ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
        ->where('users.active', '1')
        ->where('users.id', $request->id)
        ->where('user_school_institute_detail.subscription_status', '1')
        ->select('user_school_institute_detail.*', 'user_school_institute.*')
        ->first();
        $advertisements=AdvertisementEnquiry::where('image','!=',null)->where('status','Active')->take(8)->get();
        $jobs=JobVacancy::where('college_id',$request->id)->orderby('id','desc')->get();
        $past_results=PostResult::where('college_id',$request->id)->orderby('start_year','desc')->get();
        if( $details){
            return view('Website.college-listing.listing-details', compact('details','advertisements','jobs','past_results'));
        }
        else{
            return abort(404);
        }
    }

    public function apply_for_job(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'job_vacancy_id' => 'required',
                'college_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            //  return redirect()->back()->with('error',$validator->errors());
            return  redirect()
                ->back()
                ->with(['error'=>'Something went wrong.']);
        }
        JobVacancyApplied::firstOrCreate(
            [
                'tutor_id'=>Auth::user()->id,
                'job_vacancy_id'=>$request->job_vacancy_id,
            ],
            [
                'tutor_id'=>Auth::user()->id,
                'job_vacancy_id'=>$request->job_vacancy_id,
                'college_id'=>$request->college_id,
            ]
            );
            return  redirect()
            ->back()
            ->with(['success'=>'Job applied successfully.']);


    }
    public function log_out()
    {
        Auth::logout();
        return redirect()->route('index')->with(['success'=>'Log out successfully.']);
    }



    public function send_mobile_verify_otp(Request $request)
    {
        $otp=$this->send_otp($request->mob);
        return response()->json($otp);
    }

    public function send_forget_otp(Request $request)
    {
        $check_user_exist1=DB::table('user_student')->where('mob',$request->mob)->first();
        if($check_user_exist1){
            $otp=$this->send_otp($request->mob);
            return response()->json(['user_id'=>$check_user_exist1->user_id,'status'=>true,'otp'=>$otp]);
        }
        else{
            $check_user_exist2=DB::table('user_tutor')->where('mob',$request->mob)->first();
            if($check_user_exist2){
                $otp=$this->send_otp($request->mob);
                return response()->json(['user_id'=>$check_user_exist2->user_id,'status'=>true,'otp'=>$otp]);
            }else{
                $check_user_exist3=DB::table('user_school_institute')->where('r_mob',$request->mob)->first();
                if($check_user_exist3){
                    $otp=$this->send_otp($request->mob);
                    return response()->json(['user_id'=>$check_user_exist3->user_id,'status'=>true,'otp'=>$otp]);
            }else{
                return response()->json(['status'=>false,'otp'=>'User does not exist.']);
            }
        }

    }
    }

    public function update_password_using_mobile(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required',
                'otp' => 'required',
                'r_mob' => 'required',

            ]
        );

        if ($validator->fails()) {
            //  return redirect()->back()->with('error',$validator->errors());
            return redirect()->back()->with(['error'=>'Please fill all the data.']);

        }

        $user=User::find($request->user_id);
        if ($user) {
            $user->password=Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with(['success'=>'Password has been updated.']);
        }else{
            return redirect()->back()->with(['error'=>'Existing password do not match.']);

        }
    }

    function send_otp($mob){
         //   $otp = rand(1000, 9999);
            $otp = 1234;
        //   $name = 'customer';
        //   $msg = 'Dear ' . $name . ', Please enter this OTP ' . $otp . '. to verify your account. Thank you for choosing INFOlekha.org.';
        //   $msg = urlencode($msg);
        //   $to = $mob;
        //   //$user->mobile;
        //   // $request->mobile;
        //   $data1 = "uname=habitm1&pwd=habitm1&senderid=ILEKHA&to=" .
        //       $to . "&msg=" . $msg .
        //       "&route=T&peid=1701168292124454704&tempid=1707168309589390057";
        //   $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
        //   curl_setopt($ch, CURLOPT_POST, true);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //   $result = curl_exec($ch);
        //   curl_close($ch);
        return $otp;
    }

    

    public function val_form(Request $request)
    {
        if (user_student::where('mob', $request->r_mob)->exists()) {
            return response()->json(false);
        } elseif (user_school_institute::where('r_mob', $request->r_mob)->exists()) {
            return response()->json(false);
        } elseif (user_tutor::where('mob', $request->r_mob)->exists()) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function check_email_exist(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function about_us(Request $request)
    {
        return view('Website.about');
    }


    public function privacy_policy(Request $request)
    {

        return view('Website.privacy_policy');
    }

    public function term(Request $request)
    {
        return view('Website.term');
    }

    public function refund(Request $request)
    {
        return view('Website.refund');
    }

    public function blog(Request $request)
    {
        return view('Website.blog');
    }

    public function payfail(Request $request)
    {
        transaction::where('transaction_id', $request->txnid)->update([
            'transaction_status' => $request->status,
        ]);
        return redirect('payfail-complete');
    }

    public function success(Request $request)
    {
        if ($request->udf1 == 1) {
            DB::table('transaction')->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'transaction.user_id')
                ->where('transaction.transaction_id', $request->txnid)->update([
                    'user_school_institute_detail.subscription_status' => 1,
                    'transaction.transaction_status' => $request->status

                ]);
        } elseif ($request->udf1 == 2) {
            DB::table('transaction')->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'transaction.user_id')
                ->where('transaction.transaction_id', $request->txnid)->update([
                    'user_tutor_detail.subscription_status' => 1,
                    'transaction.transaction_status' => $request->status

                ]);
        }

        return redirect('success-complete');
    }

    public function payment_form(Request $request)
    {
        return view('Website.payment_form');
    }

    public function role(Request $request)
    {
       // return view('Website.role-blog-5');
        return view('Website.blogs.blog-new5');

    }

    public function opportunites(Request $request)
    {

        return view('Website.blogs.blog-new1');
    }

    public function choosing(Request $request)
    {

        //return view('Website.choosing-carrier-blog2');
        return view('Website.blogs.blog-new2');

    }

    public function stratigic(Request $request)
    {

       // return view('Website.stratigic-blog3');
        return view('Website.blogs.blog-new3');

    }

    public function benifite(Request $request)
    {

       // return view('Website.benifite4');
        return view('Website.blogs.blog-new4');

    }

    public function save_city(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'city' => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json(false);
            }
            $createOrupdate=City::firstOrCreate(['city'=>$request->city]);
            if(Auth::check() && (Auth::user()->role==2 )){
                User::find(Auth::user()->id)->update(['city_id'=>$createOrupdate->id]);
            }
        return response()->json(true);
    }

    public function remove_wishlist(Request $request){
        $delete=UserLikeModel::where('id',$request->id)->delete();
        return back()->with(['success'=>'Removed from the wishlist.']);
    }
}
