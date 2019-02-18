<?php
require_once "connection.php";

class Products{
	
	private $productid;
	private $name;
	private $price;
	private $description;
	private $image;

	public function getAllProduct(){
		$result = array();
		$sql = "SELECT * FROM sanpham";
		$stmt = DB::getInstance()->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
		}else{
			echo "<div class='alert alert-danger'>Khong co SP nao</div>";
		}

		return $result;
	}

	public function getProductById($id){

		$sql = "SELECT MaSP, TenSP, GiaSP, HinhanhSP, MieutaSP FROM sanpham WHERE MaSP=?";
		$stmt = DB::getInstance()->prepare($sql);
		$stmt->bindParam(1,$id);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		return $row;
	}

	public function getAddProduct(){

		//Tạo ra các biến
		$maSP = $_POST['txtMaSP'];
		$tenSP = $_POST['txtTenSP'];
		$giaSP = $_POST['txtGia'];
		$soluong = $_POST['txtSoluong'];
		$hinhanhSP = $_POST['txtNamXS'];
		$hang = $_POST['txtHang'];
		$tomtat = $_POST['txtTomtat'];

		
		$query = "INSERT INTO sanpham SET MaSP=:m, TenSP=:t, GiaSP=:g, SoluongSP =:s, HinhanhSP=:n, MaDM=:h, MieutaSP=:l";
		$stmt = DB::getInstance()->prepare($query);
		$stmt->bindParam(":m", $maSP);
		$stmt->bindParam(":t", $tenSP);
		$stmt->bindParam(":g", $giaSP);
		$stmt->bindParam(":s", $soluong);
		$stmt->bindParam(":n", $hinhanhSP);
		$stmt->bindParam(":h", $hang);
		$stmt->bindParam(":l", $tomtat);

		if($stmt->execute()){
			echo "<div class='alert alert-success'>Thêm mới sản phẩm thành công.</div>";
		}else{
			echo "<div class='alert alert-danger'>Quá trình thêm mới thất bại.</div>";
		}
	}

	public function getDeleteProduct($id){
		$query = "DELETE FROM sanpham WHERE MaSP = ?";
		$stmt = DB::getInstance()->prepare($query);
		$stmt->bindParam(1, $id);
		if($stmt->execute()){
			echo "<div class='alert alert-success'>Xóa sản phẩm thành công.</div>";
		}else{
			echo "<div class='alert alert-danger'>Quá trình xóa thất bại.</div>";
		}
	}

	public function getSeachProduct(){
		$query = "SELECT * FROM sanpham WHERE TenSP like '%$seach%'";
		$stmt = DB::getInstance()->prepare($query);
		$stmt->bindParam(1, $seach);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		}else{
			echo "<div class='alert alert-danger'>Khong co SP nao</div>";
		}

		return $result;
	}

	public function getAdmin(){
		
		$query = "SELECT * FROM sanpham";
		$stmt = DB::getInstance()->prepare($query);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
		}else{
			echo "<div class='alert alert-danger'>Khong co SP nao</div>";
		}

		return $result;
	}		
}
?>