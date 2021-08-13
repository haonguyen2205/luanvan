
@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Thông tin thanh toán
            </header>
            <table class="table table-striped b-t b-light" style="padding: 20px;">
                <thead>
                    <tr>
                        <th>Số hoá đơn</th>
                        <th>Tên khách hàng</th>
                        <th>Họ tênn người nhận</th>
                        <th>CMND/CCCD</th>
                        <th>Phòng</th>
                        <th>Giá tiền</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Số ngày</th>
                        <th>Tiền cọc</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$hoadon}}</td>
                        <td>{{$tenkhachhang}}</td>
                        <td>{{$hoten}}</td>
                        <td>{{$cmnd}}</td>
                        <td>{{$phong}}</td>
                        <td>{{number_format($price,0) }} VND</td>
                        <td>{{$dayat}}</td>
                        <td>{{$dayout}}</td>
                        <td>{{$songay}}</td>
                        <td>{{number_format($tiencoc,0)}} VNĐ</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="container-fluid">
            
                <div class="row">
                    <form action="{{URL::to('capnhat')}}" method="post">
                        @csrf            
                        <div class="col-lg-6">
                            <div>
                                <h2>Bạn đã sử dụng thêm dịch vụ</h2>
                                <span class="cRed" style="color:red;">(Nếu khách hàng có sử dụng dịch vụ)</span>
                            </div>
                            <table class="table table-striped b-t b-light" style="border-style: ridge;">
                                <thead>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;">Tên dịch vụ</td>
                                        <td style="font-weight: bold; text-align: center;">Số lượng</td>
                                        <td style="font-weight: bold; text-align: right;">Đơn giá</td>
                                    </tr>
                                </thead>
                            <?php
                                if($status == 3)
                                { 
                                    if(empty($dichvu[0]))
                                    {
                                        foreach($service as $ser)
                                        {
                                            // chưa sử dụng trong khi thuê
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td style='font-weight: bold;text-align: center;'>".$ser->service_name."</td>";
                                            echo "<td style='text-align: center;'><input type='number' name='".$ser->name."' value='' style='border: 0px; text-align: center;' min='0'></td>";
                                            echo "<td style='text-align: right;'>".number_format($ser->service_price,0)."VNĐ </td>";
                                            echo "</tr>"; 
                                            echo "</tbody>";
                                        }
                                    }
                                    else if(!empty($dichvu[0]))
                                    {
                                        foreach($service as $ser)
                                        {
                                            foreach($dichvu as $d)
                                            {
                                                if($ser->service_id == $d->service_id)
                                                {   
                                                    // Có sử dụng dịch vụ trong khi thuê
                                                    echo "<tbody>";
                                                    echo "<tr>";
                                                    echo "<td style='font-weight: bold;text-align: center;'>".$ser->service_name."</td>";
                                                    echo "<td style='text-align: center;'><input type='number' name='".$ser->name."' value='".$d->quantity."' style='border: 0px; text-align: center;' min='0'></td>";
                                                    echo "<td style='text-align: right;'>".number_format($ser->service_price,0)."VNĐ </td>";
                                                    echo "</tr>";
                                                    echo "</tbody>";
                                                }
                                            }
                                        }
                                    }     
                                }
                                if($status==4)
                                {
                                    foreach($service as $ser)
                                    {
                                        foreach($dichvu as $d)
                                        {
                                            if($ser->service_id == $d->service_id)
                                            {
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<td style='font-weight: bold;text-align: center;'>".$ser->service_name."</td>";
                                                echo "<td style='text-align: center;'><input type='number' name='".$ser->name."' value='".$d->quantity."' style='border: 0px; text-align: center;' min='0'></td>";
                                                echo "<td style='text-align: right;'>".number_format($ser->service_price,0)."VNĐ </td>";
                                                echo "</tr>";
                                                echo "</tbody>";
                                            }
                                        }
                                    }
                                }
                                echo "</table>";
                            ?>
                        </div>

                        <!-- BẢNG THANH TOÁN TIỀN ĐỀN BÙ HƯ HẠI TIỆN ÍCH -->
                        <div class="col-lg-6">
                            <div>
                                <h2>Các khoản đền bù do khách hàng gây ra</h2>
                                <span class="cRed" style="color:red;">(Nếu khách hàng gây thiệt hại về tải sản)</span>
                            </div>
                            <div>
                                <table class="table table-striped b-t b-light" style="border-style: ridge;">
                                    <thead>
                                        <tr>                             
                                            <th style="text-align: center; width: 45%;">Tên tiện ích</th>
                                            <th style="text-align: center; width: 45%;">Giá</th>
                                            <th style="text-align: center; width: 10%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ul as $u)
                                        <tr>                             
                                            <td style="text-align: center; width: 45%;">{{$u->utility_name}}</td>
                                            <td style="text-align: center; width: 45%;">{{number_format($u->utility_price,0)}} VNĐ</td>
                                            <th style="text-align: left; width: 10%;"><input type="checkbox" name="{{$u->utility_id}}" value="{{$u->utility_id}}" <?php if(isset($denbu)){ foreach($denbu as $d){ if($u->utility_id == $d->u_id) echo "checked disabled";}} ?> style="border: 4px; height: 17px; width: 17px;"></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <input type="hidden" name="tongtien" value="{{$tongtien}}">
                        <input type="hidden" name="id" value="{{$hoadon}}">
                        <div class="row w3-res-tb">
                            <div  class="form-check col-sm-4">
                                <table class="table table-striped b-t b-light">
                                    <tbody>
                                        <tr>
                                            <td>Phụ thu cuối tuần</td>
                                            <td><input type="number" style="width: 70px; border: 0px;" name="cuoituan" value="{{$soct}}" min="0"></td>
                                            <td readonly>{{$cuoituan}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phụ thu ngày lễ</td>
                                            <td><input type="number" style="width: 70px; border: 0px;" name="ngayle" value="{{$sonl}}" min="0"></td>
                                            <td>{{$ngayle}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <h4>Phụ thu cuối tuần: 
                                    <input type="number" style="width: 70px;" name="cuoituan" value="{{$soct}}" min="0"> 
                                    <input style="width: 140px;" value="{{$cuoituan}}" readonly>
                                </h4>
                                <span style="color: red;">(Nhân viên cần kiểm tra lại số ngày trước khi nhập)</span>
                                <h4>Phụ thu ngày lễ: 
                                    <input type="number" style="width: 70px;" name="ngayle" value="{{$sonl}}" min="0"> 
                                    <input style="width: 140px;" value="{{$ngayle}}" readonly>
                                </h4>
                                <span style="color: red;">(Nhân viên cần kiểm tra lại số ngày trước khi nhập)</span> -->
                            </div>
                            <div class="col-sm-4"></div>      
                        </div>
                        @if($status==3)         
                        <div class="container-fluid">
                            <input type="submit" value="Cập nhật" class="btn btn-primary" style="width: 80px;">
                        </div>
                        @endif
                    </form>
                </div>

                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                    <div class="col-lg-4">
                        <h2>Tổng cộng: {{number_format($tongtien,0)}} VNĐ</h2>
                        <h2>Tiền dịch vụ thêm: {{number_format($tiendichvu,0)}} VNĐ</h2>
                        @if($status == 4)
                        <div>
                            <a href="{{URL::to('/admin/manage-order')}}" class="btn btn-primary" style="width: 80px;">Trở về</a>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <h2 style="color: green;">Cọc trước: {{number_format($tiencoc,0)}} VNĐ</h2>
                        <h2 style="color: green;">Phụ thu: {{number_format($ngayle +$cuoituan,0)}} VNĐ</h2>
                    </div>
                    <div class="col-lg-4">
                        <h2 style="color: red;">Tổng tiền đền bù: <?php if(isset($tiendenbu)) echo number_format($tiendenbu,0)." VNĐ";  ?></h2> <!-- TỔNG TIỀN ĐỀN BÙ -->
                        @if($status ==3)
                        <h2 style="color: red;">Tiền cần thanh toán: {{number_format($tongtien +$ngayle +$cuoituan - $tiencoc + $tiendichvu + $tiendenbu ,0)}} VND</h2>
                        @endif
                    </div>
                </div>
                
                <form action="{{URL::to('checkout')}}" method="post" style="padding-bottom: 5px;">
                    @csrf
                    <input type="hidden" name="total" value="{{$tongtien + $tiendichvu + $ngayle +$cuoituan}}">
                   
                    <input type="hidden" name="id" value="{{$hoadon}}">
                    @if($status==3)  
                    <div class="center">
                        <input type="submit" value="Hoàn tất" class="btn btn-primary" style="width: 80px;">
                        <a href="{{URL::to('/admin/manage-order')}}" class="btn btn-primary" style="width: 80px;">Trở về</a>
                    </div>
                    @endif
                </form>
            </div>
        </session>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="Text/javascript">

        $(document).ready(function()
        {
            $(document).on('change','.type_id',function(){
            // console.log("hmm its change");

            var type_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{{URL::to('findroomName')}}',

                data:{'id':type_id},
                success:function(data)
                {
                console.log(data);
                $('#room_name').empty();
                    op+='<option value="0" selected disabled>select room name</option>';
                    for(var i=0;i<data.length;i++)
                    {


                        op+='<option value="'+data[i].id+'">'+ data[i].room_name +  '</option>';
                    }
                $('#room_name').append(op);
                    // div.find('.room_name').html(" ");
                    //     div.find('.room_name').append(op);
                },

                error:function(){

                }

                });
            });


            $(document).on('change','.room_name',function () {
            var prod_id=$(this).val();

            var a=$(this).parent();
            console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{{URL::to('findPrice')}}',
                data:{'id':room_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("price");
                    console.log(data.price);

                    // here price is coloumn name in products table data.coln name

                    a.find('.prod_price').val(data.price);

                },
                error:function(){

                }
            });


        });


        });
    </script>
@endsection
