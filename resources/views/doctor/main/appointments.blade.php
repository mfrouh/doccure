@extends('layout.doctor')
@section('dcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <appointments :appointments="{{ $appointments }}"></appointments>
    </div>
</div>
@endsection
