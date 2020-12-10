<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <style>
.notifications {
	padding: 0;
}
.notifications .notification-time {
	font-size: 12px;
	line-height: 1.35;
	color: #bdbdbd;
}
.notifications .media {
	margin-top: 0;
	border-bottom: 1px solid #f5f5f5;
}
.notifications .media:last-child {
	border-bottom: none;
}
.notifications .media a {
	display: block;
	padding: 10px 15px;
	border-radius: 2px;
}
.notifications .media a:hover {
	background-color: #fafafa;
}
.notifications .media > .avatar {
	margin-right: 10px;
}
.notifications .media-list .media-left {
	padding-right: 8px;
}
.topnav-dropdown-header {
	border-bottom: 1px solid #eee;
	text-align: center;
}
.topnav-dropdown-header,
.topnav-dropdown-footer {
    font-size: 14px;
    height: 40px;
    line-height: 40px;
    padding-left: 15px;
    padding-right: 15px;
}
.topnav-dropdown-footer {
	border-top: 1px solid #eee;
}
.topnav-dropdown-footer a {
	display: block;
	text-align: center;
	color: #333;
}
.user-menu.nav > li > a .badge {
	background-color: #1b5a90;
    display: block;
    font-size: 10px;
    font-weight: bold;
    min-height: 15px;
    min-width: 15px;
    position: absolute;
    right: 3px;
    color: #fff;
    top: 6px;
}
.user-menu.nav > li > a > i {
	font-size: 1.5rem;
	line-height: 60px;
}
.noti-details {
	color: #000000;
    margin-bottom: 0;
    font-size: small;
}
.noti-title {
	color: #333;
}
.notifications .noti-content {
	height: 290px;
	width: 350px;
	overflow-y: auto;
	position: relative;
}
.notification-list {
	list-style: none;
	padding: 0;
	margin: 0;
}
.notifications ul.notification-list > li{
	margin-top: 0;
	border-bottom: 1px solid #f5f5f5;
}
.notifications ul.notification-list > li:last-child {
	border-bottom: none;
}
.notifications ul.notification-list > li a {
	display: block;
	padding: 10px 15px;
	border-radius: 2px;
}
.notifications ul.notification-list > li a:hover {
	background-color: #fafafa;
}
.notifications ul.notification-list > li .list-item {
    border: 0;
    padding: 0;
    position: relative;
}
.topnav-dropdown-header .notification-title {
    color: #333;
    display: block;
    float: left;
    font-size: 14px;
}
.topnav-dropdown-header .clear-noti {
    color: #f83f37;
    float: right;
    font-size: 12px;
    text-transform: uppercase;
}
.noti-time {
    margin: 0;
}
.dropdown-menu
{
    right:0;
    left: auto;
}
.user-menu.nav > li > a {
    color: black;
}
    </style>

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
            <ul class="nav header-navbar-rht nav user-menu">
                @auth
                @if (auth()->user()->role=='patient')
                <li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fas fa-bell"></i> <span class="badge badge-pill">{{auth()->user()->unreadnotifications->count()}}</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
                                @foreach (auth()->user()->notifications as $notification)
								<li class="notification-message">
									<a href="/doctor-profile/{{$notification->data['doctor_username']}}">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" src="{{asset($notification->data['doctor_image'])}}">
											</span>
											<div class="media-body">
												<p class="noti-details">{{$notification->data['content']}}</p>
												<p class="noti-time"><span class="notification-time">{{$notification->created_at->diffforhumans()}}</span></p>
											</div>
										</div>
									</a>
                                </li>
                                @endforeach
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div>
					</div>
				</li>
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{asset(auth()->user()->image)}}" width="31">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{asset(auth()->user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
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
                @endauth
                <li class="nav-item contact-item">
                    @guest
                    <li>
                      <a class="nav-link header-login" href="/login">login / Signup </a>
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
<script src="{{ mix('js/app.js') }}"></script>
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
