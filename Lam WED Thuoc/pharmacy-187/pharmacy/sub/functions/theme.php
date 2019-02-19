<?php

function pharmacy_fnc_import_remote_demos() { 
  return array(
    'pharmacy' => array( 'name' => 'pharmacy',  'source'=> 'http://wpsampledemo.com/pharmacy/pharmacy.zip' ),
  );
}

add_filter( 'pbrthemer_import_remote_demos', 'pharmacy_fnc_import_remote_demos' );



function pharmacy_fnc_import_theme() {
  return 'pharmacy';
}
add_filter( 'pbrthemer_import_theme', 'pharmacy_fnc_import_theme' );

function pharmacy_fnc_import_demos() {
  $folderes = glob( get_template_directory().'/inc/import/*', GLOB_ONLYDIR ); 

  $output = array(); 

  foreach( $folderes as $folder ){
    $output[basename( $folder )] = basename( $folder );
  }
  
  return $output;
}
add_filter( 'pbrthemer_import_demos', 'pharmacy_fnc_import_demos' );

function pharmacy_fnc_import_types() {
  return array(
      'all' => 'All',
      'content' => 'Content',
      'widgets' => 'Widgets',
      'page_options' => 'Theme + Page Options',
      'menus' => 'Menus',
      'rev_slider' => 'Revolution Slider',
      'vc_templates' => 'VC Templates'
    );
}
add_filter( 'pbrthemer_import_types', 'pharmacy_fnc_import_types' );

function wpo_layout(){

}
/**
 *
 */
function wpo_get_categories( $category ) {
	$categories = get_categories( array( 'taxonomy' => $category ));

	$output = array( '' => __( 'All', 'pharmacy' ) );
	foreach( $categories as $cat ){
		if( is_object($cat) ) $output[$cat->slug] = $cat->name;
	}
	return $output;
}

///// Define  list of function processing theme logics.
function wpo_vc_shortcode_render( $atts, $content='' , $tag='' ){
	$output = '';
	if(is_file( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER. $tag.'.php')){
		ob_start();
		require( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER.$tag.'.php' );
		$output .= ob_get_clean();
	}
	return $output;
}
/// //
if(of_get_option('is-effect-scroll','1')=='1'){
    add_filter('body_class', 'wpo_animate_scroll');
    function wpo_animate_scroll($classes){
    $classes[] = 'wpo-animate-scroll';
        return $classes;
    }
}
?>
<?php function social_product(){ ?>
    <div class="addthis">
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
            <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-533e342d186e8c37"></script>
        <!-- AddThis Button END -->
    </div>
<?php }
add_action('woocommerce_single_product_summary','social_product',29);
if(!function_exists('pharmacy_pagination')){
    function pharmacy_pagination($per_page,$total, $max_num_pages=''){
        ?>
        <div class="post-pagination clearfix">
            <?php wpo_pagination($prev = __('Previous','pharmacy'), $next = __('Next','pharmacy'), $pages = $max_num_pages,array('class'=>' ')); ?>
            <?php global  $wp_query; ?>
            <div class="woocommerce-result-count result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                if ( 1 == $total ) {
                    _e( 'Showing the single result', 'pharmacy' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( __( 'Showing all %d results', 'pharmacy' ), $total );
                } else {
                    printf( _x( 'Showing %1$d–%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'pharmacy' ), $first, $last, $total );
                }
                ?>
            </div>
        </div>
    <?php
    }
}



if(!function_exists('pharmacy_searchform')){
    function pharmacy_searchform(){
        if(class_exists('WooCommerce')){
            global $wpdb;
            $dropdown_args = array(
                'show_counts'        => false,
                'hierarchical'       => true,
                'show_uncategorized' => 0
            );
            ?>
            <form role="search" method="get" class="searchform-categoris" action="<?php echo home_url('/'); ?>">
                <div class="wpo-search">
                    <div class="wpo-search-inner">
                        <div class="select-categories">
                            <?php wc_product_dropdown_categories( $dropdown_args ); ?>
                        </div>
                        <div class="input-group">
                            <input name="s" id="s" maxlength="40"
                                   class="form-control input-search" type="text" size="20"
                                   placeholder="<?php echo __('Enter search...', 'pharmacy' ); ?>">
                            <span class="input-group-addon">
                                <input type="submit" id="searchsubmit" class="fa" value="&#xf002;"/>
                                <input type="hidden" name="post_type" value="product"/>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        <?php
        }else{
            get_search_form();
        }
    }
}

function get_header_layout(){
    global $wp_query;
    $layout = get_post_meta($wp_query->get_queried_object_id(),'wpo_template',true);
    $layout = wp_parse_args( $layout, array(
        'header_skin'   => '1'
    ) );
    switch ($layout['header_skin']) {
        case '1':
            return of_get_option('header','');
        case '2':
            return '';
        case '3':
            return 'style2';
        case '4':
            return 'style3';
    }
}

?>