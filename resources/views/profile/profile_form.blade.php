@extends('profile_layout')
@section('customer_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CUSTOMER PROFILE
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                
                @foreach($datacus as $key => $cus_info)
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
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
