<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hak_akses extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ci_rules_m');
    }

    public function index($id = NULL)
    {
        // $this->db->where('id!=',1);
        $this->data['content'] = $this->ci_rules_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['all_module'] = $this->ci_modules_m->get_by(array(
            'parent' => 0
        ));
        $this->db->where('parent<>', 0);
        $this->data['all_module_child'] = $this->ci_modules_m->get();

        $this->data['module_saat_ini'] = array();
        if ($id) {
            $module_now = $this->ci_rules_modules_m->get_by(array(
                'rules_id' => $id
            ));
            foreach ($module_now as $val) :
                array_push($this->data['module_saat_ini'], $val->modules_id);
            endforeach
            ;
            $this->data['content'] = $this->ci_rules_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'name' => $this->input->post('nama')
            );
        } else {
            $this->data['content'] = $this->ci_rules_m->get_new();
            $id_baru = $this->ci_rules_m->increment();
            $data = array(
                'id' => $id_baru,
                'name' => $this->input->post('nama')
            );
        }

        $rules = $this->ci_rules_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $this->ci_rules_m->save($data, $id);
            if ($id) {
                $this->db->delete('ci_rules_modules', array(
                    'rules_id' => $id
                ));
            } else {
                $id = $id_baru;
            }
            $i = 1;
            foreach ($this->input->post('module') as $val) :
                $mod = explode('_', $val);
                $data = array(
                    'rules_id' => $id,
                    'modules_id' => $mod[0],
                    'order' => $i,
                    'parent_modules_id' => $mod[1]
                );
                $this->ci_rules_modules_m->save($data, NULL);
                $i ++;
            endforeach
            ;
            redirect($this->uri->rsegment(1) . '/index/');
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function do_upload()
    {}

    public function delete($id)
    {
        $this->db->delete('ci_rules_modules', array(
            'rules_id' => $id
        ));
        $this->ci_rules_m->delete($id);

        redirect($this->uri->rsegment(1) . '/index/');
    }
}
