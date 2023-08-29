<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user_student;
use App\Models\user_school_institute;
use App\Models\user_tutor;
use App\Models\Student_detail;
use App\Models\school_institute_detail;
use App\Models\tutor_detail;
use App\Models\City;
use App\Models\Master\state;
use App\Models\Master\Entity;
use App\Models\Master\School;
use App\Models\Master\College;
use App\Models\Master\Institute;
use App\Models\Master\Cources;
use App\Models\Master\Faculties;
use App\Models\SchoolType;
use DB;
use Hash;
use Session;
use App\Models\User;
use Auth;
use Validator;

class SignUpController extends Controller
{
    public function school_institute_register_form()
    {
        $entities = Entity::orderby('entity','asc')->get();
        return view('Website.login-auth.school_institute_register_form', ['entities' => $entities]);
    }


    public function school_institute_register_user_create(Request $request)

    {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'contact_person' => 'required|string|max:255',
                    'r_mob' => 'required|min:10|max:10|unique:user_school_institute',
                    'email' => 'required|string|email|max:255|unique:users', //
                    'password' => 'required|string|min:6|confirmed',
                    'entity' => 'required'
                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {
                $city=trim(explode(',', $request->address)[0]);
                $createOrupdate=City::firstOrCreate(['city'=>$city]);
                

                $users1 = User::create([
                    'name' => $request->get('name'),
                    'password' => Hash::make($request->get('password')),
                    'email' => $request->get('email'),
                    'active' => '0',
                    'role' => '1',
                    'city_id'=>$createOrupdate->id

                ]);

                $inst = user_school_institute::create([
                    'r_name' => $request->get('name'),
                    'r_contact_person' => $request->get('contact_person'),
                    'r_mob' => $request->get('r_mob'),
                    'address' => $request->get('address'),
                    'user_id' => $users1->id,
                    'r_entity' => $request->get('entity'),
                ]);


                Auth::attempt(array('email' => $request->email, 'password' => $request->password));
                return redirect()->route('school_institute_detail_form', ['data' => Auth::user()->id]);
            }
       
    }


    public function school_institute_detail_form(Request $request)
    {

        $school_type = SchoolType::get();
        $courses = Cources::get();
        $facalitys = Faculties::get();

        $data = DB::table('users')->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
            ->select('users.*', 'user_school_institute.*')->where('user_school_institute.user_id', auth::user()->id)->first();



        return view('Website.login-auth.school_institute_details_form', [
            'data' => $data,
            'school_type' => $school_type,
            'courses' => $courses,
            'facalitys' => $facalitys
        ]);
    }


