<?php
    require_once('../../../database/config.php');

    $maloaihang = $_GET['maloaihang'];

    // Lấy mshh de xoa hinh
    $result_mshh = $conn->query("SELECT MSHH FROM hanghoa WHERE MaLoaiHang='$maloaihang'");

    //Xóa hình hàng hóa thuộc mã loại hàng hóa theo mshh
    while( $row_mshh = $result_mshh->fetch_assoc()) {//Tạo mảng $row_mshh[] và duyệt nó
        //Lấy địa chỉ đường dân xóa hình
        $mshh = $row_mshh['MSHH'];
        $result_img = $conn->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH='$mshh'");//NGU
        $row_img = $result_img->fetch_assoc();
    
        $path_del_hinh = "../../../client/img-product/". $row_img['TenHinh'];
        //Xóa hình hàng hóa 
        $result_del_hinh = $conn->query("DELETE FROM hinhhanghoa WHERE  MSHH='$mshh'");

        if($result_del_hinh === TRUE){
            //Xóa hình ảnh trong folder chứa ảnh của hàng hóa
            $check_unlink = unlink($path_del_hinh);
        }
    }

    //Xóa hàng hóa và loại hàng hóa
    $result_del_hh = $conn->query("DELETE FROM hanghoa WHERE MaLoaiHang='$maloaihang'");
    $result_del_loai = $conn->query("DELETE FROM loaihanghoa WHERE MaLoaiHang='$maloaihang'");


    if ($check_unlink === TRUE && $result_del_hh === TRUE && $result_del_hinh === TRUE && $result_del_loai === TRUE){
        setcookie('thongbao_success', "Xoá loại hàng hóa thành công!", time()+3, '/');
        header('Location: ../product_type.php');
    }else{
        setcookie('thongbao_fail', "Xoá loại hàng hóa thất bại!", time()+3, '/');
        header('Location: ../product_type.php');
    }   
?>