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
            $product_productname = null;
            $cat_id = $c->id;
            $data = \DB::table('products')->where('category',$cat_id)
            ->orWhere('category','like', $cat_id.'%')
            ->orWhere('category','like','%'.$cat_id.'%')
            ->orwhere('category','like','%'.$cat_id)->get();
            foreach($data as $d){            
                $product_id[] =  $d->slug;
                $product_productname[] =  $d->productname;
                
            }
        $catWithId[] = array($c->category => array_combine($product_id ?? array(),$product_productname ?? array()));        
        }
        return view('Public.home',compact('allproducts','cat','product','catWithId'));
        // print_r($allproducts);        
    }
    public function getsingleproduct($id){
        // print_r($id);
        $cat = category::all();
        $allproducts = products::all();
        // $product = products::find($id);
        $product = products::where('slug',$id)->first();
        foreach($cat as $c){
            $product_id = null;
            $product_productname = null;
            $cat_id = $c->id;
            $data = \DB::table('products')->where('category',$cat_id)
            ->orWhere('category','like', $cat_id.'%')
            ->orWhere('category','like','%'.$cat_id.'%')
            ->orwhere('category','like','%'.$cat_id)->get();
            foreach($data as $d){            
                $product_id[] =  $d->slug;
                $product_productname[] =  $d->productname;
                
            }
        $catWithId[] = array($c->category => array_combine($product_id ?? array(),$product_productname ?? array()));        
        }
        // print_r($product->category);
        $relatedProducts = \DB::table('products')->where('category',$product->category)->orWhere('category','like', $cat_id.'%')
        ->orWhere('category','like','%'.$product->category.'%')
        ->orwhere('category','like','%'.$product->category)->take(4)->get();
        // print_r($relatedProducts);
        return view('Public.Product',compact('cat','allproducts','product','catWithId','relatedProducts'));

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
            $product_productname = null;
            $cat_id = $c->id;
            $data = \DB::table('products')->where('category',$cat_id)
            ->orWhere('category','like', $cat_id.'%')
            ->orWhere('category','like','%'.$cat_id.'%')
            ->orwhere('category','like','%'.$cat_id)->get();
            foreach($data as $d){            
                $product_id[] =  $d->slug;
                $product_productname[] =  $d->productname;
                
            }
        $catWithId[] = array($c->category => array_combine($product_id ?? array(),$product_productname ?? array()));        
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
