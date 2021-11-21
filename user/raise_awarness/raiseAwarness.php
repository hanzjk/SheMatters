<?php
require_once "../config.php";
require_once 'main/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



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
<!--Main Page-->
<!-- Page Title -->
<section class="page-title">
	<div class="auto-container">
		<div class="content-box">
			<h1>Raise Awareness</h1>
			<ul class="bread-crumb">
				<li><a class="home" href="#"><span class="fa fa-home"></span></a></li>
				<li>Raise Awareness</li>
			</ul>
		</div>
	</div>
</section>

<!-- <div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/domestic.jpg" />
					</div>

					<div class="back face">
						<h1>Bouquet</h1>
						<p class="artist">The Chainsmokers</p>
						<p class="date">2015</p>
					</div>
				</div>
			</div> -->

<section class="contact-form-section">
	<div class="auto-container row">
		<h4 class="font-weight-bold ">What is violence against women?</h4>

		<ul class="mx-4 mt-3">
			<li><span class="flaticon-heart-2 " style="color: #e91849;"></span>
				<span class="ml-3">Gender-based violence (GBV) or violence against women and girls (VAWG), is a global pandemic that affects 1 in 3 women in their lifetime.</span>
			</li>
			<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span> <span class="ml-3">There are a number of misconceptions surrounding violence against women, including how and why it occurs. </span></li>
			<li class="mt-2"><span class="flaticon-heart-2 " style="color: #e91849;"></span> <span class="ml-3">Violence against women does not mean only physical violence, It is much broader and includes sexual, emotional, psychological and financial abuse.</span></li>
		</ul>


	</div>

	<div class="auto-container row mt-4">
		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/domestic1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Domestic Abuse</h1>
						<p class="artist" style="font-size: 11px;">We define domestic abuse as an incident or pattern of incidents of controlling, coercive, threatening, degrading and violent behavior, including sexual violence, in the majority of cases by a partner or ex-partner, but also by a family member or career.</p>
					</div>
				</div>
			</div>
		</div>



		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/financial_abuse1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Financial Abuse</h1>
						<p class="artist"  style="font-size: 11px;">Financial abuse involves a perpetrator using or misusing money which limits and controls their partner’s actions and freedom. It can leave women with no money for basic essentials and restrict access to their own bank accounts, with no access to any independent income.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/online1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Online Harassment</h1>
						<p class="artist"  style="font-size: 11px;">Online abuse includes a diversity of tactics and malicious behaviors ranging from revenge pornography, blackmail for money or sexual favours, sale of videos to pornography websites, sharing of obscene photos and videos and editing photos posted on social media sites</p>
					</div>
				</div>
			</div>
		</div>

	</div>


	<div class="auto-container row">
		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/sexualAssault1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Sexual Violence</h1>
						<p class="artist"  style="font-size: 11px;">Sexual assault or sexual violence can include rape, sexual assault with implements, being forced to watch or engage in pornography, enforced prostitution, and being made to have sex with friends of the perpetrator.</p>
					</div>
				</div>
			</div>
		</div>



		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/physical1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Physical Violence</h1>
						<p class="artist" style="font-size: 11px;">Physical violence can include slaps, shoves, hits, punches, pushes, being thrown down stairs or across the room, kicking, twisting of arms, choking, and being burnt or stabbed.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 my-2">
			<div id="card-container">
				<div id="card">

					<div class="front face">
						<img src="images/emotional1.jpg" style="  width: 100%; height: 250px; border-radius:20px;" />
					</div>

					<div class="back face">
						<h1>Emotional Abuse</h1>
						<p class="artist"  style="font-size: 11px;">
							Psychological and emotional abuse can include a range of controlling behaviours such as control of finances, isolation from family and friends, continual humiliation, threats against children or being threatened with injury or death.
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>


