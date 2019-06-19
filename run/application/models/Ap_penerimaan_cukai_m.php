<?php
class Ap_penerimaan_cukai_m extends MY_Model
{
    
    protected $_table_name = 'ap_penerimaan_cukai';
    protected $_order_by = 'id_penerimaan_cukai';
    protected $_primary_key = 'id_penerimaan_cukai';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    
    function __construct ()
    {
        parent::__construct();
    }
    
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_penerimaan_cukai='';
        $variabel->id_penerimaan='';
        $variabel->nama_penerimaan_cukai='';
        $variabel->realisasi_cukai='';
        $variabel->target_cukai='';
        $variabel->capai_cukai='';
        
        return $variabel;
    }
    
}