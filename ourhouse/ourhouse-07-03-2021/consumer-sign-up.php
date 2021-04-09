<?php
/**
Template Name: Consumer Signup Page Template

***/
?>
<?php get_header(); ?>


<div class="clearfix"></div>

<?php include('signup-bar.php'); ?>

<section id="login-page" class="contant_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-11 col-md-8 center-form">
				<div class="form-welcome-text">Fill in the following to register with us</div>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php edit_post_link(); ?>
				<?php endwhile; endif;?>

			</div>

		</div>
    </div><!-- /container -->
</section>

<?php get_footer(); ?>
