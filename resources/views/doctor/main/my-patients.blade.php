@extends('layout.doctor')
@section('dcontent')
<div class="row row-grid">
    @foreach ($patients as $patient)
     <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="card widget-profile pat-widget-profile">
            <div class="card-body">
                <div class="pro-widget-content">
                    <div class="profile-info-widget">
                        <a href="patient-profile" class="booking-doc-img">
                            <img src="{{asset($patient->user->image)}}">
                        </a>
                        <div class="profile-det-info">
                            <h3><a href="patient-profile">{{$patient->user->name}}</a></h3>

                            <div class="patient-details">
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$patient->country}}, {{$patient->city}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="patient-info">
                    <ul>
                        <li>Phone <span>{{$patient->user->phone_number}}</span></li>
                        <li>Age <span>{{$patient->user->date_of_birth}} , {{$patient->user->gender}} </span></li>
                        <li>Blood Group <span>{{$patient->blood_group}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
     </div>
    @endforeach
</div>
@endsection
