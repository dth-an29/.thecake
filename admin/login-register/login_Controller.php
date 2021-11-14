<?php 
    require_once('../../database/config.php');

    $sdt = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql_login = "SELECT * FROM nhanvien WHERE SoDienThoai='$sdt' AND MatKhau='$pass'";
    $result_login = $conn->query($sql_login);

    if($result_login->num_rows > 0){
        //login thanh cong
        $row = $result_login->fetch_assoc();

        //timlife=0: đăng nhập đến khi tắt trinh duyệt
        setcookie('login_nv', $row['MSNV'], 0, '/'); 
        header('Location: ../');
    }else{
        setcookie('thongbao_login', 'Bạn đã nhập sai tài khoản hoặc mật khẩu!', time()+3, '/');
        header('Location: ./login.php');
    }

?>