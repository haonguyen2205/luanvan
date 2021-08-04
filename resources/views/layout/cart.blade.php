@extends('master')
@section('content')
</br>
</br>
</br>
</br>
</br>
<?php
$so = strtotime($dayout) - strtotime($dayat);
$songay = $so/86400;
?>
<form action="{{URL::to('postCart')}}" method="post">
@csrf
    <div class="container">
        <input type="hidden" name="songay" value="{{$songay}}">

        <!-- Bảng đơn phòng -->
        <div class="left">
            <div class="list">
                </br>
                </br>
                <div class="title">
                    <h3>THÔNG TIN ĐƠN ĐẶT</h3>
                </div>
                <div class="list__content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15%;text-align: center;">Tên phòng</th>
                                    <th style="width: 10%;text-align: center;">Mã phòng</th>
                                    <th style="width: 45%;text-align: center;">Giá phòng</th>
                                    <th style="width: 25%; text-align: right;">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">{{$room_name}}</td>
                                    <td style="text-align: center;">{{$room_id}}</td>
                                    <input type="hidden" name="room_id" value="{{$room_id}}">
                                    <td style="text-align: center;">
                                        <h4>{{number_format($room_price,0)}} VND</h4>
                                        <input type="hidden" name="price" value="{{$room_price}}">
                                    </td>
                                    <td style="text-align: right;">
                                        <h4>{{number_format($room_price*$songay,0)}} VND</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p style="">Tổng tiền: <b id="sub-total">{{number_format($room_price*$songay,0)}} VND</b></p>      
                    <div>
                        <p style="color:red">Bạn phải thanh toán cho chúng tôi trước 40% số tiền để chúng tôi xác nhận bạn sẽ đặt. 
                        Bạn cần chuyển cọc trong vòng 24 tiếng kể từ khi bạn xác nhận đặt.
                        Nếu quá 24 tiếng đơn phòng của bạn sẽ hủy.</p>
                        <p>Số tiền cần phải cọc :
                            <?php
                                $tien = $room_price * $songay;
                                echo number_format($tien *0.4,0)."VNĐ";
                            ?>
                        </p>
                    </div>
                        <div class="tot-btn">
                        <a class="btn btn-primary" href="{{URL::to('/rooms')}}">Trở về</a>
                            @if(Session::has('users_id'))
                                <input type="submit"  value="Đặt phòng"  class="btn btn-primary">
                            @else
                                <a class="btn btn-primary" href="{{URL::to('/login')}}">Đăng nhập</a>
                            @endif
                        </div>
                </div>
            </div>
        </div>
</br>

        <!-- End bảng -->

        <!-- Bảng thông tin -->
        <div class="right">
            <div class="customer">
            @if(Session::has('users_id'))
                <div class="title" style="text-align: center;">
                    <h3>THÔNG TIN KHÁCH HÀNG</h3>
                </div>
                <div class="customer__content">
                    <div class="form-group">
                        <label for="name" >Họ và tên <span class="cRed" style="color:red;">(*)</span></label>
                        <input  id="name"  value="{{$user->name}}" type="text" class="form-control" >
                        <input type="hidden"  name="user_id" value="{{$user->users_id}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện thoại <span class="cRed" style="color:red;">(*)</span></label>
                        <input  id="phone"  value="{{$user->phone}}" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="address">CMND/CCCD <span class="cRed" style="color:red;">(*)</span></label>
                        <input  id="address" required="" type="text" class="form-control" name="cmnd" maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="address">Người lớn <span class="cRed" style="color:red;">(*)</span></label>
                        <div>
                        <input  id="address"  type="number" class="form-control" name="adults" value="0" min="1">
                        <!-- <p>
                            <span class="js-increase">+</span>
                            <span class="js-reduction">-</span>
                        </p> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Trẻ em </label>
                        <input  id="address"  type="number" class="form-control" name="children" value="0">
                    </div>
                    <div class="form-group">
                        <label for="address">Ngày đến <span class="cRed" style="color:red;">(*): </span></label>
                        <input type="text" required value="{{$dayat}}"  name="dayat" readonly style="text-align: center;width: 100px;border: 0;">
                    </div>
                    <div class="form-group">
                        <label for="address">Ngày đi <span class="cRed" style="color:red;">(*): </span></label>
                        <input type="text" value="{{$dayout}}" name="dayout" readonly style="text-align: center;width: 100px;border: 0;">
                    </div>
                </div>
            @else
</br>
</br>
            <h3 style="color: red;">Vui lòng đăng nhập để đặt phòng.</h3>
</br>
</br>
</br>
            @endif
            </div>
            
        </div>       
    </div>
</form>
<!-- <script>
    jsReductionQty()
    {
        $('.js-reduction').click(function (event) {
            let $this  = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            if (number <= 1) {
                toast.warning("Số lượng sản phẩm phải >= 1");
                return false;
            }
        })
    },

    jsIncreaseQty()
    {
        $('.js-increase').click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            if (number >= 10) {
                toast.warning("Mỗi sản phẩm chỉ được mua tối đa số lượng 10 lần / 1 lần mua");
                return false;
            }
        })
    }
</script> -->

@endsection