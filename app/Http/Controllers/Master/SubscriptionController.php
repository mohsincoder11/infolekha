<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Subscription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubscriptionController extends Controller
{
    public function index(){
        $Subscription=Subscription::orderby('id','desc')->get();
        return view('Master.subscription.index',['Subscription'=>$Subscription]);
       }

       public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
           [
            'plan' => 'required|string|max:255',
            'type' => 'required|in:Month,Year,Days',
            'user_type' => 'required|in:1,2,3',
            'days' => 'required|numeric',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }
        // Create new coupon and save in the database
        $Subscription = new Subscription([
            'plan' => $request->input('plan'),
            'type' => $request->input('type'),
            'user_type' => $request->input('user_type'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'days' => $request->input('days'),
            'view_once' => $request->input('view_once') ?? '0',
        ]);

        $Subscription->save();
        return redirect()->back()->with(['success'=>'Subscription successfully Inserted.']);
       }

       public function edit(Request $request){
        $Subscription=Subscription::all();
        $edit=Subscription::find($request->id);
        return view('Master.subscription.edit',['Subscription'=>$Subscription,'edit'=>$edit]);
       }

       public function update(Request $request){
        $SubscriptionId=$request->id;
        $validator = Validator::make(
            $request->all(),
           [
            'plan' => 'required|string|max:255',
            'type' => 'required|in:Month,Year,Days',
            'user_type' => 'required|in:1,2,3',
            'days' => 'required|numeric',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }

        // Create new coupon and save in the database
        Subscription::where('id',$request->id)->update([
            'plan' => $request->input('plan'),
            'type' => $request->input('type'),
            'user_type' => $request->input('user_type'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'days' => $request->input('days'),
            'view_once' => $request->input('view_once') ?? '0',
        ]);

        return redirect()->route('admin.master.subscription')->with(['success'=>'Subscription successfully Updated.']);
       }

        public function destroy($id)
        {
            $Subscription = Subscription::find($id);
            if ($Subscription) {
                $Subscription->delete();
            }
            return redirect()->route('admin.master.subscription')->with(['success'=>'Subscription successfully Deleted.']);
        }

}

