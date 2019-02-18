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
if(class_exists('WooCommerce')){
	class WPO_Shortcode_Products extends WPO_Shortcode_Base{

		public function __construct( ){
			// add hook to convert shortcode to html.
			$this->name = str_replace( 'wpo_shortcode_','',strtolower( __CLASS__ ) );
			$this->key = 'wpo_'.$this->name;
			parent::__construct( );
		}

		/**
		 * $data format is object field of megamenu_widget record.
		 */
		public function getButton( $data=null ){
			$button = array(
				'icon'	 => 'image',
				'title' => __( 'Products', 'pharmacy'),
				'desc'  => __( 'Display Products', 'pharmacy'),
				'name'  => $this->name
			);

			return $button;
		}

		public function getOptions( ){
			 $this->options[] = array(
				"type" => "text",
				"label" => __("Title", 'pharmacy'),
				"id" => "title",
				"default" => ''
			);
		    $this->options[] = array(
		        'label' 	=> __('Type', 'pharmacy'),
		        'id' 		=> 'type',
		        'type' 		=> 'select',
		        'options'   => array(
		        		'top_rate' => __('Top Rate', 'pharmacy' ),
		        		'recent_product' => __( 'Recent Products', 'pharmacy' ),
		        		'featured_product' => __('Featured Products', 'pharmacy' ),
		        		'best_selling' => __('Best Selling', 'pharmacy' )
		        	)
	        );

	        $this->options[] = array(
		        'label' 	=> __('Columns count', 'pharmacy'),
		        'id' 		=> 'columns_count',
		        'type' 		=> 'select',
		        'options'   => array('4'=>4, '3'=>3, '2'=>2, '1'=>1)
	        );
	        $this->options[] = array(
				"type" => "text",
				"label" => __("Number of products to show", 'pharmacy'),
				"id" => "number",
				"default" => '4'
			);
		}
	}
}