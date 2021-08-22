@extends('profile_layout')
@section('customer_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CUSTOMER PROFILE
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('mes_quagiohuy');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
            <div class="row w3-res-tb">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="input-group">
                    <form action="{{URL::to('timkiem')}}" method="get">
                        @csrf
                        <div class="btn">
                            <input type="date" class="form-control" name="search_order" placeholder="Nhập tên khách hàng">
                            <button type="submit"  class="btn btn-primary" value="Tìm kiếm"><i class="fas fa-search"></i> TÌM KIẾM</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" >
                        <thead>
                            <tr>
                            <th style="width:20px;"></th>
                            <th>Tên người đặt</th>
                            <th>cọc</th>
                            <th>người lón</th>
                            <th>trẻ nhỏ</th>
                            <th>ngày nhận</th>
                            <th>ngày trả</th>
                            <th> tổng tiền </th>
                            <th>tình trạng</th>
                            <th>action</th>
                            <th style="width:20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listorder as $list)
                            <tr>
                                <td><label class="i-checks m-b-none"><i></i></label></td>
                                <td> {{$list->username}} </td>
                                <td> {{number_format($list->deposit)}} đ </td>
                                <td> {{$list->adults}} người </td>
                                <td> {{$list->children}} bé </td>
                                <td> {{$list->dayat}}  </td>
                                <td> {{$list->dayout}} </td>
                                <td> {{number_format($list->total)}} đ  </td>
                                <td> 
                                    <?php
                                        if($list->status==0)
                                        {
                                           echo"đã hủy";
                                        }else if($list->status==1)
                                        {
                                         echo"chờ xác nhận";
                                        }
                                        else if($list->status==2)
                                        {
                                            echo "đã xác nhận";
                                        }
                                        else if($list->status==3)
                                        {
                                            echo"đã nhân phòng";
                                        }
                                        else{
                                            echo" đã hoàn thành";
                                        }
                                    ?>
                                </td>
                            
                                <td width="5%" align="center">
                                    <?php
                                    if($list->status==1 ||$list->status==2)
                                    {?>
                                        <a href="{{URL::to('/delete-order-cus/'.$list->order_id)}}" onClick="return confirm('Bạn thực sự muốn hủy đặt ?')"
                                        class="active btn btn-warning" style="font-size: 11px;"  ui-toggle-class="">
                                        hủy đặt
                                    </a>
                                    <?php
                                    }else
                                    {
                                        
                                    }
                                    ?>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
