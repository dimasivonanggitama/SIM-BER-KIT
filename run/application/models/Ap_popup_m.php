<?php
class Ap_popup_m extends MY_Model
{
    
    protected $_table_name = 'ap_popup';
    protected $_order_by = 'id_popup';
    protected $_primary_key = 'id_popup';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_popup' => array(
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
        $variabel->id_popup='';
        $variabel->nama_popup='';
        $variabel->desc_popup='';
        $variabel->start_popup='';
        $variabel->end_popup='';
        
        return $variabel;
    }
    
    
}