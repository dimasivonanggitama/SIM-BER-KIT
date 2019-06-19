<?php
class Ci_surat_disposisiketentuan_m extends MY_Model
{

    protected $_table_name = 'ci_surat_disposisiketentuan';
    protected $_order_by = 'id_ketentuan_kategori';
    protected $_primary_key = 'id_ketentuan_kategori';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_ketentuan' => array(
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
        $variabel->id_ketentuan_kategori='';
        $variabel->nama_ketentuan='';
        return $variabel;
    }


}
