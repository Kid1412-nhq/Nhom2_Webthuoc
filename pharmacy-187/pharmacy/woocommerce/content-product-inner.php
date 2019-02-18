<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
global $product;
?>
<div class="thumbnail product product-grid product-block">
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
			<div class="effect-hover"></div>
        </a>
    </figure>

	<div class="caption">
        <div class="button-groups add-links clearfix">
            <?php
                if( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                }
            ?>

            <?php if( class_exists( 'YITH_Woocompare' ) ) { ?>
                <?php
                    $action_add = 'yith-woocompare-add-product';
                    $url_args = array(
                        'action' => $action_add,
                        'id' => $product->get_id()
                    );
                ?>
                <div class="yith-compare">
                    <a  href="<?php echo esc_url( wp_nonce_url( add_query_arg( $url_args ), $action_add ) ); ?>" class="compare" data-product_id="<?php echo $product->get_id(); ?>">
                        <i data-placement="left" data-toggle="tooltip" data-original-title="<?php echo __('Compare', 'pharmacy'); ?>" class="fa fa-refresh"></i>
                        <!-- <span><?php //echo __('add to compare','pharmacy'); ?></span> -->
                    </a>
                </div>
            <?php } ?>

            <?php if(of_get_option('is-quickview',true)){ ?>
                <div class="quick-view">
                    <a href="#" class="quickview" data-productslug="<?php echo $product->get_slug(); ?>" data-toggle="modal" data-target="#wpo_modal_quickview">
                        <i data-placement="left" data-toggle="tooltip" data-original-title="<?php echo __('Quickview', 'pharmacy'); ?>" class="fa fa-eye"></i>
                    </a>
                </div>
            <?php } ?>
        </div>

		<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
            /**
            * woocommerce_after_shop_loop_item_title hook
            *
            * @hooked woocommerce_template_loop_rating - 5
            * @hooked woocommerce_template_loop_price - 10
            */
            do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
        <div class="add-button text-center clearfix">
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            <?php
                $action_add = 'yith-woocompare-add-product';
                $url_args = array(
                    'action' => $action_add,
                    'id' => $product->get_id()
                );
            ?>
<!--            <a href="--><?php //the_permalink(); ?><!--" class="btn btn-outline"><i class="fa fa-sign-out"></i>--><?php //echo __('Detail','pharmacy'); ?><!--</a>-->
        </div>
	</div>
</div>