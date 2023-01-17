<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
// use Auth;
use Session;
use App\Models\category;
use App\Models\products;

class AdminController extends Controller
{
    //
    public function index()
        {
            //
        }
    
        //
        public function dashboard(){
            $cat = category::all();
            $allproducts = products::all();
            $users = User::all();
            return view('Admin.Dashboard',compact('cat','allproducts','users'));
            // echo 'hi';
        }

}
