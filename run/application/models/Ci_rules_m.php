<?php

class Ci_rules_m extends MY_Model
{

    protected $_table_name = 'ci_rules';

    protected $_order_by = 'id';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'name' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        )
    );

    function __construct()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id='';
        $variabel->name='';
        
        return $variabel;
    }
}