<?php
 /**
 * Theme function
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
if ( ! function_exists( 'of_get_option' ) ) :

function of_get_option( $name, $default = false ) {
	$config = get_option( 'optionsframework' );

	if ( ! isset( $config['id'] ) ) {
		return $default;
	}

	$options = get_option( $config['id'] );

	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}

endif;
if( !defined("WPB_VC_VERSION") ){
	define("WPB_VC_VERSION",'4.3.3');	
}

define( 'WPO_THEME_DIR', get_template_directory() );
define( 'WPO_THEME_SUB_DIR', WPO_THEME_DIR.'/sub/' );
define( 'WPO_THEME_CSS_DIR', WPO_THEME_DIR.'/css/' );
define( 'WPO_THEME_URI', get_template_directory_uri() );

define( 'WPO_THEME_NAME', 'exists' );
define( 'WPO_THEME_VERSION', '1.0' );
 
define( 'WPO_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

/*
 * Include list of files from Opal Framework.
 */ 
require_once( WPO_THEME_DIR . '/framework/loader.php' );
require_once( WPO_THEME_DIR . '/sub/theme.php' );
require_once( WPO_THEME_DIR . '/sub/startup.php' );

/* 
 * Localization
 */ 
$lang = WPO_THEME_DIR . '/languages' ;
load_theme_textdomain( 'pharmacy', $lang );

/**
 * Create variant objects to modify and proccess actions of only theme.
 */
require_once( WPO_THEME_DIR . '/sub/pagebuilder.php' );

/*
 * Shortcodes
 */
require_once( WPO_THEME_DIR. '/shortcode.php' );

/*
 * Create & start up instance of framework in application.
 */


/// include list of functions to process logics of worpdress not support 3rd-plugins.
require_once( WPO_THEME_DIR . '/sub/functions/theme.php' );

/// WooCommerce specified functions
if( WPO_WOOCOMMERCE_ACTIVED  ) {
    require_once( WPO_THEME_DIR . '/sub/functions/woocommerce.php' );
}

/**
 * Create variant objects to modify and proccess actions of only theme.
 */
if( WPO_VISUAL_COMPOSER_ACTIVED ){
	require_once( WPO_THEME_DIR . '/sub/pagebuilder.php' );
	$path = WPO_THEME_SUB_DIR . '/vc_shortcodes/class/*.php';
	$files = glob($path);
	foreach ($files as $key => $file) {
		if(is_file($file)){
			require($file);
		}
	}
}

add_filter( 'woocommerce_sale_flash', 'wpo_custom_onsale_text', 10, 3 );
function wpo_custom_onsale_text( $text, $post, $product ) {

     /** Set new string output */
     $sale = '<span class="onsale"><span class="label-sale">' . __( 'Sale', 'pharmacy') . '</span></span>';

     /** Return changed string */
     return trim( $sale );

}

add_action( 'after_setup_theme', 'pharmacy_fnc_setup' );
function pharmacy_fnc_setup() {
	add_theme_support( 'title-tag' );
}


?>