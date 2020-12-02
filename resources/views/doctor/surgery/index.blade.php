@extends('layout.doctor')
@section('dcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
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
                    @foreach (auth()->user()->doctor->clinic->surgeries as $surgery)
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
</div>
@endsection
