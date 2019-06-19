<?php
class Ap_log_book_dtl_m extends MY_Model
{
    
    protected $_table_name = 'ap_log_book_dtl';
    protected $_order_by = 'id_log_book_dtl';
    protected $_primary_key = 'id_log_book_dtl';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'date_log_book' => array(
            'field' => 'tgl_pelapor',
            'label' => 'Date',
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
        $variabel->date_log_book='';
        $variabel->date_create_log_book_dtl='';
        $variabel->date_update_log_book_dtl='';
        $variabel->iku_log_book_dtl='';
        $variabel->target_log_book_dtl='';
        $variabel->dasar_log_book_dtl='';
        $variabel->kegiatan_log_book_dtl='';
        $variabel->doc_terima_log_book_dtl='';
        $variabel->doc_selesai_log_book_dtl='';
        $variabel->paraf_log_book_dtl='';
        $variabel->date_paraf_log_book_dtl='';
        $variabel->ket_paraf_log_book_dtl='';
        $variabel->tolak_log_book_dtl='';
        $variabel->date_tolak_log_book_dtl='';
        $variabel->ket_tolak_log_book_dtl='';
        $variabel->id_admin='';
        $variabel->kegiatan_mulai_log_book_dtl='';
        $variabel->kegiatan_selesai_log_book_dtl='';
        $variabel->waktu_mulai_log_book_dtl='';
        $variabel->waktu_selesai_log_book_dtl='';
        $variabel->jenis_log_book_dtl='';
        
        return $variabel;
    }
    
    
}