<?php
class Ap_micro_dtl_m extends MY_Model
{
    
    protected $_table_name = 'ap_micro_dtl';
    protected $_primary_key = 'id_micro_dtl';

    
    function __construct ()
    {
        parent::__construct();
    }

    public function updateM($update_data, $id_micro_dtl)
    {
        $this->db->where('id_micro_dtl',$id_micro_dtl);
        $this->db->update('ap_micro_dtl',$update_data); 
    }
}