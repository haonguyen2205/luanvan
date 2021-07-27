@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    THÊM NHÂN VIÊN
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<h3 style='color:red; padding-left:500px;'>".$msg."</h3>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add_staff')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ Tên</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="name" required>
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ảnh cá nhân </label>
                            <input type="file" class="form-control" id="exampleInputEmail1" accept="image/*" min="3" max="50" name="image">
                            <img class="col-sm-6" id="preview"  src="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"  min="3" max="50" name="email" placeholder="nguoinaodo@gmail.com" required>
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số điện thoại</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="phone" required="">
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">địa chỉ </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="address">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">chức vụ </label>
                            <select  class="mdb-select md-form" name="">
                                <option value="1">lễ tân</option>
                                <option value="2">kế toán</option>
                                <option value="3">lao công</option>
                                <option value="4">quản lý</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>

                    
                </div>
            </div>
        </section>

    </div>
</div>
@endsection