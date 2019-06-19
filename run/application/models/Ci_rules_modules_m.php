<?php

class Ci_rules_modules_m extends MY_Model
{

    protected $_table_name = 'ci_rules_modules';

    protected $_order_by = 'order';

    protected $_primary_key = 'rules_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}