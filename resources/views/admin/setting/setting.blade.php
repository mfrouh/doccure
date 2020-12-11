@extends('layout.admin')
@section('title')
    Setting
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
<div class="card">
    <div class="card-body">
        <form action="/admin/setting" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row form-row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <div class="change-avatar">
                            <div class="profile-img">
                                <img src="{{asset(auth()->user()->image)}}" alt="User Image">
                            </div>
                            <div class="upload-img">
                                <div class="change-photo-btn">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" class="upload" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control select" name="gender">
                            <option>Select</option>
                            <option value="male" {{auth()->user()->gender=="male"?'selected':''}}>Male</option>
                            <option value="female" {{auth()->user()->gender=="female"?'selected':''}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Date of Birth</label>
                            <input type="date" class="form-control " name="date_of_birth" value="{{auth()->user()->date_of_birth}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" value="{{auth()->user()->phone_number}}" name="phone_number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
