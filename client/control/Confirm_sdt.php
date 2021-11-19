<?php
    require_once('../../database/config.php');
    $sdt = $_POST['sdt'];
    $result = $conn->query("SELECT * FROM khachhang WHERE SoDienThoai='$sdt'");

    if($result->num_rows > 0){
        echo "<p id='comfirm_sdt' style='color: red; font-size: 1.4rem;'>* Số điện thoại đã tồn tại</p>";
    }else{
        echo "<p id='comfirm_sdt' style='color: green; font-size: 1.4rem;'>Số điện thoại có thể sử dụng</p>";
    }
?>