<?php
	class addNews extends CI_Model {
		public function postNews($table, $data) {
			$this->load->database();
			return $this->db->insert($table, $data);
		}

		public function getAdminID($table, $where) {
			$this->load->database();
			return $this->db->get_where($table, $where);
		}
	}
