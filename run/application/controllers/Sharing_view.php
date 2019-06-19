<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sharing_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_sharing_m');
        $this->load->model('ap_sharing_kategori_m');
        $this->load->model('ap_sharing_rules_m');
    }

    public function index()
    {
        
        $this->db->join('ap_sharing', 'ap_sharing.id_arsip=ap_sharing_rules.id_arsip', 'left');
        $this->db->order_by('ap_sharing.id_arsip',"DESC");
        $this->db->join('ap_admin', 'ap_admin.id_admin=ap_sharing.id_admin', 'left');
        $this->db->join('ap_sharing_kategori', 'ap_sharing_kategori.id_arsip_kategori=ap_sharing.id_arsip_kategori', 'left');
        
        $this->data['content'] = $this->ap_sharing_rules_m->get_by(array(
            'ap_sharing_rules.id_admin' => $this->session->userdata('id')
        ));
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}
