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
                    <form role="form" action="{{URL::to('/add-type-action')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="typeName">
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>
                        <div class="form-group">
                            <label for="exampleInputFile">Trạng thái</label>
                            <select name="typeStatus" class="form-control m-bot15">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tiện ích :  </label></br>
                            <label for="exampleInputEmail1"></label></br>
                            @foreach ($utility as $key => $uti)
                            <input type="checkbox"  value="{{$uti->utility_id}}" name="tienich[]">
                                {{$uti->utility_name}}
                            @endforeach
                        </div>
                        <span style="color: red;">{{$errors->first('typeName')}}</span>
                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>

                    <ul class=" alert text-danger">
                    @foreach ($errors->all() as $error) 
                    
                        <li>{{$error}}</li>
                    
                    @endforeach
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection