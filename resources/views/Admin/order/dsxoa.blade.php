@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        DANH SÁCH ĐƠN HÀNG ĐÃ XOÁ
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4">
          
        </div>
        
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">ID</th>
              <th>Tên người đặt</th>
              <th> Phòng </th>   
              <th>Tổng tiền</th>
              <th>Ngày nhận</th>
              <th>Ngày trả</th>
              <th>Tình trạng</th>
              <th>Tiền cọc</th>
             
            </tr>
          </thead>
          <tbody>
            

                @foreach($ds as $key)
              <tr>
                <td><label class="i-checks m-b-none"><i>{{$key['id']}}</i></label></td>
                <td> {{$key['name']}} </td>
                <td> {{$key['phong']}} </td>
               
                <td><span class="text-ellipsis">{{number_format($key['tongtien'],0)}}VND</span></td>
                <td><span class="text-ellipsis">{{$key['ngaynhan']}}</span></td>
                <td><span class="text-ellipsis">{{$key['ngaytra']}}</span></td>
                <td><span class="text-ellipsis">
                    Đã xoá
                </span></td>
                <td>{{number_format($key['deposit'],0)}} VND</td>
              </tr>
              @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
          </div>
@endsection