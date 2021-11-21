<?php
require_once "../config.php";
require_once 'main/header.php';

if (isset($_SESSION['loggedin_user']) ){
$inq1 = "SELECT  COUNT(applicant_id)  FROM applications WHERE  applicant_id=  '".$_SESSION['id']."'  ";
$result_inq1 = mysqli_query($link, $inq1);
$inq_count1 = mysqli_fetch_assoc($result_inq1);
$InqCount1 = $inq_count1["COUNT(applicant_id)"];
}
?>

<style>
	.modal-confirm {
		color: #000;
		width: 525px;
	}

	.modal-confirm .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}

	.modal-confirm .modal-header {
		background: #800020;
		border-bottom: none;
		position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		padding: 35px;
	}

	.modal-confirm h4 {
		text-align: center;
		font-size: 20px;
		margin: 10px 0;
	}

	.modal-confirm .form-control,
	.modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px;
	}

	.modal-confirm .close {
		position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}

	.modal-confirm .close:hover {
		opacity: 0.8;
	}

	.modal-confirm .icon-box {
		color: #fff;
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}

	.modal-confirm .icon-box i {
		font-size: 58px;
		margin: -2px 0 0 -2px;
	}

	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}

	.modal-confirm .btn,
	.modal-confirm .btn:active {
		color: #fff;
		border-radius: 4px;
		background: #002D62 !important;
		text-decoration: none;
		transition: all 0.4s;
		line-height: normal;
		border-radius: 30px;
		margin-top: 10px;
		padding: 6px 20px;
		min-width: 150px;
		border: none;
	}

	.modal-confirm .btn:hover,
	.modal-confirm .btn:focus {
		background: #002D62 !important;
		outline: none;
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
			<h1>Financial Aid Portal</h1>
			<ul class="bread-crumb">
				<li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
				<li>Apply For Financial Aid</li>
			</ul>
		</div>
	</div>
</section>

<section class="contact-form-section">
	<div class="auto-container row">


		<div class="col-12 mx-auto ">
			<p>Economic dependence is a powerful barrier to escape from an abusive environment. Having financial aid is one way to help women to get out of such scenarios. Financial aid portal can connect victims with donors to get the help they need.</p>
			
			<p>The objective of financial aid is to empower women financially, so they regain their independence from their abuser and begin the journey to self-sufficiency. </p>
			
			
			<h4 class="font-weight-bold mt-5">How Financial Aid works ?</h4>
		
			<ul class="mx-4 mt-3">
				<li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">First you have to apply for financial aid by filling out the financial aid application.</span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">After reviewing your application, the admin will approve it based on its adequacy.</span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Applications which are approved by the admin will be available under causes for donation where donors can donate to you directly.</span></li>

				<li class="mt-2" ><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">You can check the raised amount and the status of your application by logging in to your account.</span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Please note that the admin has the authorization to reject or approve the application also he/she can  remove your application from the causes at any time.</span></li>

			</ul>

			<h4 class="font-weight-bold mt-5">Eligibility</h4>
			<ul class="mx-4 mt-3">
				<li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">Financially abused women are eligible for financial aid.</span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">All applications once submitted will be investigated and cannot be withdrawn.  However, if provided details  are found to be false or malicious, then your account will be deleted and will take
					legal actions against the victim.
				</span></li>

				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Please note that you cannot apply for financial aid on behalf of a third party.</span></li>

			

			</ul>

			<br>
			<p class="font-weight-bold">You have to login to your account or register for your own account before applying for financial aid and you are allowed to apply only once.</p>

			<div class="text-center mt-5">
			<button onclick="complaint()" class="theme-btn btn-style-one text-center"><span>Apply For Financial Aid</span><button>

			</div>
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
 function complaint() {
        <?php
        if (isset($_SESSION['loggedin_user'])) { 
			if ($InqCount1>=1){?>
            jQuery('#myModal_invalid').modal();

        <?php }
			else{?>
	            window.location = "apply.php";

			<?php }

		} else { ?>
            jQuery('#myModal').modal();
            //("#myModal").modal('show');
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


<!-- Modal HTML -->
<div id="myModal_invalid" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">close</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Allowed Only Once</h4>
				<p>You have already subitted an application</p>
				<a href="faid-intro.php"><button class="btn btn-success">Go Back</button></a>
			</div>
		</div>
	</div>
</div>

</body>


</html>