<?php

if(!function_exists('wpo_create_type_sliders')){
    function wpo_create_type_sliders(){
        $labels = array(
            'name' => __( 'Sliders', 'pharmacy' ),
            'singular_name' => __( 'Slider', 'pharmacy'),
            'add_new' => __( 'Add New Slider', 'pharmacy' ),
            'add_new_item' => __( 'Add New Slider', 'pharmacy' ),
            'edit_item' => __( 'Edit Slider', 'pharmacy' ),
            'new_item' => __( 'New Slider', 'pharmacy' ),
            'view_item' => __( 'View Slider', 'pharmacy' ),
            'search_items' => __( 'Search Slider', 'pharmacy' ),
            'not_found' => __( 'No Slider found', 'pharmacy' ),
            'not_found_in_trash' => __( 'No Slider found in Trash', 'pharmacy' ),
            'parent_item_colon' => __( 'Parent Slider:', 'pharmacy' ),
            'menu_name' => __( 'Opal Sliders', 'pharmacy' )
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'List Slider',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array('slider_group' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
        register_post_type( 'sliders', $args );


        $labels = array(
            'name' => __( 'Slider groups', 'pharmacy' ),
            'singular_name' => __( 'Slider group', 'pharmacy' ),
            'search_items' =>  __( 'Search Slider groups','pharmacy' ),
            'all_items' => __( 'All Slider groups','pharmacy' ),
            'parent_item' => __( 'Parent Slider group','pharmacy' ),
            'parent_item_colon' => __( 'Parent Slider group:','pharmacy' ),
            'edit_item' => __( 'Edit Slider group','pharmacy' ),
            'update_item' => __( 'Update Slider group','pharmacy' ),
            'add_new_item' => __( 'Add New Slider group','pharmacy' ),
            'new_item_name' => __( 'New Slider group','pharmacy' ),
            'menu_name' => __( 'Slider groups','pharmacy' ),
        );

        register_taxonomy('slider_group',array('sliders'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'slider_group' ),
            'show_in_nav_menus'=>false
        ));
    }
    add_action( 'init','wpo_create_type_sliders' );
}