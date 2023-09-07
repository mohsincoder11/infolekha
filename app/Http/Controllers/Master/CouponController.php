<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Coupon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class CouponController extends Controller
{
    public function index(){
        $Coupon=Coupon::all();
        return view('Master.coupon.index',['Coupon'=>$Coupon]);
       }

       public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
           [
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:coupons',
            'type' => 'required|in:FLAT,PERCENT',
            'discount' => 'required|numeric|min:0',
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
        $coupon = new Coupon([
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'discount' => $request->input('discount'),
            'status' => $request->input('status'),
            'coupon_for' => $request->input('coupon_for'),
        ]);

        $coupon->save();
        return redirect()->back()->with(['success'=>'Successfully Inserted.']);
       }

       public function edit(Request $request){
        $Coupon=Coupon::all();
        $edit=Coupon::find($request->id);
        return view('Master.coupon.edit',['Coupon'=>$Coupon,'edit'=>$edit]);
       }

       public function update(Request $request){
        $couponId=$request->id;
        $validator = Validator::make(
            $request->all(),
           [
            'title' => 'required|string|max:255',
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('coupons')->ignore($couponId),
            ],
            'type' => 'required|in:FLAT,PERCENT',
            'discount' => 'required|numeric|min:0',
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
        Coupon::where('id',$request->id)->update([
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'discount' => $request->input('discount'),
            'status' => $request->input('status'),
            'coupon_for' => $request->input('coupon_for'),

        ]);

        return redirect()->route('admin.master.coupon')->with(['success'=>'Successfully Updated.']);
       }

        public function destroy($id)
        {
            $coupon = Coupon::find($id);
            if ($coupon) {
                $coupon->delete();
            }
            return redirect()->route('admin.master.coupon')->with(['success'=>'Successfully Deleted.']);
        }

}
