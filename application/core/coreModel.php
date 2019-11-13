<?php
	class coreModel extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		function deleteData($table, $deletingType = NULL, $id = NULL, $data = NULL) {
			if ($deletingType == 'column') {	//only deleting specific 1 column in 1 row, setting to NULL
				$this->db->set($data, FALSE);
				$this->db->where($id);
				$this->db->update($table);
			} else if ($deletingType == 'row') {	//only deleting 1 row
				// if ($id != NULL) {
					// $this->db->where($id);
				// } else {
					// $this->db->where($data);
				// }
				// $this->db->delete($table);
			} else if ($deletingType == 'table') {	//emptying all data in table
				// $this->db->empty_table($table);
			}
		}
		
		function getData($tableName, $particularColumn = NULL, $searchingType = NULL, $columnToSearch = NULL, $keyToSearch = NULL, $order = NULL, $orderDirection = NULL) {
			//order
			if ($order != NULL) {
				if ($orderDirection == NULL) {
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
			
			return $this->db->get($tableName);
		}
	
		function postData($table, $data, $batch = FALSE) {
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
