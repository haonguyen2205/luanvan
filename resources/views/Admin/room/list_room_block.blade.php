@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-room')}}" > <span class="glyphicon glyphicon-bed"></span> DS phòng </a></li>
              <li><a href="{{URL::to('/list-room-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS phòng KO HĐ</a></li>
          </ul>
    <div class="panel panel-default">
      <div class="panel-heading">
        <Div>Danh sách phòng</Div>
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
        </div>
          
        <div class="col-sm-4">
        </div>
          <div class="col-sm-3">
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
              <th>Capacity</th>
              <th width="8%">số lượng tồn</th>
              <th>Giá</th>
              <th >Mô tả</th>
              <th>Tình trạng</th>
              <th >Action</th>
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
                        <img src="public/upload/rooms/{{$value->room_image}}" height="100"; width="100";>
                        </div>
                    </td>
                    <td> Loại : {{$value->type_name}} </td>
                    <td> Max : {{$value->capacity}} </td>
                    <td> {{$value->quality}} </td>
                    <td> {{number_format($value->room_price).' đ /night'}} </td>
                    <td> {{$value->room_description}} </td>
                    <td><span class="text-ellipsis">
                      @if($value->room_status==0)
                            <a href="{{URL::to('/inactive-room/'.$value->room_id)}}" style="color:red">Không hoạt động</a>
                        
                        @else 
                            <a href="{{URL::to('/active-room/'.$value->room_id)}}" style="color:green">Hoạt động</a>
                        
                        @endif
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

@endsection