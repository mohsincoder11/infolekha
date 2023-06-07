<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return view('Master.school');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $cl= new School;
        $cl->schol=$request->get('schol');
        $cl->save(); 
        return redirect(route('admin.master.school'));
    }

   
   
    public function edit($id)
    {
        $cledit = School::find($id); 
        $cla = School::all();
        return view('Master.editschol',['cledit'=>$cledit,'cla'=>$cla]);
    }

  
    public function update(Request $request)
    {
        School::where('id',$request->id)->update([ 'schol'=>$request->schol]);

        return redirect()->route('admin.master.school')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }

  
    public function destroy($id)
    {
        $cl=School::where('id',$id)->delete();
        return redirect(route('admin.master.school'));
    }

}
