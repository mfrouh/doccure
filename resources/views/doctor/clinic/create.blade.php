@extends('layout.doctor')
@section('title')
 Clinic
@endsection
@section('dcontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Clinic Info</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <form action="/doctor/clinic/create" method="post">
                    @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address </label>
                        <input type="text" class="form-control" name="address"  >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">City</label>
                        <input type="text" class="form-control" name="city"  >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">State</label>
                        <input type="text" class="form-control" name="state"  >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Open</label>
                        <input type="time" class="form-control" name="open" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Close</label>
                        <input type="time" class="form-control" name="close" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Appointment Time</label>
                        <select class="form-control select"  name="time_appointment">
                            <option value="15" >15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            <option value="60">60</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Days Work</label>
                        <select class="form-control select" multiple name="days_work[]">
                            @for ($i = 0; $i < 7; $i++)
                            <option value="{{Carbon\Carbon::now()->addday($i)->format('D')}}">{{Carbon\Carbon::now()->addday($i)->format('D')}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Days Work</label>
                        <select class="form-control select"  name="type_booking">
                            <option value="7" >7</option>
                            <option value="14">14</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>

                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
