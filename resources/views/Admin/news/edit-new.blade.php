@extends('admin_layout')
@section('admin_content')
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<div class="row">
    <div class="col-lg-12">
    <section class="panel">
            <header class="panel-heading">
                SỬA TIN TỨC
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" enctype="multipart/form-data" action="{{URL::to('/post-edit-new')}}" method="post" >
                            @csrf
                        <span style="color: red;"></span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tin tức</label>
                            <input type="text" class="form-control"  name="tentintuc" value="{{$new->new_name}}">
                            <input type="hidden" name="id" value="{{$new->new_id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea  class="form-control" id="editor"  name="noidung">{{$new->new_content}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <img src="../images/{{$new->new_image}}" height="100"; width="100";>
                            <input type="file" class="form-control" name="image"> Thay đổi ảnh

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể loại: </label>
                            <select name="theloai" style="border-radius: 6px;">
                                @foreach($listcat as $list)
                                <option value="{{$list->cat_id}}">{{$list->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" >Sửa</button>
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
    //     .create( document.querySelector( '#editor' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
        CKEDITOR.replace('editor');
</script>
@endsection
