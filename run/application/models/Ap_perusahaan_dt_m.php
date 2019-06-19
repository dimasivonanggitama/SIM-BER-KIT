<?php
class Ap_perusahaan_dt_m extends MY_Model
{
    
    protected $_table_name = 'ap_perusahaan_dt';
    protected $_order_by = 'id_perusahaan_dt';
    protected $_primary_key = 'id_perusahaan_dt';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'jenis_doc_perusahaan_dt' => array(
            'field' => 'jenis_doc',
            'label' => 'Jenis_dok',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_perusahaan_dt='';
        $variabel->jenis_doc_perusahaan_dt='';
        $variabel->bulan_perusahaan_dt='';
        $variabel->tahun_perusahaan_dt='';
        $variabel->jumlah_doc_perusahaan_dt='';
        $variabel->date_create_perusahaan_dt='';
        $variabel->date_update_perusahaan_dt='';
        $variabel->id_admin='';
        $variabel->id_perusahaan='';
        
        return $variabel;
    }
    
    
}