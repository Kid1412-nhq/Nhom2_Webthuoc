<div class="container">
		<h3>Thêm mới sản phẩm</h3>

		<form action="controllers/product_controller.php" method="post" enctype='multipart/form-data'>
			<table class='table table-responsive table-hover table-bordered'>
				<tr>
					<td>Mã Sản phẩm</td>
					<td>
						<input type="text" name="txtMaSP" id="txtMaSP" placeholder="Vui lòng nhập mã Sản phẩm" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Tên Sản phẩm</td>
					<td>
						<input type="text" name="txtTenSP" id="txtTenSP" placeholder="Vui lòng nhập tên Sản phẩm" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Giá Sản phẩm</td>
					<td>
						<input type="text" name="txtGia" id="txtGia" placeholder="Vui lòng nhập Giá Sản phẩm" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td>
						<input type="text" name="txtSoluong" id="txtSoluong" placeholder="Vui lòng nhập Số lượng SP" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Năm Sản xuất</td>
					<td>
						<input type="text" name="txtNamXS" id="txtNamXS" placeholder="Vui lòng nhập năm sản xuất" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Hãng Sản xuất</td>
					<td>
						<input type="text" name="txtHang" id="txtHang" placeholder="Vui lòng nhập hãng sản xuất" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Tóm tắt về sản phẩm</td>
					<td>
						<input type="text" name="txtTomtat" id="txtTomtat" placeholder="Vui lòng mô tả về Sản phẩm" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type='submit' name='btnAdd' value="Lưu" class="btn btn-success form-control">
					</td>
				</tr>
			</table>
		</form>
	</div>