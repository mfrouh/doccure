@extends('layout.admin')
@section('title')
    Doctors
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
							  <thead>
								  <tr>
								  	<th>Doctor Name</th>
								  	<th>Speciality</th>
								  	<th>Member Since</th>
								  </tr>
							  </thead>
							  <tbody>
                                 @foreach ($doctors as $doctor)
								 <tr>
								 	<td>
								 		<h2 class="table-avatar">
								 			<a href="/doctor-profile/{{$doctor->user->username}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($doctor->user->image)}}" alt="User Image"></a>
								 			<a href="/doctor-profile/{{$doctor->user->username}}">{{$doctor->user->name}}</a>
								 		</h2>
								 	</td>
								 	<td>{{$doctor->speciality->name}}</td>
								 	<td>{{$doctor->created_at->diffforhumans()}}</td>
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
@endsection
