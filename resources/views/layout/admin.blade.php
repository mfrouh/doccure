<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
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
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
</head>
<body>
    <div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index_admin" class="logo">
					<img src="{{asset('assets_admin/img/logo.png')}}" alt="Logo">
				</a>
				<a href="index_admin" class="logo logo-small">
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
						<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets_admin/img/doctors/doctor-thumb-01.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets_admin/img/patients/patient1')}}'">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets_admin/img/patients/patient2.jpg')}}">
											</span>
											<div class="media-body">
											<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
											<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('assets_admin/img/patients/patient3.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div>
					</div>
				</li>
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="{{asset('assets_admin/img/profiles/avatar-01.jpg')}}" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="{{asset('assets_admin/img/profiles/avatar-01.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>Ryan Taylor</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile">My Profile</a>
						<a class="dropdown-item" href="settings">Settings</a>
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
                <li class="">
                    <a href="/admin/dashboard"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="">
                    <a href="/admin/appointments"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li  class="">
                    <a href="/admin/speciality"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li  class="">
                    <a href="/admin/doctors"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li  class="">
                    <a href="/admin/patients"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
  @yield('content')
  @extends('layout.message')

</div>
</body>
<!-- jQuery -->
<script src="{{asset('assets_admin/js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{asset('assets_admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets_admin/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{asset('assets_admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
{{-- @if(Route::is(['page'])) --}}
<script src="{{asset('assets_admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/morris/morris.min.js"')}}'></script>
<script src="{{asset('assets_admin/js/chart.morris.js')}}"></script>
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
