<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

/*extract( shortcode_atts( array(
	'title' => '',
	'number'=>-1,
	'icon'=>'',
	'el_class'=>''
), $atts ) );*/

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

$_id = wpo_makeid();
$args = array(
	'post_type' => 'brands',
	'posts_per_page'=>$number
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) : ?>
<?php
	$_count = 1;
	$columns_count=6;
	switch ($columns_count) {
		case '6':
			$class_column='col-sm-2 col-md-2';
			break;
		case '4':
			$class_column='col-sm-6 col-md-3';
			break;
		case '3':
			$class_column='col-sm-4';
			break;
		case '2':
			$class_column='col-sm-6';
			break;
		default:
			$class_column='col-sm-12';
			break;
	}
?>
	<section class="widget brand-logo<?php echo (($el_class!='')?' '.$el_class:''); ?> hidden-xs hidden-sm">
        <?php
            if($title!=''){
        ?>
            <h3 class="widget-title visual-title">
                <?php if($icon!=''){ ?>
                <i class="fa <?php echo $icon; ?>"></i>
                <?php } ?>
                <span><?php echo $title; ?></span>
            </h3>
        <?php } ?>

		<div class="widget-content">
            <div class="col-xs-12">
                <div class="widget-brands slide" id="productcarouse-<?php echo $_id; ?>">
                    <div class="woo-carousel-controls">
                        <a  href="#productcarouse-<?php echo $_id; ?>" data-slide="prev" class="left  woo-carousel-control">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#productcarouse-<?php echo $_id; ?>" data-slide="next" class="right woo-carousel-control">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="carousel-inner">
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <?php 
                                $meta = get_post_meta(get_the_ID(),'wpo_brand',true);
                                $meta = wp_parse_args( $meta, array(
                                    'link'   => '#'
                                ));
                            ?>
                            <?php if( $_count%$columns_count == 1 ) echo '<div class="item'.(($_count==1)?" active":"").'"><div class="row">'; ?>
                            <!-- Product Item -->
                            <div class="item-brands <?php echo $class_column; ?>">
                                <a href="<?php echo esc_url($meta['link']); ?>" target="_bank" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'brand-logo' ); ?></a>
                            </div>
                            <!-- End Product Item -->

                            <?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $number ) echo '</div></div>'; ?>
                            <?php $_count++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
		</div>
	</section>
<?php endif; ?>

<?php wp_reset_query(); ?>