<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_sop_m');
        $this->load->model('ap_sop_kategori_m');
    }

    public function index($id = NULL)
    {
        if ($id) {
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_sop_kategori', 'ap_sop_kategori.id_sop_kategori=ap_sop.id_sop_kategori', 'left');
            $this->db->where_in('ap_sop.id_sop_kategori',$in);
            $this->db->order_by('ap_sop.id_sop',"DESC");
            $this->data['content'] = $this->ap_sop_m->get();
        } else {
            $this->db->join('ap_sop_kategori', 'ap_sop_kategori.id_sop_kategori=ap_sop.id_sop_kategori', 'left');
            $this->db->order_by('ap_sop.id_sop',"DESC");
            $this->data['content'] = $this->ap_sop_m->get();
        }

        $this->data['sop_kate'] = $this->ap_sop_kategori_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['pohon'] = $this->ap_sop_kategori_m->get();
        $this->data['parent_list'] = array();
        foreach ($this->data['pohon'] as $val) :
            array_push($this->data['parent_list'], $val->parent_sop_kategori);
        endforeach
        ;

        $this->data['parent'] = $id;

        $jeneng = NULL;
        if (! empty($_FILES['file_sop']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_sop']['name']);
        }

        $this->data['induk'] = $this->ap_sop_kategori_m->get();
        if ($id) {
            $this->data['content'] = $this->ap_sop_m->get($id);
            $this->data['sop_kate'] = $this->ap_sop_kategori_m->get();
            count($this->data['content']) || redirect('404');
            if (! empty($_FILES['file_sop']['name'])) {
                $data = array(
                    'nama_sop' => $this->input->post('nama_sop'),
                    'keterangan_sop' => $this->input->post('ket_sop'),
                    'file_sop' => $jeneng,
                    'date_update_sop' => date('Y-m-d H:i:s'),
                    'id_sop_kategori' => $this->input->post('kat_sop'),
                    'id_admin' => $this->session->userdata('id')
                );
            } else {
                $data = array(
                    'nama_sop' => $this->input->post('nama_sop'),
                    'keterangan_sop' => $this->input->post('ket_sop'),
                    'date_update_sop' => date('Y-m-d H:i:s'),
                    'id_sop_kategori' => $this->input->post('kat_sop'),
                    'id_admin' => $this->session->userdata('id')
                );
            }
        } else {

            $this->data['content'] = $this->ap_sop_m->get_new();
            $this->data['sop_kate'] = $this->ap_sop_kategori_m->get();
            $data = array(
                'id_sop' => $this->ap_sop_m->increment(),
                'nama_sop' => $this->input->post('nama_sop'),
                'keterangan_sop' => $this->input->post('ket_sop'),
                'file_sop' => $jeneng,
                'date_create_sop' => date('Y-m-d H:i:s'),
                'date_update_sop' => NULL,
                'id_sop_kategori' => $this->input->post('kat_sop'),
                'id_admin' => $this->session->userdata('id')
            );
        }

        $rules = $this->ap_sop_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['file_sop']['name'])) {
                $this->upload_dokumen($jeneng, 'file_sop');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_sop);
                }
            }
            $this->ap_sop_m->save($data, $id);

            if ($id==NULL) {
                $userx=array();
                $pick_all=$this->ap_admin_m->get();
                foreach ($pick_all as $val):
                    array_push($userx,$val->id_admin);
                endforeach;
                $this->notifikasi('sop_view','SOP Baru',$userx);
            }

            redirect($this->uri->rsegment(1) . '/index/');
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {

        $this->data['content'] = $this->ap_sop_m->get($id);
        $this->ap_sop_m->delete($id);
        unlink('./uploads/' . $this->data['content']->file_sop);

        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_sop_kategori_m->get_by(array(
                'parent_sop_kategori'=>$val
            ));

            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_sop_kategori);
                    $anak_next = $this->ap_sop_kategori_m->get_by(array(
                        'parent_sop_kategori'=>$key->id_sop_kategori
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_sop_kategori);
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
