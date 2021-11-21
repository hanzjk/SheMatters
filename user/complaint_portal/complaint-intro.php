<?php
require_once "../config.php";
require_once 'main/header.php';

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
			<h1>Complaint Portal</h1>
			<ul class="bread-crumb">
				<li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
				<li>Lodge a Complaint</li>
			</ul>
		</div>
	</div>
</section>

<section class="contact-form-section">
	<div class="auto-container row">


		<div class="col-12 mx-auto ">
			<p>
				
				Violence against women and girls takes many different forms, including domestic violence, sexual assault and harassment, child, early and forced marriage, sex trafficking etc.
				It is one of the most widespread violations of human rights and has long-term devastating effects on the lives of women, their communities and wider society.
				It is time to say <b>‘enough is enough’</b>. We want violence against women to end.
			</p>
				

			<p>The Online Complaints Mechanism, is a new initiative that has been set up to lodge complaints regarding incidents of harassment, domestic violence, sexual assault , gender discrimination etc. 
				All complaints that are lodged will be investigated and victims of such incidents will be offered support.
				</p>
			
			</p>

			<h4 class="font-weight-bold mt-5">How does the Online Complaints Mechanism work?</h4>
		
			<ul class="mx-4 mt-3">                        

				<li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">Any woman can lodge a complaint if she is a victim of violence of any form. This includes harassment, domestic violence, sexual assault , gender discrimination etc. General public can also lodge complaints on witnessed incidents.</span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Provide convenience to victims by eliminating the horrific and traumatic reporting process.</span></li>

				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Once the complaint is lodged and approved by the administrator, the relevant authorities are notified and will immediately initiate an investigation regarding the complaint.</span></li>
				
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>	<span class="ml-3">Complainant will be updated about the status of the complaint and if needed administrator may contact the complainant for further inquiries.</span></li>

			</ul>


			<h4 class="font-weight-bold mt-5">Who can make complaints?</h4>
			<ul class="mx-4 mt-3"><li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">Victim or complainer should have evidence (witnesses/images/videos etc) to support the complaint</span></li></ul>

			<h4 class="font-weight-bold mt-5">What if false complaints are lodged?</h4>
			<ul class="mx-4 mt-3"><li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">All complaints once lodged will be investigated and cannot be withdrawn. </span></li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span><span class="ml-3">However, if complaints are found to be false or malicious, the court will take action against him/her.</span></li>
			</ul>

			<br>
			<p class="font-weight-bold">You have to login to your account or register for your own account before filing the  complaint.</p>

			<div class="text-center mt-5">
				<button onclick="complaint()" class="theme-btn btn-style-one"><span>Lodge a Complaint</span><button>
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
		if (isset($_SESSION['loggedin_user'])) { ?>
			window.location = "complaint.php";

		<?php } else { ?>
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

</body>


</html>