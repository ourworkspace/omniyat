<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo omniyat_head_logo" href="{{url('/login')}}">
            <img src="{{asset('public/logo-omniyat-white.svg')}}" alt="logo" />
            {{--<h4>Omniyat</h4>--}}
        </a>
        <a class="navbar-brand brand-logo-mini omniyat_head_logo" href="{{url('/login')}}">
            <img src="{{asset('public/logo-omniyat-white.svg')}}" alt="logo" />
            {{--<h4>Omniyat</h4>--}}
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
  
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img class="img-xs rounded-circle" src="{{asset('public/assets/images/faces/face8.jpg')}}" alt="Profile image"> &nbsp; --> {{Auth::User()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <p class="mb-1 mt-3 font-weight-semibold">{{Auth::User()->name}}</p>
                        <p class="font-weight-light text-muted mb-0">{{Auth::User()->email}}</p>
                    </div>
                    <a href="{{route('profile')}}" class="dropdown-item">My Profile <i class="dropdown-item-icon ti-dashboard"></i></a>
                    <a href="{{url('logout')}}" class="dropdown-item">Sign Out <i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
    </div>
    </nav>