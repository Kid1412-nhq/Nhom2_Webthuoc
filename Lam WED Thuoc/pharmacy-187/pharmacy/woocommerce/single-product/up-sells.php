<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop,$wp_query;

$upsells = $product->get_upsell_ids();
$posts_per_page = 6;
if ( sizeof( $upsells ) == 0 ) return;

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);
$_count =1;
$products = new WP_Query( $args );

$columns_count = of_get_option('woo-number-columns',4);
$class_column = 'col-sm-' . 12/$columns_count;
$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="box upsells products">
		<h6 class="widget-title visual-title">
	        <span><?php _e( 'You may also like&hellip;', 'pharmacy' ) ?></span>
		</h6>
		<div class="woocommerce">
			<div class="widget-content">
				<?php wc_get_template( 'widget-products/carousel.php' , array( 'loop'=>$products,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$posts_per_page ) ); ?>
			</div>
		</div>
	</div>

<?php endif;

wp_reset_postdata();
