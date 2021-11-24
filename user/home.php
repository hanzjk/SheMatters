<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Goodsoul_html/  20 Nov 2019 03:24:55 GMT -->

<head>
    <meta charset="utf-8" >
       <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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

 
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            includedLanguages: 'en,si,ta',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
    </script>

<script>
        $('document').ready(function() {

            $('#google_translate_element').on("click", function() {

                // Change font family and color
                $("iframe").contents().find(
                        ".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div"
                    ) //, .goog-te-menu2 *
                    .css({
                        'color': 'red',
                        'background-color': '#ff0800',
                        'font-family': 'sans-serif'
                    });

                // Change Google's default blue border
                $("iframe").contents().find('.goog-te-menu2').css('border', '1px solid red');

                $("iframe").contents().find('.goog-te-menu2').css('background-color', 'red');

                // Change the iframe's box shadow
                $(".goog-te-menu-frame").css({
                    '-moz-box-shadow': '0 3px 8px 2px #666666',
                    '-webkit-box-shadow': '0 3px 8px 2px #666',
                    'box-shadow': '0 3px 8px 2px #666'
                });
            });
        });
        </script>

        <style>
        /* OVERRIDE GOOGLE TRANSLATE WIDGET CSS BEGIN */
        div#google_translate_element div.goog-te-gadget-simple {
            border: none;
            background-color: transparent;
            /*#e3e3ff*/
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value:hover {
            text-decoration: none;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span {
            color: #aaa;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover {
            color: white;
        }

        .goog-te-gadget-icon {
            display: none !important;
            /*background: url("url for the icon") 0 0 no-repeat !important;*/
        }

        /* Remove the down arrow */
        /* when dropdown open */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(213, 213, 213);"] {
            display: none;
        }

        /* after clicked/touched */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(118, 118, 118);"] {
            display: none;
        }

        /* on page load (not yet touched or clicked) */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(155, 155, 155);"] {
            display: none;
        }

        /* Remove span with left border line | (next to the arrow) in Chrome & Firefox */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left: 1px solid rgb(187, 187, 187);"] {
            display: none;
        }

        /* Remove span with left border line | (next to the arrow) in Edge & IE11 */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left-color: rgb(187, 187, 187); border-left-width: 1px; border-left-style: solid;"] {
            display: none;
        }

        /* HIDE the google translate toolbar */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        /* OVERRIDE GOOGLE TRANSLATE WIDGET CSS END */
        </style>
    
 
  
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

                            <ul class="login-info">
                                <li><span class="flaticon-book"></span><a href="help.php">Help-Desk</a></li>

                                <li><span class="flaticon-mail"></span><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="right-content">
                            <ul class="login-info">

                                <?php if (isset($_SESSION["loggedin_user"]) && $_SESSION["loggedin_user"] === true) { ?>
                                    <li><span class="fa fa-cog"></span><a href="dashboard.php">Dashboard</a></li>
                                    <li><span class="fa fa-user-circle-o"></span><a href="#">Welcome Back !</a></li>

                                <?php } else { ?>
                                    <li><span></span><a href="login.php">User</a></li>
                                    <li><span></span><a href="../Admin/login.php">Admin</a></li>
                                    <li><span></span><a href="../Police/login.php">Police</a></li>

                                <?php } ?>

                                <div id="google_translate_element" style="color: white; font-size: 12px;">Language</div>

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
                                                <li class="current"><a href="#">Home</a></li>
                                                <li class="dropdown"><a href="#">Complaint Portal</a>
                                                    <ul>
                                                        <li><a href="complaint_portal/complaint-intro.php">Lodge a Complaint</a></li>
                                                        <li><a href="complaint_portal/faq-complaints.php">FAQ’s</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="survivor_stories/ss-intro.php">Survivor Stories</a></li>

                                                <li class="dropdown"><a href="#">Financial Aid Portal</a>
                                                    <ul>
                                                        <li><a href="financial_aid/apply.php">Financial Aid</a></li>
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
                                <div class="logo"><a href="#"><img src="assets/main/images/logo2.png" style="height: 80px;" alt="" title=""></a></div>
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



        <!-- Bnner Section -->
        <section class="banner-section">
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/b2.jpg.png);">
                        <div class="content-outer">
                            <div class="content-box justify-content-center">
                                <div class="inner text-center">
                                    <div class="link-box-two"><img src="assets/images/unnamed.png" style="width: 200px;height:200px"></div>
                                    <h4><span class="border-shape-left"></span>Welcome to
                                        <span class="border-shape-right"></span>
                                    </h4>
                                    <h1 translate="no">SHE MATTERS</h1>
                                    <div class="text">Incorporated with National Committee of Women
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/b1.jpg);">
                        <div class="content-outer">
                            <div class="content-box justify-content-center">
                                <div class="inner text-center">

                                    <h3>Let's build a future where violence against women will not be tolerated</h3>
                                    <h1>Together we can make <br>a Difference</h1>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/b3.png);">
                        <div class="content-outer">
                            <div class="content-box justify-content-center">
                                <div class="inner text-center">
                                    <h1>Fight back! Be alert! </h1>
                                    <div class="text">The only way to stop violence against women is to speak out and refused to be silent
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slider-pagination style-two"></div>
                <div class="banner-slider-nav style-one">
                    <div class="banner-slider-control banner-slider-button-prev"><span class="fa fa-angle-left"></span>
                    </div>
                    <div class="banner-slider-control banner-slider-button-next"><span class="fa fa-angle-right"></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bnner Section -->




        <!-- About Section -->
        <section class="about-section">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-content-block">
                            <h1>Be part of a change <br>you want to see in the world</h1>
                            <h4>“She Matters” is a web-based application developed to prevent violence against women by encouraging more women to report all forms of violence. It is designed with the hope of building a future where violence against women is not tolerated.
                            </h4>
                            <div class="text wow fadeInUp" data-wow-delay="200ms">Violence against women is one of the most widespread, persistent, and <br>devastating human rights violation issue that is affecting the lives of women globally. Still,it remains largely unreported due to the impunity, silence, stigma, and shame surrounding it..</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="link-btn wow fadeInLeft" data-wow-delay="500ms"><a href="#" class="theme-btn btn-style-two"><i class="flaticon-next"></i><span>Our
                                                Mission</span></a></div>
                                    <div class="text">Making recommendations and providing assistance for the formulation of policies and legislation that safeguard and promote the rights of Sri Lankan women and contribute to their comprehensive development.  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="link-btn wow fadeInRight" data-wow-delay="900ms"><a href="#" class="theme-btn btn-style-three"><i class="flaticon-next"></i><span>Our
                                                Vision</span></a></div>
                                    <div class="text">A violence-free, women-friendly Sri Lankan society that ensures equality. </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-image-block">

                            <div class="image-one wow fadeInUp" data-wow-delay="200ms"><img src="assets/images/c2.jpg" alt=""></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Feature Section Two -->
        <section class="feature-section-two">
            <div class="auto-container">
                <div class="sec-title text-center light style-two">
                    <div class="icon-box"><span class="flaticon-ecology-and-environment"></span></div>

                    <h1>Our Services </h1>
                </div>
                <div class="row">
                    <!-- Feature Block Two -->
                    <div class="col-lg-3 col-md-6 feature-block-four">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="500ms">
                            <div class="icon-box">
                                <img src="assets/main/images/icons/com.png" alt="">
                            </div>
                            <h4>Complaint Portal</h4>
                            <div class="overlay">
                                <h4>Complaint Portal</h4>
                                <div class="text">Any woman can lodge a complaint if she is a victim of violence of any form. </div>
                                <div class="link-btn"><a href="complaint_portal/complaint-intro.php" class="theme-btn btn-style-five"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Feature Block Two -->
                    <div class="col-lg-3 col-md-6 feature-block-four">
                        <div class="inner-box image-one wow fadeInUp" data-wow-delay="800ms">
                            <div class="icon-box">
                                <img src="assets/main/images/icons/fin.png" alt="">
                            </div>
                            <h4>Financial Aid Portal</h4>
                            <div class="overlay" >
                                <h4>Financial Aid Portal</h4>
                                <div class="text">Provide financial assistance and connect donors with women in need.<br> </div>
                                <div class="link-btn"><a href="financial_aid/faid-intro.php" class="theme-btn btn-style-five"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Feature Block Two -->
                    <div class="col-lg-3 col-md-6 feature-block-four">
                        <div class="inner-box image-one wow fadeInDown" data-wow-delay="1100ms">
                            <div class="icon-box">
                                <img src="assets/main/images/icons/sur.png" alt="">
                            </div>
                            <h4>Survivor Stories</h4>
                            <div class="overlay" >
                                <h4>Survivor Stories</h4>
                                <div class="text">Share your story and raise awareness about different forms of violence against women, help others cope with their situation. </div>
                                <div class="link-btn"><a href="survivor_stories/ss-intro.php" class="theme-btn btn-style-five"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Feature Block Two -->
                    <div class="col-lg-3 col-md-6 feature-block-four">
                        <div class="inner-box wow fadeInRight" data-wow-delay="1400ms">
                            <div class="icon-box">
                                <img src="assets/main/images/icons/awr.png" alt="">
                            </div>
                            <h4>Raise Awareness</h4>
                            <div class="overlay">
                                <h4>Raise Awareness</h4>
                                <div class="text">Provide education to women on gender based violence. </div>
                                <div class="link-btn"><a href="raise_awarness/raiseAwarness.php" class="theme-btn btn-style-five"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Funfact Section -->
        <section class="funfacts-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h1>Numbers speaking</h1>
                    <?php
                    $sql = "SELECT  COUNT(story_id)  FROM survivor_stories  ";
                    $result = mysqli_query($link, $sql);
                    $inq_count1 = mysqli_fetch_assoc($result);
                    $Count = $inq_count1["COUNT(story_id)"];


                    $res1 = mysqli_query($link, "SELECT SUM(amount) FROM donations ");
                    $row_s1 = mysqli_fetch_row($res1);
                    $sum1 = $row_s1[0];

                    $sql1 = "SELECT  COUNT(complaint_id)  FROM complaints  ";
                    $result1 = mysqli_query($link, $sql1);
                    $inq_count11 = mysqli_fetch_assoc($result1);
                    $Count1 = $inq_count11["COUNT(complaint_id)"];

                    ?>
                </div>
                <div class="outer-box">
                    <div class="funfact-wrapper row">
                        <!--Column-->
                        <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="300ms">
                            <div class="inner-box">
                                <div class="icon-box"><img src="assets/main/images/icons/icon-3.png" alt=""></div>
                                <h4>Survival Stories</h4>
                                <div class="count-box">
                                    <span class="count-text" data-speed="3000" data-stop="<?php echo $Count ?>">0</span>
                                </div>
                                <div class="text">Over <?php echo $Count ?> survivors have shared <br>their story with us.
                                </div>
                            </div>
                        </div>
                        <!--Column-->
                        <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="600ms">
                            <div class="inner-box">
                                <div class="icon-box"><img src="assets/main/images/icons/icon-4.png" alt=""></div>
                                <h4>Donations</h4>
                                <div class="count-box">
                                    <span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="<?php echo $sum1 ?>">0</span><span class="affix">Rs</span>
                                </div>
                                <div class="text">We have raised over <?php echo $sum1 ?>Rs <br>with our generous donors</div>
                            </div>
                        </div>
                        <!--Column-->
                        <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="300ms">
                            <div class="inner-box">
                                <div class="icon-box"><img src="assets/main/images/icons/icon-5.png" alt=""></div>
                                <h4>Complaints</h4>
                                <div class="count-box">
                                    <span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="<?php echo $Count1 ?> "></span><span class="affix"></span>
                                </div>
                                <div class="text">We have received over <?php echo $Count1 ?> complaints.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>







        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="auto-container">
                <div class="widget-wrapper">
                    <div class="row">
                        <!-- Contact Widget -->
                        <div class="col-lg-3 col-md-6 contact-widget footer-widget">
                            <h4 class="widget-title">Contact</h4>
                            <ul>
                                <li>State Ministry of Women and Child Development,Pre-Schools & Primary Education,School Infrastructure & Education Services
                                    5th Floor, Sethsiripaya Stage II,
                                    Battaramulla, Sri Lanka.</li>
                                <li><a href="mailto:shematters21@gmail.com">shematters21@gmail.com </a></li>
                            </ul>
                            <h3><a href="tel:+94 11 2186055">+94 11 2186055</a></h3>
                        </div>
                        <!-- About Widget -->
                        <div class="col-lg-3 col-md-6 about-widget footer-widget">
                            <h4 class="widget-title">About</h4>
                            <ul>
                                <li><a href="complaint_portal/complaint-intro.php">Complaint Portal</a></li>
                                <li><a href="financial_aid/faid-intro.php">Financial Aid Portal</a></li>
                                <li><a href="survivor_stories/ss-intro.php">Stories of Survival</a></li>
                                <li><a href="raise_awarness/raiseAwarness.php">Raise Awareness</a></li>
                            </ul>
                        </div>
                        <!-- Link Widget -->
                        <div class="col-lg-3 col-md-6 link-widget footer-widget">
                            <h4 class="widget-title">Quick Link</h4>
                            <ul>
                                <li><a href="complaint_portal/complaint.php">Make a Complaint</a></li>
                                <li><a href="financial_aid/apply.php">Apply for Financial Aid</a></li>
                                <li><a href="financial_aid/causes.php">Donate Now</a></li>
                                <li><a href="survivor_stories/my_stories.php">Share your Story</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="left-content">
                        <div class="icon"><img src="assets/images/logo.png" alt=""></div>
                        <div class="copyright-text"  translate="no" >Copyright © SHE MAtters 2021<a href="#"></a>
                        </div>

                    </div>
                </div>
        </footer>

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-arrow"></span></div>


    </div>
    <!--End pagewrapper-->


  
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
