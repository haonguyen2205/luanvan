@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <Div>Danh sách phòng</Div>
    </div>
          <ul class="nav nav-tabs">
              <li><a href="{{URL::to('/list-room')}}" > <span class="glyphicon glyphicon-bed"></span> DS phòng </a></li>
              <li><a href="{{URL::to('/list-room-block')}}" ><span class="glyphicon glyphicon-bed"></span> DS phòng KO HĐ</a></li>
              <li><a href="{{URL::to('/list-empty-room')}}" ><span class="glyphicon glyphicon-bed"></span> tìm phòng rỗng</a></li>
          </ul>
        <div class="row w3-res-tb">
          <form class="form-group" action="{{URL::To('/check-avalibility')}}" method="get">
          {{ csrf_field() }}
              <div class="row">

                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control date" type="date" name="start_time" id="start_time" value="{{ request()->input('start_time') }}" placeholder="{{ trans('cruds.event.fields.start_time') }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control date" type="date" name="end_time" id="end_time" value="{{ request()->input('end_time') }}" placeholder="{{ trans('cruds.event.fields.end_time') }}" required>
                    </div>
                </div>
               
                <div class="col-md-2">
                    <button class="btn btn-success">
                        tìm kiếm
                    </button>
                </div>
            </div>  
          </form>
      
        </div>

</div>

@if(Session::has('mes_saingay'))
    <script type="text/javascript" >
      swal("Thông b!","{{Session::Get('mes_saingay')}}","error",{
        button:"OK",
      });
      <?php
      session::put('mes_saingay',null);
    ?>
    </script> 
  @endif
@endsection
