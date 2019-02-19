<?php 

	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
    $option_menu = array('---Select Menu---'=>'');
    foreach ($menus as $menu) {
    	$option_menu[$menu->name]=$menu->term_id;
    }
	vc_map( array(
	    "name" => __("WPO Vertical Menu",'pharmacy'),
	    "base" => "wpo_verticalmenu",
	    "class" => "",
	    "category" => __('WPO Elements', 'pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'pharmacy'),
				"param_name" => "title",
				"value" => 'Vertical Menu'
			),
	    	array(
				"type" => "dropdown",
				"heading" => __("Menu", 'pharmacy'),
				"param_name" => "menu",
				"value" => $option_menu,
				"admin_label" => true,
				"description" => __("Select menu.", 'pharmacy')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Position", 'pharmacy'),
				"param_name" => "postion",
				"value" => array(
						'left'=>'left',
						'right'=>'right'
					),
				"admin_label" => true,
				"description" => __("Postion Menu Vertical.", 'pharmacy')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_verticalmenu', ('wpo_vc_shortcode_render') );
	/**********************************************************************************************************************
	 * Testimonials
	 **********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Testimonials",'pharmacy'),
	    "base" => "wpo_testimonials",
	    "icon" => "icon-wpb-ui-separator-label",
	    'description'=> __('Play Testimonials In Carousel', 'pharmacy'), 
	    "class" => "",
	    "category" => __('Opal Widgets', 'pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'pharmacy'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => __("Skin", 'pharmacy'),
				"param_name" => "skin",
				"value" => array(
					__('Skin 1', 'pharmacy') =>'skin-1',
					__('Skin 2', 'pharmacy') =>'skin-2'),
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'pharmacy')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_testimonials', ('wpo_vc_shortcode_render') );
	
	/********************************************************************************************************************* 
	 *  Brands Carousel 
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Brands Carousel",'pharmacy'),
	    "base" => "wpo_brands",
	    "icon" => "icon-wpb-ui-separator-label",
	    'description'=>'Show Brand Logos, Manufacture Logos', 
	    "class" => "",
	    "category" => __('Opal Widgets', 'pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'pharmacy'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of brands to show", 'pharmacy'),
				"param_name" => "number",
				"value" => '6'
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon", 'pharmacy'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render') );



	/**********************************************************************************
	 * Mega Blogs
	 **********************************************************************************/
	vc_map( array(
		'name' => __( 'WPO Mega Blogs', 'pharmacy' ),
		'base' => 'wpo_megablogs',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', 'pharmacy'),
		'description' => __( 'Create Post having blog styles', 'pharmacy' ),
		"admin_enqueue_css"=> WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/pagebuilder.css',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'pharmacy' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'pharmacy' ),
				"admin_label" => true
			),
			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'pharmacy' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 10 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'pharmacy' )
			),
			 
			array(
				"type" => "dropdown",
				"heading" => __("Layout", 'pharmacy' ),
				"param_name" => "layout",
				"value" => array( __('Default Style', 'pharmacy' ) => 'blog'  ,  __('Special Style 1', 'pharmacy' ) => 'style1' ,  __('Special Style 2', 'pharmacy' ) => 'style2' ),
				"std" => 3
			),

			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'pharmacy'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),


			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'pharmacy' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'pharmacy' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'pharmacy' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pharmacy' )
			)
		)
	) );
?>