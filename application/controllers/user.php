<?php
	class user extends CI_Controller {
		public function __construct() {
			parent::__construct();
			//$this->load->model('adminAccount');
			$this->load->model('login');
			//$this->load->model('news');
		}

  		public function index() {
			//menampilkan landing page
    			$this->load->view('index');
  		}
		
		// public function tambah() {
    			// $this->load->view('tambah');
		// }
		
		public function login() {
			$this->load->library('session');
			if ($this->input->post('username')) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$where = array (
					'username' => $username,
					'password' => $password
				);
	
				//$this->db->query ("parameter berbentuk sintaks query"));
				//		atau
				//$this->nama class model->nama method atau function yang ada di class model tersebut (parameter);
				$cek = $this->login->getNameAndPassword('admin', $where)->num_rows();
				if ($cek > 0) {
					$cek = $this->login->getNameAndPassword('admin', $where);
					foreach ($cek->result() as $row) {
						$where['status'] = $row->status;
						$id = $row->id;
					}
					//print_r ($where);
					if ($row->status_log) $this->session->set_userdata('admin', 'logged');
					else {
						$this->session->set_userdata('admin', $where);
						$this->adminAccount->postStatus_log($id);
					}
				} else {
					$this->session->set_userdata('admin', 'gagal');
				}
				unset ($_POST);
			}

			if ($this->session->userdata('admin')) {
				if ($this->session->userdata('admin') == 'gagal' || $this->session->userdata('admin') == 'logged') {			//efek jika login gagal tidak sesuai dengan database
					$this->load->view('login');
				} else {								//efek jika login berhasil sesuai dengan database
					//$this->load->view('cms');
					echo "this is admin views";
				}
			} else { 									//Jika belum pernah masuk ke halaman login dan ingin login
				//$this->load->view('login');
				echo "failed!";
			}
		}

		// function ourServices() {
			// $this->load->library('session');
			// if ($this->uri->segment(3) == 'indoor' || $this->uri->segment(3) == 'outdoor' || $this->uri->segment(3) == 'home') {
				// $this->load->view($this->uri->segment(3));
			// } else redirect('/');
		// }

	}
