<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Validator;
use App\Models\City;


class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderby('id','desc')->get();

        return view('admin.announcement.index', ['announcements' => $announcements]);
    }

public function ChangeAnnouncementStatus(Request $request){
    $validator = Validator::make(
        $request->all(),
        [
            'AnnouncementID' => 'required',
            'status' => 'required',
        ]
       
    );
    if ($validator->fails()) {
        return redirect()->back()->with(['error'=>'Something went wrong.']);
    }
    Announcement::where('id', $request->AnnouncementID)->update(['status'=>$request->status,'note'=>$request->note]);
    return redirect()->back()->with(['success'=>'Status Updated Successfully.']);


}
    public function create(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                'date' => ['required'],
                'city' => ['required'],
                'announcement' => ['required'],
                'announcement_text' => ['required'],



            ],
            [

                'date.required' => 'Please enter Date.',
                'city.required' => 'Please enter City.',
                'announcement.required' => 'Please enter Title.',
                'announcement_text.required' => 'Please enter Announcement.',


            ]
        );
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }

        $announce = new Announcement;
        $announce->date = $request->get('date');
        $announce->city_id = $request->get('city');
        $announce->announcement = $request->get('announcement');
        $announce->announcement_image = $request->get('announcement_text');
        $announce->save();
        return redirect()->route('admin.announcement')->with(['success' => 'Successfully Inserted !']);
    }

    public function edit($id)
    {
        $anouncement = Announcement::find($id);
        $annos = Announcement::join('city', 'city.id', '=', 'announcements.city_id')
            // ->join('medicals','medicals.id','=','doctors.medical_id')
            ->orderby('announcements.id', 'desc')
            ->select('announcements.*', 'city.city')
            ->get();
        $city = City::all();
        return view('editannouncement', ['anouncement' => $anouncement, 'annos' => $annos, 'city' => $city]);
    }


    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'date' => ['required'],
                'city' => ['required'],
                'announcement' => ['required'],
                'announcement_text' => ['required'],



            ],
            [

                'date.required' => 'Please enter Date.',
                'city.required' => 'Please enter City.',
                'announcement.required' => 'Please enter Title.',
                'announcement_text.required' => 'Please enter Announcement.',


            ]
        );
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }



        $anounupdate = Announcement::find($request->id);
        // if($request->hasFile('announcement_image')){
        //     $file= $request->file('announcement_image');
        //     $filename=rand(0123,9999).time().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path('images/'), $filename);
        //     $anounupdate->announcement_image= 'images/'.$filename;

        // }
        $anounupdate->date = $request->get('date');
        $anounupdate->city_id = $request->get('city');
        $anounupdate->announcement = $request->get('announcement');
        $anounupdate->announcement_image = $request->get('announcement_text');

        $anounupdate->save();


        return redirect()->route('admin.announcement')->with(['success' => 'Successfully Updated !']);
    }


    public function destroy($id)
    {
        $anno = Announcement::where('id', $id)->delete();
        return redirect('admin.announcement');
    }
}
