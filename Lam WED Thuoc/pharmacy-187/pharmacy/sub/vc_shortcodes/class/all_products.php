<?php  
// require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
class WPBakeryShortCode_Wpo_All_Products extends WPBakeryShortCode {

	public function getListQuery( $atts ){
		$list_query = array();
		if( $atts['show_tab']){
			$types = explode(',', $atts['show_tab']);
			foreach ($types as $type) {
				$list_query[$type] = $this->getTabTitle($type);
			}
		}
		
		return $list_query;
	}

	public function getTabTitle($type){
		switch ($type) {
			case 'recent':
				return array('title'=>__('Latest Products','pharmacy'),'title_tab'=>__('Latest','pharmacy'));
			case 'featured_product':
				return array('title'=>__('Featured Products','pharmacy'),'title_tab'=>__('Featured','pharmacy'));
			case 'top_rate':
				return array('title'=> __('Top Rated Products','pharmacy'),'title_tab'=>__('Top Rated', 'pharmacy'));
			case 'best_selling':
				return array('title'=>__('BestSeller Products','pharmacy'),'title_tab'=>__('BestSeller','pharmacy'));
			case 'on_sale':
				return array('title'=>__('Special Products','pharmacy'),'title_tab'=>__('Special','pharmacy'));
		}
	}
}