@extends('layout.doctor')
@section('title')
 Aboute Me
@endsection
@section('dcontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">About Me</h4>
        <form action="/doctor/abouteme" method="post" >
         @csrf
        <div class="form-group mb-0">
            <label>Biography</label>
            <textarea class="form-control" rows="5" name="abouteme">{{auth()->user()->doctor->abouteme}}</textarea>
        </div>
        <div class="form-group mb-0">
            <label>Speciality</label>
            <select class="form-control select" name="speciality_id">
                <option>Select</option>
                @foreach ($specialities as $speciality)
                   <option value="{{$speciality->id}}" {{auth()->user()->doctor->speciality_id==$speciality->id?'selected':''}}>{{$speciality->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 text-center">
            <div class="form-group mb-0">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
        </form>
    </div>

</div>
@endsection
