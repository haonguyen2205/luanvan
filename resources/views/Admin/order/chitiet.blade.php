
@extends('admin_layout')

@section('admin_content')
<div class="row">
        <div>
            <section class="panel">
                <header class="panel-heading">
                    Chi tiết đơn đặt phòng
                </header>
                <div class="center">
                    <button class="btn btn-primary"><a href="{{URL::to('back')}}" style="color:white;">Quay lại</a></button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" style="padding: 20px;">
                        <!-- <thead>
                            <tr>
                                <td>Người đặt phòng</td>
                                <td>Tên phòng</td>
                                <td>Ngày đặt phòng : </td>
                                <td>Số lượng người lớn</td>
                                <td>Số lượng trẻ em</td>
                                <td>Ngày nhận phòng</td>
                                <td>Ngày trả phòng</td>
                                <td>Số lượng phòng</td>
                                <td>Giá</td>
                                <td>Số tiền cọc trước</td>
                                <td>Tổng tiền</td>
                                <td>Tình trạng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$room->room_name}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->adults}}</td>
                                <td>{{$order->children}}</td>
                                <td>{{$order->dayat}}</td>
                                <td>{{$order->dayout}}</td>
                                <td>{{$detail->room_qty}}</td>
                                <td>{{number_format($room->room_price,0)}}VND</td>
                                <td>{{number_format($order->deposit,0)}} VND</td>
                                <td>{{number_format($order->total,0)}}VND</td>
                                <td>
                                    @if($order->status==1)
                                    <a style="color:red" href="{{URL::to('uptt',$order->order_id)}}">Chờ xác nhận</a>
                                    @endif
                                        @if($order->status==2)
                                        <a style="color:black" href="{{URL::to('uptt',$order->order_id)}}">Đã xác nhận</a>;
                                    @endif
                                        @if($order->status==3)
                                        <a style="color:green" href="{{URL::to('uptt',$order->order_id)}}">Đã lấy phòng</a>;
                                    @endif
                                        @if($order->status==4)
                                        <p style="color:blue">Hoàn thành</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody> -->


                        <tr>
                                <td><label for="exampleInputEmail1">Người đặt phòng</label></td>
                                <td><span style="color: red;">{{$user->name}}</span></td>
                        </tr>
                        <tr>
                            <td>   <label for="exampleInputFile">Tên phòng</label></td>
                            <td> <span style="color: red;">{{$room->room_name}}</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputEmail1">Ngày đặt phòng : </label></td>
                            <td>  <span style="color: red;">{{$order->created_at}}</span></td>
                        </tr>
                        <tr>
                            <td> <label for="exampleInputEmail1">Số lượng người lớn</label></td>
                            <td> <span style="color: red;">{{$order->adults}}</span></td>
                        </tr>
                        <tr>
                            <td>   <label for="exampleInputEmail1">Số lượng trẻ em</label></td>
                            <td><span style="color: red;">{{$order->children}}</span></td>
                        </tr>
                        <tr>
                            <td><label for="exampleInputEmail1">Ngày nhận phòng</label></td>
                            <td>   <span style="color: red;">{{$order->dayat}}</span></td>
                        </tr>
                        <tr>
                            <td>   <label for="exampleInputEmail1">Ngày trả phòng</label></td>
                            <td>   <span style="color: red;">{{$order->dayout}}</span></td>
                        </tr>
                        <tr>
                            <td>   <label for="exampleInputEmail1">Số lượng phòng</label></td>
                            <td>  <span style="color: red;">{{$detail->room_qty}}</span></td>
                        </tr>
                        <tr>
                            <td>   <label for="exampleInputEmail1">Giá</label></td>
                            <td><span style="color: red;">{{number_format($room->room_price,0)}}VND</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputFile">Số tiền cọc trước</label></td>
                            <td><span style="color: red;">{{number_format($order->deposit,0)}} VND</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputEmail1">Tổng tiền</label></td>
                            <td> <span style="color: red;">{{number_format($order->total,0)}}VND</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputFile">Tình trạng</label></td>
                            <td>@if($order->status==1)
                                <a style="color:red" href="{{URL::to('uptt',$order->order_id)}}">Chờ xác nhận</a>
                                @endif
                                    @if($order->status==2)
                                    <a style="color:black" href="{{URL::to('uptt',$order->order_id)}}">Đã xác nhận</a>;
                                @endif
                                    @if($order->status==3)
                                    <a style="color:green" href="{{URL::to('uptt',$order->order_id)}}">Đã lấy phòng</a>;
                                @endif
                                    @if($order->status==4)
                                    <p style="color:blue">Hoàn thành</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="center">
                    @if($order->status == 3)
                        <button class="btn btn-primary"><a href="{{URL::to('thanhtoan' ,$order->order_id)}}" style="color:white">Thanh toán</a></button>
                    @endif
                    @if($order->status == 4)
                        <button class="btn btn-primary"><a href="{{URL::to('thanhtoan' ,$order->order_id)}}" style="color:white">Xem đơn</a></button>
                    @endif
                </div>
            </section>
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
