<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_perbulan_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penerimaan_perbulan_m');
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
        /*
         * $this->data['content'] = $this->ap_penerimaan_perbulan_m->get_by(array(
         * 'bulan_penerimaan_perbulan' => $this->data['bulan'],
         * 'tahun_penerimaan_perbulan' => $this->data['tahun']
         * ));
         */
        $this->data['content'] = $this->ap_penerimaan_perbulan_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->db->where('id_admin!=', 1);
        $this->data['atasan'] = $this->ap_admin_m->get();
        if ($id) {
            $this->data['content'] = $this->ap_penerimaan_perbulan_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'bulan_penerimaan_perbulan' => $this->input->post('bulan'),
                'tahun_penerimaan_perbulan' => $this->input->post('tahun'),
                'pabean_penerimaan_perbulan' => str_angka($this->input->post('pabean')),
                'cukai_penerimaan_perbulan' => str_angka($this->input->post('pabean')),
                'date_update_penerimaan_perbulan' => date('Y-m-d H:i:s'),
                'id_admin' => $this->session->userdata('id')
            );
        } else {
            $this->data['content'] = $this->ap_penerimaan_perbulan_m->get_new();
            $data = array(
                'id_penerimaan_perbulan' => $this->ap_penerimaan_perbulan_m->increment(),
                'bulan_penerimaan_perbulan' => $this->input->post('bulan'),
                'tahun_penerimaan_perbulan' => $this->input->post('tahun'),
                'pabean_penerimaan_perbulan' => str_angka($this->input->post('pabean')),
                'cukai_penerimaan_perbulan' => str_angka($this->input->post('cukai')),
                'date_create_penerimaan_perbulan' => date('Y-m-d H:i:s'),
                'date_update_penerimaan_perbulan' => NULL,
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        $rules = $this->ap_penerimaan_perbulan_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_penerimaan_perbulan_m->save($data, $id);
            
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->ap_penerimaan_perbulan_m->delete($id);
        
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