    public function school_institute_detail_create(Request $request)
    {
      
        $request->merge(['about' => preg_replace('/\r\n|\r|\n/', ' ', $request->about)]);

            $validator = Validator::make(
                $request->all(),
                [
                    // 'logo'=>'required',
                    'school_institute' => 'required',
                    'address' => 'required',
                    'about' => 'max:500',
                    'pin_code' => 'required',
                    'oprating_since' => 'required',
                    //'registration_no'=>'required',
                    'mob' => 'required|max:10',
                    'email' => 'required|email|max:255', //
                    //'website'=>'required',
                    //'fb'=>'required',
                    //'insta'=>'required',
                    //'google'=>'required',
                    //'yt'=>'required',
                    'course' => 'required',
                    //'opening_time'=>'required',
                    //'closing_time'=>'required',
                    'facilities' => 'required',
                    // 'image'=>'required',
                    // 'video'=>'required',

                    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
          
                if (school_institute_detail::where('user_id', auth::user()->id)->exists()) {
                    //   dd(auth::user()->id);
                    return  redirect()->back();
                }

                $test = user_school_institute::where('user_id', auth::user()->id)->first();
              

                $inst = new school_institute_detail();
                if ($request->image) {
                    $array_image = [];
                    foreach ($request->image as $images) {
                        $image = 'i'.rand(0000,9999).time() . '.' . $images->getClientOriginalExtension();
                        $images->move(public_path('database_files/school_institute/photo'), $image);
                        array_push($array_image, "database_files/school_institute/photo/" . $image);
                    }
                    $image_name = json_encode($array_image);
                }

                if ($request->video) {
                    $array_video = [];
                    foreach ($request->video as $videos) {
                        $video = 'v'.rand(0000,9999).time(). '.' . $videos->getClientOriginalExtension();
                        $videos->move(public_path('database_files/school_institute/video'), $video);
                        array_push($array_video, 'database_files/school_institute/video/' . $video);
                    }
                    $video_name = json_encode($array_video);
                }



                //$video= time().'.'.$request->file("video")->GetClientOriginalName();
                //$request->video->move(base_path('database_files/school_institute/video'),$video);
                $logo = '';
                $user=User::find(Auth::user()->id);

                if ($request->hasfile('logo')) {
                    $logo = time() . '.' . $request->file("logo")->getClientOriginalExtension();
                    $request->logo->move(public_path('database_files/school_institute/logo'), $logo);
                    $user->logo='database_files/school_institute/logo/' . $logo;
                    $user->save();
                }else{
                    $user->logo='icon/user.png';
                    $user->save();
                }
                $course = json_encode(array_diff($request->get('course'),['Other']));
                $facilities = json_encode(array_diff($request->get('facilities'),['Other']));
    
                $inst->entity_name = $request->get('school_institute');
                $inst->address = $request->get('address');
                $inst->about = $request->get('about');
                $inst->pin_code = $request->get('pin_code');
                $inst->oprating_since = $request->get('oprating_since');
                $inst->registration_no = $request->get('registration_no');
                $inst->mob = $request->get('mob');
                $inst->email = $request->get('email');
                $inst->website = $request->get('website');
                $inst->fb = $request->get('fb');
                $inst->insta = $request->get('insta');
                $inst->google = $request->get('google');
                $inst->yt = $request->get('yt');

                if ($test->r_entity == 'School') {
                    $inst->entity_select = $request->get('school');
                } elseif ($test->r_entity == 'College') {
                    $inst->entity_select = $request->get('college');
                } elseif ($test->r_entity == 'Institute') {
                    $inst->entity_select = $request->get('institute');
                }
                $test->r_name=$request->get('school_institute');
                $test->save();

                $inst->course = $course;
                $inst->opening_time = $request->get('opening_time');
                $inst->closing_time = $request->get('closing_time');
                $inst->facilities = $facilities;
                if ($request->image) {
                    $inst->image = $image_name;
                }
                if ($request->video) {
                    $inst->video = $video_name;
                }
                //$inst->declaration=$request->get('declaration');
                $inst->user_id = auth::user()->id;
                $inst->subscription_status = 0;
                // $inst->activate = 0;

                $inst->save();
                return redirect()->route('payment_form');
    }


    public function tutor_register_form()
    {

        return view('Website.login-auth.tutor_register_form');
    }


    public function tutor_register_user_create(Request $request)

    {
        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'mob' => 'required|min:10|max:10|unique:user_tutor',
                    'email' => 'required|string|email|max:255|unique:users', //|unique:users
                    'password' => 'required|string|min:6|confirmed'
                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {
                $city=trim(explode(',', $request->address)[0]);
                $createOrupdate=City::firstOrCreate(['city'=>$city]);
                
                $users2 = User::create([
                    'name' => $request->get('name'),
                    'password' => Hash::make($request->get('password')),
                    'email' => $request->get('email'),
                    'active' => '0',
                    'role' => '2',
                    'city_id'=>$createOrupdate->id

                ]);



                $inst = user_tutor::create([
                    'r_name' => $request->get('name'),
                    'mob' => $request->get('mob'),
                    'address' => $request->get('address'),


                    'user_id' => $users2->id,


                ]);

                Auth::attempt(array('email' => $request->email, 'password' => $request->password));
                $data = auth::user()->id;
                return redirect()->route('tutor_detail_form', $data);
            }
        }
    }


    public function tutor_detail_form(Request $request)
    {
        $data = DB::table('users')->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->select("user_tutor.*", "users.*")->where('user_tutor.user_id', auth::user()->id)->first();


        return view('Website.login-auth.tutor_details_form', ['data' => $data]);
    }


    public function tutor_detail_create(Request $request)

    {


            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'experiance' => 'required',
                    'subject' => 'required',
                    'mob' => 'required|max:10',
                    'email' => 'required|string|email|max:255', //|unique:tutor_detail
                     'cv' => 'required|max:2048',

                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $cv_file='';
            if ($request->hasfile('cv')) {
                $cv = time() . '.' . $request->file("cv")->getClientOriginalExtension();
                $request->cv->move(public_path('database_files/tutor/cv'), $cv);
                $cv_file='database_files/tutor/cv/' . $cv;
            }

                $inst = tutor_detail::updateOrCreate(
                    ['user_id'=>auth::user()->id],
                [
                    'name' => $request->get('name'),
                    'subject' => $request->get('subject'),
                    'experiance' => $request->get('experiance'),
                    'job_type' => $request->get('job_type'),
                    'mob' => $request->get('mob'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                    'pin_code' => $request->get('pin_code'),
                    'declaration' => $request->get('declaration'),
                    'user_id' => auth::user()->id,
                    'subscription_status' => 0,
                    'cv'=>$cv_file
                ]);
                user_tutor::where('user_id',auth::user()->id)->update(['r_name'=>$request->get('name')]);
                return redirect()->route('payment_form');
    }

    public function student_detail_update(request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'class' => 'required',
                    'mob' => 'required|max:10',
                    'email' => 'required|string|email|max:255', //|unique:student_detail
                    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {
                
                $user=User::find(Auth::user()->id);
            if ($request->hasFile('address_proof')) {
                $image = 'database_files/student/photo/'.time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('database_files/student/photo'), $image);
                $user->logo=$image;
            }else{
                $image='icon/user.png';
                $user->logo='icon/user.png';

            }
            $user->save();
                $inst = Student_detail::where("id", $request->data)->update([
                    'name' => $request->get('name'),
                    'class' => $request->get('class'),
                    'mob' => $request->get('mob'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                    'state' => $request->get('state'),
                    'city' => $request->get('city'),
                    'pin_code' => $request->get('pin_code'),
                    'image' => $image,
                    'user_student_id' => $request->user_student_id
                ]);
                return redirect()->route('login');
            }
        }
    }



    public function school_institute_detail_upload(Request $request)

    {


        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'school_institute' => 'required',
                    'address' => 'required',
                    'about' => 'required',
                    'pin_code' => 'required',
                    'oprating_since' => 'required',
                    'registration_no' => 'required',
                    'mob' => 'required|max:10',
                    'email' => 'required|email|max:255', //
                    'website' => 'required',
                    'fb' => 'required',
                    'insta' => 'required',
                    'google' => 'required',
                    'yt' => 'required',
                    'school' => 'required',
                    'college' => 'required',
                    'institute' => 'required',
                    'course' => 'required',
                    'opening_time' => 'required',
                    'closing_time' => 'required',
                    'facilities' => 'required',
                    // 'image'=>'required',
                    // 'video'=>'required',
                    'declaration' => 'required'
                    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {
                if (school_institute_detail::where('user_school_institute_id', $request->data)->exists()) {
                    return  redirect()->back();
                }


                //
                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('database_files\school_institute\photo'), $image);

                $video = time() . '.' . $request->file("video")->GetClientOriginalName();
                $request->video->move(public_path('database_files\school_institute\video'), $video);



                $inst = school_institute_detail::create([
                    'school_institute' => $request->get('school_institute'),
                    'address' => $request->get('address'),
                    'about' => $request->get('about'),
                    'pin_code' => $request->get('pin_code'),
                    'oprating_since' => $request->get('oprating_since'),
                    'registration_no' => $request->get('registration_no'),
                    'mob' => $request->get('mob'),
                    'email' => $request->get('email'),
                    'website' => $request->get('website'),
                    'fb' => $request->get('fb'),
                    'insta' => $request->get('insta'),
                    'google' => $request->get('google'),
                    'yt' => $request->get('yt'),
                    'school' => $request->get('school'),
                    'college' => $request->get('college'),
                    'institute' => $request->get('institute'),
                    'course' => $request->get('course'),
                    'opening_time' => $request->get('opening_time'),
                    'closing_time' => $request->get('closing_time'),
                    'facilities' => $request->get('facilities'),
                    'image' => $image,
                    'video' => $video,
                    'declaration' => $request->get('declaration'),
                    'user_school_institute_id' => $request->user_school_institute_id



                ]);
                return redirect()->route('school_institute_register_form');
            }
        }
    }


    public function student_register_form()
    {
        $city = city::get();
        $state = state::get();
        return view('Website.login-auth.student_register_form', ['citys' => $city, 'states' => $state]);
    }


    public function student_register_user_create(Request $request)

    {
        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'current_school_institute' => 'required|string|max:255',
                    'mob' => 'required|max:10|unique:user_student',
                    'email' => 'required|string|email|max:255', //|unique:users
                    'password' => 'required|string|min:6|confirmed'
                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {

$city=trim(explode(',', $request->address)[0]);
                $createOrupdate=City::firstOrCreate(['city'=>$city]);
                
                $users3 = User::create([
                    'name' => $request->get('name'),
                    'password' => Hash::make($request->get('password')),
                    'email' => $request->get('email'),
                    'active' => '1',
                    'role' => '3',
                    'city_id'=>$createOrupdate->id
                ]);



                $inst = user_student::create([
                    'r_name' => $request->get('name'),
                    'r_current_school_institute' => $request->get('current_school_institute'),
                    'mob' => $request->get('mob'),
                    'address' => $request->get('address'),
                    'user_id' => $users3->id,


                ]);
                Auth::attempt(array('email' => $request->email, 'password' => $request->password));

                $data = Auth::user()->id;
                return redirect()->route('college_listing');
            }
        }
    }


    public function student_detail_form(Request $request)
    {
        $data = user_student::find($request->data);
        return view('Website.login-auth.student_details_form')->with('data', $data);
    }


    public function student_detail_create(Request $request)

    {


        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255',
                    'class' => 'required',
                    'mob' => 'required|max:10',
                    'email' => 'required|string|email|max:255|unique:student_detail', //|unique:student_detail
                    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]
            );

            if ($validator->fails()) {
                //  return redirect()->back()->with('error',$validator->errors());
                return  redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->passes()) {

                if (Student_detail::where('user_student_id', $request->data)->exists()) {
                    return  redirect()->back();
                }

                $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('database_files/student/photo', $image));

                $inst = Student_detail::create([
                    'name' => $request->get('name'),
                    'class' => $request->get('class'),
                    'mob' => $request->get('mob'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                    'state' => $request->get('state'),
                    'city' => $request->get('city'),
                    'pin_code' => $request->get('pin_code'),
                    'image' => 'database_files/student/photo/' . $image,
                    'user_student_id' => $request->data



                ]);
                return redirect('college_listing');
            }
        }
    }


}
