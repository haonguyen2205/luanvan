@extends('admin_layout')
@section('admin_content')
<div class="table-align-info">
    <div class="panel panel-default">
        <div class="panel-heading"> DANH SÁCH ĐƠN PHÒNG </div>
        <div class="row w3-res-tb">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="input-group">
                    <form action="{{URL::to('timkiem')}}" method="get">
                        @csrf
                    
                         <select name="trangthai">
                                <option value="-2"<?php if($sttse == -2)echo "selected"; ?> >Trạng thái </option>
                                <option value="0" <?php if($sttse == 0)echo "selected"; ?>>Đã huỷ</option>
                                <option value="1" <?php if($sttse == 1)echo "selected"; ?>>Đang chờ</option>
                                <option value="2" <?php if($sttse == 2)echo "selected"; ?>>Đã xác nhận</option>
                                <option value="3" <?php if($sttse == 3)echo "selected"; ?>>Đã lấy phòng</option>
                                <option value="4" <?php if($sttse == 4)echo "selected"; ?>>Hoàn thành</option>
                                </select>
                        <div class="btn">

                            <input type="text" class="input-sm form-control" name="search" placeholder="Nhập tên khách hàng">
                            <button type="submit"  class="btn btn-primary" value="Tìm kiếm"><i class="fas fa-search"></i> TÌM KIẾM</button>
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
                        <th style="width:20px;">ID</th>
                        <th>Tên người đặt</th>
                        <th>Tên người nhận</th>
                        <th>CMND</th>
                        <th> Phòng </th>
                        <th>Tổng tiền</th>
                        <th>Ngày nhận</th>
                        <th>Ngày trả</th>
                        <th>Tình trạng</th>
                        <th>Tiền cọc</th>
                        <th>Xóa</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key)
                    <tr>
                        <td><label class="i-checks m-b-none"><i>{{$key['id']}}</i></label></td>
                        <td> {{$key['name']}} </td>
                        <td>{{$key['hoten']}}</td>
                        <td> {{$key['cmnd']}} </td>
                        <td> {{$key['phong']}} </td>

                        <td><span class="text-ellipsis">{{number_format($key['tongtien'],0)}}VND</span></td>
                        <td><span class="text-ellipsis">{{$key['ngaynhan']}}</span></td>
                        <td><span class="text-ellipsis">{{$key['ngaytra']}}</span></td>
                        <td><span class="text-ellipsis">
                        @if($key['tinhtrang']==0)
                            <p style="color:rose">Đã huỷ</p>
                            @endif
                        @if($key['tinhtrang']==1)
                            <a style="color:red" href="{{URL::to('uptt',$key['id'])}}">Chờ xác nhận</a>
                            @endif
                                @if($key['tinhtrang']==2)
                                <a style="color:black" href="{{URL::to('uptt',$key['id'])}}">Đã xác nhận</a>
                            @endif
                                @if($key['tinhtrang']==3)
                                <a style="color:green" href="{{URL::to('uptt',$key['id'])}}">Đã nhận phòng</a>
                            @endif
                                @if($key['tinhtrang']==4)
                                <p style="color:blue">Hoàn thành</p>
                        @endif
                        </span></td>
                        <td>{{number_format($key['deposit'],0)}} VND</td>
                        <td>
                            @if($key['tinhtrang']==0)
                        <a href="{{URL::to('xoa',$key['id'])}}" class="btn btn-danger" style="font-size: 13px"  ui-toggle-class="">
                        <i class="fas fa-trash-alt"></i> Danh sách hủy
                        </a>
                        @endif
                        </td>
                        <td>
                        <a href="{{URL::to('/admin/chitietorder',$key['id'])}}" class="btn btn-primary" style="font-size: 13px"  ui-toggle-class="">
                        <i class="icon icon-edit"></i> Chi tiết
                        </a>
                        @if($key['tinhtrang']==1 || $key['tinhtrang']==2)
                        <a href="{{URL::to('/admin/huy',$key['id'])}}" class="btn btn-danger" style="font-size: 13px"  ui-toggle-class="">
                        Hủy
                        </a>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
            </div>
@endsection
