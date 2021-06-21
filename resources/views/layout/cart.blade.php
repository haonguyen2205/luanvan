<!DOCTYPE HTML>
<html>
<head>
<title>Đơn phòng</title>
<link href="{{URL::asset('public/cart/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Cart Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--google fonts-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>



<link rel="stylesheet" href="{{URL::asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/flaticon.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/linearicons.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/nice-select.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/magnific-popup.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/slicknav.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('public/frontend/css/style.css')}}" type="text/css">



<script src="{{URL::asset('public/cart/js/jquery-1.11.0.min.js')}}"></script>

<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.cake-top').fadeOut('slow', function(c){
	  		$('.cake-top').remove();
		});
	});
});
</script>

<script>$(document).ready(function(c) {
	$('.close-btm').on('click', function(c){
		$('.cake-bottom').fadeOut('slow', function(c){
	  		$('.cake-bottom').remove();
		});
	});
});
</script>
</head>
<body>
@include('header')
</br>
</br>
</br>
</br>
</br>


<form action="" method="">
    <div class="cart with">

        <div class="cart-bottom">
            <div class="row">
                <!-- Bảng thông tin -->
                <div class="col-lg-5">
                    <div class="check-form">
                        <h2>Information</h2>
                        <div class="room-quantity">
                            <div class="single-quantity">
                                <p>Nhập tên khách hàng</p>
                                <input placeholder="Tên khách hàng" type="text">
                            </div>
                            <div class="single-quantity">
                                <p>Nhập số điện thoại</p>
                                <input placeholder="Số điện thoại" type="text">
                            </div>
                        </div>
                        <div class="datepicker">
                            <div class="date-select">
                                <p>From</p>
                                <input type="text" class="datepicker-1" value="dd / mm / yyyy">
                                <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
                            </div>
                            <div class="date-select to">
                                <p>To</p>
                                <input type="text" class="datepicker-2" value="dd / mm / yyyy">
                                <img src="{{URL::asset('public/frontend/img/calendar.png')}}" alt="">
                            </div>
                        </div>
                        <div class="room-quantity">
                            <div class="single-quantity">
                                <p>Adults</p>
                                <div class="pro-qty"><input type="text" value="0"></div>
                            </div>
                            <div class="single-quantity last">
                                <p>Children</p>
                                <div class="pro-qty"><input type="text" value="0"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bảng đơn phòng -->
                <div class="col-lg-7">
                    <div class="table" align="center">
                        <table>
                            <tr class="main-heading">
                                <td>Images</td>
                                <td>Name</td>
                                <td>ID</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Total</td>

                                <!-- <th>Images</th>
                                <th>Name</th>
                                <th>Room ID</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th> -->
                            </tr>
                            <tr class="cake-bottom">
                                <td class="cakes">
                                    <div class="product-img2">
                                        <img src="{{URL::asset('public/cart/images/cack2.png')}}">
                                    </div>
                                </td>
                                <td>Cake Straw</td>
                                <td>001</td>
                                <td class="quantity">
                                    <div class="product-right">
                                        <input min="1" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">
                                    </div>
                                </td>
                                <td>
                                    <h4>$12.99</h4>
                                </td>
                                <td class="btm-remove">
                                    <h4>$25.98</h4>
                                    <div class="close-btm">
                                        <h5>Remove</h5>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="vocher">
                        <div class="dis-total">
                            <h1>Total $38.97</h1>
                            <div class="tot-btn">
                                <a class="shop" href="{{URL::to('/rooms')}}">Back</a>
                                <a class="check" href="#">Book</a>
                            </div>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('footer')



<script src="{{URL::asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/main.js')}}"></script>


</body>
</html>
