<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'namef', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'namee', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (namef, namee, email, username, password) 
            VALUES (:namef, :namee, :email, :username, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":namef" => $namef,
        ":namee" => $namee,
        ":email" => $email,
        ":username" => $username,
        ":password" => $password
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Daftar - Mungut.in</title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

 <!--== Header Area Start ==-->
 <header id="header-area" class="fixed-top">
    <!--== Header Top Start ==-->
    <div id="header-top" class="d-none d-xl-block">
        <div class="container">
            <div class="row">
                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-left">
                    <i class="fa fa-map-marker"></i> 11530, Jakarta Barat, DKI Jakarta
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-center">
                    <i class="fa fa-mobile"></i> +62 21 5345830
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-3 text-center">
                    <i class="fa fa-clock-o"></i> Sen-Sab 09.00 - 17.00
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Social Icons Start ==-->
                <div class="col-lg-3 text-right">
                    <div class="header-social-icons">
                        <a href="#"><i class="fa fa-behance"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <!--== Social Icons End ==-->
            </div>
        </div>
    </div>
    <!--== Header Top End ==-->

    <!--== Header Bottom Start ==-->
    <div id="header-bottom">
        <div class="container">
            <div class="row">
                <!--== Logo Start ==-->
                <div class="col-lg-4">
                    <a href="index.html" class="logo">
                        <img src="assets/img/logo.png" alt="JSOFT">
                    </a>
                </div>
                <!--== Logo End ==-->

                <!--== Main Menu Start ==-->
                <div class="col-lg-8 d-none d-xl-block">
                    <nav class="mainmenu alignright">
                        <ul>
                            <li><a href="index.html">Beranda</a></li>
                            <li><a href="about.html">Tentang Kami</a></li>
                            <li><a href="services.html">Layanan</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="login.php">Log In</a></li>
                            <li class="active"><a href="register.php">Daftar</a></li>
                            <li><a href="contact.html">Hubungi Kami</a></li>
                        </ul>
                    </nav>
                </div>
                <!--== Main Menu End ==-->
            </div>
        </div>
    </div>
    <!--== Header Bottom End ==-->
</header>
<!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Daftar</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Anda Member Baru?</h3>
							<form action="" method="POST">
								<div class="name">
									<div class="row">
										<div class="col-md-6">
											<input class="form-control" type="text" name="namef" placeholder="Nama Depan">
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" name="namee" placeholder="Nama Belakang">
										</div>
									</div>
								</div>
								<div class="email">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="username">
									<input class="form-control" type="text" name="username" placeholder="Username">
								</div>
								<div class="password">
									<input  class="form-control" type="password" name="password" placeholder="Password">
								</div>
								<div class="log-btn">
									<button type="submit"><i class="fa fa-check-square" name="register"></i> Daftar</button>
								</div>
							</form>
                		</div>
                		
                		<div class="login-other">
                			<span class="or">or</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Daftar dengan Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Daftar dengan Google</a>
                		</div>
                		<div class="create-ac">
                			<p>Sudah Terdaftar? <a href="login.html">Log In Sekarang Juga!</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="about.html">Tentang Kami</a>
                			<span>|</span>
                			<a href="contact.html">Hubungi Kami</a>
                		</div>
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

 <!--== Footer Area Start ==-->
 <section id="footer-area">
    <!-- Footer Widget Start -->
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Tentang Kami</h2>
                        <div class="widget-body">
                            <img src="assets/img/logo.png" alt="JSOFT">
                            <p>“Mungut.in” merupakan perusahaan yang bergerak di bidang lingkungan hidup.</p>
                            <div class="newsletter-area">
                                <form action="index.html">
                                    <input type="email" placeholder="Berlangganan">
                                    <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Single Footer Widget End -->

                <!-- Single Footer Widget Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Tetaplah Terhubung</h2>
                        <div class="widget-body">
                            <p>Tetaplah terhubung bersama kami untuk mengetahui layanan terbaru dari kami.</p>

                            <ul class="get-touch">
                                <li><i class="fa fa-map-marker"></i> 11530, Jakarta Barat, DKI Jakarta</li>
                                <li><i class="fa fa-mobile"></i> +62 21 5345830</li>
                                <li><i class="fa fa-envelope"></i> mail.mungutin@gmail.com</li>
                            </ul>
                            <a href="https://www.google.com/maps/place/BINUS+University,+Anggrek+Campus/@-6.2019433,106.7809316,15z/data=!4m5!3m4!1s0x0:0x209cb1eef39be168!8m2!3d-6.2019433!4d106.7809316" class="map-show" target="_blank">Tunjukkan Lokasi</a>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Widget End -->
            </div>
        </div>
    </div>
    <!-- Footer Widget End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</section>
<!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>