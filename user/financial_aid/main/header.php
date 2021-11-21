<!DOCTYPE html>
<html lang="en">

<!-- Goodsoul_html/causes-2.html  20 Nov 2019 03:31:26 GMT -->

<head>
    <meta charset="utf-8">
    <title  translate="no" >SHE Matters</title>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prata|Rubik:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="../assets/main/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/main/css/jquery-ui.css" rel="stylesheet">
    <link href="../assets/main/css/swiper.min.css" rel="stylesheet">
    <link href="../assets/main/css/flaticon.css" rel="stylesheet">
    <link href="../assets/main/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/main/css/animate.css" rel="stylesheet">
    <link href="../assets/main/css/custom-animate.css" rel="stylesheet">
    <link href="../assets/main/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../assets/main/css/owl.css" rel="stylesheet">
    <link href="../assets/main/css/style.css" rel="stylesheet">
    <link href="../assets/main/css/responsive.css" rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

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

        <!-- Main Header-->
        <header class="main-header">

            <!-- Top bar -->
            <div class="top-bar style-three">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="left-content">

                            <ul class="contact-info">
                                <li><span class="flaticon-book"></span><a href="../help.php">Help Desk</a></li>
                                <li><span class="flaticon-mail"></span><a href="../contact.php">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="right-content">
                            <ul class="login-info">
                                <?php if (isset($_SESSION['loggedin_user'])) { ?>
                                    <li><span class="fa fa-cog"></span><a href="../dashboard.php">Dashboard</a></li>
                                    <li><span class="fa fa-sign-out"></span><a href="../logout.php">Logout</a></li>
                                    

                                <?php } else { ?>
                                    <li><span class="flaticon-login"></span><a href="../login.php">Login</a></li>
                                    <li><span class="flaticon-user"></span><a href="../register.php">Register</a></li>
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
                                <div class="logo"><a href="../home.php"><img src="../assets/main/images/logo2.png" style="height: 100px;" alt="" title=""></a>
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
                                                <li><a href="../home.php">Home</a></li>
                                                <li class="dropdown"><a href="#">Complaint Portal</a>
                                                    <ul>
                                                        <li><a href="../complaint_portal/complaint-intro.php">Lodge a Complaint</a></li>
                                                        <li><a href="../complaint_portal/faq-complaints.php">FAQ’s</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="../survivor_stories/ss-intro.php">Survivor Stories</a></li>

                                                <li class="dropdown current"><a href="#">Financial Aid Portal</a>
                                                    <ul>
                                                        <li><a href="faid-intro.php">Financial Aid</a></li>
                                                        <li><a href="causes.php">Donate Now</a></li>
                                                        <li><a href="faq-financial_aid.php">FAQ's</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="../raise_awarness/raiseAwarness.php">Raise Awarness</a></li>


                                            </ul>
                                        </div>
                                    </nav><!-- Main Menu End-->
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!--End Header Upper-->
            </div>


            <!--End Header Upper-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="logo-column">
                            <div class="logo-box">
                                <div class="logo"><a href="../home.php"><img src="../assets/main/images/logo2.png" style="height: 80px;" alt="" title=""></a></div>
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
                    <div class="logo"><a href="../home.php"><img src="../assets/main/images/logo2.png" style="height: 80px;" alt=""></a></div>
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
                            <li><a href="../contact.php">CONTACT US</a></li>
                            <li><a href="../help.php">HELP-DESK</a></li>
                            </ul>
                        </div>
                    </nav>

                </div>

            </div>
            <!-- End Mobile Menu -->

            <div class="nav-overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
        </header>
        <!-- End Main Header -->