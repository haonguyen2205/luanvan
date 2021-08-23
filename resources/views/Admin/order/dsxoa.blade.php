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
                      Đã hủy
                        </span></td>
                        <td>{{number_format($key->deposit,0)}} VND</td>
                       
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
