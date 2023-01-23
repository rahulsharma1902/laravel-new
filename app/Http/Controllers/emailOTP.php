<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
// use Auth;
use Carbon\Carbon; // use for compare time stamps
use Session;
use App\Models\category;
use App\Models\products;
class emailOTP extends Controller
{
    //
    public function index(Request $request){   

        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        print_r($request->all());
        $OTP = random_int(1000, 9999);
        $user = User::where('email', $validated['email'])->first();
        $user->remember_token = $OTP;
        $user->updated_at = Carbon::now()->addSeconds(10);
        $user->save();
        // print_r($user);
        // print_r($OTP);
                $details = [
                    'title' => 'Mail from PERFECTSTIX.com',
                    'body'  => 'You are receiving this email because we received a password reset request for your account.',
                    'token' => $request->get('token'),
                    'OTP' => $OTP,
                ];
               
                \Mail::to($request->input('email'))->send(new \App\Mail\MyTestMail($details));
               
                // dd("Email is Sent.");
                return redirect('/enter-otp')->with('success', 'Your **** OTP Sent To Your Email');
    }


    public function enterOTP(){
     
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
    return view('auth.ForgetPassword.enterOTP',compact('cat','allproducts','catWithId'));
    }
    public function verifyOTP(Request $request){
        $validated = $request->validate([
            'otp' => 'required|min:4|max:4',
        ]);
        $user = User::where('remember_token', $request->get('otp'))->first();
        // $user->updated_at->diffInSeconds(Carbon::now()) > 60;

        if($user == null){
            // print_r();
            return redirect('/enter-otp')->with('error', 'Invalid OTP'); 
        }else{
            // print_r($user);
            $expireOTP = $user->updated_at;
            if(Carbon::now()->diffInMinutes($expireOTP) >= 1){
                return redirect('/forget_password')->with('error', 'Your OTP has been expired!');
                // echo 'OTP expired!'; 
            }else{
            return redirect('/new-password/'.$user['remember_token']);
        }
        }
    }
    public function newPassword($OTP){
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
        return view('auth.ForgetPassword.newPassword',compact('cat','allproducts','catWithId','OTP'));

    }
    public function genratePassword(Request $request){
        $this->validate($request, [
            'OTP' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
print_r($request->all());
        $user = User::where('remember_token', $request->get('OTP'))->first();
        if($user == null){
            return redirect('/my_account')->with('error', 'OTP expired !');
        }else{
        $user->password = bcrypt($request->get('password'));
        $user->remember_token = null;
        $user->save();
        return redirect('/my_account')->with('success', '****** Password updated!');
    }
    }
}