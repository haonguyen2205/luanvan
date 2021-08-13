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
              <li><a href="{{URL::to('/list-empty-room')}}" ><span class="glyphicon glyphicon-bed"></span> tìm phòng rỗng</a></li>
              <li><a href="{{URL::to('/list-of-occupied')}}" ><span class="glyphicon glyphicon-bed"></span> phòng có khách ở trong ngày</a></li>
          </ul>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
                          
        </div>
          
        <div class="col-sm-3">
        </div>
          <div class="col-sm-4">
            <div class="input-group">
              <form action="{{URL::to('/search-room')}}" method="post">
              {{ csrf_field() }}
                <input type="text" class="input-sm fa fa-search" name="keyword" placeholder="Search">
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" value="submit" type="button">Go!</button>
                </span>
              </form>
            </div>
          </div>
      </div>

      <!-- show data in site -->
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th width="8%">Tên phòng</th>
              <th width="8%" >Hình ảnh</th>
              <th width="10%">Loại phòng</th>
              <th width="8%">số người</th>
              <th width="8%">số lượng</th>
              <th>Giá</th>
              <th >Mô tả</th>
              <th>Tình trạng</th>
              <th >Action</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($listRoom as $key => $val)
                <tr>
                    <td><label class="i-checks m-b-none"><i></i></label></td>
                    <td> {{$val->room_name}} </td>
                    <td>
                        <div class="single-room-pic">
                        <img src="public/upload/rooms/{{$val->image}}" height="100"; width="150";>
                        </div>
                    </td>
                    <td> Loại : {{$val->type_name}} </td>
                    <td> Max : {{$val->capacity}} </td>
                    <td> {{$val->quality}} </td>
                    <td> {{number_format($val->room_price).' đ /ngày'}} </td>
                    <td> {{$val->room_description}} </td>
                    <td><span class="text-ellipsis">
                      @if($val->room_status==0)
                            <a href="{{URL::to('/inactive-room/'.$val->room_id)}}" style="color:red">Không hoạt động</a>
                        
                        @else 
                            <a href="{{URL::to('/active-room/'.$val->room_id)}}" style="color:green">Hoạt động</a>
                        
                        @endif
                        </span>
                    </td> 
                    <td >
                    <a href="{{URL::to('/edit-room/'.$val->room_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    
                    </a> 
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

@endsection