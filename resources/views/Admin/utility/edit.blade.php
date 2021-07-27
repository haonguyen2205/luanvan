@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                chỉnh sửa tên tiện ích 
            </header>
            <div class="panel-body">
                @foreach($edit_uti as $key => $uti)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-uti/'.$uti->utility_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã T.I</label>
                                <input type="text" value="{{$uti->utility_id}}" readonly class="form-control" id="exampleInputEmail1" name="uti_id">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên loại</label>
                                <input type="text" value="{{$uti->utility_name}}" class="form-control" id="exampleInputEmail1" name="uti_name">
                            </div>

                            <button type="submit" class="btn btn-info" name="updateType">submit</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>

@if(Session::has('mes_update_uti'))
  <script type="text/javascript" >
    swal("thành công!","{{Session::Get('mes_update')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('mes_update',null);
  ?>
@endif

@endsection