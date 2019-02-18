<?php
 /**
  * $Desc
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
if(!function_exists('wpo_create_type_portfolio')){
    function wpo_create_type_portfolio(){
      $labels = array(
          'name' => __( 'Portfolios', 'pharmacy' ),
          'singular_name' => __( 'Portfolio', 'pharmacy' ),
          'add_new' => __( 'Add New Portfolio', 'pharmacy' ),
          'add_new_item' => __( 'Add New Portfolio', 'pharmacy' ),
          'edit_item' => __( 'Edit Portfolio', 'pharmacy' ),
          'new_item' => __( 'New Portfolio', 'pharmacy' ),
          'view_item' => __( 'View Portfolio', 'pharmacy' ),
          'search_items' => __( 'Search Portfolios', 'pharmacy' ),
          'not_found' => __( 'No Portfolios found', 'pharmacy' ),
          'not_found_in_trash' => __( 'No Portfolios found in Trash', 'pharmacy' ),
          'parent_item_colon' => __( 'Parent Portfolio:', 'pharmacy' ),
          'menu_name' => __( 'Opal Portfolios', 'pharmacy' ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => true,
          'description' => 'List Portfolio',
          'supports' => array( 'title', 'editor', 'thumbnail' ),
          'taxonomies' => array( 'Portfolio_category','skills' ),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 5,
          'menu_icon' => WPO_FRAMEWORK_ADMIN_IMAGE_URI.'icon/admin_ico_portfolio.png',
          'show_in_nav_menus' => false,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );
      register_post_type( 'portfolio', $args );

      //Add Port folio Skill
      // Add new taxonomy, make it hierarchical like categories
      //first do the translations part for GUI
      $labels = array(
        'name' => __( 'Categories', 'pharmacy' ),
        'singular_name' => __( 'Category', 'pharmacy' ),
        'search_items' =>  __( 'Search Category','pharmacy' ),
        'all_items' => __( 'All Categories','pharmacy' ),
        'parent_item' => __( 'Parent Category','pharmacy' ),
        'parent_item_colon' => __( 'Parent Category:','pharmacy' ),
        'edit_item' => __( 'Edit Category','pharmacy' ),
        'update_item' => __( 'Update Category','pharmacy' ),
        'add_new_item' => __( 'Add New Category','pharmacy' ),
        'new_item_name' => __( 'New Category Name','pharmacy' ),
        'menu_name' => __( 'Categories','pharmacy' ),
      );
      // Now register the taxonomy
      register_taxonomy('Categories',array('portfolio'),
          array(
              'hierarchical' => true,
              'labels' => $labels,
              'show_ui' => true,
              'show_admin_column' => true,
              'query_var' => true,
              'show_in_nav_menus'=>false,
              'rewrite' => array( 'slug' => 'skills'
          ),
      ));
  }
  add_action( 'init','wpo_create_type_portfolio' );
}