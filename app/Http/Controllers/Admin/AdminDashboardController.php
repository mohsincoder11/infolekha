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
        $query2 = DB::table('users')->select('users.*', 'user_student.*')
            ->join('user_student', 'user_student.user_id', '=', 'users.id')
            ->orderBy('users.id','desc');
            
            $count['student']=(clone $query2)->count();
            $student_data =$query2->limit(50)->get();


        $query3 = DB::table('users')->select('users.*', 'user_tutor_detail.*', 'user_tutor.*')
            ->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
            ->join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
            ->orderBy('users.id','desc')
           ;

            $count['tutor']=(clone $query3)->count();
            $tutor_data= $query3->limit(50)
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
            $count['announcement_pending']=(clone $announcement)->where('status','Pending')->count();
            $count['announcement_rejected']=(clone $announcement)->where('status','Reject')->count();

            $advertisement=AdvertisementEnquiry::query();
            $count['advertisement_pending']=(clone $advertisement)->where('status','Pending')->count();
            $count['advertisement_active']=(clone $advertisement)->where('status','Active')->count();
            $count['advertisement_rejected']=(clone $advertisement)->where('status','Rejected')->count();

            $chart_count=[$count['school'],$count['college'],$count['institute'],$count['student'],$count['tutor']];

            $transactions_chart = Transaction::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                'transaction_status',
                DB::raw('SUM(amount) as total_amount')
            )
            ->groupBy('year', 'month', 'transaction_status')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->orderBy('transaction_status', 'asc')
            ->get();

            $user_register_by_month_chart = User::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('Count(*) as total_user')
            )
            ->where('role','!=','0')
            ->whereYear('created_at', date('Y')) // Filter by the current year
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
           
           $announcement_chart=[$count['announcement_pending'],$count['announcement_active'],$count['announcement_rejected']];
           $advertisement_chart=[$count['advertisement_pending'],$count['advertisement_active'],$count['advertisement_rejected']];
        return view('admin.dashboard', ['tutor_data' => $tutor_data, 'student_data' => $student_data, 'school_institute_data' => $school_institute_data, 'count' => $count,'chart_count'=>$chart_count,'transactions_chart'=>$transactions_chart,'announcement_chart'=>$announcement_chart,
        'advertisement_chart'=>$advertisement_chart,'user_register_by_month_chart'=>$user_register_by_month_chart]);
    }
    
    public function delete_user($id){
        $user = User::find($id);
        if($user){
            if($user->role==1){
                DB::table('users')->where('id', $id)->delete();
                DB::table('user_school_institute_detail')->where('user_id', $id)->delete();
                DB::table('user_school_institute')->where('user_id', $id)->delete();
                
        }
        else if($user->role==2){
            DB::table('users')->where('id', $id)->delete();
            DB::table('user_tutor_detail')->where('user_id', $id)->delete();
            DB::table('user_tutor')->where('user_id', $id)->delete();
        }
        else if($user->role==3){
            DB::table('users')->where('id', $id)->delete();
            DB::table('user_student')->where('user_id', $id)->delete();
        }
        return back()->with(['success'=> 'User deleted successfully']);
        }else{
            return back()->with(['error'=> 'Something went wrong']);

        }
    }

    public function activation(Request $request)
    {
        $record = User::find($request->id);
        if($record){
            $record->active = $request->active;
            $record->note = $request->note;
            $record->save();
        return back()->with(['status' => 'success', 'message' => 'Status updated successfully']);
        }else{
            return back()->with(['status' => 'error', 'message' => 'Something went wrong']);

        }
       
    }
}
