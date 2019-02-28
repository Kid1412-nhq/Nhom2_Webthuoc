<div class="clearfix loop-products">
	<?php $_count = 0;$_delay = 150; ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

        <?php
        $class_fix = ' shopcol';
        // Store loop count we're currently on
        if ( 0 == ( $_count ) % $columns_count || 1 == $columns_count )
            $class_fix .= ' last-row';
        ?>

		<div class="<?php echo $class_column.$class_fix; ?> wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
			<?php wc_get_template_part( 'content', 'product-inner' ); ?>
		</div>
		<?php $_count++;$_delay+=200; ?>
		<?php
			if($_count==$columns_count){
				$_count=0;$_delay=150;
			}
		?>
	<?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
