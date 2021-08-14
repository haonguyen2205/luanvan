@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                    CẬP NHẬT THÔNG TIN NHÂN VIÊN
            </header>
            <div class="panel-body">

                <!-- nhập thong tin chinh sua -->
                <div class="position-center">
                    @foreach ($editStaff as $key => $edit_staff)
                        <form role="form" action="{{URL::to('/update_staff/'.$edit_staff->users_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input type="text" class="form-control" value="{{$edit_staff->name}}" min="3" max="50" name="name" required>
                            </div>
                            <span style="color: red;">{{$errors->first('name')}}</span>

                            <div class="form-group">
                                <label for="exampleInputEmail1">ảnh cá nhân </label>
                                <input type="file" class="form-control" accept="image/*" min="3" max="50" name="image">
                                <img src="{{URL::to('/public/upload/staff/'.$edit_staff->users_image)}}" height="100" weight="100"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">số điện thoại</label>
                                <input type="text" class="form-control" value="{{$edit_staff->phone}}" min="3" max="50" name="phone" required="">
                            </div>
                            <span style="color: red;">{{$errors->first('phone')}}</span>

                            <div class="form-group">
                                <label for="exampleInputEmail1">địa chỉ </label>
                                <input type="text" class="form-control" value="{{$edit_staff->address}}" minlength="3" maxlength="70" name="address">
                            </div>
                            <span style="color: red;">{{$errors->first('address')}}</span>

                            <button type="submit" class="btn btn-info" name="update_Staff">Submit</button>
                        </form>
                    @endforeach
                </div>
                <!-- het form thong tin chinh sua -->
            </div>
        </section>

    </div>
</div>
@endsection