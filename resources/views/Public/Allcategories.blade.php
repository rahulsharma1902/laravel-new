@extends('Public.index')
@section('allcategory')
<section class="craft-sec">
<div class="container">
<div id="notification" style="display: none;">

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
</div></div>
        <div class="container-fluid">
            <h2>{{ Request::segment(2) }} </h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="browse-box">
                        <div class="browse-head">
                            <h5>Browse by</h5>
                        </div>
                        <div class="browse-head">
                            <span>Category</span>
                        </div>
                        <ul>
                            @foreach ($cat as $c )                            
                            <li class="browse-head"><a href="/categories/{{$c->category}}">{{$c->category}}</a></li> 
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- category side bar end here  -->
                <!-- content of category start from here  -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="row">
                        @if(!empty($catproducts))
                        @foreach ($catproducts as $cp)
                            
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="craft-box">
                                <div class="craft-img">
                                    <img src="../products_images/<?php echo $cp->image; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="craft-text">
                                    <h3>{{$cp->productname}}</h3>
                                    <p><?php echo $cp->description ?></p>
                                    <ul>
                                        <li>Case Size: </li>
                                        <li>Pallet Size: </li>
                                        <li>List Price: <span>${{$cp->price}}</span></li>
                                    </ul>
                                </div>
                                <div class="craft-btn">
                                    <a class='addtocart' data-product-id='{{$cp->id}}' href="/cart/add/{{$cp->id}}">ADD TO CART </a>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endif
                </div>
            </div>
        </div>
    </section>
    
@endsection