<!-- Why Choose Us Section -->
<section class="whychoose-us-section">
	<div class="auto-container">
		<div class="row">
			<div class="col-lg-8 col-sm-10">
				<div class="sec-title ">
					<h1 style="color: #302c51;font-size: 30px;">Misconceptions surrounding violence against women</h1>
					<div class="text">
						GBV is a topic people generally feel uncomfortable talking about, and for that reason, we’re left in the dark. Well, knowledge is power.<br> To shed some light, here are some myths surrounding violence against girls and women.
					</div>
				</div>



				<div class="whychoose-us-blockx">
					<div class="content">
						<ul>
							<li>
								<div class="text" style="font-weight: bold;">1. She provoked him.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">2. Domestic abuse is a private family matter, and not a social issue.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">3. Women often lie about abuse.</div>
							</li>

							<li>
								<div class="text" style="font-weight: bold;">4. Women are attracted to abusive men.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">5. Men have no role in ending violence against women</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">6. He can be a good father even if he abuses his partner – the parents’ relationship doesn’t have to affect the children.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">7. Survivors of sexual assault are responsible for their attack or are capable of preventing it.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">8. Consent is always necessary regardless of marital status, so it is entirely possible for a husband to sexually assault his wife.</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">9. Men have no role in ending violence against women</div>
							</li>
							<li>
								<div class="text" style="font-weight: bold;">10. Some people deserve to be beaten by provoking the violence.</div>
							</li>
						</ul>




					</div>





				</div>
			</div>

			<div class="col-lg-4 mt-5">
				<div class="image-block mt-5">
					<div class="image wow zoomIn" data-wow-delay="500ms"><img src="images/img-05.png" alt=""></div>



				</div>
			</div>
</section>

<!-- Funfact Section -->
<section class="funfacts-section-two style-two" style="background-image: url(images/background/bg-12.jpg);">
	<div class="auto-container">
		<div class="sec-title text-center light">
			<h5>What the Numbers Say</h5>
			<h1 style="font-size: medium;text-transform: none;">According to the World Health Organization (WHO), 35% of women worldwide have experienced physical and/or sexual intimate partner violence or non-partner sexual violence.
		</div>
		<div class="outer-box">
			<div class="funfact-wrapper row">
				<!--Column-->
				<div class="col-lg-4 counter-block-two wow fadeInUp" data-wow-delay="300ms">
					<div class="inner-box">
						<div class="count-box">
							<span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="24.9">0</span><span class="affix">%</span>
						</div>
						<div class="text">Women in Sri Lanka has experienced physical and/or <br>sexual violence by a partner or a non-partner</div>
					</div>
				</div>
				<!--Column-->
				<div class="col-lg-4 counter-block-two wow fadeInUp" data-wow-delay="600ms">
					<div class="inner-box">
						<div class="count-box">
							<span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="39.8">0</span><span class="affix">%</span>
						</div>
						<div class="text">Have suffered physical, sexual, emotional, and/or <br>economic violence and/or controlling behaviours by a partner</div>
					</div>
				</div>
				<!--Column-->
				<div class="col-lg-4 counter-block-two wow fadeInUp" data-wow-delay="300ms">
					<div class="inner-box">
						<div class="count-box">
							<span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="4">0</span><span class="affix"></span>
						</div>
						<div class="text">Rape cases per day</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 ">
				<div class="link-btn float-right"><a href="abusive_relationship.php" class="theme-btn btn-style-one"><span>Am I in an abusive relationship?</span></a></div>

			</div>
			<div class="col-md-6">
				<div class="link-btn"><a href="legal_right.php" class="theme-btn btn-style-one"><span>What are my legal rights?</span></a></div>

			</div>
		</div>


	</div>
</section>
<!-- Blog Section -->
<section class="blog-section">
	<div class="auto-container">

		<div class="row">
			<!-- News Block One -->
			<div class="col-lg-3 col-md-6 news-block-one">

				<div class="inner-box wow fadeInUp" data-wow-delay="200ms">
					<div class="image">
						<a href="#"><img src="images/safety.jpg" alt=""></a>

					</div>
					<div class="lower-content">

						<h4><a href="#" data-toggle="modal" data-target="#myModal">Making a safety plan</a></h4>



					</div>
				</div>
			</div>



			<div class="col-lg-3 col-md-6 news-block-one">
				<div class="inner-box wow fadeInUp" data-wow-delay="200ms">
					<div class="image">
						<a href="#"><img src="images/money1.jpg" alt=""></a>

					</div>
					<div class="lower-content">
						<h4><a href="#" data-toggle="modal" data-target="#myModal1">Money issues</a></h4>


					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 news-block-one">
				<div class="inner-box wow fadeInUp" data-wow-delay="200ms">
					<div class="image">
						<a href="#"><img src="images/support1.jpg" alt=""></a>

					</div>
					<div class="lower-content">
						<h4><a href="#" data-toggle="modal" data-target="#myModal2">Supporting yourself</a></h4>

					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 news-block-one">
				<div class="inner-box wow fadeInUp" data-wow-delay="200ms">
					<div class="image">
						<a href="#"><img src="images/worry1.jpg" alt=""></a>

					</div>
					<div class="lower-content">
						<h4><a href="#" data-toggle="modal" data-target="#myModal3">Worried about someone </a></h4>


					</div>
				</div>
			</div>






		</div>
	</div>
</section>




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


