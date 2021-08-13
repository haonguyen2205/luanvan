<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Register</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Event Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{{URL::asset('public/register/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="{{URL::asset('public/register/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- js -->
	<script type="text/javascript" src="{{URL::asset('public/register/js/jquery-2.1.4.min.js')}}"></script>
	<!-- //js -->
	<!-- Css Styles -->
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
	<link rel="stylesheet" href="{{URL::asset('public/frontend/css/style1.css')}}" type="text/css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> 

	<style>
		.header-left-bottom input[type="email"] {
		outline: none;
		font-size: 15px;
		font-weight: 400;
		color: #ececec;
		padding: 12px 13px 20px 11px;
		border: none;
		width: 80%;
		display: inline-block;
		background: transparent;
		font-family: 'CinzelDecorative-Regular';
	}
	.header-left-bottom input[type="password"] {
		outline: none;
		font-size: 15px;
		font-weight: 400;
		color: #ececec;
		border: none;
		padding: 12px 13px 20px 20px;
		width: 80%;
		display: inline-block;
		background: transparent;
		font-family: 'CinzelDecorative-Regular';
	}
	</style>
</head>
<body>
<script src="{{URL::asset('public/register/js/jquery.vide.min.js')}}"></script>
<!-- main -->
@include('header')
</br>
</br>
</br>
	<div class="center-container">
		<div class="w3ls-header">
			<div class="header-main">
				<h1>Register Form</h1>
				<?php
				$message =Session::Get('msg');	
				if($message)
                echo "<h3 style='color:red;'>".$message."</h3>";
                Session::put('msg', null);
          ?>
				<div class="header-bottom">
					<div class="header-right w3agile">
						<div class="header-left-bottom agileinfo">
							<form action="{{URL::to('/register')}}" method="post">
							{{ csrf_field() }}
								<div class="icon1">
									<i class="fa fa-user" aria-hidden="true"></i>
									<input  type="text" placeholder="Enter your name" name="name" required=""/>
								</div>
								
								<div class="icon1">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<input type="email" placeholder="Enter your email" name="email" required=""/>
								</div>

								<div class="icon1">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<input type="tel" placeholder="Phone number" name="phone" minlength="10" maxlength="12" required=""/>
								</div>

								<div class="icon1">
									<i class="fa fa-location-arrow" aria-hidden="true"></i>
									<input  type="text" placeholder="Enter your address" name="address" required=""/>
								</div>

								<div class="icon1">
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input type="password" placeholder="Create password" minlength="6" maxlength="50" name="password" required=""/>
								</div>

								<div class="icon1">
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input type="password" placeholder="Confirm password" min.length="6" maxlength="50" name="repassword" required=""/>
								</div>

								<div class="bottom">
									<input type="submit" value="Register" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header end here-->
	</div>

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

@if(Session::has('email_uni'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('email_uni')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('email_uni',null);
  ?>
@endif



@if(Session::has('pass_uni'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('pass_uni')}}","error",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('pass_uni',null);
  ?>
@endif