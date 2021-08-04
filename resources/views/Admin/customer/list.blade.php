@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách tài khoản,thông tin khách hàng  
      </div>
          <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-users')}}" > <span class="fa fa-user"></span> Đang hoạt dộng </a></li>
              <li><a href="{{URL::to('/list-users-block')}}"><i class="glyphicon glyphicon-user"></i> tài khoản khóa(KH) </a></li>
          </ul>  
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <a href="{{URL::to('/showregister')}}" class="btn btn-info"> <span class=" fa fa-plus"></span> tạo tài khoản</a>                         
        </div>
        <div class="col-sm-4">
          
        </div>
        <div class="col-sm-3">
          <div class="input-group">
          <form action="{{URL::to('/list-users')}}" >
          <span class="">Search</span>
            <input type="text" class="input-sm fa fa-search find" name="search_cus">
            
          </form>
          </div>
          
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th><b> tên nhân viên </b></th>
              <th>email</th>
              <th>số điện thoại</th>
              <th>địa chỉ nhà</th>
              <th>CRUD</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($listCus as $key => $cus)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$cus->name}} </td>
                <td> {{$cus->email}} </td>
                <td> {{$cus->phone}} </td>
                <td> {{$cus->address}} </td>
                <td>
                  <!-- <a href="{{URL::to('/delete-cus/'.$cus->users_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a> -->
                  <a href="{{URL::to('/delete-cus/'.$cus->users_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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
          {{$listCus->links()}}
          </div>
        </div>
      </footer>
    </div>
          </div>
          
@if(Session::has('dlt-success'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('dlt-success')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('dlt-success',null);
  ?>
@endif
@endsection