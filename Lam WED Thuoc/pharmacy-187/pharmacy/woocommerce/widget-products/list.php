<?php $_delay = 150; ?>
<div class="product_list_widget ">
    <div class="col-xs-12">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <?php wc_get_template( 'content-widget-product.php', array( 'show_rating' => true , 'animate'=> true , 'delay'=>$_delay ) ); ?>
            <?php $_delay+=200; ?>
        <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_postdata(); ?>