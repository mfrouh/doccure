@extends('layout.admin')
@section('title')
    Patients
@endsection
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Patient ID</th>
									<th>Patient Name</th>
									<th>Age</th>
									<th>Address</th>
									<th>Phone</th>
									<th>City</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($patients as $patient)

								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($patient->user->image)}}" alt="User Image"></a>
											<a href="profile">{{$patient->user->name}} </a>
										</h2>
									</td>
									<td>{{$patient->date_of_birth}}</td>
									<td>{{$patient->address}}</td>
									<td>{{$patient->phone}}</td>
									<td>{{$patient->city}}</td>
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
</div>
@endsection
