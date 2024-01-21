<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use Illuminate\Http\Request;
use Validator;


class WebsiteSettingController extends Controller
{
    public function index(){

        return view('Master.otp-master', ['current_otp' => WebsiteSetting::first()]);

    }

    public function update(Request $request){
        $validator = Validator::make(
            $request->all(),
             [
            'otp' => 'required|digits:4',
        ]);
    
        if ($validator->fails()) {
            return back()
                ->with(['error'=>"OTP must be 4 digit only."]);
        }
    
        $otp = $request->input('otp');
        WebsiteSetting::first()->update(['otp' => $otp]);
        return redirect()->back()->with('success', 'OTP updated successfully.');

    }
}
