<?php

class Ci_sessions_m extends MY_Model
{

    protected $_table_name = 'ci_sessions';

    protected $_order_by = 'id';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}