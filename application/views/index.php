<html>
	<head>
		<title>Balai Penelitian Jeruk</title>
		<link rel="stylesheet" href="assets/css/additional.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
	</head>
	<body>
		
		<!-- Welcome Background -->
		<div class="crop">
			<!-- <img src="assets/images/oranges_background.jpg" class="img-fluid" style="width: 100%" alt="oranges fruit's background"> -->
			<img src="assets/images/oranges_background.jpg" class="img-fluid w-100" alt="oranges fruit's background">
			<?php if ($this->session->has_userdata('loginfirst')) { ?>
				<div class="container alert alert-danger text-center" id="success-alert" style="position: fixed;">
					Anda harus <strong>Login</strong> terlebih dahulu!
				</div>
			<?php } ?>
			<?php if ($this->session->has_userdata('logout')) { ?>
				<div class="container alert alert-success text-center" id="success-alert" style="position: fixed;">
					Anda telah melakukan <strong>Logout</strong>.
				</div>
			<?php } ?>
			<?php if ($this->session->has_userdata('announcementText')) { ?>
				<div class="container alert alert-<?php echo $this->session->userdata('announcementColor'); ?> text-center" id="success-alert" style="position: fixed;">
					<?php echo $this->session->userdata('announcementText'); ?>
				</div>
			<?php } ?>
			<div class="center">
				<h1 style="font-size:4vw">Sistem Informasi <br>Manajemen Benih Sumber<br> Bebas Penyakit</h1>
			</div>
		</div>
		
		<!-- Navigation Bar -->
		<nav class="navbar navbar-light bg-light border border-secondary">
			<ul class="nav justify-content-end">
				<a class="navbar-brand" href="#"><img src="assets/images/logo/balitjestro.png" width="277" height="55"></img></a>
			    <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			    </button>-->
			</ul>
			<ul class="nav nav-pills nav-fill">
				<li class="nav-item">
					<a class="nav-link text-dark" href="#">
						<h4>
							<b>Home</b>
						</h4>
					</a>
				</li>
				<?php if ($this->session->has_userdata('admin') == NULL) { ?>
					<li class="nav-item">
						<a class="btn btn-outline-dark" data-toggle="modal" href="#form_login">
							<h4 class="mdi mdi-account">
								Login
							</h4>
						</a>
						
						<!-- Modal in login button -->
						<div class="modal fade" id="form_login" tabindex="-1" role="dialog" aria-labelledby="form_login_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title mdi mdi-alert" id="form_login_label"> LOGIN</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="<?php echo base_url('/login'); ?>" method="post">
										<div class="modal-body">
											<p class="modal-title" id="form_login_label">
												<h6>ANDA HARUS LOGIN TERLEBIH DAHULU</h6>
											</p>
											<div class="form-group">
												<label for="input_username">Username<b class="text-danger">*</b></label>
												<input class="form-control" name="input_username" placeholder="Masukkan username anda" type="text" required>
											</div>
											<div class="form-group">
												<label for="input_password">Password<b class="text-danger">*</b></label>
												<input class="form-control" name="input_password" placeholder="Masukkan password anda" type="password" required>
											</div>
										</div>
										<div class="modal-footer">
											<small class="form-text text-muted text-left">(<b class="text-danger">*</b>) Diharuskan untuk mengisi bagian formulir.</small>
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</nav>
		<p></p>
		
		<!-- Card Menu -->
		<div class="container-fluid">
			<main class="" role="main">
				<div class="row">
					<div class="mx-auto">
						<div class="card bg-light" style="width: 85rem;">
							<div class="card-deck">
								<a class="card border border-secondary text-dark" href="<?php echo site_url('infoKonsumen'); ?>">
									<div class="card-body">
										<h5 class="card-title text-center">INFORMASI KONSUMEN</h5>
										<p class="card-text">Informasi mengenai konsumen (perorangan/instansi).</p>
									</div>
								</a>
								<a class="card border border-secondary text-dark" href="<?php echo site_url('infoVarietasBenihSumberJeruk'); ?>">
									<div class="card-body">
										<h5 class="card-title text-center">INFORMASI VARIETAS</h5>
										<p class="card-text text-justify">Informasi mengenai jenis varietas harga benih sumber (Benih Dasar dan Benih Pokok).</p>
									</div>
								</a>
								<a class="card border border-secondary text-dark" href="<?php echo site_url('infoPermintaan'); ?>">
									<div class="card-body">
										<h5 class="card-title text-center">INFORMASI PERMINTAAN BENIH</h5>
										<p class="card-text text-justify">Informasi permintaan tahunan setiap varietas dan menampilkan form pendaftaran pemesanan benih.</p>
									</div>
								</a>
								<a class="card border border-secondary text-dark" href="<?php echo site_url('infoDistribusi'); ?>">
									<div class="card-body">
										<h5 class="card-title text-center">INFORMASI DISTRIBUSI BENIH</h5>
										<p class="card-text text-justify">Informasi mengenai pendistribusian benih tahunan.</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>
			$(document).ready (function showAlert() {
				$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
					$("#success-alert").slideUp(500);
				});  
			});
		</script>
	</body>
</html>