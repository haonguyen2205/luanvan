@extends('master')
@section('content')
<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{URL::asset('public/frontend/img/slider-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>We hope you’ll enjoy <br/> your stay. </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-nav">
                                <a href="#" class="single-slider-nav">
                                    <img src="{{URL::asset('public/frontend/img/nav-1.jpg')}}" alt="">
                                    <div class="nav-text">
                                        <p>Pool<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                                
                                <a href="#" class="single-slider-nav last">
                                    <img src="{{URL::asset('public/frontend/img/nav-3.jpg')}}" alt="">
                                    <div class="nav-text">
                                        <p>Restaurant<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End -->

    <!-- Room Availability Section Begin -->
    <section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{URL::asset('public/frontend/img/room-slider/room-1.jpg')}}" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="{{URL::asset('public/frontend/img/room-slider/room-2.jpg')}}" alt="">
                                </div>
                                
                            </div>
                            <div class="room-text">
                                <div class="room-title">
                                    <h2>Junior Suite</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>$252</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Wi-fii</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-036-parking"></i>
                                        <span>Parking</span>
                                    </div>
                                    <div class="room-info last">
                                        <i class="flaticon-007-swimming-pool"></i>
                                        <span>Pool</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- -------------------- -->
                    <div class="col-lg-6">
                        <div class="check-form">
                            <h2>Check Availability</h2>
                            <form action="{{URL::to('/check-availability')}}" >
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>From</p>
                                        <input type="text" class="datepicker-1" name="dayat" placeholder="start time" >
                                        <img src="{{URL::asset('public/frontend/img/calendar.png')}}" >
                                    </div>
                                    <div class="date-select to">
                                        <p>To</p>
                                        <input type="text" class="datepicker-2" name="dayout" placeholder="end time">
                                        <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="room-quantity">
                                    <div class="single-quantity">
                                        <p>Adults</p>
                                        <div class="pro-qty"><input type="text" name="adults" value="0"></div>
                                    </div>
                                    <div class="single-quantity">
                                        <p>Children</p>
                                        <div class="pro-qty"><input type="text" name="children" value="0"></div>
                                    </div>
                                    
                                </div>
                                <!-- <div class="room-selector">
                                    <p>Room</p>
                                    <select class="suit-select">
                                        <option>Eg. Master suite</option>
                                        <option value="">Double Room</option>
                                        <option value="">Single Room</option>
                                        <option value="">Special Room</option>
                                    </select>
                                </div> -->
                                <a><button type="submit">CHECK Availability  <i class="lnr lnr-arrow-right" name="btn_check_availability"></i></button></a>
                            </form>
                        </div>
                    </div>

<!-- -------------------------- -->
                </div>
            </div>
        </div>
    </section>
    <!-- Room Availability Section End -->

    <!-- Facilities Section Begin -->
    <div class="facilities-section spad">
        <div class="container">
            <div class="facilities-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h1>Facilities</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="facilities-img set-bg" data-setbg="{{URL::asset('public/frontend/img/facilities-1.jpg')}}"></div>
                    </div>
                    <div class="col-lg-6 p-0 ">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <h2>Wellness Center</h2>
                                <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-1 order-2">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <h2>Wellness Center</h2>
                                <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-2 order-1">
                        <div class="facilities-img set-bg" data-setbg="{{URL::asset('public/frontend/img/facilities-2.jpg')}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Section End -->


    <!-- Follow Instagram Section Begin -->
    <section class="follow-instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Follow us on Facebook @MyhotelSTU</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Follow Instagram Section End -->
    <!-- Footer Room Pic Section Begin -->
    <div class="footer-room-pic">
        <div class="container-fluid">
            <div class="row">
                <img src="{{URL::asset('public/frontend/img/room-footer-pic/room-1.jpg')}}" alt="">
                <img src="{{URL::asset('public/frontend/img/room-footer-pic/room-2.jpg')}}" alt="">
                <img src="{{URL::asset('public/frontend/img/room-footer-pic/room-3.jpg')}}" alt="">
                <img src="{{URL::asset('public/frontend/img/room-footer-pic/room-4.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer Room Pic Section End -->
    @endsection