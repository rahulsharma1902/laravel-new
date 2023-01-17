@extends('Admin.index')
@section('addcategory')
<section class="catlog-sec">
        <div class="container">
            <div class="catlog-form">
                <div class=" catlog-search">
                    <h4 class="text-center">Upload Category</h4>
                </div>
                <div class="catlog-p">
                    
                    <form method="POST" action="/addcategory"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-12">
                                <label for="category_name"></label>
                                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-12">
                                <label for="tag_name"></label>
                                <input type="text" name="tag_name" id="tag_name" class="form-control" placeholder="Tag Name">
                            </div>
                        </div>
                      
                        
                        <div class="form-btn">
                            <button type="submit" id="catlog-btn">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>  
@endsection
