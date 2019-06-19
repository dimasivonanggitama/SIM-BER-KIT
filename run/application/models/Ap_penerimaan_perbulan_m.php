<?php

class Ap_penerimaan_perbulan_m extends MY_Model
{

    protected $_table_name = 'ap_penerimaan_perbulan';

    protected $_order_by = 'id_penerimaan_perbulan';

    protected $_primary_key = 'id_penerimaan_perbulan';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'bulan_penerimaan_perbulan' => array(
            'field' => 'bulan',
            'label' => 'Bulan',
            'rules' => 'trim|required'
        ),
        'tahun_penerimaan_perbulan' => array(
            'field' => 'tahun',
            'label' => 'Tahun',
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
        $variabel->id_penerimaan_perbulan = '';
        $variabel->bulan_penerimaan_perbulan = '';
        $variabel->tahun_penerimaan_perbulan = '';
        $variabel->pabean_penerimaan_perbulan = 0;
        $variabel->cukai_penerimaan_perbulan = 0;
        $variabel->date_create_penerimaan_perbulan = '';
        $variabel->date_update_penerimaan_perbulan = '';
        $variabel->id_admin = '';
        
        return $variabel;
    }
}