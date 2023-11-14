<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(){
        $users=User::where('role','4')->latest()->get();
        return view('admin.users.index',compact('users'));
    }

    public function create_user(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }  
        $logo='logo/user.png';
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = rand(0123, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('logo/'), $filename);
            $logo = 'logo/' . $filename;
        }
        $user=User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'role'=>'4',
            'logo'=>$logo,
        ]);
        if(count($request->permissions)>0){
            UserPermission::create([
                'user_id'=>$user->id,
                'permissions'=>$request->permissions,
            ]);
        }
       
        return redirect()->back()->with(['success' => 'User added successfully.']);
        
    }

    public function edit_user($id){
        $users=User::where('role','4')->latest()->get();
        $edit_user=User::find($id);
     
        return view('admin.users.edit',compact('edit_user','users'));

    }
    public function update_user(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }  
        $user=User::find($request->id);
            if(!$user){
            return redirect()->back()->with(['error' => 'Something went wrong.']);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = rand(0123, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('logo/'), $filename);
            $user->logo = 'logo/' . $filename;
        }
            $user->name=$request->name;
            $user->email=$request->email;
            if(isset($request->password) && $request->password!=null)
            $user->password=Hash::make($request->password);
            $user->save();
           
            UserPermission::where('user_id',$user->id)->updateorCreate(
                [
                    'user_id'=>$user->id,
                ],
                [
                'user_id'=>$user->id,
                'permissions'=>$request->permissions,
                ]);
       
        return redirect()->route('admin.users')->with(['success' => 'User updated successfully.']);
    }

    public function delete_user($id){
        User::find($id)->delete();
        UserPermission::whereUserId($id)->delete();
        return redirect()->back()->with(['success' => 'User deleted successfully.']);
    }
}
