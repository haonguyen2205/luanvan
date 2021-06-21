@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
    <section class="panel">
            <header class="panel-heading">
                SỬA DANH MỤC
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                @foreach($editCat as $key => $edit_cat)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-cat/'.$edit_cat->cat_id)}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại tin tức</label>
                            <input type="text" value="{{$edit_cat->cat_name}}" class="form-control" id="exampleInputEmail1" min="3" max="50" name="catName">
                        </div>
                        <span style="color: red;">{{$errors->first('catName')}}</span>
                        <button type="submit" class="btn btn-info" name="editCat">Submit</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
