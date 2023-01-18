@extends('Public.index')

@section('banner')
   <section class="banner-sec">

   @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger mt-2" id="success-alert">
                                        
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error!</strong>{{ $error }}
                                            
                                        </div>
                                        @endforeach
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success  mt-2" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Success!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger mt-2" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
      <div class="testi-slid">
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
      </div>
   </section>
 @endsection
   @section('banner-products')
   <section class="banner-products">
      <div class="container-fluid">
         <!-- get all product start from here -->
        <div class="row">
         <?php if(!empty($allproducts)) {?>
            <?php foreach($allproducts as $product) {?>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href="/products/{{$product->slug}}"><img src="products_images/<?php echo $product->image; ?>" class="img-fluid"></a>
                  <p><?php echo $product->productname; ?></p>
               </div>
            </div>
            <?php }; ?>
            <?php }else{ echo 'no product avlaible right now!';} ?>
         </div>
      </div>
   </section>
   @endsection
   @section('customizable-product')
   <section class="custom-products-sec">
      <div class="container-fluid">
         <h3>Customizable Products</h3>
         <div class="row">
            @foreach ($Cproduct as $Cp )       
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="products_images/<?php echo $Cp->image; ?>" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>{{$Cp->Productname}}</h6>
                     <p><?php echo $Cp->description ?></p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="/customize/{{$Cp->slug}}">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a class='addtocart' data-product-id='{{$Cp->id}}' href="/cart/add/{{$Cp->id}}">Add to Cart</a>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   @endsection
@section('newproducts')
   <section class="product-slide-sec">
      <div class="container-fluid">
         <div class="product-slide-head">
            <h3>New Products</h3>
         </div>
         <div class="product-slider">
<!-- start new product -->
@foreach ($newProducts as $new )
   
            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="products_images/<?php echo $new->image; ?>" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>{{$new->productname}}</h6>
                     <p><?php echo $new->description ?></p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>${{$new->price}}</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a class='addtocart' data-product-id='{{$new->id}}' href="/cart/add/{{$new->id}}">Add to Cart</a>
                  </div>
               </div>
            </div>
            @endforeach

         </div>
      </div>
   </section>
   @endsection
