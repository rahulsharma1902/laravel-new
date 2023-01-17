@extends('Admin.index')
@section('addProducts')
<section class="catlog-sec">
        <div class="container">
            <div class="catlog-form">
                <div class=" catlog-search">
                    <h4 class="text-center">Upload Product</h4>
                </div>
                <div class="catlog-p">
                    <div class="catlog-text">
                        <p>Product Information</p>
                    </div>

                    <form method="POST" action="/addproducts"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-12">
                                <input type="text" name="pname" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" name="description" cols="50" id="exampleFormControlTextarea1"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" name="short-description" cols="50" id="exampleFormControlTextarea1"
                                placeholder=" Short Description"></textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">select Tag</label>
                                            <select multiple name="tag" class="form-control" id="exampleFormControlSelect2">
                                            <?php foreach($allcategories as $a){ ?>
                                                 <option value="<?php echo $a->id; ?>"> <?php echo $a->tag; ?></option> 
                                            <?php  } ?>
                                            </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">select Category</label>
                                    <select multiple class="form-control" name="category" id="exampleFormControlSelect2">
                                    <?php foreach($allcategories as $a){ ?>
                                         <option value="<?php echo $a->id; ?>"> <?php echo $a->category_name; ?></option> 
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">select Type</label>
                                <select class="form-control" name="type" id="exampleFormControlSelect1">
                                <option value="1">Coustamizable</option>
                                <option value="2">Non Coustamizable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input name="price" type="number" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Qty</label>
                                <input name="qty" type="number" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <input type="file" name="product_image" id="image">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="sku" id="sku" placeholder="SKU">
                            </div>
                            <hr>
                        </div>
                        <div class="form-btn">
                            <!-- <a href="">SEARCH</a> -->
                            <button type="submit" id="catlog-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>  
@endsection
