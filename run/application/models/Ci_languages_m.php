<?php

class Ci_languages_m extends MY_Model
{

    protected $_table_name = 'ci_languages';

    protected $_order_by = 'name';

    protected $_primary_key = 'name';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}