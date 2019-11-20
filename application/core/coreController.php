<?php
	class coreController extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->library('session');
			// $this->load->model('adminModel');
		}
		
		public function filterTable($pageURL) {
			$filterOption_data = array (
				'filterWords' => $this->input->post('input_filter'),
				'filteredBy' => $this->input->post('select_filter_option'),
				'specificFiltering' => $this->input->post('checkBox_specificFiltering')
			);
			$this->session->set_userdata('filterOption_data', $filterOption_data);
			return redirect($pageURL);
		}
		
  		function getNeatWriting($tableName, $somethingToNeat) {
			if ($somethingToNeat == "column") {
				$sentence = $this->getColumnValue($tableName);
			} else if ($somethingToNeat == "table") {
				$sentence = $tableName;
			} else {
				$sentence = $somethingToNeat;
			}
			
			if (is_array($sentence) == false) {	//hitung berapa banyak indeks array sentence
				$idFound = false;
				if (strpos($sentence, "_") == true) {
					$sentence = str_replace("_", " ", $sentence);	//mengganti karakter "_" menjadi " "
				}
				$sentence = preg_replace('/(?<! )(?<!^)[A-Z]/',' $0', $sentence);	//memberikan spasi sebelum huruf kapital
				$sentence = ucwords($sentence);	//mengubah huruf pertama di setiap kata menjadi huruf kapital.
				$tempSplit = explode(" ", $sentence);	//memecah setiap kata saat ada spasi dalam suatu string.
				for ($j = 0; $j < count($tempSplit); $j++) {
					if (strcasecmp($tempSplit[$j], "id") == 0) {	//membandingkan suatu string dengan karakter. Jika bernilai == 0, maka stringnya adalah sama.
						$tempSplit[0] = strtoupper($tempSplit[$j]);	//mengubah semua huruf menjadi kapital.
						$idFound = true;	//status deteksi "id" menjadi true
						$j = 1;	//kembali ke posisi perulangan 1
					}
					if ($idFound == true) {
						$tempSplit[$j] = NULL;
					}
				}
				if ($tempSplit == "ID") {	
					$sentence = implode("", $tempSplit);	//tidak perlu pemisah karena string hanya 1 kata berupa "ID".
				} else {
					$sentence = implode(" ", $tempSplit);	//perlu pakai pemisah karena string terdiri dari banyak kata.
				}
			} else {
				for ($i = 0; $i < count($sentence); $i++) {	//deteksi huruf kapital di awal nama di setiap row
					$idFound = false;
					if (strpos($sentence[$i], "_") == true) {
						$sentence[$i] = str_replace("_", " ", $sentence[$i]);	//mengganti karakter "_" menjadi " "
					}
					$sentence[$i] = preg_replace('/(?<! )(?<!^)[A-Z]/',' $0', $sentence[$i]);	//memberikan spasi sebelum huruf kapital
					$sentence[$i] = ucwords($sentence[$i]);	//mengubah huruf pertama di setiap kata menjadi huruf kapital.
					$tempSplit = explode(" ", $sentence[$i]);	//memecah setiap kata saat ada spasi dalam suatu string.
					for ($j = 0; $j < count($tempSplit); $j++) {
						if (strcasecmp($tempSplit[$j], "id") == 0) {	//membandingkan suatu string dengan karakter. Jika bernilai == 0, maka stringnya adalah sama.
							$tempSplit[0] = strtoupper($tempSplit[$j]);	//mengubah semua huruf menjadi kapital.
							$idFound = true;	//status deteksi "id" menjadi true
							$j = 1;	//kembali ke posisi perulangan 1
						}
						if ($idFound == true) {
							$tempSplit[$j] = NULL;
						}
					}
					if ($tempSplit[$i] == "ID") {	
						$sentence[$i] = implode("", $tempSplit);	//tidak perlu pemisah karena string hanya 1 kata berupa "ID".
					} else {
						$sentence[$i] = implode(" ", $tempSplit);	//perlu pakai pemisah karena string terdiri dari banyak kata.
					}
				}
			}
			
			//echo '<pre>'.print_r($sentence, true).'</pre>';
			
			return $sentence;
		}
		
		function getColumnValue($tableName) {
			$i = 0;
			$result = $this->adminModel->getData($tableName, "column_name")->result();
			foreach ($result as $res) {
				$namaKolom[$i] = $res->column_name;
				$i++;
			}
			return $namaKolom;
		}
		
		function getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName) {
			$data['dataTableName'] = $tableName;
			$jumlah_data = 0;
			$result = $this->adminModel->getData($tableName)->result();
			foreach ($result as $res) {
				$jumlah_data++;
			}
			
			$this->load->library('pagination');
			$config['base_url'] = base_url().'/'.$pageURL;
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
			if ($this->session->has_userdata('sortOption_data') && $this->session->has_userdata('filterOption_data')) {
				if ($this->session->userdata['filterOption_data']['filteredBy'] == 'not selected') {
					$this->session->set_userdata('filterInfo_failed', $this->session->userdata['filterOption_data']['filteredBy']);
					$this->session->unset_userdata('filterOption_data');
					$data[$tableName] = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, NULL, NULL, $config['per_page'], $from);
				} else {
					$filterWords = $this->session->userdata['filterOption_data']['filterWords'];
					$filteredBy = $this->session->userdata['filterOption_data']['filteredBy'];
					$specificFiltering = $this->session->userdata['filterOption_data']['specificFiltering'];
						
					$sortedBy = $this->session->userdata['sortOption_data']['sortedBy'];
					$backwardDirection = $this->session->userdata['sortOption_data']['backwardDirection'];
					
					if ($specificFiltering == 'on') {
						$jumlah_data = $this->adminModel->getData($tableName, NULL, 'specific', $filteredBy, $filterWords)->num_rows();
						$config['total_rows'] = $jumlah_data;
						$this->pagination->initialize($config);
						
						if ($backwardDirection == 'on') {
							$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'specific', $filteredBy, $filterWords, $sortedBy, 'desc', $config['per_page'], $from);
						} else {
							$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'specific', $filteredBy, $filterWords, $sortedBy, 'asc', $config['per_page'], $from);
						}
					} else {
						$jumlah_data = $this->adminModel->getData($tableName, NULL, 'similar', $filteredBy, $filterWords)->num_rows();
						$config['total_rows'] = $jumlah_data;
						$this->pagination->initialize($config);
						
						if ($backwardDirection == 'on') {
							$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'similar', $filteredBy, $filterWords, $sortedBy, 'desc', $config['per_page'], $from);
						} else {
							$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'similar', $filteredBy, $filterWords, $sortedBy, 'asc', $config['per_page'], $from);
						}
					}
					
					//
					if ($jumlah_data == 0) {
						$data['countRows'] = "0"; //Note: (numeric) 0 == NULL, but (varchar) '0' != NULL.
					} else {
						$data['countRows'] = $jumlah_data;
					}
				}
			} else if ($this->session->has_userdata('sortOption_data')) {
				$sortedBy = $this->session->userdata['sortOption_data']['sortedBy'];
				$backwardDirection = $this->session->userdata['sortOption_data']['backwardDirection'];
				
				if ($backwardDirection == 'on') {
					$data[$tableName] = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, $sortedBy, 'desc', $config['per_page'], $from);
				} else {
					$data[$tableName] = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, $sortedBy, 'asc', $config['per_page'], $from);
				}
			} else if ($this->session->has_userdata('filterOption_data')) {			
				if ($this->session->userdata['filterOption_data']['filteredBy'] == 'not selected') {
					$this->session->set_userdata('filterInfo_failed', $this->session->userdata['filterOption_data']['filteredBy']);
					$this->session->unset_userdata('filterOption_data');
					$data[$tableName] = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, NULL, NULL, $config['per_page'], $from);
				} else {
					$filterWords = $this->session->userdata['filterOption_data']['filterWords'];
					$filteredBy = $this->session->userdata['filterOption_data']['filteredBy'];
					$specificFiltering = $this->session->userdata['filterOption_data']['specificFiltering'];
					
					//
					if ($specificFiltering == 'on') {
						$jumlah_data = $this->adminModel->getData($tableName, NULL, 'specific', $filteredBy, $filterWords)->num_rows();
						$config['total_rows'] = $jumlah_data;
						$this->pagination->initialize($config);
						$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'specific', $filteredBy, $filterWords, NULL, NULL, $config['per_page'], $from);
					} else {
						$jumlah_data = $this->adminModel->getData($tableName, NULL, 'similar', $filteredBy, $filterWords)->num_rows();
						$config['total_rows'] = $jumlah_data;
						$this->pagination->initialize($config);
						$data[$tableName] = $this->adminModel->getData($tableName, NULL, 'similar', $filteredBy, $filterWords, NULL, NULL, $config['per_page'], $from);
					}
					
					//
					if ($jumlah_data == 0) {
						$data['countRows'] = "0"; //Note: (numeric) 0 == NULL, but (varchar) '0' != NULL.
					} else {
						$data['countRows'] = $jumlah_data;
					}
				}
			} else {
				$data[$tableName] = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, NULL, NULL, $config['per_page'], $from);
			}
			$data['pagination'] = $this->pagination->create_links();
			$data['dataNamaKolom'] = $this->getNeatWriting($tableName, 'column');
			$data['dataPageTitle'] = $pageTitle;
			$data['dataPageURL'] = $pageURL;
			$data['dataTableName_neat'] = $this->getNeatWriting($tableName, 'table');
			$data['dataValueKolom'] = $this->getColumnValue($tableName);
			
			//$this->load->view('guest/tambahPesanan', $data);
			$this->load->view($actorName.'/'.$pageFileName, $data);
		}
		
		function postData() {
			$tableName = $this->uri->segment(2);	//segment(1) untuk nama method
			$data = 0;
			$dataValueKolom = $this->getColumnValue($tableName);
			$dataNamaKolom = $this->getNeatWriting($tableName, 'column');
			for ($i = 0; $i < count($dataValueKolom); $i++) {
				if ($dataNamaKolom[$i] != "ID") {
					if ($data == 0) {
						$data = array (
							$dataValueKolom[$i] => $this->input->post($dataValueKolom[$i])
						);
					} else {
						$data += array (
							$dataValueKolom[$i] => $this->input->post($dataValueKolom[$i])
						);
					}
				}
			}
			//echo '<pre>'.print_r($data, true).'</pre>';
			$this->adminModel->postData($tableName, $data);
			return redirect($tableName);
		}
		
		function reset_filterTable($pageURL) {
			$this->session->unset_userdata('filterOption_data');
			return redirect($pageURL);
		}
		
		function reset_sortTable($pageURL) {
			$this->session->unset_userdata('sortOption_data');
			return redirect($pageURL);
		}
		
		function sortTable($pageURL) {
			$sortOption_data = array (
				'sortedBy' => $this->input->post('select_sort_option'),
				'backwardDirection' => $this->input->post('checkBox_sortingDirection')
			);
			$this->session->set_userdata('sortOption_data', $sortOption_data);
			return redirect($pageURL);
		}
	}
