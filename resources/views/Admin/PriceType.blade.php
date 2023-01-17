@extends('Admin.index')
@section('PriceType')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Categories table</h3>
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
                        <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
    
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href='/admin/Pricetype/addprice' type="button" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add category</a>
                                    </div>
                                </div>
                        
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PriceType as $Ptype)                                                
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{$Ptype->quantity_from}} - {{$Ptype->quantity_to}}</td>
                                                <td>$ {{$Ptype->price}}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href='/admin/Pricetype/edit/{{ $Ptype->id }}' class="item" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="/deletepricetype/{{ $Ptype->id }}" class="show_confirm item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
            </div>
        </div>
    </div>
</div>
@endsection