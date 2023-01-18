@extends('Public.index')
@section('my_account')
    <section class="account-sec">
        <div class="container ">

                            @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger mt-4" id="success-alert">
                                        
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error!</strong>{{ $error }}
                                            
                                        </div>
                                        @endforeach
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success mt-4" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Success!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger mt-4" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
            <div class="contact-login-form">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="Login-tab" data-toggle="tab" href="#login" role="tab"
                            aria-controls="home" aria-selected="true">Login My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab"
                            aria-controls="profile" aria-selected="false">Create an Account</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="Login-tab">
                        <div class="acc-box">
                            <div class="acc-box-text">
                                <p class="text-center">If you have an account with us, please log in.</p>
                            </div>
                            <!-- Login Form start here -->
                            <form method = "POST" action= "/login">
                            @csrf
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="email" name="email" class="form-control cont" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="password" name="password" class="form-control cont" placeholder="Password" required>
                                    </div>
                                </div>
                                <p>Forgot Your Password?</p>
                                <div class="form-btn">
                                    <!-- <a href="">LOGIN</a> -->
                                    <button class="btna" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- lOGIN FORM END HERE -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                        <div class="acc-box">
                            <div class="acc-box-text1">
                                <p>Personal Information</p>
                            </div>
                            <!-- Register Form Start from here -->
                            <form method = "POST" action= "/register">
                            @csrf
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="firstname" class="form-control cont" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="lastname" class="form-control cont" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="email" name="email" class="form-control cont" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-md-12">
                                        <input type="password" name="password" class="form-control cont" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <!-- <a href="">Register</a> -->
                                    <button class="btna" type="submit">REGISTER</button>
                                </div>
                            </form>
                            <!-- Register Form End here -->
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection