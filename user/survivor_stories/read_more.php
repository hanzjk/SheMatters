<?php
require_once "../config.php";
require_once 'main/header.php';

$story_id = $_GET['story_id'];

$result = mysqli_query($link, "SELECT * FROM survivor_stories WHERE story_id='" . $story_id . "' ");
$story = mysqli_fetch_assoc($result);

?>



<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>

                <?php

                if ($story['anonymous'] == "Yes") {
                    echo "Her Story";
                } else {
                    $result_name = mysqli_query($link, "SELECT name FROM users WHERE id='" . $story['survivor_id'] . "'");
                    $data_name = mysqli_fetch_assoc($result_name);
                    echo explode(" ", $data_name['name'])[0] . "'s Story";
                }

                ?>
            </h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Stories of Survival</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="auto-container row lg-mx-5 md-mx-2 ">

   
    <?php echo $story['story']; ?>
 
  

    </div>
</section>

<br>

<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">

        <div class="footer-bottom">
            <div class="left-content">
            <div class="icon"><img src="../assets/images/logo.png" alt=""></div>

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
 <script src="../assets/main/js/jquery.js"></script>
    <script src="../assets/main/js/popper.min.js"></script>
    <script src="../assets/main/js/bootstrap.min.js"></script>
    <script src="../assets/main/js/TweenMax.min.js"></script>
    <script src="../assets/main/js/wow.js"></script>
    <script src="../assets/main/js/owl.js"></script>
    <script src="../assets/main/js/appear.js"></script>
    <script src="../assets/main/js/swiper.min.js"></script>
    <script src="../assets/main/js/jquery.fancybox.js"></script>
    <script src="../assets/main/js/menu-nav-btn.js"></script>
    <script src="../assets/main/js/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="../assets/main/js/script.js"></script>


<script>
    function story() {
        <?php
        if (isset($_SESSION['loggedin_user'])) { ?>
            window.location = "share.php";

        <?php } else { ?>
            jQuery('#myModal').modal();
        <?php } ?>


    }
</script>


<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="material-icons">login</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Authentication Required</h4>
                <p>Not logged in. Please log in to continue.</p>
                <a href="../login.php"><button class="btn btn-success">Log In</button></a>
            </div>
        </div>
    </div>
</div>




</body>


</html>