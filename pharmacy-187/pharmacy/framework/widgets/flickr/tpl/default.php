<?php 

// Display the widget title
if ( $title ) {
    echo $before_title . $title . $after_title;
}
?>
<div class="flickr-gallery">
	<?php 
		$cur_arg = array(
			'title'			=> $instance['title'],
			'type'			=> empty( $instance['type'] ) ? 'user' : $instance['type'],
			'flickr_id'		=> $screen_name,
			'count'			=> (int) $instance['count'],
			'display'		=> empty( $instance['display'] ) ? 'latest' : $instance['display'],
			'size'			=> isset( $instance['size'] ) ? $instance['size'] : 's',
			'copyright'		=> ! empty( $instance['copyright'] ) ? true : false
		);
		
		extract( $cur_arg );
	?>
	<?php echo "<script type='text/javascript' src='http://www.flickr.com/badge_code_v2.gne?count=$count&amp;display=$display&amp;size=$size&amp;layout=x&amp;source=$type&amp;$type=$flickr_id'></script>"; ?>
</div>