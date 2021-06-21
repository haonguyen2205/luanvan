@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách loại phòng
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
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
          
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>mã loại</th>
              <th>Tên loại</th>
              <th>Trạng thái</th>
              <th>Display</th>
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
            @foreach($listType as $key => $type)
              <tr>
              <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$type->type_id}} </td>
                <td> {{$type->type_name}} </td>

                <td><span class="text-ellipsis">
                    <?php
                      if($type->status==0) {
                    ?>
                      <a href="{{URL::to('/inactive-type/'.$type->type_id)}}" style="color:red">Không hoạt động</a>
                    <?php
                      }
                      else {
                    ?>
                      <a href="{{URL::to('/active-type/'.$type->type_id)}}" style="color:green">Đang hoạt động</a>
                    <?php
                      }
                    ?>
                  </span>
                </td>
                <td>
                  <a href="{{URL::to('/edit-type/'.$type->type_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-type/'.$type->type_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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