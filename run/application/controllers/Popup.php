<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Popup extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_popup_m');
    }

    public function index($id = NULL)
    {
        $this->data['content'] = $this->ap_popup_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        if ($id) {
            
            $this->data['content'] = $this->ap_popup_m->get($id);
            count($this->data['content']) || redirect('404');
            
            $data = array(
                'nama_popup' => $this->input->post('nama'),
                'desc_popup' => $this->input->post('desc'),
                'start_popup' => '' . $this->input->post('start') . ' ' . $this->input->post('time_start') . '',
                'end_popup' => '' . $this->input->post('end') . ' ' . $this->input->post('time_end') . ''
            );
        } else {
            $this->data['content'] = $this->ap_popup_m->get_new();
            $data = array(
                'id_popup' => $this->ap_popup_m->increment(),
                'nama_popup' => $this->input->post('nama'),
                'desc_popup' => $this->input->post('desc'),
                'start_popup' => '' . $this->input->post('start') . ' ' . $this->input->post('time_start') . '',
                'end_popup' => '' . $this->input->post('end') . ' ' . $this->input->post('time_end') . ''
            );
        }
        
        $rules = $this->ap_popup_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_popup_m->save($data, $id);
            
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->ap_popup_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
