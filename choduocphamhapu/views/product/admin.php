<div class="container">
		<h3>Chào mừng bạn đến với trang Quản trị</h3>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<form action="seach.php" method="POST">
					<input type="text" name="txtSeach" id="txtSeach" placeholder="Vui lòng nhập sản phẩm cần tìm" class="">
					<input type="submit" name="btnSeach" value="Tìm kiếm" class="glyphicon glyphicon-search" class="btn btn-success">
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
						<th>Giá SP (vnđ)</th>
                        <th>Giá bán (vnđ)</th>
                        <th>Giá Nhập (vnđ)</th>
						<th>Số lượng SP</th>
                        <th>Số lượng nhập</th>
                        <th>Doanh thu (vnđ)</th>
                        <th>Lợi nhuận (vnđ)</th>
						<th>Hình ảnh SP</th>
						<th>Mã Danh mục</th>
						<th>Miêu tả</th>
						<th>Thao tác</th>
					</tr>
					<?php
                    $tong_loinhuan = 0;
                    $tong_doanhthu = 0;
					foreach ($data as $k => $v) {
					    $doanhthu = ($v['Soluongnhap'] - $v['Soluongton'])*$v['Giabanmoi'];
					    $format_doanhthu = number_format($doanhthu);
					    $loinhuan = ($v['Soluongnhap'] - $v['Soluongton'])*($v['Giabanmoi'] - $v['Dongianhap']);
					    $format_loinhuan = number_format($loinhuan);
					    $tong_doanhthu += $doanhthu;
					    $format_tong_doanhthu = number_format($tong_doanhthu);
					    $tong_loinhuan += $loinhuan;
					    $format_tong_loinhuan = number_format($tong_loinhuan);
					?>
					<tr>
						<td><?php echo $v['MaSP'];?></td>
						<td><?php echo $v['TenSP'];?></td>
						<td><?php echo $v['Dongiacu'];?></td>
                        <td><?php echo $v['Giabanmoi'];?></td>
                        <td><?php echo $v['Dongianhap'];?></td>
						<td><?php echo $v['Soluongton'];?></td>
                        <td><?php echo $v['Soluongnhap'];?></td>
                        <td><?php echo $format_doanhthu;?></td>
                        <td><?php echo $format_loinhuan;?></td>
						<td><?php echo $v['Hinhanh'];?></td>
						<td><?php echo $v['MaDM'];?></td>
						<td><?php echo $v['Mieuta'];?></td>
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
                <hr>
                <h5>Tổng doanh thu: <b><?php echo $format_tong_doanhthu;?></b> vnđ</h5>
                <h5>Tổng lợi nhuận: <b><?php echo $format_tong_loinhuan;?></b> vnđ</h5>
			</div>
		</div>
	</div>