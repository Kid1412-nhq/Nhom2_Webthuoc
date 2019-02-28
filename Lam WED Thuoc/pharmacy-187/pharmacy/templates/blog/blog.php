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
$postformat = get_post_format();
$icon = '';
switch ($postformat) {
	case 'link':
		$icon = 'fa-link';
		break;
	case 'gallery':
		$icon = 'fa-th-large';
		break;
	case 'audio':
		$icon = 'fa-music';
		break;
	case 'video':
		$icon = 'fa-film';
		break;
	default:
		$icon = 'fa-picture-o';
		break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-container clearfix">

		<!-- icon
		<div class="blog-post-icon hidden-xs hidden-sm pull-left">
			<i class="fa <?php // echo $icon; ?>"></i>
		</div>
		-->

		<div class="blog-post-detail">
			<figure class="entry-thumb">
				<?php
					if ( has_post_format( 'video' )) {
					?>
						<div class="video-responsive">
							<?php wpo_embed(); ?>
						</div>
					<?php
					}
					else if ( has_post_format( 'audio' )) {
					?>
						<div class="audio-thumb audio-responsive">
							<?php wpo_embed(); ?>
						</div>
					<?php
					}
					else if ( has_post_format( 'gallery' )) {
						$_imgs = wpo_gallery('image-blog');
						$galleries = array();
						foreach( $_imgs as $val){
							if( $val ) $galleries[] = $val;
						}
					?>
						<?php if(count($galleries) > 1) { ?>
							<div id="post-slide-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<?php foreach ($galleries as $key => $_img) {
										echo '<div class="item '.(($key==0)?'active':'').'">';
											echo '<img src="'.$_img.'" alt="">';
										echo '</div>';
									} ?>
								</div>
								<a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
									<span class="fa fa-angle-left"></span>
								</a>
								<a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
									<span class="fa fa-angle-right"></span>
								</a>
							</div>
						<?php } elseif (count($galleries) == 1){ ?>
									<?php foreach ($galleries as $key => $_img) {
										echo '<div class="item '.(($key==0)?'active':'').'">';
											echo '<img src="'.$_img.'" alt="">';
										echo '</div>';
									} ?>
						<?php } ?>
					<?php
					}else if(has_post_format('link')){
						$postconfig = get_post_meta(get_the_ID(),'wpo_post',true);
						if(isset($postconfig["link"])){
							echo '<a class="post-link" href="'.$postconfig["link"].'">'.$postconfig["link"].'</a>';
						}
					}
					else if (has_post_thumbnail()) {
					?>
					<a href="<?php the_permalink(); ?>" title="" class="entry-image zoom">
						<?php the_post_thumbnail('image-blog');?>
					</a>
					<?php }
				?>
			</figure>
            <div class="information-post">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <p class="entry-content">
                    <?php echo wpo_excerpt(40); ?>
                </p>

                <div class="entry-meta">
                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                    <span class="meta-sep"> / </span>
				<span class="comment-count">
					<?php comments_popup_link(__(' 0 comment', 'pharmacy'), __(' 1 comment', 'pharmacy'), __(' % comments', 'pharmacy')); ?>
				</span>
                    <span class="meta-sep"> / </span>
                    <span class="author-link"><?php the_author_posts_link(); ?></span>
                    <?php if(is_tag()): ?>
                        <span class="meta-sep"> / </span>
                        <span class="tag-link"><?php the_tags( __('Tags: ', 'pharmacy' ),', '); ?></span>
                    <?php endif; ?>
                </div>

                <div class="entry-link">
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php echo __( 'read more','pharmacy' ); ?></a>
                </div>
            </div>
		</div>
	</div>
</article>