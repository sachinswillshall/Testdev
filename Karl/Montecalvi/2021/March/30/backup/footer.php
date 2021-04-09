<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage LAON_WINE_HOUSE
 * @since LAON_WINE_HOUSE 1.0
 */

						// Widgets area inside page content
						laon_wine_house_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					laon_wine_house_create_widgets_area('widgets_below_page');

					$body_style = laon_wine_house_get_theme_option('body_style');
					if ($body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			$footer_scheme =  laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme');
			?>
			
			
<?php
global $wp;
$page_slug = home_url( $wp->request );
$match = strstr($page_slug, 'order-received');
if($match){

$user_id = get_current_user_id();
$ckey = 'billing_country';
$single = true;
$billing_country = get_user_meta( $user_id, $ckey, $single );

$akey = 'billing_address_1';
$billing_address_1 = get_user_meta( $user_id, $akey, $single );

$cikey = 'billing_city';
$billing_city = get_user_meta( $user_id, $cikey, $single );

$skey = 'billing_state';
$billing_state = get_user_meta( $user_id, $skey, $single );

$pkey = 'billing_postcode';
$billing_postcode = get_user_meta( $user_id, $pkey, $single );

update_user_meta( $user_id, 'shipping_country', $billing_country );
update_user_meta( $user_id, 'shipping_address_1', $billing_address_1 );
update_user_meta( $user_id, 'shipping_city', $billing_city );
update_user_meta( $user_id, 'shipping_state', $billing_state );
update_user_meta( $user_id, 'shipping_postcode', $billing_postcode );
}


$match = strstr($page_slug, 'checkout');
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$billing_country = WC()->countries->countries[$current_user->billing_country];

if($match){ ?>
	
<script>
setTimeout(function()
{
  jQuery("#select2-billing_country-container").html('<?php echo $billing_country; ?>');
},2000);
</script>

<?php } ?>
			
			
			<footer class="site_footer_wrap scheme_<?php echo esc_attr($footer_scheme); ?>">
				<?php
				// Footer sidebar
				$footer_name = laon_wine_house_get_theme_option('footer_widgets');
				$footer_present = !laon_wine_house_is_off($footer_name) && is_active_sidebar($footer_name);
				if ($footer_present) { 
					laon_wine_house_storage_set('current_sidebar', 'footer');
					$footer_wide = laon_wine_house_get_theme_option('footer_wide');
					ob_start();
					do_action( 'before_sidebar' );
					if ( !dynamic_sidebar($footer_name) ) {
						// Put here html if user no set widgets in sidebar
					}
					do_action( 'after_sidebar' );
					$out = ob_get_contents();
					ob_end_clean();
					$out = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out);
					$need_columns = true;	//or check: strpos($out, 'columns_wrap')===false;
					if ($need_columns) {
						$columns = max(0, (int) laon_wine_house_get_theme_option('footer_columns'));
						if ($columns == 0) $columns = min(6, max(1, substr_count($out, '<aside ')));
						if ($columns > 1)
							$out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($columns).' widget ', $out);
						else
							$need_columns = false;
					}
					?>
					<footer class="footer_wrap widget_area<?php echo !empty($footer_wide) ? ' footer_fullwidth' : ''; ?> scheme_<?php echo esc_attr(laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme')); ?>">
						<div class="footer_wrap_inner widget_area_inner">
							<?php 
							if (!$footer_wide) { 
								?><div class="content_wrap"><?php
							}
							if ($need_columns) {
								?><div class="columns_wrap"><?php
							}
							echo trim(chop($out));
							if ($need_columns) {
								?></div><!-- /.columns_wrap --><?php
							}
							if (!$footer_wide) {
								?></div><!-- /.content_wrap --><?php
							}
							?>
						</div><!-- /.footer_wrap_inner -->
					</footer><!-- /.footer_wrap -->
				<?php
				}
	
				// Logo
				if (laon_wine_house_is_on(laon_wine_house_get_theme_option('logo_in_footer'))) {
					$logo_image = '';
					if (laon_wine_house_get_retina_multiplier(2) > 1)
						$logo_image = laon_wine_house_get_theme_option( 'logo_footer_retina' );
					if (empty($logo_image)) 
						$logo_image = laon_wine_house_get_theme_option( 'logo_footer' );
					$logo_text   = get_bloginfo( 'name' );
					if (!empty($logo_image) || !empty($logo_text)) {
						?>
						<div class="logo_footer_wrap scheme_<?php echo esc_attr(laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme')); ?>">
							<div class="logo_footer_wrap_inner">
								<?php
								if (!empty($logo_image)) {
									$attr = laon_wine_house_getimagesize($logo_image);
									echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($logo_image).'" class="logo_footer_image" alt=""'.(!empty($attr[3]) ? ' '.trim($attr[3]) : '').'></a>' ;
								} else if (!empty($logo_text)) {
									echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . trim($logo_text) . '</a></h1>';
								}
								?>
							</div>
						</div>
						<?php
					}
				}

				// Socials
				if ( laon_wine_house_is_on(laon_wine_house_get_theme_option('socials_in_footer')) && ($output = laon_wine_house_get_socials_links()) != '') {
					?>
					<div class="socials_footer_wrap socials_wrap scheme_<?php echo esc_attr(laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme')); ?>">
						<div class="socials_footer_wrap_inner">
							<?php echo trim($output); ?>
						</div>
					</div>
					<?php
				}
				
				// Footer menu
				$menu_footer = laon_wine_house_get_nav_menu('menu_footer');
				if (!empty($menu_footer)) {
					?>
					<div class="menu_footer_wrap scheme_<?php echo esc_attr(laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme')); ?>">
						<div class="menu_footer_wrap_inner">
							<nav class="menu_footer_nav_area"><?php echo trim($menu_footer); ?></nav>
						</div>
					</div>
					<?php
				}
				
				// Copyright area
				?> 
				<div class="copyright_wrap scheme_<?php echo esc_attr(laon_wine_house_is_inherit(laon_wine_house_get_theme_option('footer_scheme')) ? laon_wine_house_get_theme_option('color_scheme') : laon_wine_house_get_theme_option('footer_scheme')); ?>">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<div class="copyright_text"><?php
								$copyright = laon_wine_house_get_theme_option('copyright');
								if (!empty($copyright)) {
									if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $copyright, $matches)) {
										$copyright = str_replace($matches[1], date(str_replace(array('{', '}'), '', $matches[1])), $copyright);
									}
									echo force_balance_tags(nl2br($copyright)); 
								}
							?></div>
						</div>
					</div>
				</div>
