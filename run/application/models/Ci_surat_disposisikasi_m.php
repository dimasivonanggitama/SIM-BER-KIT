<?php
class Ci_surat_disposisikasi_m extends MY_Model
{

    protected $_table_name = 'ci_surat_disposisikasi';
    protected $_order_by = 'id_kasi';
    protected $_primary_key = 'id_kasi';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_kasi' => array(
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
        $variabel->id_kasi='';
        $variabel->nama_kasi='';

        return $variabel;
    }


}
