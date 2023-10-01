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
            return response()->json(['status' => true, 'message' => 'Remove from the wishlist.']);

        } else {
            UserLikeModel::create(
                [
                    'user_id' => Auth::user()->id,
                    'college_id' => $request->college_id
                ]
            );
            return response()->json(['status' => true, 'message' => 'Added to wishlist.']);

        }
    }

    public function insert_feedback(Request $request)
    {
        UserFeedbackModel::create(
            [
                'user_id' => Auth::user()->id,
                'college_id' => $request->college_id,
                'name' => $request->name,
                'email' => $request->email,
                'rating' => $request->rating ? intval($request->rating) : 0,
                'comment' => $request->comment,
            ]
        );
        return redirect()->back()->with(['success' => 'Feedback saved successfully.']);
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

        app('App\Http\Controllers\Admin\MailController')->student_enquiry_mail($contact->college_id,$contact);


        return redirect()->back()->with(['success' => 'Enquiry send successfully.']);;
    }

    public function like_login_redirect(){
        return back()->with(['error' =>'Please login to wishlist.']);;
    }

    public function enquiry_login_redirect(){
        return back()->with(['error' =>'Please login to send enquiry.']);;
    }
    

}
