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
                                <A class="btn btn-success " font-size="18px" type="submit" href="{{URL::to('/diemdanhra')}}"> ch???m c??ng ra</A>
                            @else
                                <A class="btn btn-success" type="submit" height="45px" href="{{URL::to('/diemdanh')}}">ch???m c??ng v??o</A>
                            @endif
                        </div>
                    </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <!-- hien h??nh anh thuoc tai khoan do -->
                                
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
                                    <span>B??o c??o t???ng h???p</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Qu???n l?? kh??ch h??ng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-users')}}">Danh s??ch kh??ch h??ng</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? ti???n ??ch </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-uti')}}">Th??m lo???i ti???n ??ch </a></li>
                                    <li><a href="{{URL::to('/list-uti')}}">danh s??ch c??c ti???n ??ch </a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? lo???i ph??ng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-type')}}">Th??m lo???i ph??ng </a></li>
                                    <li><a href="{{URL::to('/list-type')}}">danh s??ch lo???i ph??ng </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Qu???n l?? ph??ng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/add-room')}}">Th??m ph??ng </a></li>
                                    <li><a href="{{URL::to('/list-room')}}">danh s??ch ph??ng </a></li>
                                    <li><a href="{{URL::to('/order_room')}}">?????t ph??ng </a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span> ????n ph??ng </span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/admin/manage-order')}}">Qu???n l?? ????n ph??ng</a></li>
                                <li><a href="{{URL::to('ds-xoa')}}">Danh s??ch ????n ???? h???y</a></li>
                                <li><a href="{{URL::to('ds-huy')}}">Tr???ng th??i ???? hu???</a></li>
                                <li><a href="{{URL::to('ds-cho')}}">Tr???ng th??i ch??? x??c nh???n</a></li>
                                <li><a href="{{URL::to('ds-da')}}">Tr???ng th??i ???? x??c nh???n</a></li>
                                <li><a href="{{URL::to('ds-lay')}}">Tr???ng th??i ???? nh???n ph??ng</a></li>
                                <li><a href="{{URL::to('ds-done')}}">Tr???ng th??i ???? ho??n t???t</a></li>


                            </ul>
                        </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Qu???n l?? nh??n vi??n </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/page_add_staff')}}">Th??m nh??n vi??n </a></li>
                                    <li><a href="{{URL::to('/list_staff')}}">danh s??ch nh??n vi??n </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? tin t???c </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-cat')}}">Danh sa??ch danh m???c </a></li>
                                    <li><a href="{{URL::to('/list-new')}}">Danh sa??ch tin t???c </a></li>

                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? ????nh gi?? </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-new')}}">dsds </a></li>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Qu???n l?? d???ch v??? </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/show-page-add')}}">Th??m d???ch v??? </a></li>
                                    <li><a href="{{URL::to('/list-service')}}">Danh s??ch d???ch v??? </a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- K???T TH??C danh s??ch m???c c???a qu???n l?? -->
                    @else
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span> Qu???n l?? kh??ch h??ng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-users')}}">Danh s??ch kh??ch h??ng</a></li>
                                </ul>
                            </li>
                            
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-bed"></i>
                                    <span> Qu???n l??  ph??ng </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-room')}}">Danh s??ch ph??ng </a></li>
                                </ul>
                            </li>
                            <!-- qu???n l??, x??? l?? ????n h??ng -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> ????n ph??ng </span>
                                </a>
                              <ul class="sub">

                                    <li><a href="{{URL::to('/admin/manage-order')}}">Qu???n l?? ????n ph??ng</a></li>
                                    <li><a href="{{URL::to('ds-xoa')}}">Danh s??ch ????n ???? h???y</a></li>
                                    <li><a href="{{URL::to('ds-huy')}}">Tr???ng th??i ???? hu???</a></li>
                                    <li><a href="{{URL::to('ds-cho')}}">Tr???ng th??i ch??? x??c nh???n</a></li>
                                    <li><a href="{{URL::to('ds-da')}}">Tr???ng th??i ???? x??c nh???n</a></li>
                                    <li><a href="{{URL::to('ds-lay')}}">Tr???ng th??i ???? nh???n ph??ng</a></li>
                                    <li><a href="{{URL::to('ds-done')}}">Tr???ng th??i ???? ho??n t???t</a></li>
                              </ul>
                            </li>
                            <!-- qu???n l?? tin t???c + danh m???c tin t???c -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? tin t???c </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-cat')}}">Danh sa??ch danh m???c </a></li>
                                    <li><a href="{{URL::to('/list-new')}}">Danh sa??ch tin t???c </a></li>

                                </ul>
                            </li>
                                <!-- qu???n l?? ????nh gi?? -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span> Qu???n l?? ????nh gi?? </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/list-new')}}">dsds </a></li>
                                </ul>
                            </li>
                            <!-- qu???n l?? d???ch v??? -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-hotel"></i>
                                    <span> Qu???n l?? d???ch v??? </span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{URL::to('/show-page-add')}}">Th??m d???ch v??? </a></li>
                                    <li><a href="{{URL::to('/list-service')}}">Danh s??ch d???ch v??? </a></li>
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
                    <b style="color: black;">LU???N V??N T???T NGHI???P - WEBSITE QU???N L?? KH??CH S???N</b> - Nguy???n Ph???m Nh???t H??o - Nguy???n V??n To??n
                    </p>
                </div> -->
                 <!-- footer -->
            <!-- <div class="footer">
                <div class="wthree-copyright bottom">
                    <p style="color: black;">
                        <b style="color: white;">LU???N V??N T???T NGHI???P - WEBSITE QU???N L?? KH??CH S???N</b> - Nguy???n Ph???m Nh???t H??o - Nguy???n V??n To??n
                    </p>
                </div>
            </div> -->
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
