<?php
	require_once APPPATH . 'core/admin.php';
	class admin_Konten extends admin {
		function __construct() {
			parent::__construct();
			//$this->load->library('session');
			//if ($this->session->userdata('admin') == FALSE) {
			//redirect('admin');}
		}
		
		function addClient() {
			$this->load->library('session');
			$this->load->model('ourClient');

			if ($this->input->post('namaKlien')) {
				$namaKlien = $this->input->post('namaKlien');
				$logoKlien = $this->input->post('logoKlien');
				$this->ourClient->postClient($namaKlien, $logoKlien);
				unset ($_POST);
			}

			//Get column name of client
			$columnName = $this->ourClient->getColumnNameClient();
			$i = 1;
			foreach ($columnName->result() as $row) {
				$where1[$i] = $row->column_name;
				$i++;
			}
			$this->session->set_userdata('columnName', $where1);

			//Get client data
			$allKlienData = $this->ourClient->getClient()->num_rows();
			if ($allKlienData > 0) {
				$allKlienData = $this->ourClient->getClient();
				$i = 1;
				foreach ($allKlienData->result() as $row) {
					$where2['id_klien'][$i]		= $row->id_klien;
					$where2['nama_klien'][$i]	= $row->nama_klien;
					$where2['logo_klien'][$i]     	= $row->logo_klien;
					$i++;
				}
				$this->session->set_userdata('allKlienData', $where2);
			}
			$this->load->view('ourClient');
		}

		function addNews(){
			$this->load->library('session');
			if ($this->input->post('input_news_status')) {
				$input_news_title = $this->input->post('input_news_title');
				$input_news_content = $this->input->post('inputtt');
				echo $input_news_content;
				//$input_news_image = $this->input->post('input_news_image');
				$input_news_status = $this->input->post('input_news_status');

			$this->load->model('addNews');
				$where = array (
					'username' => $this->session->userdata['admin']['username']
				);
				$id = $this->addNews->getAdminID('admin', $where)->num_rows();
				if ($id > 0) {
					$id = $this->addNews->getAdminID('admin', $where);
					foreach ($id->result() as $row) {
						$id = $row->id;
					}
					//print_r ($where);
				}

				$where = array (
					'judul' => $input_news_title,
					'deskripsi' => $input_news_content,
					'id_admin' => $id,
					'status_Konten' => $input_news_status
				);
				$this->addNews->postNews('konten', $where);

				$this->session->set_userdata('konten', $where);
				unset ($_POST);
				print_r ($where);
    				//redirect('admin_Konten/addNews');
			} else {
				unset ($_POST);
    				$this->load->view('addNews');
			} 
		}

		function deleteClient() {
			$this->load->library('session');
			if ($this->uri->segment(3) != null) {
				$this->session->set_userdata('requestDeleteData', $this->uri->segment(3));
				redirect('admin_Konten/deleteClient');
			} else {
				$this->load->model('ourClient');
				$this->ourClient->deleteClientModel($this->session->userdata('requestDeleteData'));
				redirect('admin_Konten/addClient');
			}
		}

		function deleteNews() {
			$this->load->library('session');
			if ($this->uri->segment(3) != null) {
				$this->session->set_userdata('requestDeleteData', $this->uri->segment(3));
				//redirect('admin_Konten/deleteNews');
			} else {
				$this->load->model('news');
				$this->news->deleteNewsModel($this->session->userdata('requestDeleteData'));
				redirect('admin_Konten/getNews');
			}
		}

		function editNews() {
			//echo "this is an edit news function";
			$this->load->library('session');
			$this->load->model('news');

			if ($this->uri->segment(3) != null) {
				$this->session->set_userdata('requestShowData', $this->uri->segment(3));
				//redirect('admin_Konten/editNews');
			} else {
				if ($this->input->post('input_news_status')) {
					//unset session
					$where = array (
						'username'	 => $this->session->userdata['admin']['username']
					);
					$AdminID = $this->news->getAdminID($where);
					foreach ($AdminID->result() as $row) {
						$id = $row->id;
					}
					//print_r ($where);


					$where = array (
						'judul' 	=> $this->input->post('input_news_title'),
						'deskripsi' 	=> $this->input->post('inputtt'),
						//'gambar' 	=> $this->input->post('input_news_image'),
						'status_Konten' => $this->input->post('input_news_status'),
						'id_admin' 	=> $id
					);
					$this->news->updateNews($where, $this->session->userdata('requestShowData'));

					//$this->session->set_userdata('konten', $where);
					unset ($_POST);
					//print_r ($where);
    					redirect('admin_Konten/getNews');
				} else {
					unset ($_POST);
					$i = 1;
					$countResult = $this->news->getNewsByID($this->session->userdata('requestShowData'));
					foreach ($countResult->result() as $row) {
						$this->session->set_userdata('judul', $row->judul);
						$this->session->set_userdata('deskripsi', $row->deskripsi);
						//$this->session->set_userdata('gambar', $row->gambar);
						$this->session->set_userdata('status_konten', $row->status_konten);
					}
					echo $this->session->userdata('requestShowData');
					echo "testa";
					//$this->load->view('addNews');
				} 
			}
		}

		function getNews() {
			$this->load->library('session');
			$this->load->model('news');

			//Get column name of news
			$columnName = $this->news->getColumnNameNews();
			$i = 1;
			foreach ($columnName->result() as $row) {
				$where1[$i] = $row->column_name;
				$i++;
			}
			$this->session->set_userdata('columnName', $where1);

			//Get news data
			$allNewsData = $this->news->getAllDataNews();
			$i = 1;
			foreach ($allNewsData->result() as $row) {
				$where2['id_konten'][$i]     = $row->id_konten;
				$where2['judul'][$i]         = $row->judul;
				$where2['deskripsi'][$i]     = $row->deskripsi;
				$where2['gambar'][$i]        = $row->gambar;
				$where2['id_admin'][$i]      = $row->id_admin;
				$where2['status_konten'][$i] = $row->status_konten;
				$where2['kunjungan_konten'][$i] = $row->kunjungan_konten;
				$i++;
			}
			$this->session->set_userdata('allNewsData', $where2);
			//print_r ($this->session->userdata('allNewsData'));
			$this->load->view('tables');
		}

		
		function getProfile() {
			$this->load->model('adminAccount');
			if ($this->input->post('photoProfil')) {//echo $this->input->post('photoProfil');
echo isset($_FILES['photoProfil']);
			if(isset($_FILES['photoProfil'])) {
    				$errors     = array();
    				$maxsize    = 2097152;
    				$acceptable = array(
        				'image/jpeg',
        				'image/jpg',
        				'image/gif',
        				'image/png'
    				);

    				if(($_FILES['photoProfil']['size'] >= $maxsize) || ($_FILES["photoProfil"]["size"] == 0)) {
        				$errors[] = 'File too large. File must be less than 2 megabytes.';
    				}
	
    				if(!in_array($_FILES['photoProfil']['type'], $acceptable) && (!empty($_FILES["photoProfil"]["type"]))) {
        				$errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    				}

    				if(count($errors) === 0) {
        				move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
    				} else {
        				foreach($errors as $error) {
            					echo '<script>alert("'.$error.'");</script>';
        				}

        				die(); //Ensure no more processing is done
    				}
			}
			$this->load->library('session');
			echo $this->input->post('photoProfil');
			$username = $this->session->userdata['admin']['username'];
			$id = $this->adminAccount->getAdminID($username);
			echo $id;
			$this->adminAccount->postAvatar($this->input->post('photoProfil'), $id);
			}
			//$this->load->view('profile');
		}
		

		function test() {
			//$this->load->library('session');
			echo "nothing left in here!";
		}
	}
	$admin_Konten = new admin_Konten();