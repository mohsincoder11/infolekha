<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        return view('Master.college');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $cl= new College;
        $cl->colege=$request->get('colege');
        $cl->save(); 
        return redirect(route('admin.master.college'));
    }

   
   
    public function edit($id)
    {
        $cledit = College::find($id); 
        $cla = College::all();
        return view('Master.editcollege',['cledit'=>$cledit,'cla'=>$cla]);
    }

  
    public function update(Request $request)
    {
        College::where('id',$request->id)->update([ 'colege'=>$request->colege]);

        return redirect()->route('admin.master.college')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }

  
    public function destroy($id)
    {
        $cl=College::where('id',$id)->delete();
        return redirect(route('admin.master.college'));
    }

}
