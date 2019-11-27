<html>
	<head>
		<title>Informasi Permintaan Benih | SIM-BER-KIT</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/additional_dashboard.css'); ?>">
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
		
		<?php if ($this->session->has_userdata('successMessage')) { ?>
			<div class="modal fade" id="successMessageModal" tabindex="-1" role="dialog" aria-labelledby="form_failedMessage_label" aria-hidden="true"1>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title mdi mdi-email text-success" id="form_failedMessage_label"> PEMBERITAHUAN</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="modal-title" id="form_failedMessage_label">
								<h6><?php echo $this->session->userdata('successMessage'); ?></h6>
								<?php $this->session->unset_userdata('successMessage'); ?>
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if ($this->session->has_userdata('failedMessage')) { ?>
			<div class="modal fade" id="failedMessageModal" tabindex="-1" role="dialog" aria-labelledby="form_failedMessage_label" aria-hidden="true"1>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title mdi mdi-alert text-danger" id="form_failedMessage_label"> PERINGATAN</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="modal-title" id="form_failedMessage_label">
								<h6><?php echo $this->session->userdata('failedMessage'); ?></h6>
								<?php $this->session->unset_userdata('failedMessage'); ?>
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
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
								<form action="<?php echo base_url('guestIntersection/postDataPermintaan/'.$dataPageURL.'/'.$dataTableName); ?>" method="post" aria-describedby="help_form_permintaan">
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
												<select class="form-control selectpicker" data-live-search="true" id="select_varietas" name="select_varietas" required>
													<option>-- Pilih varietas --</option>
													<?php for ($i = 0; $i < count($dataNamaMenuVarietas); $i++) { ?>
														<option value="<?php echo $dataNamaMenuVarietas[$i]; ?>"><?php echo $dataNamaMenuVarietas[$i]; ?></option>
													<?php } ?>
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
				<br>
				
				<!-- (8). Footer -->
				<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
					<small class="text-muted mx-auto">Copyright ©
						<script type="text/javascript">
							document.write(new Date().getFullYear());
						</script>
						All rights reserved. <a href="<?php site_url('/'); ?>" rel="nofollow">SIM-BER-KIT</a>.
					</small>
				</footer>
			</main>
		</div>
		<script src="<?php echo base_url('assets/js/additional_dashboard.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script>
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
			
			$(document).ready (function showAlert() {
				$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
					$("#success-alert").slideUp(500);
				});  
			});
			
			$(window).on('load',function(){
				$('#failedMessageModal').modal('show');
				$('#successMessageModal').modal('show');
			});
		</script>
	</body>
</html>