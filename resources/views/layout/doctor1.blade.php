@extends('layout.app')
@section('title')
   Doctor
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
									<h5 class="mb-0">{{auth()->user()->doctor?auth()->user()->doctor->speciality->name:''}}</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="dashboard-widget">
						<nav class="dashboard-menu">
							<ul>
								<li>
									<a href="/doctor/dashboard">
										<i class="fas fa-columns"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li>
									<a href="/doctor/appointments">
										<i class="fas fa-calendar-check"></i>
										<span>Appointments</span>
									</a>
                                </li>
                                <li>
									<a href="/doctor/prescriptions">
										<i class="fas fa-calendar-check"></i>
										<span>Prescriptions</span>
									</a>
                                </li>
                                <li>
									<a href="/doctor/surgery">
										<i class="fas fa-calendar-check"></i>
										<span>Surgeries</span>
									</a>
                                </li>
                                <li>
									<a href="/doctor/followups">
										<i class="fas fa-calendar-check"></i>
										<span>FollowUps</span>
									</a>
								</li>
								<li>
									<a href="/doctor/my-patients">
										<i class="fas fa-user-injured"></i>
										<span>My Patients</span>
									</a>
								</li>
								<li>
									<a href="/doctor/reviews">
										<i class="fas fa-star"></i>
										<span>Reviews</span>
									</a>
								</li>
								<li>
									<a href="/doctor/setting">
										<i class="fas fa-user-cog"></i>
										<span>Profile Settings</span>
									</a>
								</li>
								<li>
									<a href="/doctor/social-media">
										<i class="fas fa-share-alt"></i>
										<span>Social Media</span>
									</a>
								</li>
								<li>
									<a href="/doctor/change-password">
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
                @yield('dcontent')
			</div>
		</div>
	</div>
</div>
</div>
@endsection
