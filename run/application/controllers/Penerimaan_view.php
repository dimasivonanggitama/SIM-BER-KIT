<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penerimaan_m');
        $this->load->model('ap_penerimaan_cukai_m');
        $this->load->model('ap_penerimaan_pabean_m');
    }

    public function index($id = NULL)
    {
    	$this->db->order_by('id_penerimaan DESC');
        $this->data['content'] = $this->ap_penerimaan_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }


    public function view($id){
        
        
        $this->data['content'] = $this->ap_penerimaan_m->get($id);
        $this->data['content_cukai'] = $this->ap_penerimaan_cukai_m->get_by(array('id_penerimaan'=>$id));
        $this->data['content_pabean'] = $this->ap_penerimaan_pabean_m->get_by(array('id_penerimaan'=>$id));
        
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/view';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
        
    }
    
    
}
