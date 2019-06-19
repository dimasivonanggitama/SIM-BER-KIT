<?php
class Ap_surat_sifat2_m extends MY_Model
{

    protected $_table_name = 'ap_surat_sifat2';
    protected $_order_by = 'id_sifat2';
    protected $_primary_key = 'id_sifat2';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_sifat2' => array(
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
        $variabel->id_sifat2='';
        $variabel->nama_sifat2='';

        return $variabel;
    }


}
