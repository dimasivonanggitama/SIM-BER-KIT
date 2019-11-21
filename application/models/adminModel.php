<?php
	include_once(APPPATH.'core/coreModel.php');
	class adminModel extends coreModel {
		// public function deleteAccountModel($id) {
			// $this->load->database();
			// $this->db->where('id', $id);
			// $this->db->delete('admin');
		// }
		
		public function deleteDataKonsumen($id_user) {
			$this->load->database();
			$this->db->where($id_user);
			return $this->db->delete('datakonsumen');
		}
		
		public function deleteDataKonsumen_all() {
			$this->load->database();
			return $this->db->empty_table('datakonsumen');
		}
		
		public function deleteStatus_log($id_user) {
			$this->load->database();
			$this->db->update('users', array('login_status' => null), array('id_user' => $id_user));
		}
		
		public function getAdmin($where) {
			$this->load->database();
			return $this->db->get_where('users', $where);
		}
		
		// public function getAdminColumnNameExceptPasswordAndStatus() {
			// $this->load->database();
			// $this->db->select('column_name');
			// return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => 'users', 'TABLE_SCHEMA' => 'antaradigitalmedia'));
		// }
		
		// function getData($tableName, $particularColumn = NULL, $searchingType = NULL, $columnToSearch = NULL, $keyToSearch = NULL, $order = NULL, $orderDirection = NULL) {
			// $this->load->database();
			
			// //order
			// if ($order != NULL) {
				// if ($orderDirection == NULL) {
					// $this->db->order_by($order, 'ASC');
				// } else {
					// $this->db->order_by($order, $orderDirection);
				// }
			// }
			// //particular column only
			// if ($particularColumn != NULL) {
				// $this->db->select($particularColumn);
			// }
			
			// //where
			// if ($searchingType != NULL) {
				// if ($searchingType == 'similar') {
					// $this->db->like($columnToSearch, $keyToSearch);
				// } else if ($searchingType == 'specific') {
					// $this->db->where($columnToSearch, $keyToSearch);
				// }
			// }
			
			// return $this->db->get($tableName);
		// }
		
		//public function getDataKonsumen() {
		public function getDataKonsumen($number, $offset) {
			$this->load->database();
			//return $this->db->get('dataKonsumen');
			return $this->db->get('dataKonsumen', $number, $offset);
		 // return $this->db->get($tableName,     $number, $offset);
		}
		
		// public function getDataKonsumen_ColumnNameOnly() {
			// $this->load->database();
			// $this->db->select('column_name');
			// return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => 'dataKonsumen', 'TABLE_SCHEMA' => 'sim-ber-kit'));
		// }
		
		public function getDataKonsumen_CountRows() {
			$this->load->database();
			return $this->db->get('dataKonsumen')->num_rows();
		}
		
		public function getDataKonsumen_filter($filterWords, $filteredBy, $number, $offset) {
			$this->load->database();
			$this->db->like($filteredBy, $filterWords);
			return $this->db->get('dataKonsumen', $number, $offset);
		}
		
		public function getDataKonsumen_filter_countRows($filterWords, $filteredBy) {
			$this->load->database();
			$this->db->like($filteredBy, $filterWords);
			return $this->db->get('dataKonsumen')->num_rows();
		}
		
		public function getDataKonsumen_filter_specific($filterWords, $filteredBy,  $number, $offset) {
			$this->load->database();
			$this->db->where($filteredBy, $filterWords);
			return $this->db->get('dataKonsumen', $number, $offset);
		}
		
		public function getDataKonsumen_filter_specific_countRows($filterWords, $filteredBy) {
			$this->load->database();
			$this->db->where($filteredBy, $filterWords);
			return $this->db->get('dataKonsumen')->num_rows();
		}
		
		public function getDataKonsumen_filterAndSort($filterWords, $filteredBy, $sortBy, $sortDirection, $number, $offset) {
			$this->load->database();
			$this->db->like($filteredBy, $filterWords);
			$this->db->order_by($sortBy, $sortDirection);
			return $this->db->get('dataKonsumen', $number, $offset);
		}
		
		public function getDataKonsumen_filterAndSort_specific($filterWords, $filteredBy, $sortBy, $sortDirection, $number, $offset) {
			$this->load->database();
			$this->db->where($filteredBy, $filterWords);
			$this->db->order_by($sortBy, $sortDirection);
			return $this->db->get('dataKonsumen', $number, $offset);
		}
		
		public function getDataKonsumen_sort($sortBy, $sortDirection, $number, $offset) {
			$this->load->database();
			$this->db->order_by($sortBy, $sortDirection);
			return $this->db->get('dataKonsumen', $number, $offset);
		}
		
		public function getDataVarietasBenihSumberJeruk (){
			$this->load->database();
			return $this->db->get('dataVarietasBenihSumberJeruk');
		}
		
		public function getDataVarietasBenihSumberJeruk_ColumnNameOnly() {
			$this->load->database();
			$this->db->select('column_name');
			return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => 'datavarietasbenihsumberjeruk', 'TABLE_SCHEMA' => 'sim-ber-kit'));
		}
		
		public function getAdminExceptPasswordAndStatus() {
			$this->load->database();
			$this->db->select('id');
			$this->db->select('username');
			//$this->db->select('fotoProfil');
			$this->db->select('status_log');
			return $this->db->get('users');
		}
		
		public function getAdminID($username) {
			$this->load->database();
			$this->db->select('id_user');
			return $this->db->get_where('users', array('username' => $username));
		}
		
		public function postDataKonsumen($add_data) {
			$this->load->database();
			return $this->db->insert('datakonsumen', $add_data);
		}
		
		public function postStatus_log($id_user) {
			$this->load->database();
			$this->db->update('users', array('login_status' => 'login'), array('id_user' => $id_user));
		}
		
		public function updateDataKonsumen($id, $update_data) {
			$this->load->database();
			$this->db->where('id_konsumen', $id);
			$this->db->update('datakonsumen', $update_data);
		}
	}
