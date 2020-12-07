@extends('layout.doctor')
@section('dcontent')
     <prescriptions :prescriptions="{{auth()->user()->doctor->clinic->prescriptions}}"></prescriptions>
@endsection
