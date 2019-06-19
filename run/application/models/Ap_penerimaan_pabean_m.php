<?php
class Ap_penerimaan_pabean_m extends MY_Model
{
    
    protected $_table_name = 'ap_penerimaan_pabean';
    protected $_order_by = 'id_penerimaan_pabean';
    protected $_primary_key = 'id_penerimaan_pabean';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    
    function __construct ()
    {
        parent::__construct();
    }
    
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_penerimaan='';
        $variabel->id_penerimaan_pabean='';
        $variabel->nama_penerimaan_pabean='';
        $variabel->realisasi_pabean='';
        $variabel->target_pabean='';
        $variabel->capain_pabean='';
        
        return $variabel;
    }
    
}