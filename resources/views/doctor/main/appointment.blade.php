@extends('layout.doctor')
@section('dcontent')
<div class="card">
  <div class="card-header">Appointment</div>
  <div class="card-body">
      <div class="row">
          <div class="col-md-6">
            <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($appointment->patient->user->image)}}"></a>
            <a>{{$appointment->patient->user->name}}</a>
          </div>
          <div class="col-md-6">
            <label for="">Attend</label>
            <input type="checkbox" name="attend" >
          </div>
          <div class="col-md-12">
            <label for="">Case Have</label>
            <textarea class="form-control" rows="4"></textarea>
          </div>
      </div>
  </div>
</div>
<div class="card">
  <div class="card-header">FollowUp</div>
  <div class="card-body">
  </div>
</div>
<div class="card">
  <div class="card-header">Prescription</div>
  <div class="card-body">
  </div>
</div>
<div class="card">
  <div class="card-header">Surgeries</div>
  <div class="card-body">
  </div>
</div>
@endsection
