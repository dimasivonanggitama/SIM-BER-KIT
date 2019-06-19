<?php
class Ap_sop_kategori_m extends MY_Model
{
    
    protected $_table_name = 'ap_sop_kategori';
    protected $_order_by = 'id_sop_kategori';
    protected $_primary_key = 'id_sop_kategori';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_sop_kategori' => array(
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
        $variabel->id_sop_kategori='';
        $variabel->nama_sop_kategori='';
        $variabel->parent_sop_kategori='';
        
        return $variabel;
    }
    
    
}