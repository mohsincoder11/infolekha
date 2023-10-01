<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\City;
use App\Models\JobVacancyApplied;
use App\Models\tutor_detail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\user_student;
use App\Models\user_tutor;
use App\Models\UserLikeModel;

class TutorProfileController extends Controller
{
    public function home(Request $request)
    {

        $data = DB::table('users')->join('user_tutor_detail', 'user_tutor_detail.user_id', '=', 'users.id')
        ->where('users.id', auth::user()->id)->first();
        if($data){

        return view('Website.tutor_profile.index', ['user_data' => $data]);
        }
        else{
            return redirect()->route('tutor_detail_form',Auth::user()->id);
        }
    }

    public function update_profile(Request $request)
    {
        $data = User::join('user_tutor', 'user_tutor.user_id', '=', 'users.id')
        ->where('users.id', auth::user()->id)->first();
       

    return view('Website.tutor_profile.update-profile', ['user_data' => $data]);
    }

    public function post_update_profile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
             'subject'=>'required',
             'experiance'=>'required',
             'mob'=>'required',
             'address'=>'required',
             'pin_code'=>'required',
             'job_type'=>'required',
             'declaration'=>'required',
                
            ]);
            if ($validator->fails()) {
                return back()->with(['error'=>'Please fill all the fields.']);
            }
            $city=trim(explode(',', $request->address)[0]);
            $createOrupdate=City::firstOrCreate(['city'=>$city]);
            $user=User::find(Auth::user()->id);
            $user->city_id=$createOrupdate->id;

            $user_tutor=user_tutor::where('user_id',Auth::user()->id)->first();
            $user_tutor->r_name=$request->name;
            $user_tutor->address=$request->address;
            $user_tutor->mob=$request->mob;

        $user_tutor->save();

        if ($request->hasfile('logo')) {
            $logo = time() . '.' . $request->file("logo")->getClientOriginalExtension();
            $request->logo->move(public_path('database_files/tutor/photo'), $logo);
            $user->logo='database_files/tutor/photo/' . $logo;
        }
        $user->save();

        $details=tutor_detail::where('user_id',Auth::user()->id)->first();
        $details->pin_code=$request->pin_code;
        $details->address=$request->address;
        $details->email=$request->email;
        $details->mob=$request->mob;
        $details->name=$request->name;
        $details->subject=$request->subject;
        $details->job_type=$request->job_type;
        $details->declaration=$request->declaration;
        if ($request->hasfile('cv')) {
            $cv = time() . '.' . $request->file("cv")->getClientOriginalExtension();
            $request->cv->move(public_path('database_files/tutor/cv'), $cv);
            $details->cv='database_files/tutor/cv/' . $cv;
        }

        $details->save();


        return redirect()->back()->with(['success'=>'Profile has been updated.']);


    }

    public function user_wishlist(Request $request)
    {
        $wishlists=UserLikeModel::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        return view('Website.tutor_profile.wishlist',compact('wishlists'));
    }

    public function job_applied(Request $request)
    {
        $jobs=JobVacancyApplied::where('tutor_id',Auth::user()->id)->orderby('id','desc')->get();
        return view('Website.tutor_profile.job_applied',compact('jobs'));
    }
    
    public function job_remove(Request $request)
    {
        $jobs=JobVacancyApplied::where('id',$request->id)->delete();
        return redirect()->back()->with(['success'=>'Job deleted successfully.']);
    }
    
    public function change_password(Request $request)
    {
        return view('Website.tutor_profile.change-password');
    }

    public function post_change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => 'required',
                'new_password' => 'required',
            ]
        );

        if ($validator->fails()) {
            //  return redirect()->back()->with('error',$validator->errors());
            return  redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user=User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password=Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with(['success'=>'Password has been changed.']);
        }else{
            return redirect()->back()->with(['error'=>'Existing password do not match.']);

        }
    }

    public function blog_index(Request $request)
    {
       $blogs = Blog::where('user_id', Auth::id())->orderby('id', 'desc')->get();
       return view('Website.tutor_profile.blog.list', compact('blogs'));
    }
 
    public function write_blog(Request $request)
    {
       return view('Website.tutor_profile.blog.create');
    }
    public function insert_blog(Request $request){
      
       $validator = Validator::make(
          $request->all(),
          [
             'subject' => 'required',
             'category' => 'required',
             'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
             'content1' => 'required',
           
          ]
       );
       if ($validator->fails()) {
          return  redirect()
             ->back()
             ->with(['error'=>'Please enter all the details.']);
       }
       if ($request->hasFile('blog_image')) {
          $file = $request->file('blog_image');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('/blog/'), $filename);
       }
 
      Blog::create([
       'subject' => $request['subject'],
             'category' => $request['category'],
             'user_id' => Auth::id(),
             'blog_image' => 'blog/'.$filename,
             'content1' => $request['content1'],
             'content2' => $request['content2'],
             'content3' => $request['content3'],
             'content4' => $request['content4'],
             'status' => 'Pending',
      ]);
      return redirect('tutor-profile/blog')->with(['success' => 'Blog created successfully.']);
 
    }
 
    public function delete_blog($id){
       Blog::where('id', $id)->delete();
       return redirect()->back()->with(['success' => 'Blog deleted successfully.']);
    }
    public function edit_blog($id){
       $edit_data=Blog::where('id', $id)->first();
       return view('Website.tutor_profile.blog.edit',compact('edit_data'));
    }
 
    public function update_blog(Request $request){
      
       $validator = Validator::make(
          $request->all(),
          [
             'subject' => 'required',
             'category' => 'required',
             'content1' => 'required',
            
          ]
       );
       if ($validator->fails()) {
          return  redirect()
             ->back()
             ->with(['error'=>'Please enter all the details.']);
       }
       $blog=Blog::find($request->id);
       if($blog){
          if ($request->hasFile('blog_image')) {
             $file = $request->file('blog_image');
             $filename = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('/blog/'), $filename);
             $blog->blog_image= 'blog/'.$filename;
          }
 
             $blog->subject= $request['subject'];
             $blog->category= isset($request['other_category']) && $request['other_category']!=null  ? $request['other_category'] : $request['category'];
             $blog->content1= $request['content1'];
             $blog->content2= $request['content2'];
             $blog->content3= $request['content3'];
             $blog->content4= $request['content4'];
            $blog->status = 'Pending';

 
             $blog->save();
      return redirect('tutor-profile/blog')->with(['success' => 'Blog updated successfully.']);
    }
    else{
       return redirect()->back()->with(['error' => 'Blog not found.']);
    }
 
    }
}
