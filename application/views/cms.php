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
								<a class="nav-link active" href="<?php echo site_url('admin'); ?>">
									<i class="material-icons">home</i>
									<span>Main Menu</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="<?php echo site_url('dataKonsumen'); ?>">
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
										<span class="d-none d-md-inline-block"><?php echo $this->session->userdata['userdata']['username']; ?></span>
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
					<h3 class="page-title">Main Menu Overview</h3>
				  </div>
				</div>
				<!-- (1). End Page Header -->

						<!-- (2). Small Stats Blocks -->
						<div class="row">
							<div class="col-lg col-md-6 col-sm-6 mb-4">
								<div class="stats-small stats-small--1 card card-small">
									<div class="card-body p-0 d-flex">
											<div class="d-flex flex-column m-auto">
												<div class="stats-small__data text-center">
													<span class="stats-small__label text-uppercase">News</span>
													<h6 class="stats-small__value count my-3">2,390</h6>
												</div>
												<div class="stats-small__data">
													<span class="stats-small__percentage stats-small__percentage--increase">5.7%</span>
												</div>
											</div>
											<canvas height="120" class="blog-overview-stats-small-1"></canvas>
									</div>
								</div>
							</div>
							<div class="col-lg col-md-4 col-sm-6 mb-4">
								<div class="stats-small stats-small--1 card card-small">
									<div class="card-body p-0 d-flex">
											<div class="d-flex flex-column m-auto">
												<div class="stats-small__data text-center">
													<span class="stats-small__label text-uppercase">Comments</span>
													<h6 class="stats-small__value count my-3">8,147</h6>
												</div>
												<div class="stats-small__data">
													<span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
												</div>
											</div>
											<canvas height="120" class="blog-overview-stats-small-3"></canvas>
									</div>
								</div>
							</div>
							<div class="col-lg col-md-4 col-sm-6 mb-4">
								<div class="stats-small stats-small--1 card card-small">
									<div class="card-body p-0 d-flex">
											<div class="d-flex flex-column m-auto">
												<div class="stats-small__data text-center">
													<span class="stats-small__label text-uppercase">Users</span>
													<h6 class="stats-small__value count my-3">2,413</h6>
												</div>
												<div class="stats-small__data">
													<span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
												</div>
											</div>
											<canvas height="120" class="blog-overview-stats-small-4"></canvas>
									</div>
								</div>
							</div>
							<div class="col-lg col-md-4 col-sm-12 mb-4">
								<div class="stats-small stats-small--1 card card-small">
									<div class="card-body p-0 d-flex">
											<div class="d-flex flex-column m-auto">
												<div class="stats-small__data text-center">
													<span class="stats-small__label text-uppercase">Subscribers</span>
													<h6 class="stats-small__value count my-3">17,281</h6>
												</div>
												<div class="stats-small__data">
													<span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
												</div>
											</div>
											<canvas height="120" class="blog-overview-stats-small-5"></canvas>
									</div>
								</div>
							</div>
						</div>
						<!-- End Small Stats Blocks -->

						<div class="row">
							<!-- Users Stats -->
							<div class="col-lg-8 col-md-12 col-sm-12 mb-4">
								<div class="card card-small">
									<div class="card-header border-bottom">
										<h6 class="m-0">Users</h6>
									</div>
									<div class="card-body pt-0">
										<div class="row border-bottom py-2 bg-light">
											<div class="col-12 col-sm-6">
												<div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
													<input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
													<input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
													<span class="input-group-append">
														<span class="input-group-text">
															<i class="material-icons"></i>
														</span>
													</span>
												</div>
											</div>
											<div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
												<button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
											</div>
										</div>
										<canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
									</div>
								</div>
							</div>
							<!-- End Users Stats -->

							<!-- Users By Device Stats -->
							<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
								<div class="card card-small h-100">
									<div class="card-header border-bottom">
										<h6 class="m-0">Users by device</h6>
									</div>
									<div class="card-body d-flex py-0">
										<canvas height="220" class="blog-users-by-device m-auto"></canvas>
									</div>
									<div class="card-footer border-top">
										<div class="row">
											<div class="col">
											<select class="custom-select custom-select-sm" style="max-width: 130px;">
												<option selected>Last Week</option>
												<option value="1">Today</option>
												<option value="2">Last Month</option>
												<option value="3">Last Year</option>
											</select>
											</div>
											<div class="col text-right view-report">
												<a href="#">Full report &rarr;</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Users By Device Stats -->
						  
							<!-- Discussions Component -->
							<div class="col-lg-5 col-md-12 col-sm-12 mb-4">
								<div class="card card-small blog-comments">
									<div class="card-header border-bottom">
										<h6 class="m-0">Discussions</h6>
									</div>
									<div class="card-body p-0">
										<div class="blog-comments__item d-flex p-3">
											<div class="blog-comments__avatar mr-3">
												<img src="/assets/images/avatars/1.jpg" alt="User avatar" /> </div>
											<div class="blog-comments__content">
												<div class="blog-comments__meta text-muted">
													<a class="text-secondary" href="#">James Johnson</a> on
													<a class="text-secondary" href="#">Hello World!</a>
													<span class="text-muted">– 3 days ago</span>
												</div>
												<p class="m-0 my-1 mb-2 text-muted">Well, the way they make shows is, they make one show ...</p>
												<div class="blog-comments__actions">
													<div class="btn-group btn-group-sm">
														<button type="button" class="btn btn-white">
															<span class="text-success">
																<i class="material-icons">check</i>
															</span>
															Approve
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-danger">
																<i class="material-icons">clear</i>
															</span> 
															Reject 
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-light">
																<i class="material-icons">more_vert</i>
															</span> 
															Edit 
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="blog-comments__item d-flex p-3">
											<div class="blog-comments__avatar mr-3">
												<img src="/assets/images/avatars/2.jpg" alt="User avatar" /> 
											</div>
											<div class="blog-comments__content">
												<div class="blog-comments__meta text-muted">
													<a class="text-secondary" href="#">James Johnson</a> on
													<a class="text-secondary" href="#">Hello World!</a>
													<span class="text-muted">– 4 days ago</span>
												</div>
												<p class="m-0 my-1 mb-2 text-muted">After the avalanche, it took us a week to climb out. Now...</p>
												<div class="blog-comments__actions">
													<div class="btn-group btn-group-sm">
														<button type="button" class="btn btn-white">
															<span class="text-success">
																<i class="material-icons">check</i>
															</span> 
															Approve 
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-danger">
																<i class="material-icons">clear</i>
															</span> 
															Reject 
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-light">
																<i class="material-icons">more_vert</i>
															</span> 
															Edit 
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="blog-comments__item d-flex p-3">
											<div class="blog-comments__avatar mr-3">
												<img src="/assets/images/avatars/3.jpg" alt="User avatar" /> 
											</div>
											<div class="blog-comments__content">
												<div class="blog-comments__meta text-muted">
												  <a class="text-secondary" href="#">James Johnson</a> on
												  <a class="text-secondary" href="#">Hello World!</a>
												  <span class="text-muted">– 5 days ago</span>
												</div>
												<p class="m-0 my-1 mb-2 text-muted">My money's in that office, right? If she start giving me...</p>
												<div class="blog-comments__actions">
													<div class="btn-group btn-group-sm">
														<button type="button" class="btn btn-white">
															<span class="text-success">
																<i class="material-icons">check</i>
															</span> 
															Approve 
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-danger">
																<i class="material-icons">clear</i>
															</span> 
															Reject 
														</button>
														<button type="button" class="btn btn-white">
															<span class="text-light">
																<i class="material-icons">more_vert</i>
															</span> 
															Edit 
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer border-top">
										<div class="row">
											<div class="col text-center view-report">
												<button type="submit" class="btn btn-white">View All Comments</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Discussions Component -->
							
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
				
		  </div>
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
