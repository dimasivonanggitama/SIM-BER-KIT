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
					<a class="nav-link active" href="">Home</a>
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
						<h1 class="bd-title" id="permintaan">Formulir Permintaan</h1>
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
								<form action="" aria-describedby="help_form_permintaan">
									<div class="form-group">
										<label for="input_nama_pemesan">Nama Pemesan<b class="text-danger">*</b></label>
										<input type="text" class="form-control" id="input_nama_pemesan" placeholder="Masukkan nama pemesan" required>
									</div>
									<div></div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="select_status_pemesan">Status Pemesan<b class="text-danger">*</b></label>
												<select class="form-control" id="select_status_pemesan" name="status_pemesan" aria-describedby="help_status_pemesan" required>
													<option>-- Pilih status pemesan --</option>
													<option>Individu</option>
													<option>Instansi</option>
												</select>
												<small id="help_status_pemesan" class="form-text text-muted">Status anda sebagai pemesan, apakah pemesan individu atau bagian dari instansi.</small>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="input_atasnama_pemesanan">Atas Nama Pemesan<b class="text-danger">*</b></label>
												<input type="text" class="form-control" id="input_atasnama_pemesanan" aria-describedby="help_input_atasnama_pemesan" placeholder="Masukkan atas nama pemesan" disabled>
												<small id="help_input_atasnama_pemesan" class="form-text text-muted">Nama seorang pemesan yang merupakan perwakilan dari instansi.</small>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="input_telpon">Nomor Telepon/HP<b class="text-danger">*</b></label>
										<input type="number" class="form-control" id="input_telpon" aria-describedby="help_input_telpon" placeholder="Masukkan nomor telpon/HP" required>
										<small id="help_input_telpon" class="form-text text-muted">Nomor telepon/HP aktif yang dapat dihubungi.</small>
									</div>
									<div class="form-group">
										<label for="input_tanggal">Tanggal Selesai<b class="text-danger">*</b></label>
										<input type="date" class="form-control" id="input_tanggal" aria-describedby="help_input_tanggal" required>
										<small id="help_input_tanggal" class="form-text text-muted">Permintaan tenggat waktu produksi.</small>
									</div>
									<!--dropdown varietas + jumlah per bp & bd-->
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="input_varietas">Varietas<b class="text-danger">*</b></label>
												<select class="form-control" id="input_varietas" name="status_pemesan" aria-describedby="help_input_varietas" required>
													<option>-- Pilih varietas --</option>
													<option>varietas 1</option>
													<option>varietas 2</option>
												</select>
												<small id="help_input_varietas" class="form-text text-muted">Status anda sebagai pemesan, apakah individu atau bagian dari instansi.</small>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="input_jumlah_benih_dasar">Jumlah Benih Dasar<b class="text-danger">*</b></label>
												<input type="number" class="form-control" id="input_jumlah_benih_dasar" aria-describedby="help_input_jumlah_benih_dasar" placeholder="Enter email" value="0" required>
												<small id="help_input_jumlah_benih_dasar" class="form-text text-muted">Jumlah benih dasar yang diinginkan.</small>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label for="input_jumlah_benih_pokok">Jumlah Benih Pokok<b class="text-danger">*</b></label>
												<input type="number" class="form-control" id="input_jumlah_benih_pokok" aria-describedby="help_input_jumlah_benih_pokok" placeholder="Enter email" value="0" required>
												<small id="help_input_jumlah_benih_pokok" class="form-text text-muted">Jumlah benih pokok yang diinginkan.</small>
											</div>
										</div>
										<div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mx-auto">
												<button type="button" class="btn btn-light btn-sm border-secondary">
													<b><i class="mdi mdi-plus"></i></b>
													<b>+</b> Tambah Varietas
												</button>
											</div>
										</div>
									</div>
									
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