<?php
class Ap_penerimaan_m extends MY_Model
{
    
    protected $_table_name = 'ap_penerimaan';
    protected $_order_by = 'id_penerimaan';
    protected $_primary_key = 'id_penerimaan';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'realisasi_pabean_penerimaan' => array(
            'field' => 'realisasi_pabean',
            'label' => 'pabean',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_penerimaan='';
        $variabel->date_create_penerimaan='';
        $variabel->date_update_penerimaan='';
        $variabel->date_penerimaan='';
        $variabel->realisasi_pabean_penerimaan=0;
        $variabel->target_pabean_penerimaan=0;
        $variabel->capaian_pabean_penerimaan=0;
        $variabel->realisasi_cukai_penerimaan=0;
        $variabel->target_cukai_penerimaan=0;
        $variabel->capaian_cukai_penerimaan=0;
        $variabel->realisasi_penerimaan=0;
        $variabel->target_penerimaan=0;
        $variabel->capaian_penerimaan=0;
        $variabel->id_admin='';
        
        return $variabel;
    }
    
}