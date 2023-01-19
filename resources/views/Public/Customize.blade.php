@extends('Public.index')
@section('coustomize')
    <section class="jumbo-sticks-sec">
    <div class="container">
<div id="notification" style="display: none;">

@if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger mt-2" id="success-alert">
                                        
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>!</strong>{{ $error }}
                                            
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
</div></div>
        <!-- <form action="/customized" method="post">
        @csrf -->
        <div class="container">
            <div class="row">
                @foreach ($coustomize_product as $c_p )
                    
                <div class="col-md-6">
                    <div class="stick-img">
                        <img src="../products_images/{{$c_p->image}}" alt="{{$c_p->sku}}" class="img-fluid">
                    </div>
                </div>
                <input type="hidden" value="{{$c_p->id}}" name="coustomize_product_id">
                <input type="hidden" value="{{$c_p->slug}}" name="slug">
                <input type="hidden" name="user_id" value="{{Auth::user()->id ?? ''}}">
                <div class="col-md-6">
                    <div class="stick-box">
                        <div class="stick-text">
                            <h3>{{$c_p->productname}}</h3>
                            <p><?php echo $c_p->description; ?></p>
                            <div class="form-row row">
                                <div class="form-group col-md-12">
                                    <label>Quantity</label>
                                    <select class="custom form_control" name='cutomize_qty'>
                                    @foreach ($PriceType as $Ptype )
                                        <option  value="{{$Ptype->id}}">{{$Ptype->bundel_quantity}} ($ <?php echo $Ptype->bundel_quantity/$Ptype->bundel_price; ?> ea) ${{$Ptype->bundel_price}}.00</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="jumbo-cart-btn">
                                <a class='addtocart' value='' data-product-id='{{$c_p->id}}' href="/cart/add/{{$c_p->id}}">ADD TO CART </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <!-- </form> -->
    </section>
    @endsection


   