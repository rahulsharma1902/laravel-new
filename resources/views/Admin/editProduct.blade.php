@extends('Admin.index')
@section('editProduct')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row ">
                            <div class="container col-lg-8 p-3">
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
                                    <div class="manage_stockd-header">Update Product</div>

                                    <div class="manage_stockd-body">
                                        <div class="manage_stockd-title">
                                            <h3 class="text-danger text-center title-2"><span class='text-dark'>Update:</span>  {{$product->productname}}</h3>
                                        </div>
                                        <hr>
                        <form method="POST" action="/updateProduct/{{$product->id}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row row">
                          
                            <!-- <input type="hidden" name='id'  value="{{$product->id}}"> -->
                            <div class="form-group col-md-12">
                            <label for="productname">Product name</label>
                                <input type="text" id='productname' name="productname" value="{{$product->productname}}" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="slug">Slug</label>
                                <input type="text" id='slug-text' name="slug" value="{{$product->slug}}" class="form-control" placeholder="Slug Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="p-3" rows="6" name="description" cols="50"  id="editor"
                                placeholder="Description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="short-description">short-description</label>
                            <textarea class="p-3" rows="6" name="short_description" cols="50"  id="short-description"
                                placeholder=" Short Description">{{$product->short_description}}</textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="tag">Select Tag</label>
                                            <select multiple name="tag[]" value="{{$product->tag}}" class="form-control" id="tag">
                                                <option value="1">Tag1</option>
                                                <option value="2">Tag2</option>
                                            </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select multiple class="form-control" value="{{$product->category}}" name="category[]" id="category">
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
                                <select class="form-control" onchange="displayDivDemo('hideValuesOnSelect', this)" value="{{$product->type}}" name="type" id="type" required>
                                <option value="{{$product->type}}"><?php if($product->type == 1){ echo 'Coustamizable'; }else{ echo 'Normal';}?></option>    
                                <option value="2" disabled>Normal</option>
                                    <option value="1" disabled>Coustamizable</option>
                                </select>
                            </div>
                        </div>

                        <!-- from here hidden div start -->

                            <div id="hideValuesOnSelect" style='display:none;'>
                            <hr>
                            <div class="row col-lg-12">
                            <table class="table">
                                <thead class="table">
                                <tr class='text-left'>
                                    <th scope="col" class="text-end">Quantity</th>
                                    <th scope="col" class="text-left">Price</th>
                                    <th scope="col" class="">                         
                                        <button type="button" id='buttonDselAjax' class="btn btn-sm btn-success" title='Update Variations'><i class="fa fa-refresh" aria-hidden="true"></i></button> 
                                    </th>
                                    <th scope="col" class="NoPrint">                         
                                        <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>  
                                    </th>


                                </tr>
                                </thead>
                                <tbody id="TBody">
                                <?php $priceVar = json_decode($pricevariation);

                                ?>
                                @foreach ($priceVar as $var)   
                                <tr id="TRow" class="d-none">
                                     <!-- <td><input type="hidden" value='{{$var->id}}' name='var_id'></td> -->
                                    <td><input type="number" value="{{$var->bundel_quantity}}" class="form-control text-end" name="bundel_quantity[]"></td>
                                    <td><input type="number" value="{{$var->bundel_price}}" class="form-control text-end" name="bundel_price[]"></td>
                                    <td class="NoPrint"><button type="button" class='deleteRecord' data-id="{{ $var->id }}" class="btn btn-sm btn-danger" >X</button></td>
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                            </div>
                            <hr>
                            </div>
                        <!--hidden div end here -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sku">Sku</label>
                                <input name="sku" value="{{$product->sku}}" id='sku' type="text" class="form-control" placeholder="sku must be unique.." >
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="price">Product Price</label>
                                <input name="price" id='price' value="{{$product->price}}" type="number" class="product_price form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sale_price">Sale Price</label>
                                <input name="sale_price" id='sale_price' value="{{$product->sale_price}}" type="number" class="product_sale_price form-control" >
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="quantity">Total Quantity</label>
                                <input name="quantity" id='quantity' value="{{$product->quantity}}" type="number" class="fieldone form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <!-- <label for="">Sku</label>
                                <input name="manage_stock" value="" id='manage_stock' type="text" class="form-control" placeholder="" >
                            </div> -->
                            <label for="manage_stock">Manage Stock</label>
                            <select  class="form-control" onchange="yesnoCheck(this);" >
                                <option value="0">No</option>
                                <option value="manage_stock">Yes</option>
                            </select>
                            </div>
                                    </div>
                            <div id="ifYes" style="display: none;">
                                <label for="manage_stock">Stock</label>
                                 <input class="fieldtwo form-control" value="{{$product->manage_stock}}" type="number" id="manage_stock" name="manage_stock" />
                            </div>
                        </div>
                        <!-- <hr> -->
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="product_image" id="image" value='{{$product->image}}' >
                            </div>
                            <!-- <hr> -->
                        </div>
                        <div class="form-group">
                            <!-- <a href="">SEARCH</a> -->
                            <hr>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                            <hr>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div></div></div>
@endsection