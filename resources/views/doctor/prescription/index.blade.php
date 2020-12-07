@extends('layout.doctor')
@section('title')
 Precriptions
@endsection
@section('dcontent')
     <prescriptions :prescriptions="{{auth()->user()->doctor->clinic->prescriptions}}"></prescriptions>
@endsection
