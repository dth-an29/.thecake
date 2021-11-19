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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminCake</title>

	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome to AdminCake</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="./login_Controller.php" method="post">
										<div class="mb-3">
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Nhập số điện thoại" />
										</div>
										<div class="mb-3">
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Nhập mật khẩu" />
											
										</div>
								
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Đăng nhập</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="../assets/js/app.js"></script>

</body>

</html>
<?php
	require_once('../../database/config.php');
	if(isset($_COOKIE['thongbao_login'])){
		alert($_COOKIE['thongbao_login']);
	}
?>