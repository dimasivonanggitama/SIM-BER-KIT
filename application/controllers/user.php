<?php
	class user extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('adminAccount');
			$this->load->model('login');
			$this->load->model('news');
		}

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
				//redirect('/admin'); 
			}

			if ($this->session->userdata('admin')) {
				if ($this->session->userdata('admin') == 'gagal' || $this->session->userdata('admin') == 'logged') {			//efek jika login gagal tidak sesuai dengan database
					$this->load->view('login');
				} else {								//efek jika login berhasil sesuai dengan database
    					$this->load->view('cms');
				}
			} else { 									//Jika belum pernah masuk ke halaman login dan ingin login
				$this->load->view('login');
			}
		}

  		public function index() {
			$this->load->library('session');
			//echo "work!\n";
			$this->load->model('news');
			$count_result = $this->news->getNews()->num_rows();
			//echo $count_result;
			if ($count_result > 0) {
				function get_string_between($string, $start, $end) {
					$string = " ".$string;
					$ini = strpos($string,$start);
					if ($ini == 0) return $string;
					$ini += strlen($start); 
					$len = strpos($string,$end,$ini) - $ini;
					return substr($string,$ini,$len);
				}
				$getPostedNews = $this->news->getNews();
				$i = 1;
				foreach ($getPostedNews->result() as $row) {
					$where['judul'][$i] = $row->judul; //huruf kapital sangat berpengaruh pada nama tabel.
					$fullstring = $row->deskripsi; 
			
					$parsed = get_string_between($fullstring, "<p>", "</p>");
					$where['deskripsi'][$i] = $parsed;

					$i++;
				}
				//print_r ($where);
				$this->session->set_userdata('news', $where);
				$this->session->set_userdata('total_news', $count_result);
				//var_dump ($this->session->userdata('total_news'));
			}
    			$this->load->view('index');
  		}

	}
