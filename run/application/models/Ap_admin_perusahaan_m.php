<?php

class Ap_admin_perusahaan_m extends MY_Model
{

    protected $_table_name = 'ap_admin_perusahaan';

    protected $_order_by = 'id_perusahaan';

    protected $_primary_key = 'id_admin';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}