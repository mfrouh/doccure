@extends('layout.patient')
@section('pcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Patient Name</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Hospital Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surgeries as $surgery)
                    <tr>
                        <td>{{$surgery->name}}</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="{{asset($surgery->patient->user->image)}}" alt="User Image">
                                </a>
                                <a>{{$surgery->patient->user->name}}</a>
                            </h2>
                        </td>
                        <td>{{$surgery->day}}</td>
                        <td>{{$surgery->time}}</td>
                        <td>{{$surgery->hospital_name}}</td>
                        <td>{{$surgery->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
