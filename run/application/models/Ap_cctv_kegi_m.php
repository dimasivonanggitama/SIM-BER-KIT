<?php
class Ap_cctv_kegi_m extends MY_Model
{
    
    protected $_table_name = 'ap_cctv_kegiatan';
    protected $_order_by = 'id_cctv_kegiatan';
    protected $_primary_key = 'id_cctv_kegiatan';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'date_cctv_kegiatan' => array(
            'field' => 'date',
            'label' => 'Date Kegiatan',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_cctv_kegiatan='';
        $variabel->id_cctv='';
        $variabel->time_start_cctv_kegiatan='';
        $variabel->time_end_cctv_kegiatan='';
        $variabel->uraian_cctv_kegiatan='';
        return $variabel;
    }
    
    
}