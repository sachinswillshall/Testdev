<?php

/**
Template Name: Contact Page Template
***/
?>

<?php get_header(); ?>

<div class="clearfix"></div>
<section id="contact-page" class="under-menu-banner">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section id="contact-inner-content" class="contant_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="side-contact-form">
					<div class="form-text">
						<!--<p>Find out more about what we can help you<br class="hidden-xs">Contact us to answer any questions or<strong> book a branding strategy session</strong>. </p>-->
						<p>Please fill in the form below and we'll get right back to you.</p>
					</div>
					<div class="form-shortcode">
						<?php echo do_shortcode('[contact-form-7 id="53" title="Contact-page-form"]') ; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="contact-section">
					<div class="contact-cont">
						<h3>Our Contacts</h3>
						<ul class="contact-info">
							<li class="location"><i class="fa fa-map-marker marker"></i> 4636 Lebanon Pike #171, Hermitage, TN 37076</li>
							<li class="phone"><a href="tel:(615) 626-1310">(615) 626-1310</a></li>
							<li class="mail"><a href="mailto:info@ourhouseusa.org">info@ourhouseusa.org</a></li>
							<li class="website"><a href="http://ourhouseusa.org">www.ourhouseusa.org</a></li>
						</ul>
					 </div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9104.468536256074!2d-86.60051039069528!3d36.217243394863445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8864401e6f037e15%3A0x5e58f3b24c9c7dc7!2s4636+Lebanon+Pike%2C+Hermitage%2C+TN+37076%2C+USA!5e0!3m2!1sen!2sin!4v1543299567809" width="100%" height="285" frameborder="0" style="border:0" allowfullscreen></iframe>

						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3218.935684110225!2d-86.59862708472642!3d36.21675818007291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8864401e2191623d%3A0x43fe09ca856662f!2sThe+UPS+Store!5e0!3m2!1sen!2sin!4v1538136742484" width="100%" height="285" frameborder="0" style="border:0" allowfullscreen></iframe> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
