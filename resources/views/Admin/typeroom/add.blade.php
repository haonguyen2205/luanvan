@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM LOẠI PHÒNG
            </header>
            <div class=" panel-body">
                    <!-- form nhập dữ liệu loại phòng  -->
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add-type-action')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label >Tên loại</label>
                            <input type="text" class="form-control my-2" id="exampleInputEmail1" min="3" max="50" name="typeName">
                        </div><span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label >số lượng phòng dự kiến</label>
                            <input type="number" class="form-control my-2" id="exampleInputEmail1" min="1" max="5" name="quality">
                        </div><span style="color: red;">{{$errors->first('quality')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số người tối đa</label>
                            <input type="number" class="form-control my-2" id="exampleInputEmail1" min="1" max="5" name="capacity">
                        </div><span style="color: red;">{{$errors->first('capacity')}}</span>

                        
                        <div class="form-group">
                            <label for="exampleInputFile">Trạng thái</label>
                            <select name="typeStatus" class="form-control my-2 m-bot15">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="exampleInputEmail1">tiện ích :  </label></br>
                            <label for="exampleInputEmail1"></label></br>
                            @foreach ($utility as $key => $uti)
                            <input type="checkbox"  value="{{$uti->utility_id}}"  name="tienich[]">
                                {{$uti->utility_name}} 
                                <img src="{{URL::to('/public/upload/utility/'.$uti->utility_image)}}" weight="30" height="30" width="35"/> &nbsp;|&nbsp;
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
                
                    <!--End form nhập dữ liệu loại phòng  -->
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