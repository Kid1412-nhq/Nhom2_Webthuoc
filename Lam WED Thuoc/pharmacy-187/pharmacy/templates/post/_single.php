<article class="post">
    <figure class="entry-thumb zoom">
        <a href="<?php the_permalink(); ?>" title="" class="entry-image">
            <?php the_post_thumbnail('blog-thumbnails');?>
        </a>
       <p class="entry-meta">
			<span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
			<span class="meta-sep"> / </span>
			<span class="comment-count">
				<?php comments_popup_link(__(' 0 comment', 'pharmacy'), __(' 1 comment', 'pharmacy'), __(' % comments', 'pharmacy')); ?>
			</span>
			<span class="meta-sep"> / </span>
			<span class="entry-author"><?php the_author_posts_link(); ?></span>
			<?php if(is_tag()): ?>
			<span class="meta-sep"> / </span>
			<span class="tag-link"><?php the_tags( __('Tags: ', 'pharmacy' ),', '); ?></span>
			<?php endif; ?>
		</p>
    </figure>
    <h4 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <p class="entry-description"><?php echo wpo_excerpt(25,'...');; ?></p>
</article>