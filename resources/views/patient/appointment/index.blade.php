@extends('layout.patient')
@section('pcontent')
<div class="card card-table mb-0">
    <div class="card-body ">
        <div class="table-responsive">
            <table class="datatable table  table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Appt Date</th>
                        <th>Booking Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $k=> $appointment)
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="/doctor-profile/{{$appointment->clinic->doctor->user->username}}" class="avatar avatar-sm mr-2 float-left">
                                    <img class="avatar-img rounded-circle" src="{{asset($appointment->clinic->doctor->user->image)}}" alt="User Image">
                                </a>
                                <a href="/doctor-profile/{{$appointment->clinic->doctor->user->username}}">{{$appointment->clinic->doctor->user->name}} <span>{{$appointment->clinic->doctor->speciality->name}}</span></a>
                            </h2>
                        </td>
                        <td>{{$appointment->day}} <span class="d-block text-info">{{$appointment->time}}</span></td>
                        <td>{{$appointment->booking_day}} <span class="d-block text-info">{{$appointment->booking_time}}</span></td>
                        <td>{{$appointment->price}}</td>
                        <td><span class="badge badge-pill bg-warning-light">{{$appointment->state}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
