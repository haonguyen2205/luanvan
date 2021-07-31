
@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <ul class="nav nav-tabs">
          <li><a href="{{URL::to('/list-type')}}"> <span class="glyphicon glyphicon-bed"></span> DS loại phòng </a></li>
          <li><a href="{{URL::to('/list-type-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS khóa</a></li>
      </ul>
      <div class="panel-heading">
        Danh sách loại phòng
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <a href="{{URL::to('/add-type')}}" class="btn btn-info"><i class="fa fa-plus"></i> thêm loại phòng</a>              
        </div>
        <div class="col-sm-4">
          
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <form action="{{URL::to('/list-type')}}"  method="get">
              <input type="text" class="input-sm  fa fa-search" name="search_type" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" name="btn_type" type="button">Search!</button>
              </span>
            </form>
          </div>
          
        </div>
      </div>

      <!-- // show dữ liệu -->
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>mã loại</th>
              <th>Tên loại</th>
              <th> số lượng phòng</th>
              <th>tối đa</th>
              <th>Trạng thái</th>
              <th>Display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($listType as $key => $type)
              <tr>
              <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$type->type_id}} </td>
                <td> {{$type->type_name}} </td>
                <td> {{$type->quality}} </td>
                <td> {{$type->capacity}} người </td>
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
    <!-- end show dữ liệu -->

      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">                
          {{$listType->links()}}
          </div>
        </div>
      </footer>

    </div>
</div>

@if(Session::has('mes_inact'))
  <script type="text/javascript" >
    swal("Chmmm!","{{Session::Get('mes_inact')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_inact',null);
  ?>
@endif

@if(Session::has('mes_act'))
  <script type="text/javascript" >
    swal("Chmmm!","{{Session::Get('mes_act')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_act',null);
  ?>
@endif

@if(Session::has('mes_create'))
  <script type="text/javascript" >
    swal("Congratulation!","{{Session::Get('mes_create')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_create',null);
  ?>
@endif

@if(Session::has('mes_delete'))
  <script type="text/javascript" >
    swal("thông báo","{{Session::Get('mes_delete')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_delete',null);
  ?>
@endif

@if(Session::has('mes_update'))
  <script type="text/javascript" >
    swal("Báo cáo đọi trưởng!","{{Session::Get('mes_update')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_update',null);
  ?>
@endif
@endsection