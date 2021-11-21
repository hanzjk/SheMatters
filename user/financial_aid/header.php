<?php
date_default_timezone_set('Asia/Colombo');
require_once "../config.php";

if (!isset($_SESSION['loggedin_user'])) {
    header('Location: login.php');
    exit;
} else {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $records = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($records);
    $result = $link->query("SELECT photo FROM users WHERE  id='" . $id . "'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title  translate="no" >SHE Matters</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/Header/vendors/mdi/css/materialdesignicons.min.css">


    <link rel="stylesheet" href="../assets/Header/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
   <link rel="stylesheet" href="../assets/Header/css/style.css" />

    <!-- End layout styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

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

<body >
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="dashboard.php">
                            <img src="../assets/main/images/logo2.png" alt="logo" style="height: 75px; width: auto;" />
                        </a>  
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">


                        

                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="notiDropdown">
                                    <a class="dropdown-item" href="#">

                                        <div class="preview-item-content">

                                            <h6 class="preview-subject font-weight-normal"> <i class="mdi mdi-information mx-0" style="color:#f0ad4e;"></i> &nbsp;&nbsp;Notification 1</h6>

                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">

                                        <div class="preview-item-content">

                                            <h6 class="preview-subject font-weight-normal"> <i class="mdi mdi-information mx-0" style="color:#f0ad4e;"></i> &nbsp;&nbsp;Notification 2</h6>

                                        </div>
                                    </a>
                                </div>
                            </li>


                            <li class="nav-item nav-profile dropdown">

                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <div class="nav-profile-img">

                                        <?php if ($result->num_rows > 0 && $data['photo'] != null) { ?>
                                            <?php while ($row1 = $result->fetch_assoc()) { ?>
                                                <img src="data:photo/jpg;charset=utf8;base64,<?php echo base64_encode($row1['photo']); ?>" />
                                            <?php } ?>
                                        <?php } else { ?>
                                            <img src="../assets/images/user2.jpg" alt="Image">
                                        <?php } ?>

                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> <?php echo $data['name'] ?> </p>
                                    </div>
                                </a>

                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="../home.php">
                                        <i class="mdi mdi-home mr-2 text-dark"></i> Home </a>
                                    <a class="dropdown-item" href="../profile1.php">
                                        <i class="mdi mdi-cached mr-2 text-dark"></i> Profile </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="mdi mdi-logout mr-2 text-dark"></i> Logout </a>
                                </div>
                            </li>


                        </ul>

                        <div id="google_translate_element" style="color: black; font-size: 12px;">Language</div>

                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>


                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container" id="page1">
                    <ul class="nav page-navigation" id="page-navigation">

                        <li class="nav-item  ">
                            <a class="nav-link " href="../dashboard.php">
                                <i class="mdi mdi-view-dashboard menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item" id="link2">
                            <a href="#" class="nav-link" >
                                <i class="mdi mdi-folder-edit menu-icon"></i>
                                <span class="menu-title">Complaint Portal</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="../complaint_portal/lodged_complaints.php">My Complaints</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-currency-usd menu-icon"></i>
                                <span class="menu-title">Financial Aid Portal</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="my_applications.php">My Applications</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item" id="link3">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-star-circle menu-icon"></i>
                                <span class="menu-title">Survivor Stories</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="../survivor_stories/my_stories.php">My Story</a></li>
                                </ul>
                            </div>
                        </li>

                        
                         
                        <li class="nav-item" style="display: none;">
                            
                        </li>
                        

                    </ul>
                </div>
            </nav>
        </div>