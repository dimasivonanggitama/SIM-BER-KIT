<?php
	class login extends CI_Model {
		public function getNameAndPassword($table, $where) {
			$this->load->database();
			return $this->db->get_where($table, $where);
		}
	}
