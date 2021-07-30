@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <Div>Danh sách phòng</Div>
    </div>
    <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-room')}}" > <span class="glyphicon glyphicon-bed"></span> DS phòng </a></li>
              <li><a href="{{URL::to('/list-room-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS phòng KO HĐ</a></li>
          </ul>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
           <a href="{{URL::to('/add-room')}}" class="btn btn-info fa fa-plus"> thêm phòng</a>       
        </div>
        <div class="col-sm-4">
          
        </div>
          <div class="col-sm-3">
            <div class="input-group">
              <form action="{{URL::to('/search-room')}}" method="post">
              {{ csrf_field() }}
                <input type="text" class="input-sm form-control" name="keyword" placeholder="Search">
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" value="submit" type="button">Go!</button>
                </span>
              </form>
            </div>
          </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th width="10%">Tên phòng</th>
              <th width="25%" >Hình ảnh</th>
              <th width="15%">Loại phòng</th>

              <th>Giá</th>
              <th>Tình trạng</th>
              <th width="5%">Action</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($listRoom as $key => $value)

              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$value->room_name}} </td>
                <td>
                    <div class="single-room-pic">
                      <img src="public/upload/rooms/{{$value->image}}" height="150"; width="250";>
                    </div>
                </td>
                <td> Loại : {{$value->type_name}} </td>

                <td> {{number_format($value->room_price).' đ /night'}} </td>
                 <td><span class="text-ellipsis">
                  <?php
                    if($value->room_status==0) {
                  ?>
                  <a href="{{URL::to('/inactive-room/'.$value->room_id)}}" style="color:red">Không hoạt động</a>
                  <?php
                  }
                  else {
                  ?>
                    <a href="{{URL::to('/active-room/'.$value->room_id)}}" style="color:green">Hoạt động</a>
                  <?php
                    }
                  ?>
                  </span>
                </td> 
                <td >
                  <a href="{{URL::to('/edit-room/'.$value->room_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <!-- <a href="{{URL::to('/delete-room/'.$value->room_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a> -->
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs"> 
          {{$listRoom->links()}}               
          </div>
        </div>
      </footer>
    </div>
          </div>


  @if(Session::has('mes_createRoom'))
    <script type="text/javascript" >
      swal("Congratulation!","{{Session::Get('mes_createRoom')}}","success",{
        button:"OK",
      });
      <?php
      session::put('mes_createRoom',null);
    ?>
    </script> 
    
  @endif   
      
  @if(Session::has('mes_updateRoom'))
    <script type="text/javascript" >
      swal("Congratulation!","{{Session::Get('mes_updateRoom')}}","success",{
        button:"OK",
      });
      <?php
      session::put('mes_updateRoom',null);
    ?>
    </script> 
  @endif

  @if(Session::has('mes_act_room'))
    <script type="text/javascript" >
      swal("Congratulation!","{{Session::Get('mes_act_room')}}","error",{
        button:"OK",
      });
      <?php
      session::put('mes_act_room',null);
    ?>
    </script> 
  @endif

  @if(Session::has('mes_update_fail'))
    <script type="text/javascript" >
      swal("oh Failed!","{{Session::Get('mes_update_fail')}}","error",{
        button:"OK",
      });
      <?php
      session::put('mes_update_fail',null);
    ?>
    </script> 
  @endif
@endsection