<?php
require_once "../config.php";
require_once 'main/header.php';

?>

<style>
    .accordion .card {
        border-radius: 0;
        border: none;
        box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);

    }

    .accordion .card-header {
        background: none;
        border-bottom: 2px dashed #CEE1F8;
        color: #3B566E;

    }

    .accordion .card-header:hover {
        background: rgba(233, 30, 99, 0.1);
    }

    .accordion .card-header .btn {
        font-size: 1.04rem;
        font-weight: 500;
        width: 100%;
        text-align: left;
        position: relative;
        top: -2px;
    }

    .accordion .card-header i {
        float: right;
        font-size: 1.3rem;
        font-weight: bold;
        position: relative;
        top: 5px;
    }

    .accordion .card-header.highlight {
        background: rgba(233, 30, 99, 0.1);
    }

    .accordion .card-body {
        text-align: justify;
    }


    .badge {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 14px;
        float: left;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        text-align: center;
        background: #E91E63;
        color: #fff;
        font-size: 12px;
        margin-right: 20px;
    }
</style>



<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Frequently Asked Questions</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
                <li>Financial Aid Portal</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="auto-container row">


        <div class="col-12 mx-auto ">
            <div class="accordion " id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                <span class="badge">1</span>How financial aid works ? <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-1" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Users can apply for financial aid by filling out the financial aid application. Once your application is approved it will be open for donations. All the donations will be directly transferred to your bank account.
                                </li>
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> You can check the raised amount and the status of your application by logging in to your account.
                                </li>
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Please note that the admin has the authorization to reject or approve the application also he/she can remove your application from the causes at any time.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                <span class="badge">2</span> How to apply for financial aid ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    First you must create an account prior to applying for aid.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    Then you can apply for financial aid by filling out the financial aid application.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    When applying for aid you must briefly describe the reason why you are applying for aid and what you will do with the funds received. Only these two
                                    feilds will be disclosed to public.Hence your identity will be protected.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    After reviewing your application, the admin will approve it based on its adequacy. </li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span>
                                    Once the application is approved, it will be available under causes for donation where donors can donate to you directly. </li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span>
                                    Please note that you can apply for financial aid only once. </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                <span class="badge">3</span>

                                Who can apply for financial aid ?
                                <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    Financially abused women are eligible for financial aid.</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                All applications once submitted will be investigated and cannot be withdrawn. However, if provided details are found to be false or malicious, then your account will be deleted and will take legal actions against the victim. </li>

                                    <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span>
                                    Please note that you cannot apply for financial aid on behalf of a third party.</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                <span class="badge">4</span> How to donate for causes ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> First you must create an account before donating.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> All the available causes will be listed <a href="causes.php">here.</a> You can choose any of them to donate.
                                </li>
                  
                            </ul>
                        </div>
                    </div>
                </div>



            </div>

        </div>

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
    $(document).ready(function() {
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function() {
            $(this).siblings(".card-header").find(".btn i").html("remove");
            $(this).prev(".card-header").addClass("highlight");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function() {
            $(this).parent().find(".card-header .btn i").html("remove");
        }).on('hide.bs.collapse', function() {
            $(this).parent().find(".card-header .btn i").html("add");
        });

        // Highlight open collapsed element 
        $(".card-header .btn").click(function() {
            $(".card-header").not($(this).parents()).removeClass("highlight");
            $(this).parents(".card-header").toggleClass("highlight");
        });
    });
</script>


</body>


</html>