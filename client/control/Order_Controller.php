<?php
    require_once('../../database/config.php');

    session_start();
    $mskh = $_COOKIE['login_kh'];
    $diachi = null;
    if(isset($_POST['diachiGH_cu'])){
        $diachi = $_POST['diachiGH_cu'];
    }else if(isset($_POST['diachiGH_moi'])){
        $diachi = $_POST['diachiGH_moi']; 
        $insert_dc = $conn->query("INSERT INTO diachikh(DiaChi, MSKH) VALUES('$diachi', '$mskh')");
    }

    $result = $conn->query("INSERT INTO dathang(MSKH, TrangThaiDH, DiaChiGH) VALUES('$mskh', 'Chưa duyệt', '$diachi')");
    $sodon_dh = $conn->insert_id;

    foreach($_SESSION['cartStore'] as $item) {
        $mshh = $item['MSHH'];
        $sl = $item['SoLuongMua'];
        $gia = $item['Gia'];
        $giamgia = 0; 

        $result_insert = $conn->query("INSERT INTO chitietdathang VALUES('$sodon_dh', '$mshh', '$sl', '$gia', '$giamgia')");
    }

    if($result === true && $result_insert === true) {
        unset($_SESSION['cartStore']); 
        
        setcookie('noti_order', 'Bạn đã đặt hàng thành công!', time() + 3, '/' );
        header('Location: ../index.php');
    } else {
        setcookie('noti_order', 'Đặt hàng không thành công!', time() + 3, '/' );
        header('Location: ../index.php');
    }

?>