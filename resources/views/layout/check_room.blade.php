@extends('master')
@section('content')
<!-- Hero Section Begin -->

<section class="hero-section set-bg" data-setbg="{{URL::asset('public/frontend/img/rooms-bg.jpg')}}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Rooms</h1>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
        <!-- Hero Section End -->

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
           
        @foreach($showPageRoom as $key => $showRooms)
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
                                <img src="{{URL::to('public/upload/rooms/'.$showRooms->room_image)}}" alt="">
                            </div>
                            <div class="single-room-pic">
                                <img src="{{URL::to('public/upload/rooms'.$showRooms->room_image)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">  
                    <form>
                        <div class="room-text">
                            <div class="room-title">
                            <h2>{{$showRooms->room_name}}</h2>
                            <div class="room-price">
                                <span>From</span>
                                <h2>{{number_format($showRooms->room_price).' đ'}}</h2>
                                <sub>/night</sub>
                            </div>
                            </div>
                            <div class="room-desc">
                            <p> {{$showRooms->room_description}}</p>
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
                            @if($showRooms->quality > 0)
                                <b class="primary-btn">còn phòng</b>
                                <a href="{{URL::to('/cart',$showRooms->room_id)}}" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>
                            @else
                                <b class="primary-btn">hết phòng</b>
                                <a href="#" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>                          
                            @endif
                        </div>
                    </form>
                       
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection