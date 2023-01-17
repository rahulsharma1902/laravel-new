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

class UploadCategories extends Controller
{
    //
    public function index()
    {
            $cat = category::all();
            $allproducts = products::all();
            $users = User::all();
            return view('Admin.Categories',compact('cat','allproducts','users'));
    }
    public function addcategory(){
        $cat = category::all();
        $allproducts = products::all();
        $users = User::all();
        return view('Admin.addCategory',compact('cat','allproducts','users'));
    }
    public function save(Request $request){
        // print_r($request->all());
        $validated = $request->validate([
            'category' => 'required|unique:categories,category|max:255',
            'slug'     => 'required|unique:categories,slug|max:255',
        ]);
        $cat = new category();
        $cat->category = $request->get('category');
        $cat->slug = $request->get('slug');
        $cat->parent_id = $request->get('parent_id');
        $cat->save();
        return redirect('/admin/categories')->with('success','Category added Successfully');
    }
    public function editcategory($id){
        $allproducts = products::all();
        $users = User::all();
        $cat = category::all();
        $categorie = category::where('id', $id)->first();
        return view('Admin.editCategory',compact('cat','allproducts','users','categorie'));
    }
    public function updatecategory(Request $request, $id){
        $validated = $request->validate([
            'category' => ['required',Rule::unique('categories', 'category')->ignore($id), ],
            'slug'         => ['required',Rule::unique('categories', 'slug')->ignore($id), ],
        ]);
        $cat = category::find($id);
        $cat->category = $request->get('category');
        $cat->slug = $request->get('slug');
        $cat->parent_id = $request->get('parent_id');
        $cat->save();
        return redirect('/admin/categories')->with('success','Category Update successfully.');

    }
    public function delete_cat($id){
        $allcategories = category::all();
        $del = category::where('id', $id); //we can use it optional ->first() reeguser is the name of the table name 
        if($del) {
             $del->delete();
            return redirect('/admin/categories');

            }
    }

}