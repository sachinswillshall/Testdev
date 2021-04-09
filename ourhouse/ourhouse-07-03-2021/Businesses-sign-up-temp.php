<?php /* Template Name: Businesses-sign-up Template */ ?>
<?php get_header(); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
global $wpdb;
$states = $wpdb->get_results( "SELECT DISTINCT States FROM wp_states_isb WHERE Status = 1" , ARRAY_A);
$services = $wpdb->get_results( "SELECT Services FROM wp_services_busi_isb" , ARRAY_A);
//print_r($services);
 ?>
<?php include('signup-bar.php'); ?>

<div class="clearfix"></div>

<div id="register-form-section" class="contant_area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-11 col-md-8 center-form">
        <?php if (!is_user_logged_in()) : ?>
        <p class="success_msg"></p>
				<h2 class="top-form-title">Fill in the following  to register with us</h2>
				<div class="register-form-content">
					<form method="POST" id="register-form-content" class="register-forms" name="busi_registration">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Company Name</label>
									<input type="text" name="busi_companyname" id="busi_companyname" class="form-control input-lg">

								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                    <label class="label_text22">* Service</label>
                  <select name="busi_service" id="busi_service" class="form-control input-lg">
										<option value="">Service</option>
										<?php for ($i=0; $i < count($services); $i++) {?>
										<option value="<?php echo $services[$i]['Services'] ; ?>">
										<?php echo $services[$i]['Services']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
             				 <div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Username</label>
									<input type="text" name="busi_username" id="busi_username" class="form-control input-lg">

								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Email Address</label>
									<input type="email" name="busi_email" id="busi_email" class="form-control input-lg">

									<h2 class="email-form-title">Your Email is safe with us & will not be shared with anybody</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Address</label>
									<input type="text" name="busi_address" id="busi_address" class="form-control input-lg">

								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Select State</label>
									<select name="busi_state" id="busi_state" class="form-control input-lg get-county">
					                    <option value="">Select State</option>
					                    <?php for ($i=0; $i <= count($states); $i++) {?>
					                    <option value="<?php echo $states[$i]['States'] ; ?>">
					                    <?php echo $states[$i]['States']; ?></option>
					                    <?php } ?>
			            </select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* County</label>
									<select name="busi_county" id="busi_county" class="county-list form-control input-lg">
										<option value="">County</option>
									</select>
								</div>
							</div>

							<!--div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
									<input type="text" name="busi_city" id="busi_city" class="form-control input-lg" placeholder="* City">
								</div>
							</div-->
              				<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Zip code</label>
									<input type="text" name="busi_zipcode" id="busi_zipcode" class="form-control input-lg">

								</div>
							</div>
              				<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Password</label>
									<input type="password" name="busi_pass" id="busi_pass" class="form-control input-lg">

								</div>
							</div>
              				<div class="col-xs-12 col-sm-6 col-md-6 padding">
								<div class="form-group">
                  <label class="label_text22">* Confirm Password</label>
									<input type="password" name="busi_cmpass" id="busi_cmpass" class="form-control input-lg">

								</div>
							</div>
						</div>


						<!---div class="row" id="radio_buttons">
                            <div class="col-md-12 padding pludge">Pludge the Amount</div>
							<div class="form-check col-xs-5 col-sm-3 col-md-3 padding">
								<input type="radio" class="form-check-input" id="radio-btn" name="materialExampleRadios">
								<label class="form-check-label check-button-text" for="">Monthly</label>
							</div>

							<div class="form-check col-xs-5 col-sm-3 col-md-3 padding">
								<input type="radio" class="form-check-input" id="radio-btn1" name="materialExampleRadios">
								<label class="form-check-label check-button-text" for="">Quarterly</label>
							</div>

							<div class="form-check col-xs-8 col-sm-6 col-md-5 padding">
								<input type="radio" class="form-check-input" id="radio-btn2" name="materialExampleRadios">
								<label class="form-check-label check-button-text" for="">Yearly (one time pludge)</label>
							</div>
						</div--->

						<div class="row">
							<div class="col-md-12 padding" id="check-boxs">
								<label class="checkbox-inline">
								  <input name="safe_school_pledge" type="checkbox" value="<?php echo 'Yes-agreed'; ?>">
								  <span class="chek-box">Your business has agreed to
								  	<span class="pledge-terms" style="text-decoration: underline;color: #7A7A7A;font-weight: 600;cursor: pointer;">Safe School Pledge Terms</span></span>
								</label>
							</div>

							<div class="col-md-12 padding"  id="check-boxs">
								<label class="checkbox-inline">
								  <input name="busi_agree" type="checkbox" value="<?php echo 'Yes-agreed'; ?>">
								  <span class="chek-box">By Submitting  Form you Accept <a href="/privacy-policy" target="_blank">Privacy Policy</a> and <a target="_blank" href="/terms-and-conditions">Terms and Conditions</a></span>
								</label>
							</div>
						</div>

						<div class="row" id="submit-btn">
							<div class="col-xs-12 col-md-6 col-sm-6  padding">
								<div class="g-recaptcha" data-sitekey="6LfoLXQUAAAAAEsnnnJXUCwximMEx5jUFjUG502w"></div>
               					<span class="recaptcha-err"></span>
							</div>
							<div class="col-xs-12 col-md-6 col-sm-6  padding">
								<input type="submit" value="Next" name="busi_reg" class="btn btn-primary btn-block btn-lg">
							</div>
						</div>
						<div class="socil-icon">
              <span>or</span>
              <a class="signup-lnk" href="/login">Have an account ? LOG IN</a>
                <?php do_action( 'wordpress_social_login' ); ?>
            </div>
					</form><!--form-->
				</div>
        <?php
      else:
        $current_user = wp_get_current_user();

        echo '
        	<div class="after-login-bg-colors">
        	<div class="logged-user-as">
                Logged in as <strong style="margin-left: 10px;">' . ucfirst($current_user->user_login) . '</strong>.
            </div>
            <div class="login-user-option"> <a href="' . wp_logout_url(get_permalink($logout_redirect)) . '">Log out ? </a>';
     endif;
?>

				</div>
				</div>

			</div>
		</div>
	</div>
</div><!--register-form-section-->



<?php get_footer() ; ?>

<script src="<?php echo get_template_directory_uri();?>/js/jquery.validate.js"></script>
<script>
jQuery(document).ready(function() {
  jQuery("#busi_username").keydown(function(event) {
    if (event.keyCode == 32) {
      event.preventDefault();
    }
 });

//Get County list
 jQuery(".get-county").on('change',function() {
   jQuery(".county-list").text('<option value="">*County</option>');
	 var data = new FormData();
	 data.append('busi_state', jQuery('.get-county').val());

		 jQuery.ajax({
				 url: '<?php echo get_template_directory_uri();?>/get_county.php', // Url to which the request is send
				 type: "POST",             // Type of request to be send, called as method
				 processData: false, // important
				 contentType: false, // important
				 data: data,
				 //beforeSend: function(){
						//jQuery(".loading").show();
					//},
				 success: function(result){
           //alert(result);
					 jQuery(".county-list").append(result);
				 }
		 });
 });


 $('#register-form-content').formValidation({
     message: 'This value is not valid',
       fields: {
         busi_pass: {
             validators: {
                 notEmpty: {
                     message: 'The password is required'
                 },
                 regexp: {
                     regexp: /^(?=.*[a-z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,30}$/,
                     message: 'Minimum 8 character, one letter, one number, and one special character required'
                 }
             }
         },
         busi_cmpass: {
             validators: {
                 notEmpty: {
                     message: 'The password is required'
                 },
                 identical: {
                     field: 'busi_pass',
                     message: 'The password and its confirm are not the same'
                 }
             }
         }
     }


 })

// Validation & Submission
    jQuery("#register-form-content").validate({
        rules: {
            busi_companyname: "required",
            busi_service: "required",
            busi_username: "required",
            busi_email: {
                required: true,
                email: true
            },
            busi_address: "required",
            busi_county: "required",
            busi_state: "required",
            //busi_city: "required",
            busi_zipcode: "required",
            //busi_pass: {
                //required: true,
              //  minlength: 8
          //  },
          //  busi_cmpass: {
              //  required: true,
                //minlength: 8,
              //  equalTo: "#busi_pass"
          //  },
            busi_agree: "required",
            safe_school_pledge: "required",
        },
        messages: {
            busi_companyname: "This field is required",
            busi_service: "This field is required",
            busi_username: "This field is required",
            email: {
                required: "This field is required",
                email: "Please enter a valid email address"
            },
            busi_address: "This field is required",
            busi_county: "This field is required(Please fill state first)",
            busi_state: "This field is required",
            //busi_city: "This field is required",
            busi_zipcode: "This field is required",
            //busi_pass: {
                //required: "Please provide a password",
                //minlength: "Your password must be at least 8 characters long"
            //},
          //  busi_cmpass: {
                //required: "Please provide a password",
                //minlength: "Your password must be at least 8 characters long",
                //equalTo: "Please enter the same password as above"
            //},
            busi_agree: "This field is required",
            safe_school_pledge: "This field is required"
        },
    submitHandler: function(form) {
      if(grecaptcha.getResponse() == "") {
      jQuery('.recaptcha-err').text('Please Fill Re-captcha');
      }
    else{
        jQuery.ajax({
            type:"post",
            url:"<?php echo get_template_directory_uri(); ?>/register_busi.php",
            data: jQuery('#register-form-content').serialize(),
            success: function(data,status){
                //alert(data);
              if(data == 'e1'){ jQuery(".success_msg").addClass('error-msg').html('Please check your email.'); }
              else if (data == 'e2') { jQuery(".success_msg").addClass('error-msg').html('Email already exists.'); }
              else if (data == 'e3') { jQuery(".success_msg").addClass('error-msg').html('Username already exists.'); }
              else {
                jQuery(".success_msg").removeClass('error-msg').html("You have registered successfully. <br>Please wait page will be redirected to payment page.");
                jQuery('#register-form-content').trigger("reset");
                      grecaptcha.reset();
                setTimeout(function(){ window.location = "/secure-payment/?id="+ data },2000);
              }
							jQuery('.recaptcha-err').text('');
              jQuery(".success_msg").show();
              jQuery('html, body').animate({
                  scrollTop: jQuery(".success_msg").offset().top -100
              }, 200);
            }
        });
        }
    }
    });
});
</script>
