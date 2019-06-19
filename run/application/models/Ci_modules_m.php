<?php

class Ci_modules_m extends MY_Model
{

    protected $_table_name = 'ci_modules';

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