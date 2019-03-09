<?php
require_once 'controllers/base_controller.php';
class CastomerController extends BaseController{

	public function __construct(){
		$this->folder = "customer";
	}

	public function index(){
		$this->render("index");
	}

	public function register(){
		$data = array('name'=>'Admin','age'=>30);
		// Hoàn thiện lấy dữ liệu từ bảng người dùng
		$this->render('register',$data);
	}

	public function login(){
		$this->render('login');
	}

	public function logout(){
		$this->render('logout');
	}
}
?>