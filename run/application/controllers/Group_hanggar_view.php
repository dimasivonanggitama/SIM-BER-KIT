<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_hanggar_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penempatan_m');
        $this->load->model('ap_admin_m');
        $this->load->model('ap_hanggar_group_m');
        $this->load->model('ap_hanggar_group_dtl_m');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_pejabat_m');
        $this->load->model('ap_jabatan_ref_m');
    }

    public function index()
    {
        $this->data['admin'] = $this->ap_admin_m->get_by(array(
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna(1,$this->data['admin'][0]->rules_id);
            
        $this->db->like('ap_penempatan.uraian_penempatan','HANGGAR');
        $this->data['content'] = $this->ap_penempatan_m->get();

        $this->data['ref_jabatan'] = $this->db->query("SELECT P.id_jabatan, P.uraian_jabatan, A.name_admin FROM `ap_jabatan_ref` P LEFT JOIN ap_pejabat T ON T.id_jabatan = P.id_jabatan LEFT JOIN ap_admin A ON A.id_admin = T.id_admin WHERE P.id_jabatan IN (8,9,10,11,12,13) ORDER BY P.id_jabatan ASC")->result();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

}