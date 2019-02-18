<?php
$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
global $wpo_accordion_item;
$wpo_accordion_item = array();
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $collapsible
 * @var $disable_keyboard
 * @var $active_tab
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Accordion
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$id = wpo_makeid();
wp_enqueue_script( 'jquery-ui-accordion' );
wpb_js_remove_wpautop($content);
$el_class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion wpb_content_element ' . $el_class . ' not-column-inherit', $this->settings['base'], $atts );

?>
<div class="panel-group" id="accordion-<?php echo $id; ?>">
	<?php
	foreach($wpo_accordion_item as $key => $acc){
		$itemid = wpo_makeid();
	?>
	<div class="panel panel-default">
		<div class="panel-heading" data-toggle="collapse" data-parent="#accordion-<?php echo $id; ?>" href="#collapse-<?php echo $itemid; ?>">
			<h4 class="panel-title">
				<?php echo $acc['title']; ?>
			</h4>
		</div>
		<div id="collapse-<?php echo $itemid; ?>" class="panel-collapse collapse<?php echo ($key==0)?' in':'' ?>">
			<div class="panel-body">
				<?php echo $acc['content']; ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>