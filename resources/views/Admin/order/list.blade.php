@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        DANH SÁCH ĐƠN HÀNG
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
              <th style="width:20px;">ID</th>
              <th>Tên người đặt</th>
              <th> Phòng </th>
              <th> Số lượng </th>
              <th>Tổng tiền</th>
              <th>Ngày nhận</th>
              <th>Ngày trả</th>
              <th>Tình trạng</th>
              <th style="width:30px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $msg = Session::get('msg');
                if($msg) {
                    echo "<b style='color:green'>".$msg."</b>";
                    Session::put('msg',null);
                }
            ?>
            @var_dump($list);

<!--@foreach($list as $key)
              <tr>
                <td><label class="i-checks m-b-none"><i>{{$key['id']}}</i></label></td>
                <td> {{$key['name']}} </td>
                <td> {{$key['phong']}} </td>
                <td> {{$key['soluong']}} </td>
                <td><span class="text-ellipsis">{{number_format($key['tongtien'],0)}} VND </span></td>
                <td><span class="text-ellipsis">{{$key['ngaynhan']}}</span></td>
                <td><span class="text-ellipsis">{{$key['ngaytra']}}</span></td>
                <td><span class="text-ellipsis">
                    <?php if($key['tinhtrang']==0)
                       echo "Tiếp nhận";
                    else if ($key['tinhtrang'] == 1)
                       echo "Đã cọc";
                    else 
                        echo "Đã trả phòng";
                    ?>              
                
                </span></td>
                <td>
                  <a href="#chi tiết" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
          @foreach-->
          </tbody>
        </table>
      </div>
    </div>
          </div>
@endsection