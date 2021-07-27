@extends('admin_layout')
@section('admin_content')
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<div class="row">
    <div class="col-lg-12">
    <section class="panel">
            <header class="panel-heading">
                THÊM TIN TỨC
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/post-add-new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <span style="color: red;"></span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tin tức</label>
                            <input type="text" class="form-control"   name="tentintuc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea style="resize: none" rows="8" class="form-control" id="noidung" name="noidung" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể loại: </label>
                            <select class="suit-select" name="theloai">
                                @foreach($listcat as $list)
                                <option value="{{$list->cat_id}}">{{$list->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="addCat">Thêm</button>
                        <a href="{{URL::to('/list-new')}}" class="btn btn-primary">Trở về</a>
                    </form>

                    <ul class=" alert text-danger">

                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
<script>
    // ClassicEditor
    //     .create( document.querySelector( '#noidung' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    CKEDITOR.replace('noidung');
</script>
@endsection
