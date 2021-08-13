@extends('admin_layout')
@section('admin_content')



<div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách tiện ích 
      </div>
      
      <div class="row w3-res-tb">
        <div class="col-sm-4 m-b-xs">
              <A href="{{URL::to('/show-page-add')}}" class="btn btn-info"><i class="fa fa-plus"></i> thêm dịch vụ</A>                
        </div>

        <div class="col-sm-3">
        </div>

        <!-- thanh search -->
        <div class="col-sm-4">
          <div class="input-group">
            <form action="{{URL::to('/list-service')}}"  >
            {{ csrf_field() }}  
            <Span>Search</Span>
                <input type="text" class="input-sm fa fa-search" name="search_uti" placeholder="Search">
                <!-- <span class="input-group-btn">             
                  <button class="btn btn-sm btn-default" name="btn_uti" type="button">Search!</button>
                </span> -->
            </form>
          </div>  
        </div>
        <!-- end search -->
      </div>
        
      <!-- show du luieu -->
      <div class="table-reponsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:10px;"></th> 
              <Th>Tên dịch vụ</th>
              <Th>giá tiện ích</th>
              <Th>ảnh</th>
              <th width="20%">Action</th>
              <th style="width:10px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($sevice as $key => $sv)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                
                <td> {{$sv->service_name}} </td>
                <td> {{$sv->service_price}} </td>
                <td> <img src="" width="70px" height="50px"> </td>
                <td>
                  <a href="{{URL::to('/edit-service/'.$sv->service_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-sevice/'.$sv->service_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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

@if(Session::has('mes_create_sv'))
  <script type="text/javascript" >
    swal("Congratulation!","{{Session::Get('mes_create_sv')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_create_sv',null);
  ?>
@endif

@if(Session::has('mes_update_sv'))
  <script type="text/javascript" >
    swal("thành công!","{{Session::Get('mes_update_sv')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_update_sv',null);
  ?>
@endif

@if(Session::has('mes_delete_sv'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('mes_delete_sv')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_delete_sv',null);
  ?>
@endif

@if(Session::has('mes_fails'))
  <script type="text/javascript" >
    swal("lỗi!","{{Session::Get('mes_update')}}","error",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_fails',null);
  ?>
@endif
@endsection