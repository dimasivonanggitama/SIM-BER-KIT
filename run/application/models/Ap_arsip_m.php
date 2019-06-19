<?php
class Ap_arsip_m extends MY_Model
{
    
    protected $_table_name = 'ap_arsip';
    protected $_order_by = 'id_arsip';
    protected $_primary_key = 'id_arsip';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_arsip' => array(
            'field' => 'nama_arsip',
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
        $variabel->id_arsip='';
        $variabel->nama_arsip='';
        $variabel->ket_arsip='';
        $variabel->file_arsip='';
        $variabel->date_create_arsip='';
        $variabel->date_update_arsip='';
        $variabel->id_arsip_kategori='';
        $variabel->id_admin='';
        
        return $variabel;
    }
    
    
}