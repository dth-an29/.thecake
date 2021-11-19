<?php
    require_once('../../database/config.php');

    $keyword = $_POST['keyword'];
    $result_hh = $conn->query("SELECT a.*, b.TenHinh
                               FROM hanghoa AS a
                               LEFT JOIN hinhhanghoa AS b ON a.MSHH=b.MSHH
                               WHERE a.TenHH 
                               LIKE '%$keyword%'");

?>


<div class="menu-container bd-grid">
    <?php while ($row = $result_hh->fetch_assoc()): ?>
    <div class="menu-content">
        <img src="./img-product/<?= $row['TenHinh'] ?>" onclick="showDetail(<?=$row['MSHH']?>);" alt="" class="search-img">
        <h3><?= $row['TenHH'] ?></h3>
        <span class="menu-price"><?= number_format($row['Gia']) ?>đ</span>
        <a href="javascript:void();" onclick="addCart(<?= $row['MSHH'] ?>, <?= $row['SoLuongHang']?>)" class="search-icon btn"><i class="fas fa-shopping-bag"></i></a>
    </div>
    <?php endwhile; ?>
</div>