<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background-image: none">

<!-- Preloader -->
<div id="preloader">
	<div id="load"></div>
</div>


<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<h1>Dine Together!</h1>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#intro">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#service">Service</a></li>
				<li><a href="#contact">Contact Us</a></li>
				<li><a href="<?php echo site_url('Register') ?>">Register</a></li>
				<li><a href="<?php echo site_url('Login') ?>">Login</a></li>

			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>



<!-- Section: intro -->
<section id="intro" class="intro">

	<div class="slogan">

		<h2>WELCOME TO <span class="text_color">Dine Together!</span> </h2>
		<h4>SYSTEM DESIGNED FOR PEOPLE WHO WANT TO DINE WITH OTHERS</h4>

	</div>

	<div class="page-scroll">
		<a href="#service" class="btn btn-circle">
			<i class="fa fa-angle-double-down animated"></i>
		</a>
	</div>
</section>
<!-- /Section: intro -->

<!-- Section: about -->
<section id="about" class="home-section text-center">
	<div class="heading-about">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
							<h2>When You Feel...</h2>
							<i class="fa fa-2x fa-angle-down"></i>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>Boring to eat alone............</h5>
							<p class="subtitle">Don't want to dine alone...</p>
							<div class="avatar"><img src="<?php echo base_url().'assets/'?>images/team/face1.jpg" alt="" class="img-responsive img-circle" /></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>Don't let me think where to dine!</h5>
							<p class="subtitle">Don't let me do so...</p>
							<div class="avatar"><img src="<?php echo base_url().'assets/'?>images/team/face2.jpg" alt="" class="img-responsive img-circle" /></div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>Find discount$$$$$$$$$$$$</h5>
							<p class="subtitle">Want to own some coupons...</p>
							<div class="avatar"><img src="<?php echo base_url().'assets/'?>images/team/face3.jpg" alt="" class="img-responsive img-circle" /></div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
					<div class="team boxed-grey">
						<div class="inner">
							<h5>Want to make new friends!</h5>
							<p class="subtitle">Joining dining event!</p>
							<div class="avatar"><img src="<?php echo base_url().'assets/'?>images/team/face4.jpg" alt="" class="img-responsive img-circle" /></div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Section: about -->


<!-- Section: services -->
<section id="service" class="home-section text-center bg-gray">

	<div class="heading-about">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
							<h2>We Provide Functions Like...</h2>
							<i class="fa fa-2x fa-angle-down"></i>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
					<div class="service-box">
						<div class="service-icon">
							<img src="<?php echo base_url().'assets/'?>images/team/service1.jpg" alt="" />
						</div>
						<div class="service-desc">
							<h5>Dining Event</h5>
							<p>We can join dining events to meet different people and gain member points.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
					<div class="service-box">
						<div class="service-icon">
							<img src="<?php echo base_url().'assets/'?>images/team/service2.jpg" alt="" />
						</div>
						<div class="service-desc">
							<h5>Search & Rate Restaurants</h5>
							<p>We can search restaurants and rate them.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
					<div class="service-box">
						<div class="service-icon">
							<img src="<?php echo base_url().'assets/'?>images/team/service3.jpg" alt="" />
						</div>
						<div class="service-desc">
							<h5>"Buy" Coupons</h5>
							<p>We can use our member points to "buy" coupons.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Section: services -->




<!-- Section: contact -->
<section id="contact" class="home-section text-center">
	<div class="heading-contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
							<h2>Get in touch</h2>
							<i class="fa fa-2x fa-angle-down"></i>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="boxed-grey">

					<div id="sendmessage">Your message has been sent. Thank you!</div>
					<div id="errormessage"></div>
					<form id="contact-form" action="" method="post" role="form" class="contactForm">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="contactPerson">
										Name</label>
									<input type="text" name="contactPerson" class="form-control" id="contactPerson" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
									<label for="contactEmail">
										E-mail</label>
									<div class="form-group">
										<input type="email" class="form-control" name="contactEmail" id="contactEmail" placeholder="Your E-mail" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="contactTitle">
										Subject</label>
									<input type="text" class="form-control" name="contactTitle" id="contactTitle" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
									<div class="validation"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="contactContent">
										Message</label>
									<textarea class="form-control" name="contactContent" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
									<div class="validation"></div>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
									Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="widget-contact">
					<h5 style="font-size: 23px">Main Office(?)</h5>

					<address>
						<strong>Hong Kong Baptist University<br>
						Kowloon Tong, Hong Kong<br>
						<abbr title="Phone">Tel:</abbr></strong> 3411 7091
					</address>

					<address>
						<strong>E-mail</strong><br>
						<a href="mailto:#">15xxxxxx@life.hkbu.edu.hk</a>
					</address>
					<address>
						<strong>We're on social networks</strong><br>
						<ul class="company-social">
							<li class="social-facebook"><a href="https://zh-hk.facebook.com/HKBU.CSS.Kernel/" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li class="social-twitter"><a href="https://twitter.com/hkbudb" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li class="social-google"><a href="https://plus.google.com/109060410551063535986" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</address>

				</div>
			</div>
		</div>

	</div>
</section>


<div>