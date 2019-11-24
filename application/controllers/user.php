<?php
	include_once(APPPATH.'core/coreController.php');
	class user extends coreController {
		protected $constantModelClass = 'guestModel';
		public function __construct() {
			parent::__construct();
			//$this->load->config('user');
			$this->load->model('adminModel');
			$this->load->model('guestModel');
		}

		function getInformasiVarietas() {
			$actorName = 'Guest';
			$pageFileName = 'view_informasiVarietas';
			$pageTitle = 'Info Varietas Benih Sumber Jeruk';
			$pageURL = 'infoVarietasBenihSumberJeruk';
			$tableName = 'dataVarietasBenihSumberJeruk';
			$this->getDataTable($actorName, $pageFileName, $pageTitle, $pageURL, $tableName);
			// $this->getDataTable($actorName, $pageName, $tableName);
		}
		
		function guestIntersection() {
			$function = $this->uri->segment(2);	//segment(1) untuk nama method
			$pageURL = $this->uri->segment(3);	//segment(1) untuk nama method
			if ($function == 'filterTable') {	
				$this->filterTable($pageURL);
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
			//$this->load->view('guest/UTC_test');
			$this->load->view('guest/permintaan');
		}
		
		function permintaan_add() {			
			include_once('simple_html_dom.php');
			$scrap_currentDate							= file_get_html('http://free.timeanddate.com/clock/i6t96jdh/n631/tlid38/tt1/tw0/tm3/td2')->plaintext;
			$scrap_currentDate_removeStringsExceptDate 	= str_replace("Time in Surabaya", "", $scrap_currentDate);
			
			echo $scrap_currentDate_removeStringsExceptDate;
			
			$add_data = array (
				'data_konsumen' 	=> $this->input->post('input_nama_pemesan'),
				'kabupatenkota' 	=> $this->input->post('input_kabupatenkota_pemesan'),
				'alamat' 			=> $this->input->post('input_alamat_pemesan'),
				'alamat_email' 		=> $this->input->post('input_alamat_email_pemesan'),
				'contactPerson' 	=> $this->input->post('input_nomor_telepon'),			// contactPerson harus string/varchar, karena nomor telepon tidak akan pernah digunakan untuk operasi matematika (+-*:).
				'tanggal_pemesanan'	=> $scrap_currentDate_removeStringsExceptDate,
				'tanggal_selesai'	=> $this->input->post('input_tanggal_selesai'),
				'nama_varietas' 	=> $this->input->post('select_varietas'),
				'jumlah_BD' 		=> $this->input->post('input_jumlah_bd'),
				'jumlah_BP' 		=> $this->input->post('input_jumlah_bp')
			);
		
			$this->guestModel->postDataPermintaan($add_data);
			return redirect('permintaan');
			
			//$time = new DateTime('Asia/Jakarta');
			//echo $time->format('Y-m-d H:i:s');
			
			//#Not work as expected:
			//#--> echo $this->input->post('hidden_timestamp'); --> not work as expected
			//#--> $html = '<iframe src="http://free.timeanddate.com/clock/i6t7omfd/n555/tlid38/th1" frameborder="0" width="57" height="18"><iframe src="http://free.timeanddate.com/clock/i6t7omfd/n555/tlid38/th1" frameborder="0" width="57" height="18"></iframe>
			// </iframe>
			// ';

			// Instantiate a new instance of the class. Passing the string
			// variable automatically loads the HTML for you.
			// $h2t = new DOMDocument();
			// $h2t->loadHTML($html);

			// $contents = $h2t->getElementsByTagName('div');
			// $text = '';
			// foreach ( $contents[0]->childNodes as $content )   {
				// $nodeType = $content->nodeName;
				// if ( strtolower($nodeType[0]) == 'h' ){
					// $text .= $content->textContent.PHP_EOL;
				// }
				// else    {
					// $text .= $content->textContent;
				// }
			// }
			// echo $text;
		}

		// function ourServices() {
			// $this->load->library('session');
			// if ($this->uri->segment(3) == 'indoor' || $this->uri->segment(3) == 'outdoor' || $this->uri->segment(3) == 'home') {
				// $this->load->view($this->uri->segment(3));
			// } else redirect('/');
		// }
	
		// function reset_sortTable() {
			// $pageURL = $this->uri->segment(2);	//segment(1) untuk nama method
			// $this->reset_sortTable($pageURL);
		// }
	
		// function sortTable() {
			// $pageURL = $this->uri->segment(2);	//segment(1) untuk nama method
			// $this->sortTable($pageURL);
		// }
		
		function test_page() {
			//$this->load->view('guest/test_tracking');
			$this->load->view('guest/test_with_bootstrap');
		}
	}
