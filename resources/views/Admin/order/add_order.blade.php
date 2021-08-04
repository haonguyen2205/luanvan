
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
                    
                    <form role="form" action="{{URL::to('/add_order')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <input type="hidden" name="start_time" value="{{$start}}">
                        <input type="hidden" name="end_time" value="{{$endt}}">
                        <div class="form-group">
                        <label for="exampleInputEmail1">người đặt phòng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{Session::Get('name_admin')}}" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <span style="color: red;">{{$errors->first('name')}}</span>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Adults</label>
                                <input type="number" class="form-control" min="1" max="2" id="exampleInputEmail1" name="adults" required>
                            </div> 
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Kids</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" min="0" max="2" name="children" required>
                            </div> 
                        </div>
                        <label for="exampleInputEmail1">Căn cước công dân</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" min="10" max="12" name="CMND" required>
                        <label for="exampleInputEmail1">tổng tiền</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" min="10" max="12" name="CMND" required>

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