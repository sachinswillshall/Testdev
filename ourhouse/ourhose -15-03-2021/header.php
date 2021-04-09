<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php //echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png" rel="shortcut icon">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/imgareaselect-animated.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/imgareaselect-default.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/imgareaselect-deprecated.css" rel="stylesheet">


		<?php wp_head(); ?>
		<script>
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->

			<section id="header-sec">
				<div class="container">
					<div class="col-sm-3 logo_content">
		                 <div class="header-left">
		                 	<!-- <div class="home-icon">
		                 		<a href="/">
		                 			<img src="<?php //echo get_template_directory_uri(); ?>/images/home-img.png" title="Home" alt="Home">
		                 		</a>
		                 	</div> -->

		                 	<div class="logo-cont">
								<a href="/">
									<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="OurhouseUSA" title="OurhouseUSA">
								</a>
			                 </div>

		                 </div>
					</div>

					<div class="col-sm-4 united">
						<div class="header-content-l">
		                 	<?php dynamic_sidebar('Ourhouseusa'); ?>
		                </div>
					</div>

					<div class="col-sm-5 header-right get_invol">
						<div class="header-content-r">
							<?php dynamic_sidebar('getinvolved'); ?>
		                </div>

		                <div class="nav-sec">
						
												
						
						
						
		                 	<!--<img src="<?php //echo get_template_directory_uri(); ?>/images/nav-img.png">-->
		                 	<div class="user-login-icon" id="foo">
								<?php
								$curr_user = wp_get_current_user();
								
							     $us_id = $curr_user->ID;
							   
							     

                global $wpdb;
                $role_query = $wpdb->get_row( "SELECT meta_value FROM wp_usermeta WHERE meta_key = 'wp_capabilities' AND user_id = $us_id" );
								$sup_role = $role_query->meta_value;


								$status_query = $wpdb->get_row( "SELECT status FROM wp_sup_filter_isb WHERE uid = $us_id" );
                $sup_status = $status_query->status;

								if($sup_role == 'a:1:{s:13:"superitendent";b:1;}'){
									if($sup_status == "pending"){

									 wp_logout();

										?>
                          <h6 style="color:#DE2B55;">Your account is not approved</h6>
				                 	<div class="list-unstyled signup22" role="menu">

							           		<li class="login-btn login-signup-btn ">
							           			<a href="/login"><i class="fas fa-sign-in-alt icons" aria-hidden="true"></i>Login</a>
							           		</li>
							            	<li class="signup-btn login-signup-btn ">
							            		<a href="/sign-up"><i class="fa fa-user-plus icons" aria-hidden="true"></i>Sign-up</a>
							            	</li>

									        </div>
									<?php

								}else {

										$current_user = wp_get_current_user();
										$role = $current_user->roles;
								  ?>
										Hi <span><?php echo ucfirst(get_user_meta( $current_user->ID, 'first_name', true )); ?></span>
										<div class="list-unstyled" role="menu">

									<li class="login-btn login-signup-btn ">
										<a href="<?php if($role[0] == 'businesses'){ echo '/business-dashboard/'; }  else if($role[0] == 'consumer'){ echo '/consumer/'; }  else if($role[0] == 'superitendent'){ echo '/superintendent-dashboad/'; } else if($role[0] == 'administrator'){ echo '/admin-dashboard/'; } ?>"><i class="fa fa-user-plus icons" aria-hidden="true"></i> My Account</a>
									</li>
												<li class="signup-btn login-signup-btn ">
										<a href="<?php echo wp_logout_url( '/login' ); ?>"> <i class="fas fa-sign-out-alt icons" aria-hidden="true"></i> Logout</a>
									</li>

						      </div>
								<?php }

								}else{

									if (is_user_logged_in())
										{
											$current_user = wp_get_current_user();
											$role = $current_user->roles;
									?>
											Hi <span><?php echo ucfirst(get_user_meta( $current_user->ID, 'first_name', true )); ?></span>
									<?php } ?>


			                 		<!--<img src="<?php //echo get_template_directory_uri(); ?>/images/login-user-icon.png" class="user-icons" alt="login-user-icon">
									<img src="<?php //echo get_template_directory_uri(); ?>/images/close-icon.png" alt="close-icon" class="close-icon" id="close-icons">

			                 		<i class="fa fa-user-circle-o user-icons"></i>
			                 		<i class="fa fa-times close-icon"></i>-->

			                 	</div>
			                 	<div class="list-unstyled signup22" role="menu">
									<?php if (!is_user_logged_in()): ?>
						           		<li class="login-btn login-signup-btn ">
						           			<a href="/login"><i class="fas fa-sign-in-alt icons" aria-hidden="true"></i>Login</a>
						           		</li>
						            	<li class="signup-btn login-signup-btn ">
						            		<a href="/sign-up"><i class="fa fa-user-plus icons" aria-hidden="true"></i>Sign-up</a>
						            	</li>
										<?php else: ?>
											<li class="login-btn login-signup-btn ">
												<a href="<?php if($role[0] == 'businesses'){ echo '/business-dashboard/'; }  else if($role[0] == 'consumer'){ echo '/consumer/'; }  else if($role[0] == 'superitendent'){ echo '/superintendent-dashboad/'; } else if($role[0] == 'administrator'){ echo '/admin-dashboard/'; } ?>"><i class="fa fa-user-plus icons" aria-hidden="true"></i> My Account</a>
											</li>
						            		<li class="signup-btn login-signup-btn ">
												<a href="<?php echo wp_logout_url( '/login' ); ?>"> <i class="fas fa-sign-out-alt icons" aria-hidden="true"></i> Logout</a>
											</li>
									<?php endif; ?>
								</div>

								<?php } ?>

								<a id="bbblink" class="sehzbum" href="https://www.bbb.org/us/tn/hermitage/profile/social-media-marketing/ourhouseusa-0573-37202411#bbbseal" title="OurhouseUSA, Inc., Social Media Marketing, Hermitage, TN" style="display: block;position: relative;overflow: hidden; width: 150px; height: 57px; margin: 0px; padding: 0px;"><img style="padding: 0px; border: none;" id="bbblinkimg" src="https://seal-nashville.bbb.org/logo/sehzbum/ourhouseusa-37202411.png" width="300" height="57" alt="OurhouseUSA, Inc., Social Media Marketing, Hermitage, TN" /></a>
							<script type="text/javascript">var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); (function(){var s=document.createElement('script');s.src=bbbprotocol + 'seal-nashville.bbb.org' + unescape('%2Flogo%2Fourhouseusa-37202411.js');s.type='text/javascript';s.async=true;var st=document.getElementsByTagName('script');st=st[st.length-1];var pt=st.parentNode;pt.insertBefore(s,pt.nextSibling);})();</script>
								
		                </div>
						

						
						

					</div>
				</div>
			</section>


			<header class="header clear">
				<!-- logo -->
				<!--<div class="logo">
					<a href="<?php //echo home_url(); ?>">
						<-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script --
						<img src="<?php //echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
					</a>
				</div>-->
				<!-- /logo -->
				<div id="menu-sec" class="main-menu-class">

				    <nav class="navbar navbar-default navbar-static-top">
				      <div class="container">
				        <div class="navbar-header">
				          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				          </button>
				          <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#" style="color:#fff;">OurhouseUSA</a>
				        </div>
				        <div id="navbar" class="navbar-collapse collapse">
				          <?php wp_nav_menu( array(
								'menu' => 'Main Menu',
							'menu_class' => 'nav navbar-nav',
							'menu_id' => ''
							))  ;
							?>
				        </div><!--/.nav-collapse -->
				      </div>
				    </nav>

         		</div>
			</header>
			<!-- /header -->
