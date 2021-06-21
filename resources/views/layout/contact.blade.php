@extends('master')
@section('content')
<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="{{URL::asset('public/frontend/img/contact-bg.jpg')}}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact</h1>
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Contact Information</h2>
                            <ul>
                                <li><img src="{{URL::asset('public/frontend/img/placeholder-copy.png')}}" alt=""> <span> Address </span></li>
                                <li><img src="{{URL::asset('public/frontend/img/phone-copy.png')}}" alt=""> <span> 123456789 </span></li>
                                <li><img src="{{URL::asset('public/frontend/img/envelop.png')}}" alt=""> <span>hello@youremail.com</span></li>
                                <li><img src="{{URL::asset('public/frontend/img/clock-copy.png')}}" alt=""> <span>Everyday: 06:00 -22:00</span></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h2>Follow us on:</h2>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Write us ...</h5>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>From</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="Full Name">
                                        <img src="{{URL::asset('public/frontend/img/edit.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="email" placeholder="Email">
                                        <img src="{{URL::asset('public/frontend/img/envelop-copy.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group phone-num">
                                        <input type="text" placeholder="Phone">
                                        <img src="{{URL::asset('public/frontend/img/phone-copy.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="message">
                                        <p>Message</p>
                                        <div class="textarea">
                                            <textarea placeholder="Hi ..."></textarea>
                                            <img src="{{URL::asset('public/frontend/img/speech-copy.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Send <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85330.08148738586!2d106.69728606611037!3d10.800381046155376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603038360970!5m2!1svi!2s"  height="560" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- Map Section End -->
@endsection