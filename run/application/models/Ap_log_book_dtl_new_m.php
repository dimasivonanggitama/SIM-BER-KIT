<?php
class Ap_log_book_dtl_new_m extends MY_Model
{
    
    protected $_table_name = 'ap_log_book_dtl_new';
    protected $_order_by = 'id_log_book_dtl';
    protected $_primary_key = 'id_log_book_dtl';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'formula' => array(
            'field' => 'formula',
            'label' => 'Formula',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_log_book='';
        $variabel->id_log_book_dtl='';
        $variabel->date_create_log_book_dtl='';
        $variabel->date_update_log_book_dtl='';
        $variabel->iku='';
        $variabel->formula='';
        $variabel->perhitungan='';
        $variabel->realisasi_pd_bln_pelaporan='';
        $variabel->realisasi_sd_bln_pelaporan='';
        $variabel->target='';
        $variabel->keterangan ='';
        $variabel->paraf_log_book_dtl='';
        $variabel->date_paraf_log_book_dtl='';
        $variabel->ket_paraf_log_book_dtl='';
        $variabel->tolak_log_book_dtl='';
        $variabel->date_tolak_log_book_dtl='';
        $variabel->ket_tolak_log_book_dtl='';                             
        $variabel->id_admin='';
        $variabel->jns_komponen_data='';
        $variabel->komponen_dt_mn1_penugasan='';
        $variabel->komponen_dt_mn1_a_pelaporan='';
        $variabel->komponen_dt_mn2_surat_dinas='';
        $variabel->komponen_dt_mn2_a_hal ='';
        $variabel->komponen_dt_mn3_dokumen ='';
        $variabel->komponen_dt_mn3_a_wk_penyelesaian='';
        $variabel->komponen_dt_mn3_b_wk_standar='';
        $variabel->komponen_dt_mn4_lain='';
        return $variabel;
    }
    
    
}