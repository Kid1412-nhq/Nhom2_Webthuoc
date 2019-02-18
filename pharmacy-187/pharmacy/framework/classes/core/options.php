<?php
	/* $Desc
	 *
	 * @version    $Id$
	 * @package    wpbase
	 * @author     Opal  Team <opalwordpressl@gmail.com >
	 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
	 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
	 *
	 * @website  http://www.wpopal.com
	 * @support  http://www.wpopal.com/support/forum.html
	 */
	class WPO_Option{

		public static function getInstance(){
			static $_instance;
			if( !$_instance ){
				$_instance = new WPO_Option();
			}
			return $_instance;
		}

		private function getSkins(){
			$path = WPO_THEME_DIR.'/css/skins/*';
			$files = glob($path , GLOB_ONLYDIR );
			$skins = array( 'default' => 'default' );
			if(count($files)>0){
				foreach ($files as $key => $file) {
					$skin = str_replace( '.css', '', basename($file) );
					$skins[$skin]=$skin;
				}
			}

			return $skins;
		}
		/**
		 *
		 */
		public function getOption( $suboptions=array() ){
			// If using image radio buttons, define a directory path
		    $imagepath =  WPO_FRAMEWORK_ADMIN_IMAGE_URI;
		    $general = array();
		    $general[] = array(
		            'name' => __('General', 'pharmacy'),
		            'type' => 'heading');

		    $general[] = array(
		        'name' => __( 'Logo', 'pharmacy' ),
		        'desc' => '',
		        'id' => 'logo',
		        'type' => 'upload'
		    );

		    $general[] = array(
		        'name' => __('Default Theme', 'pharmacy'),
		        'desc' => '',
		        'id' => 'skin',
		        'type' => 'select',
		        'std' =>'template.css',
		        'options' => $this->getSkins()
		    );

		    $wp_editor_settings = array(
		        'wpautop' => true, // Default
		        'textarea_rows' => 5,
		        'media_buttons' => true
		    );

		    $general[] = array(
		        'name' => __('404 text', 'pharmacy'),
		        'id' => '404',
		        'type' => 'editor',
		        'std' =>'Can\'t find what you need? Take a moment and do a search below!',
		        'settings' => $wp_editor_settings );

		    $general[] = array(
		        'name' => __('Copyright', 'pharmacy'),
		        'id' => 'copyright',
		        'type' => 'editor',
		        'std' =>'© 2014 <a href="http://venusdemo.com/wpopal/pharmacy/">Pharmacy Theme</a> POWERED BY <a href="http://themeforest.net/user/Opal_WP/?ref=dancof">OpalTheme</a>/ Buy it on <a href="http://themeforest.net/user/Opal_WP/portfolio?ref=dancof">ThemeForest</a>',
		        'settings' => $wp_editor_settings );

		    /**
		    *  Page Setting
		    */
		    $blogs = array(); 
		    $blogs[] = array(
		            'name' => __('Blog Post', 'pharmacy'),
		            'type' => 'heading');

		    $blogs[] = array(
		        'name'  => __('Layout Type', 'pharmacy'),
		        'desc'  => __("Images for layout.", 'pharmacy'),
		        'id'    => "single-layout",
		        'std'   => "0-1-1",
		        'type'  => "images",
		        'options' => array(
		            '0-1-0'    => $imagepath . '1col.png',
		            '1-1-0'  => $imagepath . '2cl.png',
		            '0-1-1'  => $imagepath . '2cr.png',
		            '1-1-1'    => $imagepath . '3c.png',
		            '1-1-m'    => $imagepath . '3c-l-l.png',
		            'm-1-1'    => $imagepath . '3c-r-r.png'
		        )
		    );

		    $blogs[] = array(
		        'name' => __('Right Sidebar', 'pharmacy'),
		        'desc' => '',
		        'id' => 'right-sidebar',
		        'type' => 'select',
		        'options' => $this->getSidebar()
		    );

		    $blogs[] = array(
		        'name' => __('Left Sidebar', 'pharmacy'),
		        'desc' => '',
		        'id' => 'left-sidebar',
		        'type' => 'select',
		        'options' => $this->getSidebar()
		    );

		    $blogs[] = array(
		        'name' => __('Show Title', 'pharmacy'),
		        'desc' => '',
		        'id' => 'post-title',
		        'type' => 'select',
		        'std' =>'0',
		        'options' => array(
		                        '0'=>'No',
		                        '1'   =>'Yes'
		    ));
		   
		    /**
		    *  Social Setting
		    */
		    $social = array();
		    $social[] = array(
		            'name' => __('Social Setting ', 'pharmacy'),
		            'type' => 'heading');

		    $social[] = array(
		        'name' => __('Facebook', 'pharmacy'),
		        'desc' => __('Check the box to show the facebook sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-facebook',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('Twitter', 'pharmacy'),
		        'desc' => __('Check the box to show the twitter sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-twitter',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('LinkedIn', 'pharmacy'),
		        'desc' => __('Check the box to show the linkedin sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-linkedin',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('Google Plus', 'pharmacy'),
		        'desc' => __('Check the box to show the g+ sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-google',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('Tumblr', 'pharmacy'),
		        'desc' => __('Check the box to show the tumblr sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-tumblr',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('Pinterest', 'pharmacy'),
		        'desc' => __('Check the box to show the pinterest sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-pinterest',
		        'std' => '1',
		        'type' => 'checkbox');

		    $social[] = array(
		        'name' => __('Email', 'pharmacy'),
		        'desc' => __('Check the box to show the email sharing icon in blog posts.', 'pharmacy'),
		        'id' => 'sharing-email',
		        'std' => '1',
		        'type' => 'checkbox');
		   /**
		    *  SEO OPTION
		    */
		    $seo = array();
		    $seo[] = array(
		            'name' => __('SEO Option', 'pharmacy'),
		            'type' => 'heading');

		    $seo[] = array(
		        'name' => __('Enable SEO', 'pharmacy'),
		        'desc' => __('Check the box to enable the SEO options.', 'pharmacy'),
		        'id' => 'is-seo',
		        'std' => '1',
		        'type' => 'checkbox');

		    $seo[] = array(
		        'name' => __('SEO Keywords', 'pharmacy'),
		        'desc' => __('Paste your SEO Keywords. This will be added into the meta tag keywords in header.', 'pharmacy'),
		        'id' => 'seo-keywords',
		        'std' => '',
		        'type' => 'textarea');

		    $seo[] = array(
		        'name' => __('SEO Description', 'pharmacy'),
		        'desc' => __('Paste your SEO Description. This will be added into the meta tag description in header.', 'pharmacy'),
		        'id' => 'seo-description',
		        'std' => '',
		        'type' => 'textarea');

		    $seo[] = array(
		        'name' => __('Google Analytics Account ID', 'pharmacy'),
		        'desc' => __('Type your Google Analytics Account ID here. This will be added into the footer template of your theme.', 'pharmacy'),
		        'id' => 'google-analytics',
		        'std' => '',
		        'type' => 'text');
		   /**
		    *  Custom Code
		    */
		    $customize = array();
		    $customize[] = array(
		            'name' => __('Customization', 'pharmacy'),
		            'type' => 'heading');

		    $customize[] = array(
		        'name' => __('Live Tools Customizing Theme', 'pharmacy'),
		        'desc' => '<a href="'.admin_url( 'themes.php?page=wpo_livethemeedit').'" class="button">'.__('Live Customizing Theme', 'pharmacy').'</a>',
		        'id' => 'customize-theme',
		        'type' => 'select',
		        'std' => '',
		        'options' => $this->getCustomzimeCss()
		    );

		    $customize[] = array(
		        'name' => __('Before CSS </body>', 'pharmacy'),
		        'desc' => __('Before CSS </body> description.', 'pharmacy'),
		        'id' => 'snippet-close-body',
		        'std' => '',
		        'type' => 'textarea');

		    $customize[] = array(
		        'name' => __('Before JS </body>', 'pharmacy'),
		        'desc' => __('Before JS </body> description.', 'pharmacy'),
		        'id' => 'snippet-js-body',
		        'std' => '',
		        'type' => 'textarea');

		   /**
		    *  Megamenu
		    */
		    $megamenu[] = array(
		            'name' => __('Megamenu', 'pharmacy'),
		            'type' => 'heading');

		    $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
	        $option_menu = array(''=>'---Select Menu---');
	        foreach ($menus as $menu) {
	        	$option_menu[$menu->term_id]=$menu->name;
	        }

	        $megamenu[] = array(
		        'name' => __('menu', 'pharmacy'),
		        'desc' => __('Select a menu to configure Megamenu for the menu items in the selected menu.', 'pharmacy').'<a href="'.admin_url( 'themes.php?page=wpo_megamenu' ).'" class="button">'.__('Megamenu Editor','pharmacy').'</a>',
		        'id' => 'magemenu-menu',
		        'type' => 'select',
		        'std' =>'',
		        'options' => $option_menu
		    );

		    $megamenu[] = array(
		        'name' => __('Animation', 'pharmacy'),
		        'desc' => __('Select animation for Megamenu.','pharmacy'),
		        'id' => 'magemenu-animation',
		        'type' => 'select',
		        'std' =>'',
		        'options' => array(
		                        ''=>'None',
		                        'slide'   =>'Slide',
		                        'zoom' =>'Zoom',
		                        'elastic'=>'Elastic',
		                        'fading'=>'Fading'
		    ));

		    $megamenu[] = array(
		        'name' => __('Duration', 'pharmacy'),
		        'desc' => __('Animation effect duration for dropdown of Megamenu (in miliseconds)', 'pharmacy'),
		        'id' => 'megamenu-duration',
		        'std' => '400',
		        'type' => 'text');

		    $megamenu[] = array(
		        'name' => __('Animation', 'pharmacy'),
		        'desc' => __('Sidebar transition effect for Off-canvas menu','pharmacy'),
		        'id' => 'magemenu-offcanvas-effect',
		        'type' => 'select',
		        'std' =>'off-canvas-effect-1',
		        'options' => array(
		                        'off-canvas-effect-1'=>'Slide in on top',
		                        'off-canvas-effect-2'=>'Reveal',
		                        'off-canvas-effect-3'=>'Push',
		                        'off-canvas-effect-4'=>'Slide along',
		                        'off-canvas-effect-5'=>'Reverse slide out',
		                        'off-canvas-effect-6'=>'Rotate pusher',
		                        'off-canvas-effect-7'=>'3D rotate in',
		                        'off-canvas-effect-8'=>'3D rotate out',
		                        'off-canvas-effect-9'=>'Scale down pusher',
		                        'off-canvas-effect-10'=>'Scale up',
		                        'off-canvas-effect-11'=>'Scale & Rotate pusher',
		                        'off-canvas-effect-12'=>'Open door',
		                        'off-canvas-effect-13'=>'Fall down',
		                        'off-canvas-effect-14'=>'Delayed 3D rotate'
		    ));

			$megamenu[] = array(
		        'name' => __('Menu Vertical', 'pharmacy'),
		        'desc' => __('Select a menu to configure Megamenu Vertical for the menu items in the selected menu.', 'pharmacy').'<a href="'.admin_url( 'themes.php?page=wpo_megamenu_vertical' ).'" class="button">'.__('Megamenu Editor','pharmacy').'</a>',
		        'id' => 'magemenu-menu-vertical',
		        'type' => 'select',
		        'std' =>'',
		        'options' => $option_menu
		    );

		   /**
		    *  Woocommerce
		    */
		   if(class_exists('WooCommerce')){
		   		$woocommerce = array();

		   		$woocommerce[] = array(
		            'name' => __('Woocommerce', 'pharmacy'),
		            'type' => 'heading');

		   		$woocommerce[] = array(
			    	'name' => __('Number of Product per page', 'pharmacy'),
			        'desc' => 'To Change number of products displayed per page',
			        'id' => 'woo-number-page',
			        'type' => 'text',
			        'std' =>'12'
			    );

		   		$woocommerce[] = array(
			        'name' => __('Show number Products', 'pharmacy'),
			        'desc' => 'To change the number of related products',
			        'id' => 'woo-number-product',
			        'type' => 'text',
			        'std' =>'4'
			    );

		   		$woocommerce[] = array(
			        'name' => __('Number of Product per row', 'pharmacy'),
			        'desc' => 'To change the number related products,archive products per row',
			        'id' => 'woo-number-columns',
			        'type' => 'select',
			        'std' =>'4',
			        'options' => array(
			                        '2'=>'2',
			                        '3'=>'3',
			                        '4'=>'4',
			                        '6'=>'6'
			    ));

			    $woocommerce[] = array(
			        'name' => __('Enable Quick View', 'pharmacy'),
			        'desc' => __('Check the box to enable Quick View button.', 'pharmacy'),
			        'id' => 'is-quickview',
			        'std' => '1',
			        'type' => 'checkbox');

			    $woocommerce[] = array(
			        'name' => __('Enable Effect Image', 'pharmacy'),
			        'desc' => __('Check the box to enable swap effect image product.', 'pharmacy'),
			        'id' => 'is-swap-effect',
			        'std' => '1',
			        'type' => 'checkbox');

			    $woocommerce[] = array(
			        'name'  => __('Layout Archive Product', 'pharmacy'),
			        'desc'  => __("Display your sidebar like image on Archive pages.", 'pharmacy'),
			        'id'    => "woocommerce-archive-layout",
			        'std'   => "0-1-1",
			        'type'  => "images",
			        'options' => array(
			            '0-1-0'     => 	$imagepath . '1col.png',
			            '1-1-0'  	=> 	$imagepath . '2cl.png',
			            '0-1-1'  	=> 	$imagepath . '2cr.png',
			            '1-1-1'    	=> 	$imagepath . '3c.png'
			        )
			    );
			    $woocommerce[] = array(
			        'name' => __('Right Sidebar', 'pharmacy'),
			        'desc' => '',
			        'id' => 'woocommerce-archive-right-sidebar',
			        'type' => 'select',
			        'options' => $this->getSidebar()
			    );

			    $woocommerce[] = array(
			        'name' => __('Left Sidebar', 'pharmacy'),
			        'desc' => '',
			        'id' => 'woocommerce-archive-left-sidebar',
			        'type' => 'select',
			        'options' => $this->getSidebar()
			    );

			    $woocommerce[] = array(
			        'name'  => __('Layout Single Product', 'pharmacy'),
			        'desc'  => __("Display your sidebar like image on Single page.", 'pharmacy'),
			        'id'    => "woocommerce-single-layout",
			        'std'   => "0-1-1",
			        'type'  => "images",
			        'options' => array(
			            '0-1-0'    => $imagepath . '1col.png',
			            '1-1-0'  => $imagepath . '2cl.png',
			            '0-1-1'  => $imagepath . '2cr.png',
			            '1-1-1'    => $imagepath . '3c.png'
			        )
			    );
			    $woocommerce[] = array(
			        'name' => __('Right Sidebar', 'pharmacy'),
			        'desc' => '',
			        'id' => 'woocommerce-single-right-sidebar',
			        'type' => 'select',
			        'options' => $this->getSidebar()
			    );

			    $woocommerce[] = array(
			        'name' => __('Left Sidebar', 'pharmacy'),
			        'desc' => '',
			        'id' => 'woocommerce-single-left-sidebar',
			        'type' => 'select',
			        'options' => $this->getSidebar()
			    );
		   }
		   // /**
		   //  *  Data Sample
		   //  */
		   //  $sample = array();
		   //  $sample[] = array(
		   //          'name' => __('Data Sample', 'pharmacy'),
		   //          'type' => 'heading');


		    // merge all list of group options here and combine options from subthemes
		    $goptions = array( 'general',  'blogs' , 'seo', 'social', 'customize','megamenu' );
		    if(class_exists('WooCommerce')){
		    	$goptions[]='woocommerce';
		    }
		    $options = array();
		    foreach( $goptions as $gopt  ){
		   		$options = array_merge_recursive( $options, $$gopt );
		   		if( isset($suboptions[$gopt]) ){
		   			$options = array_merge_recursive( $options, $suboptions[$gopt] );
		   		}
		    }
		    return $options;
		}

		private function getSidebar(){
			// Sidebar
		    global $wp_registered_sidebars;
		    $sidebar = array();
		    foreach($wp_registered_sidebars as $key=>$value){
		        $sidebar[$value['id']] = $value['name'];
		    }
		    return $sidebar;
		}

		private function getCustomzimeCss(){
			 // Get Option Livetheme Customize
		    $customize = array(''=>'Select A Custom Theme');
		    $directories = glob( WPO_FRAMEWORK_CUSTOMZIME_STYLE.'*.css');
		    foreach( $directories as $dir ){
		        $file = str_replace( ".css","", basename( $dir ));
		        $customize[$file] = $file;
		    }
		    return $customize;
		}
	}
?>