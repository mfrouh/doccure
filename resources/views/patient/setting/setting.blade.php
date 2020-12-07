@extends('layout.patient')
@section('pcontent')
<div class="card">
    <div class="card-body">
        <form action="/patient/setting" method="POST"  enctype="multipart/form-data">
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
                        <label>Blood Group</label>
                        <select class="form-control select" name="blood_group">
                            <option value="A"   {{auth()->user()->patient->blood_group=='A'?'selected':''}} >A-</option>
                            <option value="A+"  {{auth()->user()->patient->blood_group=='A+'?'selected':''}} >A+</option>
                            <option value="B"   {{auth()->user()->patient->blood_group=='B'?'selected':''}}>B-</option>
                            <option value="B+"  {{auth()->user()->patient->blood_group=='B+'?'selected':''}}>B+</option>
                            <option value="AB-" {{auth()->user()->patient->blood_group=='AB-'?'selected':''}}>AB-</option>
                            <option value="AB+" {{auth()->user()->patient->blood_group=='AB+'?'selected':''}}>AB+</option>
                            <option value="O"   {{auth()->user()->patient->blood_group=='O'?'selected':''}}>O-</option>
                            <option value="O+"  {{auth()->user()->patient->blood_group=='O+'?'selected':''}}>O+</option>
                        </select>
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
                <div class="col-12">
                    <div class="form-group">
                    <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{auth()->user()->patient->address}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="{{auth()->user()->patient->city}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" value="{{auth()->user()->patient->state}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" value="{{auth()->user()->patient->country}}">
                    </div>
                </div>
            </div>
            <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
