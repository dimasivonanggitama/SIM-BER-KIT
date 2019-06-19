<?php
class Ap_cctv_m extends MY_Model
{
    
    protected $_table_name = 'ap_cctv';
    protected $_order_by = 'id_cctv';
    protected $_primary_key = 'id_cctv';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'bulan_cctv' => array(
            'field' => 'bulan',
            'label' => 'Bulan',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_cctv='';
        $variabel->bulan_cctv='';
        $variabel->tahun_cctv='';
        $variabel->kawasan_berikat_cctv='';
        $variabel->alamat_cctv='';
        $variabel->hanggar_cctv='';
        $variabel->date_cctv='';
        $variabel->date_create_cctv='';
        $variabel->date_update_cctv='';
        $variabel->flag_pengajuan='';
        $variabel->flag_format_baru='';
        $variabel->id_admin='';
        $variabel->id_atasan='';
        
        return $variabel;
    }
    
    
}