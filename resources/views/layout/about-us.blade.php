@extends('master')
@section('content')
<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="{{URL::asset('public/frontend/img/about-us-bg.jpg')}}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>About</h1>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- About Room Section Begin -->
    <div class="about-us-room spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2>“Customers may forget what you said  but they will never forget how you made them
                        feel”.</h2>
                </div>
            </div>
            <div class="about-para">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Comment.</p>
                    </div>
                    <div class="col-lg-6">
                        <p>comment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Room Section End -->
    <!-- Video Tour Section Begin -->
    <section class="video-tour set-bg" data-setbg="{{URL::asset('public/frontend/img/video-bg.jpg')}}">
        <div class="container">
            <div class="video-text">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>Video Hotel Tour</h2>
                    </div>
                </div>
                <div class="video-play-btn">
                    <a href="https://www.youtube.com/watch?v=hGsVLXnFgbA" class="pop-up"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Tour Section End -->
    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="gallery-text">
                        <h2>Hotel Gallery</h2>
                        <p>Describe.</p>
                        <a href="#" class="primary-btn">View Gallery <i class="lnr lnr-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{URL::asset('public/frontend/img/gallery/gallery-1.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{URL::asset('public/frontend/img/gallery/gallery-2.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{URL::asset('public/frontend/img/gallery/gallery-3.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{URL::asset('public/frontend/img/gallery/gallery-4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->
    <!-- Staff Section End -->
    <section class="staff-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our Staff</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-staff-item">
                        <div class="staff-img">
                            <img src="{{URL::asset('public/frontend/img/staff/Galaxy.jpg')}}" alt="">
                        </div>
                        <div class="staff-text">
                            <h5>Sarah Doe</h5>
                            <span>Hotel Manager</span>
                            <a href="#"><i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-staff-item">
                        <div class="staff-img">
                            <img src="{{URL::asset('public/frontend/img/staff/Galaxy.jpg')}}" alt="">
                        </div>
                        <div class="staff-text">
                            <h5>Jessica Doe</h5>
                            <span>Reception Manager</span>
                            <a href="#"><i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-staff-item">
                        <div class="staff-img">
                            <img src="{{URL::asset('public/frontend/img/staff/Galaxy.jpg')}}" alt="">
                        </div>
                        <div class="staff-text">
                            <h5>Jessica Doe</h5>
                            <span>It</span>
                            <a href="#"><i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Staff Section End -->
    @endsection