<!-- Header Section Begin -->
<header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="{{URL::to('/')}}"><img src="{{URL::asset('public/frontend/img/logo.png')}}" alt=""></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                        <li><a href="{{URL::to('/')}}">Home</a></li>
                                        <li><a href="{{URL::to('/about-us')}}">About</a></li>
                                        <li><a href="{{URL::to('/rooms')}}">Rooms</a></li>
                                        <li><a href="{{URL::to('/news')}}">News</a></li>
                                        <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                                </ul>
                            </nav>



                        </div>
                        <div class="col-xl-4">
                            <nav  class="main-menu mobile-menu">
                                <ul>
                                    @if(Session::has('name') && Session::get('role')==0)
                                    <li><a href="{{ URL::to('/profile')}}">
                                            <?php
                                            $name =Session::Get('name');
                                            if($name)
                                                echo $name;

                                            ?>
                                        </a></li>
                                        <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                                    @else
                                       <li><a href="{{URL::to('/login')}}">Login</a></li>
                                        <li><a href="{{URL::to('/showregister')}}">Register</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    
    <!-- Header End -->
