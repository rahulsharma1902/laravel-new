@extends('Public.index')
@section('cart')
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="container">
          <div id="notification" style="display: none;">
             @if ($message = Session::get('success'))
                                        <div class="dismiss alert alert-success" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Success!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
                                        <!-- error -->
            @if ($message = Session::get('error'))
                                        <div class="dismiss alert alert-danger" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
          </div>                       
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>

        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
          @if(session('cart'))
        
                        @foreach(session('cart') as $id => $details)

            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="products_images/{{ $details['image'] }}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $details['productname'] }}</p>
                <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="form1" max="{{$details['total_quantity']}}" data-id='{{$id}}' min="1" name="quantity" value="{{ $details['quantity'] }}" type="number"
                  class="cart_update form-control form-control-sm" />

                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <!-- <h5 class="mb-0">$<?php echo $details['price']*$details['quantity'] ?>.00</h5> -->
                <h5 class="mb-0">$<?php if($details['type'] == 1){
                  $quentity = $details['quantity'];
                      if(array_key_exists($quentity,$details['quantity_price'])) {
                        echo $details['quantity_price'][$quentity];
                    }else{
                      echo $details['price']*$details['quantity'];
                    }
                }else{
                  echo $details['price']*$details['quantity'];
                } ?>.00</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a class='remove_item'href="/cart/remove/" data-id="{{$id}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
            <hr>
            @endforeach
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-body">
           <a href="/checkout"> <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection