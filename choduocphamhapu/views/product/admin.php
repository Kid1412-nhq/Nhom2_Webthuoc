<div class="container">
		<h3>Chào mừng bạn đến với trang Quản trị</h3>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<form action="seach.php" method="POST">
					<input type="text" name="txtSeach" id="txtSeach" placeholder="Vui lòng nhập sản phẩm cần tìm" class="">
					<input type="submit" name="btnSeach" value="Seach" class="glyphicon glyphicon-search" class="btn btn-success">
				</form>
			</div>
			<div class="col-xs-6" style="text-align:right;">
				Xin chào: Admin!
				&nbsp;&nbsp; | &nbsp;&nbsp;
				<a href="views/user/logout.php">Đăng xuất</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
				<ul>
					<li><a href="#">Bảng điều khiển</a></li>
				</ul>
			</div>
			<div class="col-xs-10">
				<table class="table table-bordered table-hover table-responsive">
					<tr>
						<th>Mã SP</th>
						<th>Tên SP</th>
						<th>Giá SP</th>
						<th>Số lượng SP</th>
						<th>Hình ảnh SP</th>
						<th>Mã Danh mục</th>
						<th>Miêu tả</th>
						<th>Thao tác</th>
					</tr>
					<?php
					foreach ($data as $k => $v) {
					
					?>
					<tr>
						<td><?php echo $v['MaSP'];?></td>
						<td><?php echo $v['TenSP'];?></td>
						<td><?php echo $v['GiaSP'];?></td>
						<td><?php echo $v['SoluongSP'];?></td>
						<td><?php echo $v['HinhanhSP'];?></td>
						<td><?php echo $v['MaDM'];?></td>
						<td><?php echo $v['MieutaSP'];?></td>
						<td>
							<a href="views/product/update.php?id=<?php echo $v['MaSP'];?>" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<a href="views/product/delete.php?id=<?php echo $v['MaSP'];?>" class="btn btn-danger">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>