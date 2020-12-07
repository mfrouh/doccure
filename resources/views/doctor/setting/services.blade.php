@extends('layout.doctor')
@section('title')
 services
@endsection
@section('dcontent')
<div class="card services-card">
    <div class="card-body">
        <h4 class="card-title">Services</h4>
        <form action="/doctor/setting/services" method="post">
            @csrf
        <div class="form-group">
            <label>Services</label>
            <input type="text" class="form-control" placeholder="Enter Services" name="service"  >
        </div>
        <div class="col-md-12 text-center">
            <div class="form-group mb-0">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
        </form>
    </div>
</div>
<h4 class="card-title">Services</h4>
<div class="row">
    @foreach (auth()->user()->doctor->services as $services)
      <div class="col-4">
         <div class="card ">
             <div class="card-body">
                 {{$services->name}}
                        <a class="float-right"href="/doctor/setting/services/{{$services->id}}"
                        onclick="event.preventDefault();
                                      document.getElementById('delete-services-{{$services->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <form id="delete-services-{{$services->id}}" action="/doctor/setting/services/{{$services->id}}" method="POST" >
                         @csrf
                         @method('Delete')
                       </form>
            </div>
         </div>
      </div>
    @endforeach
</div>
@endsection
