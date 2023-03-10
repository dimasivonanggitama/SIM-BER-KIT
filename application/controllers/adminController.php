<?php
	include_once(APPPATH.'core/coreController.php');
	class adminController extends coreController {
		protected $constantModelClass = 'adminModel';
		function __construct() {
			parent::__construct();
			$this->load->model('adminModel');
			if ($this->session->has_userdata('userdata') == NULL) {
				$this->session->set_userdata('announcementText', 'Anda harus <strong><i>Login</i></strong> terlebih dahulu!');
				$this->session->set_userdata('announcementColor', 'danger');
				return redirect('/');
			}
		}
		
		function adminIntersection() {
			$function 	= $this->uri->segment(2);	//segment(1) untuk nama method
			$pageURL 	= $this->uri->segment(3);	//segment(1) untuk nama method
			$tableName 	= $this->uri->segment(4);	//segment(1) untuk nama method
			if ($function == 'filterTable') {
				$this->filterTable($pageURL);
			} else if ($function == 'postData') {
				$this->postData($pageURL, $tableName); 
			} else if ($function == 'reset_filterTable') {
				$this->reset_filterTable($pageURL);
			} else if ($function == 'reset_sortTable') {
				$this->reset_sortTable($pageURL);
			} else if ($function == 'sortTable') {
				$this->sortTable($pageURL);
			}
		}
		
		public function deleteData() {
			$tableName = $this->uri->segment(2);	//segment(1) untuk nama method
			$deletingType = $this->uri->segment(3);	//segment(1) untuk nama method
			$dataValueKolom = $this->getColumnValue($tableName);
			$dataNamaKolom = $this->getNeatWriting($tableName, 'column');
			for ($i = 0; $i < count($dataValueKolom); $i++) {
				if ($dataNamaKolom[$i] == "ID") {
					$id = array (
						$dataValueKolom[$i] => $this->input->post('input_hidden_id')
					);
				}
				if ($tableName == "dataDistribusi") {	//Dikarenakan tabel 'dataDistribusi' merupakan tabel yang unik.
					if ($this->input->post('hidden_input_varietas') != NULL) {
						$id += array(
							'varietas' => $this->input->post('hidden_input_varietas')
						);
					}
				}
			}
			// echo '<pre>'.print_r($id, true).'</pre>';
			$this->adminModel->deleteData($tableName, $deletingType, $id);
			return redirect($tableName);
		}
		
		function editDataTable() {
			$tableName = $this->uri->segment(2);	//segment(1) untuk nama method
			$dataToUpdate = 0;
			$dataValueKolom = $this->getColumnValue($tableName);
			$dataNamaKolom = $this->getNeatWriting($tableName, 'column');
			for ($i = 0; $i < count($dataValueKolom); $i++) {
				if ($dataNamaKolom[$i] == "ID") {
					$id = array(
						$dataValueKolom[$i] => $this->input->post('hidden_input_id')
					);
				} else {
					if ($tableName == "dataDistribusi") {	//Dikarenakan tabel 'dataDistribusi' merupakan tabel yang unik.
						if ($this->input->post('varietas') != NULL) {
							$id += array(
								'varietas' => $this->input->post('hidden_input_varietas'),
								'benihDasar' => $this->input->post('hidden_input_benihDasar'),
								'benihPokok' => $this->input->post('hidden_input_benihPokok')
							);
							$dataToUpdate = array (
								'varietas' => $this->input->post('varietas'),
								'benihDasar' => $this->input->post('benihDasar'),
								'benihPokok' => $this->input->post('benihPokok')
							);
						} else if ($this->input->post('dataPelanggan') != NULL) {
							$id += array(
								'dataPelanggan' => $this->input->post('hidden_input_dataPelanggan'),
								'tanggalDistribusi' => $this->input->post('hidden_input_tanggalDistribusi')
							);
							$dataToUpdate = array (
								'dataPelanggan' => $this->input->post('dataPelanggan'),
								'tanggalDistribusi' => $this->input->post('tanggalDistribusi'),
								'keterangan' => $this->input->post('keterangan')
							);
						}
					} else {
						if ($dataToUpdate == 0) {
							$dataToUpdate = array (
								$dataValueKolom[$i] => $this->input->post($dataValueKolom[$i])
							);
						} else {
							$dataToUpdate += array (
								$dataValueKolom[$i] => $this->input->post($dataValueKolom[$i])
							);
						}
					}
				}
			}
			$this->adminModel->updateData($tableName, $dataToUpdate, $id);
			return redirect($tableName);
		}
		
  		public function getDataDistribusi() {	//menampilkan halaman Data Distribusi untuk Admin
			$actorName 				= 'Admin';
			$pageFileName 			= 'view_dataDistribusi';
			$pageURL = $tableName 	= 'dataDistribusi';
			$pageTitle 				= "DATA DISTRIBUSI";
			$particularColumn		= NULL;
			
			$i = 0;
			$result = $this->adminModel->getData('dataVarietasBenihSumberJeruk', 'namaVarietasBenihSumberJeruk', NULL, NULL, NULL, 'namaVarietasBenihSumberJeruk', 'ASC')->result();	//unfortunately, '$this->getDataTable' oly can shows data on view file and it's parent class. it cannot pass the data from another function to manage it in this function. That's why we call getData from coreModel (in this function, we calls it via guestModel) which could manage the data in this function.
			foreach ($result as $res) {
				$additionalData['dataNamaMenuVarietas'][$i] = $res->namaVarietasBenihSumberJeruk;
				$i++;
			}

			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName, $particularColumn, $additionalData);	//
			// $this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
  		}
		
  		public function getDataKonsumen() {	//menampilkan halaman Data Konsumen untuk Admin
			$actorName 				= 'Admin';
			$pageFileName 			= 'view_dataKonsumen';
			$pageURL = $tableName 	= 'dataKonsumen';
			$pageTitle 				= "DATA KONSUMEN";
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
  		}
		
  		public function getDataPermintaan() {	//menampilkan halaman Data Permintaan untuk Admin
			$actorName 				= 'Admin';
			$pageFileName 			= 'view_dataPermintaan';
			$pageURL = $tableName 	= 'dataPermintaan';
			$pageTitle 				= "DATA PERMINTAAN";
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
  		}
		
  		public function getDataVarietasBenihSumberJeruk() {	//menampilkan halaman Data Varietas Benih Sumber Jeruk untuk Admin
			$actorName				= 'Admin';
			$pageFileName			= 'view_dataVarietasBenihSumberJeruk';
			$pageURL = $tableName 	= 'dataVarietasBenihSumberJeruk';
			$pageTitle				= "DATA VARIETAS BENIH SUMBER JERUK";
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
  		}
		
		function getProfile() {
			
		}

  		public function index() {
			//menampilkan landing page
			// if ($this->session->has_userdata('userdata')) {
				$this->load->view('cms');
			// } else {
				// //$this->session->set_userdata('loginfirst', true);
				// $this->session->set_userdata('announcementText', 'Anda harus <strong><i>Login</i></strong> terlebih dahulu!');
				// $this->session->set_userdata('announcementColor', 'danger');
				// return redirect('/');
			// }
  		}
		
		function logout() {
			$id = $this->session->userdata['userdata']['id_user'];
			$this->adminModel->deleteStatus_log($id);
			
			//echo '<pre>'.print_r ($this->session->userdata(), true).'</pre>';	//cek keberadaan session apapun.
			
			$this->session->unset_userdata('admin');
			$this->session->unset_userdata('currentURL');
			$this->session->unset_userdata('filterOption_data');
			$this->session->unset_userdata('sortOption_data');
			$this->session->unset_userdata('userdata');
			//session_destroy();	//efeknya menjadi tidak bisa menggunakan session pada method yang sama setelah menjalankan session_destroy().
			
			$this->session->set_userdata('announcementText', 'Anda telah melakukan <strong>Logout</strong>.');
			$this->session->set_userdata('announcementColor', 'success');
    		redirect('/');
		}
		

		function test() {
			//echo '<pre>'.print_r($result, true).'</pre>';
			echo "nothing to do in here!";
		}
	}