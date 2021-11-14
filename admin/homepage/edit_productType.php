<?php
    require_once('../../database/config.php');

	if(isset($_POST['editType_submit']) && $_POST['editType_submit'] == "true") {
        $maloai_update = $_POST['MaLoai'];
        $tenloai_update = $_POST['TenLoai'];


        $update_staff = $conn->query("UPDATE loaihanghoa 
                                    SET TenLoaiHang='$tenloai_update'
                                    WHERE MaLoaiHang='$maloai_update'");
        
        if($update_staff === TRUE) {
			setcookie('thongbao_updateSuccess', 'Cập nhật loại hàng hóa thành công!', time() + 3, '/' );
			header('Location: ./product_type.php');
		} else {
			setcookie('thongbao_updateFail', 'Cập nhật loại hàng hóa thất bại!', time() + 3, '/' );
			header('Location: ./product_type.php');
		}
    }

	include('../header_master.php');

    $maloai = $_GET['maloaihang'];

    $result_loai = $conn->query("SELECT * FROM loaihanghoa WHERE MaLoaiHang='$maloai'");

    $row = $result_loai->fetch_assoc();
        $tenloai = $row['TenLoaiHang'];
?>

<main class="content edit-productType">
        <div class="container-fluid p-0 modal-content">
            <h1 class="h3 mb-3"><strong>Thông tin loại hàng hóa</strong></h1>
			
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row form-container">
               		<div class="col-12 col-lg-6 form-group">
					   <div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Mã Loại Hàng</h5>
							</div>
							<div class="card-body">
								<input class="form-control" type="text" name="MaLoai" value="<?=$maloai?>" placeholder="Auto" readonly="">
							</div>
						</div>
                	</div>

                	<div class="col-12 col-lg-6 form-group">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">Tên Loại Hàng</h5>
							</div>
							<div class="card-body">
								<input type="text" class="form-control" name="TenLoai" value="<?=$tenloai?>" placeholder="Nhập tên loại hàng hóa" required>
							</div>
						</div>

                        <button class="btn btn-primary col-3" name="editType_submit" value="true" id="editType-saveBtn" type="submit">Lưu thay đổi</button>
						<a href="./product_type.php" class="btn btn-secondary col-2" id="editType-exitBtn">Thoát</a>
                	</div>
				</div>
			</form>
        </div>
</main>

<?php
	include('../footer_master.php');
?>