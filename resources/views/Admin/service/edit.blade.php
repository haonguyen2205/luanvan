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
                    @Foreach ($editsv as $ser )
                    <form role="form" action="{{URL::to('/update-service/'.$ser->service_id)}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên dịch vụ 1 </label>      
                            <input type="text" class="form-control" value="{{$ser->service_name}}"  min="3" max="50" name="sv_name1" required>
                            <span style="color: red;">{{$errors->first('uti_name')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên dịch vụ 2</label>      
                            <input type="text" class="form-control" value="{{$ser->name}}" min="3" max="50" name="sv_name2" required>
                            <span style="color: red;">{{$errors->first('uti_name')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">giá tiền</label>
                            
                            <input type="number" class="form-control" value="{{$ser->service_price}}" min="10000" maxlength="10"  name="sv_price" required>
                            <span style="color: red;"></span>
                        </div>
                        </br>

                        <button type="submit" class="btn btn-info" name="addType">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>


@endsection