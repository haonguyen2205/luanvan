
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
            <p style="padding: 5px;">Tiền dịch vụ thêm : {{number_format($tiendichvu,0)}} VNĐ </p>
            <div class="center">
                <h2 style="padding: 5px;"><p>Dịch vụ thêm: </p></h2>
                <div style="padding: 5px;">
                    <form action="{{URL::to('capnhat')}}" method="post">
                        @csrf
                          
                         <?php 
                        echo"<h3>Bạn đã sử dụng :</h3>";
                        echo "<table border='1px'>";
                           echo" <tr>";
                               echo" <td>Tên dịch vụ</td>";
                               echo" <td>Số lượng</td>";
                               echo" <td>Đơn giá</td>";
                           echo" </tr>";
                         if($status == 3)
                         {
                            
                               if(empty($dichvu[0]))
                               {
                                foreach($service as $ser){
                                echo "<tr>";
                                echo "<td>".$ser->service_name."</td>";
                                echo "<td><input type='number' name='".$ser->name."' value=''></td>";
                                echo "<td>".number_format($ser->service_price,0)."VNĐ </td>";
                            echo "</tr>"; 
                                }
                               }
                               else if(!empty($dichvu[0])){
                                foreach($service as $ser){
                                    foreach($dichvu as $d){
                                        if($ser->service_id == $d->service_id){
                                        echo "<tr>";
                                                echo "<td>".$ser->service_name."</td>";
                                                echo "<td><input type='number' name='".$ser->name."' value='".$d->quantity."'></td>";
                                                echo "<td>".number_format($ser->service_price,0)."VNĐ </td>";
                                            echo "</tr>";                                       
                                         
                                        }
                                    }}
                                    
                                }
                                
                        
                            
                           
                        }
                        if($status==4){
                            foreach($service as $ser){
                                foreach($dichvu as $d){
                                    if($ser->service_id == $d->service_id){
                                    echo "<tr>";
                                            echo "<td>".$ser->service_name."</td>";
                                            echo "<td><input type='number' name='".$ser->name."' value='".$d->quantity."'></td>";
                                            echo "<td>".number_format($ser->service_price,0)."VNĐ </td>";
                                        echo "</tr>";                                       
                                     
                                    }
                                }}
                        }
                        echo "</table>";
                            ?>
                            <input type="hidden" name="tongtien" value="{{$tongtien}}"><br>
                            <input type="hidden" name="id" value="{{$hoadon}}">
</br>
                                   @if($status==3)         
                            <div class="center">
                                <input type="submit" value="Cập nhật" class="btn btn-primary" style="width: 80px;">
                            </div>
                            @endif
                    </form>
                </div>


                        <h2 style="padding: 5px;">Tổng cộng: {{number_format($tongtien,0)}} VNĐ</h2>
                        <h2 style="padding: 5px;">Cọc trước: {{number_format($tiencoc,0)}} VNĐ</h2>
                       @if($status ==3)
                        <h1 style="padding: 5px;">Tiền cần thanh toán: {{number_format($tongtien - $tiencoc + $tiendichvu ,0)}} VND</h1>
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
