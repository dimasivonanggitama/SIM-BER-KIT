<?php
class Ap_it_cek_m extends MY_Model
{
    
    protected $_table_name = 'ap_it_cek';
    protected $_order_by = 'id_cctv_cek';
    protected $_primary_key = 'id_cctv_cek';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'desc_cctv_cek' => array(
            'field' => 'desc',
            'label' => 'Descripsi',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_cctv_cek='';
        $variabel->id_cctv='';
        $variabel->desc_cctv_cek='';
        $variabel->ya_tidak_cctv_cek='';
        $variabel->ket_cctv_cek='';
        
       return $variabel;
    }
    
    public function updateM($update_data, $id_cctv, $id_cek)
    {
        $this->db->where('id_cctv',$id_cctv);
        $this->db->where('id_cctv_cek',$id_cek);
        $this->db->update('ap_it_cek',$update_data); 
    }
}