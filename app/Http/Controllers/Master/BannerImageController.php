<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\BannerImage;
use Illuminate\Support\Facades\Validator;

class BannerImageController extends Controller
{
    public function index()
    {
        return view('Master.banner-image.index', ['banner_images' => BannerImage::orderby('id', 'desc')->get()]);
    }

    public function edit($id)
    {
        return view('Master.banner-image.edit', ['edit'=> BannerImage::find($id),'banner_images' => BannerImage::orderby('id', 'desc')->get()]);
    }

    public function create(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'banner_image' => 'file',
            'link' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/banner-images/'), $fileName);

        }
        // Create a new record
        BannerImage::create([
            'banner_image' =>  'banner-images/'.$fileName,
            'link' => $request->input('link'),
        ]);

        return redirect()->back()->with('success', 'Banner image created successfully.');
    }

    public function update(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'link' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the record to update
        $banner = BannerImage::findOrFail($request->id);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/banner-images/'), $fileName);
            $banner->banner_image='banner-images/'.$fileName;
        }
        // Update the record
        $banner->link=$request->link;
        $banner->save();
        
        return redirect()->route('admin.master.banner-image')->with('success', 'Banner image updated successfully.');
    }


    public function destroy($id)
    {
        // Find the record to delete
        $banner = BannerImage::findOrFail($id);

        // Delete the record
        $banner->delete();

        return redirect()->route('admin.master.banner-image')->with('success', 'Banner image deleted successfully.');
    }
}
