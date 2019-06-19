<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_peraturan_m');
        $this->load->model('ap_peraturan_kategori_m');
    }

    public function index($id = NULL, $idx = NULL)
    {
        if ($id) {
            if ($idx) {
                $in = $this->cari_anak(array(
                    $idx
                ), array(
                    $idx
                ));
            } else {
                $in = $this->cari_anak(array(
                    $id
                ), array(
                    $id
                ));
            }
            
            $this->db->join('ap_peraturan_kategori', 'ap_peraturan_kategori.id_peraturan_kategori=ap_peraturan.id_peraturan_kategori', 'left');
            $this->db->order_by('ap_peraturan.id_peraturan_group ASC, ap_peraturan.id_peraturan_kategori ASC, ap_peraturan.id_peraturan_status ASC, ap_peraturan.id_peraturan ASC');
            $this->db->where_in('ap_peraturan.id_peraturan_kategori', $in);
            $this->data['content'] = $this->ap_peraturan_m->get();
        } else {
            $this->db->join('ap_peraturan_kategori', 'ap_peraturan_kategori.id_peraturan_kategori=ap_peraturan.id_peraturan_kategori', 'left');
            $this->db->order_by('ap_peraturan.id_peraturan_group ASC, ap_peraturan.id_peraturan_kategori ASC, ap_peraturan.id_peraturan_status ASC, ap_peraturan.id_peraturan ASC');
            $this->data['content'] = $this->ap_peraturan_m->get();
        }
        
        $this->data['peraturan_kate'] = $this->ap_peraturan_kategori_m->get_by(array(
            'parent_peraturan_kategori' => 0
        ));
        if ($id == 0) {
            $this->data['peraturan_kate_sub'] = NULL;
        } else {
            $this->data['peraturan_kate_sub'] = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori' => $id
            ));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['pohon'] = $this->ap_peraturan_kategori_m->get();
        $this->data['parent_list'] = array();
        foreach ($this->data['pohon'] as $val) :
            array_push($this->data['parent_list'], $val->parent_peraturan_kategori);
        endforeach
        ;
        
        $this->data['parent'] = $id;
        
        $jeneng = NULL;
        if (! empty($_FILES['file_peraturan']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_peraturan']['name']);
        }
        
        $this->data['induk'] = $this->ap_peraturan_m->get();
        
        if ($id) {
            $this->data['content'] = $this->ap_peraturan_m->get($id);
            $this->data['peraturan_kate'] = $this->ap_peraturan_kategori_m->get();
            count($this->data['content']) || redirect('404');
            if (! empty($_FILES['file_peraturan']['name'])) {
                $data = array(
                    'nama_peraturan' => $this->input->post('nama_peraturan'),
                    'keterangan_peraturan' => $this->input->post('ket_peraturan'),
                    'file_peraturan' => $jeneng,
                    'date_berlaku_peraturan' => $this->input->post('tgl_berlaku'),
                    'date_update_peraturan' => date('Y-m-d H:i:s'),
                    'id_peraturan_kategori' => $this->input->post('kat_peraturan'),
                    'id_admin' => $this->session->userdata('id'),
                    'id_peraturan_group' => $this->input->post('pgroup'),
                    'id_peraturan_status' => $this->input->post('pstatus')
                );
            } else {
                $data = array(
                    'nama_peraturan' => $this->input->post('nama_peraturan'),
                    'keterangan_peraturan' => $this->input->post('ket_peraturan'),
                    'date_berlaku_peraturan' => $this->input->post('tgl_berlaku'),
                    'date_update_peraturan' => date('Y-m-d H:i:s'),
                    'id_peraturan_kategori' => $this->input->post('kat_peraturan'),
                    'id_admin' => $this->session->userdata('id'),
                    'id_peraturan_group' => $this->input->post('pgroup'),
                    'id_peraturan_status' => $this->input->post('pstatus')
                );
            }
        } else {
            $this->data['content'] = $this->ap_peraturan_m->get_new();
            $this->data['peraturan_kate'] = $this->ap_peraturan_kategori_m->get();
            $data = array(
                'id_peraturan' => $this->ap_peraturan_m->increment(),
                'nama_peraturan' => $this->input->post('nama_peraturan'),
                'keterangan_peraturan' => $this->input->post('ket_peraturan'),
                'file_peraturan' => $jeneng,
                'date_berlaku_peraturan' => $this->input->post('tgl_berlaku'),
                'date_update_peraturan' => NULL,
                'id_peraturan_kategori' => $this->input->post('kat_peraturan'),
                'id_admin' => $this->session->userdata('id'),
                'id_peraturan_group' => $this->input->post('pgroup'),
                'id_peraturan_status' => $this->input->post('pstatus'),
                'wk_rekam' => date('Y-m-d H:i:s')
            );
        }
        
        $rules = $this->ap_peraturan_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['file_peraturan']['name'])) {
                $this->upload_dokumen($jeneng, 'file_peraturan');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_peraturan);
                }
            }
            $this->ap_peraturan_m->save($data, $id);
            
            if ($id == NULL) {
                $userx = array();
                $pick_all = $this->ap_admin_m->get();
                foreach ($pick_all as $val) :
                    array_push($userx, $val->id_admin);
                endforeach
                ;
                $this->notifikasi('peraturan_view', 'Peraturan Baru', $userx);
            }
            
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

public function presentasi($id)
    {
        $this->data['content'] = $this->ap_peraturan_m->get($id);
        
        $jeneng = NULL;
        if (! empty($_FILES['file_nama_slide']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_nama_slide']['name']);
            $this->upload_slide($jeneng, 'file_nama_slide');
            $sql = "SELECT * FROM ap_peraturan WHERE id_peraturan=?";
            $query = $this->db->query($sql,array($id));
            $row = $query->row();
            if (isset($row))
                {
                    if( $row->nama_slide != NULL){
                    unlink('./uploads/' . $this->data['content']->nama_slide);
                    }
                }
                $this->db->set('nama_slide', $jeneng); //value that used to update column  
                $this->db->where('id_peraturan', $id); //which row want to upgrade  
                $this->db->update('ap_peraturan');  //table name
                redirect($this->uri->rsegment(1) . '/index');           
        }else{
            $this->form_validation->set_rules('file_nama_slide',': File Slide', 'required');
        }     

            
       
        $this->data['subview'] = $this->uri->rsegment(1) . '/presentasi';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->data['content'] = $this->ap_peraturan_m->get($id);
        $sql = "SELECT * FROM ap_peraturan WHERE id_peraturan=?";
            $query = $this->db->query($sql,array($id));
            $row = $query->row();
            if (isset($row))
            {
                if($row->file_peraturan != NULL){
                    unlink('./uploads/' . $this->data['content']->file_peraturan);
                }
                if( $row->nama_slide != NULL){
                    unlink('./uploads/' . $this->data['content']->nama_slide);
                }
            }
        $this->ap_peraturan_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function cari_anak($id = array(), $in = array())
    {
        $new_id = array();
        $i = 0;
        foreach ($id as $val) :
            $anak = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori' => $val
            ));
            
            if (count($anak) != 0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_peraturan_kategori);
                    $anak_next = $this->ap_peraturan_kategori_m->get_by(array(
                        'parent_peraturan_kategori' => $key->id_peraturan_kategori
                    ));
                    if (count($anak_next) != 0) {
                        array_push($new_id, $key->id_peraturan_kategori);
                        $i ++;
                    }
                endforeach
                ;
            }
        endforeach
        ;
        if ($i == 0) {
            return $in;
        } else {
            return $this->cari_anak($new_id, $in);
        }
    }
}
