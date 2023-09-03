<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\AdvertisementEnquiry;
use App\Models\AdvertisementPackage;
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

    public function advertisement_list(){
        $Advertisement=AdvertisementPackage::all();
        return view('Master.advertisement.index',['Advertisement'=>$Advertisement]);
       }

       public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
           [
            'PackageName' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'location' => 'required',
            'BannerWidth' => 'required',
            'BannerHeight' => 'required',
            'OriginalPrice' => 'required',
            'MinDays' => 'required',
            'MaxDays' => 'required',
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
        $Advertisement = new AdvertisementPackage([
            "PackageName" => $request->PackageName,
            "location" => $request->location,
            "label" => $request->label,
            "BannerWidth" => $request->BannerWidth,
            "BannerHeight" => $request->BannerHeight,
            "OriginalPrice" => $request->OriginalPrice,
            "MinDays" => $request->MinDays,
            "MaxDays" => $request->MaxDays,
        ]);

        $Advertisement->save();
        return redirect()->back()->with(['success'=>'Advertisement Package Successfully Inserted.']);
       }

       public function edit($id){
        $Advertisement=AdvertisementPackage::all();
        $edit=AdvertisementPackage::where('PackageID',$id)->first();
        return view('Master.advertisement.edit',['Advertisement'=>$Advertisement,'edit'=>$edit]);
       }

       public function update(Request $request){
            $validator = Validator::make(
                $request->all(),
               [
                'PackageName' => 'required|string|max:255',
                'label' => 'required|string|max:255',
                'location' => 'required',
                'BannerWidth' => 'required',
                'BannerHeight' => 'required',
                'OriginalPrice' => 'required',
                'MinDays' => 'required',
                'MaxDays' => 'required',
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
        AdvertisementPackage::where('PackageID',$request->id)->update([
            "PackageName" => $request->PackageName,
            "location" => $request->location,
            "label" => $request->label,
            "BannerWidth" => $request->BannerWidth,
            "BannerHeight" => $request->BannerHeight,
            "OriginalPrice" => $request->OriginalPrice,
            "MinDays" => $request->MinDays,
            "MaxDays" => $request->MaxDays,
        ]);

        return redirect()->route('admin.master.advertisement')->with(['success'=>'Advertisement Package Successfully Updated.']);
       }

        public function destroy($id)
        {
            $Advertisement = AdvertisementPackage::where('PackageID',$id)->first();
            if ($Advertisement) {
                $Advertisement->delete();
            }
            return redirect()->route('admin.master.advertisement')->with(['success'=>'Advertisement Package Successfully Deleted.']);
        }

}
