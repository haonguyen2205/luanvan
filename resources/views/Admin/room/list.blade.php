@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách phòng
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
            <?php
              $message =Session::Get('message');	
              if($message)
                  echo $message;
                  Session::put('message', null);
            ?>
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
              <th>Tên phòng</th>
              <th>Hình ảnh</th>
              <th>Loại phòng</th>
              <th>Mô tả</th>
              <th>số lượng</th>
              <th>Giá</th>
              <th>Tình trạng</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $msg = Session::get('msg');
                if($msg) {
                    echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                    Session::put('msg',null);
                }
            ?>
           
            @foreach($listRoom as $key => $value)

              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$value->room_name}} </td>
                
                <td>
                  <div class="single-room-pic">
                    <img src="public/upload/rooms/{{$value->room_image}}" height="100"; width="100";>
                  </div>
                </td>

                <td> {{$value->type_name}} </td>
                <td> {{$value->room_description}} </td>
                <td> {{$value->quality}} </td>
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
                <td>
                  <a href="{{URL::to('/edit-room/'.$value->room_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-room/'.$value->room_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
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
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
          </div>
@endsection