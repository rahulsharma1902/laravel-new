@extends('Admin.index')
@section('CustomizePricetype')
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
                            <div class="table-responsive m-b-40">
                            <form method="GET" action="/admin/product/savePricetype"  enctype="multipart/form-data">
                                    @csrf
                            <input type="hidden" name='product_id' value='{{$product->id}}'>
                            <input type="hidden" name='product_sku' value='{{$product->sku}}'>
                            <input type="hidden" name='product_slug' value='{{$product->slug}}'>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                                <th scope="col" class="NoPrint">                         
                                        <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                                    
                                    </th>
                                            </tr>
                                        </thead>
                                        <tbody id="TBody">
                                <tr id="TRow" class="d-none">
                                    <td><input type="number" class="form-control text-end" name="bundel_quantity[]" placeholder='Enter quantity'></td>
                                    <td><input type="number" class="form-control text-end" name="bundel_price[]" placeholder='Enter Price'></td>
                                    <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                                    <td><input type="hidden"></td>
                                </tr>
                                            <?php $priceVar = json_decode($pricevariation); ?>
                                                 @foreach ($priceVar as $var)
                                            <tr>
                                                <td><input type="number" value="{{$var->bundel_quantity}}" id='bundel_quantity{{$var->id}}' class="bundel_quantity form-control text-end"></td>
                                                <td><input type="number" value="{{$var->bundel_price}}" id='bundel_price{{$var->id}}'  class="bundel_price form-control text-end"></td>
                                                <td><button type="button" class='deleteRecord btn btn-sm btn-danger' data-id="{{ $var->id }}" >X</button></td>
                                                <td class=""><button type="button " class='updateRecord btn btn-sm btn-warning' data-id="{{ $var->id }}" >Update</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button Type="submit" class='btn btn-outline-dark my-3'>Submit</button>
                                </form>
                                </div>
                                <!-- END DATA TABLE-->
        </div>
    </div>
</div>
@endsection