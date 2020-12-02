@extends('layout.doctor')
@section('dcontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Education</h4>
        <div class="education-info">
            <div class="row form-row education-cont">
                <div class="col-12 col-md-10 col-lg-11">
                    <form action="/doctor/setting/education" method="post">
                        @csrf
                    <div class="row form-row text-center">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Degree</label>
                                <input type="text" class="form-control" name="degree">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>College</label>
                                <input type="text" class="form-control" name="college">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <div class="form-group">
                                <label>from</label>
                                <input type="text" class="form-control" name="from">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <div class="form-group">
                                <label>to</label>
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
<h4 class="card-title">education</h4>
<div class="row text-center">
    @foreach (auth()->user()->doctor->educations as $education)
      <div class="col-12">
         <div class="card ">
             <div class="card-body">
                 <div class="row">
                     <div class="col-3"> {{$education->degree}}</div>
                     <div class="col-3"> {{$education->college}}</div>
                     <div class="col-2">{{$education->from}}</div>
                     <div class="col-2">{{$education->to}}</div>
                     <div class="col-2">
                        <a class="float-right"href="/doctor/setting/education/{{$education->id}}"
                        onclick="event.preventDefault();
                                      document.getElementById('delete-education-{{$education->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <form id="delete-education-{{$education->id}}" action="/doctor/setting/education/{{$education->id}}" method="POST" >
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
