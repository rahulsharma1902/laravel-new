@extends('Public.index')
@section('allcategory')
    
<section class="craft-sec">
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
                                    <a href="">Add to Cart</a>
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