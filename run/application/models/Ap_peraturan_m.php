<?php
class Ap_peraturan_m extends MY_Model
{
    
    protected $_table_name = 'ap_peraturan';
    protected $_order_by = 'id_peraturan';
    protected $_primary_key = 'id_peraturan';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_peraturan' => array(
            'field' => 'nama_peraturan',
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
        $variabel->id_peraturan='';
        $variabel->nama_peraturan='';
        $variabel->keterangan_peraturan='';
        $variabel->file_peraturan='';
        $variabel->date_berlaku_peraturan='';
        $variabel->date_update_peraturan='';
        $variabel->id_peraturan_kategori='';
        $variabel->id_admin='';
        $variabel->nama_slide='';
        $variabel->id_peraturan_group='';
        $variabel->id_peraturan_status='';
        
        return $variabel;
    }
    
    
}