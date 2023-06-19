<?php

use App\Models\JobVacancy;
use App\Models\transaction;
use App\Models\UserLikeModel;
use Illuminate\Support\Facades\Auth;

function check_if_like($college_id)
{
    if(Auth::check()){
    $check = UserLikeModel::where(
        [
            'user_id' => Auth::user()->id, 'college_id' => $college_id
        ]
    )->first();
    if ($check) {
        return 'active_heart';
    } else {
        return '';
    }
}
else{
    return '';

}
}


function get_college_rating($college_id)
{  
    $averageRating = DB::table('user_feedback')
    ->where('college_id', $college_id)
    ->avg('rating');
    return number_format($averageRating,1);
}

function get_board_name($id)
{ 
    $board_name=DB::table('school_types')->where('id',$id)->first()->type;
    return $board_name ?? '';
}

function get_college_stream(){
    $stream=['Arts','Commerce','Science'];
    return $stream;
}

function check_announcement_payment($AnnouncementID=null){
    $check=transaction::where('user_id',auth::user()->id)->where('AnnouncementID',$AnnouncementID)->where('type','Announcement')->first();
    if($check){
        if($check->transaction_status=='success'){
            $status='Paid';
        }else{
            $status = '<a href="' . route('school_profile.announcement-package', $AnnouncementID) . '">Make Payment</a>';

        }
    }else{
        $status='N/A';
    }
    return $status;
}

function check_announcement_payment_status($AnnouncementID=null,$user_id=null){
    $check=transaction::where('user_id',$user_id)->where('AnnouncementID',$AnnouncementID)
    ->where('type','Announcement')->first();
    if($check){
        if($check->transaction_status=='success'){
            $status='Paid';
        }else{
            $status = 'Pending';

        }
    }else{
        $status='N/A';
    }
    return $status;
}

function vacancy_count(){
    $count=JobVacancy::count();
    return $count;
}