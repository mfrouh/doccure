@extends('layout.doctor')
@section('title')
 Setting
@endsection
@section('dcontent')
<div class="row">
    <div class="col-4">
        <div class="card p-2">
            <div class="card-body">
                <a href="/doctor/setting/basic-information"><h4 class="card-title text-center" >Basic Information</h4></a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-2 ">
            <div class="card-body">
                <a href="/doctor/abouteme"><h4 class="card-title text-center" >About Me</h4></a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-2">
            <div class="card-body">
                <a href="/doctor/clinic"><h4 class="card-title text-center" >Clinic</h4></a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-2">
            <div class="card-body">
                <a href="/doctor/setting/services"><h4 class="card-title text-center" >Services</h4></a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-2 ">
            <div class="card-body">
                <a href="/doctor/setting/education"><h4 class="card-title text-center" >Education</h4></a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-2">
            <div class="card-body">
                <a href="/doctor/setting/experience"><h4 class="card-title text-center" >Experience</h4></a>
            </div>
        </div>
    </div>
</div>
@endsection
