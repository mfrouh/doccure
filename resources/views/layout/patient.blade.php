@extends('layout.app')
@section('title')
   Patient
@endsection
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
				<div class="profile-sidebar">
					<div class="widget-profile pro-widget-content">
						<div class="profile-info-widget">
							<a href="#" class="booking-doc-img">
								<img src="{{asset(auth()->user()->image)}}" alt="User Image">
							</a>
							<div class="profile-det-info">
								<h3>{{auth()->user()->name}}</h3>
								<div class="patient-details">
									<h5><i class="fas fa-birthday-cake"></i>{{auth()->user()->date_of_birth}}</h5>
									<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{auth()->user()->patient->city}}, {{auth()->user()->patient->country}}</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="dashboard-widget">
						<nav class="dashboard-menu">
							<ul>
								<li>
									<a href="/patient/dashboard">
										<i class="fas fa-columns"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li>
									<a href="/patient/favourites">
										<i class="fas fa-bookmark"></i>
										<span>Favourites</span>
									</a>
                                </li>
                                <li>
									<a href="/patient/appointments">
										<i class="fas fa-calendar-check"></i>
										<span>Appointment</span>
									</a>
                                </li>
                                <li>
									<a href="/patient/surgeries">
										<i class="fas fa-bookmark"></i>
										<span>Surgeries</span>
									</a>
                                </li>
                                <li>
									<a href="/patient/prescriptions">
										<i class="fas fa-bookmark"></i>
										<span>Prescriptions</span>
									</a>
								</li>
								<li>
									<a href="/patient/setting">
										<i class="fas fa-user-cog"></i>
										<span>Profile Settings</span>
									</a>
								</li>
								<li>
									<a href="/patient/change-password">
										<i class="fas fa-lock"></i>
										<span>Change Password</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-lg-8 col-xl-9" id="app">
				@yield('pcontent')
			</div>
		</div>
	</div>
</div>
</div>
@endsection
