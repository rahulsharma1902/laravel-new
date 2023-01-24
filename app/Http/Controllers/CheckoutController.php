<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use App\Models\pricevariation;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\OrderDetails;
class CheckoutController extends Controller

{
    //
    public function index(){
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
        return view('Public.Cart.Checkout',compact('catWithId','cat','allproducts'));
    }
    public function checkoutpayment(Request $request){
        // print_r(Auth::user()->id);
        // echo '<br><br><br><br><br><br><br><br><br>';
        // print_r($orderid);
        // echo '<br><br><br><br><br><br><br><br><br><br>';
        // print_r(session('cart'));
        // echo '<br><br><br><br><br><br><br><br><br><br>';
        print_r($request->all());
        // $orderrand= random_int(1000000, 9999999);
        // $orderid = '#' . sprintf("%08d", $orderrand);

    }
}
