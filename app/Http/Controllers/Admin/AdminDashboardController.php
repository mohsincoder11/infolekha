<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
            ->get();

        $student_data_count = DB::table('users')->select('users.*', 'student_detail.*', 'user_student.*')
            ->join('user_student', 'user_student.user_id', '=', 'users.id')
            ->count();


        $tutor_data = DB::table('users')->select('users.*', 'user_tutor_detail.*', 'user_tutor.*')
            ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
            ->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->get();

        $tutor_data_count = DB::table('users')->select('users.*', 'user_tutor_detail.*', 'user_tutor.*')
            ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
            ->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->count();

        $school_institute_data = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
            ->get();
            

        $school_data_count = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
            ->where('r_entity', "school")
            ->count();

        $college_data_count = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
            ->where('r_entity', "College")
            ->count();

        $institute_data_count = DB::table('users')->select('users.*', 'user_school_institute_detail.*', 'user_school_institute.*')
            ->join('user_school_institute_detail', 'user_school_institute_detail.user_id', '=', 'users.id')
            ->join('user_school_institute', 'user_school_institute.user_id', '=', 'users.id')
            ->where('r_entity', "Institute")
            ->count();


        return view('dashboard', ['tutor_data' => $tutor_data, 'student_data' => $student_data, 'school_institute_data' => $school_institute_data, 'tutor_data_count' => $tutor_data_count, 'student_data_count' => $student_data_count, 'institute_data_count' => $institute_data_count, 'college_data_count' => $college_data_count, 'school_data_count' => $school_data_count]);
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
