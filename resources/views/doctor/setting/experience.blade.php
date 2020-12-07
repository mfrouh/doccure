@extends('layout.doctor')
@section('title')
 Experience
@endsection

@section('dcontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Experience</h4>
        <div class="experience-info">
            <div class="row form-row experience-cont">
                <div class="col-12 col-md-10 col-lg-11">
                    <form action="/doctor/setting/experience" method="post">
                        @csrf
                    <div class="row form-row text-center">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Hospital Name</label>
                                <input type="text" class="form-control" name="hospital_name">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-4">
                            <div class="form-group">
                                <label>From</label>
                                <input type="text" class="form-control" name="from">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-4">
                            <div class="form-group">
                                <label>To</label>
                                <input type="text" class="form-control" name="to">
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
</div>
<h4 class="card-title">Experience</h4>
<div class="row text-center">
    @foreach (auth()->user()->doctor->experiences as $experience)
      <div class="col-12">
         <div class="card ">
             <div class="card-body">
                 <div class="row">
                     <div class="col-5"> {{$experience->hospital_name}}</div>
                     <div class="col-3">{{$experience->from}}</div>
                     <div class="col-3">{{$experience->to}}</div>
                     <div class="col-1">
                        <a class="float-right"href="/doctor/setting/experience/{{$experience->id}}"
                            onclick="event.preventDefault();
                                          document.getElementById('delete-experience-{{$experience->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <form id="delete-experience-{{$experience->id}}" action="/doctor/setting/experience/{{$experience->id}}" method="POST" >
                             @csrf
                             @method('Delete')
                           </form>
                     </div>
                 </div>
            </div>
         </div>
      </div>
    @endforeach
</div>

@endsection
