<?php
class Ap_log_book_group_m extends MY_Model
{
    
    protected $_table_name = 'ap_log_book_group';
    protected $_order_by = 'id_log_book_group';
    protected $_primary_key = 'id_log_book_group';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_log_book_group' => array(
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
        $variabel->id_log_book_group='';
        $variabel->nama_log_book_group='';
        $variabel->id_admin='';
        
        return $variabel;
    }
    
    
}