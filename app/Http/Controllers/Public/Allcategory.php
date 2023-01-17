<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class Allcategory extends Controller
{
    //
    public function index(){
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
        return view('public.addcategory',compact('catWithId'));
    }
    public function getallcategory(){
        $category = new category();
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
        return view('Public.Allcategories',compact('catWithId','cat'));
        // print_r($allcategories);
    }
    public function getcategories(){
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
        $cat = category::all();
        // return ['cat'=>$cat];
        // return view('Public.home',['cat'=>$cat]);
        return view('Public.index',compact('cat'));
        // redirect('/home');

        // print_r($cat);
    }
}
