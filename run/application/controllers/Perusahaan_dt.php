<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_dt extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_perusahaan_dt_m');
        $this->load->model('ap_perusahaan_pjd_m');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_perusahaan_kategori_m');
        $this->load->model('ap_perusahaan_produk_m');
    }

    public function edit($id = NULL)
    {
        $this->data['pjd'] = $this->ap_perusahaan_pjd_m->get();
        if ($id) {
            $this->db->join('ap_perusahaan_pjd', 'ap_perusahaan_pjd.id_perusahaan_pjd=ap_perusahaan_dt.jenis_doc_perusahaan_dt', 'left');
            $this->data['content'] = $this->ap_perusahaan_dt_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'jenis_doc_perusahaan_dt' => $this->input->post('j  enis_dok'),
                'bulan_perusahaan_dt' => $this->input->post('bulan'),
                'tahun_perusahaan_dt' => $this->input->post('tahun'),
                'jumlah_doc_perusahaan_dt' => $this->input->post('jumlah_dok'),
                'date_update_perusahaan_dt' => date('Y-m-d H:i:s'),
                'id_admin' => $this->session->userdata('id')
            
            );
        } else {
            $this->db->join('ap_perusahaan_pjd', 'ap_perusahaan_pjd.id_perusahaan_pjd=ap_perusahaan_dt.jenis_doc_perusahaan_dt', 'left');
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_new();
            $data = array(
                'id_perusahaan_dt' => $this->ap_perusahaan_dt_m->increment(),
                'jenis_doc_perusahaan_dt' => $this->input->post('jenis_dok'),
                'bulan_perusahaan_dt' => $this->input->post('bulan'),
                'tahun_perusahaan_dt' => $this->input->post('tahun'),
                'jumlah_doc_perusahaan_dt' => $this->input->post('jumlah_dok'),
                'date_create_perusahaan_dt' => date('Y-m-d H:i:s'),
                'date_update_perusahaan_dt' => NULL,
                'id_admin' => $this->session->userdata('id')
            
            );
        }
        
        $rules = $this->ap_perusahaan_dt_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->ap_perusahaan_dt_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function index($kota = NULL, $status = NULL, $tahun = NULL, $kate = NULL)
    {
        if ($kota == NUll) {
            $kota = 0;
        }
        if ($status == NUll) {
            $status = 0;
        }
        if ($tahun == NUll) {
            $tahun = 0;
        }
        if ($kate == NUll) {
            $kate = 0;
        }
        
        $this->data['peru_cate'] = $this->ap_perusahaan_kategori_m->get();
        $this->db->group_by('kota_perusahaan');
        $this->data['kota'] = $this->ap_perusahaan_m->get();
        $this->db->group_by('status_perusahaan');
        $this->data['status'] = $this->ap_perusahaan_m->get();
        $this->db->group_by('YEAR(tgl_skep_penetapan_perusahaan)');
        $this->data['tahun'] = $this->ap_perusahaan_m->get();
        
        if ($kota != '0' && $status != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $status != '0' && $tahun != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $status != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota)
            ));
        } elseif ($kate != '0' && $tahun != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $status != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $tahun != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $tahun != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota)
            ));
        } elseif ($status != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($tahun != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get();
        } else {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get();
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function detail($id, $doc = NULL, $bulan = NULL, $tahun = NULL)
    {
        if ($bulan == NULL) {
            $this->data['bulan'] = '0';
        } else {
            $this->data['bulan'] = intval($bulan);
        }
        if ($tahun == NULL) {
            $this->data['tahun'] = '0';
        } else {
            $this->data['tahun'] = $tahun;
        }
        if ($doc == NULL) {
            $this->data['doc'] = '0';
        } else {
            $this->data['doc'] = $doc;
        }
        
        $this->db->join('ap_perusahaan', 'ap_perusahaan.id_perusahaan=ap_perusahaan_dt.id_perusahaan', 'left');
        $this->db->order_by('jenis_doc_perusahaan_dt,bulan_perusahaan_dt,tahun_perusahaan_dt');
        
        if ($this->data['bulan'] != '0' && $this->data['tahun'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc'],
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0' && $this->data['tahun'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc']
            ));
        } elseif ($this->data['tahun'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['bulan']
            ));
        } elseif ($this->data['tahun'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan']
            ));
        } elseif ($this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc']
            ));
        } else {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id
            ));
        }
        
        
        $this->data['jenis_dt'] = $this->ap_perusahaan_pjd_m->get();
        $data = array(
            'id_perusahaan_dt' => $this->ap_perusahaan_dt_m->increment(),
            'jenis_doc_perusahaan_dt' => $this->input->post('jenis_doc'),
            'bulan_perusahaan_dt' => $this->input->post('bulan'),
            'tahun_perusahaan_dt' => $this->input->post('tahun'),
            'jumlah_doc_perusahaan_dt' => $this->input->post('jumlah_doc'),
            'date_create_perusahaan_dt' => date('Y-m-d H:i:s'),
            'date_update_perusahaan_dt' => NULL,
            'id_admin' => $this->session->userdata('id'),
            'id_perusahaan' => $id
        );
        
        $rules = $this->ap_perusahaan_dt_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->ap_perusahaan_dt_m->save($data, NULL);
            redirect($this->uri->rsegment(1) . '/detail/' . $id);
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/detail';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function detail_edit($parent, $id)
    {
        $this->data['content'] = $this->ap_perusahaan_dt_m->get($id);
        
        $this->data['jenis_dt'] = $this->ap_perusahaan_pjd_m->get();
        $data = array(
            'jenis_doc_perusahaan_dt' => $this->input->post('jenis_doc'),
            'bulan_perusahaan_dt' => $this->input->post('bulan'),
            'tahun_perusahaan_dt' => $this->input->post('tahun'),
            'jumlah_doc_perusahaan_dt' => $this->input->post('jumlah_doc'),
            'date_update_perusahaan_dt' => date('Y-m-d H:i:s'),
            'id_admin' => $this->session->userdata('id')
        );
        
        $rules = $this->ap_perusahaan_dt_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->ap_perusahaan_dt_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/detail/' . $parent);
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/detail_edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function view($id, $doc = NULL, $bulan = NULL, $tahun = NULL)
    {
        if ($bulan == NULL) {
            $this->data['bulan'] = '0';
        } else {
            $this->data['bulan'] = intval($bulan);
        }
        if ($tahun == NULL) {
            $this->data['tahun'] = '0';
        } else {
            $this->data['tahun'] = $tahun;
        }
        if ($doc == NULL) {
            $this->data['doc'] = '0';
        } else {
            $this->data['doc'] = $doc;
        }
        
        $this->data['jenis_dt'] = $this->ap_perusahaan_pjd_m->get();
        
        $this->db->join('ap_perusahaan', 'ap_perusahaan.id_perusahaan=ap_perusahaan_dt.id_perusahaan', 'left');
        $this->db->order_by('jenis_doc_perusahaan_dt,bulan_perusahaan_dt,tahun_perusahaan_dt');
        
        if ($this->data['bulan'] != '0' && $this->data['tahun'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc'],
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0' && $this->data['tahun'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc']
            ));
        } elseif ($this->data['tahun'] != '0' && $this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['bulan'],
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['bulan']
            ));
        } elseif ($this->data['tahun'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.tahun_perusahaan_dt' => $this->data['tahun']
            ));
        } elseif ($this->data['bulan'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.bulan_perusahaan_dt' => $this->data['bulan']
            ));
        } elseif ($this->data['doc'] != '0') {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id,
                'ap_perusahaan_dt.jenis_doc_perusahaan_dt' => $this->data['doc']
            ));
        } else {
            $this->data['content'] = $this->ap_perusahaan_dt_m->get_by(array(
                'ap_perusahaan_dt.id_perusahaan' => $id
            ));
        }
        
        $this->data['jenis_dt'] = $this->ap_perusahaan_pjd_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/view';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajax_detail()
    {
        $id = $this->input->post('id');
        $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        
        $this->load->view('maps/ajax_view', $this->data);
    }

    public function delete_dt($parent, $id)
    {
        $this->ap_perusahaan_dt_m->delete($id);
        redirect($this->uri->rsegment(1) . '/detail/' . $parent);
    }

    public function delete($id)
    {
        $this->ap_perusahaan_dt_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function cari_anak($id = array(), $in = array())
    {
        $new_id = array();
        $i = 0;
        foreach ($id as $val) :
            $anak = $this->ap_perusahaan_kategori_m->get_by(array(
                'parent_perusahaan_kategori' => $val
            ));
            
            if (count($anak) != 0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_perusahaan_kategori);
                    $anak_next = $this->ap_perusahaan_kategori_m->get_by(array(
                        'parent_perusahaan_kategori' => $key->id_perusahaan_kategori
                    ));
                    if (count($anak_next) != 0) {
                        array_push($new_id, $key->id_perusahaan_kategori);
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
