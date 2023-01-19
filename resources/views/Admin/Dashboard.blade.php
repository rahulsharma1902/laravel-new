@extends('Admin.index')
@section('dashboard')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
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
                                <div class="overview-wrap ">
                                    <h2 class="title-1">Dashboard</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <!-- <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25 ">
                            <div class="col-sm-6 col-lg-3 ">
                                <div class="overview-item overview-item--c4 h-100">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 class='text-dark'>{{ count($users) ?? '' }}</h2>
                                                <span>Total Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2 h-100">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2 class='text-dark'>{{ count($allproducts) ?? '' }}</h2>
                                                <span>Total Products</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3 h-100">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2 class='text-dark'>{{ count($cat) ?? '' }}</h2>
                                                <span>Total Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection


