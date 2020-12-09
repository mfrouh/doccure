@extends('layout.app')
@section('title')
    {{$doctor->user->name}}
@endsection
@section('content')
<div class="content" id="app">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{asset($doctor->user->image)}}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{$doctor->user->name}}</h4>
                                        <p class="doc-speciality">{{$doctor->speciality->name}}</p>
										<p class="doc-department"><img src="{{asset($doctor->speciality->image)}}" class="img-fluid" alt="Speciality">{{$doctor->speciality->name}}</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">({{$doctor->clinic->reviews->count()}})</span>
										</div>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->clinic->country}}, {{$doctor->clinic->city}} - <a href="javascript:void(0);">Get Directions</a></p>
											<ul class="clinic-gallery">
                                                 @foreach ($doctor->clinic->gallery as $image)
												<li>
													<a href="{{asset($image->url)}}" data-fancybox="gallery">
                                                      <img src="{{asset($image->url)}}" alt="Feature">
													</a>
                                                </li>
                                                @endforeach
											</ul>
										</div>
										<div class="clinic-services">
                                            @foreach ($doctor->services as $service)
											<span>{{$service->name}}</span>
                                            @endforeach
										</div>
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-comment"></i> {{$doctor->clinic->reviews->count()}}</li>
											<li><i class="fas fa-map-marker-alt"></i> {{$doctor->clinic->city}}, {{$doctor->clinic->country}}</li>
											<li><i class="far fa-money-bill-alt"></i> {{$doctor->clinic->price}} </li>
										</ul>
									</div>
									<div class="doctor-action">
                                        <favourite :clinic="{{$doctor->clinic->id}}"></favourite>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="/patient/booking/{{$doctor->user->username}}">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->

					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">

							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->

							<!-- Tab Content -->
							<div class="tab-content pt-0">

								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">

											<!-- About Details -->
											<div class="widget about-widget">
                                                <h4 class="widget-title">About Me</h4>
                                                <p>{{$doctor->abouteme}}</p>
											</div>
											<!-- /About Details -->

											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach ($doctor->educations as $education)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{$education->college}}</a>
																	<div>{{$education->degree}}</div>
																	<span class="time">{{$education->from}} - {{$education->to}}</span>
																</div>
															</div>
                                                        </li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Education Details -->

											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach ($doctor->experiences as $experience)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{$experience->hospital_name}}</a>
																	<span class="time">{{$experience->from}} -{{ $experience->to}}</span>
																</div>
															</div>
                                                        </li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->

											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
                                                    @foreach ($doctor->services as $service)
                                                    <li>{{$service->name}} </li>
                                                    @endforeach
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- /Overview Content -->



								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">

									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">
                                            @foreach ($doctor->clinic->reviews as $review)
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar rounded-circle" alt="User Image" src="{{asset($review->patient->user->image)}}">
                                                    <div class="comment-body" style="width: 100%;">
                                                        <div class="meta-data">
                                                            <span class="comment-author">{{$review->patient->user->name}}</span>
                                                            <span class="comment-date">{{$review->created_at->diffforHumans()}}</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                           {{$review->review}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
									</div>
									<!-- /Review Listing -->

                                    <!-- Write Review -->
                                    @auth
									<div class="write-review">
										<h4>Write a review for <strong>{{$doctor->user->name}}</strong></h4>
                                        <review :clinic={{$doctor->clinic->id}}></review>
                                    </div>
                                    @endauth

									<!-- /Write Review -->

								</div>
								<!-- /Reviews Content -->

								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">

											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
                                                        @foreach (json_decode($doctor->clinic->days_work) as $item)
														<div class="listing-day">
															<div class="day">{{$item}}</div>
															<div class="time-items">
																<span class="time">{{$doctor->clinic->open}} - {{$doctor->clinic->close}}</span>
															</div>
                                                        </div>
                                                        @endforeach
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->

										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->

							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
</div>
@endsection
