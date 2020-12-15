<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_admin/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/font-awesome.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/morris/morris.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/select2.min.css')}}">
        <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap-datetimepicker.min.css')}}">
    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/fullcalendar/fullcalendar.min.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
    <style>
 .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #21202047;
}
    </style>
</head>
<body>
    <div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="/" class="logo">
					<img src="{{asset('assets_admin/img/logo.png')}}" alt="Logo">
				</a>
				<a href="/" class="logo logo-small">
					<img src="{{asset('assets_admin/img/logo-small.png')}}" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">{{auth()->user()->unreadnotifications->count()}}</span>
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
									<a href="/doctor/appointment/{{$notification->data['appointment_id']}}">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" src="{{asset($notification->data['patient_image'])}}">
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
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="{{asset(auth()->user()->image)}}" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="{{asset(auth()->user()->image)}}" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>{{auth()->user()->name}}</h6>
								<p class="text-muted mb-0">Doctor</p>
							</div>
						</div>
						<a class="dropdown-item" href="/doctor/dashboard">Dashboard</a>
						<a class="dropdown-item" href="/doctor/setting">Settings</a>
                        <a class="dropdown-item"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                       </form>
					</div>
				</li>
			</ul>
        </div>

    <!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="/doctor/dashboard">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/appointments">
                        <i class="fe fe-layout"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/prescriptions">
                        <i class="fe fe-layout"></i>
                        <span>Prescriptions</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/surgery">
                        <i class="fe fe-layout"></i>
                        <span>Surgeries</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/followups">
                        <i class="fe fe-layout"></i>
                        <span>FollowUps</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/my-patients">
                        <i class="fe fe-user"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/reviews">
                        <i class="fe fe-user-plus"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/setting">
                        <i class="fe fe-user-plus"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/social-media">
                        <i class="fe fe-user-plus"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/change-password">
                        <i class="fe fe-user-plus"></i>
                        <span>Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="content container-fluid" id="app">
  @yield('dcontent')
  @extends('layout.message')
    </div>
</div>

</div>
</body>
<!-- jQuery -->
<script src="{{ mix('js/app.js') }}"></script>

<script src="{{asset('assets_admin/js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{asset('assets_admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets_admin/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{asset('assets_admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
{{-- @if(Route::is(['page'])) --}}
<script src="{{asset('assets_admin/plugins/raphael/raphael.min.js')}}"></script>
{{--  <script src="{{asset('assets_admin/plugins/morris/morris.min.js"')}}"></script>  --}}
{{--  <script src="{{asset('assets_admin/js/chart.morris.js')}}"></script>  --}}
<script src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>

{{-- @endif --}}
<!-- Form Validation JS -->
<script src="{{asset('assets_admin/js/form-validation.js')}}"></script>
<!-- Mask JS -->
<script src="{{asset('assets_admin/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets_admin/js/mask.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('assets_admin/js/select2.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{asset('assets_admin/js/moment.min.js')}}"></script>
<script src="{{asset('assets_admin/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Full Calendar JS -->
<script src="{{asset('assets_admin/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>
<!-- Datatables JS -->
<script src="{{asset('assets_admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/datatables/datatables.min.js')}}"></script>
<!-- Custom JS -->
<script  src="{{asset('assets_admin/js/script.js')}}"></script>
</html>
