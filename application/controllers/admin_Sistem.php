<?php
	require_once APPPATH . 'core/admin.php';
	class admin_Sistem extends admin {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('login');
			$this->load->model('adminAccount');
		}

		function addAccount() {
			if ($this->input->post('input_username')) {
				$namaAccount = $this->input->post('input_username');
				$this->adminAccount->postAccount($namaAccount);
				unset ($_POST);
			}

			//Get column name of client
			$columnName = $this->adminAccount->getAdminColumnNameExceptPasswordAndStatus();
			$i = 1;
			foreach ($columnName->result() as $row) {
				if ($row->column_name == 'password' || $row->column_name == 'status') { continue;
				} else {
					$where1[$i] = $row->column_name;
					$i++; }
			}	
			//print_r($where1);
			$this->session->set_userdata('columnName', $where1);

			//Get client data
			$allAdminData = $this->adminAccount->getAdminExceptPasswordAndStatus()->num_rows();
			if ($allAdminData > 0) {
				$allAdminData = $this->adminAccount->getAdminExceptPasswordAndStatus();
				$i = 1;
				foreach ($allAdminData->result() as $row) {
					$where2['id'][$i]	  = $row->id;
					$where2['username'][$i]	  = $row->username;
					$where2['fotoProfil'][$i] = "fotoProfil id=".$i; //$row->fotoProfil;
					$where2['status_log'][$i] = $row->status_log;
					$i++;
				}
				$this->session->set_userdata('allAdminData', $where2);
			}
			
			//print_r($this->session->userdata('allAdminData'));
			//echo $this->session->userdata('allAdminData')[$columnName][$i];
    			$this->load->view('mgacc');
		}

		function deleteAccount() {
			if ($this->uri->segment(3) != null) {
				$this->session->set_userdata('requestDeleteData', $this->uri->segment(3));
				redirect('admin_Sistem/deleteAccount');
			} else {
				$this->adminAccount->deleteAccountModel($this->session->userdata('requestDeleteData'));
				$this->session->unset_userdata('requestDeleteData');
				redirect('admin/manageAccount');
			}
		}

		function logoutAccount(){
			if ($this->uri->segment(3) != null) {
				$this->session->set_userdata('requestLogoutData', $this->uri->segment(3));
				redirect('admin_Sistem/logoutAccount');
			} else {
				$this->load->model('ourClient');
				$this->adminAccount->deleteStatus_log($this->session->userdata('requestLogoutData'));
				if ($this->session->userdata('requestLogoutData') == '2') {
					$this->session->unset_userdata('requestLogoutData');
					redirect('admin_Konten/logout');
				} else redirect('admin/manageAccount');
			}
		}
	}
