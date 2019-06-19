<?php

class Ci_notification_m extends MY_Model
{

    protected $_table_name = 'ci_notification';

    protected $_order_by = 'id_notification DESC';

    protected $_primary_key = 'id_notification';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}