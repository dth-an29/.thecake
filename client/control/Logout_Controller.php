<?php
    setcookie('login_kh', 'logout', time() - 30, '/');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>