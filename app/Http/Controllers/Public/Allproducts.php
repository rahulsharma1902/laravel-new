<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;

class Allproducts extends Controller
{
    //
    public function getallproducts(){
        $allproducts = products::all();
        $cat = category::all();
        $allproducts = products::all();
        $product = products::find($id);
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
        return view('Public.home',compact('allproducts','cat','product','catWithId'));
        // print_r($allproducts);        
    }
    public function getsingleproduct($id){
        $cat = category::all();
        $allproducts = products::all();
        $product = products::find($id);
        foreach($cat as $c){
            $product_id = null;
            $id = $c->id;
            $data = \DB::table('products')->where('category',$id)
            ->orWhere('category','like', $id.'%')
            ->orWhere('category','like','%'.$id.'%')
            ->orwhere('category','like','%'.$id)->get();     
            foreach($data as $d){    
                // echo $d->id;
                $product_id[] =  $d->productname;    
            }
            // $catWithId[] = array($c->category => $product_id);
            $catWithId[] = array($c->category => $product_id);        
            
        }
        return view('Public.Product',compact('cat','allproducts','product','catWithId'));

        // print_r($product->image);
    }
    public function getallcategories(){
        $allcategories = products::all();
        // echo '<pre>';
        // print_r($allcategories);
        // echo '</pre>';
        return view('Public.Allcategories',['allcategories'=>$allcategories]);
        print_r($allcategories);
}
    public function categoryProducts($id){
        $cat = category::all();
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
            $catWithId[] = array($c->category => $product_id);        
        }
        $id = Category::where('category', $id)->get('id');
        foreach($id as $c_id){
            $ids =  $c_id['id'];
        }
        $allproducts = products::all();
        $allcategories = products::all();
        $catproducts = \DB::table('products')->where('category',$ids)
        ->orWhere('category','like', $ids.'%')
        ->orWhere('category','like','%'.$ids.'%')
        ->orwhere('category','like','%'.$ids)->get();
        // print_r($allcategories)
        // print_r($catproducts);
        return view('Public.Allcategories',compact('cat','allproducts','catproducts','allcategories','catWithId'));
        // print_r($catproducts);
    }
    public function getcategories(){

    }
}
