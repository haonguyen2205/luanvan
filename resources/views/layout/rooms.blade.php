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
</br>
    <!-- Hero Section End -->

    <!-- Rooms Section Begin -->
    <div class="container px-1 px-sm-5 mx-auto" style="padding-bottom: 50px;">
        <h2 style="margin-left:200px">Vui lòng chọn ngày mà bạn muốn thuê</h2>
    <div>
        <!-- <form action="{{URL::to('xulyphong')}}" method="post">
        @csrf
            <table>
                <tr>
                    <td>
                        <input type="text" class="datepicker-1" required value="yyyy / mm / dd" required name="dayat">
                        <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
                    </td>
                    <td>
                        <input type="text" class="datepicker-2" value="yyyy / mm / dd" name="dayout" required>
                        <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">  
                    </td>
                    <td>
                        <input type="submit" value="Tìm phòng" class="btn btn-facebook">
                    </td>
                </tr>
            </table> -->
            <!-- <p>From</p>
            <input type="text" class="datepicker-1" required value="yyyy / mm / dd" required name="dayat">
            <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
            <p>To</p>
            <input type="text" class="datepicker-2" value="yyyy / mm / dd" name="dayout" required>
            <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
            <input type="submit" value="Tìm phòng" class="btn btn-facebook"> -->
        </form>
        </div>
    </div>

<div class="container px-1 px-sm-5 mx-auto">
    <form action="{{URL::to('xulyphong')}}" method="post" autocomplete="off">
    @csrf
        <div class="flex-sm-row flex-column d-flex">
            <div class="col-sm-9 col-12 px-0 mb-2">
                <div class="input-group input-daterange">
                    <input type="text" class="form-control datepicker-1 inputroom" placeholder="Chọn ngày bắt đầu" name="dayat">
                    <input type="text" class="form-control datepicker-2 inputroom" placeholder="Chọn ngày kết thúc" name="dayout">
                </div>
            </div>
            <div class="col-sm-3 col-12 px-0"> 
                <button type="submit" class="btn btn-black" value="Tìm phòng">Tìm phòng</button> 
            </div>
        </div>
    </form>
</div>





    <section class="room-section spad">
        <div class="container">
        @foreach($showPageRoom as $key => $showRooms)

            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
                                <img src="{{URL::to('public/upload/rooms/'.$showRooms->image)}}" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <form>
                        <div class="room-text">
                            <div class="room-title">
                            <h2>{{$showRooms->room_name}}</h2>
                            <div class="room-price">
                                <span>Giá</span>
                                <h2>{{number_format($showRooms->room_price).' đ'}}</h2>
                                <sub>/đêm</sub>
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

                        </div>
                    </form>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-5 my-3 mb-5">{{$showPageRoom->links()}}</div>
        </div>
        
    </section>
    <!-- Rooms Section End -->
<script>
    $(document).ready(function(){

$('.input-daterange').datepicker({
format: 'dd-mm-yyyy',
todayHighlight: true,
startDate: '0d',
});

});
</script>
@endsection
