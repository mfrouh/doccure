@extends('layout.admin')
@section('title')
    Speciality
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table text-center table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Specialities</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($specialities as $k=> $speciality)
									<tr>
										<td>{{$k+1}}</td>
										<td>
											<h2 class="table-avatar">
												<a href="profile" class="avatar avatar-sm mr-2">
													<img class="avatar-img" src="{{$speciality->image}}" alt="Speciality">
												</a>
												<a href="profile">{{$speciality->name}}</a>
											</h2>
										</td>
										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-success-light"  href="/admin/speciality/{{$speciality->id}}/edit">
													<i class="fe fe-pencil"></i>
												</a>
												<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
													<i class="fe fe-trash"></i>
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
			</div>
		</div>
	</div>
</div>
@endsection
