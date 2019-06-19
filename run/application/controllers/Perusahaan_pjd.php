<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_pjd extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_perusahaan_pjd_m');
    }

    public function index()
    {
        
        $this->data['content'] = $this->ap_perusahaan_pjd_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        if ($id) {
            $this->data['content'] = $this->ap_perusahaan_pjd_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'nama_perusahaan_pjd' => $this->input->post('nama_pjd'),
            );
        } else {
            
            $this->data['content'] = $this->ap_perusahaan_pjd_m->get_new();
            $data = array(
                'id_perusahaan_pjd' => $this->ap_perusahaan_pjd_m->increment(),
                'nama_perusahaan_pjd' => $this->input->post('nama_pjd'),
            );
        }
        
        $rules = $this->ap_perusahaan_pjd_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->ap_perusahaan_pjd_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->ap_perusahaan_pjd_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
