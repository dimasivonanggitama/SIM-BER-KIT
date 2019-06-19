<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_pengumuman_m');
        
    }

    public function index($id = NULL)
    {
       	$this->db->order_by('id_pengumuman',"DESC");
        $this->data['content'] = $this->ap_pengumuman_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    
}
