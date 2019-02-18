<article class="blog style2">
    <figure class="entry-thumb zoom">
        <a href="<?php the_permalink(); ?>" title="" class="entry-image">
            <?php the_post_thumbnail('blog-thumbnails');?>
        </a>
    </figure>
    <div class="information">
        <div class="blog-date">
            <span><?php the_time( 'd' ); ?></span><?php the_time( 'M' ); ?>
        </div>

        <h4 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
<!--        <p class="entry-description">--><?php //echo wpo_excerpt(25,'...');; ?><!--</p>-->
    </div>
</article>