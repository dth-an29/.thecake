<?php
    if(isset($_COOKIE['login_nv'])){//Nếu đã đăng nhập
        header('Location: ./homepage/');
    }else{
        header('Location: ./login-register/login.php');
    }
?>