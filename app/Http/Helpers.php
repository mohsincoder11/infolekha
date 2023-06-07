<?php

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
    return round($averageRating * 2) / 2;
}