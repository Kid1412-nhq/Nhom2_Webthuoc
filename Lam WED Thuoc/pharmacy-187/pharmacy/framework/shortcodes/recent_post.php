<?php

	class WPO_Shortcode_Recent_post extends WPO_Shortcode_Base{

		public function __construct( ){
			// add hook to convert shortcode to html.
			$this->name = str_replace( 'wpo_shortcode_','',strtolower( __CLASS__ ) );
			$this->key = 'wpo_'.$this->name;
			add_shortcode( $this->key  ,  array($this,'render') );
			$this->excludedMegamenu = true;
			parent::__construct( );
		}

		/**
		 * $data format is object field of megamenu_widget record.
		 */
		public function getButton( $data=null ){
			$button = array(
				'icon'	 => 'recentpost',
				'title' => __( 'Recent Post' , 'pharmacy'),
				'desc'  => __( 'Display List of Newest Post' , 'pharmacy'),
				'name'  => $this->name
			);
			return $button;
		}

		public function getOptions( ){
		    $this->options[] = array(
		        'label' 	=> __('Limited Post', 'pharmacy'),
		        'id' 		=> 'limit',
		        'type' 		=> 'text',
		        'explain'	=> __( 'Enter Vimeo Link or Youtube Here' , 'pharmacy'),
		        'default'	=> '6',
		        'hint'		=> '',
	        );

	        $this->options[] = array(
		        'label' 	=> __('Display Date', 'pharmacy'),
		        'id' 		=> 'enable_date',
		        'type' 		=> 'select',
		        'explain'	=> __( 'Display posted data' , 'pharmacy'),
		        'default'	=> '0',
		        'options'   => array( 0=>__('No', 'pharmacy'), 1=>__('Yes', 'pharmacy') ),
		        'hint'		=> '',
	        );

	         $this->options[] = array(
		        'label' 	=> __('Addition Class', 'pharmacy'),
		        'id' 		=> 'class',
		        'type' 		=> 'text',
		        'explain'	=> __( 'Using to make own style', 'pharmacy' ),
		        'default'	=> '',
		        'hint'		=> '',
	        );
		}

		public function render( $attrs, $content="" ){
			return '<div>'.$attrs['style'].'</div>';
		}
	}
?>