@extends('layout.patient')
@section('title')
 Appointment
@endsection
@section('pcontent')
<div class="card">
  <div class="card-header">Appointment</div>
  <div class="card-body">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="/doctor-profile/{{$appointment->clinic->doctor->user->username}}" class="booking-doc-img">
                    <img src="{{asset($appointment->clinic->doctor->user->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{$appointment->clinic->doctor->user->name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <label for="">Diagnose</label>
    <textarea class="form-control"  readonly rows="4">{{$appointment->diagnose}}</textarea>
  </div>
</div>
@endsection
