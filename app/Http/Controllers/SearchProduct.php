<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class SearchProduct extends Controller
{
    //
    public function index(Request $request){
        $cat = category::all();
        $allproducts = products::all();
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
        // print_r($request['searchdata']);
        $searchproduct = \DB::table('products')->where('productname',$request['searchdata'])
            ->orWhere('productname','like', $request['searchdata'].'%')
            ->orWhere('productname','like','%'.$request['searchdata'].'%')
            ->orWhere('description','like','%'.$request['searchdata'].'%')
            ->orwhere('productname','like','%'.$request['searchdata'])->get();
            // print_r($searchproduct);
        return view('Public.Search.index',compact('catWithId','cat','searchproduct','allproducts'));

    }
}
