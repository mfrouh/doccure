@extends('layout.doctor')
@section('title')
 Surgeries
@endsection
@section('dcontent')
     <surgeries :surgeries ="{{auth()->user()->doctor->clinic->surgeries}}"></surgeries>
@endsection
