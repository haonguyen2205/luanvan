@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách tin tức
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="input-group">
                    <form action="{{URL::to('new-search')}}" method="get">
                        @csrf
                        <div class="btn">
                            <input type="text" class="input-sm fa fa-search" name="search" placeholder="Nhập tên khách hàng">
                            <button type="submit"  class="btn btn-primary" value="Tìm kiếm"><i class="fas fa-search"></i> TÌM KIẾM</button>
                            <a href="{{URL::to('/add-new')}}" class="btn btn-primary">Thêm tin tức</a>
                        </div>
                    </form>
                </div>
            </div>  
            <div class="col-sm-4"></div>
        </div>


        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:10px;"></th>
                        <th style="width:10px;">Id</th>
                        <th style="width:100px; text-align: center">Image</th>
                        <th style="width:150px;">Mô tả</th>
                        <th style="width: 372px;">Nội dung</th>
                        <th style="width:200px;">Ngày đăng</th>
                        <th style="width:150px;"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($listNew as $key => $value)
                    <tr>
                        <td style="width:10px;"><label class="i-checks m-b-none"><i></i></label></td>
                        <td style="width:10px;">{{$value->new_id}}</td>
                        <td style="width:100px;height:100px ;text-align: center">
                            @if($value->new_image != null)
                            <div class="single-room-pic">
                                <img src="images/{{$value->new_image}}" height="100"; width="100";>
                            </div>
                            @endif
                        </td>
                        <td style="width:150px;">{{$value->new_name}}</td>
                        <td style="width: 372px;">
                            <?php
                                echo $value->new_content;
                            ?>
                        </td>
                        <td style="width:200px;">  <?php
                                            
                                            $date= date_create($value->date_post);
                                             echo date_format($date,"Y/m/d");
                                             
                                             ?></td>
                        <td style="width:150px;">
                            <a href="{{URL::to('/edit-new',$value->new_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{URL::to('/delete-new',$value->new_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <footer class="panel-footer">
                <div class="row">
                    <div class="text-center text-center-xs"> 
                        {{$listNew->links()}}           
                    </div>
                </div>
            </footer>
            
        </div>
    </div>
</div>
<script>

    @if(Session::has('addtintuc'))
        alert("Đã thêm thành công");
        @Session::forget('addtintuc');
    @endif


</script>
@endsection
