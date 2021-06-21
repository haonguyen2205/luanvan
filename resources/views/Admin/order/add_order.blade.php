
@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Đặt phòng theo yêu cầu khách hàng
            </header>
           
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add_order')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                        <div class="form-group">
                        <label for="exampleInputEmail1">người đặt phòng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputFile">loại phòng</label>
                            <select name="type" class="form-control m-bot15 type_id" id="type_id" onchance>
                            <option value="0" disabled="true" selected="true">-Select-</option>
                            @foreach($type_room as $key => $type)
                                <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">tên phòng</label>
                            
                            <select name="type" class="room_name form-control" id="room_name">
                                <option value="0" disabled="true" selected="true">choose name</option>
                            </select>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ngày đặt phòng : </label>
                            <input  type="date" class="form-control" id="exampleInputEmail1" name="day_order" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng người lớn</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="adults" required>
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng trẻ em</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="children" required>
                        </div> 

                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ngày nhận phòng</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="dayat" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ngày trả phòng</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="dayout" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng phòng</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="room_qty" required>
                        </div> 
                        <span style="color: red;">{{$errors->first('quality')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="price" required> 
                        </div>
                        <span style="color: red;">{{$errors->first('price')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">tổng tiền</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="price" required> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">sô tiền cần cọc</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="price" required> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Tình trạng</label>
                            <select name="status" class="form-control m-bot15">
                                <option value="1">chờ xác nhận</option>
                                <option value="0">đã xác nhận</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="addorder">Submit</button>
                    </form>

                </div>
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