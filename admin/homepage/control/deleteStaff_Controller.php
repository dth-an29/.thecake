<?php
    require_once('../../../database/config.php');

    $msnv = $_GET['msnv'];

    $result_del = $conn->query("DELETE FROM nhanvien WHERE MSNV='$msnv'");

    if ($result_del === TRUE){
        setcookie('thongbao_success', "Xoá nhân viên thành công!", time()+3, '/');
        header('Location: ../staff.php');
    }else{
        setcookie('thongbao_fail', "Xoá nhân viên thất bại!", time()+3, '/');
        header('Location: ../staff.php');
    }    
   
?>