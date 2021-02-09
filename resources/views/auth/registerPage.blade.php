<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register : : Omniyat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{asset('public/assets/css/demo/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/shared/style.css')}}">
    <link rel="shortcut icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
    <link rel="icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one" style="background: #e0d8d8;">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <center>
                    <a class="navbar-brand omniyat_head_logo" href="{{url('/login')}}">
                        <img src="{{asset('public/assets/images/logo.png')}}">
                        {{--<h4>Omniyat</h4>--}}
                    </a>
                </center>
              <div class="auto-form-wrapper omniyat_body_login">
                @include('layouts.alerts')
                <form action="{{route('registerAccount')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" required="required" name="name" placeholder="Name">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                        @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif 
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" required="required" name="email" placeholder="email">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                        @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif 
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" required="required" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                        @if($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary submit-btn btn-block" type="submit">Register</button>
                    </div>
                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Already have and account ?</span>
                        <a href="{{url('/login')}}" class="text-black text-small">Login</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('public/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('public/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('public/assets/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('public/assets/js/shared/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>