<?php 

	$wpo = new WPO_SubTheme();

	$protocol = is_ssl() ? 'https:' : 'http:';

	/**
	 * Framework supported post types as 
	 */

	$wpo->addPostTypeSuport( array( 'brands','testimonials','faq', 'offer' ) );
	/* add  post types support as default */
	$wpo->addThemeSupport( 'post-formats',  array( 'link', 'gallery', 'image' , 'video' , 'audio' ) );

	// Add size image
	$wpo->addImagesSize('blog-thumbnail',190,190,true);
	// Add Menus
	$wpo->addMenu('mainmenu','Main Menu');
	$wpo->addMenu('topmenu','Top Header Menu');
	//$wpo->addThemeSupport( 'post-formats',  array( 'aside', 'link' , 'quote', 'image' ) );


	// AddScript
	$wpo->addScript('scroll_animate',WPO_THEME_URI.'/js/smooth-scrollbar.js',array(),false,true);
	$wpo->addScript('dropdown_hover',WPO_THEME_URI.'/js/dropdown-hover.js',array(),false,true);
	$wpo->addScript('parallax_js',WPO_THEME_URI.'/js/jquery.parallax-1.1.3.js',array(),false,true);
	$wpo->addScript('wow_js',WPO_THEME_URI.'/js/jquery.wow.min.js',array(),false,true);
	$wpo->addScript('main_js',WPO_THEME_URI.'/js/main.js',array(),false,true);

	// Add Google Font
	$wpo->addStyle('theme-montserrat-font',$protocol.'//fonts.googleapis.com/css?family=Montserrat:400,700');
	$wpo->addStyle('animate-css',WPO_THEME_URI.'/css/animate.css');


	$wpo->init();

?>