<?php
    require_once('../../../database/config.php');

    $ten_loai = $_POST['tenLoai'];

    $result_insert = $conn->query("INSERT INTO loaihanghoa(TenLoaiHang) VALUES('$ten_loai')");

    if($result_insert === TRUE){
        setcookie('thongbao_addSuccess', 'Thêm loại hàng hóa thành công!', time() + 3, '/' );
        header('Location: ../product_type.php');
    } else {
        setcookie('thongbao_addFail', 'Thêm loại hàng hóa thất bại!', time() + 3, '/' );
        header('Location: ../product_type.php');
    }
?>