@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM LOẠI PHÒNG
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
                    <form role="form" action="{{URL::to('/add-type-action')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="typeName">
                        </div><span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng phòng dự kiến</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" min="1" max="5" name="quality">
                        </div><span style="color: red;">{{$errors->first('quality')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số người tối đa</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" min="1" max="5" name="capacity">
                        </div><span style="color: red;">{{$errors->first('capacity')}}</span>

                        
                        <div class="form-group">
                            <label for="exampleInputFile">Trạng thái</label>
                            <select name="typeStatus" class="form-control m-bot15">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tiện ích :  </label></br>
                            <label for="exampleInputEmail1"></label></br>
                            @foreach ($utility as $key => $uti)
                            <input type="checkbox"  value="{{$uti->utility_id}}"  name="tienich[]">
                                {{$uti->utility_name}} 
                                <img src="{{URL::to('/public/upload/utility/'.$uti->utility_image)}}" weight="30" height="30" width="35"/>&nbsp;|&nbsp;
                            @endforeach
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>
                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>

                    <ul class=" alert text-danger">
                    @foreach ($errors->all() as $error) 
                    
                        <li>{{$error}}</li>
                    
                    @endforeach
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
      
            <!-- <div class="my-5">
                <div class="container">
                    <div class="row">
                        <div class="dsa owl-theme ">
                            @foreach($img as $imgroom)
                                <div class="item">
                                    <div class="col md-3 mt-3">
                                        <div class="cart">
                                            <img src="{{asset('public/upload/rooms/'.$imgroom->room_image)}}" width="250" height="150">
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>   -->

@if(Session::has('mes_tienich'))
  <script type="text/javascript" >
    swal("FAILS!","{{Session::Get('mes_tienich')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_tienich',null);
  ?>
@endif


<Script>
    $('.dsa').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</Script>

<script>
    .cart({
        display:block,
    })
</script>

@endsection