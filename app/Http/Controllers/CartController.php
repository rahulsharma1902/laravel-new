<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use App\Models\pricevariation;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class CartController extends Controller
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
        return view('Public.Cart.index',compact('catWithId','cat','allproducts'));
    }

    public function add(Request $request,$id){
        $product = products::findOrFail($id);
        // print_r($product);
        $cart = session()->get('cart', []);
        // print_r($cart);
        $bundel_price = null;
        $bundel_quantity = null;
        if($product->type == 1){
        $variation = pricevariation::where('product_id',$id)->get();
        foreach($variation as $p){
            $bundel_price[]= $p['bundel_price'];
            $bundel_quantity[]= $p['bundel_quantity'];
        }
    }
    // print_r($bundel_quantity);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else{ $cart[$id] = [
            "productname" => $product->productname,
            "image" => $product->image,
            "slug" => $product->slug,
            "sku" => $product->slug,
            "price" => $product->price,
            "total_quantity" => $product->quantity,
            "quantity" => $request['quantity'] ?? 1,
            "type" => $product->type,
            "quantity_price" => array_combine($bundel_quantity ?? array(),$bundel_price ?? array()),
            "bundel_price"  => $bundel_price,
            "bundel_quantity"  => $bundel_quantity,

        ];
    }
    // echo '<hr>';
    // $quantity_price = array_combine($bundel_quantity ?? array(),$bundel_price ?? array());
    // $quant = 20;
    // print_r(array_search(min($quant), $quantity_price));

    // if(array_key_exists($quant,$quantity_price)) {
    //     print_r($quantity_price[$quant]);
    // }else{
    //     echo 'No response';
    // }
        Session::put('cart', $cart);
        // Session::set('cart', $cart);
        // echo '<pre>';
        // print_r(Session::get('cart'));
        // echo '</pre>';
        return Session::flash('success', 'Add to cart succefully'); 
        // return Response::json(['success' => 'Add to cart succefully'], 200);
    }

    public function remove(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // return Response::json(['success' => 'Item removed from cart succefully'], 200);
            return Session::flash('error', 'Item removed from cart succefully'); 

    }
    // $cart = session()->get('cart');
  
    // if(isset($cart[31])) {
    //         unset($cart[31]);
    //         session()->put('cart', $cart);
    //     }
    //     print_r($cart);
    //     return Response::json(['success' => 'Item removed from cart succefully'], 200);
}
public function update(Request $request){
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        // return Response::json(['success' => 'Cart successfully updated!'], 200);
        return Session::flash('success', 'Cart successfully updated!'); 

    }
}
}