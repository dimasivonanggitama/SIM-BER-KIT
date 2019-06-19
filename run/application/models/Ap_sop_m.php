<?php
class Ap_sop_m extends MY_Model
{
    
    protected $_table_name = 'ap_sop';
    protected $_order_by = 'id_sop';
    protected $_primary_key = 'id_sop';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_sop' => array(
            'field' => 'nama_sop',
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
        $variabel->id_sop='';
        $variabel->nama_sop='';
        $variabel->keterangan_sop='';
        $variabel->file_sop='';
        $variabel->date_create_sop='';
        $variabel->date_update_sop='';
        $variabel->id_sop_kategori='';
        $variabel->id_admin='';
        
        return $variabel;
    }
    
    
}