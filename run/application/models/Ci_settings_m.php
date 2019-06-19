<?php

class Ci_settings_m extends MY_Model
{

    protected $_table_name = 'ci_settings';

    protected $_order_by = 'id';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}