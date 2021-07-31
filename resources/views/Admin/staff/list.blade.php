@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách nhân viên
      </div>
      <div>
          <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-staff')}}" > <span class="glyphicon glyphicon-bed"></span> DS Nhân Viên </a></li>
              <li><a href="{{URL::to('/list_staff/list-staff-block')}}"><span class="glyphicon glyphicon-bed"></span> DS khóa</a></li>
          </ul>
        </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4 m-b-xs">
              <a href="{{URL::to('/page_add_staff')}}" class="btn btn-info"><i class="fa fa-plus"></i> thêm nhân viên</a> 
        </div>

        <div class="col-sm-5">

        </div>

        <!-- thanh search -->
        <div class="col-sm-3">
          <div class="input-group">
            <form action="{{URL::to('/list_staff')}}"  >
            {{ csrf_field() }}  
                <input type="text" class="input-sm fa fa-search" name="search_staff" placeholder="Search">
                <span class="input-group-btn">             
                  <button class="btn btn-sm btn-default" type="button">Go!</button>
                </span>
            </form>
          </div>
        </div>
        <!-- end search -->
      </div>

      <!-- show data in table -->
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>tên nhân viên</th>
              <Th>avatar</th>
              <Th>chức vụ</th>
              <th>email</th>
              <th>số điện thoại</th>
              <th>địa chỉ nhà</th>
              <th>CRUD</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($liststaff as $key => $staff)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$staff->name}} </td>
                <td>
                    <div class="single-room-pic">
                      <img src="public/upload/staff/{{$staff->users_image}}" height="100"; width="100";>
                    </div>
                </td>
                <td> {{$staff->postion_name}} </td>
                <td> {{$staff->email}} </td>
                <td> {{$staff->phone}} </td>
                <td> {{$staff->address}} </td>
                <td>
                  <a href="{{URL::to('/edit_staff/'.$staff->users_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-staff/'.$staff->users_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- end show data -->


      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">
          <!-- link chuyển trang                 -->
            {{$liststaff->links()}} 
          </div>
        </div>
      </footer>
    </div>
          </div>
@endsection
