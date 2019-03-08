<?php

	$controllers = array(
		'category'    => ['index', 'detail', 'create', 'update', 'delete', 'admin', 'seach'],
	  	'customer'    => ['register','login','index','logout'],
	  	'customertype'=> [],
	  	'employee'    => ['index', 'detail', 'create', 'update', 'delete', 'admin', 'seach'],
	  	'order'       => ['index', 'detail', 'create', 'admin', 'seach'],
	  	'orderdetail' => [],
	  	'product'	  => ['index', 'detail', 'create', 'update', 'delete', 'admin', 'seach'],
	  	'shipper'     => [],
	  	'supplier'    => []
	);

	if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
			$controller = 'pages';
			$action = 'error';
	}

	include_once('controllers/' . $controller . '_controller.php');

	$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
	$controller = new $klass;
	$controller->$action();
?>