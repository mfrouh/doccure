@extends('layout.app')
@section('content')
			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, clinic </p>
						</div>

						<!-- Search -->
						<div class="search-box">
							<form action="search" method="GET" >
								<div class="form-group search-location">
									<input type="text" class="form-control" placeholder="Search Location">
								</div>
								<div class="form-group search-info">
									<input type="text" class="form-control" placeholder="Search Clinic" name="name">
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->

					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2> Specialities</h2>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<div class="specialities-slider slider">
                                 @foreach ($specialities as $speciality)
                                <a href="/speciality/{{$speciality->name}}">
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{asset($speciality->image)}}"  class="img-fluid"style="height: inherit;border-radius: inherit;width: fit-content;">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>{{$speciality->name}}</p>
                                </div>
                                </a>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Clinic and Specialities -->

			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book Our Doctor</h2>
							</div>
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>
								<a href="/clinics">Read More..</a>
							</div>
						</div>
                            <div class="col-lg-8">
							 <div class="doctor-slider slider">
                                @foreach ($clinics as $clinic)
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="/doctor-profile/{{$clinic->doctor->user->username}}">
											<img class="img-fluid" style="height:150px;" alt="User Image" src="{{asset($clinic->doctor->user->image)}}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="/doctor-profile/{{$clinic->doctor->user->username}}">{{$clinic->doctor->user->name}}</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{$clinic->doctor->speciality->name}}</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">({{$clinic->reviews->count()}})</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> {{$clinic->city}}, {{$clinic->country}}
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $ {{$clinic->price}}
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="/doctor-profile/{{$clinic->doctor->user->username}}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="/patient/booking/{{$clinic->doctor->user->username}}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
                                @endforeach
                             </div>
                            </div>
				   </div>
				</div>
			</section>
	   </div>
	   <!-- /Main Wrapper -->
	   @endsection
