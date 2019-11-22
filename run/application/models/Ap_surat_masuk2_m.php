<?php
class Ap_surat_masuk2_m extends MY_Model
{

    protected $_table_name = 'ap_surat_masuk2';
    protected $_order_by = 'id_agenda';
    protected $_primary_key = 'id_agenda';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nomor_naskah' => array(
            'field' => 'nomor_naskah',
            'label' => 'Nomor',
            'rules' => 'trim|required'
        )
    );

    function __construct ()
    {
        parent::__construct();
    }

    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_agenda='';
        $variabel->nomor_naskah='';
        $variabel->tgl_naskah='';
        $variabel->lampiran_naskah='';
        $variabel->id_sifat_kategori='';
        $variabel->id_jenis_kategori='';
        $variabel->dari_naskah='';
        $variabel->perihal_naskah='';
        $variabel->file_surat='';
        $variabel->date_create_surat='';

        return $variabel;
    }



}