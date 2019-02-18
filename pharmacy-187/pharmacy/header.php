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
                    <div class="col-md-6 col-xs-6 user-login">
                        <?php if( !is_user_logged_in() ){ ?>
                            <span class="hidden-xs"><?php echo __('Welcome visitor you can','pharmacy'); ?></span>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('login or register','pharmacy'); ?>"><?php _e(' login or register ','pharmacy'); ?></a>
                        <?php }else{ ?>
                            <?php $current_user = wp_get_current_user(); ?>
                            <span><?php echo __('Welcome ','pharmacy'); ?><?php echo $current_user->display_name; ?> !</span>
                        <?php } ?>
                    </div>
                    <div class="pull-right setting">
                        <ul class="nav nav-setting navbar-right dropdown-phone">
                            <li class="dropdown pull-right">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i></a>
                                <?php
                                $args = array(
                                    'theme_location' => 'topmenu',
                                    'container' => false,
                                    'menu_class' => 'dropdown-menu',
                                );
                                wp_nav_menu($args);
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
		</section>
		<!-- // Topbar -->


		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header wrapper-header">
            <div class="container">
                <div class="container-inner header-wrap clearfix">
                    <!-- LOGO -->
                    <div class="logo-in-theme  text-center col-md-3">
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    </div>
                    <!-- MENU -->
                    <div class="col-md-9 main-menu clearfix">
                        <nav id="wpo-mainnav" data-duration="<?php echo of_get_option('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo of_get_option('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                            <div class="navbar-header">
                                <?php wpo_renderButtonToggle(); ?>
                            </div><!-- //END #navbar-header -->
                            <?php
                            $args = array(  'theme_location' => 'mainmenu',
                                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                'menu_class' => 'nav navbar-nav megamenu navbar-left',
                                'fallback_cb' => '',
                                'menu_id' => 'main-menu',
                                'walker' => new Wpo_Megamenu());
                            wp_nav_menu($args);
                            ?>
                        </nav>
                        <!-- //MENU -->
                        <!-- //LOGO -->

                        <div class="header-bottom input-group clearfix">
                            <div class="search-from hidden-xs ">
                                <form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
                                    <div class="wpo-search input-group">
                                        <input name="s" maxlength="40" class="form-control input-lg input-search" type="text" size="20" placeholder="<?php echo __('Search...', 'pharmacy'); ?>">
                                        <span class="input-group-addon input-large btn-search">
                                            <input type="submit" class="fa" value="&#xf002;" />
                                            <?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
                                                <input type="hidden" name="post_type" value="product" />
                                            <?php } ?>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
                                <!-- Setting -->
                                <div class="top-cart input-group-btn">
                                    <?php wpo_cartdropdown(); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- // Setting -->
                    </div>
                </div>
			</div>
		</header>
		<!-- //HEADER -->