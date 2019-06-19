<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sharing_pic extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_sharing_m');
        $this->load->model('ap_penempatan_m');
        $this->load->model('ap_sharing_kategori_m');
        $this->load->model('ap_sharing_rules_m');
        $this->load->model('ci_rules_m');
        $this->load->model('ap_sharing_pic_m');
    }

    public function index($id = NULL)
    {
        if ($id) {
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_sharing_kategori', 'ap_sharing_kategori.id_arsip_kategori=ap_sharing.id_arsip_kategori', 'left');
            $this->db->where_in('ap_sharing.id_arsip_kategori',$in);
            $this->db->order_by('ap_sharing.id_arsip',"DESC");
            $this->data['content'] = $this->ap_sharing_m->get_by(array(
                'ap_sharing.id_admin' => $this->session->userdata('id')
            ));
        } else {
            $this->db->join('ap_sharing_kategori', 'ap_sharing_kategori.id_arsip_kategori=ap_sharing.id_arsip_kategori', 'left');
            $this->db->order_by('ap_sharing.id_arsip',"DESC");
            $this->data['content'] = $this->ap_sharing_m->get_by(array(
                'ap_sharing.id_admin' => $this->session->userdata('id')
            ));
        }
        
        $this->data['arsip_kate'] = $this->ap_sharing_kategori_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->db->distinct();
        $this->data['dt_ref_sharing'] =$this->db->query("SELECT DISTINCT id_penempatan FROM ap_sharing_pic order by id_penempatan DESC")->result();

        $id_no = array(1,4,5,6,8,9);
        $this->db->where_in('rules_id', $id_no);
        $this->db->where('id_pegawai_aktif =', 1);
        $this->db->where('id_admin<>', $this->session->userdata('id'));
        $this->data['all_user'] = $this->ap_admin_m->get();
        // $this->data['all_rules'] = $this->ci_rules_m->get();
        $id_penem = array(18,19,20,21,22,23,24,25);
        $this->db->where_in('id_penempatan', $id_penem);
        $this->db->order_by('ap_penempatan.id_penempatan',"DESC");
        $this->data['all_rules'] = $this->ap_penempatan_m->get();
        $this->data['module_saat_ini'] = array();
        
        $this->data['pohon'] = $this->ap_sharing_kategori_m->get();
        $this->data['parent_list'] = array();
        foreach ($this->data['pohon'] as $val) :
            array_push($this->data['parent_list'], $val->parent_arsip_kategori);
        endforeach
        ;
        
        $this->data['parent'] = $id;
        
        $jeneng = NULL;
        if (! empty($_FILES['file_arsip']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_arsip']['name']);
        }
        
        $this->data['induk'] = $this->ap_sharing_kategori_m->get();
        if ($id) {
            $module_now = $this->ap_sharing_rules_m->get_by(array(
                'id_arsip' => $id
            ));
            foreach ($module_now as $item) :
                $array[]=$item->id_admin;
            endforeach;
            $tampung=implode(",", $array);
            $where="`id_admin` IN (".$tampung.")";
            $this->db->where($where);
            $tmp=$this->ap_sharing_pic_m->get();
            if($tmp ==NULL){
                print_r('Anda rekam tidak melalui menu ini, silahkan ke menu Berbagi File!');
                die();
            }
            foreach($tmp as $val):
                array_push($this->data['module_saat_ini'], $val->id_penempatan);
            endforeach;
            
            
            $this->data['content'] = $this->ap_sharing_m->get($id);
            $this->data['arsip_kate'] = $this->ap_sharing_kategori_m->get();
            //count($this->data['content']) || redirect('404');
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
            $this->data['content'] = $this->ap_sharing_m->get_new();
            $this->data['arsip_kate'] = $this->ap_sharing_kategori_m->get();
            $id_baru = $this->ap_sharing_m->increment();
            $data = array(
                'id_arsip' => $id_baru,
                'nama_arsip' => $this->input->post('nama_arsip'),
                'ket_arsip' => $this->input->post('ket_arsip'),
                'file_arsip' => $jeneng,
                'date_create_arsip' => date('Y-m-d H:i:s'),
                'date_update_arsip' => NULL,
                'id_arsip_kategori' => $this->input->post('kat_arsip'),
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        $rules = $this->ap_sharing_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            // upload
            if (! empty($_FILES['file_arsip']['name'])) {
                $this->upload_file_all($jeneng, 'file_arsip');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_arsip);
                }
            }
            $this->ap_sharing_m->save($data, $id);
            
            if ($id) {
                $this->db->delete('ap_sharing_rules', array(
                    'id_arsip' => $id
                ));
            } else {
                $id = $id_baru;
            }
            $prefer= $this->input->post('module');
            //$data['prefer'] =implode(",", $prefer);
            // print_r($data['prefer']);
            // die();
            foreach ($prefer as $tamp_get):
                $sql1 = "SELECT * FROM ap_sharing_pic WHERE id_penempatan=?";
                $query1 = $this->db->query($sql1,array($tamp_get));
                $penem = $query1->result();
                foreach($penem as $tamp):
                    $data = array(
                        'id_arsip' => $id,
                        'id_admin' => $tamp->id_admin
                    );
                    $this->ap_sharing_rules_m->save($data, NULL);
                endforeach;
            endforeach;
            
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->db->delete('ap_sharing_rules', array(
            'id_arsip' => $id
        ));
        $this->data['content'] = $this->ap_sharing_m->get($id);
        $this->ap_sharing_m->delete($id);
        unlink('./uploads/' . $this->data['content']->file_arsip);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_sharing_kategori_m->get_by(array(
                'parent_arsip_kategori'=>$val
            ));
            
            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_arsip_kategori);
                    $anak_next = $this->ap_sharing_kategori_m->get_by(array(
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
