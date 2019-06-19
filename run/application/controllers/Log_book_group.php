<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_book_group extends Goodsyst_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_log_book_group_m');
        $this->load->model('ap_log_book_group_dtl_m');
    }
    
    public function index($id = NULL)
    {
        $this->db->join('ap_admin','ap_admin.id_admin=ap_log_book_group.id_admin','left');
        $this->data['content'] = $this->ap_log_book_group_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id = NULL)
    {
        
        $this->data['all_user'] = $this->ap_admin_m->get();
        $this->data['all_rules'] = $this->ci_rules_m->get();
        $this->data['module_saat_ini'] = array();
        
        
        if ($id) {
            $module_now = $this->ap_log_book_group_dtl_m->get_by(array(
                'id_log_book_group' => $id
            ));
            foreach ($module_now as $val) :
            array_push($this->data['module_saat_ini'], $val->id_admin);
            endforeach
            ;
            
            $this->data['content'] = $this->ap_log_book_group_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'nama_log_book_group' => $this->input->post('nama'),
                'id_admin' => $this->input->post('atasan')
            );
        } else {
            $this->data['content'] = $this->ap_log_book_group_m->get_new();
            $id_baru = $this->ap_log_book_group_m->increment();
            $data = array(
                'id_log_book_group' =>$id_baru,
                'nama_log_book_group' => $this->input->post('nama'),
                'id_admin' => $this->input->post('atasan')
            );
        }
        
        $rules = $this->ap_log_book_group_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_log_book_group_m->save($data, $id);
            
            if ($id) {
                $this->db->delete('ap_log_book_group_dtl', array(
                    'id_log_book_group' => $id
                ));
            } else {
                $id = $id_baru;
            }
            foreach ($this->input->post('module') as $val) :
            $data = array(
                'id_log_book_group_dtl' => $this->ap_log_book_group_dtl_m->increment(),
                'id_log_book_group' => $id,
                'id_admin' => $val
            );
            $this->ap_log_book_group_dtl_m->save($data, NULL);
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
        $this->db->delete('ap_log_book_group_dtl', array(
            'id_log_book_group' => $id
        ));
        $this->ap_log_book_group_m->delete($id);
        
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
