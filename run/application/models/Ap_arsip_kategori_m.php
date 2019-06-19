<?php
class Ap_arsip_kategori_m extends MY_Model
{
    
    protected $_table_name = 'ap_arsip_kategori';
    protected $_order_by = 'id_arsip_kategori';
    protected $_primary_key = 'id_arsip_kategori';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_arsip_kategori' => array(
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
        $variabel->id_arsip_kategori='';
        $variabel->nama_arsip_kategori='';
        $variabel->parent_arsip_kategori='';
        
        return $variabel;
    }
    
    
}