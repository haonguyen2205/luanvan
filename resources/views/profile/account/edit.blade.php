<!-- @extends('./profile_layout') -->
@section('customer_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÔNG TIN TÀI KHOẢN/CẬP NHẬT
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
                @foreach($datacus as $key => $val_cus)
                    <form role="form" action="{{URL::to('/add-type-action')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" class="form-control" value="{{$val_cus->name}}" min="3" max="50" name="typeName">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">số đt</label>
                            <input type="text" class="form-control" value="{{$val_cus->phone}}" min="3" max="50" name="typeName">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">địa chỉ</label>
                            <input type="text" class="form-control" value="{{$val_cus->address}}" min="3" max="50" name="typeName">
                        </div>

                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>

                @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
