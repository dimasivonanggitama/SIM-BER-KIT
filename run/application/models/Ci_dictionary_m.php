<?php

class Ci_dictionary_m extends MY_Model
{

    protected $_table_name = 'ci_dictionary';

    protected $_order_by = 'token';

    protected $_primary_key = 'token';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}