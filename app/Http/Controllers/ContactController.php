<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact_Us;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $cont = Contact_Us::all();
        return view('contact', ['cont' => $cont]);
    }

    public function destroy($id)
    {
        $cl = Contact_Us::where('id', $id)->delete();
        return redirect(route('contacts'));
    }


    public function mail(Request $request)
    {

        $lst = [
            'name' => $request->get('name'),
            'email' => $request->get('email'), 'phone_no' => $request->get('mob'), 'msg' => $request->get('msg')
        ];
        try {
             Mail::send('Website.mail', $lst, function ($message) {
            $message->to(env('MAIL_USERNAME') , env('MAIL_FROM_NAME'))->subject('Enquiry');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));

        });
         } catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Something went wrong. Please try after some time.']);

        }

        return redirect()->back()->with(['success'=>'Thanks for connecting us. We will get back to you soon.']);
    }
}
//     public function index()
//     {
//         $cl = College::all();
//         return view('admin.master.college', ['cl'=>$cl]);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create(Request $request)
//     {
        
//         $cl= new College;
//         $cl->colege=$request->get('colege');
//         $cl->save(); 
//         return redirect(route('admin.master.college'));
//     }

   
   
//     public function edit($id)
//     {
//         $cledit = College::find($id); 
//         $cla = College::all();
//         return view('master.editcollege',['cledit'=>$cledit,'cla'=>$cla]);
//     }

  
//     public function update(Request $request)
//     {
//         College::where('id',$request->id)->update([ 'colege'=>$request->colege]);

//         return redirect()->route('admin.master.college')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
//     }

  
//     public function destroy($id)
//     {
//         $cl=College::where('id',$id)->delete();
//         return redirect(route('admin.master.college'));
//     }

// }
