@extends('layout.app')
@section('title')
    Speciality
@endsection
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
                    <form action="" method="get">
					<div class="card search-filter">
						<div class="card-header">
							<h4 class="card-title mb-0">Search Filter</h4>
						</div>
						<div class="card-body">
						<div class="filter-widget">
                            <h4>Name</h4>
                          <input type="text" class="form-control" name="name" value="">
						</div>
						<div class="filter-widget">
							<h4>Gender</h4>
							<div>
								<label class="custom_check">
									<input type="checkbox" name="gender[]" value="male" >
									<span class="checkmark"></span> Male Doctor
								</label>
							</div>
							<div>
								<label class="custom_check">
									<input type="checkbox" name="gender[]" value="female">
									<span class="checkmark"></span> Female Doctor
								</label>
							</div>
						</div>
							<div class="btn-search">
								<input type="submit" class="btn btn-block" value="Search"></button>
							</div>
						</div>
                    </div>
                   </form>
				</div>
				<div class="col-md-12 col-lg-8 col-xl-9">
                      @forelse ($clinics as $clinic)
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<a href="/doctor-profile/{{$clinic->doctor->user->username}}">
											<img src="{{asset($clinic->doctor->user->image)}}" class="img-fluid">
										</a>
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><a href="/doctor-profile/{{$clinic->doctor->user->username}}">{{$clinic->doctor->user->name}}</a></h4>
										<p class="doc-speciality">{{$clinic->doctor->speciality->name}}</p>
										<h5 class="doc-department"><img src="{{asset($clinic->doctor->speciality->image)}}" class="img-fluid" alt="Speciality">{{$clinic->doctor->speciality->name}}</h5>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">({{$clinic->reviews->count()}})</span>
										</div>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$clinic->city}}, {{$clinic->country}}</p>
											<ul class="clinic-gallery">
                                                @foreach ($clinic->gallery as $image)
												<li>
													<a href="{{asset($image->url)}}" data-fancybox="gallery">
														<img src="{{asset($image->url)}}" alt="Feature">
													</a>
                                                </li>
                                                @endforeach
											</ul>
										</div>
										<div class="clinic-services">
                                            @foreach ($clinic->doctor->services as $service)
                                            <span>{{$service->name}}</span>
                                            @endforeach
										</div>
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
        									<li><i class="far fa-comment"></i> {{$clinic->reviews->count()}}</li>
											<li><i class="fas fa-map-marker-alt"></i> {{$clinic->city}}, {{$clinic->country}}</li>
											<li><i class="far fa-money-bill-alt"></i> $ {{$clinic->price}}</li>
										</ul>
									</div>
									<div class="clinic-booking">
										<a class="view-pro-btn" href="/doctor-profile/{{$clinic->doctor->user->username}}">View Profile</a>
										<a class="apt-btn" href="/patient/booking/{{$clinic->doctor->user->username}}">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
                      </div>
                      @empty
                      <div class="card">
                          <div class="card-body text-center">
                            Not Found Doctors
                          </div>
                      </div>

                      @endforelse
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection
