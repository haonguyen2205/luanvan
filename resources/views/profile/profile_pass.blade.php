@extends('profile_layout')
@section('customer_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CHANGE PASSWORD
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:red; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="position-center">
                    <form class="form" action="{{URL::to('/chance-pass')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" value=""  min="6" max="50" name="cur_password" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" min="6" max="50" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">nhập lại mật khẩu mới</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" min="6" max="50" name="repassword" required>
                        </div>


                        <button type="submit" class="btn btn-info" name="chance_pass">Cập nhật</button>
                    </form>

                    
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
