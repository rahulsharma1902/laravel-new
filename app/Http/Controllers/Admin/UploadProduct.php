<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\pricevariation;
use App\Models\User;
// use Auth;
use Session;
use App\Models\category;
use App\Models\products;
class UploadProduct extends Controller
{
    public function index(){
        $cat = category::all();
        $allproducts = products::all();
        $users = User::all();
        return view('Admin.Products',compact('cat','allproducts','users'));
    }
    public function addProduct(){
            $cat = category::all();
            $allproducts = products::all();
            $users = User::all();
            return view('Admin.addProduct',compact('cat','allproducts','users'));

    }

    public function save(Request $request){
        // print_r($request->all());
       
        print_r($request->get('type'));
        $validated = $request->validate([
            'productname' => 'required|unique:products,productname|max:255',
            'sku'         => 'required|unique:products,sku|max:255',
            'slug'        => 'required|unique:products,slug|max:255',
        ]);
             $img = $request->get('img');
            if($request->hasfile('product_image')){
                $file = $request->file('product_image');
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path().'/products_images/', $name);  
                $image_path=public_path().'/products_images/';
                $product = new products();
                $product->productname = $request->get('productname');
                $product->slug = $request->get('slug');
                $product->description = $request->get('description');
                $product->short_description = $request->get('short_description');
                $product->price = $request->get('price');
                $product->sale_price = $request->get('sale_price');
                $product->category = serialize($request->get('category'));
                $product->tag = serialize($request->get('tag'));
                $product->image = $name;
                $product->sku = $request->get('sku');
                $product->quantity = $request->get('quantity');
                $product->manage_stock = $request->get('manage_stock');
                $product->type = $request->get('type');
                $product->save();
                if($request->post('type') == 1){
                    // echo '<pre>';
                    $request->post('bundel_quantity');
                    $request->post('bundel_price');
                    $dbdata = array_combine($request->post('bundel_quantity'),$request->post('bundel_price'));
                    $result = array_filter($dbdata, fn ($dbdata) => !is_null($dbdata));
                    $product = products::where('slug', $request->post('slug'))->first();
                    if(!empty($result)){
                    foreach($result as $key => $value) {
                        $pricevariation = new pricevariation();
                        $pricevariation->bundel_quantity = $key;
                        $pricevariation->bundel_price = $value;
                        $pricevariation->product_slug = $request->post('slug');
                        $pricevariation->product_sku = $request->post('sku');
                        $pricevariation->product_id = $product->id;
                        $pricevariation->save();

                    }
                    return redirect('/admin/products/addProduct')->with('success','Your Custumized Product added successfully.'); 

                }
                }
            return redirect('/admin/products/addProduct')->with('success','Product added successfully.');
        }else{
            return redirect('/admin/products/addProduct')->with('error', 'Use a product image');
        } 
    }

    // pricevariation table mai save krne ka function
    public function savePricetype(Request $request){
        $dbdata = array_combine($request->get('bundel_quantity'),$request->get('bundel_price'));
        $result = array_filter($dbdata, fn ($dbdata) => !is_null($dbdata));
        if(!empty($result)){
            foreach($result as $key => $value) {
                $pricevariation = new pricevariation();
                $pricevariation->bundel_quantity = $key;
                $pricevariation->bundel_price = $value;
                $pricevariation->product_slug = $request->get('product_slug');
                $pricevariation->product_sku = $request->get('product_sku');
                $pricevariation->product_id = $request->get('product_id');
                $pricevariation->save();
            }
            return redirect('admin/products')->with('success','Product Update successfully.');
    }
}
    public function customizepricetype($id){
        $cat = category::all();
        $product = products::where('id', $id)->first();
        $pricevariation = pricevariation::where('product_id', $product->id)->get();

        return view('Admin.CustomizePricetype',compact('cat','product','pricevariation'));
    }
    // price type update krne kai liai
    public function updatepricetype(Request $request){
        $pricevariation = new pricevariation();
        $pricevariation = pricevariation::find($request->get('id'));
        $pricevariation->bundel_quantity = $request->get('quantity');
        $pricevariation->bundel_price = $request->get('price');
        $pricevariation->save();
        return response()->json([
            'success' => 'quantity update successfully!'
        ]); 
    }
// product ko edit krne ka function
        public function editProduct($id){
            $cat = category::all();
            $product = products::where('id', $id)->first();
            $pricevariation = pricevariation::where('product_id', $product->id)->get();

            return view('Admin.editProduct',compact('cat','product','pricevariation'));
        }
        public function updateProduct(Request $request,$id){
    // $id = $request->get('id');
    $validated = $request->validate([
        // 'productname' => 'required|unique:products,productname|max:255, '.$id.', id',
        'productname' => ['required',Rule::unique('products', 'productname')->ignore($id), ],
        'sku'         => ['required',Rule::unique('products', 'sku')->ignore($id), ],
        'slug'        => ['required',Rule::unique('products', 'slug')->ignore($id), ],
    ]);
            $product = products::find($id);
            $product->productname = $request->get('productname');
            $product->slug = $request->get('slug');
            $product->description = $request->get('description');
            $product->short_description = $request->get('short_description');
            $product->price = $request->get('price');
            $product->sale_price = $request->get('sale_price');
            $product->category = $request->get('category');
            $product->tag = $request->get('tag');
            $product->sku = $request->get('sku');
            $product->quantity = $request->get('quantity');
            $product->manage_stock = $request->get('manage_stock');
            $product->type = $request->get('type');
            $product->save();
            return redirect('/admin/products')->with('success','Product Update successfully.');
            
            //    print_r($request->all());
        }
        
        public function deleteProduct($id){
            $product = products::where('id', $id);
            if($product){
                $product->delete();
                return redirect('/admin/products')->with('success', 'Product deleted successfully.');
            }
        }

        public function destroy($id){
            
            $pricevariations = pricevariation::where('id', $id);
            if($pricevariations){
                $pricevariations->delete();
                return response()->json([
                    'success' => 'Record deleted successfully!'
                ]);            }
            // products::find($id)->delete($id);
          
          
        }
}



