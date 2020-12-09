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
                <div class="form-group">
                    <dropzone></dropzone>
                    <label>Clinic Images</label>
                    <form action="/doctor/clinic/gallery" class="dropzone">
                      @csrf
                    </form>
                </div>
                <div class="row upload-wrap">
                    @foreach (auth()->user()->doctor->clinic->gallery as $image)
                    <div class="col-2 upload-images">
                        <img data-dz-thumbnail class="dz-preview dz-processing dz-image-preview dz-success dz-complete" src="{{asset($image->url)}}" >
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                    </div>
                    @endforeach
                </div>
                <form action="/doctor/clinic" method="post">
                    @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address </label>
                        <input type="text" class="form-control" name="address"  value="{{auth()->user()->doctor->clinic->address}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">City</label>
                        <input type="text" class="form-control" name="city"  value="{{auth()->user()->doctor->clinic->city}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">State</label>
                        <input type="text" class="form-control" name="state"  value="{{auth()->user()->doctor->clinic->state}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <input type="text" class="form-control" name="country" value="{{auth()->user()->doctor->clinic->country}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Open</label>
                        <input type="time" class="form-control" name="open"  value="{{auth()->user()->doctor->clinic->open}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Close</label>
                        <input type="time" class="form-control" name="close" value="{{auth()->user()->doctor->clinic->close}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Appointment Time</label>
                        <select class="form-control select"  name="time_appointment">
                            <option value="15"{{auth()->user()->doctor->clinic->time_appointment=='15'?'selected':''}}>15</option>
                            <option value="30"{{auth()->user()->doctor->clinic->time_appointment=='30'?'selected':''}}>30</option>
                            <option value="45"{{auth()->user()->doctor->clinic->time_appointment=='45'?'selected':''}}>45</option>
                            <option value="60"{{auth()->user()->doctor->clinic->time_appointment=='60'?'selected':''}}>60</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{auth()->user()->doctor->clinic->price}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Days Work</label>
                        <select class="form-control select" multiple name="days_work[]">
                            @for ($i = 0; $i < 7; $i++)
                            <option value="{{Carbon\Carbon::now()->addday($i)->format('D')}}" {{in_array(Carbon\Carbon::now()->addday($i)->format('D'),json_decode(auth()->user()->doctor->clinic->days_work))?'selected':''}}>{{Carbon\Carbon::now()->addday($i)->format('D')}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Days Work</label>
                        <select class="form-control select"  name="type_booking">
                            <option value="7"  {{auth()->user()->doctor->clinic->type_booking=='7'?'selected':''}}>7</option>
                            <option value="14" {{auth()->user()->doctor->clinic->type_booking=='14'?'selected':''}}>14</option>
                            <option value="30" {{auth()->user()->doctor->clinic->type_booking=='30'?'selected':''}}>30</option>
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
