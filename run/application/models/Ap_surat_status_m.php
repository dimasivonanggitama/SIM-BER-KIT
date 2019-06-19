<?php
class Ap_surat_status_m extends MY_Model
{

    protected $_table_name = 'ap_surat_status';
    protected $_order_by = 'id_status';
    protected $_primary_key = 'id_status';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_status' => array(
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
        $variabel->id_status='';
        $variabel->nama_status='';
        // $variabel->parent_jenis_kategori='';
        return $variabel;
    }


}
