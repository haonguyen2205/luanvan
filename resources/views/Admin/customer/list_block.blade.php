@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách tài khoản,thông tin khách hàng
      </div>
        <div class="panel-body">
                <li><a href="{{URL::to('/list-users')}}" data-toggle="tab"> <span class="glyphicon glyphicon-bed"></span> Đang hoạt dộng </a></li>
                <li><a href="{{URL::to('/list-users-block')}}" data-toggle="tab"><span class="glyphicon glyphicon-bed"></span> Đã xóa(khóa) </a></li>
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
                $msg = Session::get('msg');
                if($msg) {
                    echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                    Session::put('msg',null);
                }
            ?>
        <div class="col-sm-4">
            <div class="input-group">
                <form action="{{URL::to('/list-users')}}" >
                    <input type="text" class="input-sm form-control" name="search_cus">
                    <span class="input-group-btn">
                    <!-- <button class="btn btn-sm btn-default" type="search_cus">Go!</button> -->
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
              <th>tên nhân viên</th>
              <th>email</th>
              <th>số điện thoại</th>
              <th>địa chỉ nhà</th>
              <th>CRUD</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cusblock as $key => $cusblock)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$cusblock->name}} </td>
                <td> {{$cusblock->email}} </td>
                <td> {{$cusblock->phone}} </td>
                <td> {{$cusblock->address}} </td>
                <td>
                  <!-- <a href="{{URL::to('/delete-cus/'.$cus->users_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a> -->
                  <a href="{{URL::to('/delete-cus/'.$cusblock->users_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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