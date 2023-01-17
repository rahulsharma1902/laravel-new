<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Auth;
use Session;
use App\Models\category;
use App\Models\products;

use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    public function main(){
        $cat = category::all();
        $allproducts = products::all();
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
    return view('/',compact('cat','allproducts','catWithId'));
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'email' => 'required|unique:users,email|max:255',
        ]);
        $status = 1;
        $category = 1;
        $password = bcrypt($request['password']);
//# 
        $user = new User();
        $user->email = $request['email'];;
        $user->fname = $request['firstname'];
        $user->lname = $request['lastname'];
        $user->status = $status;
        $user->category = $category;
        $user->password = $password;
        $user->save();
        return redirect('/my_account')->with('success','User Registered Successfully : Please Login');        
    }

public function login(Request $request){
            $email = $request->get('email');
            $password = $request->get('password');
            if (Auth::attempt(['email' => $email, 'password' => $password]))
                {
                    $user = Auth::User();
                    // Session::put('user', $user);
                    // $user=Session::get('user');
                    $category =  Auth::user()->category; 
                    // print_r($user);
                    if($category == 2){
                        return redirect('/admin/dashboard')->with('success','Welcome in Admin Panel');
                    }else{
                        return redirect('/home')->with('success', 'Welcome '.$user->fname.' '.$user->lname);
                    }
        }else{
            return redirect('/home')->with('error', 'Incorrect email or password');
        }
}


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/my_account')->with('success','Logged Out Successfully');
    }

public function home(){
    $cat = category::all();
    $allproducts = products::all();
    $Cproduct = products::where('type', '=', 1)->get(); // Where query 
    $newProducts = products::orderBy('created_at','desc')->get();
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
    return view('Public.home',compact('cat','allproducts','Cproduct','newProducts','catWithId'));
}
public function my_account(){
    $cat = category::all();
    $allproducts = products::all();
    $Cproduct = products::where('type', '=', 1)->get(); // Where query 
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
    return view('my_account',compact('cat','allproducts','Cproduct','catWithId'));
}


public function trycode(){
    $cat = category::all();
    // print_r($cat);
    
    // $catWithId = '';
    foreach($cat as $c){
        $product_id = null;
        $product_productname = null;
        $cat_id = $c->id;
    //   echo $c->category;
        $data = \DB::table('products')->where('category',$cat_id)
        ->orWhere('category','like', $cat_id.'%')
        ->orWhere('category','like','%'.$cat_id.'%')
        ->orwhere('category','like','%'.$cat_id)->get();
        // dd($products->category);
        // print_r($data);
        // echo "<br>";
        
        foreach($data as $d){
            
            // echo $d->id;
            $product_id[] =  $d->id;
            $product_productname[] =  $d->productname;
            
        }
        // dd($product_id);
        $catWithId[] = array($c->category => array_combine($product_id,$product_productname));        
        // echo "<br>";
        
    }
    dd($catWithId);
    // die();
    }



}
