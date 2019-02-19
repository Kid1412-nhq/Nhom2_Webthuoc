<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
    return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
$classes[] = 'shopcol col-md-12 product-cols';
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
    $classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
    $classes[] = 'last';

?>


<div <?php post_class($classes); ?>>
	<?php
    global $product;
?>
<div class="thumbnail product-block product product-list">
	<div class="row">
		<div class="col-md-3">
			<figure class="image">
		        <?php woocommerce_show_product_loop_sale_flash(); ?>
		        <a href="<?php the_permalink(); ?>">
		            <?php
		                /**
		                * woocommerce_before_shop_loop_item_title hook
		                *
		                * @hooked woocommerce_show_product_loop_sale_flash - 10
		                * @hooked woocommerce_template_loop_product_thumbnail - 10
		                */
		                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
		                do_action( 'woocommerce_before_shop_loop_item_title' );
		            ?>
		        </a>
		    </figure>
		</div>
		<div class="product-meta col-md-9 ">
			<h3 class="name"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            <div class="category">
                <?php echo __('Category: ', 'pharmacy' ) ?><?php echo wc_get_product_category_list( $product->get_id(), ', ', '', ' ' ); ?>
            </div>
			<?php woocommerce_template_single_excerpt(); ?>
            <div class="button-groups">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                <?php if(of_get_option('is-quickview',true)){ ?>
                    <a href="#" class="quickview button" data-productslug="<?php echo $product->get_slug(); ?>"data-toggle="modal"data-target="#wpo_modal_quickview"> <span><?php echo __('Quick view','pharmacy'); ?></span> </a>
                <?php } ?>

                <?php
                if( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                }
                ?>

                <?php if( class_exists( 'YITH_Woocompare' ) ) {
                    $action_add = 'yith-woocompare-add-product';
                    $url_args = array(
                        'action' => $action_add,
                        'id' => $product->get_id()
                    );
                    ?>
                    <div class="yith-compare">
                        <a href="<?php echo esc_url( wp_nonce_url( add_query_arg( $url_args ), $action_add ) ); ?>" class="compare button " data-product_id="<?php echo $product->get_id(); ?>"> <i class="fa fa-refresh"></i> <span><?php echo __('add to compare','pharmacy'); ?></span> </a>
                    </div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>
</div>