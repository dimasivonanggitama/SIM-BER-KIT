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
		
  		public function dataKonsumen() {
			//menampilkan halaman Data Konsumen untuk Admin
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

$jumlah_data = $this->adminModel->getData('datakonsumen', NULL, NULL, NULL, NULL, NULL, NULL, $config['per_page'], $from)->num_rows();
//$jumlah_data = $this->adminModel->getDataKonsumen($config['per_page'], $from)->num_rows();			
			}
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('Admin/dataKonsumen', $data);
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
		
  		public function getDataDistribusi() {	//menampilkan halaman Data Varietas Benih Sumber Jeruk untuk Admin
			$actorName 				= 'Admin';
			$pageFileName 			= 'view_dataDistribusi';
			$pageURL = $tableName 	= 'dataDistribusi';
			$pageTitle 				= "DATA DISTRIBUSI";
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
			$this->session->unset_userdata('filterOption_data');
			$this->session->unset_userdata('sortOption_data');
			$this->session->unset_userdata('userdata');
			//session_destroy();	//tidak bisa menggunakan session pada method yang sama yang telah menjalankan session_destroy().
			
			$this->session->set_userdata('announcementText', 'Anda telah melakukan <strong>Logout</strong>.');
			$this->session->set_userdata('announcementColor', 'success');
    		redirect('/');
		}
		

		function test() {
			//echo '<pre>'.print_r($result, true).'</pre>';
			//echo "nothing to do in here!";
			$table = "";
			$tableName = 'dataVarietasBenihSumberJeruk';
			$dataValueKolom = $this->getColumnValue($tableName);
			$data = $this->adminModel->getData($tableName, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL);
			for ($i = 0; $i < count($dataValueKolom); $i++) {
				$valueKolom = $dataValueKolom[$i];
				foreach ($data->result() as $row) :
					echo $row->$dataValueKolom[$i];
				endforeach;
			}
		}
		
		function temp() {
			/*
			<tbody>
	<?php if ($countRows == "0") { ?>
		<td colspan="4"><h6 class="text-center text-danger">Maaf, hasil pencarian tidak ditemukan.</h6></td>
	<?php } else { ?>
		<?php $id_varietasBenihSumberJeruk = $this->uri->segment('3') + 1; ?>
		<?php foreach ($dataVarietasBenihSumberJeruk->result() as $row): ?>
			<tr class="border-bottom additional-selected-row" id="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
				<th scope="row"><?php echo $row->id_varietasBenihSumberJeruk; ?></th>
				<td 
					<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
						<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == "namaVarietasBenihSumberJeruk") { ?> 
							class="additional-selected-filter" 
						<?php } ?>
					<?php } ?>
					<?php if ($this->session->userdata('sortOption_data') != NULL) { ?>
						<?php if ($this->session->userdata['sortOption_data']['sortedBy'] == "namaVarietasBenihSumberJeruk") { ?> 
							class="additional-selected-sort" 
						<?php } ?> 
					<?php } ?> 
				>
					<?php echo $row->namaVarietasBenihSumberJeruk; ?>
				</td>
				<td>
					<a data-toggle="modal" data-target="#modal_dataKonsumen-edit-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" href="#"> 
						<div class="additional-table-edit-button" data-toggle="tooltip" data-placement="bottom" title="Edit">
						</div>
					</a>
					
					<!-- Modal for Edit dataVarietasBenihSumberJeruk -->
					<div class="modal fade" id="modal_dataKonsumen-edit-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="mdi mdi-pencil modal-title" id="modalCenterTitle"> Edit Data Konsumen</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true" class="text-danger">&times;</span>
									</button>
								</div>
								<form action="<?php echo base_url('dataKonsumen_update'); ?>" method="post">
									<div class="modal-body">
										<input type="hidden" name="hidden_input_id" value="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
										<div class="form-group">
											<label for="input_edit_konsumen">Nama Konsumen<b class="text-danger">*</b></label>
											<input class="form-control" id="input_edit_konsumen" name="input_konsumen" type="text" value="<?php echo $row->nama_varietasBenihSumberJeruk; ?>" required>
										</div>
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
					<a data-toggle="modal" data-target="#modal_dataKonsumen-delete-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" href="#"> 
						<div class="additional-table-delete-button" data-toggle="tooltip" data-placement="bottom" title="Hapus">
						</div>
					</a>
					
					<!-- Modal for Delete dataVarietasBenihSumberJeruk per row -->
					<div aria-labelledby="modalLabel" aria-hidden="true" class="modal fade" id="modal_dataKonsumen-delete-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" role="dialog" tabindex="-1">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form action="<?php echo base_url('dataKonsumen_delete'); ?>" method="post">
									<div class="modal-header">
										<h5 class="mdi mdi-delete modal-title" id="modalLabel"> Hapus Data Konsumen</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="text-danger">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input type="hidden" name="input_hidden_id" value="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
										<p>Apakah anda yakin ingin menghapus Data Konsumen dengan ID="<b class="text-danger"><?php echo $row->id_varietasBenihSumberJeruk; ?></b>"?</p>
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
			</tr>
		<?php endforeach; ?>
	<?php } ?>
</tbody>
*/
		}
	}
	//$adminController = new adminController();