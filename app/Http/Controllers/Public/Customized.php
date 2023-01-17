<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\Customize;
use App\Models\pricevariation;
use Redirect;
class Customized extends Controller
{
    //
    public function customized_add(Request $request){
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
            $msg = 'Your Product Customized Successfully';
            // return Route('home',compact('msg'));
            return redirect('/home')->with('msg');

        }else{
            return redirect('/my_account')->with('error','You need to Login First !');
                }

    }
    public function coustomize($id){
        $cat = category::all();
        $allproducts = products::all();
        $coustomize_product = products::where('id', '=', $id)->get(); // Where query 
        // print_r($id);
        $PriceType = new pricevariation;
        $PriceType = pricevariation::where('product_id', $id)->get();
        // print_r($PriceType);
        foreach($cat as $c){
            $product_id = null;
            $cat_id = $c->id;
            $data = \DB::table('products')->where('category',$cat_id)
            ->orWhere('category','like', $cat_id.'%')
            ->orWhere('category','like','%'.$cat_id.'%')
            ->orwhere('category','like','%'.$cat_id)->get();     
            foreach($data as $d){    
                // echo $d->id;
                $product_id[] =  $d->productname;    
            }
            // $catWithId[] = array($c->category => $product_id);
            $catWithId[] = array($c->category => $product_id);        
            
        }
        return view('Public.Customize',compact('cat','allproducts','coustomize_product','PriceType','catWithId'));
    }
    public function customized(Request $request){
        $data = $request->all();
        print_r($data);
    }
}
