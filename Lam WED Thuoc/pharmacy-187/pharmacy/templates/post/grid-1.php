<?php 
/** 
 * $loop
 * $class_column
 *
 */

$_count =1;

$colums = '3';
$bscol = floor( 12/$colums );
?>

<?php 
	
	$i = 0;
	while($loop->have_posts()){ 
	$loop->the_post();
 ?>	
 		<?php if(  $i++%$colums==0 ) {  ?>
 		<div class="row">
 		<?php } ?>
	 	<article class="post col-sm-<?php echo $bscol; ?>">
		    <figure class="entry-thumb zoom">
		        <a href="<?php the_permalink(); ?>" title="" class="entry-image">
		            <?php the_post_thumbnail('blog-thumbnails');?>
		        </a>
		        <div class="entry-meta">
				        <div class="entry-date">
				                <span><?php the_time( 'd' ); ?></span><?php the_time( 'M' ); ?> 
				        </div>
			    </div>
		    </figure>
		    <h4 class="entry-title">
		        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		    </h4>
		    <p class="entry-description"><?php echo wpo_excerpt(25,'...');; ?></p>
		</article>
		<?php if(  ($i%$colums==0) || $i == $loop->post_count-1  ) {  ?>
		</div>
		<?php } ?>
<?php  } ?>