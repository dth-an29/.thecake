<?php 
	require_once('../../database/config.php');
	include('../header_master.php');
?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Danh Sách Nhân Viên</strong></h1>

		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<a href="../login-register/register.php" class="btn btn-success col-1" id="addBtn">Thêm</a>
					</div>
					<div>
						<?php if(isset($_COOKIE['thongbao_success'])):?>
							<p class="thongbao_success"><?= $_COOKIE['thongbao_success']?><span class="close">X</span></p>
						<?php endif;?>
						
						<?php if(isset($_COOKIE['thongbao_fail'])):?>
							<p class="thongbao_fail"><?= $_COOKIE['thongbao_fail']?><span class="close">X</span></p>
						<?php endif;?>

						<?php if(isset($_COOKIE['thongbao_updateSuccess'])):?>
							<p class="thongbao_success"><?= $_COOKIE['thongbao_updateSuccess']?><span class="close">X</span></p>
						<?php endif;?>

						<?php if(isset($_COOKIE['thongbao_updateFail'])):?>
							<p class="thongbao_fail"><?= $_COOKIE['thongbao_updateFail']?><span class="close">X</span></p>
						<?php endif;?>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>MSNV</th>
								<th class="d-none d-xl-table-cell">Họ tên</th>
								<th class="d-none d-xl-table-cell">Chức vụ</th>
								<th class="d-none d-xl-table-cell">Địa chỉ</th>
								<th class="d-none d-xl-table-cell">Số điện thoại</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$result_nv = $conn->query("SELECT * FROM nhanvien");
								while($row = $result_nv->fetch_assoc()):
								$manv = $row['MSNV'];
							?>
							<tr>
								<td class="text-center"><?= $row['MSNV']?></td>
								<td class="d-none d-xl-table-cell"><?= $row['HoTenNV']?></td>
								<td class="d-none d-xl-table-cell tenhh"><?= $row['ChucVu']?></td>
								<td class="d-none d-xl-table-cell"><?= $row['DiaChi']?></td>
								<td class="d-none d-md-table-cell"><?= $row['SoDienThoai']?></td>
								<td class="thaotac">
									<a href="./edit_staff.php?manv=<?=$manv?>" class="btn btn-warning">Sửa</a>
									<a href="./control/deleteStaff_Controller.php?msnv=<?=$row['MSNV']?>" class="btn btn-danger">Xóa</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</main>

<?php 
	include('../footer_master.php');
?>