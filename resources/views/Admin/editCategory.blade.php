@extends('Admin.index')
@section('editCategory')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid col-lg-12">

                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" id="success-alert">
                                        
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error!</strong>{{ $error }}
                                            
                                        </div>
                                        @endforeach
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
                    <div class="manage_stockd-body">
                                <div class="manage_stockd-title">
                                    <h3 class="text-center title-2">Update Category</h3>
                                </div>
                                 <hr>
                        <form method="POST" action="/updatecategory/{{$categorie->id}}"  enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="category">Category name</label>
                                    <input type="text" onload="convertToSlug(this.value)"  onkeyup="convertToSlug(this.value)" id='category' name="category" value="{{$categorie->category}}" class="form-control" placeholder="Category Name" required>
                                </div>
                                <div class="form-group">
                                <label for="slug-text">Slug</label>
                                    <input type="text" id='slug-text' name="slug" value="{{$categorie->slug}}" class="form-control" placeholder="Slug Name" required>
                                </div>
                            <div class="form-group">
                                <label for="parent_id">Parent Category</label>
                                <select class='form-control' name="parent_id" id="" value="{{$categorie->parent_id}}">
                                    <option value="0" >Select Parent Category</option>
                                    @foreach ($cat as $c)
                                        <option value="{{$c->id}}">{{$c->category}}</option>
                                    @endforeach
                                </select>
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
@endsection