<?php
    setcookie('login_nv', '', time()-10, '/');
    header('Location: ../');
?>