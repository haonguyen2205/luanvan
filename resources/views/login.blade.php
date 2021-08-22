<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel | Template</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>   

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
            <h1>Online Login Form</h1>
        </div>
        <!--End Header-->
        
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <div class="wthree-pro">
                    <h2 style="color:yellow">Login Quick</h2>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                      {{session()->get('success')}}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-error">
                      {{session()->get('error')}}
                    </div>
                    @endif
                </div>
                <div class="wthree-pro">
                
                </div>
                
                <form action="{{URL::to('/checklogin')}}" method="post">
                {{ csrf_field() }}
                    <div class="pom-agile">
                        <input placeholder="E-mail" name="email" class="user" type="email" required="">
                        
                        <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <div class="pom-agile">
                        <input  placeholder="Password" name="password" class="pass" type="password" required="">
                        <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                    </div>

                    <div class="sub-w3l">
                        <h6 style="color:red"><a href="{{URL::to('/forget-password')}}" style="color:red">Forgot Password?</a></h6>
                        <div class="right-w3l">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
    <!-- End Login -->

	@include('footer')

	<!-- Js Plugins -->
    <script src="{{URL::asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/main.js')}}"></script>

@if(Session::has('verify-email'))
  <script type="text/javascript" >
    swal("Congratulation!","{{Session::Get('verify-email')}}","success",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('verify-email',null);
  ?>
@endif

@if(Session::has('message'))
  <script type="text/javascript" >
    swal("thông báo!","{{Session::Get('message')}}","warning",{
      button:"OK",
    });
  </script> 
  <?php
    session::put('message',null);
  ?>
@endif
</body>
</html>
@