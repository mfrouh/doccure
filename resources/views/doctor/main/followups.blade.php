@extends('layout.doctor')
@section('title')
 Follow Ups
@endsection
@section('dcontent')
    <followups :followups ="{{$followups}}"></followups>
@endsection
