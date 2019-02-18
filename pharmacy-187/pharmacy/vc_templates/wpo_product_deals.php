<div class="widget_deals_products widget">
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


    /*extract( shortcode_atts( array(
        'title'=>'',
    ), $atts ) );*/
    $atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
    extract( $atts );

    $number = -1;

    $loop = wpo_woocommerce_query('deals', $number);
    $_id = wpo_makeid();

    //register countdown js
    wp_register_script( 'countdown_js', WPO_THEME_URI.'/js/countdown.js', array( 'jquery' ) );
    wp_enqueue_script('countdown_js');

   $_total =  $loop->post_count;

   if( $loop->have_posts()  ) {
        if($title!=''){ 
?>
            <h3 class="widget-title title-primary">
                <span><?php echo $title; ?></span>
            </h3>
        <?php } ?>
        <div class="woocommerce  woo-deals">
            <div class="widget-content widget-products slide" id="productcarouse-<?php echo $_id; ?>" data-ride="carousel">
                <?php if( $_total > 1 ) { ?>
                    <div class="woo-carousel-controls pull-right">
                        <a class="left woo-carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right woo-carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                <?php } ?>
                <div class="carousel-inner">
                    <?php $_count = 0; ?>
                    <?php 
                     while ( $loop->have_posts() ) : $loop->the_post(); $product = wc_get_product();  
                         $time_sale = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
                     ?>
                        <div class="col-xs-12 item<?php echo ($_count==0) ? ' active':''; ?>">
                            <div class="product-block thumbnail">
                                <figure class="image">
                                    <?php echo $product->get_image('shop_catalog_image_size'); ?>
                                </figure>

                                <div class="caption">
                                    <h3 class="name">
                                        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo  $product->get_name(); ?></a>
                                    </h3>
                                    <div class="rating clearfix ">
                                        <?php if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) { ?>
                                            <div><?php echo $rating_html; ?></div>
                                        <?php }else{ ?>
                                            <div class="star-rating"></div>
                                        <?php } ?>
                                    </div>
                                    <div class="price"><?php echo $product->get_price_html(); ?></div>
                                </div>
                            </div>
                            <div class="cart text-center">
                                <?php

                                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                        sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="btn btn-outline-lg btn-outline %s">%s</a>',
                                            esc_url( $product->add_to_cart_url() ),
                                            esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                            esc_attr( $product->get_id() ),
                                            esc_attr( $product->get_sku() ),
                                            esc_attr( isset( $class ) ? $class : 'add_to_cart_button' ),
                                            esc_html( $product->add_to_cart_text() )
                                        ),
                                    $product );
                                ?>
                            </div>
                            <div class="pts-countdown clearfix" data-countdown="countdown"
                                 data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                            </div>
                        </div>
                    <?php 
                        $_count++; 
                    endwhile; 
                ?>
                <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
