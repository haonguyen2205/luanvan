
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
                        <td>{{$phong}}</td>
                        <td>{{number_format($price,0) }} VND</td>
                        <td>{{$dayat}}</td>
                        <td>{{$dayout}}</td>
                        <td>{{$songay}}</td>
                        <td>{{number_format($tiencoc,0)}} VNĐ</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="center">
            <h2 style="padding-top: 5px;"><p style="padding: 5px;">Tiền dịch vụ thêm : {{number_format($tiendichvu,0)}} VNĐ </p></h2>
                <div style="padding: 5px;">
                    <form action="{{URL::to('capnhat')}}" method="post">
                        @csrf            
                        <div>            
                            <h2>Bạn đã sử dụng thêm dịch vụ:</h2>
</br>
                        </div>
                            <table class="table table-striped b-t b-light" style="border-top: double; width: 600px;">
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
                        <input type="hidden" name="tongtien" value="{{$tongtien}}"><br>
                        <input type="hidden" name="id" value="{{$hoadon}}">
                        @if($status==3)         
                        <div class="center">
                            <input type="submit" value="Cập nhật" class="btn btn-primary" style="width: 80px;">
                        </div>
                        @endif
                    </form>
                </div>
                <h2 style="padding: 5px; color: red;">Tổng cộng: {{number_format($tongtien,0)}} VNĐ</h2>
                <h2 style="padding: 5px; color: green;">Cọc trước: {{number_format($tiencoc,0)}} VNĐ</h2>
                @if($status ==3)
                <h2 style="padding: 5px;color: red;">Tiền cần thanh toán: {{number_format($tongtien - $tiencoc + $tiendichvu ,0)}} VND</h2>
                @endif
                <form action="{{URL::to('checkout')}}" method="post" style="padding: 5px;">
                    @csrf
                    <input type="hidden" name="total" value="{{$tongtien + $tiendichvu}}">
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
