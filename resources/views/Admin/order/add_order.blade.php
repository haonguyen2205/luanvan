
@extends('admin_layout')
@section('admin_content')
<?php
// $so = $endt->day - $start->day;
// // $songay = $so/86400;
// echo $so;
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Đặt phòng theo yêu cầu khách hàng
            </header>
           
            <div class="panel-body">

                <div class="position-center">
                    @foreach ($room as $row)

                    
                    <?php   
                    
                        $so = strtotime($endt) - strtotime($start);
                        $songay = $so/86400;

                        
                        $tiencoc = ($tongtien *40)/100;
                    ?>

                        <form role="form" action="{{URL::to('/add-order-by-admin/'.$row->room_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">người đặt phòng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" minlength="6" maxlength="50" required>
                            </div>
                            <div class="row">
                                <div class=" col-md-3">
                                    <label for="exampleInputEmail2">ngày nhận phòng</label>
                                    <input type="date" class="form-control"name="start" value="{{$start}}" readonly  >
                                </div>
                                <div class=" col-md-3">
                                <label for="exampleInputEmail2">ngày trả phòng</label>
                                    <input type="date" class="form-control" name="end" value="{{$endt}}" readonly  >
                                </div>  
                                </br>
                                <div class=" col-md-3">
                                    <label type="date" name="end_time" value="{{$endt}}" readonly="readonly"> số ngày cuối tuần : {{$cuoituan}} </label>
                                </div> 
                                </br>  
                                </br>  
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Adults</label>
                                    <input type="number" class="form-control" value="1" min="1" max="2"  name="adults" required>
                                </div> 
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Kids</label>
                                    <input type="number" class="form-control" value="0"  min="0" max="2" name="children" required>
                                </div> 
                            </div>
                            </br>
                            <div class="row my-3">
                                <div class="col-md-3 my-2">
                                    <label for="exampleInputEmail1">CMND/CCCD</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="12"  name="CMND" required>
                                </div> 
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">giá phòng</label>
                                    <input type="number" class="form-control"  value="{{($row->room_price)}}" disabled min="200000"  name="room_price" readonly required>
                                </div> 
                            </div>
                            </br>
                            <div class="row my-3">
                                <div class="col-md-4 my-2">
                                    <label for="exampleInputEmail1">Tổng tiền : {{number_format($tongtien)}} đồng</label>
                                    <input type="hidden" class="form-control" value="{{$tongtien}}"   name="total"  required readonly>
                                </div> 
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Tiền cọc(40%): {{number_format($tiencoc)}} đồng</label>
                                    <input type="hidden" class="form-control" value="{{$tiencoc}}"   name="deposit"  required readonly>
                                </div> 
                            </div>
                            </br>
                            <div class="form-group mt-5">
                                <input type="submit" class="btn btn-primary mt-5 m" margin-top="8px" value="đặt phòng">
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
            <div class="my-5">
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel owl-theme ">
                            @foreach($img as $imgroom)
                                <div class="item">
                                    <div> </div>
                                    <div class="col mt-5 mb-5">
                                        <div class="cart">
                                            
                                            <img src="{{asset('public/upload/rooms/'.$imgroom->room_image)}}" width="350" height="200">
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>  

            <Script>
    $(document).ready(function () {
        (function ($) {
            $('.owl-carousel').owlCarousel({
                margin: 10,
                // slideSpeed : 800,
                // autoPlay: 2000,
                items : 3,
                autoplay:true,
                autoplayTimeout:2000,
                loop: true,
                stopOnHover : true,
                itemsDesktop : [1199,1],
                itemsDesktopSmall : [979,1],
                itemsTablet :   [768,1],
            });
        })(jQuery);
    });
</Script>
@endsection