<!DOCTYPE HTML>
<html class="no-js h-100" lang="en">
	<head>
		<!-- Daftar isi:  -->
		<!-- (1). Navigation Bar (Navbar)  -->
		<!-- (2). Judul Halaman -->
		<!-- (3). Deskripsi Halaman   -->
		<!-- (4). Mini Menu and Accordion Form -->
		<!-- (5). Tabel -->
		<!-- (6). Tabel -->
		<!-- (7). Footer -->
		<title>Balai Penelitian Jeruk</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/additional_dashboard.css'); ?>">
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<!--<link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="/assets/css/shards-dashboards.1.0.0.min.css">-->
	</head>
	<body style="background-color:#F0F0F0">
		<!-- (1). Navigation Bar -->
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
				
				<!-- (2). Judul halaman -->
				<div class="row">
					<div class="mx-auto">
						<h1 class="bd-title" id="permintaan">Informasi Varietas Benih Sumber Jeruk</h1>
					</div>
				</div>
				
				<!-- (3). Deskripsi halaman -->
				<div class="container">
					<div class="row">
						<div class="col">
							<p>(Deskripsi)</p>
						</div>
					</div>
				</div>
				
				<!-- (4). Mini Menu and Accordion Form -->
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="accordion" id="accordionMiniForm">
								<!-- (4a). Search Menu -->
								<div class="card">
									<div class="card-header" id="headingOne">
										<h2 class="mb-0">
											<button aria-controls="collapseOne" aria-expanded="false" class="btn" data-target="#collapseOne" data-toggle="collapse" id="button_filter_dataKonsumen" onclick="changeFilterButtonColor()" style="background-color: <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Filter Hasil</button>
											<button aria-controls="collapseTwo" aria-expanded="false" class="btn" data-target="#collapseTwo" data-toggle="collapse" id="button_urut_dataKonsumen" onclick="changeUrutButtonColor()" style="background-color: <?php if ($this->session->userdata('sortOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Urutkan Berdasarkan</button>
										</h2>
									</div>
									<div id="collapseOne" class="collapse <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> show <?php } ?>" aria-labelledby="headingOne" data-parent="#accordionMiniForm">
										<div class="card-body">
											<form action="<?php echo base_url('guestIntersection/filterTable/'.$dataPageURL); ?>" method="post">
												<div class="row">
													<div class="col">
														<div class="form-group">
															<input class="form-control" name="input_filter" placeholder="Kata kunci ..." type="text" <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> value="<?php echo $this->session->userdata['filterOption_data']['filterWords']; } ?>" required>
														</div>
													</div>
													<div class="col">
														<div class="form-group">
															<select class="form-control" name="select_filter_option" required>
																<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == NULL) { ?>
																	<option value="not selected">-- Cari berdasarkan --</option>
																	<?php for ($i = 0; $i < count($dataValueKolom); $i++) { ?>
																		<?php if ($dataNamaKolom[$i] != "ID") { ?>
																			<option value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																		<?php } ?>
																	<?php } ?>
																<?php } else { ?>
																	<?php for ($i = 0; $i < count($dataValueKolom); $i++) {	?>
																		<?php if ($dataNamaKolom[$i] != "ID") { ?>
																			<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == $dataValueKolom[$i]) { ?>
																				<option class="bg-success text-white" value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																				<?php for ($j = 0; $j < count($dataValueKolom); $j++) { ?>
																					<?php if ($dataValueKolom[$i] != $dataValueKolom[$j] && $dataNamaKolom[$j] != "ID") { ?>
																						<option value="<?php echo $dataValueKolom[$j]; ?>"><?php echo $dataNamaKolom[$j]; ?></option>
																					<?php } ?>
																				<?php } ?>
																			<?php }	?>
																		<?php }	?>
																	<?php }	?>
																<?php }	?>
															</select>
															<small class="form-text text-muted">Cari berdasarkan kolom.</small>
														</div>
													</div>
													<div class="col">
														<button type="submit" class="btn btn-primary">Submit</button>
														<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
															<a class="btn btn-danger" href="<?php echo base_url('guestIntersection/reset_filterTable/'.$dataPageURL); ?>">Reset</a>
														<?php } ?>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<div class="form-check">
															<input type="checkbox" class="form-check-input" id="checkBox_specificFiltering" name="checkBox_specificFiltering" <?php if ($this->session->has_userdata('filterOption_data')) { if ($this->session->userdata['filterOption_data']['specificFiltering'] == 'on') { ?> checked <?php } } ?> >
															<label class="form-check-label" for="checkBox_specificFiltering">Cari spesifik kata</label>
															<small class="form-text text-muted">Mencari hasil persis dengan kata yang ingin dicari. <br> Jika tidak memilih opsi ini, maka akan otomatis mencari apapun yang mengandung kata yang ingin dicari.</small>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								
								<!-- (4b). Sort Menu -->
								<div class="card">
									<div id="collapseTwo" class="collapse <?php if ($this->session->userdata('sortOption_data') != NULL) { ?> show <?php } ?>" aria-labelledby="headingTwo" data-parent="#accordionMiniForm">
										<div class="card-body">
											<form action="<?php echo base_url('guestIntersection/sortTable/'.$dataPageURL); //base_url('sortTable/guest/'.$dataPageURL); ?>" method="post">
												<div class="row">
													<div class="col">
														<div class="form-group">
															<select class="form-control" name="select_sort_option" required>
																<?php for($i = 0; $i < count($dataValueKolom); $i++) { ?>
																	<?php if ($dataNamaKolom[$i] == "ID") { ?>
																		<?php continue; ?>
																	<?php } else { ?>
																		<?php if ($this->session->userdata['sortOption_data']['sortedBy'] == $dataValueKolom[$i]) { ?>
																			<option class="bg-success text-white" value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																			<?php for ($j = 0; $j < count($dataValueKolom); $j++) { ?>
																				<?php if ($dataValueKolom[$i] != $dataValueKolom[$j] && $dataNamaKolom[$j] != "ID") { ?>
																					<option value="<?php echo $dataValueKolom[$j]; ?>"><?php echo $dataNamaKolom[$j]; ?></option>
																				<?php } ?>
																			<?php } ?>
																		<?php } else { ?>
																			<option value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																		<?php } ?>
																	<?php } ?>
																<?php } ?>
															</select>
															<small class="form-text text-muted">Urutkan berdasarkan kolom.</small>
														</div>
														<div class="form-check">
															<input class="form-check-input" id="checkBox_sortingDirection" name="checkBox_sortingDirection" type="checkbox" <?php if ($this->session->userdata('sortOption_data') != NULL) { if ($this->session->userdata['sortOption_data']['backwardDirection'] == 'on') { ?> checked <?php } } ?> >
															<label class="form-check-label" for="checkBox_sortingDirection">Urutkan dari Z->A</label>
															<small class="form-text text-muted">Diurutkan dari awalan huruf Z ke huruf A. <br> Jika tidak memilih opsi ini, maka akan otomatis mengurutkan dari A->Z.</small>
														</div>
													</div>
													<div class="col">
														<button type="submit" class="btn btn-primary">Submit</button>
														<?php if ($this->session->userdata('sortOption_data') != NULL) { ?>
															<a class="btn btn-danger" href="<?php echo base_url('guestIntersection/reset_sortTable/'.$dataPageURL); ?>">Reset</a>
														<?php } ?>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				
				<!-- (5). Status keterangan filter / sort. -->
				<div class="container">
					<div class="row">
						<div class="col">
							<?php if ($this->session->has_userdata('filterInfo_failed')) { ?>
								<?php $this->session->unset_userdata('filterInfo_failed'); ?>
								<span class="form-text page-subtitle">
									<hr>
									<p class="text-danger mdi mdi-alert"> 
										<b>Anda belum memilih kolom.</b> <br>Pilih salah satu kolom terlebih dahulu!
									</p>
								</span>
							<?php } ?>
							<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
								<span class="form-text page-subtitle">
									<hr>
									<p class="mdi mdi-magnify"> Ditemukan
										<?php if ($countRows <= 0) { ?>
											<b class="text-danger"> 
										<?php } else { ?>
											<b class="text-success">
										<?php } ?>
										<?php echo $countRows;?></b> 
									hasil pencarian 
										<?php if ($this->session->has_userdata('filterOption_data')) { 
											if ($this->session->userdata['filterOption_data']['specificFiltering'] == 'on') { ?> 
												<b><mark class="bg-danger text-white">spesifik</mark></b>
											<?php } ?> 
										<?php } ?>
										<b class="text-danger">"<?php echo $this->session->userdata['filterOption_data']['filterWords']; ?>"</b>
									pada kolom
										<?php for ($i = 0; $i < count($dataValueKolom); $i++) { ?>
											<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == $dataValueKolom[$i]) { ?>
												<b><mark class="bg-success text-white"><?php echo $dataNamaKolom[$i]; ?></mark></b>
											<?php } ?>
										<?php } ?>
									.</p>
								</span>
							<?php } ?>
							<?php if ($this->session->userdata('sortOption_data') != NULL) { ?>
								<span class="form-text page-subtitle">
									<hr>
									<p class="mdi mdi-sort"> Diurutkan berdasarkan 
										<?php for ($i = 0; $i < count($dataValueKolom); $i++) { ?>
											<?php if ($this->session->userdata['sortOption_data']['sortedBy'] == $dataValueKolom[$i]) { ?>
												<b><mark class="bg-success text-white"><?php echo $dataNamaKolom[$i]; ?></mark></b>
											<?php } ?>
										<?php } ?>
									dengan urutan 
										<?php if ($this->session->userdata['sortOption_data']['backwardDirection'] == NULL) { ?>
											<b><mark class="bg-success text-white">A->Z</mark></b>.
										<?php } else { ?>
											<b><mark class="bg-danger text-white">Z->A</mark></b>.
										<?php } ?>
									</p>
								</span>
							<?php } ?>
						</div>
					</div>
				</div>
				<br>
				
				<!-- (6). Tabel -->
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="card">
								<table class="table">
									<thead class="table-dark">
										<tr>
											<?php for($i = 0; $i < count($dataNamaKolom); $i++) { ?>
												<th scope="col">
													<?php echo $dataNamaKolom[$i]; ?>
												</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php if ($countRows == "0") { ?>
											<td colspan="4"><h6 class="text-center text-danger">Maaf, hasil pencarian tidak ditemukan.</h6></td>
										<?php } else { ?>
											<?php $id_varietasBenihSumberJeruk = $this->uri->segment('3') + 1; ?>
											<?php foreach ($$dataTableName->result() as $row): ?>
												<?php for ($i = 0; $i < count($dataValueKolom); $i++) { ?>
													<?php $valueKolom_i = $dataValueKolom[$i]; ?>
													<?php if ($dataNamaKolom[$i] == "ID") { ?>
														<tr class="border-bottom additional-selected-row" id="<?php echo $row->$valueKolom_i; ?>">
															<th scope="row"><?php echo $row->$valueKolom_i; ?></th>
															<?php for ($j = 0; $j < count($dataValueKolom); $j++) { ?>
																<?php $valueKolom_j = $dataValueKolom[$j]; ?>
																<?php if ($dataNamaKolom[$j] != "ID") { ?>
																	<td
																		<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
																			<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == $valueKolom_j) { ?> 
																				class="additional-selected-filter" 
																			<?php } ?>
																		<?php } ?>
																		<?php if ($this->session->userdata('sortOption_data') != NULL) { ?>
																			<?php if ($this->session->userdata['sortOption_data']['sortedBy'] == $valueKolom_j) { ?> 
																				class="additional-selected-sort" 
																			<?php } ?> 
																		<?php } ?> 
																	>
																		<?php echo $row->$valueKolom_j; ?>
																	</td>
																<?php } ?>
															<?php } ?>
														</tr>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										<?php } ?>
									</tbody>
								</table>
								
								<!--Tampilkan pagination-->
								<div class="col">
									<?php echo $pagination; ?>
									<?php if ($countRows != NULL) { ?>
										<?php if ($countRows <= 10) { ?>
											<div class="pagging text-center">
												<nav>
													<ul class="pagination justify-content-center">
														<li class="page-item disabled">
															<a class="page-link" href="#" tabindex="-1">Previous</a>
														</li>
														<li class="page-item active">
															<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
														</li>
														<li class="page-item disabled">
															<a class="page-link" href="#">Next</a>
														</li>
													</ul>
												</nav>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
			
				<!-- (7). Footer -->
				<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
					<small class="text-muted mx-auto">Copyright ©
						<script type="text/javascript">
							document.write(new Date().getFullYear());
						</script>
						All rights reserved. <a href="<?php base_url(); ?>" rel="nofollow">SIM-BER-KIT</a>.
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
		</script>
	</body>
</html>