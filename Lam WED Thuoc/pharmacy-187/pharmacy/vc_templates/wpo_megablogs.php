<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
/*extract(shortcode_atts(array(
    'title' => '',
    'grid_columns_count' => 2,
    'grid_teasers_count' => 8,
    'grid_layout' => 'title,thumbnail,text', // title_thumbnail_text, thumbnail_title_text, thumbnail_text, thumbnail_title, thumbnail, title_text
    'grid_link_target' => '_self',
    'filter' => '', //grid,
    'grid_thumb_size' => 'thumbnail',
    'grid_layout_mode' => 'fitRows',
    'el_class' => '',
    'teaser_width' => '12',
    'orderby' => NULL,
    'order' => 'DESC',
    'loop' => '',
    'layout'    => 'blog',
    'grid_columns'  => 4,
), $atts));*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;

$my_query = new WP_Query($args);
$columgrid = floor(12/$grid_columns);
 if(  empty($layout) ){
    $layout = 'blog';
 }


 $countposts = $args ['posts_per_page'];


?>

<section class="widget blog-type recent-blog<?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <h3 class="widget-title visual-title">
        <span><?php echo $title; ?></span>
    </h3>
    <div class="widget-content">
        <div class="clearfix">
            <?php $i=0; while ( $my_query->have_posts() ): $my_query->the_post(); ?>
            <div class="col-sm-<?php echo $columgrid; ?> col-md-<?php echo $columgrid; ?> col-lg-<?php echo $columgrid; ?>">
                <?php get_template_part( 'templates/blog/'.$layout ); ?>
            </div>
            <?php if( ++$i== $countposts){ break; } ?>
            <?php endwhile; ?>     
            <?php wp_reset_postdata(); ?>


        </div>
    </div>
</section>