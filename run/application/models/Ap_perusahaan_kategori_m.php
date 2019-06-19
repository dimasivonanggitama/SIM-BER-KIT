<?php

class Ap_perusahaan_kategori_m extends MY_Model
{

    protected $_table_name = 'ap_perusahaan_kategori';

    protected $_order_by = 'id_perusahaan_kategori';

    protected $_primary_key = 'id_perusahaan_kategori';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'nama_perusahaan_kategori' => array(
            'field' => 'nama',
            'label' => 'perusahaan',
            'rules' => 'trim|required'
        )
    );

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $variabel = new stdClass();
        $variabel->id_perusahaan_kategori = '';
        $variabel->nama_perusahaan_kategori = '';
        $variabel->parent_perusahaan_kategori = '';
        return $variabel;
    }
}