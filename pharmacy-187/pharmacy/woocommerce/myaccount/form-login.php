<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="row" id="customer_login">

	<div class="col-md-6 col-sm-6 col-xs-12">

<?php endif; ?>

		<h2><?php _e( 'Login', 'pharmacy' ); ?></h2>

		<form method="post" class="login" role="form">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="form-group form-row-wide">
				<label for="username"><?php _e( 'Username or email address', 'pharmacy' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text form-control" name="username" id="username" />
			</div>
			<div class="form-group form-row-wide">
				<label for="password"><?php _e( 'Password', 'pharmacy' ); ?> <span class="required">*</span></label>
				<input class="input-text form-control" type="password" name="password" id="password" />
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'pharmacy' ); ?>" />
			</div>

			<div class="checkbox">
				<label for="rememberme" class="inline">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'pharmacy' ); ?>
				</label>
			</div>

			<div class="lost_password form-group lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'pharmacy' ); ?></a>
			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">

		<h2><?php _e( 'Register', 'pharmacy' ); ?></h2>

		<form method="post" class="register box" role="form">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<div class="form-group form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'pharmacy' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text form-control" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) esc_attr( $_POST['username'] ); ?>" />
				</div>

			<?php endif; ?>

			<div class="form-group form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'pharmacy' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text form-control" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) esc_attr( $_POST['email'] ); ?>" />
			</div>

			<div class="form-group form-row-wide">
				<label for="reg_password"><?php _e( 'Password', 'pharmacy' ); ?> <span class="required">*</span></label>
				<input type="password" class="input-text form-control" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) esc_attr( $_POST['password'] ); ?>" />
			</div>

			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'pharmacy' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'pharmacy' ); ?>" />
			</div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>