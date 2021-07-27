@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                SỬA DANH MỤC
            </header>
            <div class="panel-body">
                @foreach($editCat as $key => $edit_cat)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-cat/'.$edit_cat->cat_id)}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại tin tức</label>
                            <input type="text" value="{{$edit_cat->cat_name}}" class="form-control" id="exampleInputEmail1" min="3" max="50" name="catName">
                        </div>
                        <button type="submit" class="btn btn-primary" name="editCat">Sửa danh mục</button>
                        <a href="{{URL::to('/list-cat')}}" class="btn btn-primary">Trở về</a>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
