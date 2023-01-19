<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\Customize;
use App\Models\pricevariation;
use Redirect;
use Session;

class Customized extends Controller
{
    //
    public function customized_add(Request $request){
        // print_r($request->all());
        if($request['craft_id']!=null){
        $Customized = new Customize;
        if(!empty($request['user_id'])){
            $Customized->user_id = $request['user_id'];
            $Customized->product_id = $request['coustomize_product_id'];
            $Customized->cutomize_qty = $request['cutomize_qty'];
            $Customized->customize_colorcode = $request['customize_colorcode'];
            $Customized->craft_id = $request['craft_id'];
            $Customized->font_style = $request['font-style'];
            $Customized->customize_text = $request['customize_text'];
            $Customized->save();
            // $msg = 'Your Product Customized Successfully';
            // return Route('home',compact('msg'));
            return redirect('/home')->with('success','Your Product Customized Successfully');

        }else{
            return redirect('/my_account')->with('error','You need to Login First !');
                }
            }else{
                // return Session::flash('error', 'Select a Graphic & Clipart'); 
                // print_r($request->all());
                $slug = $request['slug'];
                return redirect('/customize/'.$slug)->with('error','Select a Graphic & Clipart');

            }
    }
    public function coustomize($id){
        $cat = category::all();
        $allproducts = products::all();
        $coustomize_product = products::where('slug', '=', $id)->get(); // Where query 
        // print_r($id);
        $PriceType = new pricevariation;
        $PriceType = pricevariation::where('product_slug', $id)->get();
        // print_r($PriceType);
        foreach($cat as $c){
            $product_id = null;
            $product_productname = null;
            $cat_id = $c->id;
            $data = \DB::table('products')->where('category',$cat_id)
            ->orWhere('category','like', $cat_id.'%')
            ->orWhere('category','like','%'.$cat_id.'%')
            ->orwhere('category','like','%'.$cat_id)->get();
            foreach($data as $d){            
                $product_id[] =  $d->id;
                $product_productname[] =  $d->productname;
                
            }
            $catWithId[] = array($c->category => array_combine($product_id ?? array(),$product_productname ?? array()));        
        }
        return view('Public.Customize',compact('cat','allproducts','coustomize_product','PriceType','catWithId'));
    }
    public function customized(Request $request){
        $data = $request->all();
        print_r($data);
    }
}
