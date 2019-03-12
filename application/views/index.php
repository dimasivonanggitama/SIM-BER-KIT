<html>
	<head>
		<title>Balai Penelitian Jeruk</title>
		<link rel="stylesheet" href="assets/css/additional.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	<body>
		<!-- Welcome Background -->
		<div class="crop">
			<!-- <img src="assets/images/oranges_background.jpg" class="img-fluid" style="width: 100%" alt="oranges fruit's background"> -->
			<img src="assets/images/oranges_background.jpg" class="img-fluid w-100" alt="oranges fruit's background">
			<div class="center">
				<h1 style="font-size:4vw">Sistem Informasi <br>Manajemen Perbenihan Jeruk<br> BALITJESTRO</h1>
			</div>
		</div>
		
		<!-- Navigation Bar -->
		<nav class="navbar navbar-light bg-light border border-secondary">
			<ul class="nav justify-content-end">
				<a class="navbar-brand" href="#"><img src="assets/images/logo/balitjestro.png"></img></a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			    </button>
			</ul>
			<ul class="nav nav-pills nav-fill">
				<li class="nav-item">
					<a class="nav-link active" href="">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Search</a>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_login"><img src="assets/images/icons/tools.svg"></img></button>
					<div class="modal fade" id="form_login" tabindex="-1" role="dialog" aria-labelledby="form_login_label" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<img src="assets/images/icons/alert.svg"></img>
									<h5 class="modal-title" id="form_login_label">LOGIN</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?php echo site_url('/admin'); ?>" method="post">
									<div class="modal-body">
										<h6 class="modal-title" id="form_login_label">ANDA HARUS LOGIN TERLEBIH DAHULU</h6>
										
										<div class="form-group">
											<label for="input_username">Username</label>
											<input class="form-control" name="input_username" placeholder="Masukkan username anda" type="text">
										</div>
										<div class="form-group">
											<label for="input_password">Password</label>
											<input class="form-control" name="input_password" placeholder="Password" type="password" >
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</nav>
		<p></p>
		
		<!-- Card Menu -->
		<div class="container">
			<div class="card-deck">
				<div class="card border border-secondary">
					<div class="card-body">
						<h5 class="card-title text-center">INFORMASI JENIS BENIH</h5>
						<p class="card-text">Informasi mengenai permintaan, ketersediaan, dan produktivitas benih.</p>
					</div>
				</div>
				<div class="card border border-secondary">
					<div class="card-body">
						<h5 class="card-title text-center">INFORMASI HARGA BENIH</h5>
						<p class="card-text text-justify">Informasi mengenai harga benih terbaru.</p>
					</div>
				</div>
				<div class="card border border-secondary">
					<div class="card-body">
						<h5 class="card-title text-center">INFORMASI DISTRIBUSI BENIH</h5>
							<p class="card-text text-justify">Informasi mengenai alur distribusi benih.</p>
					</div>
				</div>
			</div>
		</div>
		
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>