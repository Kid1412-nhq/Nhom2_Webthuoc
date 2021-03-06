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
// Display the widget title
if ( $title ) {
    echo $before_title . $title . $after_title;
}
query_posts( 'post_type=' . $instance[ 'post_type' ] . '&posts_per_page=' . $instance[ 'num' ] . '&featured=yes' );
if(have_posts()){
?>
	<div class="post-widget media-post-layout">
    <?php $_delay = 150; ?>
	<?php while ( have_posts() ): the_post(); ?>
		<article class="item-post media  wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo $_delay; ?>ms">
			<?php
				if(has_post_thumbnail()){
			?>
			<a href="<?php the_permalink(); ?>" class="image pull-left">
				<?php the_post_thumbnail( 'widget' ); ?>
			</a>
			<?php } ?>
			<div class="media-body">
				<h6 class="blog-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h6>
				<p class="post-date">
					<?php echo __('Posted: ','pharmacy'); ?>
					<?php the_time( 'd M Y' ); ?>
				</p>
				<p class="post-author">
					by <?php the_author_posts_link(); ?>
				</p>
			</div>
		</article>
        <?php $_delay+=200; ?>
	<?php endwhile; ?>
	</div>
<?php } ?>