<?php
class Ap_surat_jenis_m extends MY_Model
{

    protected $_table_name = 'ap_surat_jenis';
    protected $_order_by = 'id_jenis_kategori';
    protected $_primary_key = 'id_jenis_kategori';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_jenis_kategori' => array(
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
        $variabel->id_jenis_kategori='';
        $variabel->nama_jenis_kategori='';
        $variabel->parent_jenis_kategori='';
        return $variabel;
    }


}
