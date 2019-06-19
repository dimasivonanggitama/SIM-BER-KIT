<?php
class Ap_surat_sifat_m extends MY_Model
{

    protected $_table_name = 'ap_surat_sifat';
    protected $_order_by = 'id_sifat_kategori';
    protected $_primary_key = 'id_sifat_kategori';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_sifat_kategori' => array(
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
        $variabel->id_sifat_kategori='';
        $variabel->nama_sifat_kategori='';

        return $variabel;
    }


}
