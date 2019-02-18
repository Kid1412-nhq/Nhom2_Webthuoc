<?php
require_once "controllers/base_controller.php";
require_once "models/products.php";

class ProductController extends BaseController{
	public function __construct(){
		$this->folder = "product";
	}

	public function index(){

		//Xuống Model lấy tất cả dữ liệu từ bảng 'products'
		$products = new Products();
		$data = $products->getAllProduct();
		$this->render("index",$data);
	}

	public function detail(){
		if(isset($_Get['id'])){
			$id = $_GET['id'];
			$products = new Products();
			$data = $products->getProductById($id);
			$this->render("detail",$data);
		}
		
	}

	public function create(){
		if(isset($_POST['btnAdd'])){
			$products = new Products();
			$data = $products->getAddProduct();
			$this->render("create",$data);
		}
	}

	public function delete(){
		if(isset($_Get['id'])){
			$id = $_GET['id'];
			$products = new Products();
			$data = $products->getDeleteProduct($id);
			$this->render("delete",$data);
		}
	}

	public function seach(){
		if(isset($_POST['txtSeach'])){
			$seach = isset($_POST['txtSeach']) ? $_POST['txtSeach'] : "";
			if(!empty($seach)){
				$products = new Products();
				$data = $products->getSeachProduct();
				$this->render("seach",$data);
			}else{
				echo "<div class='alert alert-danger'>Bạn chưa nhập nội dung tìm kiếm</div>";
			}
		}
	}

	public function admin(){
		$products = new Products();
		$data = $products->getAdmin();
		$this->render("admin",$data);
	}
			
}
?>