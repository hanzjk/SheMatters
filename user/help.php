<?php
require_once 'config.php';

$status='';
if(isset($_GET['action'])){
    $status = $_GET['action'];

}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Goodsoul_html/  20 Nov 2019 03:24:55 GMT -->

<head>
    <meta charset="utf-8">
    <title>SHE Matters</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prata|Rubik:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/main/css/bootstrap.css" rel="stylesheet">
    <link href="assets/main/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/main/css/swiper.min.css" rel="stylesheet">
    <link href="assets/main/css/flaticon.css" rel="stylesheet">
    <link href="assets/main/css/font-awesome.css" rel="stylesheet">
    <link href="assets/main/css/animate.css" rel="stylesheet">
    <link href="assets/main/css/custom-animate.css" rel="stylesheet">
    <link href="assets/main/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/main/css/owl.css" rel="stylesheet">
    <link href="assets/main/css/style.css" rel="stylesheet">
    <link href="assets/main/css/responsive.css" rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- Main Header-->
        <header class="main-header">
            <!-- Top bar -->
            <div class="top-bar style-three">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="left-content">

                            <ul class="contact-info">
                                <li><span class="flaticon-book"></span><a href="#">Help Desk</a></li>
                                <li><span class="flaticon-mail"></span><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="right-content">
                            <ul class="login-info">

                                <?php if (isset($_SESSION["loggedin_user"]) && $_SESSION["loggedin_user"] === true) { ?>
                                    <li><span class="fa fa-cog"></span><a href="dashboard.php">Dashboard</a></li>
                                    <li><span class="fa fa-user-circle-o"></span><a href="#">Welcome Back !</a></li>

                                <?php } else { ?>
                                    <li><span class="flaticon-login"></span><a href="login.php">Login</a></li>
                                    <li><span class="flaticon-user"></span><a href="register.php">Register</a></li>

                                <?php } ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="logo-column">
                            <div class="logo-box">
                                <div class="logo"><a href="home.php"><img src="assets/main/images/logo2.png" style="height: 100px;" alt="" title=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="right-column">
                            <div class="option-wrapper">
                                <div class="nav-outer">

                                    <!-- Main Menu -->
                                    <nav class="main-menu navbar-expand-xl navbar-dark">

                                        <div class="collapse navbar-collapse">
                                            <ul class="navigation">
                                                <li class=""><a href="home.php">Home</a></li>
                                                <li class="dropdown"><a href="#">Complaint Portal</a>
                                                    <ul>
                                                        <li><a href="complaint_portal/complaint-intro.php">Lodge a Complaint</a></li>
                                                        <li><a href="complaint_portal/faq-complaints.php">FAQ’s</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="survivor_stories/ss-intro.php">Survivor Stories</a></li>

                                                <li class="dropdown"><a href="#">Financial Aid Portal</a>
                                                    <ul>
                                                        <li><a href="financial_aid/faid-intro.php">Financial Aid</a></li>
                                                        <li><a href="financial_aid/causes.php">Donate Now</a></li>
                                                        <li><a href="financial_aid/faq-financial_aid.php">FAQ's</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="raise_awarness/raiseAwarness.php">Raise Awarness</a></li>


                                            </ul>
                                        </div>
                                    </nav><!-- Main Menu End-->
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!--End Header Upper-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="logo-column">
                            <div class="logo-box">
                                <div class="logo"><a href="home.php"><img src="assets/main/images/logo2.png" style="height: 80px;" alt="" title=""></a></div>
                            </div>
                        </div>
                        <div class="menu-column">
                            <div class="nav-outer">

                                <div class="nav-inner">

                                    <!-- Main Menu -->
                                    <nav class="main-menu navbar-expand-xl navbar-dark">

                                        <div class="collapse navbar-collapse">
                                            <ul class="navigation">
                                            </ul>
                                        </div>
                                    </nav><!-- Main Menu End-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu  -->
            <div class="mobile-menu style-one">
                <div class="menu-box">
                    <div class="logo"><a href="home.php">
                            <img src="assets/main/images/logo2.png" style="height: 60px;" 0 alt="">
                        </a></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-xl navbar-dark">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="flaticon-menu"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navigation">
                            <li><a href="contact.php">CONTACT US</a></li>
                            <li><a href="help.php">HELP-DESK</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                </div>

            </div>
            <!-- End Mobile Menu -->

            <div class="nav-overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
        </header>
        <!-- End Main Header -->




        <!-- Page Title -->
        <section class="page-title" style="background-image:url(images/background/bg-13.jpg)">
            <div class="auto-container">
                <div class="content-box">
                    <h1>Help Desk</h1>
                    <ul class="bread-crumb">
                        <li><a class="home" href="home.php"><span class="fa fa-home"></span></a></li>
                        <li>Help Desk</li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Contact Form -->
        <section class="blog-section">
        <div class="auto-container">
            <div class="row">
                <!-- News Block Two -->
                <div class="col-lg-4 col-md-6 news-block-two style-three">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image mb-5">
                            <div class="category"><a href="#">Help 01</a></div>
                          
                        </div>
                        <div class="lower-content mt-4">
                            <h4><a href="blog-details.html">Complaint Portal</a></h4>
                            <div class="author-info">
                                <div class="author-title"><a href="complaint_portal/faq-complaints.php">View</a></div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 news-block-two style-three">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image mb-5">
                            <div class="category"><a href="#">Help 02</a></div>
                          
                        </div>
                        <div class="lower-content mt-4">
                            <h4><a href="blog-details.html">Financial Aid Portal</a></h4>
                            <div class="author-info">
                                <div class="author-title"><a href="financial_aid/faq-financial_aid.php">View</a></div>
                               
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 news-block-two style-three">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image mb-5">
                            <div class="category"><a href="#">Help 03</a></div>
                          
                        </div>
                        <div class="lower-content mt-4">
                            <h4><a href="blog-details.html">Survivor Stories Portal</a></h4>
                            <div class="author-info">
                                <div class="author-title"><a href="survivor_stories/ss-intro.php">View</a></div>
                               
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </section>
















      <!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">

        <div class="footer-bottom">
            <div class="left-content">
            <div class="icon"><img src="assets/images/logo.png" alt=""></div>

                <div class="copyright-text"><a href="#">Copyright © SHE MAtters 2021</a>
                </div>
            </div>

        </div>
    </div>
</footer>

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-arrow"></span></div>


    </div>
    <!--End pagewrapper-->



    <!-- JS -->
    <script src="assets/main/js/jquery.js"></script>
    <script src="assets/main/js/popper.min.js"></script>
    <script src="assets/main/js/bootstrap.min.js"></script>
    <script src="assets/main/js/TweenMax.min.js"></script>
    <script src="assets/main/js/wow.js"></script>
    <script src="assets/main/js/owl.js"></script>
    <script src="assets/main/js/appear.js"></script>
    <script src="assets/main/js/swiper.min.js"></script>
    <script src="assets/main/js/jquery.fancybox.js"></script>
    <script src="assets/main/js/menu-nav-btn.js"></script>
    <script src="assets/main/js/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="assets/main/js/script.js"></script>

</body>

<!-- Goodsoul_html/  20 Nov 2019 03:26:36 GMT -->

</html>