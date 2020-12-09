@extends('layout.doctor')
@section('title')
Patient - {{$patient->user->name}}
@endsection
@section('dcontent')
<div class="card">
  <div class="card-header text-center">Patient   {{$patient->user->name}}</div>
  <div class="card-body">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="/doctor/patient-profile/{{$patient->user->username}}" class="booking-doc-img">
                    <img src="{{asset($patient->user->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{$patient->user->name}}</h3>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="card-body">
      <div class="row text-center">
          <div class="col-md-4 shadow-sm p-2">
              {{$patient->user->date_of_birth}}
          </div>
          <div class="col-md-4 shadow-sm p-2">
              {{$patient->user->phone_number}}
          </div>
          <div class="col-md-4 shadow-sm p-2">
              {{$patient->blood_group}}
          </div>
      </div>
  </div>
</div>
<h3>Appointment</h3>
<appointments :appointments="{{ $appointments }}" :patient="{{$patient->id}}"></appointments>
<h3>Follow Ups</h3>
<followups :followups="{{ $followups }}" :patient="{{$patient->id}}"></followups>
<h3>Surgeries</h3>
<surgeries :surgeries="{{ $surgeries }}" :patient="{{$patient->id}}"></surgeries>
<h3>Prescriptions</h3>
<prescriptions :prescriptions="{{ $prescriptions }}" :patient="{{$patient->id}}"></prescriptions>

@endsection
