<?php 

/*extract(shortcode_atts(array(
			'icon' 			=> '',
			'color' 		=> '',
			'image' 		=> '',
			'number' 		=> '',
			'title' 		=> '',
			'style'	 		=> 'vertical',
			'animate'	 	=> 'animate-math',
			'description'	=> '',
			'information'	=> '',
			'el_class'	=> ''
	), $atts));*/


$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
		
 
	$color = $color?'style="color:'. $color .';"' : "";
	 
?>
<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>
<div class="widget">
    <div class="widget-content wpo-reassuarence <?php echo $animate; ?> counter_<?php echo $style ;?>">

        <div class="reassuarence-icon">
            <?php if( isset($img[0]) ) { ?>
                <img src="<?php echo $img[0];?>" title="<?php echo $title; ?>">
            <?php }else if( $icon ) { ?>
                <i class="fa fa <?php echo $icon; ?> fa-3x" <?php echo $color ?>></i>
            <?php } ?>
        </div>

        <?php if( $title ) { ?>
            <h6><?php echo $title; ?></h6>
        <?php } ?>
        <span><?php echo $description; ?></span>
    </div>

</div>


