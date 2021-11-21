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
                <li>Complaint Portal</li>
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
                                <span class="badge">1</span>How does the online complaints mechanism work? <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-1" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Any woman can lodge a complaint if she is a victim of violence of any form. This includes harassment, domestic violence, sexual assault , gender discrimination etc. General public can also lodge complaints on witnessed incidents.
                                </li>
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Once the complaint is lodged and approved by the administrator, the relevant authorities are notified and will immediately initiate an investigation regarding the complaint.
                                </li>
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Complainant will be updated about the status of the complaint and if needed administrator may contact the complainant for further inquiries.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                <span class="badge">2</span> How can I file a complaint ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                                    First you must create an account prior to filing the complaint.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                                    Then you can file your complaint by filling out the complaint registration form
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                                    When filing the complaint, you must provide the details of the victim and the respondent (if available) , brief description of the incident and some other details as listed in the form.
                                </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                                    In addition to that you can attach videos/images/documents that can be considered as evidence to support the complaint. Also, if available you can provide the contact details to witnesses.
                                </li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> 
                                    After reviewing your complaint, the admin will approve it based on its adequacy.
                                </li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> 
                                    Once the complaint is approved, the relevant authorities will be notified and will immediately initiate an investigation regarding the complaint.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                <span class="badge">3</span>
                                Who can make complaints ?
                                <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4"><ul><li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                            Any case involving deprivation of women’s right or harassment of women in Sri Lanka can be registered through this complaint portal .
</li><li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> 
                            The complainant should disclose complete details of the matter with proper evidence .
                            </li></ul>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                <span class="badge">4</span> How is the Online Complaint Mechanism different from existing grievance procedure?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4"><ul>
                           <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> It is much easier to make a complaint – you simply have to go online and register your complaint. You can do this securely and in privacy.
                           </li><li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Encourage more women to complaint without getting the unwelcomed attention from the society.
                            </li><li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Eliminate the horrific and traumatic reporting process at the police station. This is a great benefit because when the assault first happens, it is a difficult topic to speak about.
                            </li><li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Encourage public to complaint on witnessed violence/abuse without being a bystander.</li>
</ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                <span class="badge">5</span> What category of complaints can be lodged online ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul class="list-unstyled">
                                <li> <span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Causing hurt</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Causing grievous hurt</li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Voluntarily causing hurt by dangerous weapons or means</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Voluntarily causing grievous hurt by dangerous weapons or mean</li>

                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Sexual Abuse</li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Rape /Attempt to rape</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Seduction, Prostitution or unlawful carnal intercourse of a female</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Grave sexual abuse</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Incest</li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Procuration </li>
                                <li><span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Hiring or Employing procurers</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Developing obscene publications </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Indulging in homosexual activity with males</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                <span class="badge">6</span> How will I know if my complaint has been accepted ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            The complainant will be informed via the system once the complaint has been accepted. In the event of the complaint being rejected, the same shall be communicated to the complainant at the earliest.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                                <span class="badge">7</span>What all information do I need to provide while filing a complaint ? <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <ul>
                                <li> <span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Contact details of the complainant (Mandatory) ,victim and the respondent ( if available )</li>
                                <li> <span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Brief description of the incident</li>
                                <li> <span class="fa fa-check-circle mr-2" style="font-size: small;"></span> Contact details of witnesses (if any) </li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> Evidence (If any) </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                                <span class="badge">8</span>How much will it cost me to make the complaint ? <i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            No cost of involved for this service.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                                <span class="badge">9</span> What if false complaints are lodged ?<i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <div id="collapse-9" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body ml-5 mr-4">
                            <uL>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> All complaints once lodged will be investigated and cannot be withdrawn.</li>
                                <li><span class="fa fa-check-circle  mr-2" style="font-size: small;"></span> However, if complaints are found to be false or malicious, the court will take action against him/her.</li>
                            </uL>

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