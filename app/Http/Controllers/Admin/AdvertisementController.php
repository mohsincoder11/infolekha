<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\AdvertisementEnquiry;
use App\Models\AdvertisementPackage;
use Validator;
use Illuminate\Support\Facades\Auth;

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
        $advertisement=AdvertisementEnquiry::where('EnquiryID', $request->EnquiryID)->first();
        $advertisement->status =$request->status;
        $advertisement->save();
        if($request->status=='Active'){
            app('App\Http\Controllers\Admin\MailController')->advertisement_confirmation_mail($advertisement->college_id,$advertisement);
        }
       
        return redirect()->back()->with(['success' => 'Status Changed successfully.']);
    }

    public function uploadAdvertisement(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'EnquiryID' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,gif|max:2048',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Please upload valid image.']);
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

        public function add_advertisement(Request $request){
            $validator = Validator::make(
                $request->all(),
               [
               
                'location' => 'required',
                'status' => 'required',
                'size' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
            ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }
        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/advertisement/'), $filename);
        }
        $size = explode('-', $request->size);
        AdvertisementEnquiry::create([
            'PackageID'=>0,
            'college_id'=>Auth::guard('admin')->user()->id,
            'PackageName'=>'Publish by Infolekha',
            'location'=>$request->location,
            'status'=>$request->status,
            'image'=>'/advertisement/'.$filename,
            'BannerWidth'=> $size[0],
            'BannerHeight'=> $size[1],

        ]);
        return redirect()->back()->with(['success'=>'Advertisement added successfully.']);
        }

        public function delete_advertisement($id)
        {
            $Advertisement = AdvertisementEnquiry::where('EnquiryID',$id)->first();
            if ($Advertisement) {
                $Advertisement->delete();
            }
            return redirect()->back()->with(['success'=>'Advertisement Successfully Deleted.']);
        }

        public function get_advertisement_size(Request $request){
            $options = ' <select class="form-select mb-3" aria-label="Default select example" name="size" id="size"><option>Select Size</option>';
            $advertisements = AdvertisementPackage::where('location', $request->location)->distinct()->get(['BannerWidth', 'BannerHeight']);
            foreach ($advertisements as $advertisement) {
               $options .= '<option>' . $advertisement->BannerWidth . ' - ' . $advertisement->BannerHeight . ' px</option>';
            }
            $options . '</select>';
            return response()->json($options);
        }

}
