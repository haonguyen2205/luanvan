<?php

use Illuminate\Support\Facades\Session;
?>

<!DOCTYPE html>
<head>
    <title>Admin Manager</title>
    <!-- <meta http-equiv="refresh" content="30"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"  />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
    
    <!-- //bootstrap-css -->

    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{URL::asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/backend/css/owl.theme.default.min.css')}}" >
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>

    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
    <!-- calendar -->
    <!-- <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}"> -->
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- sweetAlert; -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>   
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"> -->
    <style>
        .btn {
        display: inline-block;
        padding: 4px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    /* .footer {
            
            background: white;
        } */
    </style>


</head>
<body>

    <section id="container">
        
            <!--header start-->
            <header class="header fixed-top clearfix">
                <!--logo start-->
                <div class="brand">
                    
                    <a href="#" class="logo">
                    ADMIN
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                   
                </div>
                <!--logo end-->

                <div class="top-nav clearfix">
                    <!--search & user info start-->
                   
                    <ul class="nav pull-right top-menu">
                    <li>
                        <div class="form-group" >
                            @if(Session::has('mes_diemdanh'))
                                <A class="btn btn-success " font-size="18px" type="submit" href="{{URL::to('/diemdanhra')}}"> chấm công ra</A>
                            @else
                                <A class="btn btn-success" type="submit" height="45px" href="{{URL::to('/diemdanh')}}">chấm công vào</A>
                            @endif
                        </div>
                    </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <!-- hien hình anh thuoc tai khoan do -->
                                
                                @if(Session::has('users_image'))
                                    <?php
                                        $user = Session::get('users_image');
                                    ?>
                                    <img alt="" src='public/upload/staff/<?php echo $user ?>' height='45px'/>    
                                    
                                @else   
                                    <img alt="" src='public/upload/staff/icon.png' height='30'/>
                                @endif 
                                    <span class="username">
                                    <?php
                                    // hien ten nguoi dung tai khoan
                                        $name =Session::Get('name_admin');
                                        if($name)
                                            echo $name;
                                    ?>
                                    </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                    <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                                </ul>
                        </li>

                        <!-- user login dropdown end -->
                    </ul>
                    
                    <!--search & user info end-->
                
                </div>
            </header>


            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->
                    <div class="leftside-navigation">
                        
                    @if(session::get('postion')==4)
                                
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a class="active" href="{{URL::to('/admin')}}">
                                    <i class="fa fa-compass"></i>
                                    <span>Báo cáo tổng hợp</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Quản lí khách hàng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-users')}}">Danh sách khách hàng</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí tiện ích </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-uti')}}">Thêm loại tiện ích </a></li>
                                    <li><a href="{{URL::to('/list-uti')}}">danh sách các tiện ích </a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí loại phòng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-type')}}">Thêm loại phòng </a></li>
                                    <li><a href="{{URL::to('/list-type')}}">danh sách loại phòng </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Quản lí phòng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-room')}}">Thêm phòng </a></li>
                                    <li><a href="{{URL::to('/list-room')}}">danh sách phòng </a></li>
                                    <li><a href="{{URL::to('/order_room')}}">đặt phòng </a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span> Đơn phòng </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/admin/manage-order')}}">Quản lí đơn phòng</a></li>
                                <li><a href="{{URL::to('ds-xoa')}}">Danh sách đơn đã hủy</a></li>
                                <li><a href="{{URL::to('ds-huy')}}">Trạng thái đã huỷ</a></li>
                                <li><a href="{{URL::to('ds-cho')}}">Trạng thái chờ xác nhận</a></li>
                                <li><a href="{{URL::to('ds-da')}}">Trạng thái đã xác nhận</a></li>
                                <li><a href="{{URL::to('ds-lay')}}">Trạng thái đã nhận phòng</a></li>
                                <li><a href="{{URL::to('ds-done')}}">Trạng thái đã hoàn tất</a></li>


                            </ul>
                        </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Quản lí nhân viên </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/page_add_staff')}}">Thêm nhân viên </a></li>
                                    <li><a href="{{URL::to('/list_staff')}}">danh sách nhân viên </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí tin tức </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-cat')}}">Danh sách danh mục </a></li>
                                    <li><a href="{{URL::to('/list-new')}}">Danh sách tin tức </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí đánh giá </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-new')}}">dsds </a></li>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Quản lí dịch vụ </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/show-page-add')}}">Thêm dịch vụ </a></li>
                                    <li><a href="{{URL::to('/list-service')}}">Danh sách dịch vụ </a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- KẾT THÚC danh sách mục của quản lý -->
                    @else
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Quản lí khách hàng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-users')}}">Danh sách khách hàng</a></li>
                                </ul>
                            </li>
                            
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Quản lí  phòng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-room')}}">Danh sách phòng </a></li>
                                </ul>
                            </li>
                            <!-- quản lý, xử lý đơn hàng -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Đơn phòng </span>
                                </a>
                                <ul class="sub">
                                <li><a href="{{URL::to('/admin/manage-order')}}">Quản lí đơn phòng</a></li>
                                <li><a href="{{URL::to('ds-xoa')}}">Danh sách đơn đã hủy</a></li>
                                <li><a href="{{URL::to('ds-huy')}}">Trạng thái đã huỷ</a></li>
                                <li><a href="{{URL::to('ds-cho')}}">Trạng thái chờ xác nhận</a></li>
                                <li><a href="{{URL::to('ds-da')}}">Trạng thái đã xác nhận</a></li>
                                <li><a href="{{URL::to('ds-lay')}}">Trạng thái đã nhận phòng</a></li>
                                <li><a href="{{URL::to('ds-done')}}">Trạng thái đã hoàn tất</a></li>
                            </ul>
                            </li>
                            <!-- quản lý tin tức + danh mục tin tức -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí tin tức </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-cat')}}">Danh sách danh mục </a></li>
                                    <li><a href="{{URL::to('/list-new')}}">Danh sách tin tức </a></li>

                                </ul>
                            </li>
                                <!-- quản lý đánh giá -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Quản lí đánh giá </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-new')}}">dsds </a></li>
                                </ul>
                            </li>
                            <!-- quản lý dịch vụ -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-hotel"></i>
                                    <span> Quản lí dịch vụ </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/show-page-add')}}">Thêm dịch vụ </a></li>
                                    <li><a href="{{URL::to('/list-service')}}">Danh sách dịch vụ </a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                    </div>
                    
                </div>
                    <!-- sidebar menu end     -->
            </aside>
            

                <section id="main-content">
                    <section class="wrapper">
                    <!-- @yield('content') -->

                    @yield('admin_content')
                </section>
                
                <!-- <div class="wthree-copyright" id="footer" style="padding-left: 0;">
                    <p style="padding-left: 20px; color: red;">
                    <b style="color: black;">LUẬN VĂN TỐT NGHIỆP - WEBSITE QUẢN LÍ KHÁCH SẠN</b> - Nguyễn Phạm Nhựt Hào - Nguyễn Văn Toàn
                    </p>
                </div> -->
                 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright bottom">
            <p style="color: black;">
                    <b style="color: white;">LUẬN VĂN TỐT NGHIỆP - WEBSITE QUẢN LÍ KHÁCH SẠN</b> - Nguyễn Phạm Nhựt Hào - Nguyễn Văn Toàn
                    </p>
			</div>
		  </div>
  <!-- / footer -->
    </section>

    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/backend/js/owl.carousel.min.js')}}"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
                data: [
                    {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                    {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                    {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                    {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                    {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                    {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                    {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                    {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                    {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

                ],
                lineColors:['#eb6f6f','#926383','#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
        <!-- <script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function() {

                $('#mycalendar').monthly({
                    mode: 'event',

                });

                $('#mycalendar2').monthly({
                    mode: 'picker',
                    target: '#mytarget',
                    setWidth: '250px',
                    startHidden: true,
                    showTrigger: '#mytarget',
                    stylePast: true,
                    disablePast: true
                });

            switch(window.location.protocol) {
            case 'http:':
            case 'https:':
            // running on a server, should be good.
            break;
            case 'file:':
            alert('Just a heads-up, events will not work when run locally.');
            }

            });
        </script> -->
        <!-- //calendar -->
</body>
<style>
    .footer {
        position: relative  ;
    bottom: 0;
    width: 100%;
    }
</style>
</html>
