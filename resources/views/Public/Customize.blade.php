@extends('Public.index')
@section('coustomize')
    <section class="jumbo-sticks-sec">
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
        <form action="/customized" method="post">
        @csrf
        <div class="container">
            <div class="row">
                @foreach ($coustomize_product as $c_p )
                    
                <div class="col-md-6">
                    <div class="stick-img">
                        <img src="../products_images/{{$c_p->image}}" alt="{{$c_p->sku}}" class="img-fluid">
                    </div>
                </div>
                <input type="hidden" value="{{$c_p->id}}" name="coustomize_product_id">

                <input type="hidden" name="user_id" value="{{Auth::user()->id ?? ''}}">
                <div class="col-md-6">
                    <div class="stick-box">
                        <div class="stick-text">
                            <h3>{{$c_p->productname}}</h3>
                            <p><?php echo $c_p->description; ?></p>
                            <div class="form-row row">
                                <div class="form-group col-md-12">
                                    <label>Quantity</label>
                                    <select class="custom form_control">
                                    @foreach ($PriceType as $Ptype )
                                        <option value="{{$Ptype->id}}">{{$Ptype->bundel_quantity}} ($ <?php echo $Ptype->bundel_quantity/$Ptype->bundel_price; ?> ea) ${{$Ptype->bundel_price}}.00</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true">
                                        <span class="title">Select Imprint Color</span>
                                        <span class="accicon"><i class="fa-solid fa-caret-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="color">
                                                <input type="color"  value="#823fc6" id="inputColor">
                                                <input type="text" name="customize_colorcode" spellcheck="false" placeholder="Color" id="inputText"
                                                    value="#823fc6">
                                            </div>
                                            <div class="btn">
                                                <button id="btn" id="getHEX" onclick="color()">Get HEX code</button>
                                                <button id="btn" id="copy" onclick="copy()">Copy HEX</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card card-p">
                                        <div class="card-header" data-toggle="collapse" data-target="#collapsetwo"
                                            aria-expanded="true">
                                            <span class="title">Graphic & Clipart </span>
                                            <span class="accicon"><i
                                                    class="fa-solid fa-caret-down rotate-icon"></i></span>
                                        </div>
                                        <div id="collapsetwo" class="collapse show scrollbar style-2"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul id='myid'>
                                                    <li class="list_craft" id='1'><img src="../images/icon-1.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='2'><img src="../images/icon-2.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='3'><img src="../images/icon-3.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='4'><img src="../images/icon-4.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='5'><img src="../images/icon-5.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='6'><img src="../images/icon-6.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='7'><img src="../images/icon-7.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='8'><img src="../images/icon-8.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='9'><img src="../images/icon-9.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='10'><img src="../images/icon-10.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='11'><img src="../images/icon-11.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='12'><img src="../images/icon-12.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='13'><img src="../images/icon-13.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='14'><img src="../images/icon-14.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='15'><img src="../images/icon-15.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='16'><img src="../images/icon-16.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='17'><img src="../images/icon-17.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='18'><img src="../images/icon-18.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='19'><img src="../images/icon-19.png" alt=""
                                                                class="img-fluid"></li>
                                                    <li class="list_craft" id='20'><img src="../images/icon-20.png" alt=""
                                                                class="img-fluid"></li>
                                                </ul>
                                                <input type="hidden" name="craft_id" id="craft_id">
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" data-target="#collapsethree"
                                        aria-expanded="true">
                                        <span class="title">Add and Edit Text</span>
                                        <span class="accicon"><i class="fa-solid fa-caret-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapsethree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <!-- <form> -->
                                                <div class="form-row row">
                                                    <div class="form-group col-md-12">
                                                        <label>select-font style</label>
                                                        <select name="font-style" class="custom form_control">
                                                            <option disabled selected value>font style</option>
                                                            <option value="robot">roboto</option>
                                                            <option value="noto">noto sans</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            <!-- </form> -->



                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" data-target="#collapsefour"
                                        aria-expanded="true">
                                        <span class="title">Add and Edit Text</span>
                                        <span class="accicon"><i class="fa-solid fa-caret-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapsefour" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <!-- <form> -->
                                                <div class="form-group">
                                                    <label>enter your text here</label>
                                                    <textarea name='customize_text' rows="6" cols="50" id="exampleFormControlTextarea1"
                                                        placeholder=" Type Something"></textarea>
                                                </div>

                                            <!-- </form> -->



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <!-- <a href=""> ADD TO CART</a> -->
                                <button type="submit" class='btn btn-outline-success'>SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    @endsection


   