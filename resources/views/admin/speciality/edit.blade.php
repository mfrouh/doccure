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
                    <div class="card-header">Edit Speciality</div>
					<div class="card-body">
                        <form action="/admin/speciality/{{$speciality->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$speciality->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="text-center">
                              <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
