<html>
	<head>
		<title>Balai Penelitian Jeruk</title>
		<link rel="stylesheet" href="assets/css/additional.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	<body>
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
					<a class="nav-link active" href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Search</a>
				</li>
				<li class="nav-item">
					
				</li>
			</ul>
		</nav>
		
		<div class="container-fluid">
			<main class="" role="main">
				
				<!-- (1). Judul halaman -->
				<div class="row">
					<div class="mx-auto">
						<h1 class="bd-title"><?php echo $dataPageTitle; ?></h1>
					</div>
				</div>
				
				<!-- (2). Deskripsi halaman -->
				<div class="row">
					<div class="mx-auto">
						<div class="card border-0" style="width: 50rem;">
							<div class="card-body">
								<p>(Deskripsi)</p>
							</div>
						</div>
					</div>
				</div>
				
				<!-- (3). Form -->
				<div class="row">
					<div class="mx-auto">
						<div class="card bg-light" style="width: 50rem;">
							<div class="card-body">
								<form action="<?php echo base_url('permintaan_add'); ?>" method="post" aria-describedby="help_form_permintaan">
									<div class="form-group">
										<label for="input_nama_pemesan">Nama Pemesan<b class="text-danger">*</b></label>
										<input type="text" class="form-control" id="input_nama_pemesan" name="input_nama_pemesan" placeholder="Masukkan nama pemesan" required>
										<small class="form-text text-muted">Atas nama pesanan.</small>
									</div>
									<div class="form-group">
										<label for="input_kabupatenkota_pemesan">Kabupaten/Kota<b class="text-danger">*</b></label>
										<input type="text" class="form-control" id="input_kabupatenkota_pemesan" name="input_kabupatenkota_pemesan" placeholder="Masukkan kabupaten atau kota" required>
										<small class="form-text text-muted">Kabupaten atau kota yang akan dilakukan pendistribusian pesanan.</small>
									</div>
									<div class="form-group">
										<label for="input_alamat_distribusi">Alamat<b class="text-danger">*</b></label>
										<input type="text" class="form-control" id="input_alamat_pemesan" name="input_alamat_pemesan" placeholder="Masukkan alamat distribusi" required>
										<small class="form-text text-muted">Alamat pendistribusian pesanan.</small>
									</div>
									<div class="form-group">
										<label for="input_alamat_email_pemesan">Alamat Email (opsional)</label>
										<input type="text" class="form-control" id="input_alamat_email_pemesan" name="input_alamat_email_pemesan" placeholder="Masukkan alamat email pemesan">
										<small class="form-text text-muted">Alamat email pemesan agar diberitahukan informasi mengenai status pemesanan yang terkini.</small>
									</div>
									<div class="form-group">
										<label for="input_telepon">Nomor Telepon/HP<b class="text-danger">*</b></label>
										<input type="text" class="form-control" id="input_telepon" name="input_nomor_telepon" placeholder="Masukkan nomor telpon/HP" required>
										<small class="form-text text-muted">Nomor telepon/HP aktif yang dapat dihubungi.</small>
									</div>
									<div class="form-group">
										<label for="input_tanggal">Tanggal Selesai<b class="text-danger">*</b></label>
										<input type="date" class="form-control" id="input_tanggal" name="input_tanggal_selesai" required>
										<small class="form-text text-muted">Permintaan tenggat waktu selesai produksi.</small>
									</div>
									<!--dropdown varietas + jumlah per bp & bd-->
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="select_varietas">Varietas<b class="text-danger">*</b></label>
												<select class="form-control" id="select_varietas" name="select_varietas" required>
													<option>-- Pilih varietas --</option>
													<option>varietas 1</option>
													<option>varietas 2</option>
												</select>
												<small class="form-text text-muted">Pilih varietas dari benih yang diinginkan.</small>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="input_jumlah_bd">Jumlah Benih Dasar<b class="text-danger">*</b></label>
												<input type="number" class="form-control" id="input_jumlah_bd" name="input_jumlah_bd" placeholder="0" value="0" required>
												<small class="form-text text-muted">Jumlah benih dasar yang diinginkan.</small>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="input_jumlah_bp">Jumlah Benih Pokok<b class="text-danger">*</b></label>
												<input type="number" class="form-control" id="input_jumlah_bp" name="input_jumlah_bp" placeholder="0" value="0" required>
												<small class="form-text text-muted">Jumlah benih pokok yang diinginkan.</small>
											</div>
										</div>
									</div>
									<input type="hidden" name="hidden_timestamp" value=http://free.timeanddate.com/clock/i6t7omfd/n631/tlid38/th1>
									<hr>
									<small id="help_form_permintaan" class="form-text text-muted">(<b class="text-danger">*</b>) Diharuskan untuk mengisi bagian formulir.</small>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>