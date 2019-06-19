<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->post('ganti_password') != NULL) {
            $data = array(
                'password_admin' => $this->ap_admin_m->hash($this->input->post('password_new'))
            );
            
            $rules = $this->ap_admin_m->rules_gp;
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == TRUE) {
                $this->session->set_flashdata('status', 'Success!');
                $this->ap_admin_m->save($data, $this->session->userdata('id'));
                redirect($this->uri->rsegment(1));
            }
        }
        
        if ($this->input->post('ganti_profil') != NULL) {
            if (! empty($_FILES['image']['name'])) {
                $jeneng = $this->nama_file($_FILES['image']['name']);
                $data = array(
                    // 'email_admin' => $this->input->post('email'),
                    'telp_admin' => $this->input->post('telp'),
                    'alamat_admin' => $this->input->post('alamat'),
                    'image_admin' => $jeneng
                );
            } else {
                $data = array(
                    // 'email_admin' => $this->input->post('email'),
                    'telp_admin' => $this->input->post('telp'),
                    'alamat_admin' => $this->input->post('alamat')
                );
            }
            
            $rules = $this->ap_admin_m->rules_tambah;
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == TRUE) {
                if (! empty($_FILES['image']['name'])) {
                    // upload
                    $this->upload_gambar($jeneng, 'image');
                    // hapus
                    if ($this->data['user_info']->image_admin != 'admin_default.png') {
                        unlink('./uploads/' . $this->data['user_info']->image_admin);
                    }
                }
                $this->session->set_flashdata('status_profil', 'Success!');
                $this->ap_admin_m->save($data, $this->session->userdata('id'));
                redirect($this->uri->rsegment(1));
            }
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}
