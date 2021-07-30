@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật phòng
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="position-center">
                    @foreach($editRoom as $key=>$valueRoom)
                        <form role="form" action="{{URL::to('/update-room/'.$valueRoom->room_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                value="{{$valueRoom->room_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" id="exampleInputEmail1"  name="image">
                                
                                <img src="{{URL::to('/public/upload/rooms/'.$valueRoom->image)}}" height="100" weight="100"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Loại</label>
                                <select name="type" class="form-control m-bot15">
                                    <option value="{{$valueRoom->type_id}}">{{$valueRoom->type_name}}</option>
                                    @foreach($editType as $key=>$valueType)
                                    <option value="{{$valueType->type_id}}">{{$valueType->type_name}}</option>
                                    @endforeach 
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea style="resize:none" rows="8" class="form-control" name="description" id="exampleInputPassword1">
                                    {{$valueRoom->room_description}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="price"
                                value="{{$valueRoom->room_price}}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputFile">Tình trạng</label>
                                <select name="status" class="form-control m-bot15">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div> -->
                            <button type="submit" class="btn btn-info" name="addRoom">Submit</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@if(Session::has('mes_update_fail'))
    <script type="text/javascript" >
      swal("Congratulation!","{{Session::Get('mes_update_fail')}}","error",{
        button:"OK",
      });
      <?php
      session::put('mes_update_fail',null);
    ?>
    </script> 
  @endif
@endsection