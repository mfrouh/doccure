@extends('layout.doctor')
@section('title')
 Social
@endsection
@section('dcontent')
<div class="card">
    <div class="card-body">
        <form action="/doctor/social-media" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="form-group">
                        <label>Facebook URL</label>
                        <input type="text" class="form-control" name="facebook" value="{{auth()->user()->doctor->social->facebook}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="form-group">
                        <label>Twitter URL</label>
                        <input type="text" class="form-control" name="twitter" value="{{auth()->user()->doctor->social->twitter}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="form-group">
                        <label>Instagram URL</label>
                        <input type="text" class="form-control" name="instagram" value="{{auth()->user()->doctor->social->instagram}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="form-group">
                        <label>Youtube URL</label>
                        <input type="text" class="form-control" name="youtube"  value="{{auth()->user()->doctor->social->youtube}}">
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
