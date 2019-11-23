<?php
	include_once(APPPATH.'core/coreModel.php');
	class userModel extends coreModel {
		public function postDataPermintaan($add_data) {
			$this->load->database();
			return $this->db->insert('permintaan', $add_data);
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
