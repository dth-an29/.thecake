<?php
    require_once('../../database/config.php');

	if(!isset($_COOKIE['login_nv'])){
		header('Location: ../');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../../client/assets/img/cake.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>AdminCake</title>

	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../homepage/index.php">
          <span class="align-middle"><img src="../../client/assets/img/cake.png" alt="" width=32> AdminCake</span>
        </a>

        <!-- sidebar nav  start-->
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Quản lý
					</li>

					<li class="sidebar-item" >
						<a class="sidebar-link" href="./order.php">
							<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Đơn Hàng</span>
						</a>
					</li>

					<li class="sidebar-item" >
						<a class="sidebar-link" href="./product.php">
							<i class="align-middle" data-feather="box"></i> <span class="align-middle">Hàng Hóa</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="./product_type.php">
              				<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Loại Hàng Hóa</span>
            			</a>
					</li>

					<?php
						if($_COOKIE['login_nv'] == 1):
					?>
						<li class="sidebar-item">
							<a class="sidebar-link" href="./staff.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Nhân viên</span>
							</a>
						</li>
					<?php
						endif;
					?>
					
				</ul>
        <!-- sidebar end -->
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<?php
										$result_count = $conn->query("SELECT COUNT(*) AS total
																	FROM dathang
																	WHERE TrangThaiDH='Chưa duyệt'");
										$row = $result_count->fetch_assoc();
									?>
									<span class="indicator"><?=$row['total']?></span>
								</div>
							</a>
              <!-- Thong bao -->
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								
								<div class="dropdown-menu-header">
									Có <?=$row['total']?> đơn hàng chưa được duyệt 
								</div>
							</div>
						</li>
            <!-- Thong bao end -->

            <!-- Tai khoan -->
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
			  			<?php
							if(isset($_COOKIE['login_nv'])) {
								$id_nv = $_COOKIE['login_nv'];
								$result_nv = $conn->query("SELECT HoTenNV FROM nhanvien WHERE MSNV='$id_nv'");
								$row = $result_nv->fetch_assoc();
								$fullName = $row['HoTenNV'];
                    			$arrName = explode(" ", $fullName);
                    			$lastName = array_pop($arrName);
							}  
						?>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="../../client/assets/img/cake.png" class="avatar img-fluid rounded me-1" alt="" /> <span class="text-dark"><?= $lastName ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<!-- <a class="dropdown-item" href="../homepage/profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div> -->
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="../login-register/logout_Controller.php"><i class="align-middle me-1" data-feather="log-out"></i>Log out</a>
							</div>
						</li>

            <!-- Tai khoan end -->
					</ul>
				</div>
			</nav>
