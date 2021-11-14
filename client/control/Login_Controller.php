<?php
    require_once('../../database/config.php');

    $sdt = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $remember_me = 0;

    if(isset($_POST['remember_me'])):
        $remember_me = $_POST['remember_me'];
    endif;

    $sql_login = "SELECT * FROM khachhang WHERE SoDienThoai='$sdt' AND MatKhau='$matkhau'";
    $result_login = $conn->query($sql_login);

    if($result_login->num_rows > 0){
        //login thanh cong
        $row = $result_login->fetch_assoc();

        if($remember_me = 0){
            setcookie('login_kh', $row['MSKH'], 0, '/');
        }else{
            setcookie('login_kh', $row['MSKH'], time() +7*24*3600, '/');
        }
        header('Location: ../');
    } else {
        setcookie('notify_login', "Tài khoản hoặc mật khẩu sai!", time() + 3, '/');
        header('Location: ../'); 
    }
?>