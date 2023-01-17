@extends('Admin.index')
@section('addProduct')
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
                                <div class="manage_stockd">
                                    <div class="manage_stockd-header">ProductUpload</div>

                                    <div class="manage_stockd-body">
                                        <div class="manage_stockd-title">
                                            <h3 class="text-center title-2">Upload Product</h3>
                                        </div>
                                        <hr>
                        <form method="POST" action="/addproducts"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row row">
                          
                            <input type="hidden" value="">
                            <div class="form-group col-md-12">
                            <label for="productname">Product name</label>
                                <input type="text" onload="convertToSlug(this.value)"  onkeyup="convertToSlug(this.value)" id='productname' name="productname" value="" class="form-control" placeholder="Product Name" required>
                            </div>
                            <div class="form-group col-md-12">
                            <label for="slug-text">Slug</label>
                                <input type="text" id='slug-text' name="slug" value="" class="form-control" placeholder="Slug Name" required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="2" name="description" cols="50"  id="description"
                                placeholder="Description....." required></textarea>
                        </div>
                         -->
                         <div class="form-group">
                            <label for="editor">Description</label>
                            <textarea rows="2" name="description" cols="50"  id="editor"
                                placeholder="Description....." ></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="short-description">Short-description</label>
                            <textarea rows="2" name="short_description" cols="50"  id="short-description"
                                placeholder=" Short Description....." required></textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="tag">Select Tag</label>
                                            <select multiple name="tag[]" value="" class="form-control" id="tag" required>
                                            <!-- <?php foreach($cat as $c){ ?>
                                                 <option value="<?php echo $c->id; ?>"> <?php echo $c->tag; ?></option> 
                                            <?php  } ?> -->
                                            <option value="1">Tag1</option>
                                            <option value="2">Tag2</option>
                                            </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select multiple class="form-control" value="" name="category[]" id="category" data-live-search="true" required>
                                    <?php foreach($cat as $c){ ?>
                                         <option value="<?php echo $c->id; ?>"> <?php echo $c->category; ?></option> 
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="type">Product Type</label>
                                <select class="form-control" onchange="displayDivDemo('hideValuesOnSelect', this)" value="" name="type" id="type" required>
                                    <option value="2">Normal</option>
                                    <option value="1">Coustamizable</option>
                                </select>
                            </div>
                        </div>
                        <!-- from here hidden div start -->
                            <div id="hideValuesOnSelect" style='display:none;'>
                            <hr>
                            <div class="row col-lg-12">
                            <table class="table">
                                <thead class="table">
                                <tr>
                                    <th scope="col" class="text-end">Quantity</th>
                                    <th scope="col" class="text-end">Price</th>
                                    <th scope="col" class="NoPrint">                         
                                        <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                                    
                                    </th>

                                </tr>
                                </thead>
                                <tbody id="TBody">
                                <tr id="TRow" class="d-none">
                                    <td><input type="number" class="form-control text-end" name="bundel_quantity[]"></td>
                                    <td><input type="number" class="form-control text-end" name="bundel_price[]"></td>
                                    <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <hr>
                            </div>
                        <!--hidden div end here -->
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for='sku'>Sku</label>
                                <input name="sku" value="" id='sku' type="text" class="form-control" placeholder="sku must be unique.." required>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for='price'>Product Price</label>
                                <input name="price" id='price' value="" type="number" class="product_price form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for='sale-price'>Sale Price</label>
                                <input name="sale_price" id='sale-price' value="" type="number" class="product_sale_price form-control" required>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for='quantity'>Total Quantity</label>
                                <input name="quantity" id='quantity' value="" type="number" class="fieldone form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <!-- <label>Sku</label>
                                <input name="manage_stock" value="" id='manage_stock' type="text" class="form-control" placeholder="" required>
                            </div> -->
                            <label for="manage_stock">Manage Stock</label>
                            <select  class="form-control" onchange="yesnoCheck(this);" required>
                                <option value="0">No</option>
                                <option value="manage_stock">Yes</option>
                            </select>
                            </div>
                                    </div>
                            <div id="ifYes" style="display: none;">
                                <label for="manage_stock">Stock</label>
                                 <input class="fieldtwo" type="number" id="manage_stock" name="manage_stock" />
                            </div>
                        </div>
                        <hr>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <input type="file" name="product_image" id="image"  >
                            </div>
                            <hr>
                        </div>
                        <div class="form-group">
                            <!-- <a href="">SEARCH</a> -->
                            <hr>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
                            <hr>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div></div></div>
@endsection
