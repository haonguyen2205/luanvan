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
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" border="1" >
                        <thead>
                            <tr>
                            <th style="width:20px;"></th>
                            <th>mã đơn</th>
                            <th>Tên người đặt</th>
                            <th>cọc</th>
                            <th>người lón</th>
                            <th>trẻ nhỏ</th>
                            <th>ngày nhận</th>
                            <th>ngày trả</th>
                            <th>tình trạng</th>
                            <th>action</th>
                            <th style="width:20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listorder as $list)
                            <tr>
                            <td><label class="i-checks m-b-none"><i></i></label></td>
                                <td> {{$list->order_id}} </td>
                                <td> {{$list->username}} </td>
                                <td> {{$list->deposit}} </td>
                                <td> {{$list->adults}} người </td>
                                <td> {{$list->children}} người </td>
                                <td> {{$list->dayat}}  </td>
                                <td> {{$list->dayout}} </td>
                                <td> {{$list->total}}  </td>
                                <td>
                                <a href="{{URL::to('/delete-type/'.$list->order_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
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
