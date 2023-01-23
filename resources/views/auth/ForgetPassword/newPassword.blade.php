@extends('Public.index')
@section('newPassword')

<div class="container">
<div id="notification" style="display: none;">
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
                                        <div class="dismiss alert alert-success" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Success!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
                                        <!-- error -->
            @if ($message = Session::get('error'))
                                        <div class="dismiss alert alert-danger" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>!</strong>
                                            {{$message}}
                                        </div>
                                        @endif
          </div>
          </div>
<section class="h-100" style="background-color: #eee;">
  <div class="container-fluid h-100 py-5">
    <div class="row">
      <div class="container col-lg-6">                 
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Enter New Password</h3>
        </div>
        <form action="/genratePassword">
            @csrf
        <div class="col-lg-12">
            <input type="hidden" name='OTP' value='{{$OTP}}'>
            <div class="form-group">
                <label for="password" class='form-group'>New Password</label>
                <input type="password" name='password' id='password' class='form-control' required>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class='form-group'>Confirm Password</label>
                <input type="password" name='password_confirmation' id='password_confirmation' class='form-control' required>
            </div>
            <div class="form-btn">
                <!-- <a href="">LOGIN</a> -->
                <button class="btna" type="submit">SUBMIT PASSWORD</button>
            </div>
         </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection