@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách danh mục
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <div class="input-group">
                    <form action="{{URL::to('cat-search')}}" method="get">
                        @csrf
                        <div class="btn">
                            <input type="text" class="input-sm fa fa-search" name="search" placeholder="Nhập tên khách hàng">
                            <button type="submit"  class="btn btn-primary" value="Tìm kiếm"><i class="fas fa-search"></i> TÌM KIẾM</button>
                            <a href="{{URL::to('/add-cat')}}" class="btn btn-primary">Thêm danh mục</a>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:38px;"></th>
                        <th style="width:150px;">Id</th>
                        <th style="width:240px;">Hiển thị</th>
                        <th style="width:400px;">Loại tin tức</th>
                        <th style="width:200px;"></th>
                    </tr>
                </thead>
                <form action="{{URL::to('stt')}}" method="post">
                @csrf
                    <tbody>
                    @foreach($listCat as $key => $value)
                        <tr>
                            <td style="width:38px;"><label class="i-checks m-b-none"><i></i></label></td>
                            <td style="width:150px;">{{$value->cat_id}}</td>
                            <td style="width:240px;">
                                <input type="number" min="1" name="{{$value->cat_id}}" value="{{$value->stt}}" style="width:40px; border-radius: 2px;">
                            </td>
                            <td style="width:400px;">{{$value->cat_name}}</td>
                            <td style="width:200px;">
                                <a href="{{URL::to('/edit-cat/'.$value->cat_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a href="{{URL::to('/delete-cat/'.$value->cat_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tr>
                        <div class="col-sm-5 m-b-xs">
                            <button value="Cập nhật hiển thị" class="btn btn-primary">Cập nhật hiển thị </button>
                        </div>
                    </tr>
                </form>
            </table>            
        </div>
    </div>
</div>
@endsection
