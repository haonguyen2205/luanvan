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
              <th style="width:20px;"></th>
              <th>Tên người đặt</th>
              <th> Phòng </th>
              <th> Số lượng </th>
              <th>Tổng tiền</th>
              <th>Tình trạng</th>
              <th style="width:30px;"></th>
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
            @foreach($all_order as $key => $order)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$order->name}} </td>
                <td> {{$order->room_name}} </td>
                <td> {{$order->room_qty}} </td>
                <td><span class="text-ellipsis">{{$order->total}}</span></td>
                <td><span class="text-ellipsis">{{$order->status}}</span></td>
                <td>
                  <a href="{{URL::to('/delete-orders/'.$order->order_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
          </div>
@endsection