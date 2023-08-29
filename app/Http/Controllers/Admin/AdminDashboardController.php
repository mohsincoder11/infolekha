<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementEnquiry;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\user_student;
use App\Models\user_school_institute;
use App\Models\user_tutor;
use App\Models\Student_detail;
use App\Models\school_institute_detail;
use App\Models\tutor_detail;
use App\Models\transaction;
use App\Models\Anouncement;
use App\Models\Contact_Us;
use App\Models\City;
use App\Models\Master\state;
use App\Models\Master\Entity;
use App\Models\Master\School;
use App\Models\Master\College;
use App\Models\Master\Institute;
use App\Models\Master\Cources;
use App\Models\Master\Faculties;
use DB,Hash;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $student_data = DB::table('users')->select('users.*', 'user_student.*')
            ->join('user_student', 'user_student.user_id', '=', 'users.id')
            ->orderBy('users.id','desc')
            ->limit(50)
            ->get();



        $tutor_data = DB::table('users')->select('users.*', 'user_tutor_detail.*', 'user_tutor.*')
            ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
            ->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->orderBy('users.id','desc')
            ->limit(50)
            ->get();


        $query = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id');
            

            $count['school'] = (clone $query)
            ->where('r_entity', 'school')
            ->count();
        
        $count['college'] = (clone $query)
            ->where('r_entity', 'College')
            ->count();
        
        $count['institute'] = (clone $query)
            ->where('r_entity', 'Institute')
            ->count();

            $school_institute_data=$query
            ->orderBy('users.id','desc')
            ->limit(50)
            ->get();

            $announcement=Announcement::query();
            $count['announcement_active']=(clone $announcement)->where('status','Active')->count();
            $count['announcement_rejected']=(clone $announcement)->where('status','Reject')->count();

            $advertisement=AdvertisementEnquiry::query();
            $count['advertisement_active']=(clone $advertisement)->where('status','Active')->count();
            $count['advertisement_rejected']=(clone $advertisement)->where('status','Rejected')->count();



        return view('dashboard', ['tutor_data' => $tutor_data, 'student_data' => $student_data, 'school_institute_data' => $school_institute_data, 'count' => $count]);
    }

    public function activation(Request $request)
    {
        $record = User::find($request->id);
        if($record){
             $record->active = ($record->active == '0') ? '1' : '0';
        $record->save();
        return response()->json(['status' => 'true', 'action' => $request->action]);
        }else{
            return response()->json(['status' => 'false', 'action' => $request->action]);

        }
       
    }
}
