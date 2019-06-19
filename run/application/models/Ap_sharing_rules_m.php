<?php

class Ap_sharing_rules_m extends MY_Model
{

    protected $_table_name = 'ap_sharing_rules';

    protected $_order_by = 'ap_sharing_rules.id_arsip';

    protected $_primary_key = 'id_arsip';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}