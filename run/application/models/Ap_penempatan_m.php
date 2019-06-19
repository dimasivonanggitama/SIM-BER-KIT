<?php
class Ap_penempatan_m extends MY_Model
{
    
    protected $_table_name = 'ap_penempatan';
    protected $_order_by = 'id_penempatan';
    protected $_primary_key = 'id_penempatan';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    
    function __construct ()
    {
        parent::__construct();
    }
    
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_penempatan='';
        $variabel->uraian_penempatan='';
        
        return $variabel;
    }
    
}