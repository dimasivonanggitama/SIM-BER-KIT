<?php
	class news extends CI_Model {
		public function deleteNewsModel($id) {
			$this->load->database();
			$this->db->where('id_konten', $id);
			$this->db->delete('konten');
		}
		public function getColumnNameNews() {
			$this->load->database();
			$this->db->select('column_name');
			return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => 'konten', 'TABLE_SCHEMA' => 'antaradigitalmedia'));
		}
		public function getAllDataNews() {
			$this->load->database();
			return $this->db->get('konten');
		}
		public function getNews() {
			$this->load->database();
			return $this->db->get_where('konten', array('status_konten' => 'post'));
		}
		public function getNewsByID($id) {
			$this->load->database();
			$this->db->where('id_konten', $id);
			return $this->db->get('konten');
		}
		public function updateNews($where, $idKonten) {
			$this->load->database();
			$this->db->update('konten', $where, array('id_konten' => $idKonten));
		}
		public function etc() {
			echo "
tegas 1
bawa suasana 2
jangan bikin malu
jangan lemot 3
jaga perasaan
jagngab ada nyakitin termasuk ortu 4	
lulus tepat waktu 5";
		}
	}


