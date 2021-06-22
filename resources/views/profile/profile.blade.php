<?php

?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Admin quản lý khách hàng</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0 ')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/util.css')}}" rel="stylesheet" />
    
    
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <!-- -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class="simple-text">
                      <h2></h2>
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link active" href="#">

                            <p>thông tin cá nhân</p>
                        </a>
                    </li>                   
                    <li>
                        <a class="nav-link" href="chance_pass.php">

                            <p>đỗi mật khẩu</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="donphong.php">

                            <p>đơn đặt phòng</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " >
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">HOME</a>

                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="nav navbar-nav mr-auto">                      
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span class="no-icon"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
                        <?php 
                           
                            ?>
                                <div class="container-login100">
                                    <div class="wrap-login100 p-l-55 p-r-55 p-t-25 p-b-25">
                                        <form class="login100-form validate-form flex-sb flex-w" method="post">
                                            <span class="txt1 p-b-11">
                                                Username
                                            </span>                 
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                            <input class="input100" type="text" name="" value="" > 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Password
                                            </span>                 
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="password" name="password" value="" > 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Họ Tên
                                            </span>                 
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="text" name="fullname" value=""> 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Ngày sinh
                                                </span>                 
                                                <div class="wrap-input100 validate-input m-b-36" >                  
                                                    <input class="input100" type="daytime" name="birthday" value=""> 
                                                    <span class="focus-input100"></span>
                                                </div> 
                                            <span class="txt1 p-b-11">
                                                Số điện thoại
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="text" name="phone" value="">  
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                E-mail
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="mail" name="email" value="" > 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <button type="update" name="update">Cập Nhật <i class="lnr lnr-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div> 
        </div>
    </div>

   

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/demo.js"></script>

</html>
