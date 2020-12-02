@extends('layout.doctor')
@section('dcontent')
<div class="row">
    <div class="col-md-12">
        <div class="card dash-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="75">
                                    <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Total Patient</h6>
                                <h3></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="dash-widget dct-border-rht">
                            <div class="circle-bar circle-bar2">
                                <div class="circle-graph2" data-percent="65">
                                    <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Surgeries</h6>
                                <h3>{{auth()->user()->doctor->clinic->surgeries->count()}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="dash-widget">
                            <div class="circle-bar circle-bar3">
                                <div class="circle-graph3" data-percent="50">
                                    <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Appointment</h6>
                                <h3>{{auth()->user()->doctor->clinic->appointments->count()}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
