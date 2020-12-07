@extends('layout.admin')
@section('title')
   Surgeries
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
                                    <th>Name</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Hospital Name</th>
                                    <th>Price</th>

								</tr>
							</thead>
							<tbody>
                                @foreach ($surgeries as $surgery)
								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="/doctor-profile/{{$surgery->clinic->doctor->user->username}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($surgery->clinic->doctor->user->image)}}" alt="User Image"></a>
											<a href="/doctor-profile/{{$surgery->clinic->doctor->user->username}}">{{$surgery->clinic->doctor->user->name}}</a>
										</h2>
                                    </td>
                                    <td>
                                        {{$surgery->clinic->doctor->speciality->name}}
                                    </td>
									<td>
										<h2 class="table-avatar">
											<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($surgery->patient->user->image)}}" alt="User Image"></a>
											<a href="#">{{$surgery->patient->user->name}}</a>
										</h2>
                                    </td>
                                    <td>{{$surgery->name}}</td>
                                    <td>{{$surgery->day}}</td>
                                    <td>{{$surgery->time}}</td>
                                    <td>{{$surgery->hospital_name}}</td>
                                    <td>{{$surgery->price}}</td>
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
