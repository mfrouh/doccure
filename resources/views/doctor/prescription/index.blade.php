@extends('layout.doctor')
@section('dcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
            <prescriptions :prescriptions="{{auth()->user()->doctor->clinic->prescriptions}}"></prescriptions>
        </div>
    </div>
</div>
@endsection
