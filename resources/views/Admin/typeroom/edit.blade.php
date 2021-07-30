@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật loại sản phẩm 
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                @foreach($edittype as $key => $edit_type)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-type/'.$edit_type->type_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã loại phòng</label>
                            <input type="text" value="{{$edit_type->type_id}}" readonly class="form-control" id="exampleInputEmail1" name="typeName">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <input type="text" value="{{$edit_type->type_name}}" required class="form-control" id="exampleInputEmail1" name="typeName">
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng phòng </label>
                            <input type="number" class="form-control" id="exampleInputEmail1" min="1" max="5" name="quality">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Trạng thái</label>
                            <select name="typeStatus" class="form-control m-bot15">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <span style="color: red;">{{$errors->first('typeStatus')}}</span>
                        <!-- <div class="form-group">
                                <label for="exampleInputEmail1">tiện ích :  </label></br>
                                <label for="exampleInputEmail1"></label></br>
                                @foreach ($utility as $key => $uti)
                                    @if($edit_type->type_id ==$uti->type_id)
                                    <input type="checkbox" ischecked="checked"  value="{{$uti->utility_id}}" name="tienich[]">
                                    {{$uti->utility_name}}
                                    @else
                                    <input type="checkbox"  value="{{$uti->utility_id}}" name="tienich[]">
                                    {{$uti->utility_name}}
                                    @endif
                                @endforeach
                        </div> -->

                        <button type="submit" class="btn btn-info" name="updateType">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection