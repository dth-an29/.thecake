<?php
    require_once('../../database/config.php');

    session_start(); 
    //them vo gio hang
    if(isset($_POST['addCart'])){
        $mshh = $_POST['mshh'];
        $slHang = $_POST['slHang'];

        $result_hh = $conn->query("SELECT a.TenHH, a.Gia, b.TenHinh
                                   FROM hanghoa as a
                                   LEFT JOIN hinhhanghoa as b On a.MSHH=b.MSHH
                                   WHERE a.MSHH='$mshh'");
        $row = $result_hh->fetch_assoc();
        $tenhh = $row['TenHH'];
        $gia = $row['Gia'];
        $tenhinh = $row['TenHinh'];

        $product = array('MSHH'=>$mshh,
                         'TenHH'=>$tenhh,
                         'Gia'=>$gia,
                         'TenHinh'=>$tenhinh,
                         'SoLuongMua'=> 1,
                         'SoLuongHang'=>$slHang
                        );
        //kiem tra xem co sp trong gio hang chua
        if(isset($_SESSION['cartStore'][$mshh])) {
            $slMua = $_SESSION['cartStore'][$mshh]['SoLuongMua'];
            //Nhỏ hơn số lượng trong kho thì mới thêm
            if($slMua < $slHang){
                $_SESSION['cartStore'][$mshh]['SoLuongMua']++;
                alert("Thêm vào giỏ hàng thành công!");
            }else{
                alert("Số lượng trong giỏ hàng đạt tối đa");
            }
        } else {
            $_SESSION['cartStore'][$mshh] = $product;
            alert("Thêm vào giỏ hàng thành công!"); 
        }

        //in gio hang hoa 
        foreach($_SESSION['cartStore'] as $items):
        ?>
            <div class="box">
                <a href="javascript:void();" onclick="deleteCart(<?=$items['MSHH']?>)"><i class="fas fa-times del-icon"></i></a>
                <img src="./img-product/<?=$items['TenHinh']?>" class="box-img" alt="">
                <div class="box-content">
                    <h3 class="box-title"><?=$items['TenHH']?></h3> 
                    <span class="box-span">quantity :</span>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-" onclick="minusProduct(<?=$items['MSHH']?>)">
                        <input aria-label="quantity" id="sl_product_cart<?=$items['MSHH']?>" readonly class="input-qty" value="<?=$items['SoLuongMua']?>" min="1" max="<?=$items['SoLuongHang']?>">
                        <input class="plus is-form" type="button" value="+" onclick="plusProduct(<?=$items['MSHH']?>, <?=$items['SoLuongHang']?>)">
                    </div>
                    <br>
                    <span class="box-span">price : </span>
                    <span class="box-price"><?=number_format($items['Gia'])?></span>
                </div>
            </div>
        <?php
        endforeach;
        ?>
            <script src="./assets/js/jquery-3.6.0.js"></script>
            <script>
                // tinh tong tien
                $.ajax({
                    type: "post",
                    url: "./control/Cart_Controller.php",
                    data: {
                        total: true, 
                    },
                    success: function(result) {
                        $('#value-total').html(result);
                    } 
                });
            </script>
        <?php
    }

    // xoa sp ra gio hang
    if(isset($_POST['deleteCart'])) {
        $mshh = $_POST['mshh'];
        unset($_SESSION['cartStore'][$mshh]); 
        
        $count = 0;
        //in gio hang hoa 
        foreach($_SESSION['cartStore'] as $items):
            $count++;
        ?>
            <div class="box">
                <a href="javascript:void();" onclick="deleteCart(<?=$items['MSHH']?>)"><i class="fas fa-times del-icon"></i></a>
                <img src="./img-product/<?=$items['TenHinh']?>" class="box-img" alt="">
                <div class="box-content">
                    <h3 class="box-title"><?=$items['TenHH']?></h3> 
                    <span class="box-span">quantity :</span>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-" onclick="minusProduct(<?=$items['MSHH']?>)">
                        <input aria-label="quantity" id="sl_product_cart<?=$items['MSHH']?>" readonly class="input-qty" value="<?=$items['SoLuongMua']?>" min="1" max="<?=$items['SoLuongHang']?>">
                        <input class="plus is-form" type="button" value="+" onclick="plusProduct(<?=$items['MSHH']?>, <?=$items['SoLuongHang']?>)">
                    </div>
                    <br>
                    <span class="box-span">price : </span>
                    <span class="box-price"><?=number_format($items['Gia'])?></span>
                </div>
            </div>
        <?php
        endforeach;
        if($count <1) {
            echo "<h1>Giỏ hàng rỗng!</h1>";
        }
        ?>
            <script src="./assets/js/jquery-3.6.0.js"></script>
            <script>
                // tinh tong tien
                $.ajax({
                    type: "post",
                    url: "./control/Cart_Controller.php",
                    data: {
                        total: true, 
                    },
                    success: function(result) {
                        $('#value-total').html(result);
                    } 
                });
            </script>
        <?php
    }

    //edit so luong sp trong gio hang
    if(isset($_POST['editSL'])) {
        $mshh = $_POST['mshh'];
        $newSL = $_POST['newSL'];
        $_SESSION['cartStore'][$mshh]['SoLuongMua'] = $newSL;

        foreach($_SESSION['cartStore'] as $items):
        ?>
            <div class="box">
                <a href="javascript:void();" onclick="deleteCart(<?=$items['MSHH']?>)"><i class="fas fa-times del-icon"></i></a>
                <img src="./img-product/<?=$items['TenHinh']?>" class="box-img" alt="">
                <div class="box-content">
                    <h3 class="box-title"><?=$items['TenHH']?></h3> 
                    <span class="box-span">quantity :</span>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-" onclick="minusProduct(<?=$items['MSHH']?>)">
                        <input aria-label="quantity" id="sl_product_cart<?=$items['MSHH']?>" readonly class="input-qty" value="<?=$items['SoLuongMua']?>" min="1" max="<?=$items['SoLuongHang']?>">
                        <input class="plus is-form" type="button" value="+" onclick="plusProduct(<?=$items['MSHH']?>, <?=$items['SoLuongHang']?>)">
                    </div>
                    <br>
                    <span class="box-span">price : </span>
                    <span class="box-price"><?=number_format($items['Gia'])?></span>
                </div>
            </div>
        <?php
        endforeach;
        ?>
            <script src="./assets/js/jquery-3.6.0.js"></script>
            <script>
                // tinh tong tien
                $.ajax({
                    type: "post",
                    url: "./control/Cart_Controller.php",
                    data: {
                        total: true, 
                    },
                    success: function(result) {
                        $('#value-total').html(result);
                    } 
                });
            </script>
        <?php
    }

    // tinh tong tien
    if(isset($_POST['total'])) {
        $tong = 0;

        if(isset($_SESSION['cartStore'])) {
            foreach($_SESSION['cartStore'] as $items):
                $tong += $items['Gia']*$items['SoLuongMua']; 
            endforeach;
        }

        echo number_format($tong)."đ" ; 
    }
?>