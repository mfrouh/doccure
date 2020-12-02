@extends('layout.doctor')
@section('dcontent')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="datatable table text-center table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Appt Date</th>
                        <th>Booking Date</th>
                        <th>State</th>
                        <th class="text-center">Paid Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>
                            <h2 class="table-avatar float-left">
                                <a href="patient-profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($appointment->patient->user->image)}}"></a>
                                <a href="patient-profile">{{$appointment->patient->user->name}}</a>
                            </h2>
                        </td>
                        <td>{{$appointment->day}}<span class="d-block text-info">{{$appointment->time}}</span></td>
                        <td>{{$appointment->booking_day}}<span class="d-block text-info">{{$appointment->booking_time}}</span></td>
                        <td>{{$appointment->state}}</td>
                        <td class="text-center"> {{$appointment->price}}</td>
                        <td class="text-right">
                            <div class="table-action">
                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                    <i class="far fa-eye"></i> View
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                    <i class="fas fa-check"></i> Accept
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
