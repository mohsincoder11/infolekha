<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::join('users', 'users.id', '=', 'blogs.user_id')
            ->select('blogs.*')->orderby('id', 'desc')->get();
        return view('add-blogs', ['blogs' => $blogs]);
    }

    public function add_blog(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category' => ['required'],
                'status' => ['required'],
                'content1' => ['required'],
                'status' => ['required'],
                'blog_image' => ['required'],
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
        $newblog = new Blog();
        $blog_image = '';
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $blog_image = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/blog/'), $blog_image);
            $newblog->blog_image = '/blog/' . $blog_image;
        }
        $newblog->subject = $request->subject;
        $newblog->status = $request->status;
        $newblog->user_id = Auth::guard('admin')->user()->id;
        $newblog->category = $request->category;
        $newblog->content1 = $request->content1;
        $newblog->content2 = $request->content2;
        $newblog->content3 = $request->content3;
        $newblog->content4 = $request->content4;
        $newblog->save();
        return redirect(route('admin.blog'))->with(['success' => 'Blog added successfully.']);
    }

    public function get_blog(Request $request)
    {
        $editblog = Blog::find($request->BlogID);
        return response()->json($editblog);
    }

    public function edit($id)
    {
        $editblog = Blog::find($id);
        $blogss = Blog::all();
        return view('editblog', ['editblog' => $editblog, 'blogss' => $blogss]);
    }

    public function change_blog_status(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'BlogID' => ['required'],
                'status' => ['required'],
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

        $updateblog = Blog::find($request->BlogID);
        $updateblog->subject = $request->subject;
        $updateblog->status = $request->status;
        $updateblog->category = $request->category;
        $updateblog->category = $request->category;
        $updateblog->content1 = $request->content1;
        $updateblog->content2 = $request->content2;
        $updateblog->content3 = $request->content3;
        $updateblog->content4 = $request->content4;
        $updateblog->reject_reason = $request->reject_reason;
        $updateblog->save();
        if ($updateblog->user_id !== 1) {
            if ($request->status == 'Active') {
                app('App\Http\Controllers\Admin\MailController')->blog_approve_mail($updateblog->user_id, $updateblog);
            } elseif ($request->status == 'Reject') {
                app('App\Http\Controllers\Admin\MailController')->blog_rectification_mail($updateblog->user_id, $updateblog);
            }
        }

        return redirect(route('admin.blog'))->with(['success' => 'Status Successfully updated.']);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                //'blog_image' => ['required'],
                'title' => ['required'],
                'author_name' => ['required'],
                'publish_date' => ['required'],
                'blogs' => ['required'],
            ],
            [
                // 'blog_image.required' => 'Please enter Blog Image.',
                'title.required' => 'Please enter Title.',
                'author_name.required' => 'Please enter Author Name.',
                'publish_date.required' => 'Please enter Publish Date.',
                'blogs.required' => 'Please enter Blogs.',

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

        $updateblog = Blog::find($request->id);
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $filename = rand(0123, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $updateblog->blog_image = 'images/' . $filename;
        }
        $updateblog->title = $request->get('title');
        $updateblog->author_name = $request->get('author_name');
        $updateblog->publish_date = $request->get('publish_date');
        $updateblog->blogs = $request->get('blogs');
        // $updateblog->blogs=$request->get('blogs');
        $updateblog->save();
        // return redirect(route('admin.blog')); 
        return redirect()->route('admin.blog')->with(['success' => 'Successfully Updated !']);
    }

    public function destroy($id)
    {
        $blogdelete = Blog::where('id', $id)->delete();
        return redirect(route('admin.blog'))->with(['success' => 'Blog deleted successfully !']);;
    }
}
