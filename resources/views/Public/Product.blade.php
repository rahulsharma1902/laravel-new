@extends('Public.index')
@section('product')

<section class="jumbo-sec">
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
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                    <div class="jumbo-img">
                        <img src="../products_images/<?php echo $product->image; ?>" alt="{{$product->sku}}" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbo-text">
                        <h4>{{ $product->productname}}</h4>
                        <p><?php echo $product->description ?></p>
                        <small> Be the first to review this product</small>
                        <h6> Availability: <?php if($product->quantity == 0) {?>
                        <span>out Stock</span> </h6>
                        <?php }else{ ?>
                            <span>In Stock</span> </h6>
                        <?php } ?>
                    </div>
                    <div class="jumbo-cart">
                        <p>Total Quantity {{$product->quantity}}</p>
                        <div class="jumbo-flex">
                            <div class="input-group">
                                <span class="input-group-minus">
                                    <button type="button" class="btn btn-number" disabled="disabled" data-type="minus"
                                        data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="number" name="quant[1]" class="form-control input-number" value="1" min="1"
                                    max="{{$product->quantity}}">
                                <span class="input-group-plus">
                                    <button type="button" class="btn btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                               
                            </div>
                           
                            <div class="jumbo-cart-btn">
                                <a class='addtocart' data-product-id='{{$product->id}}' href="/cart/add/{{$product->id}}">ADD TO CART </a>
                            </div>
                        </div>
                    </div>
                    <div class="jumbo-overview">
                        <h4>Quick Overview</h4>
                        <ul>
                            <li>{{$product->short_description}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Retaiteblr products -->
   <div class="container">
            <div class="product-slide-head">
               <h3>Related Products</h3>
            </div>
    <div class="row">
        @if ($relatedProducts)
            @foreach ($relatedProducts as $relatedProduct)
        <div class="col-lg-3">
        <div class="auto-des">
                  <div class="product-box prodct-dtl">
                     <div class="product-img">
                        <img src="../products_images/{{$relatedProduct->image}}" class="img-fluid">
                     </div>
                     <div class="product-abt">
                     <h6>{{$relatedProduct->productname}}</h6>
                     <p><?php echo $relatedProduct->description; ?></p>
                     <div class="product-size-price">
                        <p>List Price:<span>${{$relatedProduct->price}}</span> </p>
                     </div>
                     </div>
                     <div class="product-btn">
                     <a class='addtocart' data-product-id='{{$relatedProduct->id}}' href="/cart/add/{{$relatedProduct->id}}">ADD TO CART </a>
                     </div>
                  </div>
               </div> 
        </div> 
        @endforeach                  
        @else
            <p>No Product Matched!</p>
        @endif
    </div>
   </div>
@endsection