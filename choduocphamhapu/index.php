<?php

	define("PATH", "http://localhost/php0818e/bandienthoai/index.php");
	
	require_once "connection.php";

	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
		
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "index";
		}
	}else{
		$controller = "product";
		$action		= "index";
	}

	require_once "routes.php";
	
?>