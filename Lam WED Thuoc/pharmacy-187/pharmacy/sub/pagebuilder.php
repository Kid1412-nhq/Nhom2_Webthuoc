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

if (class_exists('WPO_PageBuilder_Base')) {

	class WPO_PageBuilder extends WPO_PageBuilder_Base{

		public function __construct(){
			parent::__construct();

			$this->loadThemeShortCode();
			//Edit Elements
			$this->elementTabItem();
			$this->elementButton();
			$this->elementColumn();
			$this->elementRow();
			$this->elementTitle();

			$this->modifyPostGrid();
			
		}

		/**
		 *
		 */	
		private function loadThemeShortCode(){ 
			if( WPO_WOOCOMMERCE_ACTIVED ) {
				require_once( WPO_THEME_SUB_DIR.'vc_shortcodes/woocommerce.php');	
			}
			require_once( WPO_THEME_SUB_DIR.'vc_shortcodes/theme.php');		
		} 	
		
		/**
		 *
		 */	
		private function elementTitle(){
			vc_add_param( 'vc_text_separator', array(
		         "type" => "textarea",
		         "heading" => __("Description", 'pharmacy'),
		         "param_name" => "descript",
		         "value" => ''
		    ));
		}

		/**
		 *
		 */	
		private function elementRow(){
		    vc_add_param( 'vc_row', array(
		         "type" => "checkbox",
		         "heading" => __("Parallax", 'pharmacy'),
		         "param_name" => "parallax",
		         "value" => array(
		         				__('Yes, please', 'pharmacy') => true
		         			)
		    ));

		}

		/**
		 *
		 */	
		private function elementColumn(){
			$add_css_animation = array(
				"type" => "dropdown",
				"heading" => __("CSS Animation", 'pharmacy'),
				"param_name" => "css_animation",
				"admin_label" => true,
				"value" => $this->cssAnimation,
				"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'pharmacy')
			);
			vc_add_param('vc_column',$add_css_animation);
			vc_add_param('vc_column_inner',$add_css_animation);
		}

		private function modifyPostGrid(){
			vc_add_param( 'vc_posts_grid', array(
					"type" => "dropdown",
					"heading" => __("Layout Type", 'pharmacy'),
					"param_name" => "layout",
					"value" => array(
							'Grid 1'=>'grid-1',
							'Grid 2'=>'grid-2',
							'List 1'=>'list-1',
							'List 2'=>'list-2',
							'List 3'=>'list-3',
							'List 4'=>'list-4',
							'Featured 1'=>'featured-1',
							'Featured 2'=>'featured-2'
						),
					"admin_label" => true,
					"description" => __("Select Skin layout.", 'pharmacy')
				)	
		    );
		}

		/**
		 * Tab Item
		 */
		private function elementTabItem(){
			vc_add_param( 'vc_tab', array(
		         "type" => "textfield",
		         "heading" => __("Icon", 'pharmacy'),
		         "param_name" => "tabicon",
		         "value" => ''
		    ));
		}

		/**
		 * Button
		 */
		private function elementButton(){
			// color
			$param = WPBMap::getParam('vc_button', 'color');
			$param['value'] = array(
								__('Default', 'pharmacy') =>'btn-default',
								__('Primary', 'pharmacy')=>'btn-success',
								__('Success', 'pharmacy')=>'btn-success',
								__('Info', 'pharmacy')=>'btn-warning',
								__('Danger', 'pharmacy')=>'btn-danger',
								__('Link', 'pharmacy')=>'btn-link'
							);
			$param['heading']=__('Type', 'pharmacy');
			WPBMap::mutateParam('vc_button', $param);

			// icon
			$param = WPBMap::getParam('vc_button', 'icon');
			$param['type']='textfield';
			$param['value']='';
			WPBMap::mutateParam('vc_button', $param);

			// size
			$param = WPBMap::getParam('vc_button', 'size');
			$param['value']= array(
								__('Default', 'pharmacy') =>'',
								__('Large', 'pharmacy') =>'btn-lg',
								__('Small', 'pharmacy') =>'btn-sm',
								__('Extra small', 'pharmacy') =>'btn-xs'
							);
			WPBMap::mutateParam('vc_button', $param);
		}

		/**
		 * Image Carousel
		 */
		private function elementImageCarousel(){
			$this->deleteParam('vc_images_carousel',array(
														'img_size',
														'onclick',
														'mode',
														'slides_per_view',
														'wrap',
														'partial_view',
														'speed',
														'autoplay'
													));
		}

		private function elementProgressBar(){
			$this->deleteParam('vc_progress_bar',array(
											'title',
											'units',
											'bgcolor',
											'custombgcolor',
											'options'
										));
		}

	}

	add_action( 'init', 'wpo_init_pagebuilder' );
	function wpo_init_pagebuilder(){
		new WPO_PageBuilder();
	}
}