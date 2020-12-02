@extends('layout.admin')
@section('title')
    Appointments
@endsection
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Doctor Name</th>
									<th>Speciality</th>
									<th>Patient Name</th>
									<th>Apointment Time</th>
									<th>Status</th>
									<th class="text-right">Amount</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($appointments as $appointment)
								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($appointment->patient->user->image)}}" alt="User Image"></a>
											<a href="#">{{$appointment->patient->user->name}}</a>
										</h2>
									</td>
									<td>{{$appointment->clinic->doctor->user->name}}</td>
									<td>
										<h2 class="table-avatar">
											<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($appointment->clinic->doctor->user->image)}}" alt="User Image"></a>
											<a href="#">{{$appointment->clinic->doctor->user->name}} </a>
										</h2>
									</td>
									<td>{{$appointment->day}}<span class="text-primary d-block">{{$appointment->time}}</span></td>
									<td>
										{{$appointment->state}}
									</td>
									<td class="text-right">
                                        {{$appointment->price}}
                                    </td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
