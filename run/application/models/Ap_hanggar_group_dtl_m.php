<?php
class Ap_hanggar_group_dtl_m extends MY_Model
{
    
    protected $_table_name = 'ap_hanggar_group_dtl';
    protected $_order_by = 'id_penempatan';
    protected $_timestamps = FALSE;
    
    function __construct ()
    {
        parent::__construct();
    }
    
}