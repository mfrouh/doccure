@extends('layout.patient')
@section('pcontent')
<div class="card card-table mb-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-center mb-0 text-center">
                <thead>
                    <tr>
                        <th>Date </th>
                        <th>Doctor Name</th>
                        <th>Specialty</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                    <tr>
                        <td>{{$prescription->created_at->format('d M Y')}}</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="{{asset($prescription->clinic->doctor->user->image)}}" alt="User Image">
                                </a>
                                <a>{{$prescription->clinic->doctor->user->name}}</a>
                            </h2>
                        </td>
                        <td>{{$prescription->clinic->doctor->speciality->name}}</td>
                        <td class="text-right">
                            <div class="table-action">
                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                    <i class="fas fa-print"></i> Print
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                    <i class="far fa-eye"></i> View
                                </a>
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
