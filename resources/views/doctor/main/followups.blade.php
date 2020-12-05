@extends('layout.doctor')
@section('dcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
            <followups :followups ="{{$followups}}"></followups>
        </div>
    </div>
</div>
@endsection
