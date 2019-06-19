<!DOCTYPE HTML>
<html class="no-js h-100" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Admin | SIM-BER-KIT</title>
		<meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="/assets/css/shards-dashboards.1.0.0.min.css">
		<link rel="stylesheet" href="/assets/css/extras.1.0.0.min.css">
		<script async defer src="https://buttons.github.io/buttons.js"></script>
	</head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">

				<!-- (1). Profile Sidebar -->
				<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
					<div class="main-navbar">
						<nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
							<a class="navbar-brand w-100 mr-0" href="<?php echo site_url('/'); ?>" style="line-height: 27px;">
								<div class="d-table m-auto">
									<img id="main-logo" class="d-inline-block align-top mr-6" style="max-width: 150px;" src="/assets/images/Antara.png" alt="Logo SIM-BER-KIT">
								</div>
							</a>
							<a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
								<i class="material-icons">&#xE5C4;</i>
							</a>
						</nav>
					</div>
					<form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
						<div class="input-group input-group-seamless ml-3">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-search"></i>
								</div>
							</div>
							<input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
						</div>
					</form>
					<div class="nav-wrapper">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin'); ?>">
									<i class="material-icons">home</i>
									<span>Main Menu</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="<?php echo site_url('dataKonsumen'); ?>">
									<i class="material-icons">note_add</i>
									<span>Data Konsumen</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('dataVarietasBenihSumberJeruk'); ?>">
									<i class="material-icons">note_add</i>
									<span>Data Varietas Benih Sumber Jeruk</span>
								</a>
							</li>
						</ul>
					</div>
				</aside>
				<!-- End of Sidebar -->

				<!-- Content Centre-->
				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<div class="main-navbar sticky-top bg-white">

						<!-- Navigation Bar (Navbar) -->
							<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
								<form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
									<div class="input-group input-group-seamless ml-3">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-search"></i>
											</div>
										</div>
									<input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
								</form>
								<ul class="navbar-nav border-left flex-row ">
									<li class="nav-item border-right dropdown notifications">
										<a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<div class="nav-link-icon__wrapper">
												<i class="material-icons">&#xE7F4;</i>
												<span class="badge badge-pill badge-danger">2</span>
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
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
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
											<img class="user-avatar rounded-circle mr-2" src="/assets/images/avatars/0.jpg" alt="User Avatar">
											<span class="d-none d-md-inline-block"><?php echo $this->session->userdata['admin']['username']; ?></span>
										</a>
										<div class="dropdown-menu dropdown-menu-small">
											<a class="dropdown-item" href="<?php echo site_url('admin_Konten/getProfile'); ?>">
												<i class="material-icons">&#xE7FD;</i> Profile
											</a>
											<a class="dropdown-item" href="#">
												<i class="material-icons">settings</i> Settings
											</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item text-danger" href="<?php echo site_url('logout'); ?>">
												<i class="material-icons text-danger">&#xE879;</i> Logout 
											</a>
										</div>
									</li>
								</ul>
								<nav class="nav">
									<a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
										<i class="material-icons">&#xE5D2;</i>
									</a>
								</nav>
							</nav>
						<!-- End of navbar -->
						
					</div>

			<!-- #Main Conten -->
					<div class="main-content-container container-fluid px-4">

						<!-- (1). Page Header -->
						<div class="page-header row no-gutters py-4">
							<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
								<span class="text-uppercase page-subtitle">Dashboard</span>
								<h3 class="page-title">DATA KONSUMEN</h3>
							</div>
						</div>
						<!-- End Page Header -->
						
						<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
						
						<div class="card container">
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col">
									<button class="btn btn-secondary">Tambah Konsumen</button>
									<button class="btn btn-secondary" href="#filter">Filter Hasil</button>
									<button class="btn btn-secondary" href="#sort">Urutkan Berdasarkan</button>
								</div>
								<div class="col">
								<form action="#">
									<div class="input-group">
										<input class="form-control form-sm" id="input_konsumen" placeholder="Masukkan nama konsumen" type="text">
										<div class="col">
											<button class="btn btn-primary" type="submit">Submit</button>
										</div>
									</div>
								</form>
							</div>
							</div>
							<div class="row">
								<br>
							</div>
						</div>

						<hr>
						<div class="card container">
							<div class="row">
								<table class="table table-hover">
									<thead class="table-dark">
										<tr>
											<?php foreach ($dataKonsumen_Kolom->result() as $row): ?>
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
										<?php foreach ($dataKonsumen->result() as $row): ?>
											<tr>
												<th scope="row"><?php echo $row->id_konsumen; ?></th>
												<td><?php echo $row->nama_konsumen; ?></td>
												<td><?php echo $row->kabupatenkota; ?></td>
												<td><?php echo $row->alamat; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						
						<hr>
						<div class="card container">
							<div class="row">
								<div class="card-body">
									<h5>Tambah konsumen</h5>
									<form action="#">
										<div class="form-group">
											<label for="input_varietas">Nama Konsumen<b class="text-danger">*</b></label>
											<input class="form-control" id="input_konsumen" placeholder="Masukkan nama konsumen" type="text">
										</div>
										<div class="form-group">
											<label for="input_varietas">Kabupaten/Kota<b class="text-danger">*</b></label>
											<input class="form-control" id="input_kabupatenkota" placeholder="Masukkan kabupaten/kota konsumen" type="text">
										</div>
										<div class="form-group">
											<label for="input_varietas">Alamat</label>
											<input class="form-control" placeholder="Masukkan alamat konsumen" type="text">
										</div>
										<button class="btn btn-primary text-center" type="submit">Submit</button>
									</form>
								</div>
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
							All rights reserved. <a href="<?php site_url('/'); ?>" rel="nofollow">SIM-BER-KIT</a>.
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
