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
								<div class=""></div>
								<a class="sidebar-menu border-bottom" href="<?php echo site_url('dataKonsumen'); ?>">
									<h6 class="font-weight-normal mdi mdi-account"> Data Konsumen</h6>
								</a>
							</li>
							<li>
								<a class="sidebar-menu-active border-bottom" href="<?php echo site_url('dataVarietasBenihSumberJeruk'); ?>">
									<h6 class="font-weight-bold mdi mdi-pokeball"> Data Varietas Benih Sumber Jeruk</h6>
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

						<!-- (1). Page Header -->
						<div class="page-header row no-gutters py-4">
							<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
								<span class="text-uppercase page-subtitle">Dashboard</span>
								<h3 class="page-title">DATA VARIETAS BENIH SUMBER JERUK</h3>
							</div>
						</div>
						<!-- End Page Header -->

						<div class="row">
							<div class="card container">
								<table class="table table-hover">
									<thead>
										<tr>
											<?php foreach ($dataVarietasBenihSumberJeruk_Kolom->result() as $row): ?>
												<th scope="col"><?php echo $row->column_name; 
														// if ($row->column_name = "id_konsumen") {
															// echo "ID";
														// } else if ($row->column_name = "nama_konsumen") {
															// echo "Nama Konsumen";
														// } else if ($row->column_name = "kabupatenkota") {
															// echo "Kabupaten / Kota";
														// } else if ($row->column_name = "alamat") {
															// echo "Alamat";
														// } 
													?>
												</th>
											<?php endforeach; ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($dataVarietasBenihSumberJeruk->result() as $row): ?>
											<tr>
												<th scope="row"><?php echo $row->nomor; ?></th>
												<td><?php echo $row->varietasbenihsumberjeruk; ?></td>
											</tr>
										<?php endforeach; ?>
											<tr>
												<th scope="row">Tambah varietas:</th>
											</tr>
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
					
					<!-- #Footer# -->
					<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
						<span class="copyright ml-auto my-auto mr-2">Copyright © 2018
							<a href="" rel="nofollow">Antara Digital</a>
						</span>
					
						<small class="text-muted">Copyright ©
							<script type="text/javascript">
								document.write(new Date().getFullYear());
							</script>
							All rights reserved. <a href="" rel="nofollow">SIM-BER-KIT</a>.
						</small>
					</footer>
					
				</main>
			</div>
		</div>
		<div class="promo-popup animated">
			<a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
				<img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> 
			</a>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
		<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
		<script src="/assets/js/extras.1.0.0.min.js"></script>
		<script src="/assets/js/shards-dashboards.1.0.0.min.js"></script>
		<script src="/assets/js/app/app-blog-overview.1.0.0.js"></script>
	</body>
</html>
