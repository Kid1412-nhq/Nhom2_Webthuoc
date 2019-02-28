<?php
global $wpo_accordion_item;
$output = $title = '';

extract(shortcode_atts(array(
	'title' => __("Section", 'pharmacy')
), $atts));
$wpo_accordion_item[]=array('title'=>$title,'content'=>wpb_js_remove_wpautop($content));

