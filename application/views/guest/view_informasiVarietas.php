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
				
				<!-- (3). Mini Menu and Accordion Form -->
				<div class="accordion" id="accordionMiniForm">
					<div class="row">
						<div class="container">
							<!-- (3a). Search Menu -->
							<div class="card">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button aria-controls="collapseOne" aria-expanded="false" class="btn" data-target="#collapseOne" data-toggle="collapse" id="button_filter_dataKonsumen" onclick="changeFilterButtonColor()" style="background-color: <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Filter Hasil</button>
										<button aria-controls="collapseTwo" aria-expanded="false" class="btn" data-target="#collapseTwo" data-toggle="collapse" id="button_urut_dataKonsumen" onclick="changeUrutButtonColor()" style="background-color: <?php if ($this->session->userdata('sortOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Urutkan Berdasarkan</button>
									</h2>
								</div>
								<div id="collapseOne" class="collapse <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> show <?php } ?>" aria-labelledby="headingOne" data-parent="#accordionMiniForm">
									<div class="card-body">
										<form action="<?php echo base_url('filterTable/'.$dataTableName); ?>" method="post">
											<div class="row">
												<div class="col">
													<div class="form-group">
														<input class="form-control" name="input_filter" placeholder="Kata kunci ..." type="text" <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> value="<?php echo $this->session->userdata['filterOption_data']['filterWords']; } ?>" required>
													</div>
												</div>
												<div class="col">
													<div class="form-group">
														<select class="form-control" name="select_filter_option" required>
															<?php for ($i = 1; $i < count($dataValueKolom); $i++) {	?>
																<?php if ($dataNamaKolom[$i] == "ID") { ?>
																	<?php continue; ?>
																<?php } else { ?>
																	<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == $dataValueKolom[$i]) { ?>
																		<option class="bg-success text-white" value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																		<?php for ($j = 1; $j < count($dataValueKolom); $j++) { ?>
																			<?php if ($dataValueKolom[$i] != $dataValueKolom[$j] && $dataNamaKolom[$j] != "ID") { ?>
																				<option value="<?php echo $dataValueKolom[$j]; ?>"><?php echo $dataNamaKolom[$j]; ?></option>
																			<?php } ?>
																		<?php } ?>
																	<?php } else { ?>
																		<option value="not selected">-- Cari berdasarkan --</option>
																		<option value="<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?></option>
																	<?php } ?>
																<?php }	?>
															<?php }	?>
														</select>
														<small class="form-text text-muted">Cari berdasarkan kolom.</small>
													</div>
												</div>
												<div class="col">
													<button type="submit" class="btn btn-primary">Submit</button>
													<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
														<a class="btn btn-danger" href="<?php echo base_url('reset_filterTable/'.$dataTableName); ?>">Reset</a>
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
							
							<!-- (3b). Sort Menu -->
							<div class="card">
								<div id="collapseTwo" class="collapse <?php if ($this->session->userdata('sortOption_data') != NULL) { ?> show <?php } ?>" aria-labelledby="headingTwo" data-parent="#accordionMiniForm">
									<div class="card-body">
										<form action="<?php echo base_url('sortTable/'.$dataTableName); ?>" method="post">
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
														<a class="btn btn-danger" href="<?php echo base_url('reset_sortTable/'.$dataTableName); ?>">Reset</a>
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
				
				<br>
				
				<!-- (4). Tabel -->
				<div class="card container">
					<div class="row">
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
													<?php for ($j = 0; $j < count($dataValueKolom); $j++) { ?>
														<?php $valueKolom_j = $dataValueKolom[$j]; ?>
														<?php if ($dataNamaKolom[$j] == "ID") { ?>
															<td>
																<a data-toggle="modal" data-target="#modal_<?php echo $dataTableName; ?>-edit-row-<?php echo $row->$valueKolom_j; ?>" href="#"> 
																	<div class="additional-table-edit-button" data-toggle="tooltip" data-placement="bottom" title="Edit">
																	</div>
																</a>
															
																<!-- Modal for edit data table -->
																<div class="modal fade" id="modal_<?php echo $dataTableName; ?>-edit-row-<?php echo $row->$valueKolom_j; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="mdi mdi-pencil modal-title" id="modalCenterTitle"> Edit <?php echo $dataTableName_neat; ?></h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true" class="text-danger">&times;</span>
																				</button>
																			</div>
																			<form action="<?php echo base_url('editDataTable/'.$dataTableName); ?>" method="post">
																				<div class="modal-body">
																					<?php for ($k = 0; $k < count($dataValueKolom); $k++) { ?>
																						<?php $valueKolom_k = $dataValueKolom[$k]; ?>
																						<?php if ($dataNamaKolom[$k] == "ID") { ?>
																							<input type="hidden" name="hidden_input_id" value="<?php echo $row->$valueKolom_k; ?>">
																						<?php } else { ?>
																							<div class="form-group">
																								<label for="input_edit_<?php echo $dataValueKolom[$k]; ?>"><?php echo $dataNamaKolom[$k]; ?><b class="text-danger">*</b></label>
																								<input class="form-control" id="input_edit_<?php echo $dataValueKolom[$k]; ?>" name="<?php echo $dataValueKolom[$k]; ?>" type="text" value="<?php echo $row->$valueKolom_k; ?>" required>
																							</div>
																						<?php } ?>
																					<?php } ?>
																					<small class="form-text text-left text-muted">(<b class="text-danger">*</b>) Diharuskan untuk mengisi bagian formulir.</small>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
																					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<a data-toggle="modal" data-target="#modal_<?php echo $dataTableName; ?>-delete-row-<?php echo $row->$valueKolom_j; ?>" href="#"> 
																	<div class="additional-table-delete-button" data-toggle="tooltip" data-placement="bottom" title="Hapus">
																	</div>
																</a>
																
																<!-- Modal for Delete dataVarietasBenihSumberJeruk per row -->
																<div aria-labelledby="modalLabel" aria-hidden="true" class="modal fade" id="modal_<?php echo $dataTableName; ?>-delete-row-<?php echo $row->$valueKolom_j; ?>" role="dialog" tabindex="-1">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<form action="<?php echo base_url('deleteData/'.$dataTableName.'/row'); ?>" method="post">
																				<div class="modal-header">
																					<h5 class="mdi mdi-delete modal-title" id="modalLabel"> Hapus <?php echo $dataTableName_neat; ?></h5>
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true" class="text-danger">&times;</span>
																					</button>
																				</div>
																				<div class="modal-body">
																					<input type="hidden" name="input_hidden_id" value="<?php echo $row->$valueKolom_j ?>">
																					<p>Apakah anda yakin ingin menghapus <?php echo $dataTableName_neat; ?> dengan ID="<b class="text-danger"><?php echo $row->$valueKolom_j; ?></b>"?</p>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
																					<button type="submit" class="btn btn-primary">Konfirmasi</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
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
						
						<div class="col">
						
							<!--Tampilkan pagination-->
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
			</main>
		</div>
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>