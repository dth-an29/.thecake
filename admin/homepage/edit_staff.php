<?php 
	require_once('../../database/config.php');

    if(isset($_POST['editStaff_submit']) && $_POST['editStaff_submit'] == "true") {
        $manv_update = $_POST['MSNV'];
        $tennv_update = $_POST['TenNV'];
        $chucvu_update = $_POST['ChucVu'];
        $diachi_update = $_POST['DiaChi'];
        $sdt_update = $_POST['SoDT'];
        $mk_update = md5($_POST['MSNV']);

        $update_staff = $conn->query("UPDATE nhanvien 
                                    SET HoTenNV='$tennv_update', ChucVu='$chucvu_update', DiaChi='$diachi_update', SoDienThoai='$sdt_update', MatKhau='$mk_update'
                                    WHERE MSNV='$manv_update'");
        
        if($update_staff === TRUE) {
			setcookie('thongbao_updateSuccess', 'Cập nhật thông tin nhân viên thành công!', time() + 3, '/' );
			header('Location: ./staff.php');
		} else {
			setcookie('thongbao_updateFail', 'Cập nhật thông tin nhân viên thất bại!', time() + 3, '/' );
			header('Location: ./staff.php');
		}
    }

	include('../header_master.php');

    $msnv = $_GET['manv'];

    $result_staff = $conn->query("SELECT * FROM nhanvien WHERE MSNV='$msnv'");
    while($row = $result_staff->fetch_assoc()) {
        $tennv = $row['HoTenNV'];
        $chucvu = $row['ChucVu'];
        $diachi = $row['DiaChi'];
        $sdt = $row['SoDienThoai'];
        $matkhau = $row['MatKhau'];
    }

?>


<main class="content edit_staff">
    <div class="container-fluid p-0 modal-content" >
        <h1 class="h3 mb-3"><strong>Thông tin nhân viên</strong></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row form-container">
                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">MSNV</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" name="MSNV" value="<?=$msnv?>" type="text" readonly="">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tên Nhân Viên</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$tennv?>" name="TenNV" class="form-control" placeholder="Nhập tên nhân viên" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Chức Vụ</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$chucvu?>" name="ChucVu" class="form-control" placeholder="Nhập chức vụ" required>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Địa Chỉ</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$diachi?>" name="DiaChi" class="form-control" placeholder="Nhập địa chỉ" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" >Số Điện Thoại</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$sdt?>" name="SoDT" class="form-control" placeholder="Nhập số điện thoại" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mật Khẩu</h5>
                        </div>
                        <div class="card-body">
                            <input type="password" class="form-control" name="MatKhau" value="<?=$matkhau?>" readonly=""></input>
                        </div>
                    </div>

                    <button class="btn btn-primary col-3" name="editStaff_submit" value="true" id="editStaff-saveBtn" type="submit">Lưu thay đổi</button>
                    <a class="btn btn-secondary col-2" href="./staff.php" id="edit-exitBtn">Thoát</a>
                </div>
            </div>
        </form>
    </div>
</main>

<?php 
	include('../footer_master.php');
?>