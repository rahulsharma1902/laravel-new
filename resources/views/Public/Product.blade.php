@extends('Public.index')
@section('product')

<section class="jumbo-sec">
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
    
@endsection