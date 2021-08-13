
@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phòng
            </header>
           
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add-room-action')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phòng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                        </div>
                        <span style="color: red;">{{$errors->first('name')}}</span>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="image" accept="image/*"   >   
                        </div>
                        <span style="color: red;">{{$errors->first('image')}}</span>

                        <div class="form-group">
                            <label for="exampleInputFile">Loại phong</label>
                            <select name="type" class="form-control m-bot15">
                                @foreach($typeName as $key=>$value)
                                <option value="{{$value->type_id}}">{{$value->type_name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="description" id="exampleInputPassword1">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="price" required> 
                        </div>
                        <span style="color: red;">{{$errors->first('price')}}</span>

                        <div class="form-group">
                            <label for="exampleInputFile">Tình trạng</label>
                            <select name="status" class="form-control m-bot15">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="addRoom">Xác nhận thêm </button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>

    @if(Session::has('mes_create_fail'))
        <script type="text/javascript" >
        swal("Ohh Fail!","{{Session::Get('mes_create_fail')}}","error",{
            button:"OK",
        });
        </script> 
        <?php
        session::put('mes_create_fail',null);
        ?>
    @endif
@endsection