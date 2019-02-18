<div class="container">
	<h3>Trang tìm kiếm</h3>
</div>
<div class="container col-xs-3 item">
	<a href="detail.php?id=<?php echo $v['MaSP'];?>">
		<?php echo $v['TenSP'];?>
	</a>
	<div>Giá: <?php echo $v['GiaSP']?></div>
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