<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementPackage;
use Illuminate\Support\Facades\Validator;
use App\Models\City;
use Illuminate\Support\Facades\Auth;


class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderby('id', 'desc')->get();

        return view('admin.announcement.index', ['announcements' => $announcements]);
    }

    public function ChangeAnnouncementStatus(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'AnnouncementID' => 'required',
                'status' => 'required',
            ]

        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }    
             $announcement=Announcement::where('id', $request->AnnouncementID)->first();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/announcement/'), $filename);
            $announcement->image = '/announcement/' . $filename;
         }
         $announcement->status = $request->status;
         $announcement->heading = $request->heading;
         $announcement->main_content = $request->main_content;
         $announcement->note = $request->note;
         $announcement->save(); 
           
        return redirect()->back()->with(['success' => 'Status Updated Successfully.']);
    }

    public function announcement_list(){
        $Announcement=AnnouncementPackage::all();
        return view('Master.announcement.index',['Announcement'=>$Announcement]);
       }

       public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
           [
            'PackageName' => 'required|string|max:255',
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
        $Announcement = new AnnouncementPackage([
            "PackageName" => $request->PackageName,
            "OriginalPrice" => $request->OriginalPrice,
            "MinDays" => $request->MinDays,
            "MaxDays" => $request->MaxDays,
        ]);

        $Announcement->save();
        return redirect()->back()->with(['success'=>'Announcement Package Successfully Inserted.']);
       }

       public function edit($id){
        $Announcement=AnnouncementPackage::all();
        $edit=AnnouncementPackage::where('PackageID',$id)->first();
        return view('Master.announcement.edit',['Announcement'=>$Announcement,'edit'=>$edit]);
       }

       public function update(Request $request){
            $validator = Validator::make(
                $request->all(),
               [
                'PackageName' => 'required|string|max:255',
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
        AnnouncementPackage::where('PackageID',$request->id)->update([
            "PackageName" => $request->PackageName,
        
            "OriginalPrice" => $request->OriginalPrice,
            "MinDays" => $request->MinDays,
            "MaxDays" => $request->MaxDays,
        ]);

        return redirect()->route('admin.master.announcement')->with(['success'=>'Announcement Package Successfully Updated.']);
       }

        public function destroy($id)
        {
            $Announcement = AnnouncementPackage::where('PackageID',$id)->first();
            if ($Announcement) {
                $Announcement->delete();
            }
            return redirect()->route('admin.master.announcement')->with(['success'=>'Announcement Package Successfully Deleted.']);
        }

        public function add_announcement(Request $request){
            $validator = Validator::make(
                $request->all(),
               [
                'heading' => 'required|string|max:255',
                'main_content' => 'required',
                'status' => 'required',
                'image' => 'required',
            ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/announcement/'), $filename);
            $announcement_image = '/announcement/' . $filename;
         }

        // Create new coupon and save in the database
        Announcement::create([
            "college_id" => Auth::guard('admin')->user()->id,
            "heading" => $request->heading,
            "main_content" => $request->main_content,
            "status" => $request->status,
            "image" => $announcement_image ?? NULL,
            'PackageName'=>'Publish by Infolekha',
        ]);
        return back()->with(['success'=>'Announcement added succesfully.']);
 
        }

}
