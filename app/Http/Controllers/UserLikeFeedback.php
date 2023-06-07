<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLikeModel;
use App\Models\UserFeedbackModel;
use Illuminate\Support\Facades\Auth;
use App\Models\UserEnquiry;

class UserLikeFeedback extends Controller
{
    function like_unlike(Request $request)
    {
        $check_exist_like = UserLikeModel::where(
            [
                'user_id' => Auth::user()->id, 'college_id' => $request->college_id
            ]
        )->first();
        if ($check_exist_like) {
            $check_exist_like->delete();
        } else {
            UserLikeModel::create(
                [
                    'user_id' => Auth::user()->id,
                    'college_id' => $request->college_id
                ]
            );
        }
        return response()->json(['status' => true, 'message' => 'success']);
    }

    public function insert_feedback(Request $request)
    {
        UserLikeModel::create(
            [
                'user_id' => Auth::user()->id,
                'college_id' => $request->college_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );
        return redirect()->back()->with(['status' => true, 'message' => 'success']);
    }

    public function post_enquiry(Request $request)
    {
        $contact = new UserEnquiry;
        $contact->user_id = Auth::user()->id;
        $contact->college_id = $request->college_id;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        $contact->save();
        return redirect()->back()->with(['status' => true, 'message' => 'Enquiry send successfully.']);;
    }

    public function like_login_redirect(){
        return redirect('login')->with(['error' => true, 'message' => 'You must be logged in.']);;


    }


}
