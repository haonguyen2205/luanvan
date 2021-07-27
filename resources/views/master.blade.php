<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>

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
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/stylesearchroom.css')}}" type="text/css">
    <style>
        .rooms-page-item .room-text i {
            float: right;
            text-align: center;
            
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>
    
    @include('header')

    @yield('content')

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
</body>

</html>