<?php
class Ap_surat_masuk_chat_m extends MY_Model
{

    protected $_table_name = 'ap_surat_masuk_chat';
    protected $_order_by = 'id_chat';
    protected $_primary_key = 'id_chat';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'isi_chat' => array(
            'field' => 'isi_chat',
            'label' => 'Isi',
            'rules' => 'trim|required'
        )
    );

    function __construct ()
    {
        parent::__construct();
    }

    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_chat='';
        $variabel->id_agenda='';
        $variabel->date_create_chat='';
        $variabel->isi_chat='';
        $variabel->file_surat='';
        $variabel->id_admin='';

        return $variabel;
    }



}
