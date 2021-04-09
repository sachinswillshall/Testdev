<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div id="footer">
					<div class="container">
						<div class="col-sm-4 useful-links">
						 	<div class="links-cntnt">
								<?php dynamic_sidebar('useful-links'); ?>
								 <?php wp_nav_menu( array(
								'menu' => 'Footer menu left',
								'menu_class' => 'links-list1',
								'menu_id' => ''
								))  ;
								?>

							 	<?php wp_nav_menu( array(
									'menu' => 'Footer menu right',
									'menu_class' => 'links-list2',
									'menu_id' => ''
									))  ;
								?>

				            </div>
						</div>
						<div class="col-sm-4 quick-connect">
			          <div class="connect-cont">
									<?php dynamic_sidebar('quick-connects'); ?>
			          </div>
						</div>
						<div class="col-sm-4 our-contacts">
						 	<div class="contact-cont">
								<?php dynamic_sidebar('our-contacts'); ?>

					        </div>
						</div>
					</div>
				</div>

			</footer>
			<!-- /footer -->
			<div id="reserved-sec">
				<div class="container">
					<div class="col-sm-4 reserved-text">
						<p><?php echo date('Y'); ?> © All Rights Reserved. <span class="right-border">|</span> <a href="/privacy-policy" target="_blank">Privacy Policy</a></p>
					</div>
				</div>
			</div>

		</div>
		<!-- /wrapper -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.imgareaselect.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.imgareaselect.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.imgareaselect.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/html2canvas.js"></script>


		<script><!--SERVICE Near section SLIDR-script-->
			(function(){
			 jQuery('#carousel123, #myCarousel').carousel({ interval: 5000 });
			}());

			(function(){
			  jQuery('.carousel-showmanymoveone .item').each(function(){
				var itemToClone = jQuery(this);

				for (var i=1;i<4;i++) {
				  itemToClone = itemToClone.next();

				  // wrap around if at end of item collection
				  if (!itemToClone.length) {
					itemToClone = jQuery(this).siblings(':first');
				  }

				  // grab item, clone, add marker class, add to collection
				  itemToClone.children(':first-child').clone()
					.addClass("cloneditem-"+(i))
					.appendTo(jQuery(this));
				}
			  });
			}());

			</script><!--SERVICE Near section SLIDR-script-->

		<script>
			jQuery(document).ready(function() {

			  jQuery('#media').carousel({
			    pause: true,
			    interval: false,
			  });

				jQuery('.user-icons,.close-icon').click(function(){
					jQuery('.dropdown-lr').slideToggle();
					jQuery('.close-icon').toggle();
					jQuery('.user-icons').toggle();
				});

				jQuery('#about-vid').on('play', function (e) {
					jQuery("#myCarousel").carousel('pause');
				});
				jQuery('#about-vid').on('stop pause ended', function (e) {
					jQuery("#myCarousel").carousel({ interval: 3000 });
				});
			});
		</script><!--header-slider-script-->





<script>
		jQuery(document).ready(function(){
			$(".scroll-faqs").click(function() {
		    $('html,body').animate({
		        scrollTop: $(".faq-sec").offset().top},
		        'slow');
		  });

 });
	</script>


	</body>
</html>