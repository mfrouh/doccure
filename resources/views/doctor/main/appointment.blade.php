@extends('layout.doctor')
@section('title')
Appointment
@endsection
@section('dcontent')
<div class="card">
  <div class="card-header">Appointment</div>
  <div class="card-header">
    <appointment :appointment ="{{ $appointment }}"></appointment>
  </div>
  <div class="card-body">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="/doctor/patient-profile/{{$appointment->patient->user->username}}" class="booking-doc-img">
                    <img src="{{asset($appointment->patient->user->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{$appointment->patient->user->name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <label for="">Diagnose</label>
    <textarea class="form-control"  readonly rows="4">{{$appointment->diagnose}}</textarea>
  </div>
</div>
<h3>Follow Ups</h3>
<followups :followups="{{ $appointment->followups }}" :patient="{{$appointment->patient->id}}"></followups>
<h3>Surgeries</h3>
<surgeries :surgeries="{{ $surgeries }}" :patient="{{$appointment->patient->id}}"></surgeries>
<h3>Prescriptions</h3>
<prescriptions :prescriptions="{{ $prescriptions }}" :patient="{{$appointment->patient->id}}"></prescriptions>
@endsection
