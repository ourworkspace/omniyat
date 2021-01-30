<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login : : Omniyat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{asset('public/assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/theme.css')}}">
      <link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}">
      <link rel="shortcut icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
      <link rel="icon" href="{{asset('public/site/images/ic_fav.png')}}" type="image/x-icon"/>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one" style="background: #e0d8d8;">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <a class="navbar-brand omniyat_head_logo" href="{{url('/login')}}">
                    <img src="{{asset('public/assets/images/logo.png')}}">
                    {{--<h4>Omniyat</h4>--}}
                </a>
              <div class="auto-form-wrapper omniyat_body_login">
                  @include('layouts.alerts')
                <form action="{{route('loginAccess')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="label">Username</label>
                        <div class="input-group">
                        <input type="text" required="required" name="email" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <div class="input-group">
                        <input type="password" required="required" name="password" class="form-control" placeholder="*********">
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success submit-btn btn-block btn_black">Login</button>
                    </div>
                  <!-- <div class="form-group d-flex justify-content-between">
                    <a href="{{url('/register')}}" class="text-black text-small">Create new account</a>
                    <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                  </div> -->
                </form>
              </div>
                <!--<p class="footer-text text-center">copyright © {{date('Y')}} sitename. All rights reserved.</p>-->
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