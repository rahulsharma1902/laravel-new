@extends('Admin.index')
@section('Banner')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <h3>Banners</h3>
                        @if ($errors->any())
                                <div class="alert alert-danger" id="success-alert">
                                    @foreach ($errors->all() as $error)
                                     <button type="button" class="close" data-dismiss="alert">x</button>
                                    <li><strong>Error!</strong>{{ $error }}</li> 
                                    @endforeach
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
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href='/admin/banner/add' type="button" class="au-btn au-btn-icon au-btn--green au-btn--small me-md-2" type="button"><i class="zmdi zmdi-plus"></i>Add Banner</a>
                            </div>
                            <div class="row">
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
                                                <th>Banner</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Sku</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banner as $banners)                                                
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><img src="../products_images/{{$banners->image_url}}" alt=""></td>
                                                <td>{{$banners->banner_name}}</td>
                                                <td>{{$banners->slug}}</td>
                                                <td>{{$banners->sku}}</td>
                                                <td><label class="switch switch-text switch-success switch-pill">
                                                    <input type="checkbox" value='{{$banners->status}}' data-id="{{$banners->id}}" class="status switch-input" checked="">
                                                    <span data-on="On" data-off="Off" class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href='/admin/banner/edit/{{ $banners->id }}' class="item" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="/delete_banner/{{ $banners->id }}" class="show_confirm item" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div>
@endsection