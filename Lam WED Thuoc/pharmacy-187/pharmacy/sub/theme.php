<?php
class WPO_SubTheme extends WPO_Framework {

	public function __construct(){
		parent::__construct();
		// Add default Sidebar
		$this->setSidebarDefault();

		// Require Plugin
		$this->initRequirePlugin();

 		/* This theme uses post thumbnails */
		$this->addThemeSupport( 'post-thumbnails' );
		// Add default posts and comments RSS feed links to head*/
		$this->addThemeSupport( 'automatic-feed-links' );

		$this->addImagesSize( 'blog-thumbnails' , 365,235,true);
		$this->addImagesSize( 'brand-logo',160, 80, true);
		$this->addImagesSize( 'category-image',873, 220, true);
		$this->addImagesSize( 'image-blog', 753, 310, true );

		// Register Post type support


		/**
		* Register  Metabox
		*/
		$this->initMetaBox();

		/**
		* Register  list of widgets supported inside framework
		*/
        //$this->addWidgetsSuport( array( 'twitter','sliders','recent_post','facebook_like','tabs','flickr' ) );
		$this->addWidgetsSuport( array( 'twitter','posts','featured_post','menu_vertical','facebook_like','top_rate','sliders','recent_comment','recent_post','tabs','flickr' ) );
        add_filter('WPO_Enable_Vertical_Megamenu',array($this,'enable_vertical_menu'));
        add_action( 'wp_enqueue_scripts' , array($this,'fix_VC_frontend_editor'),999 );
	}
    public function fix_VC_frontend_editor(){
        wp_enqueue_script( 'vc_inline_iframe1_js', get_template_directory_uri() . '/js/vc_page_editable_custom.js' , array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-draggable','vc_inline_iframe_js' ), WPB_VC_VERSION, false );
    }
    public function enable_vertical_menu(){
        return true;
    }

	// page Configuration
	public function getPageConfig(){
		global $wp_query;
		$pageconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_pageconfig',true);
		$defaults = array(  'page_layout' => '0-1-0',
                            'right_sidebar' => '' ,
                            'left_sidebar' => '',
                            'showtitle'=>true,
                            'advanced'=>'',
                            'breadcrumb'=>true
                            );
		$pageconfig = wp_parse_args((array) $pageconfig, $defaults);
		$config = array();
		if($pageconfig==''){
			$lt = '0-1-0';
		}else{
			$lt = (!empty($pageconfig['page_layout']) || $pageconfig['page_layout']!= '')?$pageconfig['page_layout']:'0-1-0';
			$config['breadcrumb']=$pageconfig['breadcrumb'];
			$config['right-sidebar']['widget']=$pageconfig['right_sidebar'];
			$config['left-sidebar']['widget']=$pageconfig['left_sidebar'];
			$config['showtitle']= $pageconfig['showtitle'];
			$config = $this->configLayout($lt,$config);
			$config['advanced'] = get_post_meta($wp_query->get_queried_object_id(), 'wpo_template', TRUE);
		}
		$maincontent = array();
		//
		if(is_front_page()) {
			$config['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$config['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		return $config;
	}

	public function wpo_change_breadcrumb_delimiter( $defaults ) {
		// Change the breadcrumb delimeter from '/' to '>'
		$defaults['delimiter'] = ' <span class="fa fa-angle-right"></span> ';
		return $defaults;
	}



	/**
	 * Init Meta Box fields
	 */
	private function initMetaBox(){
		$path = WPO_THEME_DIR . '/sub/customfield/';
		if(function_exists('of_get_option')){
			if(of_get_option('is-seo',true)){
				new WPO_MetaBox(array(
				    'id' => 'wpo_seo',
				    'title' => __('SEO Fields', 'pharmacy'),
				    'types' => array('page','portfolio','post','video'),
				    'priority' => 'high',
				    'template' => $path . 'seo.php',
				));
			}
		}

		new WPO_MetaBox(array(
		    'id' => 'wpo_template',
		    'title' => __('Advanced Configuration', 'pharmacy'),
		    'types' => array('page'),
		    'priority' => 'high',
		    'template' => $path . 'page-advanced.php'
		));

		new WPO_MetaBox(array(
		    'id' => 'wpo_brand',
		    'title' => __('Configuration', 'pharmacy'),
		    'types' => array('brands'),
		    'priority' => 'high',
		    'template' => $path . 'brands.php'
		));

		new WPO_MetaBox(array(
		    'id' => 'wpo_pageconfig',
		    'title' => __('Page Configuration', 'pharmacy'),
		    'types' => array('page'),
		    'priority' => 'high',
		    'template' => $path . 'page.php',
		));

		new WPO_MetaBox(array(
		    'id' => 'wpo_post',
		    'title' => __('Embed Options', 'pharmacy'),
		    'types' => array('post','video'),
		    'priority' => 'high',
		    'template' => $path . 'post.php',
		));
	}


	private function initRequirePlugin(){
		// Add default Required Plugin
		$this->addRequiredPlugin(array(
			'name'                     => 'Options Framework', // The plugin name
		    'slug'                     => 'options-framework', // The plugin slug (typically the folder name)
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WooCommerce', // The plugin name
		    'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Contact Form 7', // The plugin name
		    'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WPBakery Visual Composer', // The plugin name
		    'slug'                     => 'js_composer', // The plugin slug (typically the folder name)
		    'required'                 => true,
		    'source'                   => 'http://www.wpopal.com/thememods/js_composer.zip', // The plugin source
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Revolution Slider', // The plugin name
            'slug'                     => 'revslider', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
            'source'                   => 'http://www.wpopal.com/thememods/revslider.zip', // The plugin source
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'YITH WooCommerce Wishlist', // The plugin name
            'slug'                     => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
            'required'                 => true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'YITH Woocommerce Compare', // The plugin name
            'slug'                     => 'yith-woocommerce-compare', // The plugin slug (typically the folder name)
            'required'                 => true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'YITH WooCommerce Zoom Magnifier', // The plugin name
		    'slug'                     => 'yith-woocommerce-zoom-magnifier', // The plugin slug (typically the folder name)
		    'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'MailChimp', // The plugin name
		    'slug'                     => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
		    'required'                 =>  true
		));
	}


	//override
	public function configLayout($layout,$config=array()){
		switch ($layout) {
			// Two Sidebar
			case '1-1-1':
				$config['left-sidebar']['show'] 	= true;
				$config['left-sidebar']['class'] 	='col-md-3  col-md-pull-6 col-xs-12';
				$config['right-sidebar']['class']	='col-md-3  col-xs-12 ';
				$config['right-sidebar']['show'] 	= true;
				$config['main']['class'] 			='col-xs-12 col-md-6 col-md-push-3';
				break;
			//One Sidebar Right
			case '0-1-1':
				$config['left-sidebar']['show'] 	= false;
				$config['right-sidebar']['show'] 	= true;
				$config['main']['class']  			='col-xs-12 col-md-9  no-sidebar-left';
				$config['right-sidebar']['class'] 	='col-xs-12 col-md-3 ';
				break;
			// One Sidebar Left
			case '1-1-0':
				$config['left-sidebar']['show'] 	= true;
				$config['right-sidebar']['show'] 	= false;
				$config['left-sidebar']['class'] 	='col-xs-12  col-md-3 col-md-pull-9';
				$config['main']['class'] 			='col-xs-12  col-md-9 col-md-push-3 no-sidebar-right';
				break;

			case 'm-1-1':
				$config['left-sidebar']['show'] 	= true;
				$config['left-sidebar']['class'] 	='col-md-3 sidebar-main';
				$config['right-sidebar']['class']	='col-md-3';
				$config['right-sidebar']['show'] 	= true;
				$config['main']['class'] 			='col-xs-12 col-md-6';
				break;

			case '1-1-m':
				$config['left-sidebar']['show'] 	= true;
				$config['right-sidebar']['show'] 	= true;
				$config['left-sidebar']['class'] 	='col-md-3 col-md-pull-6';
				$config['right-sidebar']['class']	='col-md-3 col-md-pull-6';
				$config['main']['class'] 			='col-xs-12 col-md-6 col-md-push-6';
				break;
			// Fullwidth
			default:
				$config['left-sidebar']['show'] 	= false;
				$config['right-sidebar']['show'] 	= false;
				$config['main']['class'] 			='col-xs-12 no-sidebar';
				break;
		}
		return $config;
	}

   /**
	*
	*/
	private function setSidebarDefault(){
		$this->addSidebar('slideshow',
			array(
				'name'          => __( 'Slideshow', 'pharmacy'),
				'id'            => 'slideshow',
				'description'   => __( 'Appears in the slideshow section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('sidebar-left',
			array(
				'name'          => __( 'Left Sidebar' , 'pharmacy'),
				'id'            => 'sidebar-left',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title title-default"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('sidebar-right',
			array(
				'name'          => __( 'Right Sidebar' , 'pharmacy'),
				'id'            => 'sidebar-right',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title title-default"><span>',
				'after_title'   => '</span></h3>',
			));


			$this->addSidebar('blog-sidebar-left',
			array(
				'name'          => __( 'Blog Left Sidebar' , 'pharmacy'),
				'id'            => 'blog-sidebar-left',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title title-default"><span>',
				'after_title'   => '</span></h3>',
			));

			$this->addSidebar('blog-sidebar-right',
			array(
				'name'          => __( 'Blog Right Sidebar' , 'pharmacy'),
				'id'            => 'blog-sidebar-right',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title title-default"><span>',
				'after_title'   => '</span></h3>',
			));

		$this->addSidebar('footer-1',
			array(
				'name'          => __( 'Footer 1' , 'pharmacy'),
				'id'            => 'footer-1',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-2',
			array(
				'name'          => __( 'Footer 2', 'pharmacy'),
				'id'            => 'footer-2',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-3',
			array(
				'name'          => __( 'Footer 3' , 'pharmacy'),
				'id'            => 'footer-3',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-4',
			array(
				'name'          => __( 'Footer 4' , 'pharmacy'),
				'id'            => 'footer-4',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-5',
			array(
				'name'          => __( 'Footer 5' , 'pharmacy'),
				'id'            => 'footer-5',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));

		$this->addSidebar('footer-6',
			array(
				'name'          => __( 'Footer 6' , 'pharmacy'),
				'id'            => 'footer-6',
				'description'   => __( 'Appears in the footer section of the site.', 'pharmacy'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));

	}
}


