<?php
class Ap_peraturan_kategori_m extends MY_Model
{
	
	protected $_table_name = 'ap_peraturan_kategori';
	protected $_order_by = 'id_peraturan_kategori';
	protected $_primary_key = 'id_peraturan_kategori';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'nama' => array(
			'field' => 'nama', 
			'label' => 'Nama', 
			'rules' => 'trim|required'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
		$variabel = new stdClass();
		$variabel->id_peraturan_kategori='';
		$variabel->nama_peraturan_kategori='';
		$variabel->parent_peraturan_kategori='';

		return $variabel;
	}
	

}