@extends('Public.index')
@section('Checkout')
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
<div class="container">
      <div class="py-5 text-center ">
        <h2>Checkout form</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{count(session('cart'))}}</span>
          </h4>
          <ul class="list-group mb-3">
          @foreach(session('cart') as $id => $details)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $details['productname'] }}</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?php if($details['type'] == 1){
                  $quentity = $details['quantity'];
                      if(array_key_exists($quentity,$details['quantity_price'])) {
                        echo $details['quantity_price'][$quentity];
                        $totalprice[] = $details['quantity_price'][$quentity];
                    }else{
                      echo $details['price']*$details['quantity'];
                      $totalprice[] = $details['price']*$details['quantity'];

                    }
                }else{
                  echo $details['price']*$details['quantity'];
                  $totalprice[] = $details['price']*$details['quantity'];
                } ?></span>
            </li>
           @endforeach
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong class='totalprice'>$<?php print_r(array_sum($totalprice)); ?></strong>
            </li>
          </ul>

          <form class="card p-2" method='POST' action='checkoutpayment'>
            <input type="hidden" name='grand_total' value="{{ array_sum($totalprice) }}">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
        <header class="card-header bg-dark text-light">
            <h4 class="card-title mt-1 ">Billing Details</h4>
        </header>
          <form class="needs-validation" method='POST' action='checkoutpayment'>
            @csrf
            <div class="row mt-3">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name='first_name' id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name='last_name' id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name='email' id="email" value='{{Auth::user()->email ?? ""}}' placeholder="you@example.com" disabled>
            </div>
            <div class="mb-3">
              <label for="phone_number">Phone</label>
              <input type="phone" class="form-control" name='phone_number' id="phone_number" value='' placeholder="78967****" required>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name='address' id="address" placeholder="1234 Main St" required="">
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name='country' id="country" required="">
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="city">City</label>
                <select class="custom-select d-block w-100" name='city' id="city" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name='post_code' id="zip" placeholder="" required="">
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>
            <fieldset>

<div class="span4">
<!-- Left Site -->
    <input type="radio" data-for='paypal' checked="checked" name="payment" value='1'>Paypal<br/>
    <input type="radio" data-for='cash_on_delevary' name="payment" value='2'>Cash on Delevary
<!-- End Left Site -->
</div>
    <div class="span4">
        <!-- Right Site -->
        <div class="control-group" id="paypal">
        <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" name='cc_name' id="cc-name" placeholder="">
                <small class="text-muted">Full name as displayed on card</small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" name='cc_number' id="cc-number" placeholder="" >
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" name='cc_expireation' id="cc-expiration" placeholder="" >
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" name='cc_cvv' id="cc-cvv" placeholder="" >
              </div>
            </div>
            <hr class="mb-4">
        </div>
        <!-- <div class="control-group" id="cash_on_delevary">
            <label class="control-label" >Cash on Delevary</label>
        </div> -->
        <!-- end Right Site -->
    </div>
    </fieldset>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div>
@endsection