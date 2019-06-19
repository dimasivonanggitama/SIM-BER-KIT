<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan_kategori extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_peraturan_kategori_m');
    }

    public function index($id = 0)
    {
        if ($id != 0) {
            $this->data['content'] = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori' => $id
            ));
            $this->data['content_parent'] = $this->ap_peraturan_kategori_m->get($id);
        } else {
            $this->data['content'] = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori' => 0
            ));
        }
        
        $this->data['pohon'] = $this->ap_peraturan_kategori_m->get();
        
        $this->data['parent_list'] = array();
        
        foreach ($this->data['pohon'] as $val) :
            array_push($this->data['parent_list'], $val->parent_peraturan_kategori);
        endforeach
        ;
        
        $this->data['parent'] = $id;
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($parent, $id = NULL)
    {
        $this->data['pohon'] = $this->ap_peraturan_kategori_m->get();
        
        $this->data['parent_list'] = array();
        
        foreach ($this->data['pohon'] as $val) :
        array_push($this->data['parent_list'], $val->parent_peraturan_kategori);
        endforeach
        ;
        
        $this->data['parent'] = $parent;
        
        $this->data['induk'] = $this->ap_peraturan_kategori_m->get();
        if ($id) {
            $this->data['content'] = $this->ap_peraturan_kategori_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'nama_peraturan_kategori' => $this->input->post('nama'),
                'parent_peraturan_kategori' => $this->input->post('parent')
            );
        } else {
            $this->data['content'] = $this->ap_peraturan_kategori_m->get_new();
            $data = array(
                'id_peraturan_kategori' => $this->ap_peraturan_kategori_m->increment(),
                'nama_peraturan_kategori' => $this->input->post('nama'),
                'parent_peraturan_kategori' => $this->input->post('parent'),
            );
        }
        
        $rules = $this->ap_peraturan_kategori_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_peraturan_kategori_m->save($data, $id);
            redirect($this->uri->rsegment(1).'/index/'.$parent);
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($parent, $id)
    {
        $list = $this->ap_peraturan_kategori_m->get();
        
        $list_parent = array();
        
        foreach ($list as $val) :
            array_push($list_parent, $val->parent_peraturan_kategori);
        endforeach
        ;
        if (in_array($id, $list_parent)) {
            $this->session->set_flashdata('status', $this->data['lang_error']);
        } else {
            $this->ap_peraturan_kategori_m->delete($id);
        }
        
        redirect($this->uri->rsegment(1) . '/index/' . $parent);
    }
}
