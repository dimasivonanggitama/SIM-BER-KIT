<?php
class Ap_it_ref_cek_m extends MY_Model
{
    
    protected $_table_name = 'ap_it_ref';
    protected $_order_by = 'id_cctv_ref';
    protected $_primary_key = 'id_cctv_ref';
    protected $_primary_filter = 'intval';
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_cctv_ref='';
        $variabel->uraian='';
        $variabel->keterangan='';
        
       return $variabel;
    }
    
    
}