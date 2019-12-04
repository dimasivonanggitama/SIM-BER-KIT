<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	//require_once APPPATH . 'core/admin.php';
	//class adminController extends admin {
	// class adminController extends CI_Controller {
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
		
		public function dataKonsumen_add() {
			$add_data = array (
				'nama_konsumen' => $this->input->post('input_konsumen'),
				'kabupatenkota' => $this->input->post('input_kabupatenkota'),
				'alamat' => $this->input->post('input_alamat')
			);
			$this->adminModel->postDataKonsumen($add_data);
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_delete() {
			$delete_data = array (
				'id_konsumen' => $this->input->post('input_hidden_id')
			);
			$this->adminModel->deleteDataKonsumen($delete_data);
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_delete_all() {
			$this->adminModel->deleteDataKonsumen_all();
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_update() {
			$id = $this->input->post('hidden_input_id');
			$update_data = array (
				'nama_konsumen' => $this->input->post('input_konsumen'),
				'kabupatenkota' => $this->input->post('input_kabupatenkota'),
				'alamat' => $this->input->post('textarea_alamat')
			);
			$this->adminModel->updateDataKonsumen($id, $update_data);
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_filter() {
			$filterOption_data = array (
				'filterWords' => $this->input->post('input_filter'),
				'filteredBy' => $this->input->post('select_filter_option'),
				'specificFiltering' => $this->input->post('checkBox_specificFiltering')
			);
			$this->session->set_userdata('filterOption_data', $filterOption_data);
			// if ($this->session->userdata['filterOption_data']['filteredBy'] == 'not selected') {
				// echo 'true';
			// } else {
				// echo 'false';
			// }
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_filter_reset() {
			$this->session->unset_userdata('filterOption_data');
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_sort() {
			$sortOption_data = array (
				'sortedBy' => $this->input->post('select_sort_option'),
				'backwardDirection' => $this->input->post('checkBox_sortingDirection')
			);
			$this->session->set_userdata('sortOption_data', $sortOption_data);
			return redirect('dataKonsumen');
		}
		
		public function dataKonsumen_sort_reset() {
			$this->session->unset_userdata('sortOption_data');
			return redirect('dataKonsumen');
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
			}
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
			$this->adminModel->updateData($tableName, $dataToUpdate, $id);
			return redirect($tableName);
		}
		
  		public function getDataDistribusi() {	//menampilkan halaman Data Distribusi untuk Admin
			$actorName 				= 'Admin';
			$pageFileName 			= 'view_dataDistribusi';
			$pageURL = $tableName 	= 'dataDistribusi';
			$pageTitle 				= "DATA DISTRIBUSI";
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
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
			$actorName 				 	= 'Admin';
			$pageFileName = $pageURL 	= $tableName = 'dataVarietasBenihSumberJeruk';
			$pageTitle 					= "Data Varietas Benih Sumber Jeruk";
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
	//$adminController = new adminController();