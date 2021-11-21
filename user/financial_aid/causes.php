<?php
require_once "../config.php";
require_once 'main/header.php';

$limit = 6;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$result = mysqli_query($link, "SELECT * FROM applications WHERE state='Ongoing' ORDER BY application_id ASC LIMIT $start_from, $limit");

$count = 0;
?>

<style>
    .modal-confirm {
        color: black;
        font-size: 14px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -50px;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        z-index: 9;
        background: #fff;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        position: relative;
        top: 3px;
    }


    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btnMoney {
        color: #000;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        width: 100px;
    }

    @media only screen and (max-width: 700px) {
        .modal-confirm .btnMoney {
            color: #000;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            width: 50%;
        }
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>




<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Causes To Donate</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Causes</li>
            </ul>
        </div>
    </div>
</section>


<!-- Causes Section Four -->
<section class="causes-section-four">
    <div class="auto-container">
        <div class="cause-wrapper">

            <div class="row">

                <?php

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $count++;


                ?>

                        <!-- Cause Block Four -->
                        <div class="cause-block-four style-two col-lg-4 col-md-6 card " id="cause" style="border: none;">

                            <?php if (fmod($count, 2) != 0) { ?>
                                <div class="inner-box" style="border-top: 15px solid #e91849;border-top-left-radius: 10px;border-top-right-radius: 10px;
                         border-bottom: 15px solid #e91849;border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                    <div class="image mt-5" style="width: 100px;">
                                        <img src="../../download.jpg" alt="" style="border: 5px solid #e91849;">

                                    <?php } else { ?>
                                        <div class="inner-box" style="border-top: 15px solid #3d348f;border-top-left-radius: 10px;border-top-right-radius: 10px;
                         border-bottom: 15px solid #3d348f;border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                            <div class="image mt-5" style="width: 100px;">

                                                <img src="../../download.jpg" alt="" style="border: 5px solid #3d348f;">

                                            <?php } ?>


                                            </div>
                                            <div class="lower-content">
                                                <div class="wrapper-box">
                                                    <h4><a href="cause-details.html">Reason for applying financial aid? </a></h4>
                                                    <div class="text mx-2" style="line-height: 25px;">


                                                        <p style="line-height: 25px;color: #a6a6a6;"><?php
                                                                                                        $story_id = $row['application_id'];
                                                                                                        echo substr($row['reason'], 0, 40) . "... <a href='read_more.php?application_id=" . $story_id . "'>Read More</a>";


                                                                                                        ?></p>
                                                    </div>

                                                    <h4><a href="cause-details.html">How donations are used ?</a></h4>
                                                    <div class="text mx-2" style="line-height: 25px;">

                                                        <p style="line-height: 25px;color: #a6a6a6;"><?php
                                                                                                        $story_id = $row['application_id'];
                                                                                                        echo substr($row['use_fund'], 0, 40) . "... <a href='read_more.php?application_id=" . $story_id . "'>Read More</a>";


                                                                                                        ?></p>
                                                    </div>
                                                    <div class="info-box">
                                                        <div class="raised">
                                                            <a href="#"><span>Raised:</span> Rs.
                                                                <?php

                                                                $res = mysqli_query($link, "SELECT SUM(amount) FROM donations WHERE application_id='" . $row['application_id'] . "'");
                                                                $row_s = mysqli_fetch_row($res);
                                                                $sum = $row_s[0];
                                                                if ($sum > 0)
                                                                    echo $sum;
                                                                else {
                                                                    $sum = 0;
                                                                    echo 0;
                                                                }

                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="count-box">
                                                            <span class="count-text" data-speed="3000" data-stop="<?php echo round(((float)$sum / (float) $row['amount']) * 100) ?>"></span><span class="affix">%</span>
                                                        </div>
                                                        <div class="goal">
                                                            <a href="#"><span>Goal:</span> Rs. <?php echo $row['amount'] ?></a>
                                                        </div>
                                                    </div>
                                                    <button class="theme-btn btn-style-one mt-3 myModal" style="line-height: 10px; padding: 15px 30px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['application_id'] ?>"><span>Donate </span><button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php }
                        } else { ?>
                                <div class="col-12 my-5 text-center font-weight-bold">No causes are avaliable at the moment</div>

                            <?php } ?>



                                </div>
                        </div>
            </div>





            <?php

            
