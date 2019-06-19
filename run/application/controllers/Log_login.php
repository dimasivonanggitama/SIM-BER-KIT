<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_login extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_admin_m');
        $this->load->model('ap_login_m');
    }

    public function index($bulan = NULL, $tahun = NULL)
    {
        if ($bulan == NULL) {
            $this->data['bulan'] = intval(date('m'));
        } else {
            $this->data['bulan'] = intval($bulan);
        }
        if ($tahun == NULL) {
            $this->data['tahun'] = date('Y');
        } else {
            $this->data['tahun'] = $tahun;
        }
        if ($bulan == NULL && $tahun == NULL) {
            $now = new \DateTime('now');
            $month = $now->format('m');
            $year = $now->format('Y');
            $where="MONTH(wk_login)=".$month." AND YEAR(wk_login)=".$year."";
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_login.id_admin', 'left');
            $this->db->where($where);
            $this->data['content'] = $this->ap_login_m->get();
        }else{
            $where="MONTH(wk_login)=".$bulan." AND YEAR(wk_login)=".$tahun."";
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_login.id_admin', 'left');
            $this->db->where($where);
            $this->data['content'] = $this->ap_login_m->get();
        } 
            
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

}