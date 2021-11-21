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
                                <li><span class="flaticon-book"></span><a href="help.php">Help Desk</a></li>
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
                                <div class="logo"><a href="#"><img src="assets/main/images/logo2.png" style="height: 100px;" alt="" title=""></a>
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
                                <div class="logo"><a href="index-2.html"><img src="assets/main/images/logo2.png" style="height: 80px;" alt="" title=""></a></div>
                            </div>
                        </div>
                        <div class="menu-column">
                            <div class="nav-outer">

                                <div class="nav-inner">

                                    <!-- Main Menu -->
                                    <nav class="main-menu navbar-expand-xl navbar-dark">

                                        <div class="collapse navbar-collapse">
                                            <ul class="navigation">
                                            <li><a href="contact.php">CONTACT US</a></li>
                            <li><a href="help.php">HELP-DESK</a></li>
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
                    <div class="logo"><a href="#">
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
                    <h1>Get Touch With Us</h1>
                    <ul class="bread-crumb">
                        <li><a class="home" href="index-2.html"><span class="fa fa-home"></span></a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Contact Form -->
        <section class="contact-form-section">
            <div class="auto-container">
 <?php if($status=='failed') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something is wrong : Please try again later. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>

                <?php if($status=='success') { ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Your message has been sent. Thank you! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>


                <div class="row">
                    <div class="col-lg-7">
                        <div class="default-form-area">
                            <div class="sec-title">
                                <h1>Contact us</h1>
                            </div>
                            <form id="contact-form" name="contact_form" class="contact-form" action="contact_action.php" method="post" role="form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 column">
                                        <div class="form-group">
                                            <input type="text" name="form_name" class="form-control" value="" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 column">
                                        <div class="form-group">
                                            <input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 column">
                                        <div class="form-group">
                                            <textarea name="form_message" class="form-control textarea required" placeholder="Message...."></textarea>
                                        </div>
                                        <div class="form-group flex-box">
                                            <div class="submit-btn">
                                                <input id="form_botcheck" name="contact_form" class="form-control" type="hidden" value="">
                                                <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>Send Message</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info-three">
                            <div class="single-info">
                                <h4>Address</h4>
                                <div class="text">State Ministry of Women and Child Development,Pre-School & Primary Education,School Infrastructure & Education Services,
                                    5th Floor, Sethsiripaya Stage II,
                                    Battaramulla, Sri Lanka..</div>

                            </div>
                            <div class="single-info">
                                <h4>Quick Contact</h4>
                                <div class="wrapper-box">
                                    <a href="mailto:shematters21@gmail.com">shematters21@gmail.com </a> <br>
                                    <a href="tel:+94 11 2186055">+94 11 2186055</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 text-center">
                    <div class="col-lg-12  text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4282.129658889541!2d79.91379237388738!3d6.9025185514911955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259fee34e9731%3A0x55575008cf4a0b48!2sState%20Ministry%20of%20Women%20and%20Child%20Development!5e0!3m2!1sen!2slk!4v1629470836502!5m2!1sen!2slk" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>


            </div>
        </section>


        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="auto-container">

                <div class="footer-bottom">
                    <div class="left-content">
                        <div class="copyright-text">Copyright © SHE MAtters 2021<a href="#"></a>
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