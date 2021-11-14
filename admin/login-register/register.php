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
	<link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminCake</title>

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
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for your customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="./register_Controller.php" method="post" id="register_staff">
										<div class="mb-3">
											<label class="form-label">Tên</label>
											<input class="form-control form-control-lg" type="text" id="hoten" name="hoten" placeholder="Name Staff" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Chức vụ</label>
											<input class="form-control form-control-lg" type="text" id="chucvu" name="chucvu" placeholder="Enter staff position name" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Địa chỉ</label>
											<input class="form-control form-control-lg" type="text" id="diachi" name="diachi" placeholder="Enter staff address" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Số điện thoại</label>
											<input class="form-control form-control-lg" type="text" id="sdt" name="sdt" maxlength="10" placeholder="Enter staff email" required />
											<div id="check_sdt"></div>
										</div>
										<div class="mb-3">
											<label class="form-label">Mật khẩu</label>
											<input class="form-control form-control-lg" type="password" id="pass" name="pass" placeholder="Enter password" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Xác nhân mật khẩu</label>
											<input class="form-control form-control-lg" type="password" id="repass" name="repass" placeholder="Enter confirm password" required />
										</div>
										<p id="error_repass" style="color:red"></p>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign up</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
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
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="../assets/js/custom.js"></script>

</body>

</html>