@extends('layout.doctor')
@section('title')
 Appointments
@endsection
@section('dcontent')
    <appointments :appointments="{{ $appointments }}"></appointments>
@endsection
