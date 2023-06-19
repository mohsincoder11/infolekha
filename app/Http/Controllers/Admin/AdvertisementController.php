<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvertisementEnquiry;
use Validator;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = AdvertisementEnquiry::orderby('EnquiryID', 'desc')->get();
        return view('admin.advertisement.index', compact('advertisements'));
    }

    public function ChangeAdvertisementStatus(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'EnquiryID' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }
        AdvertisementEnquiry::where('EnquiryID', $request->EnquiryID)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with(['success' => 'Status Changed successfully.']);
    }


    public function uploadAdvertisement(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'EnquiryID' => 'required',
                'image' => 'file|image|mimes:jpeg,png,gif|max:2048',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Please insert valid data.']);
        }
        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/advertisement/'), $filename);
        }
        AdvertisementEnquiry::where('EnquiryID', $request->EnquiryID)->update([
            'image' => '/advertisement/' . $filename,
        ]);
        return redirect()->back()->with(['success' => 'File uploaded successfully.']);
    }
}
