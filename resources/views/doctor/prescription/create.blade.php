@extends('layout.doctor')
@section('dcontent')
<div class="card">
    <div class="card-header">
        <h4 class="card-tzitle mb-0">Prescription</h4>
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
        <!-- Prescription Item -->
        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center text-center">
                        <thead>
                            <tr>
                                <th style="min-width: 200px">Name</th>
                                <th style="min-width: 80px;">Quantity</th>
                                <th style="min-width: 80px">Days</th>
                                <th style="min-width: 100px;">Time</th>
                                <th style="min-width: 80px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="/doctor/prescriptioncontent"  method="post">
                                @csrf
                                 <tr>
                                     <td>
                                         <input class="form-control" type="text" name="name">
                                     </td>
                                     <td>
                                         <input class="form-control" type="text" name="quantity">
                                     </td>
                                     <td>
                                         <input class="form-control" type="text" name="days">
                                     </td>
                                     <td>
                                         <input class="form-control" type="text" name="time">
                                         <input type="hidden" name="prescription_id" value="{{$prescription->id}}">
                                     </td>
                                     <td>
                                        <input type="submit" class="btn btn-primary" value="Save">
                                     </td>
                                 </tr>
                            </form>
                           @foreach ($prescription->prescriptioncontent as $prescriptioncontent)
                            <tr>
                                <td>{{$prescriptioncontent->name}}</td>
                                <td>{{$prescriptioncontent->quantity}}</td>
                                <td>{{$prescriptioncontent->days}}</td>
                                <td>{{$prescriptioncontent->time}}</td>
                                <td><a class="float-right"href="/doctor/prescriptioncontent/{{$prescriptioncontent->id}}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('delete-prescriptioncontent-{{$prescriptioncontent->id}}').submit();">
                                                  <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <form id="delete-prescriptioncontent-{{$prescriptioncontent->id}}" action="/doctor/prescriptioncontent/{{$prescriptioncontent->id}}" method="POST" >
                                     @csrf
                                     @method('Delete')
                                   </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Prescription Item -->
    </div>
</div>
@endsection
