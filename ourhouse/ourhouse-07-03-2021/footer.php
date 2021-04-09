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
						<p><?php echo date('Y'); ?> © All Rights Reserved. <!--<span class="right-border">|</span>---></p>
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
			jQuery(".scroll-faqs").click(function() {
		    jQuery('html,body').animate({
		        scrollTop: jQuery(".faq-sec").offset().top},
		        'slow');
		  });

 });
</script>
<script>
 jQuery(document).ready(function(){
     

 jQuery('#item0').addClass('active');

 jQuery(".video_iframe").on('click',function() {
 var aa = jQuery(this).attr('data');
 //alert(aa);
  jQuery(".modal-body").empty();
  jQuery(".modal-body").append('<iframe class="video_iframe" src="'+ aa +'" width="850px" height="450px"></iframe>');
 });
     
     
//Get search list of businesses
 jQuery(".get-pledge_data").on('change',function() {
  var stat = jQuery(this).val();
  var data = "state=" + stat;
    jQuery.ajax({
        url: '<?php echo get_template_directory_uri();?>/home_pledge_ajax.php',
        type: "POST",
        data: data,
        beforeSend: function(){
           jQuery(".loading").show();
           jQuery(".kansas-info").hide();
           jQuery(".kansas-map-cont").hide();
         },
        success: function(result){
           //alert(result);
           jQuery(".loading").hide();
           jQuery(".kansas-map-cont").show();
           jQuery(".kansas-info-new").html(result);
           jQuery(".kansas-info-new").show();
          }
    });

    jQuery.ajax({
        url: '<?php echo get_template_directory_uri();?>/state-abbreviations.php',
        type: "POST",
        data: data,
        success: function(result){
           //alert(result);
           jQuery('.state-hover').removeClass('state-hover');
           jQuery('#'+ result).addClass('state-hover');
          }
    });
 });



   setTimeout(function(){

       jQuery(".mapsvg-region").each(function(){
         jQuery(this).on('click tap touchstart', function (){
           var statt = jQuery(this).attr('id');
           var msg = "abbreviation";
           var data = "state=" + statt + "&msgg=" + msg;
           //alert(data);
           jQuery.ajax({
               url: '<?php echo get_template_directory_uri();?>/home_pledge_ajax.php',
               type: "POST",
               data: data,
               beforeSend: function(){
                  jQuery(".loading").show();
                  jQuery(".kansas-info").hide();
                  jQuery(".kansas-map-cont").hide();
                },
               success: function(result){
                  //alert(result);
                  jQuery(".loading").hide();
                  jQuery(".kansas-map-cont").show();
                  jQuery(".kansas-info-new").html(result);
                  jQuery(".kansas-info-new").show();
    
                  jQuery('.state-hover').removeClass('state-hover');
                  jQuery('#'+ statt).addClass('state-hover');
                 }
           });
    
         });
       });
   },2000);


});

</script>

	</body>
</html>