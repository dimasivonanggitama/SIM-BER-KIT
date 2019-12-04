<!DOCTYPE HTML>
<html class="no-js h-100" lang="en">
	<head>
		<!-- Daftar isi:  -->
		<!-- (1). Sidebar -->
		<!-- (2). Navbar  -->
		<!-- (5). Tabel   -->
		<!-- (6). Form Tambah Konsumen -->
		<!-- (7). Menu Tambahan -->
		<!-- (8). Footer -->
		<title>Admin | SIM-BER-KIT</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/additional_dashboard.css'); ?>">
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<!--<link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="/assets/css/shards-dashboards.1.0.0.min.css">-->
	</head>
	<body class="h-100" style="background-color:#F0F0F0">
		<div class="container-fluid">
			<div class="row">

				<!-- (1). Sidebar -->
				<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0 sidebar" id="admin_sidebar">
					<div class="main-navbar">
						<nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
							<a class="navbar-brand w-100 mr-0" href="<?php echo site_url('/'); ?>" style="line-height: 27px;">
								<div class="d-table m-auto">
									<img id="main-logo" class="d-inline-block align-top mr-6" style="max-width: 150px;" src="(?)" alt="Logo SIM-BER-KIT">
								</div>
							</a>
							<button aria-label="Close" class="additional-sidebar-close-button close" id="admin_sidebar_button_close" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</nav>
					</div>
					<div>
						<ul class="ul_sidebar">
							<li>
								<a class="sidebar-menu border-bottom" href="<?php echo site_url('admin'); ?>">
									<h6 class="font-weight-normal mdi mdi-home"> Main Menu</h6>
								</a>
							</li>
							<li>
								<a class="sidebar-menu-active border-bottom" href="<?php echo site_url('dataKonsumen'); ?>">
									<h6 class="font-weight-bold mdi mdi-account"> Data Konsumen</h6>
								</a>
							</li>
							<li>
								<a class="sidebar-menu border-bottom" href="<?php echo site_url('dataVarietasBenihSumberJeruk'); ?>">
									<h6 class="font-weight-normal mdi mdi-pokeball"> Data Varietas Benih Sumber Jeruk</h6>
								</a>
							</li>
							<li>
								<a class="sidebar-menu border-bottom" href="<?php echo site_url('dataPermintaan'); ?>">
									<h6 class="font-weight-normal mdi mdi-cart"> Data Permintaan</h6>
								</a>
							</li>
							<li>
								<a class="sidebar-menu border-bottom" href="<?php echo site_url('dataDistribusi'); ?>">
									<h6 class="font-weight-normal mdi mdi-dropbox"> Data Distribusi</h6>
								</a>
							</li>
						</ul>
					</div>
				</aside>

				<!-- Content Centre-->
				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

					<!-- (2). Navigation Bar (Navbar) -->
					<nav class="navbar navbar-expand-lg navbar-light bg-white">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<!--<button class="btn btn-primary additional_sidebar-open-button" onclick="additional_sidebarOpen()">&#9776;</button>-->
								<li class="nav-item">
								</li>
							</ul>
							<ul class="nav justify-content-end">
								<li class="nav-item border-right dropdown notifications">
									<a class="additional-navbar-notification-bell nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="nav-link-icon__wrapper">
											<i class="mdi mdi-bell"><span class="badge badge-pill badge-danger">2</span></i>
										</div>
									</a>
									<div class="additional-dropdown-popover-menu-notification dropdown-menu dropdown-menu-small justify-content-end" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="#">
											<div class="notification__icon-wrapper">
												<div class="notification__icon">
													<i class="material-icons">&#xE6E1;</i>
												</div>
											</div>
											<div class="notification__content">
												<span class="notification__category">Analytics</span>
												<p>Your website’s active users count increased by
												<span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
											</div>
										</a>
										<a class="dropdown-item" href="#">
											<div class="notification__icon-wrapper">
												<div class="notification__icon">
													<i class="material-icons">&#xE8D1;</i>
												</div>
											</div>
											<div class="notification__content">
												<span class="notification__category">Sales</span>
												<p>Last week your store’s sales count decreased by
												<span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
											</div>
										</a>
										<a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
									</div>
								</li>
								<li class="dropdown">
									<a class="additional-navbar-profile-dropdown nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
										<!--<img class="user-avatar rounded-circle mr-2" src="/assets/images/avatars/0.jpg" alt="User Avatar">-->
										<i class="mdi mdi-account"> <?php echo $this->session->userdata['userdata']['username']; ?></i>
										<span class="caret"></span>
									</a>
									<div class="additional-dropdown-popover-menu-profile dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="<?php echo site_url('admin_Konten/getProfile'); ?>">
											<p class="mdi mdi-account-key"> Profile</p>
										</a>
										<a class="dropdown-item" href="#">
											<p class="mdi mdi-settings"> Settings</p>
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" href="<?php echo site_url('logout'); ?>">
											<p class="mdi mdi-power"> <b>Logout</b></p>
										</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>

					<!-- #Main Conten -->
					<div class="main-content-container container-fluid px-4">

						<!-- (3). Page Header -->
						<div class="page-header row no-gutters py-4">
							<div class="col-12 col-sm-8 text-center text-sm-left mb-0">
								<h3 class="page-title"><?php echo $dataPageTitle; ?></h3>
								<span class="text-uppercase page-subtitle">Dashboard</span>
								<?php if ($this->session->has_userdata('failedInfo')) { ?>
									<?php $this->session->unset_userdata('failedInfo'); ?>
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
						
						<!-- (4). Mini Menu and Accordion Form -->
						<div class="accordion" id="accordionMiniForm">
						
							<!-- (4a). Search Menu -->
							<div class="card">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<a class="btn btn-secondary" href="#tambahKonsumen" onclick="additional_focusTambahKonsumen()">Tambah Data</a>
										<button aria-controls="collapseOne" aria-expanded="false" class="btn" data-target="#collapseOne" data-toggle="collapse" id="button_filter_dataKonsumen" onclick="changeFilterButtonColor()" style="background-color: <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Filter Hasil</button>
										<button aria-controls="collapseTwo" aria-expanded="false" class="btn" data-target="#collapseTwo" data-toggle="collapse" id="button_urut_dataKonsumen" onclick="changeUrutButtonColor()" style="background-color: <?php if ($this->session->userdata('sortOption_data') != NULL) { ?> dodgerblue; <?php } else { ?> #666D73; <?php } ?> color: white;">Urutkan Berdasarkan</button>
									</h2>
								</div>
								<div id="collapseOne" class="collapse <?php if ($this->session->userdata('filterOption_data') != NULL) { ?> show <?php } ?>" aria-labelledby="headingOne" data-parent="#accordionMiniForm">
									<div class="card-body">
										<form action="<?php echo base_url('adminIntersection/filterTable/'.$dataPageURL); ?>" method="post">
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
														<a class="btn btn-danger" href="<?php echo base_url('adminIntersection/reset_filterTable/'.$dataPageURL); ?>">Reset</a>
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
										<form action="<?php echo base_url('adminIntersection/sortTable/'.$dataPageURL); ?>" method="post">
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
														<a class="btn btn-danger" href="<?php echo base_url('adminIntersection/reset_sortTable/'.$dataPageURL); ?>">Reset</a>
													<?php } ?>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
						<!-- (5). Tabel -->
						<hr>
						<div class="card container">
							<div class="row">
								<table class="table table-responsive">
									<thead class="table-dark">
										<tr>
											<?php for($i = 0; $i < count($dataNamaKolom); $i++) { ?>
												<th scope="col">
													<?php echo $dataNamaKolom[$i]; ?>
												</th>
											<?php } ?>
											<th colspan="2" scope="col">
												Aksi
											</th>
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
						
						<!-- (6). Form Tambah Konsumen -->
						<hr>
						<div class="section">
							<div class="card container" id="tambahKonsumen">
								<div class="row">
									<div class="card-body">
										<h5>Tambah Data</h5>
										<form action="<?php echo base_url('adminIntersection/postData/'.$dataPageURL.'/'.$dataTableName); ?>" method="post">
											<?php for ($i = 0; $i < count($dataValueKolom); $i++) { ?>
												<?php if ($dataNamaKolom[$i] != "ID") { ?>
													<div class="form-group">
														<label for="input_add_<?php echo $dataValueKolom[$i]; ?>"><?php echo $dataNamaKolom[$i]; ?><b class="text-danger">*</b></label>
														<input class="form-control" id="input_add_<?php echo $dataValueKolom[$i]; ?>" name="<?php echo $dataValueKolom[$i]; ?>" placeholder="Masukkan <?php echo $dataNamaKolom[$i]; ?>" type="text">
													</div>
												<?php } ?>
											<?php } ?>
											<small class="form-text text-left text-muted">(<b class="text-danger">*</b>) Diharuskan untuk mengisi bagian formulir.</small>
											<br>
											<button class="btn btn-primary text-center" type="submit">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						
						<!-- (7). Menu tambahan -->
						<hr>
						<div class="section">
							<div class="card container" id="tambahKonsumen">
								<div class="row">
									<div class="card-body text-center">
										<a class="mdi mdi-content-save-all text-primary" data-toggle="modal" data-target="#modal_<?php echo $dataTableName; ?>-delete-row"> Cadangkan (Backup)</a>
										
										<a>&thinsp; &bull; &thinsp; </a>
										<a class="mdi mdi-close-circle text-danger" data-toggle="modal" data-target="#modal_<?php echo $dataTableName; ?>-delete-all"> Hapus seluruh <?php echo $dataTableName_neat; ?></a>
										
										<!-- Modal for Delete all data table per row -->
										<div aria-labelledby="modalLabel" aria-hidden="true" class="modal fade" id="modal_<?php echo $dataTableName; ?>-delete-all" role="dialog" tabindex="-1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form action="<?php echo base_url('deleteData/'.$dataTableName.'/table'); ?>" method="post">
														<div class="modal-header">
															<h5 class="mdi mdi-alert modal-title" id="modalLabel"> Hapus Seluruh <?php echo $dataTableName_neat; ?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true" class="text-danger">&times;</span>
															</button>
														</div>
														<div class="modal-body text-left">
															<p>Apakah anda yakin ingin menghapus seluruh <?php echo $dataTableName_neat; ?>?</p>
															<small class="text-muted">Jika proses dilanjutkan, maka data yang sudah dihapus tidak dapat dikembalikan.</small>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
															<button type="submit" class="btn btn-primary">Konfirmasi</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										
										<a>&thinsp; &bull; &thinsp; </a>
										<a class="mdi mdi-upload text-success" data-toggle="modal" data-target="#modal_<?php echo $dataTableName; ?>-delete-row"> Unggah (upload) data</a>
									</div>
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