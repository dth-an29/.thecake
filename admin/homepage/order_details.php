<?php
    require_once('../../database/config.php');

    if(isset($_POST['editOrder_submit']) && $_POST['editOrder_submit'] == "true"){
        $msdh_update = $_POST['sodonDH'];
        $ngaygh_update = $_POST['ngayGH'];
        $trangthai_update = $_POST['trangthaiDH'];
        $msnv_update = $_POST['msnv_duyet'];
        
        $update = $conn->query("UPDATE dathang
                                SET NgayGH='$ngaygh_update', TrangThaiDH='$trangthai_update', MSNV='$msnv_update'
                                WHERE SoDonDH='$msdh_update'");
        
        if($update === TRUE) {
            if ($trangthai_update != "Hủy đơn") {
                $chitiet = $conn->query("SELECT * FROM chitietdathang WHERE SoDonDH='$msdh_update'");
                if ($chitiet->num_rows > 0) {
                    while($row = $chitiet->fetch_assoc()) {
                        $mshh = $row['MSHH'];
                        $slmua = $row['SoLuong'];
                        $hanghoa = $conn->query("UPDATE hanghoa
                                                 SET SoLuongHang=SoLuongHang-'$slmua'
                                                 WHERE MSHH='$mshh'");
                    }
                }
            }
            setcookie('thongbao_updateSuccess', 'Cập nhật đơn hàng thành công!', time() + 3, '/' );
            header('Location: ./order.php');
        } else {
            setcookie('thongbao_updateFail', 'Cập nhật đơn hàng thất bại!', time() + 3, '/' );
            header('Location: ./order.php');
        }
    }

	include('../header_master.php');

    $msdh = $_GET['msdh'];
    // select mskh với địa chỉ giao hàng
    $result_DH = $conn->query("SELECT * FROM dathang WHERE SoDonDH='$msdh'");
    while($row = $result_DH->fetch_assoc()) {
        $diachiGH = $row['DiaChiGH'];
        $mskh = $row['MSKH'];
        $trangthaidh = $row['TrangThaiDH'];
        $msnv_duyet = $row['MSNV'];
        $ngaygh = date("d-m-Y",strtotime($row['NgayGH']));
    }

    //Thông tin nhân viên duyệt đơn (nếu có)
    $info_nv = $conn->query("SELECT * FROM nhanvien WHERE MSNV='$msnv_duyet'");
    if($info_nv->num_rows >0){//Nếu có nhân viên duyệt
        $ten_nv_duyet = $info_nv->fetch_assoc()['HoTenNV'];
    }
    

    // select thông tin khách hàng
    $result_KH = $conn->query("SELECT * FROM khachhang WHERE MSKH='$mskh'");
    while($row = $result_KH->fetch_assoc()) {
        $ten_kh = $row['HoTenKH'];
        $sdt = $row['SoDienThoai'];
    }
?>

<main class="content order-details">
    <div class="container-fluid p-0 modal-content mb-5" >
        <h1 class="h3 mb-3"><strong>Thông Tin Chi Tiết Đơn Hàng</strong></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row form-container">
                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Số đơn đặt hàng</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" name="sodonDH" value="<?=$msdh?>" type="text" readonly="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tên khách hàng</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" name="tenKH" value="<?=$ten_kh?>" type="text" readonly="">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Địa chỉ</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$diachiGH?>" name="diachiKH" class="form-control" readonly="">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Số điện thoại</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$sdt?>" name="sdtKH" class="form-control" readonly="">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Nhân viên duyệt đơn</h5>
                        </div>
                        <div class="card-body">
                            <?php if($msnv_duyet == null): ?>
                                <input type="hidden" name="msnv_duyet" value="<?=$_COOKIE['login_nv']?>">
                                <input type="text" value="<?=$fullName?>" disabled name="tenNV" class="form-control" placeholder="Nhập tên nhân viên" required>
                            <?php else: ?>
                                <input type="hidden" name="msnv_duyet" value="<?=$msnv_duyet?>">
                                <input type="text" value="<?=$ten_nv_duyet?>" disabled name="tenNV" class="form-control" placeholder="Nhập tên nhân viên" required>
                            <?php endif;?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Trạng thái đơn hàng</h5>
                        </div>
                        <div class="card-body">
                            <?php if($msnv_duyet == null): ?>
                                <select class="form-select mb-0" name="trangthaiDH" required>
                                    <option value="Đã duyệt">Đã duyệt</option>
                                    <option value="Hủy đơn">Hủy</option>
                                </select>
                            <?php else: ?>
                                <input type="text" name="" value="<?=$trangthaidh?>" class="form-control" disabled>
                            <?php endif;?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ngày giao hàng dự kiến</h5>
                        </div>
                        <div class="card-body">
                            <?php if($msnv_duyet == null): ?>
                                <input type="date" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>" name="ngayGH" class="form-control">
                            <?php else: ?>
                                <input type="text" name="" value="<?=$ngaygh?>" class="form-control" disabled>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php if($msnv_duyet == null): ?>
                    <button class="btn btn-primary col-3" name="editOrder_submit" value="true" id="editOrder-saveBtn" type="submit">Lưu thay đổi</button>
                    <?php endif;?>
                    <a class="btn btn-secondary col-2" href="./order.php" id="edit-exitBtn">Thoát</a>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong id="showTongTien"></strong></h1>
		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>MSHH</th>
								<th class="d-none d-xl-table-cell">Tên HH</th>
								<th class="d-none d-xl-table-cell">Hình Ảnh</th>
								<th class="d-none d-xl-table-cell">Giá</th>
								<th class="d-none d-xl-table-cell">Số Lượng</th>
                                <th class="d-none d-xl-table-cell">Tổng</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$result_detail = $conn->query("SELECT * 
														   FROM chitietdathang
														   WHERE SoDonDH='$msdh'");
                                $tong=0;
								while($row = $result_detail->fetch_assoc()):
                                    $thanhtien = $row['GiaDatHang']*$row['SoLuong'];
                                    $tong += $thanhtien;

                                    $mshh = $row['MSHH'];
                                    $select_hh = $conn->query("SELECT a.TenHH, b.TenHinh 
                                                                FROM hanghoa as a
                                                                LEFT JOIN hinhhanghoa as b ON a.MSHH=b.MSHH 
                                                                WHERE a.MSHH='$mshh'");
                                    $row_hh = $select_hh->fetch_assoc();
                                        $tenhh = $row_hh['TenHH'];
                                        $tenhinh = $row_hh['TenHinh'];
                                    
							?>
							<tr>
								<td class="text-center"><?=$mshh?></td>
								<td class="d-none d-xl-table-cell tenhh"><?= $tenhh?></td>
								<td class="d-none d-xl-table-cell"><img src="../../client/img-product/<?= $tenhinh?>" alt="" width=100px height=100px></td>
                                <td class="d-none d-xl-table-cell"><?= number_format($row['GiaDatHang'])?>đ</td>
								<td class="d-none d-md-table-cell"><?= $row['SoLuong']?></td>
								<td class="d-none d-md-table-cell"><?=number_format($thanhtien)?>đ</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
        <input type="hidden" value="<?= number_format($tong)?>" id="getTong">
        <script>
            var val = document.getElementById('getTong').value;
            document.getElementById('showTongTien').innerHTML = "Tổng tiền: " + val + "VND";
        </script>
	</div>
</main>

<?php
	include('../footer_master.php');
?>