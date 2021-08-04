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
                            <input type="text" value="{{$edit_type->type_id}}" readonly disabled class="form-control my-2"  name="typeName">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <input type="text" value="{{$edit_type->type_name}}" required class="form-control my-2" name="typeName">
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số lượng phòng </label>
                            <input type="number" class="form-control my-2" value="{{$edit_type->quality}}" min="1" max="12" name="quality">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số người tối đa </label>
                            <input type="number" class="form-control my-2" value="{{$edit_type->capacity}}" min="1" max="6" name="capacity">
                        </div>

                        <button type="submit" class="btn btn-info" name="updateType">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection