<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
// use Auth;
use Session;
use App\Models\category;
use App\Models\products;
use App\Models\Banner;
class UploadBanner extends Controller
{
    //
    public function index(){
        $banner = Banner::all();
        return view('Admin.Banner', compact('banner'));
    }
    public function add(){
        return view('Admin.addBanner');
    }
    public function save(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:800|dimensions:width=1920,height=800',
            'banner_name' => 'required|unique:banners,banner_name|max:255',
            'sku'         => 'required|unique:banners,sku|max:255',
            'slug'        => 'required|unique:banners,slug|max:255',
        ]);
        $img = $request->get('image');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path().'/products_images/', $name);  
            $image_path=public_path().'/products_images/';
            $banner = new Banner();
            $banner->banner_name = $request->get('banner_name');
            $banner->slug = $request->get('slug');
            $banner->sku = $request->get('sku');
            $banner->image_url = $name;
            $banner->save();
        return redirect('/admin/banner/add')->with('success', 'Banner added successfully');
    }
}
public function edit($id){
    $banner = Banner::find($id);
    return view('Admin.editBanner', compact('banner'));
}
public function update(Request $request,$id){
    // print_r($request->all());
    // print_r($id);
    if($request->file('image') == null){
        $validated = $request->validate([
            'banner_name' => ['required',Rule::unique('banners', 'banner_name')->ignore($id), ],
            'slug'         => ['required',Rule::unique('banners', 'slug')->ignore($id), ],
            'sku'         => ['required',Rule::unique('banners', 'slug')->ignore($id), ],
        ]);
        $banner = Banner::find($id);
        $banner->banner_name = $request->get('banner_name');
        $banner->slug = $request->get('slug');
        $banner->sku = $request->get('sku');
        $banner->save();
        return redirect('/admin/banner')->with('success', 'Banner Update successfully');
    }else{
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:800|dimensions:width=1920,height=800',
            'banner_name' => ['required',Rule::unique('banners', 'banner_name')->ignore($id), ],
            'slug'         => ['required',Rule::unique('banners', 'slug')->ignore($id), ],
            'sku'         => ['required',Rule::unique('banners', 'slug')->ignore($id), ],
        ]);
        $img = $request->get('image');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path().'/products_images/', $name);  
            $image_path=public_path().'/products_images/';
            $banner = Banner::find($id);
            $banner->banner_name = $request->get('banner_name');
            $banner->slug = $request->get('slug');
            $banner->sku = $request->get('sku');
            $banner->image_url = $name;
            $banner->save();
            return redirect('/admin/banner')->with('success', 'Banner Update successfully');
    }
}
}
public function delete($id){
    $banner = Banner::find($id);
    if($banner){
        $banner->delete();
    }
    return redirect('/admin/banner')->with('success', 'Banner deleted successfully');
}

    public function status(Request $request){
        $banner = Banner::find($request->id);
        if($banner){
            $banner->status =$request->get('status');
            $banner->save();
            // return Session::flash('success', 'Banner status updated successfully');
            return redirect('/admin/banner')->with('success', 'Banner updated successfully');
        }
    }

}
