@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading"> DANH SÁCH ĐƠN HÀNG </div>

    <!-- search -->
    <div class="row w3-res-tb">
        <div class="col-sm-3">
        </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <form action="{{URL::to('timkiem')}}" method="get">
                        @csrf
                        <div class="btn">
                            <input type="text" class="input-sm form-control" name="search" placeholder="Nhập tên khách hàng">
                            <button type="submit"  class="btn btn-primary" value="Tìm kiếm"><i class="fas fa-search"></i> TÌM KIẾM</button>
                            <a href="{{URL::to('/admin/manage-order')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
    </div>

    <!-- Bảng danh sách -->
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th style="width:10px;">ID</th>
            <th>Tên người đặt</th>
            <th>Tổng tiền</th>
            <th>Ngày nhận</th>
            <th>Ngày trả</th>
            <th>Tình trạng</th>
            <th>Tiền cọc</th>
            <th style="width:30px;">Action</th>
            </tr>
        </thead>
        <tbody>


                @foreach($list as $key)

            <tr>
            <td><label class="i-checks m-b-none"><i>{{$key->order_id}}</label></td>
                <td><label class="i-checks m-b-none"><i>{{$key->username}}</label></td>

                <td><span class="text-ellipsis">{{number_format($key->total,0)}}VND</span></td>
                <td><span class="text-ellipsis">{{$key->dayat}}</span></td>
                <td><span class="text-ellipsis">{{$key->dayout}}</span></td>
                <td><span class="text-ellipsis">




                @if($key->status==1)
                        <a style="color:red" href="{{URL::to('uptt',$key->order_id)}}">Chờ xác nhận</a>
                        @endif
                            @if($key->status==2)
                            <a style="color:black" href="{{URL::to('uptt',$key->order_id)}}">Đã xác nhận</a>;
                        @endif
                            @if($key->status==3)
                            <a style="color:green" href="{{URL::to('uptt',$key->order_id)}}">Đã lấy phòng</a>;
                        @endif
                            @if($key->status==4)
                            <p style="color:blue">Hoàn thành</p>



                    @endif
                </span></td>
                <td>{{number_format($key->deposit,0)}} VND</td>
                <td>
                <a href="{{URL::to('/admin/chitietorder',$key->order_id)}}" class="active" style="font-size: 21px;"  ui-toggle-class="">
                Chi tiết
                </a>
                </td>
            </tr>

            @endforeach

        </tbody>
        </table>
    </div>
    </div>
        </div>
@endsection
