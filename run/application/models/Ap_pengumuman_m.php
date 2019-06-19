<?php
class Ap_pengumuman_m extends MY_Model
{
    
    protected $_table_name = 'ap_pengumuman';
    protected $_order_by = 'id_pengumuman';
    protected $_primary_key = 'id_pengumuman';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_pengumuman' => array(
            'field' => 'nama_pengumuman',
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
        $variabel->id_pengumuman='';
        $variabel->nama_pengumuman='';
        $variabel->uraian_pengumuman='';
        $variabel->date_start_pengumuman='';
        $variabel->date_end_pengumuman='';
        $variabel->date_create_pengumuman='';
        $variabel->date_update_pengumuman='';
        $variabel->id_admin='';
        $variabel->file_pengumuman='';
        
        return $variabel;
    }
    
    
}