@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
    <section class="panel">
            <header class="panel-heading">
                THÊM DANH MỤC
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add-cat-action')}}" method="post">
                            @csrf
                        <span style="color: red;">{{$errors->first('catName')}}</span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại tin tức</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="catName">
                        </div>

                        <button type="submit" class="btn btn-primary" name="addCat">Thêm danh mục</button>
                        <a href="{{URL::to('/list-cat')}}" class="btn btn-primary">Trở về</a>
                    </form>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
