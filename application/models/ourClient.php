<?php
	class ourClient extends CI_Model {
		public function getClient() {
			$this->load->database();
			return $this->db->get('klien');
		}
		public function getColumnNameClient() {
			$this->load->database();
			$this->db->select('column_name');
			return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => 'klien'));
		}
		public function postClient($data_name, $data_photo) {
			$this->load->database();
			$where = array (
					'nama_klien' => $data_name,
					'logo_klien' => $data_photo
				);
			$this->db->insert('klien', $where);
		}
		public function deleteClientModel($id) {
			$this->load->database();
			$this->db->where('id_klien', $id);
			$this->db->delete('klien');
		}
	}
