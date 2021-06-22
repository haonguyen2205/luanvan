@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    CẬP NHẬT THÔNG TIN NHÂN VIÊN
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
                @foreach ($editStaff as $key => $edit_staff)
                    <form role="form" action="{{URL::to('/update_staff/'.$edit_staff->users_id)}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ Tên</label>
                            <input type="text" class="form-control" value="{{$edit_staff->name}}" min="3" max="50" name="name" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" readonly value="{{$edit_staff->email}}"  min="3" max="50" name="email" placeholder="nguoinaodo@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số điện thoại</label>
                            <input type="text" class="form-control" value="{{$edit_staff->phone}}" min="3" max="50" name="phone" required="">
                        </div>
                        <span style="color: red;">{{$errors->first('phone')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">địa chỉ </label>
                            <input type="text" class="form-control" value="{{$edit_staff->address}}" min="3" max="50" name="address">
                        </div>
                        <span style="color: red;">{{$errors->first('address')}}</span>
                        <button type="submit" class="btn btn-info" name="update_Staff">Submit</button>
                    </form>

                @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
@endsection