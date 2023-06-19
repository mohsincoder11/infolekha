<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstitueController extends Controller
{
    public function index()
    {
        $cl = [];
        return view('Master.institute', ['cl'=>$cl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $cl= new Institute;
        $cl->institute=$request->get('institute');
        $cl->save(); 
        return redirect(route('admin.master.institute'));
    }

   
   
    public function edit($id)
    {
        $cledit = Institute::find($id); 
        $cla = Institute::all();
        return view('Master.editinstitute',['cledit'=>$cledit,'cla'=>$cla]);
    }

  
    public function update(Request $request)
    {
        Institute::where('id',$request->id)->update([ 'institute'=>$request->institute]);

        return redirect()->route('admin.master.institute')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }

  
    public function destroy($id)
    {
        $cl=Institute::where('id',$id)->delete();
        return redirect(route('admin.master.institute'));
    }

}
