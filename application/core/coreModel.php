<?php
	class coreModel extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		function deleteData($table, $deletingType = NULL, $id = NULL, $data = NULL) {
			if ($deletingType == 'column') {	//only deleting a specific data in column and row, setting to NULL
				$this->db->set($data, FALSE);
				$this->db->where($id);
				$this->db->update($table);
			} else if ($deletingType == 'row') {	//only deleting 1 row
				if ($id != NULL) {
					$this->db->where($id);
				} else {
					$this->db->where($data);
				}
				$this->db->delete($table);
			} else if ($deletingType == 'table') {	//emptying all data in table
				$this->db->empty_table($table);
			}
		}
		
		function getData($tableName, $particularColumn = NULL, $searchingType = NULL, $columnToSearch = NULL, $keyToSearch = NULL, $order = NULL, $orderDirection = NULL, $number = NULL, $offset = NULL) {
			//order
			if ($order != NULL) {
				if ($orderDirection == NULL || $orderDirection == 'asc') {
					$this->db->order_by($order, 'ASC');
				} else {
					$this->db->order_by($order, $orderDirection);
				}
			}
			
			//particular column only
			if ($particularColumn != NULL) {
				$this->db->select($particularColumn);
			}
			
			//where
			if ($searchingType != NULL) {
				if ($searchingType == 'similar') {
					$this->db->like($columnToSearch, $keyToSearch);
				} else if ($searchingType == 'specific') {
					$this->db->where($columnToSearch, $keyToSearch);
				}
			}
			
			//return
			if ($number != NULL || $offset != NULL) {	//$number & $offset --> numbering views pada tabel. sehingga bisa menampilkan (misalnya) 10 item per halaman.
				return $this->db->get($tableName, $number, $offset);
			} else {
				if ($particularColumn == "column_name") {	//khusus sintaks return untuk menampilkan semua nama kolom dari suatu tabel, letaknya memang di baris ini karena sintaksnya yang berbeda dan rumit.
					return $this->db->get_where('INFORMATION_SCHEMA.COLUMNS', array('TABLE_NAME' => $tableName, 'TABLE_SCHEMA' => 'sim-ber-kit'));
				} else {	//jika ingin menampilkan data dengan normal:
					return $this->db->get($tableName);
				}
			}
		}
	
		function postData($table, $data, $batch = FALSE) {	//batch -> melakukan post data dengan banyak row sekaligus
			if ($batch == FALSE) {
				$this->db->insert($table, $data);
			} else {
				$this->db->insert_batch($table, $data);
			}
		}
	
		function updateData($table, $data, $id) {
			$this->db->update($table, $data, $id);
		}
	}
