<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! wc_coupons_enabled() ) {
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'pharmacy' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'pharmacy' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?>

<form class="checkout_coupon" method="post" style="display:none">

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name="coupon_code" class="input-text form-control" placeholder="<?php _e( 'Coupon code', 'pharmacy' ); ?>" id="coupon_code" value="" />
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'pharmacy' ); ?>" />
			</div>
		</div>	
	</div>	
		
</form>