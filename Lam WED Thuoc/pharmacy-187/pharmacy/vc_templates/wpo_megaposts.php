<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
extract(shortcode_atts(array(
    'title' => '',
    'grid_thumb_size' => 'thumbnail',
    'el_class' => '',
    'grid_columns' => 3,
    'layout' => 'list-1',
    'orderby' => NULL,
    'order' => 'DESC',
    'loop' => ''
), $atts));
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
 // d( $args ,1 );die;

$layout = 'categories-posts';

switch ($grid_columns) {
    case '4':
        $class_column='col-md-3 col-sm-3';
        break;
    case '3':
        $class_column='col-md-4 col-sm-4';
        break;
    case '2':
        $class_column='col-md-6 col-sm-6';
        break;
    default:
        $class_column='col-md-12 col-sm-12';
        break;
}

?>

<section class="widget section-blog <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <h3 class="widget-title visual-title">
        <span><?php echo $title; ?></span>
    </h3>
    <div class="widget-content">

        <?php
            if( $layout == 'categories-posts' && !empty($args['cat']) ) {

            $categories  = explode( ",", $args['cat'] );

            $ccount = count($categories);
            $ccol = floor( 12/$ccount );
        ?>
        <div class="row">
        <?php
            foreach( $categories as $catid ) {
                $cargs = $args;
                $cargs['cat'] = $catid;
                $loop = new WP_Query($cargs);
        ?>

            <?php  if($loop->have_posts()){  ?>
             <div class="category-posts col-sm-<?php echo $ccol; ?>">
                <h3><a href="<?php echo get_category_link( $catid ) ?>"><?php echo get_cat_name( $catid ) ?></a></h3>
            <?php wpo_get_template('post/'.$layout.'.php',array( 'loop'=> $loop , 'class_column'=> $class_column,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
            <?php  } ?>
            </div>   <?php wp_reset_query(); ?>
            <?php  } ?>

         </div>
        <?php } else {  ?>
        <?php

            $loop = new WP_Query($args);
            if($loop->have_posts()){  ?>
                <?php wpo_get_template('post/'.$layout.'.php',array( 'loop'=> $loop , 'class_column'=> $class_column,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
             <?php  } ?>
          <?php  } ?>
    </div>
</section>
<?php wp_reset_query(); ?>