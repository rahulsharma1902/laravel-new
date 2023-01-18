@extends('Public.index')
@section('SearchProduct')
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-12 col-md-8 col-sm-12">
                    <div class="row">
                        @if ($searchproduct != null)
                        @foreach ($searchproduct as $sp)     
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="craft-box">
                                <div class="craft-img">
                                    <img src="../products_images/<?php echo $sp->image; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="craft-text">
                                    <h3>{{$sp->productname}}</h3>
                                    <p><?php echo $sp->description ?></p>
                                    <ul>
                                        <li>Case Size: </li>
                                        <li>Pallet Size: </li>
                                        <li>List Price: <span>${{$sp->price}}</span></li>
                                    </ul>
                                </div>
                                <div class="craft-btn">
                                    <a class='addtocart' data-product-id='{{$sp->id}}' href="/cart/add/{{$sp->id}}">ADD TO CART </a>
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
