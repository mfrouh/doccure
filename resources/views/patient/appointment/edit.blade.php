@extends('layout.patient')
@section('pcontent')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="booking-doc-info">
                    <a href="doctor-profile" class="booking-doc-img">
                        <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                    </a>
                    <div class="booking-info">
                        <h4><a href="doctor-profile">Dr. Darren Elder</a></h4>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating">35</span>
                        </div>
                        <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-6">
                <h4 class="mb-1">11 November 2019</h4>
                <p class="text-muted">Monday</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6 text-sm-right">
                <div class="bookingrange btn btn-white btn-sm mb-3">
                    <i class="far fa-calendar-alt mr-2"></i>
                    <span></span>
                    <i class="fas fa-chevron-down ml-2"></i>
                </div>
            </div>
        </div>
        <div class="card booking-schedule schedule-widget">

            <div class="schedule-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="day-slot">
                            <ul>
                                <li class="left-arrow">
                                    <a href="">
                                        <i class="fa fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <span>Mon</span>
                                    <span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
                                </li>
                                <li class="right-arrow">
                                    <a href="">
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="schedule-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="time-slot">
                            <ul class="clearfix">
                                <li>
                                    <a class="timing" href="#">
                                        <span>9:00</span> <span>AM</span>
                                    </a>
                                    <a class="timing" href="#">
                                        <span>10:00</span> <span>AM</span>
                                    </a>
                                    <a class="timing" href="#">
                                        <span>11:00</span> <span>AM</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit-section proceed-btn text-right">
            <a href="checkout" class="btn btn-primary submit-btn">Proceed to Pay</a>
        </div>

    </div>
</div>
@endsection
