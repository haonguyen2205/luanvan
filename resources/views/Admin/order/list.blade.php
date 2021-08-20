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
                        <td><label class="i-checks m-b-none"><i>{{$key->order_id}}</i></label></td>
                        <td> {{$key->username}} </td>
                        <td>{{$key->hoten}}</td>
                        <td> {{$key->CMND}} </td>
                        <td> 
                        

                        @foreach($room as $r)
                                       @if($r->room_id == $key->room_id)
                                            {{$r->room_name}}
                                            @endif
                                            @endforeach
                                    



                    
                    </td>

                        <td><span class="text-ellipsis">{{number_format($key->total,0)}}VND</span></td>
                        <td><span class="text-ellipsis">{{$key->dayat}}</span></td>
                        <td><span class="text-ellipsis">{{$key->dayout}}</span></td>
                        <td><span class="text-ellipsis">
                        @if($key->status==0)
                            <p style="color:rose">Đã huỷ</p>
                            @endif
                        @if($key->status==1)
                            <a style="color:red" href="{{URL::to('uptt',$key->order_id)}}">Chờ xác nhận</a>
                            @endif
                                @if($key->status==2)
                                <a style="color:black" href="{{URL::to('uptt',$key->order_id)}}">Đã xác nhận</a>
                            @endif
                                @if($key->status==3)
                                <a style="color:green" href="{{URL::to('uptt',$key->order_id)}}">Đã nhận phòng</a>
                            @endif
                                @if($key->status==4)
                                <p style="color:blue">Hoàn thành</p>
                        @endif
                        </span></td>
                        <td>{{number_format($key->deposit,0)}} VND</td>
                        <td>
                            @if($key->status==0)
                        <a href="{{URL::to('xoa',$key->order_id)}}" class="btn btn-danger" style="font-size: 13px"  ui-toggle-class="">
                        <i class="fas fa-trash-alt"></i> Danh sách hủy
                        </a>
                        @endif
                        </td>
                        <td>
                        <a href="{{URL::to('/admin/chitietorder',$key->order_id)}}" class="btn btn-primary" style="font-size: 13px"  ui-toggle-class="">
                        <i class="icon icon-edit"></i> Chi tiết
                        </a>
                        @if($key->status==1 || $key->status==2)
                        <a href="{{URL::to('/admin/huy',$key->order_id)}}" class="btn btn-danger" style="font-size: 13px"  ui-toggle-class="">
                        Hủy
                        </a>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <footer class="panel-footer">
                <div class="row">
                    <div class="text-center text-center-xs"> 
                        {{$list->links()}}             
                    </div>
                </div>
            </footer>
            
        </div>
    </div>
            </div>
@endsection
