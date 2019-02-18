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
	'title'=>'',
	'el_class' => '',
	'skin'=>'skin-1'
), $atts ) );*/


$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

$_id = wpo_makeid();
$_count = 0;
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);

$query = new WP_Query($args);
?>

<div class="widget wpo-testimonial <?php echo $skin; ?> text-center">
	<?php if($query->have_posts()){ ?>
		<?php if($title!=''){ ?>
			<h3 class="widget-title visual-title">
				<span><?php echo $title; ?></span>
			</h3>
		<?php } ?>
		<?php if($skin=='skin-1'){ ?>
			<!-- Skin 1 -->
			<div id="carousel-<?php echo $_id; ?>" class="widget-content post-widget media-post-carousel carousel slide" data-ride="carousel">
                <div class="col-xs-12">
                    <div class="carousel-inner testimonial-carousel">
                        <?php while($query->have_posts()):$query->the_post(); ?>
                            <!-- Wrapper for slides -->
                            <div class="item<?php echo (($_count==0)?" active":"") ?>">
                                <div class="description">
                                    <?php the_content() ?>
                                </div>
                                <div class="carousel-body info text-uppercase">
                                    <h5 class="white"><?php the_title(); ?></h5>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                            <?php $_count++; ?>
                        <?php endwhile; ?>
                    </div>
                    <ol class="carousel-indicators testimonial-navigation">
                        <?php $_count =0; ?>
                        <?php while($query->have_posts()):$query->the_post(); ?>
                            <li data-target="#carousel-<?php echo $_id; ?>" data-slide-to="<?php echo $_count; ?>" <?php echo ($_count==0)?'class="active"':''; ?>>
                                <?php the_post_thumbnail('widget');?>
                            </li>
                            <?php $_count++; ?>
                        <?php endwhile; ?>
                    </ol>
                </div>
			</div>
		<?php }else if($skin == 'skin-2'){ ?>
			<!-- Skin 2 -->
			<div id="carousel-<?php echo $_id; ?>" class="widget-content post-widget media-post-carousel carousel slide" data-ride="carousel">
				<div class="carousel-inner testimonial-carousel">
                    <?php while($query->have_posts()):$query->the_post(); ?>
                        <!-- Wrapper for slides -->
                        <div class="item<?php echo (($_count==0)?" active":"") ?>">
                            <div class="description">
                                <?php the_content() ?>
                            </div>
                            <div class="carousel-body text-center info text-uppercase">
                                <?php the_post_thumbnail('widget');?>
                                <div class="info-text">
                                    <h5 class="white"><?php the_title(); ?></h5>
                                    <?php the_excerpt(); ?>
                                </div>

                            </div>
                        </div>
                        <?php $_count++; ?>
                    <?php endwhile; ?>
				</div>
				<ol class="carousel-indicators">
                    <?php $_count =0; ?>
                    <?php while($query->have_posts()):$query->the_post(); ?>
                        <li data-target="#carousel-<?php echo $_id; ?>" data-slide-to="<?php echo $_count; ?>" <?php echo ($_count==0)?'class="active"':''; ?>>
                        </li>
                        <?php $_count++; ?>
                    <?php endwhile; ?>
			  	</ol>
			</div>
		<?php } ?>
	<?php } ?>

</div>
<?php wp_reset_query(); ?>