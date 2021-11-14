<?php 
	require_once('../../database/config.php');
	include('../header_master.php');
?>

<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Danh Sách Hàng Hóa</strong></h1>

		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<button class="btn btn-success col-1" id="addBtn" data-toggle="modal" data-target="#addProductModal">Thêm</button>			
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
								<th>MSHH</th>
								<th class="d-none d-xl-table-cell">Loại HH</th>
								<th class="d-none d-xl-table-cell">Tên HH</th>
								<th class="d-none d-xl-table-cell">Hình Ảnh</th>
								<th class="d-none d-xl-table-cell">Giá</th>
								<th class="d-none d-xl-table-cell">Số Lượng</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$result_hh = $conn->query("SELECT * 
														   FROM hanghoa, hinhhanghoa, loaihanghoa 
														   WHERE hanghoa.MSHH = hinhhanghoa.MSHH 
														   AND hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang
														   ORDER BY hanghoa.MSHH DESC");
								while($row = $result_hh->fetch_assoc()):
									$mshh = $row['MSHH'];
							?>
							<tr>
								<td class="text-center"><?= $row['MSHH']?></td>
								<td class="d-none d-xl-table-cell"><?= $row['TenLoaiHang']?></td>
								<td class="d-none d-xl-table-cell tenhh"><?= $row['TenHH']?></td>
								<td class="d-none d-xl-table-cell"><img src="../../client/img-product/<?= $row['TenHinh']?>" alt="" width=100px height=100px></td>
								<td class="d-none d-md-table-cell"><?= number_format($row['Gia'])?>đ</td>
								<td class="d-none d-md-table-cell text-center"><?= $row['SoLuongHang']?></td>
								<td class="thaotac">
									<a class="btn btn-warning" href="./edit_product.php?mshh=<?=$mshh?>">Sửa</a>
									<a href="./control/deleteProduct_Controller.php?mshh=<?= $row['MSHH']?>" class="btn btn-danger">Xóa</a>
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
	<main id="addModal" class="content modalProduct">
        <div class="container-fluid p-0 modal-content">
            <h1 class="h3 mb-3"><strong>Thêm hàng hóa</strong></h1>
			
			<form action="./control/addProduct_Controller.php" method="post" enctype="multipart/form-data">
				<div class="row form-container">
               		<div class="col-12 col-lg-6 form-group">
					   <div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">MSHH</h5>
							</div>
							<div class="card-body">
								<input class="form-control" type="text" placeholder="Auto" disabled="">
							</div>
						</div>

                    	<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Tên HH</h5>
							</div>
							<div class="card-body">
								<input type="text" name="tenHH" class="form-control" required placeholder="Nhập tên hàng hóa">
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Loại HH</h5>
							</div>
							<div class="card-body">
								<select class="form-select mb-3" name="loaiHH" required>
									<?php
										$result_loaihh = $conn->query("SELECT * FROM loaihanghoa");
										while($row = $result_loaihh->fetch_assoc()){
											$maloaihang = $row['MaLoaiHang'];
											$tenloaihang = $row['TenLoaiHang'];
											echo "<option value='$maloaihang'>$tenloaihang</option>";
										}
									?>
        						</select>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Hình HH</h5>
							</div>
							<div class="card-body">
								<input type="file" name="hinhHH" id="hinhHH" required>
							</div>
						</div>
                	</div>

                	<div class="col-12 col-lg-6 form-group">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Giá</h5>
							</div>
							<div class="card-body">
								<input type="text" class="form-control" name="giaHH" placeholder="Nhập giá hàng hóa" required>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Số lượng</h5>
							</div>
							<div class="card-body">
								<input type="text" class="form-control" name="soluongHH" placeholder="Nhập số lượng hàng hóa" required>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Mô tả</h5>
							</div>
							<div class="card-body">
								<textarea class="form-control" rows="2" name="motaHH" placeholder="Nhập mô tả hàng hóa" required></textarea>
							</div>
						</div>

						<button class="btn btn-primary col-2" type="submit" id="add-saveBtn">Thêm</button>
						<button class="btn btn-secondary col-2" id="add-exitBtn">Thoát</button>
                	</div>
				</div>
			</form>
        </div>
    </main>

<?php 
	include('../footer_master.php');
?>