<?php
    require_once('../../../database/config.php');

    $ten_hh = $_POST['tenHH'];
    $loai_hh = $_POST['loaiHH'];
    $gia_hh = $_POST['giaHH'];
    $soluong = $_POST['soluongHH'];
    $mota = $_POST['motaHH']; 
    $tenhinh = "";
    if($_FILES['hinhHH']['name'] != NULL){
        //Tên trên sever 
        $tmp_name = $_FILES['hinhHH']['tmp_name'];
        //Thêm hàm time để tránh trùng tên file 
        $name = time() . "-" . $_FILES['hinhHH']['name'];
        $path = "../../../client/img-product/". $name;

        //Di chuyển file vào folder
        move_uploaded_file($tmp_name, $path);
        //Tên hình lưu vào CSDL
        $tenhinh = $name;
        $check_img = true;
    }else{
        echo "Không tìm thấy ảnh";
        $check_img = false;
    }

    if($check_img === TRUE) {
        $sql_insert = "INSERT INTO hanghoa(TenHH, MoTa, Gia, SoLuongHang, MaLoaiHang) 
                    VALUES ('$ten_hh', '$mota', '$gia_hh', '$soluong', '$loai_hh')";
        $result_insert = $conn->query($sql_insert);

        if($result_insert === TRUE) {
            $last_id_hh = $conn->insert_id;
            $sql_hinh = "INSERT INTO hinhhanghoa(TenHinh, MSHH) VALUES ('$tenhinh', '$last_id_hh')";
            $result_hinh = $conn->query($sql_hinh);
    
            if($result_hinh === TRUE){
                setcookie('thongbao_addSuccess', 'Thêm hàng hóa thành công!', time() + 3, '/' );
                header('Location: ../product.php');
            }
        }
    } else {
        setcookie('thongbao_addFail', 'Thêm hàng hóa thất bại!', time() + 3, '/' );
        header('Location: ../product.php');
    }
    


?>