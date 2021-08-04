@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form thêm tiện ích
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add-uti-action')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Tiện ích</label>
                            
                            <input type="text" class="form-control" id=""  name="uti_id" required>
                            <span style="color: red;">{{$errors->first('uti_id')}}</span>
                        </div>
                        
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tiện ích</label>
                            
                            <input type="text" class="form-control" id=""  min="3" max="50" name="uti_name" required>
                            <span style="color: red;">{{$errors->first('uti_name')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">giá tiền</label>
                            
                            <input type="number" class="form-control" id=""  min="10000" maxlength="10"  name="uti_price" required>
                            <span style="color: red;"></span>
                        </div>
                        </br>

                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
</div>


@endsection