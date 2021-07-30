@extends('admin_layout')
@section('admin_content')



<div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách tiện ích 
      </div>
      
      <div class="row w3-res-tb">
        <div class="col-sm-4 m-b-xs">
              <A href="{{URL::to('/add-uti')}}" class="btn btn-primary">thêm tiện ích</A>                
        </div>

        <div class="col-sm-5">
        </div>

        <!-- thanh search -->
        <div class="col-sm-3">
          <div class="input-group">
            <form action="{{URL::to('/list-uti')}}"  >
            {{ csrf_field() }}  
                <input type="text" class="input-sm fa fa-search" name="search_uti" placeholder="Search">
                <span class="input-group-btn">             
                  <button class="btn btn-sm btn-default" name="btn_uti" type="button">Search!</button>
                </span>
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
              <th width="30%" >Mã</th>
              <Th>Tên tiện ích</th>
              <th width="20%">Action</th>
              <th style="width:10px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($list_uti as $key => $uti)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$uti->utility_id}} </td>
                <td> {{$uti->utility_name}} </td>
                <td>
                  <a href="{{URL::to('/edit-uti/'.$uti->utility_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-uti/'.$uti->utility_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
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

@if(Session::has('mes_create_uti'))
  <script type="text/javascript" >
    swal("Congratulation!","{{Session::Get('mes_create_uti')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_create_uti',null);
  ?>
@endif

@if(Session::has('mes_update_uti'))
  <script type="text/javascript" >
    swal("thành công!","{{Session::Get('mes_update_uti')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_update_uti',null);
  ?>
@endif

@if(Session::has('mes_delete_uti'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('mes_delete_uti')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_delete_uti',null);
  ?>
@endif

@endsection