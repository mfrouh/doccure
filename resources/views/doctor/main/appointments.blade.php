@extends('layout.doctor')
@section('dcontent')
    <appointments :appointments="{{ $appointments }}"></appointments>
@endsection
