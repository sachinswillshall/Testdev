<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
<?php ///print_r($product);?>
<a class="shop-titl" href="<?php echo get_permalink($product_id); ?>">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

    ?>
   
    <?php $subtitle = get_field('sub_title'); ?>
    <h4 class="product-subtitle"><?php echo $subtitle; ?></h4>

    <?php

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
	

	<?php global $product;
	if ( ! $product->managing_stock() && ! $product->is_in_stock() ){ ?>

    <?php $lang = $_GET['lang']; 
    if($lang == "it"){ ?>

      <span class="outofstock_logo">Esaurito!</span>

    <?php }else{ ?>
    
      <span class="outofstock_logo">Out of stock!</span>

    <?php } } ?>
    
    <?php
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
    

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>

	 <?php $boxcontent = get_field('box_content', $product->id); ?>
    <p class="product-boxcontent"><?php echo $boxcontent; ?></p>	
</a>
	
<?php //global $product;
	if ( ! $product->managing_stock() && ! $product->is_in_stock() ){ ?>

    <?php $lang = $_GET['lang']; 
      if($lang == "it"){ ?>

	<a rel="nofollow" href="javascript:void(0)" class="shop_cart button add_to_cart_button product_type_simple ajax_add_to_cart sc_button_hover_slide_top ctm-out-stock">Esaurito</a>

    <?php }else{ ?>

    <a rel="nofollow" href="javascript:void(0)" class="shop_cart button add_to_cart_button product_type_simple ajax_add_to_cart sc_button_hover_slide_top ctm-out-stock">out of stock</a>

    <?php } ?>

<?php }else{?>

   <?php $lang = $_GET['lang']; 
      if($lang == "it"){ ?>

	<a rel="nofollow" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');
                echo $add_to_cart;
?>" aria-hidden="true" data-quantity="1" data-product_id="<?php echo $post->ID;?>" data-product_sku="" class="shop_cart icon-shopping-cart button add_to_cart_button product_type_simple ajax_add_to_cart sc_button_hover_slide_top">Aggiungi al carrello</a>

    <?php }else{ ?>

      <a rel="nofollow" href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');
                echo $add_to_cart;
?>" aria-hidden="true" data-quantity="1" data-product_id="<?php echo $post->ID;?>" data-product_sku="" class="shop_cart icon-shopping-cart button add_to_cart_button product_type_simple ajax_add_to_cart sc_button_hover_slide_top">add to cart</a>

     <?php } ?>	

<?php } ?>
</li>
