<?php
class DB
{
	private static $instance = NULL;

	public static function getInstance(){
		
		if(!isset(self::$instance)){
			try{
				self::$instance = new PDO("mysql:host=localhost;dbname=choduocphamhapu;charset=utf8","root","");
			}catch(PDOException $e){
				die("Lỗi: ". $e->getMessage());
			}
		}

		return self::$instance;
	}
		
}
?>