@extends('layout.doctor')
@section('dcontent')
     <surgeries :surgeries ="{{auth()->user()->doctor->clinic->surgeries}}"></surgeries>
@endsection
