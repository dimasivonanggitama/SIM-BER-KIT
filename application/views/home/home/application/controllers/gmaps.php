<?php
	include_once (dirname(__FILE__) . "/controller_home.php");
	class GMaps extends Controller_Home {	

		//public function __construct() {
		//	parent::__construct();
		//}

  		public function map() {
			$this->load->library('googlemaps');

			$config['center'] = '-6.1811872, 106.8240239';
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = '-6.1811872, 106.8240239';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();

			$this->load->view('view_gmaps', $data);
  		}

	}
