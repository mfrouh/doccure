@extends('layout.doctor')
@section('dcontent')
<div class="card">
  <div class="card-header">Appointment</div>
  <div class="card-body">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset($appointment->patient->user->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{$appointment->patient->user->name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <label for="">Diagnose</label>
    <textarea class="form-control"  readonly rows="4">{{$appointment->diagnose}}</textarea>
          {{--  <appointment :appointment ="{{ $appointment }}"></appointment>  --}}
  </div>
</div>
<div class="card">
  <div class="card-header">FollowUp</div>
  <div class="card-body">
      <table class="datatable table text-center table-hover table-center mb-0">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Appt Date</th>
                <th class="text-center">Paid Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointment->followups as $followup)
            <tr>
                <td>
                    <h2 class="table-avatar float-left">
                        <a href="patient-profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($followup->patient->user->image)}}"></a>
                        <a href="patient-profile">{{$followup->patient->user->name}}</a>
                    </h2>
                </td>
                <td>{{$followup->day}}<span class="d-block text-info">{{$followup->time}}</span></td>
                <td class="text-center"> {{$followup->price}}</td>
                <td class="text-right">
                    <div class="table-action">
                        <a href="/doctor/appointment/{{$followup->appointment->id}}" class="btn btn-sm bg-info-light">
                            <i class="far fa-eye"></i> View appointment
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
<div class="card">
  <div class="card-header">Prescription</div>
  <div class="card-body text-center" >
    @if ($appointment->prescription)
    <table class="table table-hover table-center  mb-0">
        <thead>
            <tr>
                <th>Date </th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$appointment->prescription->created_at->format('d')}}</td>
                <td>
                    <h2 class="table-avatar">
                        <a href="#" class="avatar avatar-sm mr-2">
                            <img class="avatar-img rounded-circle" src="{{asset($appointment->prescription->patient->user->image)}}" alt="User Image">
                        </a>
                        <a>{{$appointment->prescription->patient->user->name}}</a>
                    </h2>
                </td>
                <td class="text-right">
                    <div class="table-action">
                        <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                            <i class="far fa-eye"></i> View
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    @else
      <h1 >Not Found</h1>
    @endif
  </div>
</div>
<div class="card">
  <div class="card-header">Surgeries</div>
  <div class="card-body text-center">
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
            @foreach ($appointment->surgeries as $surgery)
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
                <td class="text-right">
                    <div class="table-action">
                        <a class="float-right"href="/doctor/surgery/{{$surgery->id}}"
                            onclick="event.preventDefault();
                                          document.getElementById('delete-surgery-{{$surgery->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <form id="delete-surgery-{{$surgery->id}}" action="/doctor/surgery/{{$surgery->id}}" method="POST" >
                             @csrf
                             @method('Delete')
                           </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
