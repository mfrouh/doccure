@extends('layout.patient')
@section('pcontent')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <form action="/patient/change-password" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="old_password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
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
