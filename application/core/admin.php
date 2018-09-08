<?php
	class admin extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('login');
		}
		
  		//abstract function addNews();

		function logout(){
			$this->load->library('session');
			$this->load->model('adminAccount');
			echo $this->session->userdata['admin']['username'];

			$getUsername = $this->adminAccount->getAdminID($this->session->userdata['admin']['username']);
			foreach ($getUsername->result() as $row) {
				$id = $row->id;
			}
			$this->adminAccount->deleteStatus_log($id);
			echo 'test di admin controller';

			$this->session->sess_destroy();
			//echo 'berhasil dihapus';
    			redirect('/admin');
		}

	}
