<?php
class Ap_perusahaan_pjd_m extends MY_Model
{
    
    protected $_table_name = 'ap_perusahaan_pjd';
    protected $_order_by = 'id_perusahaan_pjd';
    protected $_primary_key = 'id_perusahaan_pjd';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_perusahaan_pjd' => array(
            'field' => 'nama_pjd',
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
        $variabel->id_perusahaan_pjd='';
        $variabel->nama_perusahaan_pjd='';
        
        return $variabel;
    }
    
    
}