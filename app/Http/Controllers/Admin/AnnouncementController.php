<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementPackage;
use Illuminate\Support\Facades\Validator;
use App\Models\City;


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
        Announcement::where('id', $request->AnnouncementID)
            ->update(
                [
                    'status' => $request->status,
                    'note' => $request->note
                ]
            );
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

}
