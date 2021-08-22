<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

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
</head>
<body>
	@include('header')

    <!-- Login -->
    <div class="container"> 
	   <!--header-->
        <div class="header-w3l">
            <h1>VerifyCsrfToken</h1>
        </div>
        <!--End Header-->
        
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <div class="wthree-pro">
                    <h2>VERIFY ACCOUNT</h2>
                </div>
                <div class="wthree-pro">

                </div>
                
                <form action="{{URL::to('/register/verify-token')}}" method="get">
                {{ csrf_field() }}
                    <div class="pom-agile">
                        <input  class="user" type="hidden" name="id" value="{{$id}}" required="">
                    </div>
                    <div class="pom-agile">
                        <input  placeholder="mã xác nhận" name="token" class="form-control" minlength="6" maxlength="6" type="text" required="">
                    </div>
                   
					<A href="{{URL::to('/register/resend-token/')}}"></A>
					<input type="submit" name="submit" value="xác nhận">
                </form>
            </div>
        </div>
    </div>
    <!-- End Login -->


	<!-- Js Plugins -->
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