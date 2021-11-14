<?php
	include('../header_master.php');
?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="mb-3">
			<h1 class="h3 d-inline align-middle">Thông Tin Cá Nhân</h1>
		</div>
		
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">MSNV</h5>
					</div>
					<div class="card-body">
						<input class="form-control" type="text" placeholder="Mã nhân viên ở đây" readonly="">
					</div>
				</div>

                <div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Tên NV</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control" placeholder="Tên nhân viên">
					</div>
				</div>
            </div>

            <div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Hình NV</h5>
					</div>
					<div class="card-body">
						<input type="file" name="" id="hinhHH">
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Chức vụ</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control" placeholder="Chức vụ nhân viên">
					</div>
				</div>
            </div>

			<div class="col-12 col-xxl-12">
				<button class="btn btn-primary col-1">Lưu</button>
			</div>
		</div>
	</div>
</main>
<?php
	include('../footer_master.php');
?>