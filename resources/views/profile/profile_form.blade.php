@extends('profile_layout')
@section('customer_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CUSTOMER PROFILE
            </header>
            <div class="panel-body">

                <div class=col-md-4>

                @foreach($datacus as $key => $cus_info)
                <h2 margin_left="30px"> thông tin tài khoản: </h2>
                <table class="table" bordere="1">
                        <tr>
                            <td><label for="exampleInputEmail1">tên người dùng </label></td>
                            <td><span >{{$cus_info->name}}</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputFile">số điện thoại </label></td>
                            <td> <span >{{$cus_info->phone}}</span></td>
                        </tr>
                        <tr>
                            <td>  <label for="exampleInputEmail1">địa chỉ nhà </label></td>
                            <td>  <span >{{$cus_info->address}}</span></td>
                        </tr>
                </table>
                @endforeach
                </div>



                @foreach($datacus as $key => $cus_info)
                <div class=col-md-6>
                    <div class="position-center">
                        <form class="form" action="{{URL::to('/chance-info')}}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                <input type="text" class="form-control" value="{{$cus_info->name}}" min="3" max="50" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">số điện thoại</label>
                                <input type="text" class="form-control" value="{{$cus_info->phone}}" min="10" max="15" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">địa chỉ</label>
                                <input type="text" class="form-control" value="{{$cus_info->address}}" min="3" max="100" name="address" required>
                            </div>

                            <button type="submit" class="btn btn-info" name="addType">Cập nhật</button>
                        </form>  
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
