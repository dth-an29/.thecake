<?php
    require_once('../../database/config.php');

    $mshh = $_POST['mshh'];

    $result_hh = $conn->query("SELECT a.*, b.TenHinh
                                FROM hanghoa as a
                                LEFT JOIN hinhhanghoa as b On a.MSHH=b.MSHH
                                WHERE a.MSHH='$mshh'");
        $row = $result_hh->fetch_assoc();
        $tenhh = $row['TenHH'];
        $mota = $row['MoTa'];
        $soluong = $row['SoLuongHang'];
        $gia = number_format($row['Gia'])."đ";
        $tenhinh = $row['TenHinh'];
?>

<div class="product-image">
    <img src="./img-product/<?=$tenhinh?>" alt="" class="product-img">
</div>

<div class="product-content">
    <h3><?=$tenhh?></h3>
    <span class="product-price"><?=$gia?></span>
    <p class="product-description"><?=$mota?></p>
    <br>
    <div id="quantity_product">
        Số lượng còn lại: <?=$soluong?>
    </div>
    <br>
    <a href="javascript:void();" onclick="addCart(<?= $mshh?>, <?= $soluong?>)" class="btn">Add to cart</a>
</div>