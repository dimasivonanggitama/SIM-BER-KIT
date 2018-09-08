<?php
	class universalQuery extends CI_Model {
		public function getColumnName($table) {
			$this->load->database();
			$this->db->select('column_name');
			return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => $table));
		}
		public function getAllData($table) {
			$this->load->database();
			return $this->db->get($table);
		}
	}
