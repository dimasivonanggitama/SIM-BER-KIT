<?php
class ap_maps_m extends MY_Model
{
    
    protected $_table_name = 'ap_maps';
    protected $_order_by = 'id_config_map';
    protected $_primary_key = 'id_config_map';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'latitude_config_map' => array(
            'field' => 'latitude',
            'label' => 'latitude',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_config_map='';
        $variabel->latitude_config_map='';
        $variabel->longitude_config_map='';
        $variabel->zoom_config_map='';
        $variabel->id_admin='';
        $variabel->nama_map='';
        $variabel->latitude_map='';
        $variabel->longitude_map='';
        
        return $variabel;
    }
    
    
}