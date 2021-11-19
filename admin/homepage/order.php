<?php
	require_once('../../database/config.php');
	include('../header_master.php');
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Danh Sách Đơn Hàng</strong></h1>
					<div>
						<?php if(isset($_COOKIE['thongbao_updateSuccess'])):?>
							<p class="thongbao_success"><?= $_COOKIE['thongbao_updateSuccess']?><span class="close">X</span></p>
						<?php endif;?>

						<?php if(isset($_COOKIE['thongbao_updateFail'])):?>
							<p class="thongbao_fail"><?= $_COOKIE['thongbao_updateFail']?><span class="close">X</span></p>
						<?php endif;?>
					</div>
					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Số Đơn Hàng</th>
											<th class="d-none d-xl-table-cell">Nhân viên xác nhận</th>
											<th class="d-none d-xl-table-cell">Ngày Đặt Hàng</th>
											<th class="d-none d-xl-table-cell">Ngày Giao Hàng</th>
											<th>Trạng thái</th>
											<th>Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$result = $conn->query("SELECT a.*, b.HoTenNV 
																	FROM dathang AS a
																	LEFT JOIN nhanvien AS b ON a.MSNV=b.MSNV
																	ORDER BY a.SODONDH DESC");
											while($row = $result->fetch_assoc()):
											$msdh = $row['SoDonDH'];
											$ten_nv = $row['HoTenNV'];
											$ngayGH = $row['NgayGH'];
											if ($ngayGH != null) {
												$ngayGH = date("d-m-Y",strtotime($row['NgayGH']));
											}
										?>
										<tr>
											<td><?=$row['SoDonDH']?></td>
											<td class="d-none d-xl-table-cell"><?=$ten_nv?></td>
											<td class="d-none d-xl-table-cell"><?=date("d-m-Y",strtotime($row['NgayDH']))?></td>
											<td class="d-none d-md-table-cell"><?=$ngayGH?></td>
											<td class="d-none d-md-table-cell"><?=$row['TrangThaiDH']?></td>
											<td class="thaotac">
												<a class="btn btn-warning" href="./order_details.php?msdh=<?=$msdh?>">Xem</a>
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