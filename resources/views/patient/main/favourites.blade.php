@extends('layout.patient')
@section('pcontent')
<div class="row row-grid">
    @forelse ($doctors as $doctor)
    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="doc-img">
                <a href="doctor-profile">
                    <img class="img-fluid"  src="{{asset($doctor->user->image)}}">
                </a>
                <favourite :clinic="{{$doctor->clinic->id}}"></favourite>
            </div>
            <div class="pro-content">
                <h3 class="title">
                    <a href="/doctor-profile/{{$doctor->user->username}}">{{$doctor->user->name}}</a>
                    <i class="fas fa-check-circle verified"></i>
                </h3>
                <p class="speciality">{{$doctor->speciality->name}}</p>
                <div class="rating">
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star "></i>
                    <i class="fas fa-star "></i>
                    <span class="d-inline-block average-rating">({{$doctor->clinic->reviews->count()}})</span>
                </div>
                <ul class="available-info">
                    <li>
                        <i class="fas fa-map-marker-alt"></i> {{$doctor->clinic->country}}, {{$doctor->clinic->city}}
                    </li>
                    <li>
                        <i class="far fa-clock"></i> {{$doctor->clinic->time_appointment}} Min
                    </li>
                    <li>
                        <i class="far fa-money-bill-alt"></i>{{$doctor->clinic->price}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                    </li>
                </ul>
                <div class="row row-sm">
                    <div class="col-6">
                        <a href="/doctor-profile/{{$doctor->user->username}}" class="btn view-btn">View Profile</a>
                    </div>
                    <div class="col-6">
                        <a href="/booking/{{$doctor->user->username}}" class="btn book-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card ">
          <div class="card-body text-center">
            Not Found Doctors
          </div>
        </div>
    </div>

    @endforelse
</div>
@endsection
