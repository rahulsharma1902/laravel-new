@extends('Admin.index')
@section('editPriceType')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="container col-lg-8">
                            @if ($errors->any())
                                <div class="alert alert-danger" id="success-alert">
                                    @foreach ($errors->all() as $error)
                                     <button type="button" class="close" data-dismiss="alert">x</button>
                                    <li><strong>Error!</strong>{{ $error }}</li> 
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" id="success-alert">
                                     <button type="button" class="close" data-dismiss="alert">x</button>
                                 <strong>Success!</strong>
                                    {{$message}}
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger" id="danger-alert">
                                     <button type="button" class="close" data-dismiss="alert">x</button>
                                 <strong>Error!</strong>
                                    {{$message}}
                                </div>
                                @endif
                            </div>
                        </div>
            <div class="container col-lg-12">
                                <div class="manage_stockd">
                                    <div class="manage_stockd-header">Update Price Type</div>

                                    <div class="manage_stockd-body">
                                        <div class="manage_stockd-title">
                                            <h3 class="text-center title-2">Update Price Type</h3>
                                        </div>
                                        <hr>
                        <form method="POST" action="/updatepricetype/{{$pricetype->id}}"  enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="quantity_to">Quantity 0 - ?</label>
                            <input type="number" value='{{$pricetype->quantity_to}}' name='quantity_to' id='quantity_to' class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name='price' value='{{$pricetype->price}}' id='price' class="form-control">
                          </div>
                        <div class="form-group">
                            <hr>
                            <button type="submit" class="btn btn-success btn-lg btn-block">UPDATE</button>
                            <hr>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div></div></div>
@endsection