if (mysqli_num_rows($result) > 0) {
            $result_db = mysqli_query($link, "SELECT COUNT(application_id) FROM applications WHERE state='Ongoing'");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            /* echo  $total_pages; */
            $pagLink = "<div class='row'  mt-3'><ul class='pagination mx-auto'>";
            if ($page == 1) {
                $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a class='page-link ' style='pointer-events: none; cursor: default; color:#666666' aria-disabled='true' >Previous</a></li>";
            } else {
                $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='causes.php?page=" . ($page - 1) . "' class='page-link' >Previous</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<li class='page-item active' style='font-size:15px;width:30px;' ><a class='page-link active' href='causes.php?page=" . $i . "'>" . $i . "</a></li>";
                } else {
                    $pagLink .= "<li class='page-item ' style='font-size:15px;width:30px;' ><a class='page-link active' href='causes.php?page=" . $i . "'>" . $i . "</a></li>";
                }
            }

            if ($page == $total_pages) {
                $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a aria-disabled='true' style='pointer-events: none; cursor: default; color:#666666'class='page-link ' >Next</a></li>";
            } else {
                $pagLink .= "<li class='page-item text-center' style='font-size:15px;width:80px;'><a  href='causes.php?page=" . ($page + 1) . "' class='page-link ' >Next</a></li>";
            }


            echo $pagLink . "</ul></div>";
        }?>
        </div>
    </div>
</section>






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


<!-- Trigger the modal with a button -->

<!-- Modal HTML -->
<div id="myModal" class="modal fade">

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <img src="../../download.jpg" style="width: 100%;">
                </div>
                <h6 class="modal-title w-100 text-center mt-3 font-weight-bold">Make a Donation</h6>
            </div>

            <form action="stripe/charge.php" method="post" id="payment-form">
                <div class="row">


                </div>

                <div class="modal-body " style="background-color: #eee; margin-left: -20px; margin-right: -20px;">

                    <input type="text" style="display: none;" class="form-control" aria-describedby="basic-addon2" name="application_id1" id="application_id1" value="" />
                    <div class="row mt-3">
                        <div class="col-12 text-center ">

                            <button type="button" id="1" onClick="pay_amount(this.value)" value=500 class="btn btn-primary btnMoney mx-1 my-1 " style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">500</span><span style="font-size: 10px;">Rs</span></button>
                            <button type="button" id="2" onClick="pay_amount(this.value)" value=2000 class="btn btn-primary btnMoney mx-1 my-1" style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">2 000</span><span style="font-size: 10px;">Rs</span></button>
                            <button type="button" id="3" onClick="pay_amount(this.value)" value=5000 class="btn btn-primary btnMoney mx-1 my-1" style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">5 000</span><span style="font-size: 10px;">Rs</span></button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-center ">

                            <button type="button" id="4" onClick="pay_amount(this.value)" value=10000 class="btn btn-primary btnMoney mx-1 my-1" style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">10 000</span><span style="font-size: 10px;">Rs</span></button>
                            <button type="button" id="5" onClick="pay_amount(this.value)" value=20000 class="btn btn-primary btnMoney mx-1 my-1" style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">20 000</span><span style="font-size: 10px;">Rs</span></button>
                            <button type="button" id="6" onClick="pay_amount(this.value)" value=50000 class="btn btn-primary btnMoney mx-1 my-1" style="background-color: #fff;border-color: #fff;"><span style="font-size: 18px;">50 000</span><span style="font-size: 10px;">Rs</span></button>
                        </div>
                    </div>

                    <div class="row mt-2 ">
                        <div class="input-group input-group-sm  mb-3 col-9 mx-auto">
                            <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" id="amount" required min="500">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">.Rs</span>
                            </div>
                        </div>
                    </div>
                    <div class="row-mt-2">

                        <div id="card-element" class="form-control col-9 mx-auto">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>


                    </div>
                    <!-- Used to display Element errors. -->
                    <div class="row">
                        <div id="card-errors" role="alert" class="col-9 text-center text-danger"></div>
                    </div>



                </div>
                <div class="modal-footer" style="background-color: #eee; margin-left: -20px; margin-right: -20px;margin-bottom: -30px;">
                    <button class="btn btn-dark btn-block" id="payment-form-button" style="background-color: #3d348f;border: none;">Donate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.3.1/d3.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="stripe/js/charge.js"></script>

<script>
    $(document).on("click", ".myModal", function() {
        var a_id = $(this).data('id');
        $(".modal-body #application_id1").val(a_id);
        // alert(a_id);


    });
</script>


<script type="text/javascript">
    function pay_amount(amount) {

        $(".modal-body #amount").val(amount);


    }
</script>


</body>


</html>