<?php

    vc_map( array(
        "name" => __("WPO Product Deals",'pharmacy'),
        "base" => "wpo_product_deals",
        "class" => "",
        "category" => __('WPO Elements','pharmacy'),
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __('Title','pharmacy'),
                "param_name" => "title",
                "admin_label" => true
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", 'pharmacy'),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pharmacy')
            )
        )
    ));
    add_shortcode( 'wpo_product_deals', ('wpo_vc_shortcode_render') );

	/**
	 * wpo_productcategory
	 */
	global $wpdb;
	$sql = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat'";
	$results = $wpdb->get_results($sql);
	$value = array();
	foreach ($results as $vl) {
		$value[$vl->name] = $vl->slug;
	}

	$product_layout = array(
		__('Grid','pharmacy') 		=>'grid',
		__('List','pharmacy')		=>'list',
		__('Carousel','pharmacy')	=>'carousel'
	);
	$product_type = array(
		__('Best Selling','pharmacy') 		=>'best_selling',
		__('Featured Products','pharmacy') 	=>'featured_product',
		__('Top Rate','pharmacy') 			=>'top_rate',
		__('Recent Products','pharmacy') 	=>'recent_product',
		__('On Sale','pharmacy') 			=>'on_sale',
		__('Recent Review','pharmacy') 		=> 'recent_review' 
	);
	$product_columns = array(6,4, 3, 2, 1);
	$show_tab = array(
	                array('recent', __('Latest Products', 'pharmacy')),
	                array( 'featured_product', __('Featured Products', 'pharmacy' )),
	                array('best_selling', __('BestSeller Products', 'pharmacy' )),
	                array('top_rate', __('TopRated Products', 'pharmacy' )),
	                array('on_sale', __('Special Products', 'pharmacy' ))
	            );

	vc_map( array(
	    "name" => __("WPO Product Category",'pharmacy'),
	    "base" => "wpo_productcategory",
	    "class" => "",
	    "category" => __('Opal Widgets','pharmacy'),
	    "params" => array(
	    	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Category','pharmacy'),
				"param_name" => "category",
				"value" =>$value,
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",'pharmacy'),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'pharmacy'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'pharmacy'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'pharmacy')
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",'pharmacy'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_productcategory', ('wpo_vc_shortcode_render') );

	

	/**
	 * wpo_products
	 */
	vc_map( array(
	    "name" => __("WPO Products",'pharmacy'),
	    "base" => "wpo_products",
	    "class" => "",
	    "category" => __('Opal Widgets','pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'pharmacy'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => ''
			),
	    	array(
				"type" => "dropdown",
				"heading" => __("Type",'pharmacy'),
				"param_name" => "type",
				"value" => $product_type,
				"admin_label" => true,
				"description" => __("Select columns count.",'pharmacy')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",'pharmacy'),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'pharmacy'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'pharmacy')
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'pharmacy'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_products', ('wpo_vc_shortcode_render')  );

	/**
	 * wpo_all_products
	 */
	vc_map( array(
	    "name" => __("WPO Products Tabs",'pharmacy'),
	    "base" => "wpo_all_products",
	    "class" => "",
	    "category" => __('Opal Widgets','pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'pharmacy'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => ''
			),
			array(
	            "type" => "sorted_list",
	            "heading" => __("Show Tab",'pharmacy'),
	            "param_name" => "show_tab",
	            "description" => __("Control teasers look. Enable blocks and place them in desired order.", 'pharmacy'),
	            "value" => "recent,featured_product,best_selling",
	            "options" => $show_tab
	        ),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",'pharmacy'),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",'pharmacy'),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",'pharmacy')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'pharmacy')
			)
	   	)
	));

	/**
	 * wpo_brands
	 */
	vc_map( array(
	    "name" => __("WPO Brands",'pharmacy'),
	    "base" => "wpo_brands",
	    "class" => "",
	    "category" => __('Opal Widgets','pharmacy'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",'pharmacy'),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of brands to show",'pharmacy'),
				"param_name" => "number",
				"value" => '6'
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",'pharmacy'),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render')  );


	/*********************************************************************************************************************
	 *  Reassuarence
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Reassuarence",'pharmacy'),
	    "base" => "wpo_reassuarence",
	    "class" => "",
	     "icon" => "icon-wpb-ui-separator-label",
	    "description"=> __('Counting number with your term', 'pharmacy'),
	    "category" => __('Opal Widgets','pharmacy'),
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
				"heading" => __("FontAwsome Icon", 'pharmacy'),
				"param_name" => "icon",
				"value" => 'fa-desktop',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', 'pharmacy' )
								. '<a href="http://fortawesome.github.io/Font-Awesome/" target="_blank"> '
								. __( 'here to see the list', 'pharmacy' ) . '</a>'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", 'pharmacy'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', 'pharmacy' )
			),

		 	array(
				"type" => "textarea",
				"heading" => __("Short Information", 'pharmacy'),
				"param_name" => "description",
				"value" => '',
				'description'	=> __('Allow  put html tags','pharmacy')
			),


		 	array(
				"type" => "textarea_html",
				"heading" => __("Detail Information", 'pharmacy'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags','pharmacy')
			),


			array(
				"type" => "dropdown",
				"heading" => __("Style", 'pharmacy'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('Circle', 'pharmacy'), 'vertical' => __('Vertical', 'pharmacy') , 'horizontal' => __('Horizontal', 'pharmacy') ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'pharmacy'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pharmacy')
			)
	   	)
	));
	add_shortcode( 'wpo_reassuarence', ('wpo_vc_shortcode_render') );


?>