<?php 
    require_once('../../database/config.php');
    
    //Update hang hoa
    if(isset($_POST['edit_submit']) && $_POST['edit_submit'] == "true"){
        $mshh_update = $_POST['MSHH'];
        $tenhh_update = $_POST['TenHH'];
        $loaihh_update = $_POST['LoaiHH'];
        $gia_update = $_POST['GiaHH'];
        $soluong_update = $_POST['SoLuongHH'];
        $mota_update = $_POST['MoTa'];

        if($_FILES['hinhHH']['name'] != NULL):
            //Tên trên sever 
            $tmp_name = $_FILES['hinhHH']['tmp_name'];
            //Thêm hàm time để tránh trùng tên file 
            $name = time() . "-" . $_FILES['hinhHH']['name'];
            $path = "../../client/img-product/". $name;
            //Xóa ảnh cũ trong folder
            $row_tenhinh = $conn->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH='$mshh_update'")->fetch_assoc();
            $path_del = "../../client/img-product/".$row_tenhinh['TenHinh'];
            unlink($path_del);
            //Di chuyển file vào folder
            move_uploaded_file($tmp_name, $path);
            //Tên hình lưu vào CSDL
            $conn->query = "UPDATE hinhhanghoa 
                            SET TenHinh='$name'
                            WHERE MSHH='$mshh_update'";
        endif;

        //Update dữ liệu trong bảng hanghoa
        $update = $conn->query("UPDATE hanghoa 
                                SET TenHH='$tenhh_update', MoTa='$mota_update', Gia='$gia_update', SoLuongHang='$soluong_update', MaLoaiHang='$loaihh_update'
                                WHERE MSHH='$mshh_update'");
        
        if($update === TRUE) {
            setcookie('thongbao_updateSuccess', 'Cập nhật hàng hóa thành công!', time() + 3, '/' );
            header('Location: ./product.php');
        } else {
            setcookie('thongbao_updateFail', 'Cập nhật hàng hóa thất bại!', time() + 3, '/' );
            header('Location: ./product.php');
        }
    }

    include('../header_master.php');

    $mshh = $_GET['mshh'];

    $result_hh = $conn->query("SELECT a.*, b.TenHinh 
                                FROM hanghoa as a
                                LEFT JOIN hinhhanghoa as b ON a.MSHH=b.MSHH 
                                WHERE a.MSHH='$mshh'");
                                
    //Chỉ có 1 nên vầy là được không cần lập mảng
    $row = $result_hh->fetch_assoc();
        $tenhh = $row['TenHH'];
        $gia = $row['Gia'];
        $sl = $row['SoLuongHang'];
        $mota = $row['MoTa'];
        $loaihh = $row['MaLoaiHang'];
        $hinh = $row['TenHinh'];

?>
<main class="content edit_product_BG">
    <div class="container-fluid p-0 modal-content edit_product_BG" >
        <h1 class="h3 mb-3"><strong>Thông tin hàng hóa</strong></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row form-container">
                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">MSHH</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" name="MSHH" value="<?=$mshh?>" type="text" placeholder="Mã hàng hóa ở đây" readonly="">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tên HH</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$tenhh?>" name="TenHH" class="form-control" placeholder="Nhập tên hàng hóa" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Loại HH</h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select mb-3" name="LoaiHH" required>
                               
                                <?php
                                    $result_loaihh = $conn->query("SELECT * FROM loaihanghoa");

                                    while($row_loai = $result_loaihh->fetch_assoc()){
                                        $tenloaihang = $row_loai['TenLoaiHang'];
                                        $maloaihang = $row_loai['MaLoaiHang'];
                                        if($maloaihang == $loaihh){
                                            echo " <option selected value='$maloaihang'>$tenloaihang</option>";
                                        }else{
                                            echo " <option value='$maloaihang'>$tenloaihang</option>";
                                        }
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
                            <input type="file" name="hinhHH" onchange="readURL(this)" id="hinhHH" required>
                            <img src="../../client/img-product/<?=$hinh?>" width="100px" id="hinh_demo" alt="">

                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#hinh_demo')
                                                .attr('src', e.target.result);
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 form-group">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Giá</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$gia?>" name="GiaHH" class="form-control" placeholder="Nhập giá hàng hóa" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" >Số lượng</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" value="<?=$sl?>" name="SoLuongHH" class="form-control" placeholder="Nhập số lượng hàng hóa" required>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mô tả</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" name="MoTa" rows="2" placeholder="Nhập mô tả hàng hóa" required><?=$mota?></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary col-3" name="edit_submit" value="true" id="edit-saveBtn" type="submit">Lưu thay đổi</button>
                    <a class="btn btn-secondary col-2" href="./product.php" id="edit-exitBtn">Thoát</a>
                </div>
            </div>
        </form>
    </div>
</main>


<?php 
	include('../footer_master.php');
?>
