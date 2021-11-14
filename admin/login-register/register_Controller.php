<?php
    require_once('../../database/config.php');

    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $sdt = $_POST['sdt'];
    $matkhau = md5($_POST['pass']);
    $diachi = $_POST['diachi'];

    $sql_register = "INSERT INTO nhanvien(HoTenNV, ChucVu, SoDienThoai, DiaChi, MatKhau) 
                    VALUES ('$hoten', '$chucvu', '$sdt', '$diachi', '$matkhau')";
    $result_register = $conn->query($sql_register);

    if($result_register === TRUE){
        setcookie('thongbao_success', 'Tạo tài khoản cho nhân viên thành công!', time() + 3, '/' );
        header('Location: ../homepage/staff.php');
    }else{
        setcookie('thongbao_fail', 'Tạo tài khoản cho nhân viên thất bại!', time() + 3, '/' );
        header('Location: ../homepage/staff.php');
    }

?>