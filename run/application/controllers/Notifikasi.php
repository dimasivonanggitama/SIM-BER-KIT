<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->get('id')!=NULL) {
            $data=array(
                'done_notification_rules'=>1
            );
            $this->ci_notification_rules_m->save($data, $this->input->get('id'));
            redirect($this->input->get('link'));
        } elseif ($this->input->get('semua')!=NULL) {
            $this->db->set('done_notification_rules', '1');
            $this->db->where('id_admin', $this->session->userdata('id'));
            $this->db->update('ci_notification_rules');
            redirect('notifikasi');
        } else {
            
            $this->data['subview'] = $this->uri->rsegment(1) . '/index';
            $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
            $this->load->view('_layout_main', $this->data);
        }
    }
}
