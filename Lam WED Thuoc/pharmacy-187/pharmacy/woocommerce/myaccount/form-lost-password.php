<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<form method="post" class="lost_reset_password" role="form">

	<?php if( 'lost_password' == $args['form'] ) : ?>

        <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'pharmacy' ) ); ?></p>

        <div class="form-group">
            <label for="user_login"><?php _e( 'Username or email', 'pharmacy' ); ?></label> 
            <input class="input-text form-control" type="text" name="user_login" id="user_login" />
        </div>

	<?php else : ?>

        <p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'pharmacy') ); ?></p>

        <div class="form-group">
            <label for="password_1"><?php _e( 'New password', 'pharmacy' ); ?> <span class="required">*</span></label>
            <input type="password" class="input-text form-control" name="password_1" id="password_1" />
        </div>
        <div class="form-group">
            <label for="password_2"><?php _e( 'Re-enter new password', 'pharmacy' ); ?> <span class="required">*</span></label>
            <input type="password" class="input-text form-control" name="password_2" id="password_2" />
        </div>

        <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
        <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

    <?php endif; ?>

    <div class="form-group">
        <input type="submit" class="button" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'pharmacy' ) : __( 'Save', 'pharmacy' ); ?>" />
    </div>
	<?php wp_nonce_field( 'lost_password' ); ?>

</form>