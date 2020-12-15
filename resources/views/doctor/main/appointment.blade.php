@extends('layout.doctor')
@section('title')
Appointment
@endsection
@section('dcontent')
<appointment :appointment ="{{ $appointment }}"></appointment>
<h3>Follow Ups</h3>
<followups :appointment ="{{ $appointment->id }}"  :patient="{{$appointment->patient->id}}"></followups>
<h3>Surgeries</h3>
<surgeries :appointment ="{{ $appointment->id }}"  :patient="{{$appointment->patient->id}}"></surgeries>
<h3>Prescriptions</h3>
<prescriptions :appointment ="{{ $appointment->id }}"  :patient="{{$appointment->patient->id}}"></prescriptions>
@endsection
