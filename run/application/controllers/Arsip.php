<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_arsip_m');
        $this->load->model('ap_arsip_kategori_m');
    }

    public function index($id = NULL)
    {
        if ($id) {
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_arsip_kategori', 'ap_arsip_kategori.id_arsip_kategori=ap_arsip.id_arsip_kategori', 'left');
            $this->db->where_in('ap_arsip.id_arsip_kategori',$in);
            $this->db->order_by('ap_arsip.id_arsip',"DESC");
            $this->data['content'] = $this->ap_arsip_m->get();
        } else {
            $this->db->join('ap_arsip_kategori', 'ap_arsip_kategori.id_arsip_kategori=ap_arsip.id_arsip_kategori', 'left');
            $this->db->order_by('ap_arsip.id_arsip',"DESC");
            $this->data['content'] = $this->ap_arsip_m->get();
        }
        
        $this->data['arsip_kate'] = $this->ap_arsip_kategori_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['pohon'] = $this->ap_arsip_kategori_m->get();
        $this->data['parent_list'] = array();
        foreach ($this->data['pohon'] as $val) :
            array_push($this->data['parent_list'], $val->parent_arsip_kategori);
        endforeach
        ;
        
        $this->data['parent'] = $id;
        
        $jeneng=NULL;
        if (! empty($_FILES['file_arsip']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_arsip']['name']);
        }
        
        $this->data['induk'] = $this->ap_arsip_kategori_m->get();
        if ($id) {
            $this->data['content'] = $this->ap_arsip_m->get($id);
            $this->data['arsip_kate'] = $this->ap_arsip_kategori_m->get();
            count($this->data['content']) || redirect('404');
            if (! empty($_FILES['file_arsip']['name'])) {
                $data = array(
                    'nama_arsip' => $this->input->post('nama_arsip'),
                    'ket_arsip' => $this->input->post('ket_arsip'),
                    'file_arsip' => $jeneng,
                    'date_update_arsip' => date('Y-m-d H:i:s'),
                    'id_arsip_kategori' => $this->input->post('kat_arsip'),
                    'id_admin' => $this->session->userdata('id')
                );
            } else {
                $data = array(
                    'nama_arsip' => $this->input->post('nama_arsip'),
                    'ket_arsip' => $this->input->post('ket_arsip'),
                    'date_update_arsip' => date('Y-m-d H:i:s'),
                    'id_arsip_kategori' => $this->input->post('kat_arsip'),
                    'id_admin' => $this->session->userdata('id')
                );
            }
        } else {
            $this->data['content'] = $this->ap_arsip_m->get_new();
            $this->data['arsip_kate'] = $this->ap_arsip_kategori_m->get();
            $data = array(
                'id_arsip' => $this->ap_arsip_m->increment(),
                'nama_arsip' => $this->input->post('nama_arsip'),
                'ket_arsip' => $this->input->post('ket_arsip'),
                'file_arsip' => $jeneng,
                'date_create_arsip' => date('Y-m-d H:i:s'),
                'date_update_arsip' => NULL,
                'id_arsip_kategori' => $this->input->post('kat_arsip'),
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        $rules = $this->ap_arsip_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            // upload
            if (! empty($_FILES['file_arsip']['name'])) {
                $this->upload_dokumen($jeneng, 'file_arsip');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_arsip);
                }
            }
            $this->ap_arsip_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->data['content'] = $this->ap_arsip_m->get($id);
        $this->ap_arsip_m->delete($id);
        unlink('./uploads/' . $this->data['content']->file_arsip);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_arsip_kategori_m->get_by(array(
                'parent_arsip_kategori'=>$val
            ));
            
            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_arsip_kategori);
                    $anak_next = $this->ap_arsip_kategori_m->get_by(array(
                        'parent_arsip_kategori'=>$key->id_arsip_kategori
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_arsip_kategori);
                        $i++;
                    }
                endforeach;
            }
        endforeach;
        if ($i==0) {
            return $in;
        } else {
            return $this->cari_anak($new_id, $in);
        }
    }
}
