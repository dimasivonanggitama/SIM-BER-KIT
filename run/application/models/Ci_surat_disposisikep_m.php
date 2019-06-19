<?php
class Ci_surat_disposisikep_m extends MY_Model
{

    protected $_table_name = 'ci_surat_disposisikep';
    protected $_order_by = 'id_kep';
    protected $_primary_key = 'id_kep';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_kep' => array(
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
        $variabel->id_kep='';
        $variabel->nama_kep='';

        return $variabel;
    }


}
