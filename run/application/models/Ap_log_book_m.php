<?php
class Ap_log_book_m extends MY_Model
{
    
    protected $_table_name = 'ap_log_book';
    protected $_order_by = 'id_log_book';
    protected $_primary_key = 'id_log_book';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'jabatan_d' => array(
            'field' => 'jabatan',
            'label' => 'Jabatann',
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
        $variabel->bulan_log_book='';
        $variabel->tahun_log_book='';
        $variabel->date_create_log_book='';
        $variabel->date_update_log_book='';
        $variabel->id_admin='';
        $variabel->id_atasan='';
        $variabel->flag_pengajuan='';
        
        return $variabel;
    }
    
    public function get_book(){
        $this->db->select('*');
        $this->db->from('ap_log_book');
        $this->db->where('id_log_book=1');
		$qry = $this->db->get();
		return $qry->result();
    }
    
}