@extends('layout.admin')
@section('title')
    Reviews
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
									<th>Rate</th>
									<th>Review</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($reviews as $review)
								<tr>
                                    <td>
										<h2 class="table-avatar">
											<a href="/doctor-profile/{{$review->clinic->doctor->user->username}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($review->clinic->doctor->user->image)}}" alt="User Image"></a>
											<a href="/doctor-profile/{{$review->clinic->doctor->user->username}}">{{$review->clinic->doctor->user->name}}</a>
										</h2>
                                    </td>
                                    <td>
                                        {{$review->clinic->doctor->speciality->name}}
                                    </td>
									<td>
										<h2 class="table-avatar">
											<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($review->patient->user->image)}}" alt="User Image"></a>
											<a href="#">{{$review->patient->user->name}}</a>
										</h2>
									</td>
									<td>{{$review->rate}}</td>
									<td>{{$review->review}}</td>
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
