@extends('layout.doctor')
@section('title')
 Surgeries
@endsection
@section('dcontent')
<div class="card">
    <div class="card-header">
        <h4 class="card-tzitle mb-0">Edit Surgery</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="biller-info">
                    <h4 class="d-block">{{auth()->user()->name}}</h4>
                    <span class="d-block text-sm text-muted">{{auth()->user()->specialty}}</span>
                    <span class="d-block text-sm text-muted">{{auth()->user()->doctor->city}}, {{auth()->user()->doctor->country}}</span>
                </div>
            </div>
            <div class="col-sm-6 text-sm-right">
                <div class="billing-info">
                    <h4 class="d-block">{{now()->format('d M Y')}}</h4>
                </div>
            </div>
        </div>
        <div class="card card-table">
            <div class="card-body">
                <form action="/doctor/surgery" method="post">
                    @csrf
                  <div class="row">
                     <div class="form-group col-md-6 ">
                       <label for="">Hospital Name</label>
                       <input type="text" name="hospital_name" class="form-control" placeholder="Hospital Name" >
                     </div>
                     <div class="form-group col-md-6 ">
                        <label for=""> Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" >
                      </div>
                      <div class="form-group col-md-6 ">
                        <label for="">Day</label>
                        <input type="date" name="day" class="form-control" placeholder="Day" >
                      </div>
                      <div class="form-group col-md-6 ">
                        <label for="">Time</label>
                        <input type="time" name="time" class="form-control" placeholder="Time" >
                      </div>
                      <div class="form-group col-md-6 ">
                        <label for="">Price</label>
                        <input type="price" name="price" class="form-control" placeholder="Price" >
                      </div>
                      <div class="form-group col-md-12  text-center">
                        <input type="submit"  class="btn btn-primary" value="Save" >
                      </div>
                  </div>
                 </form>
            </div>
        </div>
    </div>
</div>
