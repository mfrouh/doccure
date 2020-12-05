@extends('layout.doctor')
@section('dcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
            <surgeries :surgeries ="{{auth()->user()->doctor->clinic->surgeries}}"></surgeries>
        </div>
    </div>
</div>
@endsection
