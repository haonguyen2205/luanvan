@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
    <section class="panel">
            <header class="panel-heading">
                THÊM DANH MỤC
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
                    <form role="form" action="{{URL::to('/add-cat-action')}}" method="post">
                            @csrf
                        <span style="color: red;">{{$errors->first('catName')}}</span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại tin tức</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" min="3" max="50" name="catName">
                        </div>

                        <button type="submit" class="btn btn-info" name="addCat">Submit</button>
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
