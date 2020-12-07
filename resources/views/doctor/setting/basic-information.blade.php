@extends('layout.doctor')
@section('title')
 Basic Information
@endsection
@section('dcontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Basic Information</h4>
        <form action="/doctor/setting/basic-information" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="change-avatar">
                        <div class="profile-img">
                            <img src="{{asset(auth()->user()->image)}}">
                        </div>
                        <div class="upload-img">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" class="upload" name=image>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="username" readonly value="{{auth()->user()->username}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" readonly value="{{auth()->user()->email}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name"  value="{{auth()->user()->name}}" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{auth()->user()->phone_number}}">
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
            <div class="col-md-6">
                <div class="form-group mb-0">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{auth()->user()->date_of_birth}}">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="form-group mb-0">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
