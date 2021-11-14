<?php
    require_once('../../database/config.php');
    $sdt = $_POST['sdt'];

    $result = $conn->query("SELECT * FROM nhanvien WHERE SoDienThoai='$sdt'");

    if($result->num_rows > 0){
        echo "<p id='comfirm_sdt' style='color: red'>Số điện thoại đã tồn tại</p>";
    }else{
        echo "<p id='comfirm_sdt' style='color: green'>Số điện thoại có thể sử dụng</p>";
    }
?>
