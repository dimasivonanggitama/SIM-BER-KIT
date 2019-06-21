<?php
	class user extends CI_Controller {
		public function __construct() {
			parent::__construct();
<<<<<<< HEAD
			//$this->load->config('user');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('adminModel');
			$this->load->model('userModel');
=======
			//$this->load->model('adminAccount');
			$this->load->model('login');
			//$this->load->model('news');
>>>>>>> 49bed53695bea46ef5e0c36d01d95cb88fb83d24
		}

  		public function index() {
			//menampilkan landing page
<<<<<<< HEAD
    		$this->load->view('index');
			if ($this->session->has_userdata('loginfirst')) {
				$this->session->unset_userdata('loginfirst');
			}
			if ($this->session->has_userdata('logout')) {
				$this->session->unset_userdata('logout');
			}
  		}
		
=======
    			$this->load->view('index');
  		}
		
		// public function tambah() {
    			// $this->load->view('tambah');
		// }
		
>>>>>>> 49bed53695bea46ef5e0c36d01d95cb88fb83d24
		public function login() {
			if ($this->input->post('input_username')) {
				$username = $this->input->post('input_username');
				$password = $this->input->post('input_password');
				$where = array (
					'username' => $username,
					'password' => $password
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
						$where['login_status'] = $row->login_status;
						$id = $row->id_user;
					}
					if ($row->login_status) $this->session->set_userdata('admin', 'logged');
					else {
						$this->session->set_userdata('admin', $where);
						$this->adminModel->postStatus_log($id);
					}
				} else {
					//akun tidak ditemukan
					$this->session->set_userdata('admin', 'gagal');
				}
				unset ($_POST);
<<<<<<< HEAD
			} else return redirect('/');
=======
			}
>>>>>>> 49bed53695bea46ef5e0c36d01d95cb88fb83d24

			if ($this->session->userdata('admin')) {
				//Jika sudah punya session:
				if ($this->session->userdata('admin') == 'gagal' || $this->session->userdata('admin') == 'logged') {			//efek jika login gagal tidak sesuai dengan database
<<<<<<< HEAD
					//tapi gagal login karena akun tidak ditemukan
					echo "Back to login view because the account is not found";
				} else {
					//login berhasil
					//return $this->load->view('cms');
					redirect('admin');
				}
			} else {
				//Jika belum punya session --> alihkan ke form login modal
				//echo "You need to login first!";
				return $this->load->view('index');
=======
					$this->load->view('login');
				} else {								//efek jika login berhasil sesuai dengan database
					//$this->load->view('cms');
					echo "this is admin views";
				}
			} else { 									//Jika belum pernah masuk ke halaman login dan ingin login
				//$this->load->view('login');
				echo "failed!";
>>>>>>> 49bed53695bea46ef5e0c36d01d95cb88fb83d24
			}
		}
		
		function permintaan() {
			//$this->load->view('guest/UTC_test');
			$this->load->view('guest/permintaan');
		}
		
		function permintaan_add() {
			$add_data = array (
				'data_konsumen' 	=> $this->input->post('input_nama_pemesan'),
				'kabupatenkota' 	=> $this->input->post('input_kabupatenkota_pemesan'),
				'alamat' 			=> $this->input->post('input_alamat_pemesan'),
				'alamat_email' 		=> $this->input->post('input_alamat_email_pemesan'),
				'contactPerson' 	=> $this->input->post('input_nomor_telepon'),			// contactPerson harus string/varchar, karena nomor telepon tidak akan pernah digunakan untuk operasi matematika (+-*:).
				'tanggal_selesai'	=> $this->input->post('input_tanggal_selesai'),
				'nama_varietas' 	=> $this->input->post('select_varietas'),
				'jumlah_BD' 		=> $this->input->post('input_jumlah_bd'),
				'jumlah_BP' 		=> $this->input->post('input_jumlah_bp')
			);
			
			include_once('simple_html_dom.php');
			$scrap_currentDate							= file_get_html('http://free.timeanddate.com/clock/i6t96jdh/n631/tlid38/tt1/tw0/tm3/td2')->plaintext;
			$scrap_currentDate_removeStringsExceptDate 	= str_replace("world", "", $scrap_currentDate);
			
			//$this->userModel->postDataPermintaan($add_data);
			//return redirect('permintaan');
			
			//$time = new DateTime('Asia/Jakarta');
			//echo $time->format('Y-m-d H:i:s');
			
			//#Not work as expected:
			//#--> echo $this->input->post('hidden_timestamp'); --> not work as expected
			//#--> $html = '<iframe src="http://free.timeanddate.com/clock/i6t7omfd/n555/tlid38/th1" frameborder="0" width="57" height="18"><iframe src="http://free.timeanddate.com/clock/i6t7omfd/n555/tlid38/th1" frameborder="0" width="57" height="18"></iframe>
			// </iframe>
			// ';

<<<<<<< HEAD
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
=======
		// function ourServices() {
			// $this->load->library('session');
			// if ($this->uri->segment(3) == 'indoor' || $this->uri->segment(3) == 'outdoor' || $this->uri->segment(3) == 'home') {
				// $this->load->view($this->uri->segment(3));
			// } else redirect('/');
		// }
>>>>>>> 49bed53695bea46ef5e0c36d01d95cb88fb83d24

		// function ourServices() {
			// $this->load->library('session');
			// if ($this->uri->segment(3) == 'indoor' || $this->uri->segment(3) == 'outdoor' || $this->uri->segment(3) == 'home') {
				// $this->load->view($this->uri->segment(3));
			// } else redirect('/');
		// }

	}
