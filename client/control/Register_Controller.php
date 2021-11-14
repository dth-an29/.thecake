<?php
    require_once('../../database/config.php');

    $hoten = $_POST['hoten'];
    $cty = $_POST['cty'];
    $sdt = $_POST['sdt'];
    $sofax = $_POST['so-fax'];
    $matkhau = md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];

    // echo "$hoten <br>";
    // echo "$cty <br>";
    // echo "$sdt <br>";
    // echo "$sofax <br>";
    // echo "$matkhau <br>";
    // echo "$diachi <br>";

    $sql_register = "INSERT INTO khachhang(HoTenKH, TenCongTy, SoDienThoai, SoFax, MatKhau) 
                    VALUES ('$hoten', '$cty', '$sdt', '$sofax', '$matkhau')";
    $result_register = $conn->query($sql_register);

    if($result_register === TRUE){
        $last_id_kh = $conn->insert_id;
        $sql_diachi = "INSERT INTO diachikh(DiaChi, MSKH) VALUES ('$diachi', '$last_id_kh')";
        $result_diachi = $conn->query($sql_diachi);

        if($result_diachi === TRUE){
            setcookie('thongbao_registerkh', 'Bạn đã đăng ký thành công!', time() + 3, '/' );
            header('Location: ../index.php');
        }
    }

?>