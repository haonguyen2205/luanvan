@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách nhân viên
      </div>
      <div>
          <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list_staff')}}"> <span class="glyphicon glyphicon-bed"></span> DS Nhân Viên </a></li>
              <li><a href="{{URL::to('/list_staff/list-staff-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS khóa</a></li>
          </ul>
        </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <!-- <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>  -->
        </div>
        <!-- model poppup hien thi thog bao -->
            <div class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">
                      <?php
                          $message =Session::Get('message');	
                          if($message)
                              echo $message;
                              Session::put('message', null);
                        ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
         
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
          <form action="{{URL::to('/search_staff')}}" method="post" >
              <input type="text" class="input-sm fa fa-search" name="search_staff" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
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
              <Th>ảnh </Th>
              <th>email</th>
              <th>số điện thoại</th>
              <th>địa chỉ nhà</th>
              <th>action</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($liststaff as $key => $staff)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$staff->name}} </td>
                <td> <div class="single-room-pic">
                      <img src="public/upload/staff/{{$staff->users_image}}" height="100"; width="100";>
                    </div>
                </td>
                <td> {{$staff->email}} </td>
                <td> {{$staff->phone}} </td>
                <td> {{$staff->address}} </td>
                <td>
                  <!-- <a href="{{URL::to('/edit_staff/'.$staff->users_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a> -->
                  <a href="{{URL::to('/delete-staff/'.$staff->users_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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
           <!-- link chuyển trang -->
          </div>
        </div>
      </footer>
    </div>
          </div>
@endsection
