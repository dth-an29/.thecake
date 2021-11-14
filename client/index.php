<?php
    require_once('../database/config.php');

    session_start();
    // session_destroy();

    if(isset($_COOKIE['notify_login'])) {
        alert($_COOKIE['notify_login']);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.thecake</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/cake.png" />
    
    <link rel="stylesheet" href="./assets/css/styles.css">

    <style>
        
    </style>
</head>

<body>

    <!-- header section start -->
    <header class="header">
        <a href="./" class="logo"><i class="fas fa-cheese">Cake</i></a>
        <nav class="navbar">
            <a href="#home" class="nav-item">Home</a>
            <a href="#about" class="nav-item">About</a>
            <a href="#popular" class="nav-item">Popular</a>
            <a href="#menu" class="nav-item">Menu</a>
        </nav>

        <div class="nav-icons">
            <div id="menu-btn" class="fas fa-bars nav-icon-item"></div>
            <div id="search-btn" class="fas fa-search nav-icon-item"></div>
            <div id="cart-btn" class="fas fa-shopping-cart nav-icon-item"></div>
            <?php 
                if(isset($_COOKIE['login_kh'])): 
                    $id_kh = $_COOKIE['login_kh'];
                    $result_user = $conn->query("SELECT HoTenKH FROM khachhang WHERE MSKH='$id_kh' ");
                    $row = $result_user->fetch_assoc();
                    $fullName = $row['HoTenKH'];
                    $arrName = explode(" ", $fullName);
                    $lastName = array_pop($arrName);
            ?>
    
            <div class="fas fa-user nav-icon-item" id="user-drop" > <span><?= $lastName ?></span>
                <div class="user-dropdown-content"> 
                    <!-- <a href="#" class="drop-item"><i class="fas fa-user-plus"> <span>Info</span> </i></a> -->
                    <a href="./control/Logout_Controller.php" class="drop-item"><i class="fas fa-arrow-circle-right"> <span>Logout</span> </i></a>
                </div>
            </div>
            
            <!-- <a href="control/logout.php" class="fas fa-power-off nav-icon-item"></a> -->
            <?php else: ?>
                <div id="login-btn" class="fas fa-user nav-icon-item"></div>
            <?php endif; ?>
                <div id="login-btn" style="display: none;"></div>
            
        </div>
    </header>
    <!-- header section end -->

    <!-- search form section -->
    <section class="search-form-container">
        <form class="search-form" action="">
            <input type="search" name="" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search label-search"></label>
        </form>
    </section>

    <!-- shopping-cart section -->
    <section class="shopping-cart-container">
        <div class="cart-container">
            <h3 class="cart-title title">Your products</h3>
            <p id="tessttttt"> </p>
            <div class="box-container bd-grid" id="showCart">
                <?php
                    if(isset($_SESSION['cartStore'])):
                        $count_cart = 0;
                        foreach($_SESSION['cartStore'] as $items):
                            $count_cart++;
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
                                    <span class="box-price"><?=number_format($items['Gia'])?>đ</span>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        if($count_cart<1){
                            echo "<h1>Giỏ hàng rỗng!</h1>";
                        };
                    else: 
                        echo "<h1>Giỏ hàng rỗng!</h1>";
                    endif;
                ?>
            </div>
        </div>

        <div class="cart-total">
            <h3 class="cart-title title">Thanh toán</h3>
            
            <div class="khachhang cart-box box" style="font-size: 16px;">
                <?php 
                    if(isset($_COOKIE['login_kh'])): 
                        $id_kh = $_COOKIE['login_kh'];
                        $result_user = $conn->query("SELECT * 
                                                    FROM khachhang 
                                                    WHERE MSKH='$id_kh' ");
                        $row = $result_user->fetch_assoc();
                        $tenkh = $row['HoTenKH'];
                        $sdt = $row['SoDienThoai'];
                ?>
                <form action="./control/xuly_order.php" id="order-form" method="post">
                    <h3 class="total">Thông tin khách hàng</h3>
                    <table>
                        <tr>
                            <td>Họ và tên</td>
                            <td>:</td>
                            <td><?=$tenkh?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td><?=$sdt?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ giao hàng</td>
                            <td>:</td>
                            <td>
                                <select name="diachiGH" id="" class="form-control">
                                    <?php
                                        $diachikh = $conn->query("SELECT * FROM diachikh WHERE MSKH='$id_kh'");
                                        while($row = $diachikh->fetch_assoc()){
                                            echo "<option value='".$row['MaDC']."'>".$row['DiaChi']."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php endif;?>
            </div>

            <div class="cart-box box">
                <h3 class="total">Tổng tiền : <span id="value-total"></span></h3>

                <button type="submit" name="submit_order" form="order-form" class="btn">Đặt hàng</button>
            </div>
        </div>
    </section>

    <!-- login form -->
    <section class="login-form-container" id="login-form">
        <form action="control/Login_Controller.php" class="login-form" method="post">
            <h3 class="title">Login Form</h3>

            <input type="tel" name="username" placeholder="Enter your number phone" id="account" class="login-box" required>
            <input type="password" name="password" placeholder="Enter your password" id="pass" class="login-box" required>

            <div class="remember">
                <input type="checkbox" name="remember_me" id="remember-me" value="1">
                <label for="remember-me">Remember me</label>
            </div>

            <input type="submit" value="login now" class="login-btn btn">
            <!-- <p class="login-description">forget password?<a href="#" class="login-links"> click here</a></p> -->
            <p class="login-description">Don't have an account?<a href="#register-form" class="login-links" id="register"> Register</a></p>
        </form>
    </section>
    <!-- login form end -->

    <!-- register form start -->
    <section class="register-form-container" id="register-form">
        <form action="control/Register_Controller.php" class="register-form" method="post">
            <h3 class="title">Register Form</h3>
            <h3 class="register-description">The first step to becoming a member of The Cake</h3>

            <input type="text" name="hoten" placeholder="Enter your name" id="user-name" class="register-box" required>
            <input type="tel" name="cty" placeholder="Enter your company name" id="user-comp" class="register-box">
            <input type="tel" name="diachi" placeholder="Enter your adddress" id="user-addr" class="register-box" required>
            <input type="tel" name="sdt" placeholder="Enter your phone number" id="user-num" class="register-box" required>
            <input type="tel" name="so-fax" placeholder="Enter your fax number" id="user-fax" class="register-box">
            <input type="password" name="matkhau" placeholder="Enter your password" id="user-pass" class="register-box" required>


            <input type="submit" value="register now" class="register-btn btn">
        </form>
    </section>
    <!-- register form end -->


    <!-- home section start -->
    <section class="home" id="home">
        <div class="home-image">
            <img src="./assets/img/home.png" alt="" class="home-img">
        </div>

        <div class="home-content">
            <span class="home-welcome">Welcome Foodies</span>
            <h2 class="home-title">Different cakes for the different tastes 😉</h2>
            <p class="description">The Cake là tiệm bánh Nhật Bản kế thừa những công thức tâm đắc nhất
                của ông Tetsuya Suzuki. Năm 2005, từ xuất phát điểm là một xưởng
                bánh bỏ hoang trên con phố Láng Hạ, đến nay, Cake đã có gần 20 cửa hàng
                tại Cần Thơ. Ẩn chứa trong bất cứ chiếc bánh nhỏ bé nào tại đây, vẫn
                là hương vị thơm ngon thuở ban đầu với tình yêu và niềm đam mê trọn vẹn!</p>
            <a href="#menu" class="btn">order now</a>
        </div>
    </section>
    <!-- home section end -->

    <!-- about section start -->
    <section class="about" id="about">
        <div class="about-content">
            <span class="mixin-font">why choose us?</span>
            <h3 class="title">what's make our food delicious?</h3>
            <p class="description">Menu của the cake có hơn 150 hương vị khác nhau. Các loại
                hương liệu đều được nhập khẩu 100% từ Nhật Bản. Cùng
                công thức đặc biệt cắt giảm 1/3 calories so với bánh
                thông thường. Và bạn sẽ không mất cước phí điện thoại
                khi đặt bánh bằng hotline 1800 1296. Gọi ngay cho Cake
                để rinh bánh về nhé!!!</p>

            <div class="about-icons-container">
                <div class="about-icons">
                    <img src="./assets/img/serv-1.png" alt="" class="serv-img">
                    <h3>fast delivery</h3>
                </div>

                <div class="about-icons">
                    <img src="./assets/img/serv-2.png" alt="" class="serv-img">
                    <h3>best quality</h3>
                </div>
            </div>
        </div>

        <div class="about-image">
            <img src="./assets/img/banner1.png" alt="" class="about-img">
        </div>
    </section>
    <!-- about section end -->

    <!-- popular section start -->
    <section class="popular" id="popular">
        <div class="heading">
            <span class="mixin-font">popular cake</span>
            <h3 class="title">our special tastes</h3>
        </div>

        <?php 
            $result_hh = $conn->query("SELECT * 
                                       FROM hanghoa, hinhhanghoa, loaihanghoa 
                                       WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang 
                                       ORDER BY hanghoa.MSHH ASC
                                       LIMIT 4");
        ?>

        <div class="popular-container bd-grid">
            <?php while ($row = $result_hh->fetch_assoc()): ?>
            <div class="popular-box">
                <div class="popular-image">
                    <img src="./img-product/<?= $row['TenHinh'] ?>" alt="" class="popular-img">
                </div>

                <div class="popular-content">
                    <h3><?= $row['TenHH'] ?></h3>
                    <span class="product-category"><?= $row['TenLoaiHang'] ?></span>
                    <div class="popular-price"><?= number_format($row['Gia']) ?>đ <span>50.000đ</span></div>
                    <a href="javascript:void();" onclick="addCart(<?= $row['MSHH']?>, <?= $row['SoLuongHang']?>)" class="btn">add to cart</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- popular section end -->

    <!-- menu section start -->
    <section class="menu" id="menu">
        <div class="heading">
            <span class="mixin-font">our menu</span>
            <h3 class="title">our top tastes</h3>
        </div>

        <?php 
            $result_hh = $conn->query("SELECT * 
                                       FROM hanghoa, hinhhanghoa 
                                       WHERE hanghoa.MSHH = hinhhanghoa.MSHH
                                       ORDER BY hanghoa.MSHH DESC");
        ?>

        <div class="menu-container bd-grid">
            <?php while ($row = $result_hh->fetch_assoc()): ?>
            <div class="menu-content">
                <img src="./img-product/<?= $row['TenHinh'] ?>" alt="" class="menu-img">
                <h3><?= $row['TenHH'] ?></h3>
                <span class="menu-price"><?= number_format($row['Gia']) ?>đ</span>
                <a href="javascript:void();" onclick="addCart(<?= $row['MSHH'] ?>, <?= $row['SoLuongHang']?>)" class="menu-icon btn"><i class="fas fa-shopping-bag"></i></a>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- menu section end -->

    <!-- pagination -->
    <div class="pagination p1">
        <ul>
            <a href="#" onclick="return false"><li><</li></a>
            <a class="is-active" onclick="return false" href="#"><li>1</li></a>
            <a onclick="return false" href="#"><li>2</li></a>
            <a onclick="return false" href="#"><li>3</li></a>
            <a onclick="return false" href="#"><li>></li></a>
        </ul>
    </div>
    <!-- end pagination -->

    <!-- about product section start -->
    <section class="about-product" id="about-product">
        <h3 class="mixin-font about-product-title">About product</h3>
        <i class="fas fa-times product-icon" id="product-icon"></i>

        <div class="about-product-container">
            <div class="product-image">
                <img src="./assets/img/Chocolate Macaroon.jfif" alt="" class="product-img">
            </div>

            <div class="product-content">
                <h3>Chocolate Macaroon</h3>
                <span class="product-price">350.000đ</span>
                <p class="product-description">Những chiếc bánh macaroon mini bé bé xinh xinh ngọt ngào.</p>
                <br>
                <a href="#" class="btn">Add to cart</a>
            </div>
        </div>
    </section>
    <!-- about product section end -->
    
    <!-- footer section start -->
    <section class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <h3 class="footer-title">
                    <a href="#" class="footer-logo">The Cake</a>
                </h3>
                <p class="footer-description">Lưu giữ tinh hoa, ẩm thực Nhật Bản</p>
            </div>

            <div class="footer-content">
                <a href="https://www.facebook.com/aniee.2902/" class="footer-social fab fa-facebook-f"></a>
                <a href="#" class="footer-social fab fa-twitter"></a>
                <a href="#" class="footer-social fab fa-instagram"></a>
            </div>

            <p class="footer-copy">&#169; 2021 Do Thi Hong An. All right reserved.</p>
            <a href="../admin/">Trang dành cho admin</a>
        </div>
    </section>
    
    <script src="./assets/js/jquery-3.6.0.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>

<?php
    if(isset($_COOKIE['thongbao_registerkh'])){
        alert($_COOKIE['thongbao_registerkh']);
    }
?>