<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricetype;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
// use Auth;
use Validator;
use Session;
use App\Models\category;
use App\Models\products;
class UploadPricetype extends Controller
{
    //
    public function index(){
        $cat = category::all();
            $allproducts = products::all();
            $users = User::all();
            $PriceType = Pricetype::all();
            return view('Admin.PriceType',compact('cat','allproducts','users','PriceType'));
    }
    public function addprice(){
        $cat = category::all();
        $allproducts = products::all();
        $users = User::all();
        return view('Admin.addPriceType',compact('cat','allproducts','users'));
    }
    public function save(Request $request){
        $request->validate([
            'quantity_to' =>'required|unique:pricetypes,quantity_to',
            'price' =>'required',
        ]);
        $PriceType = new Pricetype();
        $PriceType->quantity_to = $request->post('quantity_to');
        $PriceType->price = $request->post('price');
        $PriceType->save();
        return redirect('/admin/Pricetype')->with('success', 'PriceType added Successfully');
    }
    public function editData($id){
        $allproducts = products::all();
        $users = User::all();
        $cat = category::all();
        $PriceType = Pricetype::all();
        $pricetype = Pricetype::where('id', $id)->first();
        return view('Admin.editPriceType',compact('cat','allproducts','users','PriceType','pricetype'));
    }
    public function update($id,Request $request){
        $validated = $request->validate([
            'quantity_to' => ['required',Rule::unique('pricetypes', 'quantity_to')->ignore($id), ],
            'price'    => 'required',
        ]);
        $PriceType = Pricetype::find($id);
        $PriceType->quantity_to = $request->post('quantity_to');
        $PriceType->price = $request->post('price');
        $PriceType->save();
        return redirect('/admin/Pricetype')->with('success','Price And Quantity Updated successfully.');
    }
    public function delete($id){
        $PriceType = Pricetype::find($id);
        $PriceType->delete();
        return redirect('/admin/Pricetype')->with('success','Price Type deleted successfully.');
    }
}
