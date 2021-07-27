@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM LOẠI PHÒNG
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
                    <form role="form" action="{{URL::to('/add-uti-action')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Tiện ích</label>
                            <input type="text" class="form-control" id="" min="3" max="50" name="uti_id" required>
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tiện ích</label>
                            <input type="text" class="form-control" id=""  min="3" max="50" name="uti_name" required>
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>

                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>

                    
                </div>
            </div>
        </section>

    </div>
</div>


@endsection