<?php

$_total = $loop->found_posts;
$_count = 1;
$_id = wpo_makeid();
$_delay = 150;
?>

<div class="widget-products slide" id="productcarouse-<?php echo $_id; ?>">
    <?php if($posts_per_page>$columns_count && $_total>$columns_count){ ?>
        <div class="woo-carousel-controls pull-right">
            <a class="left woo-carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right woo-carousel-control" href="#productcarouse-<?php echo $_id; ?>" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    <?php } ?>
    <div class="carousel-inner">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <?php if( $_count%$columns_count == 1 ) echo '<div class="loop-products list-product item'.(($_count==1)?" active":"").'">'; ?>

            <!-- Product Item -->
            <div class=" <?php echo $class_column ?>  wow fadeInUp " data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
                <?php wc_get_template_part( 'content', 'product-inner' ); ?>
            </div>
            <!-- End Product Item -->

            <?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $posts_per_page || $_count==$_total ) echo '</div>'; ?>
            <?php $_count++;$_delay+=200; ?>
        <?php endwhile; ?>
    </div>
</div>

<?php wp_reset_postdata(); ?>