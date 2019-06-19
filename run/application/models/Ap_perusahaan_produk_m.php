<?php

class Ap_perusahaan_produk_m extends MY_Model
{

    protected $_table_name = 'ap_perusahaan_produk';

    protected $_order_by = 'id_perusahaan_produk';

    protected $_primary_key = 'id_perusahaan_produk';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'nama_perusahaan_produk' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        )
    );

    function __construct()
    {
        parent::__construct();
    }
}