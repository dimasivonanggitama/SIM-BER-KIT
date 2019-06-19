<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_admin_perusahaan_m');
        $this->load->model('ap_perusahaan_m');
    }

    public function index($id = NULL)
    {
        $this->db->join('ci_rules', 'ci_rules.id=ap_admin.rules_id', 'left');
        $this->db->where('id_admin!=', 1);
        $this->data['content'] = $this->ap_admin_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['perusahaan'] = $this->ap_perusahaan_m->get();
        $this->data['module_saat_ini'] = array();
        if ($id) {
            $module_now = $this->ap_admin_perusahaan_m->get_by(array(
                'id_admin' => $id
            ));
            foreach ($module_now as $val) :
                array_push($this->data['module_saat_ini'], $val->id_perusahaan);
            endforeach
            ;
            $this->data['content'] = $this->ap_admin_m->get($id);
            $this->data['lang'] = $this->ci_languages_m->get();
            $this->data['rule'] = $this->ci_rules_m->get();
            count($this->data['content']) || redirect('404');
            if ($this->input->post('password') == NULL) {
                $data = array(
                    'nip_admin' => $this->input->post('nip'),
                    'username_admin' => $this->input->post('username'),
                    'name_admin' => $this->input->post('name'),
                    // 'email_admin' => $this->input->post('email'),
                    'telp_admin' => $this->input->post('telp'),
                    'alamat_admin' => $this->input->post('alamat'),
                    'image_admin' => 'admin_default.png',
                    'lang_admin' => $this->input->post('lang'),
                    'id_eselon' => $this->input->post('eselon'),
                    'id_penempatan' => $this->input->post('penempatan'),
                    'id_pegawai_aktif' => $this->input->post('paktif'),
                    'rules_id' => $this->input->post('rules')
                );
            } else {
                $data = array(
                    'nip_admin' => $this->input->post('nip'),
                    'username_admin' => $this->input->post('username'),
                    'password_admin' => $this->ap_admin_m->hash($this->input->post('password')),
                    'name_admin' => $this->input->post('name'),
                    // 'email_admin' => $this->input->post('email'),
                    'telp_admin' => $this->input->post('telp'),
                    'alamat_admin' => $this->input->post('alamat'),
                    'image_admin' => 'admin_default.png',
                    'lang_admin' => $this->input->post('lang'),
                    'id_eselon' => $this->input->post('eselon'),
                    'id_penempatan' => $this->input->post('penempatan'),
                    'id_pegawai_aktif' => $this->input->post('paktif'),
                    'rules_id' => $this->input->post('rules')
                );
            }
        } else {
            $this->data['content'] = $this->ap_admin_m->get_new();
            $this->data['lang'] = $this->ci_languages_m->get();
            $this->data['rule'] = $this->ci_rules_m->get();
            $id_baru = $this->ap_admin_m->increment();
            $data = array(
                'id_admin' => $id_baru,
                'nip_admin' => $this->input->post('nip'),
                'username_admin' => $this->input->post('username'),
                'password_admin' => $this->ap_admin_m->hash($this->input->post('password')),
                'name_admin' => $this->input->post('name'),
                // 'email_admin' => $this->input->post('email'),
                'telp_admin' => $this->input->post('telp'),
                'alamat_admin' => $this->input->post('alamat'),
                'image_admin' => 'admin_default.png',
                'lang_admin' => $this->input->post('lang'),
                'id_eselon' => $this->input->post('eselon'),
                'id_penempatan' => $this->input->post('penempatan'),
                'id_pegawai_aktif' => $this->input->post('paktif'),
                'rules_id' => $this->input->post('rules'),
                'active_admin' => 1
            );
        }
        
        $rules = $this->ap_admin_m->rules_tambah;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_admin_m->save($data, $id);
            
            if ($id) {
                $this->db->delete('ap_admin_perusahaan', array(
                    'id_admin' => $id
                ));
            } else {
                $id = $id_baru;
            }
            $i = 1;
            foreach ($this->input->post('perusahaan') as $val) :
                
                $data = array(
                    'id_admin' => $id,
                    'id_perusahaan' => $val
                
                );
                $this->ap_admin_perusahaan_m->save($data, NULL);
                $i ++;
            endforeach
            ;
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->ap_admin_m->delete($id);
        
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
