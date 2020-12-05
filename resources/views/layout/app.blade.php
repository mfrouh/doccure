<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body >
    <div id="loader">
        <div class="loader">
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="main-wrapper" >
        <header class="header">
          <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="/" class="navbar-brand logo">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="/" class="menu-logo">
                        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <ul class="nav header-navbar-rht">
                @auth
                @if (auth()->user()->role=='patient')
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{asset(auth()->user()->image)}}" width="31" alt="Ryan Taylor">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{auth()->user()->image}}" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{auth()->user()->name}}</h6>
                                <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="/patient/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="/patient/setting">Profile Settings</a>
                        <a class="dropdown-item"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                       </form>
                    </div>
                </li>
                @endif
                @if (auth()->user()->role=='doctor')
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{asset(auth()->user()->image)}}" width="31" alt="Darren Elder">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{asset(auth()->user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{auth()->user()->name}}</h6>
                                <p class="text-muted mb-0">Doctor</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="/doctor/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="/doctor/setting">Profile Settings</a>
                        <a class="dropdown-item"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                       </form>
                    </div>
                </li>
                @endif
                @endauth
                <li class="nav-item contact-item">
                    @guest
                    <li class="nav-item">
                      <a class="nav-link header-login" href="login">login / Signup </a>
                    </li>
                    @endguest
                </li>
            </ul>
          </nav>
        </header>
    </div>
    @yield('content')
    @extends('layout.message')
</body>
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Full Calendar JS -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Fancybox JS -->
<script src="{{asset('assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- Dropzone JS -->
<script src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
<!-- Bootstrap Tagsinput JS -->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<!-- Profile Settings JS -->
<script src="{{asset('assets/js/profile-settings.js')}}"></script>
<!-- Circle Progress JS -->
<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets_admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/datatables/datatables.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/script.js')}}"></script>
{{--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
<script src="{{asset('assets/js/map.js')}}"></script>  --}}

</html>
