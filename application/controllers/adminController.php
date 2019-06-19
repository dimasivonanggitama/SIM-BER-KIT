<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	//require_once APPPATH . 'core/admin.php';
	//class adminController extends admin {
	class adminController extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library('session');
			$this->load->model('adminModel');
			//if ($this->session->userdata('admin') == FALSE) {
			//redirect('admin');}
		}
		
  		public function dataKonsumen() {
			//menampilkan halaman Data Konsumen untuk Admin
			if ($this->session->userdata('admin') == NULL) {
				$this->session->set_userdata('loginfirst', true);
				return redirect('/');
			} else {
				$jumlah_data = $this->adminModel->getDataKonsumen_CountRows();
				$this->load->library('pagination');
				$config['base_url'] = base_url().'/dataKonsumen';
				$config['total_rows'] = $jumlah_data;
				$config['per_page'] = 10;
				$from = $this->uri->segment(2);						//$from stands for 'Starts data from row number...'
				
				$config['first_link']       = 'First';
				$config['last_link']        = 'Last';
				$config['next_link']        = 'Next';
				$config['prev_link']        = 'Prev';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
				
				$this->pagination->initialize($config);
				
				$data['countRows'] = NULL;
				//$data['dataKonsumen'] = $this->adminModel->getDataKonsumen();
				if ($this->session->has_userdata('sortOption_data') && $this->session->has_userdata('filterOption_data')) {
					if ($this->session->userdata['filterOption_data']['filteredBy'] == 'not selected') {
						$this->session->set_userdata('filterInfo_failed', $this->session->userdata['filterOption_data']['filteredBy']);
						$this->session->unset_userdata('filterOption_data');
						$data['dataKonsumen'] = $this->adminModel->getDataKonsumen($config['per_page'], $from);
					} else {
						$filterWords = $this->session->userdata['filterOption_data']['filterWords'];
						$filteredBy = $this->session->userdata['filterOption_data']['filteredBy'];
						$specificFiltering = $this->session->userdata['filterOption_data']['specificFiltering'];
							
						$sortedBy = $this->session->userdata['sortOption_data']['sortedBy'];
						$backwardDirection = $this->session->userdata['sortOption_data']['backwardDirection'];
						
						if ($specificFiltering == 'on') {
							$jumlah_data = $this->adminModel->getDataKonsumen_filter_specific_countRows($filterWords, $filteredBy);
							$config['total_rows'] = $jumlah_data;
							$this->pagination->initialize($config);
							
							if ($backwardDirection == 'on') {
								$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filterAndSort_specific($filterWords, $filteredBy, $sortedBy, 'desc', $config['per_page'], $from);
							} else {
								$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filterAndSort_specific($filterWords, $filteredBy, $sortedBy, 'asc', $config['per_page'], $from);
							}
						} else {
							$jumlah_data = $this->adminModel->getDataKonsumen_filter_countRows($filterWords, $filteredBy);
							$config['total_rows'] = $jumlah_data;
							$this->pagination->initialize($config);
							
							if ($backwardDirection == 'on') {
								$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filterAndSort($filterWords, $filteredBy, $sortedBy, 'desc', $config['per_page'], $from);
							} else {
								$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filterAndSort($filterWords, $filteredBy, $sortedBy, 'asc', $config['per_page'], $from);
							}
							
						}
						
						//
						if ($jumlah_data == 0) {
							$data['countRows'] = "0"; //Note: (numeric) 0 == NULL, but (varchar) '0' != NULL.
						} else {
							$data['countRows'] = $jumlah_data;
						}
					}
					//sorting
					// $sortedBy = $this->session->userdata['sortOption_data']['sortedBy'];
					// $backwardDirection = $this->session->userdata['sortOption_data']['backwardDirection'];
					
					// if ($backwardDirection == 'on') {
						// $data['dataKonsumen'] = $this->adminModel->getDataKonsumen_sort($sortedBy, 'desc', $config['per_page'], $from);
					// } else {
						// $data['dataKonsumen'] = $this->adminModel->getDataKonsumen_sort($sortedBy, 'asc', $config['per_page'], $from);
					// }
				}
				else if ($this->session->has_userdata('sortOption_data')) {
					$sortedBy = $this->session->userdata['sortOption_data']['sortedBy'];
					$backwardDirection = $this->session->userdata['sortOption_data']['backwardDirection'];
					
					if ($backwardDirection == 'on') {
						$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_sort($sortedBy, 'desc', $config['per_page'], $from);
					} else {
						$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_sort($sortedBy, 'asc', $config['per_page'], $from);
					}
				} else if ($this->session->has_userdata('filterOption_data')) {
					if ($this->session->userdata['filterOption_data']['filteredBy'] == 'not selected') {
						$this->session->set_userdata('filterInfo_failed', $this->session->userdata['filterOption_data']['filteredBy']);
						$this->session->unset_userdata('filterOption_data');
						$data['dataKonsumen'] = $this->adminModel->getDataKonsumen($config['per_page'], $from);
					} else {
						$filterWords = $this->session->userdata['filterOption_data']['filterWords'];
						$filteredBy = $this->session->userdata['filterOption_data']['filteredBy'];
						$specificFiltering = $this->session->userdata['filterOption_data']['specificFiltering'];
						
						//
						if ($specificFiltering == 'on') {
							$jumlah_data = $this->adminModel->getDataKonsumen_filter_specific_countRows($filterWords, $filteredBy);
							$config['total_rows'] = $jumlah_data;
							$this->pagination->initialize($config);
							$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filter_specific($filterWords, $filteredBy, $config['per_page'], $from);
						} else {
							$jumlah_data = $this->adminModel->getDataKonsumen_filter_countRows($filterWords, $filteredBy);
							$config['total_rows'] = $jumlah_data;
							$this->pagination->initialize($config);
							$data['dataKonsumen'] = $this->adminModel->getDataKonsumen_filter($filterWords, $filteredBy, $config['per_page'], $from);
						}
						
						//
						if ($jumlah_data == 0) {
							$data['countRows'] = "0"; //Note: (numeric) 0 == NULL, but (varchar) '0' != NULL.
						} else {
							$data['countRows'] = $jumlah_data;
						}
					}
				} else {
					$data['dataKonsumen'] = $this->adminModel->getDataKonsumen($config['per_page'], $from);
				}
				$data['pagination'] = $this->pagination->create_links();
				$this->load->view('Admin/dataKonsumen', $data);
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
		
  		public function getDataVarietasBenihSumberJeruk() {
			//menampilkan halaman Data Varietas Benih Sumber Jeruk untuk Admin
			if ($this->session->userdata('admin') == NULL) {
				$this->session->set_userdata('loginfirst', true);
				return redirect('/');
			} else {
				$data['dataVarietasBenihSumberJeruk_Kolom'] = $this->adminModel->getDataVarietasBenihSumberJeruk_ColumnNameOnly();
				$data['dataVarietasBenihSumberJeruk'] = $this->adminModel->getDataVarietasBenihSumberJeruk();
				//print_r($data);
				$this->load->view('Admin/dataVarietasBenihSumberJeruk', $data);
				
			}
  		}
		
		function getProfile() {
			
		}

  		public function index() {
			//menampilkan landing page
			if ($this->session->userdata('admin') == NULL) {
				$this->session->set_userdata('loginfirst', true);
				return redirect('/');
			} else {
				$this->load->view('cms');
			}
  		}
		
		function logout() {
			$getUsername = $this->adminModel->getAdminID($this->session->userdata['admin']['username']);
			foreach ($getUsername->result() as $row) {
				$id = $row->id_user;
			}
			$this->adminModel->deleteStatus_log($id);
			
			$this->session->unset_userdata('admin');
			$this->session->unset_userdata('filterOption_data');
			$this->session->unset_userdata('sortOption_data');
			
			$this->session->set_userdata('logout', 'Anda telah berhasil Logout!');
    		redirect('/');
			if ($this->session->has_userdata('logout')) {
				echo "yes it is exist";
			} else echo "nope";
			//var_dump($this->session->userdata('logout'));
		}
		

		function test() {
			echo "nothing left in here!";
		}
	}
	//$adminController = new adminController();