<?php dynamic_sidebar( 'below-page-widgets' ); ?>
			</footer><!-- /.site_footer_wrap -->
			
		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (laon_wine_house_is_on(laon_wine_house_get_theme_option('debug_mode')) && file_exists(laon_wine_house_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(laon_wine_house_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php if ( is_user_logged_in() ) { }else{ ?>
        <style>
         .add_to_cart_button, .single_add_to_cart_button {
            display: none !important;
         }
         .price, .quantity, .star-rating {
            display: none !important;
         } 
         .woocommerce .shop_mode_list ul.products li.product, .woocommerce-page .shop_mode_list ul.products li.product .post_header {
            margin-top: 0px;
         }
        </style>
    <?php } ?>


	<?php wp_footer(); ?>

    
	<script>
    jQuery(document).ready(function(){
    //var subtit = jQuery("<div />").append(jQuery(".product-subtitle").clone()).html();
   
    /*jQuery("#my_user_dob").on("change",function(){
      var selected = jQuery(this).val();
        
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var current = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;
    
    var date1 = new Date(selected); 
    var date2 = new Date(current); 
    var Difference_In_Time = date2.getTime() - date1.getTime(); 
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
    var days = Math.round(Difference_In_Days);
    if(days >= 7665){
    	jQuery('.error').hide();
       //alert(days);
    }else{
       jQuery("#my_user_dob").val("");
       jQuery('.error').show();
    }
    });*/


    jQuery(".single_add_to_cart_button").empty();
    jQuery(".single_add_to_cart_button").append('add to cart');

    
    jQuery(".woocommerce-MyAccount-navigation-link--edit-account a").empty();
    jQuery(".woocommerce-MyAccount-navigation-link--orders a").empty();

    jQuery(".woocommerce-MyAccount-navigation-link--edit-account a").append('My profile');
    jQuery(".woocommerce-MyAccount-navigation-link--orders a").append('Order History');

    jQuery(".post_layout_thumbs").on('mouseover', function(){
    	jQuery(this).parents(".type-product").find(".product_desc").css({"display":"block", "opacity":1});
    });

    jQuery(".post_layout_thumbs").on('mouseout', function(){
    jQuery(".product_desc").css({"display":"none", "opacity":0});
    });

    jQuery(".page-id-1401 #billing_country_field label").empty();
    jQuery(".page-id-1401 #billing_country_field label").append('Country <span style="color:red;">*</span>');

    jQuery(".page-id-1401 #billing_state_field label").empty();
    jQuery(".page-id-1401 #billing_state_field label").append('County / State / Province <span style="color:red;">*</span>');

    jQuery(".page-id-1401 #shipping_state_field label").empty();
    jQuery(".page-id-1401 #shipping_state_field label").append('County / State / Province <span style="color:red;">*</span>');

    jQuery(".order_details tfoot").find("tr:eq(1)").remove();
    
    jQuery('.copyright_text a').attr('target', '_blank');



    });
	</script>
   
    <?php $lang = $_GET['lang']; 
      if($lang == "it"){ ?>

      	<script>
      		jQuery(document).ready(function(){
			   var cart = '<div class="woo-cart"><div class="product-cart_icon"><a class="cart-contents" href="https://montecalvi.com/cart/?lang=it" title="View your shopping cart"><i class="icon-shopping-cart" aria-hidden="true"></i></a><span class="cart-contents-count"></span></div></div>';
      		   //var cart = jQuery(".woo-cart").html();
               //jQuery(".woo-cart").hide();
               jQuery(".archive .shop_header_banner").prepend(cart);


      		   jQuery(".single-product .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/wineclub/shop/?lang=it"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		  jQuery(".woocommerce-checkout .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/cart/?lang=it"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		   jQuery(".single-post .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/wineclub/stories/?lang=it"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		   jQuery(".single-post .top_panel_title_wrap").prepend('<div class="main-blog-section"><div class="blog-page-content"><ul><li><a href="/wineclub/shop/?lang=it">La Bottega</a></li><li><a href="/wineclub/stories/?lang=it">Le storie</a></li><li><a href="/wineclub/edit-account/?lang=it">Il mio account</a></li></ul></div></div>');

      		   jQuery(".page-template-login-template #billing_country_field").append("<p class='country_note'>* Se sei al di fuori delle nostre zone di spedizione standard, non esitare a metterti in contatto direttamente <a href='mailto:sales@montecalvi.com'>sales@montecalvi.com</a></p>");

      		   jQuery(".page-template-login-template #billing_country_field").append("<p class='country_note'>** Nota: a causa delle leggi locali sulle licenze, è vietato spedire verso determinate destinazioni</p>");

      		   jQuery(".archive .inner_banner-content").empty();
               jQuery(".archive .inner_banner-content").append('Abbiamo aggiunto pochissimo ai nostri vini, e allo stesso tempo, non gli abbiamo tolto nulla. Vinificazione ridotta al minimo.');

               jQuery(".single-product .single_add_to_cart_button").empty();
               jQuery(".single-product .single_add_to_cart_button").append('Aggiungi al carrello');

               jQuery(".blog .more-link, .category .more-link").empty();
               jQuery(".blog .more-link, .category .more-link").append('Leggi di più');

               jQuery(".post-edit-link").empty();
               jQuery(".post-edit-link").append('modificare');

               jQuery(".single-post .post_meta_label").empty();
               jQuery(".single-post .post_meta_label").append('tag:');

               jQuery(".single-post .related_wrap_title").empty();
               jQuery(".single-post .related_wrap_title").append('Potrebbe piacerti anche');

               jQuery(".blog .widget_search .widget_title, .category .widget_search .widget_title").empty();
               jQuery(".blog .widget_search .widget_title, .category .widget_search .widget_title").append('Ricerca');

               jQuery(".blog .widget_categories .widget_title, .category .widget_categories .widget_title").empty();
               jQuery(".blog .widget_categories .widget_title, .category .widget_categories .widget_title").append('Categoria');

               jQuery(".blog .widget_recent_entries .widget_title, .category .widget_recent_entries .widget_title").empty();
               jQuery(".blog .widget_recent_entries .widget_title, .category .widget_recent_entries .widget_title").append('messaggi recenti');

               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--orders a").empty();
               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--orders a").append('Cronologia ordini');

               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--edit-account a").empty();
               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--edit-account a").append('Il mio profilo');

               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--customer-logout a").empty();
               jQuery(".woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link--customer-logout a").append('Disconnettersi');

               jQuery(".woocommerce_account_subscriptions .woocommerce-Button").empty();
               jQuery(".woocommerce_account_subscriptions .woocommerce-Button").append('Sfoglia i prodotti');

               jQuery(".woocommerce-form-register .woocommerce-privacy-policy-text p").empty();
               jQuery(".woocommerce-form-register .woocommerce-privacy-policy-text p").append("I tuoi dati personali verranno utilizzati per supportare la tua esperienza in questo sito Web, per gestire l'accesso al tuo account e per altri scopi descritti nella nostra <a href='https://montecalvi.com/privacy-policy/?lang=it'>politica sulla privacy</a>.");

               
               jQuery("#menu-item-1134 span").empty();
               jQuery("#menu-item-1134 span").append("CONTATTI");

               jQuery("#menu-item-1132 span").empty();
               jQuery("#menu-item-1132 span").append("Tour del vino");

              
               jQuery("#menu-item-1127 span").empty();
               jQuery("#menu-item-1127 span").append("CONTATTI");

               jQuery("#menu-item-1126 span").empty();
               jQuery("#menu-item-1126 span").append("Tour del vino");

               jQuery(".home .sc_promo_text .sc_item_title sc_promo_title").empty();
               jQuery(".home .sc_promo_text .sc_item_title sc_promo_title").append("TOUR DEL VINO");

               //jQuery(".copyright_text").find('a:first').html("Idee Semplificate");
               jQuery(".copyright_text").find('a:last').html("Politiche");

               var htmlval = jQuery(".copyright_text").html();
               var arrtext = htmlval.split("<br>");
               var newtext = "Montecalvi © 2020. Tutti i diritti riservati. <br>" + arrtext[1] +"<br>"+ arrtext[2];
               jQuery(".copyright_text").html(newtext);

               jQuery(".archive .inner_banner-content").append("<div class='shop-topcontent'><p>I prezzi sottoindicati includono la spedizione nel paese indicato qui. </p> <p>Se desidera cambiare la destinazione, clicchi qui.</p></div>");

               jQuery("#billing_country_field label").empty();
               jQuery("#billing_country_field label").append('Nazione <span style="color:red;">*</span>');

               jQuery("#shipping_country_field label").empty();
               jQuery("#shipping_country_field label").append('Nazione <span style="color:red;">*</span>');

               jQuery("#billing_state_field label").empty();
               jQuery("#billing_state_field label").append('Contea / Stato / Provincia <span style="color:red;">*</span>');

               jQuery("#shipping_state_field label").empty();
               jQuery("#shipping_state_field label").append('Contea / Stato / Provincia <span style="color:red;">*</span>');

               jQuery("#shipping_postcode_field label").empty();
               jQuery("#shipping_postcode_field label").append('Codice Postale / CAP <span style="color:red;">*</span>');

               jQuery("#shipping_postcode_field label").empty();
               jQuery("#shipping_postcode_field label").append('Codice Postale / CAP <span style="color:red;">*</span>');

               jQuery(".page-template-login-template #billing_country_field select > option:first").empty();
               jQuery(".page-template-login-template #billing_country_field select > option:first").append('Seleziona un Paese');

               //jQuery('.wc-proceed-to-checkout').before("<p class='ctm-text-checkout'>La spedizione alla destinazione registrata è inclusa. Se la consegna avviene a un indirizzo diverso dal vostro, il prezzo finale verrà corretto prima di concludere la transazione.</p>");

               jQuery(".woocommerce-form__label-for-checkbox").after('<p class="checkbox-cont">Il totale sotto cambierà in base alla destinazione finale della spedizione.</p>');
  
               
  
      		});
      	</script>

      <?php }else{ ?>

      	<script>
      		jQuery(document).ready(function(){
               var cart = '<div class="woo-cart"><div class="product-cart_icon"><a class="cart-contents" href="https://montecalvi.com/cart/" title="View your shopping cart"><i class="icon-shopping-cart" aria-hidden="true"></i></a><span class="cart-contents-count"></span></div></div>';
      		   //var cart = jQuery(".woo-cart").html();
               //jQuery(".woo-cart").hide();
               jQuery(".archive .shop_header_banner").prepend(cart);

      		  jQuery(".single-product .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/wineclub/shop"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		  jQuery(".woocommerce-checkout .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/cart"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		  jQuery(".single-post .top_panel_title").prepend('<div class="arrow-left-icon"><a href="/wineclub/stories"><i class="icon-arrow-left-alt" aria-hidden="true"></i></a></div>');

      		   jQuery(".single-post .top_panel_title_wrap").prepend('<div class="main-blog-section"><div class="blog-page-content"><ul><li><a href="/wineclub/shop">The Shop</a></li><li><a href="/wineclub/stories">The Stories</a></li><li><a href="/wineclub/edit-account">My Account</a></li></ul></div></div>');

      		   jQuery(".page-template-login-template #billing_country_field").append("<p class='country_note'>*If you are outside our standard shipping zones, please don’t hesitate to get in touch directly <a href='mailto:sales@montecalvi.com'>sales@montecalvi.com</a></p>");

      		   jQuery(".page-template-login-template #billing_country_field").append("<p class='country_note'>** Please note due to local licensing laws we are prohibited from shipping to certain destinations</span></p>");

      		   jQuery(".archive .inner_banner-content").append("<div class='shop-topcontent'><p>The prices shown include shipping to the country below.</p> <p>If you would like to ship to another country, please select here. </p></div>");

      		   jQuery(".woocommerce-form-register .woocommerce-privacy-policy-text p").empty();
               jQuery(".woocommerce-form-register .woocommerce-privacy-policy-text p").append("Your personal data will be used to support your experience throughout this website, to manage access to your account and for other purposes described in our <a href='https://montecalvi.com/privacy-policy/?lang=it'>privacy policy</a>.");

               jQuery(".page-template-login-template #billing_country_field select > option:first").empty();
               jQuery(".page-template-login-template #billing_country_field select > option:first").append('Select a country');

               //jQuery('.wc-proceed-to-checkout').before("<p class='ctm-text-checkout'>Shipping to your registered destination is included. If you choose a different shipping address, the price will be adjusted before your transaction is concluded.</p>");

               jQuery(".woocommerce-form__label-for-checkbox").after('<p class="checkbox-cont">The price below will be adjusted to reflect your shipping destination.</p>');

               
      		});
      	</script>

     <?php } ?>


</body>
</html>
