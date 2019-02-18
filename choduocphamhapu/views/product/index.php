<div class="container">
	<h3>Danh sách sản phẩm</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<form action="controllers/product_controller.php" method="POST">
				<input type="text" name="txtSeach" id="txtSeach" placeholder="Vui lòng nhập sản phẩm cần tìm" class="">
				<input type="submit" name="btnSeach" value="Seach" class="glyphicon glyphicon-search" class="btn btn-success">
			</form>
		</div>
		<div class="col-xs-6" style="text-align:right;">
			<a href="views/user/login.php">Đăng nhập</a>
			&nbsp;&nbsp; | &nbsp;&nbsp;
			<a href="views/user/logout.php">Đăng xuất</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2">
			<ul>
				<li><a href="#">Các tiêu chí lọc</a></li>
			</ul>
		</div>
		<div class="col-xs-10">
			<div class="row">
				<?php
					foreach ($data as $k => $v) {
					
					?>
					<div class="col-xs-3 items">
						<a href="<?php echo PATH;?>?controller=product&action=detail&id=<?php echo $v['MaSP'];?>">
							<img src="test.jpg" width="100%" height="200px">
						</a>
						<a href="<?php echo PATH;?>?controller=product&action=detail&id=<?php echo $v['MaSP'];?>">
							<div class="name"><?php echo $v['TenSP'];?></div>
						</a>
						
						<div class="price"><?php echo $v['GiaSP'];?></div>
						<div>
							Trạng thái:
							<?php
							if($v['SoluongSP']>0){
								echo "<span style = 'color:green'>Còn hàng</span>";
							}else{
								echo "<span style = 'color:red'>Hết hàng</span>";
							}
							?>
						</div>
					</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
</div>