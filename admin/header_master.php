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

					<li class="sidebar-item">
						<a class="sidebar-link" href="./staff.php">
              				<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Nhân viên</span>
						</a>
					</li>
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
									<span class="indicator">4</span>
								</div>
							</a>
              <!-- Thong bao -->
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
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
