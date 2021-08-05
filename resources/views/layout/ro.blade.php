@extends('master')
@section('content')
<!-- Hero Section Begin -->
<?php
?>
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

   @foreach($room as $r)
        
                <form action="{{URL::to('datphong')}}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{$r->room_id}}">
                    <input type="hidden" name ="room_name" value="{{$r->room_name}}">
                    <input type="hidden" name ="room_image" value="{{$r->image}}">
                    <input type="hidden" name ="price" value ="{{$r->room_price}}">
                    <input type="hidden" name ="dayat" value="{{$dayat}}">
                    <input type="hidden" name ="dayout" value="{{$dayout}}">

        <div class="rooms-page-item">
            <div class="row">

                <div class="col-lg-6">
                    <div class="room-pic-slider owl-carousel">
                        <div class="single-room-pic">
                            <img src="{{URL::to('public/upload/rooms/'.$r->image)}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="room-text">
                        <div class="room-title">
                        <h2>{{$r->room_name}}</h2>
                        <div class="room-price">
                            <span>Giá</span>
                            <h2>{{number_format($r->room_price,0).' đ'}}</h2>
                            <sub>/Đêm</sub>
                        </div>
                        </div>

                        <div class="room-desc">
                        <p>{{$r->room_description}}</p>
                            <?php
                                foreach($order as $o){
                                    if($o->room_id == $r->room_id){
                                        echo "<p style='color:red;'>Không thể đặt : <br> ";    
                                    }
                                }
                                foreach($order as $o){
                                    if($o->room_id == $r->room_id){
                                       
                                        echo "Từ ngày :".$o->dayat." đến ngày ".$o->dayout."<br>";
                                    }
                                }
                            ?>    
                        </p>
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
                        <?php 
                        foreach($order as $o)
                        {
                            if($o->room_id == $r->room_id)
                            {                  
                                echo "<input type='submit' value='Vui lòng liên hệ' class='primary-btn' disabled>";
                                echo "<p style='color:red ; font-size:15px'>Trong thời gian bạn muốn đặt, chúng tôi không thể cung cấp đủ cho bạn.
                                Nếu bạn vẫn đồng ý muốn đặt thì chúng tôi sẽ chuyển cho bạn một phòng tương đương</p>";
                                break; 
                            }
                        }
                        ?>
                       <?php 
                       $flag = 0;
                       foreach($order as $a){
                           if($r->room_id == $a->room_id)
                            $flag =1;
                       }
                       if($flag==0)
                            echo "<input type='submit' value='Đặt ngay' class='primary-btn'>";
                            ?>
                         
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