<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.3.1/d3.min.js"></script>



<!-- Modal HTML -->
<div id="myModal" class="modal fade">

	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<img src="../../download.jpg" style="width: 100%;">
				</div>
				<h6 class="modal-title w-100 text-center mt-3 font-weight-bold">Making a safety plan</h6>
			</div>



			<div class="modal-body " style="background-color: #fff; margin-left: -20px; margin-right: -20px; font-weight: light;">

				<p style="font-weight: normal;">A personal safety plan is a way of helping you to protect yourself and your children. It helps you plan in advance for the possibility of future violence and abuse. It also helps you to think about how you can increase your safety either within the relationship, or if you decide to leave.</p>


				<ul style="text-align: left;font-weight: bold;">
					<li>• Plan in advance how you might respond in different situations, including crisis situations.</li>
					<li>• Keep with you any important and emergency telephone numbers</li>
					<li>• Teach your children to call 119 in an emergency, and what they would need to say (for example, their full name, address and telephone number).</li>
					<li>• Are there neighbours you could trust, and where you could go in an emergency? If so, tell them what is going on, and ask them to call the police if they hear sounds of a violent attack.</li>
					<li>• Pack an emergency bag for yourself and your children, and hide it somewhere safe .</li>
					<li>• Try to keep a small amount of money on you at all times</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<div id="myModal1" class="modal fade">

	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<img src="../../download.jpg" style="width: 100%;">
				</div>
				<h6 class="modal-title w-100 text-center mt-3 font-weight-bold">Money Issues</h6>
			</div>



			<div class="modal-body " style="background-color: #fff; margin-left: -20px; margin-right: -20px; font-weight: light;">

				<p style="font-weight: normal;">If you are thinking about leaving your abusive partner, or have recently separated, you may be worried about how you can support yourself, and your children if you have any with you.</p>
				<p style="font-weight: normal;">You may find you have to rely on benefits for the first time in your life. Or perhaps your abuser kept control of the finances and you may never have been allowed to have any money of your own before, so you are concerned about how you will manage.</p>


			</div>
		</div>
	</div>
</div>

<div id="myModal2" class="modal fade">

	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<img src="../../download.jpg" style="width: 100%;">
				</div>
				<h6 class="modal-title w-100 text-center mt-3 font-weight-bold">Supporting Yourself</h6>
			</div>



			<div class="modal-body " style="background-color: #fff; margin-left: -20px; margin-right: -20px; font-weight: light;">

				<p style="font-weight: normal;">If you are living on your own your most likely sources of income will be one or more of the following:</p>
				<ul style="font-weight: bold;">
					<li>• Earnings from employment</li>
					<li>• State benefits</li>
					<li>• Maintenance for your children (and possibly for yourself) from a former partner</li>
					<li>• You are always welcome to apply for financial aid through SHE MATTERS.</li>
				</ul>
				<p style="font-weight: normal;">In many cases, your income could be less than it was when you were with your partner; however, you alone will now be in control of spending it.</p>


			</div>
		</div>
	</div>
</div>

<div id="myModal3" class="modal fade">

	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<img src="../../download.jpg" style="width: 100%;">
				</div>
				<h6 class="modal-title w-100 text-center mt-3 font-weight-bold">Worried about someone else</h6>
			</div>



			<div class="modal-body " style="background-color: #fff; margin-left: -20px; margin-right: -20px; font-weight: light;">

				<p style="font-weight: normal;">The chances are high that you may know a sister, mum, colleague, cousin or friend who is experiencing abuse behind closed doors.</p>
				<p style="font-weight: normal;">Unless you are trying to help someone who has been very open about her experiences it may be difficult for you to acknowledge the problem directly.</p>
				<p style="font-weight: normal;">However, there are some basic steps that you can take to assist and give support to a friend, family member, colleague, neighbors or anyone you know who confides in you that they are experiencing abuse.</p>

				<ul style="font-weight: bold;">
					<li>• Listen to her, try to understand and take care not to blame her. </li>
					<li>• Tell her that no one deserves to be threatened or beaten, despite what her abuser has told her. </li>
					<li>• Support her as a friend. Encourage her to express her feelings, whatever they are. Allow her to make her own decisions.</li>
					<li>• Help her to report the assault to the police if she chooses to do so.</li>

					<li>• Explore the available options with her. Tell her about SHE MATTERS and how to access our website.</li>
					<li>• Plan safe strategies for leaving an abusive relationship.</li>
					<li>• Ensure that you do not put yourself into a dangerous situation.</li>

				</ul>

			</div>
		</div>
	</div>
</div>


</body>


</html>