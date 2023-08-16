<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cure Nation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- ? Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky btn-success">
                <div class="container-fluid">
                    <div class="row align-items-center">
        <?php
        if (isset($_SESSION['hospital_name'])) {
        ?>
            <a href="logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
        <?php
        }
        ?>
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <h1 class="h1">Cure Nation</h1>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <?php
                                            if (isset($_SESSION['hospital_name'])) {
                                            ?>
                                                <li><a class="text-light bg-color-success" style="font-size:20px; margin-top: 10px " href="index.php">Home</a></li>
                                                <li><a class="text-light bg-color-success" style="font-size:20px; margin-top: 10px " href="view_appointment.php">Appointment</a></li>
                                                <li><a class="text-light bg-color-success" style="font-size:20px; margin-top: 10px " href="contact.php">Enquiry</a></li>
                                                <li><a class="text-light bg-color-success" style="font-size:20px; margin-top: 10px " href="logout.php">Logout</a></li>
                                            <?php
                                            } else {
                                            ?>
                                                <li><a class="text-light bg-color-success dropdown show dropdown-toggle" data-toggle="dropdown" style="font-size:20px; margin-top: 10px " id="dropdownMenuLink" aria-expanded="false" href="">Login</a>
                                                    <!-- </li> -->
                                                    <ul class="submenu">
                                                        <li><a href="../user/login.php">User</a></li>

                                                        <li><a href="../employee/login.php">Hospital</a></li>
                                                        <li><a href="../admin/login.php">Admin</a></li>
                                                    </ul>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
    </header>