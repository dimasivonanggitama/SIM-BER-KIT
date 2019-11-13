<!DOCTYPE HTML>
<html>
	<head>
		<title>Test Page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/additional_dashboard.css'); ?>">
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal4">
			Jawaban sudah dilihat oleh Kepala Kantor
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div><b class="mdi mdi-checkbox-blank-circle text-danger"></b> (datetime) Jawaban sudah dilihat oleh Kepala Kantor</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat dijawab oleh KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat didisposisikan ke KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat Masuk ke Kepala Kantor</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<br><br>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal3">
			Surat dijawab oleh KASI (...)/Nama KASI
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div><b class="mdi mdi-checkbox-blank-circle text-danger"></b> (datetime) Surat dijawab oleh KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat didisposisikan ke KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat Masuk ke Kepala Kantor</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<br><br>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
			Surat didisposisikan ke KASI (...)/Nama KASI
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div><b class="mdi mdi-checkbox-blank-circle text-danger"></b> (datetime) Surat didisposisikan ke KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat Masuk ke Kepala Kantor</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2abc">
			Surat diarsipkan ke KASI (...)/Nama KASI
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal2abc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div><b class="mdi mdi-checkbox-blank-circle text-danger"></b> (datetime) Surat diarsipkan ke KASI (...)/Nama KASI</div>
						<div class="mdi mdi-ray-end-arrow mdi-rotate-90"></div>
						<div class="mdi mdi-check-circle"> (datetime) Surat Masuk ke Kepala Kantor</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<br><br>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1">
			Surat Masuk
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div><b class="mdi mdi-checkbox-blank-circle text-danger"></b> (datetime) Surat Masuk ke Kepala Kantor</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<hr>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#disposisi-oa">
			Disposisi OA
		</button>

		<!-- Modal -->
		<div class="modal fade" id="disposisi-oa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table align="center">
							<td>
								<input type="checkbox">KSBU<br>
								<input type="checkbox">KASIE P2<br>
								<input type="checkbox">KASI PERBEND<br>
							</td>
							<td>
								<input type="checkbox">KASI PKC 1<br>
								<input type="checkbox">KASI PKC 2<br>
								<input type="checkbox">KASI PKC 3<br>
							</td>
							<td>
								<input type="checkbox">KASI PKC 4<br>
								<input type="checkbox">KASI PKC 5<br>
								<input type="checkbox">KASI PKC 6<br>
							</td>
							<td>
								<input type="checkbox">KASI PLI<br>
								<input type="checkbox">KASI KI<br>
								<input type="checkbox">KASI PDAD<br>
							</td>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src="<?php echo base_url('assets/js/additional_dashboard.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>
