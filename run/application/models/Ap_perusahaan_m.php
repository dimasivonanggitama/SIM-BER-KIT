<?php
class Ap_perusahaan_m extends MY_Model
{
    
    protected $_table_name = 'ap_perusahaan';
    protected $_order_by = 'id_perusahaan';
    protected $_primary_key = 'id_perusahaan';
    protected $_primary_filter = 'intval';
    protected $_timestamps = FALSE;
    public $rules = array(
        'nama_perusahaan' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        )
    );
    
    function __construct ()
    {
        parent::__construct();
    }
    
    public function get_new(){
        $variabel = new stdClass();
        $variabel->id_perusahaan='';
        $variabel->nama_perusahaan='';
        $variabel->status_perusahaan='';
        $variabel->kota_perusahaan='';
        $variabel->luas_perusahaan='';
        $variabel->npwp_perusahaan='';
        $variabel->pemilik_perusahaan='';
        $variabel->jabatan_pemilik_perusahaan='';
        $variabel->telp_pemilik_perusahaan='';
        $variabel->ttl_pemilik_perusahaan='';
        $variabel->tl_pemilik_perusahaan='';
        $variabel->email_pemilik_perusahaan='';
        $variabel->skep_penetapan_perusahaan='';
        $variabel->tgl_skep_penetapan_perusahaan='';
        $variabel->skep_perubahan_perusahaan='';
        $variabel->tgl_skep_perubahan_perusahaan='';
        $variabel->jangka_ijin_perusahaan='';
        $variabel->perpanjangan_ijin_perusahaan='';
        $variabel->jenis_lokasi_perusahaan='';
        $variabel->nama_kawasan_perusahaan='';
        $variabel->hasil_produksi_perusahaan='';
        $variabel->nppbkc_perusahaan='';
        $variabel->nppbkc_tgl_perusahaan='';
        $variabel->perpanjangan_ijin_perusahaan='';
        $variabel->alamat_perusahaan='';
        $variabel->longitude_perusahaan='';
        $variabel->latitude_perusahaan='';
        $variabel->id_admin='';
        $variabel->id_perusahaan_kategori='';
        
        return $variabel;
    }
    
    
}