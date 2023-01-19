@extends('Admin.index')
@section('editBanner')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container">
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
                        </div>
                        <div class="container col-lg-12">
                            <div class="manage_stockd-body">
                                <div class="manage_stockd-title">
                                    <h3 class="text-center title-2">Update Banner Image</h3>
                                </div>
                                 <hr>
                        <form method="POST" action="/updatebanner/{{$banner->id}}"  enctype="multipart/form-data">
                                    @csrf
                            <div class="form-group">
                                <label for="banner_name">Banner name</label>
                                    <input type="text" onload="convertToSlug(this.value)"  onkeyup="convertToSlug(this.value)" id='banner_name' name="banner_name" value="{{$banner->banner_name}}" class="form-control" placeholder="Banner Name" required>
                                </div>
                                <div class="form-group">
                                <label for="slug-text">Slug</label>
                                    <input type="text" id='slug-text' name="slug" value="{{$banner->slug}}" class="form-control" placeholder="Slug Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="sku">Sku</label>
                                    <input type="text" class='form-control' value='{{$banner->sku}}' id='sku' name='sku' placeholder='Sku Name' required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" id='image' name='image' class='form-control'>
                                </div>
                            <div class="form-group">
                                <hr>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                                <hr>
                            </div>
                        </form>
                    </div>
                </div>

</div>
</div>
<div>
@endsection