@extends('Admin.index')
@section('Products')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Products table</h3>
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
                                            <!-- <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div> -->
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <!-- <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select> -->
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <!-- <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button> -->
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="/admin/products/addProduct" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Product</a>
                                    </div>
                                </div>
                        <hr>
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
                                                <th>Product Name</th>
                                                <!-- <th>Description</th> -->
                                                <th>Price</th>
                                                <!-- <th>Category</th> -->
                                                <!-- <th>Tag</th> -->
                                                <!-- <th>sku</th> -->
                                                <th>Qty</th>
                                                <!-- <th>Short Description</th> -->
                                                <th>Status</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allproducts as $p)                                                
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{$p->productname}}</td>
                                                <!-- <td>{{$p->description}}</td> -->
                                                <td>{{$p->price}}</td>
                                                <!-- <td>{{$p->category}}</td> -->
                                                <!-- <td>{{$p->tag}}</td> -->
                                                <!-- <td>{{$p->image}}</td> -->
                                                <!-- <td>{{$p->sku}}</td> -->
                                                <td>{{$p->quantity}}</td>
                                                <!-- <td>{{$p->ShortDescription}}</td> -->
                                                <td>@if ($p->status == 1)
                                                <span class="status--process">Active</span>
                                                @else
                                                <span class="status--denied">Denied</span>
                                                @endif</td>
                                                <td>@if ($p->type == 1)
                                                <a href="/admin/products/customize/{{ $p->id }}"><span class="status--denied">Customize</span></a>
                                                @else
                                                <span class="status--process">Normal</span>
                                                @endif</td>  
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href='/admin/products/editProduct/{{ $p->id }}' class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="/deleteProduct/{{ $p->id }}" class="show_confirm item" data-toggle="tooltip" title='Delete'>
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
</div></div></div>
@endsection