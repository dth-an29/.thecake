<?php
	require_once('../../database/config.php');
	include('../header_master.php');
?>
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Danh Sách Loại Hàng Hóa</strong></h1>

		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<button class="btn btn-success col-1 addType">Thêm</button>
					</div>

					<div>
						<?php if(isset($_COOKIE['thongbao_success'])):?>
							<p class="thongbao_success"><?= $_COOKIE['thongbao_success']?><span class="close">X</span></p>
							
						<?php endif;?>
						<?php if(isset($_COOKIE['thongbao_fail'])):?>
							<p class="thongbao_fail"><?= $_COOKIE['thongbao_fail']?><span class="close">X</span></p>
							
						<?php endif;?>

						<?php if(isset($_COOKIE['thongbao_addSuccess'])):?>
							<p class="thongbao_success"><?= $_COOKIE['thongbao_addSuccess']?><span class="close">X</span></p>
						<?php endif;?>

						<?php if(isset($_COOKIE['thongbao_addFail'])):?>
							<p class="thongbao_fail"><?= $_COOKIE['thongbao_addFail']?><span class="close">X</span></p>
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
								<th>Mã Loại Hàng</th>
								<th class="d-none d-xl-table-cell">Loại Bánh</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$result_lhh = $conn->query("SELECT * FROM loaihanghoa ORDER BY MaLoaiHang DESC");
								while($row = $result_lhh->fetch_assoc()):
								$maloai = $row['MaLoaiHang'];
							?>
							<tr>
								<td class="thaotac"><?= $row['MaLoaiHang']?></td>
								<td class="d-none d-xl-table-cell"><?= $row['TenLoaiHang']?></td>
								<td class="thaotac">
									<a class="btn btn-warning" href="./edit_productType.php?maloaihang=<?=$maloai?>">Sửa</a>
									<a href="./control/deleteProductType_Controller.php?maloaihang=<?= $row['MaLoaiHang']?>" class="btn btn-danger">Xóa</a>
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

<!-- Modal ADD Product-->
<main id="addModal-type" class="content modalProduct">
        <div class="container-fluid p-0 modal-content">
            <h1 class="h3 mb-3"><strong>Thêm loại hàng hóa</strong></h1>
			
			<form action="./control/addProductType_Controller.php" method="post">
				<div class="row form-container">
               		<div class="col-12 col-lg-6 form-group">
					   <div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Mã Loại Hàng</h5>
							</div>
							<div class="card-body">
								<input class="form-control" type="text" placeholder="Auto" disabled="">
							</div>
						</div>
                	</div>

                	<div class="col-12 col-lg-6 form-group">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Tên Loại Hàng</h5>
							</div>
							<div class="card-body">
								<input type="text" class="form-control" name="tenLoai" placeholder="Nhập tên loại hàng hóa" required>
							</div>
						</div>

						<button class="btn btn-primary col-2" type="submit" id="addTypeBtn">Thêm</button>
						<button class="btn btn-secondary col-2" id="add-exitBtn">Thoát</button>
                	</div>
				</div>
			</form>
        </div>
    </main>

<?php
	include('../footer_master.php');
?>