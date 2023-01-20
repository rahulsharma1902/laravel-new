<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Auth;
use Session;
use App\Models\category;
use App\Models\products;
use App\Models\product_category;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    public function main(){
        $cat = category::all();
        $allproducts = products::all();
        $banners = Banner::where('status', 1)->get();
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
    return view('/',compact('cat','allproducts','catWithId','banners'));
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
            return redirect('/my_account')->with('error', 'Incorrect email or password');
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
    $banners = Banner::where('status', 1)->get();
    $Cproduct = products::where('type', '=', 1)->get(); // Where query 
    $newProducts = products::orderBy('created_at','desc')->take(10)->get();
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
    return view('Public.home',compact('cat','allproducts','Cproduct','newProducts','catWithId','banners'));
}
public function my_account(){
    $cat = category::all();
    $allproducts = products::all();
    $Cproduct = products::where('type', '=', 1)->get(); // Where query 
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
    return view('my_account',compact('cat','allproducts','Cproduct','catWithId'));
}


// public function trycode(){
//     $cat = category::all();
//     // print_r($cat);
    
//     // $catWithId = '';
//     foreach($cat as $c){
//         $product_id = null;
//         $product_productname = null;
//         $cat_id = $c->id;
//     //   echo $c->category;
//         $data = \DB::table('products')->where('category',$cat_id)
//         ->orWhere('category','like', $cat_id.'%')
//         ->orWhere('category','like','%'.$cat_id.'%')
//         ->orwhere('category','like','%'.$cat_id)->get();
//         // dd($products->category);
//         // print_r($data);
//         // echo "<br>";
        
//         foreach($data as $d){
            
//             // echo $d->slug;
//             $product_id[] =  $d->slug;
//             $product_productname[] =  $d->productname;

//         }
//         // dd($product_id);
//         $catWithId[] = array($c->category => array_combine($product_id ?? array(),$product_productname ?? array()));        
//         // echo "<br>";
        
//     }
//     foreach($catWithId as $c=>$p){

//         foreach($p as $k=>$v){
//             print_r($k);

//             echo '='; 
//             foreach($v as $kk=>$vv){
//                 echo $kk;
//                 echo $vv;
//                 echo '<br>';

//             }
//         }
//     }

//     dd($catWithId);
//     // die();
//     }

public function trycode(){
    // $category_id = 7;
    //     $data = \DB::select('SELECT *
    //      FROM `products` INNER JOIN `product_categories` 
    //      ON `product_categories`.`category_id` = ? 
    //      WHERE `product_categories`.`product_id` = `products`.`id`', [$category_id]);
    //     print_r($data);

    // $data = category::with('children')->whereNull('parent_id')->orderBy('category', 'asc')->get();
    // print_r($data);
    // $data = category::with('parentcategory')->get();
    // foreach($data as $p=>$c){
    //     echo $p['category'];
    //     foreach($c as $k=>$v){
    //         echo $v['category'];
    //         echo '<br>';
    //     }
    // }
    // dd($data);
    // $products = product_category::with('product')->get();
    // dd($products);
    // $products = product_category::with('products')->get();
    // foreach($products as $p){
    //     echo $p->products['productname'];
    //     echo '<br>';
    // }
    // echo '<br>';
    // $category = product_category::with('categories')->get();
    // foreach($category as $c ){
    //     echo $c->categories['category'];
    //     echo '<br>';
    // }
    // dd($products);
//     // $pc = products::find(7)->productss;
//     $pc = category::with('parentcategory')->get();
// echo'<pre>';
//     // print_r($pc);
//     echo '</pre>';
//     foreach($pc as $k => $v){
//         echo $k;
//         echo $v['parentcategory'];
//         // echo '=';
//         echo '<br>';
//             echo $v;
//         echo '<br>';
//     }
    // $article=category::with("parentcategory")->first();
    // dump($article);

    // dump($article->id);
}

}
