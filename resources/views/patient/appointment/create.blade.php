@extends('layout.patient')
@section('pcontent')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="booking-doc-info">
                    <a href="/doctor-profile/{{$doctor->user->username}}" class="booking-doc-img">
                        <img src="{{asset($doctor->user->image)}}" alt="User Image">
                    </a>
                    <div class="booking-info">
                        <h4><a href="doctor-profile">{{$doctor->user->name}}</a></h4>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating">{{$doctor->clinic->reviews->count()}}</span>
                        </div>
                        <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$doctor->clinic->city}}, {{$doctor->clinic->country}}</p>
                    </div>
                </div>
            </div>
        </div>
        <booking :clinic="{{$doctor->clinic->id}}" doctor="{{$doctor->user->name}}"></booking>
    </div>
</div>
@endsection
