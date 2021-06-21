
<!DOCTYPE html>
<html>
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
            <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="css/flaticon.css" type="text/css">
            <link rel="stylesheet" href="css/linearicons.css" type="text/css">
            <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
            <link rel="stylesheet" href="css/nice-select.css" type="text/css">
            <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
            <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
        <body>
            <!-- Page Preloder -->
            <div id="preloder">
                <div class="loader"></div>
            </div>
            <!-- Header Section Begin -->
            <header class="header-section">
                <div class="container-fluid">
                    <div class="inner-header">
                        <div class="logo">
                            <a href="./test.php"><img src="img/logo.png" alt=""></a>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <nav class="main-menu mobile-menu">
                                        <ul>
                                            <li><a href="./test.php">Home</a></li>
                                            <li><a href="./about-us.php">About</a></li>
                                            <li><a href="./rooms.php">Rooms</a></li>
                                            <li><a href="./contact.php">Contact</a></li>
                                            
                                        </ul>
                                    </nav>
                                    <div class="top-info">
                                        <img src="img/placeholder.png" alt="">
                                        <span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </header>
            <br>
            <!-- Header End -->
            <section class="room-availability spad">
                <div class="container">
                    <div class="room-check">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="check-form">
                                    <h2>PROFILE</h2>
                                    <form action="updateprofile.php" method="post" enctype="multipart/form-data">
                                        <div class="datepicker">
                                            <div class="date-select">
                                                <p>Full name</p>
                                                <input type="text" value="Họ tên khách hàng" name="fullname">
                                            </div>
                                        </div>
                                        <div class="datepicker">
                                            <div class="date-select to">
                                                <p>SĐT</p>
                                                <input type="text" value="Nhập sđt" name="sdt">
                                            </div>
                                        </div>
                                        <div class="datepicker">
                                            <div class="date-select to">
                                                <p>Email</p>
                                                <input type="text" value="Email" name="email">
                                            </div>
                                        </div>
                                        <div class="room-quantity">
                                            <div class="single-quantity">
                                                <p>Tuổi</p>
                                                <div class="pro-qty"><input type="text" value="0" name="age"></div>
                                            </div>
                                        </div>
                                        <button type="update" name="update">Cập Nhật <i class="lnr lnr-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Js Plugins -->
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/jquery-ui.min.js"></script>
            <script src="js/jquery.nice-select.min.js"></script>
            <script src="js/jquery.slicknav.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>
        </body>
    </html>