<?php
	class admin extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('login');
		}
		
  		function index() {
			$this->load->library('session');
			//$this->session->unset_userdata('admin');
			if ($this->session->userdata('admin')) {
				if ($this->session->userdata('admin') == 'gagal') {
					$this->load->view('login');
				} else {
    					redirect('/');
				}
			} else {
    				$this->load->view('login');
			}
			
  		}

  		function process() {
			$this->load->library('session');

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array (
				'username' => $username,
				'password' => $password
			);

			//$this->(nama class model)->(nama method/function yang ada di class model tersebut (parameter);
			$cek = $this->login->getNameAndPassword('admin', $where)->num_rows();
			if ($cek > 0) {
				$admin = true;
				$this->session->set_userdata('admin', 'true');
				redirect('admin');
			} else {
				$this->session->set_userdata('admin', 'gagal');
    				redirect('admin');
			}
  		}

		function logout(){
			$this->load->library('session');
			$this->session->sess_destroy();
    			redirect('/admin');
		}
	}
