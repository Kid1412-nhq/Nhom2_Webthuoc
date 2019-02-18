<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
extract(shortcode_atts(array(
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
), $atts));
if(empty($loop)) return;
$this->getLoop($loop);
$my_query = $this->query;
$args = $this->loop_args;
$teaser_blocks = vc_sorted_list_parse_value($grid_layout);

$columgrid = 12/$grid_columns_count;
$_delay = 150;
?>

<section class="widget blog-type <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <h3 class="widget-title visual-title">
        <span><?php echo $title; ?></span>
    </h3>
    <div class="widget-content">
        <div class="clearfix loop-posts">
            <?php while ( $my_query->have_posts() ): $my_query->the_post(); ?>
            <div class="col-sm-<?php echo $columgrid; ?> col-md-<?php echo $columgrid; ?> wow fadeInUp " data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
                <article class="blog">
                    <figure class="entry-thumb zoom">
                        <a href="<?php the_permalink(); ?>" title="" class="entry-image">
                            <?php the_post_thumbnail('blog-thumbnails');?>
                        </a>
                    </figure>
                    <div class="information">
                        <p class="blog-meta">
                            <span class="blog-date"><span><?php the_time( 'd' ); ?></span> <span><?php the_time( 'M' ); ?></span> ,<span><?php the_time( 'Y' ); ?></span> </span>
                        </p>
                        <h4 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo __('Read More','pharmacy'); ?> <i class="fa fa-caret-right"></i></a>
                    </div>
                </article>
            </div>
            <?php $_delay+=200; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php wp_reset_query();