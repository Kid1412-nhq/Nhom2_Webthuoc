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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- OFF-CANVAS MENU SIDEBAR -->
<div id="wpo-off-canvas" class="wpo-off-canvas">
    <div class="wpo-off-canvas-body">
        <div class="wpo-off-canvas-header">
            <div class="clearfix">
                <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <?php get_search_form(); ?>
            <!-- <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button> -->
            <div class="mobile-menu-header">
                <?php _e('Menu','pharmacy'); ?>
            </div>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
            <?php
            $args = array(  'theme_location' => 'mainmenu',
                'container_class' => 'navbar-collapse',
                'menu_class' => 'wpo-menu-top nav navbar-nav',
                'fallback_cb' => '',
                'menu_id' => 'main-menu-offcanvas',
                'walker' => new Wpo_Megamenu_Offcanvas()
            );
            wp_nav_menu($args);
            ?>
        </nav>
    </div>
</div>
<!-- //OFF-CANVAS MENU SIDEBAR -->

<!-- START Wrapper -->
<div class="wpo-wrapper">
    <!-- Top bar -->
    <section class="wpo-topbar wrapper-topbar">
        <div class="container">
            <div class="container-inner clearfix">
                <div class="pull-left user-login">
                    <?php if( !is_user_logged_in() ){ ?>
                        <span class="hidden-xs"><?php echo __('Welcome visitor you can','pharmacy'); ?></span>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('login or register','pharmacy'); ?>"><?php _e(' login or register ','pharmacy'); ?></a>
                    <?php }else{ ?>
                        <?php $current_user = wp_get_current_user(); ?>
                        <span><?php echo __('Welcome ','pharmacy'); ?><?php echo $current_user->display_name; ?> !</span>
                    <?php } ?>
                </div>
                <?php
                $args = array(
                    'theme_location' => 'topmenu',
                    'container' => false,
                    'menu_class' => 'top-menu pull-right',
                );
                wp_nav_menu($args);
                ?>
            </div>
        </div>
    </section>
    <!-- // Topbar -->
    <!-- HEADER -->
    <header id="wpo-header" class="wpo-header wpo-header-3 wrapper-header">
        <div class="container">
            <div class="container-inner header-wrap clearfix">
                <!-- LOGO -->
                <div class="header-top clearfix">
                    <div class="search-form-inner col-md-4 hidden-sm hidden-xs">
                        <?php
                        get_search_form();
                        ?>
                    </div>

                    <div class="logo-in-theme col-md-4 text-center ">
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    </div>

                    <?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
                        <!-- Setting -->
                        <div class="top-cart col-md-4 hidden-sm hidden-xs">
                            <?php wpo_cartdropdown(); ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- MENU -->
                <div class=" main-menu clearfix">
                    <div class="header-menu">
                        <nav id="wpo-mainnav" data-duration="<?php echo of_get_option('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo of_get_option('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                            <div class="navbar-header">
                                <?php wpo_renderButtonToggle(); ?>
                            </div><!-- //END #navbar-header -->
                            <?php
                            $args = array(  'theme_location' => 'mainmenu',
                                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                'menu_class' => 'nav navbar-nav megamenu',
                                'fallback_cb' => '',
                                'menu_id' => 'main-menu',
                                'walker' => new Wpo_Megamenu());
                            wp_nav_menu($args);
                            ?>
                        </nav>
                        <!-- //MENU -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //HEADER -->