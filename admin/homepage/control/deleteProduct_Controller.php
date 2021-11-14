<?php
    require_once('../../../database/config.php');

    $mahh = $_GET['mshh'];
    //Lấy địa chỉ đường dân xóa hình
    $result_path = $conn->query("SELECT TenHinh FROM hinhhanghoa WHERE MSHH='$mahh'");
    $row_path = $result_path->fetch_assoc();
    
    $path_del_hinh = "../../../client/img-product/". $row_path['TenHinh'];

    //Xóa hình hàng hóa 
    $sql_delete_hinh = "DELETE FROM hinhhanghoa WHERE MSHH='$mahh'";
    $result_del_hinh = $conn->query($sql_delete_hinh);

    if($result_del_hinh === TRUE){
        
        //Xóa hình ảnh trong folder chứa ảnh của hàng hóa
        unlink($path_del_hinh);
        //Xóa hàng hóa
        $result_del = $conn->query("DELETE FROM hanghoa WHERE MSHH='$mahh'");
    
        if ($result_del === TRUE){
            setcookie('thongbao_success', "Xoá sản phẩm thành công!", time()+3, '/');
            header('Location: ../product.php');
        }else{
            setcookie('thongbao_fail', "Xoá sản phẩm thất bại!", time()+3, '/');
            header('Location: ../product.php');
        }     
    }else{
        setcookie('thongbao_fail', "Xoá sản phẩm thất bại!", time()+3, '/');
        header('Location: ../product.php');
    }
   
?>