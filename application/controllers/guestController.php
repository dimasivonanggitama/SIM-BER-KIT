<?php
	include_once(APPPATH.'core/coreController.php');
	class guestController extends coreController {
		protected $constantModelClass = 'guestModel';
		public function __construct() {
			parent::__construct();
			//$this->load->config('user');
			$this->load->model('adminModel');
			$this->load->model('guestModel');
		}

		function getInfoDistribusi() {
			$actorName 	  = 'Guest';
			$pageFileName = 'view_infoDistribusi';
			$pageTitle 	  = 'Informasi Distribusi';
			$pageURL 	  = 'infoDistribusi';
			$tableName 	  = 'dataDistribusi';
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
		}

		function getInfoKonsumen() {
			$actorName 	  = 'Guest';
			$pageFileName = 'view_infoKonsumen';
			$pageTitle 	  = 'Informasi Konsumen';
			$pageURL 	  = 'infoKonsumen';
			$tableName 	  = 'dataKonsumen';
			$particularColumn = NULL;
			// $particularColumn = array(
				// 'id_konsumen',
				// 'nama_konsumen',
				// 'kabupatenkota'
			// );
			
			$i = 0;
			$result = $this->guestModel->getData($tableName, 'nama_konsumen')->result();	//unfortunately, '$this->getDataTable' oly can shows data on view file and it's parent class. it cannot pass the data from another function to manage it in this function. That's why we call getData from coreModel (in this function, we calls it via guestModel) which could manage the data in this function.
			foreach ($result as $res) {
				$additionalData['dataNamaKonsumen'][$i] = $namaKonsumen[$i] = $res->nama_konsumen;
				$i++;
			}

			for ($i = 0; $i < count($namaKonsumen); $i++) {	//untuk setiap nama konsumen
				$j = 0;
				$result = $this->guestModel->getData('dataDistribusi', 'varietas', 'specific', 'dataPelanggan', $namaKonsumen[$i], 'varietas')->result();
				foreach ($result as $res) {
					$additionalData['dataDistribusi_varietas'][$namaKonsumen[$i]][$j] = $res->varietas;	//untuk setiap varietas yang tersedia oleh masing-masing konsumen.
					$j++;
				}
			}
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName, $particularColumn, $additionalData);	//
			// $this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName, $particularColumn);	//
			
		}

		function getInfoPermintaan() {
			$data['dataActorName'] 			= $actorName	= 'Guest';
			$data['dataPageFileName'] 		= $pageFileName	= 'view_infoPermintaanBenih';
			$data['dataPageTitle'] 			= $pageTitle	= 'Informasi Permintaan Benih';
			$data['dataPageURL'] 			= $pageURL 	  	= 'infoPermintaan';
			$data['dataTableName'] 			= $tableName	= 'dataPermintaan';
			
			$result							= $this->guestModel->getData('dataVarietasBenihSumberJeruk', 'namaVarietasBenihSumberJeruk', NULL, NULL, NULL, 'namaVarietasBenihSumberJeruk', 'asc')->result();
			$i = 0;
			foreach ($result as $res) {
				$data['dataNamaMenuVarietas'][$i] = $res->namaVarietasBenihSumberJeruk;
				$i++;
			}
			$this->load->view($actorName.'/'.$pageFileName, $data);
		}

		function getInfoVarietasBenihSumberJeruk() {
			$actorName 	  = 'Guest';
			$pageFileName = 'view_infoVarietasBenihSumberJeruk';
			$pageTitle 	  = 'Informasi Varietas Benih Sumber Jeruk';
			$pageURL 	  = 'infoVarietasBenihSumberJeruk';
			$tableName 	  = 'dataVarietasBenihSumberJeruk';
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
		}
		
		function guestIntersection() {
			$function 	= $this->uri->segment(2);	//segment(1) untuk nama method
			$pageURL 	= $this->uri->segment(3);	//segment(1) untuk nama method
			$tableName	= $this->uri->segment(4);	//segment(1) untuk nama method
			if ($function == 'filterTable') {	
				$this->filterTable($pageURL);
			} else if ($function == 'postDataPermintaan') {
				$this->postDataPermintaan($pageURL, $tableName); 
			} else if ($function == 'reset_filterTable') {
				$this->reset_filterTable($pageURL);
			} else if ($function == 'reset_sortTable') {
				$this->reset_sortTable($pageURL);
			} else if ($function == 'sortTable') {
				$this->sortTable($pageURL);
			} 
		}

  		public function index() {
			//menampilkan landing page
    		$this->load->view('index');
			if ($this->session->has_userdata('loginfirst')) {
				$this->session->unset_userdata('loginfirst');
			}
			if ($this->session->has_userdata('logout')) {
				$this->session->unset_userdata('logout');
			}
			if ($this->session->has_userdata('announcementText')) {
				$this->session->unset_userdata('announcementText');
				$this->session->unset_userdata('announcementColor');
			}
  		}
		
		public function login() {
			if ($this->input->post('input_username') == NULL) {
				return redirect('/');
			} else {
				$where = array (
					'username' => $this->input->post('input_username'),
					'password' => $this->input->post('input_password')
				);
	
				//$this->db->query ("parameter berbentuk sintaks query"));
				//		atau
				//$this->nama class model->nama method atau function yang ada di class model tersebut (parameter);
				$cek = $this->adminModel->getAdmin($where)->num_rows();
				//echo "cek = $cek";
				if ($cek > 0) {
					//akun ditemukan
					$cek = $this->adminModel->getAdmin($where);
					foreach ($cek->result() as $row) {
						$data['username'] = $row->username;
						$data['login_status'] = $row->login_status;
						$data['id_user'] = $row->id_user;
					}
					
					unset ($_POST);
					if ($row->login_status != NULL) {
						// $this->session->set_userdata('admin', 'logged');
						$this->session->set_userdata('announcementText', 'Anda belum melakukan <i>logout</i> sebelumnya. Sistem otomatis telah melakukan <i>logout</i> pada akun anda. <strong>Silahkan <i>login</i> kembali.</strong>');
						$this->session->set_userdata('announcementColor', 'danger');
						$this->adminModel->deleteData('users', 'column', array('id_user' => $data['id_user']), array('login_status' => NULL));
						redirect('/');
					} else {
						// $this->adminModel->postStatus_log($id);
						$this->session->set_userdata('userdata', $data);
						$this->adminModel->updateData('users', array('login_status' => 'login'), array('id_user' => $data['id_user']));
						redirect('admin');
					}
				} else {	//Jika akun tidak ditemukan
					// $this->session->set_userdata('admin', 'gagal');
					$this->session->set_userdata('announcementText', 'Username atau Password yang anda masukkan salah. <strong>Pastikan anda tidak salah ketik dan perhatikan <i>Caps Lock</i> dengan benar.</strong>');
					$this->session->set_userdata('announcementColor', 'danger');
					unset ($_POST);
					redirect('/');
				}
			}

			// if ($this->session->userdata('admin')) {
				// //Jika sudah punya session:
				// if ($this->session->userdata('admin') == 'gagal' || $this->session->userdata('admin') == 'logged') {			//efek jika login gagal tidak sesuai dengan database
					// //tapi gagal login karena akun tidak ditemukan
					// echo "Back to login view because the account is not found";
				// } else {
					// //login berhasil
					// //return $this->load->view('cms');
					// redirect('admin');
				// }
			// } else {
				// //Jika belum punya session --> alihkan ke form login modal
				// //echo "You need to login first!";
				// return $this->load->view('index');
			// }
		}
		
		function permintaan() {
			$this->load->view('guest/permintaan');
		}
		
		function postDataPermintaan($pageURL, $tableName) {	
			if ($this->input->post('input_tanggal_selesai') <= date("Y-m-d")) {
				$this->session->set_userdata('failedMessage', "<center>Tanggal selesai tidak boleh kurang atau sama dengan hari ini!</center>");
				return redirect($pageURL);
			} else {
				$data = array (
					'namaPemesan' 		=> $this->input->post('input_nama_pemesan'),
					'kabupatenAtauKota' => $this->input->post('input_kabupatenkota_pemesan'),
					'alamatDistribusi' 	=> $this->input->post('input_alamat_pemesan'),
					'alamatEmail' 		=> $this->input->post('input_alamat_email_pemesan'),
					'nomorTelepon' 		=> $this->input->post('input_nomor_telepon'),			// contactPerson harus string/varchar, karena nomor telepon tidak akan pernah digunakan untuk operasi matematika (+-*:).
					//'tanggalPemesanan'	=> $scrap_currentDate_removeStringsExceptDate,
					'tanggalPemesanan'	=> date("Y-m-d"),
					'tanggalSelesai'	=> $this->input->post('input_tanggal_selesai'),
					'varietas' 			=> $this->input->post('select_varietas'),
					'benihDasar' 		=> $this->input->post('input_jumlah_bd'),
					'benihPokok' 		=> $this->input->post('input_jumlah_bp'),
					'total'				=> $this->input->post('input_jumlah_bd') + $this->input->post('input_jumlah_bp'),
					'statusPermintaan' 	=> 'Belum diproses'
				);
				$this->session->set_userdata('successMessage', "<center><b>Permintaan anda telah masuk ke sistem.</b></center> <br>Untuk melihat perkembangan status permintaan anda, silahkan periksa pesan <i>email</i> dan/atau SMS yang telah kami kirimkan kepada anda.");
				//$this->guestModel->postDataPermintaan($data);
				$this->guestModel->postData($tableName, $data);
				return redirect($pageURL);
				// $this->session->set_userdata('success_message') = "Permintaan anda telah masuk ke sistem. Kode permintaan anda adalah <b>".$aaa."</b>. <br>Untuk melihat perkembangan status permintaan anda, silahkan periksa pesan <i>email</i> dan/atau SMS yang telah kami kirimkan kepada anda.";
			}
		}
		
		function test_page() {
			//$this->load->view('guest/test_tracking');
			$this->load->view('guest/test_with_bootstrap');
		}
	}
