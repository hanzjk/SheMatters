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
			<h1>Survivor Stories</h1>
			<ul class="bread-crumb">
				<li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
				<li>Stories of Survival</li>
			</ul>
		</div>
	</div>
</section>

<section class="contact-form-section">
	<div class="auto-container row">


		<div class="col-12 mx-auto ">

			<h4 class="font-weight-bold ">Why your story matters?</h4>
			<ul class="mx-4 mt-3">
				<li>
					<span class="flaticon-heart-2 " style="color: #e91849;"></span>
					<span class="ml-3">

						Sharing your story can help raise awareness about different forms of violence against women, help others cope with their situation and feel less alone, give others the courage to talk and seek help, and highlight the need for community fundraising events that can assist victims.
					</span>
				</li>
				<li class="mt-2">
					<span class="flaticon-heart-2 " style="color: #e91849;"></span>
					<span class="ml-3">

						Sharing your story can help you feel like a survivor rather than a victim, and it can greatly help in your recovery and, sometimes, the recovery of others.
					</span>
				</li>
			</ul>

			<h4 class="font-weight-bold mt-5">How to share?</h4>

			<ul class="mx-4 mt-3">
				<li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
					<span class="ml-3">Your story is powerful. When survivors share their experiences, people listen and things change. If you are interested in being part of that process, we’d love to hear from you.</span>
				</li>
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span> <span class="ml-3"> We are interested in whatever details or sections of the story you want to share, including but not limited to how you wound up in that situation, how learned about the Hotline, how you managed to break free, and anything in between. We’d also love to know how you are doing now! You can even share your story anonymously without disclosing your name to public.
					</span></li>

				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span> <span class="ml-3">
						Please do not submit information about an ongoing case or current situation through this form. If you are seeking assistance or want to make a complaint, lodge a complaint through the complaint portal.

					</span></li>

			</ul>

			<h4 class="font-weight-bold mt-5 ">How your story is used</h4>
			<ul class="mx-4 mt-3">
				<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span> <span class="ml-3">Once submitted, it may take some time to process. After the admin approval your story will be available for the viewers of the web site.</span></li>

				<li>

			</ul>

			<br>
			<p class="font-weight-bold">You don’t have to sign up to read the stories but if you want to share your story then login to your account or register for your own account.</p>


			<div class="text-center mt-5">
				<button onclick="story()" class="theme-btn btn-style-one"><span>Share your story</span><button>
			</div>




		</div>

		<div class="col-10 mt-3 mx-auto text-center">

			<a href="read.php"><button class="theme-btn btn-style-one "><span>Read their story</span><button></a>


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