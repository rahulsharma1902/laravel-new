<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class CartController extends Controller
{
    //
    public function index(){
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
        return view('Public.Cart.index',compact('catWithId','cat'));
    }

    public function add(Request $request,$id){
        $product = products::findOrFail($id);
        // print_r($product);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else{ $cart[$id] = [
            "productname" => $product->productname,
            "image" => $product->image,
            "slug" => $product->slug,
            "sku" => $product->slug,
            "price" => $product->price,
            "total_quantity" => $product->quantity,
            "quantity" => 1
        ];
    }
        Session::put('cart', $cart);
        // Session::set('cart', $cart);
        print_r(Session::get('cart'));

        return Response::json(['success' => 'Add to cart succefully'], 200);
    }

    public function remove(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return Response::json(['success' => 'Item removed from cart succefully'], 200);
    }
    // $cart = session()->get('cart');
  
    // if(isset($cart[31])) {
    //         unset($cart[31]);
    //         session()->put('cart', $cart);
    //     }
    //     print_r($cart);
    //     return Response::json(['success' => 'Item removed from cart succefully'], 200);
}
}