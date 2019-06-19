<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends Goodsyst_Controller
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

    public function edit($id = NULL)
    {
        $jeneng=NULL;
        if (! empty($_FILES['file_pengumuman']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_pengumuman']['name']);
        }
        
        if ($id) {
            
            $this->data['content'] = $this->ap_pengumuman_m->get($id);
            count($this->data['content']) || redirect('404');
            if (! empty($_FILES['file_pengumuman']['name'])) {
                $data = array(
                    'nama_pengumuman' => $this->input->post('nama_pengumuman'),
                    'uraian_pengumuman' => $this->input->post('uraian_pengumuman'),
                    'date_start_pengumuman' => ''.$this->input->post('start').' '.$this->input->post('time_start').'',
                    'date_end_pengumuman' => ''.$this->input->post('end').' '.$this->input->post('time_end').'',
                    'date_update_pengumuman' => date('Y-m-d H:i:s'),
                    'id_admin' => $this->session->userdata('id'),
                    'file_pengumuman'=>$jeneng
                );
            } else {
                $data = array(
                    'nama_pengumuman' => $this->input->post('nama_pengumuman'),
                    'uraian_pengumuman' => $this->input->post('uraian_pengumuman'),
                    'date_start_pengumuman' => ''.$this->input->post('start').' '.$this->input->post('time_start').'',
                    'date_end_pengumuman' => ''.$this->input->post('end').' '.$this->input->post('time_end').'',
                    'date_update_pengumuman' => date('Y-m-d H:i:s'),
                    'id_admin' => $this->session->userdata('id'),
                );
            }
        } else {
            $this->data['content'] = $this->ap_pengumuman_m->get_new();
            $data = array(
                'id_pengumuman' => $this->ap_pengumuman_m->increment(),
                'nama_pengumuman' => $this->input->post('nama_pengumuman'),
                'uraian_pengumuman' => $this->input->post('uraian_pengumuman'),
                'date_start_pengumuman' => ''.$this->input->post('start').' '.$this->input->post('time_start').'',
                'date_end_pengumuman' => ''.$this->input->post('end').' '.$this->input->post('time_end').'',
                'date_create_pengumuman' => date('Y-m-d H:i:s'),
                'date_update_pengumuman' => NULL,
                'id_admin' => $this->session->userdata('id'),
                'file_pengumuman'=>$jeneng
            );
        }
        
        $rules = $this->ap_pengumuman_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            if (! empty($_FILES['file_pengumuman']['name'])) {
                $this->upload_dokumen($jeneng, 'file_pengumuman');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_pengumuman);
                }
            }
            
            $this->ap_pengumuman_m->save($data, $id);

            if ($id==NULL) {
                $userx=array();
                $pick_all=$this->ap_admin_m->get();
                foreach ($pick_all as $val):
                    array_push($userx,$val->id_admin);
                endforeach;
                $this->notifikasi('pengumuman_view','Pengumuman Baru',$userx);
            }

            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->data['content'] = $this->ap_pengumuman_m->get($id);
        unlink('./uploads/' . $this->data['content']->file_pengumuman);
        $this->ap_pengumuman_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
